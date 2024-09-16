<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Service\Sheets as GoogleSheets;
use Google\Client as GoogleClient;

use App\Models\DataPegawai; // Pastikan model ini ada
use App\Models\HarianPresensi;
use Carbon\Carbon;

class GoogleSheetController extends Controller
{
    protected $sheets;

    public function __construct()
    {
        $client = new GoogleClient();
        $client->setAuthConfig(storage_path('app/google/credentials.json')); // Path ke file kredensial
        $client->addScope(GoogleSheets::SPREADSHEETS_READONLY); // Scope yang sesuai
        $this->sheets = new GoogleSheets($client);
    }

    public function readData()
    {
        // ID dan range dari Google Sheet yang ingin diakses
        $spreadsheetId = '1gAyIsAd4Do4aZzvDhXtyHYxyg6NffGWL4V8DlMSZ67E';
        $range = 'Kehadiran'; // Sesuaikan dengan nama sheet atau range yang Anda gunakan

        try {
            // Mengambil data dari Google Sheets
            $response = $this->sheets->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();

            if (empty($values)) {
                return response()->json(['message' => 'No data found.'], 404);
            } else {
                return $values; // Return data untuk digunakan dalam metode import
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function refresh()
    {
        $result = $this->import();
        return redirect()->back()->with('status', $result);
    }

    private function import()
    {
        $values = $this->readData();

        if (is_array($values)) {
            // Mulai proses pembaruan database
            HarianPresensi::truncate();
            foreach ($values as $index => $value) {
                if ($index === 0 || empty($value[0])) {
                    continue; // Skip header atau baris kosong
                }
                $nip = DataPegawai::where('nip', $value[0])->first();
                if (!$nip) {
                    continue; // Skip jika NIP tidak ada di DataPegawai
                }

                $date = !empty($value[2]) ? Carbon::createFromFormat('Y-m-d', $value[2])->format('Y-m-d') : null;

                // Update atau buat entri baru di database
                HarianPresensi::updateOrCreate(
                    ['nip' => $nip->nip, 'date' => $date],
                    [
                    'hari_kerja'         => $value[3] ?? null,
                    'hadir_normal'      => $value[4] ?? null,
                    'terlambat'         => $value[5] ?? null,
                    'pulang_cepat'      => $value[6] ?? null,
                    'tanpa_absen'       => $value[7] ?? null,
                    'absen_error'       => $value[8] ?? null,
                    'kehadiran'         => $value[9] ?? null,
                    'absen_sekali'      => $value[10] ?? null,
                    'tanpa_keterangan'  => $value[11] ?? null,
                    'cuti'              => $value[12] ?? null,
                    'ketidakhadiran'    => $value[13] ?? null,
                    'DL'                => $value[14] ?? null,
                    ]
                );
            }

            return 'Data successfully refreshed.';
        }

        return 'No data found in Google Sheets.';
    }
}

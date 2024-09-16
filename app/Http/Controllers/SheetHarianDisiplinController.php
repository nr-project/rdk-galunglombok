<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Service\Sheets as GoogleSheets;
use Google\Client as GoogleClient;

use App\Models\DataPegawai; // Pastikan model ini ada
use App\Models\HarianDisiplin;
use Carbon\Carbon;

class SheetHarianDisiplinController extends Controller
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
        $range = 'Kedisiplinan'; // Sesuaikan dengan nama sheet atau range yang Anda gunakan

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
            HarianDisiplin::truncate();
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
                HarianDisiplin::updateOrCreate(
                    ['nip' => $nip->nip, 'date' => $date],
                    [
                    'telat_menit'       => $value[3] ?? null,
                    'pc_menit'          => $value[4] ?? null,
                    'a1_menit'          => $value[5] ?? null,
                    'tk_hari'           => $value[6] ?? null,
                    'telat_sanggah'     => $value[7] ?? null,
                    'pc_sanggah'        => $value[8] ?? null,
                    'total'             => $value[9] ?? null,
                    ]
                );
            }

            return 'Data successfully refreshed.';
        }

        return 'No data found in Google Sheets.';
    }
}



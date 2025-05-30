<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PusAlasanTidakKbSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/PUS Alasan Tidak KB.json'));
        $data = json_decode($json, true);

        $rwMap = DB::table('nama_r_w_s')->pluck('id', 'nama_rw')->toArray();

        foreach ($data as $item) {
            DB::table('p_u_s_alasan_tidak_k_b_s')->insert([
                'id_rw' => $rwMap[trim($item['RW'])] ?? null,
                'jumlah_pus_bukan_peserta_kb'                => (int) $item['JUMLAH PUS BUKAN PESERTA KB'],
                'ingin_hamil_anak'                           => (int) $item[' INGIN HAMIL/ANAK'],
                'tidak_tahu_tentang_kb'                      => (int) $item['TIDAK TAHU TENTANG KB'],
                'alasan_kesehatan'                           => (int) $item['ALASAN KESEHATAN'],
                'efek_samping_kegagalan_kb'                  => (int) $item['EFEK SAMPING / KEGAGALAN KB'],
                'tempat_pelayanan_jauh'                      => (int) $item['TEMPAT PELAYANAN JAUH'],
                'alat_obat_cara_kb_tidak_tersedia'           => (int) $item['ALAT/OBAT/ CARA KB TIDAK TERSEDIA'],
                'biaya_mahal'                                => (int) $item['BIAYA MAHAL'],
                'tidak_ada_alat_cara_kb_yang_cocok'          => (int) $item['TIDAK ADA ALAT/OBAT/ CARA KB YANG COCOK'],
                'suami_keluarga_menolak'                     => (int) $item['SUAMI/KELUARGA MENOLAK'],
                'alasan_agama'                               => (int) $item['ALASAN AGAMA'],
                'tidak_ada_petugas_pelayanan_kb'             => (int) $item['TIDAK ADA PETUGAS PELAYANAN KB'],
                'baru_melahirkan'                            => (int) $item['BARU MELAHIRKAN'],
                'jarang_melakukan_hubungan_suami_istri'      => (int) $item['JARANG MELAKUKAN HUBUNGAN SUAMI ISTRI'],
                'infertilitas_menopause'                     => (int) $item['INFERTILITAS / MENOPAUSE'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

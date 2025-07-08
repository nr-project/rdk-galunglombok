@extends('layouts.master')

@section('content')
    <!-- Page-content -->
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Data Kuantitas Penduduk</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Data Kuantitas Penduduk</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Jumlah individu laki-laki dalam keluarga menurut kelompok umur
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Jumlah individu laki-laki dalam keluarga menurut kelompok umur</h6>
                        <div class="shrink-0">

                        </div>
                    </div>
                    <br>
                    <table id="alternativePagination" class="display" style="width:100%">
                        <thead>
                            <tr>
                              <th rowspan="2" class="text-center align-middle">KODE</th>
                              <th rowspan="2" class="text-center align-middle">RW</th>
                              <th rowspan="2" class="text-center align-middle">JUMLAH INDIVIDU DALAM KELUARGA</th>
                              <th colspan="2" class="text-center">TIDAK / BELUM SEKOLAH</th>
                              <th colspan="2" class="text-center">TIDAK TAMAT SD/SEDERAJAT</th>
                              <th colspan="2" class="text-center">TAMAT SD/SEDERAJAT</th>
                              <th colspan="2" class="text-center">TAMAT SLTP/SEDERAJAT</th>
                              <th colspan="2" class="text-center">TAMAT SLTA/SEDERAJAT</th>
                              <th colspan="2" class="text-center">TAMAT PT/AKADEMI</th>
                            </tr>
                            <tr>
                              <th class="text-center">JUMLAH</th>
                              <th class="text-center">%</th>
                              <th class="text-center">JUMLAH</th>
                              <th class="text-center">%</th>
                              <th class="text-center">JUMLAH</th>
                              <th class="text-center">%</th>
                              <th class="text-center">JUMLAH</th>
                              <th class="text-center">%</th>
                              <th class="text-center">JUMLAH</th>
                              <th class="text-center">%</th>
                              <th class="text-center">JUMLAH</th>
                              <th class="text-center">%</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $row)
                              <tr>
                                <td class="text-center">{{ $row->kode }}</td>
                                <td class="text-center">{{ $row->rw }}</td>
                                <td class="text-center">{{ $row->jumlah_individu }}</td>

                                <td class="text-center">{{ $row->tidak_sekolah_jumlah }}</td>
                                <td class="text-center">{{ number_format(($row->tidak_sekolah_jumlah / $row->jumlah_individu) * 100, 2) }}%</td>

                                <td class="text-center">{{ $row->tidak_tamat_sd_jumlah }}</td>
                                <td class="text-center">{{ number_format(($row->tidak_tamat_sd_jumlah / $row->jumlah_individu) * 100, 2) }}%</td>

                                <td class="text-center">{{ $row->tamat_sd_jumlah }}</td>
                                <td class="text-center">{{ number_format(($row->tamat_sd_jumlah / $row->jumlah_individu) * 100, 2) }}%</td>

                                <td class="text-center">{{ $row->tamat_sltp_jumlah }}</td>
                                <td class="text-center">{{ number_format(($row->tamat_sltp_jumlah / $row->jumlah_individu) * 100, 2) }}%</td>

                                <td class="text-center">{{ $row->tamat_slta_jumlah }}</td>
                                <td class="text-center">{{ number_format(($row->tamat_slta_jumlah / $row->jumlah_individu) * 100, 2) }}%</td>

                                <td class="text-center">{{ $row->tamat_pt_akademi_jumlah }}</td>
                                <td class="text-center">{{ number_format(($row->tamat_pt_akademi_jumlah / $row->jumlah_individu) * 100, 2) }}%</td>
                              </tr>
                            @endforeach

                            <tr class="table-primary fw-bold">
                              <td colspan="2" class="text-center">JUMLAH TOTAL</td>
                              <td class="text-center">{{ $totals->jumlah_individu }}</td>
                              <td class="text-center">{{ $totals->tidak_sekolah_jumlah }}</td>
                              <td class="text-center">{{ number_format(($totals->tidak_sekolah_jumlah / $totals->jumlah_individu) * 100, 2) }}%</td>
                              <td class="text-center">{{ $totals->tidak_tamat_sd_jumlah }}</td>
                              <td class="text-center">{{ number_format(($totals->tidak_tamat_sd_jumlah / $totals->jumlah_individu) * 100, 2) }}%</td>
                              <td class="text-center">{{ $totals->tamat_sd_jumlah }}</td>
                              <td class="text-center">{{ number_format(($totals->tamat_sd_jumlah / $totals->jumlah_individu) * 100, 2) }}%</td>
                              <td class="text-center">{{ $totals->tamat_sltp_jumlah }}</td>
                              <td class="text-center">{{ number_format(($totals->tamat_sltp_jumlah / $totals->jumlah_individu) * 100, 2) }}%</td>
                              <td class="text-center">{{ $totals->tamat_slta_jumlah }}</td>
                              <td class="text-center">{{ number_format(($totals->tamat_slta_jumlah / $totals->jumlah_individu) * 100, 2) }}%</td>
                              <td class="text-center">{{ $totals->tamat_pt_akademi_jumlah }}</td>
                              <td class="text-center">{{ number_format(($totals->tamat_pt_akademi_jumlah / $totals->jumlah_individu) * 100, 2) }}%</td>
                            </tr>
                          </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

@endsection

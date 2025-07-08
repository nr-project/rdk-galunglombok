@extends('layouts.master')

@section('content')
    <!-- Page-content -->
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Data Kualitas Penduduk</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">Data Kualitas Penduduk</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Jumlah individu dalam keluarga menurut jenis kegiatan
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Jumlah individu dalam keluarga menurut jenis kegiatan</h6>
                        <div class="shrink-0">

                        </div>
                    </div>
                    <br>
                    <table id="alternativePagination" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle">RW</th>
                                <th rowspan="2" class="text-center align-middle">JUMLAH INDIVIDU <br> DALAM KELUARGA <br> UMUR &lt; 10 TAHUN</th>

                                <th colspan="2" class="text-center">BEKERJA <br>(UMUR &lt; 10 TAHUN)</th>

                                <th rowspan="2" class="text-center align-middle">JUMLAH INDIVIDU <br>DALAM KELUARGA <br>UMUR 10-14 TAHUN</th>

                                <th colspan="2" class="text-center">BEKERJA <br>(UMUR 10-14 TAHUN)</th>

                                <th rowspan="2" class="text-center align-middle">JUMLAH INDIVIDU <br>DALAM KELUARGA <br>UMUR 15+ TAHUN</th>

                                <th colspan="2" class="text-center">BEKERJA <br>(UMUR 15+ TAHUN)</th>

                                <th colspan="2" class="text-center">JUMLAH BEKERJA</th>

                                <th colspan="2" class="text-center">TIDAK BEKERJA</th>

                                <th rowspan="2" class="text-center align-middle">JUMLAH <br>TIDAK <br>BEKERJA</th>
                            </tr>
                            <tr>
                                <th class="text-center">JUMLAH</th>
                                <th class="text-center">%</th>

                                <th class="text-center">JUMLAH</th>
                                <th class="text-center">%</th>

                                <th class="text-center">LAKI-LAKI</th>
                                <th class="text-center">PEREMPUAN</th>

                                <th class="text-center">JUMLAH</th>
                                <th class="text-center">%</th>

                                <th class="text-center">LAKI-LAKI</th>
                                <th class="text-center">PEREMPUAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenisKegiatans as $item)
                                <tr>
                                    <td>{{ $item->nama_rw }}</td>
                                    <td class="text-center">{{ $item->umur_lt_10 }}</td>

                                    <td class="text-center">{{ $item->kerja_lt_10_jumlah }}</td>
                                    <td class="text-center">{{ $item->kerja_lt_10_persen }}</td>

                                    <td class="text-center">{{ $item->umur_10_14 }}</td>

                                    <td class="text-center">{{ $item->kerja_10_14_jumlah }}</td>
                                    <td class="text-center">{{ $item->kerja_10_14_persen }}</td>

                                    <td class="text-center">{{ $item->umur_15_plus }}</td>

                                    <td class="text-center">{{ $item->kerja_15_laki }}</td>
                                    <td class="text-center">{{ $item->kerja_15_perempuan }}</td>

                                    <td class="text-center">{{ $item->jumlah_bekerja }}</td>
                                    <td class="text-center">{{ $item->jumlah_bekerja_persen }}</td>

                                    <td class="text-center">{{ $item->tidak_bekerja_laki }}</td>
                                    <td class="text-center">{{ $item->tidak_bekerja_perempuan }}</td>

                                    <td class="text-center">{{ $item->jumlah_tidak_bekerja }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-primary font-weight-bold">
                            <tr style="text-align: center;">
                                <td colspan="1" class="text-left">Jumlah Total</td>
                                <td class="text-center">{{ $total['umur_lt_10'] }}</td>
                                <td class="text-center">{{ $total['kerja_lt_10_jumlah'] }}</td>
                                <td class="text-center">{{ $total['kerja_lt_10_persen'] }}</td>
                                <td class="text-center">{{ $total['umur_10_14'] }}</td>
                                <td class="text-center">{{ $total['kerja_10_14_jumlah'] }}</td>
                                <td class="text-center">{{ $total['kerja_10_14_persen'] }}</td>
                                <td class="text-center">{{ $total['umur_15_plus'] }}</td>
                                <td class="text-center">{{ $total['kerja_15_laki'] }}</td>
                                <td class="text-center">{{ $total['kerja_15_perempuan'] }}</td>
                                <td class="text-center">{{ $total['jumlah_bekerja'] }}</td>
                                <td class="text-center">{{ $total['jumlah_bekerja_persen'] }}</td>
                                <td class="text-center">{{ $total['tidak_bekerja_laki'] }}</td>
                                <td class="text-center">{{ $total['tidak_bekerja_perempuan'] }}</td>
                                <td class="text-center">{{ $total['jumlah_tidak_bekerja'] }}</td>
                            </tr>
                        </tfoot>


                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

@endsection

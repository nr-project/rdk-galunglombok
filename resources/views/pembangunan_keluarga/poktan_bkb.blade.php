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
                    <table id="alternativePagination" class="display table table-bordered" style="width:100%">
                        <thead>
                                <th rowspan="2" class="text-center align-middle">RW</th>
                                <th rowspan="2" class="text-center align-middle">JUMLAH KELUARGA SASARAN BKB</th>
                                <th colspan="2" class="text-center">KELUARGA IKUT BKB</th>
                                <th rowspan="2" class="text-center align-middle">STATUS BUKAN PUS</th>
                                <th colspan="8" class="text-center">KELUARGA IKUT BKB MENURUT STATUS PUS DAN KESERTAAN BER-KB</th>
                                <th rowspan="2" class="text-center align-middle">BER-KB CARA TRADISIONAL</th>
                                <th rowspan="2" class="text-center align-middle">TIDAK BER-KB</th>
                            </tr>
                                <th class="text-center">JUMLAH</th>
                                <th class="text-center">%</th>
                                <th class="text-center">MOW</th>
                                <th class="text-center">MOP</th>
                                <th class="text-center">IUD</th>
                                <th class="text-center">IMPLAN</th>
                                <th class="text-center">SUNTIK</th>
                                <th class="text-center">PIL</th>
                                <th class="text-center">KONDOM</th>
                                <th class="text-center">MAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kesertaanBKB as $item)
                            <tr>
                                <td>{{ $item->nama_rw }}</td>
                                <td class="text-center">{{ $item->jumlah_keluarga }}</td>
                                <td class="text-center">{{ $item->jumlah_ikut }}</td>
                                <td class="text-center">{{ number_format(($item->jumlah_keluarga > 0) ? ($item->jumlah_ikut / $item->jumlah_keluarga) * 100 : 0, 2) }}%</td>
                                <td class="text-center">{{ $item->status_bukan_pus }}</td>
                                <td class="text-center">{{ $item->mow }}</td>
                                <td class="text-center">{{ $item->mop }}</td>
                                <td class="text-center">{{ $item->iud }}</td>
                                <td class="text-center">{{ $item->implan }}</td>
                                <td class="text-center">{{ $item->suntik }}</td>
                                <td class="text-center">{{ $item->pil }}</td>
                                <td class="text-center">{{ $item->kondom }}</td>
                                <td class="text-center">{{ $item->mal }}</td>
                                <td class="text-center">{{ $item->tradisional }}</td>
                                <td class="text-center">{{ $item->tidak_berkb }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                                <th>JUMLAH TOTAL</th>
                                <th class="text-center">{{ $total['jumlah_keluarga'] }}</th>
                                <th class="text-center">{{ $total['jumlah_ikut'] }}</th>
                                <th class="text-center">{{ number_format(($total['jumlah_keluarga'] > 0) ? ($total['jumlah_ikut'] / $total['jumlah_keluarga']) * 100 : 0, 2) }}%</th>
                                <th class="text-center">{{ $total['status_bukan_pus'] }}</th>
                                <th class="text-center">{{ $total['mow'] }}</th>
                                <th class="text-center">{{ $total['mop'] }}</th>
                                <th class="text-center">{{ $total['iud'] }}</th>
                                <th class="text-center">{{ $total['implan'] }}</th>
                                <th class="text-center">{{ $total['suntik'] }}</th>
                                <th class="text-center">{{ $total['pil'] }}</th>
                                <th class="text-center">{{ $total['kondom'] }}</th>
                                <th class="text-center">{{ $total['mal'] }}</th>
                                <th class="text-center">{{ $total['tradisional'] }}</th>
                                <th class="text-center">{{ $total['tidak_berkb'] }}</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

@endsection

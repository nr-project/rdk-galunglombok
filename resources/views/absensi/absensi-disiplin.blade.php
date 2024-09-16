@extends('layouts.master')

<style>
    /* Memberi warna latar belakang untuk baris genap */
    #alternativePagination tr:nth-child(even) {
        background-color: #f2f2f2; /* Warna latar belakang untuk baris genap */
    }

    /* Opsional: memberi warna latar belakang untuk baris ganjil */
    #alternativePagination tr:nth-child(odd) {
        background-color: #ffffff; /* Warna latar belakang untuk baris ganjil */
    }
</style>

@section('content')
    <!-- Page-content -->
    <div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">Rekap Kedisiplinan</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="#!" class="text-slate-400 dark:text-zink-200">SDM BKKBN Sulbar</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        Rekap Kedisiplinan
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Rekap Kedisiplinan</h6>
                        <div class="shrink-0">
                            <!-- Tombol Refresh -->
                            <form action="{{ route('refresh-harian-disiplin') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                                    <span class="align-middle">Refresh Data</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <table id="alternativePagination" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No.</th>
                                <th class="text-center align-middle" hidden>>NIP</th>
                                <th class="text-center align-middle">Nama Pegawai</th>
                                <th class="text-center align-middle">Telat <br> (Menit)</th>
                                <th class="text-center align-middle">Pulang Cepat <br> (Menit)</th>
                                <th class="text-center align-middle">Absen Sekali <br> (Menit)</th>
                                <th class="text-center align-middle">Tanpa Keterangan <br> (Hari) </th>
                                <th class="text-center align-middle">Telat Disanggah <br> (Menit)</th>
                                <th class="text-center align-middle">Pulang Cepat <br>Disanggah <br> (Menit)</th> 
                                <th class="text-center align-middle">Total <br> (Hari)</th>                                   
                            </tr>
                        </thead>
                        <tbody>
                            @if (!is_null($data))
                                @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="align-middle" hidden>{{ isset($item->nip) ? $item->nip : '' }}</td>
                                    <td class="text-left align-middle">{{ isset($item->pegawais->nama) ? $item->pegawais->nama : '' }}</td>
                                    <td class="text-center align-middle">{{ isset($item->telat_menit) ? $item->telat_menit : '' }}</td>
                                    <td class="text-center align-middle">{{ isset($item->pc_menit) ? $item->pc_menit : '' }}</td>
                                    <td class="text-center align-middle">{{ isset($item->a1_menit) ? $item->a1_menit : '' }}</td>
                                    <td class="text-center align-middle">{{ isset($item->tk_hari) ? $item->tk_hari : '' }}</td>
                                    <td class="text-center align-middle">{{ isset($item->telat_sanggah) ? $item->telat_sanggah : '' }}</td>
                                    <td class="text-center align-middle">{{ isset($item->pc_sanggah) ? $item->pc_sanggah : '' }}</td>
                                    <td class="text-center align-middle">{{ isset($item->total) ? $item->total : '' }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

@endsection

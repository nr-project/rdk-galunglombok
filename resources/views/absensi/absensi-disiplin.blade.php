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

    .bg-warning {
        background-color: #ffff99; /* Kuning pudar */
    }

    .bg-danger-1 {
        background-color: #ffff00; /* Kuning cerah */
    }

    .bg-danger-2 {
        background-color: #ffcc00; /* Kuning tua */
    }

    .bg-danger-3 {
        background-color: #ff9900; /* Kuning lebih kuat */
    }

    .bg-danger-4 {
        background-color: #ff6666; /* Oranye muda */
    }

    .bg-danger-5 {
        background-color: #ff3333; /* Oranye */
    }

    .bg-danger-6 {
        background-color: #ff0000; /* Merah */
    }

    .bg-danger-7 {
        background-color: #cc0000; /* Merah tua */
    }

    .bg-danger-8 {
        background-color: #990000; /* Merah lebih tua */
    }

    .bg-danger-9 {
        background-color: #330000; /* Merah hampir hitam */
        color: white; /* Teks putih untuk keterbacaan */
    }

    .text-white {
        color: white; /* Mengubah warna teks menjadi putih */
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
                                <th class="text-center align-middle">Tanpa <br> Keterangan <br> (Hari) </th>
                                <th class="text-center align-middle">Telat <br> Disanggah <br> (Menit)</th>
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
                                    <td class="text-center align-middle 
                                        @if (isset($item->total))
                                            @if ($item->total >= 1 && $item->total <= 2)
                                                bg-warning
                                            @elseif ($item->total == 3)
                                                bg-danger-1
                                            @elseif ($item->total >= 4 && $item->total <= 6)
                                                bg-danger-2
                                            @elseif ($item->total >= 7 && $item->total <= 10)
                                                bg-danger-3
                                            @elseif ($item->total >= 11 && $item->total <= 13)
                                                bg-danger-4
                                            @elseif ($item->total >= 14 && $item->total <= 16)
                                                bg-danger-5
                                            @elseif ($item->total >= 17 && $item->total <= 20)
                                                bg-danger-6
                                            @elseif ($item->total >= 21 && $item->total <= 24)
                                                bg-danger-7
                                            @elseif ($item->total >= 25 && $item->total <= 27)
                                                bg-danger-8
                                            @elseif ($item->total >= 28)
                                                bg-danger-9 text-white
                                            @endif
                                        @endif
                                    ">
                                    {{ isset($item->total) ? $item->total : '' }}
                                </td>
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

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
                        Jumlah individu perempuan dalam keluarga menurut kelompok umur
                    </li>
                </ul>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="flex items-center">
                        <h6 class="text-15 grow">Jumlah individu perempuan dalam keluarga menurut kelompok umur</h6>
                        <div class="shrink-0">

                        </div>
                    </div>
                    <br>
                    <table id="alternativePagination" class="display" style="width:100%">
                        <thead>
                            <tr>
                              <th rowspan="2" class="text-center align-middle">RW</th>
                              <th rowspan="2" class="text-center align-middle">JUMLAH INDIVIDU<br>DALAM KELUARGA</th>
                              <th colspan="17" class="text-center align-middle">KELOMPOK UMUR</th>
                            </tr>
                            <tr>
                              <th class="text-center">0 - 1</th>
                              <th class="text-center">2 - 4</th>
                              <th class="text-center">5 - 9</th>
                              <th class="text-center">10 - 14</th>
                              <th class="text-center">15 - 19</th>
                              <th class="text-center">20 - 24</th>
                              <th class="text-center">25 - 29</th>
                              <th class="text-center">30 - 34</th>
                              <th class="text-center">35 - 39</th>
                              <th class="text-center">40 - 44</th>
                              <th class="text-center">45 - 49</th>
                              <th class="text-center">50 - 54</th>
                              <th class="text-center">55 - 59</th>
                              <th class="text-center">60 - 64</th>
                              <th class="text-center">65 - 69</th>
                              <th class="text-center">70 - 74</th>
                              <th class="text-center">75+</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $total = [
                                    'jumlah_individu' => 0,
                                    'umur_0_1' => 0, 'umur_2_4' => 0, 'umur_5_9' => 0, 'umur_10_14' => 0,
                                    'umur_15_19' => 0, 'umur_20_24' => 0, 'umur_25_29' => 0, 'umur_30_34' => 0,
                                    'umur_35_39' => 0, 'umur_40_44' => 0, 'umur_45_49' => 0, 'umur_50_54' => 0,
                                    'umur_55_59' => 0, 'umur_60_64' => 0, 'umur_65_69' => 0, 'umur_70_74' => 0,
                                    'umur_75' => 0,
                                ];
                            @endphp

                            @foreach ($rws as $rw)
                                <tr>
                                    <td>{{ $rw->nama_rw ?? '-' }}</td>
                                    <td class="text-center">{{ $rw->total_individu }}</td>

                                    @php
                                        $ageGroups = [
                                            'umur_0_1', 'umur_2_4', 'umur_5_9', 'umur_10_14', 'umur_15_19', 'umur_20_24',
                                            'umur_25_29', 'umur_30_34', 'umur_35_39', 'umur_40_44', 'umur_45_49', 'umur_50_54',
                                            'umur_55_59', 'umur_60_64', 'umur_65_69', 'umur_70_74', 'umur_75'
                                        ];
                                    @endphp

                                    @foreach ($ageGroups as $group)
                                        @php
                                            $value = $rw->kelompok ? $rw->kelompok->$group : 0;
                                            $total[$group] += $value;
                                        @endphp
                                        <td class="text-center">{{ $value }}</td>
                                    @endforeach

                                    @php
                                        $total['jumlah_individu'] += $rw->total_individu;
                                    @endphp
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-primary text-center font-weight-bold">
                            <tr>
                                <td >Jumlah Total</td>
                                <td class="text-center ">{{ $total['jumlah_individu'] }}</td>
                                <td class="text-center">{{ $total['umur_0_1'] }}</td>
                                <td class="text-center">{{ $total['umur_2_4'] }}</td>
                                <td class="text-center">{{ $total['umur_5_9'] }}</td>
                                <td class="text-center">{{ $total['umur_10_14'] }}</td>
                                <td class="text-center">{{ $total['umur_15_19'] }}</td>
                                <td class="text-center">{{ $total['umur_20_24'] }}</td>
                                <td class="text-center">{{ $total['umur_25_29'] }}</td>
                                <td class="text-center">{{ $total['umur_30_34'] }}</td>
                                <td class="text-center">{{ $total['umur_35_39'] }}</td>
                                <td class="text-center">{{ $total['umur_40_44'] }}</td>
                                <td class="text-center">{{ $total['umur_45_49'] }}</td>
                                <td class="text-center">{{ $total['umur_50_54'] }}</td>
                                <td class="text-center">{{ $total['umur_55_59'] }}</td>
                                <td class="text-center">{{ $total['umur_60_64'] }}</td>
                                <td class="text-center">{{ $total['umur_65_69'] }}</td>
                                <td class="text-center">{{ $total['umur_70_74'] }}</td>
                                <td class="text-center">{{ $total['umur_75'] }}</td>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

@endsection

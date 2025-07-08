@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Indeks Kelompok Umur Berdasarkan RW</h1>

    <div class="mb-3">
        <label for="pilihTabel" class="form-label">Pilih Jenis Kelompok Umur:</label>
        <select id="pilihTabel" class="form-select">
            <option value="total" selected>Kelompok Umur Total</option>
            <option value="lk">Kelompok Umur Laki-Laki</option>
            <option value="pr">Kelompok Umur Perempuan</option>
        </select>
    </div>

    {{-- Tabel Total --}}
    <table id="tabelTotal" class="table table-bordered">
        <thead>
            <tr>
                <th>RW</th>
                <th>0-1 Tahun</th>
                <th>1-4 Tahun</th>
                <th>5-9 Tahun</th>
                <th>10-14 Tahun</th>
                <th>15-19 Tahun</th>
                <th>20-24 Tahun</th>
                <th>25-29 Tahun</th>
                <th>30-44 Tahun</th>
                <th>45-59 Tahun</th>
                <th>60-74 Tahun</th>
                <th>75+ Tahun</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rws as $rw)
            <tr>
                <td>{{ $rw->nama_rw }}</td>
                <td>{{ $rw->kelompok_total->umur_0_1 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_1_4 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_5_9 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_10_14 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_15_19 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_20_24 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_25_29 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_30_44 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_45_59 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_60_74 ?? 0 }}</td>
                <td>{{ $rw->kelompok_total->umur_75 ?? 0 }}</td>
                <td>{{ $rw->total_individu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tabel Laki-Laki --}}
    <table id="tabelLk" class="table table-bordered" style="display: none;">
        <thead>
            <tr>
                <th>RW</th>
                <th>0-1 Tahun</th>
                <th>1-4 Tahun</th>
                <th>5-9 Tahun</th>
                <th>10-14 Tahun</th>
                <th>15-19 Tahun</th>
                <th>20-24 Tahun</th>
                <th>25-29 Tahun</th>
                <th>30-44 Tahun</th>
                <th>45-59 Tahun</th>
                <th>60-74 Tahun</th>
                <th>75+ Tahun</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rws as $rw)
            <tr>
                <td>{{ $rw->nama_rw }}</td>
                <td>{{ $rw->kelompok_lk->umur_0_1 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_1_4 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_5_9 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_10_14 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_15_19 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_20_24 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_25_29 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_30_44 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_45_59 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_60_74 ?? 0 }}</td>
                <td>{{ $rw->kelompok_lk->umur_75 ?? 0 }}</td>
                <td>{{ $rw->total_individu_lk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Tabel Perempuan --}}
    <table id="tabelPr" class="table table-bordered" style="display: none;">
        <thead>
            <tr>
                <th>RW</th>
                <th>0-1 Tahun</th>
                <th>1-4 Tahun</th>
                <th>5-9 Tahun</th>
                <th>10-14 Tahun</th>
                <th>15-19 Tahun</th>
                <th>20-24 Tahun</th>
                <th>25-29 Tahun</th>
                <th>30-44 Tahun</th>
                <th>45-59 Tahun</th>
                <th>60-74 Tahun</th>
                <th>75+ Tahun</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rws as $rw)
            <tr>
                <td>{{ $rw->nama_rw }}</td>
                <td>{{ $rw->kelompok_pr->umur_0_1 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_1_4 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_5_9 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_10_14 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_15_19 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_20_24 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_25_29 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_30_44 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_45_59 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_60_74 ?? 0 }}</td>
                <td>{{ $rw->kelompok_pr->umur_75 ?? 0 }}</td>
                <td>{{ $rw->total_individu_pr }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('pilihTabel').addEventListener('change', function() {
        var value = this.value;

        document.getElementById('tabelTotal').style.display = (value === 'total') ? 'table' : 'none';
        document.getElementById('tabelLk').style.display = (value === 'lk') ? 'table' : 'none';
        document.getElementById('tabelPr').style.display = (value === 'pr') ? 'table' : 'none';
    });
</script>
@endsection

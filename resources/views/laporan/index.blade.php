@extends('dashboard.navbar')
@section('content')
<!DOCTYPE html>
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Pengaduan Masyarakat</h4>
            <!-- <h6><a target="_blank"
                    href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a> -->
        </h5>
    </center>
    <a href="cetak" class="btn btn-inverse">Cetak</a>
    <br>
    <br>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>NIK</th>
                <th>Isi Laporan</th>
                <th width="19%">Foto</th>
                <th>Status</th>
               
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($pengaduan as $p)
            <tr>
                <td>{{ $i+0 }}</td>
                <td>{{ $p->tgl_pengaduan }}</td>
                <td>{{ $p->user->nik ??'' }}</td>
                <td>{{ $p->isi_laporan }}</td>
                <td><img src="{{ asset('image/'. $p->foto) }}" height="50%" width="50%" alt=""></td>
                <td>{{ $p->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
        </div>
    </div>
</div>

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <title>Pengaduan Masyarakat Print</title>
</head>
<body>
    <h3 style="text-align: center;"><strong>Data Pengaduan Masyarakat</strong></h3>
    <br>
    <table border="1" width="100%" height="25%" style="text-align: center;">
        <thead class="table-info">
            <th>No</th>
            <th>Tanggal Pengaduan</th>
            <th>Nik</th>
            <th>Isi Laporan</th>
            <th>Foto</th>
            <th>Status</th>
        </thead>
        <tbody>
        @foreach($pengaduan as $i => $p)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $p->tgl_pengaduan }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->isi_laporan }}</td>
                <td><img src="{{ asset('image/'. $p->foto) }}" height="50%" width="50%" alt=""></td>
                <td> @if ($p->status == 'pending')
                    <span class="badge bg-danger">{{ $p->status }}</span>
                    @elseif ($p->status == 'proses')
                    <span class="badge bg-warning">{{ $p->status }}</span>
                    @else
                    <span class="badge bg-success">{{ $p->status }}</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>

  <script type="text/javascript">
            window.print();
        </script> 

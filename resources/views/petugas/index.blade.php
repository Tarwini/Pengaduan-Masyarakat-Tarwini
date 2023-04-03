@extends('dashboard.navbar')
@section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Level</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($petugas as $i => $p)
                            <tr>
                              
                                <td>{{ $i+1 }}</td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->telp }}</td>
                                <td>{{ $p->level }}</td>
                                <td>
                                    <a href="/petugas/hapus/{{ $p->id_pengaduan }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
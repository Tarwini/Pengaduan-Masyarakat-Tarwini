
@extends('dashboard.navbar')
@section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                @if (auth()->user()->level == 'masyarakat')
                    <a href="/pengaduan/create" class="btn btn-inverse">Ajukan Pengaduan Baru</a>
                    <br/>
                    <br/>
                    @endif
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>NIK</th>
                                <th>Isi Laporan</th>
                                <th width="19%">Foto</th>
                                <th>Status</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $i => $p)
                            <tr>
                              
                                <td>{{ $i+1 }}</td>
                                <td>{{ $p->tgl_pengaduan }}</td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->isi_laporan }}</td>
                                <td><img src="{{ asset('image/'. $p->foto) }}" height="50%" width="50%" alt=""></td>
                                        <td>
                                            @if ($p->status == '0')
                                                <a href="#" class="">Pending</a>
                                            @elseif ($p->status == 'proses')
                                                <a href="#" class="">Proses</a>
                                            @else
                                                <a href="#" class="">Selesai</a>
                                            @endif
                                        </td>
                                
                                <td>
                                    <a href="/pengaduan/hapus/{{ $p->id_pengaduan }}" class="btn btn-danger">Hapus</a>
                                    @if (auth()->user()->level == 'masyarakat')
                                    <a href="/pengaduan/detail/{{ $p->id_pengaduan }}" class="btn btn-success">Detail</a>
                                    @endif
                                    @if (auth()->user()->level == 'petugas' || auth()->user()->level == 'admin')
                                    <a href="/pengaduan/detail/{{ $p->id_pengaduan }}" class="btn btn-success">Tanggapi</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection

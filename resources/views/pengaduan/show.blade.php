@extends('dashboard.navbar')
@section('content')
<!doctype html> 
                <div class="card-body">
                    <a href="/pengaduan" class="btn btn-inverse">Kembali</a>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-center">
                                        Pengaduan Masyarakat
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table">
                                        <tbody>
                                            <tr>
                                                <th>Tanggal Pengaduan</th>
                                                <td>:</td>
                                                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                            </tr>
                                            <br>
                                            <br>
                                            <th>Foto</th>
                                            <td>:</td>
                                            <br>
                                            <tr>
                                                <td><img src="{{ asset('image/'. $pengaduan->foto) }}" height="50%" width="50%" alt=""></td>
                                            </tr>
                                            <br>
                                            <br>
                                            <tr>
                                                <th>Isi Laporan</th>
                                                <td>:</td>
                                                <td>{{ $pengaduan->isi_laporan }}</td>
                                            </tr>
                                            <br>
                                            <br>
                                            <tr>
                                                <th>Tanggal Tanggapan</th>
                                                <td>:</td>
                                                <td>{{ $tanggapan->tgl_tanggapan ?? '-' }}</td>
                                            </tr>
                                            <br>
                                            <br>
                                            <tr>
                                                <th>Tanggapan</th>
                                                <td>:</td>
                                                <td>{{ $tanggapan->tanggapan ?? '-' }}</td>
                                            </tr>
                                            <br>
                                            <br>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>  
                                                    @if ($pengaduan->status == '0')
                                                        <a href="#" class="badge badge-label-primary">Pending</a>
                                                    @elseif ($pengaduan->status == 'proses')
                                                        <a href="#" class="badge badge-label-warning">Proses</a>
                                                    @else
                                                        <a href="#" class="badge badge-label-success">Selesai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </div>
                                </div>
                            </div>
</div>
@if (auth()->user()->level == 'petugas' || auth()->user()->level == 'admin')
<div class="col-lg-6 col-12">
    <div class="card">
        <div class="card-header">
            <div class="text-center">
                Tanggapi
            </div>
        </div>
        <div class="card-body">
        <div class="d-flex justify-content-between">
                                    <form action="{{ route('tanggapan')}}" method="post">
                                        @csrf
                                        <input value="{{$pengaduan->id_pengaduan}}" name="id_pengaduan" hidden>
                                        <select name="status" class="form-control">
                                            <option value="0" @if($pengaduan->status == 0) selected @endif>Pending</option>
                                            <option value="proses" @if($pengaduan->status == "proses") selected @endif>Proses</option>
                                            <option value="selesai" @if($pengaduan->status == "selesai") selected @endif>Selesai</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">           
                                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_pengaduan" class="form-control" placeholder="">
                                                <label>Tanggapan</label>
                                                <br>
                                            </div>
                                            <textarea name="tanggapan" rows="5" class="form-control" placeholder="Isi Tanggapan"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="btn btn-inverse" type="submit">Save</button>
                                </form>
                                </div>
        </div>
    </div>
</div>
@endif
@endsection


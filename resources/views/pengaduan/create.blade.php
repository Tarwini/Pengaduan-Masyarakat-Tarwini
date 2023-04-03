@extends('dashboard.navbar')
@section('content')
<!doctype html>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH DATA PENGADUAN</strong><a href="https://www.malasngoding.com/category/laravel" target="_blank"></a>
                </div>
                <div class="card-body">
                    <a href="/pengaduan" class="btn btn-inverse">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/pengaduan/store" enctype="multipart/form-data">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl_pengaduan" class="form-control" placeholder="">
 
                            @if($errors->has('tgl_pengaduan'))
                                <div class="text-danger">
                                    {{ $errors->first('tgl_pengaduan')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="">
 
                            @if($errors->has('nik'))
                                <div class="text-danger">
                                    {{ $errors->first('nik')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Isi Laporan</label>
                            <textarea name="isi_laporan" class="form-control" placeholder=""></textarea>
 
                             @if($errors->has('isi_laporan'))
                                <div class="text-danger">
                                    {{ $errors->first('isi_laporan')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control" placeholder="">
 
                            @if($errors->has('foto'))
                                <div class="text-danger">
                                    {{ $errors->first('foto')}}
                                </div>                      
                        </div>

                            @endif
 
                        </div>

                        

 
                        </div>
 
 
                        <div class="form-group">
                            <input type="submit"  a href="/pengaduan" class="btn btn-inverse " value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>

@endsection

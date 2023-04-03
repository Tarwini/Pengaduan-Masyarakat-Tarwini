@extends('dashboard.navbar')
@section('content')
<!doctype html>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH DATA PETUGAS</strong><a href="https://www.malasngoding.com/category/laravel" target="_blank"></a>
                </div>
                <div class="card-body">
                    <a href="/petugas" class="btn btn-inverse">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/petugas/store" enctype="multipart/form-data">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>Nik</label>
                            <input type="number" name="nik" class="form-control" placeholder="">
 
                            @if($errors->has('nik'))
                                <div class="text-danger">
                                    {{ $errors->first('nik')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="">
 
                            @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="">
 
                            @if($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="">
 
                            @if($errors->has('password'))
                                <div class="text-danger">
                                    {{ $errors->first('password')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="number" name="telp" class="form-control" placeholder="">
 
                            @if($errors->has('telp'))
                                <div class="text-danger">
                                    {{ $errors->first('telp')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                                        <label for="jenkel" class="mb-2">Jenis Kelamin </label> <br>
                                        <input type="radio" name="jenkel" value="laki-laki" checked>  Laki-Laki
                                        <input type="radio" name="jenkel" value="perempuan">  Perempuan
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" placeholder=""></textarea>
 
                             @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                            @endif
 
                        </div>

                        <div class="form-group">
                            <label>Rt</label>
                            <input type="number" name="rt" class="form-control" placeholder="">
 
                            @if($errors->has('rt'))
                                <div class="text-danger">
                                    {{ $errors->first('rt')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" class="form-control" id="rw" name="rw">
                                            </div>
                                        </div>
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="number" name="kode_pos" class="form-control" placeholder="">
 
                            @if($errors->has('kode_pos'))
                                <div class="text-danger">
                                    {{ $errors->first('kode_pos')}}
                                </div>
                            @endif
 
                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Provinsi</label>
                                        <select name="province_id" id="provinsi" class="form-select">
                                        <option selected>-Pilih Provinsi-</option>
                                            @foreach($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                        <select name="regency_id" id="kabupaten"  class="form-select">
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <select name="district_id" id="kecamatan"  class="form-select">
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="desa" class="form-label">Desa</label>
                                        <select name="village_id" id="desa"  class="form-select">
                                            </select>
                                    </div>

                        <div class="form-group">
                            <input type="submit"  a href="/petugas" class="btn btn-inverse " value="Simpan">
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>
    <script>
    $(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
      });

      $(function() {
        $('#province_id').on('change', function() {
          let province_id = $('#province_id').val();

          console.log(province_id);

          $.ajax({
            type: 'POST',
            url: "{{ route('getKota') }}",
            data: {
              province_id: province_id
            },
            cache: false,

            success: function(message) {
              $('#regency_id').html(message);
              $('#district_id').html('');
              $('#village_id').html('');
            },
            error: function(data) {
              console.log(`Error on ${data}`);
            }
          });
        });

        $('#regency_id').on('change', function() {
          let regency_id = $('#regency_id').val();
          $.ajax({
            type: 'POST',
            url: "{{ route('getKecamatan') }}",
            data: {
              regency_id: regency_id
            },
            cache: false,

            success: function(message) {
              $('#district_id').html(message);
              $('#village_id').html('');
            },

            error: function(data) {
              console.log(`Error on ${data}`);
            }
          });
        });

        $('#district_id').on('change', function() {
          let district_id = $('#district_id').val();
          $.ajax({
            type: 'POST',
            url: "{{ route('getDesa') }}",
            data: {
              district_id: district_id
            },
            cache: false,

            success: function(message) {
              $('#village_id').html(message);
            },
            error: function(data) {
              console.log(`Error on ${data}`);
            }

          })
        })
      })
    });
  </script>

@endsection

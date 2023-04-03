<meta name="csrf-token" content="{{ csrf_token() }}"/>

                           <div class="card card-primary">
                                    <div class="card-header"><h2 class="text-center">Registrasi</h2></div>

                                    <div class="card-body">
                                    <form action="register" method="post">
                                        @csrf
                                        <div class="form-group col-6">
                                            <label for="last_name">NIK</label>
                                            <input id="nik" type="text" class="form-control" name="nik">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Nama</label>
                                            <input id="name" type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Email</label>
                                            <input id="email" type="text" class="form-control" name="email">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Password</label>
                                            <input id="password" type="text" class="form-control" name="password">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Telepon</label>
                                            <input id="telp" type="text" class="form-control" name="telp">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Jenis Kelamin</label>
                                            <input name="jenkel"></input>
                                            <!-- <select class="form-control">
                                            <option name="jenkel" value="laki-laki" selected>Laki-Laki</option>
                                            <option name="jenkel" value="perempuan" selected>Perempuan</option>
                                            </select> -->
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Level</label>
                                            <select name="level" class="form-control">
                                            <option name="level" value="admin" selected>Admin</option>
                                            <option name="level" value="masyarakat" selected>Masyarakat</option>
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="form-group col-12">
                                            <h4 class="text">Alamat</h5>
                                        <div class="form-group col-6">
                                          <textarea name="" id="" cols="30" rows="10">asd</textarea>
                                        <input id="alamat" type="text-area" class="form-control" name="alamat">
                                          </div>                
                                                    <div class="form-group">
                                                        <div class="mb-3">
                                                            <label for="provinsi">Provinsi</label>
                                                            <select name="province_id" class="form-control" id="province_id">
                                                                <option value="">-- Pilih Provinsi --</option>
                                                                @foreach ($provinces as $province)
                                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('province_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                            </div>
                                                        <div class="form-group">
                                                            <label for="regencies">Kota</label>
                                                            <select class="form-control @error('regency_id') is-invalid @enderror" id="regency_id" name="regency_id" required>
                                                                
                                                                
                                                            </select>
                                                            @error('regency_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="districts">Kecamatan</label>
                                                            <select class="form-control @error('district_id') is-invalid @enderror" id="district_id" name="district_id" required>
                                                            
                                                                
                                                            </select>
                                                            @error('district_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                                </div>
                                                        <div class="form-group">
                                                            <label for="villages">Desa/Kelurahan</label>
                                                            <select class="form-control @error('village_id') is-invalid @enderror" id="village_id" name="village_id" required>
                                                                
                                                                
                                                            </select>
                                                            @error('village_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                    </div>
                                                            @enderror
                                                            </div>
                                                            <div class="form-group col-6">
                                                            <label for="last_name">Rt</label>
                                                            <input id="rt" type="text" class="form-control" name="rt">
                                                        </div>

                                                            <div class="form-group col-6">
                                                            <label for="last_name">Rw</label>
                                                            <input id="rw" type="text" class="form-control" name="rw">
                                                        </div>

                                                            <div class="form-group col-6">
                                                            <label for="last_name">Kode Pos</label>
                                                            <input id="kode_pos" type="text" class="form-control" name="kode_pos">
                                                        </div>
                                                        
                                        
                                                            </form>
                                                        </div>
                                        <button type="submit">submit</button>
                                    </form>
                                                         </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </div>

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

<meta name="csrf-token" content="{{ csrf_token() }}"/>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>
    <!-- Pre-loader end -->
   
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" action="{{ route('register') }}" method="post">
                            @csrf
                         
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Daftarkan Diri Anda</h3>
                                    </div>
                                </div>
                                
                                <hr/>
                                <div class="input-group">
                                    <input type="number" class="form-control" cols="67" placeholder="nik" name="nik">
                                    <span class="md-line"></span>
                             
                                    <input type="text" class="form-control" placeholder="nama" name="nama">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="email"  name="email">
                                    <span class="md-line"></span>
                               
                                    <input type="password" class="form-control" placeholder="password"  name="password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="telp"  name="telp">
                                    <span class="md-line"></span>
                                  <select name="jenkel" class="form-control" placeholder="Jenis Kelamin">
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                  </select>                  
                                </div>

                                <div class="input-group">
                              
                                    <input type="number" class="form-control" placeholder="kode pos"  name="kode_pos">
                                    <span class="md-line"></span>
                                </div>
                               
                                <div class="form-group col-12">
                                    <h4 class="text">Alamat</h5>
                                  <div class="form-group col-6">
                                    <textarea name="alamat" id="alamat" cols="67" rows="7"></textarea>
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
                                                    <div class="form-group">
                                                      <label for="last_name">RT</label>
                                                      <input id="rt" type="number" class="form-control" name="rt">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="last_name">RW</label>
                                                      <input id="rw" type="number" class="form-control" name="rw">
                                                    </div>        
                                    <div class="row m-t-25 text-left">
                                    <div class="col-md-12">                                  
                                    </div>                              
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Login</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                <div class="col-sm-8 col-xs-12 forgot-phone text-left">
                                        <div class="text-right text-inverse">Sudah Punya Akun?</a>
                                            <a href="logins" class="text-right f-w-600 text-inverse">Kembali</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->

	
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

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
</html>

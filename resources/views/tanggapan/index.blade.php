@if (auth()->user()->level == 'admin' || auth()->user()->level == 'petugas' )
@extends('dashboard.navbar')
@section('content')
<!DOCTYPE html>
<body>

<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">
 
    <div class="layout-page">
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        Tanggapan
                    </div>
                    <div class="card-body">
                        <br/>
                        <br/>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Tanggal tanggapan</th>
                                    <th>Tanggapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tanggapan as $p)
                                <tr>
                                    <td>{{ $p->tgl_tanggapan }}</td>
                                    <td>{{ $p->tanggapan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <div class="content-backdrop fade"></div>
        </div>
     
      </div>
     
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
    
</div>
</body>

</html>
@endsection
@endif

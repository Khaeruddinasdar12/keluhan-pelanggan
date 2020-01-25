<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Angelica Keluhan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
</head>
<body  >
	<div class="container col-md-8" style="background-color: #F4F6F9">
		<div class="jumbotron ">
  <h1 class="display-4">Komentar, Saran, Keluhan!</h1>
  <hr>
<p>Alamat : jln. perintis kemerdekaan km.7 | Email : angelica@gmail.com | No. Telp : 4444(0481)</p>
</div>

	<div class="card card-body">
	<div class="row">
          <div class="col-md-6">

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Data Diri Anda</h3>
              </div>
              <div class="card-body">
              	<form action="{{route('input.komentar')}}" method="POST" id="add-comment">
                <!-- Date dd/mm/yyyy -->
                @csrf
                <div class="form-group">
                  <label>Nama Lengkap : </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nama">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">

                  <label>Email : </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>No. Hp : </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control" name="nohp">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- phone mask -->
                <div class="form-group">
                  <label>Alamat : </label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="alamat">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <label>Jenis Kelamin : </label>
                <div class="row">
                	<div class="col-md-6">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary1" name="jkel" value="L" checked>
                        <label for="radioPrimary1">Laki-laki</label>
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="radioPrimary2" name="jkel" value="P">
                        <label for="radioPrimary2">Perempuan</label>
                      </div>
                      </div>
                  </div>
                <!-- </div> -->
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <!-- </div> -->
          <!-- /.col (left) -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Komentar, Saran, Keluhan</h3>
              </div>
              <div class="card-body">
                <!-- Date range -->
                <div class="form-group">
                  <label>Bagian</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-list-alt"></i>
                      </span>
                    </div>
                    <select class="form-control" name="departmen_id">
                    	<option selected="" disabled="">Pilih bagian/departmen</option>
                    	@foreach($data as $datas)
                    	<option value="{{$datas->id}}">{{$datas->nama}}</option>
                    	@endforeach
                    </select>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date and time range -->
                <div class="form-group">
                  <label>Pesan Anda</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-comment"></i></span>
                    </div>
                    <textarea rows="10" class="form-control" name="pesan"></textarea>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- <div class="form-group">
		          <button type="reset" class="btn btn-secondary float-left"><i class="nav-icon fas fa-sync-alt"></i> Reset</button>
		          <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-plus"></i> Tambah</button>
              
		        </div>
		        </form> -->
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col (right) -->
          <hr class="my-4">
          <div class="col-md-12">
          <button type="reset" class="btn btn-secondary float-left"><i class="nav-icon fas fa-sync-alt"></i> Reset</button>
		          <button type="submit" class="btn btn-success float-right"><i class="nav-icon fas fa-plus"></i> Tambah</button>
		          </div>
		      </form>
        </div>
        </div>
        
        <br>
        <br>
        <br>
        </div>
</body>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript">
	$('#add-comment').submit(function(e){
      e.preventDefault();
    
    var request = new FormData(this);
    var endpoint= '{{route("input.komentar")}}';
          $.ajax({
            url: endpoint,
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            // dataType: "json",
            success:function(data){
              $('#add-comment')[0].reset();
             
              berhasil(data.status, data.pesan);
            },
            error: function(xhr, status, error){
                var error = xhr.responseJSON; 
                if ($.isEmptyObject(error) == false) {
                  $.each(error.errors, function(key, value) {
                    gagal(key, value);
                  });
                }
                } 
            }); 
    });

       function berhasil(status, pesan) {
      Swal.fire({
        type: status,
        title: pesan,
        showConfirmButton: true,
        button: "Ok"
    })
  }

  function gagal(key, pesan) {
      Swal.fire({
        type: 'error',
        title:  key + ' : ' + pesan,
        showConfirmButton: true,
        button: "Ok"
    })
  }
</script>
</html>
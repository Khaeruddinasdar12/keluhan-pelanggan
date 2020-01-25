@extends('layouts.template')

@section('title')
Komentar Terbaca
@endsection

@section('badge')
{{$belum}}
@endsection

@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

 <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Riwayat Komentar</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive-sm">
              <table id="tabel_komentar" class="table table-bordered table-striped" style="width:100% !important; ">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- MODAL -->
      <!-- Modal Detail -->
      <div class="modal fade bd-example-modal-xl" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Konten -->
        <div class="row">
        <div class="col-md-6">
        <table>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td id="nama">7308090408990001</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td id="email">Khaeruddin Asdar</td>
          </tr>
          <tr>
            <td>No. Hp</td>
            <td>:</td>
            <td id="nohp">khaeruddinasdar12@gmail.com</td>
          </tr>
          <tr>
            <td><b>Bidang</b></td>
            <td>:</td>
            <td id="bidang">khaeruddinasdar</td>
          </tr>
        </table>
        </div>

        <div class="col-md-6">
        <table>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td id="alamat">22/10/2000</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td id="jkel">khaeruddinasdar</td>
          </tr>
          <tr>
            <td>Waktu</td>
            <td>:</td>
            <td id="waktu">khaeruddinasdar</td>
          </tr>
        </table>
        </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <label>Pesan</label>
            <textarea class="form-control" rows="3" disabled="" id="keluhan"></textarea> 
            </div>
        </div>
        </div>
        <!-- End Konten -->
      </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
      </div>
  </div>
</div>
      <!-- End Modal Detail -->
<!-- END MODALS -->
@endsection

@section('js')
<script type="text/javascript">

function hapus() {
  $('body').on('click', '#del_id', function(e){
      e.preventDefault();
      Swal.fire({
        title: 'Anda Yakin ?',
        text: "Anda tidak dapat mengembalikan data yang telah di hapus!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Lanjutkan Hapus!',
        timer: 6500
      }).then((result) => {
          if (result.value) {
            var me = $(this),
                url = me.attr('href'),
                token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                  url: url,
                  method: "POST",
                  data : {
                    '_method' : 'DELETE',
                    '_token'  : token
                  },
                  success:function(data){
                    berhasil(data.status, data.pesan);
                    $('#tabel_komentar').DataTable().ajax.reload();
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
        }
      });
    });
}

function detail() {
  $(document).on('click', '#detail', function(){
    var detail_id = $(this).attr('data-id');
    console.log(detail_id);
    $.ajax({
      'url': $(this).attr('href'),
      'dataType': 'json',
      success:function(html){
        console.log(html);
        $('#nama').html(html.nama);
        $('#email').html(html.email);
        $('#nohp').html(html.nohp);
        $('#jkel').html(html.jkel);
        $('#alamat').html(html.alamat);
        $('#waktu').html(html.waktu);
        $('#bidang').html("<b>"+html.bidang+"</b>");
        $('#keluhan').html(html.pesan);
        $('#modal-detail').modal('show');
      }

    })
});
}


tabel = $(document).ready(function(){
    $('#tabel_komentar').DataTable({
        "processing": true,
        "serverSide": true,
        "deferRender": true,
        "ordering": true,
        // "scrollX" : true,
        "order": [[ 0, 'desc' ]],
        "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]],
        "ajax":  {
                "url":  '{{route("table.komentar_terbaca")}}', // URL file untuk proses select datanya
                "type": "GET"
              },
        "columns": [
            { data: 'DT_RowIndex', name:'DT_RowIndex'},
            { "data": "nama" },
            { "data": "email" },
            { "data": "action" }
        ]
    });
});
</script>
@endsection
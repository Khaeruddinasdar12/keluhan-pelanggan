@extends('layouts.template')

@section('title')
Komentar Belum Terbaca
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
              <h3 class="card-title">Komentar Yang Belum Dibaca</h3>
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
                  <th>No.</th>
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

        <br>
        <h3>Balas Pesan</h3>
        <div class="row">
          <div class="col-md-12">
          <div class="row">
          <div class="col-md-6">
          <form action="{{route('feedback')}}" method="POST" id="form-reply">
          @csrf
        <div class="form-group">
        <label for="exampleInputEmail1">Kepada : </label>
        <input class="form-control" id="modal-email-view" disabled>
        <input type="hidden" name="email" id="modal-email">
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
        <label for="exampleInputEmail1">Judul : </label>
        <input value="Terima Kasih Telah Berkomentar" class="form-control" name="judul">
        <input type="hidden" id="id" name="id">
        <input name="_method" type="hidden" value="PUT">
      </div>
      </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Pesan : </label>
        <textarea rows="5" name="pesan" class="form-control">Terima kasih telah berkomentar, kami akan meninjau Bidang yang Anda komentari sesuai dengan pesan Anda</textarea>
      </div>
      </div>
        </div>
        <!-- End Konten -->
      </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Kirim Email</button>
      </div>
      </div>
    </form>
  </div>
</div>
      <!-- End Modal Detail -->
<!-- END MODALS -->
@endsection

@section('js')
<script type="text/javascript">
// $('#balas_komentar').on('show.bs.modal', function (event) {
//     var button = $(event.relatedTarget) // Button that triggered the modal
//     var email = button.data('email')
//     var modal = $(this)
//     modal.find('#modal-email').val(email)
//     modal.find('#modal-email-view').val(email)
//     // modal.find('#form-reply').attr('action', rute)
//   })

function berhasil(status, pesan) {
      Swal.fire({
        type: status,
        title: pesan,
        showConfirmButton: true,
        button: "Ok"
    })
} 

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
        $('#id').val(html.id);
        $('#nama').html(html.nama);
        $('#email').html(html.email);
        $('#modal-email').val(html.email);
        $('#modal-email-view').val(html.email);
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
                "url":  '{{route("table.komentar_belumterbaca")}}', // URL file untuk proses select datanya
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
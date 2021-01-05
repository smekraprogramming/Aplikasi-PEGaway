<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <?=$title;?>
                </h2>
                <ul class="header-dropdown m-r--5">
                <button type="button" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Tambah Status GTK</button>
                <a href="javascript:void(0);" type="button" class="btn btn-danger waves-effect m-r-20" onclick="reset_gtk()">Reset GTK</a>

                </ul>
            </div>
            <div class="body">
            <form id="form-upload" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" class="form-control" name="uploadFile" id="uploadFile">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <!-- <button type="button" class="btn btn-primary btn-lg m-l-15 waves-effect">Upload File</button> -->
                            <input type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect" name="submit" value="Upload Data">
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Status</th>
                                <th>Data Login</th>
                                <th>is active</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Status</th>
                                <th>Data Login</th>
                                <th>is active</th>
                                <th></th>

                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->
<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>


<!-- Default Size -->
<div class="modal fade" id="modal-reset-token" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-reset-token">Reset Token</h4>
            </div>
             <form class="form-horizontal" id="form-reset-token">
            <div class="modal-body">
                 
                                 <div class="row clearfix font-bold col-orange">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama GTK</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" id="nama_gtk" class="form-control" placeholder="Nama GTK" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix ">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Username</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Token</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="token" name="token" class="form-control" placeholder="Enter Token">
                                                <input type="hidden" name="user_id" id="user_id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-lg btn-success waves-effect">SAVE CHANGES</button>
                <button type="button" class="btn btn-lg btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
             </form>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function () {
    var table;
    //datatables
    table = $('#sample_1').DataTable({ 

        "processing": true, 
        "serverSide": true, 
        "order": [], 
    
        "ajax": {
            "url": "<?php echo site_url('gtk/ajax_list_gtk')?>",
            "type": "POST",
        },
        "dom": 'lBfrtip',
        "pageLength": 10, 
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

});

function reload() {
      $("#sample_1").dataTable().api().ajax.reload( null, false );
}

  $("#form-upload").on('submit',function (e) {
      e.preventDefault();
    //   $('body').preloader();
      var formData = new FormData(this);
      $.ajax({
          method: "POST",
          contentType:false,
          catch:false,
          processData:false,
          data:formData,
          url: "<?php echo site_url('gtk/uploadData') ?>",
      })
      .done(function( msg ) {
        //   console.log(msg);
        //   $('body').preloader('remove');
          if (msg=='error') {
            //   toastr.error('File Tidak Sesuai, Harap cek file dahulu !');
              Swal.fire(
                  'Gagal Upload !',
                  'File tidak bisa di import, Harap Cek File Dahulu !',
                  'error'
                )
          }else{
              Swal.fire(
                  'Berhasil !',
                  'Data Siswa Berhasil di masukan !',
                  'success'
                )
              $("#form-upload")[0].reset();
              reload();
          }
          return false;
      })
      .fail(function(jqXHR,textStatus,error) {
          alert(error);
          console.log(jqXHR.responseText);
      });
              
  });

  function reset_gtk() {
    Swal.fire({
      title: 'Anda Yakin ingin mereset data pegawai ini ?',
      text: "Data akan dihapus secara permanen !",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {

      if (result.value) {

        $.ajax({
          method: "POST",
          url: "<?=site_url('gtk/reset_gtk') ?>",
        })
          .done(function(data) {
            // console.log(data)
            if (data=='success') {
               Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                reload();
            }else{
                alert('problem in the server');
            }
          });       
      }
    })
  }


//   $("#form-upload-foto").on('submit',function (e) {
//       e.preventDefault();
//       $('body').preloader();
//       var formData = new FormData(this);
//       $.ajax({
//           method: "POST",
//           contentType:false,
//           catch:false,
//           processData:false,
//           data:formData,
//           url: "<?php echo site_url('gtk/uploadFoto') ?>",
//       })
//       .done(function( msg ) {
//         $('body').preloader('remove');
//           if (msg=='error') {
//               toastr.error('File Tidak Sesuai, Harap cek file dahulu !');
//           }else{
//               Swal.fire(
//                   'Berhasil !',
//                   'Foto GTK Berhasil di masukan !',
//                   'success'
//                 )
//               $("#form-upload-foto")[0].reset();
//               reload();
//           }
//           return false;
//       })
//       .fail(function(jqXHR,textStatus,error) {
//           alert(error);
//           console.log(jqXHR.responseText);
//       });
              
//   });

//   function nonaktifkan(id) {
//     Swal.fire({
//       title: 'Anda Yakin ingin menghapus data siswa ini ?',
//       text: "Data akan dihapus secara permanen !",
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Yes, delete it!'
//     }).then((result) => {

//       if (result.value) {

//         $.ajax({
//             method: "POST",
//             data:{id : id},
//             url: "<?php echo site_url('gtk/hapus_siswa') ?>",
//           })
//           .done(function( data ) {
//             if (data=='success') {
//                 Swal.fire(
//                   'Deleted!',
//                   'Your file has been deleted.',
//                   'success'
//                 )
//                 reload();
//             }else{
//                 alert('problem in the server');
//             }    
//           })
//           .fail(function(jqXHR,textStatus,error) {
//               alert(error);
//               console.log(jqXHR.responseText);
//           });      
//       }
//     })
//   }


  function reset_token(id) {

     $.ajax({
        method: "POST",
        data:{id : id},
        dataType:"JSON",
        url: "<?php echo site_url('gtk/get_usertoken') ?>",
      })
      .done(function( data ) {
    //   console.log(data.username);
        $('#nama_gtk').val(data.nama);
        $('#username').val(data.username);
        $('#token').val(data.token);
        $('#user_id').val(id);
         $("#modal-reset-token").modal("show");
      })
      .fail(function(jqXHR,textStatus,error) {
          alert(error);
          console.log(jqXHR.responseText);
      });      
   
       
  }
  
$("#form-reset-token").on('submit',function (e) {
      e.preventDefault();

      var formData = new FormData(this);
      $.ajax({
          method: "POST",
          contentType:false,
          catch:false,
          processData:false,
          data:formData,
          url: "<?php echo site_url('gtk/update_token') ?>",
      })
      .done(function( msg ) {

         if (msg=='error') {
            //   toastr.error('File Tidak Sesuai, Harap cek file dahulu !');
              Swal.fire(
                  'Gagal Update Token !',
                  'error'
                )
          }else{
              Swal.fire(
                  'Berhasil Update Token!',
                  'success'
                )
              $("#form-reset-token")[0].reset();
               $("#modal-reset-token").modal("hide");
              reload();
          return false;
          }
      })
      .fail(function(jqXHR,textStatus,error) {
          alert(error);
          console.log(jqXHR.responseText);
      });
              
  });
  
</script>
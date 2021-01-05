  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/printThis/css/normalize.css"> -->
  <!-- <link rel="stylesheet" href="<?=base_url()?>/assets/plugins/printThis/css/skeleton.css"> -->
<div class="container-fluid">
 <!-- Inline Layout | With Floating Label -->
 <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        <strong class="col-pink"> Laporan Harian Absensi Guru dan Tenaga Kependidikan</strong> 
                        <small>Tips : Pilih tanggal yang ingin di lihat !</small>
                    </h2>
                </div>
                <div class="body">
                    <form id="lap-form">
                        <div class="row clearfix">
                            <div class="col-xs-8">
                                <h2 class="card-inside-title">Pilih Tanggal</h2>
                                <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Mulai tanggal...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <button type="reset" class="btn btn-danger btn-lg m-l-15 waves-effect">Reset</button>
                                <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Filter</button>
                                <button type="button" id="cetak" class="btn btn-warning btn-lg m-l-15 waves-effect">Cetak Laporan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Inline Layout | With Floating Label -->

    <div class="row clearfix" id="lap-view">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            
        </div>
    </div>


</div>

<!-- Default Size -->
<div class="modal fade" id="modal-edit-absen" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-edit-absen">Edit Absen</h4>
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

<script type="text/javascript" src="<?=base_url()?>/assets/plugins/printThis/js/printThis.js"></script>

<script>
    $(function () {
        //Textarea auto growth

        //Bootstrap datepicker plugin
        $('#bs_datepicker_container input').datepicker({
            autoclose: true,
            container: '#bs_datepicker_container'
        });

        $('#bs_datepicker_component_container').datepicker({
            autoclose: true,
            container: '#bs_datepicker_component_container',
            format: 'yyyy/mm/dd'

        });
        //
        $('#bs_datepicker_range_container').datepicker({
            autoclose: true,
            container: '#bs_datepicker_range_container',
            format: 'yyyy/mm/dd'

        });
    });

    $("#lap-form").on('submit',function(e) {
        e.preventDefault();
        // console.log('tes') 
        var str = $('#start_date').val();
        // var end = $('#end_date').val();
        // console.log(str+end);
        var formData = new FormData(this);

        Swal.fire({
        title: 'Anda yakin ingin lihat laporan  ?',
        text: "Mulai tanggal "+ str +" ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Lihat Laporan!'
        }).then((result) => {

            if (result.value) {

                $.ajax({
                method: "POST",
                contentType:false,
                catch:false,
                processData:false,
                data:formData,
                url: "<?=site_url('kepala_sekolah/show_laporan_harian') ?>",
                })
                .done(function(data) {
                    console.log(data)
                    $('#lap-view').html(data);
                    // if (data=='success') {
                    // Swal.fire(
                    //     'Berhasil !',
                    //     'Data Absen berhasil disimpan !',
                    //     'success'
                    //     );
                    // $('#defaultModal').modal('hide');
                    // detail_data();
                    // }else{
                    //     alert('problem in the server');
                    // }
                });       
            }
        })
    });

    $('#cetak').on("click", function () {
      $('#lap-view').printThis({
        debug: false,
        importStyle: true,
        removeInline :false ,         // hapus gaya sebaris dari elemen cetak 
        removeInlineSelector : "" ,   // pemilih khusus untuk memfilter gaya sebaris. removeInline harus benar 

        });
    });


    function edit_absen(id) {

// $.ajax({
//    method: "POST",
//    data:{id : id},
//    dataType:"JSON",
//    url: "<?=site_url('laporan/get_data_edit') ?>",
//  })
//  .done(function( data ) {
// //   console.log(data.username);
//    $('#nama_gtk').val(data.nama);
//    $('#username').val(data.username);
//    $('#token').val(data.token);
//     $("#modal-reset-token").modal("show");
//  })
//  .fail(function(jqXHR,textStatus,error) {
//      alert(error);
//      console.log(jqXHR.responseText);
//  });      

  
}

$("#form-edit-simpan").on('submit',function (e) {
 e.preventDefault();

//  var formData = new FormData(this);
//  $.ajax({
//      method: "POST",
//      contentType:false,
//      catch:false,
//      processData:false,
//      data:formData,
//      url: "https://absensi.smkn2nganjuk.sch.id/gtk/update_token",
//  })
//  .done(function( msg ) {
//    // console.log(msg);
//     if (msg=='error') {
//        //   toastr.error('File Tidak Sesuai, Harap cek file dahulu !');
//          Swal.fire(
//              'Gagal Update Token !',
//              'error'
//            )
//      }else{
//          Swal.fire(
//              'Berhasil Update Token!',
//              'success'
//            )
//          $("#form-reset-token")[0].reset();
//           $("#modal-reset-token").modal("hide");
//          reload();
//      return false;
//      }
//  })
//  .fail(function(jqXHR,textStatus,error) {
//      alert(error);
//      console.log(jqXHR.responseText);
//  });
         
});


</script>
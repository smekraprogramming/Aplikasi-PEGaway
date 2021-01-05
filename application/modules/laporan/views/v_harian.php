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

<!-- Default Size -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-edit-ceklog">Edit Absen</h4>
            </div>
             <form class="form-horizontal" id="form-edit">
            <div class="modal-body">
                 
                                 <div class="row clearfix font-bold col-green">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Check - In</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" id="masuk" name="masuk" class="form-control" placeholder="00:00:00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix font-bold col-green">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jarak Check - In</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="jarak_masuk" name="jarak_masuk" class="form-control" placeholder="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix font-bold col-red">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Check - Out</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line ">
                                                <input type="text" id="pulang" name="pulang" class="form-control" placeholder="00:00:00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix font-bold col-red">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jarak Check-Out</label>
                                    </div>
                                    <div class="col-lg-8 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="jarak_pulang" name="jarak_pulang" class="form-control" placeholder="0">
                                                <input type="hidden" name="idpresensi" id="idpresensi">
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
                url: "<?=site_url('laporan/show_laporan_harian') ?>",
                })
                .done(function(data) {
                    $('#lap-view').html(data);
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



function reset_absen(id) {
// var id
Swal.fire({
        title: 'Anda yakin ingin reset absen pulang ?',
        html: '<strong>Absen Check out akan di kosongkan</strong>',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Reset Check-out !'
        }).then((result) => {

            if (result.value) {

                $.ajax({
                method: "POST",
                data:{id : id},
                url: "<?=site_url('laporan/reset_pulang') ?>",
                })
                .done(function(data) {
                    if (data=='success') {
                    Swal.fire(
                        'Berhasil !',
                        'Reset Check-out berhasil! Silahkan Klik Filter lagi !',
                        'success'
                        );
                    }else{
                        alert('problem in the server');
                    }
                });       
            }
        });
}


function hapus_absen(id) {
// var id
Swal.fire({
        title: 'Anda yakin ingin menghapus absen hari ini ?',
        html: '<strong class="col-red">Data akan di hapus permanen !</strong>',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Reset Check-out !'
        }).then((result) => {

            if (result.value) {

                $.ajax({
                method: "POST",
                data:{id : id},
                url: "<?=site_url('laporan/hapus_absen') ?>",
                })
                .done(function(data) {
                    if (data=='success') {
                    Swal.fire(
                        'Berhasil !',
                        'Hapus Absen berhasil! Silahkan Klik Filter lagi !',
                        'success'
                        );
                    }else{
                        alert('problem in the server');
                    }
                });       
            }
        });
}

  function edit_absen(id) {

     $.ajax({
        method: "POST",
        data:{id : id},
        dataType:"JSON",
        url: "<?php echo site_url('laporan/get_ceklog') ?>",
      })
      .done(function( data ) {
    //   console.log(data);
        $('#masuk').val(data.masuk);
        $('#jarak_masuk').val(data.jarak_masuk);
        $('#pulang').val(data.pulang);
        $('#jarak_pulang').val(data.jarak_pulang);
        $('#idpresensi').val(id);
        $("#modal-edit").modal("show");
      })
      .fail(function(jqXHR,textStatus,error) {
          alert(error);
          console.log(jqXHR.responseText);
      });      
   
       
  }

$("#form-edit").on('submit',function (e) {
 e.preventDefault();

 var formData = new FormData(this);
 $.ajax({
     method: "POST",
     contentType:false,
     catch:false,
     processData:false,
     data:formData,
     url: "<?php echo site_url('laporan/update_absen') ?>",
 })
 .done(function( msg ) {
    // console.log(msg);
    if (msg=='error') {
         Swal.fire(
             'Gagal Edit Absen !',
             'error'
            )
     }else{
         Swal.fire(
             'Berhasil Edit Absen !',
             'Silahkan Klik Filter Lagi !',
             'success'
            )
         $("#form-edit")[0].reset();
          $("#modal-edit").modal("hide");

     return false;
     }
 })
 .fail(function(jqXHR,textStatus,error) {
     alert(error);
     console.log(jqXHR.responseText);
 });
         
});


</script>
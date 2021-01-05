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
                        <strong class="col-pink"> Laporan Absensi Guru dan Tenaga Kependidikan</strong> 
                        <small>Tips : Pilih rentan waktu perminggu</small>
                    </h2>
                </div>
                <div class="body">
                    <form id="lap-form">
                        <div class="row clearfix">
                            <div class="col-xs-8">
                                <h2 class="card-inside-title">Pilih Rentan Tanggal</h2>
                                <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="start_date" id="start_date" placeholder="Mulai tanggal...">
                                    </div>
                                    <span class="input-group-addon">to</span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="end_date" id="end_date" placeholder="Sampai Tanggal...">
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
        var end = $('#end_date').val();
        // console.log(str+end);
        var formData = new FormData(this);

        Swal.fire({
        title: 'Anda yakin ingin lihat laporan  ?',
        text: "Mulai tanggal "+ str +" s.d "+end,
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
                url: "<?=site_url('kepala_sekolah/show_laporan') ?>",
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

</script>
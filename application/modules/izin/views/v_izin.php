<div class="container-fluid">
      <!-- Vertical Layout -->
  <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2><strong><i class="material-icons">description</i> Form Permohonan Izin</strong></h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <?php if (isset($ket_izin)) { ?>
                        <div class="alert alert-danger">
                        <strong>Oopss ! </strong> Anda sudah izin hari ini !.
                    </div>

                    <?php }else{ ?>

                        <form id="form-izin">
                        <label for="email_address">Jenis Izin</label>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longtitude" id="longtitude">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" name="ket" id="ket">
                                    <option value="">-- Pilih Jenis Izin Anda --</option>
                                    <option value="sakit">Sakit</option>
                                    <option value="izin">Kepentingan Pribadi</option>
                                    <option value="cuti">Cuti</option>
                                </select>
                            </div>
                        </div>
                        <label for="file">File Pendukung ( maksimal : 400kb )</label>
                        <br>
                        <small class="font bold col-red">Tips : Jika file terlalu besar, bisa di screenshot !</small>
                        <div class="form-group">
                            <div class="file-loading">
                                <input id="userfile" type="file" name="userfile">
                                
                            </div>
                        </div>
                        <br>
                        <button type="reset" class="btn btn-danger waves-effect">RESET</button>
                        <button type="submit" class="btn btn-primary waves-effect">SIMPAN</button>
                    </form>
                        
                   <?php }?>
 
                   
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Vertical Layout -->
</div>

 <!-- Menyisipkan library Google Maps -->
 <script src="https://maps.googleapis.com/maps/api/js"></script>

<script>
  // When the page has loaded, call the getLocation function
    // Be sure not to use parenthesis after getLocation, or you will
    // call it, instead of passing a reference to it to be called later (callback)
    google.maps.event.addDomListener(window, 'load', getLocation);
    
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(initialize, showError);
        }
        else {
            alert("Geolocation is not supported by this browser.");
        }
    }
    
    function initialize(position) {
        // If you don't use 'var' before a variable, it will be accessible globally,
        // which makes it easier (bad) to overwrite/clobber if you reuse these names elsewhere
        var lat = position.coords.latitude,
            lon = position.coords.longitude;
    
        $('#latitude').val(lat);
        $('#longtitude').val(lon);
    
        // console.log(lat,lon);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unkown error occurred.");
                break;
        }
    }

</script>


<script>
$(document).ready(function() {
    $("#userfile").fileinput({
        browseClass: "btn btn-primary btn-block",
        allowedFileExtensions: ["jpeg", "png", "jpg"],
        showCaption: false,
        showRemove: false,
        showUpload: false,
        maxFileSize: 400,

    });
});

$("#form-izin").on('submit',function(e) {
        e.preventDefault();
        // console.log('tes') 
        var formData = new FormData(this);

        Swal.fire({
        title: 'Anda Yakin ingin izin absen hari ini ?',
        text: "Jika izin anda tidak dapat absen !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Saya Izin !'
        }).then((result) => {

            if (result.value) {

                $.ajax({
                method: "POST",
                contentType:false,
                catch:false,
                processData:false,
                data:formData,
                url: "<?=site_url('izin/simpan_izin') ?>",
                })
                .done(function(data) {
                    // console.log(data)
                    
                    if (data=='success') {
                    Swal.fire(
                        'Berhasil !',
                        'Data Izin berhasil disimpan !',
                        'success'
                        );
                    $("#form-izin")[0].reset();
                    
                    window.setTimeout(function(){
                        // Move to a new location or you can do something else
                        window.location.href = "<?=site_url('dashboard') ?>";
                    }, 2000);

                    }else{
                        alert('problem in the server');
                    }
                });       
            }
        })
    });
</script>

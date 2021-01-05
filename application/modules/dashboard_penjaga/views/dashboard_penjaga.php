<style>
    .btn.disabled {
        pointer-events: none;
    }
</style>

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-4">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="<?=base_url('assets/images/'.$this->session->userdata('logged_in')['foto']);?>" alt="AdminBSB - Profile Image" />
                    </div>
                    <div class="content-area">
                        <h3><?=$this->session->userdata('logged_in')['nama_user']?></h3>
                        <p><?=$this->session->userdata('logged_in')['status_user']?></p>
                        <p><?=tgl_ind(date('Y-m-d'))?></p>
                    </div>
                </div>
                <div class="profile-footer" id="detail-data">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-absen" >
            <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Jam server : <strong class="font-bold col-teal" id="jam-server"></strong></h4>
            <h4 class="modal-title" id="modal-title-2">Lokasi Anda : <strong class="font-bold col-red" id="jarak-anda"></strong><br><strong class="col-pink">( Jika Lokasi tidak sesuai tekan refresh ! )</strong></h4>
            </div>
            <div class="modal-body">
            <div id="map-canvas" style="width:100%;height:350px;"></div>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longtitude" id="longtitude">
            <input type="hidden" name="distance" id="distance">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="reload_page()" class="btn btn-sm btn-primary waves-effect"><i class="material-icons">refresh</i> Refresh </button>
                <button type="submit" class="btn btn-sm btn-success waves-effect"><i class="material-icons">check_circle</i> Simpan </button>
                <button type="button" class="btn btn-sm btn-danger waves-effect" data-dismiss="modal"><i class="material-icons">clear</i>  Batal</button>
            </div>
            </form>
        </div>
    </div>
</div>

 <!-- Menyisipkan library Google Maps -->
 <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=geometry"></script>


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
    
        var p1 = new google.maps.LatLng(-7.611893800000001,111.91327989999999); //sekolah
  
        var p2 = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        var dist = google.maps.geometry.spherical.computeDistanceBetween(p1, p2);
        
        // console.log(Math.round(dist),1);
        document.querySelectorAll('#jarak-anda')[0].innerHTML =" "+numberWithCommas(Math.round(dist,1))+" meter dari Sekolah";
// console.log(Math.round(dist,1));
    
        $('#latitude').val(lat);
        $('#longtitude').val(lon);
        $('#distance').val(Math.round(dist,1));
    
        var mapOptions = {
            center: new google.maps.LatLng(lat, lon),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true
        }

        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lon),
            map: map,
            title: "Posisi Anda !"
        });
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
    
 function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
  

</script>
<script>

    function reload_page() {
        window.location.reload(false); 
    }

    $(document).ready(function(){
        detail_data();
    });

    function detail_data() {
        $.ajax({
        method: "GET",
        // dataType:"JSON",
        url: "<?php echo site_url('dashboard_penjaga/get_detail') ?>",
        })
        .done(function( data ) {    
            // console.log(data);              
            $('#detail-data').html(data);                   
            // $('#check-pulang').html(data.pulang);                   
            // $('#location-in').html(data.latitude_masuk+','+data.longtitude_masuk);                   
            // $('#location-out').html(data.latitude_pulang+','+data.longtitude_pulang);                   

        })
        .fail(function(jqXHR,textStatus,error) {
            alert(error);
            console.log(jqXHR.responseText);
        });
    return false;
    }

    $("#form-absen").on('submit',function(e) {
        e.preventDefault();
        // console.log('tes') 
        var formData = new FormData(this);

        Swal.fire({
        title: 'Anda Yakin ingin absen hari ini ?',
        text: "Pastikan Lokasi Anda Akurat !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Absen Sekarang !'
        }).then((result) => {

            if (result.value) {

                $.ajax({
                method: "POST",
                contentType:false,
                catch:false,
                processData:false,
                data:formData,
                url: "<?=site_url('dashboard_penjaga/simpan_absen') ?>",
                })
                .done(function(data) {
                    // console.log(data)
                    if (data=='success') {
                    Swal.fire(
                        'Berhasil !',
                        'Data Absen berhasil disimpan !',
                        'success'
                        );
                    $('#defaultModal').modal('hide');
                    detail_data();
                    }else{
                        alert('problem in the server');
                    }
                });       
            }
        })
    });
</script>

<script>
        function jam() {
        var time = new Date(),
            hours = time.getHours(),
            minutes = time.getMinutes(),
            seconds = time.getSeconds();
        document.querySelectorAll('#jam-server')[0].innerHTML =" "+ harold(hours) + ":" + harold(minutes) + ":" + harold(seconds) + " WIB";
          
        function harold(standIn) {
            if (standIn < 10) {
              standIn = '0' + standIn
            }
            return standIn;
            }
        }
        setInterval(jam, 1000);
    </script>
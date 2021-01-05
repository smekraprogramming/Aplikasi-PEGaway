<?php 

function succ_msg($value){
  $str = "<script>
            toastr.success('".$value."', 'Sukses Login !');
          </script>";
	return $str;
}

function notif_success($value){
  $str = "<script>
            $.notify({
                	title: '<strong> Hai ".$value."!</strong>',
                	message: 'Bagaimana kabar Anda hari ini ? Semoga hari anda menyenangkan !'
                },{
                	type: 'success'
                });
          </script>";
	return $str;
}

function err_msg($value){
  $str = "<script>
              Swal.fire(
                'Gagal !',
                '".$value."',
                'error'
                );
          </script>";
	return $str;
}


 ?>
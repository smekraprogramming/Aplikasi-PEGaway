<?php 

function uang( $var, $tipe=null, $dec="0" )
{
    if ( empty($var) ) return 0;
    return 'Rp. ' . number_format(str_replace(',','.',$var), $dec,',','.').($dec=="0"?($tipe == true ? ',-' : ",00" ):'');
}

function uang2( $var, $dec="0" )
{
    if ( empty($var) ) return 0;
    return number_format(str_replace(',','.',$var),$dec,',','.');
}

function bulan($bulan)
{
    $aBulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    return $aBulan[$bulan];
}

function hari($hari)
{
    $data  = date('N', strtotime($hari));
    $aHari = ['', 'Senin', 'Selasa','Rabu','Kamis',"Jum'at",'Sabtu','Minggu'];

    return $aHari[$data];
}

function tgl_format($tgl , $format = "")
{
    if ($format == "") {
        $tanggal    = date('d', strtotime($tgl));
        $bulan      = bulan( date('n', strtotime($tgl))-1 );
        $tahun      = date('Y', strtotime($tgl));
        return $tanggal.' '.$bulan.' '.$tahun;
    }elseif ($format == 'd/m/Y') {
        $tanggal    = date('d', strtotime($tgl));
        $bulan      = date('m',strtotime($tgl));
        $tahun      = date('Y', strtotime($tgl));
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }

}

function date_format_indo($tgl,$style=null)
{
    $exp = explode(' ', $tgl);
    $detik      = date('s', strtotime($tgl));
    $menit      = date('i', strtotime($tgl));
    $jam        = date('H', strtotime($tgl));
    $tanggal    = date('d', strtotime($tgl));
    $bulan      = bulan( date('n', strtotime($tgl))-1 );
    $tahun      = date('Y', strtotime($tgl));

    if( empty($exp[1]) ){
        return $tanggal.' '.$bulan.' '.$tahun;
    }else{
        if($style == true){
            return $tanggal.' '.$bulan.' '.$tahun.' '.$jam.':'.$menit.':'.$detik;
        }else{
            return $tanggal.' '.$bulan.' '.$tahun;
        }
    }
}

function bulan_tahun($param){
    $bulan = bulan( date('n', strtotime($param))-1 );
    $tahun = date('Y', strtotime($param));
    return $bulan.' '.$tahun;
}

function date_value($tgl)
{
   $date        = date_format_indo($tgl);
   $date_indo   = explode(' ', $date);

   $hr  = hari($tgl);
   $tg  = Terbilang($date_indo[0]);
   $bln = $date_indo[1];
   $thn = Terbilang($date_indo[2]);

   return $hr . ' tanggal ' . $tg . ' bulan ' . $bln . ' tahun ' . $thn;
}

function bln_thn($tgl, $deli)
{
    $data   = explode($deli, $tgl);
    $x      = (intval($data[0])-1);

    return bulan($x) . ' ' . $data[1];
}

function is_logged_in() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    
    if (!$CI->session->userdata('logged_in')) {
        redirect(site_url('auth'),'refresh');
    }
}

if (! function_exists('getHashedPassword'))
{   
    function getHashedPassword($plainPassword)
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }      
}


if(!function_exists('verifyHashedPassword'))
{
    function verifyHashedPassword($plainPassword, $hashedPassword)
    {
        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }
}

function acak($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sudah_login() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    
    if (!$CI->session->userdata('logged_in')) {
        return false;
    }else{
        return true;
    }
}

function alihkan_login() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    
    if ($CI->session->userdata('logged_in')['role_id'] == 1) {
        redirect('dashboard');
    }elseif ($CI->session->userdata('logged_in')['role_id'] == 4) {
        redirect('home','refresh');
    }elseif ($CI->session->userdata('logged_in')['role_id'] == 6) {
        redirect('makanan','refresh');
    }
}
 
if (! function_exists('generate_kode_bayar'))
{
    function generate_kode_bayar($param = '')
    {
        $CI =& get_instance();

        $year=date('ymd');
        $time=substr(time(), -4);
        $id=$CI->session->userdata('logged_in')['role_id'];
        return $year.$time.$id;
    }
}

    function tgl_ind($date){
 
        // array hari dan bulan
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Februari","Maret","April","Mei","Juni",
                       "Juli","Agustus","September","Oktober","November","Desember");
        
        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date,0,4);
        $bulan = substr($date,5,2);
        $tgl = substr($date,8,2);
        // $waktu = substr($date,11,5);
        $hari = date("w",strtotime($date));
        $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun;
        return $result;
    }
    
        function tgl_ind_lap($date){
 
        // array hari dan bulan
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Jan","Feb","Mar","Apr","Mei","Jun",
                       "Jul","Agt","Sep","Okt","Nov","Des");
        
        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date,0,4);
        $bulan = substr($date,5,2);
        $tgl = substr($date,8,2);
        // $waktu = substr($date,11,5);
        $hari = date("w",strtotime($date));
        $result = $Hari[$hari].", <br>".$tgl."-".$Bulan[(int)$bulan-1]."-".$tahun;
        return $result;
    }

    function tgl_ttd($date){
 
        // array hari dan bulan
        // $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Februari","Maret","April","Mei","Juni",
        "Juli","Agustus","September","Oktober","November","Desember");
        
        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date,0,4);
        $bulan = substr($date,5,2);
        $tgl = substr($date,8,2);
        // $waktu = substr($date,11,5);
        $hari = date("w",strtotime($date));
        $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun;
        return $result;
    }

    function judul_bulan_lap($date){
 
        // array hari dan bulan
        // $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Februari","Maret","April","Mei","Juni",
        "Juli","Agustus","September","Oktober","November","Desember");
        
        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date,0,4);
        $bulan = substr($date,5,2);
        // $tgl = substr($date,8,2);
        // $waktu = substr($date,11,5);
        // $hari = date("w",strtotime($date));
        $result = $Bulan[(int)$bulan-1]." ".$tahun;
        return $result;
    }
 ?>
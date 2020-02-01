<?php 

Class Fungsi {

    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('user_m'); 
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function tgl($tgl = null){
        if ($tgl == null) {
            $tanggal = date('Y-m-d');
        }else{
            $tanggal = $tgl;
        }
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    public function well()
    {
        date_default_timezone_set("Asia/Jakarta");

        $b = time();
        $hour = date("G",$b);

        if ($hour>=0 && $hour<=11){
            echo "Selamat Pagi :)";
        }elseif ($hour >=12 && $hour<=14){
            echo "Selamat Siang :) ";
        }elseif ($hour >=15 && $hour<=17){
            echo "Selamat Sore :) ";
        }elseif ($hour >=17 && $hour<=18){
            echo "Selamat Petang :) ";
        }elseif ($hour >=19 && $hour<=23){
            echo "Selamat Malam :) ";
        }
    }

    function hari(){
        $hari = date('D');
        switch($hari){
            case 'Sun': $hari_ini = "Minggu";break;
            case 'Mon':	$hari_ini = "Senin";break;
            case 'Tue': $hari_ini = "Selasa";break;
            case 'Wed': $hari_ini = "Rabu";break;
            case 'Thu':$hari_ini = "Kamis";break;
            case 'Fri':$hari_ini = "Jumat";break;
            case 'Sat':$hari_ini = "Sabtu";break;
        }
     
        return  $hari_ini;
    }

    function tgl_indo($tgl){
        $tanggal = substr($tgl , 8, 2);
        $bulan = substr($tgl , 5, 2);
        $tahun = substr($tgl , 0, 4);
        return $tanggal."-".$bulan."-".$tahun;
    }

    function pukul($pukul){
        $jam = substr($pukul , 11, 2);
        $menit = substr($pukul , 14, 2);
        $detik = substr($pukul , 17, 2);
        return $jam.":".$menit.":".$detik." WIB";
    }

    function TanggalIndonesia($date) {
        $date = date('Y-m-d',strtotime($date));
        if($date == '0000-00-00')
            return 'Tanggal Kosong';
     
        $tgl = substr($date, 8, 2);
        $bln = substr($date, 5, 2);
        $thn = substr($date, 0, 4);
     
        switch ($bln) {
            case 1 : {
                    $bln = 'Januari';
                }break;
            case 2 : {
                    $bln = 'Februari';
                }break;
            case 3 : {
                    $bln = 'Maret';
                }break;
            case 4 : {
                    $bln = 'April';
                }break;
            case 5 : {
                    $bln = 'Mei';
                }break;
            case 6 : {
                    $bln = "Juni";
                }break;
            case 7 : {
                    $bln = 'Juli';
                }break;
            case 8 : {
                    $bln = 'Agustus';
                }break;
            case 9 : {
                    $bln = 'September';
                }break;
            case 10 : {
                    $bln = 'Oktober';
                }break;
            case 11 : {
                    $bln = 'November';
                }break;
            case 12 : {
                    $bln = 'Desember';
                }break;
            default: {
                    $bln = 'UnKnown';
                }break;
        }
     
        $hari = date('N', strtotime($date));
        switch ($hari) {
            case 0 : {
                    $hari = 'Minggu';
                }break;
            case 1 : {
                    $hari = 'Senin';
                }break;
            case 2 : {
                    $hari = 'Selasa';
                }break;
            case 3 : {
                    $hari = 'Rabu';
                }break;
            case 4 : {
                    $hari = 'Kamis';
                }break;
            case 5 : {
                    $hari = "Jum'at";
                }break;
            case 6 : {
                    $hari = 'Sabtu';
                }break;
            default: {
                    $hari = 'UnKnown';
                }break;
        }
     
        $tanggalIndonesia = $hari.", ".$tgl . " " . $bln . " " . $thn;
        return $tanggalIndonesia;
    }

    function status_user()
    {
        $this->ci->load->model('user_m');
        $user_status = $this->ci->user_m->getNonaktif()->num_rows();
        return $user_status;
    }

    function kode_random()
    {
        $character_set_array = array();
        $character_set_array[] = array('count' => 3, 'characters' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $character_set_array[] = array('count' => 2, 'characters' => '0123456789');
        $temp_array = array();
        foreach ($character_set_array as $character_set) {
            for ($i = 0; $i < $character_set['count']; $i++) {
                $temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
            }
        }
        shuffle($temp_array);
        return implode('', $temp_array);
    }
} 

?>
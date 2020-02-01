<?php 

Class Home {

    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
        $model = array('admin_m','ranting_m','wakaf/wakaf_barang_m','wakaf/wakaf_tanah_m','wakaf/wakaf_uang_m',                 'asset/aset_barang_m','asset/aset_tanah_m');
        $this->ci->load->model($model);
    }

    function user_login(){
        $this->ci->load->model('user_m'); 
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function getAD(){
        $data = $this->ci->admin_m->get()->num_rows();
        return $data;
    }

    function getRN(){
        $data = $this->ci->ranting_m->get_ranting()->num_rows();
        return $data;
    }

    function getWakaf_barang(){
        $data = $this->ci->wakaf_barang_m->get_view()->num_rows();
        return $data;
    }

    function getWakaf_tanah(){
        $data = $this->ci->wakaf_tanah_m->get_view()->num_rows();
        return $data;
    }

    function getWakaf_uang(){
        $data = $this->ci->wakaf_uang_m->get_view()->num_rows();
        return $data;
    }

    function getaset_barang(){
        $data = $this->ci->aset_barang_m->get_view()->num_rows();
        return $data;
    }

    function getaset_tanah(){
        $data = $this->ci->aset_tanah_m->get_view()->num_rows();
        return $data;
    }

    function getAset(){
        $id = $this->user_login()->id_ranting;
        $aset1 = $this->ci->aset_barang_m->get_view($id)->num_rows();
        $aset2 = $this->ci->aset_tanah_m->get_view($id)->num_rows();
        return $data = $aset1 + $aset2;
    }

    function getWakaf(){
        $id = $this->user_login()->id_ranting;
        $wakaf1 = $this->ci->wakaf_barang_m->get_view($id)->num_rows();
        $wakaf2 = $this->ci->wakaf_tanah_m->get_view($id)->num_rows();
        $wakaf3 = $this->ci->wakaf_uang_m->get_view($id)->num_rows();
        return $data = $wakaf1 + $wakaf2 + $wakaf3 ;
    }

}

?>
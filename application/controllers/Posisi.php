<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posisi extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mposisi');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}

	public function index() {
	    $data["judul"] = '<h3>Posisi</h3>';
	    $data["breadcrumb"] = '<h2> Posisi</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/posisi/vposisi";
	    $data["row"] = $this->Mposisi->getposisi("");
	    $this->load->view('template',$data);
	}

	public function formposisi($id = 0) {
	    $data["judul"] = '<h3>Form Posisi</h3>';
	    $data["breadcrumb"] = '<h2>Form  Posisi</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/posisi/vformposisi";
	    $data["row"] = $this->Mposisi->getposisidetail($id);
	    $this->load->view('template',$data);
	}

	public function hapus_posisi($id){
        $message = $this->Mposisi->hapus_posisi($id);
        //$this->session->set_flashdata("message",$message);
        redirect("posisi");
    }

	public function simpan_posisi($action){
        $message = $this->Mposisi->simpan_posisi($action);
       // $this->session->set_flashdata("message",$message);
        redirect("posisi");
    }
}

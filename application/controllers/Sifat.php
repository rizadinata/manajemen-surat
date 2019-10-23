<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sifat extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Msifat');
	    // $this->load->Model('Muser');
	    // if (($this->session->userdata('id_user') == NULL) || ($this->session->userdata('id_level') == NULL) || ($this->session->userdata('email') == NULL))
	    // {
	    //        redirect("login/logout_admin","refresh");
	    // }
	}

	public function index() {
	    $data["judul"] = '<h3>Sifat Disposisi</h3>';
	    $data["breadcrumb"] = '<h2> Sifat Disposisi</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/sifat/vsifat";
	    $data["row"] = $this->Msifat->getsifat("");
	    $this->load->view('template',$data);
	}

	public function formsifat($id = 0) {
	    $data["judul"] = '<h3>Form Sifat Disposisi</h3>';
	    $data["breadcrumb"] = '<h2>Form  Sifat Disposisi</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/sifat/vformsifat";
	    $data["row"] = $this->Msifat->getsifatdetail($id);
	    $this->load->view('template',$data);
	}

	public function hapus_sifat($id){
        $message = $this->Msifat->hapus_sifat($id);
        //$this->session->set_flashdata("message",$message);
        redirect("sifat");
    }

	public function simpan_sifat($action){
        $message = $this->Msifat->simpan_sifat($action);
       // $this->session->set_flashdata("message",$message);
        redirect("sifat");
    }
}

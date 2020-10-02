<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Minstansi');
	    // $this->load->Model('Muser');
	    if (($this->session->userdata('username') == NULL) || ($this->session->userdata('id_role') == NULL) || ($this->session->userdata('nama_user') == NULL))
	    {
	           redirect("login/logout","refresh");
	    }
	}

	public function index() {
	    $data["judul"] = '<h3>Setting Instansi</h3>';
	    $data["breadcrumb"] = '<h2> Setting Instansi</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/instansi/vinstansi";
	    $data["row"] = $this->Minstansi->getinstansidetail();
	    $this->load->view('template',$data);
	}

	// public function formsifat($id = 0) {
	//     $data["judul"] = '<h3>Form Sifat Disposisi</h3>';
	//     $data["breadcrumb"] = '<h2>Form  Sifat Disposisi</h2>';
	//     $data["menu"] = "master";
	//     $data["content"] = "master/sifat/vformsifat";
	//     $data["row"] = $this->Msifat->getsifatdetail($id);
	//     $this->load->view('template',$data);
	// }

	public function hapus_instansi($id){
        $message = $this->Minstansi->hapus_instansi($id);
        $this->session->set_flashdata("message",$message);
        redirect("instansi");
    }

	public function simpan_instansi($action){
        $message = $this->Minstansi->simpan_instansi($action);
        $this->session->set_flashdata("message",$message);
        redirect("instansi");
    }
}

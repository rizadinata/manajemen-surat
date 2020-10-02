<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mklasifikasi');
	    // $this->load->Model('Muser');
	   if (($this->session->userdata('username') == NULL) || ($this->session->userdata('id_role') == NULL) || ($this->session->userdata('nama_user') == NULL))
	    {
	           redirect("login/logout","refresh");
	    }
	}

	public function index() {
	    $data["judul"] = '<h3>Klasifikasi</h3>';
	    $data["breadcrumb"] = '<h2> Klasifikasi</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/klasifikasi/vklasifikasi";
	    $data["row"] = $this->Mklasifikasi->getklasifikasi("");
	    $this->load->view('template',$data);
	}

	public function formklasifikasi($id = 0) {
	    $data["judul"] = '<h3>Form Klasifikasi</h3>';
	    $data["breadcrumb"] = '<h2>Form  Klasifikasi</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/klasifikasi/vformklasifikasi";
	    $data["row"] = $this->Mklasifikasi->getklasifikasidetail($id);
	    $this->load->view('template',$data);
	}

	public function hapus_klasifikasi($id){
        $message = $this->Mklasifikasi->hapus_klasifikasi($id);
        $this->session->set_flashdata("message",$message);
        redirect("klasifikasi");
    }

	public function simpan_klasifikasi($action){
        $message = $this->Mklasifikasi->simpan_klasifikasi($action);
        $this->session->set_flashdata("message",$message);
        redirect("klasifikasi");
    }
}

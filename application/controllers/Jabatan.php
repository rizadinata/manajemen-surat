<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Mjabatan');
	    $this->load->Model('Mposisi');
	    // $this->load->Model('Muser');
	    if (($this->session->userdata('username') == NULL) || ($this->session->userdata('id_role') == NULL) || ($this->session->userdata('nama_user') == NULL))
	    {
	           redirect("login/logout","refresh");
	    }
	}

	public function index() {
	    $data["judul"] = '<h3>Jabatan</h3>';
	    $data["breadcrumb"] = '<h2> Jabatan</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/jabatan/vjabatan";
	    $data["row"] = $this->Mjabatan->getjabatan("");
	    $this->load->view('template',$data);
	}

	public function formjabatan($id = 0) {
	    $data["judul"] = '<h3>Form Jabatan</h3>';
	    $data["breadcrumb"] = '<h2>Form  Jabatan</h2>';
	    $data["menu"] = "master";
	    $data["content"] = "master/jabatan/vformjabatan";
	    $data["posisi"] = $this->Mposisi->getposisi("");
	    $data["row"] = $this->Mjabatan->getjabatandetail($id);
	    $this->load->view('template',$data);
	}

	public function hapus_jabatan($id){
        $message = $this->Mjabatan->hapus_jabatan($id);
        $this->session->set_flashdata("message",$message);
        redirect("jabatan");
    }

	public function simpan_jabatan($action){
        $message = $this->Mjabatan->simpan_jabatan($action);
        $this->session->set_flashdata("message",$message);
        redirect("jabatan");
    }
}
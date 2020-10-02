<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Msuratkeluar');
	    $this->load->Model('Mklasifikasi');
	    // $this->load->Model('Muser');
	    if (($this->session->userdata('username') == NULL) || ($this->session->userdata('id_role') == NULL) || ($this->session->userdata('nama_user') == NULL))
	    {
	           redirect("login/logout","refresh");
	    }
	}

	public function index() {
	    $data["judul"] = '<h3>Surat keluar</h3>';
	    $data["breadcrumb"] = '<h2>Surat keluar</h2>';
	    $data["menu"] = "transaksi";
	    $data["content"] = "transaksi/suratkeluar/vsuratkeluar";
	    $data["row"] = $this->Msuratkeluar->getsuratkeluar("");
	    $this->load->view('template',$data);
	}

	public function formsuratkeluar($id = 0) {
	    $data["judul"] = '<h3>Form Surat keluar</h3>';
	    $data["breadcrumb"] = '<h2>Form Surat keluar</h2>';
	    $data["menu"] = "transaksi";
	    $data["content"] = "transaksi/suratkeluar/vformsuratkeluar";
	    $data["row"] = $this->Msuratkeluar->getsuratkeluardetail($id);
	    $data["klasifikasi"] = $this->Mklasifikasi->getklasifikasi("");
	    $this->load->view('template',$data);
	}

	public function hapus_suratkeluar($id){
        $message = $this->Msuratkeluar->hapus_suratkeluar($id);
        $this->session->set_flashdata("message",$message);
        redirect("suratkeluar");
    }

	public function simpan_suratkeluar($action){
        $message = $this->Msuratkeluar->simpan_suratkeluar($action);
        $this->session->set_flashdata("message",$message);
        redirect("suratkeluar");
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Msuratmasuk');
	    $this->load->Model('Mklasifikasi');
	    $this->load->Model('Msifat');
	    // $this->load->Model('Muser');
	    if (($this->session->userdata('username') == NULL) || ($this->session->userdata('id_role') == NULL) || ($this->session->userdata('nama_user') == NULL))
	    {
	           redirect("login/logout","refresh");
	    }
	}

	public function index() {
	    $data["judul"] = '<h3>Surat masuk</h3>';
	    $data["breadcrumb"] = '<h2>Surat masuk</h2>';
	    $data["menu"] = "transaksi";
	    $data["content"] = "transaksi/suratmasuk/vsuratmasuk";
	    $data["row"] = $this->Msuratmasuk->getsuratmasuk("");
	    $this->load->view('template',$data);
	}

	public function formsuratmasuk($id = 0) {
	    $data["judul"] = '<h3>Form Surat masuk</h3>';
	    $data["breadcrumb"] = '<h2>Form Surat masuk</h2>';
	    $data["menu"] = "transaksi";
	    $data["content"] = "transaksi/suratmasuk/vformsuratmasuk";
	    $data["row"] = $this->Msuratmasuk->getsuratmasukdetail($id);
	    $data["klasifikasi"] = $this->Mklasifikasi->getklasifikasi("");
	    $this->load->view('template',$data);
	}

	public function hapus_suratmasuk($id){
        $message = $this->Msuratmasuk->hapus_suratmasuk($id);
        $this->session->set_flashdata("message",$message);
        redirect("suratmasuk");
    }

	public function simpan_suratmasuk($action){
        $message = $this->Msuratmasuk->simpan_suratmasuk($action);
        $this->session->set_flashdata("message",$message);
        redirect("suratmasuk");
    }

    public function disposisi($id_surat, $cari="") {
	    $data["judul"] = '<h3>Disposisi Surat Masuk</h3>';
	    $data["breadcrumb"] = '<h2>Disposisi Surat Masuk</h2>';
	    $data["menu"] = "transaksi";
	    $data["content"] = "transaksi/suratmasuk/vdisposisi";
	    $data["row"] = $this->Msuratmasuk->getdisposisi($id_surat, "");
	    $data["id_surat"] = $id_surat;
	    $this->load->view('template',$data);
	}

	public function formdisposisi($id_surat, $id = 0) {
	    $data["judul"] = '<h3>Form Disposisi Surat Masuk</h3>';
	    $data["breadcrumb"] = '<h2>Form Disposisi Surat Masuk</h2>';
	    $data["menu"] = "transaksi";
	    $data["content"] = "transaksi/suratmasuk/vformdisposisi";
	    $data["row"] = $this->Msuratmasuk->getdisposisidetail($id);
	    $data["idsurat"] = $id_surat;
	    $data["sifat"] = $this->Msifat->getsifat("");
	    $this->load->view('template',$data);
	}

	public function simpan_disposisi($action){
        $message = $this->Msuratmasuk->simpan_disposisi($action);
        $this->session->set_flashdata("message",$message);
        redirect("suratmasuk/disposisi/".$this->input->post('id_surat'));
    }

    public function hapus_disposisi($id_surat, $id){
        $message = $this->Msuratmasuk->hapus_disposisi($id);
        $this->session->set_flashdata("message",$message);
        redirect("suratmasuk/disposisi/".$id_surat);
    }
}

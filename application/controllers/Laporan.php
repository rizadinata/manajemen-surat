<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct() {
	    parent::__construct();
	    $this->load->Model('Msuratkeluar');
	    $this->load->Model('Msuratmasuk');
	    $this->load->Model('Mklasifikasi');
	    // $this->load->Model('Muser');
	    if (($this->session->userdata('username') == NULL) || ($this->session->userdata('id_role') == NULL) || ($this->session->userdata('nama_user') == NULL))
	    {
	           redirect("login/logout","refresh");
	    }
	}

	public function index() {
	    $data["judul"] = '<h3>Suratkeluark</h3>';
	    $data["breadcrumb"] = '<h2>Surat keluar</h2>';
	    $data["menu"] = "transaksi";
	    $data["content"] = "transaksi/suratkeluar/vsuratkeluar";
	    $data["row"] = $this->Msuratkeluar->getsuratkeluar("");
	    $this->load->view('template',$data);
	}

	public function suratmasuk() {
	    $data["judul"] = '<h3>Surat masuk</h3>';
	    $data["breadcrumb"] = '<h2>Surat masuk</h2>';
	    $data["menu"] = "laporan";
	    $data["content"] = "laporan/suratmasuk/vlapsuratmasuk";
	    $data["row"] = $this->Msuratmasuk->getsuratmasuk("");
	    $this->load->view('template',$data);
	}

	public function suratkeluar() {
	    $data["judul"] = '<h3>Surat keluar</h3>';
	    $data["breadcrumb"] = '<h2>Surat keluar</h2>';
	    $data["menu"] = "laporan";
	    $data["content"] = "laporan/suratkeluar/vlapsuratkeluar";
	    $data["row"] = $this->Msuratkeluar->getsuratkeluar("");
	    $this->load->view('template',$data);
	}

	function excelsuratmasuk($tgl1="", $tgl2=""){
		$data["tgl1"]=$tgl1;
		$data["tgl2"]=$tgl2;
		// $data["kode_mk"]=$kode_mk;
		// $data["row"] = $this->Mmatakuliah->getmatakuliah("");
		// $data["row1"] = $this->Mnilai->getlaporannilai($semester,$thn_akademik,$kode_mk);
		$this->load->view('laporan/suratmasuk/vexcel_suratmasuk',$data);
	}

	function excelsuratkeluar($tgl1="", $tgl2=""){
		$data["tgl1"]=$tgl1;
		$data["tgl2"]=$tgl2;
		// $data["kode_mk"]=$kode_mk;
		// $data["row"] = $this->Mmatakuliah->getmatakuliah("");
		// $data["row1"] = $this->Mnilai->getlaporannilai($semester,$thn_akademik,$kode_mk);
		$this->load->view('laporan/suratkeluar/vexcel_suratkeluar',$data);
	}

	function pdfsuratmasuk($tgl1="",$tgl2=""){
		$this->load->helper('pdf_helper');
		$data["tgl1"]=$tgl1;
		$data["tgl2"]=$tgl2;
		echo $this->load->view('laporan/suratmasuk/vpdf_suratmasuk',$data,true); 
	}

	function pdfsuratkeluar($tgl1="",$tgl2=""){
		$this->load->helper('pdf_helper');
		$data["tgl1"]=$tgl1;
		$data["tgl2"]=$tgl2;
		echo $this->load->view('laporan/suratkeluar/vpdf_suratkeluar',$data,true); 
	}
	
}

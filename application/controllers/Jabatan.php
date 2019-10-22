<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function index() {
	    $data["judul"] = '<h5>Jabatan </h5>';
	    $data["icon"] ='<i class="ik ik-layers bg-blue"></i>';
	    $data["breadcrumb"] = '<li class="breadcrumb-item active" aria-current="page">Jabatan </li>';
	    $data["content"] = "master/jabatan/vjabatan";
	    $this->load->view('template',$data);
	}
}

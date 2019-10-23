<?php
	class Minstansi extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	  //  	function getklasifikasi($cari) {
	  //  		if ($cari != "") {
			// 	$this->db->like("id_klasifikasi",$cari);
			// 	$this->db->or_like("nama_klasifikasi",$cari);
			// }
	  //  		$q = $this->db->get('klasifikasi');
	  //  		return $q;
	  //  	}

	   	function getinstansidetail() {
	   		//$this->db->where('id_instansi',$id);
	   		$q = $this->db->get('instansi');
	   		return $q->row();
	   	}

	   	function simpan_instansi($aksi) {
	   		$data = array(
	   					'nama_instansi'  => $this->input->post('nama_instansi'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('instansi', $data);
					return "success-Data Instansi berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_instansi', $this->input->post('idlama'));
					$this->db->update('instansi', $data);
					return "success-Data Instansi berhasil diubah";
					break;
			}
			
			return "success-Data Klasifikasi berhasil disimpan";
	   	}

	   	// function hapus_klasifikasi($id) {
	   	// 	$this->db->where('id_klasifikasi',$id);
	   	// 	$this->db->delete('klasifikasi');
	   	// 	return "danger-Data Klasifikasi berhasil di hapus";
	   	// }
	}
?>
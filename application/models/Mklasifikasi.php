<?php
	class Mklasifikasi extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getklasifikasi($cari) {
	   		if ($cari != "") {
				$this->db->like("id_klasifikasi",$cari);
				$this->db->or_like("nama_klasifikasi",$cari);
			}
	   		$q = $this->db->get('klasifikasi');
	   		return $q;
	   	}

	   	function getklasifikasidetail($id) {
	   		$this->db->where('id_klasifikasi',$id);
	   		$q = $this->db->get('klasifikasi');
	   		return $q->row();
	   	}

	   	function simpan_klasifikasi($aksi) {
	   		$data = array(
	   					'nama_klasifikasi'  => $this->input->post('nama_klasifikasi'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('klasifikasi', $data);
					return "success-Data Klasifikasi berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_klasifikasi', $this->input->post('idlama'));
					$this->db->update('klasifikasi', $data);
					return "success-Data Klasifikasi berhasil diubah";
					break;
			}
			
			return "success-Data Klasifikasi berhasil disimpan";
	   	}

	   	function hapus_klasifikasi($id) {
	   		$this->db->where('id_klasifikasi',$id);
	   		$this->db->delete('klasifikasi');
	   		return "danger-Data Klasifikasi berhasil di hapus";
	   	}
	}
?>
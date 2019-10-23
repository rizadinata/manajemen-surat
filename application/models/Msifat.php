<?php
	class Msifat extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getsifat($cari) {
	   		if ($cari != "") {
				$this->db->like("id_sifat",$cari);
				$this->db->or_like("nama_sifat",$cari);
			}
	   		$q = $this->db->get('sifat_disposisi');
	   		return $q;
	   	}

	   	function getsifatdetail($id) {
	   		$this->db->where('id_sifat',$id);
	   		$q = $this->db->get('sifat_disposisi');
	   		return $q->row();
	   	}

	   	function simpan_sifat($aksi) {
	   		$data = array(
	   					'nama_sifat'  => $this->input->post('nama_sifat'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('sifat_disposisi', $data);
					return "success-Data Sifat Disposisi berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_sifat', $this->input->post('idlama'));
					$this->db->update('sifat_disposisi', $data);
					return "success-Data Sifat Disposisi berhasil diubah";
					break;
			}
			
			return "success-Data Sifat Disposisi berhasil disimpan";
	   	}

	   	function hapus_sifat($id) {
	   		$this->db->where('id_sifat',$id);
	   		$this->db->delete('sifat_disposisi');
	   		return "danger-Data Sifat Disposisi berhasil di hapus";
	   	}
	}
?>
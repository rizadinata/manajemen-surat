<?php
	class Mposisi extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getposisi($cari) {
	   		if ($cari != "") {
				$this->db->like("id_posisi",$cari);
				$this->db->or_like("nama_posisi",$cari);
			}
	   		$q = $this->db->get('posisi');
	   		return $q;
	   	}

	   	function getposisidetail($id) {
	   		$this->db->where('id_posisi',$id);
	   		$q = $this->db->get('posisi');
	   		return $q->row();
	   	}

	   	function simpan_posisi($aksi) {
	   		$data = array(
	   					'nama_posisi'  => $this->input->post('nama_posisi'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('posisi', $data);
					return "success-Data Posisi berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_posisi', $this->input->post('idlama'));
					$this->db->update('posisi', $data);
					return "success-Data Posisi berhasil diubah";
					break;
			}
			
			return "success-Data Agama berhasil disimpan";
	   	}

	   	function hapus_posisi($id) {
	   		$this->db->where('id_posisi',$id);
	   		$this->db->delete('posisi');
	   		return "danger-Data Posisi berhasil di hapus";
	   	}
	}
?>
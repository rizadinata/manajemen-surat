<?php
	class Mjabatan extends CI_Model {

		function __construct() {
	        parent::__construct();
	   	}
	   	
	   	function getjabatan($cari) {
	   		if ($cari != "") {
				$this->db->like("id_jabatan",$cari);
				$this->db->or_like("nama_jabatan",$cari);
			}
			$this->db->select('jabatan.*, posisi.nama_posisi');
			$this->db->join('posisi', 'posisi.id_posisi = jabatan.id_posisi', 'left');
	   		$q = $this->db->get('jabatan');
	   		return $q;
	   	}

	   	function getjabatandetail($id) {
	   		$this->db->where('id_jabatan',$id);
	   		$q = $this->db->get('jabatan');
	   		return $q->row();
	   	}

	   	function simpan_jabatan($aksi) {
	   		$data = array(
	   					'nama_jabatan'  => $this->input->post('nama_jabatan'), 
	   					'id_posisi'  => $this->input->post('id_posisi'), 
			);

			switch ($aksi) {
				case 'simpan':
					$this->db->insert('jabatan', $data);
					return "success-Data Jabatan berhasil disimpan";
					break;
				case 'ubah':
					$this->db->where('id_jabatan', $this->input->post('idlama'));
					$this->db->update('jabatan', $data);
					return "success-Data Jabatan berhasil diubah";
					break;
			}
			
			return "success-Data Jabatan berhasil disimpan";
	   	}

	   	function hapus_jabatan($id) {
	   		$this->db->where('id_jabatan',$id);
	   		$this->db->delete('jabatan');
	   		return "danger-Data Jabatan berhasil di hapus";
	   	}
	}
?>
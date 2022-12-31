<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kelas extends CI_Model
{

	public function countKelas()
	{
		$sql = "SELECT COUNT(*) AS kelas FROM `kelas`
INNER JOIN tahun_ajaran
ON kelas.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE tahun_ajaran.status='AKTIF';";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function dataKelasAktif()
	{
		$sql = "SELECT * FROM `kelas`
INNER JOIN tahun_ajaran
ON kelas.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE tahun_ajaran.status='AKTIF';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function dataKelas()
	{
		$sql = "SELECT * FROM `kelas`";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function group_kelas()
	{
		$sql = "SELECT * FROM `group_kelas`";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function tahun_ajaran()
	{
		$sql = "SELECT tahun_ajaran.id_tahun_ajaran,kelas.id,tahun_ajaran.tahun_ajaran,COUNT(*) AS jumlah_kelas FROM `kelas`
                INNER JOIN tahun_ajaran
                ON kelas.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                GROUP BY tahun_ajaran.id_tahun_ajaran
                ORDER BY tahun_ajaran.id_tahun_ajaran DESC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function tahun_ajaran_kelas($id_tahun_ajaran)
	{
		$sql = "SELECT kelas.id,kelas.kelas,jurusan.jurusan,tahun_ajaran.tahun_ajaran FROM `kelas`
				INNER JOIN jurusan
				ON kelas.kode=jurusan.kode
				INNER JOIN tahun_ajaran
				ON kelas.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
				WHERE tahun_ajaran.id_tahun_ajaran='$id_tahun_ajaran'
				ORDER BY kelas.kelas;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function simpan_kelas($data = array())
	{
		$jumlah = count($data);

		if ($jumlah > 0) {
			$this->db->insert_batch('kelas', $data);
		}
	}
}

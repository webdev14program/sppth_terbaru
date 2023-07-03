<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_adm_lain extends CI_Model
{
	public function dataAdmLain()
	{
		$sql = "SELECT setting_pembayaran_lain.id_setting_pembayaran_lain,setting_pembayaran_lain.nama_pembayaran_lain,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,setting_pembayaran_lain.jenis_pembayaran,setting_pembayaran_lain.nominal,setting_pembayaran_lain.date FROM `setting_pembayaran_lain`
                INNER JOIN group_kelas
                ON setting_pembayaran_lain.id_groupKelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON setting_pembayaran_lain.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function siswaAdmLain($id_siswa)
	{
		$sql = "SELECT setting_pembayaran_lain.id_setting_pembayaran_lain,siswa.id_siswa,siswa.nis,tahun_ajaran.id_tahun_ajaran,group_kelas.id_groupKelas,siswa.nama_siswa,jurusan.jurusan,siswa.kelas,tahun_ajaran.tahun_ajaran,setting_pembayaran_lain.nama_pembayaran_lain,setting_pembayaran_lain.nominal,group_kelas.nama_group,concat(siswa.id_siswa,siswa.tahun_ajaran) AS siswa_tahun_ajaran FROM `setting_pembayaran_lain`
INNER JOIN siswa
ON setting_pembayaran_lain.id_groupKelas=siswa.group_kelas
INNER JOIN tahun_ajaran
ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
INNER JOIN jurusan
ON siswa.jurusan=jurusan.kode
INNER JOIN group_kelas
ON siswa.group_kelas=group_kelas.id_groupKelas
WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function headerAdmLain($id_siswa)
	{
		$sql = "SELECT siswa.id_siswa,siswa.nis,siswa.nama_siswa,siswa.kelas,tahun_ajaran.tahun_ajaran,concat(siswa.id_siswa,siswa.tahun_ajaran) AS siswa_tahun_ajaran FROM `siswa`
INNER JOIN tahun_ajaran
ON tahun_ajaran.id_tahun_ajaran=siswa.tahun_ajaran
WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa';";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function AdmLain($nis)
	{
		$sql = "SELECT siswa.id_siswa,siswa.nis,siswa.nama_siswa,jurusan.jurusan,siswa.kelas,tahun_ajaran.tahun_ajaran,concat(siswa.id_siswa,siswa.tahun_ajaran) AS siswa_tahun_ajaran FROM `setting_pembayaran_lain`
INNER JOIN siswa
ON setting_pembayaran_lain.id_groupKelas=siswa.group_kelas
INNER JOIN tahun_ajaran
ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
INNER JOIN jurusan
ON siswa.jurusan=jurusan.kode
WHERE siswa.nis='$nis'
GROUP BY siswa.id_siswa;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function drop_down_adm_lain($nis)
	{
		$sql = "SELECT setting_pembayaran_lain.id_setting_pembayaran_lain, setting_pembayaran_lain.nama_pembayaran_lain,
group_kelas.nama_group,tahun_ajaran.tahun_ajaran, setting_pembayaran_lain.nominal
FROM `setting_pembayaran_lain`
INNER JOIN siswa
ON setting_pembayaran_lain.id_groupKelas=siswa.group_kelas
INNER JOIN group_kelas
ON siswa.group_kelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE concat(siswa.id_siswa,siswa.tahun_ajaran) = '$nis';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function detailAdmLain($id_siswa)
	{
		$sql = "SELECT adm_siswa.id_adm_siswa,adm_siswa.id_setting_pembayaran_lain,adm_siswa.siswa_tahun_ajaran,siswa.nama_siswa,siswa.kelas,
setting_pembayaran_lain.nama_pembayaran_lain,tahun_ajaran.tahun_ajaran,
(adm_siswa.cash+adm_siswa.kjp+adm_siswa.kjp_cash) AS jumlah_nominal,adm_siswa.jenis_pembayaran,adm_siswa.status,
IF((adm_siswa.cash+adm_siswa.kjp+adm_siswa.kjp_cash)=setting_pembayaran_lain.nominal,'LUNAS','BELUM LUNAS') AS status_pembayaran_lain,date(adm_siswa.timestamp) AS tanggal
FROM `adm_siswa`
inner JOIN siswa
ON concat(siswa.id_siswa,siswa.tahun_ajaran)=adm_siswa.siswa_tahun_ajaran
INNER JOIN setting_pembayaran_lain
ON adm_siswa.id_setting_pembayaran_lain=setting_pembayaran_lain.id_setting_pembayaran_lain
INNER JOIN tahun_ajaran
ON setting_pembayaran_lain.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function detailAdmLainKJP($id_siswa)
	{
		$sql = "SELECT adm_siswa.id_adm_siswa,adm_siswa.id_setting_pembayaran_lain,adm_siswa.siswa_tahun_ajaran,siswa.nama_siswa,siswa.kelas,
setting_pembayaran_lain.nama_pembayaran_lain,tahun_ajaran.tahun_ajaran,
(adm_siswa.cash+adm_siswa.kjp+adm_siswa.kjp_cash) AS jumlah_nominal,adm_siswa.jenis_pembayaran,adm_siswa.status,
adm_siswa.cash,adm_siswa.kjp,adm_siswa.kjp_cash,setting_pembayaran_lain.nominal,date(adm_siswa.timestamp) AS tanggal
FROM `adm_siswa`
inner JOIN siswa
ON concat(siswa.id_siswa,siswa.tahun_ajaran)=adm_siswa.siswa_tahun_ajaran
INNER JOIN setting_pembayaran_lain
ON adm_siswa.id_setting_pembayaran_lain=setting_pembayaran_lain.id_setting_pembayaran_lain
INNER JOIN tahun_ajaran
ON setting_pembayaran_lain.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa' AND IF((adm_siswa.cash+adm_siswa.kjp+adm_siswa.kjp_cash)=setting_pembayaran_lain.nominal,'LUNAS','BELUM LUNAS') = 'BELUM LUNAS';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}

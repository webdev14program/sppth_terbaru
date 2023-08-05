<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_setting_pembayaran extends CI_Model
{

	public function dataSettingSPP()
	{
		$sql = "SELECT tahun_ajaran.id_tahun_ajaran,setting_pembayaran.nama_pembayaran,tahun_ajaran.tahun_ajaran,COUNT(*) jumlah_setting_spp
FROM `setting_pembayaran`
inner JOIN tahun_ajaran
ON tahun_ajaran.id_tahun_ajaran=setting_pembayaran.id_tahun_ajaran
GROUP BY setting_pembayaran.id_tahun_ajaran;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function headerSettingpembayaran($tahun_ajaran)
	{
		$sql = "SELECT setting_pembayaran.id_tahun_ajaran, tahun_ajaran.tahun_ajaran 
FROM `setting_pembayaran`
INNER JOIN group_kelas
ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE setting_pembayaran.id_tahun_ajaran='$tahun_ajaran'
GROUP BY setting_pembayaran.id_tahun_ajaran;";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function dataSettingpembayaran($tahun_ajaran)
	{
		$sql = "SELECT setting_pembayaran.id_setting_pembayaran,setting_pembayaran.nama_pembayaran,IF(setting_pembayaran.jenis_pembayaran='1001','Pembayaran SPP','Pembayaran Administrasi Lain') AS nama_jenis_pembayaran,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,
setting_pembayaran.spp,setting_pembayaran.tabungan,setting_pembayaran.praktek,(setting_pembayaran.spp+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek+setting_pembayaran.komputer+setting_pembayaran.mandarin) AS nominal,setting_pembayaran.date 
FROM `setting_pembayaran`
INNER JOIN group_kelas
ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE setting_pembayaran.id_tahun_ajaran='$tahun_ajaran'
ORDER BY group_kelas.id_groupKelas ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function detailSettingpembayaran($id_setting_pembayaran)
	{
		$sql = "SELECT setting_pembayaran.id_setting_pembayaran,tahun_ajaran.id_tahun_ajaran,setting_pembayaran.nama_pembayaran,IF(setting_pembayaran.jenis_pembayaran='1001','Pembayaran SPP','Pembayaran Administrasi Lain') AS nama_jenis_pembayaran,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,
setting_pembayaran.spp,setting_pembayaran.komputer,setting_pembayaran.mandarin,setting_pembayaran.tabungan,setting_pembayaran.internet,setting_pembayaran.praktek,(setting_pembayaran.spp+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek+setting_pembayaran.komputer+setting_pembayaran.mandarin) AS nominal,setting_pembayaran.date 
FROM `setting_pembayaran`
INNER JOIN group_kelas
ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE setting_pembayaran.id_setting_pembayaran='$id_setting_pembayaran';;";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function editSettingpembayaran($id_setting_pembayaran)
	{
		$sql = "SELECT setting_pembayaran.id_setting_pembayaran,tahun_ajaran.id_tahun_ajaran,group_kelas.id_groupKelas,setting_pembayaran.jenis_pembayaran,setting_pembayaran.nama_pembayaran,group_kelas.nama_group,tahun_ajaran.tahun_ajaran, 
setting_pembayaran.spp,setting_pembayaran.komputer,setting_pembayaran.mandarin,setting_pembayaran.tabungan,setting_pembayaran.internet,setting_pembayaran.praktek,date(setting_pembayaran.date) AS tanggal
FROM `setting_pembayaran`
INNER JOIN group_kelas
ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE setting_pembayaran.id_setting_pembayaran='$id_setting_pembayaran';";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function setting_spp()
	{
		$sql = "SELECT setting_pembayaran.id_setting_pembayaran,group_kelas.nama_group,setting_pembayaran.nama_pembayaran,(spp+komputer+mandarin+tabungan+internet+praktek) AS jumlah_nominal, tahun_ajaran.tahun_ajaran FROM `setting_pembayaran`
INNER JOIN tahun_ajaran
ON tahun_ajaran.id_tahun_ajaran=setting_pembayaran.id_tahun_ajaran
INNER JOIN group_kelas
ON group_kelas.id_groupKelas=setting_pembayaran.id_groupKelas
WHERE tahun_ajaran.status='AKTIF';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function setting_group_kelas()
	{
		$sql = "SELECT * FROM `group_kelas`
WHERE id_groupKelas IN (1001,2002);";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function setting_tahun_ajaran()
	{
		$sql = "SELECT * FROM `tahun_ajaran`
WHERE id_tahun_ajaran IN(404);";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function dataSettingpembayaraUangMasuk()
	{
		$sql = "SELECT setting_pembayaran_uang_masuk.id_uang_masuk,group_kelas.nama_group,tahun_ajaran,setting_pembayaran_uang_masuk.pendaftaran,SUM(
    (setting_pembayaran.spp+setting_pembayaran.komputer+setting_pembayaran.mandarin+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek)+uang_pangkal+uang_peralatan+osis+mos+kartu_pelajar+seragam) as jumlah_nominal FROM `setting_pembayaran_uang_masuk`
INNER JOIN group_kelas
ON setting_pembayaran_uang_masuk.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON tahun_ajaran.id_tahun_ajaran=setting_pembayaran_uang_masuk.id_tahun_ajaran
INNER JOIN setting_pembayaran
ON setting_pembayaran.id_setting_pembayaran=setting_pembayaran_uang_masuk.id_setting_pembayaran
GROUP BY setting_pembayaran.id_setting_pembayaran;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function detailSettingpembayaranUangMasuk($id_setting_pembayaran)
	{
		$sql = "SELECT setting_pembayaran_uang_masuk.id_uang_masuk,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,
pendaftaran,uang_pangkal,SUM(setting_pembayaran.spp+setting_pembayaran.komputer+setting_pembayaran.mandarin+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek) AS spp_tabungan
,uang_peralatan,osis,mos,kartu_pelajar,seragam,
SUM( (setting_pembayaran.spp+setting_pembayaran.komputer+setting_pembayaran.mandarin+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek)+uang_pangkal+uang_peralatan+osis+mos+kartu_pelajar+seragam) as jumlah_nominal
FROM `setting_pembayaran_uang_masuk`
INNER JOIN group_kelas
ON setting_pembayaran_uang_masuk.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON tahun_ajaran.id_tahun_ajaran=setting_pembayaran_uang_masuk.id_tahun_ajaran
INNER JOIN setting_pembayaran
ON setting_pembayaran_uang_masuk.id_setting_pembayaran=setting_pembayaran.id_setting_pembayaran
WHERE setting_pembayaran_uang_masuk.id_uang_masuk='$id_setting_pembayaran';";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
}

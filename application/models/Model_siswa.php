<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
	public function countSiswaAktif()
	{
		$sql = "SELECT COUNT(*) as siswa FROM `siswa`
INNER JOIN tahun_ajaran
ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE tahun_ajaran.status='AKTIF' AND siswa.status='AKTIF';";
		$query = $this->db->query($sql);
		return $query->row()->siswa;
	}

	public function countSiswaTidakAktif()
	{
		$sql = "SELECT COUNT(*) as siswa FROM `siswa`
INNER JOIN tahun_ajaran
ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE tahun_ajaran.status='AKTIF' AND siswa.status='TIDAK AKTIF';";
		$query = $this->db->query($sql);
		return $query->row()->siswa;
	}

	public function dataSiswaALL()
	{
		$sql = "SELECT siswa.id_siswa,siswa.nis,siswa.nama_siswa,jurusan.jurusan,siswa.kelas,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,concat(siswa.id_siswa,siswa.tahun_ajaran)AS siswa_tahun_ajaran FROM `siswa`
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.kode
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                ORDER BY siswa.id_siswa ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function NISdataSiswaALL()
	{
		$sql = "SELECT siswa.id_siswa,siswa.nis, siswa.nama_siswa,siswa.jurusan,jurusan.jurusan FROM `siswa`
INNER JOIN jurusan
ON siswa.jurusan=jurusan.kode
GROUP BY siswa.nis
ORDER BY siswa.kelas,siswa.nama_siswa ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function PerNISdataSiswaALL($nis)
	{
		// 		$sql = "SELECT siswa.id_siswa,siswa.nis, siswa.nama_siswa,siswa.jurusan,jurusan.jurusan, siswa.kelas,tahun_ajaran.tahun_ajaran, concat(siswa.id_siswa,siswa.tahun_ajaran) AS siswa_tahun_ajar FROM `siswa`
		// INNER JOIN jurusan
		// ON siswa.jurusan=jurusan.kode
		// INNER JOIN tahun_ajaran
		// ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
		// WHERE siswa.nis='$nis'
		// ORDER BY siswa.kelas,siswa.nama_siswa ASC;";
		$sql = "SELECT jurusan.jurusan,siswa.kelas,tahun_ajaran.tahun_ajaran,concat(siswa.id_siswa,siswa.tahun_ajaran) AS siswa_tahun_ajar FROM `siswa`
INNER JOIN setting_pembayaran
ON concat(siswa.group_kelas,siswa.tahun_ajaran)=concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)
INNER JOIN jurusan
ON jurusan.kode=siswa.jurusan
INNER join tahun_ajaran
ON tahun_ajaran.id_tahun_ajaran=siswa.tahun_ajaran
WHERE siswa.nis='$nis';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function HeaderPerNISdataSiswaALL($nis)
	{
		$sql = "SELECT siswa.id_siswa,siswa.nis, siswa.nama_siswa,siswa.jurusan,jurusan.jurusan, siswa.kelas,tahun_ajaran.tahun_ajaran FROM `siswa`
INNER JOIN jurusan
ON siswa.jurusan=jurusan.kode
INNER JOIN tahun_ajaran
ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE siswa.nis='$nis'
ORDER BY siswa.kelas,siswa.nama_siswa ASC;";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function dataSiswaALLFindID($id_siswa)
	{
		$sql = "SELECT siswa.nis,siswa.nama_siswa,siswa.kelas,jurusan.kode,tahun_ajaran.tahun_ajaran,concat(siswa.id_siswa,siswa.tahun_ajaran) AS siswa_tahun_ajaran FROM `siswa`
INNER JOIN jurusan
ON siswa.jurusan=jurusan.kode
INNER JOIN tahun_ajaran
ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa';";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function SPPdataSiswaALLFindID($id_siswa)
	{
		$belum_lunas = '<p class="text-center font-weight-bold text-danger">BELUM LUNAS</p>';
		$lunas_cash = '<p class="text-center font-weight-bold text-success">LUNAS CASH</p>';
		$lunas_kjp = '<p class="text-center font-weight-bold text-warning">LUNAS KJP</p>';
		$sql = "SELECT spp_siswa.id_spp_siswa,spp_siswa.id_siswa,siswa.nama_siswa,spp_siswa.kode_bulan,spp_siswa.bulan,spp_siswa.status,spp_siswa.pembayaran,spp_siswa.cash,spp_siswa.kjp,spp_siswa.kjp_cash,setting_pembayaran.spp,setting_pembayaran.komputer,setting_pembayaran.mandarin,setting_pembayaran.tabungan,setting_pembayaran.internet,setting_pembayaran.praktek,(setting_pembayaran.spp+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek+setting_pembayaran.komputer+setting_pembayaran.mandarin) AS nominal,
        CASE
            WHEN spp_siswa.cash=(setting_pembayaran.spp+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek+setting_pembayaran.komputer+setting_pembayaran.mandarin) THEN '$lunas_cash'
            WHEN (spp_siswa.kjp+kjp_cash)=(setting_pembayaran.spp+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek+setting_pembayaran.komputer+setting_pembayaran.mandarin) THEN '$lunas_kjp'
            ELSE '$belum_lunas'
        END AS status_pabayar_spp,spp_siswa.date
        FROM `spp_siswa`
        INNER JOIN siswa
        ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
        INNER JOIN setting_pembayaran
        ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
        WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa'
        ORDER BY spp_siswa.kode_bulan;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function validasi_generate_pembayaran_spp($id_siswa)
	{
		$this->db->where("id_siswa", $id_siswa);
		return $this->db->get('spp_siswa');
	}



	public function dataSiswa()
	{
		$sql = "SELECT tahun_ajaran.id_tahun_ajaran,tahun_ajaran.tahun_ajaran,COUNT(*) AS jumlah_siswa FROM `siswa`
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                GROUP BY tahun_ajaran.id_tahun_ajaran
                ORDER BY tahun_ajaran.tahun_ajaran DESC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function header_detail_siswa($id_tahun_ajaran)
	{
		$sql = "SELECT tahun_ajaran.tahun_ajaran FROM `siswa`
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.kode
                WHERE siswa.tahun_ajaran='$id_tahun_ajaran'
                GROUP BY tahun_ajaran.id_tahun_ajaran;";
		$query = $this->db->query($sql);
		return $query->row_array();
	}


	public function detail_siswa($id_tahun_ajaran)
	{
		$sql = "SELECT siswa.*,siswa.tahun_ajaran AS id_tahun_ajaran,group_kelas.nama_group,jurusan.jurusan AS nama_jurusan,tahun_ajaran.tahun_ajaran FROM `siswa`
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.kode
                WHERE siswa.tahun_ajaran='$id_tahun_ajaran' AND siswa.status='AKTIF';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function data_siswa_non_aktif()
	{
		$sql = "SELECT siswa.*,group_kelas.nama_group,jurusan.jurusan AS nama_jurusan,tahun_ajaran.tahun_ajaran FROM `siswa`
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.kode
                WHERE siswa.status='TIDAK AKTIF';";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function pembayaranSPP_perbulan_perhari()
	{
		$sql = "SELECT monthname(spp_siswa.date) AS bulan, year(spp_siswa.date) AS tahun,concat(monthname(spp_siswa.date), year(spp_siswa.date)) AS bulan_tahun FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
                INNER JOIN setting_pembayaran
                ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
                WHERE spp_siswa.status='LUNAS'
                GROUP BY concat(monthname(spp_siswa.date), year(spp_siswa.date))
                ORDER BY spp_siswa.kode_bulan;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function simpanSiswa($data = array())
	{
		$jumlah = count($data);

		if ($jumlah > 0) {
			$this->db->insert_batch('siswa', $data);
		}
	}
}

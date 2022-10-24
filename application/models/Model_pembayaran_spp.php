<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pembayaran_spp extends CI_Model
{
    public function countPembayaranSPP($id_siswa)
    {
        $sql = "SELECT spp_siswa.id_spp_siswa,spp_siswa.id_siswa,siswa.nama_siswa,spp_siswa.kode_bulan,spp_siswa.bulan,spp_siswa.status,setting_pembayaran.nominal,count(*) AS jumlah_bulan
                FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
                INNER JOIN setting_pembayaran
                ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
                WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa' AND spp_siswa.status='LUNAS'
                ORDER BY spp_siswa.kode_bulan;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function jumlahPembayaranSPP($id_siswa)
    {
        $sql = "SELECT spp_siswa.id_spp_siswa,spp_siswa.id_siswa,siswa.nama_siswa,spp_siswa.kode_bulan,spp_siswa.bulan,spp_siswa.status,setting_pembayaran.nominal,count(*) AS jumlah_bulan,SUM(setting_pembayaran.nominal) AS jumlah_pembayaran FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
                INNER JOIN setting_pembayaran
                ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
                WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa' AND spp_siswa.status='LUNAS'
                ORDER BY spp_siswa.kode_bulan;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function totalPembayaranSPP($id_siswa)
    {
        $sql = "SELECT spp_siswa.id_spp_siswa,spp_siswa.id_siswa,siswa.nama_siswa,spp_siswa.kode_bulan,spp_siswa.bulan,spp_siswa.status,setting_pembayaran.nominal,count(*) AS total_bulan,SUM(setting_pembayaran.nominal) AS total_pembayaran
FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
                INNER JOIN setting_pembayaran
                ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
                WHERE concat(siswa.id_siswa,siswa.tahun_ajaran)='$id_siswa'
                ORDER BY spp_siswa.kode_bulan;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function pembayaran_spp_kjp($id_spp_siswa)
    {
        $sql = "SELECT spp_siswa.id_spp_siswa,spp_siswa.id_siswa,siswa.nama_siswa,spp_siswa.kode_bulan,spp_siswa.bulan,spp_siswa.status,setting_pembayaran.nominal, spp_siswa.kjp, spp_siswa.kjp_cash FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
                INNER JOIN setting_pembayaran
                ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
                WHERE spp_siswa.id_spp_siswa='$id_spp_siswa'
                ORDER BY spp_siswa.kode_bulan;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function pembayaran_spp_kjp_tabel($id_spp_siswa)
    {
        $sql = "SELECT spp_siswa.id_spp_siswa,spp_siswa.id_siswa,siswa.nama_siswa,spp_siswa.kode_bulan,spp_siswa.bulan,spp_siswa.status,setting_pembayaran.nominal FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
                INNER JOIN setting_pembayaran
                ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
                WHERE spp_siswa.id_spp_siswa='$id_spp_siswa'
                ORDER BY spp_siswa.kode_bulan;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function perbulan_perhari($id_spp)
    {
        $sql = "SELECT spp_siswa.id_spp_siswa,spp_siswa.id_siswa,siswa.nama_siswa,spp_siswa.kode_bulan,spp_siswa.bulan,spp_siswa.status,setting_pembayaran.nominal FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
                INNER JOIN setting_pembayaran
                ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
                WHERE spp_siswa.id_spp_siswa='$id_spp'
                ORDER BY spp_siswa.kode_bulan;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function rekap_spp_admin_perhari($bulan_tahun)
    {
        $sql = "SELECT day(spp_siswa.date) AS hari,monthname(spp_siswa.date) AS nama_bulan, year(spp_siswa.date) AS tahun, concat(monthname(spp_siswa.date),year(spp_siswa.date)) AS bulan_tahun
                FROM `spp_siswa`
                WHERE concat(monthname(spp_siswa.date),year(spp_siswa.date))='$bulan_tahun'
                GROUP BY concat(monthname(spp_siswa.date),year(spp_siswa.date))
                ORDER BY spp_siswa.kode_bulan DESC;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function tabel_rekap_spp_admin_perhari($bulan_tahun)
    {
        // $sql = "SELECT day(spp_siswa.date) AS hari, monthname(spp_siswa.date) AS bulan, year(spp_siswa.date) AS tahun, SUM(setting_pembayaran.nominal) AS jumlah_non_kjp,SUM(spp_siswa.kjp_cash) AS kjp_cash,(SUM(setting_pembayaran.nominal)+SUM(spp_siswa.kjp_cash)) AS total_pembayarn,day(spp_siswa.date) AS hari, monthname(spp_siswa.date) AS bulan, year(spp_siswa.date) AS tahun,
        //         concat(day(spp_siswa.date),monthname(spp_siswa.date),YEAR(spp_siswa.date)) AS hari_bulan_tahun
        //         FROM `spp_siswa`
        //         INNER JOIN siswa
        //         ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
        //         INNER JOIN setting_pembayaran
        //         ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
        //         WHERE spp_siswa.status='LUNAS' AND concat(monthname(spp_siswa.date),YEAR(spp_siswa.date))='July2022'
        //         GROUP BY day(spp_siswa.date)
        //         ORDER BY day(spp_siswa.date) DESC;";

        $sql = "SELECT spp_siswa.bulan,spp_siswa.status,spp_siswa.cash,spp_siswa.kjp_cash,spp_siswa.date,sum(spp_siswa.cash) AS cash_non_kjp,SUM(spp_siswa.kjp_cash) AS cash_kjp,(sum(spp_siswa.cash)+SUM(spp_siswa.kjp_cash))AS total_pembayarn,day(spp_siswa.date) AS tanggal_spp,monthname(spp_siswa.date) AS bulan_spp,year(spp_siswa.date) AS tahun_spp,concat(day(spp_siswa.date),monthname(spp_siswa.date),year(spp_siswa.date)) AS hari_bulan_tahun
            FROM `spp_siswa` 
            WHERE spp_siswa.status='LUNAS'
            GROUP BY tanggal_spp,bulan_spp,tahun_spp
            ORDER BY `kode_bulan` DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function print_rekap_spp_perbulan_perhari_header($hari_bulan_tahun)
    {
        $sql = "SELECT siswa.nis,siswa.nama_siswa,siswa.kelas,spp_siswa.bulan,spp_siswa.pembayaran,spp_siswa.cash,spp_siswa.kjp_cash,(SUM(spp_siswa.cash)+SUM(spp_siswa.kjp_cash)) AS total_pembayarn,spp_siswa.date,day(spp_siswa.date) AS hari, monthname(spp_siswa.date) AS bulan, year(spp_siswa.date) AS tahun,
concat(day(spp_siswa.date),monthname(spp_siswa.date),YEAR(spp_siswa.date)) AS hari_bulan_tahun
FROM `spp_siswa`
INNER JOIN siswa
ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
INNER JOIN setting_pembayaran
ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
WHERE spp_siswa.status='LUNAS' AND concat(day(spp_siswa.date),monthname(spp_siswa.date),YEAR(spp_siswa.date))='$hari_bulan_tahun'
ORDER BY day(spp_siswa.date) DESC";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function print_rekap_spp_perbulan_perhari($hari_bulan_tahun)
    {
        $sql = "SELECT siswa.nis,siswa.nama_siswa,siswa.kelas,spp_siswa.bulan,year(spp_siswa.date) AS tahun,spp_siswa.pembayaran,spp_siswa.cash,spp_siswa.kjp_cash,spp_siswa.date,
concat(day(spp_siswa.date),monthname(spp_siswa.date),YEAR(spp_siswa.date)) AS hari_bulan_tahun
FROM `spp_siswa`
INNER JOIN siswa
ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
INNER JOIN setting_pembayaran
ON concat(setting_pembayaran.id_groupKelas,setting_pembayaran.id_tahun_ajaran)=concat(siswa.group_kelas,siswa.tahun_ajaran)
WHERE spp_siswa.status='LUNAS' AND concat(day(spp_siswa.date),monthname(spp_siswa.date),YEAR(spp_siswa.date))='$hari_bulan_tahun'
ORDER BY spp_siswa.id_siswa,spp_siswa.kode_bulan ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function rekap_spp_perbulan_perbulan()
    {
        $sql = "SELECT SUM(spp_siswa.cash) AS cash, SUM(spp_siswa.kjp_cash) AS kjp_cash,(SUM(spp_siswa.cash)+SUM(spp_siswa.kjp_cash)) AS total_pembayaran,COUNT(*) AS jumlah_siswa,monthname(spp_siswa.date) AS bulan,year(spp_siswa.date) AS tahun, concat(monthname(spp_siswa.date),year(spp_siswa.date)) AS bulan_tahun FROM `spp_siswa`
WHERE spp_siswa.status='LUNAS'
group BY monthname(spp_siswa.date),year(spp_siswa.date) ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function print_rekap_spp_perbulan_perbulan_header($bulan_tahun)
    {
        $sql = "SELECT siswa.nis,siswa.nama_siswa,siswa.kelas,spp_siswa.pembayaran,spp_siswa.bulan,SUM(spp_siswa.cash) AS tatal_non_kjp,SUM(spp_siswa.kjp_cash) as kjp_cash,(SUM(spp_siswa.cash)+SUM(spp_siswa.kjp_cash)) AS total_spp,(monthname(spp_siswa.date)) AS bulan_spp,(year(spp_siswa.date)) AS tahun_spp,concat(monthname(spp_siswa.date),year(spp_siswa.date)) As bulan_tahun FROM `spp_siswa`
INNER JOIN siswa
ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
WHERE spp_siswa.status='LUNAS' AND concat(monthname(spp_siswa.date),year(spp_siswa.date))='$bulan_tahun'
GROUP BY concat(monthname(spp_siswa.date),year(spp_siswa.date))
ORDER BY siswa.nis, spp_siswa.bulan asc";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    public function print_rekap_spp_perbulan_perbulan($bulan_tahun)
    {
        $sql = "SELECT siswa.nis,siswa.nama_siswa,siswa.kelas,spp_siswa.pembayaran,spp_siswa.bulan,year(spp_siswa.date) AS tahun,spp_siswa.cash,spp_siswa.kjp_cash,concat(monthname(spp_siswa.date),year(spp_siswa.date)) As bulan_tahun FROM `spp_siswa`
INNER JOIN siswa
ON spp_siswa.id_siswa=concat(siswa.id_siswa,siswa.tahun_ajaran)
WHERE spp_siswa.status='LUNAS' AND concat(monthname(spp_siswa.date),year(spp_siswa.date))='$bulan_tahun'
ORDER BY siswa.nis, spp_siswa.bulan asc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

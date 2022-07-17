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
}
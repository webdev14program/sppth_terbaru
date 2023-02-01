<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_setting_pembayaran extends CI_Model
{

    // public function dataSettingpembayaran()
    // {
    //     $sql = "SELECT setting_pembayaran.id_setting_pembayaran,setting_pembayaran.nama_pembayaran,setting_pembayaran.jenis_pembayaran,group_kelas.nama_group,setting_pembayaran.nominal,tahun_ajaran.tahun_ajaran,IF(setting_pembayaran.jenis_pembayaran='1001','Pembayaran SPP','Pembayaran Administrasi Lain') AS nama_jenis_pembayaran FROM `setting_pembayaran`
    //     INNER JOIN group_kelas
    //     ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
    //     INNER JOIN tahun_ajaran
    //     ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
    //     ORDER BY group_kelas.id_groupKelas,tahun_ajaran.id_tahun_ajaran ASC;";
    //     $query = $this->db->query($sql);
    //     return $query->result_array();
    // }

    public function dataSettingpembayaran()
    {
        $sql = "SELECT setting_pembayaran.id_setting_pembayaran,setting_pembayaran.nama_pembayaran,IF(setting_pembayaran.jenis_pembayaran='1001','Pembayaran SPP','Pembayaran Administrasi Lain') AS nama_jenis_pembayaran,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,
setting_pembayaran.spp,setting_pembayaran.tabungan,setting_pembayaran.praktek,(setting_pembayaran.spp+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek+setting_pembayaran.komputer+setting_pembayaran.mandarin) AS nominal,setting_pembayaran.date 
FROM `setting_pembayaran`
INNER JOIN group_kelas
ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
ORDER BY group_kelas.id_groupKelas ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function detailSettingpembayaran($id_setting_pembayaran)
    {
        $sql = "SELECT setting_pembayaran.id_setting_pembayaran,setting_pembayaran.nama_pembayaran,IF(setting_pembayaran.jenis_pembayaran='1001','Pembayaran SPP','Pembayaran Administrasi Lain') AS nama_jenis_pembayaran,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,
setting_pembayaran.spp,setting_pembayaran.komputer,setting_pembayaran.mandarin,setting_pembayaran.tabungan,setting_pembayaran.internet,setting_pembayaran.praktek,(setting_pembayaran.spp+setting_pembayaran.tabungan+setting_pembayaran.internet+setting_pembayaran.praktek+setting_pembayaran.komputer+setting_pembayaran.mandarin) AS nominal,setting_pembayaran.date 
FROM `setting_pembayaran`
INNER JOIN group_kelas
ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
INNER JOIN tahun_ajaran
ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran
WHERE setting_pembayaran.id_setting_pembayaran='$id_setting_pembayaran';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
}

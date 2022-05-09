<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_setting_pembayaran extends CI_Model
{

    public function dataSettingpembayaran()
    {
        $sql = "SELECT setting_pembayaran.id_setting_pembayaran,setting_pembayaran.nama_pembayaran,setting_pembayaran.jenis_pembayaran,group_kelas.nama_group,setting_pembayaran.nominal,tahun_ajaran.tahun_ajaran FROM `setting_pembayaran`
        INNER JOIN group_kelas
        ON setting_pembayaran.id_groupKelas=group_kelas.id_groupKelas
        INNER JOIN tahun_ajaran
        ON setting_pembayaran.id_tahun_ajaran=tahun_ajaran.id_tahun_ajaran;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

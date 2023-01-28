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
}

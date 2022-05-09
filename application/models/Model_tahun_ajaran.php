<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tahun_ajaran extends CI_Model
{

    public function tahun_ajaran()
    {
        $sql = "SELECT tahun_ajaran FROM `tahun_ajaran`
                WHERE status='AKTIF';";
        $query = $this->db->query($sql);
        return $query->row()->tahun_ajaran;
    }
    public function dataKelas()
    {
        $sql = "SELECT * FROM `kelas`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

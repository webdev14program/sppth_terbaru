<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kelas extends CI_Model
{

    public function countKelas()
    {
        $sql = "SELECT COUNT(*) AS kelas FROM `a_kelas`";
        $query = $this->db->query($sql);
        return $query->row()->kelas;
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
        $sql = "SELECT * FROM `tahun_ajaran`";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

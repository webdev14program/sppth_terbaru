<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tahun_ajaran extends CI_Model
{

    public function home_tahun_ajaran()
    {

        $sql = "SELECT * FROM `tahun_ajaran`
                WHERE status='AKTIF';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
    public function tahun_ajaran()
    {

        $aktif = '<p class="text-uppercase text-success">AKTIF.</p>';
        $tidak_aktif = '<p class="text-uppercase text-danger">TIDAK AKTIF.</p>';
        $sql = "SELECT *,IF(status='AKTIF','AKTIF','TIDAK AKTIF') AS status_tahun_ajaran FROM `tahun_ajaran`;";
        $query = $this->db->query($sql);
        return $query->row()->tahun_ajaran;
    }
    public function dataTahunAjaran()
    {

        $aktif = '<p class="text-uppercase text-success">AKTIF</p>';
        $tidak_aktif = '<p class="text-uppercase text-danger">TIDAK AKTIF</p>';
        $sql = "SELECT *,IF(status='AKTIF','$aktif','$tidak_aktif') AS status_tahun_ajaran FROM `tahun_ajaran`;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

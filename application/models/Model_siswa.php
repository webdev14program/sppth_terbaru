<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
    public function countSiswa2021()
    {
        $sql = "SELECT COUNT(*) AS siswa FROM `siswa`
                WHERE tahun_ajaran='199960'";
        $query = $this->db->query($sql);
        return $query->row()->siswa;
    }

    // public function dataSiswaTahunAjaran()
    // {
    //     $sql = "SELECT tahun_ajaran.id_tahun_ajaran,tahun_ajaran.tahun_jaran,COUNT(*) AS jumlah_siswa FROM `siswa`
    //             INNER JOIN tahun_ajaran
    //             ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
    //             GROUP BY siswa.tahun_ajaran
    //             ORDER BY tahun_ajaran.tahun_jaran desc;";
    //     $query = $this->db->query($sql);
    //     return $query->result_array();
    // }

    // public function headerdataSiswa($tahun_ajaran)
    // {
    //     $sql = "SELECT siswa.id_siswa,siswa.nama_siswa,siswa.kelas,jurusan.jurusan,tahun_ajaran.tahun_jaran FROM `siswa`
    //             INNER JOIN tahun_ajaran
    //             ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
    //             INNER JOIN jurusan
    //             ON siswa.jurusan=jurusan.kode
    //             WHERE tahun_ajaran.id_tahun_ajaran='$tahun_ajaran'
    //             ORDER BY siswa.kelas ASC";
    //     $query = $this->db->query($sql);
    //     return $query->row_array();
    // }

    public function dataSiswa()
    {
        $sql = "SELECT siswa.nis,siswa.nama_siswa,jurusan.jurusan,kelas.kelas,group_kelas.nama_group,tahun_ajaran.tahun_ajaran FROM `siswa`  
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.id
                INNER JOIN kelas
                ON siswa.kelas=kelas.id
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran  
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                ORDER BY `tahun_ajaran`.`tahun_ajaran` ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
    }





    public function detail_siswa($id_siswa)
    {
        $sql = "SELECT siswa.id_siswa,siswa.nama_siswa,siswa.kelas,jurusan.jurusan,tahun_ajaran.tahun_jaran
                FROM `siswa`
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.kode
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                WHERE siswa.id_siswa='$id_siswa';";
        $query = $this->db->query($sql);
        return $query->row_array();
    }
}

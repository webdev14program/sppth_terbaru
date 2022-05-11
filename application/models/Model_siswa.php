<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
    public function countSiswa()
    {
        $sql = "SELECT COUNT(*) AS siswa FROM `siswa`
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                WHERE tahun_ajaran.status='AKTIF';";
        $query = $this->db->query($sql);
        return $query->row()->siswa;
    }

    public function dataSiswaALL()
    {
        $sql = "SELECT siswa.id_siswa,siswa.nis,siswa.nama_siswa,jurusan.jurusan,siswa.kelas,group_kelas.nama_group,tahun_ajaran.tahun_ajaran FROM `siswa`
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

    public function dataSiswaALLFindID($id_siswa)
    {
        $sql = "SELECT siswa.id_siswa,siswa.nis,siswa.nama_siswa,jurusan.jurusan,siswa.kelas,group_kelas.nama_group,tahun_ajaran.tahun_ajaran FROM `siswa`
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.kode
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                WHERE siswa.id_siswa='$id_siswa'
                ORDER BY siswa.id_siswa ASC;";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function SPPdataSiswaALLFindID($id_siswa)
    {
        $sql = "SELECT siswa.id_siswa,siswa.nama_siswa,siswa.kelas,group_kelas.nama_group,tahun_ajaran.tahun_ajaran,spp_siswa.bulan,spp_siswa.status,setting_pembayaran.nominal,spp_siswa.date FROM `spp_siswa`
                INNER JOIN siswa
                ON spp_siswa.id_siswa=siswa.id_siswa
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON tahun_ajaran.id_tahun_ajaran=siswa.tahun_ajaran
                INNER JOIN setting_pembayaran
                ON group_kelas.id_groupKelas=setting_pembayaran.id_groupKelas
                WHERE siswa.id_siswa='$id_siswa'
                ORDER BY spp_siswa.kode_bulan ASC;";
        $query = $this->db->query($sql);
        return $query->result_array();
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
        $sql = "SELECT siswa.nis,siswa.nama_siswa,jurusan.jurusan,siswa.kelas,group_kelas.nama_group,tahun_ajaran.tahun_ajaran FROM `siswa`
                INNER JOIN group_kelas
                ON siswa.group_kelas=group_kelas.id_groupKelas
                INNER JOIN tahun_ajaran
                ON siswa.tahun_ajaran=tahun_ajaran.id_tahun_ajaran
                INNER JOIN jurusan
                ON siswa.jurusan=jurusan.kode
                WHERE siswa.tahun_ajaran='$id_tahun_ajaran'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

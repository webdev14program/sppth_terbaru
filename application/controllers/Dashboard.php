<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function index()
    {
        $isi['content'] = 'tampilan_home';
        $isi['jurusan'] = $this->Model_jurusan->countJurusan();
        $isi['kelas'] = $this->Model_kelas->countKelas();
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function data_jurusan()
    {

        $isi['jurusan'] = $this->Model_jurusan->dataJurusan();

        $isi['content'] = 'tampilan_jurusan';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function data_kelas()
    {

        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();
        $isi['content'] = 'tampilan_kelas';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function data_siswa()
    {
        $isi['content'] = 'tampilan_data_siswa';
        $isi['kelas'] = $this->Model_kelas->dataKelas();
        $isi['jurusan'] = $this->Model_jurusan->dataJurusan();
        $isi['siswa'] = $this->Model_siswa->dataSiswa();
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();
        $isi['group_kelas'] = $this->Model_kelas->group_kelas();
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function save_siswa()
    {
        $temp = rand(1111111, 9999999);
        $nis = $this->input->post('nis');
        $nama_siswa = $this->input->post('nama_siswa');
        $jurusan = $this->input->post('jurusan');
        $kelas = $this->input->post('kelas');
        $group_kelas = $this->input->post('group_kelas');
        $tahun_ajaran = $this->input->post('tahun_ajaran');

        $data = array(
            'id_siswa' => $temp,
            'nis' => $nis,
            'nama_siswa' => $nama_siswa,
            'jurusan' => $jurusan,
            'kelas' => $kelas,
            'group_kelas' => $group_kelas,
            'tahun_ajaran' => $tahun_ajaran,

        );

        $this->db->insert('siswa', $data);
        redirect('Dashboard/data_siswa');
    }

    public function daftar_setting_pembayaran()
    {
        $isi['kelas'] = $this->Model_kelas->group_kelas();
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();
        $isi['content'] = 'Setting/tampilan_setting_pembayaran';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }
}

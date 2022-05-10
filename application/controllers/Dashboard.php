<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function index()
    {
        $isi['tahun_ajaran'] = $this->Model_tahun_ajaran->tahun_ajaran();
        $isi['jurusan'] = $this->Model_jurusan->countJurusan();
        $isi['kelas'] = $this->Model_kelas->countKelas();
        $isi['siswa'] = $this->Model_siswa->countSiswa();

        $isi['content'] = 'tampilan_home';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function data_tahun_ajaran()
    {

        $isi['tahun_ajaran'] = $this->Model_tahun_ajaran->dataTahunAjaran();

        $isi['content'] = 'tampilan_data_tahun_ajaran';
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

        $isi['kelas'] = $this->Model_kelas->dataKelas();
        $isi['jurusan'] = $this->Model_jurusan->dataJurusan();
        $isi['siswa'] = $this->Model_siswa->dataSiswa();
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();
        $isi['group_kelas'] = $this->Model_kelas->group_kelas();

        $isi['content'] = 'tampilan_data_siswa';
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

    public function detail_data_siswa($id_tahun_ajaran)
    {
        $isi['header_siswa'] = $this->Model_siswa->header_detail_siswa($id_tahun_ajaran);
        $isi['data_siswa'] = $this->Model_siswa->detail_siswa($id_tahun_ajaran);

        $isi['content'] = 'tampilan_detail_data_siswa';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function daftar_setting_pembayaran()
    {
        $isi['kelas'] = $this->Model_kelas->group_kelas();
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();

        $isi['setting_pembayaran'] = $this->Model_setting_pembayaran->dataSettingpembayaran();
        $isi['content'] = 'Setting/tampilan_setting_pembayaran';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function simpan_setting_pembayaran()
    {
        $id_setting_pembayaran = rand(111111, 999999);
        $nama_pembayaran = $this->input->post('nama_pembayaran');
        $group_kelas = $this->input->post('group_kelas');
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        $jenis_pembayaran = $this->input->post('jenis_pembayaran');
        $nominal = $this->input->post('nominal');

        $data = array(
            'id_setting_pembayaran' => $id_setting_pembayaran,
            'nama_pembayaran' => $nama_pembayaran,
            'id_groupKelas' => $group_kelas,
            'id_tahun_ajaran' => $tahun_ajaran,
            'jenis_pembayaran' => $jenis_pembayaran,
            'nominal' => $nominal,
        );

        $this->db->insert('setting_pembayaran', $data);
        redirect('Dashboard/daftar_setting_pembayaran');
    }
}

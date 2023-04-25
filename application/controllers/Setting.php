<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    // start setting pembayaran spp
    public function setting_pembayaran_spp()
    {
        $isi['kelas'] = $this->Model_kelas->group_kelas();
        $isi['tahun_ajaran'] = $this->Model_tahun_ajaran->listTahunAjaran();
        $this->Model_keamanan->getKeamanan();
        $isi['setting_pembayaran'] = $this->Model_setting_pembayaran->dataSettingpembayaran();
        $isi['content'] = 'Setting/tampilan_setting_pembayaran_spp';
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
        $spp = $this->input->post('spp');
        $tabungan = $this->input->post('tabungan');
        $internet = $this->input->post('internet');
        $praktek = $this->input->post('praktek');
        $komputer = $this->input->post('komputer');
        $mandarin = $this->input->post('mandarin');


        $data = array(
            'id_setting_pembayaran' => $id_setting_pembayaran,
            'nama_pembayaran' => $nama_pembayaran,
            'id_groupKelas' => $group_kelas,
            'id_tahun_ajaran' => $tahun_ajaran,
            'jenis_pembayaran' => $jenis_pembayaran,
            'spp' => $spp,
            'komputer' => $komputer,
            'mandarin' => $mandarin,
            'tabungan' => $tabungan,
            'internet' => $internet,
            'praktek' => $praktek,
        );
        $this->db->insert('setting_pembayaran', $data);
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SETTING PEMBAYARAN SPP BERHASIL DI SIMPAN</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
        redirect('Setting/setting_pembayaran_spp');
    }

    public function detail_setting_pembayaran($id_setting_pembayaran)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['setting_pembayaran'] = $this->Model_setting_pembayaran->detailSettingpembayaran($id_setting_pembayaran);
        $isi['content'] = 'Setting/tampilan_detail_setting_pembayaran';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function hapus_setting_pembayaran_spp($id_setting_pembayaran)
    {
        $this->db->where('id_setting_pembayaran', $id_setting_pembayaran);
        $this->db->delete('setting_pembayaran');
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>SETTING PEMBAYARAN SPP BERHASIL DI HAPUS BERDASARKAN ID </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
        redirect('Setting/setting_pembayaran_spp');
    }
    // End setting pembayaran spp

    // start setting pembayaran adm lain

    public function daftar_setting_pembayaran_adm_lain()
    {
        $isi['kelas'] = $this->Model_kelas->group_kelas();
        $isi['tahun_ajaran'] = $this->Model_tahun_ajaran->listTahunAjaran();
        $this->Model_keamanan->getKeamanan();
        $isi['setting_pembayaran'] = $this->Model_adm_lain->dataAdmLain();
        $isi['content'] = 'Setting/tampilan_setting_pembayaran_adm_lain';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function simpan_setting_pembayaran_lain()
    {
        $id_setting_pembayaran_lain = rand(111111, 999999);
        $nama_pembayaran_lain = $this->input->post('nama_pembayaran');
        $group_kelas = $this->input->post('group_kelas');
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        $jenis_pembayaran = "ADMINISTRASI LAIN";
        $nominal = $this->input->post('nominal');


        $data = array(
            'id_setting_pembayaran_lain' => $id_setting_pembayaran_lain,
            'nama_pembayaran_lain' => $nama_pembayaran_lain,
            'id_groupKelas' => $group_kelas,
            'id_tahun_ajaran' => $tahun_ajaran,
            'jenis_pembayaran' => $jenis_pembayaran,
            'nominal' => $nominal,
        );
        $this->db->insert('setting_pembayaran_lain', $data);
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SETTING PEMBAYARAN ADMINISTRASI LAIN BERHASIL DI SIMPAN</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
        redirect('Setting/daftar_setting_pembayaran_adm_lain');
    }

    public function hapus_setting_pembayaran_adm_lain($id_setting_pembayaran)
    {
        $this->db->where('id_setting_pembayaran_lain', $id_setting_pembayaran);
        $this->db->delete('setting_pembayaran_lain');
        $this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>SETTING PEMBAYARAN ADM LAIN BERHASIL DI HAPUS BERDASARKAN ID </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
        redirect('Setting/daftar_setting_pembayaran_adm_lain');
    }

    
    // End setting pembayaran adm lain
}

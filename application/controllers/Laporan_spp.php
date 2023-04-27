<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_spp extends CI_Controller
{

    // START LAPORAN SPP PER HARI
    public function rekap_spp_perbulan_perhari()
    {
        $isi['spp_perbulan_perhari'] = $this->Model_siswa->pembayaranSPP_perbulan_perhari();
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/laporan/rekap_spp_perbulan_perhari';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function rekap_spp_admin_perhari($bulan_tahun)
    {
        $isi['header'] = $this->Model_pembayaran_spp->rekap_spp_admin_perhari($bulan_tahun);
        $isi['tabel_perhari'] = $this->Model_pembayaran_spp->tabel_rekap_spp_admin_perhari($bulan_tahun);
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/laporan/rekap_spp_perhari';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function print_perhari_pembayaran_spp($hari_bulan_tahun)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['header'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perhari_header($hari_bulan_tahun);
        $isi['siswa'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perhari($hari_bulan_tahun);
        $this->load->view('SPP/print/print_rekap_spp_perhari', $isi);
    }
    // END LAPORAN SPP PER HARI

    // START LAPORAN SPP PER HARI
    public function rekap_spp_perbulan_perbulan()
    {
        $isi['spp_perbulan_perbulan'] = $this->Model_pembayaran_spp->rekap_spp_perbulan_perbulan();
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/laporan/rekap_spp_perbulan_perbulan';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function print_perbulan_pembayaran_spp($bulan_tahun)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['header'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perbulan_header($bulan_tahun);
        $isi['siswa'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perbulan($bulan_tahun);
        $this->load->view('SPP/print/print_rekap_spp_perbulan', $isi);
    }
    // END LAPORAN SPP PER BULAN

    public function rekap_spp_kelas()
    {

        $this->Model_keamanan->getKeamanan();
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();

        $isi['content'] = 'SPP/laporan/rekap_spp_perkelas';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function rekap_pembayaran_spp_kelas($id_tahun_ajaran)
    {

        $isi['kelas'] = $this->Model_kelas->tahun_ajaran_kelas_siswa($id_tahun_ajaran);
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/laporan/tampilan_detail_rekap_kelas';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function print_perkelas_pembayaran_spp($kelas_tahun_ajaran)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['header'] = $this->Model_pembayaran_spp->header_rekap_spp_perbulan_perkerlas($kelas_tahun_ajaran);
        $isi['siswa'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perkerlas($kelas_tahun_ajaran);
        $this->load->view('SPP/print/print_rekap_spp_perkelas', $isi);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    
    public function index()
    {
        $isi['siswa'] = $this->Model_siswa->NISdataSiswaALL();
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/tampilan_pembayaran_spp';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function pembayaran_spp_per_nis($nis)
    {
        $isi['header'] = $this->Model_siswa->HeaderPerNISdataSiswaALL($nis);
        $isi['siswa'] = $this->Model_siswa->PerNISdataSiswaALL($nis);
        $isi['adm_lain'] = $this->Model_adm_lain->AdmLain($nis);
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/pembayaran_spp_per_nis';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function detail_pembayaran_spp($id_siswa)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['siswa'] = $this->Model_siswa->dataSiswaALLFindID($id_siswa);
        $isi['jumlah_bulan'] = $this->Model_pembayaran_spp->countPembayaranSPP($id_siswa);
        $isi['jumlah_bayar'] = $this->Model_pembayaran_spp->jumlahPembayaranSPP($id_siswa);
        $isi['total_bayar'] = $this->Model_pembayaran_spp->totalPembayaranSPP($id_siswa);
        $isi['siswa_spp'] = $this->Model_siswa->SPPdataSiswaALLFindID($id_siswa);
        // $isi['validasi'] = $this->Model_siswa->validasi_generate_pembayaran_spp($id_siswa);


        $isi['content'] = 'SPP/tampilan_detail_pembayaran_spp';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function generate_detail_pembayaran_spp($id_siswa)
    {

        $months = array(
                '1' => 'Augustus',
                '2' => 'September',
                '3' => 'Oktober',
                '4' => 'November',
                '5' => 'Desember',
                '6' => 'Januari',
                '7' => 'Februar',
                '8' => 'Maret',
                '9' => 'April',
                '10' => 'Mei',
                '11' => 'Juni',
            );


        foreach ($months as $key => $value) {
            $data = array(
                    'id_spp_siswa' => rand(11111111, 99999999),
                    'id_siswa' => $id_siswa,
                    'kode_bulan' => $key,
                    'bulan' => $value,
                    'status' => 'BELUM LUNAS',
                    'pembayaran' => 'BELUM LUNAS',
                    'cash' => ' ',
                    'kjp' => ' ',
                    'kjp_cash' => ' ',
                    'date' => date("Y-m-d h:i:sa")

                );
            $this->db->insert('spp_siswa', $data);
        }

        redirect('Pembayaran/detail_pembayaran_spp/' . $id_siswa);
    }

    public function bayar_spp_nonKJP($id_spp_siswa)
    {
        $id_spp_siswa = $this->input->post('id_spp_siswa');
        $id_siswa = $this->input->post('id_siswa');
        $kode_bulan = $this->input->post('kode_bulan');
        $bulan = $this->input->post('bulan');
        $cash = $this->input->post('cash');
        $status = 'LUNAS';
        $pembayaran = 'NON KJP';


        $data = array(
                'id_spp_siswa' => $id_spp_siswa,
                'id_siswa' => $id_siswa,
                'kode_bulan' => $kode_bulan,
                'bulan' => $bulan,
                'status' => $status,
                'pembayaran' => $pembayaran,
                'cash' => $cash,
                'kjp' => ' ',
                'kjp_cash' => ' ',
                'date' => date("Y-m-d h:i:sa")
            );

        $this->db->where('id_spp_siswa', $id_spp_siswa);
        $this->db->update('spp_siswa', $data);
        redirect('Pembayaran/detail_pembayaran_spp/' . $id_siswa);
    }

    public function bayar_spp_KJP($id_spp_siswa)
    {


        // $isi['tabel'] = $this->Model_pembayaran_spp->pembayaran_spp_kjp($id_spp_siswa);
        $this->Model_keamanan->getKeamanan();
        $isi['siswa'] = $this->Model_pembayaran_spp->pembayaran_spp_kjp($id_spp_siswa);
        $isi['content'] = 'SPP/tampilan_detail_pembayaran_spp_kjp';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function simpan_spp_kjp()
    {
        $id_spp_siswa = $this->input->post('id_spp_siswa');
        $id_siswa = $this->input->post('id_siswa');
        $kode_bulan = $this->input->post('kode_bulan');
        $bulan = $this->input->post('bulan');
        $status = 'LUNAS';
        $pembayaran = 'KJP';
        $kjp = $this->input->post('kjp');
        $kjp_cash = $this->input->post('kjp_cash');


        $data = array(
                'id_spp_siswa' => $id_spp_siswa,
                'id_siswa' => $id_siswa,
                'kode_bulan' => $kode_bulan,
                'bulan' => $bulan,
                'status' => $status,
                'pembayaran' => $pembayaran,
                'kjp' => $kjp,
                'kjp_cash' => $kjp_cash,
            );

        $this->db->where('id_spp_siswa', $id_spp_siswa);
        $this->db->update('spp_siswa', $data);
        redirect('Pembayaran/detail_pembayaran_spp/' . $id_siswa);
    }

    public function print_kwitansi($id_spp_siswa)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['kwitansi'] = $this->Model_pembayaran_spp->print_kwitansi_spp($id_spp_siswa);
        $this->load->view('SPP/print_kwitansi', $isi);
    }

    public function rekap_spp_perbulan_perhari()
    {
        $isi['spp_perbulan_perhari'] = $this->Model_siswa->pembayaranSPP_perbulan_perhari();
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/rekap_spp_perbulan_perhari';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }
    public function rekap_spp_perbulan_perbulan()
    {
        $isi['spp_perbulan_perbulan'] = $this->Model_pembayaran_spp->rekap_spp_perbulan_perbulan();
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/rekap_spp_perbulan_perbulan';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function print_perbulan_pembayaran_spp($bulan_tahun)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['header'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perbulan_header($bulan_tahun);
        $isi['siswa'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perbulan($bulan_tahun);
        $this->load->view('SPP/print_rekap_spp_perbulan', $isi);
    }

    public function rekap_spp_admin_perhari($bulan_tahun)
    {
        $isi['header'] = $this->Model_pembayaran_spp->rekap_spp_admin_perhari($bulan_tahun);
        $isi['tabel_perhari'] = $this->Model_pembayaran_spp->tabel_rekap_spp_admin_perhari($bulan_tahun);
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/rekap_spp_perhari';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function print_perhari_pembayaran_spp($hari_bulan_tahun)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['header'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perhari_header($hari_bulan_tahun);
        $isi['siswa'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perhari($hari_bulan_tahun);
        $this->load->view('SPP/print_rekap_spp_perhari', $isi);
    }

    public function rekap_spp_kelas()
    {

        $this->Model_keamanan->getKeamanan();
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();

        $isi['content'] = 'SPP/rekap_spp_perkelas';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function rekap_pembayaran_spp_kelas($id_tahun_ajaran)
    {

        $isi['kelas'] = $this->Model_kelas->tahun_ajaran_kelas_siswa($id_tahun_ajaran);
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'SPP/tampilan_detail_rekap_kelas';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function print_perkelas_pembayaran_spp($kelas_tahun_ajaran)
    {
        $this->Model_keamanan->getKeamanan();
        $isi['header'] = $this->Model_pembayaran_spp->header_rekap_spp_perbulan_perkerlas($kelas_tahun_ajaran);
        $isi['siswa'] = $this->Model_pembayaran_spp->print_rekap_spp_perbulan_perkerlas($kelas_tahun_ajaran);
        $this->load->view('SPP/print_rekap_spp_perkelas', $isi);
    }

    public function daftar_setting_pembayaran_spp()
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
        redirect('Pembayaran/daftar_setting_pembayaran_spp');
    }

    
}

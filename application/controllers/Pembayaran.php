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
            '1' => 'Juli',
            '2' => 'Augustus',
            '3' => 'September',
            '4' => 'Oktober',
            '5' => 'November',
            '6' => 'Desember',
            '7' => 'Januari',
            '8' => 'Februar',
            '9' => 'Maret',
            '10' => 'April',
            '11' => 'Mei',
            '12' => 'Juni',
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
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Dashboard extends CI_Controller
{

	public function index()
	{
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->home_tahun_ajaran();
		$isi['jurusan'] = $this->Model_jurusan->countJurusan();
		$isi['kelas'] = $this->Model_kelas->countKelas();
		$isi['siswa'] = $this->Model_siswa->countSiswaAktif();
		$isi['siswa_tidak_aktif'] = $this->Model_siswa->countSiswaTidakAktif();
		$isi['jumlah_spp_terbaru'] = $this->Model_pembayaran_spp->jumlah_spp_terbaru();
		$isi['jumlah_adm_lain_terbaru'] = $this->Model_pembayaran_spp->jumlah_adm_lain_terbaru();

		// $isi['version'] = 'RC V2.2 rev 1.7';
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_home';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

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
		$isi['version'] = 'RC V2.2 rev 1.7';
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_home';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	// Start Pembayaran SPP
	

	
	// End Pembayaran SPP

	// Administrasi Lain

	public function detail_pembayaran_adm_lain($id_siswa)
	{
		$this->Model_keamanan->getKeamanan();

		$isi['adm_lain'] = $this->Model_adm_lain->siswaAdmLain($id_siswa);
		$isi['header'] = $this->Model_adm_lain->headerAdmLain($id_siswa);

		$isi['dropDown'] = $this->Model_adm_lain->drop_down_adm_lain($id_siswa);
		$isi['tabel'] = $this->Model_adm_lain->detailAdmLain($id_siswa);

		$isi['content'] = 'Adm_lain/tampilan_detail_adm_lain';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}


	public function simpan_pembayaran_adm_lain()
	{
		$id_adm_siswa = rand(111111, 999999);
		$siswa_tahun_ajaran = $this->input->post('siswa_tahun_ajaran');
		$id_setting_pembayaran_lain = $this->input->post('id_setting_pembayaran');
		$cash = $this->input->post('cash');
		$kjp = 0;
		$kjp_cash = 0;
		$data = array(
			'id_adm_siswa' => $id_adm_siswa,
			'id_setting_pembayaran_lain' => $id_setting_pembayaran_lain,
			'siswa_tahun_ajaran' => $siswa_tahun_ajaran,
			'status' => 'LUNAS',
			'jenis_pembayaran' => 'CASH',
			'cash' => $cash,
			'kjp' => $kjp,
			'kjp_cash' => $kjp,
		);

		$this->db->insert('adm_siswa', $data);
		redirect('Dashboard/detail_pembayaran_adm_lain/' . $siswa_tahun_ajaran);
	}

	public function simpan_pembayaran_adm_lain_kjp()
	{
		$id_adm_siswa = rand(111111, 999999);

		$siswa_tahun_ajaran = $this->input->post('siswa_tahun_ajaran');
		$id_setting_pembayaran_lain = $this->input->post('id_setting_pembayaran');
		$cash = 0;
		$kjp = $this->input->post('kjp');
		$kjp_cash = $this->input->post('kjp_cash');;
		$data = array(
			'id_adm_siswa' => $id_adm_siswa,
			'id_setting_pembayaran_lain' => $id_setting_pembayaran_lain,
			'siswa_tahun_ajaran' => $siswa_tahun_ajaran,
			'status' => 'LUNAS',
			'jenis_pembayaran' => 'KJP',
			'cash' => $cash,
			'kjp' => $kjp,
			'kjp_cash' => $kjp_cash,
		);

		$this->db->insert('adm_siswa', $data);
		redirect('Dashboard/detail_pembayaran_adm_lain/' . $siswa_tahun_ajaran);
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
		redirect('Dashboard/daftar_setting_pembayaran_adm_lain');
	}

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
		redirect('Dashboard/daftar_setting_pembayaran_adm_lain');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

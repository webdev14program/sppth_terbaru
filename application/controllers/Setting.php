<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
	// Strat Setting Pembayaran spp

	public function setting_spp()
	{
		$isi['kelas'] = $this->Model_kelas->group_kelas();
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->listTahunAjaran();
		$this->Model_keamanan->getKeamanan();
		$isi['setting_pembayaran'] = $this->Model_setting_pembayaran->dataSettingSPP();
		$isi['content'] = 'Setting/SPP/setting_spp';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function setting_pembayaran_spp($tahun_ajaran)
	{
		$isi['kelas'] = $this->Model_kelas->group_kelas();
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->listTahunAjaran();
		$this->Model_keamanan->getKeamanan();
		$isi['header'] = $this->Model_setting_pembayaran->headerSettingpembayaran($tahun_ajaran);
		$isi['setting_pembayaran'] = $this->Model_setting_pembayaran->dataSettingpembayaran($tahun_ajaran);
		$isi['content'] = 'Setting/SPP/tampilan_setting_pembayaran_spp';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function simpan_setting_pembayaran()
	{
		$id_setting_pembayaran = rand(111111, 999999);
		$nama_pembayaran = "PEMBAYARAN SPP";
		$group_kelas = $this->input->post('group_kelas');
		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$jenis_pembayaran = "1001";
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
		redirect('Setting/setting_spp');
	}

	public function detail_setting_pembayaran($id_setting_pembayaran)
	{
		$this->Model_keamanan->getKeamanan();
		$isi['setting_pembayaran'] = $this->Model_setting_pembayaran->detailSettingpembayaran($id_setting_pembayaran);
		$isi['content'] = 'Setting/SPP/tampilan_detail_setting_pembayaran';
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
		redirect('Setting/setting_spp');
	}

	public function edit_pembayaran($id_setting_pembayaran)
	{
		$this->Model_keamanan->getKeamanan();
		$isi['setting_pembayaran'] = $this->Model_setting_pembayaran->editSettingpembayaran($id_setting_pembayaran);
		$isi['content'] = 'Setting/tampilan_edit_setting_pembayaran';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function simpan_edit_pembayaran_spp()
	{
		$id_setting_pembayaran = $this->input->post('id_setting_pembayara');
		$nama_pembayaran = "Pembayaran SPP";
		$group_kelas = $this->input->post('id_groupKelas');
		$tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$jenis_pembayaran = "1001";
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
		$this->db->where('id_setting_pembayaran', $id_setting_pembayaran);
		$this->db->update('setting_pembayaran', $data);
		redirect('Setting/setting_spp');
	}
	// End setting pembayaran spp

	// start setting pembayaran adm lain

	public function setting_adm_lain()
	{
		$isi['kelas'] = $this->Model_kelas->group_kelas();
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->listTahunAjaran();
		$this->Model_keamanan->getKeamanan();
		$isi['setting_pembayaran'] = $this->Model_adm_lain->dataAdmLain();
		$isi['content'] = 'Setting/Adm_lain/setting_adm_lain';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function detail_setting_pembayaran_adm_lain($id_tahun_ajaran)
	{
		$this->Model_keamanan->getKeamanan();
		$isi['header'] = $this->Model_adm_lain->detail_Header_THAdmLain($id_tahun_ajaran);
		$isi['setting_pembayaran'] = $this->Model_adm_lain->detail_THAdmLain($id_tahun_ajaran);
		$isi['content'] = 'Setting/Adm_lain/detail_adm_lain';
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
		redirect('Setting/setting_adm_lain');
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
		redirect('Setting/setting_adm_lain');
	}
	// End setting pembayaran adm lain

	// start pembayaran uang masuk sekolah
	public function setting_uang_masuk_sekolah()
	{
		$isi['kelas'] = $this->Model_setting_pembayaran->setting_group_kelas();
		$isi['tahun_ajaran'] = $this->Model_setting_pembayaran->setting_tahun_ajaran();
		$isi['setting_spp'] = $this->Model_setting_pembayaran->setting_spp();
		$this->Model_keamanan->getKeamanan();
		$isi['setting_uang_masuk'] = $this->Model_setting_pembayaran->dataSettingpembayaraUangMasuk();
		$isi['content'] = 'Setting/tampilan_setting_pembayaran_uangmasuk_sekolah';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}
	public function simpan_uang_masuk()
	{
		$id_uang_masuk = rand(111111, 999999);
		$id_groupKelas = $this->input->post('id_groupKelas');
		$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$id_setting_pembayaran = $this->input->post('id_setting_pembayaran');
		$uang_pangkal = $this->input->post('uang_pangkal');
		$uang_peralatan = $this->input->post('uang_peralatan');
		$osis = $this->input->post('osis');
		$mos = $this->input->post('mos');
		$kartu_pelajar = $this->input->post('kartu_pelajar');
		$seragam = $this->input->post('seragam');
		$pendaftaran = 100000;

		$data = array(
			'id_uang_masuk' => $id_uang_masuk,
			'id_groupKelas' => $id_groupKelas,
			'id_tahun_ajaran' => $id_tahun_ajaran,
			'id_setting_pembayaran' => $id_setting_pembayaran,
			'uang_pangkal' => $uang_pangkal,
			'uang_peralatan' => $uang_peralatan,
			'osis' => $osis,
			'mos' => $mos,
			'kartu_pelajar' => $kartu_pelajar,
			'seragam' => $seragam,
			'pendaftaran' => $pendaftaran,
		);
		$this->db->insert('setting_pembayaran_uang_masuk', $data);
		$this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SETTING PEMBAYARAN UANG MASUK SEKOLAH BERHASIL DI SIMPAN DI SIMPAN</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
		redirect('Setting/setting_uang_masuk_sekolah');
	}

	public function detail_setting_uang_masuk($id_setting_pembayaran)
	{
		$this->Model_keamanan->getKeamanan();
		$isi['setting_pembayaran'] = $this->Model_setting_pembayaran->detailSettingpembayaranUangMasuk($id_setting_pembayaran);
		$isi['content'] = 'Setting/tampilan_detail_setting_uang_masuk';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}
	// end pembayaran uang masuk sekolah

	// start setting sistem
	public function setting_sistem()
	{
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_setting_sistem';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function hapus_data_spp_all()
	{
		$this->Model_keamanan->getKeamanan();
		$this->db->empty_table('setting_pembayaran');
		$this->db->empty_table('spp_siswa');
		$this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>HAPUS SEMUA PEMBAYARAN SPP</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
		redirect('Setting/setting_sistem');
	}

	public function hapus_data_admLain_all()
	{
		$this->Model_keamanan->getKeamanan();
		$this->db->empty_table('setting_pembayaran_lain');
		$this->db->empty_table('adm_siswa');
		$this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>HAPUS SEMUA PEMBAYARAN ADM LAIN</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
		redirect('Setting/setting_sistem');
	}
	// end setting sistem

	public function setting_daftar_ulang()
	{
		$isi['content'] = 'Setting/tampilan_setting_daftar_ulang';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}
}

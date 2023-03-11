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
		$isi['version'] = 'RC V2.2 rev 1.6';
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_home';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	// Start Data Master
	public function data_tahun_ajaran()
	{
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->dataTahunAjaran();

		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_data_tahun_ajaran';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function data_jurusan()
	{

		$isi['jurusan'] = $this->Model_jurusan->dataJurusan();

		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_jurusan';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function data_kelas()
	{

		$isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'Kelas/tampilan_kelas';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function detail_kelas($id_tahun_ajaran)
	{

		$isi['kelas'] = $this->Model_kelas->tahun_ajaran_kelas($id_tahun_ajaran);
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'Kelas/tampilan_detail_kelas';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function upload_kelas()
	{
		if ($this->input->post('submit', TRUE) == 'upload') {
			$config['upload_path']      = './temp_doc/';
			$config['allowed_types']    = 'xlsx|xls';
			$config['file_name']        = 'doc' . time();

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('excel')) {
				$file   = $this->upload->data();

				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->open('temp_doc/' . $file['file_name']);


				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					$save   = array();
					foreach ($sheet->getRowIterator() as $row) {

						if ($numRow > 1) {

							$cells = $row->getCells();

							$data = array(
								'id'              => $cells[0],
								'kode'     => $cells[1],
								'kelas'            => $cells[2],
								'id_tahun_ajaran'            => $cells[3],
							);
							array_push($save, $data);
						}
						$numRow++;
					}
					$this->Model_kelas->simpan_kelas($save);
					$reader->close();
					unlink('temp_doc/' . $file['file_name']);
					$this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Kelas Berhasil Di Tambah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
					redirect('Dashboard/data_kelas');
				}
			} else {
				echo "Error :" . $this->upload->display_errors();
			}
		}
	}

	public function hapus_all_kelas()
	{
		$this->db->empty_table('kelas');
		$this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Kelas Berhasil Di Hapus</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
		redirect('Dashboard/data_kelas');
	}

	public function data_siswa()
	{
		$this->Model_keamanan->getKeamanan();
		$isi['kelas'] = $this->Model_kelas->dataKelasAktif();
		$isi['jurusan'] = $this->Model_jurusan->dataJurusan();
		$isi['siswa'] = $this->Model_siswa->dataSiswa();
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->dataTahunAjaran();
		$isi['group_kelas'] = $this->Model_kelas->group_kelas();

		$isi['content'] = 'tampilan_data_siswa';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function hapus_all_siswa()
	{
		$this->db->empty_table('siswa');
		$this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Siswa Berhasil Di Hapus Semua</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
		redirect('Dashboard/data_siswa');
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

	public function upload_siswa()
	{
		if ($this->input->post('submit', TRUE) == 'upload') {
			$config['upload_path']      = './temp_doc/';
			$config['allowed_types']    = 'xlsx|xls';
			$config['file_name']        = 'doc' . time();

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('excel')) {
				$file   = $this->upload->data();

				$reader = ReaderEntityFactory::createXLSXReader();
				$reader->open('temp_doc/' . $file['file_name']);


				foreach ($reader->getSheetIterator() as $sheet) {
					$numRow = 1;
					$save   = array();
					foreach ($sheet->getRowIterator() as $row) {

						if ($numRow > 1) {

							$cells = $row->getCells();

							$data = array(
								'id_siswa'              => $cells[0],
								'nis'     => $cells[1],
								'nama_siswa'            => $cells[2],
								'jurusan'            => $cells[3],
								'kelas'            => $cells[4],
								'group_kelas'            => $cells[5],
								'tahun_ajaran'            => $cells[6],
								'status'            => $cells[7],
							);
							array_push($save, $data);
						}
						$numRow++;
					}
					$this->Model_siswa->simpanSiswa($save);
					$reader->close();
					unlink('temp_doc/' . $file['file_name']);
					$this->session->set_flashdata('pesan', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Siswa Berhasil Di Upload</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        </div>
        </div>');
					redirect('Dashboard/data_siswa');
				}
			} else {
				echo "Error :" . $this->upload->display_errors();
			}
		}
	}

	public function data_siswa_non_aktif()
	{
		$isi['data_siswa'] = $this->Model_siswa->data_siswa_non_aktif();
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_data_siswa_non_aktif';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public function simpan_siswa_non_aktif()
	{
		$id_siswa = $this->input->post('id_siswa');
		$nis = $this->input->post('nis');
		$nama_siswa = $this->input->post('nama_siswa');
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		$group_kelas = $this->input->post('group_kelas');
		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$status = $this->input->post('status');

		$data = array(
			'id_siswa' => $id_siswa,
			'nis' => $nis,
			'nama_siswa' => $nama_siswa,
			'jurusan' => $jurusan,
			'kelas' => $kelas,
			'group_kelas' => $group_kelas,
			'tahun_ajaran' => $tahun_ajaran,
			'status' => $status,
		);

		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('siswa', $data);
		redirect('Dashboard/data_siswa_non_aktif');
	}

	public function detail_data_siswa($id_tahun_ajaran)
	{
		$isi['header_siswa'] = $this->Model_siswa->header_detail_siswa($id_tahun_ajaran);
		$isi['data_siswa'] = $this->Model_siswa->detail_siswa($id_tahun_ajaran);
		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_detail_data_siswa';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}
	// End Data Master

	// Start Pembayaran SPP
	public function pembayaran_spp()
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
				'id_spp_siswa' => rand(11111, 99999),
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

		redirect('Dashboard/detail_pembayaran_spp/' . $id_siswa);
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
		redirect('Dashboard/detail_pembayaran_spp/' . $id_siswa);
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
		redirect('Dashboard/detail_pembayaran_spp/' . $id_siswa);
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
		$isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();
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
		redirect('Dashboard/daftar_setting_pembayaran_spp');
	}
	// End Pembayaran SPP

	// Administrasi Lain

	public function detail_pembayaran_adm_lain($id_siswa)
	{
		$this->Model_keamanan->getKeamanan();
		$isi['adm_lain'] = $this->Model_adm_lain->siswaAdmLain($id_siswa);
		$isi['header'] = $this->Model_adm_lain->headerAdmLain($id_siswa);
		$isi['content'] = 'Adm_lain/tampilan_detail_adm_lain';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}
	// End Administrasi Lain

	public function simpan_pembayaran_adm_lain()
	{
		$id_adm_siswa = rand(111111, 999999);
		$siswa_tahun_ajaran = $this->input->post('siswa_tahun_ajaran');
		$id_setting_pembayaran_lain = $this->input->post('id_setting_pembayaran_lain');
		$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$id_groupKelas = $this->input->post('id_groupKelas');
		$nominal = $this->input->post('nominal');

		$data = array(
			'id_adm_siswa' => $id_adm_siswa,
			'siswa_tahun_ajaran' => $siswa_tahun_ajaran,
			'id_setting_pembayaran_lain' => $id_setting_pembayaran_lain,
			'id_tahun_ajaran' => $id_tahun_ajaran,
			'id_groupKelas' => $id_groupKelas,
			'status' => 'LUNAS',
			'jenis_pembayaran' => 'CASH',
			'nominal' => $nominal,
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

	public function hapus_setting_pembayaran($id_setting_pembayaran)
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
		redirect('Dashboard/daftar_setting_pembayaran_spp');
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
		$isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();
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

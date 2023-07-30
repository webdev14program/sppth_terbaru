<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adm_lain extends CI_Controller
{

	public function detail_pembayaran_adm_lain($id_siswa)
	{
		$this->Model_keamanan->getKeamanan();

		$isi['adm_lain'] = $this->Model_adm_lain->siswaAdmLain($id_siswa);
		$isi['header'] = $this->Model_adm_lain->headerAdmLain($id_siswa);

		$isi['tableDown'] = $this->Model_adm_lain->dropdown_tabel($id_siswa);
		$isi['tabel'] = $this->Model_adm_lain->detailAdmLain($id_siswa);
		$isi['table_kjp'] = $this->Model_adm_lain->detailAdmLainKJP($id_siswa);

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
		$this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>PEMBAYARAN ADM LAIN BERHASIL DI TAMBAH BERDASARKAN ID </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
		redirect('Adm_lain/detail_pembayaran_adm_lain/' . $siswa_tahun_ajaran);
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
		redirect('Adm_lain/detail_pembayaran_adm_lain/' . $siswa_tahun_ajaran);
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
		redirect('Adm_lain/daftar_setting_pembayaran_adm_lain');
	}
}

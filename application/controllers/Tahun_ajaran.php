<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller
{


	public function index()
	{
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->dataTahunAjaran();

		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_data_tahun_ajaran';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

	public  function simpan()
	{

		$id_tahun_ajaran = rand(111111, 999999);
		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$status = 'AKTIF';

		$data = array(
			'id_tahun_ajaran' => $id_tahun_ajaran,
			'tahun_ajaran' => $tahun_ajaran,
			'status' => $status,
		);
		$this->db->insert('tahun_ajaran', $data);
		$this->session->set_flashdata('info', '<div class="row">
        <div class="col-md mt-2">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>TAHUN BERHASIL DI SIMPAN</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        </div>');
		redirect('Tahun_ajaran');
	}
}

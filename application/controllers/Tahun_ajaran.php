<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller {

	
	public function index()
	{
		$isi['tahun_ajaran'] = $this->Model_tahun_ajaran->dataTahunAjaran();

		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_data_tahun_ajaran';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}
}

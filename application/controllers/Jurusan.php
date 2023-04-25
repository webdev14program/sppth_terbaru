<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function index()
	{
        $isi['jurusan'] = $this->Model_jurusan->dataJurusan();

		$this->Model_keamanan->getKeamanan();
		$isi['content'] = 'tampilan_jurusan';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}

}

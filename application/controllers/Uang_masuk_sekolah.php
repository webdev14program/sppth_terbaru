<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_masuk_sekolah extends CI_Controller
{
	public function index()
	{

		$isi['content'] = 'Uang_Masuk/tampilan_jurusan';
		$this->load->view('templates/header');
		$this->load->view('tampilan_dashboard', $isi);
		$this->load->view('templates/footer');
	}
}

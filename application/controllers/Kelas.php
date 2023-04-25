<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class kelas extends CI_Controller {

	
	public function index()
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
					redirect('Kelas');
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
		redirect('Kelas');
	}
}

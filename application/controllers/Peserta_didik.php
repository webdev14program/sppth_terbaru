<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/spout/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Peserta_didik extends CI_Controller
{

    public function index()
    {
        $this->Model_keamanan->getKeamanan();
        $isi['kelas'] = $this->Model_kelas->dataKelasAktif();
        $isi['jurusan'] = $this->Model_jurusan->dataJurusan();
        $isi['siswa'] = $this->Model_siswa->dataSiswa();
        $isi['tahun_ajaran'] = $this->Model_tahun_ajaran->dataTahunAjaran();
        $isi['group_kelas'] = $this->Model_kelas->group_kelas();

        $isi['content'] = 'Siswa/tampilan_data_siswa';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
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
                    redirect('Peserta_didik');
                }
            } else {
                echo "Error :" . $this->upload->display_errors();
            }
        }
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
        redirect('Peserta_didik');
    }

    public function data_siswa_non_aktif()
    {
        $isi['data_siswa'] = $this->Model_siswa->data_siswa_non_aktif();
        $this->Model_keamanan->getKeamanan();
        $isi['content'] = 'siswa/tampilan_data_siswa_non_aktif';
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
        $isi['content'] = 'Siswa/tampilan_detail_data_siswa';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function nis_siswa_tahun_ajaran()
    {

        $this->Model_keamanan->getKeamanan();
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();

        $isi['content'] = 'Siswa/tampilan_nis_siswa_tahun_ajaran';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }

    public function detail_nis_kelas_tahun_ajaran($tahun_ajaran)
    {
        $isi['tahun_ajaran'] = $this->Model_kelas->tahun_ajaran();

        $isi['content'] = 'Siswa/tampilan_nis_siswa_tahun_ajaran';
        $this->load->view('templates/header');
        $this->load->view('tampilan_dashboard', $isi);
        $this->load->view('templates/footer');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_keamanan extends CI_Model
{
    public function getKeamanan()
    {
        $username = $this->session->userdata('username');
        if (empty($username)) {
            $this->session->sess_destroy();
            redirect('/');
        }
    }
}

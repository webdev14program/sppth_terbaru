<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{
    public function cek_login($username, $pass)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $pass);
        return $this->db->get('auth');
    }
}

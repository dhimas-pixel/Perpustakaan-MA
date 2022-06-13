<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Siswa';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        $data['siswa'] = $this->db->get('anggota')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/index');
        $this->load->view('templates/footer');
    }
}

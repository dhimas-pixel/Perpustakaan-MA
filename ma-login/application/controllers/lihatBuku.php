<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lihatBuku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Lihat Buku';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        // Tabel Buku
        $data['lihat'] = $this->db->get('info_buku')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/lihat');
        $this->load->view('templates/footer');
    }
}

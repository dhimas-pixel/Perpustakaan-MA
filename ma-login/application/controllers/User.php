<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Info';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        $ambil = $this->session->userdata('email');
        $query = "SELECT `anggota`.`kode_anggota`, `anggota`.`nama_anggota` FROM anggota, account WHERE `account`.`id_anggota` = `anggota`.`id_anggota` and `account`.`email` = '$ambil'";
        $detail = $this->db->query($query)->row_array();
        $nama = $detail['nama_anggota'];
        $data['info'] = $this->db->query("SELECT * FROM info_peminjaman WHERE nama_anggota = '$nama' and status = 'Belum Kembali'")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
}

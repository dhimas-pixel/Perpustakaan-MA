<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Pengembalian';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        // Tabel Peminjaman
        $data['pengembalian'] = $this->db->get('info_pengembalian')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pengembalian/index');
        $this->load->view('templates/footer');
    }

    public function tambah($id_peminjaman)
    {
        $data = $this->Model->getDataPinjam($id_peminjaman);

        // Rumus Denda
        date_default_timezone_set('Asia/Jakarta');
        $tgl_kembali = new DateTime($data->tanggal_kembali);
        $tgl_sekarang = new DateTime();
        $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
        $hasil = 0;
        if ($tgl_kembali >= $tgl_sekarang or $selisih == 0) {
            $hasil = 0;
        } else {
            $hasil = $selisih * 500;
        }
        // ---------------------------
        $id2 = $data->id_peminjaman;
        $kembali2 = date('Y-m-d');
        // Manggil Tabel
        $query = $this->db->get('pengembalian')->result_array();
        $query2 = $this->db->query("SELECT id_pengembalian from pengembalian where id_peminjaman = $id2 and tanggal_pengembalian = curdate()")->row();
        foreach ($query as $row) {
            $id = $row['id_peminjaman'];
            $kembali = $row['tanggal_pengembalian'];

            if ($id == $id2 and $kembali == $kembali2) {
                $kembalikan = array(
                    'id_pengembalian' => $query2->id_pengembalian,
                    'id_buku' => $data->id_buku
                );
                $insert = $this->db->insert('pengembalian_detail', $kembalikan);
                if ($insert = true) {
                    $edit = array(
                        'status'  => "Sudah Kembali"
                    );
                    $this->Model->edit_pinjam($edit, $data->id_buku, $id2);
                    redirect('peminjaman');
                }
                break;
            }
        }
        if ($id != $id2 or $kembali != $kembali2) {
            $input = [
                'id_peminjaman' => $id2,
                'tanggal_pengembalian' => $kembali2,
                'denda' => $hasil,
            ];
            $this->db->insert('pengembalian', $input);
            $query3 = $this->db->query("SELECT id_pengembalian from pengembalian where id_peminjaman = $id2 and tanggal_pengembalian = curdate()")->row();
            $kembalikan = array(
                'id_pengembalian' => $query3->id_pengembalian,
                'id_buku' => $data->id_buku
            );
            $insert = $this->db->insert('pengembalian_detail', $kembalikan);
            if ($insert = true) {
                $edit = array(
                    'status'  => "Sudah Kembali"
                );
                $this->Model->edit_pinjam($edit, $data->id_buku, $id2);
                redirect('peminjaman');
            }
        }
    }

    public function pdf($jenis = 'pdf')
    {
        if ($jenis == 'pdf') {
            $data['title'] = 'Laporan Peminjaman';
            $data['pengembalian'] = $this->db->get('info_pengembalian')->result_array();
            $html = $this->load->view('pengembalian/laporan', $data, true);
            generatePdf($html, 'Laporan Buku', 'A4', 'landscape');
        }
    }
}

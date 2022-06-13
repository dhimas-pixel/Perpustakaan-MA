<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Peminjaman';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        // Tabel Peminjaman
        $data['peminjaman'] = $this->db->get('info_peminjaman')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peminjaman/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Peminjaman';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        // Validation
        $this->form_validation->set_rules('siswa', 'Nama Siswa', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('peminjaman/tambah');
            $this->load->view('templates/footer');
        } else {
            // Periksa Data ada atau tidak

            // Ambil Data di Input
            $id2 = $this->input->post('id_anggota');
            $pinjam2 = $this->input->post('tgl_pinjam');
            $kembali2 = $this->input->post('tgl_kembali');
            // Manggil Tabel
            $query = $this->db->get('peminjaman')->result_array();
            $query2 = $this->db->query("SELECT id_peminjaman from peminjaman where id_anggota = $id2 and tanggal_pinjam = curdate()")->row();

            foreach ($query as $row) {
                $id = $row['id_anggota'];
                $pinjam = $row['tanggal_pinjam'];
                $kembali = $row['tanggal_kembali'];

                if ($id == $id2 and $pinjam == $pinjam2 and $kembali == $kembali2) {
                    $buku = $_POST['id_buku']; // Ambil data buku dan masukkan ke variabel buku
                    $data = array();

                    $index = 0; // Set index array awal dengan 0
                    foreach (array_diff($buku, array('')) as $databuku) { // Kita buat perulangan berdasarkan buku sampai data terakhir
                        array_push($data, array(
                            'id_peminjaman' => $query2->id_peminjaman,
                            'id_buku' => $databuku,
                            'status' => 'Belum Kembali'
                        ));

                        $index++;
                    }
                    $this->db->insert_batch('peminjaman_detail', $data);
                    redirect('peminjaman');
                    break;
                }
            }
            if ($id != $id2 or $pinjam != $pinjam2 or $kembali != $kembali2) {
                $input = [
                    'id_anggota' => $id2,
                    'tanggal_pinjam' => $pinjam2,
                    'tanggal_kembali' => $kembali2,
                ];
                $this->db->insert('peminjaman', $input);
                $query3 = $this->db->query("SELECT id_peminjaman from peminjaman where id_anggota = $id2 and tanggal_pinjam = curdate()")->row();
                $buku = $_POST['id_buku']; // Ambil data buku dan masukkan ke variabel buku
                $data = array();

                $index = 0; // Set index array awal dengan 0
                foreach (array_diff($buku, array('')) as $databuku) { // Kita buat perulangan berdasarkan buku sampai data terakhir
                    array_push($data, array(
                        'id_peminjaman' => $query3->id_peminjaman,
                        'id_buku' => $databuku,
                        'status' => 'Belum Kembali'
                    ));
                    $index++;
                }
                $this->db->insert_batch('peminjaman_detail', $data);
                $this->session->set_flashdata('status', 'Data Berhasil di Simpan');
                redirect('peminjaman');
            }
        }
    }

    public function pdf($jenis = 'pdf')
    {
        if ($jenis == 'pdf') {
            $data['title'] = 'Laporan Peminjaman';
            $data['pinjam'] = $this->db->get('info_peminjaman')->result_array();
            $html = $this->load->view('peminjaman/laporan', $data, true);
            generatePdf($html, 'Laporan Buku', 'A4', 'landscape');
        }
    }

    public function getDataAutoCompleteBuku()
    {
        $autocomplete = $this->input->get('term');
        if ($autocomplete) {
            $getDataAutoComplete = $this->Model->getDataAutoCompleteBuku($autocomplete);
            foreach ($getDataAutoComplete as $row) {
                $result[] = array(
                    'label' => $row['kode_buku'] . " - " . $row['judul_buku'],
                    'id_buku' => $row['id_buku'],
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($result));
            }
        }
    }

    public function getDataAutoCompletePinjam()
    {
        $autocomplete = $this->input->get('term');
        if ($autocomplete) {
            $getDataAutoComplete = $this->Model->getDataAutoCompletePinjam($autocomplete);
            foreach ($getDataAutoComplete as $row) {
                $result[] = array(
                    'label' => $row['nis_lokal'] . " - " . $row['nama_anggota'],
                    'id_anggota' => $row['id_anggota'],
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($result));
            }
        }
    }

    public function getSisa()
    {
        $getValue = $this->input->post('kode');
        if ($getValue) {
            $row = $this->Model->getCountStatus($getValue);
            $result = array(
                'jumlah' => $row['jumlah_peminjaman'],
            );
            echo json_encode($result);
        }
    }
}

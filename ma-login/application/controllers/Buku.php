<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Buku';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        // Tabel Buku
        $data['buku'] = $this->db->get('info_buku')->result_array();

        // Tabel Kategori
        $this->db->select('*');
        $data['kategori'] = $this->db->get('kategori')->result_array();

        // Tabel Penulis
        $this->db->select('*');
        $data['penulis'] = $this->db->get('penulis')->result_array();

        // Tabel Penerbit
        $this->db->select('*');
        $data['penerbit'] = $this->db->get('penerbit')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('buku/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Buku';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();
        // Get Kategori
        $this->db->select('*');
        $data['kats'] = $this->db->get('kategori')->result_array();

        // Validation
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'trim|required');
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'trim|required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('id_penulis', 'Penulis', 'trim|required');
        $this->form_validation->set_rules('id_penerbit', 'Penerbit', 'trim|required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok Buku', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('buku/tambah');
            $this->load->view('templates/footer');
        } else {
            $input = [
                'kode_buku' => htmlspecialchars($this->input->post('kode_buku'), true),
                'judul_buku' => htmlspecialchars($this->input->post('judul_buku'), true),
                'id_kategori' => $this->input->post('kategori'),
                'id_penulis' => $this->input->post('id_penulis'),
                'id_penerbit' => $this->input->post('id_penerbit'),
                'tahun_penerbit' => $this->input->post('tahun_terbit'),
                'stok' => $this->input->post('stok')
            ];

            if ($this->db->insert('buku', $input) > 0) {
                $this->session->set_flashdata('status', 'Data Berhasil di Simpan');
                redirect('buku');
            } else {
                $this->session->set_flashdata('status', 'Server Gangguan');
                redirect('buku');
            }
        }
    }

    public function pdf($jenis = 'pdf')
    {
        if ($jenis == 'pdf') {
            $data['title'] = 'Laporan Buku';
            $data['buku'] = $this->db->get('info_buku')->result_array();
            $html = $this->load->view('buku/laporan', $data, true);
            generatePdf($html, 'Laporan Buku', 'A4', 'landscape');
        }
    }

    function edit($id_buku)
    {
        $data['title'] = 'Buku';
        $data['akun'] = $this->db->get_where('account', ['email' => $this->session->userdata('email')])->row_array();

        $where = array('id_buku' => $id_buku);
        $data['buku'] = $this->Model->edit_buku($where, 'info_buku')->result();

        $this->db->select('*');
        $data['kats'] = $this->db->get('kategori')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kode_buku = $this->input->post('kode_buku');
        $judul_buku = $this->input->post('judul_buku');
        $kategori = $this->input->post('kategori');
        $penulis = $this->input->post('id_penulis');
        $penerbit = $this->input->post('id_penerbit');
        $tahun_terbit = $this->input->post('tahun_terbit');

        $input = [
            'kode_buku' => $kode_buku,
            'judul_buku' => $judul_buku,
            'id_kategori' => $kategori,
            'id_penulis' => $penulis,
            'id_penerbit' => $penerbit,
            'tahun_penerbit' => $tahun_terbit,
        ];

        $where = array(
            'id_buku' => $id
        );

        $this->Model->update_data($where, $input, 'buku');
        $this->session->set_flashdata('status', 'Data Berhasil di Ubah');
        redirect('buku');
    }

    public function hapus($id_buku)
    {
        $this->Model->hapus_Buku($id_buku);
        $this->session->set_flashdata('status', 'Data Berhasil di Hapus');
        redirect('buku');
    }

    public function tambahKategori()
    {
        // validasi kategori
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == false) {
            redirect('buku');
        } else {
            // insert kategori
            $this->db->insert('kategori', ['nama_kategori' => $this->input->post('nama_kategori')]);
            $this->session->set_flashdata('kategori', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('buku');
        }
    }

    public function editKategori()
    {
        // edit
        $id = $this->input->post('id_kategori');
        $data = array(
            'nama_kategori'  => $this->input->post('nama_kategori'),
        );
        $this->Model->edit_kategori($data, $id);
        $this->session->set_flashdata('kategori', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('buku');
    }

    public function hapusKategori($id_kategori)
    {
        $this->Model->hapus_kategori($id_kategori);
        $this->session->set_flashdata('kategori', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('buku');
    }

    public function tambahPenulis()
    {
        // validasi Penulis
        $this->form_validation->set_rules('nama_penulis', 'Nama Penulis', 'required');

        if ($this->form_validation->run() == false) {
            redirect('buku');
        } else {
            // insert kategori
            $this->db->insert('penulis', ['nama_penulis' => $this->input->post('nama_penulis')]);
            $this->session->set_flashdata('penulis', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('buku');
        }
    }

    public function editPenulis()
    {
        // edit
        $id = $this->input->post('id_penulis');
        $data = array(
            'nama_penulis'  => $this->input->post('nama_penulis'),
        );
        $this->Model->edit_penulis($data, $id);
        $this->session->set_flashdata('penulis', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('buku');
    }

    public function hapusPenulis($id_penulis)
    {
        $this->Model->hapus_penulis($id_penulis);
        $this->session->set_flashdata('penulis', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('buku');
    }

    public function tambahPenerbit()
    {
        // validasi Penulis
        $this->form_validation->set_rules('nama_penerbit', 'Nama Penerbit', 'required');

        if ($this->form_validation->run() == false) {
            redirect('buku');
        } else {
            // insert kategori
            $this->db->insert('penerbit', ['nama_penerbit' => $this->input->post('nama_penerbit')]);
            $this->session->set_flashdata('penerbit', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('buku');
        }
    }

    public function editPenerbit()
    {
        // edit 
        $id = $this->input->post('id_penerbit');
        $data = array(
            'nama_penerbit'  => $this->input->post('nama_penerbit'),
        );
        $this->Model->edit_penerbit($data, $id);
        $this->session->set_flashdata('penerbit', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('buku');
    }

    public function hapusPenerbit($id_penerbit)
    {
        $this->Model->hapus_penerbit($id_penerbit);
        $this->session->set_flashdata('penerbit', '<div class="alert alert-success alert-dismissible" role="alert">
            Data Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('buku');
    }

    public function getDataAutoCompletePenulis()
    {
        $autocomplete = $this->input->get('term');
        if ($autocomplete) {
            $getDataAutoComplete = $this->Model->getDataAutoCompletePenulis($autocomplete);
            foreach ($getDataAutoComplete as $row) {
                $result[] = array(
                    'label' => $row['nama_penulis'],
                    'id_penulis' => $row['id_penulis']
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($result));
            }
        }
    }

    public function getDataAutoCompletePenerbit()
    {
        $autocomplete = $this->input->get('term');
        if ($autocomplete) {
            $getDataAutoComplete = $this->Model->getDataAutoCompletePenerbit($autocomplete);
            foreach ($getDataAutoComplete as $row) {
                $result[] = array(
                    'label' => $row['nama_penerbit'],
                    'id_penerbit' => $row['id_penerbit']
                );
                $this->output->set_content_type('application/json')->set_output(json_encode($result));
            }
        }
    }
}

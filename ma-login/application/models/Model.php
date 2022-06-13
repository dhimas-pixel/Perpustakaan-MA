<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{

    public function getDataAutoCompletePenulis($autocomplete)
    {
        $this->db->select('*');
        $this->db->from('penulis');
        $this->db->like('nama_penulis', $autocomplete);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function getDataAutoCompletePenerbit($autocomplete)
    {
        $this->db->select('*');
        $this->db->from('penerbit');
        $this->db->like('nama_penerbit', $autocomplete);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function getDataAutoCompletePinjam($autocomplete)
    {
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->like('nama_anggota', $autocomplete);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function getDataAutoCompleteBuku($autocomplete)
    {
        $this->db->select('*');
        $this->db->from('buku');
        $this->db->like('judul_buku', $autocomplete);
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    public function getCountStatus($getValue)
    {
        $this->db->select('COUNT(peminjaman_detail.id_peminjaman) AS jumlah_peminjaman');
        $this->db->join('anggota', 'anggota.id_anggota = peminjaman.id_anggota');
        $this->db->join('peminjaman_detail', 'peminjaman.id_peminjaman = peminjaman_detail.id_peminjaman');
        $this->db->where('anggota.id_anggota', $getValue);
        $this->db->where('peminjaman_detail.status', 'Belum Kembali');
        return $this->db->get('peminjaman')->row_array();
    }

    function edit_penerbit($data, $id)
    {
        $this->db->where('id_penerbit', $id);
        $this->db->update('penerbit', $data);
        return TRUE;
    }

    function hapus_penerbit($id)
    {
        $this->db->where('id_penerbit', $id);
        $this->db->delete('penerbit');
    }

    function edit_penulis($data, $id)
    {
        $this->db->where('id_penulis', $id);
        $this->db->update('penulis', $data);
        return TRUE;
    }

    function hapus_penulis($id)
    {
        $this->db->where('id_penulis', $id);
        $this->db->delete('penulis');
    }

    function edit_kategori($data, $id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
        return TRUE;
    }

    function hapus_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    function hapus_buku($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
    }

    public function getDataPinjam($id)
    {
        $this->db->select('*');
        $this->db->where('id_peminjaman', $id);
        return $this->db->get('info_peminjaman')->row();
    }

    function edit_pinjam($data, $id2, $id)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->where('id_buku', $id2);
        $this->db->update('peminjaman_detail', $data);
        return TRUE;
    }

    function edit_buku($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

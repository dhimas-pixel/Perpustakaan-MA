<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->session->sess_destroy();
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('account', ['email' => $email])->row_array();

        //  Jika User Terdaftar
        if ($user != null) {
            // Jika User Aktif
            if ($user['is_active'] == 1) {
                // Cek Password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Aktif!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email Belum Terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registrasion()
    {
        $this->form_validation->set_rules('nis', 'Nis', 'required|trim|callback_nis_check|callback_nis_same');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[account.email]', [
            'is_unique' => 'Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!', 'min_length' => 'Password Sangat Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth_footer');
        } else {
            $foto = $_FILES['foto'];
            if ($foto = '') {
            } else {
                $config['upload_path']          = './gambar/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo "Upload Gagal";
                    die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
            $ambil = htmlspecialchars($this->input->post('nis', true));
            $id = $this->db->query("SELECT id_anggota FROM anggota WHERE kode_anggota = $ambil");
            $id2 = $id->row();
            $data = [
                'id_anggota' => $id2->id_anggota,
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
                'gambar' => $foto
            ];

            $this->db->insert('account', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Akun Anda Berhasil Dibuat!
              </div>');
            redirect('auth');
        }
    }

    public function nis_check()
    {
        $post = $this->input->post('nis');
        $query = $this->db->query("SELECT * FROM anggota WHERE kode_anggota = '$post'");
        if ($query->num_rows() > 0) {
            return true;
        } else {
            $this->form_validation->set_message('nis_check', 'NIS tidak terdaftar!');
            return false;
        }
    }

    public function nis_same()
    {
        $post = $this->input->post('nis');
        $query = $this->db->query("SELECT account.* FROM account, anggota WHERE account.id_anggota = anggota.id_anggota and kode_anggota = '$post'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('nis_same', 'NIS sudah terpakai!');
            return false;
        } else {
            return true;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda Berhasil Logout!
          </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}

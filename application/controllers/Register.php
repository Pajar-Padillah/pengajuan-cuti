<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function register()
    {
        $this->load->view('v_register');
    }

    public function proses()
    {
        $nip = $this->input->post("nip");
        $username = $this->input->post("username");
        $password = get_hash($this->input->post("password"));
        $email = $this->input->post("email");
        $id_user_level = 1;

        $a = $this->db->query("select * from user where nip = '$nip' or email = '$email'");
        if ($a->num_rows() > 0) {
            $this->session->set_flashdata('data-error', 'data-error');
            redirect(base_url('register/register'));
        } else {
            $hasil = $this->m_user->pendaftaran_user($nip, $username, $email, $password, $id_user_level);

            if ($hasil == false) {
                $this->session->set_flashdata('eror', 'eror');
                redirect('register/register');
            } else {
                $this->session->set_flashdata('input', 'input');
                redirect('login/login');
            }
        }
    }
}

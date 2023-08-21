<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function view_super_admin()
    {
        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

            $data['data_level'] = $this->m_user->get_level()->result_array();
            $data['admin_data'] = $this->m_user->get_all_admin()->result_array();

            $this->load->view('super_admin/admin', $data);
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }

    public function tambah_user()
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {


            $username = $this->input->post("username");
            $password = get_hash($this->input->post("password"));
            $email = $this->input->post("email");
            $id_user_level = $this->input->post("level");

            $a = $this->db->query("select * from user where email = '$email'");
            if ($a->num_rows() > 0) {
                $this->session->set_flashdata('data-error', 'data-error');
                redirect(base_url('Admin/view_super_admin'));
            } else {
                $hasil = $this->m_user->pendaftaran_admin($username, $email, $password, $id_user_level);

                if ($hasil == false) {
                    $this->session->set_flashdata('eror', 'eror');
                    redirect('Admin/view_super_admin');
                } else {
                    $this->session->set_flashdata('input', 'input');
                    redirect('Admin/view_super_admin');
                }


                $this->session->set_flashdata('loggin_err', 'loggin_err');
                redirect('Login/index');
            }
        }
    }

    public function edit_admin()
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

            $id_user = $this->input->post("id_user");
            $username = $this->input->post("username");
            $email = $this->input->post("email");
            $id_user_level = $this->input->post("level");


            $hasil = $this->m_user->update_admin($id_user, $username, $email, $id_user_level);

            if ($hasil == false) {
                $this->session->set_flashdata('eror_edit', 'eror_edit');
                redirect('Admin/view_super_admin');
            } else {
                $this->session->set_flashdata('edit', 'edit');
                redirect('Admin/view_super_admin');
            }
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }

    public function hapus_admin()
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

            $id_user = $this->input->post("id_user");

            $hasil = $this->m_user->delete_admin($id_user);

            if ($hasil == false) {
                $this->session->set_flashdata('eror_hapus', 'eror_hapus');
                redirect('Admin/view_super_admin');
            } else {
                $this->session->set_flashdata('hapus', 'hapus');
                redirect('Admin/view_super_admin');
            }
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }
}

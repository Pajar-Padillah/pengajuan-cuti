<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$this->load->view('landing');
	}

	public function login()
	{
		$this->load->view('v_login');
	}
	public function register()
	{
		$this->load->view('v_register');
	}

	function proses()
	{
		//cek username database
		$username = $this->input->post('username');

		if ($this->m_user->check_db($username)->num_rows() == 1) {
			$db = $this->m_user->check_db($username)->row();

			if (hash_verified($this->input->post('password'), $db->password)) {
				//cek username dan password yg ada di database
				if ($db->id_user_level == 1) {
					$userdata = array(
						'id_user'  => $db->id_user,
						'username'    => ucfirst($db->username),
						'nama_lengkap'   => ucfirst($db->nama_lengkap),
						'id_user_level'    => $db->id_user_level,
						'logged_in'    => TRUE
					);
					$this->session->set_userdata($userdata);
					$this->session->set_flashdata('success_login', 'success_login');
					redirect('Dashboard/dashboard_pegawai');
				} elseif ($db->id_user_level == 2) {
					$userdata = array(
						'id_user'  => $db->id_user,
						'username'    => ucfirst($db->username),
						'nama_lengkap'   => ucfirst($db->nama_lengkap),
						'id_user_level'    => $db->id_user_level,
						'logged_in'    => TRUE
					);
					$this->session->set_userdata($userdata);
					$this->session->set_flashdata('success_login', 'success_login');
					redirect('Dashboard/dashboard_admin');
				} elseif ($db->id_user_level == 3) {
					$userdata = array(
						'id_user'  => $db->id_user,
						'username'    => ucfirst($db->username),
						'nama_lengkap'   => ucfirst($db->nama_lengkap),
						'id_user_level'    => $db->id_user_level,
						'logged_in'    => TRUE
					);
					$this->session->set_userdata($userdata);
					$this->session->set_flashdata('success_login', 'success_login');
					redirect('Dashboard/dashboard_super_admin');
				} elseif ($db->id_user_level == 4) {
					$userdata = array(
						'id_user'  => $db->id_user,
						'username'    => ucfirst($db->username),
						'nama_lengkap'   => ucfirst($db->nama_lengkap),
						'id_user_level'    => $db->id_user_level,
						'logged_in'    => TRUE
					);
					$this->session->set_userdata($userdata);
					$this->session->set_flashdata('success_login', 'success_login');
					redirect('Dashboard/dashboard_kepala_kantor');
				} else {
					$this->session->set_flashdata('loggin_err', 'loggin_err');
					redirect('Login');
				}
			} else {
				$this->session->set_flashdata('loggin_err_pass', 'loggin_err_pass');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('loggin_err_no_user', 'loggin_err_no_user');
			redirect('login');
		}
	}

	public function log_out()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('id_user');
		$this->session->set_flashdata('success_log_out', 'success_log_out');
		redirect('Login/index');
	}
}

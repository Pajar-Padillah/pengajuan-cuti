<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_cuti');
	}

	public function dashboard_super_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {
			$data['cuti'] = $this->m_cuti->count_all_cuti()->row_array();
			$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc()->row_array();
			$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm()->row_array();
			$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject()->row_array();
			$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
			$data['admin'] = $this->m_user->count_all_admin()->row_array();
			$data['kepalakantor'] = $this->m_user->count_all_kepalakantor()->row_array();
			$data['tahun'] = $this->m_cuti->get_cuti_year()->result_array();
			$this->load->view('super_admin/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function dashboard_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {
			$data['cuti'] = $this->m_cuti->count_all_cuti()->row_array();
			$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc()->row_array();
			$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm()->row_array();
			$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject()->row_array();
			$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
			$data['tahun'] = $this->m_cuti->get_cuti_year()->result_array();
			$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_staff();
			$this->load->view('admin/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function grafikDataCuti()
	{
		if ($this->input->post('bulan_akhir') != '') {
			$chart_data = $this->m_cuti->fetch_data_cuti($this->input->post('bulan_awal'), $this->input->post('bulan_akhir'), $this->input->post('tahun'));
		} else {
			$chart_data = $this->m_cuti->fetch_data_cuti($this->input->post('bulan_awal'), null, $this->input->post('tahun'));
		}
		print_r($chart_data);
		exit;
		return $chart_data;
	}

	public function dashboard_pegawai()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$data['tahun'] = $this->m_cuti->get_cuti_year()->result_array();

			$this->session->set_flashdata('info', 'info');
			$this->load->view('pegawai/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function dashboard_kepala_kantor()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 4) {

			$data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai'] = $this->m_user->count_all_pegawai()->row_array();
			$data['tahun'] = $this->m_cuti->get_cuti_year()->result_array();
			$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_kepala();
			$this->load->view('kepala_kantor/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}
}

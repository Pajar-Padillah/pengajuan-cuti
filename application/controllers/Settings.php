<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_cuti');
	}

	public function view_super_admin()
	{
		$this->load->view('super_admin/settings');
	}

	public function view_admin()
	{
		$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_staff();
		$this->load->view('admin/settings', $data);
	}

	public function view_kepalakantor()
	{
		$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_kepala();
		$this->load->view('kepala_kantor/settings', $data);
	}

	public function view_pegawai()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$this->load->view('pegawai/settings', $data);
	}
	public function view_dashboard()
	{
		$data['cuti_pegawai'] = $this->m_cuti->get_all_cuti_first_by_id_user($this->session->userdata('id_user'))->result_array();
		$data['cuti'] = $this->m_cuti->count_all_cuti_by_id($this->session->userdata('id_user'))->row_array();
		$data['cuti_acc'] = $this->m_cuti->count_all_cuti_acc_by_id($this->session->userdata('id_user'))->row_array();
		$data['cuti_confirm'] = $this->m_cuti->count_all_cuti_confirm_by_id($this->session->userdata('id_user'))->row_array();
		$data['cuti_reject'] = $this->m_cuti->count_all_cuti_reject_by_id($this->session->userdata('id_user'))->row_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['tahun'] = $this->m_cuti->get_cuti_year()->result_array();
		$this->load->view('pegawai/dashboard', $data);
	}
	public function lengkapi_data()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$jenis_kelamin = $this->input->post("jenis_kelamin");
		$pangkat = $this->input->post("pangkat");
		$jabatan = $this->input->post("jabatan");



		$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $jenis_kelamin, $no_telp, $alamat, $pangkat, $jabatan);

		if ($hasil == false) {
			$this->session->set_flashdata('eror', 'eror');
			redirect('Settings/view_dashboard');
		} else {
			$this->session->set_flashdata('input', 'input');
			redirect('Settings/view_dashboard');
		}
	}


	public function settings_account_super_admin()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = get_hash($this->input->post("password"));

		$hasil = $this->m_user->update_user($id, $username, $password);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_edit', 'eror_edit');
			redirect('Settings/view_super_admin');
		} else {
			$this->session->set_flashdata('edit', 'edit');
			redirect('Settings/view_super_admin');
		}
	}

	public function settings_account_admin()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = get_hash($this->input->post("password"));

		$hasil = $this->m_user->update_user($id, $username, $password);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_edit', 'eror_edit');
			redirect('Settings/view_admin');
		} else {
			$this->session->set_flashdata('edit', 'edit');
			redirect('Settings/view_admin');
		}
	}

	public function settings_account_pegawai()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = get_hash($this->input->post("password"));

		$hasil = $this->m_user->update_user($id, $username, $password);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_edit', 'eror_edit');
			redirect('Settings/view_pegawai');
		} else {
			$this->session->set_flashdata('edit', 'edit');
			redirect('Settings/view_pegawai');
		}
	}

	public function settings_account_kepalakantor()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = get_hash($this->input->post("password"));

		$hasil = $this->m_user->update_user($id, $username, $password);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_edit', 'eror_edit');
			redirect('Settings/view_kepalakantor');
		} else {
			$this->session->set_flashdata('edit', 'edit');
			redirect('Settings/view_kepalakantor');
		}
	}
}

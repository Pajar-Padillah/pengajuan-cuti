<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepalakantor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function view_super_admin()
	{

		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

			$data['kepalakantor'] = $this->m_user->get_all_kepalakantor()->result_array();
			$this->load->view('super_admin/kepalakantor', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}


	public function super_admin_tambah_kepalakantor()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

			$nip = $this->input->post("nip");
			$username = $this->input->post("username");
			$password = get_hash($this->input->post("password"));
			$email = $this->input->post("email");
			$nama_lengkap = $this->input->post("nama_lengkap");
			$jenis_kelamin = $this->input->post("id_jenis_kelamin");
			$no_telp = $this->input->post("no_telp");
			$nip = $this->input->post("nip");
			$pangkat = $this->input->post("pangkat");
			$jabatan = $this->input->post("jabatan");
			$alamat = $this->input->post("alamat");
			$id_user_level = 4;

			$a = $this->db->query("select * from user where nip = '$nip' or email = '$email'");
			if ($a->num_rows() > 0) {
				$this->session->set_flashdata('data-error', 'data-error');
				redirect(base_url('Kepalakantor/view_super_admin'));
			} else {
				$hasil = $this->m_user->insert_kepalakantor($nip, $username, $email, $password, $id_user_level, $nama_lengkap, $jenis_kelamin, $no_telp,  $pangkat, $jabatan, $alamat);

				if ($hasil == false) {
					$this->session->set_flashdata('eror', 'eror');
					redirect('Kepalakantor/view_super_admin');
				} else {
					$this->session->set_flashdata('input', 'input');
					redirect('Kepalakantor/view_super_admin');
				}

				$this->session->set_flashdata('loggin_err', 'loggin_err');
				redirect('Login/index');
			}
		}
	}

	public function super_admin_edit_kepalakantor()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$nama_lengkap = $this->input->post("nama_lengkap");
			$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
			$no_telp = $this->input->post("no_telp");
			$nip = $this->input->post("nip");
			$pangkat = $this->input->post("pangkat");
			$jabatan = $this->input->post("jabatan");
			$alamat = $this->input->post("alamat");
			$id_user_level = 4;
			$id = $this->input->post("id_user");


			$hasil = $this->m_user->update_kepalakantor($id, $username, $email, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $nip, $pangkat, $jabatan, $alamat);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_edit', 'eror_edit');
				redirect('Kepalakantor/view_super_admin');
			} else {
				$this->session->set_flashdata('edit', 'edit');
				redirect('Kepalakantor/view_super_admin');
			}
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function super_admin_hapus_kepalakantor()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

			$id = $this->input->post("id_user");


			$hasil = $this->m_user->delete_kepalakantor($id);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_hapus', 'eror_hapus');
				redirect('Kepalakantor/view_super_admin');
			} else {
				$this->session->set_flashdata('hapus', 'hapus');
				redirect('Kepalakantor/view_super_admin');
			}
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}
}

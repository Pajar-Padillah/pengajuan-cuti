<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_Cuti extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
	}

	public function view_pegawai()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$this->load->view('pegawai/form_pengajuan_cuti', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function proses_cuti()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$id_user = $this->input->post("id_user");
			$alasan = $this->input->post("alasan");
			$perihal_cuti = $this->input->post("perihal_cuti");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");
			$id_cuti = md5($id_user . $alasan . $mulai);
			$status_validasi = 0;
			$id_status_cuti = 1;

			$a = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE cuti.id_user='$id_user' and cuti.mulai = '$mulai' and cuti.berakhir = '$berakhir' and cuti.perihal_cuti = '$perihal_cuti' and cuti.status_cuti = 'menunggu'");
			if ($a->num_rows() > 0) {
				$this->session->set_flashdata('data-error', 'data-error');
				redirect(base_url('Form_cuti/view_pegawai'));
			} else {
				$hasil = $this->m_cuti->insert_data_cuti('cuti-' . substr($id_cuti, 0, 5), $id_user, $alasan, $mulai, $berakhir, $id_status_cuti, $perihal_cuti, $status_validasi);

				if ($hasil == false) {
					$this->session->set_flashdata('eror_input', 'eror_input');
				} else {
					$this->session->set_flashdata('success_input', 'success_input');
				}
				redirect('cutii/view_pegawai/' . $id_user);

				$this->session->set_flashdata('loggin_err', 'loggin_err');
				redirect('Login/index');
			}
		}
	}

	public function update_cuti()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$id_user = $this->input->post('id_user');
			$id_cuti = $this->input->post('id_cuti');
			$alasan = $this->input->post("alasan");
			$perihal_cuti = $this->input->post("perihal_cuti");
			$mulai = $this->input->post("mulai");
			$berakhir = $this->input->post("berakhir");

			$hasil = $this->m_cuti->update_cuti($alasan, $perihal_cuti, $mulai, $berakhir, $id_cuti);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('cutii/view_pegawai/' . $id_user);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}
}

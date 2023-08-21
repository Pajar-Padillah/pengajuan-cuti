<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cutii extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
	}


	public function view_super_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {


			$data['cuti'] = $this->m_cuti->get_all_cuti()->result_array();
			$this->load->view('super_admin/cuti', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {
			$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_staff();
			$data['cuti'] = $this->m_cuti->get_all_cuti()->result_array();
			$this->load->view('admin/cuti', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function view_kepalakantor()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 4) {
			$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_kepala();
			$data['cuti'] = $this->m_cuti->get_all_cuti_valid()->result_array();
			$this->load->view('kepala_kantor/cuti', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function view_pegawai($id_user)
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['cuti'] = $this->m_cuti->get_all_cuti_by_id_user($id_user)->result_array();
			$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
			$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('pegawai/cuti', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function uploud_bukti()
	{
		$id_cuti = $this->input->post('id_cuti');
		$id_user = $this->input->post('id_user');

		$config['upload_path']   = './assets/bukti/';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
		$config['max_size']      = '5000';
		$config['max_width']     = '9000';
		$config['max_height']    = '9024';
		$config['file_name']     = 'File bukti ' .  $id_cuti . '';
		$this->upload->initialize($config);
		$this->upload->do_upload('bukti');
		$gambar = $this->upload->data();

		$bukti  =  $gambar['file_name'];

		$hasil = $this->m_cuti->uploadbukti($id_cuti, $bukti);
		if ($hasil == false) {
			$this->session->set_flashdata('error_input', 'error_input');
		} else {
			$this->session->set_flashdata('success_uploud', 'success_uploud');
		}
		redirect('cutii/view_pegawai/' . $id_user . '');
	}

	public function hapus_cuti()
	{

		$id_cuti = $this->input->post("id_cuti");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_cuti->delete_cuti($id_cuti);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_hapus', 'eror_hapus');
		} else {
			$this->session->set_flashdata('hapus', 'hapus');
		}

		redirect('cutii/view_pegawai/' . $id_user);
	}

	public function hapus_cuti_admin()
	{

		$id_cuti = $this->input->post("id_cuti");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_cuti->delete_cuti($id_cuti);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_hapus', 'eror_hapus');
		} else {
			$this->session->set_flashdata('hapus', 'hapus');
		}

		redirect('cutii/view_admin');
	}

	public function edit_cuti_admin()
	{
		$id_cuti = $this->input->post("id_cuti");
		$alasan = $this->input->post("alasan");
		$perihal_cuti = $this->input->post("perihal_cuti");
		$tgl_diajukan = $this->input->post("tgl_diajukan");
		$mulai = $this->input->post("mulai");
		$berakhir = $this->input->post("berakhir");


		$hasil = $this->m_cuti->update_cuti($alasan, $perihal_cuti, $tgl_diajukan, $mulai, $berakhir, $id_cuti);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_edit', 'eror_edit');
		} else {
			$this->session->set_flashdata('edit', 'edit');
		}

		redirect('cutii/view_admin');
	}

	public function acc_cuti_kepalakantor($id_status_cuti)
	{

		$id_cuti = $this->input->post("id_cuti");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_cuti->confirm_cuti($id_cuti, $id_status_cuti, $alasan_verifikasi);

		if ($status_validasi == 2) {
			$this->m_cuti->update_keterangan_validasi('Di validasi oleh Kepala Kantor', $id_cuti);
		} else {
			$this->m_cuti->update_keterangan_validasi('Di tolak oleh Kepala Kantor', $id_cuti);
		}

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('cutii/view_kepalakantor/' . $id_user);
	}


	public function acc_cuti_admin($status_validasi)
	{

		$id_cuti = $this->input->post("id_cuti");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_cuti->confirm_validasi_cuti($id_cuti, $status_validasi);
		if ($status_validasi == 2) {
			$this->m_cuti->update_keterangan_validasi('Di tolak oleh Staff Umum', $id_cuti);
		} else {
			$this->m_cuti->update_keterangan_validasi('Di validasi oleh Staff Umum', $id_cuti);
		}

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('cutii/view_admin/' . $id_user);
	}

	public function cutiPDF()
	{
		$tgl_awal = date('Y-m-d 00:00:00', strtotime($this->uri->segment(3, 0)));
		$tgl_akhir = date('Y-m-d 23:59:59', strtotime($this->uri->segment(4, 0)));
		$this->load->library('pdf');
		$data = array(
			'cuti' => $this->m_cuti->get_all_cuti_sort_tgl($tgl_awal, $tgl_akhir)->result_array(),
			'tanggal' => [
				'tgl_awal' => $tgl_awal,
				'tgl_akhir' => $tgl_akhir
			]
		);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$this->pdf->set_paper($paper_size, $orientation);
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "laporan_cuti.pdf";
		$this->pdf->load_view('admin/laporan_cuti', $data);
	}
}

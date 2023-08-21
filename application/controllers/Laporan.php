<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
		$this->load->model('m_user');
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {
			$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_staff();
			$data['cuti'] = $this->m_cuti->get_all_cuti()->result_array();
			$this->load->view('admin/laporan', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function cuti()
	{
		$tgl_awal = date('Y-m-d 00:00:00', strtotime($this->input->post('tanggal_awal')));
		$tgl_akhir = date('Y-m-d 23:59:59', strtotime($this->input->post('tanggal_akhir')));
		$data['jumlah_cuti'] = $this->m_cuti->jumlah_cuti_non_acc_staff();
		$data['cuti'] = $this->m_cuti->get_all_cuti_sort_tgl($tgl_awal, $tgl_akhir)->result_array();
		// kirim data tanggal untuk riwayat penelusuran
		$data['tgl_awal'] = $this->input->post('tanggal_awal');
		$data['tgl_akhir'] = $this->input->post('tanggal_akhir');

		$this->load->view('admin/laporan', $data);
	}
}

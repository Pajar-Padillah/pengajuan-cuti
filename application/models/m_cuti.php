<?php

class M_cuti extends CI_Model
{

	public function get_all_cuti()
	{
		$hasil = $this->db->query('SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user ORDER BY cuti.id_cuti DESC');
		return $hasil;
	}
	public function get_all_cuti_by_id_user($id_user)
	{
		$hasil = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE cuti.id_user='$id_user' ORDER BY cuti.id_cuti desc");
		return $hasil;
	}

	public function jumlah_cuti_non_acc_staff()
	{
		$query = $this->db->query('SELECT * FROM cuti WHERE status_validasi = 0');
		return $query->num_rows();
	}

	public function jumlah_cuti_non_acc_kepala()
	{
		$query = $this->db->query('SELECT * FROM cuti WHERE status_validasi = 1 and status_cuti = "Menunggu"');
		return $query->num_rows();
	}

	public function uploadbukti($id_cuti, $bukti)
	{
		$this->db->trans_start();
		$this->db->query("UPDATE cuti SET bukti='$bukti' WHERE id_cuti='$id_cuti'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function get_all_cuti_valid()
	{
		$hasil = $this->db->query('SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_validasi = 1 ORDER BY cuti.id_cuti DESC');
		return $hasil;
	}

	public function get_all_cuti_sort_tgl($tgl_awal, $tgl_akhir)
	{
		$hasil = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_cuti = 'diterima' AND tgl_diajukan BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl_diajukan DESC");
		return $hasil;
	}

	public function get_all_cuti_first_by_id_user($id_user)
	{
		$hasil = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE cuti.id_user='$id_user' AND cuti.status_cuti='diterima' ORDER BY cuti.tgl_diajukan DESC LIMIT 1");
		return $hasil;
	}

	public function get_all_cuti_by_id_cuti($id_cuti)
	{
		$hasil = $this->db->query("SELECT * FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE cuti.id_cuti='$id_cuti'");
		return $hasil;
	}

	public function insert_data_cuti($id_cuti, $id_user, $alasan, $mulai, $berakhir, $id_status_cuti, $perihal_cuti, $status_validasi)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO cuti(id_user, alasan, tgl_diajukan, mulai, berakhir, status_cuti, perihal_cuti, status_validasi) VALUES ('$id_user','$alasan',NOW(),'$mulai', '$berakhir', '$id_status_cuti', '$perihal_cuti', '$status_validasi')");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function delete_cuti($id_cuti)
	{
		$this->db->trans_start();
		$this->db->query("DELETE FROM cuti WHERE id_cuti='$id_cuti'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function update_cuti($alasan, $perihal_cuti, $mulai, $berakhir, $id_cuti)
	{
		$this->db->trans_start();
		$this->db->query("UPDATE cuti SET alasan='$alasan', perihal_cuti='$perihal_cuti', mulai='$mulai', berakhir='$berakhir' WHERE id_cuti='$id_cuti'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function confirm_cuti($id_cuti, $id_status_cuti, $alasan_verifikasi)
	{
		$this->db->trans_start();
		$this->db->query("UPDATE cuti SET status_cuti='$id_status_cuti', alasan_verifikasi='$alasan_verifikasi' WHERE id_cuti='$id_cuti'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function confirm_validasi_cuti($id_cuti, $status_validasi)
	{
		$this->db->trans_start();
		$this->db->query("UPDATE cuti SET status_validasi='$status_validasi'WHERE id_cuti='$id_cuti'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function update_keterangan_validasi($keterangan, $id_cuti)
	{
		$this->db->trans_start();
		$this->db->query("UPDATE cuti SET keterangan_validasi='" . $keterangan . "' WHERE id_cuti='" . $id_cuti . "'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function count_all_cuti()
	{
		$hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user');
		return $hasil;
	}

	public function count_all_cuti_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE cuti.id_user='$id_user'");
		return $hasil;
	}

	public function count_all_cuti_acc()
	{
		$hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_cuti=\'diterima\' ');
		return $hasil;
	}

	public function count_all_cuti_acc_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_cuti='diterima' AND cuti.id_user='$id_user'");
		return $hasil;
	}

	public function count_all_cuti_confirm()
	{
		$hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_cuti=\'menunggu\'');
		return $hasil;
	}

	public function count_all_cuti_confirm_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_cuti='menunggu' AND cuti.id_user='$id_user'");
		return $hasil;
	}

	public function count_all_cuti_reject()
	{
		$hasil = $this->db->query('SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_cuti=\'ditolak\'');
		return $hasil;
	}

	public function count_all_cuti_reject_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_cuti) as total_cuti FROM cuti JOIN user ON cuti.id_user = user.id_user JOIN user_detail ON user.id_user = user_detail.id_user WHERE status_cuti='ditolak' AND cuti.id_user='$id_user'");
		return $hasil;
	}

	public function get_cuti_year()
	{
		$tahun = $this->db->query("SELECT YEAR(mulai) as tahun FROM cuti GROUP BY YEAR(mulai) ORDER BY YEAR(MULAI) ASC");
		return $tahun;
	}

	public function fetch_data_cuti($bulan_awal, $bulan_akhir, $tahun)
	{
		if ($bulan_akhir != '') {
			$data = $this->db->query("SELECT (SELECT COALESCE(COUNT(id_cuti),0) FROM cuti c1 WHERE c1.status_cuti = 'menunggu' AND MONTH(c1.mulai) = MONTH(cuti.mulai)) as cuti_konfirmasi, (SELECT COALESCE(COUNT(id_cuti),0) FROM cuti c2 WHERE c2.status_cuti = 'diterima' AND MONTH(c2.mulai) = MONTH(cuti.mulai)) as cuti_diterima, (SELECT COALESCE(COUNT(id_cuti),0) FROM cuti c3 WHERE c3.status_cuti = 'ditolak' AND MONTH(c3.mulai) = MONTH(cuti.mulai)) as cuti_ditolak, MONTH(mulai) as bulan FROM cuti WHERE YEAR(mulai) = '$tahun' AND MONTH(mulai) BETWEEN '$bulan_awal' AND '$bulan_akhir' GROUP BY MONTH(mulai)")->result_array();
		} else {
			$data = $this->db->query("SELECT (SELECT COALESCE(COUNT(id_cuti),0) FROM cuti c1 WHERE c1.status_cuti = 'menunggu' AND MONTH(c1.mulai) = MONTH(cuti.mulai)) as cuti_konfirmasi, (SELECT COALESCE(COUNT(id_cuti),0) FROM cuti c2 WHERE c2.status_cuti = 'diterima' AND MONTH(c2.mulai) = MONTH(cuti.mulai)) as cuti_diterima, (SELECT COALESCE(COUNT(id_cuti),0) FROM cuti c3 WHERE c3.status_cuti = 'ditolak' AND MONTH(c3.mulai) = MONTH(cuti.mulai)) as cuti_ditolak, MONTH(mulai) as bulan FROM cuti WHERE YEAR(mulai) = '$tahun' AND MONTH(mulai) = '$bulan_awal' GROUP BY MONTH(mulai)")->result_array();
		}

		if ($data == null) {
			$data = [
				'error' => 404,
				'message'	=> 'Data tidak ditemukan'
			];
		}

		echo json_encode($data, JSON_NUMERIC_CHECK);
	}
}

<?php

class M_blt extends CI_Model
{

	public function get_all_blt()
	{
		$hasil = $this->db->query('SELECT * FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail ORDER BY user_detail.nama_lengkap ASC');
		return $hasil;
	}

	public function get_all_blt_by_id_user($id_user)
	{
		$hasil = $this->db->query("SELECT * FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE blt.id_user='$id_user'");
		return $hasil;
	}

	public function get_all_blt_first_by_id_user($id_user)
	{
		$hasil = $this->db->query("SELECT * FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE blt.id_user='$id_user' AND blt.id_status_blt='2' ORDER BY blt.tgl_diajukan DESC LIMIT 1");
		return $hasil;
	}

	public function get_all_blt_by_id_blt($id_blt)
	{
		$hasil = $this->db->query("SELECT * FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE blt.id_blt='$id_blt'");
		return $hasil;
	}

	public function insert_data_blt($id_blt, $id_user, $nama, $kk, $rt, $id_status_blt, $nik, $norek, $sakit,  $disabilitas, $pendapatan, $dinding, $lantai, $atap, $bantuan, $latitude, $longitude, $foto)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO blt(id_blt,id_user, nama, tgl_diajukan, kk, rt, id_status_blt, nik, norek, sakit, disabilitas, pendapatan, dinding, lantai, atap, bantuan, latitude, longitude, foto) VALUES ('$id_blt','$id_user','$nama',NOW(),'$kk', '$rt', '$id_status_blt', '$nik', '$norek', '$sakit',  '$disabilitas', '$pendapatan','$dinding', '$lantai', '$atap', '$bantuan', '$latitude', '$longitude', '$foto')");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function delete_blt($id_blt)
	{
		$this->db->trans_start();
		$this->db->query("DELETE FROM blt WHERE id_blt='$id_blt'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	public function update_blt($nama, $kk, $rt, $id_status_blt, $nik, $norek, $sakit, $disabilitas, $pendapatan, $dinding, $lantai, $atap, $bantuan, $latitude, $longitude, $id_blt)
	{
		$this->db->trans_start();
		$this->db->query("UPDATE blt SET nama='$nama', nik='$nik', kk='$kk', rt='$rt', norek='$norek', sakit='$sakit', disabilitas='$disabilitas', pendapatan='$pendapatan', dinding='$dinding', lantai='$lantai', atap='$atap', bantuan='$bantuan', latitude='$latitude', longitude='$longitude' WHERE id_blt='$id_blt'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}


	public function confirm_blt($id_blt, $id_status_blt, $alasan_verifikasi)
	{
		$this->db->trans_start();
		$this->db->query("UPDATE blt SET id_status_blt='$id_status_blt', alasan_verifikasi='$alasan_verifikasi' WHERE id_blt='$id_blt'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}


	public function count_all_blt()
	{
		$hasil = $this->db->query('SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail');
		return $hasil;
	}

	public function count_all_blt_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE blt.id_user='$id_user'");
		return $hasil;
	}

	public function count_all_blt_acc()
	{
		$hasil = $this->db->query('SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_blt=2');
		return $hasil;
	}

	public function count_all_blt_acc_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_blt=2 AND blt.id_user='$id_user'");
		return $hasil;
	}

	public function count_all_blt_confirm()
	{
		$hasil = $this->db->query('SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_blt=1');
		return $hasil;
	}

	public function count_all_blt_confirm_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_blt=1 AND blt.id_user='$id_user'");
		return $hasil;
	}

	public function count_all_blt_reject()
	{
		$hasil = $this->db->query('SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_blt=3');
		return $hasil;
	}

	public function count_all_blt_reject_by_id($id_user)
	{
		$hasil = $this->db->query("SELECT COUNT(id_blt) as total_blt FROM blt JOIN user ON blt.id_user = user.id_user JOIN user_detail ON user.id_user_detail = user_detail.id_user_detail WHERE id_status_blt=3 AND blt.id_user='$id_user'");
		return $hasil;
	}
	public function get_accepted_blt()
	{
		$hasil = $this->db->query("SELECT * FROM blt WHERE id_status_blt = 2");
		return $hasil;
	}

	public function get_rejected_blt()
	{
		$hasil = $this->db->query("SELECT * FROM blt WHERE id_status_blt = 3");
		return $hasil;
	}
	public function get_blt_by_id($id_blt)
	{
		$hasil = $this->db->query("SELECT * FROM blt WHERE id_blt = '$id_blt'");
		return $hasil->row_array();
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class blt extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_blt');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}


	public function view_sekretaris()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

			$data['blt'] = $this->m_blt->get_all_blt()->result_array();
			$this->load->view('sekretaris/blt', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function view_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {

			$data['blt'] = $this->m_blt->get_all_blt()->result_array();
			$this->load->view('admin/blt', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function view_petugas_lapangan($id_user)
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['blt'] = $this->m_blt->get_all_blt_by_id_user($id_user)->result_array();
			$data['petugas_lapangan'] = $this->m_user->get_petugas_lapangan_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['petugas_lapangan_data'] = $this->m_user->get_petugas_lapangan_by_id($this->session->userdata('id_user'))->result_array();
			$this->load->view('petugas_lapangan/blt', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function hapus_blt()
	{

		$id_blt = $this->input->post("id_blt");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_blt->delete_blt($id_blt);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_hapus', 'eror_hapus');
		} else {
			$this->session->set_flashdata('hapus', 'hapus');
		}

		redirect('blt/view_petugas_lapangan/' . $id_user);
	}

	public function hapus_blt_admin()
	{

		$id_blt = $this->input->post("id_blt");
		$id_user = $this->input->post("id_user");

		$hasil = $this->m_blt->delete_blt($id_blt);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_hapus', 'eror_hapus');
		} else {
			$this->session->set_flashdata('hapus', 'hapus');
		}

		redirect('blt/view_admin');
	}

	public function edit_blt_admin()
	{
		$id_blt = $this->input->post("id_blt");
		$nama = $this->input->post("nama");
		$nik = $this->input->post("nik");
		$kk = $this->input->post("kk");
		$rt = $this->input->post("rt");
		$norek = $this->input->post("norek");
		$sakit = $this->input->post("sakit");
		$disabilitas = $this->input->post("disabilitas");
		$pendapatan = $this->input->post("pendapatan");
		$dinding = $this->input->post("dinding");
		$lantai = $this->input->post("lantai");
		$atap = $this->input->post("atap");
		$bantuan = $this->input->post("bantuan");
		$latitude = $this->input->post("latitude");
		$longitude = $this->input->post("longitude");

		// Validasi NIK
		if (!preg_match('/^[0-9]{16}$/', $nik)) {
			// NIK tidak sesuai dengan format yang diharapkan
			// Lakukan sesuatu di sini, misalnya tampilkan pesan kesalahan
			$this->session->set_flashdata('error_edit', 'NIK tidak sesuai format yang diharapkan.');
			redirect('blt/view_admin');
		}

		$id_status_blt = 1;

		$hasil = $this->m_blt->update_blt($nama, $kk, $rt, $id_status_blt, $nik, $norek, $sakit, $disabilitas, $pendapatan, $dinding, $lantai, $atap, $bantuan, $latitude, $longitude, $id_blt);

		if ($hasil == false) {
			$this->session->set_flashdata('error_edit', 'Gagal mengedit data BLT.');
		} else {
			$this->session->set_flashdata('edit', 'Data BLT berhasil diubah.');
		}

		redirect('blt/view_admin');
	}


	public function acc_blt_admin($id_status_blt)
	{

		$id_blt = $this->input->post("id_blt");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_blt->confirm_blt($id_blt, $id_status_blt, $alasan_verifikasi);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('blt/view_admin/' . $id_user);
	}

	public function acc_blt_sekretaris($id_status_blt)
	{

		$id_blt = $this->input->post("id_blt");
		$id_user = $this->input->post("id_user");
		$alasan_verifikasi = $this->input->post("alasan_verifikasi");

		$hasil = $this->m_blt->confirm_blt($id_blt, $id_status_blt, $alasan_verifikasi);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_input', 'eror_input');
		} else {
			$this->session->set_flashdata('input', 'input');
		}

		redirect('blt/view_sekretaris/' . $id_user);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
		$this->load->model('m_blt');
	}

	public function dashboard_sekretaris()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

			$data['blt'] = $this->m_blt->count_all_blt()->row_array();
			$data['blt_acc'] = $this->m_blt->count_all_blt_acc()->row_array();
			$data['blt_confirm'] = $this->m_blt->count_all_blt_confirm()->row_array();
			$data['blt_reject'] = $this->m_blt->count_all_blt_reject()->row_array();
			$data['petugas_lapangan'] = $this->m_user->count_all_petugas_lapangan()->row_array();
			$data['admin'] = $this->m_user->count_all_admin()->row_array();
			$this->load->view('sekretaris/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function dashboard_admin()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {
			$data['blt'] = $this->m_blt->count_all_blt()->row_array();
			$data['blt_acc'] = $this->m_blt->count_all_blt_acc()->row_array();
			$data['blt_confirm'] = $this->m_blt->count_all_blt_confirm()->row_array();
			$data['blt_reject'] = $this->m_blt->count_all_blt_reject()->row_array();
			$data['petugas_lapangan'] = $this->m_user->count_all_petugas_lapangan()->row_array();
			$this->load->view('admin/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function dashboard_petugas_lapangan()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['blt_petugas_lapangan'] = $this->m_blt->get_all_blt_first_by_id_user($this->session->userdata('id_user'))->result_array();
			$data['blt'] = $this->m_blt->count_all_blt_by_id($this->session->userdata('id_user'))->row_array();
			$data['blt_acc'] = $this->m_blt->count_all_blt_acc_by_id($this->session->userdata('id_user'))->row_array();
			$data['blt_confirm'] = $this->m_blt->count_all_blt_confirm_by_id($this->session->userdata('id_user'))->row_array();
			$data['blt_reject'] = $this->m_blt->count_all_blt_reject_by_id($this->session->userdata('id_user'))->row_array();
			$data['petugas_lapangan'] = $this->m_user->get_petugas_lapangan_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$data['petugas_lapangan_data'] = $this->m_user->get_petugas_lapangan_by_id($this->session->userdata('id_user'))->result_array();
			// echo var_dump($data);
			// die();
			$this->load->view('petugas_lapangan/dashboard', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_blt extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_blt');
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}

	public function view_petugas_lapangan()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$data['petugas_lapangan_data'] = $this->m_user->get_petugas_lapangan_by_id($this->session->userdata('id_user'))->result_array();
			$data['petugas_lapangan'] = $this->m_user->get_petugas_lapangan_by_id($this->session->userdata('id_user'))->row_array();
			$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
			$this->load->view('petugas_lapangan/form_pengajuan_blt', $data);
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}

	public function proses_blt()
	{
		if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 1) {

			$id_user = $this->input->post("id_user");
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
			$foto = $_FILES['foto'];
			if ($foto = '') {
			} else {
				$config['upload_path']		= './assets/foto';
				$config['allowed_types']	= 'jpg|png|gif';

				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					echo "Upload Gagal";
					die();
				} else {
					$foto = $this->upload->data('file_name');
				}
			}

			$id_blt = md5($id_user . $nama . $kk);

			$id_status_blt = 1;

			$hasil = $this->m_blt->insert_data_blt('blt-' . substr($id_blt, 0, 5), $id_user, $nama, $kk, $rt, $id_status_blt, $nik, $norek, $sakit, $disabilitas, $pendapatan, $dinding, $lantai, $atap, $bantuan, $latitude, $longitude, $foto);


			if ($hasil == false) {
				$this->session->set_flashdata('eror_input', 'eror_input');
			} else {
				$this->session->set_flashdata('input', 'input');
			}
			redirect('Form_blt/view_petugas_lapangan');
		} else {

			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}
}

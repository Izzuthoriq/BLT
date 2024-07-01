<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends CI_Controller
{
	public function view_html($id_blt)
	{
		$data['blt'] = $this->m_blt->get_all_blt_by_id_blt($id_blt)->result_array();
		$this->load->view('laporan_pdf', $data);
	}


	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_blt');
	}
	public function surat_blt_pdf($id_blt)
	{

		$data['blt'] = $this->m_blt->get_all_blt_by_id_blt($id_blt)->result_array();



		$this->load->library('pdf');

		$this->pdf->setPaper('Letter', 'potrait');
		$this->pdf->set_option('isRemoteEnabled', true);
		$this->pdf->filename = "surat-blt.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	}
}

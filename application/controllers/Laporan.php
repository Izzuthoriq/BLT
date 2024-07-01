<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_blt');
	}

	public function view_sekretaris()
	{
		if ($this->session->userdata('logged_in') == true && $this->session->userdata('id_user_level') == 3) {
			// Mengambil data blt yang diterima dan ditolak dari model
			$data['blt_diterima'] = $this->m_blt->get_accepted_blt()->result_array();
			$data['blt_ditolak'] = $this->m_blt->get_rejected_blt()->result_array();

			$this->load->view('sekretaris/laporan', $data);
		} else {
			$this->session->set_flashdata('loggin_err', 'loggin_err');
			redirect('Login/index');
		}
	}


	public function update_blt()
	{
		// Mengambil data dari input form
		$id_blt = $this->input->post("id_blt");
		$nama = $this->input->post("nama");
		$nik = $this->input->post("nik");
		$kk = $this->input->post("kk");
		$alamat = $this->input->post("alamat");
		$norek = $this->input->post("norek");
		$sakit = $this->input->post("sakit");
		$disabilitas = $this->input->post("disabilitas");
		$pendapatan = $this->input->post("pendapatan");
		$dinding = $this->input->post("dinding");
		$lantai = $this->input->post("lantai");
		$atap = $this->input->post("atap");
		$bantuan = $this->input->post("bantuan");

		// Pastikan $id_status_blt didefinisikan
		$id_status_blt = 1; // Sesuaikan dengan logika aplikasi Anda

		// Memperbarui data blt menggunakan model
		$hasil = $this->m_blt->update_blt($nama, $kk, $alamat, $id_status_blt, $nik, $norek, $sakit, $disabilitas, $pendapatan, $dinding, $lantai, $atap, $bantuan, $id_blt);

		if ($hasil == false) {
			$this->session->set_flashdata('eror_edit', 'eror_edit');
		} else {
			$this->session->set_flashdata('edit', 'edit');
		}

		redirect('Laporan/view_sekretaris');
	}
	public function export_pdf()
	{
		// Ambil opsi dari input GET
		$option = $this->input->get('option');

		// Tentukan view dan nama file PDF berdasarkan opsi
		if ($option == 'diterima') {
			$data['blt_diterima'] = $this->m_blt->get_accepted_blt()->result_array();
			$view = 'sekretaris/pdf_diterima';
			$filename = 'laporan_blt_diterima.pdf';
		} elseif ($option == 'ditolak') {
			$data['blt_ditolak'] = $this->m_blt->get_rejected_blt()->result_array();
			$view = 'sekretaris/pdf_ditolak';
			$filename = 'laporan_blt_ditolak.pdf';
		} else {
			// Tampilkan pesan error jika opsi tidak valid
			$this->session->set_flashdata('pdf_error', 'Invalid option');
			redirect('Laporan/view_sekretaris');
		}

		// Load library dompdf
		require 'vendor/autoload.php';

		// Inisialisasi kelas dompdf
		$options = new Options();
		$options->set('defaultFont', 'Courier');
		$options->set('isRemoteEnabled', true);
		$dompdf = new Dompdf($options);

		// Load view dan generate PDF
		$html = $this->load->view($view, $data, true);

		// Set ukuran kertas dan orientasi
		$paper_size = 'A4';
		$orientation = 'landscape';
		$dompdf->setPaper($paper_size, $orientation);

		$dompdf->loadHtml($html);
		$dompdf->render();
		$output = $dompdf->output();

		// Paksa unduh file PDF
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		header('Content-Length: ' . strlen($output));
		echo $output;
	}
	public function view_blt_detail($id_blt)
	{
		// Memanggil model untuk mendapatkan data BLT berdasarkan ID
		$data['blt_detail'] = $this->m_blt->get_blt_by_id($id_blt);

		// Load view dengan data BLT detail
		$this->load->view('blt_detail_view', $data);
	}
	public function cetak_kartu($id_blt)
	{
		// Memanggil model untuk mendapatkan data BLT berdasarkan id_blt
		$blt_data = $this->m_blt->get_blt_by_id($id_blt);

		// Cek apakah data ditemukan
		if (!$blt_data) {
			// Jika data tidak ditemukan, tampilkan pesan kesalahan atau redirect ke halaman lain
			redirect('Laporan/view_sekretaris');
		}

		// Load view cetak kartu dengan data BLT yang ditemukan
		$html = $this->load->view('sekretaris/cetak_kartu', $blt_data, true);

		// Load library dompdf
		require_once 'vendor/autoload.php';

		// Inisialisasi kelas dompdf
		$options = new \Dompdf\Options();
		$options->set('isRemoteEnabled', true); // Aktifkan pengambilan gambar dari sumber eksternal
		$options->set('defaultFont', 'Arial');
		$dompdf = new \Dompdf\Dompdf($options);

		// Render HTML menjadi PDF
		$dompdf->loadHtml($html);
		$dompdf->render();

		// Unduh file PDF
		$dompdf->stream('kartu_blt.pdf', array('Attachment' => 0));
	}
}

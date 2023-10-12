<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');
	}
    public function pengaduan_aksi()
	{
			$pengaduan = $this->input->post('pengaduan');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$hp = $this->input->post('hp');
			$tanggal = date('Y-m-d H:i:s');

			$data = array(
				'nama_pengadu' => $nama,
				'email_pengadu' => $email,
				'no_hp' => $hp,
				'isi_pengaduan' => $pengaduan,
				'tanggal_pengaduan' => $tanggal,
				'status_pengaduan' => "Belum"
			);

			$this->m_data->insert_data($data, 'pengaduan');

			redirect(base_url('contact'));
	}
}
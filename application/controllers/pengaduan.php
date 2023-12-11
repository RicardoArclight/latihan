<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');
		$this->load->library('upload');
	}
	public function pengaduan_aksi()
	{
		$pengaduan = $this->input->post('pengaduan');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$hp = $this->input->post('hp');
		$subjek = $this->input->post('subjek');
		$tanggal = date('Y-m-d H:i:s');
		$tiket = 'P-' . date('Ymd') . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

		$data = array(
			'nama_pengadu' => $nama,
			'email_pengadu' => $email,
			'no_hp' => $hp,
			'subjek' => $subjek,
			'isi_pengaduan' => $pengaduan,
			'tanggal_pengaduan' => $tanggal,
			'status_pengaduan' => "Belum",
			'tiket' => $tiket
		);

		$this->m_data->insert_data($data, 'pengaduan');

		redirect(base_url('contact'));
	}
	//Upload image summernote
	function upload_image()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = 'asset/assets/dokumen/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'asset/assets/dokumen/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['new_image'] = 'asset/assets/dokumen/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'asset/assets/images/' . $data['file_name'];
			}
		}
	}
	//Delete image summernote
	function delete_image()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			echo 'File Delete Successfully';
		}
	}
}

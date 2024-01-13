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

		//config send mail
		$config = array(
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'ricardokaslana@gmail.com',  // Email gmail
			'smtp_pass'   => 'rmosvvvobbnhlbsb',  // Password gmail
			'smtp_port'   => 465,
			'smtp_timeout' => 5,
			'newline' => "\r\n"
		);

		$pesan = '<h1><p><b>' . $tiket . '</b></p></h1>';
		$pesan .= '<p>silahkan simpan nomor tiket ini</p>';
		$pesan .= '<p>Terimakasih telah melakukan Pengaduan ke Pusat Layanan Diskominfosantik Kalimantan Tengah</p>';
		$kirim_pesan = array(
			'message' => $pesan,
		);
		// format send mail
		$this->email->initialize($config);
		$this->email->from($config['smtp_user']);
		$this->email->to($email); //email penerima
		$this->email->subject($subjek); //subjek email
		$this->email->message($kirim_pesan['message']);

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
		if (!empty($_FILES['upload_file']['name'])) {

			$config1['upload_path']   = './asset/assets/dokumen';
			$config1['allowed_types'] = 'png|jpg|doc|pdf';
			$config1['max_size']      = 100000; //100mb
			$config1['file_name']     = $tiket;

			$this->upload->initialize($config1);

			if ($this->upload->do_upload('upload_file')) {
				// mengambil data tentang file yang diupload
				$file = $this->upload->data();

				$file = $file['file_name'];
				$data['upload_file'] = $file;
				$this->m_data->insert_data($data, 'pengaduan');
			}
		} else {
			$this->m_data->insert_data($data, 'pengaduan');
		}


		// if ($this->email->send()) {
		// 	echo 'Sukses! email berhasil dikirim.';
		// 	redirect(base_url('contact'));
		// } else {
		// 	echo 'Error! email tidak dapat dikirim.';

		// 	$this->load->view('front/layout/header');
		// 	$this->load->view('front/layout/navbar');
		// 	$this->load->view('front/contact');
		// 	$this->load->view('front/layout/footer');
		// }


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
				$config['quality'] = '100%';
				$config['width'] = 1920;
				$config['height'] = 1080;
				$config['new_image'] = 'asset/assets/dokumen/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'asset/assets/dokumen/' . $data['file_name'];
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

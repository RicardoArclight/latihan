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


		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		$email_admin = $data['pengaturan']->link_email;
		$token = $data['pengaturan']->token;
		//config send mail
		$config = array(
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => $email_admin,  // Email gmail
			'smtp_pass'   => $token,  // Password gmail
			'smtp_port'   => 465,
			'smtp_timeout' => 5,
			'newline' => "\r\n"
		);

		$pesan = '<h1><p><b>' . $tiket . '</b></p></h1>';
		$pesan .= '<p>silahkan simpan nomor tiket ini</p>';
		$pesan .= '<p>Tiket digunakan untuk melihat status pengaduan</p>';
		$pesan .= '<br>
		<br><center><p><b>Terimakasih telah melakukan Pengaduan ke Pusat Layanan Diskominfosantik Kalimantan Tengah<b></p></center>';
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

		if (file_exists($_FILES['upload_file']['tmp_name'])) {
			$config1['upload_path']   = 'asset/assets/dokumen';
			$config1['allowed_types'] = 'png|jpg|doc|pdf';
			$config1['max_size']      = 100000; // 100mb
			$config1['file_name']     = $tiket;

			$this->upload->initialize($config1);

			if ($this->upload->do_upload('upload_file')) {
				// mengambil data tentang file yang diupload
				$file = $this->upload->data();

				$file_name = $file['file_name'];
				$data['upload_file'] = $file_name;
				$this->m_data->insert_data($data, 'pengaduan');
			} else {
				// Tampilkan pesan error jika upload gagal
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
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
}

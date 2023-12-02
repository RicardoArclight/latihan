<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		check_not_login();
		check_admin();
		$this->load->model('m_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "telah_login") {
			redirect(base_url() . 'login?alert=belum_login');
		}
    }
	public function index()
	{
		
		// // hitung jumlah pengguna
		$data['jumlah_pengguna'] = $this->m_data->get_data('pengguna')->num_rows();
		// // hitung jumlah halaman
		$data['jumlah_pengaduan'] = $this->m_data->get_data('pengaduan')->num_rows();

		$data['jumlah_ditanggapi'] =  $this->db->query('SELECT * FROM pengaduan WHERE status_pengaduan = "Ditanggapi"')->num_rows();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/layout/footer');
	}
	
    public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}
    public function ganti_password()
	{
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/layout/footer');
	}
    public function ganti_password_aksi()
	{

		// form validasi
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

		// cek validasi
		if ($this->form_validation->run() != false) {

			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');

			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'id' => $this->session->userdata('id'),
				'password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();

			// cek kesesuaikan password lama
			if ($cek > 0) {

				// update data password pengguna
				$w = array(
					'id' => $this->session->userdata('id')
				);
				$data = array(
					'password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');

				// alihkan halaman kembali ke halaman ganti password
				redirect('admin/ganti_password?alert=sukses');
			} else {
				// alihkan halaman kembali ke halaman ganti password
				redirect('admin/ganti_password?alert=gagal');
			}
		} else {
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/ganti_password');
		$this->load->view('admin/layout/footer');
		}
    }
	public function pengaduan()
	{
		$data = array(
			'pengaduan' => $this->m_data->get_data('pengaduan')->result()
		);
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/pengaduan/pengaduan', $data);
		$this->load->view('admin/layout/footer');
	}

	public function pengaduan_balas($id)
	{
		$where = array(
			'id' => $id
		);
		$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/pengaduan/pengaduan_balas', $data);
		$this->load->view('admin/layout/footer');
	}

	public function pengaduan_kirim()
	{
		$this->form_validation->set_rules('subject', 'subject', 'required');
		$this->form_validation->set_rules('pesan', 'pesan', 'required');

		if ($this->form_validation->run() != false) {

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

			$id = $this->input->post('id');
			$email = $this->input->post('email');
			$pesan = $this->input->post('pesan');
			$subject = $this->input->post('subject');
			$tgl = date('Y-m-d H:i:s');

			$where = array(
				'id' => $id
			);

			$data = array(
				'balasan_pengaduan' => $pesan,
				'tanggal_balasan' => $tgl,
				'status_pengaduan' => 'Sudah',
			);

			$this->m_data->update_data($where, $data, 'pengaduan');

			// $this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->from($config['smtp_user']);
			$this->email->to($email); //email penerima
			$this->email->subject($subject); //subjek email
			$this->email->message($pesan);

			if ($this->email->send()) {
				echo 'Sukses! email berhasil dikirim.';
				redirect(base_url() . 'admin/pengaduan/pengaduan');
			} else {
				echo 'Error! email tidak dapat dikirim.';
				$id = $this->input->post('id');
				$where = array(
					'id' => $id
				);
				$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
				$this->load->view('admin/layout/header');
				$this->load->view('admin/layout/navbar');
				$this->load->view('admin/layout/sidebar');
				$this->load->view('admin/pengaduan/pengaduan_balas', $data);
				$this->load->view('admin/layout/footer');
			}
		} else {

			$id = $this->input->post('id');
			$where = array(
				'id' => $id
			);
			$data['pengaduan'] = $this->m_data->edit_data($where, 'pengaduan')->result();
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/navbar');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/pengaduan/pengaduan_balas', $data);
			$this->load->view('admin/layout/footer');
			
		}
	}

	public function pengaduan_hapus($id)
	{
		$where = array(
			'id' => $id
		);

		$this->m_data->delete_data($where, 'pengaduan');

		redirect(base_url() . 'admin/pengaduan');
	}
	// END CRUD pengaduan
	
	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');

		$where = array(
			'id' => $id_pengguna
		);

		$data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/profil', $data);
		$this->load->view('admin/layout/footer');
	}

	public function profil_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() != false) {

			$id = $this->session->userdata('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');

			$where = array(
				'id' => $id
			);

			$data = array(
				'nama' => $nama,
				'email' => $email
			);

			$this->m_data->update_data($where, $data, 'pengguna');

			redirect(base_url() . 'admin/profil/?alert=sukses');
		} else {
			// id pengguna yang sedang login
			$id_pengguna = $this->session->userdata('id');

			$where = array(
				'id' => $id_pengguna
			);

			$data['profil'] = $this->m_data->edit_data($where, 'pengguna')->result();

			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/navbar');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/profil', $data);
			$this->load->view('admin/layout/footer');
		}
	}

	// CRUD PENGGUNA
	public function pengguna()
	{
		// check_admin();
		$data['pengguna'] = $this->m_data->get_data('pengguna')->result();
		// $data['pengguna'] = $this->db->query("SELECT * FROM pengguna group by jurusan ")->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/pengguna/pengguna', $data);
		$this->load->view('admin/layout/footer');
	}

	public function pengguna_tambah()
	{
		// check_admin();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/pengguna/pengguna_tambah');
		$this->load->view('admin/layout/footer');
	}
	
	public function pengguna_aksi()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('email', 'Email Pengguna', 'required');
		$this->form_validation->set_rules('username', 'Username Pengguna', 'required');
		$this->form_validation->set_rules('password', 'Password Pengguna', 'required|min_length[8]');
		$this->form_validation->set_rules('level', 'Level Pengguna', 'required');
		$this->form_validation->set_rules('status', 'Status Pengguna', 'required');

		if ($this->form_validation->run() != false) {

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');

			$data = array(
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'level' => $level,
				'status' => $status
			);


			$this->m_data->insert_data($data, 'pengguna');

			redirect(base_url() . 'admin/pengguna');
		} else {
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/navbar');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/pengguna/pengguna_tambah');
			$this->load->view('admin/layout/footer');
		}
	}

	public function pengguna_edit($id)
	{
		// check_admin();
		$where = array(
			'id' => $id
		);
		$data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/pengguna/pengguna_edit', $data);
		$this->load->view('admin/layout/footer');
	}
	public function pengguna_update()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
		$this->form_validation->set_rules('email', 'Email Pengguna', 'required|is_unique[pengguna.email]');
		$this->form_validation->set_rules('username', 'Username Pengguna', 'required|is_unique[pengguna.username]');
		$this->form_validation->set_rules('level', 'Level Pengguna', 'required');
		$this->form_validation->set_rules('status', 'Status Pengguna', 'required');

		if ($this->form_validation->run() != false) {

			$id = $this->input->post('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');

			if ($this->input->post('password') == "") {
				$data = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
					'level' => $level,
					'status' => $status
				);
			} else {
				$data = array(
					'nama' => $nama,
					'email' => $email,
					'username' => $username,
					'password' => $password,
					'level' => $level,
					'status' => $status
				);
			}

			$where = array(
				'id' => $id
			);

			$this->m_data->update_data($where, $data, 'pengguna');

			redirect(base_url() . 'admin/pengguna');
		} else {
			$id = $this->input->post('id');
			$where = array(
				'id' => $id
			);
			$data['pengguna'] = $this->m_data->edit_data($where, 'pengguna')->result();
			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/navbar');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/pengguna/pengguna_edit', $data);
			$this->load->view('admin/layout/footer');
		}
	}

	public function pengguna_hapus($id)
	{
		$where = array(
			'id' => $id
		);
		$data['hapus'] = $this->m_data->edit_data($where, 'pengguna')->row();
		$data['lain'] = $this->db->query("SELECT * FROM pengguna WHERE id != $id")->result();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/pengguna/pengguna_hapus', $data);
		$this->load->view('admin/layout/footer');
	}

	public function pengguna_hapus_aksi()
	{
		$hapus = $this->input->post('hapus');
		$tujuan = $this->input->post('tujuan');

		// hapus pengguna
		$where = array(
			'id' => $hapus
		);

		$this->m_data->delete_data($where, 'pengguna');

		// pindahkan semua berita pengguna yang dihapus ke pengguna yang dipilih
		$w = array(
			'pengguna_berita' => $hapus
		);

		$d = array(
			'pengguna_berita' => $tujuan
		);

		$this->m_data->update_data($w, $d, 'berita');

		redirect(base_url() . 'admin/pengguna');
	}
	// end crud pengguna

	public function pengaturan()
	{
		// check_admin();
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/pengaturan', $data);
		$this->load->view('admin/layout/footer');
	}

	public function pengaturan_update()
	{
		// Wajib isi nama dan deskripsi website
		$this->form_validation->set_rules('nama', 'Nama Website', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Website', 'required');

		if ($this->form_validation->run() != false) {

			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$link_email = $this->input->post('link_email');
			$link_wa = $this->input->post('link_wa');
			

			$where = array();

			$data = array(
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'link_email' => $link_email,
				'link_wa' => $link_wa,
			);

			// update pengaturan
			$this->m_data->update_data($where, $data, 'pengaturan');

			// Periksa apakah ada gambar logo yang diupload
			if (!empty($_FILES['logo']['name'])) {

				$config['upload_path']   = './gambar/website/';
				$config['allowed_types'] = 'jpg|png';
				$config['file_name']     = 'logo';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('logo')) {
					// mengambil data tentang gambar logo yang diupload
					$gambar = $this->upload->data();

					$logo = $gambar['file_name'];
					$where = array();
					$a = $this->m_data->edit_data($where, 'pengaturan')->row();
					$target_file = './gambar/website/' . $a->logo;
					unlink($target_file);

					$this->db->query("UPDATE pengaturan SET logo='$logo'");
				}
			}

			if (!empty($_FILES['bg']['name'])) {

				$config1['upload_path']   = './gambar/website/';
				$config1['allowed_types'] = 'jpg|png';
				$config1['file_name']     = 'bg';

				$this->load->library('upload', $config1);

				if ($this->upload->do_upload('bg')) {
					// mengambil data tentang gambar logo yang diupload
					$bgg = $this->upload->data();

					$bg = $bgg['file_name'];
					$where = array();
					$b = $this->m_data->edit_data($where, 'pengaturan')->row();
					$target_file = './gambar/website/' . $b->bg;
					unlink($target_file);

					$this->db->query("UPDATE pengaturan SET bg='$bg'");
				}
			}

			if (!empty($_FILES['struktur']['name'])) {

				$config2['upload_path']   = './gambar/website/';
				$config2['allowed_types'] = 'jpg|png';
				$config2['file_name']     = 'struktur';

				$this->load->library('upload', $config2);

				if ($this->upload->do_upload('struktur')) {
					// mengambil data tentang gambar logo yang diupload
					$strukturg = $this->upload->data();

					$struktur = $strukturg['file_name'];
					$where = array();
					$b = $this->m_data->edit_data($where, 'pengaturan')->row();
					$target_file = './gambar/website/' . $b->struktur;
					unlink($target_file);

					$this->db->query("UPDATE pengaturan SET struktur='$struktur'");
				}
			}

			redirect(base_url() . 'dashboard/pengaturan/?alert=sukses');
		} else {
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();

			$this->load->view('admin/layout/header');
			$this->load->view('admin/layout/navbar');
			$this->load->view('admin/layout/sidebar');
			$this->load->view('admin/pengaturan', $data);
			$this->load->view('admin/layout/footer');
		}
	}

	
}

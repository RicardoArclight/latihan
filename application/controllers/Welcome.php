<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_data');
	}
	public function index()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		$judul = $data['pengaturan']->deskripsi;
		// var_dump($judul);
		$kata_kata = explode(' ', $judul);

		// Ambil dua kata pertama
		$data['satu'] = $kata_kata[0] . ' ' . $kata_kata[1];
		$data['dua'] = $kata_kata[2] . ' ' . $kata_kata[3] . ' ' . $kata_kata[4];
		// var_dump($data);
		$this->load->view('front/layout/header');
		$this->load->view('front/layout/navbar');
		$this->load->view('front/index', $data);
		$this->load->view('front/layout/footer');
	}

	public function about()
	{
		$this->load->view('front/layout/header');
		$this->load->view('front/layout/navbar');
		$this->load->view('front/about');
		$this->load->view('front/index');
		$this->load->view('front/layout/footer');
	}

	public function contact()
	{
		$this->load->view('front/layout/header');
		$this->load->view('front/layout/navbar');
		$this->load->view('front/contact');
		$this->load->view('front/layout/footer');
	}

	public function search()
	{
		$tiket = $this->input->post('tiket');
		$data = array(
			'pengaduan' => $this->m_data->caridata($tiket)->row()
		);

		$this->load->view('front/layout/header');
		$this->load->view('front/layout/navbar');
		$this->load->view('front/search', $data);
		$this->load->view('front/layout/footer');
	}
}

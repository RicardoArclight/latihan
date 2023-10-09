<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->view('front/layout/header');
		$this->load->view('front/layout/navbar');
		$this->load->view('front/index');
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
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('public/dashboard');
	}

	public function user() {
		$this->load->view('public/user');
	}

	public function admin() {
		$this->load->view('public/admin');
	}

	public function kunci() {
		$this->load->view('public/kunci');
	}

	public function pinjam() {
		$this->load->view('public/pinjam');
	}
}

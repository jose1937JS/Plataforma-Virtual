<?php

class Profesores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProfesoresModel');
	}

	public function index()
	{
		$data['txt'] = "She doesn't love me :( fuck my life";

		$this->load->view('includes/header');
		$this->load->view('profesores/profesores', $data);
		$this->load->view('includes/footer');
	}

}
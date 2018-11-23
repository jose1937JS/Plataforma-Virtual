<?php

class Estudiante extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EstudiantesModel');
	}

	public function index()
	{
		$data['jose'] = "jose";

		$this->load->view('header');
		$this->load->view('estudiante', $data);
		$this->load->view('footer');
	}
}
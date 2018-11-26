<?php

class Estudiantes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EstudiantesModel');
	}

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('estudiantes/estudiantes');
		$this->load->view('includes/footer');
	}

	public function materias($param)
	{
		$this->load->view('includes/header');
		$this->load->view('estudiantes/clases');
		$this->load->view('includes/footer');
	}
}
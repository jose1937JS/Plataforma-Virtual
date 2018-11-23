<?php

class Profesores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProfesoresModel');
	}

	public function index()
	{
		$data['txt'] = 'ella no me ama';

		$this->load->view('header');
		$this->load->view('profesores', $data);
		$this->load->view('footer');
	}

}
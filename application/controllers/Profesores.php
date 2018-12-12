<?php

class Profesores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProfesoresModel');
		$this->load->model('EstudiantesModel');
	}

	public function index()
	{
		$usuario = $this->session->userdata('sesion');

		if ( $usuario['role'] == 'profesor' )
		{
			$user['user'] = $usuario;

			$data['materias'] = $this->EstudiantesModel->getMaterias($usuario['usuario']);

			$this->load->view('includes/header', $user);
			$this->load->view('estudiantes/estudiantes', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect('');
		}
	}



	// LOGICA PARA EL USUARIO ADMINISTRADOR, NO TIENE NADA Q VER CON EL PROFESOR.

	public function admin()
	{
		$user = $this->session->userdata('sesion');
		
		if ( $user['role'] == 'admin' )
		{
			$usuario['user'] = $user;

			$this->load->view('includes/header', $usuario);
			$this->load->view('administracion');
			$this->load->view('includes/footer');
		}
		else {
			redirect();
		}
	}

	public function perfil()
	{
		$user = $this->session->userdata('sesion');
		
		if ( $user['role'] == 'profesor' )
		{
			$usuario['user'] = $user;

			$this->load->view('includes/header', $usuario);
			$this->load->view('perfil');
			$this->load->view('includes/footer');
		}
		else {
			redirect();
		}
	}

}
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

			$str = explode('/', current_url());
			(isset($str[5]) && $str[5] == 'notas')? $bool = true : $bool = false;
			(isset($str[5]) && $str[5] == 'profesor')? $bol = true : $bol = false;
			$user['url'] = $bool;
			$user['blank'] = $bol;

			$data['materias']    = $this->EstudiantesModel->getMaterias($usuario['usuario']);
			$data['allmaterias'] = $this->ProfesoresModel->getMaterias();
			$data['personaid']   = $this->EstudiantesModel->getIdPersona($usuario['usuario']);

			$this->load->view('includes/header', $user);
			$this->load->view('estudiantes/estudiantes', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect('');
		}
	}

	public function clasenueva()
	{
		$seccion   = $this->input->post('seccion');
		$materia   = $this->input->post('materia');
		$personaid = $this->input->post('personaid');

		$this->ProfesoresModel->clasenueva($seccion, $materia, $personaid);

		redirect('profesor');
	}

	public function notas()
	{
		$user = $this->session->userdata('sesion');
		
		if ( $user['role'] == 'profesor' )
		{
			$usuario['user'] = $user;

			$data['materias'] = $this->EstudiantesModel->getMaterias($user['usuario']);

			$str = explode('/', current_url());
			(isset($str[5]) && isset($str[6]) && $str[5] == 'notas')? $bool = true : $bool = false;
			(isset($str[5]) == 'profesor')? $bol = true : $bol = false;
			$usuario['blank'] = $bol;
			$usuario['url'] = $bool;

			$this->load->view('includes/header', $usuario);
			$this->load->view('profesores/notas', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect();
		}
	}

	public function materianotas($materia, $seccion)
	{
		$user = $this->session->userdata('sesion');
		
		if ( $user['role'] == 'profesor' )
		{
			$usuario['user'] = $user;

			$data['materias'] = $this->EstudiantesModel->getMaterias($user['usuario']);

			$str = explode('/', current_url());
			(isset($str[5]) && $str[5] == 'notas')? $bool = true : $bool = false;
			$usuario['url'] = $bool;

			$this->load->view('includes/header', $usuario);
			$this->load->view('profesores/notasmateria', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect();
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
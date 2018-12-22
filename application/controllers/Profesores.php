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
			(isset($str[5]) && $str[5] == 'notas')? $bool   = true : $bool = false;
			(isset($str[5]) && $str[5] == 'profesor')? $bol = false : $bol = true;
			$user['url']   = $bool;
			$user['blank'] = $bol;

			$data['materias']    = $this->EstudiantesModel->getMaterias($usuario['usuario']);
			$data['allmaterias'] = $this->ProfesoresModel->getMaterias();
			$data['personaid']   = $this->EstudiantesModel->getIdPersona($usuario['usuario']);

			$this->load->view('includes/header');
			$this->load->view('includes/sidebar', $user);
			$this->load->view('estudiantes/estudiantes', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect('');
		}
	}

	public function notas()
	{
		$user = $this->session->userdata('sesion');

		if ( $user['role'] == 'profesor' )
		{
			$usuario['user']    = $user;

			$data['materias'] = $this->EstudiantesModel->getMaterias($user['usuario']);

			$str = explode('/', current_url());
			(isset($str[5]) && isset($str[6]) && $str[5] == 'notas')? $bool = true : $bool = false;
			(isset($str[5]) == 'profesor')? $bol = false : $bol = true;
			$usuario['blank'] = $bol;
			$usuario['url']   = $bool;

			$usuario['materia'] = $str[5];

			$this->load->view('includes/header');
			$this->load->view('includes/sidebar', $usuario);
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
			$str = explode('/', current_url());

			$usuario['user'] = $user;

			$data['materias'] = $this->EstudiantesModel->getMaterias($user['usuario']);
			$data['notas'] 	  = $this->ProfesoresModel->getNotas($str[6]);

			(isset($str[5]) && $str[5] == 'notas')? $bool   = true : $bool = false;
			(isset($str[5]) && $str[5] == 'profesor')? $bol = false : $bol = true;
			$usuario['url']   = $bool;
			$usuario['blank'] = $bol;

			// getSeccId(materia, seccion)
			$id = $this->EstudiantesModel->getSeccId($str[6], $str[7]);
			$usuario['materia'] = $str[6];
			$usuario['alumnos'] = $this->EstudiantesModel->getAlumnos($id);
			$usuario['seccion'] = $seccion;

			$this->load->view('includes/header');
			$this->load->view('includes/sidebar', $usuario);
			$this->load->view('profesores/notasmateria', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect();
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


	public function addnotas()
	{
		$materia    = $this->input->post('materia');
		$evaluacion = $this->input->post('evaluacion');
		$alumno 	= $this->input->post('alumno');
		$nota 		= $this->input->post('nota');
		// $seccion	= $this->input->post('seccion');

		$registro = $this->ProfesoresModel->getRegister($alumno, $evaluacion, $materia);

		if ($materia == $registro[0]->materia && $evaluacion == $registro[0]->evaluacion && $alumno == $registro[0]->alumno) {
			die('El alumno ya tiene ésta nota cargada.');
		}

		$this->ProfesoresModel->addnotas($materia, $evaluacion, $alumno, $nota);

		// redirect("notas/$materia/$seccion");
	}




	public function perfil()
	{
		$user = $this->session->userdata('sesion');

		if ( $user['role'] == 'profesor' || $user['role'] == 'alumno')
		{
			$usuario['user'] = $user;

			(isset($str[5]) && $str[5] == 'notas')? $bool   = true : $bool = false;
			(isset($str[5]) && $str[5] == 'profesor')? $bol = false : $bol = true;
			$usuario['url']   = $bool;
			$usuario['blank'] = $bol;

			$data['perfil'] = $this->ProfesoresModel->perfil($user['usuario']);

			$this->load->view('includes/header');
			$this->load->view('includes/sidebar', $usuario);
			$this->load->view('perfil', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect();
		}
	}

	public function editperfil()
	{
		$nombre    = $this->input->post('nombre');
		$apellido  = $this->input->post('apellido');
		$email     = $this->input->post('email');
		$telefono  = $this->input->post('telefono');
		$usuario   = $this->input->post('usuario');
		$clave 	   = $this->input->post('clave');
		$idpersona = $this->input->post('idpersona');

		$this->ProfesoresModel->editperfil($idpersona, $nombre, $apellido, $telefono, $email, $usuario, $clave);

		redirect("perfil");

	}

	public function editimg()
	{
		$idpersona = $this->input->post('idpersona');

		$config['upload_path']   = './application/third_party/';
		$config['max_size']	     = '5000';
		$config['allowed_types'] = 'png|ico|jpg|jpeg|gif';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload('image') )
		{
			$files    = $this->upload->data();
			$filename = $files['file_name'];

			$this->ProfesoresModel->editimg($filename, $idpersona);

			redirect("perfil");
		}

	}

	public function crearcuenta()
	{
		$nombre   = $this->input->post('nombre');
		$apellido = $this->input->post('apellido');
		$correo   = $this->input->post('correo');
		$telefono = $this->input->post('telefono');
		$tipo 	  = $this->input->post('tipo');
		$usuario  = $this->input->post('usuario');
		$clave    = $this->input->post('clave');

		$user = $this->ProfesoresModel->getUser($usuario);

		if ($user[0]->usuario == $usuario) {

			die("Este usuario ya existe.");

		}

		$this->ProfesoresModel->crearcuenta($nombre, $apellido, $correo, $telefono, $tipo, $usuario, $clave);
	}

}
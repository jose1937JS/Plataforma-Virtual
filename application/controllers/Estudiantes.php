<?php

class Estudiantes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EstudiantesModel');
	}

	public function index()
	{
		$usuario = $this->session->userdata('sesion');

		if ( $usuario['role'] == 'alumno' )
		{
			$user = $this->session->userdata('sesion');
			$data['materias'] = $this->EstudiantesModel->getMaterias($user['usuario']);
			$usuario['user'] = $user;

			$this->load->view('includes/header', $usuario);
			$this->load->view('estudiantes/estudiantes', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect('');
		}
	}

	public function materias($materia, $seccion)
	{	
		$user = $this->session->userdata('sesion');
	
		if ( $user['role'] == 'alumno' || $user['role'] == 'profesor' )
		{
			$seccionid = $this->EstudiantesModel->getSeccId($materia, $seccion);

			$data['publicaciones'] = $this->EstudiantesModel->getPublicaciones($seccionid[0]->id_seccion);
			$data['personaid']     = $this->EstudiantesModel->getIdPersona($user['usuario']);

			$data['materia']   = $materia;
			$data['seccion']   = $seccion;
			$data['seccionid'] = $seccionid[0]->id_seccion;
			$user['user']      = $user;
			$data['user']      = $user;

			$this->load->view('includes/header', $user);
			$this->load->view('estudiantes/clases', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect();
		}
	}

	public function comentar()
	{
		$comentario    = $this->input->post('comentario');
		$personaid     = $this->input->post('persona');
		$publicacionid = $this->input->post('publicacion');

		$config['upload_path']   = './application/third_party/';
		$config['max_size']	     = '11264'; // 11 megas * 1024
		$config['allowed_types'] = 'txt|doc|docx|xls|csv|odp|odg|ppxs|otp|png|ico|jpg|jpeg|gif|ppt|xlxs|ods|sql|php|html|xml|css|js|py|cpp|java|pdf';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload('archivo') )
		{
			$files    = $this->upload->data();
			$filename = $files['file_name'];

			$this->EstudiantesModel->comentar($comentario, $filename, $personaid, $publicacionid);

			redirect("publicacion/$publicacionid");
		}
		else
		{
			$this->EstudiantesModel->comentar($comentario, '', $personaid, $publicacionid);
			
			// $this->output
			// 	->set_content_type('application/json')
			// 	->set_output(json_encode($this->upload->display_errors()));
		}


		redirect("publicacion/$publicacionid");
	}

	public function publicar()
	{
		$materia 	= $this->input->post('materia');
		$seccion 	= $this->input->post('seccion');
		$seccionid  = $this->input->post('seccionid');

		$persona 	= $this->session->userdata('sesion');
		$personaid  = $this->EstudiantesModel->getIdPersona($persona['usuario']);

		$texto   	= $this->input->post('publicacion');

		if ( $persona['role'] == 'profesor' )
		{
			$config['upload_path']   = './application/third_party/';
			$config['max_size']	     = '11264'; // 11 megas * 1024
			$config['allowed_types'] = 'txt|doc|docx|xls|csv|odp|odg|ppxs|otp|png|ico|jpg|jpeg|gif|ppt|xlxs|ods|sql|php|html|xml|css|js|py|cpp|java|pdf';

			$this->load->library('upload', $config);

			if ( $this->upload->do_upload('file') )
			{
				$files    = $this->upload->data();
				$filename = $files['file_name'];

				$this->EstudiantesModel->publicar($texto, $filename, $seccionid, $personaid[0]->id_persona);

				redirect("profesor/$materia/$seccion");
			}
			else
			{
				$this->EstudiantesModel->publicar($texto, null, $seccionid, $personaid[0]->id_persona);
				
				// $this->output
				// 	->set_content_type('application/json')
				// 	->set_output(json_encode($this->upload->display_errors()));
			}
		}
		else {
			$this->EstudiantesModel->publicar($texto, null, $seccionid, $personaid[0]->id_persona);
		}


		redirect("estudiante/$materia/$seccion");

	}

	public function publicacion($id)
	{
		if( $this->session->has_userdata('sesion') )
		{
			$data['publicacion'] = $this->EstudiantesModel->getPublicacion($id);
			$data['comentarios'] = $this->EstudiantesModel->getComentarios($id);
			$data['idpub']	   	 = $id;

			$persona 	= $this->session->userdata('sesion');
			$personaid  = $this->EstudiantesModel->getIdPersona($persona['usuario']);

			$data['idpersona'] = $personaid;

			$usuario['user'] = $persona;

			$this->load->view('includes/header', $usuario);
			$this->load->view('estudiantes/publicacion', $data);
			$this->load->view('includes/footer');
		}
		else {
			redirect('');
		}
	}

	public function editcomment()
	{
		$comentario   = $this->input->post('comment');
		$idcomentario = $this->input->post('idcomentario');
		$idpub		  = $this->input->post('idpub');

		$this->EstudiantesModel->editcomment($comentario, $idcomentario);

		redirect("publicacion/$idpub");
	}

	public function eliminarcomment()
	{
		$idcomentario = $this->input->post('idcomentario');
		$idpub		  = $this->input->post('idpub');

		$this->EstudiantesModel->eliminarcomment($idcomentario);

		redirect("publicacion/$idpub");
	}

	public function returndatamodal()
	{
		$id   = $this->input->post('id');
		$data = $this->EstudiantesModel->comentario($id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}

	public function eliminarpub()
	{
		$idpub   = $this->input->post('idpub');
		$materia = $this->input->post('materia');
		$seccion = $this->input->post('seccion');

		$this->EstudiantesModel->eliminarpub($idpub);

		redirect("estudiante/$materia/$seccion");
	}
}
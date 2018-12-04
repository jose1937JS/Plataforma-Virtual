<?php

class Estudiantes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('EstudiantesModel');
	}

	public function index()
	{
		$user = $this->session->userdata('sesion');
		$data['materias'] = $this->EstudiantesModel->getMaterias($user['usuario']);

		$this->load->view('includes/header');
		$this->load->view('estudiantes/estudiantes', $data);
		$this->load->view('includes/footer');
	}

	public function materias($materia, $seccion)
	{
		$user = $this->session->userdata('sesion');

		$seccionid = $this->EstudiantesModel->getSeccId($materia, $seccion);

		$data['publicaciones'] = $this->EstudiantesModel->getPublicaciones($seccionid[0]->id_seccion);
		$data['materia'] = $materia;
		$data['seccion'] = $seccion;
		$data['seccionid'] = $seccionid[0]->id_seccion;

		$this->load->view('includes/header');
		$this->load->view('estudiantes/clases', $data);
		$this->load->view('includes/footer');
	}

	public function comentar()
	{
		$comentario = $this->input->post('comentario');
		$materia 	= $this->input->post('materia');
		$seccion 	= $this->input->post('seccion');

		$this->EstudiantesModel->comentar($comentario);

		redirect("estudiante/$materia/$seccion");
	}

	public function publicar()
	{
		// ini_set('upload_max_filesize', '12M');

		$materia 	= $this->input->post('materia');
		$seccion 	= $this->input->post('seccion');
		$seccionid  = $this->input->post('seccionid');
		$personaid  = $this->input->post('personaid');
		$texto   	= $this->input->post('publicacion');

		var_dump($seccionid);exit();

		$this->EstudiantesModel->publicar($texto, $seccionid);

		redirect("estudiante/$materia/$seccion");

		// $config['upload_path']   = './application/third_party/';
		// $config['max_size']	     = '11264'; // 11 megas * 1024
		// $config['allowed_types'] = 'txt|doc|docx|xls|csv|odp|odg|ppxs|otp||png|jpg|jpeg|gif|ppt|xlxs|ods|sql|php|html|xml|css|js|py|cpp|java|pdf';

		// $this->load->library('upload', $config);

		// if ( $this->upload->do_upload('archivos') )
		// {
		// 	$files = $this->upload->data();
		// 	$this->EstudiantesModel->publicar($texto);

		// 	redirect("estudiante/$materia/$seccion");
		// }
		// else
		// {
		// 	$this->EstudiantesModel->publicar($texto);

		// 	$this->output
		// 		->set_content_type('application/json')
		// 		->set_output(json_encode($this->upload->display_errors()));
		// }

	}
}
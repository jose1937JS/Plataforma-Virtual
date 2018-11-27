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

		var_dump($data['publicaciones']);die;

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
}
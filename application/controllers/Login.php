<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('login');
		$this->load->view('includes/footer');
	}

	public function login()
	{
		$user = $this->input->post('usuario');
		$pass = $this->input->post('clave');

		$data = $this->LoginModel->getUsers($user); 

		if ( count($data) > 0 )
		{
			if ( $pass == $data[0]->clave )
			{
				$this->session->set_userdata('sesion', ['role' => $data[0]->role, 'usuario' => $user]);
				
				if ( $data[0]->role == 'profesor' )
				{
					redirect('profesor');
				}
				else {
					redirect('estudiante');
				}
			}
			else {
				$this->session->set_flashdata('badpass', 'Contraseña incorrecta');
				redirect('');
			}
		} 
		else {
			$this->session->set_flashdata('baduser', 'Usuario incorrecto');
			redirect('');
		}
	}

	public function logout()
	{
		if ( $this->session->has_userdata('sesion') )
		{
			$this->session->unset_userdata('sesion');
			redirect('');
		}
	}


}

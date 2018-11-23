<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function login()
	{
		$user = $this->input->post('usuario');
		$pass = $this->input->post('clave');

		$data = $this->LoginModel->getUsers($user);


		if ( isset($data) )
		{
			if ( $pass == $data[0]->clave ) {
				$this->session->set_userdata(['role' => $data[0]->role, 'usuario' => $user]);
				redirect('dashboard');
			}
			else {
				$this->session->set_flashdata('badpass', 'Contraseña incorrecta');
				redirext('');
			}
		} 
		else {
			$this->session->set_flashdata('baduser', 'Usuario incorrecto');
			redirext('');
		}
	}

	public function logout()
	{
		$session = $this->session->userdata();
	}


}

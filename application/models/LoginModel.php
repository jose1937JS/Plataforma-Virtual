<?php

class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getUsers($usuario)
	{
		return $this->db->get_where('Usuarios', ['usuario' => $usuario])->result();
	}
}
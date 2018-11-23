<?php

class Modelo extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getUsers()
	{
		return $this->db->get('users');
	}
}
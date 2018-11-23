<?php

class ProfesoresModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function something()
	{
		return '123';
	}
}
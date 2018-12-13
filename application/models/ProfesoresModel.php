<?php

class ProfesoresModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getMaterias()
	{
		return $this->db->get('Materias')->result();
	}

	public function clasenueva($seccion, $materiaid, $personaid)
	{
		$this->db->insert('Secciones', [
			'seccion' => $seccion,
			'materia_id' => $materiaid
		]);

		$seccionid = $this->db->select('MAX(id_seccion) as id')
						->from('Secciones')
						->get()->result();

		$this->db->insert('PersonaSecciones', [
			'persona_id' => $personaid,
			'seccion_id' => $seccionid[0]->id
		]);
	}
}
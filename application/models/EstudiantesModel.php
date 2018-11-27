<?php

class EstudiantesModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getMaterias($usuario)
	{
		return $this->db->select('*')
				->from('PersonaSecciones')
				->join('Personas', 'Personas.id_persona = PersonaSecciones.persona_id')
				->join('Secciones', 'Secciones.id_seccion = PersonaSecciones.seccion_id')
				->join('Materias', 'Materias.id_materia = Secciones.materia_id')
				->join('Usuarios', 'Usuarios.persona_id = Personas.id_persona')
				->where('Usuarios.usuario', $usuario)
				->get()->result();
	}

	public function getSeccId($materia, $seccion)
	{
		return $this->db->select('*')
				->from('Secciones')
				->join('Materias', 'Materias.id_materia = Secciones.materia_id')
				->where('seccion', $seccion)
				->where('materia', $materia)
				->get()->result();
	}

	public function getPublicaciones($seccid)
	{
		return $this->db->select('*')
				->from('Publicaciones')
				->join('Materias', 'Materias.id_materia = Publicaciones.seccion_id')
				->join('Personas', 'Personas.id_persona = Publicaciones.persona_id')
				->join('Secciones', 'Secciones.id_seccion = Publicaciones.seccion_id')
				->where('Publicaciones.seccion_id', $seccid)
				->get()->result();
	}

	public function comentar($comentario)
	{

	}
}
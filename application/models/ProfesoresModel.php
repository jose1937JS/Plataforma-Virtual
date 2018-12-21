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

	public function addnotas($materia, $evaluacion, $alumno, $nota)
	{
		$this->db->insert('Notas', [
			'materia'    => $materia,
			'evaluacion' => $evaluacion,
			'alumno'     => $alumno,
			'nota'		 => $nota
		]);
	}

	public function getNotas($materia)
	{
		return $this->db->get_where('Notas', ['materia' => $materia])->result();
	}

	public function perfil($user)
	{
		return $this->db->select('*')
					->from('Personas')
					->join('Usuarios', 'Usuarios.persona_id = Personas.id_persona')
					->where('Usuarios.usuario', $user)
					->get()->result();
	}

	public function editperfil($idpersona, $nombre, $apellido, $telefono, $email, $usuario, $clave, $filename)
	{
		$this->db->where('id_persona', $idpersona);
		$this->db->update('Personas', [
			'nombre' 	  => $nombre,
			'apellido' 	  => $apellido,
			'correo' 	  => $email,
			'telefono'	  => $telefono,
			'foto_perfil' => $filename
		]);

		$this->db->where('persona_id', $idpersona);
		$this->db->update('Usuarios', [
			'usuario' 	  => $usuario,
			'clave' 	  => $clave
		]);

	}

	public function crearcuenta($nombre, $apellido, $correo, $telefono, $tipo, $usuario, $clave)
	{
		$this->db->insert('Personas', [
			'nombre'   => $nombre,
			'apellido' => $apellido,
			'correo'   => $correo,
			'telefono' => $telefono
		]);

		$id = $this->db->query("SELECT MAX(id_persona) as lastid FROM Personas")->result();

		$this->db->insert('Usuarios', [
			'usuario'	 => $usuario,
			'clave'   	 => $clave,
			'tipo'       => $tipo,
			'persona_id' => $id[0]->lastid
		]);
	}

}
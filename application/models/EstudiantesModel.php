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
		return $this->db->select('Secciones.id_seccion, Materias.materia')
				->from('Secciones')
				->join('Materias', 'Materias.id_materia = Secciones.materia_id')
				->where('seccion', $seccion)
				->where('materia', $materia)
				->get()->result();
	}

	public function getIdPersona($user)
	{
		return $this->db->select('Personas.id_persona')
				->from('Usuarios')
				->join('Personas', 'Personas.id_persona = Usuarios.persona_id')
				->where('Usuarios.usuario', $user)
				->get()->result();
	}

	public function getPublicaciones($seccid)
	{
		return $this->db->select('Publicaciones.id_publicacion, Publicaciones.publicacion, Publicaciones.archivo, Publicaciones.fecha, Publicaciones.seccion_id, Materias.materia, Personas.nombre, Personas.apellido, Secciones.seccion')
				->from('Publicaciones')
				->join('Secciones', 'Secciones.id_seccion = Publicaciones.seccion_id')
				->join('Materias', 'Materias.id_materia = Secciones.materia_id')
				->join('Personas', 'Personas.id_persona = Publicaciones.persona_id')
				->where('Publicaciones.seccion_id', $seccid)
				->get()->result();
	}

	public function getPublicacion($id)
	{
		return $this->db->select('Publicaciones.publicacion, Publicaciones.archivo, Publicaciones.fecha, Publicaciones.persona_id, Personas.nombre, Personas.apellido')
				->from('Publicaciones')
				->join('Personas', 'Personas.id_persona = Publicaciones.persona_id')
				->where('Publicaciones.id_publicacion', $id)
				->get()->result();
	}

	public function getComentarios($id)
	{
		return $this->db->select('Comentarios.id_comentario, Comentarios.comentario, Comentarios.archivo, Comentarios.fecha, Personas.nombre, Personas.apellido')
				->from('PubicacionComentarios')
				->join('Comentarios', 'Comentarios.id_comentario = PubicacionComentarios.comentario_id')
				->join('Personas', 'Personas.id_persona = Comentarios.persona_id')
				->join('Publicaciones', 'Publicaciones.id_publicacion = PubicacionComentarios.publicacion_id')
				->where('PubicacionComentarios.publicacion_id', $id)
				->get()->result();
	}

	public function publicar($texto, $seccionid, $personaid)
	{
		$this->db->insert('Publicaciones', [
			'publicacion' => $texto,
			'fecha' 	  => date('d-m-Y H:i:s'),
			'seccion_id'  => $seccionid,
			'persona_id'  => $personaid
		]);
	}

	public function comentar($comentario, $archivo, $personaid, $publicacionid)
	{
		$this->db->insert('Comentarios', [
			'comentario' => $comentario,
			'archivo'    => $archivo,
			'fecha' 	 => date('d-m-Y H:i:s'),
			'persona_id' => $personaid
		]);

		$comentarioid = $this->db->select('MAX(id_comentario) as id')
				->from('Comentarios')
				->get()->result();

		$this->db->insert('PubicacionComentarios', [
			'publicacion_id' => $publicacionid,
			'comentario_id'  => $comentarioid[0]->id
		]);
	}

	public function comentario($id)
	{
		return $this->db->select('Comentarios.comentario, Comentarios.id_comentario')
				->from('Comentarios')
				->where('Comentarios.id_comentario', $id)
				->get()->result();
	}

	public function editcomment($comentario, $idcomentario)
	{
		$this->db->where('id_comentario', $idcomentario);

		$this->db->update('Comentarios', [
			'comentario' => $comentario,
			'fecha'	 	 => date('d-m-Y H:i:s')
		]);
	}

	public function eliminarcomment($idcomment)
	{
		$this->db->where('comentario_id', $idcomment)
				->delete('PubicacionComentarios');
				
		$this->db->where('id_comentario', $idcomment)
				->delete('Comentarios');

	}
}
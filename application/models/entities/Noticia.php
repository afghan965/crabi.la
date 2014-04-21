<?php
class Noticia {

	private $_fields = array(
			"id" => NULL,
			"id_categoria" => NULL,
			"id_estado" => NULL,
			"id_red_social" => NULL,
			"titulo" => NULL,
			"descripcion" => NULL,
			"contenido" => NULL,
			"pregunta" => NULL,
			"imagen_real" => NULL,
			"imagen_falsa" => NULL,
			"fecha_publicacion" => NULL,
			"destacado" => 0,
			"seo_titulo" => NULL,
			"seo_descripcion" => NULL,
			"slug" => NULL,
			"url" => NULL
		);

	function __construct($entity = null) {

		if(!is_null($entity)) {
			foreach($entity as $field => $value) {
				$this->_fields[$field] = $value;
			}
		}

	}

	public function setField($field, $value) {
		$this->_fields[$field] = $value;
		return $this;
	}

	public function getField($field) {
		return $this->_fields[$field];
	}

}

?>
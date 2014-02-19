<?php 
class Estado {

	private $_id;
	private $_nombre;

	function __construct($id = null, $nombre = null) {

		if(!is_null($id)) $this->_id = $id;
		if(!is_null($nombre)) $this->_nombre = $nombre;

	}

	function setId($id) {
		$this->_id = $id;
		return $this;
	}

	function getId() {
		return $this->_id;
	}

	function setNombre($nombre) {
		$this->_nombre = $nombre;
		return $this;
	}

	function getNombre() {
		return $this->_nombre;
	}

}
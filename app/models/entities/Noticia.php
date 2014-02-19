<?php 
class RedSocial {

	private $_id;
	private $_idCategoria;
	private $_idRedSocial;
	private $_idEstado;
	private $_titulo;
	private $_descripcion;
	private $_contenido;
	private $_thumbnail;
	private $_fechaPublicacion;
	private $_destacado;

	function __construct($id = null, $idCategoria = null, $idRedSocial = null, $idEstado = null, $titulo = null, $descripcion = null, $contenido = null, $thumbnail = null, $fechaPublicacion = null, $destacado = null) {

		if(!is_null($id)) $this->_id = $id;
		if(!is_null($idCategoria)) $this->_idCategoria = $idCategoria;
		if(!is_null($idRedSocial)) $this->_idRedSocial = $idRedSocial;
		if(!is_null($idEstado)) $this->_idEstado = $idEstado;
		if(!is_null($titulo)) $this->_titulo = $titulo;
		if(!is_null($descripcion)) $this->_descripcion = $descripcion;
		if(!is_null($contenido)) $this->_contenido = $contenido;
		if(!is_null($thumbnail)) $this->_thumbnail = $thumbnail;
		if(!is_null($fechaPublicacion)) $this->_fechaPublicacion = $fechaPublicacion;
		if(!is_null($destacado)) $this->_destacado = $destacado;

	}

	function setId($id) {
		$this->_id = $id;
		return $this;
	}

	function getId() {
		return $this->_id;
	}

	function setIdCategoria($idCategoria) {
		$this->_idCategoria = $idCategoria;
		return $this;
	}

	function getIdCategoria() {
		return $this->_idCategoria;
	}

	function setIdRedSocial($idRedSocial) {
		$this->_idRedSocial = $idRedSocial;
		return $this;
	}

	function getIdRedSocial() {
		return $this->_idRedSocial;
	}

	function setIdEstado($idEstado) {
		$this->_idEstado = $idEstado;
		return $this;
	}

	function getIdEstado() {
		return $this->_idEstado;
	}

	function setTitulo($titulo) {
		$this->_titulo = $titulo;
		return $this;
	}

	function getTitulo() {
		return $this->_titulo;
	}

	function setDescripcion($descripcion) {
		$this->_descripcion = $descripcion;
		return $this;
	}

	function getDescripcion() {
		return $this->_descripcion;
	}

	function setContenido($contenido) {
		$this->_contenido = $contenido;
		return $this;
	}

	function getContenido() {
		return $this->_contenido;
	}

	function setThumbnail($thumbnail) {
		$this->_thumbnail = $thumbnail;
		return $this;
	}

	function getThumbnail() {
		return $this->_thumbnail;
	}

	function setFechaPublicacion($fechaPublicacion) {
		$this->_fechaPublicacion = $fechaPublicacion;
		return $this;
	}

	function getFechaPublicacion() {
		return $this->_fechaPublicacion;
	}

	function setDestacado($destacado) {
		$this->_destacado = $destacado;
		return $this;
	}

	function getDestacado() {
		return $this->_destacado;
	}	

}
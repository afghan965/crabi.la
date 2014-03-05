<?php

require_once dirname(__FILE__) . '/../services/Database/Mysql.php';
require_once dirname(__FILE__) . '/../entities/Noticia.php';

class NoticiaMapper 
{

	protected $_mysql;

	function __construct() 
	{
		$this->_mysql = new Mysql();
	}

	public function save($data) 
	{
		$noticia = new Noticia($data);
		$link = $this->_mysql->connect(); 

		$sql = "
			INSERT INTO 
				noticia (id_categoria, id_estado, id_red_social, titulo, descripcion, contenido, pregunta, imagen_real, destacado, seo_titulo, seo_descripcion) 
			VALUES 
				('". $data['id_categoria'] ."', '". $data['id_estado'] ."', '". $data['id_red_social'] ."', '". $data['titulo'] ."', '". $data['descripcion'] ."', '". $data['contenido'] ."', '". $data['pregunta'] ."', '". $data['imagen_real'] ."', '". $data['destacado'] ."', '". $data['seo_titulo'] ."', '". $data['seo_descripcion'] ."')";
		$res = mysql_query($sql) or die(mysql_error());

		return mysql_insert_id();
	}

	public function getDestacadas() 
	{
		$link = $this->_mysql->connect(); 
		$sql = "SELECT * FROM noticia WHERE destacado = 1 ORDER BY fecha_publicacion DESC LIMIT 7";
		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) == 0) {
			return null;
		} else {
			$noticias = array();
			for($i=0; $i<mysql_num_rows($res); $i++) {
				
			}
		}
	}

}
?>
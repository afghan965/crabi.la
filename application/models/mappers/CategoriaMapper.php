<?php

require_once dirname(__FILE__) . '/../services/Database/Mysql.php';
require_once dirname(__FILE__) . '/../entities/Categoria.php';

class CategoriaMapper 
{

	protected $_mysql;

	function __construct() 
	{
		$this->_mysql = new Mysql();
	}

	public function getAll() 
	{
		$link = $this->_mysql->connect(); 

		$sql = "SELECT * FROM categoria ORDER BY nombre ASC";
		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) == 0) {
			return null;
		} else {
			$arrCategoria = array();
			for($i=0; $i<mysql_num_rows($res); $i++) {
				$categoria = new Categoria();
				$categoria->setField('id', mysql_result($res, $i, "id"));
				$categoria->setField('nombre', mysql_result($res, $i, "nombre"));
				$categoria->setField('slug', mysql_result($res, $i, "slug"));
				$arrCategoria[] = $categoria;
			}
		}

		return $arrCategoria;
	}

	public function getById($id) 
	{
		$link = $this->_mysql->connect(); 

		$sql = "SELECT * FROM categoria WHERE id = $id";
		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) == 0) {
			return null;
		} else {
			$categoria = new Categoria();
			$categoria->setField('id', mysql_result($res, 0, "id"));
			$categoria->setField('nombre', mysql_result($res, 0, "nombre"));
			$categoria->setField('slug', mysql_result($res, 0, "slug"));
			return $categoria;
		}
	}

}
?>
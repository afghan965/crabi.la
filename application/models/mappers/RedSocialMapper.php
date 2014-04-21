<?php

require_once dirname(__FILE__) . '/../services/Database/Mysql.php';
require_once dirname(__FILE__) . '/../entities/RedSocial.php';

class RedSocialMapper 
{

	protected $_mysql;

	function __construct() 
	{
		$this->_mysql = new Mysql();
	}

	public function getAll() 
	{
		$link = $this->_mysql->connect(); 

		$sql = "SELECT * FROM red_social ORDER BY nombre ASC";
		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) == 0) {
			return null;
		} else {
			$arrRedSocial = array();
			for($i=0; $i<mysql_num_rows($res); $i++) {
				$redSocial = new RedSocial();
				$redSocial->setField('id', mysql_result($res, $i, "id"));
				$redSocial->setField('nombre', mysql_result($res, $i, "nombre"));
				$arrRedSocial[] = $redSocial;
			}
		}

		return $arrRedSocial;
	}

	public function getById($id)
	{
		$link = $this->_mysql->connect(); 

		$sql = "SELECT * FROM red_social WHERE id=$id";
		$res = mysql_query($sql) or die(mysql_error());

		if(mysql_num_rows($res) == 0) {
			return null;
		} else {
			$redSocial = new RedSocial();
			$redSocial->setField('id', mysql_result($res, 0, "id"));
			$redSocial->setField('nombre', mysql_result($res, 0, "nombre"));
			return $redSocial;
		}
	}

}
?>
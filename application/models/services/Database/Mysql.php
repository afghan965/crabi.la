<?php
if (!class_exists('Config')) { include( dirname(__FILE__) . '/../../../../config.php'); }

class Mysql {

	protected $_link;

	public function connect() {

		$config = new Config();

		try {

			$this->_link = mysql_connect($config->db_host, $config->db_user, $config->db_pass);
			mysql_select_db($config->db_name);			
			return $this->_link;

		} catch(Exception $e) {
			return false;
		}
		
	}

	public function disconnect($link) {
		return mysql_close($link);
	}
}

<?php
require_once dirname(__FILE__) . '/../../../../Config.php';

class ImageUpload {

	protected $_file;
	protected $_error;
	protected $_config;	
	protected $_uploadUrl;

	function __construct($file) 
	{
		$this->_file = $file;
		$this->_config = new Config();
		$this->_error = array();
	}

	public function upload() 
	{
		if($this->validaUpload() === true) {
			$this->_file['name'] = $this->obtenerNombreUnico();
			$uploadPath = $this->_config->image_upload_path . "/" . $this->_file['name'];
			if(move_uploaded_file($this->_file['tmp_name'], $uploadPath)) {
				$this->_uploadUrl = $this->_config->image_upload_url . "/" . $this->_file['name'];
				return true;
			} else {
				$this->_error[] = "Upload error";
				return false;
			}
		} else {
			return false;
		}

	}

	public function urlUpload() {
		return $this->_uploadUrl;
	}

	public function errorUpload() {
		return $this->_error;
	}

	public function obtenerNombreUnico()
	{
		if(file_exists($this->_config->image_upload_path . "/" . $this->_file['name'])) {
			$idx = 1;
			while(true) {
				$ext = end(explode(".", $this->_file['name']));
				$tmp = str_replace(".$ext", "_$idx.$ext", $this->_file['name']);
				if(file_exists($this->_config->image_upload_path . "/" . $tmp)) {
					$idx++;
				} else {
					return $tmp;
				}
			}
		} else {
			return $this->_file['name'];
		}
	}

	public function validaUpload() 
	{
		$ext = end(explode(".", $this->_file['name']));
		if(!in_array($ext, $this->_config->image_upload_allowed_ext)) {
			$this->_error[] = "Extension not allowed";
		}

		if(!in_array($this->_file['type'], $this->_config->image_upload_allowed_type)) {
			$this->_error[] = "Type not allowed";
		}

		if($this->_file['size'] > $this->_config->image_upload_max_size) {
			$this->_error[] = "File is to big";
		}

		if(count($this->_error) > 0) return false;
		return true;
	}

}
?>
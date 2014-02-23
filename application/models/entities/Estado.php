<?php
class Estado {

	private _fields = array(
			"id" => NULL,
			"nombre" => NULL
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
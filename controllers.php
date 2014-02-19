<?php

$mod = null;
if(isset($_GET['mod'])) $mod = $_GET['mod'];

switch ($mod) {

	case 'articulo':
		break;
	
	default:
		include "app/controllers/home/Index_HomeController.php";
		break;
}

?>
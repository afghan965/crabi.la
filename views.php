<?php

$mod = null;
if(isset($_GET['mod'])) $mod = $_GET['mod'];

switch ($mod) {

	case 'articulo':
		break;
	
	default:		
		include "app/views/home/Index_HomeView.php";
		break;
}

?>
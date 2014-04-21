<?php
require_once dirname(__FILE__) . '/../../models/services/Database/Mysql.php';
require_once dirname(__FILE__) . '/../../models/mappers/RedSocialMapper.php';
require_once dirname(__FILE__) . '/../../models/entities/Noticia.php';
$mysql = new Mysql();
$mysql->connect();

$sql = "SELECT * FROM noticia WHERE destacado = 1 ORDER BY fecha_publicacion DESC LIMIT 7";
$res = mysql_query($sql) or die(mysql_error());

$destacados = array();
for($i=0; $i<mysql_num_rows($res); $i++) {

	// Obtengo posicion destacado
	$pos = 1;
	if($i>0 && $i<3) $pos = 2;
	if($i>=3) $pos = 3;

	// Genero array destacado
	$post = array();
	$post["titulo"]= mysql_result($res, $i, "titulo");
	$post["descripcion"] = mysql_result($res, $i, "descripcion");
	$post["imagen_real"] = mysql_result($res, $i, "imagen_real");	
	$post["url"] = mysql_result($res, $i, "url");

	$redSocialMapper = new RedSocialMapper();
	$redSocial = $redSocialMapper->getById(mysql_result($res, $i, "id_red_social"));
	$post["red_social"] = strtolower($redSocial->getField("nombre"));

	// Almaceno destacado
	$destacados[$pos][] = $post;

}

// Retorno destacados
header("Content-type: application/json");
echo json_encode($destacados);
?>
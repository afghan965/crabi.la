<?php
$link = mysql_connect($database['host'], $database['user'], $database['pass']) or die(mysql_error());
mysql_select_db($database['dbname']) or die(mysql_error());
?>
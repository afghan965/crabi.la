<?php
unset($_COOKIE['login']);

setcookie("login",null,-1,"/");
setcookie("username",null,-1,"/");
setcookie("avatar",null,-1,"/");
setcookie("email",null,-1,"/");

header("Location: /index.php");
?>

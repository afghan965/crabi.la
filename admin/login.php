<?php session_start(); ?>
<?php
if(isset($_COOKIE['login'])) {
    header("Location: /");
}
?>
<?php include dirname(__FILE__) . 'inc/config.php'; ?>
<?php include dirname(__FILE__) . 'inc/template_start.php'; ?>
<?php include dirname(__FILE__) . 'inc/database_connector.php'; ?>

<?php
$login_error = false;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = addslashes($_POST['username']);
        $password = $_POST['password'];      
        $sql = "SELECT * FROM admin WHERE usuario = '$username' AND password = '".md5($password)."'";  
        $res = mysql_query($sql) or die(mysql_error());
        if(mysql_num_rows($res) > 0) {
            $expire = time()+60*60*24;
            setcookie('login', 1, $expire, "/");
            setcookie('username', mysql_result($res, 0, "usuario"), $expire, "/");
            setcookie('avatar', mysql_result($res, 0, "avatar"), $expire, "/");
            setcookie('email', mysql_result($res, 0, "email"), $expire, "/");
            echo "<script>document.location='/';</script>";           
        } else {
            $login_error = true;
        }
    }
}
?>

<!-- Login Background -->
<div id="login-background">
    <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
    <img src="img/placeholders/headers/login_header.png" alt="Login Background" class="animation-pulseSlow">
</div>
<!-- END Login Background -->

<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
    <!-- Login Title -->
    <div class="login-title text-center">
        <h1><i class="gi gi-flash"></i> <strong><?php echo $template['name']; ?></strong><br><small>Por favor <strong>inicia sesión</strong></strong></small></h1>
    </div>
    <!-- END Login Title -->

    <!-- Login Block -->
    <div class="block remove-margin">
        <!-- Login Form -->
        <form action="" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                        <input type="text" id="login-username" name="username" class="form-control input-lg" placeholder="Username">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="login-password" name="password" class="form-control input-lg" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-xs-12 text-right">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Ingresar</button>
                </div>
            </div>
        </form>
        <!-- END Login Form -->        
    </div>
    <!-- END Login Block -->
</div>
<!-- END Login Container -->

<?php include dirname(__FILE__) . 'inc/template_scripts.php'; ?>
<?php include dirname(__FILE__) . 'inc/template_end.php'; ?>

<?php
if($login_error) {
?>
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" dir="" ata-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="fa fa-times-circle"></i> Error</h4> Oh no!... Login <a href="javascript:void(0)" class="alert-link">incorrecto</a>!
</div>
<?php
}
?>
<?php session_start(); ?>
<?php include dirname(__FILE__) . '/inc/validate_login.php'; ?>
<?php include dirname(__FILE__) . '/inc/config.php'; ?>
<?php include dirname(__FILE__) . '/inc/template_start.php'; ?>
<?php include dirname(__FILE__) . '/inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
<?php include dirname(__FILE__) . '/mods.php'; ?>
</div>
<!-- END Page Content -->

<?php include dirname(__FILE__) . '/inc/page_footer.php'; ?>

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include dirname(__FILE__) . '/inc/template_scripts.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://crabi.la/admin/js/helpers/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=$site['base_url']?>/admin/js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>

<?php include dirname(__FILE__) . '/inc/template_end.php'; ?>

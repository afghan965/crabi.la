<?php
$cat = null;
$act = null;
if(isset($_GET['cat'])) $cat = $_GET['cat'];
if(isset($_GET['act'])) $act = $_GET['act'];

if($cat == 'posts') {
	switch ($act) {
		case 'new':
			include 'mods/posts/new.php';
			break;
		case 'categories':
			include 'mods/posts/categories.php';
			break;			
		default:
			include 'mods/posts/all.php';
			break;
	}
} elseif($cat == 'social') {
	switch ($act) {
		case 'instagram':
			include 'mods/social/instagram.php';
			break;
		case 'facebook':
			include 'mods/social/facebook.php';
			break;
		case 'twitter':
			include 'mods/social/twitter.php';
			break;
		case 'youtube':
			include 'mods/social/youtube.php';
			break;			
		default:
			include 'mods/social/resume.php';
			break;
	}
} else {
	include 'mods/pages/home.php';
}

?>

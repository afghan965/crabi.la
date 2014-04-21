<?php
/**
 * Crabi's configuration file
 */
class Config {

	// Database
	public $db_user = "root";
	public $db_pass = "donpipowinner";
	public $db_name = "crabi";
	public $db_host = "localhost";

	// Image Upload
	public $image_upload_path = "/var/www/crabi.la/media";
	public $image_upload_url = "http://crabi.la/media";
	public $image_upload_allowed_ext = array("gif", "jpeg", "jpg", "png");
	public $image_upload_allowed_type = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png");
	public $image_upload_max_size = 4000000;

}

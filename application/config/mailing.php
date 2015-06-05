<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$CI =& get_instance();
$CI->load->helper('url');

//////////////////// MAILING SETTINGS ////////////////////
		
$config["from"] = "info@adca.org.ar";
$config["fromstr"] = "ADCA";

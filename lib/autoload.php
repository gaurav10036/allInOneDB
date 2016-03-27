<?php
/**
* @author: Gaurav Sirauthiya
* @version: 1.0.0
*/
//realpath ( string $path );
function __autoload($class_name) 
{
	$file = BASEPATH.'lib/'.strtolower($class_name).'.php';
	require_once($file);
}
$db = new DB;
$template = new Template;
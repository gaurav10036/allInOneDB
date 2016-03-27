<?php
/**
* @author: Gaurav Sirauthiya
* @version: 1.0.0
*/
class Template
{
	public function __construct()
	{

	}
	/*
	* @function: call site header
	*/
	public function getHeader()
	{
		$file = BASEPATH.'includes/header.php';
		if(file_exists($file))
		{
			include_once($file);
		}	
	}
	/*
	* @function call site footer
	*/
	public function getFooter()
	{
		$file = BASEPATH.'includes/footer.php';
		if(file_exists($file))
		{
			include_once($file);
		}	
	}
	/*
	* @DEVELOPMENT PURPOSE
	*/
	public function pr($array)
	{
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}

}
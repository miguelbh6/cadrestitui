<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AppEmail
{

	public function __construct()
	{
	}

	function get()
	{
		$config['protocol']  = 'smtp';
		//$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		//$config['smtp_port'] = 587;
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'miguelbh6@gmail.com';
		$config['smtp_pass'] = 'umbrella6';
		$config['validate']  = TRUE;
		$config['mailtype']  = 'html';
		$config['charset']   = 'utf-8';
		$config['newline']   = "\r\n";
		return $config;
	}
}

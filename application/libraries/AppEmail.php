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
		$config['smtp_host'] = 'smtp.cndn.com.br';
		$config['smtp_port'] = 587;
		$config['smtp_user'] = 'atendimento@cndn.com.br';
		$config['smtp_pass'] = 'q2t4Gsu%Ud5#Lm3!Avup';
		$config['validate']  = TRUE;
		$config['mailtype']  = 'html';
		$config['charset']   = 'utf-8';
		$config['newline']   = "\r\n";
		return $config;
	}
}

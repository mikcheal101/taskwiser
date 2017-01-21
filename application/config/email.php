<?php

$config['mailtype']			= "html";
#$config['charset']			= "utf-8";
$config['charset'] 			= 'iso-8859-1';
$config['protocol']			= "smtp";
$config['newline']			= "\r\n";
$config['crlf']				= "\r\n";

$config['dsn']				= TRUE;

$config['smtp_port']		= "587"; # 3535 or 80 or 25
$config['smtp_timeout']		= '30';
$config['smtp_host']		= "smtp.office365.com";
$config['smtp_user']		= "no-reply@taskwiser.com";
$config['smtp_pass']		= "!QAZ2wsx";
$config['smtp_crypto']		= "tls";
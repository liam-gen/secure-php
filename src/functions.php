<?php

/*
© Secure PHP - 2022
by liamgen.js
*/

session_start();

$_XGET = array();

foreach($_GET as $k=>$v)
{
	$_XGET[$k] = htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}
define("XGET", $_XGET);


$_XPOST = array();

foreach($_POST as $k=>$v)
{
	$_XPOST[$k] = htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}
define("XPOST", $_XPOST);


function generateCaptcha()
{
	echo file_get_contents(__DIR__."/content/captcha.min.html");
}

	
function validCaptcha($method="GET")
{
	switch($method){
		case "GET":
			if(isset(XGET['captcha_challenge']) && XGET['captcha_challenge'] == $_SESSION['security-1315-captcha_text'])
			{
				return true;
			}
			else
			{
				return false;
			}
			break;
		case "POST":
			if(isset(XPOST['captcha_challenge']) && XPOST['captcha_challenge'] == $_SESSION['security-1315-captcha_text'])
			{
				return true;
			}
			else
			{
				return false;
			}
			break;
	}
}

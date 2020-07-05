<?php

class Header {
	
	public function __construct() {
		
		if(Config::$CSPEnabled === true) {
			header("Content-Security-Policy-Report-Only: default-src 'none';");
		}
		
		if(empty(Config::$defaultLocale)) {
			
			setlocale(LC_ALL,NULL);
			
		} else {
			
			if(setlocale(LC_ALL,Config::$defaultLocale) === false) {
				die("Error While Setting Locale, Use Valid Locale. Current invalid locale ->" . Config::$defaultLocale);
			}
			
		}
		
		if(!date_default_timezone_set (Config::$appTimezone)) {
			die("Timezone not valid");
		}
		
		if(Config::$enabledCache === false) {
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");
		}

        header('Content-type: text/html; charset=' . Config::$charset );
	}
	
	public function start() 
	{
		$core = new Bootstrap();
		$core->start();
	}
	
}
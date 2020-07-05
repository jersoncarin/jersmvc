<?php

class Cookie {
	
	public function __construct() 
	{
		// Empty Constructor
	}
	
	public function get($key) {
		return $_COOKIE[$key];
	}
	
	public function set($key,$val,$time , $callback = "/") {
		if(!is_null($key) && !is_null($val) && !is_null($time))
		  setcookie($key,$val,$time,$callback);
	}
}
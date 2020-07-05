<?php 

class Session {
	
	public function __construct() 
	{
		// Empty Constructor
	}
	
	public function get($key) {
		return $_SESSION[$key];
	}
	
	public function set($key, $val) {
		
		if(!is_null($key) && !is_null($val))
		    $_SESSION[$key] = $val;
		
	}
	
	public function destroy() {
		unset($_SESSION);
		
		session_destroy();
	}
}
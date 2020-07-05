<?php

class Request {
	
	public function __construct() 
	{
		// Empty Constructor
	}
	
	public function get($key) {
		return $_GET[$key];
	}
	
	public function post($key) {
		return $_POST[$key];
	}
	
	public function server($request) {
		return $_SERVER[strtoupper($request)];
	}
	
	public function request($key) {
		return $_REQUEST[$key];
	}
	
	private static function url() {
		if(isset($_SERVER['HTTPS'])){
           $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
		    }
		    else{
		        $protocol = 'http';
		    }
		    return $protocol . "://" . $_SERVER['HTTP_HOST'];
	}
	
	public static function base_url($query) {
		$first_el = $query[0];
		
		if($first_el != "/") 
           $query = "/" . $query;
		
		return Request::url() . $query;
	}
	
	public static function redirect($query,$delay = NULL) {
		
	 if(is_null($delay)) {
		header("Location:" . $query);
	  } else {
		header( "refresh:" . $delay . "; url=" . $query);
	  }
	
	}
	
}
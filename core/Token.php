<?php

class Token {
	
	private $session;
	
	public function __construct($session) {
		$this->session = $session;
	}
	
    private function getRandomize() {
		    $length = 50;
		    $token = "";
		    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		    $codeAlphabet.= "0123456789";
		    $max = strlen($codeAlphabet);
		
		    for ($i=0; $i < $length; $i++) {
		        $token .= $codeAlphabet[random_int(0, $max-1)];
		    }
		
		    return $token;
	}
	
	public function getToken() {
		$this->session->set("csrf_token", $this->getRandomize());
		
		return $this->session->get("csrf_token");
	}
	
}
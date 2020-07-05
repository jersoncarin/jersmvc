<?php

class Model {
	
	public function __construct() {
		
		$this->security = new Security();
		$this->db = new Database();
		
	}
	
}
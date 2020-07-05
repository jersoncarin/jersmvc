<?php 

class Controller
{
	public function __construct()
	{
		$this->security = new Security();
		$this->session = new Session();
		$this->request = new Request();
		$this->cookie = new Cookie();
		$this->files = new Files();
		$this->view = new View();
		$this->token = new Token($this->session);
		$this->view->token = $this->token;
	}
	
}
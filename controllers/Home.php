<?php

class Home extends Controller
{
	public function index()
	{
		$this->view->title = 'Home';
		$this->view->render('home');
	}
	
	
	public function success() {
		$this->data = $this->request->post("token");
		
		if($this->data == $this->session->get("csrf_token")) {
			$this->view->data = "Success";
		}
		
		$this->view->render('success');
		
	}
}

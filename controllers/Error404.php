<?php

class Error404 extends Controller
{
	public function index()
	{
		$this->view->render('error/index');
	}
}
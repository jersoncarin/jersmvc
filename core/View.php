<?php

class View
{
	public function render($viewPath)
	{
		require(PATH . 'Views/' . $viewPath . '.php');			
	}
}

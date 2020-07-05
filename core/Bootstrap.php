<?php

class Bootstrap
{
	public function __construct() 
	{
		// Empty Constructor
	}
	
	public function start() 
	{
		// set flag for null value or not exists
		$flag = FALSE;
	   
	   //Check if the get request is exist if its false its homepage or default page otherwise
	   if(!isset($_GET['path'])) {
		
		  //Default page or home page
		  $controllerName = Config::$defaultHomePage;
		  $controller = new $controllerName();
		  $controller->index();
		
		} else {
			
			//Get the url path
	        $url = explode('/', rtrim($_GET['path'], '/'));
			
		    //Get the controllerName through shifting the url
	        $controllerName = ucfirst(array_shift($url));
			
			//Check if controllers is exists otherwise
			if (file_exists(PATH . 'Controllers/'.$controllerName.'.php')) {
				
				//Create an new instance
				$controller = new $controllerName();
				
				if(!empty($url)) {
				
				//Shift the url to get actionName
				$actionName = array_shift($url);
				
				//Check for method exists of the controller
				if (method_exists ( $controller , $actionName )) {
					    
					    //Get the action Name A.K.A a function name to call and the parameter
						$controller->{$actionName}(@$url);	
						
				} else {
					
					   //404 Not Found
					   $flag = TRUE;
					
				}
				
				} else {
					
					//Default index page
					$controller->index();
					
				}
				
			} else {
				
				// 404 Not Found
				$flag = TRUE;
				
			}
			
			//Override 404 Not Found Controller here
			if($flag === TRUE) {
				$controllerName = Config::$defaultError404;
				$controller = new $controllerName();
				$controller->index();
			}
			
		}
	}
	
}
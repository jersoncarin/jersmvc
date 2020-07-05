<?php

   //Check for Valid PHP Version?
	$minPHPVersion = '7.2';
	if (phpversion() < $minPHPVersion)
	{
		die("Your PHP version must be {$minPHPVersion} or higher to run JersMVC. Current version: " . phpversion());
	}
	unset($minPHPVersion);
	
	//Start session
	session_start();
	
	// Front Controller Path (No this path file)
    define("PATH", realpath(__DIR__ . DIRECTORY_SEPARATOR . '../') . '/');
  
  // Registering All Class from the MVC
  // Don't Modify This Code
  spl_autoload_register(function ($className) {
  
    if (file_exists(PATH . 'Core/' . $className . '.php')) { 
        require_once PATH . 'Core/' . $className . '.php'; 
    }
	else if (file_exists(PATH . 'Controllers/' . $className . '.php')) { 
        require_once PATH . 'Controllers/' . $className . '.php'; 
    }
	else if (file_exists(PATH . 'Models/' . $className . '.php')) { 
        require_once PATH . 'Models/' . $className . '.php'; 
    }
    else if (file_exists($className . '.php')) { 
        require_once $className . '.php'; 
    }
});

/*
 *---------------------------------------------------------------
 * INITIALIZE HEADERS
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
*/

// Ensure the current directory is pointing to the controller's directory
chdir(__DIR__);

// Create an instance to our core
$header = new Header();
 
// Start our apps
$header->start();

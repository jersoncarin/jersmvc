<?php

class Database extends DatabaseConfig {
	
	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public static $default = [
		'hostname' => 'localhost',
		'username' => '',
		'password' => '',
		'database' => '',
		'charset'  => 'utf8',
		'port'     => 3306,
	];
	
}
<?php

	class Loader{

		protected static $instance;
		protected static $namespaces=array();
		public function getInstance(){
			if(empty(self::$instance)){
				self::$instance=new self();
			}
			return self::$instance;
		}

		public static function load($classname){
			$path=str_replace('Framework','',$classname);
			$path=dirname(__FILE__).str_replace('\\','/',$path).'.php';
			if(file_exists($path)){
				include_once($path);
			}
		}
		public static function addNamespacePath($namespace,$path){
			self::$namespaces[$path] = $namespace;
		}
		private function __construct()
		{
			spl_autoload_register(array(__CLASS__,'load'));
		}
		private function __clone(){
			// Code
		}
	}
	Loader::getInstance();
	Loader::addNamespacePath(__DIR__,'Framework\\);
?>

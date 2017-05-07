<?php
class View
{
	private static $_db;
	
	public static function Init() {
		self::$_db = Connection::getInstance();
	}
	
	public static function getTemplatePath($templateName) {
		echo "includes/template-parts/{$templateName}/";
	}
	
	public static function getPages($page) {
		include_once "includes/pages/{$page}.inc.php";
	}
}

View::Init();
?>
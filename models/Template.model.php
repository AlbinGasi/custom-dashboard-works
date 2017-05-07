<?php
class Template
{
	static $title = null;

	public function __construct ($templatName, $section) {
		$this->get($templatName, $section);
	}
	
	public function get($templatName, $section) {
		include_once "includes/template-parts/{$templatName}/{$section}.inc.php";
	}
	
	public static function setTitle($title) {
			self::$title = $title;
	}
	
	
}

?>
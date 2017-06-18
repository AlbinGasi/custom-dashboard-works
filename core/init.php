<?php
session_start();
session_regenerate_id(true);

$GLOBALS['config'] = array(
	"DB" => array(
		"host" => "",
		"user" => "",
		"password" => "",
		"db_name" => ""
	),
	"path_url" => '',
	"image_store" => 'includes/uploads/images',
	"table_prefix" => '',
	"hash_key" => '123FgkhjF'
);

spl_autoload_register(function($className){
    if(file_exists("models/{$className}.model.php")){
		require_once "models/{$className}.model.php";
    }else if (file_exists("../../models/{$className}.model.php")) {
		require_once "../../models/{$className}.model.php";
	}
});

?>
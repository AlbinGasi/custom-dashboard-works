<?php
session_start();
session_regenerate_id(true);

$GLOBALS['config'] = array(
	"DB" => array(
		"host" => "localhost",
		"user" => "root",
		"password" => "alko3105",
		"db_name" => "newproject"
	),
	"path_url" => 'http://localhost/newproject',
	"path_url_android" => 'http:\/\/localhost\/newproject',
	"image_store_android" => 'includes\/uploads\/images',
	"image_store" => 'includes/uploads/images',
	"table_prefix" => 'tri_',
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
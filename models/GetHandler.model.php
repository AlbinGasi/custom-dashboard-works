<?php
class GetHandler
{
	private static $_db;
	
	public static function Init() {
		self::$_db = Connection::getInstance();
	}
	
	public function getJson($page,$return) {
		$Jstring = Config::get('path_url') . '/includes/get-json/'.$page.'.inc.php';
		$Jdata = file_get_contents($Jstring);
		$obj = json_decode($Jdata,true);
		return $obj[$return];
	}
	
	public function getImageUrlName() {
		$path_url = Config::get('path_url');
		$image_store = Config::get('image_store');
		return $path_url . '/' . $image_store . '/';
	}
	
	public function getAllCategories() {
		$stmt = self::$_db->query("SELECT * FROM ".Config::get('table_prefix')."category");
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	
	public function getPhotoDescription($id){
		$stmt = self::$_db->prepare("SELECT photo_description FROM ".Config::get('table_prefix')."photos WHERE photo_id=?");
		$stmt->bindValue(1,$id);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		return $res['photo_description'];
	}
	
	public function getAllPhotoMain() {
		$stmt = self::$_db->query("SELECT ".Config::get('table_prefix')."photos.photo_id, ".Config::get('table_prefix')."photos.photo_description, ".Config::get('table_prefix')."photos.photo_name, ".Config::get('table_prefix')."category.category_name FROM ".Config::get('table_prefix')."photos INNER JOIN ".Config::get('table_prefix')."category ON ".Config::get('table_prefix')."photos.category_id=".Config::get('table_prefix')."category.category_id ORDER BY ".Config::get('table_prefix')."photos.photo_id DESC");
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	
	public function getAllPhoto() {
		$stmt = self::$_db->query("SELECT ".Config::get('table_prefix')."photos.photo_id, ".Config::get('table_prefix')."photos.photo_name, ".Config::get('table_prefix')."photos.photo_description, ".Config::get('table_prefix')."category.category_name FROM ".Config::get('table_prefix')."photos INNER JOIN ".Config::get('table_prefix')."category ON ".Config::get('table_prefix')."photos.category_id=".Config::get('table_prefix')."category.category_id");
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$string  = '{"pictures":[';
		foreach($res as $photo){
			$string .= '{"photo_url"' . ':' . '"' . $this->getImageUrlName() . $photo['photo_name'] . '","category"' . ':' . '"' . $photo['category_name'] . '",' . '"photo_description":' . '"' . $photo['photo_description'] . '"' .'},';
		}
		$string = trim($string, ',');
		$string .= "]}";
		echo $string;
	}
	
	public function getPhotoByCat($category) {
		$stmt = self::$_db->prepare("SELECT ".Config::get('table_prefix')."photos.photo_name, ".Config::get('table_prefix')."photos.photo_description, ".Config::get('table_prefix')."category.category_name FROM ".Config::get('table_prefix')."photos INNER JOIN ".Config::get('table_prefix')."category  ON ".Config::get('table_prefix')."photos.category_id=".Config::get('table_prefix')."category.category_id WHERE ".Config::get('table_prefix')."category.category_name=?");
		$stmt->bindValue(1,$category);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		$string  = '{"pictures":[';
		foreach($res as $photo){
			$string .= '{"photo_url"' . ':' . '"' . $this->getImageUrlName() . $photo['photo_name'] . '","category"' . ':' . '"' . $photo['category_name'] . '",' . '"photo_description":' . '"' . $photo['photo_description'] . '"' .'},';
		}
		$string = trim($string, ',');
		$string .= "]}";
		echo $string;
	}
}

GetHandler::Init();
?>
<?php
class Entity
{
	private static $_db;
	
	public static function Init() {
		self::$_db = Connection::getInstance();
	}
	
	public static function checkLengthName($str,$length=null){
    	if($length==null){
	        $comm = "";
	        for($i=0;$i<strlen($str);$i++){
	            if($i<20){
	                $comm .= $str[$i];
	            }else if($i>20 && $i<25){
	                $comm .= ".";
	            }
	        }
	        return $comm;
    	}else{
    		$comm = "";
    		for($i=0;$i<strlen($str);$i++){
    			if($i<$length){
    				$comm .= $str[$i];
    			}else if($i>$length && $i<$length+5){
    				$comm .= ".";
    			}
    		}
    		return $comm;
    	}
    }
	
	// Methods for Validate
	
	public function categoryExists($category_name){
		$stmt = self::$_db->prepare("SELECT category_name FROM ".Config::get('table_prefix')."category WHERE category_name = ?");
			$stmt->bindParam(1, $category_name);	
			$stmt->execute();
			if($stmt->rowCount() > 0 ){
				return true;
			}else{
				return false;
			}
	}
	
	public function validate($validate,$data) {
		if($validate == 'photo'){
			$photoExt = $data['photo_ext'];
			$photoName = $data['photo_name'];
			$photoType = $data['photo_type'];
			$photoStatus = true;
		
			if($photoExt != 'jpg' && $photoExt != 'png' && $photoExt != 'gif'){
				$photoStatus = false;
			}
			
			if($photoType != 'image'){
				$photoStatus = false;
			}
			
			if(empty($photoName)){
				$photoStatus = false;
			}
			
			if($photoStatus == true){
				return true;
			}else{
				return false;
			}
		}else if ($validate == 'category') {	
			$category = $data['category'];
			$categoryStatus = true;
			if(empty($category)){
				$categoryStatus = false;
			}
			
			if($categoryStatus == true){
				return true;
			}else{
				return false;
			}
		}else if ($validate == 'categoryadd') {
			$category = $data['category_name'];
			$errors = array();
			
			if(empty($category)){
				$errors['empty'] = 'Category can\'t be empty!';
			}
			
			if($this->categoryExists($category)){
				$errors['exists'] = 'Category with this name alredy exist!';
			}
			

			
			if(empty($errors)){
				return "success";
			}else{
				return $errors;
			}

		}
	}
	
	// Enter new data into database
	public function insert_photo($data) {
		$stmt = self::$_db->prepare("INSERT INTO ".Config::get('table_prefix')."photos(category_id,photo_name,photo_description) VALUES (?,?,?)");
		$stmt->bindValue(1,$data['category_id']);
		$stmt->bindValue(2,$data['photo_name']);
		$stmt->bindValue(3,$data['photo_description']);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	public function insert_category($data) {
		$stmt = self::$_db->prepare("INSERT INTO ".Config::get('table_prefix')."category(category_name) VALUES (?)");
		$stmt->bindValue(1,$data['category_name']);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// Delete data
	
	public function delete_category($id){
		$stmt = self::$_db->prepare("DELETE FROM ".Config::get('table_prefix')."category WHERE category_id=?");
		$stmt->bindParam(1,$id);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete_photo($id){
		$stmt = self::$_db->prepare("DELETE FROM ".Config::get('table_prefix')."photos WHERE photo_id=?");
		$stmt->bindParam(1,$id);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	public function edit_category($id, $category_name){
		$stmt = self::$_db->prepare("UPDATE ".Config::get('table_prefix')."category SET category_name=? WHERE category_id=?");
		$stmt->bindParam(1,$category_name);
		$stmt->bindParam(2,$id);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	public function edit_photo_category($data){
		$stmt = self::$_db->prepare("UPDATE ".Config::get('table_prefix')."photos SET category_id=?, photo_description=? WHERE photo_id=?");
		$stmt->bindParam(1,$data['category_id']);
		$stmt->bindParam(2,$data['photo_description']);
		$stmt->bindParam(3,$data['photo_id']);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
}





























Entity::Init();
?>
<?php

class Browser {
	public $path;
	private $a_types = array('jpg', 'jpeg', 'png', 'pngf', 'gif');

	public function __construct($path, $a_types="") {
		$this->path = $path;
		$this->path = $path;
		if(!empty($a_types)) { $this->a_types = $a_types; }
	}
	
	
	public function get_files() {
		$dir = opendir($this->path);
		$files = array();
		while($currentfile = readdir($dir)) {
			$filetype = strtolower(substr(strrchr($currentfile, '.'), 1));
			if(in_array($filetype, $this->a_types)) {
				array_push($files, $currentfile);
			}
		}
		closedir($dir);
		return $files;
	}
	
	public function delete_folder($chmod=0) {
		$dir = opendir($this->path);
		if($chmod) { chmod($this->path, 0777); }
		while($currentfile = readdir($dir)) {
			$filetype = strtolower(substr(strrchr($currentfile, '.'), 1));
			if(in_array($filetype, $this->a_types)) {
				if($chmod) { chmod($this->path.$currentfile, 0777); }
				unlink($this->path.$currentfile);
			}
		}
		closedir($dir);
		rmdir($this->path);
		return $files;
	}
	
	public static function delete_file($path, $chmod=0) {
		if(file_exists($path)) {
			if($chmod) { chmod($path, 0777); }
			unlink($path);
		}
	}
	
	public static function upload_file($id, $path, $type) {
		if(is_uploaded_file($_FILES[$id]['tmp_name'])) {
			if(!$type) { 
				$goon = 1; 
			} else { 
				if($_FILES[$id]['type'] == $type) { $goon = 1; }
			}
			if($goon) { 
				move_uploaded_file($_FILES[$id]['tmp_name'], $path);
			} 
		}
	}
	
	public static function upload_mp3($id) {
		global $session;
	
		$uploads = wp_upload_dir();
		$upload_base = $uploads['basedir'];
	
		$target_path = $upload_base.cuterecords_DIRS."mp3".cuterecords_DIRS;
		if(!file_exists($target_path)) {
			mkdir($target_path, 0777);
		} 
	
		$flag = 0; // Safety net, if this gets to 1 at any point in the process, we don't upload.
	
		$filename = $_FILES[$id]['name'];
		$filesize = $_FILES[$id]['size'];
		$mimetype = $_FILES[$id]['type'];
	
		$filename = htmlentities($filename);
		$filesize = htmlentities($filesize);
		$mimetype = htmlentities($mimetype);
	
		$full_path = $target_path . basename( $filename );
	
		//First generate a MD5 hash of what the new file name will be
		//Force a MP3 extention on the file we are uploading
	
		$hashedfilename = md5($filename);
		$hashedfilename = $hashedfilename.".mp3";
	
		//Check for empty file
		if($filename == ""){
			$error = "No File Exists!";
			$flag = $flag + 1;
		}
		
		for($i = 0; file_exists($target_path.$hashedfilename); $i++) {
			if(strlen($hashedfilename) < 104) {
				if(is_numeric(substr($hashedfilename, -5, 1))) {
					$newnum = substr($hashedfilename, -5, 1) + 1;
					$hashedfilename = substr($hashedfilename, 0, strlen($hashedfilename) - 5) . $newnum . ".mp3"; 
				} else { 
					$hashedfilename = substr($hashedfilename, 0, strlen($hashedfilename) - 4) . $i . ".mp3";
				}
			} else { 
				if(is_numeric(substr($hashedfilename, -5, 1))) {
					$newnum = substr($hashedfilename, -5, 1) + 1;
					$hashedfilename = substr($hashedfilename, 0, strlen($hashedfilename) - 5) . $newnum . ".mp3"; 
				} else { 
					$hashedfilename = substr($hashedfilename, 0, strlen($hashedfilename) - 7) . $i . ".mp3";
				}
			}
		}
	
		//Whitelisted files - Only allow files with MP3 extention onto server...
	
		$whitelist = array(".mp3");
		foreach ($whitelist as $ending) {
	
			if(substr(strtolower($filename), - (strlen($ending))) != $ending) {
				
				$error = "The file type or extention you are trying to upload is not allowed!  
				You can only upload MP3 files to the server!";
				$error = $filename;
				$flag++;
			}
		}
	
	
		//Now we check the filesize.  If it is too big or too small then we reject it
		//MP3 files should be at least 1MB and no more than 6.5 MB
	
		if($filesize > 12920600){
		//File is too large
	
		if($flag == 0){
			$error = "The file you are trying to upload is too large!  
			Your file can be up to 6.5 MB in size only.  
			Please upload a smaller MP3 file or encode your file with a lower bitrate.";
		}
	
		$flag = $flag + 1;
		}
	
		if($filesize < 548600){
		//File is too small
	
			if($flag == 0){
				$error = "The file you are trying to upload is too small!
				Your file has been marked as suspicious because our system has
				determined that it is too small to be a valid MP3 file.
				Valid MP3 files must be bigger than 1 MB and smaller than 6.5 MB.";
			}
	
			$flag = $flag + 1;
	
		}
	
		//Check the mimetype of the file
		if($mimetype != "audio/x-mp3" and $mimetype != "audio/mpeg" and $mimetype != "audio/mp3"){
	
			if($flag == 0){
				$error = "The file you are trying to upload does not contain expected data.
				Are you sure that the file is an MP3?";
			}
	
			$flag = $flag + 1;
		}
	
		//All checks are done, actually move the file...
	
		if($flag == 0){

			if(move_uploaded_file($_FILES[$id]['tmp_name'], $full_path)) {
	
				//Change the filename to MD5 hash and FORCE a MP3 extention.
	
				if(@file_exists($target_path.$filename)){
				//Rename the file to an MD5 version
				rename($target_path.$filename, $target_path.$hashedfilename);
	
				return $hashedfilename;
	
				} else{
					return false;
				}
			} else{
				return false;
			}
	
		} else {
			return false;
		}
	}

}

?>
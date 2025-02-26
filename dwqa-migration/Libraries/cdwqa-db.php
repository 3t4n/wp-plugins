<?php
class CDWQA_DB{
	public $db_host = "";
	public $db_user = "";
	public $db_password = "";
	public $db_name = "";
	public $db_prefix = "";
	public $db_blog_id = "";
	public $charset_collate = "";
	public $upload_dir = "";
	private $connect;
	private $query;

	public function __construct($db_host, $db_user, $db_password, $db_name, $db_prefix = "", $db_blog_id = 0, $charset_collate = "", $upload_dir = ""){

		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_name = $db_name;
		$this->db_prefix = $db_prefix;
		$this->db_blog_id = $db_blog_id;
		$this->charset_collate = $charset_collate;
		$this->upload_dir = $upload_dir;

		// Create connection
		$this->connect = new mysqli($db_host, $db_user, $db_password, $db_name);

		
	}

	public function checkConnect(){
		// Check connection
		if ($this->connect->connect_error) {
		    // die("Connection failed: " . $conn->connect_error);
			return false;
		} 
		return $this->connect;
	}


	public function getLastId(){
		return $this->connect->insert_id;
	}

	public function getCell(){
		if($this->query){
			$row = $this->query->fetch_object();
			$this->query->close();
			return $row?reset($row):false;
		}
		return false;
	}

	public function getResults(){
		$data = false;
		if($this->query){
			$data = array();
     		// Cycle through results
			while ($row = $this->query->fetch_object()){
				$data[] = (array)$row;
			}
    		// Free result set
			$this->query->close();
		}
		return $data;
	}

	public function query($sql){
		$this->query = $this->connect->query($sql);
		return $this->query;
	}
}
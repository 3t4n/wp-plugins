<?php

class EStrixAllegroSymcAuctionImage {
	
	private $tableName;
    private $wpdb;
	
	public function __construct(){
		global $wpdb;
		$prefix = $wpdb->prefix;
		$this->tableName = $prefix . "strx_allegro_symc_auction_image";
        $this->wpdb = $wpdb;
	}

    public function install(){
        $wpdb = $this->wpdb;
        $tableName = $this->tableName;
        $db_version = "2.0";

        if ($wpdb->get_var("SHOW TABLES LIKE '" . $tableName . "'") != $tableName) {
            $query = "CREATE TABLE " . $tableName . " (
			id INT(11) NOT NULL AUTO_INCREMENT,
			auction_id varchar(15) default '',			
			auction_img_url varchar(255) default '',			
			PRIMARY KEY (id))
			CHARACTER SET utf8 COLLATE utf8_bin";

            $wpdb->query($wpdb->prepare($query,''));
			
            add_option("e_strix_allegro_symc_db_version", $db_version);
        }
    }

    public function uninstall(){
        return $this->wpdb->query($this->wpdb->prepare('DROP TABLE '.$this->tableName),'');
    }
	
    public function delete_all(){
        return $this->wpdb->delete( $this->tableName, array( 'ecommerce_id' => '' ) );
    }
	
	public function get($id){
		return $this->wpdb->get_results($this->wpdb->prepare("SELECT * FROM ". $this->tableName . " WHERE id = %d", $id ));
	}
	
	public function get_by_auction($auction_id = 0){
	    $queryCnt = "SELECT count(*) FROM " . $this->tableName . " WHERE auction_id = " . $auction_id;
	    $queryGet = "SELECT * FROM " . $this->tableName . " WHERE auction_id = " . $auction_id;
	    return array(
	        'total_items' => $this->wpdb->get_var($this->wpdb->prepare($queryCnt,'')),
	        'items'    => $this->wpdb->get_results($this->wpdb->prepare($queryGet,''), ARRAY_A)
	    );
	}
	
	public function get_last_items($select_counter = 5) {		
		$queryGet = "SELECT * FROM " . $this->tableName . " LIMIT " . $select_counter;		
		return $this->wpdb->get_results($this->wpdb->prepare($queryGet,''), ARRAY_A);
	}
	
	public function get_items($current_page, $per_page){
		$queryCnt = "SELECT count(*) FROM " . $this->tableName;
		$queryGet = "SELECT * FROM " . $this->tableName . " LIMIT " . $current_page . ",". $per_page;		
		return array(
			'total_items' => $this->wpdb->get_var($this->wpdb->prepare($queryCnt,'')),
			'items'    => $this->wpdb->get_results($this->wpdb->prepare($queryGet,''), ARRAY_A)
		  );
	}	
	
	public function add_auction($auction_id,$url) {
	    $this->wpdb->insert($this->tableName,
	        array(
	            'auction_id' => $auction_id,
	            'auction_img_url'=>$url
	        ),array('%s'));
	    
	    return $this->wpdb->insert_id;
	}
		
}
	
?>
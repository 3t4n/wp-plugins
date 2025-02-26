<?php

class EStrixAllegroSymcAuctions {
	
	private $tableName;
    private $wpdb;
	
	public function __construct(){
		global $wpdb;
		$prefix = $wpdb->prefix;
		$this->tableName = $prefix . "strx_allegro_symc_auction";
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
			ecommerce_id varchar(15) default '',
			auction_price varchar(15) default '0',
			auction_title varchar(250) default '',
			auction_description varchar(2024) default '',
			auction_end_time_left varchar(25) default '',
			auction_img_1_url varchar(255) default '',
			auction_img_2_url varchar(255) default '',
			auction_change_date varchar(25) default '',
			auction_change_type varchar(25) default '',
			show_time INT(1) default 0,
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
	
	public function add_auction($id,$title,$primaryImage,$price,$available,$description = "") {
	    $this->wpdb->insert($this->tableName,
	        array(
	            'auction_id' => $id,
	            'auction_price'=>$price,
	            'auction_title'=>$title,
	            'auction_description'=>$description,
	            'auction_img_1_url'=>$primaryImage
	        ),array('%s'));
	    
	    return $this->wpdb->insert_id;
	}
	
	public function add_auctions($auctions = array()){
		foreach ($auctions as $key => $auction) {
			if (!$this->exist($auction)) {
				$this->insert($auction);
			}		
		}	
	}
	
	public function update_auctions($auctions = array()){
		foreach ($auctions as $key => $auction) {
			if ($this->exist($auction['item_id'])) {
				$this->update($auction);
			}			
		}
	}
	
	public function set_woo_commerce_id($id,$productId){
		$this->wpdb->update($this->tableName, array('ecommerce_id'=>$productId), array('id'=>$id),array('%d'));
	}

	private function insert($arrId) {
		$this->wpdb->insert($this->tableName,array('auction_id' => $arrId),array('%s'));			
	}
	
	private function update($arr) {
		$this->wpdb->update($this->tableName, 
			array(
				'auction_price'=>$arr['item_price'],
				'auction_title'=>$arr['item_title'],
				'auction_description'=>$arr['item_description'],
				'auction_img_1_url'=>$arr['item_image_1'],
				'auction_img_2_url'=>$arr['item_image_2']
				), 
			array('auction_id'=>$arr['item_id']),
			array('%s','%s','%s','%s','%s','%s'));			
	}
		
	public function is_item_to_download() {
		$queryCnt = "SELECT count(*) FROM " . $this->tableName . " WHERE auction_title like ''";
		return ($this->wpdb->get_var($this->wpdb->prepare($queryCnt,'')) > 0)? true : false;
	}
	
	public function get_items_to_download(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE auction_title like '' LIMIT 5";
		return $this->wpdb->get_results($this->wpdb->prepare($query,''), ARRAY_A);
	}
	
	private function exist($auctionId) {
		$queryCnt = "SELECT count(*) FROM " . $this->tableName . " WHERE auction_id= '" . $auctionId ."'";
		return ($this->wpdb->get_var($this->wpdb->prepare($queryCnt,'')) > 0)? true : false;
	}	
}
	
?>
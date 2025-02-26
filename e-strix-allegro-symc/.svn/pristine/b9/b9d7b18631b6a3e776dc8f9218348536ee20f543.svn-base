<?php

class EStrixAllegroSymcSettings {

    private $tableName;
    private $wpdb;

    public function __construct(){
        global $wpdb;
        $prefix = $wpdb->prefix;
        $this->tableName = $prefix . "strx_allegro_symc_settings";
        $this->wpdb = $wpdb;
    }

    
    public function install($current_ver){
        $wpdb = $this->wpdb;
        $tableName = $this->tableName;
		
		$installed_ver = get_option( "allegro_sync_db_version" );

        if ($wpdb->get_var("SHOW TABLES LIKE '" . $tableName . "'") != $tableName) {
            $query = "CREATE TABLE " . $tableName . " (
			`key` varchar(250) NOT NULL,
			`value` TEXT NOT NULL,
			PRIMARY KEY (`key`))
			CHARACTER SET utf8 COLLATE utf8_bin";

            $wpdb->query($wpdb->prepare($query,''));
			
			$this->wpdb->insert($this->tableName,array('key' => 'plugin_author_url', 'value' => 'http://www.e-strix.pl'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'allegro_last_updated', 'value' => ''),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'allegro_version', 'value' => '' . $current_ver),array('%s','%s'));
			
			$this->wpdb->insert($this->tableName,array('key' => 'allegro_username',  'value' => 'val'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'allegro_seller_id',  'value' => 'val'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'access_token',  'value' => 'val'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'token_type',    'value' => 'val'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'refresh_token', 'value' => 'val'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'expires_in',    'value' => 'val'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'scope',         'value' => 'val'),array('%s','%s'));
			$this->wpdb->insert($this->tableName,array('key' => 'jti',           'value' => 'val'),array('%s','%s'));
			
			add_option("allegro_sync_db_version", $current_ver);
		}
    }
	
	public function update_database($current_ver = '1.0'){
				
		self::update('allegro_version',$current_ver);
    }

    public function uninstall(){
        return $this->wpdb->query($this->wpdb->prepare('DROP TABLE '.$this->tableName,''));
    }

    public function get_settings(){
        $settings = array();
        $items = $this->wpdb->get_results($this->wpdb->prepare("SELECT * FROM ". $this->tableName,''));
		foreach($items as $item){
			$settings[$item->{'key'}] = $item->{'value'};
        }
        return $settings;
    }

    public function save($data){
        $settings = $this->get_settings();
        unset($data['nonce']);
        $queries = array();
        foreach($data as $key => $value){   
			$sanitize_value = sanitize_text_field($value);
			if(isset($settings[$key])){
				$this->update($key,$sanitize_value);
			} else {
				$this->wpdb->insert($this->tableName,array('key' => $key, 'value' => $sanitize_value),array('%s','%s'));
			}
				
			if($this->wpdb->last_error)
                return $this->wpdb->last_error;
        }
        return true;
    }
	
	public function update($key,$value){
		$this->wpdb->update($this->tableName, array('value'=>$value), array('key'=>$key),array('%s'));
	}
}
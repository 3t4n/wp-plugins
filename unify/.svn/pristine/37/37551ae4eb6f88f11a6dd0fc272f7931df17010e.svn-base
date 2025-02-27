<?php

namespace CodeClouds\Unify\Models;

/**
 * License for pro.
 * @package CodeClouds\Unify
 */
class ProLicense
{
    protected $table_name = 'unify_options_data'; 
    protected $wpdb;
	public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $this->wpdb->prefix . 'unify_options_data'; // Table name with prefix
    }

	/**
	 * Create Table 
	*/
    public function createTable()
	{
        $charset_collate = $this->wpdb->get_charset_collate();
        if ($this->wpdb->get_var("SHOW TABLES LIKE '{$this->table_name}'") != $this->table_name ) {
            $sql = "CREATE TABLE {$this->table_name} (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                option_key varchar(255) NOT NULL,
                option_value longtext NOT NULL,
                created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY  (id),
                UNIQUE KEY option_key (option_key)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql); // Create the table
        }
	}

	public function saveData($option_key, $proLicenseFromOptionTable) {
        $this->wpdb->insert($this->table_name, [
            'option_key' => $option_key,
            'option_value' => serialize($proLicenseFromOptionTable)
        ]);
    }

    public function fetchData($option_key) {
        return $this->wpdb->get_row($this->wpdb->prepare("SELECT * FROM {$this->table_name} WHERE option_key = %s", $option_key));
    }

    public function update($id, $option_key, $proLicenseFromOptionTable) {
        $this->wpdb->update($this->table_name, [
           'option_key' => $option_key,
			'option_value' => serialize($proLicenseFromOptionTable)
        ], ['id' => $id]);
    }

    public function delete($id) {
        $this->wpdb->delete($this->table_name, ['id' => $id]);
    }

    public function deleteAll($option_key) {
        if ($this->wpdb->get_var("SHOW TABLES LIKE '{$this->table_name}'") == $this->table_name) {
            $delete = $this->wpdb->delete($this->table_name, ['option_key' => $option_key]);
            return $delete;
        }
    }
}
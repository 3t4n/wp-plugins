<?php

/**
 * Model for working with Tables for widgets
 * 
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Models;
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

use Konfirmi\Base\BaseController;

class WidgetModel
{
    /**
     * Property to save config file
     */
    protected $config;

    /**
     * Forms table name
     */
    public $table_forms;

    /**
     * Widgets forms table name
     */
    public $table_widget_forms;

    function __construct() {
        global $wpdb;
        $base = new BaseController();
        $this->config = $base->config;
        $this->table_forms = $wpdb->base_prefix . 'konfirmi_forms';
        $this->table_widget_forms = $wpdb->base_prefix . 'konfirmi_widget_forms';
    }
    /**
     * Create tables for working with widgets. Used on plugin activation
     */
    public function createTables() {
        global $wpdb;
		global $jal_db_version;

		$charset_collate = $wpdb->get_charset_collate();
		$sql = "
            CREATE TABLE $this->table_forms (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                name tinytext NOT NULL,
                PRIMARY KEY  (id) 
            ) $charset_collate;
            
            CREATE TABLE $this->table_widget_forms (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                widget_id int(9) NOT NULL,
                form_id int(9) NOT NULL,
                PRIMARY KEY  (id) 
            ) $charset_collate;
        ";
        dbDelta( $sql );

        $this->clearForms(); 
        $this->fillForms();

		add_option( 'konfirmi_db_version', $jal_db_version );
    }

    /**
     * Delete entries in widgets, and widget_forms tables
     */
    public function clearForms(){
        global $wpdb;
        $results = $wpdb->get_results( "DELETE  FROM $this->table_forms WHERE true;");
        $results = $wpdb->get_results( "ALTER TABLE $this->table_forms AUTO_INCREMENT = 1");
    }

    /**
     * Fill widget forms table
     */
    public function fillForms()
    {
        $sql = '';
        foreach ($this->config['seeds']['forms'] as $value) {
            $sql .= "INSERT INTO $this->table_forms (name) VALUES ('$value');";
        }
        dbDelta( $sql );
    }

    public function getForms()
    {
        global $wpdb;
        $sql = "SELECT * FROM `$this->table_forms`";
        return $wpdb->get_results($sql, 'ARRAY_A');
    }

    /**
     * Save widget form to database
     * 
     * @param string $widget_id widget id
     * @param string $form_id form id
     * 
     */
    public function saveWidgetForm($widget_id, $form_id){
        global $wpdb;

        $res = $wpdb->get_results("SELECT * FROM $this->table_widget_forms WHERE $this->table_widget_forms.widget_id = '$widget_id';");
        if(empty($res)){
            $sql = "INSERT INTO $this->table_widget_forms (widget_id, form_id) VALUES ('$widget_id', '$form_id');";
        } else {
            $sql = "UPDATE $this->table_widget_forms SET form_id = '$form_id' WHERE $this->table_widget_forms.widget_id = '$widget_id';";
        }
        dbDelta( $sql );
    }

    /**
     * Save widget form to database and clear other connection to form
     *
     * @param [type] $widget_id
     * @param [type] $form_id
     * @return void
     */
    public function saveWidgetForUnicForm($widget_id, $form_id){
        global $wpdb;
        $results = $wpdb->get_results("DELETE FROM $this->table_widget_forms WHERE form_id = $form_id");

        $this->saveWidgetForm($widget_id, $form_id);
    }

    /**
     * Get widget forms from database
     */
    public function getWidgetForms(){
        global $wpdb;

        $sql = "SELECT * FROM `$this->table_widget_forms`;";

        return $wpdb->get_results($sql);
    }

    /**
     * Drop tables for working with widgets. Used on plugin deactivation
     */
    public function dropTables() {
        global $wpdb;
		$sql = "DROP TABLE $this->table_forms, $this->table_widget_forms;";
		$wpdb->query($sql);
        delete_option("konfirmi_db_version");

    }

    public function getWidgetFormsWhere($widget_id){
        global $wpdb;

        $sql = "SELECT * FROM `$this->table_widget_forms` WHERE widget_id = $widget_id;";
        
        return $wpdb->get_results($sql);
    }
}
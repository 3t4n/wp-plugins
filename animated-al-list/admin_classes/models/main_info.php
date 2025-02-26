<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Model_MainInfo extends Model{
private $table;
public function __construct($db)
  {
  parent::__construct($db);
    $this->table = $this->db->wpdb->prefix."animated_al_list_main";
  }
public function saveMainData($source, $pid)
  {
  if (!isset($source['list_fullwidth']))$source['list_fullwidth'] = 0;
  
  $filter = array(array('list_name', 'list_name', '%s'),
            array('list_width', 'list_width', '%d'), array('list_height', 'list_height', '%d'),
            array('list_duration', 'list_duration', '%d'),
            array('list_duration_effect', 'list_duration_effect', '%d'), 
            array('list_apply_classes', 'list_apply_classes', '%s'),
            array('list_items_container', 'list_items_container', '%s'),
            array('list_main_container', 'list_main_container', '%s'),
            array('list_fullwidth', 'list_fullwidth', '%d'),
            
            array('list_easing', 'list_easing', '%s')
            );
  if (!intval(sanitize_text_field($pid)))return false;
  
  $idval = array('list_id' => intval(sanitize_text_field($pid)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }
public function saveSettingsButtons($source, $pid)
  {
  $filter = array(array('settings_buttons', 'settings_buttons', '%d'), array('settings_buttons_top', 'settings_buttons_top', '%d'));
  if (!intval(sanitize_text_field($pid)))return false;
  
  $idval = array('list_id' => intval(sanitize_text_field($pid)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }

public function createProject($name)
  {
  $name = sanitize_text_field($name);
    if (!$name) return false;
  
    $rowId = $this->db->insertRow($this->table,
                                  array('list_name' => $name, 'list_width' => 0, 'list_height' => 0),
                                  array('%s', '%d', '%d')
                                  );
    return $rowId;
  }
public function getProjects()
  {
    return $this->db->fetchAll($this->table, " list_name, list_id ");
  }
public function getMainInfo($id)
  {
  $table_items =$this->db->wpdb->prefix."animated_al_list_items";
  $params = array($id);
    $sql = "select main_info.*, '' as delim1, items.* from ".$this->table." as main_info left join ".$table_items." as items on (main_info.list_id=items.main_id)
    where main_info.list_id=%d order by main_info.list_id, items.item_num, items.item_id";
    
    return $this->db->fetchData($sql, $params);
  }
public function delMainInfo($id)
  {
  $tables = array('list_items'=>$this->db->wpdb->prefix."animated_al_list_items");

  $params = array($id);
  $sql = "delete main.*, items.* from ".$this->table." as main left join ".$tables['list_items']." as items on (main.list_id=items.item_id) where main.list_id=%d";

    $this->db->generalSql($sql, $params);

    return true;

  }
}
?>
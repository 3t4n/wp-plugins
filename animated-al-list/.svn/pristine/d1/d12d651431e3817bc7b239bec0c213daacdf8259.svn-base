<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Model_Templates extends Model{
private $table;
public function __construct($db)
  {
  parent::__construct($db);
    $this->table = $this->db->wpdb->prefix."animated_al_list_main";
  }

public function saveTemplatesData($source, $id)
  {
  $filter = array(
                  array('list_main_template', 'main_template', '%s'), array('list_item_template', 'item_template', '%s')
                  );
  if (!intval(sanitize_text_field($id)))return false;
  
  $idval = array('list_id' => intval(sanitize_text_field($id)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }
public function getTemplatesInfo($id)
  {
    return $this->db->fetchByVal($this->table, "main_id", $id, '%d');
  }
public function getTemplatesById($id)
  {
    return $this->db->fetchByVal($this->table, "item_id", $id, '%d');
  }
public function getTemplatesInfoFirst()
  {
    return $this->db->fetchFirst($this->table);
  }

public function delTemplatesInfo($id)
  {
    return $this->db->deleteRow($this->table, "item_id", $id, '%d');
  }
public function massDelTemplatesData($chk_ids)
  {
    return $this->db->massDeleteRows($this->table, 'item_id', $chk_ids);
  }
public function massDisableEnableTemplatesData($chk_ids, $pid)
  {
  $str = '';
        if( is_array( $chk_ids ) ){
        $str = implode( ', ', $chk_ids ); 
        }
    if (empty($str))return false;
    
    $sql = "update `".$this->table."` set `item_disabled` = case when `item_id` in ({$str}) then 1 else 0 end where `main_id`=".$pid;

    return $this->db->generalSqlWp($sql);
  }
}
?>
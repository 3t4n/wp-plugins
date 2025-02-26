<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Model_Main extends Model{
private $table;
public function __construct($cachedb)
  {
  parent::__construct($cachedb);
    $this->table = $this->db->wpdb->prefix."animated_al_list_main";
  }
public function getSliderQuery()
  {
  $tables = array('items'=>$this->db->wpdb->prefix."animated_al_list_items");

    $sql = "select list.*, '' as delim, items.* from ".$this->table." as list left join ".$tables['items']." as items on (list.list_id=items.main_id)
    where list.list_id=%d and item_disabled=0 order by list.list_id, items.item_id";
    
    return $sql;
  }
public function get_main_results($id)
  {
  $sql = $this->getSliderQuery();

    $params = array($id,);
      $front = $this->db->fetchDataMain($sql, $params);

   return $front;
  }

}
?>
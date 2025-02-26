<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Model_Items extends Model{
private $table;
public function __construct($db)
  {
  parent::__construct($db);
    $this->table = $this->db->wpdb->prefix."animated_al_list_items";
  }
public function saveAllItems($items_src, $id)
  {
 $items = explode("\n", $items_src);
 $item_elem = array();
  foreach ($items as $item)
    {
      $arr = sanitize_text_field(trim($item));
        $swp = array('main_id'=>intval(sanitize_text_field($id)), 'item_name'=>$arr, 'item_text'=>$arr);
      $item_elem[] = $swp;
    }
    $this->saveBulkData($item_elem);
  }
public function saveBulkData($source)
  {
    $sql = "INSERT INTO `".$this->table."` (`main_id`,`item_name`,`item_text`) VALUES ";
    foreach ($source as $src)
      {
        $sql .= "(".$src['main_id'].",'".$src['item_name']."','".$src['item_text']."'),";
      }
      $sql = substr($sql, 0, -1);

        $this->db->generalSqlWp($sql);
    return true;
  }

public function saveItemsData($source, $id)
  {
  $filter = array(array('item_name', 'list_item_name', '%s'), array('item_url', 'list_item_url', '%s'), 
                   array('item_text', 'list_item_text', '%s'), array('item_image', 'list_item_image', '%s'),
                   array('item_width', 'list_item_width', '%s'), array('item_height', 'list_item_height', '%s'),
                   array('item_styles', 'list_item_styles', '%s'), array('item_classes', 'list_item_classes', '%s'),
                   array('item_color', 'list_item_color', '%s'), array('item_bgcolor', 'list_item_bgcolor', '%s')
            );
  if (!intval(sanitize_text_field($id)))return false;
  
  $idval = array('item_id' => intval(sanitize_text_field($id)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }
public function getItemsInfo($id)
  {
    return $this->db->fetchByVal($this->table, "main_id", $id, '%d');
  }
public function getItemById($id)
  {
    return $this->db->fetchByVal($this->table, "item_id", $id, '%d');
  }
public function getItemsInfoFirst()
  {
    return $this->db->fetchFirst($this->table);
  }

public function delItemsInfo($id)
  {
    return $this->db->deleteRow($this->table, "item_id", $id, '%d');
  }
public function massDelItemData($chk_ids)
  {
    return $this->db->massDeleteRows($this->table, 'item_id', $chk_ids);
  }
public function massDisableEnableItemData($chk_ids, $pid)
  {
  $str = '';
        if( is_array( $chk_ids ) ){
        $str = ",".implode( ', ', $chk_ids ); 
        }
    //if (empty($str))$str = '';
    
    $sql = "update `".$this->table."` set `item_disabled` = case when `item_id` in (0{$str}) then 1 else 0 end where `main_id`=".$pid;

    return $this->db->generalSqlWp($sql);
  }
}
?>
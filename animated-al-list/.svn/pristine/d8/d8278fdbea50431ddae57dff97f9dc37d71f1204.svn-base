<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Model_Positions extends Model{
private $table;
public function __construct($db)
  {
  parent::__construct($db);
    $this->table = $this->db->wpdb->prefix."animated_al_list_main";
  }

public function saveEffect($source, $id)
  {
  $filter = array(
                  array('list_effect', 'list_effect', '%s'),
                  array('list_visible_number', 'list_visible_number', '%d')
                  );
                  
  if (!intval(sanitize_text_field($id)))return false;
  
  $idval = array('list_id' => intval(sanitize_text_field($id)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }

public function savePositions($source, $id)
  {
  $source['positions_arg'] = "";
    foreach ($source['equa_addit'] as $key=>$val)
      {
        $source['positions_arg'] .= $key."**".$val."***";
      }
      $source['positions_arg'] = substr($source['positions_arg'], 0, -3);
      
  $filter = array(
                  array('list_equation', 'position_equation', '%s'), array('list_equation_koef', 'positions_arg', '%s'),
                  array('list_offset_left', 'list_offset_left', '%d'), array('list_offset_top', 'list_offset_top', '%d'),
                  array('radius_first_last_elem', 'move_radius_fl', '%d'), array('side_of_moving_first_last', 'side_of_moving_fl', '%d')
                  );
                  
  if (!intval(sanitize_text_field($id)))return false;
  
  $idval = array('list_id' => intval(sanitize_text_field($id)));
  $idtype = array('%d');
  
   return $this->db->saveData($this->table, $source, $filter, 'update', $idval, $idtype);
  }
public function getPositionsInfo($id)
  {
    return $this->db->fetchByVal($this->table, "main_id", $id, '%d');
  }
public function getPositionsById($id)
  {
    return $this->db->fetchByVal($this->table, "item_id", $id, '%d');
  }
public function getPositionsInfoFirst()
  {
    return $this->db->fetchFirst($this->table);
  }

public function delPositionsInfo($id)
  {
    return $this->db->deleteRow($this->table, "item_id", $id, '%d');
  }
public function massDelPositionsData($chk_ids)
  {
    return $this->db->massDeleteRows($this->table, 'item_id', $chk_ids);
  }
public function massDisableEnablePositionsData($chk_ids, $pid)
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
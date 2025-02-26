<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Controller_Items extends AnimatedAl_Controller{
private $model_items;

public function __construct($model_items)
  {
  parent::__construct();
    $this->model_items = $model_items;
  }

public function saveItemsData()
  {
   if (isset($_POST['save_list_item_btn']))
    {
      $this->check('edit_list_item');
      
      $this->model_items->saveItemsData($_POST, $_POST['item_id']);
      
      return $_POST['item_id'];
    }
   return false; 
  }
public function getItemsData($id)
  {
      return $this->model_items->getItemsInfo($id);
  }
public function getItemById($id)
  {
      return $this->model_items->getItemById($id);
  }

public function delItemsData()
  {
  if (isset($_POST['delete_list_item_btn']))
    {
      $this->check('manage_list_items');
      
      return $this->model_items->delItemsInfo($_POST['list_item_id']);
    }
   return false;
  }
public function editItemsData_before()
  {
  if (isset($_POST['edit_list_item_btn']))
    {
      $this->check('manage_list_items');

      return $this->model_items->getItemById($_POST['list_item_id']);
    }
   return false;
  }
public function editItemsData_after($list_item_id)
  {
  if (isset($_POST['save_list_item_btn']))
    {
      $this->check('edit_list_item');

      return $this->model_items->getItemById($list_item_id);
    }
   return false;
  }

public function addItemsBulk()
  {
  if (isset($_POST['list_items_add_btn']))
    {
      $this->check('list_items_add');
      
      return $this->model_items->saveAllItems($_POST['list_items'], $_POST['main_id']);
    }
   return false;
  }

public function massActItemsData()
  {
   if (isset($_POST['list_item_mass_execution_btn']))
    {
      $this->check('al_list_item_mass');

          switch ($_POST['list_item_mass_action'])
          {
          case '1' : $this->model_items->massDelItemData($_POST['delete_list_item_chk_now']); break;
          case '2' : $this->model_items->massDisableEnableItemData($_POST['disable_list_item_chk_now'], $_POST['proj_id']); break;
          }

      return true;
     }
   return false;
  }
public function execute($pid)
  {
  //Delete item
    $this->delItemsData();

  //Bulk add items
    $this->addItemsBulk();
        
  //Mass action items
    $this->massActItemsData();
        
  //Save item
    $items_id = $this->saveItemsData();

  //Load item for edit
    $items_info = $this->editItemsData_before();
    ($items_info == false) ? $items_info = $this->editItemsData_after($items_id) : 0 ;
    
  return array($items_id, $items_info);
  }
}
?>
<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class Controller_Templates extends AnimatedAl_Controller{
private $model_templates;
  private $main_templates_url;
    private $item_templates_url;

public function __construct($model_templates)
  {
  parent::__construct();
    $this->model_templates = $model_templates;
      $this->main_templates_url = plugin_dir_path( __FILE__ )."../../templates/front_templates/main/";
        $this->item_templates_url = plugin_dir_path( __FILE__ )."../../templates/front_templates/item/";
  }

public function saveTemplatesData()
  {
   if (isset($_POST['save_template_btn']))
    {
      $this->check('edit_template_items');
      
      $this->model_templates->saveTemplatesData($_POST, $_POST['proj_id']);
      
      return $_POST['proj_id'];
    }
   return false; 
  }

public function check_templates_files($dir)
  {
  $res = array();

          $tmpls = glob($dir . '*');
          foreach ($tmpls as $tmpl)
          {
            if (is_file($tmpl))
            $res[] = basename($tmpl);
          }
    return $res;
  }
public function getAllTemplatesFiles()
  {
    $main_files = $this->check_templates_files($this->main_templates_url);
      $item_files = $this->check_templates_files($this->item_templates_url);
    
    return array($main_files, $item_files);
  }
public function execute()
  {
  //Save templates
    $this->saveTemplatesData();
  
    list($mainf, $itemf) = $this->getAllTemplatesFiles();
    
    return array($mainf, $itemf);
  }
}
?>
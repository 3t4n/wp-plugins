<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class AnimatedAl_Users_Common extends AnimatedAl_Base{
public function __construct()
  {
  if (method_exists(get_parent_class(), '__construct'))
      parent::__construct();
  }
public function execute($id)
  {
  $data = array();
  $db = new AnimatedAl_CacheDb();
    $mainController = new Controller_Main(new Model_Main($db));
      $data['front'] = $mainController->execute($id);

    $views = new AnimatedAl_View(array('front/tab1_header', array('front/tab1_block1'), 'front/tab1_footer'));
    $views->setData($data);
    return $views->viewTemplates();
  }
}
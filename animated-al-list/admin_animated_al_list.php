<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class AnimatedAl_Admin extends AnimatedAl_Base{
private $currentDir;
private $file;

public function __construct($file)
  {
  $this->file = $file;
  $filePath = $file;
    $this->currentDir = dirname($filePath);

    $this->activite();

  add_action('init', array($this, 'init'));
     add_action( 'widgets_init', array($this, 'register_slider_widget') );
  }
public function init()
  {
    $adminCommon = new AnimatedAl_Admin_Common($this->file);
        $adminCommon->init();
  }
public function activite()
  {
      AnimatedAl_Admin_Common::onActivate($this->file);
  }
  

}
?>
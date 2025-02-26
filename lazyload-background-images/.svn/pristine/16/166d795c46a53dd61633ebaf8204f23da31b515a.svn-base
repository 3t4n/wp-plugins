<?php

/**
 * @since 1.0.0
 * @author Proloy Bhaduri<support@proloybhaduri.com>
 */

class PBLZBG_Init
{

  /**
   * constructor 
   *
   * @return void
   */
  public function __construct()
  {
    self::admin_init();
  }

  /**
   * Initializes admin  includes 
   *
   * @return void
   */
  public static function admin_init()
  {


    if (!function_exists('file_get_html')) {

      // Project Source:  http://sourceforge.net/projects/simplehtmldom/

      include_once(PBLZBG_PLUGIN_DIR . 'inc/html-modifier.php');
    }
    require_once PBLZBG_PLUGIN_DIR . 'admin/core/class-bg-image-processor.php';
    require_once PBLZBG_PLUGIN_DIR . 'admin/plugin-functions.php';
  }
}
new PBLZBG_Init();

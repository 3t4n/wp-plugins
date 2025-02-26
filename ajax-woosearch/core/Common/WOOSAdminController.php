<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Common;

use WOOS\Api\WOOSSettingsApi;
use WOOS\Api\Callbacks\WOOSAdminCallbacks;
use WOOS\Common\WOOSBaseController;


class WOOSAdminController extends WOOSBaseController
{

  public $settings;

  public $callbacks;

  public $pages = array();

    /**
    * Constructor
    * Feature added by : Joy Shaha joysaha7302@gmail.com
    * Date       : 22.04.2020
    */
  public function woos_register()
  {
      if ( version_compare( PHP_VERSION, '5.6.0', '>=' ) ) {
        if ( ! $this->woos_last_code() ) return;
        if ( ! $this->woos_wp_version_check() ) return;
        $this->settings = new WOOSSettingsApi();

        $this->callbacks = new WOOSAdminCallbacks();

        $this->setPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'WooSearch' )->woos_register();
      }else{
          add_action( 'admin_notices',  'woos_php_version_error_warning');
      }
  }

  public function setPages()
  {
    $this->pages = array(
      array(
        'page_title' => 'WooSearch', 
    		'menu_title' => 'WooSearch', 
    		'capability' => 'manage_options', 
    		'menu_slug' => 'woos', 
    		'callback' => array( $this->callbacks, 'woos_setting_view' ), 
    		'icon_url' => 'dashicons-search', 
    		'position' => 110
      ),
      
    );
  }

  public function setSettings()
  {
    $args = array(
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_enable_category',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_enable_sku',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_enable_stock',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_enable_price',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_enable_content',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_enable_image',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_enable_loading',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_content_limit',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ),
      array(
        'option_group' => 'woos_setting_form_settings',
        'option_name' => 'woos_search_placeholder',
        'callback' => array( $this->callbacks, 'woos_sanitize' )
      ), 
    );

    $this->settings->setSettings($args);
  }

  public function setSections()
  {
    $args = array(
      array(
        'id' => 'woos_settings_index',
        'title' => '',
        'page' => 'woos_setting_page'
      ),
    );

    $this->settings->setSections($args);
  }

  public function setFields()
  {
    $args = array(
      array(
        'id' => 'woos_enable_category',
        'title' => 'Show/Hide Category',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_enable_category',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'woos_enable_sku',
        'title' => 'Show/Hide Sku',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_enable_sku',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'woos_enable_stock',
        'title' => 'Show/Hide Stock',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_enable_stock',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'woos_enable_price',
        'title' => 'Show/Hide Price',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_enable_price',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'woos_enable_content',
        'title' => 'Show/Hide Content',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_enable_content',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'woos_enable_image',
        'title' => 'Show/Hide Thumbnail',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_enable_image',
          'placeholder' => '',
           'default'  =>   1,
           'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'woos_enable_loading',
        'title' => 'Show/Hide Loading',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_enable_loading',
          'placeholder' => '',
          'default'  =>   1,
          'input_type' => 'checkbox',
        )
      ),
      array(
        'id' => 'woos_content_limit',
        'title' => 'Content Limit',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_content_limit',
          'placeholder' => '',
           'default'  =>   200,
           'input_type' => 'number',
        )
      ),
      array(
        'id' => 'woos_search_placeholder',
        'title' => 'Placeholder Text',
        'callback' => array($this->callbacks, 'woos_optionField'),
        'page' => 'woos_setting_page',
        'section' => 'woos_settings_index',
        'args' => array(
          'option_name' => 'woos_settings',
          'label_for' => 'woos_search_placeholder',
          'placeholder' => '',
           'default'  =>   'Search for product...',
           'input_type' => 'text',
        )
      ),
    );

    $this->settings->setFields($args);
  }
}
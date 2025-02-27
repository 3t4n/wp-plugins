<?php
/*
Plugin Name: WP Widget Clipboard
Plugin URI:
Description: The Clipboard plugin to copy and paste widgets easily
Version: 1.2.15
Author: OWL WP PLUGINS
Author URI:
Text Domain: wp-widget-clipboard
Domain Path: /languages
License: GPL2
*/

/*  Copyright 2018 OWL WP PLUGINS (email : owlwpplugins@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
   published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * @author OWL WP PLUGINS
 * @created 2018/08/24
 */

//ini_set("display_errors", 'Off');
//error_reporting(E_ALL & ~E_NOTICE);

if( ! is_admin() ){ return; }

if ( ! defined( 'ABSPATH' ) ) { return; }

if( ! defined( 'WPWC_VERSION' ) ) {
  define( 'WPWC_VERSION' , '1.1.9' );
}


if( ! class_exists('WP_Widget_Clipboard')):

class WP_Widget_Clipboard{

  const VERSION = WPWC_VERSION;

  const ACTION_HOOK_WPWC_INIT = 'wpwc_init';

  const SLUG_OPTIONS_MENU = 'wpwc-widget-clipboard';

  public function init(){

    require_once dirname(__FILE__) . '/includes/utils/utils.php';

    add_action( 'admin_menu', array( $this, 'add_admin_menus' ) );
    add_action( 
      'admin_enqueue_scripts', 
      array( $this, 'enqueue_admin_page_styles_scripts')
    );

    global $pagenow;
    if( $pagenow != 'widgets.php' ) return;

    add_action( 'admin_head', array( $this, 'wpwc_script' ) );
    add_action( 'admin_head', array( $this, 'wpwc_patch_script' ) );


    /** Load scripts */
    $scripts = array();
    /*$scripts[] = array(
      'handle' => 'wpwc-script-js',
      'src' => plugins_url( 'js/script.js', __FILE__ ),
      'version' => self::VERSION
    );*/

    foreach( $scripts as $script ){
      $is_enqueue = isset( $script['enqueue'] ) ? @$script['enqueue'] : true;

      wp_deregister_script( $script['handle'] );
      wp_register_script( 
        $script['handle'], 
        $script['src'], 
        is_null(@$script['deps']) ? array() : $script['deps'],
        is_null(@$script['version']) ? false : $script['version'] 
      );
      if( $is_enqueue ){
        wp_enqueue_script( $script['handle'] );
      }
    }


    /** Load styles */
    $styles = array();
    $styles[] = array(
      'handle' => 'wpwc-clipboard',
      'src' => plugins_url( 'css/clipboard.css', __FILE__ ),
      'version' => self::VERSION
    );
    $styles[] = array(
      'handle' => 'wpwc-widget',
      'src' => plugins_url( 'css/widget.css', __FILE__ ),
      'version' => self::VERSION
    );
    $styles[] = array(
      'handle' => 'wpwc-webfonts',
      'src' => plugins_url( 'webfonts/style.css', __FILE__ ),
      'version' => self::VERSION
    );

    foreach( $styles as $style ){
      $is_enqueue = isset( $style['enqueue'] ) ? @$style['enqueue'] : true;

      wp_register_style( 
        $style['handle'],
        $style['src'],
        is_null( @$style['deps'] ) ? array() : @$style['deps'],
        is_null( @$style['version'] ) ? false : @$style['version']  
      );
      if( $is_enqueue ){
        wp_enqueue_style( $style['handle'] );
      }
    }

  }

  public function load_plugin_textdomain() {
    load_plugin_textdomain( 
      'wp-widget-clipboard', FALSE, 
      basename( dirname( __FILE__ ) ) . '/languages/' 
    );
  }

  public function enqueue_admin_page_styles_scripts(){

    global $pagenow;
    if( $pagenow != 'options-general.php' ){ return; }

    wp_enqueue_style('jquery-ui', plugins_url('/css/jquery-ui.css', __FILE__));
    wp_enqueue_style('wpwc-guide', plugins_url('/css/guide.css', __FILE__));

    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-tabs');

  }

  public function add_admin_menus(){

    add_options_page(
      'WP Widget Clipboard ( WPWC ) ',
      'WP Widget Clipboard',
      'manage_options',
      self::SLUG_OPTIONS_MENU,
      array( $this, 'render_wpwc_menu_page' )
    );

  }

  public function render_wpwc_menu_page(){

    global $pagenow;
    if( $pagenow != 'options-general.php' ){ return; }

    /// Start HTML?>
<div id="wpwc_manual_header">
  <h2>WP Widget Clipboard ( WPWC ) </h2>
  
  <?php 
    $share_url = preg_match( '/ja|JP/', get_locale() ) ?
      'https://ja.wordpress.org/plugins/wp-widget-clipboard/' :
      'https://wordpress.org/plugins/wp-widget-clipboard/';

  ?>
  <div id="wpwc_share_buttons">
    <div style="font-size: 16px;">SHARE on : </div>
    <button class="sharer button" data-sharer="twitter" 
         data-title="WP Widget Clipboard" data-url="<?php echo $share_url; ?>">
        Twitter
    </button>
    <button class="sharer button" data-sharer="facebook" 
         data-title="WP Widget Clipboard" data-url="<?php echo $share_url; ?>">
        Facebook
    </button>
    <button class="sharer button" data-sharer="pocket" 
            data-title="WP Widget Clipboard" data-url="<?php echo $share_url; ?>">
      Pocket
    </button>
    <button class="sharer button" data-sharer="linkedin" 
            data-title="WP Widget Clipboard" data-url="<?php echo $share_url; ?>">
      Linkedin
    </button>
    <button class="sharer button" data-sharer="line" 
            data-title="WP Widget Clipboard" data-url="<?php echo $share_url; ?>">
      LINE
    </button>
    <button class="sharer button" data-sharer="hackernews" 
            data-title="WP Widget Clipboard" data-url="<?php echo $share_url; ?>">
      Hackernews
    </button>
    <button class="sharer button" data-sharer="whatsapp" data-web
            data-title="WP Widget Clipboard" data-url="<?php echo $share_url; ?>">
      Whatsapp
    </button>
  </div>
  <style>
  #wpwc_manual_header{
    display: flex;
  }
  #wpwc_share_buttons{
    display: flex;
    margin: auto;
  }
  #wpwc_share_buttons > *{
    margin: auto 4px;
  }
  .sharer.button{ color: #fff; }
  .button[data-sharer="twitter"] { background: #00aced; }
  .button[data-sharer="facebook"] { background: #3b5998; }
  .button[data-sharer="pocket"] { background: #EE4056; }
  .button[data-sharer="linkedin"] { background: #007AB5; }
  .button[data-sharer="line"] { background: #1DCD00; }
  .button[data-sharer="hackernews"] { background: #FF6700; }
  .button[data-sharer="whatsapp"] { background: #4DC247; }
  @media screen and (max-width: 782px){
    .button[data-sharer]{ display: none; }
    .button[data-sharer="twitter"]{ display: block; }
    .button[data-sharer="facebook"]{ display: block; }
  }
  @media screen and (max-width: 550px){
    #wpwc_share_buttons{ display: none; }
  }
  </style>
</div>

<div id="wpwc_manual">
  <div id="wpwc_manual_tabs">

    <ul class="link_tabs">
      <li>
        <a href="#wpwc_usage_content">
          <?php _e( 'Usgae', 'wp-widget-clipboard' ); ?>
        </a>
      </li>
      <li>
        <a id="upgrade_link" href="#wpwc_upgrade_content">
          <?php _e( 'Upgrade', 'wp-widget-clipboard' ); ?>
        </a>
      </li>
      <li>
        <a id="donate_link" href="#wpwc_donate_content">
          <?php _e( 'Donate', 'wp-widget-clipboard' ); ?>
        </a>
      </li>
    </ul>

    <div id="wpwc_usage_content">
      <?php $this->render_usage_menu_page(); ?>
    </div>
    <div id="wpwc_upgrade_content">
      <?php $this->render_upgrade_menu_page(); ?>
    </div>
    <div id="wpwc_donate_content">
      <?php $this->render_donate_menu_page(); ?>
    </div>

  </div>
</div>

<script type="text/javascript">
jQuery(function(){
  jQuery('#wpwc_manual_tabs').tabs();

  jQuery(window).load(function(){
    jQuery('body, html').scrollTop(0);
  });
});
</script>

<?php /// Load share buttons library. ?>
<script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
    <?php /// End HTML

  }

  public function include_menu_page_by_locale( $page_file_name ){

    $locale = get_locale();
    $lcodes = preg_split( '/[-_]/', $locale, 2);
    $lang = ( $lcodes[0] !== '' ) ? $lcodes[0] : 'none';
    $country = ( count($lcodes) > 1 ) ? $lcodes[1] : '';

    $page_file_path = dirname(__FILE__) . '/includes/views/languages';
    if( file_exists( $page_file_path . "/{$lang}_{$country}/{$page_file_name}" ) ){
      include_once $page_file_path . "/{$lang}_{$country}/{$page_file_name}";
    }else if( file_exists( $page_file_path . "/{$lang}/{$page_file_name}" ) ){
      include_once $page_file_path . "/{$lang}/{$page_file_name}";
    }else{
      include_once dirname(__FILE__) . "/includes/views/{$page_file_name}";
    }

  }

  public function render_usage_menu_page(){
    $this->include_menu_page_by_locale('usage-guide.php');
  }

  public function render_upgrade_menu_page(){
    $this->include_menu_page_by_locale('upgrade-guide.php');
  }

  public function render_donate_menu_page(){
    $this->include_menu_page_by_locale('donate-guide.php');
  }


  /** Render script for WPWC. */
  public function wpwc_script(){

    /// Start script ?>
<script type="text/javascript">
jQuery(document).ready(function(){
  if(!window.WPWC) window.WPWC = {};

  WPWC = {

    ID: {
      WC_CLIPBOARD: 'wpwc-clipboard', 
      WC_AREA1: 'wpwc-wc_area1',
      WC_AREA2: 'wpwc-wc_area2',
    },

    CLS: {
      WPWC_WIDGET: 'wpwc-widget',
      WPWC_WIDGET_PART: 'wpwc-widget_part',
      LINK_DUP_WIDGET: 'wpwc-dup_widget_link',
      PH_WIDGET: 'wpwc-widget_placeholder',
      CHBX_WIDGET: 'wpwc-widget_check',
      WIDGETS_COPIED: 'wpwc-copied_widgets',
      CHBX_COPIED_WIDGETS: 'wpwc-copied_widgets_check',
      LABEL_COPIED_COUNT: 'wpwc-copied_widgets_count'
    },

    EVTYPE: {
      CHANGE_WIDGET: 'changewidget'
    },

    init: function(){

      WPWC.Render();

      const observer = new MutationObserver((records) => {
        WPWC.UpdateWidgets();
      });
      observer.observe(
        document.getElementById('widgets-right'), 
        {
          childList: true,
          subtree: true
        }
      );
      WPWC.UpdateWidgets();
    },

    Render: function(){

<?php $options_page_url = menu_page_url(self::SLUG_OPTIONS_MENU, false); ?>
<?php $upgrade_page_ulr = $options_page_url . '#wpwc_upgrade_content'; ?>
<?php $donate_page_url = $options_page_url . '#wpwc_donate_content'; ?>

      /** Render clipboard */
      jQuery('#widgets-right').before(`
<div id="${WPWC.ID.WC_CLIPBOARD}">
  <div class="header">
    <h2>
      <i class="fa-wpwc-clipboard"></i>
      <span style="font-weight: 600;">
      <?php echo __('Widget Clipboard', 'wp-widget-clipboard'); ?>
      </span>
    </h2>
  </div>
  <!-- Disable upgrade link -->
  <!--
  <div class="upgrade">
    <a href="<?php echo $upgrade_page_ulr; ?>" target="_blank">
      <span class="fa-wpwc-star"></span>
      <?php _e( 'Upgrade', 'wp-widget-clipboard' ); ?>
    </a>
  </div>
  -->
  <!-- Enable donate link -->
  <div class="donate">
    <a href="<?php echo $donate_page_url; ?>" target="_blank">
      <span class="fa-wpwc-star">
      <?php _e( 'Donate', 'wp-widget-clipboard' ); ?>
    </a>
  </div>
  <ul>
    <li>
      <div id="${WPWC.ID.WC_AREA1}"
          class="${WPWC.CLS.WIDGETS_COPIED}">
        <div class="widget-top">
          <div class="widget-title">
            <h3>
              <input type="checkbox" class="${WPWC.CHBX_COPIED_WIDGETS}">
              <?php echo __('Copied Widgets', 'wp-widget-clipboard'); ?>
               ( <span class="${WPWC.LABEL_COPIED_COUNT}">0</span> )
            </h3>
          </div>
        </div>
      </div>
    </li>
    <li>
      <div id="${WPWC.ID.WC_AREA2}">
        <div class="wpwc-wc_area2_inner">
          <div class="wpwc-usage_exp">
            <?php echo __('Paste by drag & drop', 'wp-widget-clipboard'); ?>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
      `);


      let copiedWidgets = jQuery('.' + WPWC.CLS.WIDGETS_COPIED);

      /** Make copied widget draggable. */
      copiedWidgets.draggable({
        stack: '.' + WPWC.CLS.WIDGETS_COPIED,
        start: function(e, ui){
          jQuery(ui.helper).css({
            'width': jQuery(this).width(),
            'height': jQuery(this).height()
          });
        },
        drag: WPWC.CopiedWidgetDrag,
        stop: function(e, ui){
          WPWC.PasteSelected(e, ui);
        },
        helper: 'clone'
      });

      copiedWidgets.on('dragstart', function(){
        WPWC.DragStartFromClipboard();
      });
      copiedWidgets.on('dragstop', function(){
        WPWC.DragEndFromClipboard();
      });

      copiedWidgets.on('click', '.' + WPWC.CHBX_COPIED_WIDGETS, function(e){
        let widgetChecked = jQuery('.' + WPWC.CLS.CHBX_WIDGET + ':checked');
        if(widgetChecked.length > 0){
          jQuery('.' + WPWC.CLS.CHBX_WIDGET).prop('checked', false);
        }else{
          jQuery('.' + WPWC.CLS.CHBX_WIDGET).prop('checked', true);
        }
        e.stopPropagation();

        WPWC.UpdateClipboard();
      });


      jQuery(document).on('click', '.' + WPWC.CLS.LINK_DUP_WIDGET, function(){
        let widget = jQuery(this).closest('.widget');
        if(!widget[0]){return;}

        jQuery('#widgets-right .widget-title').css('background', '');

        $widget = WPWC.Clone(widget);
        $widget.find('.' + WPWC.CLS.CHBX_WIDGET).prop('checked', false);
        $widget.find('.widget-title').css('background', 'lightblue');
        widget.after($widget);

        wpWidgets.save($widget, 0, 0, 1);
      });

    },

    CopiedWidgetDrag: function(e, ui){

      const widget_ph_html =
        '<div class="widget-placeholder ' + WPWC.CLS.PH_WIDGET + '">' +
          '<div class="wpwc_widget_ph_inner">' +
          '</div>' +
        '</div>';

      jQuery(ui.helper).hide();
      belowElem = jQuery(document.elementFromPoint(e.clientX, e.clientY));
      jQuery(ui.helper).show();

      if(!belowElem[0]){jQuery('.' + WPWC.CLS.PH_WIDGET).remove(); return;}

      let widgetsHolder = belowElem.closest('.widgets-holder-wrap');
      if(!widgetsHolder[0]){jQuery('.' + WPWC.CLS.PH_WIDGET).remove(); return;}
      widgetsHolder.removeClass('closed');

      if(widgetsHolder.find('.widget').length !== 0){
        let widget = belowElem.closest('#widgets-right .widget');
        let widgetClass = widget.attr('class');
        if(!widget[0]){return;}
        if(!widgetClass.match(/(\s+|)widget(\s+|)/)){return;}

        if(!widget.prev('.widget-placeholder')[0]){
          jQuery('.' + WPWC.CLS.PH_WIDGET).remove();
          widget.before(widget_ph_html);
        }else{
          jQuery('.' + WPWC.CLS.PH_WIDGET).remove();
          widget.after(widget_ph_html);
        }
      }else{
        jQuery('.' + WPWC.CLS.PH_WIDGET).remove();
        widgetsHolder.find('.sidebar-description').after(widget_ph_html);
      }

    },

    PasteSelected: function(ev = undefined, ui = undefined){

      jQuery('#widgets-right .widget-title').css('background', '');

      let phWidget = jQuery('.' + WPWC.CLS.PH_WIDGET);
      if(!phWidget[0]){ return; }
      if(phWidget.length > 1){ phWidget.remove(); return; }

      $widgets = [];
      jQuery('.' + WPWC.CLS.CHBX_WIDGET + ':checked').each(function(){
        let widget = jQuery(this).closest('.widget');
        if(!widget[0]){ return true; }

        let $widget = WPWC.Clone(widget);
        $widget.find('.' + WPWC.CLS.CHBX_WIDGET).prop('checked', false);
        $widget.find('.widget-title').css('background', 'lightblue');
        phWidget.before($widget);

        $widgets.push($widget);
        wpWidgets.save($widget, 0, 1, 1);
      });

      let widgetCount = $widgets.length;
      for(let i = 0; i < widgetCount; i++){
        wpWidgets.save($widgets[i], 0, 1, 1);
      }

      phWidget.remove();
    },

    UpdateWidgets: function(){

      noneWpwcWidgetSlc = '#widgets-right .widget:not(.' + WPWC.CLS.WPWC_WIDGET + ')';
      jQuery(noneWpwcWidgetSlc).each(function(){
        let widget = jQuery(this);
        widget.addClass(WPWC.CLS.WPWC_WIDGET);

        widget.find('.widget-title h3, .widget-title h4').prepend(
          '<input type="checkbox" ' + 
            'class="' + WPWC.CLS.CHBX_WIDGET + ' ' + WPWC.CLS.WPWC_WIDGET_PART + '" >'
        );

        /** Add duplication link within each widgets. */
        widget.find('.widget-control-actions').before(
          '<p>' + 
            '<button type="button" ' + 
              'class="button-link ' +
                WPWC.CLS.LINK_DUP_WIDGET + ' ' +
                WPWC.CLS.WPWC_WIDGET_PART + '">' +
  '<?php echo __('Duplicate this widget', 'wp-widget-clipboard');?>' + 
            '</button>' + 
          '</p>'
        );

        widget.trigger(WPWC.EVTYPE.CHANGE_WIDGET);
      });

      jQuery('.' + WPWC.CLS.CHBX_WIDGET).on('click', function(e){
        e.stopPropagation();
      });

      jQuery(document).on('change', '.' + WPWC.CLS.CHBX_WIDGET, function(){
        let copiedWidgetsCheck 
          = jQuery('.' + WPWC.CLS.WIDGETS_COPIED + ' input[type=checkbox]');
        let checkedCnt = jQuery('.' + WPWC.CLS.CHBX_WIDGET + ':checked').length;
        copiedWidgetsCheck.prop('checked', (checkedCnt > 0));
        console.log('copied cnt : ' + checkedCnt);

        WPWC.UpdateClipboard();
      });

      WPWC.UpdateClipboard();

    },

    UpdateClipboard: function(){

      var checkedWidgetCount 
        = jQuery('.' + WPWC.CLS.CHBX_WIDGET + ':checked').length;
      jQuery('.' + WPWC.CLS.WIDGETS_COPIED + ' .' + WPWC.LABEL_COPIED_COUNT)
      .text(
        //'<?php echo __('Copied Widgets', 'wp-widget-clipboard'); ?> ( ' 
          //+ 
          checkedWidgetCount 
          //+ ' )'
      );

    },

    /** Method to execute when the drag of the wpwc widget start. */
    DragStartFromClipboard: function(){
      jQuery('#widgets-right .widgets-holder-wrap')
        .addClass('widget-hover');
    },

    /** Method to execute when the drag of the wpwc widget stops. */
    DragEndFromClipboard: function(){
      jQuery('#widgets-right .widgets-holder-wrap')
        .removeClass('widget-hover');
    },

    /** Copy and return the widget so that it does not overlap ID etc. */
    Clone: function(widget){

      let $widget = widget.clone();

      /// Copy widget hidden id & number values.
      let idBase = $widget.find('input[name="id_base"]').val();
      let wNumber = $widget.find('input[name="widget_number"]').val();
      let mNumber = $widget.find('input[name="multi_number"]').val();
      var highest = 0;


      jQuery('input.widget-id[value|="' + idBase + '"]').each(function() {
        let match = this.value.match(/-(\d+)$/);
        if(match && parseInt(match[1]) > highest)
          highest = parseInt(match[1]);
      });

      let newNum = highest + 1;

      $widget.find('.widget-content').find('input,select,textarea').each(function() {
        let thisAttrName = jQuery(this).attr('name');
        if(thisAttrName)
          jQuery(this).attr('name', thisAttrName.replace(wNumber, newNum));
      });

      // ID creation
      var highest = 0;
      jQuery('.widget').each(function() {
        let match = this.id.match(/^widget-(\d+)/);

        if(match && parseInt(match[1]) > highest)
          highest = parseInt(match[1]);
      });

      let newID = highest + 1;

      // Set widget hidden values.
      $widget[0].id = 'widget-' + newID + '_' + idBase + '-' + newNum;
      $widget.find('input.widget-id').val(idBase +'-'+ newNum);
      $widget.find('input.widget_number').val(newNum);
      $widget.find('.multi_number').val(newNum);

      return $widget;
    },

    Util: {
      isSet: function(v){
        return ! (typeof(v) == 'undefined' || v === null);
      }
    }
  }

  jQuery(WPWC.init);

});
</script>
    <?php /// End script

    do_action( self::ACTION_HOOK_WPWC_INIT );

  }

  /** Render patch script after WPWCUPG is loaded. */
  public function wpwc_patch_script(){

    // Start script ?>
<script>
jQuery(function(){
  if(!window.WPWCUPG){return;}

  jQuery(document).on('dragstart', '.' + WPWCUPG.CLS.WIDGET_FAVO, 
    function(){ 
      WPWC.DragStartFromClipboard(); 
    }
  );
  jQuery(document).on('dragstop', '.' + WPWCUPG.CLS.WIDGET_FAVO, 
    function(){
      WPWC.DragEndFromClipboard();
    }
  );
});
</script>
    <?php /// End script

  }

}

endif;


/** Initialize WPWC */
$WPWC = new WP_Widget_Clipboard();
add_filter( 'init', array( $WPWC, 'init' ));
add_action( 'plugins_loaded', array( $WPWC, 'load_plugin_textdomain' ) );
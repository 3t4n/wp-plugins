<?php
defined( 'ABSPATH' ) || exit;

abstract class Eos_Fdp_Plugins_Manager_Page {

  public $title;
  public $active_plugins = array();
  public $plugins_by_dirs = array();
  public $section_id;
  public $dashicon = false;
  public $button_class;
  public $section_common_class;

  function __construct( $page_slug,$title = '',$dashicon = false ) {
    if( !current_user_can( 'activate_plugins' ) && !current_user_can( 'fdp_plugins_viewer' ) && !defined( 'FDP_EMERGENCY_LOG_ADMIN' ) ){
    ?>
      <h2><?php _e( 'Sorry, you have not the right for this page','eos-dp' ); ?></h2>
      <?php
      return;
    }
    $this->title = $title;
    if( $dashicon ) $this->dashicon = $dashicon;
    $this->section_id = str_replace( '_','-',$page_slug ).'-section';
    $this->active_plugins = $this->get_active_plugins();
    $this->plugins_by_dirs = $this->get_plugins();
    $this->header();
    $this->before_section( $page_slug );
    $this->section( $page_slug );
    $this->footer( $this->button_class );
  }
  abstract function before_section( $page_slug );
  public function section( $page_slug ){
    $nonces = $this->get_nonces_map();
    if( isset( $nonces[$page_slug] ) ){
      wp_nonce_field( $nonces[$page_slug],$nonces[$page_slug] );
    }
    ?>
    <section id="<?php echo esc_attr( $this->section_id ); ?>" class="<?php echo esc_attr( apply_filters( 'fdp_section_class_name','eos-dp-section' ) );echo ' '.esc_attr( $this->section_common_class ); ?>" data-page_slug="<?php echo esc_attr( $page_slug ); ?>">
      <?php do_action( 'eos_dp_before_wrapper' ); ?>
      <div id="eos-dp-wrp">
        <table id="eos-dp-setts"  data-zoom="1"<?php echo $this->dataset; ?>>
          <?php $this->tableHead( $page_slug ); ?>
          <?php $this->tableBody( $page_slug ); ?>
        </table>
      </div>
    </section>
    <?php
  }
  //Settings page header
  public function header(){
    require_once EOS_DP_PLUGIN_DIR.'/admin/templates/partials/eos-dp-navigation.php';
    eos_dp_alert_plain_permalink();
    if( !isset( $_GET['export_file'] ) ){
      eos_dp_navigation();
    }
  }
  //Settings page footer
  public function footer( $button_class ){
    require_once EOS_DP_PLUGIN_DIR.'/admin/templates/partials/eos-dp-footer.php';
    if( current_user_can( 'activate_plugins' ) ){
      eos_dp_save_button( $this->$button_class );
    }
  }

  public function get_plugins(){
    $plugin_root = WP_PLUGIN_DIR;
  	// Files in wp-content/plugins directory
  	$plugins_dir = @ opendir( $plugin_root);
  	$plugin_files = array();
  	if ( $plugins_dir ) {
  		while (($file = readdir( $plugins_dir ) ) !== false ) {
  			if ( substr($file, 0, 1) == '.' || strpos( '_'.$file,'freesoul-deactivate-plugins' ) > 0 ) continue;
  			if ( is_dir( $plugin_root.'/'.$file ) ) {
  				$plugins_subdir = @ opendir( $plugin_root.'/'.$file );
  				if ( $plugins_subdir ) {
  					while (($subfile = readdir( $plugins_subdir ) ) !== false ) {
  							if ( substr($subfile, 0, 1) == '.' )
  									continue;
  							if ( substr($subfile, -4) == '.php' )
  									$plugin_files[] = "$file/$subfile";
  					}
  					closedir( $plugins_subdir );
  				}
  			}
  			else {
  				if( substr($file, -4) == '.php' ) $plugin_files[] = $file;
  			}
  		}
  		closedir( $plugins_dir );
  	}
  	if ( empty( $plugin_files ) ) return array();
  	foreach ( $plugin_files as $plugin_file ) {
  		if ( !is_readable( "$plugin_root/$plugin_file" ) ) continue;
  		$plugins[plugin_basename( $plugin_file )] = 1;
  	}
  	uasort( $plugins,'eos_dp_sort_uname_callback' );
  	return apply_filters( 'eos_dp_get_plugins',$plugins );
  }
  public function get_active_plugins(){
    $active = array_unique( get_option( 'active_plugins',array() ) );
    unset( $active[array_search( EOS_DP_PLUGIN_BASE_NAME,$active )] );
    if( defined( 'EOS_DP_PRO_PLUGIN_BASE_NAME' ) ){
      unset( $active[array_search( EOS_DP_PRO_PLUGIN_BASE_NAME,$active )] );
    }
    $active = array_values( $active );
    $n = 0;
    foreach( $active as $v ){
      if( false === strpos( $v,'/' ) ){
        unset( $active[$n] );
      }
      ++$n;
    }
    return apply_filters( 'eos_dp_active_plugins',array_values( $active ) );
  }
  abstract function get_nonces_map();
  abstract public function tableBody( $page_slug );
}

<?php
defined( 'ABSPATH' ) || exit;

abstract class Eos_Fdp_Matrix_Page extends Eos_Fdp_Plugins_Manager_Page {

  public $gpsi_url = 'https://developers.google.com/speed/pagespeed/insights/';
  public $dataset = '';

  //Settings page header
  public function header(){
    require_once EOS_DP_PLUGIN_DIR.'/admin/templates/partials/eos-dp-navigation.php';
    eos_dp_alert_plain_permalink();
    eos_dp_navigation();
  }
  //Settings page footer
  public function footer( $button_class ){
    require_once EOS_DP_PLUGIN_DIR.'/admin/templates/partials/eos-dp-footer.php';
    if( current_user_can( 'activate_plugins' ) ){
      eos_dp_save_button( $button_class );
    }
  }
  //Head of the matrix including the plugins
  public function tableHead(){
    $plugins = $this->get_plugins();
  	$GLOBALS['eos_dp_plugins_by_dirs'] = $plugins;
  	$active_plugins = $this->active_plugins;
  	?>
  	<tr id="eos-dp-table-head">
  		<th class="fdp-legend" style="vertical-align:bottom;border-style:none;text-align:initial;padding-left:20px;margin-left:-20px">
  			<?php do_action( 'fdp_table_head_first_col' ); ?>
  			<?php do_action( 'fdp_table_head_first_col_'.esc_attr( $_GET['page'] ) ); ?>
  			<?php $this->legend(); ?>
  		</th>
  		<?php
  		$n = 0;
  		$fdp = array();
  		foreach( $active_plugins as $p ){
  			if( isset( $plugins[$p] ) ){
  				$plugin = $plugins[$p];
  				$plugin_name = strtoupper( str_replace( '-',' ',dirname( $p ) ) );
  				$plugin_name_short = substr( $plugin_name,0,28 );
  				$plugin_name_short = $plugin_name === $plugin_name_short ? $plugin_name : $plugin_name_short.' ...';
  				$details_url = add_query_arg(
  					array(
  						'tab' => 'plugin-information',
  						'plugin' => dirname( $p ),
  						'TB_iframe' => true,
  						'eos_dp' => $p,
  						'eos_dp_info' => 'true'
  					),
  					admin_url( 'plugin-install.php' )
  				);
  				?>
  				<th class="eos-dp-name-th"<?php echo isset( $_GET['int_plugin'] ) && dirname( $p ) === $_GET['int_plugin'] ? ' style="display:none"' : ''; ?>>
  					<div>
  						<div id="eos-dp-plugin-name-<?php echo $n + 1; ?>" class="eos-dp-plugin-name" title="<?php echo esc_attr( $plugin_name ); ?>" data-path="<?php echo $p; ?>">
  							<span><a title="<?php printf( esc_attr__( 'View details of %s','eos-dp' ),esc_attr( $plugin_name ) ); ?>" href="<?php echo esc_url( $details_url ); ?>" target="_blank"><?php echo esc_html( $plugin_name_short ); ?></a></span>
  						</div>
  						<div class="eos-dp-global-chk-col-wrp">
  							<div class="eos-dp-not-active-wrp"><input title="<?php printf( __( 'Activate/deactivate %s everywhere','eos-dp' ),esc_attr( $plugin_name ) ); ?>" data-col="<?php echo $n + 1; ?>" class="eos-dp-global-chk-col" type="checkbox" /></div>
  							<?php do_action( 'eos_dp_table_head_col_after' ); ?>
  						</div>
  						<div class="fdp-p-n"><?php echo $n + 1; ?></div>
  					</div>
  				</th>
  				<?php
  				++$n;
  			}
  		}
  		do_action( 'eos_dp_after_table_head_columns' ); ?>
  	</tr>
    <?php
    $this->slider();
  }
  //Slide to scroll plugins on the table
  public function slider( $class_name = '' ){
  	?>
  	<tr class="fdp-slide-row<?php echo '' !== $class_name ? ' '.esc_attr( $class_name ) : ''; ?>" style="border:none;box-shadow:none">
      <td style="border:none;box-shadow:none">
        <div class="fdp-plugins-slider-wrp">
      		<input class="fdp-plugins-slider hover" style="margin:10px 0 0 0" type="range" min="0" max="<?php echo esc_attr( $GLOBALS['fdp_plugins_count'] ); ?>" value="0">
      	</div>
      </td>
      <td style="border:none;box-shadow:none" colspan="<?php echo esc_attr( $GLOBALS['fdp_plugins_count'] ); ?>"></td>
    </tr>
  	<?php
  }

  public function get_plugins_table(){
    return apply_filters( 'eos_dp_plugins_table',eos_dp_plugins_table() );
  }
  public function action_buttons( $page_slug ){
    require_once EOS_DP_PLUGIN_DIR.'/admin/templates/partials/eos-dp-action-buttons.php';
  }
  public function get_nonces_map(){
    return array(
      'eos_dp_menu' => 'eos_dp_setts',
      'eos_dp_by_post_type' => 'eos_dp_pt_setts',
      'eos_dp_by_archive' => 'eos_dp_arch_setts',
      'eos_dp_by_term_archive' => 'eos_dp_arch_setts',
      'eos_dp_url' => 'eos_dp_url_setts',
      'eos_dp_admin' => 'eos_dp_admin_setts',
      'eos_dp_admin_url' => 'eos_dp_admin_url_setts'
    );
  }
  public function legend(){
    return;
  }
  abstract public function tableBody( $page_slug );
}

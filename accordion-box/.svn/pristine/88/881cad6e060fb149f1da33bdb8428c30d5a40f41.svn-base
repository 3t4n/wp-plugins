<?php
defined( 'ABSPATH' ) or die();

if( !class_exists('CDLZR_ACC_BOX_MENU')){
	class CDLZR_ACC_BOX_MENU{

		public static function cdlzr_accbox_create_menu(){
			/* Create Menu */
			global $submenu;
	 		add_menu_page( __('Accordion Box', CDLZR_PLUG_ACORD_DOM ), __('Accordion Box', CDLZR_PLUG_ACORD_DOM ), 'manage_options', 'cdlzr_acc_box', array( 'CDLZR_ACC_BOX_MENU', 'accbox_cpt' ), esc_url(CDLZR_ACORD_URL.'assets/logo/menu.png'), '10');

	 		add_submenu_page( 'cdlzr_acc_box', __('Add Accordion', CDLZR_PLUG_ACORD_DOM ) , __('Add Accordion', CDLZR_PLUG_ACORD_DOM ), 'manage_options', 'post-new.php?post_type=cdlzr_accrodion_box',null );

	 		$submenu['cdlzr_acc_box'][0][0] = "All Accordion Box";

	 		$morefreeplugs = add_submenu_page( 'cdlzr_acc_box', __('More Free Plugins', CDLZR_PLUG_ACORD_DOM ) , __('More Free Plugins', CDLZR_PLUG_ACORD_DOM ), 'manage_options', 'cldzr_more_freeplugs', array( 'CDLZR_ACC_BOX_MENU', 'free_plugs_menu' )   );
	 		add_action( 'admin_print_styles-' . $morefreeplugs, array( 'CDLZR_ACC_BOX_MENU', 'enqcssjs' ) );

	 		$freediffpro = add_submenu_page( 'cdlzr_acc_box', __('Free vs Pro', CDLZR_PLUG_ACORD_DOM ) , __('Free vs Pro', CDLZR_PLUG_ACORD_DOM ), 'manage_options', 'cldzr_freediffpro', array( 'CDLZR_ACC_BOX_MENU', 'freediffpro_menu' )   );
	 		add_action( 'admin_print_styles-' . $freediffpro, array( 'CDLZR_ACC_BOX_MENU', 'enqcssjs' ) );

	 		$go_pro = add_submenu_page( 'cdlzr_acc_box', __('Upgrade To Pro', CDLZR_PLUG_ACORD_DOM ) , __('Upgrade To Pro', CDLZR_PLUG_ACORD_DOM ), 'manage_options', 'accbox_upgpro', array( 'CDLZR_ACC_BOX_MENU', 'upgtopro_submenu' )   );
	 		add_action( 'admin_print_styles-' . $go_pro, array( 'CDLZR_ACC_BOX_MENU', 'enqcssjs' ) );	

	 		$submenu['cdlzr_acc_box'][0][0] = "All Accordion Box";
			
		}

		public static function accbox_cpt(){
			$cpt_url = home_url()."/wp-admin/edit.php?post_type=cdlzr_accrodion_box";
			?>
			<script type="text/javascript">
				window.location.replace('<?php echo $cpt_url; ?>');
			</script>
			<?php
		}

		public static function upgtopro_submenu(){
			require_once( CDLZR_ACORD_PLUGIN_DIR_PATH . 'admin/upg_to_pro.php' );			
		}

		public static function enqcssjs(){
			wp_enqueue_style( 'bootstrap_css', CDLZR_ACORD_URL . 'admin/assets/css/bootstrap.min.css'  );
			wp_enqueue_style('fontawesome_css', CDLZR_ACORD_URL . 'admin/assets/css/fontawesome/css/all.min.css');	
			wp_enqueue_style('help_css', CDLZR_ACORD_URL . 'admin/assets/css/plugshelp.css');	
			wp_enqueue_style('pricingtbl_css', CDLZR_ACORD_URL . 'admin/assets/css/pricingtbl.css');
		}

		public static function free_plugs_menu(){
			require_once( CDLZR_ACORD_PLUGIN_DIR_PATH . 'admin/ourfreeplugs.php' );	
		}

		public static function freediffpro_menu(){
			require_once( CDLZR_ACORD_PLUGIN_DIR_PATH . 'admin/freediffpro.php' );	
		}
	}
}

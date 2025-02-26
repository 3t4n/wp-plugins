<?php

if( ! class_exists( 'MenuManagement' ) ){
	
	class MenuManagement extends AdminPress{
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		public $menus;
		
		public function __construct() {
			global $adminPress, $menu, $submenu;
			//parent::__construct();
			if( $adminPress ) {
				$this->plugin_dir = $adminPress->plugin_dir;
		        $this->plugin_url = $adminPress->plugin_url;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
			}
			
			add_filter( 'adminpress_form', array( $this, 'MenuManagement_style_form' ), 14 );
			add_action( 'admin_menu', array( $this, 'rename_plugin_menu' ) );
			add_filter( 'custom_menu_order', array( $this, 'custom_menu_order' ), 1001 );
			add_filter( 'menu_order', array( $this, 'custom_menu_order' ), 1001 );
			
			
			
		}
		
		public function rename_plugin_menu() {
			global $menu;
			
			if( isset( $this->options['menu_rename'] ) ) {
				$ren = $this->options['menu_rename'];
				
				foreach ( $menu as $n => $item ){
					foreach( $ren as $k => $v ){
						if( $item[2] == $k && $v != '' ){
							$menu[$n][0] = $v;
						}
					}
				}
			}
			
			$this->menus = $menu;
			foreach( $this->menus as $m ){
				if( isset( $this->options['hide_menu'][$m[2]] ) && $this->options['hide_menu'][$m[2]] == 'on' ){
					remove_menu_page( $m[2] );
				}
			}
			
			
		}
		
		public function custom_menu_order( $menu_ord ) {
			if (!$menu_ord) return true;
       		return isset( $this->options['menu_order'] ) ? $this->options['menu_order'] : $menu_ord;
		}
		
		public function MenuManagement_style_form( $form ) {
			
			ob_start();
		
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Menu Management', 'admp' ) ?></span></h3>
				<div class="inside">
					<?php
					global $menu;
					?>
					<table class="form-table">
						<tr>
							<th><?php _e( 'Manage your menus', 'admp' ) ?></th>
							<td>
				                <ul class="admin_menu_list">
				                	<?php foreach( $this->menus as $menuItem ){ ?>
				                	<?php if( isset( $menuItem[0] ) && $menuItem[0] != '' ) { ?>
				                	<li>
				                		<input type="hidden" name="admp[menu_order][]" value="<?php echo $menuItem[2] ?>" />
				                		<span class="menu-name">
				                			<?php echo $menuItem[0] ?>
				                			<i class="fa fa-arrows"></i>
				                		</span>
				                		<div class="menu_inner">
				                			<input type="text" name="admp[menu_rename][<?php echo $menuItem[2] ?>]" value="<?php echo isset( $this->options['menu_rename'][$menuItem[2]] ) ? $this->options['menu_rename'][$menuItem[2]] : '' ?>" placeholder="<?php echo _e( 'Rename Menu', 'admp' ) ?>" /><br><br>
				                			<input <?php echo isset( $this->options['hide_menu'][$menuItem[2]] ) && $this->options['hide_menu'][$menuItem[2]] == 'on' ? 'checked="checked"' : '' ?> type="checkbox" name="admp[hide_menu][<?php echo $menuItem[2] ?>]" /> <?php _e( 'Hide this menu', 'admp' ) ?>
				                		</div>
				                	</li>
				                	<?php } ?>
				                	<?php } ?>
				                </ul>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php
			$output = $form . ob_get_contents();
			ob_end_clean();
			return $output; 
		}
		
	}
	
	new MenuManagement();
	
}

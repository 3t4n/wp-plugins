<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Settings_Customize{
	public function __construct(){
        add_action( 'booknow_before_form_settings_tab', array( $this, 'add_tab' ),99,2 );
        add_action( 'booknow_before_form_settings', array( $this, 'add_form' ),10,2 );
    }
    function add_tab($datas,$install){
		 	?>
		 <li data-tab='.booknow-tab-main-customize'><?php esc_html_e("Customize","booknow") ?></li>
		 	<?php
    }
    function add_form($datas,$install){
    	?>
    	<div class="booknow-tab-main booknow-tab-main-customize hidden">
  	         <div class="calculation_forms_settings_title"><?php esc_html_e("Customize","booknow") ?></div>
		    <table class="form-table">
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Color Options","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_color">
			        			<div class="booknow_settings_container_color_inner">
			        				<input name="booknow_settings[color][primary]" type="text" class="booknow_color_picker" value="<?php echo esc_attr($datas["color"]["primary"]) ?>" />
			        				<div><?php esc_html_e("Primary","booknow") ?></div>
			        			</div>
			        			<div class="booknow_settings_container_color_inner">
			        				<input name="booknow_settings[color][title]" type="tex" class="booknow_color_picker" value="<?php echo esc_attr($datas["color"]["title"]) ?>" />
			        				<div><?php esc_html_e("Title","booknow") ?></div>
			        			</div>
			        			<div class="booknow_settings_container_color_inner">
			        				<input name="booknow_settings[color][content]" type="tex" class="booknow_color_picker" value="<?php echo esc_attr($datas["color"]["content"]) ?>" />
			        				<div><?php esc_html_e("Content","booknow") ?></div>
			        			</div>
			        		</div>
			        		
			        	</div>
			        </td>
		        </tr>
		    </table>
		    <?php
		    if($install) {
		    	?>
		    <div class="booknow_settings_nav">
		    	<div class="booknow_settings_nav_prev">
		    		<a data-tab=".booknow-tab-main-staff" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Prev","booknow") ?></a>
		    	</div>
		    	<div class="booknow_settings_nav_next">
		    		<?php submit_button(); ?>
		    	</div>
		    </div>	
		    	<?php
		    } else{
		    	submit_button();	
		    }
		    ?>
		</div>
	<?php
    }
}
new Booknow_Settings_Customize;
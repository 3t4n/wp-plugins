<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Settings_Holidays{
	public function __construct(){
        add_action( 'booknow_before_form_settings_tab', array( $this, 'add_tab' ),10,2 );
        add_action( 'booknow_before_form_settings', array( $this, 'add_form' ),10,2 );
    }
    function add_tab($datas,$install){
		if(!$install) { 
		 	?>
		 <li data-tab='.booknow-tab-main-holidays'><?php esc_html_e("Holidays","booknow") ?></li> 	
		 	<?php
		 }
    }
    function add_form($datas,$install){
    	?>
    	<div class="booknow-tab-main booknow-tab-main-holidays hidden">
		    <div class="calculation_forms_settings_title"><?php esc_html_e("Holidays","booknow") ?></div>
		    <table class="form-table">
		      <tr valign="top">
			        <th scope="row"><?php esc_html_e("Holidays","booknow") ?> </th>
			        <td class="booknow_settings_container_add_holidays">
			        	<?php if( !isset($datas["holidays"]) ||count($datas["holidays"]) < 1){
			        		$holidays = array("");
			        	}else{
			        		$holidays = $datas["holidays"];
			        	}
			        	foreach($holidays as $holiday){
			        	 ?>
			        	
			        	<div class="booknow_settings_container_add_holidays_inner">
			        		<input name="booknow_settings[holidays][]" class="regular-text" type="date" value="<?php echo esc_attr($holiday) ?>" />
			        	    <a href="#"><?php esc_html_e("Remove","booknow") ?></a>
			        	</div>
			        <?php } ?>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"></th>
			        <td>
			        	<a href="#" class="button booknow-button-add-holiday"><?php esc_html_e("Add Holiday", "booknow") ?></a>
			        </td>
		        </tr>
		    </table>
		   <?php submit_button(); ?>
		</div>
	<?php
    }
}
new Booknow_Settings_Holidays;
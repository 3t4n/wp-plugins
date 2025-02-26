<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Settings_Install{
	public function __construct(){
        add_action( 'booknow_before_form_settings_tab', array( $this, 'add_tab' ),15,2 );
        add_action( 'booknow_before_form_settings', array( $this, 'add_form' ),10,2 );
    }
    function add_tab($datas,$install){
		if($install) { 
		 	?>
		  <li data-tab='.booknow-tab-main-service'><?php esc_html_e("Service","booknow") ?></li>
	      <li data-tab='.booknow-tab-main-staff'><?php esc_html_e("Staff","booknow") ?></li>	
		 	<?php
		 }
    }
    function add_form($datas,$install){
    	?>
    	<div class="booknow-tab-main booknow-tab-main-service hidden">
		    <div class="calculation_forms_settings_title"><?php esc_html_e("Service","booknow") ?></div>
		    <table class="form-table">
		      <tr valign="top">
			        <th scope="row"><?php esc_html_e("Service Name","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[service][name]" class="regular-text" placeholder="Service Name" type="text" />
			        		</div>
			        	</div>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Price","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[service][price]" class="small-text" type="number" value="10" />$
			        		</div>
			        	</div>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Duration","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[service][duration]" class="small-text" type="number" value="30" /> <?php esc_html_e("Minutes","booknow") ?>
			        		</div>
			        	</div>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Max Capacity","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[service][max_capacity]" class="small-text" type="number" value="1" />
			        		</div>
			        	</div>
			        </td>
		        </tr>
		    </table>
		    <div class="booknow_settings_nav">
		    	<div class="booknow_settings_nav_prev">
		    		<a data-tab=".booknow-tab-main-working-hours" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Prev","booknow") ?></a>
		    	</div>
		    	<div class="booknow_settings_nav_next">
		    		<a data-tab=".booknow-tab-main-staff" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Next","booknow") ?></a>
		    	</div>
		    </div>
		</div>
		<div class="booknow-tab-main booknow-tab-main-staff hidden">
		         <div class="calculation_forms_settings_title"><?php esc_html_e("Staff","booknow") ?></div>
		    <table class="form-table">
		      <tr valign="top">
			        <th scope="row"><?php esc_html_e("First Name","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[staff][first_name]" class="regular-text" placeholder="First Name" type="text" />
			        		</div>
			        	</div>
			        </td>
		        </tr>
		       <tr valign="top">
			        <th scope="row"><?php esc_html_e("Last Name","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[staff][last_name]" class="regular-text" placeholder="Last Name" type="text" />
			        		</div>
			        	</div>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Email","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[staff][email]" class="regular-text" type="text" placeholder="Email" />
			        		</div>
			        	</div>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Description","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<textarea name="booknow_settings[staff][des]" class="regular-text"><?php esc_html_e("Cheerful Enthusiasm","booknow") ?></textarea>
			        		</div>
			        	</div>
			        </td>
		        </tr>
		    </table>
		    <div class="booknow_settings_nav">
		    	<div class="booknow_settings_nav_prev">
		    		<a data-tab=".booknow-tab-main-service" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Prev","booknow") ?></a>
		    	</div>
		    	<div class="booknow_settings_nav_next">
		    		<a data-tab=".booknow-tab-main-customize" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Next","booknow") ?></a>
		    	</div>
		    </div>
		</div>
	<?php
    }
}
new Booknow_Settings_Install;
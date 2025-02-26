<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Settings_General{
	public function __construct(){
        add_action( 'booknow_before_form_settings_tab', array( $this, 'add_tab' ),1,2 );
        add_action( 'booknow_before_form_settings', array( $this, 'add_form' ),10,2 );
    }
    function add_tab($install){
    	?>
    	 <li class="active" data-tab='.booknow-tab-main-general'><?php esc_html_e("General","booknow") ?></li>
    	<?php
    }
    function add_form($datas,$install){
    	?>
    	<div class="booknow-tab-main booknow-tab-main-general">
    	<div class="calculation_forms_settings_title"><?php esc_html_e("General Settings","booknow") ?></div>
		    <table class="form-table">
		       <tr valign="top">
			        <th scope="row"><?php esc_html_e("Default Time Slot Step:","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[time_slot]" class="small-text" type="number" value="<?php echo esc_attr($datas["time_slot"]) ?>" /> <?php esc_html_e("Minutes","booknow") ?>
			        		</div>
			        	</div>
			        </td>
		        </tr>
		       <tr valign="top">
			        <th scope="row"><?php esc_html_e("Minimum time required before booking:","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[before_booking]" class="small-text" type="number" value="<?php echo esc_attr($datas["before_booking"]) ?>" /> <?php esc_html_e("Minutes","booknow") ?>
			        		</div>
			        		
			        	</div>
			        </td>
		        </tr>
		       <tr valign="top">
			        <th scope="row"><?php esc_html_e("Max Capacity:","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[max_capacity]" class="small-text" type="number" value="<?php echo esc_attr($datas["max_capacity"]) ?>" />
			        		</div>
			        		
			        	</div>
			        </td>
		        </tr>
		       <tr valign="top">
			        <th scope="row"><?php esc_html_e("Date Format:","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<select name="booknow_settings[date_format]" class="small-text booknow_select2">
			        			<option value="F j, Y"><?php esc_html_e("F j, Y","booknow") ?></option>
			        			<option <?php selected("Y-m-d",$datas["date_format"]) ?> value="Y-m-d"><?php esc_html_e("Y-m-d","booknow") ?></option>
			        			<option <?php selected("m/d/Y",$datas["date_format"]) ?> value="m/d/Y"><?php esc_html_e("m/d/Y","booknow") ?></option>
			        			<option <?php selected("d/m/Y",$datas["date_format"]) ?> value="d/m/Y"><?php esc_html_e("d/m/Y","booknow") ?></option>
			        			<option <?php selected("d.m.Y",$datas["date_format"]) ?> value="d.m.Y"><?php esc_html_e("d.m.Y","booknow") ?></option>
			        			<option <?php selected("d-m-Y",$datas["date_format"]) ?> value="d-m-Y"><?php esc_html_e("d-m-Y","booknow") ?></option>
			        		</select>
			        		
			        	</div>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Default Time Format:","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<select name="booknow_settings[time_format]" class="small-text booknow_select2">
			        			<option value="12"><?php esc_html_e("12 Hour","booknow") ?></option>
			        			<option <?php selected(24,$datas["time_format"]) ?> value="24"><?php esc_html_e("24 Hour","booknow") ?></option>
			        		</select>
			        	</div>
			        </td>
		        </tr>
		        <tr valign="top">
			        <th scope="row"><?php esc_html_e("Save Appointments","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<div class="booknow_settings_container_holiday">
			        			<?php 
			        				if( isset($datas["save_appointments"]) && $datas["save_appointments"] == "yes"){
			        					$save_appointments = "yes";
			        				}else{
			        					$save_appointments = "no";
			        				}
			        			?>
			        			<input name="booknow_settings[save_appointments]" <?php checked($save_appointments,"yes") ?>  type="checkbox" value="yes" /> <?php esc_html_e("Save Appointments","booknow") ?>
			        		</div>
			        	</div>
			        </td>
			    </tr>
			        <th scope="row"><?php esc_html_e("Save Customers","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<?php 
			        				if( isset($datas["save_customers"]) && $datas["save_customers"] == "yes"){
			        					$save_customers = "yes";
			        				}else{
			        					$save_customers = "no";
			        				}
			        			?>
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[save_customers]" <?php checked($save_customers,"yes") ?> type="checkbox" value="yes" /> <?php esc_html_e("Save Customers","booknow") ?>
			        		</div>
			        	</div>
			        </td>
		        </tr>
		        </tr>
			        <th scope="row"><?php esc_html_e("Create user","booknow") ?> </th>
			        <td>
			        	<div class="booknow_settings_container_holidays">
			        		<?php 
			        				if( isset($datas["save_user"]) && $datas["save_user"] == "yes"){
			        					$save_user = "yes";
			        				}else{
			        					$save_user = "no";
			        				}
			        			?>
			        		<div class="booknow_settings_container_holiday">
			        			<input name="booknow_settings[save_user]" <?php checked($save_user,"yes") ?> type="checkbox" value="yes" /> <?php esc_html_e("Create user after saving customers","booknow") ?>
			        		</div>
			        	</div>
			        </td>
		        </tr>
		    </table>
		    <?php
		    if($install) {
		    	?>
		    	<input name="booknow_settings[wizard]" class="small-text" type="hidden" value="ok" /> 
		    <div class="booknow_settings_nav">
		    	<div class="booknow_settings_nav_prev">
		    		
		    	</div>
		    	<div class="booknow_settings_nav_next">
		    		<a data-tab=".booknow-tab-main-working-hours" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Next","booknow") ?></a>
		    	</div>
		    </div>	
		    	<?php
		    } else{
		    	do_action( "booknow_settings_general");
		    	submit_button();	
		    }
		      ?>
		</div>
	<?php
    }
}
new Booknow_Settings_General;
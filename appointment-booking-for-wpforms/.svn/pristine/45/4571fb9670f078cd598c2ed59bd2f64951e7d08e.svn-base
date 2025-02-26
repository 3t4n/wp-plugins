<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Booknow_Settings_Working_Hours{
	public function __construct(){
        add_action( 'booknow_before_form_settings_tab', array( $this, 'add_tab' ),5,2 );
        add_action( 'booknow_before_form_settings', array( $this, 'add_form' ),10,2 );
    }
    function add_tab($datas,$install){
    	?>
    	 <li data-tab='.booknow-tab-main-working-hours'><?php esc_html_e("Working Hours","booknow") ?></li>
    	<?php
    }
    function add_form($datas,$install){
    	?>
    	<div class="booknow-tab-main booknow-tab-main-working-hours hidden">
		    <div class="calculation_forms_settings_title"><?php esc_html_e("Working Hours","booknow") ?></div>
		    <table class="form-table">
		      <?php 
		      $weeks = Booknow_Functions::get_week();
		      foreach($weeks as $key => $week ){
		      ?>
		      <tr valign="top">
			        <th scope="row"><?php echo esc_html($week) ?> </th>
			        <td>
			        	<?php
			        	if( isset($datas["working_hours"][$key]) ){
			        		$times = $datas["working_hours"][$key];
			        	}else {
			        		if($key == 0 || $key == 6 ){
			        			$times = array(
				        			"start"=>array("off"),
				        			"end"=>array("off")
				        		);
			        		}else{
			        			
				        		$times = array(
				        			"start"=>array("09:00"),
				        			"end"=>array("17:00")
				        		);
			        		}
			        	}
		    			foreach( $times["start"] as $start_key => $start_value ){
		    				if($start_key == 0 ){
		    			?>
			        	<div class="booknow_settings_container_working_hours">
			        		<div class="booknow_settings_container_working_hours-content">
			        			<?php Booknow_Settings_Backend::select_time("booknow_settings[working_hours][".$key."][start][]",$start_value) ?> -- 
			        	        <?php Booknow_Settings_Backend::select_time("booknow_settings[working_hours][".$key."][end][]",$times["end"][$start_key]) ?>
			        		</div>
			        		<a href="#" class="button booknow-button-addbreak"><?php esc_html_e("Add Break", "booknow") ?></a>
			        	</div>
			        <?php }else{ ?>
			        	<div class="booknow_settings_container_working_hours_add">
			        		<?php Booknow_Settings_Backend::select_time("booknow_settings[working_hours][".$key."][start][]",$start_value) ?> -- 
			        	        <?php Booknow_Settings_Backend::select_time("booknow_settings[working_hours][".$key."][end][]",$times["end"][$start_key]) ?>
			        	    <a href="#"><?php esc_html_e("Remove","booknow") ?></a>
			        	</div>
			        	<?php }} ?>
			        </td>
		       </tr>
		       <?php } ?>
		      
		    </table>
		    <?php
		    if($install) {
		    	?>
		    <div class="booknow_settings_nav">
		    	<div class="booknow_settings_nav_prev">
		    		<a data-tab=".booknow-tab-main-general" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Prev","booknow") ?></a>
		    	</div>
		    	<div class="booknow_settings_nav_next">
		    		<a data-tab=".booknow-tab-main-service" href="#" class="button button-primary booknow_settings_nav_button"><?php esc_html_e("Next","booknow") ?></a>
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
new Booknow_Settings_Working_Hours;
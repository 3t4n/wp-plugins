<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Booknow_Settings_Backend
{
    public function __construct(){
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }
    function add_plugin_page(){
		add_submenu_page('booknow',esc_html__("Settings","booknow") , esc_html__("Settings","booknow"), 'manage_options','booknow-settings', array($this,'settings_page_render_load')  );
		add_action( 'admin_init', array($this,'register_settings') );
	}
	function register_settings(){
		register_setting( 'booknow_settings', 'booknow_settings',array( $this, 'sanitize' )  );

	}
	function sanitize( $input ){
		if( isset($input["wizard"]) && $input["wizard"] =="ok")  {
			if( get_option("booknow_wizard") == "done"){
				return $input;
			}
			update_option( "booknow_wizard", "done");
			$service = $input["service"];
			$staff = $input["staff"];
			unset($input["service"]);
			unset($input["staff"]);
			update_option( "booknow_wizard", "done");
			$service_name = $service["name"];
			if($service_name == ""){
				$service_name = "Service Demo";
			}
			$service_post = array(
			  'post_title'    => wp_strip_all_tags( $service_name),
			  'post_type'  => 'booknow_services',
			  'post_status'   => 'publish',
			  'meta_input' =>array(
			  		"_booknow_services"=>array(
			  			"name"=>$service_name,
			  			"price"=>$service["price"],
			  			"duration"=>$service["duration"],
			  			"max_capacity"=>$service["max_capacity"],
			  			"description"=>'',
			  		)
			  	)
			);
			$post_id_service = wp_insert_post( $service_post);
			$first_name = $staff["first_name"];
			$last_name = $staff["last_name"];
			if($first_name == ""){
				$first_name = "First Name";
			}
			if($last_name == ""){
				$last_name = "last Name";
			}

			$staff_post = array(
			  'post_title'    => wp_strip_all_tags( $last_name ." ". $first_name),
			  'post_type'  => 'booknow_staffs',
			  'post_status'   => 'publish',
			  'meta_input' =>array(
			  		"_booknow_staffs"=>array(
			  			"first_name"=>$first_name,
			  			"last_name"=>$last_name,
			  			"email"=>$staff["email"],
			  			"des"=>$staff["des"],
			  			"phone"=>'',
			  			"note"=>'',
			  		),
			  		"_booknow_staffs_services"=>array($post_id_service)
			  	)
			);
			$post_id_staff = wp_insert_post( $staff_post);
			do_action("Booknow_install_done",$input);
			return $input;
		}else{
			return $input;
		}
    }

	function settings_page_render_load(){
		Booknow_Settings_Backend::settings_page_render();
	}
	public static function settings_page_render($install = false){
		$default = array(
			"time_slot"=>30,
			"before_booking"=>60,
			"max_capacity"=>5,
			"date_format"=>"",
			"time_format"=>"F j, Y",
			"save_appointments"=>"yes",
			"save_customers"=>"yes",
			"save_user" => "no",
			"currency"=>"USD",
			"color"=>array("primary"=>"#12D488","title"=>"#222222","content"=>"#777777"),
			"holidays"=>array(),

		);
		$datas = get_option("booknow_settings",$default);
		
		?>
		<div class="booknow-container-settings">
			<div class="booknow-tabs">
	          <ul>
	             <?php do_action("booknow_before_form_settings_tab",$datas,$install) ?>
	          </ul>
	      </div>
	      <div class="booknow-tab-content">
	      	<form method="post" action="options.php">
			<?php settings_fields( 'booknow_settings' ); ?>
			<?php do_settings_sections( 'booknow_settings' ); 
			if($install) { 
				?>
				<input type="hidden" name="_wp_http_referer" value="<?php echo admin_url( 'admin.php?page=booknow-settings-informations&booknow_done=1' )  ?>">
				<?php
			}
			?>
	             <?php do_action( "booknow_before_form_settings", $datas,$install ) ?>
				</form>
	        </div>
	    </div>
					<?php
	}
	public static function select_time($name = "",$value=""){
		?>
		<select name="<?php echo esc_attr($name) ?>" class="booknow_select2">
            <option value="off"><?php esc_html_e("Off","booknow") ?></option>
			<?php
			$lists = Booknow_Functions::get_time_slot();
			foreach( $lists as $list){
				?>
				<option <?php selected($value,$list["key"]) ?> value="<?php echo esc_attr($list["key"]) ?>"><?php echo esc_attr($list["value"]) ?></option>
				<?php
			}
			 ?>
		</select>
		<?php
	}
}
new Booknow_Settings_Backend;
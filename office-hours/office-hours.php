<?php
	/*
	Plugin Name: Office Hours
	Plugin URI: http://wp.sk/
	Description: Plugin for setting and showing opening hours.
	Version: 1.1.1
	Author: Webikon (Marek Čačko)
	Author URI: http://www.webikon.sk/
	License: GPL2
	*/
	class OpeningHours{
		
		var $plugginFile = __FILE__;
		
		function __construct(){
			load_plugin_textdomain( 'opening_hours', false, basename( dirname( __FILE__ ) ) . '/languages' );
			$this->_add_hooks();
		}
	
		private function _add_hooks(){
			include( 'adminpanel.php' );
			add_action( 'admin_menu' , array( &$this, 'admin_menu' ) );
			include( 'settings.php' );
			add_action( 'admin_init' , 'openinghour_settings_api_init' );
			include ( 'schedule.php' );
			add_action( 'widgets_init', create_function('', 'return register_widget("OpeningHours_Schedule");') );
			include ( 'today.php' );
			add_action( 'widgets_init', create_function('', 'return register_widget("OpeningHours_Today");') );
			add_shortcode( 'OpeningHours_schedule', array( &$this, 'show_schedule' ) );	
			add_action( 'admin_footer', array( $this, 'admin_footer' ));
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ));
		}
		
		function admin_menu(){
			add_options_page( __( 'Office Hours' ), __( 'Office Hours' ), 'edit_themes', 'OpeningHours', 'openinghours_show_settings' ); 
		}
		
		function enqueue_scripts(){
			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-datepicker' );
			
			global $wp_scripts;
			$ui = $wp_scripts->query('jquery-ui-core');
			$url = "https://ajax.aspnetcdn.com/ajax/jquery.ui/{$ui->ver}/themes/ui-lightness/jquery-ui.css";
			wp_enqueue_style( 'jquery-ui-smoothness', $url, false, $ui->ver );


		}
		
		function admin_footer() { ?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery('.input_date').datepicker({
						dateFormat : 'd.m.yy'
					});
				});
			</script><?php
		}
		
		function show_schedule( $atts ){
			extract( shortcode_atts( array(
				'day' => 7,
			), $atts ) );
			if( !is_numeric( $day ) ||$day < 0 ||$day > 6 )
				$day = 7;
			
			$options = get_option( 'openinghour_options' );
		
			
			$ret = "<ul>";
			if($day == 1 || $day == 7){
				if( $options['schedule_mon_work'] )
					$ret = $ret . "<li>Pon: ". $options['schedule_mon_where']. " " . $options['schedule_mon_from'] . " - ". $options['schedule_mon_to'] . "</li>";
				elseif( $work ) 
					$ret = $ret . "<li>Pon: " . $text ."</li>";
			}
			
			if( $day == 2 || $day == 7 ){
				if( $options['schedule_tue_work'] )
					$ret = $ret . "<li>Uto: ". $options['schedule_tue_where']. " " . $options['schedule_tue_from'] . " - ". $options['schedule_tue_to'] . "</li>";
				elseif( $work )
					$ret = $ret . "<li>Uto: " . $text ."</li>";
			}
			
			if($day == 3 || $day == 7){
				if( $options['schedule_wed_work'] )
					$ret = $ret . "<li>Str: ". $options['schedule_wed_where']. " " . $options['schedule_wed_from'] . " - ". $options['schedule_wed_to'] . "</li>";
				elseif( $work )
					$ret = $ret . "<li>Str: " . $text ."</li>";
			}
			
			if( $day == 4 || $day == 7 ){
				if($options['schedule_thu_work'])
					$ret = $ret . "<li>Štv: ". $options['schedule_thu_where']. " " . $options['schedule_thu_from'] . " - ". $options['schedule_thu_to'] . "</li>";
				elseif( $work )
					$ret = $ret . "<li>Štv: " . $text ."</li>";
			}
			
			if( $day == 5 || $day == 7 ){
				if($options['schedule_fri_work'])
					$ret = $ret . "<li>Pia: ". $options['schedule_fri_where']. " " . $options['schedule_fri_from'] . " - ". $options['schedule_fri_to'] . "</li>";
				elseif($work) $ret = $ret . "<li>Pia: " . $text ."</li>";
			}
			
			if( $day == 6 || $day == 7 ){
				if($options['schedule_sat_work'])
					$ret = $ret . "<li>Sob: ". $options['schedule_sat_where']. " " . $options['schedule_sat_from'] . " - ". $options['schedule_sat_to'] . "</li>";
				elseif( $work )
					$ret = $ret . "<li>Sob: " . $text ."</li>";
			}
			
			if( $day == 0 || $day == 7 ){
				if($options['schedule_sun_work'])
					$ret = $ret . "<li>Ned: ". $options['schedule_sun_where']. " " . $options['schedule_sun_from'] . " - ". $options['schedule_sun_to'] . "</li>";
				elseif( $work )
					$ret = $ret . "<li>Ned: " . $text ."</li>";
			}
			$ret = $ret . $options['schedule_comment']. "</ul>";
			
			return $ret;
		}
	
	}
	
	if( !isset( $instance ) ) 
		$instance = new OpeningHours;
	
	register_activation_hook( $instance->plugginFile, 'myActivation');
	function myActivation(){
		if ( !get_option( 'openinghour_options' )){
			$save = array(
			"time-format" => "tf24",
			"schedule_mon_where" => "",
			"schedule_tue_where" => "",
			"schedule_wed_where" => "",
			"schedule_thu_where" => "",
			"schedule_fri_where" => "",
			"schedule_sat_where" => "",
			"schedule_sun_where" => "",
			"schedule_mon_from" => "08:00",
			"schedule_mon_to" => "15:00",
			"schedule_tue_from" => "08:00",
			"schedule_tue_to" => "15:00",
			"schedule_wed_from" => "08:00",
			"schedule_wed_to" => "15:00",
			"schedule_thu_from" => "08:00",
			"schedule_thu_to" => "15:00",
			"schedule_fri_from" => "08:00",
			"schedule_fri_to" => "15:00",
			"schedule_sat_from" => "15:00",
			"schedule_sat_to" => "20:00",
			"schedule_sun_from" => "00:00",
			"schedule_sun_to" => "00:00",
			"schedule_mon_work" => 1,
			"schedule_tue_work" => 1,
			"schedule_wed_work" => 1,
			"schedule_thu_work" => 1,
			"schedule_fri_work" => 1,
			"schedule_sat_work" => 0,
			"schedule_sun_work" => 0,
			);
			add_option( 'openinghour_options', $save, '', 'yes' );
		}
	}

	
	
?>

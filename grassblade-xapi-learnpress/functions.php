<?php
/*
Plugin Name: Experience API for LearnPress by GrassBlade
Plugin URI: https://www.nextsoftwaresolutions.com/experience-api-for-learnpress/
Description: Experience API (xAPI) integration for LearnPress LMS with GrassBlade xAPI Companion plugin.
Author: Next Software Solutions
Version: 5.1
Author URI: https://www.nextsoftwaresolutions.com
*/

class grassblade_learnpress {
	public $version = "5.1";
	public $install_link = "https://www.nextsoftwaresolutions.com/r/learnpress/addon_info_page";

	function __construct() {

		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if(!class_exists('grassblade_addons'))
		require_once(dirname(__FILE__)."/addon_plugins/functions.php");

		add_action('admin_menu', array($this, 'menu'), 11);
		add_action( 'plugins_loaded', array($this, "plugins_loaded") );

	}

	function plugins_loaded() {
		load_plugin_textdomain( 'grassblade-learnpress', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

		$lp_plugin_file_path = WP_PLUGIN_DIR . '/learnpress/learnpress.php';
		if ( defined("GRASSBLADE_VERSION") && version_compare(GRASSBLADE_VERSION, '6.2.1', '>=') && is_plugin_active('learnpress/learnpress.php') ) {
			$this->run();
		}
		else if(empty($_GET["page"]) || $_GET["page"] != "grassblade-learnpress")
			add_action( 'admin_notices', array($this, 'installation_notice') );
	}

	function run(){

		add_action( 'learn-press/after-content-item-summary/lp_lesson', array($this, 'remove_mark_complete_button'), 1);
		add_action("grassblade_completed", array($this, 'learnpress_content_completed'), 10, 3);
        add_filter('grassblade_content_post',array( $this,'content_post'),10,1);
        add_filter("grassblade_lms_mark_complete_button_id",array($this,"get_mark_complete_btn_id"), 11, 2);
		add_filter("grassblade_lms_next_link",array($this,"get_next_link"), 11, 2);
		add_action( 'learn-press/user-enrolled-course', array($this,'user_enrolled_statement_depricated'), 10, 3);

		if(version_compare(LEARNPRESS_VERSION, '4.0', '>=') ) {
			add_filter('grassblade_add_to_content_post', array($this,'remove_xapi_content'), 10 , 3);
			add_action( 'learnpress/user/course-enrolled', array($this,'user_enrolled_statement'), 1, 3);
			add_action('learn-press/before-content-item-summary/lp_quiz', array($this,'add_xapi_content_to_quiz_page'), 10);
			add_action('wp_head', array($this,'remove_quiz_info_and_start_button'));
			add_action('grassblade_course_started', array($this, 'course_attempted_statement'), 10, 3);
			add_action('learn-press/user-course-finished', array($this,'course_completed_statement'), 10, 3);
			add_action('learn-press/user-completed-lesson', array($this,'lesson_completed_statement'), 10, 3);
			add_action('learn-press/user/quiz-finished',array( $this,'quiz_completed_statement'),10,3);
		}

		if( version_compare(GRASSBLADE_VERSION, '4.2.0', '>=') ) {

			add_filter("grassblade_get_courses", array($this, "get_courses"), 10, 2);
			add_filter("grassblade_get_course_content_ids", array($this, "add_course_content_ids"), 10, 2);
			add_filter("grassblade_get_course", array($this, "get_course"), 10, 2);
			add_filter("grassblade/reports/progress_snapshot/data", array($this, "get_progress_report_data"), 10, 2);

		}

		add_action("grassblade_edit_extra_message", array($this, "gb_course_completion_tracking_notice_metabox"), 10, 1);
		add_filter("gb_block_data", array($this, "gb_course_completion_tracking_notice_block"), 10, 1);
	}

	function gb_course_completion_tracking_notice_metabox($post) {
		if(!empty($post) && $post->post_type == "lp_course")
		echo  "<div id='gb_meta_box_extra_message'>".__("Completion Tracking is not supported on LearnPress Course page.", "grassblade")."</div>";
	}

	function gb_course_completion_tracking_notice_block($gb_block_data) {
		global $post;
		if(!empty($post) && $post->post_type == "lp_course")
		$gb_block_data["extra_message"] = __("Completion Tracking is not supported on LearnPress Course page.", "grassblade");
		return $gb_block_data;
	}

	function installation_notice() {
		?>
		<div class="error"><p>There are problems with <b>Experience API for Learnpress</b> plugin dependencies. Please <a href="<?php echo admin_url("admin.php?page=grassblade-learnpress");?>">click here</a> to check for details.</p></div>
		<?php
	}

	/**
	 * Generate an activation URL for a plugin like the ones found in WordPress plugin administration screen.
	 *
	 * @param  string $plugin A plugin-folder/plugin-main-file.php path (e.g. "my-plugin/my-plugin.php")
	 *
	 * @return string         The plugin activation url
	 */
	function activate_plugin($plugin, $url = false)
	{
		$link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . urlencode( $plugin ), 'activate-plugin_' . $plugin );

		if($url)
			return $link;

		$link = '<a href="#" onClick="return grassblade_lp_activate_plugin(\''.$link.'\');">Activate</a>';
		return $link;
	}
	function install_plugin($plugin)
	{
		//$link = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $plugin ), 'install-plugin_' . $plugin );
		$link = '<a href="'.$this->install_link.'">'.__('Get Now').'</a>';
		return $link;
	}
	function menu() {

		global $submenu, $admin_page_hooks;
		$icon = plugin_dir_url(__FILE__)."img/icon-gb.png";

		if(empty( $admin_page_hooks[ "grassblade-lrs-settings" ] )) {
			add_menu_page("GrassBlade", "GrassBlade", "manage_options", "grassblade-lrs-settings", array($this, 'menu_page'), $icon, null);
		}

		add_submenu_page("grassblade-lrs-settings", "LearnPress LMS", "LearnPress LMS",'manage_options','grassblade-learnpress', array($this, 'menu_page') );
	}

	function menu_page(){

	    if (!current_user_can('manage_options'))
	    {
	      wp_die( __('You do not have sufficient permissions to access this page.') );
	    }

	    $grassblade_plugin_file_path = WP_PLUGIN_DIR . '/grassblade/grassblade.php';
		if(!defined("GRASSBLADE_VERSION") && file_exists($grassblade_plugin_file_path)) {
			$grassblade_plugin_data = get_plugin_data($grassblade_plugin_file_path);
			define('GRASSBLADE_VERSION', @$grassblade_plugin_data['Version']);
		}

		if (!file_exists($grassblade_plugin_file_path) ) {
	    	$xapi_td = '<td colspan="2">
							<a class="buy-btn" href="https://www.nextsoftwaresolutions.com/grassblade-xapi-companion/">'.__("Buy Now", "grassblade-xapi-learnpres").'</a>
							<div style="margin-top: 10px;color: red;font-size: 16px;">'.__("Integration Disabled!!!", "grassblade-xapi-learnpress").'</div>
						</td>';
	    }
	    else if( version_compare(GRASSBLADE_VERSION, '6.2.1', '<' ) ) {
			$plugins_url = admin_url('plugins.php');
			// if is multisite and user is super admin then network plugin page
			$plugins_url = is_multisite() && is_super_admin() ? network_admin_url('plugins.php') : $plugins_url;
	    	$xapi_td = '<td colspan="2">
							<a class="buy-btn" href="'.$plugins_url.'">'.__("Get Latest Version", "grassblade-xapi-learnpress").'</a><br>
							<div style="margin-top: 10px;color: red;font-size: 16px;">'.__("Integration Disabled. Upgrade Now!!!", "grassblade-xapi-learnpress").'</div>
						</td>';
	    }
	    else {
	    	$xapi_td = '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/> '.(defined("GRASSBLADE_VERSION")? GRASSBLADE_VERSION:"").'</td>';
	    	if ( !is_plugin_active('grassblade/grassblade.php') ) {
				$xapi_td .= '<td>'.$this->activate_plugin("grassblade/grassblade.php").'</td>';
			}else {
	    		$xapi_td .= '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/></td>';
	    	}
	    }

	    $lp_plugin_file_path = WP_PLUGIN_DIR . '/learnpress/learnpress.php';

	    if (!file_exists( $lp_plugin_file_path ) ) {
	    	$lp_td = '<td colspan="2">'.$this->install_plugin('learnpress').'</td>';
	    } else {
		$lp_plugin_data = get_plugin_data($lp_plugin_file_path);
	    	$lp_td = '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/> '.(@$lp_plugin_data['Version']).'</td>';
	    	if ( !is_plugin_active('learnpress/learnpress.php') ) {
				$lp_td .= '<td>'.$this->activate_plugin("learnpress/learnpress.php").'</td>';
			} else {
	    		$lp_td .= '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/></td>';
	    	}
	    }

	    if(function_exists("grassblade_settings")) {
			$grassblade_settings = grassblade_settings();
			$endpoint = $grassblade_settings["endpoint"];
			if(!empty($endpoint)) {
				if(strpos($endpoint, "gblrs.com"))
					$lrs_html = '<img src="'.plugin_dir_url(__FILE__).'img/check.png"/>';
				else if(strpos($endpoint, "grassblade-lrs"))
					$lrs_html = "GrassBlade LRS Installed";
				else
					$lrs_html = '<img src="'.plugin_dir_url(__FILE__).'img/no.png"/> Other LRS? <a class="buy-btn" href="https://www.nextsoftwaresolutions.com/grassblade-lrs-experience-api/">Buy GrassBlade Cloud LRS</a>';
			}
	    }
	    if(empty($lrs_html))
		$lrs_html = '<a class="buy-btn" href="https://www.nextsoftwaresolutions.com/grassblade-lrs-experience-api/">Buy GrassBlade Cloud LRS</a>';
	?>
	    <style>
	    	hr {
	    		max-width: 90%;
			    margin-left: 0px;
			    border-top: 1px solid #62A21D;
	    	}
			.text{
				font-weight: 400;
				font-size: 15px;
			}
			.requirements {
				font-weight: 500;
				font-size: 16px;
			}
			table {
				border-collapse: collapse;
				min-width: 40%;
				text-align: center;
			}
			thead {
				background-color: #83BA39;
			}
			table, td, th {
			  border: 1px solid #ddd;
			}
			td{
			 padding: 18px;
			}
			th {
			 padding: 8px;
			}
			.links {
				text-decoration: none;
				margin-top: 10px !important;
				color: #000000;
			}
			.buy-btn{
				margin: 10px 0px 5px 0px !important;
				text-transform: capitalize !important;
	    		border-top: 1px solid #e6c628 !important;
				background: -webkit-linear-gradient(top,#e6c628,#82ba39) !important;
				padding: 7.5px 15px !important;
				border-radius: 9px !important;
			    text-shadow: rgba(0,0,0,.4) 0 1px 0 !important;
			    color: white !important;
			    font-size: 14px !important;
			    font-weight: bold !important;
			    font-family: Arial,serif !important;
			    text-decoration: none !important;
			    vertical-align: middle !important;
			}
			#grassblade_learnpress {
				background: white;
			    margin: 20px;
			    padding: 20px 40px;
			}
			#grassblade_learnpress img {
				vertical-align: middle;
			}
		</style>
		<script type="text/javascript">
			function grassblade_lp_activate_plugin(url) {
				jQuery.get(url, function(data) {
					window.location.reload();
				});
				return false;
			}
		</script>
		</style>
		<div id="grassblade_learnpress">
			<h2>
				<img style="margin-right: 10px;" src="<?php echo plugin_dir_url(__FILE__)."img/icon_30x30.png"; ?>"/>
				Experience API For LearnPress by Grassblade
			</h2>
			<hr>
			<div>
				<p class="text">To use xAPI Content on your LearnPress Lesson page, you need to meet the following requirements. Then follow this one-time setup process.</p>
				<h2>Requirements:</h2>
				<table class="requirements-tbl">
					<thead>
						<tr>
							<th>SNo</th>
							<th>Requirements</th>
							<th>Installed</th>
							<th>Active</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1. </td>
							<td>
								<a class="links" href="https://www.nextsoftwaresolutions.com/grassblade-xapi-companion/">GrassBlade xAPI Companion v6.2.1+</a>
							</td>
							<?php echo $xapi_td; ?>
						</tr>
						<tr>
							<td>2. </td>
							<td><a class="links" href="<?php echo $this->install_link; ?>">LearnPress LMS</a></td>
							<?php echo $lp_td; ?>
						</tr>
						<tr>
							<td>3. </td>
							<td><a class="links" href="https://www.nextsoftwaresolutions.com/grassblade-lrs-experience-api/">GrassBlade Cloud LRS</a></td>
							<td colspan="2">
								<?php echo $lrs_html; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<br>
				<h2>Useful Links:</h2>
				<ul>
					<li><a class="links" href="https://www.nextsoftwaresolutions.com/kbtopic/learnpress/" target="_blank">1. Getting started with Experience API Integration for LearnPress.</a></li>
				</ul>
			</div>
		</div>
	<?php }

    /**
	 *
	 * Remove Mark Complete Button.
	 *
	 */

	function remove_mark_complete_button() {
		$user   	   = learn_press_get_current_user();
		$lesson_id = LP_Global::course_item()->get_id();

		if ( empty($user) || empty($lesson_id) )
			return;

		$lesson_status = $user->get_item_status($lesson_id);
		if( $lesson_status == 'completed' )
			return;

		$all_content_ids = grassblade_xapi_content::get_post_xapi_contents($lesson_id, $with_completion_tracking_enabled_only = true);
		if( empty($all_content_ids) )
			return;

		$completed = grassblade_xapi_content::post_contents_completed( $lesson_id );
		if( !empty( $completed ) )
			return;

		if (version_compare(LEARNPRESS_VERSION, '4.0', '>=')) {
			remove_action('learn-press/after-content-item-summary/lp_lesson', LP()->template('course')->func('item_lesson_complete_button'), 11);
			remove_action('learn-press/after-content-item-summary/lp_lesson', LP()->template('course')->func('item_lesson_complete_button'), 10);
		}
		else
		remove_action('learn-press/after-content-item-summary/lp_lesson', 'learn_press_content_item_lesson_complete_button');

		$completion_type = grassblade_xapi_content::post_completion_type($lesson_id);
		if (!in_array($completion_type, array('hide_button', 'completion_move_nextlevel'))) {

			$course = LP_Global::course();
			if ($next_id = $course->get_next_item()) {
				$next_item = $course->get_item($next_id);
				if (method_exists($next_item, "get_permalink"))
					$next_step_url = $next_item->get_permalink();
			}
			if( empty($next_step_url) )
				$next_step_url = $course->get_permalink();

			$button = '<button class="lp-button button button-complete-item button-complete-lesson lp-btn-complete gb-button-complete-lesson">' . esc_html__('Complete', 'learnpress') . '</button>';
			echo '<a class="gb-button-complete-lesson" href="' . $next_step_url . '">' . $button . '</a>';
		}
		?>
			<style type="text/css">
				button.lp-button.button-complete-item[disabled="disabled"] {
					background-color: #bfbfbf !important;
					pointer-events: none;
				}
				a.gb-button-complete-lesson[disabled="disabled"] {
					pointer-events: none;
				}
			</style>
		<?php
	}

	function is_enrolled($course_id, $user) {
		if(empty($user) || empty($course_id))
			return false;

		if(!is_object($user))
			$user_id = $user;
		else
			$user_id = $user->ID;

		$user = learn_press_get_user( $user_id );
		if(version_compare(LEARNPRESS_VERSION, '4.0', '<=')){
			$course_data       = $user->get_course_data( $course_id );
			return $course_data->is_enrolled();
		}else
			return $user->has_enrolled_course( $course_id );
	}
	/**
	* Restrict Default xAPI Content loading on quiz page
	*/
	function remove_xapi_content($selected_id, $post, $content){
		if(!empty($post->post_type) && ($post->post_type == 'lp_quiz')){
			return 0;
		}
		return $selected_id;
	}

	/**
	 * Add xAPI Content on quiz if there is no questions assigned and also hiding some meta information on the quiz page.
	 */
	function add_xapi_content_to_quiz_page() {

		$course_id   	 	= get_the_ID();
		$user_id     	 	= get_current_user_id();
		$user_data  		= learn_press_get_user( $user_id );

		$quiz 		 	 	= LP_Global::course_item_quiz();
		$quiz_id 	 	 	= $quiz->get_id();
		$is_enrolled 	 	= $this->is_enrolled($course_id, $user_id);

		if( empty( $is_enrolled ) ){
			echo '<div class="learn-press-message error">'.__("Please enroll in the course before starting the quiz.", 'learnpress').'</div>';
		return;
		}

		$quiz_data 			= $user_data->get_item_data( $quiz_id, $course_id );
		$retaken 			= !empty($quiz_data) ? learn_press_get_user_item_meta($quiz_data->get_user_item_id(), '_lp_retaken_count') : '';
		$total_retakes 		= $quiz->get_retake_count();
		$can_retake 		= $retaken <= $total_retakes ? 0 : 1 ;

		$xapi_content_ids = grassblade_xapi_content::get_post_xapi_contents($quiz_id, true);
		if(!empty($xapi_content_ids)){
			add_filter("esc_html", function($safe_text, $text) {
				if( $text == "You haven't any question!" )
				return "";

				return $safe_text;
			}, 10, 2);

			if($can_retake)
				echo sprintf(__( 'You have already attempted this content %d time(s).', 'learnpress' ), $retaken );

			foreach($xapi_content_ids as $xapi_content_id) {
				if(!empty($xapi_content_id)) {
					$user_data  = learn_press_get_user( $user_id );
					echo do_shortcode( '[grassblade id='.intVal($xapi_content_id) . ' remove_content='.$can_retake.']');
					$user_data->start_quiz( $quiz_id, $course_id, true );
				}
			}

			$completion_type = grassblade_xapi_content::post_completion_type($quiz_id);
			$remove 		 = in_array($completion_type, array('hide_button', 'completion_move_nextlevel'));
			$style 			 = ($completion_type == "hidden_until_complete")? ' style="display:none;" ':(($completion_type == "disable_until_complete")? ' disabled="disabled" ':'');

			//TODO: Test behaviour of Button in different LMS when Content is completed but Quiz is not completed.
			$completed = grassblade_xapi_content::post_contents_completed($quiz_id, $user_id);
			if(empty($completed) && empty($remove)) {
			?>
				<div class="quiz-buttons align-center is-first is-last">
						<div class="button-left fixed" style="margin-left: 237.5px; width: 792px;"></div>
					<div class="button-right">
						<button class="grassblade_quiz_button lp-button" onclick="window.location = window.location" <?php echo $style; ?> ><?php _e( 'Finish Quiz', 'learnpress' ) ?></button>
					</div>
				</div>
			<?php
			}
		}
	}


	/*
		Get current course item id (lesson or quiz) of LearnPress course.
	*/
	function get_current_item_id() {

		$current_item = LP_Global::course_item();
		$current_item_id = ( is_object($current_item) && method_exists($current_item, "get_id") )? $current_item->get_id():0;

		return $current_item_id;
	}

	function remove_quiz_info_and_start_button(){

		$post_types = array("lp_course", "lp_lesson", "lp_quiz");
		$post_type 	= get_post_type();

		if( !in_array($post_type, $post_types) )
			return;

		$course  = learn_press_get_course();
		if( empty($course) )
			return;

		$quizzes = $course->get_items( LP_QUIZ_CPT );

		$current_item_id = $this->get_current_item_id();

		$quizzes_with_xapi_content = array();
		foreach($quizzes as $quiz_id) {
			$all_content_ids = grassblade_xapi_content::get_post_xapi_contents($quiz_id, $with_completion_tracking_enabled_only = true);

			if(!empty($all_content_ids)) {
				$quizzes_with_xapi_content[] = " .course-item-".$quiz_id . " span.count-questions ";

				if( $current_item_id == $quiz_id ) {
					$quizzes_with_xapi_content[] = "#learn-press-quiz-app ";
				}
			}
		}

		if( !empty( $quizzes_with_xapi_content )) {
			$classes_of_quizzes_with_xapi_contents = implode(", " , $quizzes_with_xapi_content);
			?>
				<style>
					<?php echo $classes_of_quizzes_with_xapi_contents ?> {
							display: none !important;
					}
				</style>
			<?php
		}
	}

	/**
	 * Content Completion.
	 *
	 *
	 * @param obj $statement.
	 * @param int|string $content_id xAPI Content ID.
	 * @param obj $user User Object.
	 *
	 */

	function learnpress_content_completed( $statement, $content_id, $user) {

		grassblade_show_trigger_debug_messages("learnpress_content_completed ");
		$xapi_content = get_post_meta($content_id, "xapi_content", true);
		if(empty($xapi_content["completion_tracking"])) {
			grassblade_show_trigger_debug_messages( "\nCompletion tracking not enabled. " );
			return true;
		}

		if(!empty($statement) && is_string($statement)){
			$statement = json_decode($statement);
		}

		global $wpdb;
		$posts = grassblade_xapi_content::get_posts_with_content($content_id);

		foreach ($posts as $post) {
			$post_id = $post->ID;
			$course_data = learn_press_get_item_courses( $post_id );
			if( empty($course_data) ) {
				grassblade_show_trigger_debug_messages(" post_id: ".$post_id. "  is outside LearnPress Course. ");
				continue;
			}
			$course_id = $course_data[0]->ID;
			$is_enroll = $this->is_enrolled($course_id, $user);
			$completed = grassblade_xapi_content::post_contents_completed($post_id,$user->ID);

			if ($is_enroll) {
					$post_data = get_post($post_id);
					if ( !empty($post_data->ID) && $post_data->post_type == 'lp_lesson' ) {

						if(empty($completed)) {
							grassblade_show_trigger_debug_messages(  " xAPI content is incompleted or failed " );
							continue;
						}

						$user_data = learn_press_get_user($user->ID);

						wp_set_current_user($user->ID);

						grassblade_show_trigger_debug_messages( " complete_lesson: lesson_id: ".$post_id." course_id: ".$course_id." user_id: ".$user->ID );
						$r = $user_data->complete_lesson( $post_id, $course_id, true );
						grassblade_show_trigger_debug_messages ( " => ".print_r($r, true));

					} else
						if ( !empty($post_data->ID) && $post_data->post_type == 'lp_quiz' && LEARNPRESS_VERSION >= 4.0) {

						$quiz_id 		= $post_id;
						$user_data  	= learn_press_get_user( $user->ID );

						wp_set_current_user($user->ID);

						$user_course 	= $user_data->get_course_data( $course_id );
						$user_quiz 		= $user_course->get_item( $quiz_id );

						if(empty($user_quiz)) {
							grassblade_show_trigger_debug_messages( " Quiz not started, creating attempt now." );
							$user_data->start_quiz( $quiz_id, $course_id, true );
							$user_quiz 	= $user_course->get_item( $quiz_id );
						}

						$quiz         = learn_press_get_quiz( $quiz_id );
						$user_item_id = $user_quiz->get_user_item_id();

						if( self::is_existing_statement_attempt($user_item_id, $statement) ) {
							grassblade_show_trigger_debug_messages( " Quiz already completed with same statement_id." );
								continue;
						}
						$lp_is_quiz_pass = $user_quiz->is_passed();

						$passing_grade    = str_replace("%", '', $quiz->get_passing_grade());
						$score_and_status = gb_get_statement_score_and_status($statement, $passing_grade);
						$pass 			  = $score_and_status['status'] == 'Passed' ? 1 : 0 ;

						$all_content_ids = grassblade_xapi_content::get_post_xapi_contents($quiz_id, false);
						$last_content_id = array_pop($all_content_ids);
						$same_content_id = ($last_content_id == $content_id);

						/*
							If only one content, then complete the Quiz.
							If Current Content is Last Content and it is Failed, then Mark Failed.
							If Last Content not completed, then continue; //don't complete the Quiz. $completed empty
							If Last Content completed:
							- Overall Incomplete:  // $completed empty
								donot complete the Quiz. i.e. continue
							- Overall Completed:   // $completed not empty
								- Mark Complete:
									- Current Statement is Last Content
										- Complete the Quiz
									- Current Statement is not Last Content
										- If quiz is incompleted, Complete the Quiz, using last content statement.
						*/
						// More than one content
						if( count($all_content_ids) > 1 ) {
							if( $same_content_id && !$pass ) {
								// Current content is last content and failed. Move ahead normally.
							}
							else if( !empty($completed) && $same_content_id ) {
								// Overall Completed and Current content. Move ahead normally.
							}
							else if( !empty($completed) && !$same_content_id && !$lp_is_quiz_pass ) {
								// Overall Completed and LP Quiz is currently not passed. Current content is not last content. Mark Passed using last content statement.
								$last_content_statement = ( is_array( $completed ) && count( $completed ) > 0 )? array_pop( $completed ):false;

								// change the statement for processing to last content statement
								$statement = json_decode( $last_content_statement );
								if( empty($statement) )
									continue; // just to be safe

								$score_and_status = gb_get_statement_score_and_status($statement, $passing_grade);
								$pass 			  = $score_and_status['status'] == 'Passed' ? 1 : 0 ;
							}
							else
								continue;
						}

						$result = array(
							"questions"			=> array(),
							"mark"              => $quiz->get_mark(),
							"status"			=> "completed",
							"grade" 			=> $score_and_status['percentage'],
							"result" 			=> $score_and_status['percentage'],
							"grade_text" 		=> $score_and_status['status'],
							"passing_grade"		=> $passing_grade."%",
							"pass"				=> $pass,
							"statement_id"		=> $statement->id,
						);

						$graduation = $pass == 1 ? "passed" : "failed";
						$user_quiz->set_graduation( $graduation );

						$ratake_count = get_post_meta( $quiz_id, '_lp_retake_count', true );
						if ( $ratake_count > 0 ) {
							$user_quiz->update_retake_count();
						}

						$user_quiz->complete();
						if($quiz->has_questions()){
							// Fixing: LearnPress marks the quiz as failed if it has questions as well as xAPI Content. Reupdating the pass/graduation status.
							grassblade_learnpress::update_graduation_info($graduation, $user_item_id);
						}

						LP_User_Items_Result_DB::instance()->insert( $user_item_id, wp_json_encode( $result ) );
						do_action( "learn-press/user/quiz-finished", $quiz_id, $course_id, $user->ID );

						grassblade_show_trigger_debug_messages( " quiz_completed: quiz_id: ".$quiz_id." course_id:".$course_id." user_id: ".$user->ID );
						grassblade_show_trigger_debug_messages ( " => ".print_r($result, true));
					}
			} else {
				grassblade_show_trigger_debug_messages(  " User: ".$user->ID." not enrolled in ".$course_id );
			} // end of is enroll

		} // end of foreach

	} // end of learnpress_content_completed function

	function is_existing_statement_attempt($user_item_id, $statement)
	{
		$return = false;
		if(empty($user_item_id))
			return $return;

		$existing_quiz_results = LP_User_Items_Result_DB::instance()->get_results( $user_item_id, 100 );
		if( empty($existing_quiz_results) )
			return $return;

		foreach($existing_quiz_results as $existing_quiz_result) {
			$existing_quiz_result = json_decode($existing_quiz_result, true);
			if( !empty( $existing_quiz_result["statement_id"] ) && $existing_quiz_result["statement_id"] == $statement->id ) {
				$return = true;
				break;
			}
		}

		return $return;
	}

	/**
	 * Fixing: LearnPress marks the quiz as failed if it has questions as well as xAPI Content. Reupdating the pass/graduation status.
	 */
	static function update_graduation_info($graduation, $user_item_id){
		global $wpdb;
		$query = $wpdb->prepare(
			"UPDATE {$wpdb->learnpress_user_items}
			 SET graduation = %s
			 WHERE user_item_id = %d ",
			$graduation, $user_item_id
		);
		$wpdb->query( $query );
	}

	/**
	 * Send Lesson Completion Statement.
	 *
	 * @param int $lesson_id.
	 * @param int $course_id.
	 * @param int $user_id.
	 *
	 */
	function lesson_completed_statement($lesson_id, $course_id, $user_id) {
		grassblade_debug('grassblade_learnpress_lesson_completed_statement');

		global $grassblade, $xapi;
		if(empty($xapi) && !empty($grassblade['xapi']))
			$xapi = $grassblade['xapi'];

		$grassblade_settings = grassblade_settings();
		$grassblade_tincan_track_guest = $grassblade_settings["track_guest"];

		$user = get_userdata( $user_id );
		$actor = grassblade_getactor($grassblade_tincan_track_guest, "1.0", $user);

		if(empty($actor)){
			grassblade_debug("No Actor. Shutting Down.");
			return;
		}

		$lesson_post 	= get_post($lesson_id);
		$lesson_title 	= $lesson_post->post_title;
		$lesson_url 	= grassblade_post_activityid($lesson_id);
		$course_post 	= get_post($course_id);
		$course_title 	= $course_post->post_title;
		$course_url 	= grassblade_post_activityid($course_id);

		$data = array("timestamp" => time(), "post_id" => $lesson_id);
		grassblade_lms::grassblade_course_started($user_id, $course_id, $data);

		//Lesson Attempted
		$xapi->set_verb('attempted');
		$xapi->set_actor_by_object($actor);
		$xapi->set_parent($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_grouping($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_object($lesson_url, $lesson_title, $lesson_title, 'http://adlnet.gov/expapi/activities/lesson','Activity');
		$statement = $xapi->build_statement();

		$xapi->new_statement();

		//Lesson Completed
		$xapi->set_verb('completed');
		$xapi->set_actor_by_object($actor);
		$xapi->set_parent($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_grouping($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_object($lesson_url, $lesson_title, $lesson_title, 'http://adlnet.gov/expapi/activities/lesson','Activity');
		$result = array(
					'completion' => true
					);
		$xapi->set_result_by_object($result);

		$statement = $xapi->build_statement();

		$xapi->new_statement();

		foreach($xapi->statements as $statement){
			$ret = $xapi->SendStatements(array($statement));
		}
	}

	function quiz_completed_statement($quiz_id, $course_id, $user_id){
		grassblade_debug("grassblade_learnpress_quiz_completed_statement");

		$user_data  	= learn_press_get_user( $user_id );
		$user_course 	= $user_data->get_course_data( $course_id );
		$user_quiz 		= $user_course->get_item( $quiz_id );
		$item_id 		= $user_quiz->get_user_item_id( $quiz_id );
		$quiz           = learn_press_get_quiz( $quiz_id );

		$quiz_result 	= LP_User_Items_Result_DB::instance()->get_result( $item_id );

		$percentage 	= $quiz_result['result'];
		$passing_grade  = preg_replace('/[^A-Za-z0-9\-]/', '', $quiz->get_passing_grade());
		$pass 			= $percentage >= $passing_grade ? 1 : 0 ;

		$verb 			= $pass == 1 ? "passed" : "failed";
		$success 		= $verb == "passed" ? true : false;
		$score 	 		= $quiz_result["result"];

		//Course info (parent/group)
		$course_post 	= get_post($course_id);
		$course_title	= $course_post->post_title;
		$course_url 	= grassblade_post_activityid($course_id);

		//Quiz Info
		$quiz_post 		= get_post($quiz_id);
		$quiz_title 	= $quiz_post->post_title;
		$quiz_url 		= grassblade_post_activityid($quiz_id);

		$xapi_data 		= array("timestamp" => time(), "post_id" => $quiz_id);
		grassblade_lms::grassblade_course_started($user_id, $course_id, $xapi_data);

		global $grassblade, $xapi;
		if(empty($xapi) && !empty($grassblade['xapi']))
			$xapi = $grassblade['xapi'];

		$grassblade_settings = grassblade_settings();
		$grassblade_tincan_track_guest = $grassblade_settings["track_guest"];

		$user = get_user_by("id", $user_id);
		$actor = grassblade_getactor($grassblade_tincan_track_guest, "1.0", $user);

		if(empty($actor)){
			grassblade_debug("No Actor. Shutting Down.");
			return;
		}

		$xapi->set_verb('attempted');
		$xapi->set_actor_by_object($actor);
		$xapi->set_parent($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_grouping($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_object($quiz_url, $quiz_title, $quiz_title, 'http://adlnet.gov/expapi/activities/assessment','Activity');
		$statement = $xapi->build_statement();
		//grassblade_debug($statement);
		$xapi->new_statement();

		//Quiz Passed/Failed
		$xapi->set_verb($verb);
		$xapi->set_actor_by_object($actor);
		$xapi->set_parent($quiz_url, $quiz_title, $quiz_title, 'http://adlnet.gov/expapi/activities/assessment','Activity');
		$xapi->set_grouping($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_object($quiz_url, $quiz_title, $quiz_title, 'http://adlnet.gov/expapi/activities/assessment','Activity');
		$result = array(
					'completion' => true,
					'success' => $success,
					'score' => array(
						'score'  => 	round($score, 2),
						"scaled" =>  	round($quiz_result["result"] / 100, 4),
						"raw" =>  		round($quiz_result["result"], 2),
						"min" =>  		0,
						"max" =>  		100,
						)
					);

		$xapi->set_result_by_object($result);
		$statement = $xapi->build_statement();
		$xapi->new_statement();

		foreach($xapi->statements as $statement){
			$ret = $xapi->SendStatements(array($statement));
			//grassblade_debug($ret);
		}
	}

	 /**
		 * Send Course Attempted Statement.
		 *
		 * @param int $user_id.
		 * @param int $course_id.
 		 * @param array $data.
		 *
	 */
	function course_attempted_statement($user_id,$course_id,$data) {
		grassblade_debug('grassblade_learnpress_course_attempted');

		global $grassblade, $xapi;
		if(empty($xapi) && !empty($grassblade['xapi']))
			$xapi = $grassblade['xapi'];

		$grassblade_settings = grassblade_settings();
		$grassblade_tincan_track_guest = $grassblade_settings["track_guest"];

		$user = get_userdata( $user_id );
		$actor = grassblade_getactor($grassblade_tincan_track_guest, "1.0", $user);

		if(empty($actor)){
			grassblade_debug("No Actor. Shutting Down.");
			return;
		}

		$course_post = get_post($course_id);

		$course_title = $course_post->post_title;
		$course_url = grassblade_post_activityid($course_id);
		//Course Attempted
		$xapi->set_verb('attempted');
		$xapi->set_actor_by_object($actor);
		$xapi->set_parent($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_grouping($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_object($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$statement = $xapi->build_statement();

		//grassblade_debug($statement);
		$xapi->new_statement();
		foreach($xapi->statements as $statement)
		{
			$ret = $xapi->SendStatements(array($statement));
		}
		$xapi->statements = [];
	}  // end of course_attempted function

	 /**
		 * Send Course Completion Statement.
		 *
		 * @param int $course_id.
		 * @param int $user_id.
		 *
	 */
	function course_completed_statement($course_id, $user_id){
		grassblade_debug('grassblade_learnpress_course_completed  course_id: ' . print_r($course_id, true) . " user_id  : " .  print_r($user_id, true));

		global $grassblade, $xapi;
		if(empty($xapi) && !empty($grassblade['xapi']))
			$xapi = $grassblade['xapi'];

		$grassblade_settings = grassblade_settings();
		$grassblade_tincan_track_guest = $grassblade_settings["track_guest"];

		$user  = get_userdata( $user_id );
		$actor = grassblade_getactor($grassblade_tincan_track_guest, "1.0", $user);

		if(empty($actor)){
			grassblade_debug("No Actor. Shutting Down.");
			return;
		}

		$course_post 	= get_post($course_id);
		$course_title 	= $course_post->post_title;
		$course_url 	= grassblade_post_activityid($course_id);

		//Course Completed
		$xapi->set_verb('completed');
		$xapi->set_actor_by_object($actor);
		$xapi->set_parent($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_grouping($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$xapi->set_object($course_url, $course_title, $course_title, 'http://adlnet.gov/expapi/activities/course','Activity');
		$result = array(
					'completion' => true
					);
		$xapi->set_result_by_object($result);
		$statement = $xapi->build_statement();
		//grassblade_debug($statement);
		$xapi->new_statement();
		foreach($xapi->statements as $statement)
		{
			$ret = $xapi->SendStatements(array($statement));
		}
	}  // end of course_completed_statement function


	function content_post($post) {
		if(empty($post))
			return $post;

		if(empty($post->ID) && $post->type != 'lp_course')
			return $post;

		if (is_null( LP_Global::course_item()))
			return $post;

		$lesson_id = LP_Global::course_item()->get_id();
		$lesson = get_post($lesson_id);

		return $lesson;
	}

	function get_mark_complete_btn_id($return,$post){
		if(empty($post->ID))
			return $return;

		if(!in_array($post->post_type, array('lp_lesson', 'lp_quiz'))){
			return $return;
		} else {
			return '.gb-button-complete-lesson, .learn-press-form .button-complete-lesson, .grassblade_quiz_button';
		}
	}

	function get_next_link($return,$post){
		if(empty($post->ID))
			return $return;

		if(!in_array($post->post_type, array('lp_lesson','lp_quiz'))){
			return $return;
		} else {

			$course    = LP_Global::course();
			$next_item = $prev_item = false;

			if(empty($course))
				return $return;

			if ( $next_id = $course->get_next_item() ) {
				$next_item = $course->get_item( $next_id );
				if(method_exists($next_item, "get_permalink"))
				return $next_item->get_permalink();
			}
		}
		return $return;
	}

	/**
	 * Send course enrollment statement.
	 *
	 * @param int $ref_id.
	 * @param int $course_id.
	 * @param int $user_id.
	 *
	 */

	function user_enrolled_statement($ref_id, $course_id, $user_id){
		if (class_exists('grassblade_events_tracking')) {
			grassblade_events_tracking::send_enrolled($user_id,$course_id);
		}// end of if grassblade_events_tracking class exists
	}

	function user_enrolled_statement_depricated($course_id, $user_id, $user_course){
		/* Action name is changed in LearnPress 4.1.6 from learn-press/user-enrolled-course to learnpress/user/course-enrolled. Arguments order is also changed. */
		if (class_exists('grassblade_events_tracking')) {
			grassblade_events_tracking::send_enrolled($user_id,$course_id);
		}// end of if grassblade_events_tracking class exists
	}

	function get_course($r, $course) {
		if(!empty($r))
			return $r;

		if(!empty($course) && is_numeric($course)) {
			$course = get_post($course);
		}

		if(!empty($course) && !empty($course->post_type) && $course->post_type == "lp_course")
			return $course;
		else
			return $r;
	}
	function get_courses($courses, $params) {

		if(isset($params["lms"]) && is_array($params["lms"]) && !in_array("learnpress", $params["lms"]))
			return $courses;

		if(empty($params["post_status"]))
			$params["post_status"] = "publish";

		$all_courses = get_posts("post_type=lp_course&post_status=".$params["post_status"]."&posts_per_page=-1");

		if(empty($all_courses))
			return $courses;

		foreach ($all_courses as $course) {
			if(isset($params["return"]) && $params["return"] == "object")
			$courses[$course->ID] = $course;
			else
			$courses[$course->ID] = $course->post_title;
		}
		return $courses;
	}
	function add_course_content_ids($content_ids, $course) {
		if(is_numeric($course))
			$course = get_post($course);

		if(!empty($course->ID) && $course->post_type == "lp_course")
		return $content_ids + $this->get_course_content_ids($course);

		return $content_ids;
	}
	static function get_course_steps_ids($course_id) {
		global $wpdb;

		$course  = learn_press_get_course( $course_id );
		//$items = $course->get_items(LP_LESSON_CPT);
		//$sections = $course->get_sections(  );
		$lessons = $course->get_items( LP_LESSON_CPT );
		$quizzes = $course->get_items( LP_QUIZ_CPT );
		$steps_ids = array_merge($lessons, $quizzes);

		return $steps_ids;
	}
	static function get_course_content_ids($course) {
		if(is_numeric($course)) {
			$course_id = $course;
			$course = get_post($course_id);
		}
		else
			$course_id = $course->ID;

		if(empty($course_id) || empty($course->post_type) || $course->post_type != "lp_course")
			return array();

		$steps_ids = grassblade_learnpress::get_course_steps_ids($course_id);

		if(!empty($steps_ids))
			$post_ids = grassblade_xapi_content::get_post_xapi_contents($steps_ids);

		return empty($post_ids)? array():$post_ids;
	}

	function get_progress_report_data($r, $params) {
		global $wpdb;

		if(!empty($r))
			return $r;

		$course_id = intVal($params["course_id"]);
		$group_id = intVal($params["group_id"]);
		$course = get_post($course_id);

		if(empty($course) || empty($course->post_type) || $course->post_type != "lp_course")
			return $r;

		$sections_and_items = $this->get_sections_and_items($course_id);

		if( empty($sections_and_items["sections"]) || empty($sections_and_items["item_ids"]) )
			return $r;

		$sections = $sections_and_items["sections"];
		$item_ids = $sections_and_items["item_ids"];

		$lesson_completion_results = array();

		$users = array();

		$sql = "SELECT user_id, item_id as post_id, graduation, end_time FROM {$wpdb->prefix}learnpress_user_items WHERE item_id IN (".implode(",", $item_ids).") ORDER BY user_item_id ASC";

		$sql = grassblade_add_group_user_query($sql, $group_id);
		$item_completion_results_raw = $wpdb->get_results($sql);

		if(!empty($item_completion_results_raw))
		foreach ($item_completion_results_raw as $key => $value) {
			if(empty($item_completion_results[$value->user_id]))
			$item_completion_results[$value->user_id] = array();

			if(empty($item_completion_results[$value->user_id][$value->post_id]))
			$item_completion_results[$value->user_id][$value->post_id] = array();

			$item_completion_results[$value->user_id][$value->post_id] = $value;

			$users[$value->user_id] = 1;
		}
		unset($item_completion_results_raw);

		$k = 0;
		$ret = array();
		foreach ($users as $user_id => $v) {
			$user = get_user_by("id", $user_id);
			if(!empty($user->ID))
			{
				$data = array(
					"sno" 	=> $k,
					"name"	=> function_exists("gb_name_format")? gb_name_format($user) : $user->last_name.", ".$user->first_name,
					"user_id" => $user->ID,
					"user_email" => $user->user_email,
				);
				foreach ($sections as $key => $section) {
					$user_section_results = !empty($item_completion_results[$user_id][$section->section_id])? $item_completion_results[$user_id][$section->section_id]:array();
					$data[$section->section_id] = $this->section_completion_date($section->section_items, $item_completion_results[$user_id], $user_section_results);
				}
				$ret[$k++] = $data;
			}
		}
		//print_r($data);
		$section_order = $sections_list = array();
		$k = 1;
		foreach ($sections as $key => $section) {
			$sections_list[$section->section_id] = $section->section_name;
			$section_order[$k++] = $section->section_id;
		}
		$return = array("data" => $ret, "lessons" => $sections_list, 'lesson_order' => $section_order);
		return $return;
	}
	static function get_sections($course_id){
		global $wpdb;

		$query = $wpdb->prepare("
			SELECT s.section_id, s.section_name, s.section_course_id, s.section_order, s.section_description
			FROM {$wpdb->posts} p
			INNER JOIN {$wpdb->learnpress_sections} s ON p.ID = s.section_course_id
			WHERE p.ID = %d
			ORDER BY p.ID, `section_order` ASC", $course_id);

		$results = $wpdb->get_results($query);

		$sections = array();
		foreach($results as $section){
			$sections[$section->section_id] = $section;
		}

		return $sections;
	}
	static function get_section_items($section_id){
		global $wpdb;

		$query = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}learnpress_section_items WHERE section_id = %d", $section_id);
		$results = $wpdb->get_results($query);

		$section_items = array();
		foreach($results as $item){
			$section_items[$item->item_id] = $item;
		}

		return $section_items;
	}
	function get_sections_and_items($course_id) {
		$sections = self::get_sections($course_id);

		$item_ids = array();
		foreach($sections as $section_id => $section){
			$section_items = array_keys( self::get_section_items( $section_id ) );
			$item_ids = array_merge( $item_ids,  $section_items );
			$sections[$section_id]->section_items = $section_items;
		}
		return array("sections" => $sections, "item_ids" => $item_ids);
	}
	function section_completion_date($section_items, $item_completion_results_all = null, $user_section_results = null) {
		$date = "";
		$completed_count = 0;
		if( !empty($user_section_results->graduation) && $user_section_results->graduation == 'passed' )
		if( !empty($item_completion_results->updated_date) )
			return date("Y-m-d", $item_completion_results->updated_date);
		else
			$completed_count = count($section_items);

		if(!empty($section_items))
		foreach ($section_items as $lesson_id) {
			if(!empty($item_completion_results_all) && !empty($item_completion_results_all[$lesson_id]) && !empty($item_completion_results_all[$lesson_id]->graduation) && $item_completion_results_all[$lesson_id]->graduation == 'passed') {
				if($item_completion_results_all[$lesson_id]->end_time > $date)
				$date = $item_completion_results_all[$lesson_id]->end_time;
				$completed_count++;
			}
		}

		if($completed_count == count($section_items) && !empty($date))
			return date("Y-m-d", strtotime($date));
		else
			return $completed_count."/".count($section_items);
	}
} // end of grassblade_learnpress class

$lp = new grassblade_learnpress();

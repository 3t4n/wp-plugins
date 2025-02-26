<?php
/*
Plugin Name: Manual Completions for LifterLMS
Plugin URI: https://www.nextsoftwaresolutions.com/manual-completions-for-lifterlms/
Description: Manual Bulk Completions for LifterLMS addon lets you check completion as well as manually mark courses, sections, lessons and quizzes as complete.
Author: Next Software Solutions
Version: 1.1
Author URI: https://www.nextsoftwaresolutions.com
Text Domain: manual-completions-lifterlms
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Manual Completions LifterLMS
 */

if (!defined('ABSPATH')) {
	exit;
}

class gbmc_manual_completions_lifter {
	public $version = "1.1";
	public $lifter_link = "https://www.nextsoftwaresolutions.com/r/lifterlms/manual-completions-lifterlms";

	function __construct() {

		if(!is_admin())
			return;

		global $gbmc_manual_completions_lifter;
		$gbmc_manual_completions_lifter = array("uploaded_data" => array(), "upload_error" => array(), "course_structure" => array(), "ajax_url" => admin_url("admin-ajax.php"));

		add_action( 'admin_menu', array($this,'menu'), 10);
		add_action( 'wp_ajax_manual_completions_lifter_course_selected', array($this, 'course_selected') );
		add_action( 'wp_ajax_manual_completions_lifter_mark_complete', array($this, 'mark_complete') );
		add_action( 'wp_ajax_manual_completions_lifter_check_completion', array($this, 'check_completion') );
		add_action( 'wp_ajax_manual_completions_lifter_get_enrolled_users', array($this, 'get_enrolled_users') );
		add_filter( 'lifter_submenu', array($this, 'lifter_submenu'), 1, 1 );
		add_action( 'admin_init', array($this, "process_upload"));
	}

	function get_enrolled_users() {
		global $wpdb;

		if(!current_user_can("manage_options") || empty($_REQUEST["course_id"]))
			$this->json_out(array("status" => 0, "message" => self::get_message("invalid_request")));

		if(!empty($_REQUEST["course_id"]) && is_numeric($_REQUEST["course_id"])) {
			$course_id = intVal($_REQUEST["course_id"]);
			$course = new LLMS_Course( $course_id );
			$user_ids = $course->get_students('enrolled', 10000);
			$this->json_out( array("status" => 1, "data" => $user_ids, "course_id" => $course_id) );
		}

		$this->json_out(array("status" => 0, "message" => self::get_message("invalid_request")));
	}

	function manual_completions_lifter_scripts() {
		global $gbmc_manual_completions_lifter;

		wp_enqueue_script("manual_completions_lifter", plugins_url('/script.js', __FILE__), array('jquery'), $this->version );
		wp_enqueue_style("manual_completions_lifter", plugins_url("/style.css", __FILE__), array(), $this->version );
		wp_enqueue_script("select2js", plugins_url("/vendor/select2/js/select2.min.js", __FILE__), array(), $this->version );
		wp_enqueue_style("select2css", plugins_url("/vendor/select2/css/select2.min.css", __FILE__), array(), $this->version );
		wp_localize_script("manual_completions_lifter", "manual_completions_lifter",  $gbmc_manual_completions_lifter);

		wp_add_inline_style("manual_completions_lifter", '#manual_completions_lifter_table .has_xapi {background: url('.esc_url( plugins_url("img/icon-gb.png", __FILE__) ).')}');
	}
	function upload_mimes ( $existing_mimes = array() ) {
	    // add your extension to the mimes array as below
	    $existing_mimes['csv'] = 'text/csv';
	    return $existing_mimes;
	}
	function process_upload() {

		if (empty($_GET['page']) || $_GET['page'] != "grassblade-manual-completions-lifter")
			return;

		add_action("admin_print_styles", array($this, "manual_completions_lifter_scripts"));
		if( empty($_FILES) || empty( $_FILES['completions_file']['name'] ))
			return;

		global $gbmc_manual_completions_lifter;
		if(empty($gbmc_manual_completions_lifter) || !is_array($gbmc_manual_completions_lifter))
			$gbmc_manual_completions_lifter = array();

		add_filter('upload_mimes', array($this, 'upload_mimes'));
		if (!current_user_can("manage_options") || empty($_POST["manual_completions_lifter_csv_nonce"]) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST["manual_completions_lifter_csv_nonce"] ) ), 'manual_completions_lifter_csv')) {
			$gbmc_manual_completions_lifter["upload_error"] = esc_html__('Invalid Request', 'manual-completions-lifterlms');
			return;
		}

		$file_name = sanitize_text_field($_FILES['completions_file']['name']);
		$file_type = sanitize_text_field($_FILES['completions_file']['type']);
		if(strtolower( pathinfo($file_name, PATHINFO_EXTENSION) ) != "csv" || $file_type != "text/csv" && $file_type != "application/vnd.ms-excel")
		{
			$gbmc_manual_completions_lifter["upload_error"] = __('Upload Error: Invalid file format. Please upload a valid csv file', 'manual-completions-lifterlms');
			return;
		}
		require_once(dirname(__FILE__)."/../grassblade/addons/parsecsv.lib.php");
		$tmp_name = sanitize_text_field($_FILES['completions_file']['tmp_name']);
		$csv = new parseCSV($tmp_name);
		if(empty($csv->data) || !is_array($csv->data) || empty($csv->data[0]))
		{
			$gbmc_manual_completions_lifter["upload_error"] = __('Upload Error: Empty csv file', 'manual-completions-lifterlms');
			return;
		}
		$csv_data = array();
		foreach ($csv->data as $k => $data) {
			$csv_data[$k] = array();
			foreach ($data as $j => $val) {
				$j = str_replace(" ", "_", strtolower(trim($j)));
				$csv_data[$k][$j] = $val;
			}
		}

		if(!isset($csv_data[0]["user_id"]) || !isset($csv_data[0]["course_id"])) {
			$gbmc_manual_completions_lifter["upload_error"] = __('Upload Error: Invalid file format. Expected columns: user_id, course_id, section_id, lesson_id,  quiz_id ', 'manual-completions-lifterlms');
			return;
		}

		$uploaded_data = $courses = $course_structure = $rejected_rows = array();
		$allowed_columns = array("user_id", "course_id", "section_id", "lesson_id", "quiz_id");
		foreach ($csv_data as $k => $data) {
			$row = array();
			$empty_row = true;

			foreach ($allowed_columns as $col) {
				if(!empty($data[$col]))
					$empty_row = false;

				$row[$col] = (isset($data[$col]) && (is_numeric($data[$col]) || $data[$col] == "all"))? sanitize_text_field($data[$col]):"";
			}

			if($empty_row)
				continue;

			if(empty($row["user_id"])) {
				if(!empty($data["user_email"])) {
					$user = get_user_by("email", sanitize_email($data["user_email"]));
					if(!empty($user->ID))
						$row["user_id"] = $user->ID;
				}
			}
			if(empty($row["user_id"])) {
				if(!empty($data["user_login"])) {
					$user = get_user_by("login", sanitize_user($data["user_login"]));
					if(!empty($user->ID))
						$row["user_id"] = $user->ID;
				}
			}

			if(!empty($row["course_id"]) && !empty($row["user_id"])) {
				$course_id = $row["course_id"];
				if(!empty($courses[$course_id]))
					$course = $courses[$course_id];
				else {
					$course = get_post($course_id);
					if(!empty($course->ID) && $course->post_status == "publish" && $course->post_type == "course")
						$courses[$course_id] = $course;
					else
						$course = null;
				}

				if(empty($course->ID)) {
					$rejected_rows[] = $k + 2;
					continue;
				}

				if(!isset($course_structure[$course_id]))
					$course_structure[$course_id] = self::get_course_structure($course);

				if(!empty($row["section_id"]) && is_numeric($row["section_id"]) && empty($row["lesson_id"]) && empty($row["quiz_id"]))
					$row["lesson_id"] = "all";
				else if(empty($row["section_id"]) && empty($row["lesson_id"]) && empty($row["quiz_id"]))
					$row["section_id"] = "all";

				$uploaded_data[] = $row;
			}
			else
				$rejected_rows[] = $k + 2;
		}
		$gbmc_manual_completions_lifter["uploaded_data"] 	= $uploaded_data;
		$gbmc_manual_completions_lifter["course_structure"] = $course_structure;

		if(!empty($rejected_rows))
		$gbmc_manual_completions_lifter["upload_error"] = "Rejected Rows: ".implode(", ", $rejected_rows);
	}
	function menu() {
		global $submenu, $admin_page_hooks;
		$icon = plugin_dir_url(__FILE__)."img/icon-gb.png";

		if(empty( $admin_page_hooks[ "grassblade-lrs-settings" ] )) {
			add_menu_page("GrassBlade", "GrassBlade", "manage_options", "grassblade-lrs-settings", array($this, 'menu_page'), $icon, null);
			add_action("admin_print_styles", array($this, "manual_completions_lifter_scripts"));
		}

		add_submenu_page("grassblade-lrs-settings", __('Manual Completions LifterLMS', "manual-completions-lifterlms"), __('Manual Completions LifterLMS', "manual-completions-lifterlms"),'manage_options','grassblade-manual-completions-lifter', array($this, 'menu_page'));
		// Add for lifterLMS menu
		add_submenu_page("lifterlms", "Manual Completions", "Manual Completions",'manage_options','grassblade-manual-completions-lifter', array($this, 'menu_page'));
	}

	function form() {
		global $wpdb;
		$courses = get_posts("post_type=course&posts_per_page=-1&post_status=publish");
		$users   = $wpdb->get_results("SELECT ID, display_name, user_login, user_email FROM $wpdb->users ORDER BY display_name ASC");
		$this->manual_completions_lifter_scripts();
		include_once (dirname(__FILE__) . "/form.php");
	}
	function menu_page() {

	    if (!current_user_can('manage_options'))
	    {
	      wp_die( __('You do not have sufficient permissions to access this page.', 'manual-completions-lifterlms') );
	    }

		$grassblade_plugin_file_path = WP_PLUGIN_DIR . '/grassblade/grassblade.php';
		if(!defined("GRASSBLADE_VERSION") && file_exists($grassblade_plugin_file_path)) {
			$grassblade_plugin_data = get_plugin_data($grassblade_plugin_file_path);
			$grassblade_plugin_data['Version'] = empty($grassblade_plugin_data['Version'])? "":$grassblade_plugin_data['Version'];
			define('GRASSBLADE_VERSION', $grassblade_plugin_data['Version']);
		}

		$lifter_plugin_file_path = WP_PLUGIN_DIR . '/lifterlms/lifterlms.php';
		if(!defined("LIFTER_VERSION") && file_exists($lifter_plugin_file_path)) {
			$lifter_plugin_data = get_plugin_data($lifter_plugin_file_path);
			$lifter_plugin_data['Version'] = empty($lifter_plugin_data['Version'])? "":$lifter_plugin_data['Version'];

			define('LIFTER_VERSION', $lifter_plugin_data['Version']);
		}

		$dependency_active = true;

	    if (!file_exists($grassblade_plugin_file_path) ) {
	    	$xapi_td = '<td><img src="'.plugin_dir_url(__FILE__).'img/no.png"/> '.(defined("GRASSBLADE_VERSION")? GRASSBLADE_VERSION:"").'</td>';
	    	$xapi_td .= '<td>
							<a class="buy-btn" href="https://www.nextsoftwaresolutions.com/grassblade-xapi-companion/">'.__("Buy Now", "manual-completions-lifterlms").'</a>
						</td>';
	    	$dependency_active = false;
		}
	    else {
	    	$xapi_td = '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/> '.(defined("GRASSBLADE_VERSION")? GRASSBLADE_VERSION:"").'</td>';
	    	if ( !is_plugin_active('grassblade/grassblade.php') ) {
				$xapi_td .= '<td>'.$this->activate_plugin("grassblade/grassblade.php").'</td>';
		    	$dependency_active = false;
			}else {
	    		$xapi_td .= '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/></td>';
	    	}
	    }

	    if (!file_exists( $lifter_plugin_file_path ) ) {
	    	$lifter_td = '<td><img src="'.plugin_dir_url(__FILE__).'img/no.png"/> '.(defined("LIFTER_VERSION")? LIFTER_VERSION:"").'</td>';
	    	$lifter_td .= '<td colspan="2">
							<a class="buy-btn" href="'.$this->lifter_link.'">'.__("Buy Now", "manual-completions-lifterlms").'</a>
						</td>';
		    	$dependency_active = false;
	    }else
		if(defined("LIFTER_VERSION") && version_compare(LIFTER_VERSION, "4.0", "<")) {
			$tutor_td = '<td><img src="'.plugin_dir_url(__FILE__).'img/no.png"/> '.( defined("LIFTER_VERSION") ? LIFTER_VERSION . " | Required: 4.0+":"").'</td>';
			$tutor_td .= '<td>'.$this->update_plugin("lifterlms/lifterlms.php").'</td>';
			$dependency_active = false;
		}
	    else {
	    	$lifter_td = '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/> '.(defined("LIFTER_VERSION")? LIFTER_VERSION:"").'</td>';
	    	if ( !is_plugin_active('lifterlms/lifterlms.php') ) {
				$lifter_td .= '<td>'.$this->activate_plugin("lifterlms/lifterlms.php").'</td>';
		    	$dependency_active = false;
			} else {
	    		$lifter_td .= '<td><img src="'.plugin_dir_url(__FILE__).'img/check.png"/></td>';
	    	}
	    }

		if($dependency_active)
			$this->form();
		else {
			$allowed_html = array(
				'td' => array(
					'colspan' => array(),
					'class' => array(),
				),
				'img' => array(
					'src' => array(),
					'alt' => array(),
				),
				'a' => array(
					'href' => array(),
					'onclick' => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
					'style' => array(
						'display' => array(),
					),
					'id' => array(),
				),
			);
		?>
		<div id="manual_completions_lifter" class="manual_completions_lifter_requirements">
			<h2>
				<img style="margin-right: 10px;" src="<?php echo esc_url(plugin_dir_url(__FILE__)."img/icon_30x30.png"); ?>"/>
				Manual Completions for Lifter
			</h2>
			<hr>
			<div>
				<p class="text"><?php esc_html_e("To use Manual Completions for LifterLMS, you need to meet the following requirements.", "manual-completions-lifterlms") ?></p>
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
							<td><a class="links" href="https://www.nextsoftwaresolutions.com/grassblade-xapi-companion/">GrassBlade xAPI Companion</a></td>
							<?php echo wp_kses($xapi_td, $allowed_html); ?>
						</tr>
						<tr>
							<td>2. </td>
							<td><a class="links" href="<?php echo $this->lifter_link; ?>">LifterLMS</a></td>
							<?php echo wp_kses($lifter_td, $allowed_html); ?>
						</tr>
					</tbody>
				</table>
				<br>
			</div>
		</div>
	<?php }
	}
	/**
	 * Generate an activation URL for a plugin like the ones found in WordPress plugin administration screen.
	 *
	 * @param  string $plugin A plugin-folder/plugin-main-file.php path (e.g. "my-plugin/my-plugin.php")
	 *
	 * @return string         The plugin activation url
	 */
	function activate_plugin($plugin)
	{
		$activation_link = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . urlencode( $plugin ), 'activate-plugin_' . $plugin );
		$link = '<a href="#" onClick="return grassblade_lifter_plugin_activate_deactivate(jQuery(this),  \''.$activation_link.'\');">'.__("Activate").'<span id="gb_loading_animation" style="display:none; position:unset; margin-right: unset;"><span class="dashicons dashicons-update"></span></span></a>';
		return $link;
	}
	function update_plugin($plugin){
		$activation_link = wp_nonce_url( 'update.php?action=upgrade-plugin&amp;plugin=' . urlencode( $plugin ), 'upgrade-plugin_' . $plugin );
		$link = '<a href="#" onClick="return grassblade_lifter_plugin_activate_deactivate(jQuery(this),\''.$activation_link.'\');">'.__("Update").'<span id="gb_loading_animation" style="display:none; position:unset; margin-right: unset;"><span class="dashicons dashicons-update"></span></span></a>';
		return $link;
	}
	function lifter_submenu($add_submenu) {
		$add_submenu["manual_completions_lifter"] = array(
			"name"  => __('Manual Completions', "manual-completions-lifterlms"),
			"cap"   => 'manage_options',
			"link"  => 'admin.php?page=grassblade-manual-completions-lifter'
		);
		return $add_submenu;
	}

	function course_selected() {

		if(!current_user_can("manage_options") || empty($_REQUEST["course_id"]))
			$this->json_out(array("status" => 0));

		$course_id = intVal($_REQUEST["course_id"]);
		$course    = get_post($course_id);

		if(empty($course->ID) || $course->post_status != "publish")
			$this->json_out(array("status" => 0));

		$this->json_out(array("status" => 1, "data" => self::get_course_structure($course_id) ));
	}

	function get_course_structure($course_id) {

		$course_structure = new stdClass();
		$course_structure->course = get_post($course_id);

		$course	  = new LLMS_Course( $course_id );
		$sections = $course->get_sections("posts");
		$structure_sections = new stdClass();
		foreach ($sections as $section) {
			$section_id = $section->ID;
			$structure_sections->{$section_id} = new stdClass();
			$structure_sections->{$section_id}->section = $section;

			$section_ = new LLMS_Section( $section_id );
			$section_lessons = $section_->get_lessons( 'posts' );

			$lesson_structure = new stdClass();
			foreach($section_lessons as $lesson){
				$lesson_id = $lesson->ID;
				$lesson_structure->{$lesson_id} = new stdClass();
				$lesson->activity_id = grassblade_post_activityid($lesson_id);
				$lesson_structure->{$lesson_id}->lesson = $lesson;
				$lesson_structure->{$lesson_id} = self::add_xapi_content_structure($lesson_structure->{$lesson_id}, $lesson_id);
				$lesson_structure->{$lesson_id} = self::add_quiz_structure($lesson_structure->{$lesson_id});
			}
			$structure_sections->{$section_id}->lessons = $lesson_structure;
		}
		$course_structure->sections = $structure_sections;
		return $course_structure;
	}

	function add_quiz_structure($structure) {
		$lesson_post = llms_get_post( $structure->lesson );

		if(!$lesson_post->has_quiz())
			return $structure;

		$structure_quizzes = new stdClass();
		$lesson_quiz_id = $lesson_post->get( 'quiz' );

		$structure_quizzes->{$lesson_quiz_id} = new stdClass();
		$quiz = get_post($lesson_quiz_id);
		$quiz->activity_id = grassblade_post_activityid($lesson_quiz_id);
		$structure_quizzes->{$lesson_quiz_id}->quiz = $quiz;
		$structure_quizzes->{$lesson_quiz_id} = self::add_xapi_content_structure($structure_quizzes->{$lesson_quiz_id}, $lesson_quiz_id);
		$structure->quizzes = $structure_quizzes;

		return $structure;
	}
	function add_xapi_content_structure($structure, $post_id) {
		$xapi_content_ids = grassblade_xapi_content::get_post_xapi_contents( $post_id );

		if(!empty($xapi_content_ids) && is_array($xapi_content_ids)) {
			foreach ($xapi_content_ids as $xapi_content_id) {
				$xapi_content = get_post($xapi_content_id);
				if(!empty($xapi_content->ID) && $xapi_content->post_status == "publish") {
					$xapi_content->activity_id = grassblade_post_activityid($xapi_content->ID);

					if(empty($structure->xapi_contents))
						$structure->xapi_contents = array();

					$structure->xapi_contents[] = $structure->xapi_content = $xapi_content; //Multiple xAPI Contents supported only after LRS v2.3
				}
			}
		}
		return $structure;
	}

	function check_completion($return = false) {

		if(!current_user_can("manage_options") || empty($_REQUEST["data"]) || (!is_array($_REQUEST["data"]) && !is_object($_REQUEST["data"])) )
			$this->json_out(array("status" => 0, "message" => self::get_message("invalid_data")));

		$completions = map_deep( wp_unslash( $_REQUEST['data'] ), 'sanitize_text_field' );
		foreach ($completions as $k => $completion) {
			$course_id  = $completion["course_id"]  = intVal($completion["course_id"]);
			$section_id = $completion["section_id"] = (!empty($completion["section_id"]) && $completion["section_id"] != "all") ? intVal($completion["section_id"]) : 'all';
			$lesson_id  = $completion["lesson_id"]  = (!empty($completion["lesson_id"]) && $completion["lesson_id"] != "all") || $section_id == 'all' ? intVal($completion["lesson_id"]) : 'all';
			$quiz_id    = $completion["quiz_id"] 	= intVal($completion["quiz_id"]);
			$user_id    = $completion["user_id"] 	= intVal($completion["user_id"]);
			if(empty($course_id)) {
				$completions[$k]["message"] = self::get_message("course_not_selected");
				$completions[$k]["status"] = 0;
			}
			else
			if(empty($user_id)) {
				$completions[$k]["message"] = self::get_message("user_not_selected");
				$completions[$k]["status"] = 0;
			}
			else if( !llms_is_user_enrolled($user_id,$course_id) ) {
				$completions[$k]["message"] = self::get_message("not_enrolled");
				$completions[$k]["status"] = 0;
			}
			else
			{
				$completed = null;
				if(!empty($quiz_id))
					$completed = self::is_quiz_complete($quiz_id, $user_id);
				else if(!empty($lesson_id)) {
					$completed = ($lesson_id == "all") ? llms_is_complete($user_id, $section_id, "section") : llms_is_complete($user_id, $lesson_id, "lesson");
				}
				else if(!empty($section_id)) {
					$completed = ($section_id == "all") ? llms_is_complete($user_id, $course_id, "course") : llms_is_complete($user_id, $section_id, "section");
				}
				else
				{
					$completions[$k]["message"] = self::get_message("items_not_selected");
					$completions[$k]["status"] = 0;
				}
				if(isset($completed)) {
					global $lifter_course_statuses;
					$completions[$k]["message"] = is_bool($completed)? (empty($completed)? self::get_message("not_completed"):self::get_message("already_completed")):$lifter_course_statuses[$completed];
					$completions[$k]["status"] 	= 1;
					$completed = is_string($completed)? ($completed == "completed"):$completed;
					$completions[$k]["completed"] 	= intVal($completed);
				}
			}
		}
		if( $return )
			return $completions;

		$this->json_out( array("status" => 1, "data" => $completions) );
	}

	function mark_complete() {

		if(!current_user_can("manage_options") || empty($_REQUEST["data"]) || (!is_array($_REQUEST["data"]) && !is_object($_REQUEST["data"])) )
			$this->json_out(array("status" => 0, "message" => "Invalid Data"));

		$completions 	   = map_deep( wp_unslash( $_REQUEST['data'] ), 'sanitize_text_field' );
		$check_completions = $this->check_completion(true);

		foreach ($completions as $k => $completion) {
			if(!empty($check_completions[$k]) && !empty($check_completions[$k]["completed"])) {
				$completions[$k]["status"]  = 1;
				$completions[$k]["message"] = self::get_message("already_completed");
				$completions[$k]["info"]    = $check_completions[$k];
				continue;
			}
			$course_id  = $completion["course_id"]  = intval($completion["course_id"]);
			$section_id = $completion["section_id"] = (!empty($completion["section_id"]) && $completion["section_id"] != "all") ? intVal($completion["section_id"]) : 'all';
			$lesson_id  = $completion["lesson_id"]  = (!empty($completion["lesson_id"]) && $completion["lesson_id"] != "all") || $section_id == 'all' ? intVal($completion["lesson_id"]) : 'all';
			$quiz_id    = $completion["quiz_id"] 	= intVal($completion["quiz_id"]);
			$user_id    = $completion["user_id"] 	= intVal($completion["user_id"]);

			if(empty($course_id)) {
				$completions[$k]["message"] = self::get_message("course_not_selected");
				$completions[$k]["status"] = 0;
			}
			else
			if(empty($user_id)) {
				$completions[$k]["message"] = self::get_message("user_not_selected");
				$completions[$k]["status"] = 0;
			}
			else if( !llms_is_user_enrolled($user_id,$course_id) ) {
				$completions[$k]["message"] = self::get_message("not_enrolled");
				$completions[$k]["status"] = 0;
			}
			else
			{
				if(!empty($_REQUEST["force_completion"])) {
					$completions[$k]["a"] = __("Force Completion", "manual-completions-lifterlms");
					$force_completion 	  = true;
					remove_filter("lifter_process_mark_complete", "grassblade_lifter_process_mark_complete", 1, 3);
				} else {
					$force_completion = false;
				}
				if(!empty($quiz_id))
					$completions[$k] = self::mark_quiz_complete($completion);
				else if(!empty($lesson_id)) {
					if($lesson_id == "all")
						remove_filter("lifter_process_mark_complete", "grassblade_lifter_process_mark_complete", 1, 3);

					if($lesson_id == "all")
						$completions[$k] = self::mark_section_complete($completion);
					else
						$completions[$k] = self::mark_lesson_complete($completion, $force_completion);

					if(empty($_REQUEST["force_completion"]))
					if($lesson_id == "all");
					add_filter("lifter_process_mark_complete", "grassblade_lifter_process_mark_complete", 1, 3);
				}else if(!empty($section_id)) {
					if($section_id == "all")
						$completions[$k] = self::mark_course_complete($completion);
					else
						$completions[$k] = self::mark_section_complete($completion);
				}
				else
				{
					$completions[$k]["message"] = self::get_message("items_not_selected");
					$completions[$k]["status"] = 0;
				}
			}
		}
		self::json_out( array("status" => 1, "data" => $completions) );
	}
	function mark_course_complete($completion) {
		$course_id 		= !empty($completion["course_id"]) ? intval($completion["course_id"]) : 0;
		$user_id   		= !empty($completion["user_id"]) ? intval($completion["user_id"]) : 0;
		$course 		= get_post($course_id);
		$is_complete 	= llms_is_complete($user_id, $course_id, "course");
		if($is_complete) {
			$completion["message"] 	= self::get_message("already_completed");
			$completion["status"] 	= 1;
		}
		else {
			$course_structure = self::get_course_structure($course);
			if(!empty($course_structure->sections)) {
				foreach ($course_structure->sections as $section_id => $section) {
					$completion["info"]["section_".$section_id] = self::mark_section_complete(array("course_id" => $course_id, "user_id" => $user_id, "section_id" => $section_id), true);
				}
			}
		}
		$is_complete 			= llms_is_complete($user_id, $course_id, "course");
		$completion["status"]  	= ($is_complete)*1;
		$completion["message"]	= $is_complete ? self::get_message("completed") : self::get_message("failed");
		return $completion;
	}
	function mark_section_complete($completion) {
		$section_id 	= !empty($completion["section_id"]) ? intval($completion["section_id"]) : 0;
		$user_id 		= !empty($completion["user_id"]) ? intval($completion["user_id"]) : 0;
		$course_id 		= !empty($completion["course_id"]) ? intval($completion["course_id"]) : 0;

		$is_complete 	= llms_is_complete($user_id, $section_id, "section");
		if($is_complete) {
			$completion["message"] 	= self::get_message("already_completed");
			$completion["status"] 	= 1;
		}
		else {
			$section_ = new LLMS_Section( $section_id );
			$section_lessons = $section_->get_lessons( 'posts' );
			foreach($section_lessons as $lesson) {
				$completion["info"]["lesson_".$lesson->ID] = self::mark_lesson_complete(array("course_id" => $course_id, "user_id" => $user_id, "lesson_id" => $lesson->ID), true);
			}
		}

		$is_complete 			= llms_is_complete($user_id, $section_id, "section");
		$completion["status"]  	= ($is_complete)*1;
		$completion["message"]	= $is_complete ? self::get_message("completed") : self::get_message("failed");
		return $completion;
	}
	function mark_lesson_complete($completion, $force_completion = false) {

		$user_id 	= !empty($completion["user_id"])   ? intval($completion["user_id"]) : 0;
		$lesson_id 	= !empty($completion["lesson_id"]) ? intval($completion["lesson_id"]) : 0;
		$course_id 	= !empty($completion["course_id"]) ? intval($completion["course_id"]) : 0;

		if( empty($lesson_id) || empty($user_id) || empty($course_id) ) {
			$completion["message"] 	= self::get_message("invalid_request");
			$completion["status"] 	= 0;
			return $completion;
		}

		$is_complete = llms_is_complete($user_id, $lesson_id, "lesson");

		if( $is_complete ) {
			$completion["message"] = self::get_message("already_completed");
			$completion["status"]  = 1;
		}else{
			$lesson = llms_get_post($lesson_id);
			if($lesson->has_quiz()) {
				$quiz_id = $lesson->get( 'quiz' );

				if($force_completion)
					$completion["info"]["quiz_".$quiz_id] = self::mark_quiz_complete(array("quiz_id" => $quiz_id, "user_id" => $user_id));

				if( self::check_xapi_content_completion( $quiz_id, $user_id ) )
					$completion["info"]["quiz_".$quiz_id] = self::mark_quiz_complete(array("quiz_id" => $quiz_id, "user_id" => $user_id));

				$is_quiz_complete = self::is_quiz_complete($quiz_id, $user_id);

				if(!$is_quiz_complete) {
					$completion["status"]  = 0;
					$completion["message"] = self::get_message("failed"); //Quiz not completed

					return $completion;
				}
			}

			if($force_completion){
				llms_mark_complete($user_id, $lesson_id, "lesson");
			}
			else {
				$is_xapi_content_complete = self::check_xapi_content_completion( $lesson_id, $user_id );
				if( $is_xapi_content_complete ) {
					llms_mark_complete($user_id, $lesson_id, "lesson");
				}
			}
			$is_complete = llms_is_complete($user_id, $lesson_id, "lesson");

			$completion["status"]  = !empty($is_complete) ? 1 : 0;
			$completion["message"] = !empty($is_complete) ? self::get_message("completed") : self::get_message("failed");
		}
		return $completion;
	}
	function mark_quiz_complete($completion) {

		$quiz_id = !empty($completion["quiz_id"]) ? intval($completion["quiz_id"]) : 0;
		$user_id = !empty($completion["user_id"]) ? intval($completion["user_id"]) : 0;
		$user 	 = get_user_by("id", $user_id);

		if(empty($user->ID)) {
			$completion["message"] = self::get_message("user_not_selected");
			$completion["status"] = 0;
			return $completion;
		}

		$quiz 	= llms_get_post($quiz_id);
		$lesson = $quiz->get_lesson();
		$lesson_id 	  = $lesson->get( 'id' );

		$quiz_attempt = LLMS_Quiz_Attempt::init( $quiz_id, $lesson_id , $user->ID );
		$quiz_attempt->start();
		$quiz_attempt->set("grade", 100);
		$quiz_attempt->set_status("pass");
		$quiz_attempt->set( 'end_date', current_time( 'mysql' ) );
		$quiz_attempt->do_completion_actions();
		// clear "cached" grade so it's recalculated next time it's requested
		$quiz_attempt->get_student()->set( 'overall_grade', '' );
		$quiz_attempt->save();

		$quiz_status = $quiz_attempt->get('status');

		$completion["message"] = !empty($quiz_status) ? self::get_message("completed") : self::get_message("failed");
		$completion["status"]  = !empty($quiz_status) ? 1 : 0;
		return $completion;
	}

	function is_quiz_complete($quiz_id, $user_id) {
		$student = llms_get_student($user_id);
		$quiz    = llms_get_post( $quiz_id );

		// It pulls the best attempt of the user and its status (pass/fail) is decides if quiz is complete or not.
		$attempts = $student->quizzes()->get_attempts_by_quiz(
			$quiz->get( 'id' ),
			array(
				'per_page' => 1,
				'sort'     => array(
					'grade'       => 'DESC',
					'update_date' => 'DESC',
					'id'          => 'DESC',
				),
				'status'   => array( 'pass', 'fail' ),
			)
		);

		if(empty($attempts))
			return false;
		else
			return ($attempts[0]->l10n( 'status' ) == 'Fail') ? false : true; // Fail : Pass

		// Other methods in case we need in future: $attempt->get( 'attempt' ) | round( $attempt->get( 'grade' ), 2 ) . '%' | $attempt->l10n( 'status' ) )
	}

	static function check_xapi_content_completion($post_id, $user_id) {

		if(empty($post_id) || empty($user_id))
			return false;

		$user_id   = $user_id;
		$completed = grassblade_xapi_content::post_contents_completed($post_id, $user_id);

		if(is_bool($completed) && $completed) //No content
			return true;

		return (empty($completed) || count($completed) == 0) ? false : true;
	}
	function json_out($data) {
		header('Content-Type: application/json');
		echo wp_json_encode($data);
		exit();
	}

	function get_message($key) {
		$messages = array(
			"course_not_selected" => __("Course not selected.", "manual-completions-lifterlms"),
			"invalid_request" 	  => __("Invalid Request.", "manual-completions-lifterlms"),
			"items_not_selected"  => __("Quiz/Lesson/Section not selected.", "manual-completions-lifterlms"),
			"user_not_selected"   => __("User not selected.", "manual-completions-lifterlms"),
			"not_enrolled" 		  => __("User not enrolled to course.", "manual-completions-lifterlms"),
			"quiz_not_selected"   => __("Quiz not selected.", "manual-completions-lifterlms"),
			"lesson_not_selected" => __("Lesson not selected.", "manual-completions-lifterlms"),
			"already_completed"   => __("Already Completed!", "manual-completions-lifterlms"),
			"completed"			  => __("Successfully Marked Complete", "manual-completions-lifterlms"),
			"failed" 			  => __("Completion Failed", "manual-completions-lifterlms"),
			"invalid_data" 		  => __("Invalid Data", "manual-completions-lifterlms"),
			"not_completed"		  => __("Not Completed", "manual-completions-wpcourseware"),
		);
		return isset($messages[$key])? $messages[$key]:"";
	}
}

new gbmc_manual_completions_lifter();

<?php

/**
 * Fired during plugin activation
 *
 * @link       https://theinnovs.com
 * @since      1.0.0
 *
 * @package    Hr_Performance
 * @subpackage Hr_Performance/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Hr_Performance
 * @subpackage Hr_Performance/includes
 * @author     theinnovs <theinnovs@gmail.com>
 */
class Hr_Performance_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		self::create_database_tables();
		self::hr_performance_installation_time();
	}


	private static function hr_performance_installation_time() {
		$get_installation_time = strtotime("now");
		update_option( 'hr_performance_install_time', $get_installation_time );
	}

	public static function create_database_tables() {

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		global $wpdb;
		$collate = 'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4';
		$hr_performance = $wpdb->prefix . 'innovs_hr_performance';
		$performance_comments = $wpdb->prefix . 'innovs_hr_performance_comments';
		$performance_goal = $wpdb->prefix . 'innovs_hr_performance_goal';
		

		/** innovs Performance table */
		$sql1 = "CREATE TABLE $hr_performance (
			`pr_id` int(11) NOT NULL AUTO_INCREMENT,
			`review_date` date NOT NULL,
			`reporting` varchar(250) NOT NULL,
			`job_knowledge` varchar(250) NOT NULL,
			`work_quality` varchar(250) NOT NULL,
			`attendance_punctuality` varchar(250) NOT NULL,
			`communication_listening` varchar(250) NOT NULL,
			`learning_capability` varchar(250) NOT NULL,
			`responsibility` varchar(250) NOT NULL,
			`confidence_level` varchar(250) NOT NULL,
			`dedication_level` varchar(250) NOT NULL,
			`created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			`updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
			PRIMARY KEY (`pr_id`)
		   ) $collate";
		   dbDelta( $sql1 );

		$sql2 = "CREATE TABLE $performance_comments (
			`pc_id` int(11) NOT NULL AUTO_INCREMENT,
			`reference_date` date NOT NULL,
			`performance_reviewer` varchar(250) NOT NULL,
			`performance_comment` varchar(2000) NOT NULL,
			`created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			`updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
			PRIMARY KEY (`pc_id`)
		) $collate";
		dbDelta( $sql2 );		
		
		$sql3 = "CREATE TABLE $performance_goal (
			`pg_id` int(11) NOT NULL AUTO_INCREMENT,
			`pg_set_date` date NOT NULL,
			`pg_completion_date` date NOT NULL,
			`pg_description` text NOT NULL,
			`pg_emp_assessment` text NOT NULL,
			`pg_supervisor` varchar(250) NOT NULL,
			`pg_supervisor_assessment` text NOT NULL,
			`created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
			`updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
			PRIMARY KEY (`pg_id`)
		   ) $collate";
		dbDelta( $sql3 );

    }

}

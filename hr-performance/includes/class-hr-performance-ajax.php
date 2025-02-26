<?php

class Hr_Performance_Ajax{

    	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
        $this->version = $version;
        //$this->loader->add_action( 'wp_ajax_hr_performance_ajax_request', $plugin_admin, 'enqueue_ajax');
	}


    public function enqueue_ajax(){
        
        /* Golobal WP database */
		global $wpdb;
		/* Declar All table name */
		$umeta = $wpdb->prefix . "usermeta"; // Wordpress user meta table
		$users = $wpdb->prefix . "users"; // Wordpress User table
		$employee = $wpdb->prefix . "innovs_employee";
		$designation = $wpdb->prefix . "innovs_designation"; 
		$leave_policy = $wpdb->prefix . "innovs_leave_policy";
		$leave_request = $wpdb->prefix . "innovs_leave_request";
		$location  = $wpdb->prefix . "innovs_location";
		$department = $wpdb->prefix . "innovs_department";
		$holiday = $wpdb->prefix . "innovs_holiday";
		$entitlement = $wpdb->prefix . "innovs_leave_entitlement";
		$attendance = $wpdb->prefix . "innovs_attendance";
		$performance = $wpdb->prefix . 'innovs_hr_performance';
		$performance_comments = $wpdb->prefix . 'innovs_hr_performance_comments';
		$performance_goal = $wpdb->prefix . 'innovs_hr_performance_goal';
        

		$param = sanitize_text_field( isset($_REQUEST['param'])? $_REQUEST['param'] : "" );
		$id = sanitize_text_field( isset($_REQUEST['id'])? $_REQUEST['id'] : "" );

		/* Insert performance review data */
		if(!empty($param) && $param == "insert_performance_review"){

            $review_date = sanitize_text_field( $_POST['review_date'] );
            $reporting = sanitize_text_field( $_POST['reporting'] );
            $job_knowledge = sanitize_text_field( $_POST['job_knowledge'] );
            $work_quality = sanitize_text_field( $_POST['work_quality'] );
            $attendance_punctuality = sanitize_text_field( $_POST['attendance_punctuality'] );
            $communication_listening = sanitize_text_field( $_POST['communication_listening'] );
            $learning_capability = sanitize_text_field( $_POST['learning_capability'] );
            $responsibility = sanitize_text_field( $_POST['responsibility'] );
            $confidence_level = sanitize_text_field( $_POST['confidence_level'] );
			$dedication_level = sanitize_text_field( $_POST['dedication_level'] );
			
			
            $sql = "INSERT INTO $performance( review_date, reporting, job_knowledge, work_quality, attendance_punctuality,communication_listening, learning_capability, responsibility,confidence_level,dedication_level ) VALUES ('$review_date','$reporting','$job_knowledge','$work_quality','$attendance_punctuality','$communication_listening','$learning_capability','$responsibility','$confidence_level','$dedication_level')";

            $wpdb->query($sql);

		}
		elseif( !empty($param) && $param == "performance_review_show"){

			$datas = $wpdb->get_results( "SELECT * FROM $performance WHERE pr_id='$id'");
			
			foreach($datas as $data);
			echo json_encode($data);
		}
		
		elseif( !empty($param) && $param == "performance_review_update"){

			$review_date = sanitize_text_field( $_REQUEST['review_date'] );
            $reporting = sanitize_text_field( $_REQUEST['reporting'] );
            $job_knowledge = sanitize_text_field( $_REQUEST['job_knowledge'] );
            $work_quality = sanitize_text_field( $_REQUEST['work_quality'] );
            $attendance_punctuality = sanitize_text_field( $_REQUEST['attendance_punctuality'] );
            $communication_listening = sanitize_text_field( $_REQUEST['communication_listening'] );
            $learning_capability = sanitize_text_field( $_REQUEST['learning_capability'] );
            $responsibility = sanitize_text_field( $_REQUEST['responsibility'] );
            $confidence_level = sanitize_text_field( $_REQUEST['confidence_level'] );
			$dedication_level = sanitize_text_field( $_REQUEST['dedication_level'] );

			$sql = "UPDATE $performance SET
			review_date='$review_date',
			reporting='$reporting',
			job_knowledge='$job_knowledge',
			work_quality='$work_quality', 
			attendance_punctuality='$attendance_punctuality', 
			communication_listening='$communication_listening', 
			learning_capability='$learning_capability', 
			responsibility='$responsibility', 
			confidence_level='$confidence_level', 
			dedication_level='$dedication_level'
			WHERE pr_id ='$id'";

			$wpdb->query($sql);
		}
		
		elseif( !empty($param) && $param == "performance_review_delete"){

			$sql = "DELETE FROM $performance WHERE pr_id='$id'";
			$wpdb->query($sql);
		}
		//view performance number
		elseif( !empty($param) && $param == "view_performance_review_number"){

			$datas = $wpdb->get_results( "SELECT * FROM $performance WHERE pr_id='$id'");
			
			foreach($datas as $data);
			echo json_encode($data);
		}
	
		//Insert performance commert
		elseif( !empty($param) && $param == "insert_performance_comment"){

			$reference_date = sanitize_text_field( $_POST['reference_date'] );
            $performance_reviewer = sanitize_text_field( $_POST['performance_reviewer'] );
            $performance_comment = sanitize_text_field( $_POST['performance_comment'] );

            $sql = "INSERT INTO $performance_comments( reference_date, performance_reviewer, performance_comment ) VALUES ('$reference_date','$performance_reviewer','$performance_comment')";

            $wpdb->query($sql);
		}	
		elseif( !empty($param) && $param == "performance_comment_show"){
			
			$datas = $wpdb->get_results( "SELECT * FROM $performance_comments WHERE pc_id='$id'");
			
			foreach($datas as $data);
			echo json_encode($data);
		}	
		elseif( !empty($param) && $param == "performance_comment_update"){

			$reference_date = sanitize_text_field( $_REQUEST['reference_date'] );
            $performance_reviewer = sanitize_text_field( $_REQUEST['performance_reviewer'] );
            $performance_comment = sanitize_text_field( $_REQUEST['performance_comment'] );
            
			$sql = "UPDATE $performance_comments SET
			reference_date='$reference_date',
			performance_reviewer='$performance_reviewer',
			performance_comment='$performance_comment' 
			WHERE pc_id ='$id'";

			$wpdb->query($sql);
		}
		elseif( !empty($param) && $param == "performance_comment_delete"){

			$sql = "DELETE FROM $performance_comments WHERE pc_id='$id'";
			$wpdb->query($sql);
		}

		// Insert performance goal
		elseif( !empty($param) && $param == "insert_performance_goal"){
			$pg_set_date = sanitize_text_field( $_POST['pg_set_date'] );
            $pg_completion_date = sanitize_text_field( $_POST['pg_completion_date'] );
            $pg_description = sanitize_text_field( $_POST['pg_description'] );
            $pg_emp_assessment = sanitize_text_field( $_POST['pg_emp_assessment'] );
            $pg_supervisor = sanitize_text_field( $_POST['pg_supervisor'] );
            $pg_supervisor_assessment = sanitize_text_field( $_POST['pg_supervisor_assessment'] );

            $sql = "INSERT INTO $performance_goal( pg_set_date, pg_completion_date, pg_description,pg_emp_assessment,pg_supervisor,pg_supervisor_assessment ) VALUES ('$pg_set_date','$pg_completion_date','$pg_description','$pg_emp_assessment','$pg_supervisor','$pg_supervisor_assessment')";

            $wpdb->query($sql);
		}
		elseif( !empty($param) && $param == "performance_goal_show"){
			
			$datas = $wpdb->get_results( "SELECT * FROM $performance_goal WHERE pg_id='$id'");
			
			foreach($datas as $data);
			echo json_encode($data);
		}
		elseif( !empty($param) && $param == "performance_goal_update"){

			$pg_set_date = sanitize_text_field( $_REQUEST['pg_set_date'] );
            $pg_completion_date = sanitize_text_field( $_REQUEST['pg_completion_date'] );
            $pg_description = sanitize_text_field( $_REQUEST['pg_description'] );
            $pg_emp_assessment = sanitize_text_field( $_REQUEST['pg_emp_assessment'] );
            $pg_supervisor = sanitize_text_field( $_REQUEST['pg_supervisor'] );
            $pg_supervisor_assessment = sanitize_text_field( $_REQUEST['pg_supervisor_assessment'] );
            
			$sql = "UPDATE $performance_goal SET
			pg_set_date='$pg_set_date',
			pg_completion_date='$pg_completion_date',
			pg_description='$pg_description',
			pg_emp_assessment='$pg_emp_assessment',
			pg_supervisor='$pg_supervisor',
			pg_supervisor_assessment='$pg_supervisor_assessment' 
			WHERE pg_id ='$id'";

			$wpdb->query($sql);
		}
		elseif( !empty($param) && $param == "performance_goal_delete"){

			$sql = "DELETE FROM $performance_goal WHERE pg_id='$id'";
			$wpdb->query($sql);
		}

	

        wp_die();
  
    }


}


?>
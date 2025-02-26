
<?php

    $innovs_diff_date = new Hr_performance_functions(); // Data difference function
    $get_employee = Hr_Performance_Controller::get_employee();
    $create_performance = Hr_Performance_Controller::create_performance_review();
    $create_performance_comment = Hr_Performance_Controller::create_performance_comment();
    $create_performance_goal = Hr_Performance_Controller::create_performance_goal();
    

?>


<div class="wrap">
    <h1><?php _e('Employee Performance', 'hr-performance'); ?></h1>
    
    <div class="performance review">
        <!-- <div class="title">
            <h5>Performance Reviews</h5><a href="#" data-toggle="modal" data-target=".addnew-performance"><span class="dashicons dashicons-plus"></span> Add</a>
        </div> -->

        <div class="postbox innovs-hrm-postbox">
            <div class="title lms-table-title">
                <span><?php _e('Performance Reviews' , 'hr-performance');?></span> <a href="#" data-toggle="modal" style="display:<?php echo esc_attr($none); ?>" data-target=".addnew-performance" class="lms-add-new-btn" ><?php echo esc_attr(get_option('add_new_btn_label'));?> <span class="dashicons dashicons-plus-alt2"></span></a>
            </div> 
        </div>

        <table class="widefat" id="performance_review_table">
            <thead>
                <tr>
                    <th><?php _e('Date' , 'hr-performance');?></th>
                    <th><?php _e('Reporting To' , 'hr-performance');?></th>
                    <th><?php _e('Job Knowledge' , 'hr-performance');?></th>
                    <th><?php _e('Work Quality' , 'hr-performance');?></th>
                    <th><?php _e('Punctuality' , 'hr-performance');?></th>
                    <th><?php _e('Communication' , 'hr-performance');?></th>
                    <th><?php _e('Learning capability' , 'hr-performance');?></th>
                    <th><?php _e('Responsibility' , 'hr-performance');?></th>
                    <th><?php _e('Confidence' , 'hr-performance');?></th>
                    <th><?php _e('Dedication' , 'hr-performance');?></th>
                    <th><?php _e('Overall' , 'hr-performance');?></th>
                    <th><?php _e('Action' , 'hr-performance');?></th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    foreach($create_performance as $data):
                        // print_r($data);die;
                        if($data->job_knowledge == 60){
                            $job_knowledge = 'Very Bad';
                        }
                ?>
                <tr>
                    <td><?php echo esc_attr( $data->review_date );?></td>
                    <td><?php _e( esc_attr($data->emp_name ), 'hr-performance') ;?></td>
                    <td>
                        <?php if($data->job_knowledge == 60){
                                _e(esc_attr( $job_knowledge = 'Very Bad', 'hr-performance') );
                            }elseif($data->job_knowledge == 70){
                                _e(esc_attr( $job_knowledge = 'Poor' ), 'hr-performance');
                            }elseif($data->job_knowledge == 80){
                                _e(esc_attr( $job_knowledge = 'Average' ), 'hr-performance');
                            }elseif($data->job_knowledge == 90){
                                _e(esc_attr( $job_knowledge = 'Good' ), 'hr-performance');
                            }elseif($data->job_knowledge == 100){
                                _e(esc_attr( $job_knowledge = 'Fast' ),'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data->work_quality == 60){
                                _e(esc_attr( $work_quality = 'Very Bad' ), 'hr-performance');
                            }elseif($data->work_quality == 70){
                                _e(esc_attr( $work_quality = 'Poor' ), 'hr-performance');
                            }elseif($data->work_quality == 80){
                                _e(esc_attr( $work_quality = 'Average' ),'hr-performance');
                            }elseif($data->work_quality == 90){
                                _e(esc_attr( $work_quality = 'Good' ), 'hr-performance');
                            }elseif($data->work_quality == 100){
                                _e(esc_attr( $work_quality = 'Fast' ), 'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data->attendance_punctuality == 60){
                                _e(esc_attr( $attendance_punctuality = 'Very Bad' ), 'hr-performance');
                            }elseif($data->attendance_punctuality == 70){
                                _e(esc_attr( $attendance_punctuality = 'Poor' ), 'hr-performance');
                            }elseif($data->attendance_punctuality == 80){
                                _e(esc_attr( $attendance_punctuality = 'Average' ), 'hr-performance');
                            }elseif($data->attendance_punctuality == 90){
                                _e(esc_attr( $attendance_punctuality = 'Good' ), 'hr-performance');
                            }elseif($data->attendance_punctuality == 100){
                                _e(esc_attr( $attendance_punctuality = 'Fast' ),'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data->communication_listening == 60){
                                _e(esc_attr( $communication_listening = 'Very Bad' ), 'hr-performance');
                            }elseif($data->communication_listening == 70){
                                _e(esc_attr( $communication_listening = 'Poor' ), 'hr-performance');
                            }elseif($data->communication_listening == 80){
                                _e(esc_attr( $communication_listening = 'Average' ), 'hr-performance');
                            }elseif($data->communication_listening == 90){
                                _e(esc_attr( $communication_listening = 'Good' ), 'hr-performance');
                            }elseif($data->communication_listening == 100){
                                _e(esc_attr( $communication_listening = 'Fast' ),'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data->learning_capability == 60){
                                _e(esc_attr( $learning_capability = 'Very Bad' ), 'hr-performance');
                            }elseif($data->learning_capability == 70){
                                _e(esc_attr( $learning_capability = 'Poor' ), 'hr-performance');
                            }elseif($data->learning_capability == 80){
                                _e(esc_attr( $learning_capability = 'Average' ), 'hr-performance');
                            }elseif($data->learning_capability == 90){
                                _e(esc_attr( $learning_capability = 'Good' ), 'hr-performance');
                            }elseif($data->learning_capability == 100){
                                _e(esc_attr( $learning_capability = 'Fast' ),'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data->responsibility == 60){
                                _e(esc_attr( $responsibility = 'Very Bad' ), 'hr-performance');
                            }elseif($data->responsibility == 70){
                                _e(esc_attr( $responsibility = 'Poor' ), 'hr-performance');
                            }elseif($data->responsibility == 80){
                                _e(esc_attr( $responsibility = 'Average' ), 'hr-performance');
                            }elseif($data->responsibility == 90){
                                _e(esc_attr( $responsibility = 'Good' ), 'hr-performance');
                            }elseif($data->responsibility == 100){
                                _e(esc_attr( $responsibility = 'Fast' ),'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data->confidence_level == 60){
                                _e(esc_attr( $confidence_level = 'Very Bad' ), 'hr-performance');
                            }elseif($data->confidence_level == 70){
                                _e(esc_attr( $confidence_level = 'Poor' ), 'hr-performance');
                            }elseif($data->confidence_level == 80){
                                _e(esc_attr( $confidence_level = 'Average' ), 'hr-performance');
                            }elseif($data->confidence_level == 90){
                                _e(esc_attr( $confidence_level = 'Good' ), 'hr-performance');
                            }elseif($data->confidence_level == 100){
                                _e(esc_attr( $confidence_level = 'Fast' ),'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data->dedication_level == 60){
                                _e(esc_attr( $dedication_level = 'Very Bad' ), 'hr-performance');
                            }elseif($data->dedication_level == 70){
                                _e(esc_attr( $dedication_level = 'Poor' ), 'hr-performance');
                            }elseif($data->dedication_level == 80){
                                _e(esc_attr( $dedication_level = 'Average' ), 'hr-performance');
                            }elseif($data->dedication_level == 90){
                                _e(esc_attr( $dedication_level = 'Good' ), 'hr-performance');
                            }elseif($data->dedication_level == 100){
                                _e(esc_attr( $dedication_level = 'Fast' ),'hr-performance');
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            $adding = $data->job_knowledge + $data->work_quality + $data->attendance_punctuality + $data->communication_listening + $data->learning_capability + $data->responsibility + $data->confidence_level + $data->dedication_level;
                            $divide = $adding / 8;
                            if($divide <= 60){
                                echo "<span style='background:#ff0000; color: #fff; padding:5px 10px'>Very Bad</span>";
                            }elseif($divide <= 70){
                                echo "<span style='background:#dc3545; color: #fff; padding:5px 21px'>Poor</span>";
                            }elseif($divide <= 80){
                                echo "<span style='background:#2f7ece; color: #fff; padding:5px 11px'>Average</span>";
                            }elseif($divide <= 90){
                                echo "<span style='background:#28a745; color: #fff; padding:5px 19px'>Good</span>";
                            }elseif($divide <= 100){
                                echo "<span style='background:#ffb600; color: #fff; padding:5px 10px'>Fast</span>";
                            }
                        ?>
                    </td>
                    <td>
                        <span id="view_performance_number" data-id="<?php echo esc_attr( $data->pr_id ); ?>" class="dashicons dashicons-visibility hrm-cp"></span>
                        <span id="edit_performance_review" data-id="<?php echo esc_attr( $data->pr_id ); ?>" class="dashicons dashicons-edit-page hrm-cp"></span>
                        <span id="delete_performance_review" data-id="<?php echo esc_attr( $data->pr_id ); ?>" class="dashicons dashicons-trash hrm-cp"></span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> <!-- End performance review class div -->

    <div class="performance comments">

        <div class="postbox innovs-hrm-postbox">
            <div class="title lms-table-title">
                <span><?php _e('Performance Comments', 'hr-performance'); ?></span> <a href="#" data-toggle="modal" style="display:<?php echo esc_attr($none); ?>" data-target=".addnew-performance-comment" class="lms-add-new-btn" ><?php _e(esc_attr(get_option('add_new_btn_label')), 'Performance Comments');?> <span class="dashicons dashicons-plus-alt2"></span></a>
            </div> 
        </div>

        <table class="widefat" id="performance_comment_table">
            <thead>
                <tr>
                    <th><?php _e('Date', 'hr-performance'); ?></th>
                    <th><?php _e('Reviewer', 'hr-performance'); ?></th>
                    <th><?php _e('Comment', 'hr-performance'); ?></th>
                    <th><?php _e('Action', 'hr-performance'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    foreach($create_performance_comment as $data):
                ?>
                <tr>
                    <td><?php _e(esc_attr( $data->reference_date ), 'hr-performance');?></td>
                    <td><?php _e(esc_attr( $data->emp_name ), 'hr-performance');?></td>
                    <td><?php _e(esc_attr( $data->performance_comment ), 'hr-performance'); ?> </td>
                  
                    <td><span id="edit_performance_comment" data-id="<?php echo esc_attr( $data->pc_id ); ?>" class="dashicons dashicons-edit-page hrm-cp"></span> <span id="delete_performance_comment" data-id="<?php echo esc_attr($data->pc_id); ?>" class="dashicons dashicons-trash innovs-delete-btn"></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> <!-- End performance Comments class div -->


    <div class="performance goals">

        <div class="postbox innovs-hrm-postbox">
            <div class="title lms-table-title">
                <span><?php _e('Performance Goals', 'hr-performance'); ?></span> <a href="#" data-toggle="modal" style="display:<?php echo esc_attr($none); ?>" data-target=".addnew-performance-goal" class="lms-add-new-btn" ><?php _e(esc_attr(get_option('add_new_btn_label')), 'hr-performance');?> <span class="dashicons dashicons-plus-alt2"></span></a>
            </div> 
        </div>

        <table class="widefat" id="performance_goal_table">
            <thead>
                <tr>
                    <th><?php _e('Set Date', 'hr-performance'); ?></th>
                    <th><?php _e('Completion Date', 'hr-performance'); ?> </th>
                    <th><?php _e('Goal Description', 'hr-performance'); ?></th>
                    <th><?php _e('Employee Assessment', 'hr-performance'); ?></th>
                    <th><?php _e('Supervisor', 'hr-performance'); ?></th>
                    <th><?php _e('Supervisor Assessment', 'hr-performance'); ?></th>
                    <th><?php _e('Improvement Days', 'hr-performance'); ?></th>
                    <th><?php _e('Action', 'hr-performance'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    foreach($create_performance_goal as $data):
                        //print_r($data); die;
                ?>
                <tr>
                    <td><?php _e(esc_attr($data->pg_set_date ), 'hr-performance');?></td>
                    <td><?php _e(esc_attr($data->pg_completion_date ),'hr-performance');?></td>
                    <td><?php _e(esc_attr($data->pg_description ), 'hr-performance');?></td>
                    <td><?php _e(esc_attr($data->pg_emp_assessment), 'hr-performance');?></td>
                    <td><?php _e(esc_attr($data->emp_name ), 'hr-performance');?></td>
                    <td><?php _e(esc_attr($data->pg_supervisor_assessment ), 'hr-performance'); ?> </td>
                    <td><?php $innovs_diff_date->innovs_diff_date( $data->pg_set_date, $data->pg_completion_date); ?> </td>
                  
                    <td><span id="edit_performance_goal" data-id="<?php echo esc_attr( $data->pg_id ); ?>" class="dashicons dashicons-edit-page hrm-cp"></span> <span id="delete_performance_goal" data-id="<?php echo esc_attr($data->pg_id); ?>" class="dashicons dashicons-trash innovs-delete-btn"></span></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> <!-- End performance Goals class div -->


</div> <!-- End Wrap div -->

<?php
    include_once plugin_dir_path( __FILE__ ) . '/add/hr-performance.php';

    include_once plugin_dir_path( __FILE__ ) . '/edit/hr-performance.php';
?>


<!-- Performance review edit modal -->
<div class="modal fade bd-example-modal-lg edit-performance" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header lms-modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php _e('Update Performance Reviews', 'hr-performance'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

        <form method="post" action="" id="edit_performance_form" class="add-new-performance-form">

            <table class="table table-borderless add-new-performance">
                <input type="hidden" id="hrp_u_pr_id">
                <tr>
                    <td><?php _e('Review Date', 'hr-performance'); ?></td>
                    <td><input name="review_date" id="hrp_u_review_date" autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td><?php _e('Reporting To', 'hr-performance'); ?></td>
                    <td>
                        <select name="reporting" required id="hrp_u_reporting" class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <?php foreach( $get_employee as $emp ): ?>
                            <option value="<?php echo $emp->userID; ?>"><?php echo $emp->emp_name ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Job Knowledge', 'hr-performance'); ?></td>
                    <td>
                        <select name="job_knowledge" id="hrp_u_job_knowledge" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Work Quality', 'hr-performance'); ?></td>
                    <td>
                        <select name="work_quality" id="hrp_u_work_quality" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td><?php _e('Attendance/Punctuality', 'hr-performance'); ?></td>
                    <td>
                        <select name="attendance_punctuality" id="hrp_u_attendance_punctuality" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr> 
                <tr>
                    <td><?php _e('Communication/Listening', 'hr-performance'); ?></td>
                    <td>
                        <select name="communication_listening" id="hrp_u_communication_listening" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Learning capability', 'hr-performance'); ?></td>
                    <td>
                        <select name="learning_capability" id="hrp_u_learning_capability" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Responsibility', 'hr-performance'); ?></td>
                    <td>
                        <select name="responsibility" id="hrp_u_responsibility" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Confidence Level', 'hr-performance'); ?></td>
                    <td>
                        <select name="confidence_level" id="hrp_u_confidence_level" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Dedication Level', 'hr-performance'); ?></td>
                    <td>
                        <select name="dedication_level" id="hrp_u_dedication_level" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?></option>
                            <option value="70"><?php _e('Poor', 'hr-performance'); ?></option>
                            <option value="80"><?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"><?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"><?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr>
            </table>

        </div> <! -- End modal body -->

            <div class="modal-footer lms-modal-footer">
                <button type="submit" name="edit_performance" class="btn btn-primary lms-insert-btn" id="edit_performance"><?php _e('Update', 'hr-performance'); ?></button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- Performance Comment edit modal -->
<div class="modal fade bd-example-modal-lg edit-performance-comment" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header lms-modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php _e('Update Performance Comment', 'hr-performance'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

        <form method="post" action="" id="edit_performance_comment_form" class="add-new-performance-comment-form">

            <table class="table table-borderless add-new-performance-comment">
            <input type="hidden" id="u_pc_id">
                <tr>
                    <td><?php _e('Reference Date', 'hr-performance'); ?></td>
                    <td><input name="reference_date" id="u_reference_date" autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td><?php _e('Reviewer', 'hr-performance'); ?></td>
                    <td>
                        <select name="performance_reviewer" id="u_performance_reviewer" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <?php foreach( $get_employee as $emp ): ?>
                            <option value="<?php echo $emp->userID; ?>"><?php _e($emp->emp_name, 'hr-performance');?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Comments', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="performance_comment" id="u_performance_comment" cols="" rows=""></textarea>
                    </td>
                </tr>
             
            </table>

        </div> <! -- End modal body -->

            <div class="modal-footer lms-modal-footer">
                <button type="submit" name="edit_performance_comment" class="btn btn-primary lms-insert-btn" id="edit_performance_comment_btn"><?php _e('Update Comment', 'hr-performance'); ?></button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- Performance Goals add new modal -->
<div class="modal fade bd-example-modal-lg edit-performance-goal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header lms-modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php _e('Update Performance Goals', 'hr-performance'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

        <form method="post" action="" id="edit_performance_goal_form" class="add-new-performance-goal-form">

            <table class="table table-borderless add-new-performance-goal">
                <input type="hidden" id="u_pg_pg_id">
                <tr>
                    <td><?php _e('Set Date', 'hr-performance'); ?></td>
                    <td><input name="pg_set_date" id="u_pg_set_date" autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td><?php _e('Completion Date', 'hr-performance'); ?></td>
                    <td><input name="pg_completion_date" id=u_pg_completion_date autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td><?php _e('Goal Description', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="pg_description" id="u_pg_description" cols="" rows=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Employee Assessment', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="pg_emp_assessment" id="u_pg_emp_assessment" cols="" rows=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Supervisor', 'hr-performance'); ?></td>
                    <td>
                        <select name="pg_supervisor" id="u_pg_supervisor" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <?php foreach( $get_employee as $emp ): ?>
                            <option value="<?php echo $emp->userID; ?>"><?php _e(esc_attr($emp->emp_name ), 'hr-performance');?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Supervisor Assessment', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="pg_supervisor_assessment" id="u_pg_supervisor_assessment" cols="" rows=""></textarea>
                    </td>
                </tr>
             
            </table>

        </div> <! -- End modal body -->

            <div class="modal-footer lms-modal-footer">
                <button type="submit" name="add_performance_goal" class="btn btn-primary lms-insert-btn" id="edit_performance_goal_btn"><?php _e('Update Goals', 'hr-performance'); ?></button>
            </div>
        </form>

    </div>
  </div>
</div>


<!-- View Performance review number -->
<div class="modal fade bd-example-modal-lg view-performance" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header lms-modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php _e('View Performance Score', 'hr-performance'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

        <form method="post" action="" id="view_performance_form" class="add-new-performance-form">

            <table class="table table-borderless add-new-performance">
                <input type="hidden" id="hrp_v_pr_id">
                <tr>
                    <td><?php _e('Job Knowledge', 'hr-performance'); ?></td>
                    <td id="hrp_v_job_knowledge"></td>
                </tr>
                <tr>
                    <td><?php _e('Work Quality', 'hr-performance'); ?></td>
                    <td id="hrp_v_work_quality"> </td>
                </tr> 
                <tr>
                    <td><?php _e('Attendance/Punctuality', 'hr-performance'); ?></td>
                    <td id="hrp_v_attendance_punctuality"></td>
                </tr> 
                <tr>
                    <td><?php _e('Communication/Listening', 'hr-performance'); ?></td>
                    <td id="hrp_v_communication_listening"></td>
                </tr>
                <tr>
                    <td><?php _e('Learning capability', 'hr-performance'); ?></td>
                    <td id="hrp_v_learning_capability"></td>
                </tr>
                <tr>
                    <td><?php _e('Responsibility', 'hr-performance'); ?></td>
                    <td id="hrp_v_responsibility"></td>
                </tr>
                <tr>
                    <td><?php _e('Confidence Level', 'hr-performance'); ?></td>
                    <td id="hrp_v_confidence_level"></td>
                </tr>
                <tr>
                    <td><?php _e('Dedication Level', 'hr-performance'); ?></td>
                    <td id="hrp_v_dedication_level"></td>
                </tr>
            </table>

        </div> <! -- End modal body -->

            <!-- <div class="modal-footer lms-modal-footer">
                <button type="submit" name="edit_performance" class="btn btn-primary lms-insert-btn" id="edit_performance">Update</button>
            </div> -->
        </form>

    </div>
  </div>
</div>
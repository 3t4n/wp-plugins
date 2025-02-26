
<!-- Performance review add new modal -->
<div class="modal fade bd-example-modal-lg addnew-performance" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header lms-modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <?php _e('Performance Reviews', 'hr-performance'); ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

        <form method="post" action="" id="add_new_performance_form" class="add-new-performance-form">

            <table class="table table-borderless add-new-performance">
                <tr>
                    <td> <?php _e('Review Date', 'hr-performance'); ?></td>
                    <td><input name="review_date" autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td> <?php _e('Reporting To', 'hr-performance'); ?> </td>
                    <td>
                        <select name="reporting" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', ''); ?></option>
                            <?php foreach( $get_employee as $emp ): ?>
                            <option value="<?php echo $emp->userID; ?>"><?php _e($emp->emp_name, 'hr-performance') ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> <?php _e('Job Knowledge', 'hr-performance'); ?> </td>
                    <td>
                        <select name="job_knowledge" required class="hr-performance-select">
                            <option value=""> <?php _e('- Select -', 'hr-performance'); ?> </option>
                            <option value="60"> <?php _e('Very Bad', 'hr-performance'); ?> </option>
                            <option value="70"> <?php _e('Poor', 'hr-performance'); ?> </option>
                            <option value="80"> <?php _e('Average', 'hr-performance'); ?></option>
                            <option value="90"> <?php _e('Good', 'hr-performance'); ?></option>
                            <option value="100"> <?php _e('Fast', 'hr-performance'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Work Quality', 'hr-performance'); ?></td>
                    <td>
                        <select name="work_quality" required class="hr-performance-select">
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
                        <select name="attendance_punctuality" required class="hr-performance-select">
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
                        <select name="communication_listening" required class="hr-performance-select">
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
                        <select name="learning_capability" required class="hr-performance-select">
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
                        <select name="responsibility" required class="hr-performance-select">
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
                        <select name="confidence_level" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?> </option>
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
                        <select name="dedication_level" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <option value="60"><?php _e('Very Bad', 'hr-performance'); ?> </option>
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
                <button type="submit" name="add_performance" class="btn btn-primary lms-insert-btn" id="add_new_performance"><?php _e('Add Performance', 'hr-performance'); ?></button>
            </div>
        </form>

    </div>
  </div>
</div>



<!-- Performance Comment add new modal -->
<div class="modal fade bd-example-modal-lg addnew-performance-comment" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header lms-modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php _e('Performance Comment', 'hr-performance'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

        <form method="post" action="" id="add_new_performance_comment_form" class="add-new-performance-comment-form">

            <table class="table table-borderless add-new-performance-comment">
                <tr>
                    <td><?php _e('Reference Date', 'hr-performance'); ?></td>
                    <td><input name="reference_date" autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td><?php _e('Performance Reviews', 'hr-performance'); ?>Reviewer</td>
                    <td>
                        <select name="performance_reviewer" required class="hr-performance-select">
                            <option value=""><?php _e('- Select -', 'hr-performance'); ?></option>
                            <?php foreach( $get_employee as $emp ): ?>
                            <option value="<?php echo $emp->userID; ?>"><?php _e($emp->emp_name , 'hr-performance') ;?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Comments', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="performance_comment" id="" cols="" rows=""></textarea>
                    </td>
                </tr>
             
            </table>

        </div> <! -- End modal body -->

            <div class="modal-footer lms-modal-footer">
                <button type="submit" name="add_performance_comment" class="btn btn-primary lms-insert-btn" id="add_new_performance_comment"><?php _e('Add Comment', 'hr-performance'); ?></button>
            </div>
        </form>

    </div>
  </div>
</div>


<!-- Performance Goals add new modal -->
<div class="modal fade bd-example-modal-lg addnew-performance-goal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header lms-modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php _e('Performance Goals', 'hr-performance'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

        <form method="post" action="" id="add_new_performance_goal_form" class="add-new-performance-goal-form">

            <table class="table table-borderless add-new-performance-goal">
                <tr>
                    <td><?php _e('Set Date', 'hr-performance'); ?></td>
                    <td><input name="pg_set_date" autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td><?php _e('Completion Date', 'hr-performance'); ?></td>
                    <td><input name="pg_completion_date" autocomplete="off" required class="hr_datepicker" placeholder="<?php echo date('y-m-d'); ?>" type="text"></td>
                </tr>
                <tr>
                    <td><?php _e('Goal Description', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="pg_description" id="" cols="" rows=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Employee Assessment', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="pg_emp_assessment" id="" cols="" rows=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Supervisor', 'hr-performance'); ?></td>
                    <td>
                        <select name="pg_supervisor" required class="hr-performance-select">
                            <option value="">- Select -</option>
                            <?php foreach( $get_employee as $emp ): ?>
                            <option value="<?php echo $emp->userID; ?>"><?php _e( esc_attr($emp->emp_name ), 'hr-performance');?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php _e('Supervisor Assessment', 'hr-performance'); ?></td>
                    <td>
                        <textarea class="form-control" name="pg_supervisor_assessment" id="" cols="" rows=""></textarea>
                    </td>
                </tr>
             
            </table>

        </div> <! -- End modal body -->

            <div class="modal-footer lms-modal-footer">
                <button type="submit" name="add_performance_goal" class="btn btn-primary lms-insert-btn" id="add_new_performance_goal"><?php _e('Add Goals', 'hr-performance'); ?></button>
            </div>
        </form>

    </div>
  </div>
</div>
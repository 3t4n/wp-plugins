(function($) {


    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    // $( window ).load(function() {
    // 	$( "#dialog" ).dialog();
    //  });


   
    // Insert performance review data using ajax
    $('#add_new_performance').on('click', function() {

        var postDate = $('#add_new_performance_form').serialize() + "&action=hr_performance_ajax_request&param=insert_performance_review";
        $.post(hr_performance_ajax_url, postDate, function(response) {

        });
    }); // End Insert data using ajax

    $('#performance_review_table').on('click', '#delete_performance_review', function(e){
        e.preventDefault();
        var con = confirm('Are you sure want to delete?');
        if (con) {
            var dataId = $(this).attr('data-id');
            var postDate = "action=hr_performance_ajax_request&param=performance_review_delete&id=" + dataId;
            $.post(hr_performance_ajax_url, postDate, function(response) {

            });

            var tr = $(this).closest("tr");
            tr.css("background-color", "#FF3700");
            tr.fadeOut(1000, function() {
                tr.remove();
            });
        }
        return false;
    });
    // Show performance review data using ajax on Modal
    $('#edit_performance_review').on('click', function() {
        var dataId = $(this).attr('data-id');
        var postData = "action=hr_performance_ajax_request&param=performance_review_show&id=" + dataId;
        $.post(hr_performance_ajax_url, postData, function(response) {
            var data = $.parseJSON(response);

            $('#hrp_u_pr_id').val(data.pr_id );
            $('#hrp_u_review_date').val(data.review_date);
            $('#hrp_u_reporting').val(data.reporting);
            $('#hrp_u_job_knowledge').val(data.job_knowledge);
            $('#hrp_u_work_quality').val(data.work_quality);
            $('#hrp_u_attendance_punctuality').val(data.attendance_punctuality);
            $('#hrp_u_communication_listening').val(data.communication_listening);
            $('#hrp_u_learning_capability').val(data.learning_capability);
            $('#hrp_u_responsibility').val(data.responsibility);
            $('#hrp_u_confidence_level').val(data.confidence_level);
            $('#hrp_u_dedication_level').val(data.dedication_level);
            
            $('.edit-performance').modal('show');

        });
    });    
    
    // Show performance review data using ajax on Modal
    $('#view_performance_number').on('click', function() {
        var dataId = $(this).attr('data-id');
        var postData = "action=hr_performance_ajax_request&param=view_performance_review_number&id=" + dataId;
        $.post(hr_performance_ajax_url, postData, function(response) {
            var data = $.parseJSON(response);

            $('#hrp_v_pr_id').val(data.pr_id );
            
            $('#hrp_v_job_knowledge').html(data.job_knowledge);
            $('#hrp_v_work_quality').html(data.work_quality);
            $('#hrp_v_attendance_punctuality').html(data.attendance_punctuality);
            $('#hrp_v_communication_listening').html(data.communication_listening);
            $('#hrp_v_learning_capability').html(data.learning_capability);
            $('#hrp_v_responsibility').html(data.responsibility);
            $('#hrp_v_confidence_level').html(data.confidence_level);
            $('#hrp_v_dedication_level').html(data.dedication_level);
            
            $('.view-performance').modal('show');

        });
    });    
    
    // Update performance review data using ajax on Database
    $('#edit_performance').on('click', function(){

            var dataId = $('#hrp_u_pr_id').val();
            var postDate = $('#edit_performance_form').serialize() + "&action=hr_performance_ajax_request&param=performance_review_update&id=" + dataId;
            $.post(hr_performance_ajax_url, postDate, function(response) {

        })
    })

    // Insert performance comment using ajax
    $('#add_new_performance_comment').on('click', function() {
        //e.preventDefault();
        //$('.loader-icon').show();
        var postDate = $('#add_new_performance_comment_form').serialize() + "&action=hr_performance_ajax_request&param=insert_performance_comment";
        $.post(hr_performance_ajax_url, postDate, function(response) {
           

        });
    }); // End Insert data using ajax 

    // Show performance comment data using ajax on Modal
    $('#edit_performance_comment').on('click', function() {
        var dataId = $(this).attr('data-id');
        var postData = "action=hr_performance_ajax_request&param=performance_comment_show&id=" + dataId;
        $.post(hr_performance_ajax_url, postData, function(response) {
            var data = $.parseJSON(response);

            $('#u_pc_id').val(data.pc_id );
            $('#u_reference_date').val(data.reference_date);
            $('#u_performance_reviewer').val(data.performance_reviewer);
            $('#u_performance_comment').val(data.performance_comment);

            $('.edit-performance-comment').modal('show');

        });
    });
    

    // Update performance review data using ajax on Database
    $('#edit_performance_comment_btn').on('click', function(){

            var dataId = $('#u_pc_id').val();
            var postDate = $('#edit_performance_comment_form').serialize() + "&action=hr_performance_ajax_request&param=performance_comment_update&id=" + dataId;
            $.post(hr_performance_ajax_url, postDate, function(response) {

        })
    })

    // Delete performance comment data
    $('#performance_comment_table').on('click', '#delete_performance_comment', function(e){
        e.preventDefault();
        var con = confirm('Are you sure want to delete?');
        if (con) {
            var dataId = $(this).attr('data-id');
            var postDate = "action=hr_performance_ajax_request&param=performance_comment_delete&id=" + dataId;
            $.post(hr_performance_ajax_url, postDate, function(response) {

            });

            var tr = $(this).closest("tr");
            tr.css("background-color", "#FF3700");
            tr.fadeOut(1000, function() {
                tr.remove();
            });
        }
        return false;
    }); 
    
    // Delete performance comment data
    $('#performance_goal_table').on('click', '#delete_performance_goal', function(e){
        e.preventDefault();
        var con = confirm('Are you sure want to delete?');
        if (con) {
            var dataId = $(this).attr('data-id');
            var postDate = "action=hr_performance_ajax_request&param=performance_goal_delete&id=" + dataId;
            $.post(hr_performance_ajax_url, postDate, function(response) {

            });

            var tr = $(this).closest("tr");
            tr.css("background-color", "#FF3700");
            tr.fadeOut(1000, function() {
                tr.remove();
            });
        }
        return false;
    });

     // Insert performance Goal using ajax
    $('#add_new_performance_goal').on('click', function() {
        //e.preventDefault();
        //$('.loader-icon').show();
        var postDate = $('#add_new_performance_goal_form').serialize() + "&action=hr_performance_ajax_request&param=insert_performance_goal";
        $.post(hr_performance_ajax_url, postDate, function(response) {
           

        });
    }); // End Insert data using ajax

       // Show performance goal data using ajax on Modal
    $('#edit_performance_goal').on('click', function() {
        var dataId = $(this).attr('data-id');
        var postData = "action=hr_performance_ajax_request&param=performance_goal_show&id=" + dataId;
        $.post(hr_performance_ajax_url, postData, function(response) {
            var data = $.parseJSON(response);

            $('#u_pg_pg_id').val(data.pg_id);
            $('#u_pg_set_date').val(data.pg_set_date);
            $('#u_pg_completion_date').val(data.pg_completion_date);
            $('#u_pg_description').val(data.pg_description);
            $('#u_pg_emp_assessment').val(data.pg_emp_assessment);
            $('#u_pg_supervisor').val(data.pg_supervisor);
            $('#u_pg_supervisor_assessment').val(data.pg_supervisor_assessment);

            $('.edit-performance-goal').modal('show');

        });
    });

    // Update performance goal data using ajax on Database
    $('#edit_performance_goal_btn').on('click', function(){

            var dataId = $('#u_pg_pg_id').val();
            var postDate = $('#edit_performance_goal_form').serialize() + "&action=hr_performance_ajax_request&param=performance_goal_update&id=" + dataId;
            $.post(hr_performance_ajax_url, postDate, function(response) {

        })
    })

    



})(jQuery);
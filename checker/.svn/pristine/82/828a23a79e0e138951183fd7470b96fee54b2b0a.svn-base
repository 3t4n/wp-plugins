<?php
/*
* Custom REST endpoints related to tasks
*/


class CHKR_Task_Custom_Routes {

    function __construct() {
        add_action('rest_api_init', array($this, 'register_custom_routes'));
    }


    public function check_permissions($request) {
        $curr_user_id = get_current_user_id();
        
        if(user_can( $curr_user_id, 'administrator' ) && wp_verify_nonce($request->get_headers()['x_wp_nonce'][0], 'wp_rest')) {
            return true;
        }

        return false;
    }


    public function get_date_after_ndays($n) {
        $current_date = new DateTime();
        $updated_date = $current_date->modify('+'. $n .' days');
        $formatted_date = $updated_date->format('Y-m-d');
        return $formatted_date; 
    }

    public function register_custom_routes() {

        $version = '1';
        $namespace = 'checker/v' . $version;
        $base = 'chkr_task';

        // Fetch all tasks
        register_rest_route($namespace, $base . '/getAll/', array(
            'methods'               => 'GET',
            'callback'              => array($this, 'get_all_tasks'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array()
        ));

        // Fetch task by ID
        register_rest_route($namespace, $base . '/get/', array(
            'methods'               => 'GET',
            'callback'              => array($this, 'get_task_by_id'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array(
                'task_id'    => array(
                    'required'              => true,
                    'validate_callback'     => function($param, $request, $key) {
                        return is_numeric($param);
                    },
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            )
        ));

        // Insert task
        register_rest_route($namespace, $base . '/insert/', array(
            'methods'               => 'POST',
            'callback'              => array($this, 'insert_task'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array(
                'task_title'    => array(
                    'required'              => true,
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_content'    => array(
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_priority'    => array(
                    'default'               => 'low',
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_labels'    => array(
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_due_date'    =>  array(
                    'default'   =>  $this->get_date_after_ndays(7),
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            )

        ));

        // Update task
        register_rest_route($namespace, $base . '/update/', array(
            'methods'               => 'POST',
            'callback'              => array($this, 'update_task'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array(
                'task_id'    => array(
                    'required'              => true,
                    'validate_callback'     => function($param, $request, $key) {
                        return is_numeric($param);
                    },
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_title'    => array(
                    'default'              => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_content'    => array(
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_priority'    => array(
                    'default'               => 'low',
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_labels'    => array(
                    'default'               => '',
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_due_date'    =>  array(
                    'default'   =>  $this->get_date_after_ndays(7),
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            )
        ));

        // Delete task
        register_rest_route($namespace, $base . '/delete/(?P<id>\d+)', array(
            'methods'               => 'DELETE',    // Use DELETE method for deletion
            'callback'              => array($this, 'delete_task'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array(
                'id' => array(
                    'required'              => true,
                    'validate_callback'     => function($param, $request, $key) {
                        return is_numeric($param);
                    },
                    'sanitize_callback'     => 'sanitize_text_field'
                )
            )
        ));
        

        // Update status
        register_rest_route($namespace, $base . '/updateStatus/', array(
            'methods'               => 'POST',
            'callback'              => array($this, 'update_status'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array(
                'task_id'    => array(
                    'required'              => true,
                    'validate_callback'     => function($param, $request, $key) {
                        return is_numeric($param);
                    },
                    'sanitize_callback'     => 'sanitize_text_field'
                ),
                'task_status'    => array(
                    'required'  => true,
                    'sanitize_callback'     => 'sanitize_text_field'
                ),

            )
        ));

            // Get task order
            register_rest_route($namespace, $base . '/taskOrder/', array(
            'methods'               => 'GET',
            'callback'              => array($this, 'get_task_order'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array( )
        ));


        // Update task order
        register_rest_route($namespace, $base . '/taskOrder/', array(
            'methods'               => 'POST',
            'callback'              => array($this, 'update_task_order'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array(
                'task_order'    => array(
                    'required'              => true,
                    'sanitize_callback'     => 'sanitize_text_field'
                ),

            )
        ));

        // Get filtered tasks
        register_rest_route($namespace, $base . '/filteredtasks/', array(
            'methods'               => 'POST',
            'callback'              => array($this, 'get_filtered_tasks'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array(
                'filters'    => array(
                    'required'              => true,
                    'sanitize_callback'     => 'sanitize_text_field'
                ),

            )
        ));

        // Get sorted tasks
        register_rest_route($namespace, $base . '/sorttasks/', array(
            'methods'               => 'POST',
            'callback'              => array($this, 'get_sorted_tasks'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array()
        ));

        // import tasks
        register_rest_route($namespace, $base . '/import/', array(
            'methods'               => 'POST',
            'callback'              => array($this, 'import_tasks'),
            'permission_callback'   => array($this, 'check_permissions'),
            'args'                  => array()
        ));

    }

    // Fetch all tasks in order
    public function get_all_tasks($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $tasks_order = get_option('chkr_tasks_order');
        $completed_tasks = get_option('chkr_completed_tasks');

        if($tasks_order) {
            $all_tasks = array();
            foreach($tasks_order as $task_id) {

                $task = array();
                $task['task_id'] = $task_id;
                $task['task_title'] = get_the_title($task_id);
                $task['task_content'] = get_post_field('post_content', $task_id);
                $task['task_priority'] = get_post_meta($task_id, 'chkr_task_priority', true);
                $task['task_labels'] = get_post_meta($task_id, 'chkr_task_labels', true);
                $task['task_due_date'] = get_post_meta($task_id, 'chkr_task_due_date', true);
                $task['task_status'] = get_post_meta($task_id, 'chkr_task_status', true);

                $all_tasks[] = $task;
            }

            if (empty($all_tasks)) {
                return new WP_REST_Response(array(
                    'error' => 'No post found'
                ));
            } else {
                return new WP_REST_Response(array(
                    'tasks' => $all_tasks,
                    'completed_tasks' => $completed_tasks
                ), 200);
            }
        } else {
            
            return new WP_REST_Response(array(
                'error' => 'No post found'
            ));
        }
    }

    // Fetch task by ID
    public function get_task_by_id($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $task_id = $request['task_id'];

        $task = array();
        $task['task_id'] = $task_id;
        $task['task_title'] = get_the_title($task_id);
        $task['task_content'] = get_post_field('post_content', $task_id);
        $task['task_priority'] = get_post_meta($task_id, 'chkr_task_priority', true);
        $task['task_labels'] = get_post_meta($task_id, 'chkr_task_labels', true);
        $task['task_due_date'] = get_post_meta($task_id, 'chkr_task_due_date', true);
        $task['task_status'] = get_post_meta($task_id, 'chkr_task_status', true);

        if (!$task) {
            return new WP_REST_Response(array(
                'error' => 'Post not found'
            ));
        } else {
            return new WP_REST_Response(array(
                'task' => $task
            ), 200);
        }
    }

    
    // Create task
    public function insert_task($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $task_title = $request['task_title'];
        $task_content = $request['task_content'];
        $task_priority = $request['task_priority'];
        $task_labels = $request['task_labels'];
        $task_due_date = $request['task_due_date'];

        $task_data = array(
            'task_title' => $task_title,
            'task_content' => $task_content,
            'task_priority' => $task_priority,
            'task_labels' => $task_labels,
            'task_due_date' => $task_due_date
        );

        $task_id = $this->addTask($task_data);
        if(!$task_id) {
            
            return new WP_REST_Response(array(
                'error' => 'Unable to insert the post.'
            ));
        } else {
            
            // return created task
            $task = array();
            $task['task_id'] = $task_id;
            $task['task_title'] = get_the_title($task_id);
            $task['task_content'] = get_post_field('post_content', $task_id);
            $task['task_priority'] = get_post_meta($task_id, 'chkr_task_priority', true);
            $task['task_labels'] = get_post_meta($task_id, 'chkr_task_labels', true);
            $task['task_due_date'] = get_post_meta($task_id, 'chkr_task_due_date', true);
            $task['task_status'] = get_post_meta($task_id, 'chkr_task_status', true);

            return new WP_REST_Response(array(
                'task'   => $task
            ), 200);
        }
    }

    // Update task
    public function update_task($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $task_id = $request['task_id'];
        $task_title = $request['task_title'];
        $task_content = $request['task_content'];
        $task_priority = $request['task_priority'];
        $task_labels = $request['task_labels'];
        $task_due_date = $request['task_due_date'];

        if( $request['task_title'] == ''){
            $task_title = get_the_title($task_id); 
        }
        if( $request['task_content'] == ''){
            $task_content = get_post_field('post_content', $task_id);
        }
        if( $request['task_priority'] == ''){
            $task_priority = get_post_meta($task_id, 'chkr_task_priority', true);
        }
        if( $request['task_labels'] == ''){
            $task_labels =get_post_meta($task_id, 'chkr_task_labels', true);
        }

        if( $request['task_due_date'] == ''){
            $task_due_date = get_post_meta($task_id, 'chkr_task_due_date', true);
        }


        $task_id = wp_update_post(array(
            'ID'    => $task_id,
            'post_title'    => $task_title,
            'post_content'  => $task_content,
        ), true);

        if(is_wp_error($task_id)) {
            return new WP_REST_Response(array(
                'error' => 'Unable to update the post.'
            ));
        } else {

            update_post_meta($task_id, 'chkr_task_priority', $task_priority);
            update_post_meta($task_id, 'chkr_task_labels', $task_labels);
            update_post_meta($task_id, 'chkr_task_due_date', $task_due_date);

            // return updated task
            $task = array();
            $task['task_id'] = $task_id;
            $task['task_title'] = get_the_title($task_id);
            $task['task_content'] = get_post_field('post_content', $task_id);
            $task['task_priority'] = get_post_meta($task_id, 'chkr_task_priority', true);
            $task['task_labels'] = get_post_meta($task_id, 'chkr_task_labels', true);
            $task['task_due_date'] = get_post_meta($task_id, 'chkr_task_due_date', true);
            $task['task_status'] = get_post_meta($task_id, 'chkr_task_status', true);

            return new WP_REST_Response(array(
                'task' => $task
            ), 200);
        }
    }

    // Delete task
    public function delete_task($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $task_id = $request['id'];

        if(!wp_delete_post($task_id)) {
            return new WP_REST_Response(array(
                'error' => 'Unable to delete the task.'
            ));
        } else {

            // update task order array
            $tasks_order = get_option('chkr_tasks_order');
            if(($key = array_search($task_id, $tasks_order)) !== false) {
                unset($tasks_order[$key]);
                $tasks_order = array_values($tasks_order);
            }
            update_option('chkr_tasks_order', $tasks_order);

            // update completed tasks array
            $completed_tasks = get_option('chkr_completed_tasks');
            if(($key = array_search($task_id, $completed_tasks)) !== false) {
                unset($completed_tasks[$key]);
                $completed_tasks = array_values($completed_tasks);
            }
            update_option('chkr_completed_tasks', $completed_tasks);

            return new WP_REST_Response(array(
                'success' => 'Task deleted successfully!',
                'id' => $task_id
            ), 200);
        }

    }

    // Update status
    public function update_status($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $task_id = $request['task_id'];
        $task_status = $request['task_status'];

        if(update_post_meta($task_id, 'chkr_task_status', $task_status)) {

            $completed_tasks = get_option('chkr_completed_tasks');
            if($task_status == 'completed') {
                $completed_tasks[] = $task_id;
                update_option('chkr_completed_tasks', $completed_tasks);
            } else {
                if(($key = array_search($task_id, $completed_tasks)) !== false) {
                    unset($completed_tasks[$key]);
                    $completed_tasks = array_values($completed_tasks);
                }
                update_option('chkr_completed_tasks', $completed_tasks);
            }
            return new WP_REST_Response(array(
                'success' => 'Status updated successfully!'
            ), 200);
        } else {
            return new WP_REST_Response(array(
                'error' => 'Unable to update status of the task.'
            ));
        }
    }

        // Get task order list
        public function get_task_order($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $task_order = get_option('chkr_tasks_order');
        $completed_tasks = get_option('chkr_completed_tasks');

        if($task_order) {
            return new WP_REST_Response(array(
                'task_order' => $task_order,
                'completed_tasks'   => $completed_tasks
            ), 200);
        } else {
            return new WP_REST_Response(array(
                'error' => 'Unable to return order of the tasks.'
            ));
        }
    }

        // Update task order list
        public function update_task_order($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $updated_task_order = $request['task_order'];

        $updated_task_order = (json_decode($updated_task_order));

        if( update_option('chkr_tasks_order', $updated_task_order)) {

            return new WP_REST_Response(array(
                'success' => 'Task order updated successfully!'
            ), 200);
        } else {
            return new WP_REST_Response(array(
                'error' => 'Unable to update order of the tasks.'
            ));
        }
    }

    // Get filtered tasks
    public function get_filtered_tasks($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        $task_filters = json_decode($request['filters']);

        // $end_date = $request['endDate'];

        $meta_query_status = array(
            'relation' => 'OR',
            
        );

        if ($task_filters->completed) {
            $meta_query_status[] = array(
                'key' => 'chkr_task_status',
                'value' => 'completed',
                'comapre' => '='
            );
        }

        if ($task_filters->pending) {
            $meta_query_status[] = array(
                'key' => 'chkr_task_status',
                'value' => 'pending',
                'comapre' => '='
            );
        }

        $meta_query_priority = array(
            'relation' => 'OR',
            
        );

        if ($task_filters->lowPriority) {
            $meta_query_priority[] = array(
                'key' => 'chkr_task_priority',
                'value' => 'low',
                'comapre' => '='
            );
        }

        if ($task_filters->mediumPriority) {
            $meta_query_priority[] = array(
                'key' => 'chkr_task_priority',
                'value' => 'medium',
                'comapre' => '='
            );
        }

        if ($task_filters->highPriority) {
            $meta_query_priority[] = array(
                'key' => 'chkr_task_priority',
                'value' => 'high',
                'comapre' => '='
            );
        }

        $args = array(
            'post_status'   => 'publish',
            'post_type'     => 'chkr_task',
            'fields' => 'ids',
            'meta_query' => array(
                'realation' => 'AND',
                $meta_query_status,
                $meta_query_priority,
            ),
            'posts_per_page' => -1, 
        );

        $tasks = get_posts($args);


        if($tasks) {
            $all_tasks = array();
            $completed_tasks = array();
            foreach($tasks as $task_id) {

                $task = array();
                $task['task_id'] = $task_id;
                $task['task_title'] = get_the_title($task_id);
                $task['task_content'] = get_post_field('post_content', $task_id);
                $task['task_priority'] = get_post_meta($task_id, 'chkr_task_priority', true);
                $task['task_labels'] = get_post_meta($task_id, 'chkr_task_labels', true);
                $task['task_due_date'] = get_post_meta($task_id, 'chkr_task_due_date', true);
                $task['task_status'] = get_post_meta($task_id, 'chkr_task_status', true);

                if($task['task_status'] == 'completed'){
                    $completed_tasks[] = $task_id;
                }

                $all_tasks[] = $task;
            }
            
            return new WP_REST_Response(array(
                'filtered_tasks' => $all_tasks,
                'filtered_com_tasks' => $completed_tasks,
            ), 200);
            
        } else {
            return new WP_REST_Response(array(
                'filtered_tasks' => [],
                'filtered_com_tasks' => [],
            ));
        }
    }


    public function get_sorted_tasks($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }
        
        $args = array(
            'post_status'   => 'publish',
            'post_type'     => 'chkr_task',
            'fields' => 'ids',
            'orderby'      => 'title',
            'order'        => 'ASC',
            'posts_per_page' => -1, 
        );
        $tasks = get_posts($args);


        if($tasks) {
            $all_tasks = array();
            foreach($tasks as $task_id) {

                $task = array();
                $task['task_id'] = $task_id;
                $task['task_title'] = get_the_title($task_id);
                $task['task_content'] = get_post_field('post_content', $task_id);
                $task['task_priority'] = get_post_meta($task_id, 'chkr_task_priority', true);
                $task['task_labels'] = get_post_meta($task_id, 'chkr_task_labels', true);
                $task['task_due_date'] = get_post_meta($task_id, 'chkr_task_due_date', true);
                $task['task_status'] = get_post_meta($task_id, 'chkr_task_status', true);

                $all_tasks[] = $task;
            }
            
            return new WP_REST_Response(array(
                'sorted_tasks' => $all_tasks,

            ), 200);
            
        } else {
            return new WP_REST_Response(array(
                'sorted_tasks' => [],
            ));
        }
    }

    function addTask($task_data) {
        
        $task_id = wp_insert_post(array(
            'post_title'    => $task_data['task_title'],
            'post_content'  => $task_data['task_content'],
            'post_status'   => 'publish',
            'post_type'     => 'chkr_task'
        ));

        if($task_id) {
            // update task meta
            update_post_meta($task_id, 'chkr_task_priority', $task_data['task_priority']);
            update_post_meta($task_id, 'chkr_task_labels', $task_data['task_labels']);
            update_post_meta($task_id, 'chkr_task_due_date', $task_data['task_due_date']);
            update_post_meta($task_id, 'chkr_task_status', 'pending');

            // update task order array
            $tasks_order = get_option('chkr_tasks_order');
            array_unshift($tasks_order, $task_id);
            update_option('chkr_tasks_order', $tasks_order);
        } 

        return $task_id;
    }


    // import tasks
    public function import_tasks($request) {

        if(!$this->check_permissions($request)){
            return new WP_REST_Response(array(
                'error' => 'Unauthorized access!'
            ));
        }

        if(isset($_FILES['tasks_file'])) {
            $tasks_file = $_FILES['tasks_file'];
            $file_data = file_get_contents($tasks_file['tmp_name'], 'r');
            $tasks = json_decode($file_data);

            $error = false;
            foreach($tasks as $task) {

                if(!$error) {
                    $task_data = array(
                        'task_title' => $task->task_title,
                        'task_content' => $task->task_content,
                        'task_priority' => $task->task_priority,
                        'task_labels' => $task->task_labels,
                        'task_due_date' => $task->task_due_date
                    ); 
                    
                    $task_id = $this->addTask($task_data);
                    
                    if(!$task_id) {
                        $error = true;
                    }
                } else {
                    return new WP_REST_Response(array(
                        'error' => 'Error importing tasks.'
                    ));
                }
            }

            if(!$error) {
                $tasks_order = get_option('chkr_tasks_order');
    
                if($tasks_order) {
                    $all_tasks = array();
                    foreach($tasks_order as $task_id) {

                        $task = array();
                        $task['task_id'] = $task_id;
                        $task['task_title'] = get_the_title($task_id);
                        $task['task_content'] = get_post_field('post_content', $task_id);
                        $task['task_priority'] = get_post_meta($task_id, 'chkr_task_priority', true);
                        $task['task_labels'] = get_post_meta($task_id, 'chkr_task_labels', true);
                        $task['task_due_date'] = get_post_meta($task_id, 'chkr_task_due_date', true);
                        $task['task_status'] = get_post_meta($task_id, 'chkr_task_status', true);

                        $all_tasks[] = $task;
                    }

                    if (empty($all_tasks)) {
                        return new WP_REST_Response(array(
                            'error' => 'No post found'
                        ));
                    } else {
                        return new WP_REST_Response(array(
                            'tasks' => $all_tasks,
                        ), 200);
                    }
                } else {
                    return new WP_REST_Response(array(
                        'error' => 'No post found'
                    ));
                }
            }

        } else {
            return new WP_REST_Response(array(
                'error' => 'Please upload a JSON file.'
            ));
        }
        
    }
    
}


?>
<?php

if(!class_exists('WP_List_Table')){
  require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class T4U_UserQueriesTable extends WP_List_Table {
    function __construct() {
      parent::__construct( array(
        'singular'=> 'Query',
        'plural' => 'Queries',
        'ajax'   => false 
      ) );
    }

    function extra_tablenav( $which ) {
      if ( $which == "top" ){
          
      }
      if ( $which == "bottom" ){
          
      }
    }

    function get_columns() {
      if (current_user_can('edit_courses')){
        $columns= array(
          'cb' => '<input type="checkbox" />',
          'user_id'=>__('Submitted by'),
          'lesson_id'=>__('Course'),
          'query'=>__('Query'),
          'send_date'=>__('Submitted on'),
          'answer'=>__('Answer'),
          'answer_date'=>__('Answered on'),
          'actions'=>__('Actions'), 
        );

        return $columns;
      }
      else{
        $columns= array(
          'lesson_id'=>__('Course'),
          'query'=>__('Query'),
          'send_date'=>__('Submitted on'),
          'answer'=>__('Answer'),
          'answer_date'=>__('Answered on'),
          'actions'=>__('Actions'), 
        );

        return $columns;
      }
   }

  function column_cb($item){
    return sprintf('<input type="checkbox" name="%s[]" value="%s" />', $this->_args['singular'], $item['id_query']);
  }


  public function get_sortable_columns() {
    $sortable_columns = array(
      'id_submission'     => array('id_submission',false),   
      'user_id'    => array('user_id',false),
      'lesson_id'  => array('lesson_id',false),
      'send_date'  => array('send_date',true),
      'answer_date'  => array('answer_date',false),
    );
    return $sortable_columns;

    }

  function get_bulk_actions() {
    if (current_user_can('edit_courses')){
      $actions = array(
          'delete'    => 'Delete'
      );
      return $actions;
    }
  }

  function process_bulk_action() {
    global  $wpdb;
 
    if( 'delete'===$this->current_action() ) {
      $id = isset($_GET['query_id']) ? intval($_GET['query_id']) : 0;
      
      $table_name = $wpdb->prefix . 't4u_courses_user_queries';
      $sql = $wpdb->prepare('SELECT id_query FROM '. $table_name.' WHERE id_query='. $id, []);
      $res = $wpdb->get_results($sql, ARRAY_A);

      if (count($res)>0){
       
        $sql = $wpdb->prepare('DELETE FROM '. $table_name.' WHERE id_query='. $id, []);
        $res = $wpdb->get_results($sql, ARRAY_A);
      }
     
    }
    else if( 'reply'===$this->current_action() ) {
      
    }
}

  function prepare_items() {
    global $wpdb, $_wp_column_headers;
    $screen = get_current_screen();
    
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->process_bulk_action();

   // id_query, user_id, category_id, lesson_id, query, send_date, parent_id, answer, answer_date, answer_user_id

    $table_name = $wpdb->prefix . 't4u_courses_user_queries';
		$sql = "";
    if (current_user_can('edit_courses')){
      $sql = "SELECT id_query, user_id, lesson_id, `query`, send_date, answer, answer_date, answer_user_id
              FROM ".$table_name;
    }
    else{
      $sql = "SELECT id_query, user_id, lesson_id, `query`, send_date, answer, answer_date, answer_user_id
              FROM ".$table_name."
              WHERE user_id=".get_current_user_id();
    }
    $orderby = isset($_GET["orderby"]) ? sanitize_text_field($_GET["orderby"]) : 'ASC';
    $order = isset($_GET["order"]) ? sanitize_text_field($_GET["order"]) : '';
    if(!empty($orderby) & !empty($order)){ 
      $sql.=' ORDER BY '.$orderby.' '.$order; 
    }

    $totalitems = $wpdb->query($sql); 
    $perpage = 50;

    $paged = isset($_GET["paged"]) ? sanitize_text_field($_GET["paged"]) : '';

    if(empty($paged) || !is_numeric($paged) || $paged<=0 ){ 
      $paged=1;
    } 
    //How many pages do we have in total? 
    $totalpages = ceil($totalitems/$perpage); 
    
    if(!empty($paged) && !empty($perpage)){ 
      $offset=($paged-1)*$perpage; 
      $sql.=' LIMIT '.(int)$offset.','.(int)$perpage; 
    }

    $this->set_pagination_args( array(
      "total_items" => $totalitems,
      "total_pages" => $totalpages,
      "per_page" => $perpage,
    ) );
    

    //$columns = $this->get_columns();
   // $_wp_column_headers[$screen->id]=$columns;

    $sql = $wpdb->prepare( $sql, []);

    $this->items = $wpdb->get_results($sql);
  }

  function display_rows() {
    $records = $this->items;

    list( $columns, $hidden ) = $this->get_column_info();
    $html='';

    if(!empty($records)){
      if (current_user_can('edit_courses')){
        foreach($records as $rec){
          $html .= '<tr id="record_'.intval($rec->id_query).'">';
          $html .=  '<td '.$attributes.'><input type="checkbox" value="'.intval($rec->id_query).'" /></td>';
          
          foreach ( $columns as $column_name=>$column_display_name ) {
              $class = "class='$column_name column-$column_name'";
              $style = "";
              if ( in_array( $column_name, $hidden ) ) $style = ' style="display:none;"';
              $attributes = $class . $style;

              $action_link = esc_url( get_admin_url(null, 'edit.php?post_type='.T4U_POST_TYPE) ).'&page=user-queries&query_id='.intval($rec->id_query);
            

              switch ( $column_name ) {
                case "id_query":  
                  $html .=  '<td '.$attributes.'>'.intval($rec->id_query).'</td>';
                  break;
                case "user_id": 
                  $user_info = get_userdata($rec->user_id);
                  $html .= '<td '.$attributes.'>'.sanitize_text_field($user_info->user_login).'</td>'; 
                  break;
                case "lesson_id": 
                  $html .= '<td '.$attributes.'>'.T4U_Functions::get_course_name_as_link($rec->lesson_id).'</td>'; 
                  break;
                case "query": 
                  $html .=  '<td '.$attributes.'>'.sanitize_text_field($rec->query).'</td>'; 
                  break;
                case "send_date": 
                  $html .=  '<td '.$attributes.'>'.sanitize_text_field(date(get_option( 'date_format' ).' '.get_option( 'time_format' ), strtotime($rec->send_date))).'</td>'; 
                  break;
                case "answer": 
                  $html .=  '<td '.$attributes.'>';
                  if ($rec->answer_date != null){
                    $html .= '<p class="query_answer">'; 
                    $html .= '<span class="query_answer_text">'.sanitize_text_field($rec->answer).'</span>';
                    $html .= '</p>'; 
                  }
                  $html .= '</td>'; 
                  break;
                case "answer_date": 
                  if ($rec->answer_date != null){
                    $html .=  '<td '.$attributes.'>'.sanitize_text_field(date(get_option( 'date_format' ).' '.get_option( 'time_format' ), strtotime($rec->answer_date))).'</td>'; 
                  }
                  else{
                    $html .=  '<td '.$attributes.'></td>'; 
                  }
                  break;
              }
          }

          $html .=  '<td '.$attributes.'>';

          if ($rec->answer_date==null){
            $html .=  '  <a href="#TB_inline?width=500&height=250&inlineId=reply-to-query" class="thickbox" onclick="jQuery(\'#reply_query_id\').val(\''.intval($rec->id_query).'\');">Reply</a><br />';
          }
          $html .=  '  <a href="'.$action_link.'&action=delete">Delete</a>';
          $html .=  '</td>'; 

          $html .= '</tr>';
        }
      }
      else{
        foreach($records as $rec){
          $html .= '<tr id="record_'.intval($rec->id_query).'">';
          
          foreach ( $columns as $column_name=>$column_display_name ) {
              $class = "class='$column_name column-$column_name'";
              $style = "";
              if ( in_array( $column_name, $hidden ) ) $style = ' style="display:none;"';
              $attributes = $class . $style;

              $action_link = esc_url( get_admin_url(null, 'edit.php?post_type='.T4U_POST_TYPE) ).'&page=user-queries&query_id='.intval($rec->id_query);
            

              switch ( $column_name ) {
                case "id_query":  
                  $html .=  '<td '.$attributes.'>'.intval($rec->id_query).'</td>';
                  break;
                case "lesson_id": 
                  $html .= '<td '.$attributes.'>'.T4U_Functions::get_course_name_as_link($rec->lesson_id).'</td>'; 
                  break;
                case "query": 
                  $html .=  '<td '.$attributes.'>'.sanitize_text_field($rec->query).'</td>'; 
                  break;
                case "send_date": 
                  $html .=  '<td '.$attributes.'>'.sanitize_text_field(date(get_option( 'date_format' ).' '.get_option( 'time_format' ), strtotime($rec->send_date))).'</td>'; 
                  break;
                case "answer": 
                  $html .=  '<td '.$attributes.'>';
                  if ($rec->answer_date != null){
                    $html .= '<p class="query_answer">'; 
                    $html .= '<span class="query_answer_text">'.sanitize_text_field($rec->answer).'</span>';
                    $html .= '</p>'; 
                  }
                  $html .= '</td>'; 
                  break;
                case "answer_date":
                  if ($rec->answer_date != null){ 
                    $html .=  '<td '.$attributes.'>'.sanitize_text_field(date(get_option( 'date_format' ).' '.get_option( 'time_format' ), strtotime($rec->answer_date))).'</td>'; 
                  }
                  else{
                    $html .=  '<td '.$attributes.'></td>'; 
                  }
                  break;
              }
          }

          $html .=  '<td '.$attributes.'>';

          if ($rec->answer_date==null){
            $html .=  '  <a href="'.$action_link.'&action=delete">Delete</a>';
          }
          
          $html .=  '</td>'; 

          $html .= '</tr>';
        }
      }
    }
    echo $html;
  }

}
<?php


/*
    E D I T   P A G E   C O L U M N S
    =================================
    Thanks to bamadesigner: https://github.com/bamadesigner/manage-wordpress-posts-using-bulk-edit-and-quick-edit
*/

add_filter('manage_posts_columns','aFS_manage_posts_columns',10,2);
function aFS_manage_posts_columns($columns,$post_type){
  switch($post_type){
    case 'slides':
      $new_columns = array();
      foreach($columns as $key => $value){
        $new_columns[$key] = $value;
        if($key == 'title'){
          $new_columns['aFSPrior_column'] = 'Priority';
          $new_columns['aFSldTyp_column'] = 'Type';
        }
      }
      return $new_columns;
  }
  return $columns;
}
add_filter('manage_edit-slides_sortable_columns','aFS_manage_sortable_columns');
function aFS_manage_sortable_columns($sortable_columns){
  $sortable_columns['aFSPrior_column'] = 'aFSPrior';
  $sortable_columns['aFSldTyp_column'] = 'aFSldTyp';
  return $sortable_columns;
}
add_action('manage_posts_custom_column','aFS_manage_posts_custom_column',10,2);
function aFS_manage_posts_custom_column($column_name,$post_id){
  switch($column_name){
    case 'aFSPrior_column':
      echo '<div id="aFSPrior-'.$post_id.'">'.get_post_meta($post_id,'aFSPrior',true).'</div>';
    break;
    case 'aFSldTyp_column':
      echo '<div id="aFSldTyp-'.$post_id.'">'.get_post_meta($post_id,'aFSldTyp',true).'</div>';
    break;
  }
}
add_action('pre_get_posts','aFS_pre_get_posts',1);
function aFS_pre_get_posts($query){
  if($query->is_main_query() && ($orderby = $query->get('orderby'))){
    switch($orderby){
      case 'aFSPrior':
        $query->set('meta_key','aFSPrior');
        $query->set('orderby','meta_value_num');
      break;
      case 'aFSldTyp':
        $query->set('meta_key','aFSldTyp');
        $query->set('orderby','meta_value');
      break;
    }
  }
}



/*
    Q U I C K   E D I T   &   B U L K   E D I T
    ===========================================
*/

add_action('bulk_edit_custom_box','aFS_bulk_quick_edit_custom_box',10,2);
add_action('quick_edit_custom_box','aFS_bulk_quick_edit_custom_box',10,2);
function aFS_bulk_quick_edit_custom_box($column_name,$post_type){
  switch($post_type){
    case 'slides':
      switch($column_name){
        case 'aFSPrior_column': ?>
          <fieldset class="inline-edit-col-left">
            <div class="inline-edit-col">
              <label>
                <span class="title">Priority</span>
                <span class="input-text-wrap">
                  <input type="number" step="any" value="" name="aFSPrior">
                </span>
              </label>
            </div>
          </fieldset>
<?php   break;
        case 'aFSldTyp_column': ?>
          <fieldset class="inline-edit-col-left">
            <div class="inline-edit-col aFSldTypRadio">
              <label>
                <span class="title">Type</span>
                <span class="input-text-wrap">
                  <label style="display:inline;">
                    <input type="radio" name="aFSldTyp" value="imagery" /> Imagery
                  </label>&nbsp;&nbsp;
                  <label style="display:inline;">
                    <input type="radio" name="aFSldTyp" value="content" /> Content
                  </label>
                </span>
              </label>
            </div>
          </fieldset>
<?php   break;
      }
    break;
  }
}
add_action('admin_print_scripts-edit.php','aFS_enqueue_admin_scripts');
function aFS_enqueue_admin_scripts(){
  global $post_type;
  if('slides' == $post_type){
    wp_enqueue_script('aFSAdminJS',plugins_url('js/addfunc-slides-admin-edit.js',__FILE__),array('jquery'),null,true);
  }
}
add_action('save_post','aFSPost_save');
function aFSPost_save($post_id){
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)return;
  if(!isset($_POST['aFS_mb_nonce'])||!wp_verify_nonce($_POST['aFS_mb_nonce'],'aFS_nonce'))return;
  if(isset($_POST['aFSJSCSSOn'])){
    update_post_meta($post_id,'aFSJSCSSOn',$_POST['aFSJSCSSOn']);
  }
  else{
    delete_post_meta($post_id,'aFSJSCSSOn');
  }
}
add_action('save_post_slides','aFSSave',10,2);
function aFSSave($post_id,$post){
  if(empty($_POST))return $post_id;
  if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)return $post_id;
  if(isset($post->post_type) && $post->post_type == 'revision')return $post_id;
  // if(!current_user_can('edit_post'))return $post_id; // Note: this Breaks Quick Edit
  $custom_fields = array('aFSPrior','aFSldTyp','aFSClass',
  'aFSBgdOn','aFSBgd_Z','aFSBgImg','aFSBgdFx','aFSBgdFl','aFSBgdRp','aFSBgdGr','aFSBgdCo','aFSBgdOp','aFSBgdXY','aFSBgdHL',
  'aFSMnIOn','aFSMnImg','aFSMnLnk','aFSMTarg','aFSMnAlt');
  if(isset($_POST['aFSUpdateFlag'])){
    if(isset($_POST['aFSMBNonce']) && !wp_verify_nonce($_POST['aFSMBNonce'],'aFSNonce'))return $post_id;
    foreach($custom_fields as $field){
      if(isset($_POST[$field])){
        update_post_meta($post_id,$field,$_POST[$field]);
      }
      else{
        delete_post_meta($post_id,$field);
      }
    }
  }
  else{
    if(isset($_POST['_inline_edit']) && !wp_verify_nonce($_POST['_inline_edit'],'inlineeditnonce'))return $post_id;
    foreach($custom_fields as $field){
      if(isset($_POST[$field]))update_post_meta($post_id,$field,$_POST[$field]);
    }
  }
}
add_action('wp_ajax_aFS_bulk_quick_save_edit','aFS_bulk_quick_save_edit');
function aFS_bulk_quick_save_edit(){
  // we need the post IDs
  $post_ids =(isset($_POST['post_ids']) && !empty($_POST['post_ids']))? $_POST['post_ids'] : NULL;
  // if we have post IDs
  if(!empty($post_ids) && is_array($post_ids)){
    // get the custom fields
    $custom_fields = array('aFSPrior','aFSldTyp');
    foreach($custom_fields as $field){
      // if it has a value,doesn't update if empty on bulk
      if(isset($_POST[ $field]) && !empty($_POST[ $field])){
        // update for each post ID
        foreach($post_ids as $post_id){
          update_post_meta($post_id,$field,$_POST[$field]);
        }
      }
    }
  }
}

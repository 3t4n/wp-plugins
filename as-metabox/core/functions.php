<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 

function as_meta_get_group_option(){
	if (empty($_POST) === false) {

  if (empty($_POST['nonce'])  === false) {

    if (!wp_verify_nonce( $_POST['nonce'], 'as_metabox_for_ajax')) {
      die();
    }


		if (isset($_POST['data']) === true) {
			$as_field = (empty($_POST['data']) === false) ? (array)$_POST['data'] : false ;?>
    <div class="as_metabox_group_items" >
     <h3><a href="" data-get-text="as-return-selector" data-return-text="<?php echo (isset($as_field['tabs_title_field'])) ? sanitize_html_class($as_field['tabs_title_field']) : null ; ?>">
      <?php echo (isset($as_field['tabs_title'])) ? $as_field['tabs_title'] : 'Tab Title' ; ?>
     </a></h3>
      <div class="as_metabox_group_content"><?php
if (isset($as_field['group_fields'])) {
  foreach ($as_field['group_fields'] as $field_key => $field_value) {
  $as_title   = (isset($field_value['title']) === true) ? $field_value['title'] : '' ;
  $as_desc  = (isset($field_value['desc'])  === true) ? $field_value['desc'] : '' ;
  $as_type  = (isset($field_value['type'])  === true) ? $field_value['type'] : '' ;
  $as_value   = '';
  $as_value   = (empty($as_value) === false) ? $as_value : null ;?>
            <div class="as_admin_tab_content">
              <div class="as_main_single_box">
                <div class="as_main_single_title">
                    <?php
				    if (empty($as_title) === false) {
				      echo '<h2>'.$as_title.'</h2>';
				    }
				    if (empty($as_desc) === false) {
				      echo '<p>'.$as_desc.'</p>';
				    } ?>                  
                </div>
                <div class="as_main_single_contant_box">
                  <?php
                    $as_type_class = 'As_metabox_option_'.$as_type;
                    if (class_exists($as_type_class)) {
                      if ($as_type_class != 'As_metabox_option_group') {
                       
                        $type = new $as_type_class($field_value, $as_value, array(
                            'option_type' => 'group',
                            'option_id'   => $as_field['id'],
                            'serial'      => (isset($_POST['count']) === true) ? (int)$_POST['count'] : 0 
                            )                            
                          );
                        $type->as_output();
                      }

                    }else{
                      echo apply_filters('as_not_exists_option', 'No Option Available.');
                    }
                  ?>
                </div>
              </div>
            </div>
<?php
  }
}
?>
      <div class="as_meta_group_content_footer">
        <span title="Remove" class="as_meta_denger_btn" onclick="as_remove_group_option(this, 'as_metabox_group_items')"><?php echo (isset($as_field['remove_text'])) ? $as_field['remove_text'] : 'Remove' ; ?></span>
      </div>

      </div>
    </div>
<?php
		}
	}

  }
  
	die();
}

add_action( 'wp_ajax_as_meta_get_group_option', 'as_meta_get_group_option' );


function as_meta_get_font_icon(){
if (empty($_POST) === false) {

  if (empty($_POST['nonce'])  === false) {

    if (!wp_verify_nonce( $_POST['nonce'], 'as_metabox_for_ajax')) {
      die();
    }
    echo json_encode(as_meta_all_font_icon());
  }

}


  die();
}

add_action( 'wp_ajax_as_meta_get_font_icon', 'as_meta_get_font_icon' );


function as_meta_wp_select_val(){



if (empty($_POST) === false) {

  if (empty($_POST['nonce'])  === false) {

    if (!wp_verify_nonce( $_POST['nonce'], 'as_metabox_for_ajax')) {
      die();
    }
    $wp_data = new as_get_wp_data();
    $options = isset($_POST['data']['options']) ? $_POST['data']['options'] : '' ;
    switch ($options) {
      case 'wp_post_type_data':
        $query    = (isset($_POST['data']['query'])) ? $_POST['data']['query'] : false ;
        $query['post_type']  = isset($query['post_type']) ? sanitize_text_field($query['post_type']) : '' ;
        $query['posts_per_page']  = 5 ;
        $query['curr_val']  = isset($_POST['curr_val']) ? sanitize_text_field($_POST['curr_val']) : '' ; 
        $wp_page  = $wp_data->as_wp_select_search_post_field($query);
        if ($wp_page) {
          foreach ($wp_page as $key => $value) {
            ?>

              <li>
                <h2 data-val="<?php echo $value['id']; ?>" data-title="<?php echo $value['title']; ?>" ><?php echo $value['title']; ?></h2>
              </li>

            <?php
          }
        }else{
          echo '';
        }
        break;
      
      default:
        # code...
        break;
    }
  }

}

die();
}

add_action( 'wp_ajax_as_meta_wp_select_val', 'as_meta_wp_select_val' );



<?php
class fieldsC
{
    // add simple textbox field
    public function addMeta_field($args)
    {
        $field = $args[0] ? $args[0] : '';
        $metaboxName = $args[1]['name'] ? $args[1]['name'] : '';
        $post = $args[2] ? $args[2] : '';
        $type = $field['type'] ? $field['type'] : '';
        if(isset($field['post_status'])){
          $post_status = $field['post_status'] ? $field['post_status'] : '';
        }else {
          $post_status = '';
        }
        $fieldName = esc_attr('agaMb_'.$metaboxName.$field['name']);
        $fieldValue = get_post_meta($post->ID, $fieldName, true);
        $label = $field['label'];
        $description = $field['description'];

        switch ($type) {
        case 'textbox':
        $fieldHTML = '<input class="widefat" type="text" name="'.$fieldName.'"  id="'.$fieldName.'" value="'.$fieldValue.'" size="30" />';
        break;
        case 'textarea':
        $fieldHTML = '<textarea name="'.$fieldName.'" id="'.$fieldName.'" rows="8" cols="40">'.$fieldValue.'</textarea>';
        break;
        case 'checkbox':
        $extraText = $field['extraText'] ? $field['extraText'] : '';
        $fieldHTML = '<input type="checkbox" name="'.$fieldName.'"  id="'.$fieldName.'" '.checked('on', $fieldValue, false).' size="30" /> <span class="extraText">'.$extraText.'</span>';
        break;
        case 'selectCustom':
        $customList = $field['options'] ? $field['options'] : array('key' => '0', 'value' => 'Empty');
        //lines into array
        $fieldHTML = '<select name="'.$fieldName.'" id="'.$fieldName.'">';
        foreach ($customList as $key => $option) {
            //comma separated string into array
          $selected = selected($option->key, $fieldValue, false) ? selected($option->key, $fieldValue, false) : '';
          //set the options
          $fieldHTML .= '<option  '.$selected.' value="'.$option->key.'" >'.$option->value.'</option>';
        }
        $fieldHTML .= '</select>';
        break;
        case 'selectCategories':

        $customList = get_categories(
                                    array(
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                        'hide_empty' => 0,
                                    )
                                  );

        //lines into array
        $fieldHTML = '<select name="'.$fieldName.'" id="'.$fieldName.'">';

        foreach ($customList as $option) {
            //comma separated string into array
          $selected = selected($option->slug, $fieldValue, false) ? selected($option->slug, $fieldValue, false) : '';
          //set the options
          $fieldHTML .= '<option  '.$selected.' value="'.$option->slug.'" >'.$option->name.'</option>';
        }
        $fieldHTML .= '</select>';
        break;
        case 'selectTags':

        $customList = get_tags(
                                array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => 0,
                                )
                              );

        //lines into array
        $fieldHTML = '<select name="'.$fieldName.'" id="'.$fieldName.'">';

        foreach ($customList as $option) {
            //comma separated string into array
          $selected = selected($option->slug, $fieldValue, false) ? selected($option->slug, $fieldValue, false) : '';
          //set the options
          $fieldHTML .= '<option  '.$selected.' value="'.$option->slug.'" >'.$option->name.'</option>';
        }
        $fieldHTML .= '</select>';

        break;
        case 'selectPages':

        $customList = get_posts(
                                array(
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'hide_empty' => 0,
                                    'post_type' => 'page',
                                    'post_status' => $post_status,
                                )
                              );

        //lines into array
        $fieldHTML = '<select name="'.$fieldName.'" id="'.$fieldName.'">';
echo $post_status;
        foreach ($customList as $page) {
            //comma separated string into array
          $selected = selected($page->ID, $fieldValue, false) ? selected($page->ID, $fieldValue, false) : '';
          //set the options
          $fieldHTML .= '<option  '.$selected.' value="'.$page->ID.'" >'.$page->post_title.'</option>';
        }
        $fieldHTML .= '</select>';

  $fieldHTML .= '</select>';

        break;
        case 'selectPosts':
                $customList = get_posts(
                                        array(
                                            'orderby' => 'name',
                                            'order' => 'ASC',
                                            'hide_empty' => 0,
                                            'post_type' => 'post',
                                            'post_status' => $post_status,
                                        )
                                      );

                //lines into array
                $fieldHTML = '<select name="'.$fieldName.'" id="'.$fieldName.'">';

                foreach ($customList as $post) {
                    //comma separated string into array
                  $selected = selected($post->ID, $fieldValue, false) ? selected($post->ID, $fieldValue, false) : '';
                  //set the options
                  $fieldHTML .= '<option  '.$selected.' value="'.$post->ID.'" >'.$post->post_title.'</option>';
                }
                $fieldHTML .= '</select>';

        $fieldHTML .= '</select>';
        break;
        case 'datepicker':
        $fieldHTML = '<input class="widefat datepicker" type="text" name="'.$fieldName.'"  id="'.$fieldName.'" value="'.$fieldValue.'" size="30" />';
        break;
      }
        ?>
      <div class="row field">
        <div class="col-sm-2">
          <label class="title"><?php _e($label);
        ?></label>
        </div>
        <div class="col-sm-10">
          <?php echo $fieldHTML;
        ?>
          <label class="description">* <?php _e($description);
        ?></label>
        </div>
      </div>
      <?php

    }
}

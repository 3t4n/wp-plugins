<?php
/*
 * Author: Michael Finkenberger
 * @since V1.1.0.0
 * Last change in plugin version: V2.5.20.3 (introducing field types, foodle-date datepicker, foodle-date delete, the extra metafield shortcode [only logged-in users in 2.1.2.0] the CSS class 'foodle-extra-button', the link name reference corrected, the POST filtering corrected [in 2.1.5.2], the role-based meta fields (2.5.20.0) and then to replace a protected space entry into &nbsp; in 2.5.20.3
 * Date: 22.10.2024
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access

function foodle_meta_fields($user,$show=false) {
  global $foodle_title;

  $foodle_metafield_user_profile = true;
  if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['metafields-user-profile']) ) )
  $foodle_metafield_user_profile = get_option('foodle_settings')['metafields-user-profile'];
  if ( $show ) $foodle_metafield_user_profile = true;

  $foodle_dotted_border = ( ( ! $show ) && ( ! $foodle_metafield_user_profile ) && ( current_user_can('manage_options') ) ) ?  'border:dashed 2px red; ' : 'border:dotted 1px #cccccc; ' ;

  if ( ( ( $foodle_metafield_user_profile ) || ( current_user_can('manage_options') ) ) && ( get_option('foodle_meta_fields') ) && ( count((array)get_option('foodle_meta_fields')) != 0 ) ) {
    ?>
    <p>&nbsp;</p>
    <div id="foodle-extra-div" class="foodle-extra-div" style="background-color:#f8f8f8; <?php echo $foodle_dotted_border ?> margin:0px; padding:0px 10px 9px 12px;">
    <h2 class="foodle-extra-title"><?php echo $foodle_title;?></h2>
    <table class="form-table foodle-extra-table"><tbody class="foodle-extra-tbody">
    <?php
      $foodle_main = ''; // just to be sure...
      $foodle_main_meta = ''; // just to be sure...
      $foodle_fieldindex = -1; // Initialize to -1 so that the first loop will see 0 as the first index
      foreach ( get_option('foodle_meta_fields') as $foodle_fieldname => $foodle_fielddescription ) {
        $foodle_fieldindex += 1; // just index the fields (0 = main-category, 1-... = sub-categories)
        if ( $foodle_fieldindex == 0 ) {
          $foodle_main = $foodle_fieldname; // remember main category...
          $foodle_main_meta = foodle_fieldname_to_meta_name($foodle_fieldname); // ... and its usermeta representation
        }
        $foodle_meta = foodle_fieldname_to_meta_name($foodle_fieldname);
        $foodle_field_type = "text";
        if ( isset($foodle_fielddescription[4]) ) $foodle_field_type = $foodle_fielddescription[4];

        $foodle_roles_for_meta_field = ( isset($foodle_fielddescription[5]) ) ? $foodle_fielddescription[5] : array('all') ;
        //$foodle_roles_for_meta_field = ( isset($foodle_fielddescription[5]) ) ? array_merge($foodle_fielddescription[5],array('administrator')) : array('all') ; // This could be used for administrators to be always a part of it, however, currently not.
        $foodle_role_is_related_to_meta_field = ( ( in_array('all',$foodle_roles_for_meta_field) ) || ( count(array_intersect((array)($user->roles),$foodle_roles_for_meta_field)) > 0 ) );
        $foodle_meta_field_visibility = ( $foodle_role_is_related_to_meta_field ) ? '' : ' style="display:none;" ' ;
        $foodle_meta_field_ability = ( $foodle_role_is_related_to_meta_field ) ? '' : ' disabled="disabled" ' ;
        $foodle_meta_field_label_padding = ( $foodle_role_is_related_to_meta_field ) ? '' : ' style="padding-left:8px; ' ;
        $foodle_meta_field_info = ( $foodle_role_is_related_to_meta_field ) ? '' : ' <span style="color:#ff9999;">('.__('hidden for this user','foodle-for-democracy-poll').')</span>' ;
        if ( ( current_user_can('manage_options') ) && ( $foodle_meta_field_ability !== '' ) ) {
          $foodle_meta_field_visibility = 'style="border:1px dashed #ffbbbb; background-color:#fff8f8;background-image: repeating-linear-gradient(135deg, #ffbbbb 0, #ffbbbb 1px, transparent 0, transparent 50%); background-size: 32px 32px;"';
          //$foodle_meta_field_ability = ''; // This could be used to enable an input for administrators, however, currently not!
        }

        ?>
        <tr class="foodle-extra-row" <?php echo $foodle_meta_field_visibility ?>>
          <th class="foodle-extra-label"><label <?php echo $foodle_meta_field_label_padding; ?> for="<?php echo $foodle_fieldname; ?>"><?php echo str_replace('••', '', str_replace(' ', '&nbsp;', $foodle_fieldname));?></th>
          <td class="foodle-extra-cell">
            <input type="hidden" name="meta_name[]" value="<?php echo $foodle_meta ?>"/>
            <?php $foodle_select = ( ( get_option('foodle_meta_defaults_sorting') ) && ( isset(get_option('foodle_meta_defaults_sorting')[$foodle_fieldname]['sortlist']) ) && ( get_option('foodle_meta_defaults_sorting')[$foodle_fieldname]['sorttype'] == 'drop-down' ) && ( get_option('foodle_meta_defaults_sorting')[$foodle_fieldname]['sortlist'] != '' ) );
                  if ( $foodle_select )
                    echo '<select '.$foodle_meta_field_ability.' ';
                  else
                    echo '<input '.$foodle_meta_field_ability.' type="'.$foodle_field_type.'" size="38" class="foodle-extra-input" style="max-width:348px;"';
                  $foodle_disabled = '';
                  $get_user_meta_user_id_foodle_meta_true = ( is_string($user) ) ? '' : get_user_meta($user->ID, $foodle_meta, true);

                  // check, if there's any array somewhere in the subject user meta data
                  $foodle_users = get_users(array(
                    'orderby'  => 'meta_value',
                    'meta_key' => 'last_name', // just a habit ;-)
                    'order'    => 'ASC'
                  ));
                  $foodle_array_found = false;
                  foreach ( $foodle_users as $foodle_user ) {
                    if ( is_array(get_user_meta($foodle_user->ID, $foodle_meta, true)) ) {
                      $foodle_array_found = true;
                      break;
                    }
                  }

                  if ( $foodle_array_found ) {
                    $foodle_disabled = 'disabled';
                    $get_user_meta_user_id_foodle_meta_true = __('Disabled (\'Array\' found)','foodle-for-democracy-poll');
                  }
            ?>

              <?php if ( ( ! $foodle_select ) && ( isset(get_option('foodle_regex_main')[str_replace('••', '', $foodle_fieldname)]) ) && ( $foodle_fieldindex != 0 ) ): // remove the '••' in case the field shall use an existing reference ?>
                id="<?php echo '⇒⇒'.str_replace('••', '', str_replace('.','€', str_replace(' ','_', $foodle_fieldname))) // remove the '••' in case the field shall use an existing reference ?>"
                value="<?php echo esc_attr($get_user_meta_user_id_foodle_meta_true); // Doubled 'value' for later extended use ?>"
                readonly
              <?php else: ?>
                id="<?php echo str_replace('••', '_', str_replace('.','€', str_replace(' ', '_', $foodle_fieldname))) ?>"
                value="<?php echo esc_attr($get_user_meta_user_id_foodle_meta_true); ?>"
              <?php endif ?>

              <?php
                if ( ( $foodle_fieldindex == 0 ) && ( get_option('foodle_regex_main') ) ) {
                  /* Modify automatically according RegExp settings */
                  if ( $foodle_select )
                    $output = 'onchange="var $=jQuery; ';
                  else
                    $output = 'onkeyup="var $=jQuery; ';
                  foreach( get_option('foodle_regex_main') as $foodle_targetfield => $foodle_regex_definition) {
                    $output .=  "$('#⇒⇒".str_replace('.','€',str_replace(' ','_', $foodle_targetfield))."').attr('value',$(this).val().replace(".$foodle_regex_definition[0].",'".$foodle_regex_definition[1]."'));";
                  }
                  $output .= '" autocomplete="off"';
                  echo $output;
                }
              ?>

              name="<?php echo 'foodle_'.$foodle_meta ?>"
              <?php echo ' '.$foodle_disabled; ?>
            />

            <?php if ( $foodle_select ) {
              foreach( explode('<br>', get_option('foodle_meta_defaults_sorting')[$foodle_fieldname]['sortlist']) as $foodle_option ) {
                if ( esc_attr(get_user_meta($user->ID, $foodle_meta, true)) == $foodle_option )
                  $foodle_selected = 'selected="selected"';
                else
                  $foodle_selected = '';
                echo '<option value="'.$foodle_option.'" '.$foodle_selected.'>'.$foodle_option.'</option>';
              }
              echo '</select>';
            } ?>
            
            </label>
            <?php echo $foodle_meta_field_info; ?>
            <?php if ( ( ! $foodle_select ) && ( isset(get_option('foodle_regex_main')[str_replace('••', '', array_keys(get_option('foodle_meta_fields'))[$foodle_fieldindex])]) ) && ( get_option('foodle_regex_main')[str_replace('••', '', array_keys(get_option('foodle_meta_fields'))[$foodle_fieldindex])] != '' ) ): // remove the '••' in case the field shall use an existing reference
              if ( $foodle_fielddescription[0] != '' ) $foodle_fielddescription[0] = '<br>'.$foodle_fielddescription[0]; ?>
              <span class="description foodle-extra-description"><?php echo $foodle_fielddescription[0].'<br>'.sprintf(__('Will be filled automatically based on the field \'%s\'','foodle-for-democracy-poll'), str_replace('••', '', $foodle_main)) ?></span>
            <?php else: ?>
              <span class="description foodle-extra-description"><?php echo '<br>'.$foodle_fielddescription[0] ?></span>
            <?php endif ?>
          </td>
        </tr>
        <?php
      }
      ?>
      </tbody></table>
      </div>
      <p>&nbsp;</p>
    <?php

    // Show jQuery datepicker for a 'foodle-date' type input field but make sure that any keyboard entry is prevented
    $foodle_jan = __('January','foodle-for-democracy-poll');
    $foodle_feb = __('February','foodle-for-democracy-poll');
    $foodle_mar = __('March','foodle-for-democracy-poll');
    $foodle_apr = __('April','foodle-for-democracy-poll');
    $foodle_may = __('May','foodle-for-democracy-poll');
    $foodle_jun = __('June','foodle-for-democracy-poll');
    $foodle_jul = __('July','foodle-for-democracy-poll');
    $foodle_aug = __('August','foodle-for-democracy-poll');
    $foodle_sep = __('September','foodle-for-democracy-poll');
    $foodle_oct = __('October','foodle-for-democracy-poll');
    $foodle_nov = __('November','foodle-for-democracy-poll');
    $foodle_dec = __('December','foodle-for-democracy-poll');
    $foodle_sun = __('Sunday','foodle-for-democracy-poll');
    $foodle_mon = __('Monday','foodle-for-democracy-poll');
    $foodle_tue = __('Tuesday','foodle-for-democracy-poll');
    $foodle_wed = __('Wednesday','foodle-for-democracy-poll');
    $foodle_thu = __('Thursday','foodle-for-democracy-poll');
    $foodle_fri = __('Friday','foodle-for-democracy-poll');
    $foodle_sat = __('Saturday','foodle-for-democracy-poll');
    $start_of_week = 1;
    if ( get_option('start_of_week') ) $start_of_week = get_option('start_of_week');
    $foodle_date_format = 'mm/dd/yy';
    if ( ( get_option('foodle_settings') ) && ( isset(get_option('foodle_settings')['foodle_date_format']) ) )
      $foodle_date_format = get_option('foodle_settings')['foodle_date_format'];
    echo '<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">';
    echo '<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>';
    echo '<script type="text/javascript"> var $=jQuery; ';
    echo '
        $("[type=foodle-date]").addClass("foodle-date").attr("type","text").prop("readonly",true).css("background-color","white").css("cursor","context-menu");
        $(".foodle-date").after("&nbsp;<input type=\'button\' class=\'foodle-extra-date-delete\' value=\''.__('delete','foodle-for-democracy-poll').'\' style=\'cursor:pointer;border:1px solid #a1b5bE;border-radius:6px;background-color:#E1F5FE;font-size:0.8em;\'/>");
        $(".foodle-extra-date-delete").on("click",function(e){ e.preventDefault(); $(".foodle-date").datepicker("setDate", null);});
        $(function(){$(".foodle-date").datepicker({
            dateFormat: "'.$foodle_date_format.'",
            monthNames: [ "'.$foodle_jan.'", "'.$foodle_feb.'", "'.$foodle_mar.'", "'.$foodle_apr.'", "'.$foodle_may.'", "'.$foodle_jun.'", "'.$foodle_jul.'", "'.$foodle_aug.'", "'.$foodle_sep.'", "'.$foodle_oct.'", "'.$foodle_nov.'", "'.$foodle_dec.'" ],
            monthNamesShort: [ "'.mb_substr($foodle_jan,0,3).'", "'.mb_substr($foodle_feb,0,3).'", "'.mb_substr($foodle_mar,0,3).'", "'.mb_substr($foodle_apr,0,3).'", "'.mb_substr($foodle_may,0,3).'", "'.mb_substr($foodle_jun,0,3).'", "'.mb_substr($foodle_jul,0,3).'", "'.mb_substr($foodle_aug,0,3).'", "'.mb_substr($foodle_sep,0,3).'", "'.mb_substr($foodle_oct,0,3).'", "'.mb_substr($foodle_nov,0,3).'", "'.mb_substr($foodle_dec,0,3).'" ],
            dayNames: [ "'.$foodle_sun.'", "'.$foodle_mon.'", "'.$foodle_tue.'", "'.$foodle_wed.'", "'.$foodle_thu.'", "'.$foodle_fri.'", "'.$foodle_sat.'" ],
            dayNamesShort: [ "'.mb_substr($foodle_sun,0,3).'", "'.mb_substr($foodle_mon,0,3).'", "'.mb_substr($foodle_tue,0,3).'", "'.mb_substr($foodle_wed,0,3).'", "'.mb_substr($foodle_thu,0,3).'", "'.mb_substr($foodle_fri,0,3).'", "'.mb_substr($foodle_sat,0,3).'" ],
            dayNamesMin: [ "'.mb_substr($foodle_sun,0,2).'", "'.mb_substr($foodle_mon,0,2).'", "'.mb_substr($foodle_tue,0,2).'", "'.mb_substr($foodle_wed,0,2).'", "'.mb_substr($foodle_thu,0,2).'", "'.mb_substr($foodle_fri,0,2).'", "'.mb_substr($foodle_sat,0,2).'" ],
            firstDay: '.$start_of_week.',
            changeYear: true,
            changeMonth: true,
            yearRange: "-100:+100",
            stepMonths: 1,
            showAnim: "slideDown"
        });});
    ';
    echo '</script>';
  } else if ( ( $foodle_metafield_user_profile ) && ( in_array('administrator', (array)$user->roles) ) ) {
    ?>
      <p>&nbsp;</p>
      <div class="foodle-extra-div" style="background-color:#f8f8f8; border:dotted 1px #cccccc; margin:0px; padding:0px 0px 9px 12px;">
        <h2 class="foodle-extra-title"><?php echo $foodle_title;?></h2>
        <p><?php echo $foodle_title.' '.__('profile fields are not defined (yet)','foodle-for-democracy-poll').'.'; ?></p>
      </div>
      <p>&nbsp;</p>
    <?php
  }
  if ( get_option('foodle_meta_fields') ) {
    echo'<script type="text/javascript" id="adjust_ids_and_names">var $ = jQuery;';
    $please_use_text = __('Please use the related \'%s\' field in the %s area for your input','foodle-for-democracy-poll');
    foreach ( get_option('foodle_meta_fields') as $foodle_fieldname => $foodle_fielddescription ) {
      $foodle_field_link = $foodle_fielddescription[1];
      if ( ( strpos($foodle_fieldname, '••') === 0 ) && ( $foodle_field_link != '' ) ) { // avoid to refer to an existing input field with no link to its user meta representation
        $foodle_fieldname_local = str_replace('••','',$foodle_fieldname);
        if ( strpos($foodle_field_link, "&") === 0 ) {
          $foodle_field_link = substr($foodle_field_link, 1);
          echo '$("[name=\''.$foodle_field_link.'\']").prop("disabled", true);';
          echo '$("[name=\''.$foodle_field_link.'\']").after("<br>'.sprintf($please_use_text, $foodle_fieldname_local, $foodle_title).'!");';
          echo '$("[name=\''.$foodle_field_link.'\']").attr("name","_'.$foodle_field_link.'");';
        } else {
          if ( strpos($foodle_field_link, "#") === 0 ) $foodle_field_link = substr($foodle_field_link, 1); // Backward compatibility
          echo '$("#'.$foodle_field_link.'").prop("disabled", true);';
          echo '$("#'.$foodle_field_link.'").after("<br>'.sprintf($please_use_text, $foodle_fieldname_local, $foodle_title).'!");';
        }
      }
      $foodle_meta = foodle_fieldname_to_meta_name($foodle_fieldname);
      echo '$("[name=\'foodle_'.$foodle_meta.'\']").attr("name","'.$foodle_meta.'");'; // correct the input field names
    }
    echo'</script>';
  }
}
add_action('show_user_profile', 'foodle_meta_fields', 9999999); // editing your own profile
add_action('edit_user_profile', 'foodle_meta_fields', 9999999); // editing another user
add_action('user_new_form', 'foodle_meta_fields', 9999999); // creating a new user



function foodle_meta_fields_save($userId) {
  if ( ( current_user_can('edit_user', $userId) ) && ( isset($_POST['meta_name']) ) ) {
    $post_filtered = filter_input_array( INPUT_POST );
    foreach ( $post_filtered['meta_name'] as $foodle_meta_fieldname) {
      $sanitized_fieldname = str_replace(' ','_',$foodle_meta_fieldname);
      if ( isset($post_filtered[$sanitized_fieldname]) ) {
        $sanitized_data = sanitize_text_field($post_filtered[$sanitized_fieldname]);
        $sanitized_data = ( $sanitized_data == ' ' ) ? '&nbsp;' : $sanitized_data;
        update_user_meta($userId, sanitize_text_field($foodle_meta_fieldname), $sanitized_data);
      }
    }
  }
}
add_action('personal_options_update', 'foodle_meta_fields_save', 9999999); // updating your own profile
add_action('edit_user_profile_update', 'foodle_meta_fields_save', 9999999); // updating another user
add_action('user_register', 'foodle_meta_fields_save', 9999999); // registering a new user



function foodle_fieldname_to_meta_name($foodle_fieldname) {
  if ( strpos($foodle_fieldname, '••') === 0 ) return str_replace('••','',$foodle_fieldname);

  return 'foodle-field-'.str_replace('.','€',str_replace(' ','_',strtolower($foodle_fieldname)));
}
// The format of the meta field name is: foodle-field- lower_case_fieldname_without_spaces_or_periods (= fieldslug)



function foodle_extra_fields_shortcode($atts) {
    if ( ! is_user_logged_in() ) return; // Must be a logged-in user!

    $userId = get_current_user_id();
    if ( ( current_user_can('edit_user', $userId) ) && ( isset($_POST['meta_name']) ) ) {
      $post_filtered = filter_input_array( INPUT_POST );
      foreach ( $post_filtered['meta_name'] as $foodle_meta_fieldname) {
        $sanitized_fieldname = str_replace(' ','_',$foodle_meta_fieldname);
        if ( isset($post_filtered[$sanitized_fieldname]) )
          update_user_meta($userId, sanitize_text_field($foodle_meta_fieldname), sanitize_text_field($post_filtered[$sanitized_fieldname]));
      }
    }
    $foodle_profile_link = site_url('/wp-admin/profile.php#foodle-extra-div');
    ob_start();
    foodle_meta_fields(wp_get_current_user(),true);
    $foodle_extra_fields_output = '<form method="post">';
    $foodle_extra_fields_output .= ob_get_contents();
    $foodle_extra_fields_output .= '<input type="submit" name="submit" id="submit" class="button button-primary foodle-extra-button" value="Profil aktualisieren"/>';
    $foodle_extra_fields_output .= '<div class="foodle-extra-profile-link" style="float:right;"><a href="'.$foodle_profile_link.'">'.__('User Profile','foodle-for-democracy-poll').'</a></div>';
    $foodle_extra_fields_output .= '</form>';
    ob_end_clean();
    return $foodle_extra_fields_output;
}
add_shortcode('foodle-show-extra-fields','foodle_extra_fields_shortcode');



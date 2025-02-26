<?php

//user registration
add_action('register_form', 'adh_registration_form');
function adh_registration_form()
{

  $adh_value_input = !empty($_POST['adh_use_menu_plugin']) ? intval($_POST['adh_use_menu_plugin']) : '';

?>
  <p>
    <label for="adh_use_menu_plugin"><?php esc_html_e('Use Adminbar drag & hide plugin', 'adh') ?><br />
      <?php adh_print_input($adh_value_input); ?>
    </label>
  </p>
<?php
}

add_action('user_register', 'adh_user_register');
function adh_user_register($user_id)
{
  if (!empty($_POST['adh_use_menu_plugin'])) {
    update_user_meta($user_id, 'adh_use_menu_plugin', intval($_POST['adh_use_menu_plugin']));
  }
}

/**
 * Back end registration
 */

add_action('user_new_form', 'adh_admin_registration_form');
function adh_admin_registration_form($operation)
{
  if ('add-new-user' !== $operation) {
    // $operation may also be 'add-existing-user'
    return;
  }

  $adh_value_input = !empty($_POST['adh_use_menu_plugin']) ? intval($_POST['adh_use_menu_plugin']) : '';

?>
  <h3><?php esc_html_e('Adminbar drag & hide', 'adh'); ?></h3>

  <table class="form-table">
    <tr>
      <th><label for="adh_use_menu_plugin"><?php esc_html_e('Use Adminbar drag & hide plugin', 'adh'); ?></label> <span class="description"><?php esc_html_e('(required)', 'adh'); ?></span></th>
      <td>
        <?php adh_print_input($adh_value_input); ?>
      </td>
    </tr>
  </table>
<?php
}

add_action('user_profile_update_errors', 'adh_user_profile_update_errors', 10, 3);

add_action('edit_user_created_user', 'adh_user_register');


/**
 * Back end display
 */

add_action('show_user_profile', 'adh_show_extra_profile_fields');
add_action('edit_user_profile', 'adh_show_extra_profile_fields');

function adh_show_extra_profile_fields($user)
{
  $adh_value_input = get_the_author_meta('adh_use_menu_plugin', $user->ID);
?>
  <h3><?php esc_html_e('Adminbar drag & hide', 'adh'); ?></h3>

  <table class="form-table">
    <tr>
      <th><label for="adh_use_menu_plugin"><?php esc_html_e('Use Adminbar drag & hide plugin', 'adh'); ?></label></th>
      <td>
        <?php adh_print_input($adh_value_input); ?>
      </td>
    </tr>
  </table>
<?php
}

add_action('personal_options_update', 'adh_update_profile_fields');
add_action('edit_user_profile_update', 'adh_update_profile_fields');

function adh_update_profile_fields($user_id)
{
  if (!current_user_can('edit_user', $user_id)) {
    return false;
  }

  update_user_meta($user_id, 'adh_use_menu_plugin', intval($_POST['adh_use_menu_plugin']));
}

/* print input */
function adh_print_input($adh_value_input)
{
  if (!is_numeric($adh_value_input)) {
    $adh_value_input = 1;
  }

  if ($adh_value_input == 1) {
    echo '<span><input type="radio" name="' . 'adh_use_menu_plugin' . '" value="1" checked> yes </span>';
    echo  '<span><input type="radio" name="' . 'adh_use_menu_plugin' . '" value="0" > no </span>';
  } else {
    echo '<span><input type="radio" name="' . 'adh_use_menu_plugin' . '" value="1" > yes </span>';
    echo  '<span><input type="radio" name="' . 'adh_use_menu_plugin' . '" value="0" checked> no </span>';
  }
}


?>
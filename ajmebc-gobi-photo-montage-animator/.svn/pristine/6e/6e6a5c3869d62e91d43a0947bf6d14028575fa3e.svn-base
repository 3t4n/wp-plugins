<?php
/**
 * Licence:
 * AJ & MBEC Ltd Gobi Photo Montage Animator Wordpress Plugin
 * Copyright (C) 2016  AJ & MEBC Ltd
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * Gnomovision version 69, Copyright (C) 2016 AJ & MEBC Ltd
 * Gnomovision comes with ABSOLUTELY NO WARRANTY;
 * This is free software, and you are welcome to redistribute it
 * under certain conditions;
 */

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.ajmebc.co.uk/wordpress/gobi.html
 * @since      1.1.0
 *
 * @package    ajmebc_gam
 * @subpackage ajmebc_gam/admin/partials
 * @author     Andrew James <andrew.james@ajmebc.co.uk>
 */

 /**
  * applies the 'selected' attribute to option element if the value of the option matches the saved data
  *
  * @since    1.1.0
  * @access   public
  * @var      string    $setting    Saved meta value.
  * @var      string    $value      Option value.
  */
   function get_selected_attribute($setting, $value) {
     if (strcmp($setting, $value) == 0) {
       echo ' selected';
     }
   }
  /**
 	 * Outputs the option element for the select html element
 	 *
 	 * @since    1.1.0
 	 * @access   public
   * @var      string    $setting    Saved meta value.
   * @var      string    $value      Option value.
 	 */
   function get_select_option_tag($setting, $value) {
     if (strcmp($setting, $value) == 0) {
       echo '  <option value="' . $value . '" selected>' . $value . '</option>';
     } else {
       echo '  <option value="' . $value . '">' . $value . '</option>';
     }
   }
   /**
 	  * Save the data
 	  *
 	  * @since    1.1.0
 	  * @access   public
    * @var      string    $id             The ID of this post.
    * @var      string    $setting_id     The ID of this post.
    * @var      string    $default        The ID of this post.
 	  */
    function get_post_meta_values($id, $setting_id, $default) {
      $value = get_post_meta($id, $setting_id, true);

      if($value == null){
        return $default;
      } else {
        return $value;
      }
    }
    /**
  	 * Save the data
  	 *
  	 * @since    1.1.0
  	 * @access   public
  	 * @var      array    $args    field input name, meta key name
  	 */
  function display_list($args) {
    echo '<select name="' . $args['input_name'] . '">';
    echo get_select_option_tag($args['key'], '1');
    echo get_select_option_tag($args['key'], '2');
    echo get_select_option_tag($args['key'], '3');
    echo get_select_option_tag($args['key'], '4');
    echo get_select_option_tag($args['key'], '5');
    echo get_select_option_tag($args['key'], '6');
    echo '</select>';
  }
  /**
   * Save the data
   *
   * @since    1.2.0
   * @access   public
   * @var      array    $args   settings for row, columns, height & margin
   */
  function display_device_settings($args) {
    ?>

    <table class="device-settings-panel">
      <tr>
        <th colspan="5"><?= $args['device_title'] ?> Layout Properties</th>
      </tr>
      <tr>
        <td><label for="<?= $args['rows']['input_name'] ?>">Set the number of rows  in the display</label></td>
        <td><?= display_list( array('input_name' => $args['rows']['input_name'], 'key' => get_post_meta_values($args['post_id'], $args['rows']['meta_key'], "1") ) ) ?></td>
        <td><span class="gutter" style="width: 50px;">&nbsp;</span></td>
        <td><label for="<?= $args['columns']['input_name'] ?>">Set the number of columns in the display</label></td>
        <td><?= display_list( array('input_name' => $args['columns']['input_name'], 'key' => get_post_meta_values($args['post_id'], $args['columns']['meta_key'], "1") ) ) ?></td>
      </tr>
      <tr>
        <td><label for="<?= $args['height_setting']['input_name'] ?>">Height of plugin (pixels)</label></td>
        <td><input type="number" name="<?= $args['height_setting']['input_name'] ?>" min="1" value="<?= get_post_meta_values($args['post_id'], $args['height_setting']['meta_key'], "300") ?>" style="width: 70px;"></td>
        <td><span class="gutter" style="width: 50px;">&nbsp;</span></td>
        <td><label for="<?= $args['margin_setting']['input_name'] ?>">Set the margin (pixels)</label></td>
        <td><input type="number" name="<?= $args['margin_setting']['input_name'] ?>" min="0" value="<?= get_post_meta_values($args['post_id'], $args['margin_setting']['meta_key'], "0") ?>" style="width: 70px;"></td>
      </tr>
      <tr>
        <td><label for="<?= $args['width_setting']['input_name'] ?>">Width of plugin (pixels)</label></td>
        <td><input type="number" name="<?= $args['width_setting']['input_name'] ?>" min="1" value="<?= get_post_meta_values($args['post_id'], $args['width_setting']['meta_key'], "0") ?>" style="width: 70px;"></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>

    <?
  }

?>

<div class="inside ajmebc-inside hidden" id="ajmebc-gam-metabox-settings">
  <div class="ajmebc-settings-wrapper">
    <!-- Desktop -->
    <?= display_device_settings( array(
        'post_id' => $id,
        'device_title' => 'Desktop',
        'rows' => array( 'input_name' => 'ajmebc_gam_rows', 'meta_key' => "ajmebc_gam_post_rows" ),
        'columns' => array( 'input_name' => 'ajmebc_gam_columns', 'meta_key' => "ajmebc_gam_post_columns" ),
        'margin_setting' => array('input_name' => 'ajmebc_gam_style_margin', 'meta_key' => "ajmebc_gam_post_style_margin" ),
        'height_setting' => array('input_name' => 'ajmebc_gam_height', 'meta_key' => "ajmebc_gam_post_height" ),
        'width_setting' => array('input_name' => 'ajmebc_gam_width', 'meta_key' => "ajmebc_gam_post_width" )
      )
    ) ?>

    <!-- Tablet -->
    <?= display_device_settings( array(
        'post_id' => $id,
        'device_title' => 'Tablet',
        'rows' => array( 'input_name' => 'ajmebc_gam_tablet_rows', 'meta_key' => "ajmebc_gam_tablet_post_rows" ),
        'columns' => array( 'input_name' => 'ajmebc_gam_tablet_columns', 'meta_key' => "ajmebc_gam_mobile_post_columns" ),
        'margin_setting' => array('input_name' => 'ajmebc_gam_tablet_style_margin', 'meta_key' => "ajmebc_gam_tablet_post_style_margin" ),
        'height_setting' => array( 'input_name' => 'ajmebc_gam_tablet_height', 'meta_key' => "ajmebc_gam_tablet_post_height" ),
        'width_setting' => array('input_name' => 'ajmebc_gam_tablet_width', 'meta_key' => "ajmebc_gam_tablet_post_width" )
      )
    ) ?>

    <!-- Mobile -->
    <?= display_device_settings( array(
        'post_id' => $id,
        'device_title' => 'Mobile',
        'rows' => array( 'input_name' => 'ajmebc_gam_mobile_rows', 'meta_key' => "ajmebc_gam_mobile_post_rows" ),
        'columns' => array( 'input_name' => 'ajmebc_gam_mobile_columns', 'meta_key' => "ajmebc_gam_mobile_post_columns" ),
        'margin_setting' => array('input_name' => 'ajmebc_gam_mobile_style_margin', 'meta_key' => "ajmebc_gam_mobile_post_style_margin" ),
        'height_setting' => array( 'input_name' => 'ajmebc_gam_mobile_height', 'meta_key' => "ajmebc_gam_mobile_post_height" ),
        'width_setting' => array('input_name' => 'ajmebc_gam_mobile_width', 'meta_key' => "ajmebc_gam_mobile_post_width" )
      )
    )
    ?>

    <?
    /* Common Properties */
    $ajmebc_gam_settings_loading = get_post_meta_values($id, "ajmebc_gam_post_loading", "sequence");
    $ajmebc_gam_settings_timer = get_post_meta_values($id, "ajmebc_gam_post_timer", "1");
    $ajmebc_gam_settings_animation = get_post_meta_values($id, "ajmebc_gam_post_animation", "Basic");
    $ajmebc_gam_settings_anim_timer = get_post_meta_values($id, "ajmebc_gam_post_anim_timer", "1");
    ?>

    <table class="common-properties-panel">
      <tr>
        <th colspan="5">Plugin Display Settings</th>
      </tr>
      <tr>
        <td><label for="ajmebc_gam_loading">Image Display Progression</label></td>
        <td>
          <select name="ajmebc_gam_loading">
            <option value="sequence"<?= get_selected_attribute($ajmebc_gam_settings_loading, 'sequence') ?>>Sequential</option>
            <option value="random"<?= get_selected_attribute($ajmebc_gam_settings_loading, 'random') ?>>Random</option>
          </select>
        </td>
        <td><span class="gutter" style="width: 50px;">&nbsp;</span></td>
        <td><label for="ajmebc_gam_timer">Time for next image to be displayed (seconds)</label></td>
        <td><input type="number" name="ajmebc_gam_timer" min="1" value="<?= $ajmebc_gam_settings_timer ?>" style="width: 70px;" /></td>
      </tr>
      <tr>
        <td><label for="ajmebc_gam_animation">Animation Style</label></td>
        <td>
          <select name="ajmebc_gam_animation">
            <option value="Basic"<?= get_selected_attribute($ajmebc_gam_settings_animation, 'Basic') ?>>Snap</option>
            <option value="Fade"<?= get_selected_attribute($ajmebc_gam_settings_animation, 'Fade') ?>>Fade</option>
            <option value="SlideLeft"<?= get_selected_attribute($ajmebc_gam_settings_animation, 'SlideLeft') ?>>Slide Left</option>
            <option value="SlideRight"<?= get_selected_attribute($ajmebc_gam_settings_animation, 'SlideRight') ?>>Slide Right</option>
            <option value="SlideUp"<?= get_selected_attribute($ajmebc_gam_settings_animation, 'SlideUp') ?>>Slide Up</option>
            <option value="SlideDown"<?= get_selected_attribute($ajmebc_gam_settings_animation, 'SlideDown') ?>>Slide Down</option>
          </select>
        </td>
        <td><span class="gutter" style="width: 50px;">&nbsp;</span></td>
        <td><label for="ajmebc_gam_anim_timer">Animation duration (seconds)</label></td>
        <td><input type="number" name="ajmebc_gam_anim_timer" min="1" value="<?= $ajmebc_gam_settings_anim_timer ?>" style="width: 70px;" /></td>
      </tr>
    </table>

  </div>
</div>

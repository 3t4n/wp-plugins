<?php


// Create main menu page -----------------------------------
add_action('admin_menu', 'adh_create_menu');

function adh_create_menu()
{

  //create new top-level menu
  add_menu_page('Adminbar drag & hide', 'Adminbar drag & hide', 'administrator', __FILE__, 'adh_plugin_settings_page', ADH_PLUGIN_URL . '/images/icon.png');


  //call register settings function
  add_action('admin_init', 'adh_register_menu_settings');
}

//---------------------------------------------------------

function adh_register_menu_settings()
{
  //register our settings
  register_setting('plugin-settings-group', 'adh_drag');
  register_setting('plugin-settings-group', 'adh_position');
  register_setting('plugin-settings-group', 'adh_hidebtn');


  foreach ($GLOBALS['list_settings'] as $key) {
    register_setting('plugin-settings-group', 'adh_' . $key);
  }
}

function adh_plugin_settings_page()
{
?>
  <div class="wrap">
    <h1 class="wp-menu-drag-icon-title">
      <img src="<?php echo ADH_PLUGIN_URL . '/images/icon-big.png'; ?>" />
      Adminbar drag & hide
    </h1>
    <form method="post" action="options.php">
      <?php settings_fields('plugin-settings-group'); ?>
      <?php do_settings_sections('plugin-settings-group'); ?>

      <style type="text/css">
        #position-box {
          display: none;
        }

        .row-radio span {
          margin-right: 15px;
        }

        .padding-1 {
          padding-top: 10px;
        }

        .wp-menu-drag-icon-title {
          display: inline-flex;
          justify-content: flex-start;
          align-items: center;
          margin-bottom: 0.3em;
        }

        .wp-menu-drag-icon-title img {
          width: 1.1em;
          height: auto;
          font-size: 1em;
          margin-right: 0.3em;
        }
      </style>
      <script>
        function checkDrag(target, animation) {
          if (animation == "") {

          }
          if (target.is(':checked')) {
            if (animation === undefined) {
              jQuery("#position-box").fadeIn(350);
            } else {
              jQuery("#position-box").fadeIn(0);
            }
          } else {
            if (animation === undefined) {
              jQuery("#position-box").fadeOut(350);
            } else {
              jQuery("#position-box").adeOut(0);
            }
          }
        }

        jQuery(document).ready(function() {
          checkDrag(jQuery("#drag-true"), 1);

          jQuery('input[name="adh_drag"]').change(function() {
            checkDrag(jQuery("#drag-true"));
          })

        })
      </script>
      <h2 class="padding-1">Drag & hide settings</h2>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">drag and drop enabled:</th>
          <?php
          $drag;
          $drag = esc_attr(get_option("adh_drag"));

          if (!is_numeric($drag)) {
            $drag = 1;
          }

          ?>
          <td class="wp-menu-drag-row row-radio">
            <span><input id="drag-true" type="radio" name="adh_drag" value="1" <?php if ($drag == 1) echo "checked"; ?>> yes </span>
            <span><input type="radio" name="adh_drag" value="0" <?php if ($drag == 0) echo "checked"; ?>> no </span>
          </td>
        </tr>


        <tr valign="top" id="position-box">
          <th scope="row">position drag handler:</th>
          <?php
          $position;
          $position = esc_attr(get_option("adh_position"));

          if (!is_numeric($position)) {
            $position = 0;
          }

          ?>
          <td class="wp-menu-drag-row row-radio">
            <span><input type="radio" name="adh_position" value="1" <?php if ($position == 1) echo "checked"; ?>> left </span>
            <span><input type="radio" name="adh_position" value="0" <?php if ($position == 0) echo "checked"; ?>> center </span>
            <span><input type="radio" name="adh_position" value="2" <?php if ($position == 2) echo "checked"; ?>> right </span>
          </td>
        </tr>


        <tr valign="top">
          <th scope="row">button hide enabled:</th>
          <?php
          $hidebtn;
          $hidebtn = esc_attr(get_option("adh_hidebtn"));

          if (!is_numeric($hidebtn)) {
            $hidebtn = 1;
          }

          ?>
          <td class="wp-menu-drag-row row-radio">
            <span><input type="radio" name="adh_hidebtn" value="1" <?php if ($hidebtn == 1) echo "checked"; ?>> yes </span>
            <span><input type="radio" name="adh_hidebtn" value="0" <?php if ($hidebtn == 0) echo "checked"; ?>> no </span>
          </td>
        </tr>

      </table>


      <h2 class="padding-1">Display settings</h2>
      <table class="form-table">
        <?php
        $val = [];

        foreach ($GLOBALS['list_settings'] as $hit) {
          echo '<tr valign="top">';

          $val;
          $val = esc_attr(get_option('adh_' . $hit));

          if (!is_numeric($val)) {
            $val = 1;
          }

          echo '<th scope="row">' . $hit . ':</th>';

          echo '<td class="wp-menu-drag-row row-radio">';
          if ($val == 1) {
            echo '<span><input type="radio" name="' . 'adh_' . $hit . '" value="1" checked> yes </span>';
            echo  '<span><input type="radio" name="' . 'adh_' . $hit . '" value="0" > no </span>';
          } else {
            echo '<span><input type="radio" name="' . 'adh_' . $hit . '" value="1" > yes </span>';
            echo  '<span><input type="radio" name="' . 'adh_' . $hit . '" value="0" checked> no </span>';
          }
          echo '</td>';

          echo '</tr>';
        }
        ?>

      </table>

      <?php submit_button(); ?>

    </form>
  </div>
<?php }

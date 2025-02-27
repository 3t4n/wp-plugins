<?php
if (!defined('ABSPATH')) {
  exit;
}

$allowed_html = array(
  "strong" => array(),
  "i" => array(),
  "a" => array(
    "href" => array(),
    "id" => array(),
    "title" => array(),
    "target" => array(),
  ),
  "div" => array(
    "class" => array(),
    "id" => array()
  ),
  "p" => array("class" => array(), "id" => array()),
  "br" => array("class" => array(), "id" => array()),
  "ul" => array("class" => array(), "id" => array()),
  "ol" => array("class" => array(), "id" => array()),
  "li" => array("class" => array(), "id" => array()),
  "h1" => array("class" => array(), "id" => array()),
  "h2" => array("class" => array(), "id" => array()),
  "h3" => array("class" => array(), "id" => array()),
  "h4" => array("class" => array(), "id" => array()),
  "h5" => array("class" => array(), "id" => array()),
  "h6" => array("class" => array(), "id" => array()),
  "hr" => array("class" => array(), "id" => array()),
);
?>

<div class="wrap">

  <h1><?php echo $settings_object->settings_page_configs->page_title ?></h1>

  <h2 class="nav-tab-wrapper">
    <?php
    //tabs are created
    foreach ($settings_object->setting_page_fields->tabs as $tab) {
      $activeTab = "";
      if ($tab->active === true) {
        $activeTab = 'nav-tab-active';
      }
      if ($this->current_user_can_nsc_eprm($tab->capability) === false) {
        continue;
      }
      echo '<a href="?page=' . $settings_object->plugin_slug . '&tab=' . $tab->tab_slug . '" class="nav-tab ' . $activeTab . '" >' . $tab->tabname . '</a>';
    }
    $active_tab_index = $settings_object->setting_page_fields->active_tab_index;

    ?>
  </h2>
  <p><?php echo $settings_object->setting_page_fields->tabs[$active_tab_index]->tab_description ?></p>

  <form action="<?php echo $settings_object->setting_page_fields->tabs[$active_tab_index]->form_action ?>" method="post"
    <?php if (isset($settings_object->setting_page_fields->tabs[$active_tab_index]->form_enctype)) {
      echo 'enctype="' . $settings_object->setting_page_fields->tabs[$active_tab_index]->form_enctype . '"';
    } ?>>
    <?php
    settings_fields($settings_object->plugin_slug . $settings_object->setting_page_fields->tabs[$active_tab_index]->tab_slug);
    ?>

    <?php if (count($settings_object->setting_page_fields->tabs[$active_tab_index]->tabfields) > 0) {
      submit_button($settings_object->setting_page_fields->tabs[$active_tab_index]->save_button_text);
    } ?>

    <table class="form-table">
      <?php foreach ($settings_object->setting_page_fields->tabs[$active_tab_index]->tabfields as $field_configs) { ?>
        <tr id="tr_<?php echo $field_configs->field_slug ?>">
          <th scope="row">
            <?php echo $field_configs->name ?>
            <p><?php echo $field_configs->additional_text ?> </p>
          </th>
          <td>
            <fieldset>
              <label>
                <?php echo $form_fields->return_form_field_nsc_eprm($field_configs, $settings_object->plugin_prefix); ?>
              </label>
              <p class="description"><?php echo wp_kses($field_configs->helpertext, $allowed_html) ?></p>
            </fieldset>
          </td>
        </tr>
      <?php } ?>
    </table>
  </form>
  <?php
  ?>
<?php

/**
 * Provide an admin area view for the plugin
 *
 * This file is used to mark up the admin-facing aspects of the plugin.
 *
 * @link       https://atl-software.net/
 * @since      1.0.0
 *
 * @package    Aec
 * @subpackage Aec/admin/partials
 */

?>

<div class="wrap aec-admin-wrap">

    <?php Aec_Admin_Settings::render_settings_page_header('AEC') ?>

  <div class="aec-admin-container">
    <div class="aec-admin-container__title"><?php echo AEC()->t('aec_section_title_settings') ?></div>
    <form name="OptionsForm" method="post" action="options.php" onsubmit="return saveWpOptions();">
        <?php settings_fields('aec-options'); ?>

      <table class="form-table aec-admin-form-table">

        <tr>
          <th scope="row"><label for="aec_instance_name"><?php echo AEC()->t('aec_label_kiosque_url') ?></label></th>
          <td>https://
            <input id="aec_instance_name" type="text" size="15" name="aec_instance_name"
                   value="<?php echo get_option('aec_instance_name') ?>" /> .aec-app.com
          </td>
        </tr>

        <tr>
          <th scope="row"><label
              for="aec_instance_name_extranet"><?php echo AEC()->t('aec_label_kiosque_url') ?></label></th>
          <td>https://
            <input id="aec_instance_name_extranet" type="text" size="15" name="aec_extranet_instance_name"
                   value="<?php echo get_option('aec_extranet_instance_name') ?>" /> .extranet-aec.com
          </td>
        </tr>

        <tr>
          <th scope="row"><label for="aec_extranet_api_token"><?php echo AEC()->t('aec_label_secret_key') ?></label>
          </th>
          <td>
            <textarea id="aec_extranet_api_token" rows="2" cols="70"
                      name="aec_extranet_api_token"><?php echo get_option('aec_extranet_api_token') ?></textarea>
          </td>
        </tr>

        <tr>
          <th scope="row"><label
              for="aec_etablishment_type"><?php echo AEC()->t('aec_label_establishment_type') ?></label></th>
          <td>
            <select id="aec_etablishment_type" name="aec_etablishment_type">
              <option value="af" <?php echo get_option('aec_etablishment_type') == 'af' ? 'selected' : '' ?> >Alliance
                Française
              </option>
              <option value="if" <?php echo get_option('aec_etablishment_type') == 'if' ? 'selected' : '' ?> >Institut
                Français
              </option>
              <option
                value="aec" <?php echo get_option('aec_etablishment_type') == 'aec' ? 'selected' : '' ?> ><?php echo AEC()->t('aec_label_other') ?></option>
            </select>
          </td>
        </tr>
          <?php if (AEC()->is_client_instance_version_allowed('2024.1')): ?>
              <tr>
                  <th scope="row">
                      <input id="aec_load_kiosque_aec_build" type="checkbox" size="70"
                             name="aec_load_kiosque_aec_build"
                          <?php echo get_option('aec_load_kiosque_aec_build') === 'on' ? 'checked' : '' ?> />
                  </th>
                  <td class="aec-admin-setting-checkbox-label">
                      <label for="aec_load_kiosque_aec_build">
                          Lazy Loading
                      </label>
                  </td>
              </tr>
          <?php endif; ?>
      </table>

      <input type="submit" name="submit" id="submit"
             class="aec-admin-button aec-admin-button--primary aec-admin-button--form"
             value="<?php echo AEC()->t('aec_label_save_changes') ?>">
    </form>
  </div>
</div>

<script>
  function saveWpOptions() {
    if (!document.forms['OptionsForm']['aec_extranet_api_token'].value) {
      window.alert('Please enter your AEC Secret Key');
      name.focus();
      return false;
    }

    return true;
  }
</script>

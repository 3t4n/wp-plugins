<?php
    $options = pxc_amm_getsettings();

    function getPageTitleOrValue($value, $locale) 
    {
        if ($value->$locale) {
            if (is_numeric($value->$locale)) {
                $post = get_post($value->$locale);
                if ($post) {
                    return $post->post_title;
                }
            } else {
                return $value->$locale;
            }
        }

        return '';
    }

    $uiconfig = pxc_amm_apiclient_query($options['apiurl'] . '/uiconfig/all?apikey=' . $options['apikey']);

?>
<div class="wrap">

	<h1><?php _e("pxc-amm-settings-pagetitle", 'pxc_amm'); ?></h1>

	<form method="post" action="options.php" style="clear: both">

		<?php settings_fields('pxc_amm_group'); ?>
        <?php do_settings_sections('pxc_amm_group'); ?>
                
        <h2 class="title"><?php _e("pxc-amm-settings-authorization-title", 'pxc_amm'); ?></h2>
        <p><?php _e("pxc-amm-settings-authorization-intro", "pxc_amm"); ?></p>

        <table class="form-table">

            <tr valign="top">
                <th scope="row">
                    <label for="pxc_amm_api_key"><?php _e("pxc-amm-settings-authorization-apikey-label", 'pxc_amm'); ?></label>
                </th>
                <td>
                    <input type="hidden" id="pxc_amm_apiurl" value="<?php print esc_attr($options['apiurl']); ?>" />
                    <input type="text"
                        id="pxc_amm_apikey"
                        name="pxc_amm_apikey"
                        style="width:500px"
                        placeholder="<?php _e("pxc-amm-settings-authorization-apikey-placeholder", 'pxc_amm'); ?>"
                        value="<?php print esc_attr($options['apikey']); ?>" />
                    <input type="button" id="pxc_amm_apikey_validate" style="width:250px"
                        value="<?php _e("pxc-amm-settings-authorization-apikey-validatebutton", 'pxc_amm'); ?>" />
                    <div>
                    <span id="pxc_amm_apikey_valid" style="display:none">
                    <?php _e("pxc-amm-settings-authorization-apikey-valid", 'pxc_amm'); ?></span>                    
                    <span id="pxc_amm_apikey_invalid" <?php if (!$options['apikey'] || $uiconfig) { ?>  style="display:none" <?php } ?> />
                    <?php _e("pxc-amm-settings-authorization-apikey-invalid", 'pxc_amm'); ?></span>
                    </div>
                </td>
            </tr>
        </table>

        <p class="description"><?php _e("pxc-amm-settings-integration-helptext", "pxc_amm"); ?></p>

        <p><strong><?php _e("pxc-amm-settings-authorization-apikey-hint-title", 'pxc_amm'); ?></strong></p>
        <p><?php _e("pxc-amm-settings-authorization-apikey-hint-text", 'pxc_amm'); ?>

        <h2><?php _e("pxc-amm-settings-integration-title", 'pxc_amm'); ?></h2>
        <p><?php _e("pxc-amm-settings-integration-intro", "pxc_amm"); ?></p>

        <?php if (!$uiconfig) { ?>
        <p><?php _e("pxc-amm-settings-integration-requires-apikey", "pxc_amm"); ?></p>
        <?php } else { ?>

        <table class="form-table">

            <tr valign="top">
                <th scope="row">
                    <label for="pxc_amm_url_terms"><?php _e("pxc-amm-settings-integration-urls-terms-label", 'pxc_amm'); ?></label>
                </th>
                <td>
                <?php foreach ($uiconfig->i18n->locales as $locale) { ?>
                    <?php if (count($uiconfig->i18n->locales) > 1) { ?>
                    <label for="pxc_amm_url_terms-<?php echo $locale ?>"><?php _e("pxc-amm-settings-language-" . $locale, "pxc_amm"); ?></label>
                    <?php } ?>
                    <input type="text" id="pxc_amm_url_terms-<?php echo $locale ?>" class="pxc_amm_page_suggest"                        
                        name="pxc_amm_url_terms[<?php echo $locale ?>]"
                        style="width:750px"
                        placeholder="<?php _e("pxc-amm-settings-integration-urls-terms-placeholder", 'pxc_amm'); ?>"
                        value="<?php print esc_attr(getPageTitleOrValue($options['url-terms'], $locale)); ?>" 
                        /><br />
                <?php } ?>                    
                </td>
            </tr><tr>
                <th scope="row">
                    <label for="pxc_amm_url_privacy"><?php _e("pxc-amm-settings-integration-urls-privacy-label", 'pxc_amm'); ?></label>
                </th>
                <td>
                <?php foreach ($uiconfig->i18n->locales as $locale) { ?>
                    <?php if (count($uiconfig->i18n->locales) > 1) { ?>
                    <label for="pxc_amm_url_privacy-<?php echo $locale ?>"><?php _e("pxc-amm-settings-language-" . $locale, "pxc_amm"); ?></label>
                    <?php } ?>
                    <input type="text" id="pxc_amm_url_privacy-<?php echo $locale ?>" class="pxc_amm_page_suggest"
                        name="pxc_amm_url_privacy[<?php echo $locale ?>]"
                        style="width:750px"
                        placeholder="<?php _e("pxc-amm-settings-integration-urls-privacy-placeholder", 'pxc_amm'); ?>"
                        value="<?php print esc_attr(getPageTitleOrValue($options['url-privacy'], $locale)); ?>" 
                        /><br />
                <?php } ?>
                </td>
            </tr><tr>
                <th scope="row">
                    <label for="pxc_amm_url_imprint"><?php _e("pxc-amm-settings-integration-urls-imprint-label", 'pxc_amm'); ?></label>
                </th>
                <td>
                <?php foreach ($uiconfig->i18n->locales as $locale) { ?>
                    <?php if (count($uiconfig->i18n->locales) > 1) { ?>
                    <label for="pxc_amm_url_imprint-<?php echo $locale ?>"><?php _e("pxc-amm-settings-language-" . $locale, "pxc_amm"); ?></label>
                    <?php } ?>
                    <input type="text" id="pxc_amm_url_imprintt-<?php echo $locale ?>" class="pxc_amm_page_suggest"
                        name="pxc_amm_url_imprint[<?php echo $locale ?>]"
                        style="width:750px"
                        placeholder="<?php _e("pxc-amm-settings-integration-urls-imprint-placeholder", 'pxc_amm'); ?>"
                        value="<?php print esc_attr(getPageTitleOrValue($options['url-imprint'], $locale)); ?>" 
                        /><br />
                <?php } ?>
                </td> 
            </tr>

        </table>
        
        <?php } ?>

		<p class="submit">
			<input type="submit" class="button-primary"
				value="<?php _e('pxc-amm-settings-save', 'pxc_amm') ?>" />
		</p>

	</form>
</div>
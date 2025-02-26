<form method="POST" action="">
<table class="form-table" role="presentation">

<tbody>

<tr>
    <th scope="row"><label for="enable">Enable</label></th>
    <td>
        <input name="enable" type="checkbox" id="enable" value="1" <?php echo ( esc_attr($options["enabled"]) ) ? "checked":""; ?> />
    </td>
</tr>

<tr>
    <th scope="row"><label for="slug">Login Slug</label></th>
    <td>
        <input name="slug" type="text" id="slug" value="<?php echo esc_attr($options['slug']) ?>" class="regular-text" />
		<p class="description"><i id="customLoginSiteURL" data-url="<?php echo trailingslashit( get_bloginfo('url') ) ?>"><?php echo trailingslashit( get_bloginfo('url') ) ?><?php echo esc_attr($options["slug"]) ?></i></p>
    </td>
</tr>

<tr>
    <th scope="row"><label for="redirect_uri">Redirect URI</label></th>
    <td>
        <input name="redirect_uri" type="redirect_uri" id="redirect_uri" value="<?php echo esc_attr($options['redirect_uri']) ?>" class="regular-text" />
		<p class="description">If the redirect URL field is empty. User will be redirected to default 404 not found page.<br /> This redirect would work if the wp-login.php is visited directly.</p>

        <input type="hidden" style="display:none !important;" name="verify_nonce" id="verify_nonce" value="<?php echo wp_create_nonce( 'customLoginUrl_saveData_nonce'); ?>"  />
    </td>
</tr>


<input type="hidden" value="1" name="flpp_ext_customloginurl_save_data" />


</tbody></table>

<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>
</form>
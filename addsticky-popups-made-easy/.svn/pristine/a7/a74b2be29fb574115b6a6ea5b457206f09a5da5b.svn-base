<form action="" method="post">
    <?php wp_nonce_field( $namespace . "_options", $namespace . '_update_wpnonce' ); ?>
    <input type="hidden" name="form_action" value="update_options" />
    <div class="wrap">
        <h2><?php echo $page_title; ?></h2>
        <div class="tool-box">
            <h3 class="title">Your AddSticky Code</h3>
			<p>Fetch your AddSticky code from <a href="http://addsticky.com/wordpress/free">addsticky.com/wordpress/free</a> and paste it below.</p>
			<textarea rows="10" cols="70" name="AddSticky_code"><?php echo $AddSticky_code; ?></textarea>
            
			<h4>Load the AddSticky code in your site's:</h4>
			<input id="<?php echo $namespace; ?>-load-code-in-header" type="radio" name="load_AddSticky_in" value="header"<?php echo $load_AddSticky_in == 'header' ? ' checked="checked"' : ''; ?> /><label for="<?php echo $namespace; ?>-load-code-in-header"> Header (before &lt;/head&gt;)</label><br />
			<input id="<?php echo $namespace; ?>-load-code-in-footer"  type="radio" name="load_AddSticky_in" value="footer"<?php echo $load_AddSticky_in == 'footer' ? ' checked="checked"' : ''; ?> /><label for="<?php echo $namespace; ?>-load-code-in-footer"> Footer (before &lt;/body&gt;)</label>
        </div>
        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
        </p>
    </div>
</form>
<div class="wrap">
<h2>Add trailing text to title</h2>

<form method="post" action="<?php echo $complete_url ?>">
    <?php settings_fields( 'add-trailing-text-to-title-settings-group' ); ?>
    <?php do_settings_sections( 'add-trailing-text-to-title-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Text in title:</th>
        <td><input type="text" name="add_trailing_text_to_title_title_text" value="<?php echo esc_attr( get_option('add_trailing_text_to_title_title_text') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Separator:</th>
        <td><input type="text" placeholder="Default: ' - '" name="add_trailing_text_to_title_text_separator" value="<?php echo esc_attr( get_option('add_trailing_text_to_title_text_separator') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>

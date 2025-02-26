<?php global $Punkfish_AutoHide_Menubar; ?>
<div class="wrap">
<h2><?=PUNKFISH_AUTOHIDE_MENUBAR_PLUGINNAME;?></h2>

<form method="post" action="options.php" enctype="multipart/form-data">
    <?php settings_fields($Punkfish_AutoHide_Menubar->options['default']); ?>
    <?php do_settings_fields($Punkfish_AutoHide_Menubar->options['default'],''); ?>

    <table class="form-table">
        <tr valign="top">
	        <th scope="row">Enable Auto-Hide Menubar</th>
            <td>
                <input type="checkbox" name="<?=$Punkfish_AutoHide_Menubar->ns.'enable';?>" <?=(get_option($Punkfish_AutoHide_Menubar->ns.'enable'))?'checked="checked"':'';?> />
            </td>
        </tr>
        <tr valign="top">
	        <th scope="row">Load jQuery</th>
            <td>
                <input type="checkbox" name="<?=$Punkfish_AutoHide_Menubar->ns.'jquery';?>" <?=(get_option($Punkfish_AutoHide_Menubar->ns.'jquery'))?'checked="checked"':'';?> />
                Check this box to load jQuery (1.5.1). If you have already loaded jQuery, leave this field unchecked.
            </td>
        </tr>
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>

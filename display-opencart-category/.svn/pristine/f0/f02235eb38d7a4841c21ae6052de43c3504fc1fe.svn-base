<?php
/*
Admin options form
Author: anybuy.vn
Version: 1.0.0
*/
if($_POST['wpdocc_hidden'] == 'Y') {
    //Form data sent
    $ocdb_host = $_POST['ocdb_host'];
    update_option('ocdb_host', $ocdb_host);
    $ocdb_name = $_POST['ocdb_name'];
    update_option('ocdb_name', $ocdb_name);
    $ocdb_user = $_POST['ocdb_user'];
    update_option('ocdb_user', $ocdb_user);
    $ocdb_dbpwd = $_POST['ocdb_pass'];
    update_option('ocdb_pass', $ocdb_pass);
    $ocdb_prefix = $_POST['ocdb_prefix'];
    update_option('ocdb_prefix', $ocdb_prefix);
    $oc_store_url = $_POST['oc_store_url'];
    update_option('oc_store_url', $oc_store_url);
    $oc_seo_enabled= $_POST['oc_seo_enabled'][0];
    update_option('oc_seo_enabled', $oc_seo_enabled);
?>
<div class="updated" xmlns="http://www.w3.org/1999/html"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php
} else {
    //Normal page display
    $ocdb_host = get_option('ocdb_host');
    $ocdb_name = get_option('ocdb_name');
    $ocdb_user = get_option('ocdb_user');
    $ocdb_pass = get_option('ocdb_pass');
	$ocdb_prefix = get_option('ocdb_prefix');
    $oc_store_url = get_option('oc_store_url');
    $oc_seo_enabled = get_option('oc_seo_enabled');
}
?>
<div class="wrap">
<?php    echo "<h2>" . __( 'Display OpenCart Category Options', 'wpdocc_trdom' ) . "</h2>"; ?>
<form name="wpdocc_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <input type="hidden" name="wpdocc_hidden" value="Y">
    <?php    echo "<h4>" . __( 'OpenCart Database Settings', 'wpdocc_trdom' ) . "</h4>"; ?>
    <p><?php _e("Database host: " ); ?><input type="text" name="ocdb_host" value="<?php echo $ocdb_host; ?>" size="20"><?php _e(" ex: localhost" ); ?></p>
    <p><?php _e("Database name: " ); ?><input type="text" name="ocdb_name" value="<?php echo $ocdb_name; ?>" size="20"><?php _e(" ex: opencart_shop" ); ?></p>
    <p><?php _e("Database user: " ); ?><input type="text" name="ocdb_user" value="<?php echo $ocdb_user; ?>" size="20"><?php _e(" ex: root" ); ?></p>
    <p><?php _e("Database password: " ); ?><input type="text" name="ocdb_pass" value="<?php echo $ocdb_pass; ?>" size="20"><?php _e(" ex: secretpassword" ); ?></p>
    <p><?php _e("Database prefix: " ); ?><input type="text" name="ocdb_prefix" value="<?php echo $ocdb_prefix; ?>" size="20"><?php _e(" ex: oc_" ); ?></p>
    <hr />
    <?php    echo "<h4>" . __( 'OpenCart Store Settings', 'ocdb_trdom' ) . "</h4>"; ?>
    <p><?php _e("Store URL: " ); ?><input type="text" name="oc_store_url" value="<?php echo $oc_store_url; ?>" size="20"><?php _e(" ex: http://www.yourstore.com/" ); ?></p>
    <p><?php _e("SEO URLs Enabled: " ); ?><input type=radio name="oc_seo_enabled[]" value="Yes" <?php if($oc_seo_enabled=='Yes')echo "checked=checked";?>> Yes &nbsp;&nbsp;&nbsp;<input type=radio name="oc_seo_enabled[]" value="No" <?php if($oc_seo_enabled=='No')echo "checked=checked";?>> No    </p>
	<p class="submit">
        <input type="submit" name="Submit" value="<?php _e('Update Options', 'wpdocc_trdom' ) ?>" />
    </p>
</form>
</div>
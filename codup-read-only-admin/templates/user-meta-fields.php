<?php
if (!defined('ABSPATH'))
    exit;
?>

<div style = "margin-top:15px;">
    <label>
        <b>Read Only Admin</b>
    </label>
    
    <input style="margin-left: 11%" type="checkbox" name="read_only_admin" value="read_only_admin" id="read_only_admin" <?php if($is_read_only_admin == true){ echo 'checked'; } ?>>
</div>
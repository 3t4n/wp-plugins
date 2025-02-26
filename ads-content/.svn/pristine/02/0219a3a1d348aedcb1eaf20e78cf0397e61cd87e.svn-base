<?php
$ADSCONTENT_page = get_option("ADSCONTENT_page");

switch ($_POST["action"]) {
    case "updatePage":
        $ADSCONTENT_page["enableHead"] = isset($_POST["enableHead"]) ? true : false;
        $ADSCONTENT_page["head"] = $_POST["ads-head"];
        $ADSCONTENT_page["headCenter"] = isset($_POST["ads-head-center"]) ? true : false;
        $ADSCONTENT_page["tailCenter"] = isset($_POST["ads-tail-center"]) ? true : false;
        $ADSCONTENT_page["enableTail"] = isset($_POST["enableTail"]) ? true : false;
        $ADSCONTENT_page["tail"] = $_POST["ads-tail"];
        update_option("ADSCONTENT_page", $ADSCONTENT_page);
        break;
    default:
}
?>
<h2><?php _e("Ads Content", "ads-content"); ?></h2>
<h3><?php _e("Page", "ads-content"); ?></h3>
<hr>
<form method="POST">
    <input type="hidden" name="action" value="updatePage">
    <input type="checkbox" name="enableHead" value="enableHead" <?php if ($ADSCONTENT_page["enableHead"]) echo "checked"; ?>>
    <label for="enableHead"><?php _e("Enable ads on head", "ads-content"); ?></label>
    <input type="checkbox" id="ads-head-center" name="ads-head-center" value="ads-head-center" <?php if ($ADSCONTENT_page["headCenter"]) echo "checked"; ?>>
    <label for="ads-tail-center"><?php _e("Enable center ads on head", "ads-content"); ?></label>    
    <br>
    <textarea cols="160" rows="10" name="ads-head" id="ads-head"><?php echo stripslashes($ADSCONTENT_page["head"]); ?></textarea>
    <hr>
    <input type="checkbox" id="enableTail" name="enableTail" value="enableTail" <?php if ($ADSCONTENT_page["enableTail"]) echo "checked"; ?>>
    <label for="enableTail"><?php _e("Enable ads on tail", "ads-content"); ?></label>
    <input type="checkbox" id="ads-tail-center" name="ads-tail-center" value="ads-tail-center" <?php if ($ADSCONTENT_page["tailCenter"]) echo "checked"; ?>>
    <label for="ads-tail-center"><?php _e("Enable center ads on tail", "ads-content"); ?></label>
    <br>
    <textarea cols="160" rows="10" name="ads-tail" id="ads-head"><?php echo stripslashes($ADSCONTENT_page["tail"]); ?></textarea>
    <hr>
    <input type="submit" value="<?php _e("Update", "ads-content"); ?>"/>
</form>


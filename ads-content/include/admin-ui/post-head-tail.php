<?php
$ADSCONTENT_post = get_option("ADSCONTENT_post");

switch ($_POST["action"]) {
    case "updatePost":
        $ADSCONTENT_post["enableHead"] = isset($_POST["enableHead"]) ? true : false;
        $ADSCONTENT_post["head"] = $_POST["ads-head"];
        $ADSCONTENT_post["headCenter"] = isset($_POST["ads-head-center"]) ? true : false;
        $ADSCONTENT_post["tailCenter"] = isset($_POST["ads-tail-center"]) ? true : false;
        $ADSCONTENT_post["enableTail"] = isset($_POST["enableTail"]) ? true : false;
        $ADSCONTENT_post["tail"] = $_POST["ads-tail"];
        update_option("ADSCONTENT_post", $ADSCONTENT_post);
        break;
    default:
}
?>
<h2><?php _e("Ads Content", "ads-content"); ?></h2>
<h3><?php _e("Post", "ads-content"); ?></h3>
<hr>
<form method="POST">
    <input type="hidden" name="action" value="updatePost">
    <input type="checkbox" name="enableHead" value="enableHead" <?php if ($ADSCONTENT_post["enableHead"]) echo "checked"; ?>>
    <label for="enableHead"><?php _e("Enable ads on head", "ads-content"); ?></label>
    <input type="checkbox" id="ads-head-center" name="ads-head-center" value="ads-head-center" <?php if ($ADSCONTENT_post["headCenter"]) echo "checked"; ?>>
    <label for="ads-tail-center"><?php _e("Enable center ads on head", "ads-content"); ?></label>    
    <br>
    <textarea cols="160" rows="10" name="ads-head" id="ads-head"><?php echo stripslashes($ADSCONTENT_post["head"]); ?></textarea>
    <hr>
    <input type="checkbox" id="enableTail" name="enableTail" value="enableTail" <?php if ($ADSCONTENT_post["enableTail"]) echo "checked"; ?>>
    <label for="enableTail"><?php _e("Enable ads on tail", "ads-content"); ?></label>
    <input type="checkbox" id="ads-tail-center" name="ads-tail-center" value="ads-tail-center" <?php if ($ADSCONTENT_post["tailCenter"]) echo "checked"; ?>>
    <label for="ads-tail-center"><?php _e("Enable center ads on tail", "ads-content"); ?></label>
    <br>
    <textarea cols="160" rows="10" name="ads-tail" id="ads-head"><?php echo stripslashes($ADSCONTENT_post["tail"]); ?></textarea>
    <hr>
    <input type="submit" value="<?php _e("Update", "ads-content"); ?>"/>
</form>


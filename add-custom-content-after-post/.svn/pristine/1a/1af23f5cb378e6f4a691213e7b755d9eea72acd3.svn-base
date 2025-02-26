<?php

add_action('admin_menu', 'acc_adminMenu');
function acc_adminMenu() {
    add_options_page('Add Custom Content After Page and Post', 'Add Custom Content After Page and Post', 'manage_options', 'acc_Add_Custom_Content.php', 'acc_adminPage');
}

function acc_adminPage(){
	$text = '';
	if(isset($_POST['acc_content_form_submit']) && $_POST['acc_content_form_submit'] == 'Y') {
		$text = $_POST['acc_content'];
		update_option('acc_content',$text);
	}
?>
	<div class="wrap">
        <h2>Add Custom Content After Every Post</h2>
        <form name="acc_content_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <input type="hidden" name="acc_content_form_submit" value="Y">
            <textarea name="acc_content" style="width: 100%;"><?php echo $text; ?></textarea>
            <p class="submit">
            <input type="submit" name="Submit" value="Save" />
            </p>
        </form>
	</div>
<?php
}
?>
<div class="wrap">
	<h2><?php _e('Social Sharing Box - Settings', 'wdshare');?></h2>
<div id ="note" class="update">
<p>Note: The social sharing box plugin will be displayed ONLY on your posts. Example: www.yoursite.com/your-post/</p>
</div>
<?php if (WP_NETWORK_ADMIN) { ?>
	<form action="settings.php" method="post">
<?php } else { ?>
	<form action="options.php" method="post">
<?php } ?>

	<?php settings_fields('wdshare'); ?>
	<?php do_settings_sections('wdshare_options_page'); ?>
	<p class="submit">
		<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
	</p>
	</form>

</div>

<script type="text/javascript">
(function ($) {
$(function () {

function toggleRelativeLeft () {
	var val = $("#wdshare-left_relative").val();
	if ("selector" == val) $("#wdshare-left_selector-root").show();
	else $("#wdshare-left_selector-root").hide();
}
function toggleRelativeTop () {
	var val = $("#wdshare-top_relative").val();
	if ("selector" == val) $("#wdshare-top_selector-root").show();
	else $("#wdshare-top_selector-root").hide();
}

$("#wdshare-left_relative").change(toggleRelativeLeft);
$("#wdshare-top_relative").change(toggleRelativeTop);

toggleRelativeLeft();
toggleRelativeTop();

$("#wdshare-services").sortable({
	"items": "li:not(.wdshare-disabled)"
});
$('.wdshare-service-item input[name*="services"]').change(function () {
	var $me = $(this);
	var $parent = $me.parents('.wdshare-service-item');
	if ($me.is(":checked")) $parent.removeClass("wdshare-disabled");
	else if (!$me.is(":checked") && !$parent.is(".wdshare-disabled")) $parent.addClass("wdshare-disabled");
	$("#wdshare-services").sortable("destroy").sortable({
		"items": "li:not(.wdshare-disabled)"
	});
});

$(".wdshare_remove_service").click(function() {
	$(this).parents('li.wdshare-service-item').remove();
	return false;
});

});
})(jQuery);
</script>
<?php
// nav script
?>
<script>
jQuery(function() {
	jQuery('nav#ACH_pager div').click(function (){
		jQuery('nav#ACH_pager div').removeClass('active');
		jQuery(this).addClass('active');
		var pageID = jQuery(this).attr('data-page');
		jQuery('.sub-page').hide();
		jQuery('#' + pageID).show();
		jQuery('#' + pageID).show();
		jQuery('#ACS_as').get(0).value = this.id;
	});

	jQuery('nav#ACH_pager <?php
		echo (!empty($activeSection))
			? '#' . $activeSection
			: 'div:first-child' ?>').trigger('click');
  // Handler for .ready() called.
});
</script>
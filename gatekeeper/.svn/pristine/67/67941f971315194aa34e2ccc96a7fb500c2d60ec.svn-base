jQuery(document).ready(function() {
	jQuery("#gk-whitelist-table").hide();
	jQuery("#gk-blacklist-table").hide();
});

jQuery("#gk-whitelist-title").click(function() {
	var $parent = jQuery("#gk-whitelist-table");
	var $toggleStatus = jQuery("#gk-whitelist-title.gk-section-title .gk-toggle-status");

	$parent.slideToggle(function() {
		if ( $toggleStatus.attr('data-toggle-status') === 'closed' ) {
			$toggleStatus.attr('data-toggle-status', 'open');
			$toggleStatus.text('-');
		} else {
			$toggleStatus.attr('data-toggle-status', 'closed');
			$toggleStatus.text('+');
		}
	});
});

jQuery("#gk-blacklist-title").click(function() {
	var $parent = jQuery("#gk-blacklist-table");
	var $toggleStatus = jQuery("#gk-blacklist-title.gk-section-title .gk-toggle-status");

	$parent.slideToggle(function() {
		if ( $toggleStatus.attr('data-toggle-status') === 'closed' ) {
			$toggleStatus.attr('data-toggle-status', 'open');
			$toggleStatus.text('-');
		} else {
			$toggleStatus.attr('data-toggle-status', 'closed');
			$toggleStatus.text('+');
		}
	});
});


// class="gk-toggle-status" data-toggle-status="closed"

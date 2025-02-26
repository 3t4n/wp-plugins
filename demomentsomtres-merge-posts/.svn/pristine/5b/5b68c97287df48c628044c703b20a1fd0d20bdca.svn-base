jQuery(document).ready(function() {
	jQuery(".titan-framework-panel-wrap button[name='action']").click(function(event) {
		var target = 0;
		var contents = [];
		jQuery(".titan-framework-panel-wrap select").each(function(i) {
			if (i == 0) {
				target = jQuery(this).val();
			} else {
				contents[i - 1] = jQuery(this).val();
			}
		});
		if (target == 0) {
			alert(dms3MergePosts.error_target);
		} else {
			if (contents.indexOf(target) != -1) {
				alert(dms3MergePosts.error_target_in_contents);
			} else {
				var temp = contents.sort(function(a, b) {
					return (b - a);
				});
				if (temp[0] == 0) {
					alert(dms3MergePosts.error_contents_required);
				} else {
					jQuery.ajax({
						url : dms3MergePosts.ajaxurl,
						data : {
							target : target,
							contents : contents
						},
						success : function(result) {
							if (result.success) {
								for ( index = 0; index < contents.length; ++index) {
									if (contents[index] != 0) {
										jQuery(".titan-framework-panel-wrap option[value='" + contents[index] + "']").remove();
									}
								}
								alert(dms3MergePosts.success);
							} else {
								alert(dms3MergePosts.failure);
							}
						}
					}).fail(function() {
						alert(dms3MergePosts.failure);
					});
				}
			}
		}
	});
});

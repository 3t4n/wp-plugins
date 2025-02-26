jQuery(document).ready(function ($) {
	/** Demo Import **/
	$('.demo_import_btn').on('click', function (e) {
		e.preventDefault();

		$import_true = confirm(IDMObject.demo_confirm);
		if($import_true == false) return;

		var el = $(this);
		var ajaxurl = IDMObject.ajaxurl;
		var folder = el.attr('data-folder');
		var menu = el.attr('data-menu');
		var homepage = el.attr('data-homepage');
		var blogpage = el.attr('data-blogpage');

		el.addClass('installing');
		el.html(IDMObject.demo_installing);

		$.ajax({
			method: "POST",
            url: ajaxurl,
            data: ({
            'action': 'demo_import_action',
            'folder': folder,
            'menu': menu,
            'homepage': homepage,
            'blogpage': blogpage,
            }),
            success: function(response){
            	alert(IDMObject.demo_import_success);
                el.removeClass('installing');
				el.html(IDMObject.demo_installed);
            }
        });
	});
}); // Document Load Complete

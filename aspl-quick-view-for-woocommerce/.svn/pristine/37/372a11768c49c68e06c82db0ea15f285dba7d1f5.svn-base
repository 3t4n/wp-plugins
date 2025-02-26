jQuery(document).ready(function($){

	$(document).on("click", ".aspl_quick_view_button" , function() {
		$(this).parents(".quick_view_main").find('.quick_popup_body').css('display','unset');
	});

	$(document).on("click", ".aspl_quick_view_cancel_btn" , function() {
		$(this).parents(".quick_view_main").find('.quick_popup_body').hide();
	});

	$(document).on("click", ".aspl_qv_fature_image" , function() {
		var img_src = $(this).attr('src');
		$(this).parents(".quick_popup_body_image").find('.aspl_qv_main_img').attr('src',img_src);
	});

});
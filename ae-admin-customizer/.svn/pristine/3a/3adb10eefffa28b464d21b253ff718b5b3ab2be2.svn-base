(function ($) {
  $(function () {
  	/* Admin Panel Styling */
    $("#ae_topbar_background_color").wpColorPicker();
    $("#ae_topbar_menuitem_color").wpColorPicker();
    $("#ae_topbar_menuitem_hover_color").wpColorPicker();
    $("#ae_topbar_menuitem_icon_color").wpColorPicker();
    $("#ae_topbar_menuitem_hover_bgc").wpColorPicker();

    //sidebar
    $("#ae_sidebar_bgc").wpColorPicker();
    $("#ae_sidebar_child_bgc").wpColorPicker();
    $("#ae_sidebar_hover_bgc").wpColorPicker();
    $("#ae_sidebar_text_color").wpColorPicker();
    $("#ae_sidebar_hover_text_color").wpColorPicker();
    $("#ae_sidebar_icon_color").wpColorPicker();

    //global
    $("#ae_global_text_color").wpColorPicker();
    $("#ae_global_link_color").wpColorPicker();
    $("#ae_global_link_hover_color").wpColorPicker();

	$("#ae_global_default_button_color").wpColorPicker();
	$("#ae_global_default_button_hover_color").wpColorPicker();
	$("#ae_global_default_button_text_color").wpColorPicker();
	$("#ae_global_default_button_text_hover_color").wpColorPicker();

	$("#ae_global_primary_button_text_color").wpColorPicker();
	$("#ae_global_primary_button_text_hover_color").wpColorPicker();
    $("#ae_global_primary_button_color").wpColorPicker();
    $("#ae_global_primary_button_hover_color").wpColorPicker();


    //Login and Reg
    $("#ae_logreg_bgcolor_picker").wpColorPicker();
    $("#ae_logreg_textcolor_picker").wpColorPicker();
    $("#ae_logreg_linkcolor_picker").wpColorPicker();
    $("#ae_logreg_buttoncolor_picker").wpColorPicker();
    $("#ae_logreg_boxcolor_picker").wpColorPicker();
    $("#ae_logreg_box_border_color").wpColorPicker();
    
    $("#ae_logreg_image_background_blend_color").wpColorPicker();

    $("#ae_admin_dashboard_logo_btn").click(ae_admin_customizer_open_media);

	var media_uploader = null;

	function ae_admin_customizer_open_media()
	{
	    media_uploader = wp.media({
	        frame:    "post", 
	        state:    "insert", 
	        multiple: false
	    });

	    media_uploader.on("insert", function(){
	        var json = media_uploader.state().get("selection").first().toJSON();
	        var image_url = json.url;
	      	$("#ae_admin_dashboard_logo").val(image_url);
	      	$("#ae_admin_dashboard_logo_img").attr("src", image_url);
	    });

	    media_uploader.open();
	};

	$("#ae_admin_login_background_btn").click(ae_admin_login_bg_open_media);

	function ae_admin_login_bg_open_media()
	{
	    media_uploader = wp.media({
	        frame:    "post", 
	        state:    "insert", 
	        multiple: false
	    });

	    media_uploader.on("insert", function(){
	        var json = media_uploader.state().get("selection").first().toJSON();
	        var image_url = json.url;
	      	$("#ae_logreg_image_background").val(image_url);
	      	$("#ae_logreg_image_background_img").attr("src", image_url);
	    });

	    media_uploader.open();
	};

	$("#ae-admin-btn-export").on("click", function(){
	    var $temp = $("#ae-admin-export");
	    $temp.focus().select();
	    document.execCommand("copy");
	    alert("Settings has been copied to clipboard.")
	});

  });
}(jQuery));
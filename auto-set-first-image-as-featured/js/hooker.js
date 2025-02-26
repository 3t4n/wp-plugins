function is_BusyBox_IsName_OpenTabData(evt, tabName) {
	var i, tabcontent, BusyBoxTabLinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	BusyBoxTabLinks = document.getElementsByClassName("BusyBoxTabLinks");
	for (i = 0; i < BusyBoxTabLinks.length; i++) {
		BusyBoxTabLinks[i].className = BusyBoxTabLinks[i].className.replace(" active", "");
	}
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";
}

function is_BusyBox_IsName_RandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function is_BusyBox_IsName_OpenLinkInNewTabBlank(url) {
	var win = window.open(url, '_blank');
}

 

jQuery(document).ready(function ($) {

$(window).load(function() {
  $(".loaderDanteTarget").fadeOut("slow");
});


$('img').each(function() {
     var date = new Date().getTime() / 1000;
     var src = $(this).attr("src").replace(".png", ".png?=" + date);
     $(this).attr("src", src);
});
$('img').each(function() {
     var date = new Date().getTime() / 1000;
     var src = $(this).attr("src").replace(".jpg", ".jpg?=" + date);
     $(this).attr("src", src);
});

 

	$('#thumbnail_url_field_cleanup_btn').click(function (e) {
		$('#thumbnail_url_field_cleanup').val('');
	});


	$(".trigger_div_alert_popup").click(function () {
		$('.hover_alert_popup').show();
	});
	$('.hover_alert_popup').click(function () {
		$('.hover_alert_popup').hide();
	});
	$('.popupCloseButton').click(function () {
		$('.hover_alert_popup').hide();
	});


	if ((window.location.href.indexOf("wp-admin/admin.php?page=dante_credits_and_support") > -1) || (window.location.href.indexOf("wp-admin/admin.php?page=wp_BusyBox") > -1)) {


		$("img").mousedown(function () {
			//return false;
		});
		$(document).bind("contextmenu",function(e){
		 	//return false;
		});
   
		$("#wpfooter").css("display", "none");


	}

	if ((window.location.href.indexOf("wp-admin/admin.php?page=wp_BusyBox") > -1)) {


		$('.BusyBoxTabLinks').click(function () {
			$(".is_BusyBox_IsName_SaveChangesBtn").css("display", "block");
		});


		jQuery('#BusyBoxIdTabUnusedTags').click(function () {
			$(".is_BusyBox_IsName_SaveChangesBtn").css("display", "none");
		});

		jQuery('#BusyBoxIdSysInfo').click(function () {
			$(".is_BusyBox_IsName_SaveChangesBtn").css("display", "none");
		});
		
		jQuery(function(){
			jQuery('#BusyBoxDefultTabClick').click();
		});
		
 
        /*
		$(".BusyBoxTab button").hover(function(){
			$(this).css("background", is_BusyBox_IsName_RandomColor() );
		},
		function(){
			$(this).css("background", '');
		});
        */

	}


});
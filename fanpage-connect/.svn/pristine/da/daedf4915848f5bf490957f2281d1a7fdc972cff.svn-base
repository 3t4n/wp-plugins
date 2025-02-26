jQuery(document).ready(function(){
	// handle custom FPC menu custom post items
	// remove the custom post type menu for apps
	jQuery("#menu-posts-fpc-app").remove();
	var fpcMenu = jQuery("#toplevel_page_fpc-main");
	var fpcMenuUl = jQuery("#toplevel_page_fpc-main .wp-submenu");
	var fpcMenuLi = jQuery("#toplevel_page_fpc-main .wp-submenu li");
	var thePage = jQuery(".wrap > h2").clone();
	thePage.find("a").remove();
	var thePageName = thePage.text().trim();
	if(thePageName.indexOf('Fanpage Connect Facebook App') != -1 || thePageName.indexOf('FPC Page') != -1){
		jQuery("#visibility").remove();
		jQuery(".misc-pub-section.curtime").remove();
		jQuery(".row-actions").find('.inline.hide-if-no-js').remove();
	}
	if(thePageName == "Fanpage Connect Facebook Apps" || thePageName == "Edit Fanpage Connect Facebook App"){
		fpcMenuLi.find("a[href*='edit.php?post_type=fpc-app']").addClass("current").parent().addClass("current");
		fpcMenu.removeClass("wp-not-current-submenu").addClass("wp-has-current-submenu wp-menu-open");
		fpcMenu.find("a").first().removeClass("wp-not-current-submenu").addClass("wp-has-current-submenu wp-menu-open");
	} else if(thePageName == "New Fanpage Connect Facebook App"){
		fpcMenuLi.find("a[href*='post-new.php?post_type=fpc-app']").addClass("current").parent().addClass("current");
		fpcMenu.removeClass("wp-not-current-submenu").addClass("wp-has-current-submenu wp-menu-open");
		fpcMenu.find("a").first().removeClass("wp-not-current-submenu").addClass("wp-has-current-submenu wp-menu-open");
	}
	// add widget toggle button if we're doing widgets
	if(String(location.href).indexOf('widgets.php') != -1){
		var fpc_editFPC = "Edit Fanpage Connect Sidebars";
		var fpc_editWP = "Edit Theme Sidebars";
		jQuery("#widgets-right").prepend('<button id="fpc-sidebar-toggle" class="button button-primary button-large">Placeholder Text</button>');
		jQuery("#fpc-sidebar-toggle").on("click",function(){
			$this = jQuery(this);
			fpc_toggleSidebarEdit($this);
		});
		function fpc_toggleSidebarEdit($obj){
			if($obj.attr("editing") == "" || $obj.attr("editing") == "wp"){
				jQuery("#widgets-right .widgets-holder-wrap:not(.sidebar-fpc-sidebar)").hide();
				jQuery(".sidebar-fpc-sidebar").show();
				jQuery("#fpc-sidebar-toggle").text(fpc_editWP).attr("editing","fpc");
			} else {
				jQuery("#widgets-right .widgets-holder-wrap:not(.sidebar-fpc-sidebar)").show();
				jQuery(".sidebar-fpc-sidebar").hide();
				jQuery("#fpc-sidebar-toggle").text(fpc_editFPC).attr("editing","wp");
			}
		}
		if(location.search.indexOf('widgets=fpc') != -1){
			jQuery("#widgets-right .widgets-holder-wrap:not(.sidebar-fpc-sidebar)").hide();
			jQuery(".sidebar-fpc-sidebar").show();
			jQuery("#fpc-sidebar-toggle").text(fpc_editWP).attr("editing","fpc");
		} else {
			jQuery("#widgets-right .widgets-holder-wrap:not(.sidebar-fpc-sidebar)").show();
			jQuery(".sidebar-fpc-sidebar").hide();
			jQuery("#fpc-sidebar-toggle").text(fpc_editFPC).attr("editing","wp");
		}
	}
	if(appsCreated){
		buyURL  = 'http://www.fanpageconnect.com/pro';
		appMsg  = 'Sorry, in the free version of Fanpage Connect\n';
		appMsg += 'you may only create '+appsCreated.maxApps+' App.\n';
		appMsg += 'Would you like to upgrade to get unlimited apps?';
		pgMsg   = 'Sorry, in the free version of Fanpage Connect\n';
		pgMsg  += 'you may only create '+appsCreated.maxPages+' Fan Pages.\n';
		pgMsg  += 'Would you like to upgrade to get unlimited fan pages?';
		if(appsCreated.maxApps > 0 && appsCreated.numApps >= appsCreated.maxApps){
			jQuery('a[href="post-new.php?post_type=fpc-app"]').attr('href','#').on('click',function(){
				if(confirm(appMsg)){
					window.open(buyURL);
				}
			});
			if(typenow == 'fpc-app' && pagenow.indexOf('fpc-app') != -1){
				jQuery('.add-new-h2').remove();
			}
		}
		if(appsCreated.maxPages > 0 && appsCreated.numPages >= appsCreated.maxPages){
			jQuery('a[href="post-new.php?post_type=fpc-fanpage"]').attr('href','#').on('click',function(){
				if(confirm(pgMsg)){
					window.open(buyURL);
				}
			});
			if(typenow == 'fpc-fanpage' && pagenow.indexOf('fpc-fanpage') != -1){
				jQuery('.add-new-h2').remove();
			}
		}
	}
});
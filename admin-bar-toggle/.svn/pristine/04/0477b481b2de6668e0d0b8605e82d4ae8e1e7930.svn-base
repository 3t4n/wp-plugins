jQuery(document).ready(function($) {
	var
		$window = 			$(window),
		$body =				$('body'),
		$firstLoad =		true,
		$adminBar =			$('#wpadminbar'),
		$html = 			$('html'),
		$adminBarHeight = $body.is( '.admin-bar' ) ? $adminBar.height() : 0;

	$adminBar.after('<a id="showadminbar" href="/" title="Show Admin Bar">&nbsp;</a>'); //&darr;</a>');
	var $showAdminBar = $('#showadminbar');
	checkWidth();	

	// ! Hide Admin Bar
	$('#wp-admin-bar-toggle a').click(function() {
		$html.stop().animate({marginTop:'0'},250,"linear");
		$adminBar.stop().animate({marginTop:'-'+$adminBarHeight+'px'},250,"linear",function(){
			$showAdminBar.stop().animate({marginTop:'0'},250,"linear");
		});

		barHidden();

		return false;
	});

	// ! Show Admin Bar
	$showAdminBar.click(function() {
		$(this).stop().animate({marginTop:'-'+$adminBarHeight+'px'},250,"linear",function(){
			$html.stop().animate({marginTop: $adminBarHeight+'px'},250,"linear");
			$adminBar.stop().animate({marginTop:'0'},250,"linear");
		});	

		barShowing();

		return false;
	});	

	$(window).resize(checkWidth);

	function checkWidth() {
        var windowsize = $window.width();
		$adminBarHeight = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0
		hideBar();
    }

    function barShowing(){
    	$html.removeClass('jck_ab_hidden');
	    $html.addClass('jck_ab_showing');
    }

    function barHidden(){
    	$html.removeClass('jck_ab_showing');
	    $html.addClass('jck_ab_hidden');
    }

    function hideBar(){
	    $html.css({marginTop:'0'});
		$showAdminBar.css({marginTop:'0'});
		$adminBar.css({marginTop:'-'+$adminBarHeight+'px'});
		barHidden();
    }
});
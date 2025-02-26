(function( $ ) {
	'use strict';

	$(document).ready(function() {
	    
    /**
	 * this function is used for active menu button and show page on page reload
	 *
	 * @since    1.0.0
	 */

    var ciwcamp_currentURL = $(location).attr('href'); 

    var ciwcamp_res = ciwcamp_currentURL.split("#");


    if(ciwcamp_res['1']=="ciwcamp-dashboard")
    {
        $("#ciwcamp-dashboard").css("display", "inline");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").addClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    }
    else if(ciwcamp_res['1']=="ciwcamp-links")
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "inline");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");;
        $("#ciwcamp-links-btn").addClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    }
    else if(ciwcamp_res['1']=="ciwcamp-sales")
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "inline");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").addClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    }
    else if(ciwcamp_res['1']=="ciwcamp-earnings")
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "inline");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").addClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    }
    else if(ciwcamp_res['1']=="ciwcamp-withdraw")
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "inline");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").addClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");

    }
    else if(ciwcamp_res['1']=="ciwcamp-profile")
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "inline");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").addClass("active");
    }
    else
    {

        $("#ciwcamp-dashboard").css("display", "inline");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").addClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    }


	/**
	 * this function is used for active menu button and show page
	 *
	 * @since    1.0.0
	 */
	 
    $("#ciwcamp-dashboard-btn").click(function()
    {
        $("#ciwcamp-dashboard").css("display", "inline");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").addClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    })

    $("#ciwcamp-links-btn").click(function()
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "inline");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").addClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    })

    $("#ciwcamp-sales-btn").click(function()
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "inline");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").addClass("active")
        $("#ciwcamp-earnings-btn").removeClass("active");;
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    })

    $("#ciwcamp-earnings-btn").click(function()
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "inline");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").addClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    })

    $("#ciwcamp-withdraw-btn").click(function()
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "inline");
        $("#ciwcamp-profile").css("display", "none");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").addClass("active");
        $("#ciwcamp-profile-btn").removeClass("active");
    })

    $("#ciwcamp-profile-btn").click(function()
    {
        $("#ciwcamp-dashboard").css("display", "none");
        $("#ciwcamp-links").css("display", "none");
        $("#ciwcamp-sales").css("display", "none");
        $("#ciwcamp-earnings").css("display", "none");
        $("#ciwcamp-withdraw").css("display", "none");
        $("#ciwcamp-profile").css("display", "inline");

        $("#ciwcamp-dashboard-btn").removeClass("active");
        $("#ciwcamp-links-btn").removeClass("active");
        $("#ciwcamp-sales-btn").removeClass("active");
        $("#ciwcamp-earnings-btn").removeClass("active");
        $("#ciwcamp-withdraw-btn").removeClass("active");
        $("#ciwcamp-profile-btn").addClass("active");
    })
});

})( jQuery );




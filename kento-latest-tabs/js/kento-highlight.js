jQuery(document).ready(function($){
    'use strict';

    // Handle tab click to activate tab and display corresponding content
    $('ul li.tabs').click(function(event){
        // Remove the active class from all tabs
        $('ul li.tabs').removeClass('active');
        
        // Add the active class to the clicked tab
        $(this).addClass('active');
    });

    // Cache divs for performance
    var divs = $("#tab1, #tab2, #tab3");

    // Handle the tab content display on tab link click
    $('li.tabs a').click(function () {
        // Hide all content divs
        divs.hide();

        // Show the content corresponding to the clicked tab
        var targetTab = "#" + $(this).attr('class');
        $(targetTab).slideDown(500);
    });
});
// 
// Scripts
// 

jQuery(document).on( 'click', '.buyingbuddy-caching-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'buyingbuddy_dismiss_caching_notice'
        }
    })

})

jQuery(document).on( 'click', '.buyingbuddy-oldplugin-notice .notice-dismiss', function() {

    jQuery.ajax({
        url: ajaxurl,
        data: {
            action: 'buyingbuddy_dismiss_oldplugin_notice'
        }
    })

})

function addCopyButtons(clipboard,thisDiv) {
    document.querySelectorAll('div.' + thisDiv).forEach(function (codeBlock) {
        var button = document.createElement('button');

        button.className = 'btn btn-sm btn-inline order-2 my-0 px-2';
        button.type = 'button';
        button.innerHTML = '<svg style="stroke-width:1.57917;fill:#ffffff" width="1.3em" height="1.3em" viewBox="0 0 1200 1200"><path d="M429.193 63.018a35.787 35.787 0 0 0-22.934 11.72 35.785 35.785 0 0 0-9.136 24.083v178.998H98.771a34.264 34.264 0 0 0-3.732 0 35.797 35.797 0 0 0-32.07 35.797v787.61a35.823 35.823 0 0 0 10.487 25.315 35.824 35.824 0 0 0 25.316 10.486h668.303a35.812 35.812 0 0 0 25.315-10.486 35.824 35.824 0 0 0 10.487-25.316V922.227h298.352a35.823 35.823 0 0 0 25.316-10.487 35.814 35.814 0 0 0 10.486-25.316V98.815v.006a35.801 35.801 0 0 0-35.802-35.802H432.926a37.653 37.653 0 0 0-3.732 0zm39.528 71.6h596.704v716.01H802.873V313.631l.006-.006a35.797 35.797 0 0 0-10.487-25.31 35.788 35.788 0 0 0-25.315-10.486H468.725ZM134.57 349.416h596.704v716.01H134.57Z"/></svg>';
        button.title = 'Copy to clipboard';

        button.addEventListener('click', function (e) {
            e.preventDefault();
            clipboard.writeText(codeBlock.innerText).then(function () {
                button.blur();
                button.innerHTML = '<svg style="fill:#ffffff;fill-rule:evenodd;stroke:none;stroke-width:1" width="1.3em" height="1.3em" viewBox="0 0 68 68"><path d="m 27.22475,50.92713 -0.0958,-0.0838 -0.0878,0.0838 -14.84406,-14.84493 5.27807,-5.27438 9.65382,9.67037 23.39596,-23.40532 5.27408,5.27837 z M 33.99601,0 C 15.22734,0 0,15.22823 0,34.002 0,52.77576 15.22734,68 33.99601,68 52.76867,68 68,52.77576 68,34.002 68,15.22823 52.76867,0 33.99601,0 Z"/></svg>';
                button.classList.add('btn-success');

                setTimeout(function () {
                    button.innerHTML = '<svg style="stroke-width:1.57917;fill:#ffffff" width="1.3em" height="1.3em" viewBox="0 0 1200 1200"><path d="M429.193 63.018a35.787 35.787 0 0 0-22.934 11.72 35.785 35.785 0 0 0-9.136 24.083v178.998H98.771a34.264 34.264 0 0 0-3.732 0 35.797 35.797 0 0 0-32.07 35.797v787.61a35.823 35.823 0 0 0 10.487 25.315 35.824 35.824 0 0 0 25.316 10.486h668.303a35.812 35.812 0 0 0 25.315-10.486 35.824 35.824 0 0 0 10.487-25.316V922.227h298.352a35.823 35.823 0 0 0 25.316-10.487 35.814 35.814 0 0 0 10.486-25.316V98.815v.006a35.801 35.801 0 0 0-35.802-35.802H432.926a37.653 37.653 0 0 0-3.732 0zm39.528 71.6h596.704v716.01H802.873V313.631l.006-.006a35.797 35.797 0 0 0-10.487-25.31 35.788 35.788 0 0 0-25.315-10.486H468.725ZM134.57 349.416h596.704v716.01H134.57Z"/></svg>';
                    button.classList.remove('btn-success');
                }, 2000);
            }, function (error) {
                button.innerText = 'Error';
                console.error(error)
            })
        });
        var pre = codeBlock;
        pre.parentNode.insertBefore(button, pre)
    })
}

jQuery(document).ready(function() {
	addCopyButtons(navigator.clipboard,'copyme');  
	jQuery( ".bb-addWidgets-title" ).click(function() {
		jQuery(".bb-addWidgets-container").toggleClass( "bb-hidden" );
		if (jQuery(".bb-addWidgets-container").is(":hidden") ) {
			jQuery(".bb-addWidgets-title .svg-plus").removeClass("d-none");
			jQuery(".bb-addWidgets-title .svg-minus").addClass("d-none")
		} else {
			jQuery(".bb-addWidgets-title .svg-plus").addClass("d-none");
			jQuery(".bb-addWidgets-title .svg-minus").removeClass("d-none")	
		}
	});
	jQuery( ".bb-debug-title" ).click(function() {
		jQuery(".bb-debug-container").toggleClass( "bb-hidden" );
		if (jQuery(".bb-debug-container").is(":hidden") ) {
			jQuery(".bb-debug-title .svg-plus").removeClass("d-none");
			jQuery(".bb-debug-title .svg-minus").addClass("d-none")
		} else {
			jQuery(".bb-debug-title .svg-plus").addClass("d-none");
			jQuery(".bb-debug-title .svg-minus").removeClass("d-none")	
		}
		
	});
	
	jQuery("#bbVideoModal").appendTo("body");
	var video = document.getElementById("bbVideo");
	jQuery(".show-video").click(function(e){
		e.preventDefault();
		jQuery("#bbVideo").attr("poster", jQuery(this).data("pic"));
		jQuery("#bbVideo").find("source").attr("src", jQuery(this).data("vid"));
		jQuery("#bbVideoModal").modal('show');
		video.load();
		video.play();
    });
    jQuery("#bbVideoModal").on("shown.bs.modal", function(e) {
        var video = document.getElementById("bbVideo");
        video.play();
    });
    // stop video on modal hide
    jQuery("#bbVideoModal").on("hide.bs.modal", function(e) {
        var video = document.getElementById("bbVideo");
        video.pause();
    });
    
	// Convert tab list to drop down
	jQuery('.tab_selector').change(function(){
        var selectedValue = jQuery(this).val();
        jQuery('#' + selectedValue).tab('show');
    });
	
    // Select all checkboxes
    jQuery('#select_all').on('click', function(){
        let chk_status = this.checked;
        // Iterate all listed checkbox items
        jQuery('.chk-input').each(function(){
            this.checked = chk_status;
        });
    });  
    
    // Check or uncheck "select all", if one of the listed checkbox items is checked/unchecked
    jQuery('.chk-input').on('click', function(){
        if(jQuery('.chk-input:checked').length == jQuery('.chk-input').length){
        	jQuery('#select_all').prop('checked', true);
        }else{
        	jQuery('#select_all').prop('checked', false);
        }
    });

    // Attach event listener to all fields with the class 'bb-page-title-field'
    jQuery(".bb-page-title-field").on("input", function () {
      // Get the value of the input field
      let titleValue = jQuery(this).val();

      // Transform the value to lowercase and replace spaces with dashes
      let slugValue = titleValue.toLowerCase().replace(/\s+/g, "-");

      // Find the corresponding hidden field using the data-slug-target attribute
      let hiddenFieldId = jQuery(this).data("slug-target");

      // Update the value of the hidden field
      jQuery("#" + hiddenFieldId).val(slugValue);
    });


    // Function to update agentID and officeID
    jQuery('#update-values').on('click', function() {
        var newAgentID = jQuery('#new-agentID').val();
        var newOfficeID = jQuery('#new-officeID').val();

        if (newAgentID) {
        	jQuery('.agentID').text(newAgentID);
        }
        if (newOfficeID) {
        	jQuery('.officeID').text(newOfficeID);
        }
    });
    
    // Function to scroll to top of tab-pane

    // Attach an event listener to the tabs
	jQuery('#bbplugin-settings a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // Get the target tab pane ID
        var targetPane = jQuery(e.target).data('target');  

        // Get the offset position of the target pane
        var offsetTop = jQuery(targetPane).offset().top; 
        
        // Adjust the offset for headers / margins
        var adjustedOffset = offsetTop - 180; 

        // Scroll the whole page to the adjusted top position
        jQuery('html, body').animate({
            scrollTop: adjustedOffset
        }, 500); // Duration of scroll animation (500ms)
    });

    
    // Function to support inner tab navigation and make the new tab 'active'
    // Listen for clicks on links with the "activate-tab" class
    jQuery('.activate-tab').on('click', function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Get the target tab-pane ID from the href attribute
        var targetTabPane = jQuery(this).attr('href'); // e.g., #bbAddWidgets

        // Find the corresponding navigation tab link and activate it
        jQuery('a[data-target="' + targetTabPane + '"], a[href="' + targetTabPane + '"]').tab('show');
    });

    // Function for link to navigate to top nav tutorial tab
    jQuery('.tutorials-tab-link').on('click', function(e) {
        e.preventDefault();
        // Show the tab
        jQuery('#bbTutorialsTab').tab('show');
        
        // Update active classes
        jQuery('#bbTutorialsTab').addClass('active');  // Add active to tutorials tab
    });

});


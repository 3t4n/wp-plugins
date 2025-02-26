(function($){
    /*
     *  Caching all fonts vars to use later on scripts
     *  Input fields
     */
    'use strict';
    var titleFS = $( "#titleFS" );

    //fonts slider IDS and classes
    var TS = '#titleSlider',
        SR = ".ui-slider-range",
        SH = ".ui-slider-handle";

    //for tabs
    $(".team-tabs-menu a").click(function(event) {
        event.preventDefault();
        var $this = $(this);
        $this.parent().addClass("current");
        $this.parent().siblings().removeClass("current");
        var tab2open = $this.attr("href");
        $(".team-tab-content").not(tab2open).css("display", "none");
        $(tab2open).fadeIn();
    });

    // enable sorting if only the container has any social or skill field
    if( $("#social_info_sortable_container").length || $("#skill_info_sortable_container").length) {
        $("#social_info_sortable_container, #skill_info_sortable_container").sortable(
            {
                axis: 'y',
                opacity: '0.7'
            }
        );
    }

    // SOCIAL SECTION
    // Rearrange the IDS and Add new social field
    $("#addNewSocial").on('click', function(){
        var $s_wrapper = $('.adl_social_field_wrapper');
        var currentItems = $s_wrapper.length;
        var ID = "id="+currentItems; // eg. 'id=3'
        var iconBindingElement = jQuery('#addNewSocial');
        // arrange names ID in order before adding new elements
        $s_wrapper.each(function( index , element) {
            var e = $(element);
            e.attr('id','socialID-'+index);
            e.find('select').attr('name', 'social['+index+'][id]');
            e.find('.adl_social_input').attr('name', 'social['+index+'][url]');
            e.find('.removeSocialField').attr('data-id',index);
        });
        // now add the new elements. we could do it here without using ajax but it would require more markup here.
        adlAjaxHandler( iconBindingElement, 'social_info_handler', ID, function(data){
            $("#social_info_sortable_container").append(data);
        });
    });


    // remove the social field and then reset the ids while maintaining position
    $(document).on('click', '.removeSocialField', function(e){
        var id = $(this).data("id"),
            elementToRemove = $('div#socialID-'+id);
        e.preventDefault();
        /* Act on the event */
        swal({
                title: "Are you sure?",
                text: "Do you really want to remove this Social Link!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false },
            function(isConfirm) {
                if(isConfirm){
                    // user has confirmed, no remove the item and reset the ids
                    elementToRemove.slideUp( "fast", function(){
                        elementToRemove.remove();
                        // reorder the index
                        $('.adl_social_field_wrapper').each(function( index , element) {
                            var e = $(element);
                            e.attr('id','socialID-'+index);
                            e.find('select').attr('name', 'social['+index+'][id]');
                            e.find('.adl_social_input').attr('name', 'social['+index+'][url]');
                            e.find('.removeSocialField').attr('data-id',index);
                        });
                    });
                    // show success message
                    swal({
                        title: "Deleted!!",
                        //text: "Item has been deleted.",
                        type:"success",
                        timer: 200,
                        showConfirmButton: false });
                }
            });
    });

    // SKILL SECTION-----------
    // Add New Skill
    $("#addNewSkill").on('click', function(){
        var $skill_wrap = $('.adl_skill_field_wrapper');
        var currentItems = $skill_wrap.length;
        var ID = "id="+currentItems; // eg. 'id=3'
        var iconBindingElement = jQuery('#addNewSkill');
        // arrange names ID in order before adding new elements
        $skill_wrap.each(function( index , element) {
            var e = $(element);
            //console.dir('before'+ e.attr('id'));
            e.attr('id','skillID-'+index);
            e.find('.adl_skill_name').attr('name', 'skill['+index+'][id]');
            e.find('.adl_skill_input').attr('name', 'skill['+index+'][percentage]');
            e.find('.removeSkillField').attr('data-id',index);
            //console.dir('after'+ e.attr('id'));
        });

        // add new skill item
        // now add the new elements. we could do it here without using ajax but it would require more markup here.
        adlAjaxHandler( iconBindingElement, 'skill_info_handler', ID, function(data){
            $("#skill_info_sortable_container").append(data);
        });
    });


    // Remove A Skill
    $(document).on('click', '.removeSkillField', function(event) {
        var id = $(this).data("id"),
            elementToRemove = $('div#skillID-'+id);
        event.preventDefault();
        /* Act on the event */
        swal({
                title: "Are you sure?",
                text: "Do you really want to remove this Skill !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false },
            function(isConfirm) {
                if(isConfirm){
                    // user has confirmed, no remove the item and reset the ids
                    elementToRemove.slideUp( "fast", function(){
                        elementToRemove.remove();
                        // reorder the index
                        $('.adl_skill_field_wrapper').each(function( index , element) {
                            var e = $(element);
                            e.attr('id','skillID-'+index);
                            e.find('.adl_skill_name').attr('name', 'skill['+index+'][id]');
                            e.find('.adl_skill_input').attr('name', 'skill['+index+'][percentage]');
                            e.find('.removeSkillField').attr('data-id',index);
                        });
                    });
                    // show success message
                    swal({
                        title: "Deleted!!",
                        //text: "Item has been deleted.",
                        type:"success",
                        timer: 200,
                        showConfirmButton: false });
                }
            });
    });

    // Toggle Setting for Selected Theme

    // hide all theme setting on load then show them based on selected value
    $('#style1, #style2, #style3, #style4, #style5, #style6').hide();

    var $theme = $('#adl_team_theme'); // get theme jQuery object

    var currentTheme = $theme.val(); // get current theme

    $('#' + currentTheme).show(); // show current theme

    // change theme setting based on selection value
    $theme.on('change',function(){
        var $this = $(this);
        var $stl_1 = $('#style1');
        var $stl_3 = $('#style3');
        var $stl_2 = $('#style2');
        var $stl_4 = $('#style4');
        var $stl_5 = $('#style5');
        var $stl_6 = $('#style6');

        ('style1' === $this.val() ) ? $stl_1.show() : $stl_1.hide();
        ('style2' === $this.val() ) ? $stl_2.show() : $stl_2.hide();
        ('style4' === $this.val() ) ? $stl_4.show() : $stl_4.hide();
        ('style5' === $this.val() ) ? $stl_5.show() : $stl_5.hide();
        ('style6' === $this.val() ) ? $stl_6.show() : $stl_6.hide();

        if('style3' === $this.val() ) {
            $stl_3.show();
            titleFS.attr('value', '24');
            //console.log(titleFS.val());
            jQuery(TS+' > '+ SR).width('24%');
            jQuery(TS+' > '+ SH).css('left', '24%');
        } else {
            $stl_3.hide();
            titleFS.attr('value',36);
            jQuery(TS+' > '+ SR).width('36%');
            jQuery(TS+' > '+ SH).css('left', '36%');
        }
    });
    // Color picker
    $('.adl_team_color').wpColorPicker();

})(jQuery);


function adlAjaxHandler( ElementToShowLoadingIconAfter, ActionName, arg, CallBackHandler){
    'use strict';
    var data;
    if(ActionName) {data = "action=" + ActionName; }
    if(arg)    {data = arg + "&action=" + ActionName; }
    if(arg && !ActionName) {data = arg;}
    //data = data ;

    var n = data.search(adl_team_obj.nonceAction);
    if(n<0){
        data = data + "&"+adl_team_obj.nonceAction+"=" + adl_team_obj.nonce;
    }

    jQuery.ajax({
        type: "post",
        url: ajaxurl,
        data: data,
        beforeSend: function() { jQuery("<span class='adl_ajax_loading'></span>").insertAfter(ElementToShowLoadingIconAfter); },
        success: function( data ){
            jQuery(".adl_ajax_loading").remove();
            CallBackHandler(data);
        }
    });
}


// Custom Image uploader for member image
jQuery(function($){
    'use strict';
    // Set all variables to be used in scope
    var frame,
        metaBox = $('#_adl_team_general_info.postbox'), // meta box id here
        addImgLink = metaBox.find('#member_image_btn'),
        delImgLink = metaBox.find( '#delete-custom-img'),
        imgContainer = metaBox.find( '.custom-img-container'),
        imgIdInput = metaBox.find( '#member_image_id'),

        addImgLink2 = imgContainer;


    // ADD IMAGE LINK
    addImgLink.on( 'click', function( event ){

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( frame ) {
            frame.open();
            return;
        }

        // Create a new media frame
        frame = wp.media({
            title: 'Select or Upload a Member Image',
            button: {
                text: 'Use this Image'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });


        // When an image is selected in the media frame...
        frame.on( 'select', function() {

            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();

            // Send the attachment URL to our custom image input field.
            imgContainer.html( '<img src="'+attachment.url+'" alt="Member Image" />' );

            // Send the attachment id to our hidden input
            imgIdInput.val( attachment.id );

            // Hide the add image link
            addImgLink.addClass( 'hidden' );

            // Unhide the remove image link
            delImgLink.removeClass( 'hidden' );
        });

        // Finally, open the modal on click
        frame.open();
    });

    // ADD IMAGE LINK 2 binding to image container div
    addImgLink2.on( 'click', function( event ){

        event.preventDefault();

        // If the media frame already exists, reopen it.
        if ( frame ) {
            frame.open();
            return;
        }

        // Create a new media frame
        frame = wp.media({
            title: 'Select or Upload a Member Image',
            button: {
                text: 'Use this Image'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });


        // When an image is selected in the media frame...
        frame.on( 'select', function() {

            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();

            // Send the attachment URL to our custom image input field.
            imgContainer.html( '<img src="'+attachment.url+'" alt="Member Image" />' );

            // Send the attachment id to our hidden input
            imgIdInput.val( attachment.id );

            // Hide the add image link
            addImgLink.addClass( 'hidden' );

            // Unhide the remove image link
            delImgLink.removeClass( 'hidden' );
        });

        // Finally, open the modal on click
        frame.open();
    });

    // DELETE IMAGE LINK
    delImgLink.on( 'click', function( event ){

        event.preventDefault();

        // Clear out the preview image and set no image as placeholder
        imgContainer.html( '<img src="'+adl_team_obj.AdminAsset+'img/no-image.jpg" alt="Member Image" />' );

        // Un-hide the add image link
        addImgLink.removeClass( 'hidden' );

        // Hide the delete image link
        delImgLink.addClass( 'hidden' );

        // Delete the image id from the hidden input
        imgIdInput.val( '' );

    });

});

// jQuery UIs
jQuery(function($){
    'use strict';

    /*
     *  Caching all fonts vars to use later on scripts
     *  Input fields
     */
    var titleFS = $( "#titleFS"),
        descriptionFS = $( "#descriptionFS"),
        memberNameFS = $( "#memberNameFS"),
        designationFS = $( "#designationFS"),
        biographyFS = $( "#biographyFS"),
        iconFS = $( "#iconFS");

    //fonts slider IDS and classes
    var TS = '#titleSlider',
        DescS = '#descriptionSlider',
        MnS = '#memberNameSlider',
        DesigS = '#designationSlider',
        BS = '#biographySlider',
        IS = '#iconSlider',
        SR = ".ui-slider-range",
        SH = ".ui-slider-handle";

    /*
     * Range selectors
     * --------------------------------------
     */

    // Title slider
    var titleSlider = $( TS ),
        DefaultTFS = titleFS.attr( 'value');

    titleSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultTFS ? DefaultTFS : 24,
        slide: function( event, ui ) {
            var v = ui.value;
            titleFS.attr( 'value', v );
            //console.log(titleFS.outerWidth());
            //console.log(v);
            // increase the input width if value is more than 99
            (v > 99) ? titleFS.outerWidth(40) : titleFS.outerWidth(32);

        }
    });
    titleFS.val( titleSlider.slider( "value" ) );


    // Description slider
    var descriptionSlider = $( DescS ),
        DefaultDescFS = descriptionFS.attr( 'value');

    descriptionSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultDescFS ? DefaultDescFS : 16,
        slide: function( event, ui ) {
            var v = ui.value;
            descriptionFS.attr( 'value', v );
            // increase the input width if value is more than 99
            (v > 99) ? descriptionFS.outerWidth(40) : descriptionFS.outerWidth(32);

        }
    });
    descriptionFS.val( descriptionSlider.slider( "value" ) );


    // Member Name slider
    var memberNameSlider = $( MnS ),
        DefaultDescFS = memberNameFS.attr( 'value');

    memberNameSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultDescFS ? DefaultDescFS : 16,
        slide: function( event, ui ) {
            var v = ui.value;
            memberNameFS.attr( 'value', v );
            // increase the input width if value is more than 99
            (v > 99) ? memberNameFS.outerWidth(40) : memberNameFS.outerWidth(32);

        }
    });
    memberNameFS.val( memberNameSlider.slider( "value" ) );


    // Designation slider
    var designationSlider = $( DesigS ),
        DefaultDescFS = designationFS.attr( 'value');

    designationSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultDescFS ? DefaultDescFS : 16,
        slide: function( event, ui ) {
            var v = ui.value;
            designationFS.attr( 'value', v );
            // increase the input width if value is more than 99
            (v > 99) ? designationFS.outerWidth(40) : designationFS.outerWidth(32);

        }
    });
    designationFS.val( designationSlider.slider( "value" ) );


    // Biography slider
    var biographySlider = $( BS ),
        DefaultDescFS = biographyFS.attr( 'value');

    biographySlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultDescFS ? DefaultDescFS : 16,
        slide: function( event, ui ) {
            var v = ui.value;
            biographyFS.attr( 'value', v );
            // increase the input width if value is more than 99
            (v > 99) ? biographyFS.outerWidth(40) : biographyFS.outerWidth(32);

        }
    });
    biographyFS.val( biographySlider.slider( "value" ) );

    // Icon slider
    var iconSlider = $( IS ),
        DefaultDescFS = iconFS.attr( 'value');

    iconSlider.slider({
        range: "min",
        min: 0,
        max: 100,
        value: DefaultDescFS ? DefaultDescFS : 16,
        slide: function( event, ui ) {
            var v = ui.value;
            iconFS.attr( 'value', v );
            // increase the input width if value is more than 99
            (v > 99) ? iconFS.outerWidth(40) : iconFS.outerWidth(32);

        }
    });
    iconFS.val( iconSlider.slider( "value" ) );


    /*
     * Accordion
     * --------------------------------------
     */

    $('#adlTeamAccordion').accordion({
        collapsible: true,
        //event: "mouseover",
        heightStyle: "content"
    });


    /*
     * Nice Select
     * --------------------------------------
     */
    $('select.adl-nice-select').niceSelect();

});

// query type toggling
jQuery(function($){
    'use strict';
// Initialized all vars at the top
    var $checkWrap = $('.adl-team-checkbox-wrapper'),
        $member_id = $('#member_id'),
        $teamHwrap = $('.team-header-wrap'),
        $cropWrap = $('.hide-it');


    $('input.query_type').on('click', function () {
        var $this = $(this);

        ($this.attr('id') === 'query_type3') ? $checkWrap.show() : $checkWrap.hide();
        ($this.attr('id') === 'query_type4') ?$member_id.show() :$member_id.hide();

    });

    // add class active if they are checked
    if( $('input[id=query_type3]').is(':checked') ) {
        $checkWrap.show();
    }
    if( $('input[id=query_type4]').is(':checked') ) {
        $member_id.show();
    }

    // Team header display toggle
    // check if the header is on then show the title and description setting which is hidden by default
    if( $('input#show_team_header').is(':checked') ) {
        $teamHwrap.removeClass("team-header-wrap");
    }else{
        $teamHwrap.addClass("team-header-wrap");
    }
    // show or hide when the header switch is clicked
    $('#team_header_switch').on('click', function () {
        $teamHwrap.toggle('300');
    });


    //crop switch toggling
    // Remove class 'hide-it' if they are checked. hide-it class hides element by default
    if( $('input#crop_image').is(':checked') ) {
        $cropWrap.removeClass("hide-it");
    }else{
        $cropWrap.addClass("hide-it");
    }

    //toggle height and width visibility when image crop button is clicked.
    $('#crop_switch').on('click', function () {
        $cropWrap.toggleClass("hide-it");
    });

});


/**************************
*** Define all elements ***
***************************/
function OrgPopup(){
    this.template = '<div class="org_dark_overlay"></div>'+
    '<div class="org_popup_wrapper">'+
        '<div class="org_popup_header"></div>'+
        '<div class="org_popup_form">'+
            '<button class="org_close_popup">[X]</button>'+
            '<form name="org_update_image_alt">'+
                '<label for="org_alt_input">Enter ALT:</label>'+
                '<input type="text" id="org_alt_input">'+
                '<div class="org_form_error">Please put some value. Minimum 3 characters.</div>'+
                '<button id="org_alt_input_submit" data-source="">Save</button>'+
                '<div class="org_ajax_loader"></div>'+
            '</form>'+
            '<div class="org_popup_response_message"></div>'+
        '</div>'+
    '</div>';

    this.openPopup = function(){
        jQuery("body").append(this.template);
    },
    this.closePopup = function(){
        jQuery(".org_dark_overlay, .org_popup_wrapper").fadeOut().remove();
    },
    this.init = function(){
        console.log("popup loaded and ready to be called");
    };

    // this.prototype.sayHello = function() {
    //   console.log("Hello, I'm prototype function");
    // };

}
var OrgPopup = new OrgPopup();

var org_udpate_image_button = '<button class="notifyer notifyer-right org_image_update org_button">Update ALT</button>';
var total_links = jQuery("a:not(.orgout)").length;
var total_links_buttons = '';
if(total_links && total_links > 0){
    total_links_buttons = '(<a href="#" class="orgout highlight_links">Highlight</a> | <a href="#" class="orgout check_links">Check</a>)';
}
var total_images = jQuery("img").length;
var total_images_buttons = '';
if(total_images && total_images > 0){
    total_images_buttons = '(<a href="#" class="orgout highlight_images">Highlight</a> | <a href="#" class="orgout check_images">Check</a>)';
}
var total_forms = jQuery("form").length;
var total_forms_buttons = '';
if(total_forms && total_forms > 0){
    total_forms_buttons = '(<a href="#" class="orgout highlight_forms">Highlight</a> | <a href="#" class="orgout check_forms">Check</a>)</li>';
}

var org_analyzer_sidebar = '<div id="org_analyzer_sidebar">'+
    '<div class="org_analyzer_sidebar_toggle">[x]</div>'+
    '<div class="org_analyzer_sidebar_title"><h4>Medrankinteractive Accessibility Helper</h4><h5>Medrankinteractive made easy!</h5></div>'+
    '<div class="org_analyzer_line"></div>'+
    '<ul>'+
        '<li>Links: '+total_links+' '+total_links_buttons+'</li>'+
        '<li>Images: '+total_images+' '+total_images_buttons+'</li>'+
        '<li>Forms: '+total_forms+' '+ total_forms_buttons+'</li>'+
    '</ul>'+
    '<div class="org_analyzer_line"></div>'+
    '<div class="org_errors_list">'+
        '<ul>'+
            '<li class="org_color_type"><a href="#" data-errortype="good" class="org_error_type orgout"><span class="org-good"></span>Good (feature)</a></li>'+
            '<li class="org_color_type"><a href="#" data-errortype="warning" class="org_error_type orgout"><span class="org-warning"></span>Warning (alert)</a></li>'+
            '<li class="org_color_type"><a href="#" data-errortype="error" class="org_error_type orgout"><span class="org-error"></span>Error (fix it now)</a></li>'+
        '</ul>'+
    '</div>'+
    '<div class="org_analyzer_sidebar_footer">Created by <a href="http://volkov.co.il" target="_blank">A.Volkov</a></div>'+
'<div>';

jQuery(document).ready(function(){

    //Wrap all images
    jQuery("img").each(function(){
        jQuery(this).wrap("<span class='org_image_wrapper'></span>");
    });

    //Forms control
    jQuery("form").each(function(){
        jQuery(this).addClass("org_analyzer_form");
    });

    jQuery("body").append(org_analyzer_sidebar);

    /********* Links checker *********/
    jQuery(".highlight_links").click(function(e){
        e.preventDefault();
        jQuery("a").each(function(){
            org_highlight_this_link(jQuery(this));
        });
    });
    jQuery(".check_links").click(function(e){
        e.preventDefault();
        var check_list_toggle = jQuery(this);

        if( !check_list_toggle.hasClass('active') ) {
            check_list_toggle.addClass('active');
            jQuery("a").each(function(){
                org_check_this_link(jQuery(this));
            });
        } else {
            check_list_toggle.removeClass('active');
            org_remove_notifyer();
        }
    });
    /********* Images checker *********/
    jQuery(".highlight_images").click(function(e){
        e.preventDefault();
        jQuery("img").each(function(){
            org_highlight_this_image(jQuery(this));
        });
    });
    jQuery(".check_images").click(function(e){
        e.preventDefault();
        var check_images_toggle = jQuery(this);

        if( !check_images_toggle.hasClass('active') ) {
            check_images_toggle.addClass('active');
            jQuery("img").each(function(){
                org_check_this_image( jQuery(this) );
            });
        } else {
            check_images_toggle.removeClass('active');
            jQuery("img").removeClass("highlighted_error");
            org_remove_notifyer();
        }
    });
    /********* Forms checker *********/
    jQuery(".highlight_forms").click(function(e){
        e.preventDefault();
        jQuery("form").each(function(){
            org_highlight_this_form(jQuery(this));
        });
    });
    jQuery(".check_forms").click(function(e){
        e.preventDefault();
        var check_forms_toggle = jQuery(this);
        if( !check_forms_toggle.hasClass('active') ) {
            check_forms_toggle.addClass('active');
            jQuery("form").each(function(){
                org_check_this_form(jQuery(this));
            });
        } else {
            check_forms_toggle.removeClass('active');
            org_remove_notifyer();
        }
    });


    jQuery(".org_analyzer_sidebar_toggle").click(function(e){
        e.preventDefault();
        jQuery(this).toggleClass('closed');
        jQuery("#org_analyzer_sidebar").toggleClass('closed');
    });

    jQuery("body").on("click",".org_error_type", function(e){
        e.preventDefault();
        if(!jQuery(this).hasClass("active")){
            jQuery(".org_error_type").removeClass("active");
            jQuery(this).addClass("active");
            org_filter_results_by_type(jQuery(this).data("errortype"));
        } else {
            jQuery(this).removeClass("active");
            org_unfilter_results_by_type(jQuery(this).data("errortype"));
        }
    });

    jQuery("body").on("click",".org_image_update", function(e){
        e.preventDefault();
        var source = jQuery(this).parents(".org_image_wrapper").find("img").attr("src");
        org_generate_popup(source);
    });
    //Submit alt for image
    jQuery("body").on("click","#org_alt_input_submit", function(e){
        e.preventDefault();
        var alt_input_value = jQuery("#org_alt_input").val();
        if( alt_input_value && org_alt_input !==' ' && alt_input_value.length > 2 ){
            jQuery(".org_form_error").fadeOut();

            var target_src    = jQuery(this).data("source");
            var org_alt_input = jQuery('#org_alt_input').val();

            org_show_ajax_loader();
            if(target_src){
                jQuery.ajax({
                    type        : "post",
                    dataType    : "json",
                    url         : ajax.ajaxurl,
                    data        : {
                        action          : "org_update_image_alt",
                        target_src      : target_src,
                        org_alt_input   : org_alt_input
                    },
                    success: function(response) {
                        if(response.status == "ok") {
                            org_hide_ajax_loader();
                            jQuery(".org_popup_response_message").html('<span class="good">'+response.message+'</span>');
                        } else {
                            jQuery(".org_popup_response_message").html(response.message);
                        }
                    }
                });
            }
        } else {
            jQuery(".org_form_error").fadeIn();
        }
    });
    //Close popup
    jQuery("body").on("click",".org_close_popup", function(e){
        e.preventDefault();
        OrgPopup.closePopup();
    });
});

function org_check_this_link(element) {
    if( !element.hasClass('orgout') ){
        var href_attr       = element.attr('href');
        var role_attr       = element.attr('role');
        var title_attr      = element.attr('title');
        var aria_label_attr = element.attr('aria-label');
        var link_text       = element.text();
        //check role
        if( typeof role_attr !== typeof undefined && role_attr !== false ){
            element.append('<div class="notifyer org-good">role="'+role_attr+'"</div>');
        }
        //check aria-label
        if( typeof aria_label_attr !== typeof undefined && aria_label_attr !== false ){
            element.append('<div class="notifyer org-good">aria-label</div>');
        }
        //check title
        if( typeof title_attr !== typeof undefined && title_attr !== false ){
            element.append('<div class="notifyer org-good">title</div>');
        } else {
            element.append('<div class="notifyer org-warning">no title</div>');
        }
        //check href
        if( typeof href_attr !== typeof undefined && href_attr == '#' ){
            element.append('<div class="notifyer org-warning">url</div>');
        }
        //check text
        if( link_text === '' ){
            element.append('<div class="notifyer org-error">no text</div>');
        }
    }
}
function org_check_this_image(element){
    var image_alt = element.attr('alt');
    if( typeof image_alt == 'undefined' && image_alt == false || !image_alt ){
        element.parent().append('<div class="notifyer notifyer-left org-error">no alt</div>');
        element.parent().append(org_udpate_image_button);
        element.addClass('highlighted_error');
    }
}
function org_check_this_form(element){
    var input_labels = element.find('label');
    if(input_labels && typeof input_labels !== 'undefined'){
        jQuery(input_labels).each(function(){
            jQuery(this).append('<div class="notifyer org-good">label</div>');
        });
    }
}
/* Highlight */
function org_highlight_this_link(element) {
    if( !element.hasClass('orgout') ){
        element.toggleClass("highlighted");
    }
}
function org_highlight_this_form(element) {
    if( !element.hasClass('orgout') ){
        element.toggleClass("highlighted");
    }
}
function org_highlight_this_image(element) {
    if( !element.hasClass('orgout') ){
        element.toggleClass("highlighted");
    }
}
/* Fitler */
function org_filter_results_by_type(type){
    jQuery(".notifyer").hide();
    jQuery(".notifyer.wah-"+type).show();
}
function org_unfilter_results_by_type(type){
    jQuery(".notifyer").show();
}

function org_generate_popup(source) {
    OrgPopup.openPopup();
    setTimeout(function(){
        jQuery("#org_alt_input_submit").attr("data-source",source);
    }, 800);
}
function org_show_ajax_loader(){
    jQuery(".org_ajax_loader").fadeIn(250);
}
function org_hide_ajax_loader(){
    jQuery(".org_ajax_loader").fadeOut(250);
}
function org_remove_notifyer(){
    jQuery(".notifyer").remove();
}

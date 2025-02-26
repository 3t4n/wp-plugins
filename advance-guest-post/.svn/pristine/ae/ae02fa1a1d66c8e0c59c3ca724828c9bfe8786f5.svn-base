jQuery(document).ready(function($) {
    
    /*
     * The data array if a form is not used. In this case only a button is used
     * requiring the data to be serialized manually.
     */
	var data = {
		action: 'my_action',
		whatever: 1234
	};

    jQuery("#zsSubmit").click( function() {
        jQuery("#zsSubmitLoader").show();
        
        jQuery.post(ajaxurl, data, function(response) {
            alert('Got this from the server: ' + response);
            
            jQuery("#zsSubmitLoader").fadeOut();
        });    
    })
    
    /*
     * Once again, the 'action' variable must be set to the callback functoin
     * defined in the php file. No other data is passed with this function
     * because we are demonstrating the get_posts function.
     */
    var getPostsData = {
        action: 'get_posts'
    }
    
    jQuery("#zsGetPosts").click( function() {
        jQuery("#zsGetPostsLoader").show();

        //POST the data and append the results to the results div
        jQuery.post(ajaxurl, getPostsData, function(response) {
            jQuery("#zsGetPostsLoader").fadeOut();
            jQuery("#results").html(response);
        });    
    })
    
    /*
     * In this example no data array is needed because we are serializing the
     * options form #zs_options form. To work properly a hidden input with the name
     * action must be defined with the appropriate callback function.
     */
    jQuery("#zsSetOption").click( function() {
        jQuery("#zsSetOptionLoader").show();
        
        //POST the data and append the results to the results div
        jQuery.post(ajaxurl, jQuery("#zs_options_form").serialize(), function(response) {
            jQuery("#zsSetOptionLoader").fadeOut();            
            jQuery("#results").html(response);          
        });    
    })    
});
var user_ids = adt_url_users.user_list; //Data comes from the WP Localize API
var site_url = adt_url_users.site_url; //Data comes from the WP Localize API
var adt_nonce = adt_url_users.adt_nonce;

var total_users = user_ids.length;
var i = 0;

jQuery(document).ready(function() {
    jQuery("#progressbar").progressbar({ value: 0 });
});

function create_picture() {
    alert(adt_url_users.alert_msg) //Msg comes from the localize API
    run_loop_to_create_image(user_ids[i]);
}

function run_loop_to_create_image(current_user) {
    jQuery.ajax({
        async: true,
        type: "POST",
        url: site_url + '/?active_directory_thumbnails=' + current_user + '&nonce=' + adt_nonce,
        success: function(data) {
            if (i < total_users) {
                jQuery( "#progressbar" ).progressbar( "option", "value", Math.round((i/total_users)*100) );
                i++;
                jQuery("#current_user_id").html(current_user);
                run_loop_to_create_image(user_ids[i]);
            } else {
                jQuery( "#progressbar" ).progressbar( "option", "value", 100 );
                alert("Done!");
                jQuery("#current_user_id").html("Done!");
            }
        }
    });
}

function create_single_user_picture() {
    var user_id = jQuery("#adt_user_dropdown option:selected").val();
    var user_name = jQuery("#adt_user_dropdown option:selected").text()
    jQuery.ajax({
        async: true,
        type: "POST",
        url: site_url + '/?active_directory_thumbnails=' + user_id  + '&nonce=' + adt_nonce,
        success: function(data) {
            alert(adt_url_users.completed_msg + " " + user_name);
        }
    });
}
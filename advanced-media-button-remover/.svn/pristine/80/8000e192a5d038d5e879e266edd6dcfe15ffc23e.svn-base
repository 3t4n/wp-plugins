jQuery(document).ready(function(){
    if (jQuery("#media-buttons").length > 0) {
        jQuery.post("admin-ajax.php", {
            action: "adv_media_button_items",
            'cookie': encodeURIComponent(document.cookie)
        }, function(str){
            var hideButtons = jQuery.parseJSON(str);
            var countHidden = 0;
            if (hideButtons.image_button) {
                jQuery("#media-buttons #add_image").hide();
                countHidden++;
            }
            if (hideButtons.video_button) {
                jQuery("#media-buttons #add_video").hide();
                countHidden++;
            }
            if (hideButtons.music_button) {
                jQuery("#media-buttons #add_audio").hide();
                countHidden++;
            }
            if (hideButtons.media_button) {
                jQuery("#media-buttons #add_media").hide();
                countHidden++;
            }
            if (countHidden == 4) {
                jQuery("#media-buttons").hide();
            }
        });
    };
    });

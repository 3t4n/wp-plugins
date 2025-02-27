/*
* Ajax to reactivate an inactive tag
*/
function reactivateTag(tagId, adId) {
    var data = {
      action: 'do_reactivate_tag',
      _nonce: nonceSettings['do_reactivate_tag'],
      tagId: tagId
    };
  
    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
      var result = JSON.parse(response.substr(0, response.length-1));
        console.log(result);
        if(result.status){
            Swal.fire({
                icon: 'success',
                html: result.message,
                timer: 2000,
              });
            jQuery_money('#tag_'+adId).prop('disabled', false);
            jQuery_money('#btn_reactivate_'+tagId).hide();
        } else {
            Swal.fire({
                icon: 'error',
                html: result.message,
                timer: 2000,
            });
        }
    });
}

/*
* Ajax to generate a tag
*/
function generateTag(adId, siteId) {
    var data = {
      action: 'do_generate_tag',
      _nonce: nonceSettings["do_generate_tag"],
      adId: adId
    };
  
    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
        var result = JSON.parse(response.substr(0, response.length-1));
        console.log(result);
        if(result.status){
            Swal.fire({
                icon: 'success',
                html: result.message,
                timer: 2000,
              });
            var container_tags_html = '<div class="themoneytizer_flex_column">';
            container_tags_html += '<div>';
            container_tags_html += '<label for="ref_shortcode_'+adId+'">Shortcode</label>';
            container_tags_html += '<button type="button" class="themoneytizer_button" onclick="contentToClipBoard(\'#ref_shortcode_'+adId+'\')"><i class="bi bi-clipboard-check"></i></button>';
            container_tags_html += '</div>';
            container_tags_html += '<input onfocus="this.select()" id="ref_shortcode_'+adId+'" type="text" value="[themoneytizer id=&quot;'+siteId+'-'+adId+'&quot;]"><br>';
            container_tags_html += '<div>';
            container_tags_html += '<label for="tag_'+adId+'">'+result.translation.label+'</label>';
            container_tags_html += '<button type="button" class="themoneytizer_button" onclick="contentToClipBoard(\'#tag_'+adId+'\')"><i class="bi bi-clipboard-check"></i></button>';
            container_tags_html += '</div>';
            container_tags_html += '<textarea id="tag_'+adId+'" onclick="this.select()">&lt;div id="'+siteId+'-'+adId+'"&gt;&lt;script src="//ads.themoneytizer.com/s/gen.js?type='+adId+'"&gt;&lt;/script&gt;&lt;script src="//ads.themoneytizer.com/s/requestform.js?siteId='+siteId+'&amp;formatId='+adId+'"&gt;&lt;/script&gt;&lt;/div&gt;</textarea>';
            container_tags_html += '</div>';
            jQuery_money('#container_action_'+adId+' div').hide();
            jQuery_money('#container_tags_'+adId).html(container_tags_html);
            jQuery_money('#data_auto_'+adId).removeAttr("disabled");
        } else {
            Swal.fire({
                icon: 'error',
                html: result.message,
                timer: 2000,
              });
        }
    });
}

/*
* Ajax to ask a format
*/
function pendingFormat(adId) {
    var data = {
      action: 'put_format_on_pending',
      _nonce: nonceSettings["put_format_on_pending"],
      adId: adId
    };
  
    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
        var result = JSON.parse(response.substr(0, response.length-1));
        if(result.status){
            Swal.fire({
                icon: 'success',
                html: result.message,
                timer: 2000,
              });
            var htmlContent = "<div class=\"themoneytizer_button center button-tag-status\" style=\"background-color: #d64e07; cursor: default\">";
            htmlContent += "<i class=\"bi bi-clock ico-tag-status\"></i>&nbsp;&nbsp;<span>En attente</span>";
            htmlContent += "</div>";
            jQuery_money('#container_action_'+adId+' .ask').hide();
            jQuery_money('#container_action_'+adId+' .waiting').show();
        } else {
        Swal.fire({
            icon: 'error',
            html: result.message,
            timer: 2000,
          });
        }
    });
}

/*
* Ajax to save automatic placement
*/
function saveAutoAd(adId) {
    status = jQuery_money('#data_auto_'+adId).is(':checked');
    tag = jQuery_money('#tag_'+adId).val();
    var data = {
        action: 'update_data_auto',
        _nonce: nonceSettings['update_data_auto'],
        adId: adId,
        status: status,
        tag: tag
    }

    jQuery_money.post(the_ajax_script.ajaxurl, data, function(response) {
        var result = JSON.parse(response.substr(0, response.length-1));
        console.log(result);
        if(result.status){
            Swal.fire({
                icon: 'success',
                html: result.message,
                timer: 2000,
              });
        } else {
            Swal.fire({
                icon: 'error',
                html: result.message,
                timer: 2000,
              });
        }
    });
}

/*
* Function to trigger shortcode help
*/

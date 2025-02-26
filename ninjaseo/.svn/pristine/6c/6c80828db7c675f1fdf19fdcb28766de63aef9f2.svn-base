/**
 * Get response after Analyze button click
 *
 * @param id
 * @param url
 * @param loading
 * @param img
 * @returns {boolean}
 */
function ninjaseo_get_value(id, url, keyword, fromfun, loading, img) {
    var post_id = id;
    jQuery('#id-nf-data-' + id).html(
        '<img src="' + img + '" width="16" height="16" /> '+loading
    );
    setTimeout(()=>{
            var arr_analyze={};
            //url.domain="https://track.ly";
            url = url.replace(/(?:\/+(\?))/, "$1").replace(/\/+$/, "");
            arr_analyze.domain=url;
            arr_analyze.keyword=keyword;
            var z=document.getElementById('ninja_data');
            z.contentWindow.postMessage({'getScore':arr_analyze},'*');
            },1000);
            window.addEventListener("message", (event) => {
            jQuery('#tooltip'+id).css('display','block');
            if (event.data["wpAnalyze"]) {
              var success_messages = event.data.wpAnalyze.success;
              var succss_tot = success_messages.map(response => {return response.message});
              var app_success = "<h4 class='text-success'>Success Messages</h4><br>";
              jQuery.each(succss_tot, function( index, value ) {
                        app_success +='<div class="text-value"><span class="success-color">&#10003;</span><span>'+value+'</span></div>'; 
                    
                });
              var res = event.data.wpAnalyze.success.length +'/'+ event.data.wpAnalyze.all.length;
              if (fromfun == "fromupdate") {
                jQuery("#hide_previews_score"+ id).html('');
                jQuery("#id-nf-data-" + id).html(res);
              }
              else{
                jQuery("#id-nf-data-" + id).html(res);
              }
              
              //failed results 
              var failed_messages = event.data.wpAnalyze.failed;
              var failed_tot = failed_messages.map(response2 => {return response2.message});
              var app_failed = '<h4 class="text-failed">Failed Messages</h4><br>';
              jQuery.each(failed_tot, function( index, value ) {
                        app_failed +='<div class="text-value"><span class="failed-color">&#x2715;</span><span>'+value+'</span></div>';
                });
              jQuery("#tooltiptexts"+id).html(app_success+app_failed);
              id="";
              postData = {
                    post_id: post_id,
                    ninjaseo_values : res,
                    action: 'ninjaseo_save_score'
                };
                jQuery.post(ajaxurl, postData, function (response) {
                setTimeout(function () {
                        if (response == 'updated0') {
                            console.log('inserted');
                        }
                        else
                        {
                            console.log('not inserted');
                        }
                    }, 2000);
                });
            }
        });
        return false;
    }

/**
 * Save Keyword
 *
 * @param id
 * @param url
 * @returns {boolean}
 */
function ninjaseo_save_keyword(id, url) {
    postData = {
        post_id: id,
        keyword: jQuery('#id-nf-keyword').val(),
        action: 'ninjaseo_save_keyword'
    };
    jQuery.post(ajaxurl, postData, function (response) {
        setTimeout(function () {
            //console.log(response);
            if (response == 'updated0') {
                jQuery('#success_message').css('color', 'green');
                jQuery('#success_message').text('updated');
                jQuery('#id-btn-nf-keyword').val('Save keyword');
                jQuery('#success_message').delay(2000).fadeOut();
            }
            else
            {
                jQuery('#success_message').text('not updated');
            }
        }, 2000);
        jQuery('#id-btn-nf-keyword').val('Loading...');
    });
    return false;
}
/** after loading plugin script will run **/
jQuery(document).ready(function ($) {
    setTimeout(function () {
        const container = document.getElementById("screen-meta-links");
        const iframe    = document.createElement("iframe");
        iframe.id       = 'ninja_data';
        iframe.style    = 'display:none';
        iframe.addEventListener("load", function(){
        });
        iframe.src ='https://infinity.500apps.com/index-v0.0.77?env=dev&debug=true#/ninjaseo' ;
        container.append(iframe);
    });   

    var id1= 0;
    jQuery("a").each(function(idx) {
      if (jQuery(this).attr('href') == "admin.php?page=ninjaseo/classes/class.ninjaseoplugin_ninjaseo.php") {
        jQuery("a").each(function(idx2) {
            if (jQuery(this).attr('href') == "admin.php?page=Crawl%20Map") {
            }        
        });
        if(id1 == 1){
                jQuery(this).css("display", "none");
            }
         id1++;
        }
    });
    /** To open other apps popup **/ 
    var id1= 0;
    jQuery("a").each(function(idx) {
      if (jQuery(this).attr('href') == "admin.php?page=Other") {                    
                jQuery(this).addClass('show_popup');
                jQuery(this).attr("href", "#");
                jQuery(this).attr('id', 'show_popup');            
         id1++;
        }
    });
    /** To close other apps popup **/ 
        var modal = document.getElementById("ninjaseoModal");
        var btn = document.getElementById("show_popup");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function() {
          modal.style.display = "block";
        }
        span.onclick = function() {
          modal.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
    /** To encode the content **/ 
        var ninja_data_text = jQuery('#ninjaseo_data').text();
        console.log(ninja_data_text);
        jQuery('#ninjaseo_data').html('');
        var decodedData = window.atob(ninja_data_text); 
        console.log(decodedData);
        jQuery("#ninjaseo_data").append(decodedData);
        jQuery("#ninjaseo_data").attr("style", "display:block");

});

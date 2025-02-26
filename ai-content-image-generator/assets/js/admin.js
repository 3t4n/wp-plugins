    jQuery (document).ready(function(){
        jQuery ( "div.alert-success" ).fadeOut( 5000 );
        jQuery ( "div.alert-error" ).fadeOut( 5000 );

        // Generate Content
        jQuery("#subtitle").click(function(){ 

            getinput = jQuery('#op-input').val();

            if(getinput == "")
            {
                alert("Please Enter Your Title");
                return false;
            }else{
               jQuery(".btn-ring").show();
               jQuery(".btn-process").prop("disabled", true);
               jQuery(".btn-process").val("disabled");
           }

           jQuery.post(
            ajaxurl, 
            {
                'action': 'opaicontent',
                'getinput':   getinput
            }, 
            function(response) { 
                var obj = jQuery.parseJSON( response.body ); 

                if(typeof(obj.error) != "undefined")
                {
                    alert(obj.error.message);
                    jQuery(".btn-ring").hide();
                    jQuery(".btn-process").prop("disabled", false);
                }

                jQuery.each( obj.choices, function( key, value ) {

                    jQuery('#op-response').text(value['text']);
                    jQuery(".btn-ring").hide();
                    jQuery(".btn-process").prop("disabled", false);
                });
            }
            );

       });
        // select all checkbox
        jQuery('.opaigpt_image_select_all').click(function (){
            if(jQuery(this).hasClass('selectall')){
                jQuery(this).removeClass('selectall');
                jQuery(this).html('Select All');
                jQuery('.image-item input[type=checkbox]').prop('checked', false);
            }
            else {
                jQuery(this).addClass('selectall');
                jQuery(this).html('Unselect');
                jQuery('.image-item input[type=checkbox]').prop('checked', true);
            }
        })
        // Generate Image
        jQuery("#imagetitle").click(function(){ 

           imagegetinput = jQuery('#image-input').val();

           if(imagegetinput == "")
           {
            alert("Please Enter Your Title");
            return false;
        }else{
            jQuery(".btn-ring").show();
            jQuery(".btn-process").prop("disabled", true);
            jQuery(".btn-process").val("disabled");
        }

        jQuery.post(
            ajaxurl, 
            {
                'action': 'opimg',
                'imagegetinput': imagegetinput
            }, 
            function(response) {             
                var res = jQuery.parseJSON( response.value.body );

                if(typeof(res.error) != "undefined")
                {
                    alert(res.error.message);
                    jQuery(".btn-ring").hide();
                    jQuery(".btn-process").prop("disabled", false);
                }
                var title = response.title;
                jQuery('#image-response').empty();            
                jQuery.each(res.data, function(idx, img){
                    var html = '<div class="image-item image-item-'+idx+'" data-id="'+idx+'">';
                    html += '<label><input data-id="'+idx+'" class="image-item-select" type="checkbox" name="image_url" value="'+img.url+'"></label>';
                    html += '<input value="'+title+'" class="image-item-alt" type="hidden" name="image_alt">';
                    html += '<input value="'+title+'" class="image-item-title" type="hidden" name="image_title">';
                    html += '<input value="'+title+'" class="image-item-caption" type="hidden" name="image_caption">';
                    html += '<input value="'+title+'" class="image-item-description" type="hidden" name="image_description">';
                    html += '<img src="'+img.url+'">';
                    html += '</div>';
                    jQuery('#image-response').append(html);
                    jQuery(".btn-ring").hide();
                    jQuery(".btn-process").prop("disabled", false);

                    jQuery('.opaigpt_image_select_all').removeClass('selectall');
                    jQuery('.opaigpt_image_select_all').html('Select All');
                    jQuery('.opaigpt_image_select_all').show();

                    jQuery('.image-generator-save').show();

                });
            }
            );
    });
    });
   //copy text
    function opaigptCopyFunc() {
      var opaigptcopyText = document.getElementById("op-response");
      opaigptcopyText.select();
      opaigptcopyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(opaigptcopyText.value);

      var opaigpttooltip       = document.getElementById("opaigptTooltip");
      opaigpttooltip.innerHTML =  "Copied! ✅";
  }
  function opaigptoutFunc() {
      var opaigpttooltip       = document.getElementById("opaigptTooltip");
      opaigpttooltip.innerHTML = "Copy";
  }


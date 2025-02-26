jQuery(document).ready(function() {
        // tab between them
        jQuery('.google_seo_metabox-tabs li a').each(function(i) {
                var thisTab = jQuery(this).parent().attr('class').replace(/active /, '');

                if ( 'active' != jQuery(this).attr('class') )
                        jQuery('div.' + thisTab).hide();

                jQuery('div.' + thisTab).addClass('tab-content');

                jQuery(this).click(function(){
                        // hide all child content
                        jQuery(this).parent().parent().parent().children('div').hide();

                        // remove all active tabs
                        jQuery(this).parent().parent('ul').find('li.active').removeClass('active');

                        // show selected content
                        jQuery(this).parent().parent().parent().find('div.'+thisTab).show();
                        jQuery(this).parent().parent().parent().find('li.'+thisTab).addClass('active');
                });
        });

        jQuery('.heading').hide();
        jQuery('.google_seo_metabox-tabs').show();
// choose_product();
        /******* Added for rating Start *******/
        /********* Added for repeating group directions End *************/
});

function remove_applied_snippets(id)
{
var postId = id;
jQuery.ajax({
url: ajaxurl,
type: 'post',
data: {
	'action': 'gsas_remove_seo_snippets',
	'post_id': postId
        },
success:function (result) {      
        location.reload(); 
},
error: function( result ){
	return false;
}
});
}

function enable_imageset() {
	if(document.getElementById('enable').checked == true){
        var en = 'on';
		document.getElementById('smack-container').style.display='';
	}
	else{
        var en = 'off';
		document.getElementById('smack-container').style.display='none';
	}

    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'gsas_enab',
                    'postdata' : en,
                },
                success:function(data)
                {
                        //alert(data);
            //window.location.reload();
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function author_snippets() {
  
    if(document.getElementById('author').checked == true)
    {
      var auth = 'on';
    }else {
      var auth = 'off';
    }
   
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'gsas_author',
                    'postdata' : auth,
                },
                success:function(data)
                {
                        //alert(data);
            //window.location.reload();
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}


function display_snippets() {
  
    if(document.getElementById('display').checked == true)
    {
      var disp = 'on';
    }else {
      var disp = 'off';
    }
   

    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'gsas_display',
                    'postdata' : disp,
                },
                success:function(data)
                {
                        //alert(data);
            //window.location.reload();
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function date_snippets() {
  
    if(document.getElementById('date').checked == true)
    {
      var dat = 'on';
    }else {
      var dat = 'off';
    }
   
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'gsas_date',
                    'postdata' : dat,
                },
                success:function(data)
                {
                        
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function format_snippets() {
 if(document.getElementById('format').checked == true)
    {
      var formate = 'on';
      alert('If you enabled this the "Snippet will comes based on the post-format",once you disenabled then only you can choose the choice snippet Note:This is only for POSTS ')
    }else {
      var formate = 'off';
    }
   
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'gsas_postfor',
                    'postdata' : formate,
                },
                success:function(data)
                {
                      
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });



} 
function auto(id) {  
     if(id != 'product') { 
      document.getElementById('showdanger').style.display = '';
      document.getElementById('showdanger').innerHTML = '<p style = "color:red;font-size:20px;margin-left:100px;" > This feature is only available for product post type </p>';
      jQuery("#showdanger").fadeOut(10000); 
          } 
  }  
 
function post_format(id) 
    {
      document.getElementById('showdanger').style.display = '';
      document.getElementById('showdanger').innerHTML = '<p style = "color:red;font-size:20px;margin-left:100px;" > This feature is not available in this version</p>';
      jQuery("#showdanger").fadeOut(10000); 
       
     }

function sendemail2smackers() {
    var message_content = document.getElementById('message').value;
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var nonceKey = document.getElementById('gsas_nonce_field').value;
    var postdata = new Array();
    postdata ={'fname':firstname,'lname':lastname,'msg':message_content,'gsas_nonce_field':nonceKey,}
    if(message_content != '' && firstname != '' && lastname != '') {

        jQuery.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action'   : 'gsas_send2smackers',
                'postdata' : postdata,
            },
            success:function(data) {
                console.log(data);
                if(data == 'true') {  document.getElementById('warn').style.display = '';
                    document.getElementById('warn').innerHTML = '<p style = "color:green" >Your Mail Has Been Sent Successfully</p>';
                    jQuery("#warn").fadeOut(10000);
                }
                else {
                    document.getElementById('warn').style.display = '';
                    document.getElementById('warn').innerHTML = '<p style = "color:red" >Your Mail has been Failed to sent</p>';
                    jQuery("#warn").fadeOut(10000);
                }
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });
        return true;
    }
    else {
        document.getElementById('showMsg').style.display = '';
        document.getElementById('showMsg').innerHTML = '<p id="warning-msg" class="alert alert-warning">Fill all mandatory fields.</p>';
        jQuery("#showMsg").fadeOut(10000);
        return false;
    }
}

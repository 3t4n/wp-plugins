jQuery(document).ready(function() {
    // front form
    jQuery("#AddAlidaniContactFrm").validate({
          submitHandler:function(){
         
             var postdata = "action=alidanicontactlibrary&param=save_contact_form&"+jQuery("#AddAlidaniContactFrm").serialize();
            
            jQuery.post(alidaniformajaxurl,postdata,function(response){
                var data = JSON.parse(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message

                    });
                    setTimeout(function(){
                        location.reload();
                    },1300)
                   
                }else{
    
                }

            });
    
        }
    });
    jQuery("#EditSAlidaniContactFrm").validate({
        // to handle the validate errors
        submitHandler:function(){
            var postdata = "action=alidanicontactlibrary&param=edit_contact_form&"+jQuery("#EditSAlidaniContactFrm").serialize();
            jQuery.post(alidaniformajaxurl,postdata,function(response){
                var data = JSON.parse(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    });
                     setTimeout(function(){
                        location.reload();
                    },1300)
                }else{
    
                }

            });
    
        }
    });

    //delete the form
    jQuery(document).on("click",".btnalidanirecievedelete",function(){
        var conf = confirm("Do you want to delete this form?");
        if(conf){
            var del_id = jQuery(this).attr("data-id");
            var postdata = "action=alidanicontactlibrary&param=delete_contact_form&id="+del_id;
            jQuery.post(alidaniformajaxurl,postdata,function(response){
                var data = JSON.parse(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    });
                     setTimeout(function(){
                        location.reload();
                    },1300)
                }else{
    
                }

            });
        }
    });



 

    // admin info 
    jQuery("#AdminInfoAlidaniContactFrm").validate({
        // to handle the validate errors
        submitHandler:function(){
            var postdata = "action=alidaniadmincontactlibrary&param=save_admin_contact_form&"+jQuery("#AdminInfoAlidaniContactFrm").serialize();
            jQuery.post(alidaniformajaxurl,postdata,function(response){
                var data = JSON.parse(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message

                    });
                    setTimeout(function(){
                        location.reload();
                    },1300)
                   
                }else{
    
                }

            });
    
        }
    });
  

    // edit admin
    jQuery("#EditSAdminAlidaniContactFrm").validate({
        // to handle the validate errors
        submitHandler:function(){
            var postdata = "action=alidaniadmincontactlibrary&param=edit_admin_contact_form&"+jQuery("#EditSAdminAlidaniContactFrm").serialize();
            jQuery.post(alidaniformajaxurl,postdata,function(response){
                var data = JSON.parse(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    });
                     setTimeout(function(){
                        location.reload();
                    },1300)
                }else{
    
                }

            });
    
        }
    });
    // delete admin form
    jQuery(document).on("click",".btnalidaniadmindelete",function(){
        var conf = confirm("Do you want to delete this form?");
        if(conf){
            var del_admin_id = jQuery(this).attr("data-admin-id");
            var postdata = "action=alidaniadmincontactlibrary&param=delete_admin_contact_form&adminid="+del_admin_id;
            jQuery.post(alidaniformajaxurl,postdata,function(response){
                var data = JSON.parse(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    });
                     setTimeout(function(){
                        location.reload();
                    },1300)
                 }
                else{
    
                }

            });
        }
    });

    // send form
    jQuery("#SendSAlidaniContactFrm").validate({
        submitHandler:function(){
            var senddata = "action=alidanisendcontactlibrary&param=send_contact_form&"+jQuery("#SendSAlidaniContactFrm").serialize();
            jQuery.post(alidaniformajaxurl,senddata,function(response){
                var data = JSON.parse(response);
                if(data.status==1){
                    jQuery.notifyBar({
                        cssClass:"success",
                        html:data.message
                    });
                     setTimeout(function(){
                        location.reload();
                    },1300)
                }else{
                 }
            });
        }
    });
});





    function changeColor(){
    let color = document.getElementById('colorInputColor').value;
   
    document.getElementById('interform-style').style.color = color;
    document.getElementById('formstyle-form').style.color = color;
    interform-style
    }
    function backColor(){
        let backcolor = document.getElementById('backcolorInputColor').value;
           document.getElementById('backcolorInputColor').value = backcolor;
       
        document.getElementById('interform-style').style.backgroundColor = backcolor;
        }
        function interbackColor(){
            let interdatabackcolor = document.getElementById('interbackcolorInputColor').value;
            document.getElementById('interbackcolorInputColor').value = interdatabackcolor;
            document.getElementById('interbackcolor-form').style.backgroundColor = interdatabackcolor;
            
            }
        function inputbackColor(){
            let inputdatabackcolor = document.getElementById('inputbackcolorInputColor').value;
                   document.getElementById('inputbackcolorInputColor').value = inputdatabackcolor;
            document.getElementById('first-name').style.backgroundColor = inputdatabackcolor;
            document.getElementById('last-name').style.backgroundColor = inputdatabackcolor;
            document.getElementById('email').style.backgroundColor = inputdatabackcolor;
            document.getElementById('number').style.backgroundColor = inputdatabackcolor;
            document.getElementById('enquiry').style.backgroundColor = inputdatabackcolor;
            
            }
        function submitbackColor(){
            let submitdatabackcolor = document.getElementById('submitcolorInputColor').value;
                   document.getElementById('submitcolorInputColor').value=submitdatabackcolor;
            document.getElementById('submitidColor').style.backgroundColor = submitdatabackcolor;
            
            }
        function submitFontColor(){
            let submitfontbackcolor = document.getElementById('submitcolorfontColor').value;
                   document.getElementById('submitcolorfontColor').value = submitfontbackcolor;
            document.getElementById('submitidColor').style.color = submitfontbackcolor;
            
            }
        function firstFieldText(){
            let firstdatafieldtext = document.getElementById('firstfieldText').value;
            
                   document.getElementById('firstlebeltext').innerHTML = firstdatafieldtext;
            document.getElementById('first-name').placeholder = "Enter your "+ firstdatafieldtext;
            
            }
        function secondFieldText(){
            let seconddatafieldtext = document.getElementById('secondfieldText').value;
            
                   document.getElementById('secondlebalText').innerHTML = seconddatafieldtext;
            document.getElementById('last-name').placeholder = "Enter your "+ seconddatafieldtext;
            
            }
        function thirdFieldText(){
            let thirddatafieldtext = document.getElementById('thirdfieldText').value;
            
                   document.getElementById('thirdlebalText').innerHTML = thirddatafieldtext;
            document.getElementById('email').placeholder = "Enter your "+ thirddatafieldtext;
            
            }
        function forthFieldText(){
            let forthdatafieldtext = document.getElementById('forthfieldText').value;
            
                   document.getElementById('forthlebalText').innerHTML = forthdatafieldtext;
            document.getElementById('number').placeholder = "Enter your "+ forthdatafieldtext;
            
            } 
            function fifthFieldText(){
                let fifthdatafieldtext = document.getElementById('fifthfieldText').value;
                
                           document.getElementById('fifthlebalText').innerHTML = fifthdatafieldtext;
                document.getElementById('enquiry').placeholder = "Enter your "+ fifthdatafieldtext;
                
                }  
            function sixthFieldText(){
                let sixthdatafieldtext = document.getElementById('sixthfieldText').value;
                
                           document.getElementById('submitidColor').innerHTML = sixthdatafieldtext;
              
                
                }    
            function seventhFieldText(){
                let seventhdatafieldtext = document.getElementById('seventhfieldText').value;
                
                           document.getElementById('seventhlebalText').innerHTML = seventhdatafieldtext;
                
                
                }  
    jQuery("#saveColorButton").click(function(){
        let colordataentry = document.getElementById('colorInputColor').value;
        var senddata = "action=alidanicolorandfontlibrary&param=save_color_font_form&"+jQuery('#colorInputColor,#backcolorInputColor,#interbackcolorInputColor,#inputbackcolorInputColor,#submitcolorInputColor,#submitcolorfontColor,#firstfieldText,#secondfieldText,#thirdfieldText,#forthfieldText,#fifthfieldText,#sixthfieldText,#seventhfieldText').serialize();
        
        jQuery.post(alidaniformajaxurl,senddata,function(response){
            
            var data = JSON.parse(response);
            console.log(senddata);
            if(data.status==1){
                jQuery.notifyBar({
                    cssClass:"success",
                    html:data.message
                });
                 setTimeout(function(){
                    location.reload();
                },1300)
            }else{
            }
       });
   }
);
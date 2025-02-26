<script type="text/javascript"> 
function fbac_reveal_reveal(){
var radioDivLike = document.getElementById('fbac_like_reveal');
var radioDivCustom = document.getElementById('fbac_custom_home');
var radioDivBlog = document.getElementById('fbac_blog_style');
var checkCustomMenu = document.getElementById('fbac_use_custom_menu');
var checkCustomHeader = document.getElementById ('fbac_use_custom_header');
    var menuDivLinks = document.getElementById ('fbac-custom-menu-links-input');
    var customHeaderURL = document.getElementById ('fbac_custom_header_image_url');
    var areaTextLike = document.getElementById('fbac_reveal_input');
    var areaTextCustom = document.getElementById('fbac_home_custom_html');
    var areaRadioBlogs = document.getElementById('fbac_color_settings');
            var custom_ex = document.getElementById('custom_ex');
            var blog_ex = document.getElementById('blog_ex');
            var fan_ex = document.getElementById('fan_ex');
    if (checkCustomMenu.checked){
             menuDivLinks.style.display = 'inline';
         }else{       
 
             menuDivLinks.style.display = 'none';
            }
    if (checkCustomHeader.checked){
	    customHeaderURL.disabled = false;
            }else{
            customHeaderURL.disabled = true;
            }
            
     if (radioDivLike.checked){
             areaTextLike.style.display = 'inline';
             fan_ex.style.display ='none';
         }else{       
 
             areaTextLike.style.display = 'none';
             fan_ex.style.display ='inline';
            }
     
    
    if (radioDivCustom.checked){
             areaTextCustom.style.display = 'inline';
             custom_ex.style.display ='none';
         }else{       
 
             areaTextCustom.style.display = 'none';
             custom_ex.style.display ='inline';
            }
   
   if (radioDivBlog.checked){
             areaRadioBlogs.style.display = 'inline';
             blog_ex.style.display ='none';
         }else{       
 
             areaRadioBlogs.style.display = 'none';
             blog_ex.style.display ='inline';
            }
    }
 
 
function newFBACLink(num){
	if(document.getElementById('custom-link-text-' + num).value != '' && document.getElementById('custom-link-url-' + num).value != ''){
	newAct = document.createElement("div");
	newAct.innerHTML ="<p id=\"custom-linkset-"+(num+1)+"\" style=\"color: #036;font-weight:bold;\">  <label> Link text: <input type=\"text\" id=\"custom-link-text-"+(num+1)+"\" name=\"fbac_menu_link_text[]\"/></label><label>Link URL: <input type=\"text\" id=\"custom-link-url-"+(num+1)+"\" name=\"fbac_menu_link_url[]\" /><a href=\"javascript: void(0);\" onclick=\"newFBACLink("+(num+1)+")\" id=\"fbac-link-"+(num+1)+"\" class=\"small-text link \">(Add another)</a> <a style=\"display:none\" href=\"javascript: void(0);\" onclick=\"_fbac_remove_Link("+(num+1)+")\" id=\"fbac-rmv-link-"+(num+1)+"\" class=\"small-text link\">(Remove)</a></label></p>";
 
 
fbac_show_link_class = "fbac-rmv-link-" + (num);
//alert(fbac_show_link_class);
document.getElementById(fbac_show_link_class).style.display = 'inline';
        fbac_hide_link_class = "fbac-link-" + num;
///alert( fbac_hide_link_class);
        document.getElementById(fbac_hide_link_class).style.display = 'none';
	document.getElementById("fbac-custom-menu-links-input").appendChild(newAct);
	 }else {alert ('Please fill in the link details, before adding another!');}
}
 
function _fbac_remove_Link(num){
document.getElementById('custom-link-text-' + num).value = '' ;
document.getElementById('custom-link-url-' + num).value = '' ;
document.getElementById('custom-linkset-' + num).style.display = 'none';
}
 
function fbac_reset_confirm(){
 
 
 
 
 
}
</script> 
<style> 
    .fbac_back_border {
margin: 10px 0;
padding: 10px;
border: 1px #036 solid;
background-color: #f5f5f5;


}
    #fbac_color_settings {
        
        margin: 15px 0;
        }
    
 #fbac_color_settings li {
    display: inline;
    margin-bottom: 10px;
    }
    
.fbac_separator {
     
    height:10px;
     margin:10px 50px;
    }
    
.fbac_color_block{
   margin-right: 30px;
    padding-right: 5px;
    height:5px;
    width:10px;
    }
.fbac_orange {
        background-color: orange;
 
    }
 
.fbac_green {
        background-color: green;
 
    }
    
.fbac_blue{
    	background-color: #1D4088;
 
    }
.fbac_brown {
    	background-color: brown;
 
    }
    
.fbac_pink {
    	background-color: pink;
 
    }
 
.fbac_violet{
    	background-color: #b56363;
 
    
    }
    
.fbac_default_class{
    font-style: italic;
    color:#111;
    }
    
#fbac_homepage_settings label{
    display: block;
    margin-bottom: 10px;
    
    }
</style> 
<div class="wrap"> 
<div class="wrap"><div style="background-image: url(<?php echo plugins_url('awfc_logo_sm.png', __FILE__); ?>); background-repeat: no-repeat; float:right; height: 100px; width: 100px; margin:15px 50px;"></div>
<h2>Automatic Facebook Converter Premium (<a href="http://www.promarketingstrategy.net/wordpress-facebook-plugin/" target="_blank">Upgrade</a>)</h2> 
<p>
 <h3>Below are the <a href="http://www.promarketingstrategy.net/wordpress-facebook-plugin/" target="_blank">premium features</a>:</h3>
</p>
 <p>&nbsp;</p>
<form method="post"  > 
<h3>Home Page Settings</h3> 
<div class="fbac_back_border">
<label> 
<input type="radio" name="fbac_home_style" id="fbac_blog_style"value="fbac_blog_style" onchange="fbac_reveal_reveal()" checked="checked"><strong>Blog-style Layout</strong> <span id="blog_ex" style="color: #333; font-size: 10px; font-style: italic;">(Click to expand)</span>
</label><p> 
<div id="fbac_color_settings"> 
 Choose your color settings: </p> 
 <ul> 
<li> 
<label> 
<input type="radio" value="blue" name="fbac_color_scheme"      checked="checked"> FB Standard <span class="fbac_color_block fbac_blue" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
</label> 
</li><li> 
<label> 
<input type="radio" value="orange" name="fbac_color_scheme" > Tropicana <span class="fbac_color_block fbac_orange" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
</label> 
</li><li> 
<label> 
<input type="radio" value="brown" name="fbac_color_scheme" > Chocolate Rain <span class="fbac_color_block fbac_brown" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> 
</label> 
</li><li> 
<label> 
<input type="radio" value="pink" name="fbac_color_scheme"    > Giggle <span class="fbac_color_block fbac_pink" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
</label> 
</li><li> 
<label> 
<input type="radio" value="violet" name="fbac_color_scheme" > You Darling! <span class="fbac_color_block fbac_violet" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
</label> 
<label> 
<input type="radio" value="green" name="fbac_color_scheme" > Earth Smiling <span class="fbac_color_block fbac_green" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
</label> 
</li></ul> 
<div class="fbac_separator"></div><div id="fbac-custom-menu-links"> 
<label><input type="checkbox" id="fbac_use_custom_menu" name="fbac_use_custom_menu" value="true" onchange="fbac_reveal_reveal()"/><strong>Use custom menu</strong> <span class="description">Show only the links you want, in your Facebook fan page menu</span></label> 
<div id="fbac-custom-menu-links-input"> 
<p class="description"><strong>PLEASE NOTE: </strong>Your URLs must have a 'http://' or 'https://' prefix. E.g. http://www.yourdomain.com/contact
 
 
<p id="custom-linkset-1" style="color: #036;font-weight:bold;"><label>   
Link text: <input type="text" id="custom-link-text-1" name="fbac_menu_link_text[]" /> 
</label> 
<label> 
Link URL: <input type="text" id="custom-link-url-1" name="fbac_menu_link_url[]" /> 
 
</label> 
<a href="javascript: void(0);" onclick="newFBACLink(1)" id="fbac-link-1" class="small-text link ">(Add another)</a> 
<a style="display:none" href="javascript: void(0);" onclick="_fbac_remove_Link(1)" id="fbac-rmv-link-1" class="small-text link ">(Remove)</a> 
 
 
</p> 
</div><!-- #fbac-custom-menu-links-input --> 
</div> 
 
<div class="fbac_separator"></div><p><strong>Branding</strong></p> 
 
<label> <strong>Logo</strong><span class="description" > You can type in the URL of your logo, if you want to display it. </span><p> 
Your image URL <input type="text" name="fbac_branding_image_url"  value=""  size="32"/> <span class="description" ><strong>NOTE:</strong> Your image size must be 200px x 56px.</span></p> 
</label> 
 
<div id="fbac_custom_header"> 
<label><input type="checkbox" id="fbac_use_custom_header" name="fbac_use_custom_header" value="true" onchange="fbac_reveal_reveal()" /><strong>Use custom header</strong> </label> 
<label>  <p> 
Your custom header URL <input type="text" id="fbac_custom_header_image_url" name="fbac_custom_header_image_url"  value=""  size="32"/> <span class="description" > Recommended header size; width:512px, min-height:77px;</span></p> 
</label> 
</div> 
 
 
 </div>
</div><!-- #fbac-color-settings --> 
 
<div class="fbac_separator"></div> 
<div id="fbac_homepage_settings"> 
<div class="fbac_back_border">
<label> 
<input type="radio" id="fbac_custom_home" name="fbac_home_style"  value="fbac_custom_home" onchange="fbac_reveal_reveal()"  class="fbac_spaceout" ><strong>Custom HTML</strong> <span id="custom_ex" style="color: #333; font-size: 10px; font-style: italic;">(Click to expand)</span>
</label> 
<label id="fbac_home_custom_html">Paste your HTML below:<br/> 
<textarea  name="fbac_home_custom_html" cols="55" rows="7"><h1>This is custom HTML.</h1>
<p>Make money, money...;)</p></textarea> 
 
</label> 
</div>
<div class="fbac_separator"></div> 
 <div class="fbac_back_border">
<label> 
<input type="radio" name="fbac_home_style" id="fbac_like_reveal" value="fbac_reveal_code" onchange="fbac_reveal_reveal()" class="fbac_spaceout" ><strong>Use "Like-Reveal" - Fan Gate</strong> <span id="fan_ex" style="color: #333; font-size: 10px; font-style: italic;">(Click to expand)</span>
<br/><div id="fbac_reveal_input"><p> 
<strong>PLEASE NOTE:</strong> You need to create a Facebook App in order to use the "Like/Reveal" feature.</label> 
</p><label> 
Show this before the user "Likes" the page:<br/> 
<textarea id="fbac_before_reveal" name="fbac_before_reveal" cols="55" rows="7"><img src="http://localhost/wordpress/wp-content/plugins/fbac_converter/fb_theme/fbac_d_img.jpg" /></textarea> 
 
</label> 
<p> 
After the user "Likes" the page:<br/> 
<label> 
<input type="radio" name="fbac_what_after_reveal" value="show_blog_after_reveal" checked="checked"  /> Show the blog
</label> 
</p>
<label> 
<input type="radio" name="fbac_what_after_reveal" value="custom_reveal"   />Show this HTML:<br/> 
</label> 
<label><textarea id="fbac_after_reveal" name="fbac_after_reveal" cols="55" rows="7"><p>Show this after your visitor likes the page</p></textarea> 
</label> </div>
 
</div><!-- #fbac_reveal_input --> 
 
</div> 
 
<script type="text/javascript"> 
fbac_reveal_reveal(); //This reveals or hides home page style options according to whether or not they are the current setting
</script> 
</div> 

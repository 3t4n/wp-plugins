<?php
//FIRST CHECK - POPUP TYPE
if($myoption == 'popup'){ ?>
<!--<p style="color:#111;">PopUp</p>-->


<?php if($miadate): ?>

	<?php
    //CHECK DATE RAGE->IF expiryD
    $paymentDate = date('Y-m-d');
    $paymentDate=date('Y-m-d', strtotime($paymentDate));
    
    $contractDateEnd = date('Y-m-d', strtotime($miadate));
    
    if (($paymentDate < $contractDateEnd)){
    ?>
    
    	<!--IF DATE expiry IS SET-->
        <div id="boxes_auto_popup_expiry" class="<?php echo $miadate; ?>">
          <div id="dialog_auto_popup_expiry" class="window">
            <?php if($popup_window_link){ ?><a href="<?php echo $popup_window_link; ?>" <?php if( $popup_window_target['popup_window_target'] == '1' ) {  ?>target="_blank"<?php }; ?>><?php }; ?>
            <img src="<?php echo $popup_window_image; ?>" alt="" />
            <?php if($popup_window_link){ ?></a><?php }; ?>
            <div id="popupfoot_auto_popup_expiry" class="close agree">&nbsp;</div>
          </div>
          <div id="mask_auto_popup_expiry"></div>
        </div>
    
    <?php  
    }else{
    ?> 
       
    <?php    
    }
    ?>

<?php else: ?>

    <!--IF DATE expiry IS NOT SET-->
    <div id="boxes_auto_popup_expiry" class="<?php echo $miadate; ?>">
      <div id="dialog_auto_popup_expiry" class="window">
            <?php if($popup_window_link){ ?><a href="<?php echo $popup_window_link; ?>" <?php if( $popup_window_target['popup_window_target'] == '1' ) {  ?>target="_blank"<?php }; ?>><?php }; ?>
            <img src="<?php echo $popup_window_image; ?>" alt="" />
            <?php if($popup_window_link){ ?></a><?php }; ?>
        <div id="popupfoot_auto_popup_expiry" class="close agree">&nbsp;</div>
      </div>
      <div id="mask_auto_popup_expiry"></div>
    </div>

<?php endif; ?>






<style>
/*START-STYLE APE - AUTO POPUP EXPIRY*/
#mask_auto_popup_expiry {
  position: fixed !important;
  left: 0;
  top: 0;
  z-index: 9000;
  background-color: #000;
  display: none;
}


#boxes_auto_popup_expiry{ position:fixed; top:0px; left:0px; width:100%; height:800px; z-index:9999999; display:flex; align-items: center; justify-content: center;}


#boxes_auto_popup_expiry .window {
  position: relative;
  width:auto;
  height:auto;
  display: none;
  z-index: 9999 !important;
  <?php if($popup_window_radius){?> border-radius: <?php echo $popup_window_radius; ?>;<?php }; ?>
  text-align: center;
  max-width:90%;
}

#boxes_auto_popup_expiry #dialog_auto_popup_expiry {
  width:auto;
  height:auto;
  <?php if($popup_window_border_w){?>padding: <?php echo $popup_window_border_w; ?>;<?php }; ?>
  <?php if($popup_window_color){?>background-color: <?php echo $popup_window_color; ?>;<?php }; ?>
  line-height:0px;
  max-width:90%;
}

#boxes_auto_popup_expiry img{ width: <?php echo $width; ?>; max-width:100%; height:auto; <?php if($popup_window_radius){?> border-radius: <?php echo $popup_window_radius; ?>;<?php }; ?>}

#popupfoot_auto_popup_expiry {
width:40px !important;
height:40px !important;
position: absolute !important;
right: -40px !important;
top: -40px !important;
background-image:url(<?php echo plugin_dir_url( __FILE__ ) . 'images/close-icon.svg'; ?>);
background-repeat:no-repeat;
background-position:center;
background-size:contain;
}
#popupfoot_auto_popup_expiry:hover{ cursor:pointer; opacity:0.8;}

@media (max-width: 767px) {
#boxes_auto_popup_expiry #dialog_auto_popup_expiry{
max-width: 70%;
}

#popupfoot_auto_popup_expiry {
width: 25px !important;
height: 25px !important;
right: -30px !important;
top: -30px !important;
}
}
/*END-STYLE APE - AUTO POPUP EXPIRY*/
</style>



<script>
jQuery( window ).load(function() {

/*START-SCRIPT APE - AUTO POPUP EXPIRY*/
var id = '#dialog_auto_popup_expiry';
	
function resize_altezza(){
	var mask_auto_popup_expiryHeight = jQuery(window).height();
	var mask_auto_popup_expiryWidth = jQuery(window).width();
	jQuery('#boxes_auto_popup_expiry').css({'height':mask_auto_popup_expiryHeight});
	
	
	jQuery('#mask_auto_popup_expiry').css({'width':mask_auto_popup_expiryWidth,'height':mask_auto_popup_expiryHeight});
}

resize_altezza();

jQuery(window).resize(function(){    
	resize_altezza();
});



jQuery('#mask_auto_popup_expiry').fadeIn(500);	
jQuery('#mask_auto_popup_expiry').fadeTo("slow",0.9);	
	
	
/*var winH = jQuery(window).height();
var winW = jQuery(window).width();
       
	   
       
setTimeout(function(){
	jQuery(id).css('top',  winH/2-jQuery(id).height()/2);
	jQuery(id).css('left', winW/2-jQuery(id).width()/2);
}, 800);*/
	
jQuery(id).fadeIn(2000); 	
	
/*jQuery('.window .close').click(function (e) {
e.preventDefault();

jQuery('#mask_auto_popup_expiry').hide();
jQuery('.window').hide();

});*/



jQuery('#popupfoot_auto_popup_expiry').click(function () {
jQuery(this).hide();
jQuery('.window').hide();
jQuery('#boxes_auto_popup_expiry').hide();
});




jQuery('#mask_auto_popup_expiry').click(function () {
jQuery(this).hide();
jQuery('.window').hide();
jQuery('#boxes_auto_popup_expiry').hide();
});
	 
<?php if ($popup_window_fadeout){ ?>
	setTimeout(function(){
		jQuery('#mask_auto_popup_expiry').hide();
		jQuery('.window').hide();
		jQuery('#boxes_auto_popup_expiry').hide();
		
	}, <?php echo $popup_window_fadeout; ?>);
<?php } ?>

/*END-SCRIPT APE - AUTO POPUP EXPIRY*/

});
</script>


<?php }; ?>


<?php
//SECOND CHECK - NOTIFICATION TYPE
if($myoption == 'notification'){ ?>
<!--<p style="color:#111;">Notification Alert</p>-->

<link rel="stylesheet" type="text/css" href="<?php echo plugin_dir_url( __FILE__ ) . 'css/animate.css'; ?>">

<!--NOTIFICATION PLUGIN-->
<style>
#notification{ width:<?php echo $notification_width; ?>; height:<?php echo $notification_height; ?>; position:fixed;
<?php if($notification_position_top){?>top:<?php echo $notification_position_top; ?>;<?php }; ?>
<?php if($notification_position_right){?>right:<?php echo $notification_position_right; ?>;<?php }; ?>
<?php if($notification_position_left){?>left:<?php echo $notification_position_left; ?>;<?php }; ?>
<?php if($notification_position_bottom){?>bottom:<?php echo $notification_position_bottom; ?>;<?php }; ?>
background-color:<?php echo $notification_bkg_color; ?>; z-index:6; border-radius:<?php echo $notification_radius; ?>; box-shadow:0px 0px 10px rgba(0,0,0,0.3);}
#notification_i{ padding:<?php echo $notification_margin; ?>;}
#notification p{ color:<?php echo $notification_font_color; ?>;}

#close_notification{ width:25px; height:25px; background-color:<?php echo $notification_close_color; ?>; border-radius:50px; position:absolute; top:-10px; right:-10px; line-height: 25px; text-align:center;}
#close_notification span{ color:#fff;}
#close_notification:hover{ cursor:pointer; opacity:0.9;}
</style>




<?php if($notification_date): ?>

	<?php
    //CHECK DATE RAGE->IF expiryD
    $paymentDate = date('Y-m-d');
    $paymentDate=date('Y-m-d', strtotime($paymentDate));
    
    $contractDateEnd = date('Y-m-d', strtotime($notification_date));
    
    if (($paymentDate < $contractDateEnd)){
    ?>
    
    	<!--IF DATE expiry IS SET-->
<div id="notification" class="animated <?php echo $myselect; ?>">
<div id="close_notification"><span>&#10005;</span></div>
    <div id="notification_i">
        <p><?php echo $notification_text; ?></p>
    </div>
</div>
    
    <?php  
    }else{
    ?> 
       
    <?php    
    }
    ?>

<?php else: ?>

    <!--IF DATE expiry IS NOT SET-->

<div id="notification" class="animated <?php echo $myselect; ?>">
<div id="close_notification"><span>&#10005;</span></div>
    <div id="notification_i">
        <p><?php echo $notification_text; ?></p>
    </div>
</div>

<?php endif; ?>


<script type="text/javascript">
jQuery( "#notification" ).click(function() {
	jQuery( this ).removeClass( "<?php echo $myselect; ?>" );
	jQuery( this ).addClass( "<?php echo $myselectout; ?>" );
});


<?php if ($notification_fadeout){ ?>
	setTimeout(function(){
	jQuery( "#notification" ).removeClass( "<?php echo $myselect; ?>" );
	jQuery( "#notification" ).addClass( "<?php echo $myselectout; ?>" );
		
	}, <?php echo $notification_fadeout; ?>);
<?php } ?>

</script>





<?php }; ?>

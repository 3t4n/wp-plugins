<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       mhstudio.org
 * @since      1.0.0
 *
 * @package    MHS_Hubspotform
 * @subpackage MHS_Hubspotform/public/partials
 */
?>
<style type="text/css">
		.preview-popup-link{
		    padding: 20px;
		    border: 1px solid orange;
		    background: orange;
		    border-radius: 24px;
		    position: absolute;
		    top: 40%;
		    left: 40%;
		  }
		  .hbspt-form .hs_submit .actions .hs-button:active{	
              border: none;
              background-image: none;
        }
		.white-popup {
		  position: relative;
		  background: #ffffff;
		  margin: 20px auto;
		  box-shadow: 0 0 60px 0 rgba(0,0,0,.16);
		}
		.mfp-container .white-popup{
		    width: 60%;
    		padding: 62px;
    	}
		
		.mfp-close:hover{
			background: none;
		}
		.mfp-bg{
			background: rgb(255, 255, 255) none repeat scroll 0% 0%;
			opacity: 1;
		}
		
</style>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php $trigger_id=$options["text_string"]; 
 $phone_no=$options["text_oc"] ?: '';
 $facebook=$options["text_facebook"] ?: '';
 $twitter=$options["text_twitter"] ?: '';
 $linkedin=$options["text_linkedin"] ?: '';
 $instagram=$options["text_instagram"] ?: '';
 ?>
<script type="text/javascript">
	(function($){

	jQuery(document).on('click touchstart', '<?php echo $trigger_id; ?>', function(){     
		$('.form-title').css('display','block');

	});

		$(function(){
			$('<?php echo $trigger_id; ?>').magnificPopup({
			  	 items: {
				      src: '#preview-nf-popup',
				      midClick: true,
				      type: 'inline'
				  },
				  callbacks:{
				  	close: function(){
				  		 $('.preview-cpopup-link').hide();
				  		 if ( $( ".submitted-message" ).length ) {
				  		  window.location.reload();	 
				  		}
				  	},
				  	open: function() {
				  		$('.preview-cpopup-link').show();
				  	}
				  }
			});
			//$('.preview-cpopup-link').trigger('click');
	});
		})(jQuery);
		
</script>
<?php
if(isset($options['checkbox_string'])){
$sidebar_html='<div class="hform-sidebar">	 <div class="side-bar-area">
		
		<div class="textwidget">
 			<ul class="sociallinks">';
				if($instagram!=''){
					$sidebar_html.='<li><a target="_blank" href="'.$instagram.'"><span><i class="fa fa-instagram"></i></span></a></li>';
				}
				if($twitter!=''){
					$sidebar_html.='<li><a target="_blank" href="'.$twitter.'"><span><i class="fa fa-twitter"></i></span></a></li>';
				}
				if($facebook!=''){
					$sidebar_html.='<li><a target="_blank" href="'.$facebook.'"><span><i class="fa fa-facebook"></i></span></a></li>';
				}
				if($linkedin!=''){
					$sidebar_html.='<li><a target="_blank" href="'.$linkedin.'"><span><i class="fa fa-linkedin"></i></span></a></li>';
				}
				if($phone_no!==''){
					$sidebar_html.=	'<li><a href="tel:'.$phone_no.'">'.$phone_no.'</a></li>';
				}
 			$sidebar_html.='</ul>
 		</div>
	</div>

</div>';
}else{
$sidebar_html='';	
}
?>
<!--<a style="display:block" href="javscript:void(0)" class="classname" id="<?php //echo str_replace("#","", $trigger_id); ?>">Click</a> -->
<div class="white-popup mfp-hide preview-cpopup-link" id="preview-nf-popup">
	 <?php echo do_shortcode( '[mhs_hubspot_shortcode]' ); ?>
	 <?php echo $sidebar_html; ?>
</div>
	
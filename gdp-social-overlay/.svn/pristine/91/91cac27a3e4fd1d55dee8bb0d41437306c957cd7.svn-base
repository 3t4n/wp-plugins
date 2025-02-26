<?php

/** Css and Js include**/
function so_include () {
		wp_enqueue_script( 'gdp-overlay-js', plugin_dir_url( __FILE__ )  . 'assets/js/js-socialoverlay.js', array(), '0.0.1', true );
		wp_enqueue_style( 'gdp-overlay-css', plugin_dir_url( __FILE__ )  . 'assets/css/css-socialoverlay.css', array(), '0.0.1','all' );
}
add_action( 'wp_enqueue_scripts', 'so_include',10 );


/** Output information **/
function so_output (){

        $opt = get_option('gdpSocialOverlay',true);
	$totS = (int) $opt['seconds'] * 1000;
	
	if((is_home() && $opt['home']) || (is_page() && $opt['pagina']=='1') || (is_single() && $opt['articolo'])){
	
	$social = $opt['whatSocial'];
	$firstline= $opt['firstline'];
	$promoline= $opt['promoline'];
	$nomoreline= $opt['nomoreline'];
?>
	<div class="gdp-overlay" id="gdp-overlayBox"></div>                      
	<div class="gdp-modal" id="gdp-modalBox">
	<img width="32" class="gdp-close" src="/wp-content/plugins/gdp-social-overlay/assets/image/close.png"/>
	<?php
	if($social == 'facebook'){
	?>
	<p class="gdp-promotit"><?=$firstline?></p> 
	<div class="fb-page" data-href="<?=$opt['facebook']?>" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"></div>
	<div class="gdp-arrow"></div>
	<div class="gdp-promotit"><?=$promoline?></div>
<div style="clear:both"></div>
        <small id="dontShowMeAgain"><?=$nomoreline?></small>
	<?php
	}
	if($social == 'facebookFollow'){
	?>
        <p class="gdp-promotit"><?=$firstline?></p>
        <div class="fb-follow" data-href="<?=$opt['facebookFollow']?>" data-layout="box_count" data-show-faces="false"></div>
	<br />
	<div style="clear:both"></div>
        <small id="dontShowMeAgain" style="margin-top:10px;"><?=$nomoreline?></small>
	<?php
	}
	if($social == 'twitter'){
	?>
	<p class="gdp-promotit"><?=$firstline?></p>
	<div class="twitterBox">
	<a href="https://twitter.com/<?=$opt['twitter']?>" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Follow @<?=$opt['twitter']?></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
	<div style="clear:both"></div>
	<small id="dontShowMeAgain"><?=$nomoreline?></small>
	<?php
	}
	if($social == 'gplus'){
	?>
        <p class="gdp-promotit"><?=$firstline?></p>
<!-- Posiziona questo tag all'interno del tag head oppure subito prima della chiusura del tag body. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'it'}
</script>

<!-- Inserisci questo tag nel punto in cui vuoi che sia visualizzato l'elemento widget. -->
<div class="g-page" data-width="280" data-href="<?=$opt['gplus']?>" data-layout="landscape" data-rel="publisher"></div>
        <div style="clear:both"></div>
        <small id="dontShowMeAgain"><?=$nomoreline?></small>
	<?php
	}
	?>
	</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	var gdpStop = gdpGetCookie('gdpSTOP');
	if(gdpStop != 1){
        setTimeout(function(){
		<?php
		if($opt['freq'] >= 1) {
			//Set cookie 
			?>
			var oldC = gdpGetCookie('gdpSO');
			console.log(oldC);
			if(oldC != 1){
				gdpSetCookie('gdpSO','1',<?=(60*$opt['freq'])?>);
				jQuery('#gdp-overlayBox').show();
				jQuery('#gdp-modalBox').show();
			}
			<?php
		} else {
		?>
                jQuery('#gdp-overlayBox').show();
                jQuery('#gdp-modalBox').show();
		<?php
}
?>
        }, <?=$totS?>);
	}
});
</script>
	<?php
	}
}
add_action('wp_footer','so_output');
add_action('wp_footer','includeFacebookSDK',1);

function includeFacebookSDK(){
	$opt = get_option('gdpSocialOverlay',true);	
	if($opt['facebookSDK']==1 && !empty($opt['facebookSDK']) && !empty($opt['facebookAPPID'])){
	?>
   <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?=$opt['facebookAPPID']?>',
          xfbml      : true,
          version    : 'v2.3'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
	<?php
	}
}


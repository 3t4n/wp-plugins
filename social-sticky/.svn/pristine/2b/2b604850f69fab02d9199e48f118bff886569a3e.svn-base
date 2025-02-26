<?php

// Show Left Effect and Social Box
if ( $options[ 'EnableLeftEffect' ] == 1)
{
	// Use Left option value
	$ss_likebox_id = "ss-likebox-left";
	$ss_div_effect_class = "ss-effect-left";
	$effect_type = $options[ 'LeftEffect' ];
	$effect_size = $options[ 'LeftEffectSize' ];
	$position = 'Left' ;
	$border_color = $options[ 'LeftBorderColor' ];
	$center_color = $options[ 'LeftCenterColor' ];
	$effect_social = $options[ 'LeftSocial' ];

	include 'ss-box-show.php' ;
}

// Show Right Effect and Social Box
if ( $options[ 'EnableRightEffect' ] == 1)
{
	// Use Right option value
	$ss_likebox_id = "ss-likebox-right";
	$ss_div_effect_class = "ss-effect-right";
	$effect_type = $options[ 'RightEffect' ];
	$effect_size = $options[ 'RightEffectSize' ];
	$position = 'Right' ;
	$border_color = $options[ 'RightBorderColor' ];
	$center_color = $options[ 'RightCenterColor' ];
	$effect_social = $options[ 'RightSocial' ];

	include 'ss-box-show.php' ;
}

// FaceBook scripting for loading
if ( $options[ 'LeftSocial' ] == 'FaceBook' || $options[ 'RightSocial' ] == 'FaceBook' )
{
	echo '
		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "http://connect.facebook.net/en_US/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, "script", "facebook-jssdk"));
		</script>
	' ;
}

// Twitter scripting for loading
if ( $options[ 'LeftSocial' ] == 'Twitter' || $options[ 'RightSocial' ] == 'Twitter' )
{
	echo '	
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	' ;
}

// Google scripting for loading
if ( $options[ 'LeftSocial' ] == 'Google+' || $options[ 'RightSocial' ] == 'Google+' )
{
	echo "	
		<script>
		(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();
		</script>
	";
}
?>
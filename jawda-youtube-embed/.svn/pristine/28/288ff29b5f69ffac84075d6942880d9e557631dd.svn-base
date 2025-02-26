<?php

/* ---------------------------------------------------------------
# jawda_youtube_shortcode
--------------------------------------------------------------- */


if ( !function_exists('jyte_shortcode') )
{

	function jyte_shortcode($atts){

	  // Get ShortCode Data
		extract(shortcode_atts(array('url' => '','title' => ''), $atts));

	  // start output
		$output =  '';

	  // check url Exests
	  if( isset($url) AND $url !== NULL AND $url !== '' ){

	    // start videbox
	    ob_start();

	    // get Video ID
	    $videoid = jyte_video_id($url);

	    // check Video title
	    if( isset($title) AND $title !== NULL AND $title !== '' )
	    {
	      echo '<h4 class="center">'.esc_attr($title).'</h4>';
	    }

	      ?>
	      <iframe
	        width="560"
	        height="315"
	        src="https://www.youtube.com/embed/<?php echo esc_attr($videoid); ?>"
	        srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/<?php echo esc_attr($videoid); ?>?autoplay=1><img loading=lazy src=https://img.youtube.com/vi/<?php echo esc_attr($videoid); ?>/hqdefault.jpg alt='<?php the_title(); ?>'><span>▶</span></a>"
	        frameborder="0"
	        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
	        allowfullscreen
	        title="<?php the_title(); ?>"
	        style="width:100%;height:auto;min-height:350px;"
	      ></iframe>
	      <script type="application/ld+json">
	      {
	        "@context": "https://schema.org",
	        "@type": "VideoObject",
	        "name": "<?php the_title(); ?>",
	        "description": "<?php the_title(); ?>",
	        "thumbnailUrl": [
	          "https://img.youtube.com/vi/<?php echo esc_attr($videoid); ?>/hqdefault.jpg"
	         ],
	        "uploadDate": "<?php echo get_the_date('Y-m-d'); ?>T08:00:00+08:00",
	        "duration": "PT1M54S",
	        "contentUrl": "<?php echo get_permalink(); ?>",
	        "interactionStatistic": {
	          "@type": "InteractionCounter",
	          "interactionType": { "@type": "http://schema.org/WatchAction" },
	          "userInteractionCount": <?php echo rand(15, 35); ?>
	        }
	      }
	      </script>

	    <?php

	    $output .= ob_get_clean();

	  }

		return $output;
	}

	add_shortcode('jawda_yt', 'jyte_shortcode');

}


/* ---------------------------------------------------------------
# Get Youtube video ID form url
--------------------------------------------------------------- */

if ( !function_exists('jyte_video_id') )
{

	function jyte_video_id($url){
	  $youtube_id = '';
	  preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
	  $youtube_id = $match[1];
	  return $youtube_id;
	}

}

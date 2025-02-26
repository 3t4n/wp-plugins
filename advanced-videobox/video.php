<div id="av-wrapper"  style="width: <?php echo $width; ?>px !important;">
	
   <div class="av-video">

		<?php for ($inst = 1; $inst <= $instance['number']; $inst++)
 {
     $titles[$inst] = apply_filters('widget_title', $instance['titles' . $inst]);
     $video[$inst] = $instance['video' . $inst];
     // change width and height
     $video[$inst] = preg_replace('/(width)=("[^"]*")/i', 'width="' . $width . '"', $video[$inst]);
     $video[$inst] = preg_replace('/(height)=("[^"]*")/i', 'height="' . $height . '"',
         $video[$inst]);
     // strbet($inputStr, $delimeterLeft, $delimeterRight, $debug=false)
     // gets src="$value& string
     $delimeterLeft = ("src=\"");

     // check if parameters are enabled
     if ($enable_params)
     {
         $delimeterRight = ("\"");
     } else
     {
         $delimeterRight = ("&");
     }

     // extracting url of the video, something like http://www.youtube.com/v/S7r3xXGWVNM

     $video_url = strbet($video[$inst], $delimeterLeft, $delimeterRight, $debug = false);
     // extracting ID of the video, something like S7r3xXGWVNM
     $delimeterLeft = ("/v/");
     $delimeterRight = ("&");
     $video_ID = strbet($video[$inst], $delimeterLeft, $delimeterRight, $debug = false); ?>	
	
			<div id="video-<?php echo $inst; ?>">
				<?php /* Display video from widget settings if one was input. */
     echo '<object type="application/x-shockwave-flash" style="width:' . $width .
         'px; height:' . $height . 'px;" data="' . $video_url .
         '"><param name="movie" value="' . $video_url . '" /></object><br />';


     // echo "<img src='http://img.youtube.com/vi/$video_ID/0.jpg' style='width:40px; height:40px;' alt='' /><br />"; ?>
			</div>
		
		<?php } ?>    
		
		</div><!--end av-video -->

	
			<ul class="idTabs">
	
			<?php for ($inst = 1; $inst <= $instance['number']; $inst++)
             {
                 $video[$inst] = $instance['video' . $inst];
                 // change width and height
                 $video[$inst] = preg_replace('/(width)=("[^"]*")/i', 'width="' . $width . '"', $video[$inst]);
                 $video[$inst] = preg_replace('/(height)=("[^"]*")/i', 'height="' . $height . '"',
                     $video[$inst]);
                 $video_ID = strbet($video[$inst], $delimeterLeft, $delimeterRight, $debug = false); ?>	
            		      
            	<li>
                <a href="#video-<?php echo $inst; ?>" title="<?php echo $titles[$inst]; ?>">
                <?php echo "<img src='http://img.youtube.com/vi/$video_ID/0.jpg' alt=''/>"; ?><?php echo
            $titles[$inst]; ?>    
                </a>
                </li>
            		
            <?php } ?>
            			
            </ul>
            	 
	<?php if ($display_credits)
 { ?>
    <p class="ts-credits">
    powered by <a href="http://www.sramekdesign.com">PSD to Wordpress</a>
    </p>
    <?php } ?>
	</div><!--end av-wrapper -->
    
	<div class="clear"></div>
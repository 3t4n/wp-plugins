<?php



function price_table_add_shortcode_column( $columns ) {
    return array_merge( $columns, 
        array( 'shortcode' => __( 'Shortcode', 'price_table' ) ) );
}
add_filter( 'manage_price_table_posts_columns' , 'price_table_add_shortcode_column' );


function price_table_posts_shortcode_display( $column, $post_id ) {
    if ($column == 'shortcode'){
		?>
        <input style="background:#bfefff" type="text" onClick="this.select();" value="[price_table <?php echo 'id=&quot;'.$post_id.'&quot;';?>]" /><br />
      <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[price_table id='; echo "'".$post_id."']"; echo '"); ?>'; ?></textarea>
        <?php		
		
    }
}
add_action( 'manage_price_table_posts_custom_column' , 'price_table_posts_shortcode_display', 10, 2 );








	
	function price_table_get_img_video($url)
		{
			$html ='';
			
			$video_domain = price_table_get_domain($url);
			
			if($video_domain=="youtube.com")
				{
					$vid = price_table_get_youtube_id($url);
					$html.=  '<iframe src="//www.youtube.com/embed/'.$vid.'?autoplay=0&showinfo=0&controls=0" frameborder="0" allowfullscreen></iframe>';
				}
				
			elseif($video_domain=="vimeo.com")
				{
					$vid = price_table_get_vimeo_id($url);
					$html.=  '<iframe src="//player.vimeo.com/video/'.$vid.'?title=0&amp;byline=0" width="" height="" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
				}
			else
				{
					$html .='<img src="'.$url.'" />';
				}

			
			return $html;			
		}
	
























	
function price_table_get_domain($url)
{
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : '';
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}
	
	
	
function price_table_get_youtube_id($url)
	{
		if (stristr($url,'youtu.be/'))
			{preg_match('/(https:|http:|)(\/\/www\.|\/\/|)(.*?)\/(.{11})/i', $url, $final_ID); return $final_ID[4]; }
    else 
        {@preg_match('/(https:|http:|):(\/\/www\.|\/\/|)(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $IDD); return $IDD[5]; }
	}
	
	
	
function price_table_get_vimeo_id($url)
	{

		$result = preg_match('/(\d+)/', $url, $matches);

		return $matches[0];
	
	}
	
	
	
	
	function price_table_share_plugin()
		{
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwordpress.org%2Fplugins%2Fprice-table%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
            
            <br />
            <!-- Place this tag in your head or just before your close body tag. -->
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo price_table_share_url; ?>"></div>
            
            <br />
            <br />
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo price_table_share_url; ?>" data-text="<?php echo price_table_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php
			
			
			
		
		
		}
	
	
	
	
	
	
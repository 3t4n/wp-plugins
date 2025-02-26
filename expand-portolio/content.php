<?php
//add_filter('the_content', 'h2cweb_content_filter');
function h2cweb_content_filter($content) {
	if (is_single() || is_page()) {
	return $content;
	}
	else {
	h2cweb_content(get_the_id());
	}
}
add_shortcode('ExpandPortfolio', 'h2cweb_shortcode');
function h2cweb_shortcode() {
	$args = array(
    'posts_per_page'  => -1,
    'offset'          => 0,
    'category'        => '',
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    'post_type'       => 'porftfolio',
    'post_status'     => 'publish',
    );
	$eposts = get_posts($args);
	if($eposts) {foreach($eposts as $epst){h2cweb_content($epst->ID);}}
}
function h2cweb_content($eid) {
	global $exp;
	$epost = get_post($eid);
	$data = get_post_meta($eid, 'h2cweb_metadata', true);
?>
<div id="ep-wrap<?php echo $eid;?>" class="ep-wrap">
	<div id="ep-title-wrap">
		<h2 class="ep-title" style="color:#bb4d9d;"><?php echo $epost->post_title;?></h2>
		<p><?php //echo esc_html(get_the_date('', $eid));?></p>
		<div class="clear"></div>	
</div>
	
	<div id="ep-thumb-wrap">
		<?php if (has_post_thumbnail($epost->ID)) {$image = wp_get_attachment_image_src(get_post_thumbnail_id($epost->ID),'ep-thumb');
		echo '<img src="'.$image[0].'" class="ep-thumb" alt="'.$epost->post_title.'" width="100%" 
		onMouseOver="jQuery(\'#ep-tap'.$eid.'\').show();"/>';}?>
		<div class="ep-tap" id="ep-tap<?php echo $eid;?>"
			 onMouseOut="jQuery('#ep-tap<?php echo $eid;?>').hide();"
			 onClick="expandPost('#ep-expand<?php echo $eid;?>');">
		</div>		
	</div>
 
 
 
  <div id="ep-expand<?php echo $eid;?>" class="ep-expand">
  	<?php if($data['section1']['photo1']) {?>
	<div id="ep-vid-wrap">
		<?php if ($data['media1']['video1']) {
			 $image = wp_get_attachment_image_src($data['media1']['pic1'],'ep-link');
			 
				echo '<a href="'.$data['media1']['video1'].'" class="fancybox-media" >
				<img src="'.$data['media1']['pic1'].'" alt="'.$epost->post_title.'" width="315" height="200"/></a>';
				
			echo $data['text1'];
			} 
		?>
	</div>
	
	
	<?php } if($data['section2']['photo2']) {?>
	<div id="ep-vid-wrap">
		<?php if ($data['media2']['video2']) {
			 
			 $image = wp_get_attachment_image_src($data['media2']['pic2'],'ep-link');
				echo '<a href="'.$data['media2']['video2'].'" class="fancybox-media" >
				<img src="'.$data['media2']['pic2'].'" alt="'.$epost->post_title.'" width="315" height="200"/></a>';
				
			echo $data['text2'];
			} 
		?>
	</div>
	
	
	<?php } if($data['section3']['photo3']) {?>
	<div id="ep-vid-wrap">
		<?php if ($data['media3']['video3']) {
		
			 $image = wp_get_attachment_image_src($data['media3']['pic3'],'ep-link');
				echo '<a href="'.$data['media3']['video3'].'" class="fancybox-media" >
				<img src="'.$data['media3']['pic3'].'" alt="'.$epost->post_title.'" width="320" height="200"/></a>';
				
			echo $data['text3'];
			} 
		?>
	</div>
	
	
	<?php } if($data['section4']['photo4']) {?>
	<div id="ep-vid-wrap">
		<?php if ($data['media4']['video4']) {
			
			 $image = wp_get_attachment_image_src($data['media4']['pic4'],'ep-link');
				echo '<a href="'.$data['media4']['video4'].'" class="fancybox-media">
				<img src="'.$data['media4']['pic4'].'" alt="'.$epost->post_title.'" width="315" height="200"/></a>';
				
			echo $data['text4'];
			} 
		?>
	</div>
	
	
	<?php } if($data['section5']['photo5']) {?>
	<div id="ep-vid-wrap">
		<?php if ($data['media5']['video5']) {
			
			 $image = wp_get_attachment_image_src($data['media5']['pic5'],'ep-link');
			echo '<a href="'.$data['media3']['video3'].'" class="fancybox-media">
				<img src="'.$data['media3']['pic3'].'" alt="'.$epost->post_title.'" width="315" height="200"/></a>';
				
			echo $data['text5'];
			} 
		?>
	</div>

		<?php } if($data['section']['photo']) {?>
		<div id="ep-vid-wrap">			
			<?php if ($data && $data['media'] && $data['media']['pic']) {
		//	$image = wp_get_attachment_image_src($data['media']['picid'],'ep-link');
			echo '<a href="'.$data['media']['pic'].'" class="fancybox-media">
			<img src="'.$data['media']['pic'].'" alt="'.$epost->post_title.'" width="520" height="200"/></a>';
			echo $data['text'];			
				} ?>			
		</div>	
	<?php }?>
	
	<div class="clear"></div>
	

	<?php if($data['section']['desc'] || $data['section']['cast']) {?>
	<div id="ep-desc-wrap">
		<?php if($data['section']['desc']) {?>
		<div class="ep-content" style="<?php if(!$data['section']['cast']) {echo 'width:100%;';}?>">
		<div class="ep-content-hold">
			<?php echo $epost->post_content;?>
		</div>
		</div>
		<?php }?>
		
	
		
		
		<?php if($data['section']['cast']) {?>
		<div class="ep-crewcast-hold">
		<div class="ep-crewcast" style="<?php if(!$data['section']['desc']) {echo 'width:100%;';}?>">
		
			<h3 class="ep-subtitle"><?php _e('Credits', 'h2cweb');?></h3>
			<?php if ($data && $data['title']) {
				foreach ($data['title'] as $title) {
					if ($title['title'] && $title['credit']) {
						if (!$title['url'] || $title['url'] == '') {$title['url']='#';}
						echo '<p class="ep-crew">'.$title['credit'].'<br><a href="'.$title['url'].'">'.$title['title'].'</a></p>';
					}
				} 
			}?>
		</div>
		</div>
		
		<?php }?>
	</div>
	
	
	
	<!--	
	<?php // } if($data['media']['video'] && $data['section']['vid']) {?>
	<div id="ep-vid-wrap">
		<?php // if ($data && $data['media'] && $data['media']['video']) {
			// echo $data['media']['video'];			
		//}?>
	</div>
	<?php // } ?>
	-->
	
	
	<?php } if($data['section']['cmnt']) {?>
	<div id="ep-cmnt-wrap">
		<div class="ep-cmnt"><div class="ep-cmnt-hold">
			<?php 
			$epcs = get_epcomments($eid);
			if ($epcs) {
			foreach($epcs as $epc) :
				echo '<p><span>'.$epc->author.'</span> - '.$epc->content;
			endforeach;
			}?>
		</div></div>
		
		<div class="ep-cmnt-form"><div class="ep-cmnt-form-hold">
			<h3 class="ep-subtitle"><?php _e('Leave a Reply', 'h2cweb');?></h3>
			<div id="ep-result<?php echo $eid;?>"><p><?php _e('Your email address will not be published. Required fields are marked.', 'h2cweb');?>
			</p></div>
			<form action="<?php echo h2cweb_URL.'/ajaxcomment.php';?>" method="post"
			 name="cmntform<?php echo $eid;?>" id="cmntform<?php echo $eid;?>">
			<p><input placeholder="Name*" type="text" class="txt" name="cdata[author]"></p>
			<p><input placeholder="Email*" type="text" class="txt" name="cdata[email]"></p>
			<p><input  placeholder="Website" type="text" class="txt" name="cdata[url]"></p>
			<p><textarea  placeholder="Comment" cols="" rows="" class="txt" name="cdata[content]"></textarea></p>
			<input type="hidden" name="cdata[post_id]" value="<?php echo $eid;?>">
			<p><input name="cmntsubmit" type="button" class="btn" value="Leave Comment"
			 onClick="cmntSubmit(<?php echo $eid;?>)"></p>
			</form>
		</div></div>
	</div>
	

	

	<?php }?>
	
  </div>

</div>

	<div id="ep-meta-wrap">
	<?php //if(function_exists('do_sociable') ){do_sociable();} ?>	
		<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" alt="Share on Facebook" title="Share on Facebook" target="_blank">
			<img src="<?php echo h2cweb_URL?>/images/social/facebook.png" alt="Contact" width="32" height="32" />
		</a>
		<a href="https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php the_permalink() ?>" alt="Share on Google+" title="Share on Google+" target="_blank">
			<img src="<?php echo h2cweb_URL?>/images/social/googleplus.png" alt="Contact" width="32" height="32" />
		</a>
		<a href="http://twitter.com/share?text=<?php the_title(); ?> -&url=<?php the_permalink() ?>&via=geekinheels" alt="Tweet This Post" title="Tweet This Post" target="_blank">
			<img src="<?php echo h2cweb_URL?>/images/social/twitter.png" alt="Contact" width="32" height="32" />
		</a>
		<a href="javascript:void((function(){var%20e=document.createElement('script'); e.setAttribute('type','text/javascript'); e.setAttribute('charset','UTF-8'); e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)})());" alt="Pin This Post" title="Pin This Post" target="_blank">
		<img src="<?php echo h2cweb_URL?>/images/social/pintrest.png" alt="Contact" width="32" height="32" /></a>
	</div>
	
		
	
<script>soundManager.setup({url: '<?php echo h2cweb_URL?>/swf/', onready: function() {var my<?php echo $eid;?>Sound = soundManager.createSound({useHTML5Audio: true, id: 'play<?php echo $eid;?>Sound', url: '<?php echo $data['media']['mp3']?>', onfinish: function() {soundManager.play('play<?php echo $eid;?>Sound');}});}, ontimeout: function() {alert('Sorry the music file cannot be played.');}});</script>
<?php
}
?>
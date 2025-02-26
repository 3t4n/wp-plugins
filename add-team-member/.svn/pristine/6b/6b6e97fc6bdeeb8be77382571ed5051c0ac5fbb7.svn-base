<?php 

    /*Add Team Member */
	
		global $post;
		$type='sci_team';
		
		function sci_add_team_staff( $atts ){ 
		wp_register_style('bootstrap-css',plugins_url('assets/css/bootstrap.css', __FILE__));
		wp_enqueue_style('bootstrap-css');
		
		wp_register_style('bootstrapre-css',plugins_url('assets/css/bootstrap-responsive.css', __FILE__));
		wp_enqueue_style('bootstrapre-css');

		wp_register_style('custome-css',plugins_url('assets/css/plugin-style.css', __FILE__));
		wp_enqueue_style('custome-css');
					
?>
		<div class="container" style="width:100%; overflow: hidden;">
		<div class="row-fluid">
		<div id="our-team" class="span12">
			<h2 class="ourteamheading"><?php _e('Our Team','sis_spa');?></h2>
	<ul class="thumbnails"><!---- before style="margin-left:0px;"---->
				<?php  $arg = array( 'post_type' => 'sci_team');
						$team = new WP_Query( $arg );
						if($team->have_posts()) {
												
						while ( $team->have_posts() ) : $team->the_post();
				?>	   
	<li class="span6" style="margin-left:0px; padding-left: 15px;">
			<div class="media">
							<?php $defalt_arg =array('class' => "aboutus-team-img" )?>
							<?php if(has_post_thumbnail()):?>
							<a class="about-pull-left"  href="<?php // the_permalink(); ?>" title="<?php //the_title(); ?>"  ><?php the_post_thumbnail('', $defalt_arg); ?></a>
							
							<?php endif;?>
			<div class="media-body">
							<h2 class="about-team-head"><?php the_title(); ?></h2>
							
							<?php  $my_meta = get_post_meta(get_the_ID()); 
			     			$PostMetaVal =  unserialize($my_meta['_my_meta'][0]);
							?>
							
							<span class="designation">
							<?php _e('Designation : ','sis_spa');?><?php if(isset($PostMetaVal['Designation'])){echo $PostMetaVal['Designation'];} else {echo "Please Enter Designation";}?>
							</span>

							<div class="aboutus_content">
							<p> <?php if(isset($PostMetaVal['description'])) echo $PostMetaVal['description'];?> </p>
							</div>
							
							<div class="contact-icons"> 
							<?php if(isset($PostMetaVal['facebook_chkbx'])){$facebook_chkbx=1;} else{$facebook_chkbx=0;}
							
							if(isset($PostMetaVal['facebook_chkbx'])){$facebook_url=$PostMetaVal['facebook_url'];} else{$facebook_url="http://facebook.com";}

							if(isset($PostMetaVal['twitter_chkbx'])){$twitter_chkbx=1;} else{$twitter_chkbx=0;}
							if(isset($PostMetaVal['twitter_url'])){$twitter_url=$PostMetaVal['twitter_url'];} else{$twitter_url="http://twitter.com";}
							
							if(isset($PostMetaVal['google_chkbx'])){$google_chkbx=1;} else{$google_chkbx=0;}
							if(isset($PostMetaVal['google_url'])){$google_url=$PostMetaVal['google_url'];} else{$google_url="http://google.com";}
												 
							?>
							
							<?php if($facebook_chkbx==1 ): ?>
							<a class="facebook" target="_blank" href="<?php echo $facebook_url ;?>">&nbsp;</a>
							<?php endif ; ?>
							
							<?php if($twitter_chkbx==1):?>
							<a class="tweeter" target="_blank" href="<?php echo $twitter_url; ?>">&nbsp;</a>
							<?php endif ; ?>
							
							<?php if($google_chkbx==1):?>
							<a class="google"  target="_blank" href="<?php echo $google_url ;?>">&nbsp;</a>
							<?php  endif ;?>
							</div>
            </div>
        </div>
    </li>
					<?php endwhile; } else {
											echo "there is no team member"; ?>

					<?php } ?>
	</ul>	<!-- /closing of ul section --> 
</div><!-- /Our Team --> 
</div></div>
	<?php }
	add_shortcode( 'addteammember', 'sci_add_team_staff' );
?>
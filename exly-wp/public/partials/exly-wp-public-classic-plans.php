<?php $extraPlan = $this->fetch_listing_api_extra_data_callback();
 if(!empty($extraPlan['plans'])){
?>
 <?php  if($categorise_type != 4): ?>
<div class="heading">
				<h4 class="inner-heading template-page-heading-text"><?php echo esc_html($extraPlan['title']); ?></h4>			
				</div>
	<?php endif; ?>			
				
				<div class="sec1 output-response">
	      
	         		<?php foreach( $extraPlan['plans'] as $plankey => $subvalue): ?>
		<?php 
		$type = $subvalue['plan_type'];
   if($type === 5 || $type === 6 )  {
     $bookASpotText = 'Buy Now!';
   }else{
        $bookASpotText = 'Book a Spot';
   }
	?>
		<?php $uuid = $subvalue['uuid']; 
   $parent_listing_uuid = $subvalue['parent_listing_uuid'];
   $bookURL = $this->generate_booking_url($parent_listing_uuid).'?&plan_id='.$uuid;?>
           <section  class="first-sec">			
		      <div data-link-target="<?php echo esc_url($bookURL); ?>" class="link-to-listing inner-sec template-block-background">
			  <?php  if($categorise_type == 4): ?>
			  <?php $bgcolor = "#CA3E47"; ?>
			<div class="upper-text"><span class="upper-inner" style="background-color: <?php echo esc_html($bgcolor); ?>;"><?php echo esc_html($extraPlan['title']); ?></span></div>
			<?php endif; ?>
			<?php  if($cardContent): ?>
			<div class="bottom-text"><span class="upper-inner" <?php echo esc_html($style); ?>><?php echo esc_html($content); ?></span></div>
			<?php endif; ?>	
		<div class="first">
		<a target="_blank" class="" target="_blank" href="<?php echo esc_url($bookURL); ?>">
             <?php $cover_image = $subvalue['cover_image'];
                  if($cover_image): ?>
			<img alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>" src="<?php echo esc_html($cover_image); ?>">
			<?php else: ?>
			<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/default-thumb.jpeg'; ?>" alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>">
			<?php endif; ?>
			</a>
		</div>
			<div class="icons">
			<?php $bookMarkUrl = $this->generate_bookmark_url(); ?>
		<a class='bookmark-trigger' target="_blank" href="<?php echo esc_url($bookMarkUrl); ?>?init_contact=true"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/heartcircle.png'; ?>"></a>
		<a class='share-trigger' href="#popup-<?php echo esc_attr($uuid); ?>" rel="modal:open"><img id="share-btn9" src="<?php echo plugin_dir_url( __FILE__ ) . 'img/ShareIcon.png'; ?>"></a>
			<div id="popup-<?php echo esc_attr($uuid); ?>" class="exly-wp-modal">
			<h4 class="hd"><?php echo esc_html('Share Via'); ?></h4>
                        <ul class="share-items">
                           <li class='facebook'><a target="_blank" href="https://www.facebook.com/dialog/feed?app_id=253311268567195&link=<?php echo esc_attr($bookURL); ?>&quote=<?php echo esc_attr($subvalue['title']); ?>"> <i class="fab fa-facebook-f"></i><?php echo esc_html('Share on Facebook'); ?></a></li>
                           <li class='whatsup'>
                              <?php $text = 'Join my session,'.$subvalue['title'].' via '.$bookURL?>
                              <a target="_blank" href="https://api.whatsapp.com/send?&text=<?php echo esc_html($text); ?>"><i class="fab fa-whatsapp"></i> <?php echo esc_html('Share on WhatsApp'); ?></a>
                           </li>
                          
                           <li class='tiny-url'><a href="javascript:void(0)" class="link-copy" data-link="<?php echo esc_url($bookURL); ?>"><i class="far fa-copy"></i><?php echo esc_html('Copy to clipboard'); ?></a></li>
						   
                        </ul>
                     </div>
			</div>
		<div class="text-sec1">
			<h4 class="txth4 events-card-title"><a class="template-block-text exly-title" target="_blank" href="<?php echo esc_url($bookURL); ?>"><?php echo esc_attr($subvalue['title']); ?></a></h4>
			<p class="txtp events-card-text template-price-tag"><?php echo wp_kses_data($subvalue['short_description']); ?></p>
            </div>
            <div class="btn">
            	<div class="btn-inner"> <a target="_blank" class="classic-primary-background-color common_wrap button exly-button" target="_blank" href="<?php echo esc_url($bookURL); ?>"><?php echo esc_html($bookASpotText); ?></a>	</div>
            </div>
		
		     </div>
		
		    </section>
		
		<?php endforeach; ?>
		</div>
        <?php } ?>
<?php 
$extraPlan = $this->fetch_listing_api_extra_data_callback(); 

 if(!empty($extraPlan['plans'])){
?>
 <?php  if($categorise_type != 4): ?>
<div class="heading2">
				<h4 class="inner-heading modern-primary-text-color"><?php echo esc_html($extraPlan['title']); ?></h4>
				<span class="arrow">
					<i class="fas fa-angle-double-right modern-page-body-text-color"></i>
				</span>
				
				</div>
	<?php endif; ?>			
				
				<div class="sec-pg3 output-response">
	      
	         		<?php foreach( $extraPlan['plans'] as $plankey => $subvalue): ?>
		<?php $uuid = $subvalue['uuid']; 
   $parent_listing_uuid = $subvalue['parent_listing_uuid'];
   $bookURL = $this->generate_booking_url($parent_listing_uuid).'?&plan_id='.$uuid;
    $customField = get_option('custom_field');
   echo $customField;

    // Check if the custom field is not empty
    if (!empty($customField)) {
        // Extract domain name from the custom field (assuming it's a URL)
        $domain = parse_url($customField, PHP_URL_HOST);
        echo $domain;
        $href = "https://" . $domain; // Use the domain in the href
    } else {
        // Fallback to the booking URL
        $href = $bookURL;
    }
    ?>
		<?php 
		$type = $subvalue['plan_type'];
   if($type === 5 || $type === 6 )  {
     $bookASpotText = 'Buy Now!';
   }else{
        $bookASpotText = 'Book a Spot';
   }
	?>
           <section data-link-target="<?php echo esc_url($href); ?>" class="link-to-listing first-sec3">			
		      <div class="inner">
			  <?php  if($categorise_type == 4): ?>
			  <?php $bgcolor = "#CA3E47"; ?>
			<div class="upper-text"><span class="upper-inner" style="background-color:<?php echo esc_html($bgcolor); ?>;"><?php echo esc_html($extraPlan['title']); ?></span></div>
			<?php endif; ?>
			
		<div class="first3">
		<a target="_blank" class="" target="_blank" href="<?php echo esc_url($href); ?>">
             <?php $cover_image = $subvalue['cover_image'];
                  if($cover_image): ?>
			<img alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_html($subvalue['title']); ?>" src="<?php echo esc_html($cover_image); ?>">
			<?php else: ?>
			<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/default-thumb.jpeg'; ?>" alt="<?php echo esc_html($subvalue['title']); ?>" title="<?php echo esc_html($subvalue['title']); ?>">
			<?php endif; ?>
			</a>
		</div>
			<div class="icons3">
					<?php $bookMarkUrl = $this->generate_bookmark_url(); ?>
		<a class='bookmark-trigger' target="_blank" href="<?php echo esc_url($href); ?>/?init_contact=true"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/heartcircle.png'; ?>"></a>
		<a class='share-trigger' href="#popup-<?php echo esc_attr($uuid); ?>" rel="modal:open"><img id="share-btn9" src="<?php echo plugin_dir_url( __FILE__ ) . 'img/ShareIcon.png'; ?>"></a>
			<div id="popup-<?php echo esc_html($uuid); ?>" class="exly-wp-modal">
            <h4 class="hd"><?php echo esc_html('Share Via'); ?></h4>
                        <ul class="share-items">
                           <li class='facebook'><a target="_blank" href="https://www.facebook.com/dialog/feed?app_id=253311268567195&link=<?php echo esc_attr($href); ?>&quote=<?php echo esc_attr($subvalue['title']); ?>"> <i class="fab fa-facebook-f"></i><?php echo esc_html('Share on Facebook'); ?></a></li>
                           <li class='whatsup'>
                              <?php $text = 'Join my session,'.esc_attr($subvalue['title']).' via '.$href?>
                              <a target="_blank" href="https://api.whatsapp.com/send?&text=<?php echo esc_attr($text); ?>"><i class="fab fa-whatsapp"></i> <?php echo esc_html('Share on WhatsApp'); ?></a>
                           </li>
                           <li class='tiny-url'><a href="javascript:void(0)" data-link="<?php echo esc_url($subvalue['metadata']['share_url']); ?>" class="link-copy"><i class="fa fa-copy"></i><?php echo esc_html('Copy to clipboard'); ?></a></li>
                        </ul>
                     </div>
			</div>
		
		
		     </div>
		<div class="content-box">
				<div class="up-content">
			<h4 class="conth4"><a class="custom-title exly-title" target="_blank" href="<?php echo esc_url($href); ?>"><?php echo esc_html( $subvalue['title']); ?></a></h4>
		   </div>
			<p class="contp"><?php echo wp_kses_data($subvalue['short_description']); ?></p>
			<div class="last-sec">
            	<div class="slot-book">
            		<button type="button" class="btn3 modern-primary-background-color"><a target="_blank" class="common_wrap button exly-button events-button-background events-button-text events-button-border" target="_blank" href="<?php echo esc_url($href); ?>"><?php echo esc_html($bookASpotText); ?></a></button>
            	</div>
            	<div class="card"><span class="modern-primary-text-color"><?php echo esc_html($subvalue['price']); ?></span></div>
            </div>
            </div>
		    </section>
		
		<?php endforeach; ?>
		</div>
        <?php } ?>
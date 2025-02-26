<?php $isCategorized = $this->fetch_listing_api_data_callback();
 $activeThemeSlug = $this->$exlyTemplateName;
	$listingData = $isCategorized['skus'];
  $listingDatarecall = $this->fetch_theme_color_callback();
  
?>
 <div class="wrapper_wp_exply <?php echo esc_html($activeThemeSlug); ?>">

 <?php include 'exly-wp-public-elementary-default-plans.php'; ?>
<?php foreach( $listingData as $key => $value): ?>
<?php if(is_array($value)){ ?>
<?php foreach( $value as $key => $subvalue):?>
<?php if ($subvalue['is_active'] == 1) :  ?>


		 <?php
   $bookASpotText = 'Book a Spot';
   $type = $subvalue['type'];  
		 if(array_key_exists('booking_cta_text',$subvalue['metadata'])){
		 $bookASpotText = $subvalue['metadata']['booking_cta_text'];              
		 }else if( ($type == 5 || $type == 6) && (empty($subvalue['is_payment_disabled'])) )  {
            $bookASpotText = 'Buy Now!';
          }else if($subvalue['is_payment_disabled'] == 1){
			  $bookASpotText = 'Express Interest';
		  }else{
			  $bookASpotText = 'Book a Spot';
		  }
		 ?>
   <?php $uuid = $subvalue['uuid']; $bookURL = $this->generate_booking_url($uuid); ?>
    <?php 
	$cardContent = false;
    if(array_key_exists('card_label',$subvalue['metadata'])):
		 $card_label = $subvalue['metadata']['card_label'];
		 if (array_key_exists("content",$card_label)){
			 $content = $card_label['content'];
			 $cardContent = true;
		 }
		 if (array_key_exists("background",$card_label)){
			 $background = $card_label['background'];
			 $style = "background:".$background.";";
		 }
		 if (array_key_exists("color",$card_label)){
			 $color = $card_label['color'];
			 $style .= "color:".$color.";";
		 }
		 $style = 'style="'.$style.'"';
		 
		 endif;
   
   ?>
<div data-link-target="<?php echo esc_url($bookURL); ?>" class="sec2 elementary-page-background-color link-to-listing">
                 <?php if($cardContent): ?>
                <div class="sold" <?php echo esc_attr($style); ?>><?php echo esc_html($content); ?></div>
				<?php endif; ?>
			    <div class="inner-sec2">
			    <div class="event-none">
				<?php  if(array_key_exists('next_slot_time' ,$subvalue)): ?><span class='nextt'><strong>
				  <?php  echo esc_html(date("M d", strtotime($subvalue['next_slot_time'])));?> </strong></span><span class="bt"><?php echo esc_html('Onwards'); ?></span>
				  <?php endif;  ?>
				</div>
			    	<div class="share">

		<a class='share-trigger share-element elementary-primary-border-color' href="#popup-<?php echo esc_attr($uuid); ?>" rel="modal:open"><svg class="elementary-primary-background-svg" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.12 17.023l-4.199-2.29a4 4 0 1 1 0-5.465l4.2-2.29a4 4 0 1 1 .959 1.755l-4.2 2.29a4.008 4.008 0 0 1 0 1.954l4.199 2.29a4 4 0 1 1-.959 1.755zM6 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm11-6a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 12a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path></g></svg></a>
			<div id="popup-<?php echo esc_attr($uuid); ?>" class="exly-wp-modal">
            <h4 class="hd"><?php echo esc_html('Share Via'); ?></h4>
                        <ul class="share-items">
                           <li class='facebook'><a target="_blank" href="https://www.facebook.com/dialog/feed?app_id=253311268567195&link=<?php echo esc_attr($bookURL); ?>&quote=<?php echo esc_attr($subvalue['title']); ?>"> <i class="fab fa-facebook-f"></i><?php echo esc_html('Share on Facebook'); ?></a></li>
                           <li class='whatsup'>
                              <?php $text = 'Join my session,'.$subvalue['title'].' via '.$bookURL?>
                              <a target="_blank" href="https://api.whatsapp.com/send?&text=<?php echo esc_attr($text); ?>"><i class="fab fa-whatsapp"></i> <?php echo esc_html('Share on WhatsApp'); ?></a>
                           </li>
                           <li class='tiny-url'><a href="javascript:void(0)" data-link="<?php echo esc_url($subvalue['metadata']['share_url']); ?>" class="link-copy"><i class="fa fa-copy"></i><?php echo esc_html('Copy to clipboard'); ?></a></li>
                        </ul>
                     </div>

					</div></div>


			    <div class="inner-sec3">
			    	<div class="sec3-txt"><a class="elementary-page-body-text-color custom-title exly-title" target="_blank" href="<?php echo esc_url($bookURL); ?>"><?php echo esc_html($subvalue['title']); ?></a> </div>
					<div class="inner-sec3-l">
			    		<div class="sec-txt"><?php echo wp_kses_data($subvalue['description']); ?></div>
					</div>
			    	<div class="eventinner elementary-primary-text-color"><p><?php echo wp_kses_data($subvalue['short_description']); ?></p></div>
			    	
			    	</div>
			    	<div class="sec-left">
			    		<a  class="exly-title" target="_blank" href="<?php echo esc_url($bookURL); ?>">
             <?php $cover_image = $subvalue['cover_image'];
                  if($cover_image): ?>
			<img alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>" src="<?php echo esc_attr($cover_image); ?>">
			<?php else: ?>
			<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/default-thumb.jpeg'; ?>" alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>">
			<?php endif; ?>
			</a>
			<div class="txt-lft elementary-primary-border-color opacity-background elementary-primary-text-color"><a target="_blank" class="common_wrap button exly-button" target="_blank" href="<?php echo esc_url($bookURL); ?>"><?php echo esc_html($bookASpotText); ?></a></div></div>
			    	</div>
				<?php endif; ?>

	<?php endforeach; ?>
	<?php } ?>
  <?php endforeach; ?>

					</div>
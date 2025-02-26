<?php

$currentTimeZone = get_option( 'exly_currency_timezone');
if($currentTimeZone === 'Asia/Kolkata'){
	$currencySymbol = '₹';
	$currencyName = 'INR';
}else{
	$currencySymbol = '$';
	$currencyName = 'USD';
}
    $isCategorized = $this->get_categorise_type();
   $activeThemeSlug = $this->$exlyTemplateName;
   $categorise_type = trim($isCategorized['categorise_type'], " ");


  $listingData = $isCategorized['skus'];
   if($categorise_type == 1 || $categorise_type == 4 || $categorise_type == 2){
   $Listingorder = $isCategorized['sku_title_map'];
  $listingData = array_merge(array_flip($Listingorder), $listingData);
  $listingData = array_filter($listingData);
   }
   


   ?>
  
   <div class="wrapper_wp_exply template-page-background <?php echo esc_html($activeThemeSlug); ?>">
   <?php  if($categorise_type == 4): ?>
   <div class="heading"><h4 class="template-page-heading-text">
   <?php echo esc_html("Browse All Offerings");  ?>
   </h4>
   </div>
   <div class='sec1'>

   <?php endif;?>

    <?php  if($categorise_type == 1  || $categorise_type == 2 || $categorise_type == 4): ?>

   <?php include 'exly-wp-public-classic-plans.php'; ?>

   <?php endif;?>
<?php foreach( $listingData as $key => $value): ?>
<?php if(is_array($value)){ ?>
<?php $idstring = str_replace(' ', '', $key);  ?>
    <?php  if($categorise_type != 4): ?>
	<?php  
						   $hashID = strtolower($key);
						   $hashID = str_replace(' ', '_', $hashID);
		 
		?>
    <div class="heading"><h4 id="<?php echo esc_html($hashID); ?>" class="template-page-heading-text"><?php echo esc_html($key); ?></h4></div>
	<?php endif; ?>
   <?php  if($categorise_type == 2): ?>
   <?php $keywords =  $value['tags'];?>
	<?php $value = $value['skus']; ?>
		<?php if($keywords):?>
		<div class="keywords_list classic-list"><ul>
		<?php  $totalKeywords = count($keywords); ?>
		<?php  if($totalKeywords >= 1): ?>
		 <li><a class="classic-primary-text-color active-primary-border-color" data-id="<?php echo esc_attr($idstring); ?>" data-target="allkeywords" href="javascript:void(0)"><?php echo esc_html('All');?></a></li>
		<?php  endif; ?>
		<?php foreach( $keywords as $keywordkey => $keywordvalue):  ?>
		<?php $totalKeywords = count($keywords); ?>
		<li><a class="classic-primary-text-color" data-id="<?php echo esc_attr($idstring); ?>" data-target="<?php echo esc_attr($keywordvalue); ?>" href="javascript:void(0)"><?php echo esc_html($keywordvalue); ?></a></li>
		<?php endforeach; ?>
		</ul></div>
		<?php endif; ?>
	<?php endif; ?>
	<?php  if($categorise_type != 4): ?>

	<div class='sec1 output-response <?php echo esc_html($idstring); ?>'>
	<?php endif; ?>
	<?php  
	if($categorise_type == 3 || $categorise_type == 5){
	$value = array_reverse($value, true);
	}
	 ?>
   <?php foreach( $value as $subkey => $subvalue): ?>
   <?php if ($subvalue['is_active'] == 1) :  ?>
   <?php $uuid = $subvalue['uuid']; $bookURL = $this->generate_booking_url($uuid);?>
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
		<?php $keywordlist ='allkeywords ';
 if(array_key_exists('keywords',$subvalue['metadata'])):
 $keywords = $subvalue['metadata']['keywords'];
 $keywordlist .= implode(" ",$keywords);

endif;
		?>

   <section  class="first-sec <?php echo esc_html($keywordlist); ?>">
		<div data-link-target="<?php echo esc_url($bookURL); ?>" class="link-to-listing inner-sec template-block-background">
		<?php $title = $subvalue['sku_title'] ; ?>
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

		
			<div class="upper-text">
			<?php  if($categorise_type == 3  || $categorise_type == 4): ?>
		<?php $tyeID = $subvalue['type']; ?>
		<?php $bgcolor = $this->colorByListingType($tyeID); ?>
			<span class="upper-inner" style="background-color: <?php echo esc_html($bgcolor); ?>;"><?php echo esc_html($title); ?></span>
			<?php endif; ?>
		<?php  if($cardContent): ?>
			<span class="upper-inner sold" <?php echo esc_html($style); ?>><?php echo esc_html($content); ?></span>
			<?php endif; ?>
			</div>
				
			
		<div class="first">
		<a class="exly-title" target="_blank" href="<?php echo esc_url($bookURL); ?>">
             <?php $cover_image = $subvalue['cover_image'];
                  if($cover_image): ?>
			<img alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>" src="<?php echo esc_attr($cover_image); ?>">
			<?php else: ?>
			<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/default-thumb.jpeg'; ?>" alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>">
			<?php endif; ?>
			</a>
		</div>
			<div class="icons">
			<?php $bookMarkUrl = $this->generate_bookmark_url(); ?>
		<a class='bookmark-trigger' target="_blank" href="<?php echo esc_url($bookMarkUrl); ?>/?init_contact=true"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/heartcircle.png'; ?>"></a>
		<a class='share-trigger' href="#popup-<?php echo esc_attr($uuid); ?>" rel="modal:open"><img id="share-btn9" src="<?php echo plugin_dir_url( __FILE__ ) . 'img/ShareIcon.png'; ?>"></a>
			<div id="popup-<?php echo esc_attr($uuid); ?>" class="exly-wp-modal">
                        <h4 class="hd"><?php echo esc_html('Share Via'); ?></h4>
                        <ul class="share-items">
                           <li class='facebook'><a target="_blank" href="https://www.facebook.com/dialog/feed?app_id=253311268567195&link=<?php echo esc_url($bookURL); ?>&quote=<?php echo $subvalue['title']; ?>"> <i class="fab fa-facebook-f"></i><?php echo esc_html('Share on Facebook'); ?></a></li>
                           <li class='whatsup'>
                              <?php $text = 'Join my session,'.$subvalue['title'].' via '.$bookURL;?>
                              <a target="_blank" href="https://api.whatsapp.com/send?&text=<?php echo esc_html($text); ?>"><i class="fab fa-whatsapp"></i> <?php echo esc_html('Share on WhatsApp'); ?></a>
                           </li>
                           <li class='tiny-url'><a href="javascript:void(0)" data-link="<?php echo esc_attr($subvalue['metadata']['share_url']); ?>" class="link-copy"><i class="far fa-copy"></i><?php echo esc_html('Copy to clipboard'); ?></a></li>
                        </ul>
                     </div>
			</div>
			<div class="text-sec1">
			<h4 class="txth4 events-card-title"><a class="template-block-text exly-title" target="_blank" href="<?php echo esc_url($bookURL); ?>"><?php echo esc_html($subvalue['title']); ?></a></h4>
			<p class="txtp events-card-text template-price-tag"><?php echo wp_kses_data($subvalue['short_description']); ?></p>
            </div>
            <div class="btn">
            	<div class="btn-inner"> <a class="classic-primary-background-color common_wrap button exly-button" target="_blank" href="<?php echo esc_url($bookURL); ?>"><?php echo esc_html($bookASpotText); ?></a>	</div>
            </div>
	    </div>

	</section>
   <?php endif; ?>

    <?php endforeach;?>
	<?php  if($categorise_type != 4): ?>
	  </div>
	  <?php endif; ?>
	  <?php } ?>
   <?php endforeach;?>
   <?php  if($categorise_type == 4): ?>
   </div>
   <?php endif; ?>

   </div>
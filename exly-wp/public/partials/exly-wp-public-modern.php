<?php

/*
//$timezone = $this->display_time_zone_callback();
//print_r($timezone);
$currentTimeZone = get_option( 'exly_currency_timezone');
if($currentTimeZone === 'Asia/Kolkata'){
	$currencySymbol = '₹';
	$currencyName = 'INR';
}else{
	$currencySymbol = '$';
	$currencyName = 'USD';
}
*/

function isBrowser() {
    return isset($_SERVER['HTTP_USER_AGENT']);
}

function getLocalStorageItem($key) {
    return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
}

function setLocalStorageItem($key, $value) {
    setcookie($key, $value, time() + (86400 * 30), "/");
}

const TIMEZONE_LOCAL_STORAGE_KEYS = [
    'SYSTEM_TIMEZONE' => 'system_timezone'
];

if (!isBrowser()) {
    echo 'DEFAULT_TIMEZONE';
    return;
}

$cachedTimezone = getLocalStorageItem(TIMEZONE_LOCAL_STORAGE_KEYS['SYSTEM_TIMEZONE']);
if ($cachedTimezone) {
    $timezone = $cachedTimezone;
} else {
    $timezone = 'UTC';
}

//echo "Timezone: " . $timezone . "<br>";

if ($timezone == 'Asia/Calcutta') {
    $currencySymbol = '₹';
    $currencyName = 'INR';
} else {
    $currencySymbol = '$';
    $currencyName = 'USD';
}

//echo "Currency Symbol: " . $currencySymbol . "<br>";
//echo "Currency Name: " . $currencyName . "<br>";


    $isCategorized = $this->get_categorise_type();
   $activeThemeSlug = $this->$exlyTemplateName;
   $categorise_type = trim($isCategorized['categorise_type'], " ");
	$listingData = $isCategorized['skus'];
   if($categorise_type == 1 || $categorise_type == 4 || $categorise_type == 2){
   $Listingorder = $isCategorized['sku_title_map'];
  $listingData = array_merge(array_flip($Listingorder), $listingData);
  $listingData = array_filter($listingData);
   }
  $listingDatarecall = $this->fetch_theme_color_callback();
   ?>
   


   <div class="wrapper_wp_exply modern-page-background-color <?php echo esc_attr($activeThemeSlug); ?>">
   <?php  if($categorise_type == 4): ?>
   <div class="heading2">
				<h4 class="inner-heading modern-primary-text-color"><?php echo esc_html("Browse All Offerings");  ?></h4>
				<span class="arrow">
					<i class="fas fa-angle-double-right modern-page-body-text-color"></i>
				</span>

				</div>
   <div class='sec1'>
   <?php endif;?>

   <?php  if($categorise_type == 1  || $categorise_type == 2 || $categorise_type == 4): ?>

   <?php include 'exly-wp-public-modern-plans.php'; ?>

   <?php endif;?>
<?php foreach( $listingData as $key => $value): ?>
<?php if(is_array($value)){ ?>
<?php $idstring = str_replace(' ', '', $key); ?>
    <?php  if($categorise_type != 4): ?>
    <div class="heading2">
	<?php  
						   $hashID = strtolower($key);
						   $hashID = str_replace(' ', '_', $hashID);
		 
		?>
				<h4 id="<?php echo esc_html($hashID); ?>" class="inner-heading modern-primary-text-color"><?php echo esc_html($key); ?></h4>
				<span class="arrow">
					<i class="fas fa-angle-double-right modern-page-body-text-color"></i>
				</span>

				</div>
	<?php endif; ?>
   <?php  if($categorise_type == 2): ?>
   <?php $keywords =  $value['tags'];?>
	<?php $value = $value['skus']; ?>
		<?php if($keywords):?>
		<div class="keywords_list"><ul>
		<?php $totalKeywords = count($keywords); ?>
		<?php  if($totalKeywords >= 1): ?>
		 <li><a class="modern-primary-text-color active-primary-border-color" data-id="<?php echo esc_attr($idstring); ?>" data-target="allkeywords" href="javascript:void(0)"><?php echo esc_html('All'); ?></a></li>
		<?php  endif; ?>
		<?php foreach( $keywords as $keywordkey => $keywordvalue):  ?>
		<?php $totalKeywords = count($keywords); ?>
		<li><a class="modern-primary-text-color" data-id="<?php echo esc_attr($idstring); ?>" data-target="<?php echo esc_attr($keywordvalue); ?>" href="javascript:void(0)"><?php echo esc_html($keywordvalue); ?></a></li>
		<?php endforeach; ?>
		</ul></div>
		<?php endif; ?>
	<?php endif; ?>
	<?php  if($categorise_type != 4): ?>

	<div class='sec-pg3 -output-response <?php echo esc_html($idstring); ?>'>
	<?php endif; ?>
	<?php  
	if($categorise_type == 3 || $categorise_type == 5){
	$value = array_reverse($value, true);
	}
	 ?>
   <?php  foreach( $value as $subkey => $subvalue): //?>
   
	<?php ?>
   <?php if ($subvalue['is_active'] == 1) :  ?>
   <?php $uuid = $subvalue['uuid']; $bookURL = $this->generate_booking_url($uuid);
  $customField = get_option('custom_field'); // Assuming you are fetching from the options table

// Ensure $customField has a valid domain or string
if (!empty($customField)) {
    // Try parsing the domain from the custom field
        $href = "https://" . $customField . "/" . urlencode($uuid);

    

} else {
    // Fallback to booking URL if custom field is empty
    $href = $bookURL; // Assuming $booking_url is set earlier
}


    ?>
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

   <section data-link-target="<?php echo esc_url($href); ?>" class="link-to-listing first-sec3 <?php echo esc_attr($keywordlist); ?>">
		<div class="inner">
		
		
		
			<div class="upper-text">
			<?php $title = $subvalue['sku_title'] ; ?>
		<?php  if($categorise_type == 3  || $categorise_type == 4): ?>
		<?php $tyeID = $subvalue['type']; ?>
		<?php $bgcolor = $this->colorByListingType($tyeID); ?>
			<span class="upper-inner" style="background-color: <?php echo esc_attr($bgcolor); ?>;"><?php echo esc_attr($title); ?></span>
			<?php endif; ?>
			<?php if($cardContent): ?>
                <div class="sold" <?php echo esc_html($style); ?>><?php echo esc_html($content); ?></div>
				<?php endif; ?>
			</div>
			
             

		<div class="first3">
		<a target="_blank" class="exly-title" target="_blank" href="<?php echo esc_url($href); ?>">
             <?php $cover_image = $subvalue['cover_image'];
                  if($cover_image): ?>
			<img alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>" src="<?php echo esc_attr($cover_image); ?>">
			<?php else: ?>
			<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/default-thumb.jpeg'; ?>" alt="<?php echo esc_attr($subvalue['title']); ?>" title="<?php echo esc_attr($subvalue['title']); ?>">
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
			<h4 class="conth4"><a class="custom-title exly-title" target="_blank" href="<?php echo esc_url($href); ?>"><?php echo esc_attr($subvalue['title']); ?></a></h4>
    <?php if(array_key_exists('next_slot_time',$subvalue)) {if($subvalue['next_slot_time']): ?> <span class="eventDate"><?php echo esc_html(date("M d", strtotime($subvalue['next_slot_time']))); ?></span><?php endif; } ?>
		   </div>
		   <?php $price = $subvalue['currency'].' '.$subvalue['updated_price']; ?>

               
		    <p class="contp">
		   <?php if($price != $subvalue['short_description']){ 
		   
		        if($currencyName == 'USD'){ 
					 $price = $currencySymbol.' '.$subvalue['price_international'];
					 echo $price;
				 }else{

		           echo wp_kses_data($subvalue['short_description']); 
		   
				 }
		   
		   ?>
		   <?php } ?>
		   
		   <?php if($currencyName=='USD'){
			   $price = $currencySymbol.' '.$subvalue['price_international'];
			   if($subvalue['price_international'] == '0.0'){
				   $price = $subvalue['currency'].' '.$subvalue['updated_price'];
			   }
		   }else{
			   $price = $subvalue['currency'].' '.$subvalue['updated_price'];
			   
		   }
			   ?>
		   
		   
		   </p>

			<div class="last-sec">
            	<div class="slot-book">
            		
            		<button type="button" class="btn3 modern-primary-background-color"><a target="_blank" class="common_wrap button exly-button events-button-background events-button-text events-button-border" target="_blank" href="<?php echo esc_url($href); ?>"><?php echo esc_html($bookASpotText); ?></a></button>

            	</div>
            	<div class="card"><span class="modern-primary-text-color"><?php echo esc_html($price); ?></span></div>
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
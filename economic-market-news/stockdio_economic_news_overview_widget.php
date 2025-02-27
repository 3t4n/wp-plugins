<?php

class Widget_Stockdio_Market_Economic_News extends WP_Widget {
 
  public function __construct() {
      $widget_ops = array('classname' => 
		'Widget_Stockdio_Market_Economic_News', 
		'description' => 'A WordPress plugin for displaying a list of Economic & Market News, available in several languages.' );
      parent::__construct('Widget_Stockdio_Market_Economic_News', 'Economic & Market News', $widget_ops);
  }
    
  function widget($args, $instance) {
    // PART 1: Extracting the arguments + getting the values
    extract($args, EXTR_SKIP);
    $title = !isset($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
	$maxdescriptionsize= !isset($instance['maxdescriptionsize']) ? '' : $instance['maxdescriptionsize'];	
	$maxitems= !isset($instance['maxitems']) ? '' : $instance['maxitems'];	
	
	$width = !isset($instance['width']) ? '' : $instance['width'];
  $height = !isset($instance['height']) ? '' : $instance['height'];	
  
  
  $includeimage= ((isset($instance['includeimage']) AND $instance['includeimage'] == 1) OR ($instance['includeimage'] != "0"  )) ? "true" : "false";	
	$includedescription= ((isset($instance['includedescription']) AND $instance['includedescription'] == 1) OR ($instance['includedescription'] != "0" )) ? "true" : "false";
   
   $imagewidth= !isset($instance['imagewidth']) ? '' : $instance['imagewidth'];	
   $imageheight= !isset($instance['imageheight']) ? '' : $instance['imageheight'];	
   

   $language= !isset($instance['language']) ? '' : $instance['language'];	
   $country= !isset($instance['country']) ? '' : $instance['country'];	
   $countryusage= !isset($instance['countryusage']) ? '' : $instance['countryusage'];	
   $maxcountrynews= !isset($instance['maxcountrynews']) ? '' : $instance['maxcountrynews'];	

   /*
   echo '<span>$includeimage: '.$includeimage.'</span><br>';
   echo '<span>$$instance[includeimage]: '.$instance['includeimage'].'</span><br>';
   echo '<span>instance: '.implode(" ",$instance).'</span><br>';
   echo '<span>args: '.implode(" ",$args).'</span>';
   echo '<span>isSet(includeimage): '.(isset($instance['includeimage'])?"true":"false").'</span><br>';
   $test1 = (($instance['includeimage'] == "") ? "true" : "false");
   echo '<span>1: '.$test1.'</span><br>';   
   $test2 = ((isset($instance['includeimage']) AND $instance['includeimage'] == 1)?"true":"false");
   echo '<span>2: '.$test2.'</span><br>';
   $test3 = (($instance['includeimage'] == "0") ? "true" : "false");
   echo '<span>3: '.$test3.'</span><br>';   

   $test4 = (($instance['includeimage'] == 0) ? "true" : "false");
   echo '<span>4: '.$test4.'</span><br>';   
 */
   
    // Before widget code, if any
    echo (isset($before_widget)?$before_widget:'');

	//echo $output;	
	echo stockdio_economic_news_board_func( array( 
                  'language' => $language,
                  'country' => $country,
                  'countryusage' => $countryusage,
                  'maxcountrynews' => $maxcountrynews,

									'title' => $title , 
									'maxdescriptionsize' => $maxdescriptionsize,
									'maxitems' => $maxitems,
									'width' => $width, 
									'includeimage' => $includeimage,
									'height' => $height,
									'imagewidth' => $imagewidth,
									'imageheight' => $imageheight,
									'includedescription' => $includedescription
								));
   
    // After widget code, if any  
    echo (isset($after_widget)?$after_widget:'');
  }

  public function form( $instance ) {   
	  $stockdio_market_economic_news_options = get_option( 'stockdio_economic_news_board_options' );
     // PART 1: Extract the data from the instance variable
     $instance = wp_parse_args( (array) $instance, array( 

      'language' => array_key_exists('default_language',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_language']:'',
      'country' => array_key_exists('default_country',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_country']:'',
      'countryusage' => array_key_exists('default_countryUsage',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_countryUsage']:'',
      'maxcountrynews' => array_key_exists('default_maxCountryNews',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_maxCountryNews']:'',

		 'title' => array_key_exists('default_title',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_title']:'',
		 'maxdescriptionsize' => array_key_exists('default_maxDescriptionSize',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_maxDescriptionSize']:'',
		 'maxitems' => array_key_exists('default_maxItems',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_maxItems']:'',
		 'width' => array_key_exists('default_width',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_width']:'',
		 'height' => array_key_exists('default_height',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_height']:'',
		 'includeimage' => array_key_exists('default_includeImage',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_includeImage']:'',
		 'includedescription' => array_key_exists('default_includeDescription',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_includeDescription']:'',
		 'imagewidth' => array_key_exists('default_imageWidth',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_imageWidth']:'',
		 'imageheight' => array_key_exists('default_imageHeight',$stockdio_market_economic_news_options)?$stockdio_market_economic_news_options ['default_imageHeight']:'',
		 
	 ) );
	 
	 extract($instance);
   
     // PART 2-3: Display the fields
     ?>
	  
  	<!-- PART 3: Widget Language Width field START -->
	<p>
		<label for="<?php echo $this->get_field_id('language'); ?>">Language:</label>
		 <select name="<?php echo $this->get_field_name('language'); ?>" id="<?php echo $this->get_field_id('language'); ?>">		
			<option value="" <?php if ( $language== '' ) echo 'selected="selected"'; ?>>None</option> 		
      
        <option value="English" <?php if ( $language== 'English' ) echo 'selected="selected"'; ?>>English</option>
				<option value="German" <?php if ( $language== 'German' ) echo 'selected="selected"'; ?>>German</option>
				<option value="Spanish" <?php if ( $language== 'Spanish' ) echo 'selected="selected"'; ?>>Spanish</option>
				<option value="French" <?php if ( $language== 'French' ) echo 'selected="selected"'; ?>>French</option>
				<option value="Italian" <?php if ( $language== 'Italian' ) echo 'selected="selected"'; ?>>Italian</option>
				<option value="Dutch" <?php if ( $language== 'Dutch' ) echo 'selected="selected"'; ?>>Dutch</option>
				<option value="Portuguese" <?php if ( $language== 'Portuguese' ) echo 'selected="selected"'; ?>>Portuguese</option>
				<option value="Chinese" <?php if ( $language== 'Chinese' ) echo 'selected="selected"'; ?>>Chinese</option>
				<option value="Japanese" <?php if ( $language== 'Japanese' ) echo 'selected="selected"'; ?>>Japanese</option>
				<option value="Korean" <?php if ( $language== 'Korean' ) echo 'selected="selected"'; ?>>Korean</option>
				<option value="Russian" <?php if ( $language== 'Russian' ) echo 'selected="selected"'; ?>>Russian</option>
				<option value="Polish" <?php if ( $language== 'Polish' ) echo 'selected="selected"'; ?>>Polish</option>
				<option value="Turkish" <?php if ( $language== 'Turkish' ) echo 'selected="selected"'; ?>>Turkish</option>
				<option value="Swedish" <?php if ( $language== 'Swedish' ) echo 'selected="selected"'; ?>>Swedish</option>
				<option value="Norwegian" <?php if ( $language== 'Norwegian' ) echo 'selected="selected"'; ?>>Norwegian</option>
				<option value="Danish" <?php if ( $language== 'Danish' ) echo 'selected="selected"'; ?>>Danish</option>
				<option value="Greek" <?php if ( $language== 'Greek' ) echo 'selected="selected"'; ?>>Greek</option>
				<option value="Czech" <?php if ( $language== 'Czech' ) echo 'selected="selected"'; ?>>Czech</option>
				<option value="Thai" <?php if ( $language== 'Thai' ) echo 'selected="selected"'; ?>>Thai</option>
				<option value="Vietnamese" <?php if ( $language== 'Vietnamese' ) echo 'selected="selected"'; ?>>Vietnamese</option>
				<option value="Hindi" <?php if ( $language== 'Hindi' ) echo 'selected="selected"'; ?>>Hindi</option>
				<option value="Indonesian" <?php if ( $language== 'Indonesian' ) echo 'selected="selected"'; ?>>Indonesian</option>			
		 </select>
	</p>
  <!-- Widget Logo  field END -->  

    	<!-- PART 3: Widget Country Width field START -->
	<p>
		<label for="<?php echo $this->get_field_id('country'); ?>">Country:</label>
		 <select name="<?php echo $this->get_field_name('country'); ?>" id="<?php echo $this->get_field_id('country'); ?>">		
			<option value="" <?php if ( $country== '' ) echo 'selected="selected"'; ?>>None</option> 		
      
        <option value="Argentina" <?php if ( $country== 'Argentina' ) echo 'selected="selected"'; ?>>Argentina</option>
				<option value="Australia" <?php if ( $country== 'Australia' ) echo 'selected="selected"'; ?>>Australia</option>
				<option value="Austria" <?php if ( $country== 'Austria' ) echo 'selected="selected"'; ?>>Austria</option>
				<option value="Belgium" <?php if ( $country== 'Belgium' ) echo 'selected="selected"'; ?>>Belgium</option>
				<option value="Brasil" <?php if ( $country== 'Brasil' ) echo 'selected="selected"'; ?>>Brasil</option>
				<option value="Canada" <?php if ( $country== 'Canada' ) echo 'selected="selected"'; ?>>Canada</option>
				<option value="China" <?php if ( $country== 'China' ) echo 'selected="selected"'; ?>>China</option>
				<option value="Colombia" <?php if ( $country== 'Colombia' ) echo 'selected="selected"'; ?>>Colombia</option>
				<option value="CzechRepublic" <?php if ( $country== 'CzechRepublic' ) echo 'selected="selected"'; ?>>Czech Republic</option>
				<option value="Denmark" <?php if ( $country== 'Denmark' ) echo 'selected="selected"'; ?>>Denmark</option>
				<option value="France" <?php if ( $country== 'France' ) echo 'selected="selected"'; ?>>France</option>
				<option value="Germany" <?php if ( $country== 'Germany' ) echo 'selected="selected"'; ?> >Germany</option>
				<option value="Greece" <?php if ( $country== 'Greece' ) echo 'selected="selected"'; ?> >Greece</option>
				<option value="HongKong" <?php if ( $country== 'HongKong' ) echo 'selected="selected"'; ?>>Hong Kong</option>
				<option value="India" <?php if ( $country== 'India' ) echo 'selected="selected"'; ?> >India</option>
				<option value="Indonesia" <?php if ( $country== 'Indonesia' ) echo 'selected="selected"'; ?>>Indonesia</option>
				<option value="Ireland" <?php if ( $country== 'Ireland' ) echo 'selected="selected"'; ?>>Ireland</option>
				<option value="Italy" <?php if ( $country== 'Italy' ) echo 'selected="selected"'; ?>>Italy</option>
				<option value="Japan" <?php if ( $country== 'Japan' ) echo 'selected="selected"'; ?>>Japan</option>
				<option value="Mexico" <?php if ( $country== 'Mexico' ) echo 'selected="selected"'; ?>>Mexico</option>
				<option value="Netherlands" <?php if ( $country== 'Netherlands' ) echo 'selected="selected"'; ?>>Netherlands</option>
				<option value="NewZealand" <?php if ( $country== 'NewZealand' ) echo 'selected="selected"'; ?>>New Zealand</option>
				<option value="Nigeria" <?php if ( $country== 'Nigeria' ) echo 'selected="selected"'; ?>>Nigeria</option>
				<option value="Norway" <?php if ( $country== 'Norway' ) echo 'selected="selected"'; ?>>Norway</option>
				<option value="Philippines" <?php if ( $country== 'Philippines' ) echo 'selected="selected"'; ?>>Philippines</option>
				<option value="Poland" <?php if ( $country== 'Poland' ) echo 'selected="selected"'; ?> >Poland</option>
				<option value="Portugal" <?php if ( $country== 'Portugal' ) echo 'selected="selected"'; ?>>Portugal</option>
				<option value="Russia" <?php if ( $country== 'Russia' ) echo 'selected="selected"'; ?>>Russia</option>
				<option value="Singapore" <?php if ( $country== 'Singapore' ) echo 'selected="selected"'; ?>>Singapore</option>
				<option value="SouthAfrica" <?php if ( $country== 'SouthAfrica' ) echo 'selected="selected"'; ?>>South Africa</option>
				<option value="SouthKorea" <?php if ( $country== 'SouthKorea' ) echo 'selected="selected"'; ?>>South Korea</option>
				<option value="Spain" <?php if ( $country== 'Spain' ) echo 'selected="selected"'; ?> >Spain</option>
				<option value="Sweden" <?php if ( $country== 'Sweden' ) echo 'selected="selected"'; ?> >Sweden</option>
				<option value="Switzerland" <?php if ( $country== 'Switzerland' ) echo 'selected="selected"'; ?> >Switzerland</option>
				<option value="Taiwan" <?php if ( $country== 'Taiwan' ) echo 'selected="selected"'; ?> >Taiwan</option>
				<option value="Thailand" <?php if ( $country== 'Thailand' ) echo 'selected="selected"'; ?> >Thailand</option>
				<option value="Turkey" <?php if ( $country== 'Turkey' ) echo 'selected="selected"'; ?>>Turkey</option>
				<option value="UnitedKingdom" <?php if ( $country== 'UnitedKingdom' ) echo 'selected="selected"'; ?>>United Kingdom</option>
				<option value="US" <?php if ( $country== 'US' ) echo 'selected="selected"'; ?>>United States</option>
				<option value="Venezuela" <?php if ( $country== 'Venezuela' ) echo 'selected="selected"'; ?>>Venezuela</option>
				<option value="Vietnam" <?php if ( $country== 'Vietnam' ) echo 'selected="selected"'; ?>>Vietnam</option>	
		 </select>
	</p>
  <!-- Widget Logo field END -->  
  

      	<!-- PART 3: Widget countryUsage Width field START -->
	<p>
		<label for="<?php echo $this->get_field_id('countryusage'); ?>">Country Usage:</label>
		 <select name="<?php echo $this->get_field_name('countryusage'); ?>" id="<?php echo $this->get_field_id('countryusage'); ?>">				
        <option value="only" <?php if ( $country== 'only' ) echo 'selected="selected"'; ?>>Show Only Country News</option>
				<option value="combined" <?php if ( $country== 'combined' || empty($country) ) echo 'selected="selected"'; ?>>Combine Country and Market News</option>
				<option value="mixed" <?php if ( $country== 'mixed' ) echo 'selected="selected"'; ?>>Mix Country and Market News</option>		
		 </select>
	</p>
  <!-- Widget Logo field END -->  

  	 <!-- PART 3: Widget maxCountryNews field START -->
     <p>
      <label for="<?php echo $this->get_field_id('maxcountrynews'); ?>">Max Country News: </label>
        <input class="widefat" id="<?php echo $this->get_field_id('maxcountrynews'); ?>" 
               name="<?php echo $this->get_field_name('maxcountrynews'); ?>" type="text" 
               value="<?php echo esc_attr($maxcountrynews); ?>" />      
      </p>
      <!-- Widget Width field END -->
	  
	 <!-- PART 3: Widget Width field START -->
     <p>
      <label for="<?php echo $this->get_field_id('width'); ?>">Width: </label>
        <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" 
               name="<?php echo $this->get_field_name('width'); ?>" type="text" 
               value="<?php echo esc_attr($width); ?>" />      
      </p>
      <!-- Widget Width field END -->
	  
	<!-- PART 3: Widget Height field START -->
     <p>
      <label for="<?php echo $this->get_field_id('height'); ?>">Height: </label>
        <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" 
               name="<?php echo $this->get_field_name('height'); ?>" type="text" 
               value="<?php echo esc_attr($height); ?>" />      
      </p>
      <!-- Widget Height field END -->
	  
     <!-- PART 2: Widget Title field START -->
     <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" 
               name="<?php echo $this->get_field_name('title'); ?>" type="text" 
               value="<?php echo esc_attr($title); ?>" />
      
      </p>
      <!-- Widget Title field END -->
      

     <!-- PART 2: Widget Include Image field START -->
     <p>      
        <input id="<?php echo $this->get_field_id('includeimage'); ?>" 
               name="<?php echo $this->get_field_name('includeimage'); ?>" type="checkbox" 
               value="1" 
			   <?php if($includeimage) echo ' checked="checked"'; ?> />
		<label for="<?php echo $this->get_field_id('includeimage'); ?>">Include Image: </label>      
      </p>
      <!-- Widget Include Image field END -->   

	  <!-- PART 3: Widget Image Width field START -->
     <p>
      <label for="<?php echo $this->get_field_id('imagewidth'); ?>">Image Width </label>
        <input class="widefat" id="<?php echo $this->get_field_id('imagewidth'); ?>" 
               name="<?php echo $this->get_field_name('imagewidth'); ?>" type="text" 
               value="<?php echo esc_attr($imagewidth); ?>" />      
      </p>
      <!-- Widget Image Width field END -->	  
	  
	<!-- PART 3: Widget Image Height field START -->
     <p>
      <label for="<?php echo $this->get_field_id('imageheight'); ?>">Image Height: </label>
        <input class="widefat" id="<?php echo $this->get_field_id('imageheight'); ?>" 
               name="<?php echo $this->get_field_name('imageheight'); ?>" type="text" 
               value="<?php echo esc_attr($imageheight); ?>" />      
      </p>
      <!-- Widget Image Height field END -->

     <!-- PART 2: Widget Include Description field START -->
     <p>      
        <input id="<?php echo $this->get_field_id('includedescription'); ?>" 
               name="<?php echo $this->get_field_name('includedescription'); ?>" type="checkbox" 
               value="1" 
			   <?php if($includedescription) echo ' checked="checked"'; ?> />
		<label for="<?php echo $this->get_field_id('includedescription'); ?>">Include Description: </label>      
      </p>
      <!-- Widget Include Description field END -->   	  
	  
	  
	<!-- PART 3: Widget Max Description Size field START -->
     <p>
      <label for="<?php echo $this->get_field_id('maxdescriptionsize'); ?>">Max Description Size: </label>
        <input class="widefat" id="<?php echo $this->get_field_id('maxdescriptionsize'); ?>" 
               name="<?php echo $this->get_field_name('maxdescriptionsize'); ?>" type="text" 
               value="<?php echo esc_attr($maxdescriptionsize); ?>" />
      
      </p>
      <!-- Widget Max Description Size field END -->

  
	 
	 <!-- PART 3: Widget Max Items field START -->
     <p>
      <label for="<?php echo $this->get_field_id('maxitems'); ?>">Max Items: </label>
        <input class="widefat" id="<?php echo $this->get_field_id('maxitems'); ?>" 
               name="<?php echo $this->get_field_name('maxitems'); ?>" type="text" 
               value="<?php echo esc_attr($maxitems); ?>" />
      
      </p>
      <!-- Widget Max Items field END -->
	  
     <?php
   
  }
 
  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['language'] = $new_instance['language'];
    $instance['country'] = $new_instance['country'];
    $instance['countryusage'] = $new_instance['countryusage'];
    $instance['maxcountrynews'] = $new_instance['maxcountrynews'];

    $instance['title'] = $new_instance['title'];
	$instance['width'] = $new_instance['width'];
	$instance['height'] = $new_instance['height'];
  $instance['includeimage'] = (isset($new_instance['includeimage']) AND $new_instance['includeimage'] == 1) ? 1 : 0;
  //$includeimage['includeimage'] = isset( $new_instance['includeimage'] ) ? checked( (bool) $new_instance['includeimage'], 1, 0 ) : 0;
	
	$instance['maxdescriptionsize'] = $new_instance['maxdescriptionsize'];
	$instance['maxitems'] = $new_instance['maxitems'];
	
	$instance['imagewidth'] = $new_instance['imagewidth'];
	$instance['imageheight'] = $new_instance['imageheight'];
	
	$instance['includedescription'] = (isset($new_instance['includedescription']) AND $new_instance['includedescription'] == 1) ? 1 : 0;
	
	
    return $instance;
  }
  
 
}

//add_action( 'widgets_init', create_function('', 'return register_widget("Widget_Stockdio_Market_Economic_News");') );
add_action( 'widgets_init', function() {
	return register_widget("Widget_Stockdio_Market_Economic_News");
});

add_action('admin_print_styles', 'stockdio_market_economic_news_widget_admin_styles');

function stockdio_market_economic_news_widget_admin_styles() {
  ?>
  <style>
	#available-widgets-list [class*=widget_stockdio_market_economic_news] .widget-title:before{
	  content: "\61" !important;
	  font-family: "stockdio-font" !important;
	}
  </style>
  <?php
}

?>
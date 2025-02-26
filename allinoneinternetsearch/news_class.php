<?php 

/**
 * Binary App Dev
 *
 * WordPress
 */

class internet_search_display extends WP_Widget_RSS {

  function slugify($text)
    {
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    if (function_exists('iconv'))
    {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    if (empty($text))
    {
        return 'n-a';
    }

    return $text;
    }

	function internet_search_display() {
	
		$widget_ops = array( 'description' => __('Displays news related to your content and a search feature') );
		$this->WP_Widget( 'internet_search_display', __('All-in-one Internet Search'), $widget_ops);

	}

	function widget($args, $instance) {
	
		$dir = array('us'=> '',
			               "es_ar" => "es_ar/",
			               "au" => "au_au/",
			               "br" => "br_br/",
			               "ca" => "ca_ca/",
						   "cn" => "cn_cn/",
			               'es' => "es_es/",
			               "fr" => "fr_fr/",
			               'de' => 'de_de/',
			               "en_in" => "en_in/",
			     		   "en_ie" => "en_ie/",
			               "it" => "it_it/",
						   "kr" => "kr_kr/",
 			               "es_mx" => "es_mx/",
			     		   "nz" => "nz_nz/",
			               "es_pe" => "es_pe/",
			               "en_ph" => "en_ph/",
			               "ru" => "ru_ru/",
			     		   "en_sg" => "en_sg/",
			     		   "en_za" => "en_za/");

		$news = array('us'=> 'news',
			               "es_ar" => "",
			               "au" => "",
			               "br" => "",
			               "ca" => "",
						   "cn" => "",
			               'es' => "",
			               "fr" => "",
			               'de' => '',
			               "en_in" => "news",
			     		   "en_ie" => "news",
			               "it" => "",
						   "kr" => "",
 			               "es_mx" => "",
			     		   "nz" => "",
			               "es_pe" => "",
			               "en_ph" => "news",
			     		   "ru" => "",
			     		   "en_sg" => "news",
			     		   "en_za" => "news");

		global $post;

		echo $args['before_widget'];

		if ( isset($instance['error']) && $instance['error'] )
			return;

		if(!is_home()){

			$words = array();

			$post_tags = wp_get_post_tags($post->ID);
			foreach($post_tags as $tag) 
				array_push($words,$tag->name);
  
			
			if (count($post_tags)<=2){
			  $post_categories = wp_get_post_categories($post->ID);
			  foreach($post_categories as $data => $value){

				$data = get_category($value);
				array_push($words,$data->name);
			  }
			}
			} else {		
		
			$words = array();
				
			$post_categories = get_categories();
			foreach($post_categories as $data => $value){
				array_push($words,$value->name);
			}

		}
		if (!is_array($words)) {
		   $words = array($words);
		}
		?>
			<script type="text/javascript" language="javascript">

			    <?php if (empty($instance['country'])):?>
                var countryGNAW = "en_en";
			    <?php else:?>
                var countryGNAW = "<?php echo $instance['country']?>";
			    <?php endif;?>

				news_call(new Array('<?php echo implode("','",$words);?>'),'<?PHP echo $instance["number_news_per_category"]; ?>');	
			</script>	
			<!--<div class="widget">-->
            <?php
		    // echo the title, if any
		    if ( ! empty( $instance['title'] ) ) {
			 echo $args['before_title'];
			 echo esc_html( $instance['title'] );
			 echo $args['after_title'];
		    }
		    ?>		

			<link rel="search" type="application/opensearchdescription+xml" title="All-in-one Internet Search" href="https://search.aiois.com/internetsearch.xml">
			<div id='internet_search'>
			<script src="https://developers.allinoneinternetsearch.com/search.js"></script>
			<br>
			<!-- AddToAny BEGIN -->
			<a class="a2a_dd" href="https://www.addtoany.com/share_save"><img src="https://static.addtoany.com/buttons/share_save_256_24.png" width="256" height="24" border="0" alt="Share"/></a>
			<script type="text/javascript">
			var a2a_config = a2a_config || {};
			a2a_config.onclick = 1;
			a2a_config.num_services = 22;
			</script>
			<script type="text/javascript" src="https://static.addtoany.com/menu/page.js"></script>
			<!-- AddToAny END -->
			<br><br>
			<script src="https://togetherjs.com/togetherjs-min.js"></script>
			<button onclick="TogetherJS(this); return false;">Surf This Website With Friends</button>
			<?php 
			$count = 0;
			foreach ($words as $word)
			{
			?>
			<div id="element-wrapper<?php echo $count;?>">
			<ul class="element" id="element<?php echo $count; $count++;?>">
            <li><h3><a target="_blank" href="https://news.google.com/news/feeds?&q=<?php echo $dir[$instance['country']]?><?php echo $this->slugify($word);?>"><?php echo $word;?> <?php echo $news[$instance['country']];?></a></h3></li>
			<li><a target="_blank" href="https://en.wikipedia.org/wiki/Special:Search/<?php echo $dir[$instance['country']]?><?php echo $this->slugify($word);?>"><i class="icon-book"></i> <?php echo $word;?>      
			Wikipedia Articles</a></li>
			<li><a target="_blank" href="https://search.allinoneinternetsearch.com/?q=<?php echo $dir[$instance['country']]?><?php echo $this->slugify($word);?>"><i class="icon-search"></i>  
			Search All-in-one Internet Search for - <?php echo $word;?></a></li>
			<li><a target="_blank" href="https://twitter.com/search?q=<?php echo $dir[$instance['country']]?><?php echo $this->slugify($word);?>"><i class="icon-comment"></i>  
			<?php echo $word;?> Tweets</a>
            </li>
            </li>
			</ul>
			</div>
			<?php } ?>
			<br><br>
			</div>
			<!--</div>-->
		<?
	    echo $args['after_widget'];

	}

	function form($instance) {	

		$countries = array('us'=> 'U.S.',
			               "es_ar" => "Argentina",
			               "au" => "Australia",
						   "br" => "Brasil",
			               "ca" => "Canada",
						   "cn" => "China",
			               'es' => "España",
			               "fr" => "France",
			               'de' => 'Germany',
			               "en_in" => "India",
  			     		   "en_ie" => "Ireland",
			               "it" => "Italia",
						   "kr" => "Korea",
			               "es_mx" => "México",
			     		   "nz" => "New Zealand",
			               "es_pe" => "Perú",
			               "en_ph" => "Philippines",
			               "ru" => "Russia",
			     		   "en_sg" => "Singapore",
			     		   "en_za" => "South Africa");

		if (empty($instance["number_news_per_category"])) {

		    $instance["number_news_per_category"]=3;

		}
		echo '<p><label for="' . $this->get_field_id("country") .'">Choose news from:</label>';
		echo '<p><select name="'.$this->get_field_name("country").'" id="'. $this->get_field_id("country") .'">';

		foreach ($countries as $key => $value) {
		   echo "<option ";
           if ($key==$instance["country"]){
           	echo "selected";
           }
		   echo " value='$key'>$value</option>";
		}
		echo '</select></p>';

		echo '<p><label for="' . $this->get_field_id("title") .'">Title of widget (eg. News about this post) :</label>';
		echo '<input type="text" name="' . $this->get_field_name("title") . '" '; 
		echo 'id="' . $this->get_field_id("title") . '" value="' . $instance["title"] . '" size="35" /></p>';	
		echo '<p><label for="' . $this->get_field_id("number_news_per_category") .'">Number of links to display (maximum):</label>';
		echo '<input type="text" name="' . $this->get_field_name("number_news_per_category") . '" '; 
		echo 'id="' . $this->get_field_id("number_news_per_category") . '" value="' . $instance["number_news_per_category"] . '" /></p>';

	}

	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;	
		$instance['country'] = $new_instance['country'];	
		$instance['title'] = $new_instance['title'];
		$instance['number_news_per_category'] = $new_instance['number_news_per_category'];	
		return $instance;
	}
}

 ?>
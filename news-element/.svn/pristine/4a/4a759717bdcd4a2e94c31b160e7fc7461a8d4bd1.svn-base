<?php
namespace News_Element;
use Elementor\Plugin;
// Exit if accessed directly. 
if ( ! defined( 'ABSPATH' ) ) { exit; }
// Helper Class
class Khobish_Helper { 

	static function encrypt_string($input){
		$inputlen = strlen($input);
		$randkey = wp_rand(1, 9);
		$i = 0;
		while ($i < $inputlen) {
			$inputchr[$i] = (ord($input[$i]) - $randkey);
			$i++;
		}
		$encrypted = implode('.', $inputchr) . '.' . (ord($randkey) + 50);

		return $encrypted;
	}

	static function decrypt_string($input) {
		$input_count = strlen($input);
		$dec = explode('.', $input);
		$x = count($dec);
		$y = $x - 1;
		$calc = $dec[$y] - 50;
		$randkey = chr($calc);
		$i = 0;
		$real = '';
		while ($i < $y) {
			$array[$i] = $dec[$i] + $randkey;
			$real .= chr($array[$i]);
			$i++;
		};

		$input = $real;

		return $input;
	}

	static function render_html($data,$tag,$class=''){
		if($data){
			$cls = $class ? 'class="' . $class . '"' : '';
			return '<' . $tag.' '.$cls.'>' .$data . '</' . $tag. '>';
		}
	}

	static function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
		$closing_p = '</p>';
		$paragraphs = explode( $closing_p, $content );
		foreach ($paragraphs as $index => $paragraph) {
	
			if ( trim( $paragraph ) ) {
				$paragraphs[$index] .= $closing_p;
			}
	
			if ( $paragraph_id == $index + 1 ) {
				$paragraphs[$index] .= $insertion;
			}
		}
	
		return implode( '', $paragraphs );
	}


	static function generateIndex($html) {
		preg_match_all('/<h([1-6])*[^>]*>(.*?)<\/h[1-6]>/',$html,$matches);
	
		$index = "<ul>";
	
		foreach ($matches[0] as $i => $match){

			$text = strip_tags($matches[2][$i]);
			$slug = strtolower(str_replace("--","-",preg_replace('/[^\da-z]/i', '-', $text)));
			$anchor = '<a name="'.$slug.'">'.$text.'</a>';
			$html = str_replace($text,$anchor,$html);
	
			$index .= '<li><a href="#'.$slug.'">'.$text.'</a></li>';
		}
	
		$index .= "</ul>";
	
		return $index;
	}

	static function render_link($link){
		$url = isset($link['url']) ? 'href="' . esc_url($link['url']) . '"' : '';
		$ext = isset($link['is_external']) && $link['is_external'] ? ' target= "_blank" ' : '';
		$nofollow = isset($link['nofollow']) && $link['nofollow'] ? ' rel= "nofollow" ' : '';
		$link = $url . $ext . $nofollow;
		return $link;
    }

	static function menu_item_class($menu)
	{
		$icon = $menu['icon'];
		$menu_location = isset($menu['menu_register']) && $menu['menu_register'] ? $menu['menu_register'] : '';
		$sub_type = isset($menu['sub_type']) && $menu['sub_type'] ? $menu['sub_type'] : '';
		$sub_menu = isset($menu['sub_menu']) && $menu['sub_menu'] ? $menu['sub_menu'] : '';
		$menu_item_class = [
			'menu-item',
			'menu-item-type-custom',
			'elementor-repeater-item-' . $menu['_id']
		];
	
		if ('yes' === $menu['has_sub']) {
			if ('no' !== $sub_menu && 'mega' === $sub_type) {
				array_push($menu_item_class, 'menu-item-has-children', 'tp_mega_menu');
				array_push($menu_item_class, $menu['pos']);
			}
			if ($menu_location ) {
				array_push($menu_item_class, 'menu-item-has-children', 'nocls');
			}
			if (!empty($icon['value'])) {
				array_push($menu_item_class, 'menu-item-has-icon');
			}
		}
	
		$classes = implode(' ', $menu_item_class);
	
		return $classes;
	}
	
	static function sub_menu_default($menu_id)
	{
		$args = [
			'menu' => $menu_id,
			'menu_id' => '',
			'menu_class' => 'sub-menu',
			'container' => '',
		];
	
		wp_nav_menu($args);
	}
	
	static function rendor_custom_nav_menu($setting_menu,$accordion='')
	{	
		$accordion_menu = $accordion ? 'accordion' : 'default';
		?>
		<ul class="tp-menu-wrap ne-d-flex <?php echo $accordion_menu;?>">
	
			<?php foreach ($setting_menu as $menu) {

			$sub_id = (int) isset($menu['sub_menu']) && $menu['sub_menu'] ? $menu['sub_menu'] : '';
			$sub_type = isset($menu['sub_type']) && $menu['sub_type'] ? $menu['sub_type'] : '';
			$menu_location = isset($menu['menu_register']) && $menu['menu_register'] ? $menu['menu_register'] : '';
			$badge = $menu['pre'] ? '<span class="menu-badge">'.$menu['pre'].'</span>' : '';
			$text = $menu['item_text'] ? '<span class="menu-text">'.$menu['item_text'].'</span>' : '';
			$id = isset($menu['ajax']) && $menu['ajax'] ? 'data-id="'.$sub_id.'"' : '';
			$content = isset($menu['ajax']) && $menu['ajax'] ? '' : Plugin::instance()->frontend->get_builder_content_for_display($sub_id);
			$menuicon = self::display_iconfont($menu['icon'],'menu-item-icon');
			$arrow = $menu['has_sub'] ? '<i aria-hidden="true" class="drop-icon bivo bi-chevron-up"></i>' : '';
			$classes = self::menu_item_class($menu); ?>
				<li class="<?php echo esc_attr($classes); ?>">
	 
					<a class="ne-d-flex ne-v-center icon-gap" href="<?php echo esc_url($menu['link']['url']); ?>">
					
						<?php echo $menuicon; ?>
	
						<span class="menu-item-text ne-d-inflex ne-v-center icon-gap">
							<?php echo $text.$badge; ?>
						</span>
						<?php echo $arrow;?>
					</a> 
					
					<?php
					if ($menu['has_sub'] && 'mega' === $sub_type && 'no' !== $menu['sub_menu']) :
						echo '<div '.$id.' class="ne-megamenu-content-wrapper">'.$content.'</div>'; elseif ($menu['has_sub'] && $menu_location) :
						self::sub_menu_default($menu_location);
	
			endif; ?>
				</li>
				<?php
		} ?>
		</ul>
		<?php
	}

	static function render_nav_menu($menu){
		$args = [
			'echo' => false,
			'menu' => $menu,
			//TODO:fix this later on
			//'walker' => new \The_Pack_Nav_Walker(),
			'items_wrap' => '<ul class="tp-menu-wrap">%3$s</ul>'
		];

		if ($menu) {
			echo wp_nav_menu($args);
		}
	}

	static function swiper_markup_helper($settings){

        $slider_options = [
            'item' => $settings['item']['size'],
            'item_tab' => $settings['item_tab']['size'],
			'item_mob' => $settings['item_mob']['size'],
            'speed' => $settings['speed']['size'],
            'space' => $settings['space']['size'],
            'center' => ('yes' === $settings['centermode']),
            'mouse' => ('yes' === $settings['mouse']),
            'auto' => ('yes' === $settings['auto']),
            'cover' => ('yes' === $settings['cover']),
        ];  
        
        $previkn = $settings['previkn'] ? '<div class="khbprnx khbnxt"><i class="' . $settings['previkn']['value'] . '"></i></div>' : '';
        $nextikn = $settings['nextikn'] ? '<div class="khbprnx khbprev"><i class="' . $settings['nextikn']['value'] . '"></i></div>' : '';
        
        $arrow = $settings['arrow'] ? '<div class="tp-arrow">'.$previkn.$nextikn.'</div>' : '';
        $dot = $settings['dot'] ? '<div class="swiper-pagination"></div>' : '';

        $out = [
            'nav'=> $dot.$arrow,
            'settings' => $slider_options,
        ];
        return $out;

    }
	
	static function thepaack_drop_taxolist() {

		$args     = array(
			'public'   => true,
			'_builtin' => false
		);
		$output   = 'names';
		$operator = 'or';
		$taxonomies = get_taxonomies( $args, $output, $operator );
		return $taxonomies;
	}

	static function display_iconfont($option, $class = ''){
		ob_start();
		\Elementor\Icons_Manager::render_icon($option, ['class' => $class,'aria-hidden' => 'true']);
		$out =  ob_get_clean();
		return $out;	
	}	
	static function is_last_post($query){
		if (($query->current_post +1) == ($query->post_count)) {
			return 'last-post';
		}
	}
	static function query_arg($settings){

		$cat = explode(',' , self::king_buildermeta_to_string($settings['terms']));
		$query_args = array(
			'post_type' 			=> $settings['post_type'],
			'posts_per_page' 		=> $settings['post_perpage']['size'],
			'post_status' 			=> 'publish',             
	        'tax_query' => array(
	            array(
	                'taxonomy' => $settings['taxonomy'],
	                'field' => 'term_id',
	                'terms' => $cat,
	            ) , 
	        ) ,			
		);
		$query_args['order'] = isset($settings['order']) ? $settings['order'] : '';
		$query_args['orderby'] = isset($settings['orderby']) ? $settings['orderby'] : '';
		$query_args['offset'] = isset($settings['offset']) ? $settings['offset']['size'] : '';
		return $query_args;
	}

	static function hero_slide_query($settings,$prefix){

		$query_type = $settings[$prefix.'_'.'query_type'];
		$cat = explode(',' , self::king_buildermeta_to_string($settings[$prefix.'_'.'terms']));
		$query_args = array(
			'post_type' => $settings[$prefix.'_'.'post_type'],
			'posts_per_page' => $settings['post_perpage']['size'],
			'post_status' => 'publish',             		
		);
		if ($query_type == 'individual'){
			$id = explode(',' ,$settings[$prefix.'_'.'ids']);
			$query_args['post__in'] = $id;
			$query_args['orderby'] = 'post__in';
		} else {
			$query_args['tax_query'] = [
				[
	                'taxonomy' => $settings[$prefix.'_'.'taxonomy'],
	                'field' => 'term_id',
	                'terms' => $cat,					
				]
			];
		}

		$query_args['order'] = isset($settings['order']) ? $settings['order'] : '';
		$query_args['orderby'] = isset($settings['orderby']) ? $settings['orderby'] : '';
		$query_args['offset'] = isset($settings['offset']) ? $settings['offset']['size'] : '';
		return $query_args;
	}


	static function filter_nav_label ($settings,$split=''){
        $filters = [
            'label' => $settings['hlabel'],
            'more' => $settings['hmore'],
            'all' => $settings['hall'],
            'style' => $split,
        ];
		return  $filters;
	}

	static function filter_options ($template,$settings){

		$metaf = self::king_buildermeta_to_string($settings['metaf']);
		$options = [
			'template' => $template,
		    'per_page' => $settings['post_perpage']['size'],            
		    'pagi_type' => $settings['pagination'],
			'post_type' => $settings['post_type'],
			'taxonomy' => $settings['taxonomy'],
		    'metaf' => $metaf,
		    'excerptf' => $settings['excerptf']['size'],
		];	
		$options['imgf'] = isset($settings['imgf']) ? $settings['imgf'] : '';
		$options['order'] = isset($settings['order']) ? $settings['order'] : '';
		$options['orderby'] = isset($settings['orderby']) ? $settings['orderby'] : '';
		$options['offset'] = isset($settings['offset']) ? $settings['offset']['size'] : '';
		$options['break'] = isset($settings['break']) ? $settings['break']['size'] : '';
		$options['metar'] = isset($settings['metar']) ? self::king_buildermeta_to_string($settings['metar']) : '';
		$options['metas'] = isset($settings['metas']) ? self::king_buildermeta_to_string($settings['metas']) : '';
		$options['excerptr'] = isset($settings['excerptr']) ? $settings['excerptr']['size'] : '';
		$options['excerpts'] = isset($settings['excerpts']) ? $settings['excerpts']['size'] : '';
		$options['imgr'] = isset($settings['imgr']) ? $settings['imgr'] : '';
		$options['imgs'] = isset($settings['imgs']) ? $settings['imgs'] : '';
		$options['post_format'] = isset($settings['post_format']) ? $settings['post_format'] : '';
		$options['column'] = isset($settings['column']) ?  $settings['column']['size'] : '';						
		return $options;

	}

	static function thepack_get_builder_image($url,$class){
	    if ($url){
	        return '<a class="tbsite-logo '.$class.'" href="'.esc_url( home_url( '/' )).'"><img class="'.$class.'" src="'. esc_url( $url).'" alt="'.get_bloginfo( 'name' ).'"></a>';
	    }

	}

	static function thepack_process_ads($img,$link){
	    if ($img){
            $url = $link['url'];
            $ext = $link['is_external'];
            $nofollow = $link['nofollow'];
            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;
            $img = wp_get_attachment_image($img,'full');
	        return '<a class="khbads" '.$link.'">'.$img.'</a>';
	    }

	}

	static function thepack_drop_cat() {

		foreach ( get_taxonomies() as $item ) {
			$comma_string[] = $item;
		}
		$args           = [
			'taxonomy' => $comma_string,
		];
		$categories_obj = get_categories( $args );
		$categories     = [];
	
		foreach ( $categories_obj as $pn_cat ) {
			$categories[ $pn_cat->cat_ID ] = $pn_cat->cat_name . '-' . $pn_cat->taxonomy;
		}
	
		return $categories;
	} 

	//TODO: Remove this function
	static function ae_drop_cat($tax) {

	        $categories_obj = get_categories('taxonomy='.$tax.'');
	        $categories = array();

	        foreach ($categories_obj as $pn_cat) {
	            $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
	        }
	        return $categories;         
	} 
	static function post_type(){
        $post_types = get_post_types(
            ['public' => true, 'show_in_nav_menus' => true],
            'objects'
        );
        $post_types = wp_list_pluck($post_types, 'label', 'name');
        return array_diff_key($post_types, ['elementor_library', 'attachment']);
	}

	/*Meta Fields*/
	static function khobish_order_by(){
	    return array(
	        'none' => esc_html__('None', 'news-element') ,
	        'ID' => esc_html__('ID', 'news-element') ,
	        'author' => esc_html__('Author', 'news-element') ,
	        'title' => esc_html__('Title', 'news-element') ,
	        'name' => esc_html__('Name', 'news-element') ,
	        'parent' => esc_html__('Parent', 'news-element') ,
	        'rand' => esc_html__('Rand', 'news-element') ,
	        'title' => esc_html__('Title', 'news-element') ,
	        'date' => esc_html__('Date', 'news-element') ,
	        'modified' => esc_html__('Modified', 'news-element') ,
	    );  
	}

	static function ae_drop_user() {

		    $args = array(
		        //'role' => ['administrator']
		    );
	        $users = get_users($args);
	        $categories = array();

	        foreach ($users as $pn_cat) {
	            $categories[$pn_cat->data->ID] = $pn_cat->data->display_name;
	        }
	        return $categories;         
	}


	static function khobish_human_size_byte($bytes,$base ='1024') {
	    
	    if ($bytes =='0'){
	        return 0;
	    } else {

	    $i = floor(log($bytes) / log($base));
	        if ($base =='1024'){
	            $sizes = array('B', 'KB', 'MB', 'GB', 'TB');
	        } else {
	            $sizes = array('', 'K', 'M', 'G', 'T');
	        }

	        return sprintf('%.02F', $bytes / pow($base, $i)) * 1 . ' ' . $sizes[$i];

	    }
	}


	static function khobish_all_terms() {

		$args = array(
		  'public'   => true,
		  '_builtin' => false  
		); 
		$output = 'names'; // or objects 
		$operator = 'or'; // 'and' or 'or'

		$taxonomies = get_taxonomies( $args, $output, $operator ); 
		$array = array_diff($taxonomies, ["elementor_library_type", "elementor_library_category"]);
		$categories_obj = get_terms( array(
		    'taxonomy' => $array,
		    'hide_empty' => true,
		) ); 

        $categories = array();

        foreach ($categories_obj as $pn_cat) {
            $categories[$pn_cat->term_id] = $pn_cat->name;
        }
        return $categories;         
	}

	static function khobish_tax_drop(){

		$args = array(
		  'public'   => true,
		  '_builtin' => false  
		); 
		$output = 'names'; // or objects
		$operator = 'or'; // 'and' or 'or'

		$taxonomies = get_taxonomies( $args, $output, $operator ); 
		return $taxonomies;
	} 
 
	static function thepack_drop_menu_select() {
	    $menus = wp_get_nav_menus();
	    $items = array();
	    $i     = 0;
	    foreach ( $menus as $menu ) {
	        if ( $i == 0 ) {
	            $default = $menu->slug;
	            $i ++;
	        }
	        $items[ $menu->slug ] = $menu->name;
	    }

	    return $items;
	}


	static function khobish_menulocations() {
	    $menus = get_registered_nav_menus();
	    $items = array();
	    foreach ( $menus as $menu => $value ) {

	        $items[ $menu ] = $value;
	    }

	    return $items;
	}

	function khobish_get_builder_image($url,$class){
	    if ($url){
	        return '<a class="tbsite-logo '.$class.'" href="'.esc_url( home_url( '/' )).'"><img class="'.$class.'" src="'. esc_url( $url).'" alt="'.get_bloginfo( 'name' ).'"></a>';
	    }

	}

	function khobish_process_ads($img,$link){
	    if ($img){

            $url = $link['url'];
            $ext = $link['is_external'];
            $nofollow = $link['nofollow'];

            $url = ( isset($url) && $url ) ? 'href='.esc_url($url). '' : '';
            $ext = ( isset($ext) && $ext ) ? 'target= _blank' : '';
            $nofollow = ( isset($url) && $url ) ? 'rel=nofollow' : '';
            $link = $url.' '.$ext.' '.$nofollow;
            $img = self::madmag_lazy_img($img,'full');
	        return '<a class="khbads" '.$link.'">'.$img.'</a>';
	    }

	}

    static function khobish_drop_posts($post_type){
        $args = array(
          'numberposts' => -1,
          'post_type'   => $post_type
        );

        $posts = get_posts( $args );        
        $list = array();
        foreach ($posts as $cpost){
            $list[$cpost->ID] = $cpost->post_title;
        }
        return $list;
    }


    static function khobish_tax_image($cat,$size){

    	$taximg = '';
    	if (!$taximg){
    		return;
    	}

	    $placeholder =  plugins_url( '../assets/lazyload.svg', __FILE__ );
	    //$out='<img class="featured-img lazyload" src= "'.$placeholder.'" width= "'.$attachment_data['width'].'" height="'.$attachment_data['height'].'" data-src="'.$img[0].'" alt="'.$alt.'"/>';

	    //return $out;

    }


	//TODO: remove this function
	static function post_format(){
	    return array(
	        'video' => esc_html__('Video', 'news-element') ,
	        'audio' => esc_html__('Audio', 'news-element') ,
	        'gallery' => esc_html__('Gallery', 'news-element') ,
	        'image' => esc_html__('Image', 'news-element') ,
	    );  
	}

	/*Meta Fields*/  
	static function magnews_meta_fields(){
	    return array(
	        'tag' => esc_html__('Tag', 'news-element') ,
	        'cat' => esc_html__('Category', 'news-element') ,
	        'cat_bg' => esc_html__('Category background color', 'news-element') ,
	        'title' => esc_html__('Post title & permalink', 'news-element') ,
	        'title_nolink' => esc_html__('Post title no permalink', 'news-element') ,
	        'title_single' => esc_html__('Single post title', 'news-element') ,
	        'time' => esc_html__('Date', 'news-element') ,
	        'full_share' => esc_html__('Full share', 'news-element') ,
	        'circular_share' => esc_html__('Circular share', 'news-element') ,
	        'reading' => esc_html__('Reading time', 'news-element') ,
	        'single_teaser' => esc_html__('Single post teaser', 'news-element') ,
	        'view' => esc_html__('Post views', 'news-element') ,
	        'excerpt' => esc_html__('Excerpt', 'news-element') ,
	        'space' => esc_html__('Space with separator', 'news-element') ,
	        'dot_separator' => esc_html__('Dot separator', 'news-element') ,
	        'vert_separator' => esc_html__('Vertical separator', 'news-element') ,
	        'h5' => esc_html__('Clear with 5px height', 'news-element') ,
	        'h10' => esc_html__('Clear with 10px height', 'news-element') ,        
	        'clear' => esc_html__('Clear section', 'news-element') ,
	        'space_blank' => esc_html__('Space', 'news-element') ,
	        'btn' => esc_html__('Read more Button', 'news-element') ,
	        'bottom_personal' => esc_html__('Meta Persoanal', 'news-element') ,
	        'author' => esc_html__('Author', 'news-element') ,
	        'author_img' => esc_html__('Author Image', 'news-element') ,
	        'comment' => esc_html__('Comment No', 'news-element') ,
	        'all_time' => esc_html__('All time', 'news-element') ,
	        '30_day' => esc_html__('30 days', 'news-element') ,
	        '7_day' => esc_html__('7 days', 'news-element') ,
	        '1_day' => esc_html__('1 days', 'news-element') ,
	    );  
	}

	static function fw_grid_col($column_size = 3) {

	    $style_class = 'fw-col-md-3';

	    $column_styles = array(
	        1 => 'fw-col-md-12',
	        2 => 'fw-col-md-6',
	        3 => 'fw-col-md-4',
	        4 => 'fw-col-md-3',
	        5 => 'fw-col-md-15',
	    );  

	    if (array_key_exists($column_size, $column_styles) && !empty($column_styles[$column_size])) {
	        $style_class = $column_styles[$column_size];
	    }
	    
	    return $style_class;
	}

	static function counter($perpage,$paged,$count){
		$paged = $paged ? $paged :'1';
		$out =  ( $perpage * ( $paged - 1 ) ) + $count;
		echo '<span class="counter">'.sprintf("%02d", $out).'</span>';
	}

	static function bg_img_position() {
 
		  $addsizes = array(
			  'inherit'=> 'Inherit',
			  "left top" => 'Left top',
			  "left center" => 'Left center',
			  'left bottom'=> 'Left bottom',
			  'right top'=> 'Right top',
			  'left bottom'=> 'Left bottom',
			  'right center'=> 'Right center',
			  'right bottom'=> 'Right bottom',
			  'center top'=> 'Center top',
			  'center center'=> 'Center center',
			  'center bottom'=> 'Center bottom',
		  );
  
		return $addsizes;
	  }

	static function ae_image_size_choose() {
	  $image_sizes = get_intermediate_image_sizes(); 

	    $addsizes = array(
	        "full" => 'Full size'
	    );
	    $newsizes = array_merge($image_sizes, $addsizes);

	  return array_combine($newsizes, $newsizes);
	}

	static function xl_post_format_icon(){

	        global $post;
	        $post_id = $post->ID;
	        $format  = get_post_format( $post_id );
	        switch ($format) {      
	            case "video":
	                return "format-video";   
	                break;

	            case "audio":
	                return "format-audio"; 
	                break;

	            case "gallery":
	                return "format-gallery"; 
	                break;

	            case "image":
	                return "format-image"; 
	                break;

	                default:
	                
	        }
	} 
	//TODO: remove function
	static function madmag_lazy_img($id,$size){
 		if (!$id){
 			return;
 		}
		if(is_bool(wp_get_attachment_image_src($id))){
			//its post id
			$id = get_post_thumbnail_id($id);
		} else {
			// its attachment id
			$id = $id;
		}
	    $alt = get_the_title($id); 
	    $attachment_data= wp_prepare_attachment_for_js($id);
	    $src = wp_get_attachment_image_src( $id,$size);
	    $placeholder =  plugins_url( '../assets/lazyload.svg', __FILE__ );

	    $out = '<img class="featured-img lazyload" src= "'.$placeholder.'" width= "'.$attachment_data['width'].'" height="'.$attachment_data['height'].'" data-src="'.$src['0'].'" alt="'.$alt.'"/>';

	    return $out; 
	}

	static function ae_bg_images($id,$size){

		if (!$id){
			return;
		}
	   if(is_bool(wp_get_attachment_image_src($id))){
		   //its post id
		   $id = get_post_thumbnail_id($id);
	   } else {
		   // its attachment id
		   $id = $id;
	   }

	    $featured_image = wp_get_attachment_image_src( $id,$size);
	    if ( !$featured_image) {
	        return ;
	    };  
	    $image_url =  $featured_image[0];
	    $lazy='data-bg='.$image_url.'';   

	    return $lazy;
	}

	static function madmag_bg_images($thumbnail,$id=''){
   
		if($id){
			$post_id = $id;
		} else {
			global $post;
			$post_id = $post->ID;
		}
	    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post_id),$thumbnail);
	    if ( !$featured_image) {
	        return ;
	    };  
	    $image_url =  $featured_image[0];
	    $lazy='data-bg='.$image_url.'';

	    $bg_image = 'background-image:url('.$image_url.');';    
	    $out = ($image_url) ? 'style='.$bg_image.'' : '';    

	    return $out;
	    
	}

	static function king_buildermeta_to_string($items) {
	    if (!is_array($items) || empty($items)){
	        return;
	    }
	     foreach( $items as $item ){
	        $metaf[] =$item['meta'];
	      }
	      return implode(',' , $metaf);
	}

	static function khobish_posted_on() {
	    
	    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	    $time_string = sprintf( $time_string,
	        esc_attr( get_the_date( 'c' ) ),
	        esc_html( get_the_date() )
	    );

	    $posted_on = sprintf(
	        _x( '%s', 'post date', 'news-element' ),
	         $time_string
	    );

	    return '<span class="magnews-posted-on leffect-1"><span class="bivo bi-calendar3" aria-hidden="true"></span>'.$posted_on.'</span> ';
	}  


	static function fashmag_social_post_share(){

	    if( has_post_thumbnail() ){
	        $share_image = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
	        $share_image= $share_image[0];
	        $share_image_portrait= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
	        $share_image_portrait= $share_image_portrait[0];
	    }else{
	        $share_image= '';
	        $share_image_portrait= '';
	    }
	    $share_excerpt = strip_tags( get_the_excerpt(), '<b><i><strong><a>' );
	    $html = '<div class="xld_sharelist">
	        <a href="http://www.facebook.com/sharer.php?u='.rawurlencode( get_the_permalink() ).'" ><i class="ti-facebook"></i></a>
	        <a href="http://twitter.com/intent/tweet?text='.rawurlencode( get_the_title() ) .'&amp;url='.rawurlencode( get_the_permalink() ).'"><i class="ti-twitter-alt"></i></a>
	        <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.rawurlencode( get_the_permalink() ).'&amp;title='.rawurlencode( get_the_title() ).'&amp;summary='.rawurlencode ( $share_excerpt ).'&amp;source='.rawurlencode( get_bloginfo('name') ).'"><i class="ti-linkedin"></i></a>
	        <a href="http://pinterest.com/pin/create/button/?url='.rawurlencode( get_the_permalink() ).'&amp;media='.rawurlencode( $share_image_portrait ).'&amp;description='.rawurlencode( get_the_title() ).'"><i class="ti-pinterest"></i></a>
	        
	    </div>';
	    return $html;
	} 
 	
 	static function fashmag_expand_share(){

		if( has_post_thumbnail() ){
		    $share_image = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
		    $share_image= $share_image[0];
		    $share_image_portrait= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
		    $share_image_portrait= $share_image_portrait[0];
		}else{
		    $share_image= '';
		    $share_image_portrait= '';
		}
		$share_excerpt = strip_tags( get_the_excerpt(), '<b><i><strong><a>' );

		$out = '

		<div class="xld_share_post flathym">
		    <div class="xld_postshare">
		        <a href="http://www.facebook.com/sharer.php?u='.rawurlencode( get_the_permalink() ).'" class="xld_btn-facebook expanded"><i class="fab fa-facebook"></i><span>Facebook</a>
		        <a href="http://twitter.com/intent/tweet?text='.rawurlencode( get_the_title() ).'&amp;url='.rawurlencode( get_the_permalink() ).'" class="xld_btn-twitter expanded"><i class="fab fa-twitter"></i><span>Twitter</span></a>
		        <div class="share-secondary">
		            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.rawurlencode( get_the_permalink() ).'&amp;title='.rawurlencode( get_the_title() ).'&amp;summary='.rawurlencode ( $share_excerpt ).'&amp;source='.rawurlencode( get_bloginfo('name') ).'" class="xld_btn-linkedin"><i class="fab fa-linkedin"></i></a>
		            <a href="http://pinterest.com/pin/create/button/?url='.rawurlencode( get_the_permalink() ).'&amp;media='.rawurlencode( $share_image_portrait ).'&amp;description='.rawurlencode( get_the_title() ).'" class="xld_btn-pinterest "><i class="fab fa-pinterest-p"></i></a>
		        </div> <a href="#" class="xld_btn-toggle"><i class="fab fa-share"></i></a> </div>
		</div>

		';
		return $out;

 	}

	static function full_share_posts(){

		$share = self::fashmag_expand_share();
	    $view = self::all_time_view();
		return'<div class="khobish-fullshare"><div class="khbshare"><a href="javascript:void(0);" class="khb-view">'.$view.'</a>'.$share.'</div></div>';
	}

	static function circular_share_posts(){

		$share = self::fashmag_social_post_share();
		return'<div class="khobish-circularshare"><div class="khbshare">'.$share.'</div></div>';
	}

	static function fashmag_comment(){
	    if ( ! post_password_required() ) {
	        
	        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

	        if ( comments_open() ) {
	            if ( $num_comments == 0 ) {
	                $comments = __('0', 'news-element');
	            } elseif ( $num_comments > 1 ) {
	                $comments = $num_comments . __('Comments', 'news-element');
	            } else {
	                $comments = __('1','news-element');
	            }
	            $write_comments = '<a href="'.get_comments_link().'">'.$comments.'</a>';
	            
	        } else {
	            $write_comments =  __('off', 'news-element');
	        }
	        return '<span class="post-comment leffect-1"><i class="ti-comment" aria-hidden="true"></i> '.$write_comments.'</span>';
	    }   
	}

	static function khobish_author(){

	        return'<span class="post-meta-author leffect-1">
	            <span class="meta-author-name"><span class="bivo bi-person-check" aria-hidden="true"></span> '.get_the_author_posts_link().'</span>
	        </span>';
	}
	static function khobish_author_img(){

	        return'<span class="post-info-author">
	            '.get_avatar( get_the_author_meta( 'ID' ), 50 ).'<span class="inner-info-author leffect-1">'.get_the_author_posts_link().'</span>
	        </span>';
	}

	static function khobish_post_title(){
	        global $post;
	        $id = $post->ID;
	        $fletter = get_the_title($id)[0]; 
	        return'<h2 class="entry_title" data-first="'.$fletter.'"><a title="'.get_the_title($id).'" href="'.get_the_permalink($id).'">'.get_the_title($id).'</a></h2>';
	}

	static function ae_readmore_btn(){
	        global $post;
	        $id = $post->ID;
	        return'<a class="btn-more" href="'.get_the_permalink($id).'">'.esc_html__('Read More','news-element').'</a>'; 
	}

	static function fashmag_pmeta_btm() {
	        $author = self::khobish_author_img();
	        $comment = self::fashmag_comment();
	        $share = self::fashmag_social_post_share();
	        return'<div class="khobish-persobal-meta"><div class="khbauthor">'.$author.'</div><div class="khbshare">'.$share.'</div><div class="khbdate">'.$comment.'</div></div>';
	}

	static function khobish_post_title_nolink(){
	        global $post;
	        $id= $post->ID;
	        $fletter = get_the_title($id)[0]; 
	        return '<h3 class="entry_title" data-first="'.$fletter.'"><a class="no-link" title="'.get_the_title($id).'" href="'.get_the_permalink($id).'">'.get_the_title($id).'</a></h3>';
	}

	static function ae_post_view(){
	        global $post;
	        $id= $post->ID;

	        $view = get_post_meta( $id, 'post_view', true );
	        $views = ( empty( $view ) ) ? 0 : $view;    
	        

	        $out='<span class="postview leffect-1"><span class="view-count">'.$views.' Views</span></span>';


	    return $out;
	}

	/*Space*/

	static function ae_post_spacer(){
	    $out='<span class="meta-space-height" style=" width:5px;display:inline-block;"></span>';
	    return $out;
	}

	/*Space*/

	static function fashmag_space_meta(){
	    $out='<span class="meta-space leffect-1">-</span>';
	    return $out;
	}

	static function khobish_dot_separator(){
	    $out='<span class="meta-space leffect-1">•</span>';
	    return $out;
	}

	static function khobish_vert_separator(){
	    $out='<span class="meta-space leffect-1">|</span>';
	    return $out;
	}

	static function ae_clearifix(){
	    $out='<div class="meta-clearing"></div>';
	    return $out;
	}
	static function ae_clearifix_h5(){
	    $out='<div class="meta-clearing height5"></div>';
	    return $out;
	}

	static function ae_clearifix_h10(){
	    $out='<div class="meta-clearing height10"></div>';
	    return $out;
	}
	/**
	 * Display category background based on theme options 
	 */
	 
	static function termdata($id,$key,$value){
		$out = '';
		$term_data = get_term_meta( $id,$key);
		foreach ($term_data as $item) {
			$out = $item[$value];
		}
		return $out;
	}

    static function khobish_single_category_bg($default = true) {
                        
        if ( 'post' == get_post_type() ) {
            $categories = get_the_category();
            $separator = ' '; 
             
            $output = '';
            if($categories){
                foreach($categories as $category) {
					$term_data = self::termdata($category->term_id,'newselement','color');
                    $style = $term_data ? 'style=background:'.$term_data.'' : '';
                    $output .= '<a class="cat-bg" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
                }
            $cat= trim($output, $separator);
            return '<span class="catbg-wrap">'.$cat.'</span>';
            }
        }

	}

    static function khb_return_cat_color($default = true) {
                        
        if ( 'post' == get_post_type() ) {
            $categories = get_the_category();
            $separator = ' '; 
             
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    $term_data = get_term_meta( $category->term_id);
                    $output = $term_data["color"][0];
                }
            
            return $output;
            }
        }

	}

	/**
	 * Estimate time required to read the article
	 *
	 * @return string
	 */
	static function fashmag_reading_time() {

	    $word_count = floor( str_word_count( get_the_content() ) / 120 );
	    if ($word_count >= 1){

	        $out = sprintf( _n( '%d min', '%d min', $word_count, 'news-element' ), $word_count );
	        return '<span class="reading-time leffect-1"><i aria-hidden="true" class="bivo bi-stopwatch"></i> '.$out.'</span>';

	    }
	    

	}

	/**
	 * Display category based on theme options 
	 */
	

    static function khobish_single_category($default = true) {

        if ( 'post' == get_post_type() ) {
            $categories = get_the_category();
            if($default==true){
                $separator = ' ';
            }else {
                $separator = ' ,';              
            }
            
            $output = '';
            if($categories){
                foreach($categories as $category) {

                    $output .= '<a class="bgcat-links" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;

                }
            $cat= trim($output, $separator);
            return '<span class="post-cat leffect-1">'.$cat.'</span>';
            }
        }

	}


	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	static function khobish_post_tag() {
	    
	    if ( 'post' == get_post_type() ) {
	        
	    $posttags = get_the_tags();
	    $separator = ' , ';
	    $output = '';
		    if ($posttags) {

		        foreach($posttags as $tag) {
		            $output .='<span><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></span>'.$separator; 
		        }

		        $tags= trim($output, $separator);
		        return '<span class="tags-links leffect-1">tag'.$tags.'</span>';
		    }
	    }
	}

	static function all_time_view(){

	    global $wpdb;
	    global $post;
	    $id = $post->ID;

	    $sql = "
	        SELECT
	            *
	        FROM
	            {$wpdb->prefix}most_popular
	        WHERE
	            post_id = {$id}
	    ";

	    $result = $wpdb->get_row($sql, 'ARRAY_A');	 

	    if (is_array($result)){

	    	return '<span class="post-view leffect-1"><i class="la la-fire" aria-hidden="true"></i>'.$result['all_time_stats'].' <span>views</span></span>';
	    }

	}
	
	static function monthly_time_view(){

	    global $wpdb;
	    global $post;
	    $id = $post->ID;

	    $sql = "
	        SELECT
	            *
	        FROM
	            {$wpdb->prefix}most_popular
	        WHERE
	            post_id = {$id}
	    ";

	    $result = $wpdb->get_row($sql, 'ARRAY_A');	 

	    if (is_array($result)){
	    	return '<span class="post-view leffect-1"><i class="la la-fire" aria-hidden="true"></i>'.$result['30_day_stats'].' views</span>';
	    }

	}


	static function square_dates(){
		$out = '
			<div class="khbsqdate">			        
			        <span class="day">'.get_the_date('d').'</span>
			        <span class="month">'.get_the_date('M').'</span> 
			        <span class="year">'.get_the_date('Y').'</span> 
			</div>
		';
	    return $out;

	}


	static function weekly_time_view(){

	    global $wpdb;
	    global $post;
	    $id = $post->ID;

	    $sql = "
	        SELECT
	            *
	        FROM
	            {$wpdb->prefix}most_popular
	        WHERE
	            post_id = {$id}
	    ";

	    $result = $wpdb->get_row($sql, 'ARRAY_A');	 

	    if (is_array($result)){

	    	return '<span class="post-view leffect-1"><i class="la la-fire" aria-hidden="true"></i>'.$result['7_day_stats'].' views</span>';

	    }

	}

	static function daily_time_view(){

	    global $wpdb;
	    global $post;
	    $id = $post->ID;

	    $sql = "
	        SELECT
	            *
	        FROM
	            {$wpdb->prefix}most_popular
	        WHERE
	            post_id = {$id}
	    ";

	    $result = $wpdb->get_row($sql, 'ARRAY_A');	 

	    if (is_array($result)){
	    	return '<span class="post-view leffect-1"><i class="la la-fire" aria-hidden="true"></i>'.$result['1_day_stats'].' views</span>';
	    }

	}

	static function fashmag_excerpt_shortcode($limit) {
	    if($limit > "0"){
			if(has_excerpt()){
				$outpu = get_the_excerpt();
			} else {
				$outpu = get_the_content();  
			}
		    $outpu = wp_trim_words($outpu, $limit,'');    
		    return '<div class="entry_excerpt">'.$outpu.'</div>';	    
	    }
	    
	}

	function fashmag_excerpt_folio($limit) {
	    if($limit > "0"){
	    global $post;
	    $id = $post->ID;

	    if ( has_excerpt( $id ) ) {
	        $string = get_the_excerpt();
	    } else {
	        $string = get_the_content();
	    }

	    $excerpt = strip_tags($string);
	    $excerpt = substr($excerpt, 0, $limit);
	    $outpu = $excerpt;
	    
	        return '<p class="post-entry">'.$outpu.'</p>';
	    
	    }
	    
	}



	static function ae_build_postmeta($metas = '',$excerpt_length = ''){


	        if ( !is_array($metas) && $metas ) {
	            $metas = explode(',' , $metas); 
	        }


	        if ( is_array($metas) ) {
	                 $outz='';
	            foreach( $metas as $meta ) {

	                    $out = '';

	                    switch ( $meta ) {

							case 'tag':
								$out = self::khobish_post_tag() ;
								break;

							case 'cat':
								$out = self::khobish_single_category(false);
								break;

							case 'cat_bg':
								$out = self::khobish_single_category_bg(false);
								break;

							case 'time':
								$out = self::khobish_posted_on() ;
								break;  

							case 'all_time':
								$out = self::all_time_view() ;
								break;

							case '30_day':
								$out = self::monthly_time_view() ;
								break;

							case '7_day':
								$out = self::weekly_time_view() ;
								break;

							case '1_day':
								$out = self::daily_time_view() ;
								break;

							case 'view':
								$out = ae_post_view() ; 
								break;  

							case 'title':
								$out = self::khobish_post_title() ;
								break;

							case 'space_blank':
								$out = self::ae_post_spacer() ;
								break;

							case 'clear':
								$out = self::ae_clearifix() ;
								break;
							case 'h5':
								$out = self::ae_clearifix_h5() ;
								break;

							case 'h10':
								$out = self::ae_clearifix_h10() ;
								break;
							case 'btn':
								$out = self::ae_readmore_btn() ;
								break;

							case 'bottom_personal':
								$out = self::fashmag_pmeta_btm() ;
								break;

							case 'reading':
								$out = self::fashmag_reading_time() ;
								break;  

							case 'full_share':
								$out = self::full_share_posts() ;
								break;

							case 'circular_share':
								$out = self::circular_share_posts() ;
								break;

							case 'space':
								$out = self::fashmag_space_meta() ;
								break;

							case 'dot_separator':
								$out = self::khobish_dot_separator() ;
								break;

							case 'vert_separator':
								$out = self::khobish_vert_separator() ;
								break;
								
							case 'view':
								$out = khobish_post_title() ;
								break;

							case 'title_nolink':
								$out = self::khobish_post_title_nolink() ;
								break;  

							case 'author':
								$out = self::khobish_author();
								break;

							case 'author_img':
								$out = self::khobish_author_img();
								break;

							case 'comment':
								$out = self::fashmag_comment() ;
								break;

							case 'excerpt':
								$out = self::fashmag_excerpt_shortcode($excerpt_length);
								break;

	                    }

						if ( !empty( $meta ) ) {
							$outz .= $out;
						}       

	                }   
	            echo ''.$outz.'';   

	            }   

	}


	static function ne_share_post($vendors){
		$outz = '';
		if( has_post_thumbnail() ){
			$share_image = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
			$share_image= $share_image[0];
			$share_image_portrait= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
			$share_image_portrait= $share_image_portrait[0];
		}else{
			$share_image= '';
			$share_image_portrait= '';
		}
		$share_excerpt = strip_tags( get_the_excerpt(), '<b><i><strong><a>' );

		foreach( $vendors as $vendor ) {
			$out = '';
			$txt = $vendor['sub'] ? '<span>'.$vendor['sub'].'</span>' : '';
			$cls = $vendor['sub'] ? ' has-text' : ' no-text';
			switch ( $vendor['vendor'] ) {

				case 'facebook':
					$out = '<a href="http://www.facebook.com/sharer.php?u='.rawurlencode( get_the_permalink() ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls.'"><i class="bivo bi-facebook"></i>'.$txt.'</a>' ;
					break;
				case 'x':
					$out = '<a href="http://twitter.com/intent/tweet?text='.rawurlencode( get_the_title() ).'&amp;url='.rawurlencode( get_the_permalink() ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls. '"><i class="bivo bi-twitter-x"></i>'.$txt.'</a>' ;
					break;	
				case 'linkedin':
					$out = '<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.rawurlencode( get_the_permalink() ).'&amp;title='.rawurlencode( get_the_title() ).'&amp;summary='.rawurlencode ( $share_excerpt ).'&amp;source='.rawurlencode( get_bloginfo('name') ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls. '"><i class="bivo bi-linkedin"></i>'.$txt.'</a>' ;
					break;
				case 'pinterest':
					$out = '<a href="http://pinterest.com/pin/create/button/?url='.rawurlencode( get_the_permalink() ).'&amp;media='.rawurlencode( $share_image_portrait ).'&amp;description='.rawurlencode( get_the_title() ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls. '"><i class="bivo bi-pinterest"></i>'.$txt.'</a>' ;
					break;		
				case 'whatsapp':
					$out = '<a href="http://api.whatsapp.com/send?text='.rawurlencode( get_the_permalink() ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls. '"><i class="bivo bi-whatsapp"></i>'.$txt.'</a>' ;
					break;	

				case 'telegram':
					$out = '<a href="http://www.t.me/share/url?url='.rawurlencode( get_the_permalink() ).'&text='.rawurlencode ( $share_excerpt ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls. '"><i class="bivo bi-telegram"></i>'.$txt.'</a>' ;
					break;
				case 'threads':
					$out = '<a href="http://threads.net/intent/post?text='.rawurlencode ( $share_excerpt ).' '.rawurlencode( get_the_permalink() ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls. '"><i class="bivo bi-threads"></i>'.$txt.'</a>' ;
					break;		
				case 'mail':
					$out = '<a href="mailto:?subject='.rawurlencode( get_the_title() ).'&body='.rawurlencode ( $share_excerpt ).' '.rawurlencode( get_the_permalink() ).'" class="ne-d-flex elementor-repeater-item-' . $vendor['_id'] .$cls. '"><i class="bivo bi-envelope"></i>'.$txt.'</a>' ;
					break;	

			}
			$outz .= $out;
		}
		
		return $outz;
	}

	static function xlmag_filter_nav ($filters,$options,$cat) {

		$subcats = '';
		$allcat = array();
		foreach ($cat as $cat_id ) {
			$term = get_term( $cat_id);
			$allcat[] = $term->term_id;
			$subcats .= '<li><a href="#" data-ajax-catid="'.$term->term_id.'">'.$term->name.'</a></li>';
		}

		$allcat = implode(',' , $allcat);

		$out ='<div class="xl-mag-wrap '.$filters['style'].'">
		        <div class="kb-filter-bar" data-xlopt =\''.wp_json_encode($options).'\'>
				  	<div class="leftpart"><h3>'.$filters['label'].'</h3></div>
					<div class="centerpart"><span></span></div>
				    <div class="rightpart">
					 <ul class="kb_subcats_list">
						<li><a href="#" class="active" data-ajax-catid="'.$allcat.'">'.$filters['all'].'</a></li>
						'.$subcats.'
					 </ul>
					<span class="forwidth">'.$filters['more'].'</span>
					<div class="kb_more_list">
						<div class="more_label">More</div>
						<div class="kb_dropdown_list">
							<ul>
								'.$subcats.'
							</ul>
						</div>
					</div>		
				</div>
			</div>';	
			
		echo $out;
	}   

    
	static function xl_ajax_pagination($type,$count,$found){

        switch ($type) {      
            case "prev_next":
                return '<div class="khobish_pagination prev-next" data-post-count="'.esc_attr($count).'" data-post-found="'.esc_attr($found).'"><div class="mz_prev"><a href="#" class="prev inactive"><i class="dashicons dashicons-arrow-left-alt2" aria-hidden="true"></i></a></div><div class="middle-bar"><span></span></div><div class="mz_next"><a href="#" class="next"><i class="dashicons dashicons-arrow-right-alt2" aria-hidden="true"></i></a></div></div>';   
                break;

            case "load_more":
                return '<div class="khobish_pagination load-more" data-post-count="'.esc_attr($count).'" data-post-found="'.esc_attr($found).'"><div class="mz_next"><a href="#" class="next"><span>Load More</span> <i class="dashicons dashicons-update"></i></a></div></div>'; 
                break;

			case "load_more":  
				  
                default:
                
        }

	}


	static function thepack_hansel_breadcum($icon,$home,$author,$search,$error) {
	    // Set variables for later use
	    $here_text        = '';
	    $home_link        = home_url('/');
	    $home_text        = $home;
	    $link_before      = '<span typeof="v:Breadcrumb">';
	    $link_after       = '</span>';
	    $link_attr        = ' rel="v:url" property="v:title"';
	    $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	    $delimiter        = '<span class="delimiter"><i class="'.$icon['value'].'" aria-hidden="true"></i></span>';              // Delimiter between crumbs
	    $before           = '<span class="current">'; // Tag before the current crumb
	    $after            = '</span>';                // Tag after the current crumb
	    $page_addon       = '';                       // Adds the page number if the query is paged
	    $breadcrumb_trail = '';
	    $category_links   = '';

	    /** 
	     * Set our own $wp_the_query variable. Do not use the global variable version due to 
	     * reliability
	     */
	    $wp_the_query   = $GLOBALS['wp_the_query'];
	    $queried_object = $wp_the_query->get_queried_object();

	    // Handle single post requests which includes single pages, posts and attatchments
	    if ( is_singular() ) 
	    {
	        /** 
	         * Set our own $post variable. Do not use the global variable version due to 
	         * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
	         */
	        $post_object = sanitize_post( $queried_object );

	        // Set variables 
	        $title          = apply_filters( 'the_title', $post_object->post_title );
	        $parent         = $post_object->post_parent;
	        $post_type      = $post_object->post_type;
	        $post_id        = $post_object->ID;
	        $post_link      = $before . $title . $after;
	        $parent_string  = '';
	        $post_type_link = '';

	        if ( 'post' === $post_type ) 
	        {
	            // Get the post categories
	            $categories = get_the_category( $post_id );
	            if ( $categories ) {
	                // Lets grab the first category
	                $category  = $categories[0];

	                $category_links = get_category_parents( $category, true, $delimiter );
	                $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
	                $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
	            }
	        }

	        if ( !in_array( $post_type, ['post', 'page', 'attachment'] ) )
	        {
	            $post_type_object = get_post_type_object( $post_type );
	            $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

	            $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
	        }

	        // Get post parents if $parent !== 0
	        if ( 0 !== $parent ) 
	        {
	            $parent_links = [];
	            while ( $parent ) {
	                $post_parent = get_post( $parent );

	                $parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

	                $parent = $post_parent->post_parent;
	            }

	            $parent_links = array_reverse( $parent_links );

	            $parent_string = implode( $delimiter, $parent_links );
	        }

	        // Lets build the breadcrumb trail
	        if ( $parent_string ) {
	            $breadcrumb_trail = $parent_string . $delimiter . $post_link;
	        } else {
	            $breadcrumb_trail = $post_link;
	        }

	        if ( $post_type_link )
	            $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;

	        if ( $category_links )
	            $breadcrumb_trail = $category_links . $breadcrumb_trail;
	    }

	    // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
	    if( is_archive() )
	    {
	        if (    is_category()
	             || is_tag()
	             || is_tax()
	        ) {
	            // Set the variables for this section
	            $term_object        = get_term( $queried_object );
	            $taxonomy           = $term_object->taxonomy;
	            $term_id            = $term_object->term_id;
	            $term_name          = $term_object->name;
	            $term_parent        = $term_object->parent;
	            $taxonomy_object    = get_taxonomy( $taxonomy );
	            $current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
	            $parent_term_string = '';

	            if ( 0 !== $term_parent )
	            {
	                // Get all the current term ancestors
	                $parent_term_links = [];
	                while ( $term_parent ) {
	                    $term = get_term( $term_parent, $taxonomy );

	                    $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

	                    $term_parent = $term->parent;
	                }

	                $parent_term_links  = array_reverse( $parent_term_links );
	                $parent_term_string = implode( $delimiter, $parent_term_links );
	            }

	            if ( $parent_term_string ) {
	                $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
	            } else {
	                $breadcrumb_trail = $current_term_link;
	            }

	        } elseif ( is_author() ) {

	            $breadcrumb_trail =   $author .  $before . $queried_object->data->display_name . $after;

	        } elseif ( is_date() ) {
	            // Set default variables
	            $year     = $wp_the_query->query_vars['year'];
	            $monthnum = $wp_the_query->query_vars['monthnum'];
	            $day      = $wp_the_query->query_vars['day'];

	            // Get the month name if $monthnum has a value
	            if ( $monthnum ) {
	                $date_time  = DateTime::createFromFormat( '!m', $monthnum );
	                $month_name = $date_time->format( 'F' );
	            }

	            if ( is_year() ) {

	                $breadcrumb_trail = $before . $year . $after;

	            } elseif( is_month() ) {

	                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

	                $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

	            } elseif( is_day() ) {

	                $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
	                $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

	                $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
	            }

	        } elseif ( is_post_type_archive() ) {

	            $post_type        = $wp_the_query->query_vars['post_type'];
	            $post_type_object = get_post_type_object( $post_type );

	            $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;

	        }
	    }   

	    // Handle the search page
	    if ( is_search() ) {
	        $breadcrumb_trail =   $search . $before . get_search_query() . $after;
	    }

	    // Handle 404's
	    if ( is_404() ) {
	        $breadcrumb_trail = $before .   $error . $after;
	    }

	    // Handle paged pages
	    if ( is_paged() ) {
	        $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
	        $page_addon   = $before . sprintf(   esc_html__( ' ( Page %s )' ), number_format_i18n( $current_page ) ) . $after;
	    }

	    $breadcrumb_output_link  = '';
	    $breadcrumb_output_link .= '<div class="xlbreadcrumb">';
	    if (    is_home()
	         || is_front_page()
	    ) {
	        // Do not show breadcrumbs on page one of home and frontpage
	        if ( is_paged() ) {
	            $breadcrumb_output_link .= $here_text . $delimiter;
	            $breadcrumb_output_link .= '<a href="' . $home_link . '">' . $home_text . '</a>';
	            $breadcrumb_output_link .= $page_addon;
	        }
	    } else {
	        
	        $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title">' . $home_text . '</a>';
	        $breadcrumb_output_link .= $delimiter;
	        $breadcrumb_output_link .= $breadcrumb_trail;
	        $breadcrumb_output_link .= $page_addon;
	    }
	    $breadcrumb_output_link .= '</div><!-- .breadcrumbs -->';

	    return $breadcrumb_output_link;
	}
 
    static function khb_arc_title($arg) {

        if ( is_category() ) {
            /* translators: Category archive title. 1: Category name */
            $title = single_cat_title( _x( $arg['cat'], 'ashbro' ),false);
        } elseif ( is_tag() ) {
            /* translators: Tag archive title. 1: Tag name */
            $title = single_tag_title( $arg['tag'], false );
        } elseif ( is_author() ) {
            $title = sprintf( esc_html__( $arg['author'].'%s', 'kausik' ), '<span>' . get_the_author() . '</span>' );
            //$title = get_the_author( 'Author: ', true );
        } elseif ( is_year() ) {
            /* translators: Yearly archive title. 1: Year */
            $title = get_the_date( _x( $arg['year'], 'yearly archives date format' ),false );
        } elseif ( is_month() ) {
            /* translators: Monthly archive title. 1: Month name and year */
            $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
        } elseif ( is_404() ) {
            /* translators: Daily archive title. 1: Date */
            $title = $arg['notfound'];
        } elseif ( is_tax( 'post_format' ) ) {
            if ( is_tax( 'post_format', 'post-format-aside' ) ) {
                $title = _x( 'Asides', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
                $title = _x( 'Galleries', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
                $title = _x( 'Images', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
                $title = _x( 'Videos', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
                $title = _x( 'Quotes', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
                $title = _x( 'Links', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
                $title = _x( 'Statuses', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
                $title = _x( 'Audio', 'post format archive title' );
            } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
                $title = _x( 'Chats', 'post format archive title' );
            }
        } elseif ( is_post_type_archive() ) {
            /* translators: Post type archive title. 1: Post type name */
            $title = post_type_archive_title( '', false );
        } elseif ( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            /* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
            $title = single_term_title( '', false ) ;
        } elseif (is_search()){
            $title = sprintf( esc_html__( $arg['search'].'%s', 'kausik' ), '<span>' . get_search_query() . '</span>' );
        } elseif(is_singular()) {
            $title = get_the_title();
        } else {
			$title = __( 'Archives' );
		}

        return '<h3 class="title">'.$title.'</h3>';
    }

    static function thepack_get_previous_post_id( $post_id ) {
        global $post;
        $oldGlobal = $post;
        $post = get_post( $post_id );
        $previous_post = get_previous_post();
        $post = $oldGlobal;
        if ( '' == $previous_post )
            return false;
        return $previous_post->ID;
    }

    static function thepack_get_next_post_id( $post_id ) {

        global $post;
        $oldGlobal = $post;
        $post = get_post( $post_id );
        $next_post = get_next_post();
        $post = $oldGlobal;
        if ( '' == $next_post )
            return false;
        return $next_post->ID;
    }


	static function khobish_theme_pagination($custom_query='') {

		global $wp_query;
		$q = $wp_query;   
	    $total_pages = $q->max_num_pages;
	    $big = 999999999; // need an unlikely integer

	    if ($total_pages > 1){
	        $current_page = max(1, get_query_var('paged'));
	        echo '<div class="khobish_pagination number-pagination">';
	        echo paginate_links(array(
	            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	            'format' => '?paged=%#%',
	            'current' => $current_page,
	            'total' => $total_pages,
	            'type' => 'list',
	            'prev_text' => '←',
	            'next_text' => '→',            
	        ));
	        echo '</div>';
	    }
	}

	static function youtube_video_thumb($url){

	    $regExp = "/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/";
	    preg_match($regExp, $url, $video);
		$thumbnail = "http://i3.ytimg.com/vi/$video[7]/default.jpg";
		return "<img alt='youtube video' src='$thumbnail' />";	    
	}

	static function vimeo_video_thumb($url){

	    $regExp = "#(?:https?://)?(?:www.)?(?:player.)?vimeo.com/(?:[a-z]*/)*([0-9]{6,11})[?]?.*#";
	    preg_match($regExp, $url, $video);	
	    $fget = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$video[1].php"));	
		$thumbnail =  $fget[0]['thumbnail_large'];   
		return "<img alt='vimeo video' src='$thumbnail' />";
	}

	static function dailymotion_video_thumb($url){

	    $regExp = "!^.+dailymotion\.com/(video|hub)/([^_]+)[^#]*(#video=([^_&]+))?|(dai\.ly/([^_]+))!";
	    preg_match($regExp, $url, $video);	
        if (isset($video[6])) {
            $id = $video[6];
        }
        if (isset($video[4])) {
            $id = $video[4];
        }
        $id = $video[2];

	    $thumbnail_large_url = 'https://api.dailymotion.com/video/'.$id.'?fields=thumbnail_720_url'; //pass thumbnail_360_url, thumbnail_480_url, thumbnail_720_url, etc. for different sizes
	    $json_thumbnail = file_get_contents($thumbnail_large_url);
	    $arr_dailymotion = json_decode($json_thumbnail, TRUE);
	    $thumbnail = $arr_dailymotion['thumbnail_720_url'];

	    return "<img alt='daily motion video' src='$thumbnail' />";

	}

	static function process_video_thumbnail($url){

		if (strstr($url, 'you')) {
			return self::youtube_video_thumb($url);
		} elseif (strstr($url, 'vimeo')) {
			return self::vimeo_video_thumb($url);
		} else {
			return self::dailymotion_video_thumb($url);
		}

	}

}


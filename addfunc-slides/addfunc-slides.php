<?php
/*
    Plugin Name: AddFunc Slides
    Plugin URI: https://wordpress.org/plugins/addfunc-slides/
    Description: An intuitively manageable Slide content type with shortcode & widget interfaces for easy slideshow insertion. Includes standard slideshow options, while still providing fully CSS-styleable output.
    Version: 2.6
    Author: AddFunc
    Author URI: http://addfunc.com/
    @since 3.9.1
           ______
       _  |  ___/   _ _ __   ____
     _| |_| |__| | | | '_ \ / __/™
    |_ Add|  _/| |_| | | | | (__
      |_| |_|   \__,_|_| |_|\___\
*/



/*
     T A X O N O M I E S
     ===================
     Register Slidesets taxonomy
*/

if(!function_exists('aFregslidesets')){
  function aFregslidesets(){
    $labels = array(
      'name'                    => _x('Slidesets','taxonomy general name'),
      'singular_name'           => _x('Slideset','taxonomy singular name'),
      'search_items'            => __('Search Slidesets'),
      'popular_items'           => __('Popular Slidesets'),
      'all_items'               => __('All Slidesets'),
      'parent_item'             => __('Parent Slideset'),
      'parent_item_colon'       => __('Parent Slideset:'),
      'separate_items_with_commas' => __('Separate Slidesets with commas'),
      'add_or_remove_items'     => __('Add or remove tags'),
      'choose_from_most_used'   => __('Choose from the most used Slidesets'),
      'not_found'               => __('No Slidesets found'),
      'separatewith_commas'     => __('Separate Slidesets with commas'),
      'edit_item'               => __('Edit Slideset'),
      'update_item'             => __('Update Slideset'),
      'add_new_item'            => __('Add New Slideset'),
      'new_item_name'           => __('New Slideset Name'),
      'menu_name'               => __('Slidesets'),
    );
    $args = array(
      'hierarchical'            => true,
      'show_admin_column'       => true,
      'labels'                  => $labels,
      'rewrite'                 => array('slug' => 'slideset'),
    );
    register_taxonomy('slidesets','slides',$args);
  }
  add_action('init','aFregslidesets');
}


/*
    C U S T O M   P O S T   T Y P E
    ===============================
    Register Slides post type
*/

if(!function_exists('aFslds_post_type')){
  add_action('init','aFslds_post_type',0);
  function aFslds_post_type(){
    $labels = array(
      'name'                  => _x('Slides','post type general name'),
      'singular_name'         => _x('Slide','post type singular name'),
      'add_new'               => __('Add New'),
      'add_new_item'          => __('Add New'),
      'edit_item'             => __('Edit Slide'),
      'new_item'              => __('New Slide'),
      'view_item'             => __('View Slide'),
      'all_items'             => __('All Slides'),
      'search_items'          => __('Search Slides'),
      'not_found'             => __('No Slides found'),
      'not_found_in_trash'    => __('No Slides found in Trash'),
      'menu_name'             => 'Slides'
   );
    $show_in_admin = '';
    if(!current_user_can('edit_posts')){
      $show_in_admin = false;
    }
    else{
      $show_in_admin = true;
    }
    $supports = array('title','thumbnail','editor','revisions');
    $args = array(
      'menu_icon'             => 'dashicons-images-alt2',
      'labels'                => $labels,
      'public'                => false,
      'show_ui'               => $show_in_admin,
      'show_in_menu'          => $show_in_admin,
      'show_in_admin_bar'     => $show_in_admin,
      'query_var'             => 'slides',
      'rewrite'               => array('slug'=>'slides'),
      'has_archive'           => false,
      'hierarchical'          => false,
      'supports'              => $supports,
      'register_meta_box_cb'  => 'aFSMetaBoxes',
      'taxonomies'            => array('slideset')
   );
    register_post_type('slides',$args);
  }
}



/*
    F U N C T I O N S
    =================
*/

if(!function_exists('aFAutoParam')){
  function aFAutoParam($key,$value,$default=NULL){
    if(empty($value)){ # If there is no value
      if($default){ # ...and there is a default
        $value = $default; # ...use the default
      }
    }
    if(!empty($value)){ # If there is a value and...
      if((is_string($value)) && (!is_numeric($value)) && ($value!="true") && ($value!="false") && (substr($value,0,1)!= "{")){
        # $value is a string and is not a number and is not one of keywords "true" or "false" and is not in curly-brackets
        $quotes = '"';
      }
      else{
        # $value is not a string or is a number or is one of keywords "true" or "false" or is in curly-brackets
        $quotes = '';
      }
      return $key.": ".$quotes.$value.$quotes.",\n        "; # Output with/without quotes
    }
  }
}
if(!function_exists('aFget_posts')){
  function aFget_posts($args = null){
    $defaults = array(
      'numberposts'       => 5,        'offset'     => 0,
      'category'          => 0,        'orderby'    => 'date',
      'order'             => 'ASC',    'include'    => array(),
      'exclude'           => array(),  'meta_key'   => '',
      'meta_value'        => '',       'post_type'  => 'post',
      'suppress_filters'  => true
    );
    $r = wp_parse_args($args,$defaults);
    if(empty($r['post_status']))
      $r['post_status'] =('attachment' == $r['post_type'])?'inherit':'publish';
    if(!empty($r['numberposts']) && empty($r['posts_per_page']))
      $r['posts_per_page'] = $r['numberposts'];
    if(!empty($r['category']))
      $r['cat'] = $r['category'];
    if(!empty($r['include'])){
      $incposts = wp_parse_id_list($r['include']);
      $r['posts_per_page'] = count($incposts); // only the number of posts included
      $r['post__in'] = $incposts;
    }elseif(!empty($r['exclude']))
      $r['post__not_in'] = wp_parse_id_list($r['exclude']);
    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;
    $aFget_posts = new WP_Query;
    return $aFget_posts->query($r);
  }
}



/*
    J S   &   C S S   in   H E A D
    ==============================
    Conditional Styles & Scripts
*/

$aFSInit = "";
function aFSJSCSS(){
  global $post;
  $aFSOptions = get_option('aFSOpts');
  $aFSVals = get_post_custom($post->ID);
  $aFSDefaultCSS = isset($aFSOptions['aFSDefaultCSS']) ? $aFSOptions['aFSDefaultCSS'][0] : '';
  $aFSJSCSSOff = isset($aFSOptions['aFSJSCSSOff']) ? $aFSOptions['aFSJSCSSOff'][0] : '';
  $aFSJSCSSOn = isset($aFSVals['aFSJSCSSOn']) ? $aFSVals['aFSJSCSSOn'][0] : '';
  wp_register_script('aFSlidesJS',plugins_url('js/addfunc-slides.js?v=2-6',__FILE__));
  wp_register_style('aFSlidesCSS',plugins_url('css/addfunc-slides.css',__FILE__));
  if(!$aFSJSCSSOff || $aFSJSCSSOn){
    if(!$aFSDefaultCSS){
      wp_enqueue_style('aFSlidesCSS');
    }
    wp_enqueue_script('aFSlidesJS');
  }
}
add_action('wp_enqueue_scripts','aFSJSCSS');


/*
    S H O R T C O D E
    =================
*/

    function aFSSc($atts){
      $aFSMrgd = shortcode_atts(array(

        'slideset'        => '',
        'auto'            => '',
        'speed'           => '',
        'prevnext'        => '',
        'pause'           => '',
        'tabs'            => '',
        'tabsfirst'       => '',
        'stoppable'       => '',
        'pauseonhover'    => '',
        'fullscreen'      => '',
        'swipe'           => '',
        'class'           => '',
        'color'           => '',
        'size'            => '',
        'height'          => '',
        'ratio'           => '',
        'tabsclass'       => '',
        'order'           => 'ASC',
        'orderby'         => '',
        'meta_key'        => '',

     ),$atts,'slides');
      extract($aFSMrgd);
      $aFSOptions = get_option('aFSOpts');
      if(!$color){
        if(!empty($aFSOptions['aFSDefaultColor'])){
          $color = $aFSOptions['aFSDefaultColor'];
        }
      }
      if(empty($size)){
        if(!empty($aFSOptions['aFSDefaultSize'])){
          $size = $aFSOptions['aFSDefaultSize'];
        }
      }
      $aFSInst = 'aFS'.uniqid(); // http://stackoverflow.com/questions/22873093/generate-different-code-in-wp-footer-for-each-shortcode-instance
      if(!$orderby){
        $orderby = 'meta_value_num';
        $meta_key = 'aFSPrior';
      }
      if(($slideset === 'all')||empty($slideset)){
        $slideset = '';
        $slidesetID = 'all-slides';
      }
      else {
        $slidesetID = $slideset;
      }
      if ((strpos($ratio,':') == true)||(strpos($ratio,'-') == true)||(strpos($ratio,'x') == true)) {
        preg_match('/\d+/', $ratio, $fstnum);
        $fst = $fstnum[0];
        preg_match('/(\d+)\D*$/', $ratio, $sndnum);
        $snd = end($sndnum);
        $prc = ($snd/$fst) * 100;
        $ratio = $prc."%";
      } else {
        if(($ratio == 'HD')) {
          $ratio = "56.25%";
        } elseif ($ratio == 'half') {
          $ratio = "50%";
        } elseif ($ratio == 'old') {
          $ratio = "74%";
        } elseif ($ratio == 'standard') {
          $ratio = "75%";
        } elseif ($ratio == 'square') {
          $ratio = "100%";
        } elseif ($ratio == 'portrait') {
          $ratio = "150%";
        }
      }
      $args = array(
        'slidesets'       => $slideset,
        'post_type'       => 'slides',
        'order'           => $order,
        'orderby'         => $orderby,
        'meta_key'        => $meta_key,
        'posts_per_page'  => -1
      );
      $aFSPosts = aFget_posts($args);
      global $post,$aFSInit,$aFDependsOn;

      $tmp_post = $post;
      ob_start();
      $outputThumbs = "";
      $outputLabels = "";
      if($tabs && (($tabs != 'labels') && ($tabs != 'true'))){ $outputThumbs = true; } /* Output the thumbnail */
      if($tabs && (($tabs != 'thumbnails') && ($tabs != 'true'))){ $outputLabels = true; } /* Output the label */ ?>
        <div id="<?php echo $slidesetID; ?>" class="addFuncSlides <?php echo $aFSInst; if($class){echo ' '.$class;} if($pause){ echo ' with-pause-control'; } if($tabs){ echo ' with-tabs'; } if($outputThumbs){ echo ' with-thumbnails'; } if($outputLabels){ echo ' with-labels'; } if($prevnext != 'false'){ echo ' with-prev-next-control'; } if($tabsfirst){ echo ' tabs-first'; } if($ratio){echo ' ratio-set';}elseif($height){echo ' height-set';}?>" <?php if($color || $size){ echo ' style="'; if($color){ echo 'color:'.$color.';'; } if($size){ echo 'font-size:'.$size.';'; } echo '"';} ?>>
<?php   if($tabs && $tabsfirst){ ?>
          <ol class="aFTabs<?php if($tabsclass){echo " ".$tabsclass;} if($outputThumbs){ echo " thumbnails"; } if($outputLabels){ echo " labels"; } if($tabs == 'true'){ echo " empty-tabs"; } ?>">
<?php     foreach($aFSPosts as $aFSPost): setup_postdata($aFSPost); ?>
            <li id="<?php echo $aFSPost->post_name;?>-tab"><?php if($outputThumbs){ echo get_the_post_thumbnail($aFSPost->ID,'thumbnail',array('alt' => $aFSPost->post_title.' thumbnail')); } /* Output the thumbnail */ ?>
<?php       if($outputLabels){ ?>
              <div class="tab-label"><?php echo $aFSPost->post_title; ?></div>
<?php       } ?>
            </li>
<?php     endforeach; ?>
          </ol><!-- /.aFTabs  -->
<?php   } ?>
          <div class="aFSlides slideset"<?php if($ratio){echo ' style="position: relative;"';}?>>
<?php     foreach($aFSPosts as $aFSPost): setup_postdata($aFSPost);
          $aFSGetSType = get_post_meta($aFSPost->ID,'aFSldTyp',true);
          $aFSGetMnImg = get_post_meta($aFSPost->ID,'aFSMnImg',true);
          $aFSGetMnAlt = get_post_meta($aFSPost->ID,'aFSMnAlt',true);
          $aFSGetMnLnk = get_post_meta($aFSPost->ID,'aFSMnLnk',true);
          $aFSGetMTarg = get_post_meta($aFSPost->ID,'aFSMTarg',true)? ' target="_blank"' : '';
          $aFSGetBgImg = get_post_meta($aFSPost->ID,'aFSBgImg',true);
          $aFSGetClass = get_post_meta($aFSPost->ID,'aFSClass',true); ?>
            <figure class="slide<?php if($aFSGetSType){echo ' of-'.$aFSGetSType;}else{echo ' of-imagery';} if($aFSGetClass){echo ' '.$aFSGetClass;} ?>" id="<?php echo $aFSPost->post_name; ?>"<?php
              if($aFSGetBgImg||$ratio||$height){
                echo ' style="';
                if($aFSGetBgImg){echo 'background-image: url('.$aFSGetBgImg.'); ';}
                if($ratio){echo 'padding-top: ' .$ratio.'; height: 0; ';}
                elseif($height){echo 'height: ' .$height.'; ';}
                echo '"';
              } ?>>
              <div class="slide-content"<?php if($ratio){echo ' style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"';}?>>
<?php         if($aFSGetMnImg){ ?>
<?php       if($aFSGetMnLnk){ ?>
              <a class="slide-main-img-link" href="<?php echo $aFSGetMnLnk; ?>"<?php echo $aFSGetMTarg; ?>>
<?php       } ?>
                <img class="slide-main-img" src="<?php echo $aFSGetMnImg; ?>" alt="<?php echo $aFSGetMnAlt; ?>" />
<?php         if($aFSGetMnLnk){ ?>
              </a>
<?php       }
        }
          the_content(); ?>
              </div>
<?php
              if(current_user_can('edit_post',$aFSPost->ID)){ echo '          <a class="post-edit-link" href="'.get_edit_post_link($aFSPost).'"/><span class="dashicons dashicons-edit"></span> Edit</a>';}
?>
            </figure>
<?php   endforeach; ?>
          </div><!-- /.aFSlides  -->
<?php   if(!empty($tabs) && ($tabs != 'false') && ($tabs != 'true') && !$tabsfirst){ ?>
          <ol class="aFTabs<?php if($tabsclass){echo " ".$tabsclass;} if($outputThumbs){ echo " thumbnails"; } if($outputLabels){ echo " labels"; } ?>">
<?php     foreach($aFSPosts as $aFSPost): setup_postdata($aFSPost); ?>
            <li id="<?php echo $aFSPost->post_name;?>-tab"><?php if($outputThumbs){ echo get_the_post_thumbnail($aFSPost->ID,'thumbnail',array('alt' => $aFSPost->post_title.' thumbnail')); } ?>
<?php       if($outputLabels){ ?><div class="tab-label"><?php echo $aFSPost->post_title; ?></div>
<?php       } ?>
            </li>
<?php     endforeach; ?>
          </ol><!-- /.aFTabs  -->
<?php   } ?>
        </div><!-- /#<?php echo $slidesetID; ?> -->
<?php

      $aFSInit .= "
      var ".$aFSInst." = {
        ".
          aFAutoParam('auto',$auto).
          aFAutoParam('speed',$speed).
          aFAutoParam('tabs',$tabs).
          aFAutoParam('prevNext',$prevnext).
          aFAutoParam('pause',$pause).
          aFAutoParam('stoppable',$stoppable).
          aFAutoParam('pauseOnHover',$pauseonhover).
          aFAutoParam('fullScreen',$fullscreen).
          aFAutoParam('swipe',$swipe).
      "};
      aFSlides('.".$aFSInst."',".$aFSInst.");";
      $post = $tmp_post;
      return ob_get_clean();
    }
    add_shortcode('slides','aFSSc');



/*
    W I D G E T
    ===========
*/

class aFSWdgt extends WP_Widget{
  protected static $did_script = false;
  function __construct()
  {
    parent::__construct(
      'aFSWdgt',// Base ID
      'Slides',// Name
      array('description'=> __('Display your Slides in an AddFunc slideshow.','text_domain'),)// Args
    );
    if(!self::$did_script && is_active_widget(false,false,$this->id_base,true)){
      add_action('wp_enqueue_scripts','aFSJSCSS');
      wp_enqueue_style('aFSlidesCSS');
      wp_enqueue_script('aFSlidesJS');
      self::$did_script = true;
    }
  }
  public function widget($args,$instance)
  {
    $aFSOptions    = get_option('aFSOpts');
    $slideset      = isset($instance['slideset'])     ? $instance['slideset']      : '';
    $auto          = isset($instance['auto'])         ? $instance['auto']          : '';
    $speed         = isset($instance['speed'])        ? $instance['speed']         : '';
    $prevnext      = isset($instance['prevnext'])     ? $instance['prevnext']      : '';
    $pause         = isset($instance['pause'])        ? $instance['pause']         : '';
    $pagination    = isset($instance['pagination'])   ? $instance['pagination']    : '';
    $tabs          = isset($instance['tabs'])         ? $instance['tabs']          : '';
    $tabsfirst     = isset($instance['tabsfirst'])    ? $instance['tabsfirst']     : '';
    $stoppable     = isset($instance['stoppable'])    ? $instance['stoppable']     : '';
    $pauseonhover  = isset($instance['pauseonhover']) ? $instance['pauseonhover']  : '';
    $fullscreen    = isset($instance['fullscreen'])   ? $instance['fullscreen']    : '';
    $swipe         = isset($instance['swipe'])        ? $instance['swipe']         : '';
    $class         = isset($instance['class'])        ? $instance['class']         : '';
    $color         = isset($instance['color'])        ? $instance['color']         : '';
    $size          = isset($instance['size'])         ? $instance['size']          : '';
    $height        = isset($instance['height'])       ? $instance['height']        : '';
    $ratio         = isset($instance['ratio'])        ? $instance['ratio']         : '';
    $tabsclass     = isset($instance['tabsclass'])    ? $instance['tabsclass']     : '';
    $order         = isset($instance['order'])        ? $instance['order']         : '';
    $orderby       = isset($instance['orderby'])      ? $instance['orderby']       : '';
    $meta_key      = isset($instance['meta_key'])     ? $instance['meta_key']      : '';
    if(!$color){
      if(!empty($aFSOptions['aFSDefaultColor'])){
        $color = $aFSOptions['aFSDefaultColor'];
      }
    }
    if(empty($size)){
      if(!empty($aFSOptions['aFSDefaultSize'])){
        $size = $aFSOptions['aFSDefaultSize'];
      }
    }
    $aFSInst = 'aFS'.uniqid();
    $title = apply_filters('widget_title',$instance['title']);
    echo $args['before_widget'];
    $termid = get_term($slideset,'slidesets');
    $slideset = $termid->slug;
    if(!$orderby){
      $orderby = 'meta_value_num';
      $meta_key = 'aFSPrior';
    }
    $order = empty($order)? 'ASC' : 'DESC';
    if($pagination){
      $tabs = true;
    }
    if(empty($swipe)){ $swipe = "horizontal"; }
    if ((strpos($ratio,':') == true)||(strpos($ratio,'x') == true)) {
      $fstnum = array();
      preg_match('/\d+/', $ratio, $fstnum);
      $fst = $fstnum[0];
      $sndnum = array();
      preg_match('/(\d+)\D*$/', $ratio, $sndnum);
      $snd = end($sndnum);
      $prc = ($snd/$fst) * 100;
      $ratio = $prc."%";
    } else {
      if(($ratio == 'HD')) {
        $ratio = "56.25%";
      } elseif ($ratio == 'half') {
        $ratio = "50%";
      } elseif ($ratio == 'old') {
        $ratio = "74%";
      } elseif ($ratio == 'standard') {
        $ratio = "75%";
      } elseif ($ratio == 'square') {
        $ratio = "100%";
      } elseif ($ratio == 'portrait') {
        $ratio = "150%";
      }
    }
    $aFSArgs = array(
      'slidesets'       => $slideset,
      'post_type'       => 'slides',
      'order'           => $order,
      'orderby'         => $orderby,
      'meta_key'        => $meta_key,
      'posts_per_page'  => -1
   );
    $outputThumbs = "";
    $outputLabels = "";
    if(($pagination==="T")||($pagination==="LT")){ $outputThumbs = true; } /* Output the thumbnail */
    if(($pagination==="L")||($pagination==="LT")){ $outputLabels = true; } /* Output the label */
    if(($slideset === 'all')||empty($slideset)){
      $slideset = '';
      $slidesetID = 'all-slides';
    }
    else {
      $slidesetID = $slideset;
    }
    $aFSPosts = aFget_posts($aFSArgs); ?>
      <div id="<?php echo $slidesetID; ?>" class="addFuncSlides <?php echo $aFSInst; if($class){echo " ".$class;} if($pause){ echo " with-pause-control"; } if($tabs){ echo " with-tabs"; } if($outputThumbs){ echo " with-thumbnails"; } if($outputLabels){ echo " with-labels"; } if($prevnext != 'false'){ echo " with-prev-next-control"; } if($tabsfirst){ echo " tabs-first"; } if($ratio){echo ' ratio-set';}elseif($height){echo ' height-set';} ?>" <?php if($color || $size){ echo ' style="'; if($color){ echo 'color:'.$color.';'; } if($size){ echo 'font-size:'.$size.';'; } echo '"';} ?>>
<?php if($pagination && $tabsfirst){ ?>
        <ol class="aFTabs<?php if($tabsclass){echo " ".$tabsclass;} if($outputThumbs){ echo " thumbnails"; } if($outputLabels){ echo " labels"; } if($tabs == 'true'){ echo " empty-tabs"; } ?>">
<?php   foreach($aFSPosts as $aFSPost): setup_postdata($aFSPost); ?>
          <li id="<?php echo $aFSPost->post_name;?>-tab"><?php if($outputThumbs){ echo get_the_post_thumbnail($aFSPost->ID,'thumbnail',array('alt' => $aFSPost->post_title.' thumbnail')); } ?>
<?php     if($outputLabels){ ?>
            <div class="tab-label"> <?php echo $aFSPost->post_title; ?></div>
<?php     } ?>
          </li>
<?php   endforeach; ?>
        </ol><!-- /.aFTabs  -->
<?php } ?>
        <div class="aFSlides slideset"<?php if($ratio){echo ' style="position: relative;"';}?>>
<?php foreach($aFSPosts as $aFSPost): setup_postdata($aFSPost);
        $aFSGetSType = get_post_meta($aFSPost->ID,'aFSldTyp',true);
        $aFSGetMnImg = get_post_meta($aFSPost->ID,'aFSMnImg',true);
        $aFSGetMnAlt = get_post_meta($aFSPost->ID,'aFSMnAlt',true);
        $aFSGetMnLnk = get_post_meta($aFSPost->ID,'aFSMnLnk',true);
        $aFSGetMTarg = get_post_meta($aFSPost->ID,'aFSMTarg',true)? ' target="_blank"' : '';
        $aFSGetBgImg = get_post_meta($aFSPost->ID,'aFSBgImg',true);
        $aFSGetClass = get_post_meta($aFSPost->ID,'aFSClass',true); ?>
          <figure class="slide<?php if($aFSGetSType){echo ' of-'.$aFSGetSType;}else{echo ' of-imagery';} if($aFSGetClass){echo ' '.$aFSGetClass;} ?>" id="<?php echo $aFSPost->post_name;?>" <?php
            if($aFSGetBgImg||$ratio||$height){
              echo ' style="';
              if($aFSGetBgImg){echo 'background-image: url('.$aFSGetBgImg.'); ';}
              if($ratio){echo 'padding-top: ' .$ratio.'; height: 0; ';}
              elseif($height){echo 'height: ' .$height.'; ';}
              echo '"';
            } ?>>
            <div class="slide-content"<?php if($ratio){echo ' style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;"';}?>>
<?php   if($aFSGetMnImg){ ?>
<?php     if($aFSGetMnLnk){ ?>
            <a class="slide-main-img-link" href="<?php echo $aFSGetMnLnk; ?>"<?php echo $aFSGetMTarg; ?>>
<?php     } ?>
              <img class="slide-main-img" src="<?php echo $aFSGetMnImg; ?>" alt="<?php echo $aFSGetMnAlt; ?>" />
<?php     if($aFSGetMnLnk){ ?>
            </a>
<?php     }
        }
        the_content(); ?>
            </div>
<?php
          if(current_user_can('edit_post',$aFSPost->ID)){ echo '          <a class="post-edit-link" href="'.get_edit_post_link($aFSPost).'"/><span class="dashicons dashicons-edit"></span> Edit</a>';}
?>
          </figure>
<?php endforeach; ?>
        </div><!-- /.aFSlides  -->
<?php if(($pagination && ($pagination != "ON")) && !$tabsfirst){ ?>
        <ol class="aFTabs<?php if($tabsclass){echo " ".$tabsclass;} if($outputThumbs){ echo " thumbnails"; } if($outputLabels){ echo " labels"; } ?>">
<?php   foreach($aFSPosts as $aFSPost): setup_postdata($aFSPost); ?>
          <li id="<?php echo $aFSPost->post_name;?>-tab"><?php if($outputThumbs){ echo get_the_post_thumbnail($aFSPost->ID,'thumbnail',array('alt' => $aFSPost->post_title.' thumbnail')); } ?>
<?php     if($outputLabels){ ?>
            <div class="tab-label"><?php echo $aFSPost->post_title; ?></div>
<?php     } ?>
          </li>
<?php   endforeach; ?>
        </ol><!-- /.aFTabs  -->
<?php } ?>
      </div><!-- /#<?php echo $slidesetID; ?> -->
<?php
    echo $args['after_widget'];
    global $aFSInit;
    $aFSInit .= "
      var ".$aFSInst." = {
        ".
        # General Options
        aFAutoParam('auto',$auto).
        aFAutoParam('speed',$speed).
        aFAutoParam('tabs',$tabs).
        aFAutoParam('prevNext',$prevnext).
        aFAutoParam('pause',$pause).
        aFAutoParam('stoppable',$stoppable).
        aFAutoParam('pauseOnHover',$pauseonhover).
        aFAutoParam('fullScreen',$fullscreen).
        aFAutoParam('swipe',$swipe).
      "};
      aFSlides('.".$aFSInst."',".$aFSInst.");";
  }
#   Back-end widget form
public function form($instance)
 {
    // Storing IDs = less queries
    $title        = isset($instance['title'])        ? $instance['title']         : '';
    $slideset     = isset($instance['slideset'])     ? $instance['slideset']      : '';
    $auto         = isset($instance['auto'])         ? $instance['auto']          : '';
    $speed        = isset($instance['speed'])        ? $instance['speed']         : '';
    $prevnext     = isset($instance['prevNext'])     ? $instance['prevNext']      :
                    isset($instance['prevnext'])     ? $instance['prevnext']      : '';
    $pause        = isset($instance['pause'])        ? $instance['pause']         : '';
    $pagination   = isset($instance['pagenation'])   ? $instance['pagenation']    :
                    isset($instance['pagination'])   ? $instance['pagination']    : '';
    $tabs         = isset($instance['tabs'])         ? $instance['tabs']          : '';
    $tabsfirst    = isset($instance['tabsFirst'])    ? $instance['tabsFirst']     :
                    isset($instance['tabsfirst'])    ? $instance['tabsfirst']     : '';
    $stoppable    = isset($instance['stoppable'])    ? $instance['stoppable']     : '';
    $pauseonhover = isset($instance['pauseOnHover']) ? $instance['pauseOnHover']  :
                    isset($instance['pauseonhover']) ? $instance['pauseonhover']  : '';
    $fullscreen   = isset($instance['fullScreen'])   ? $instance['fullScreen']    :
                    isset($instance['fullscreen'])   ? $instance['fullscreen']    : '';
    $swipe        = isset($instance['swipe'])        ? $instance['swipe']         : '';
    $class        = isset($instance['class'])        ? $instance['class']         : '';
    $color        = isset($instance['color'])        ? $instance['color']         : '';
    $size         = isset($instance['size'])         ? $instance['size']          : '';
    $height       = isset($instance['height'])       ? $instance['height']        : '';
    $ratio        = isset($instance['ratio'])        ? $instance['ratio']         : '';
    $tabsclass    = isset($instance['tabsclass'])    ? $instance['tabsclass']     : '';
    $order        = isset($instance['order'])        ? $instance['order']         : '';
    $orderby      = isset($instance['orderby'])      ? $instance['orderby']       : '';
    $meta_key     = isset($instance['meta_key'])     ? $instance['meta_key']      : '';

    $titleGfid =        $this->get_field_id('title')         ? $this->get_field_id('title')        : '';
    $sldstGfid =        $this->get_field_id('slideset')      ? $this->get_field_id('slideset')     : '';
    $autoGfid =         $this->get_field_id('auto')          ? $this->get_field_id('auto')         : '';
    $speedGfid =        $this->get_field_id('speed')         ? $this->get_field_id('speed')        : '';
    $paginationGfid =   $this->get_field_id('pagenation')    ? $this->get_field_id('pagenation')   :
                        $this->get_field_id('pagination')    ? $this->get_field_id('pagination')   : '';
    $tabsfirstGfid =    $this->get_field_id('tabsFirst')     ? $this->get_field_id('tabsFirst')    :
                        $this->get_field_id('tabsfirst')     ? $this->get_field_id('tabsfirst')    : '';
    $prevnextGfid =     $this->get_field_id('prevNext')      ? $this->get_field_id('prevNext')     :
                        $this->get_field_id('prevnext')      ? $this->get_field_id('prevnext')     : '';
    $pauseGfid =        $this->get_field_id('pause')         ? $this->get_field_id('pause')        : '';
    $stoppableGfid =    $this->get_field_id('stoppable')     ? $this->get_field_id('stoppable')    : '';
    $pauseonhoverGfid = $this->get_field_id('pauseOnHover')  ? $this->get_field_id('pauseOnHover') :
                        $this->get_field_id('pauseonhover')  ? $this->get_field_id('pauseonhover') : '';
    $fullscreenGfid =   $this->get_field_id('fullScreen')    ? $this->get_field_id('fullScreen')   :
                        $this->get_field_id('fullscreen')    ? $this->get_field_id('fullscreen')   : '';
    $swipeGfid =        $this->get_field_id('swipe')         ? $this->get_field_id('swipe')        : '';
    $classGfid =        $this->get_field_id('class')         ? $this->get_field_id('class')        : '';
    $colorGfid =        $this->get_field_id('color')         ? $this->get_field_id('color')        : '';
    $sizeGfid =         $this->get_field_id('size')          ? $this->get_field_id('size')         : '';
    $heightGfid =       $this->get_field_id('height')        ? $this->get_field_id('height')       : '';
    $ratioGfid =        $this->get_field_id('ratio')         ? $this->get_field_id('ratio')        : '';
    $tabsclassGfid =    $this->get_field_id('tabsclass')     ? $this->get_field_id('tabsclass')    : '';
    $orderGfid =        $this->get_field_id('order')         ? $this->get_field_id('order')        : '';
    $orderbyGfid =      $this->get_field_id('orderby')       ? $this->get_field_id('orderby')      : '';

    $titleGfname =        $this->get_field_name('title')         ? $this->get_field_name('title')        : '';
    $sldstGfname =        $this->get_field_name('slideset')      ? $this->get_field_name('slideset')     : '';
    $autoGfname =         $this->get_field_name('auto')          ? $this->get_field_name('auto')         : '';
    $speedGfname =        $this->get_field_name('speed')         ? $this->get_field_name('speed')        : '';
    $paginationGfname =   $this->get_field_name('pagenation')    ? $this->get_field_name('pagenation')   :
                          $this->get_field_name('pagination')    ? $this->get_field_name('pagination')   : '';
    $tabsfirstGfname =    $this->get_field_name('tabsFirst')     ? $this->get_field_name('tabsFirst')    :
                          $this->get_field_name('tabsfirst')     ? $this->get_field_name('tabsfirst')    : '';
    $prevnextGfname =     $this->get_field_name('prevNext')      ? $this->get_field_name('prevNext')     :
                          $this->get_field_name('prevnext')      ? $this->get_field_name('prevnext')     : '';
    $pauseGfname =        $this->get_field_name('pause')         ? $this->get_field_name('pause')        : '';
    $stoppableGfname =    $this->get_field_name('stoppable')     ? $this->get_field_name('stoppable')    : '';
    $pauseonhoverGfname = $this->get_field_name('pauseOnHover')  ? $this->get_field_name('pauseOnHover') :
                          $this->get_field_name('pauseonhover')  ? $this->get_field_name('pauseonhover') : '';
    $fullscreenGfname =   $this->get_field_name('fullScreen')    ? $this->get_field_name('fullScreen')   :
                          $this->get_field_name('fullscreen')    ? $this->get_field_name('fullscreen')   : '';
    $swipeGfname =        $this->get_field_name('swipe')         ? $this->get_field_name('swipe')        : '';
    $classGfname =        $this->get_field_name('class')         ? $this->get_field_name('class')        : '';
    $colorGfname =        $this->get_field_name('color')         ? $this->get_field_name('color')        : '';
    $sizeGfname =         $this->get_field_name('size')          ? $this->get_field_name('size')         : '';
    $heightGfname =       $this->get_field_name('height')        ? $this->get_field_name('height')       : '';
    $ratioGfname =        $this->get_field_name('ratio')         ? $this->get_field_name('ratio')        : '';
    $tabsclassGfname =    $this->get_field_name('tabsclass')     ? $this->get_field_name('tabsclass')    : '';
    $orderGfname =        $this->get_field_name('order')         ? $this->get_field_name('order')        : '';
    $orderbyGfname =      $this->get_field_name('orderby')       ? $this->get_field_name('orderby')      : '';

    ?>
    <p><label for="<?php echo $titleGfid; ?>"><?php _e('Title:'); ?></label>
    <input class="widefat" id="<?php echo $titleGfid; ?>" name="<?php echo $titleGfname; ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
<?php
    $aFSSldsets = get_terms('slidesets'); ?>
    <div>
<?php if(!empty($aFSSldsets) && !is_wp_error($aFSSldsets)){ ?>
      <label for="<?php echo $sldstGfid; ?>" title="Choose the set of Slides to display in this slideshow.">Slideset: </label>
      <select id="<?php echo $sldstGfid; ?>" name="<?php echo $sldstGfname; ?>">
<?php   foreach($aFSSldsets as $aFSSldset){
          if($aFSSldset->term_id==esc_attr($slideset))
          {
            $selected = ' selected="selected"';
          }else{
            $selected = '';
          } ?>
        <option value="<?php echo $aFSSldset->term_id; ?>"<?php echo $selected; ?>><?php echo $aFSSldset->name; ?></option>
<?php   } ?>
        <option value=""<?php if(empty($slideset)){ echo ' selected="selected"';} ?>>All Slides</option>
      </select>
      <?php
    }
    else{ ?>
      <label for="<?php echo $sldstGfid; ?>" title="Create Slidesets and choose one here, to display a select group of Slides.">Slideset: </label>
      <select id="<?php echo $sldstGfid; ?>" name="<?php echo $sldstGfname; ?>">
        <option value=""<?php if(empty($slideset)){ echo ' selected="selected"';} ?>>All Slides</option>
      </select>
<?php } ?>
    </div>
    <fieldset class="wp-core-ui">
      <div>
        <input class="aFswitch" type="checkbox"
        name="<?php echo $autoGfname; ?>"
        id="<?php echo $autoGfid; ?>" value="true"
        <?php checked('true',$auto); ?> />
        <label class="aFswitch" for="<?php echo $autoGfid; ?>" title="Automatically advance through the slides. Default: OFF (false)">Auto-advance Slides <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="0">ON</b><b data-default="1">OFF</b></span></label>
      </div>
      <div>
        <label class="aFtext" for="<?php echo $speedGfid; ?>" title="Time between slide transitions,in milliseconds. Default: 7000">Time between Slides (speed):</label> <input id="<?php echo $speedGfid; ?>" class="small-text" type="number" min="0" step="1" name="<?php echo $speedGfname; ?>" value="<?php echo esc_attr($speed); ?>" />
        <span class="description">1000&nbsp;=&nbsp;1&nbsp;sec.</span>
      </div>
      <div>
        <input class="aFswitch" type="checkbox" name="<?php echo $pauseonhoverGfname; ?>" id="<?php echo $pauseonhoverGfid; ?>" value="false" <?php checked('false',$pauseonhover); ?> />
        <label class="aFswitch" for="<?php echo $pauseonhoverGfid; ?>" title="Pause the slideshow whenever a mouse rolls over it. Default: ON (true)"><span class="aFhide">Don't </span><span class="aFup">p</span>ause on hover/mouseover <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="1">ON</b><b data-default="0">OFF</b></span></label>
      </div>
      <div>
        <input class="aFswitch" type="checkbox" name="<?php echo $pauseGfname; ?>" id="<?php echo $pauseGfid; ?>" value="true" <?php checked('true',$pause); ?> />
        <label class="aFswitch" for="<?php echo $pauseGfid; ?>" title="Generate controller for pausing auto-advancement. Default: OFF (false)"><span class="aFhide">Add a </span>Pause controller <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="0">ON</b><b data-default="1">OFF</b></span></label>
      </div>
      <div>
        <input class="aFswitch" type="checkbox" name="<?php echo $prevnextGfname; ?>" id="<?php echo $prevnextGfid; ?>" value="false" <?php checked('false',$prevnext); ?> />
        <label class="aFswitch" for="<?php echo $prevnextGfid; ?>" title="Generate controls for advancing(next Slide)and regressing(previous Slide). Default: ON (true)"><span class="aFhide">Remove </span>Previous &amp; Next controls <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="1">ON</b><b data-default="0">OFF</b></span></label>
      </div>
      <div><label for="<?php echo $paginationGfid; ?>" title="Add tabs, labels and/or thumbnails.">Tabs (pagination): </label>
        <select id="<?php echo $paginationGfid; ?>" name="<?php echo $paginationGfname; ?>" type="text">
          <option value="" <?php echo ($pagination=='')?'selected':''; ?>>OFF</option>
          <option value="ON" <?php echo ($pagination=='ON')?'selected':''; ?>>ON</option>
          <option value="L" <?php echo ($pagination=='L')?'selected':''; ?>>Labels</option>
          <option value="T" <?php echo ($pagination=='T')?'selected':''; ?>>Thumbnails</option>
          <option value="LT" <?php echo ($pagination=='LT')?'selected':''; ?>>Labels &amp; Thumbnails</option>
        </select>
      </div>
      <div>
        <input class="aFswitch" type="checkbox" name="<?php echo $tabsfirstGfname; ?>" id="<?php echo $tabsfirstGfid; ?>" value="true" <?php checked('true',$tabsfirst); ?> />
        <label class="aFswitch" for="<?php echo $tabsfirstGfid; ?>" title="Place the tabs before the slideshow. Default: NO (false)">Place tabs <span style="text-decoration:underline;">before</span> slideshow <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="0">YES</b><b class="wp-ui-primary" data-default="1">NO</b></span></label>
      </div>
      <div><label for="<?php echo $swipeGfid; ?>" title="Change swipe direction and behavior or disallow swiping.">Swipe: </label>
        <select id="<?php echo $swipeGfid; ?>" name="<?php echo $swipeGfname; ?>" type="text">
          <option value="horizontal" <?php echo ($swipe=='horizontal')?'selected':''; ?>>Horizontal (&#11020;)</option>
          <option value="vertical" <?php echo ($swipe=='vertical')?'selected':''; ?>>Vertical (&#11021;)</option>
          <option value="both" <?php echo ($swipe=='both')?'selected':''; ?>>Both (prevent scrolling)</option>
          <option value="any" <?php echo ($swipe=='any')?'selected':''; ?>>Any (allow scrolling)</option>
          <option value="false" <?php echo ($swipe=='false')?'selected':''; ?>>OFF</option>
        </select>
      </div>
      <div>
        <input class="aFswitch" type="checkbox" name="<?php echo $stoppableGfname; ?>" id="<?php echo $stoppableGfid; ?>" value="false" <?php checked('false',$stoppable); ?> />
        <label class="aFswitch" for="<?php echo $stoppableGfid; ?>" title="All navigational controls stop the slideshow from auto-advancing until the pause control is clicked. Default: ON (true)"><span class="aFhide">Don't </span><span class="aFup">s</span>top auto-advance on interaction <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="1">ON</b><b data-default="0">OFF</b></span></label>
      </div>
      <div>
        <input class="aFswitch" type="checkbox" name="<?php echo $fullscreenGfname; ?>" id="<?php echo $fullscreenGfid; ?>" value="true" <?php checked('true',$fullscreen); ?> />
        <label class="aFswitch" for="<?php echo $fullscreenGfid; ?>" title="Generate a control for displaying the slideshow in fullscreen mode. Default: OFF (false)"><span class="aFhide">Add a </span>Fullscreen controller <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="0">ON</b><b data-default="1">OFF</b></span></label>
      </div>
      <div>
        <input class="aFswitch" type="checkbox" name="<?php echo $orderGfname; ?>" id="<?php echo $orderGfid; ?>" value="DESC" <?php checked('DESC',$order); ?> />
        <label class="aFswitch" for="<?php echo $orderGfid; ?>" title="Ascend = sort Slide from lowest to highest value. Descend = sort Slide from highest to lowest value. Default: DESCEND"><span class="aFhide">Descend </span><span class="aFup">s</span>ort order <span class="aFswitch" style="display:none;"><b class="wp-ui-highlight" data-default="1">ASCEND</b><b class="wp-ui-primary" data-default="0">DESCEND</b></span></label>
      </div>
      <p>
        <label for="<?php echo $orderbyGfid; ?>" title="Which property to sort the slides by. Default: date">Sort by: </label><input id="<?php echo $orderbyGfid; ?>" class="widefat" type="text" name="<?php echo $orderbyGfname; ?> " placeholder="examples: date, priority, title, name, ID, rand" value="<?php echo esc_attr($orderby); ?>" />
      </p>
      <p>
        <label for="<?php echo $colorGfid; ?>" title="Color of the controls (may affect text in Slides as well). Default: inherited">Color: </label><input id="<?php echo $colorGfid; ?>" class="widefat" type="text" name="<?php echo $colorGfname; ?> " placeholder="examples: #fff, rgb(255,135,125), orange" value="<?php echo esc_attr($color); ?>" />
      </p>
      <p>
        <label for="<?php echo $sizeGfid; ?>" title="Size of the controls (may affect text in Slides as well). Default: inherited">Size: </label><input id="<?php echo $sizeGfid; ?>" class="widefat" type="text" name="<?php echo $sizeGfname; ?> " placeholder="examples: 22px, 1.6em, 110%" value="<?php echo esc_attr($size); ?>" />
      </p>
      <p>
        <label for="<?php echo $heightGfid; ?>" title="Overall height of slideshow. Default: unspecified">Height: </label><input id="<?php echo $heightGfid; ?>" class="widefat" type="text" name="<?php echo $heightGfname; ?> " placeholder="examples: 600px, 100vh, calc(400px + 2em), auto" value="<?php echo esc_attr($height); ?>" />
      </p>
      <p>
        <label for="<?php echo $ratioGfid; ?>" title="Aspect ratio of slideshow. Overrides Height. Default: unspecified">Aspect ratio: </label><input id="<?php echo $ratioGfid; ?>" class="widefat" type="text" name="<?php echo $ratioGfname; ?> " placeholder="examples: 16:9, 4x3 or preset (HD, square, half, portrait)" value="<?php echo esc_attr($ratio); ?>" />
      </p>
      <p>
        <label for="<?php echo $classGfid; ?>" title="Add CSS classes to the .addFuncSlides wrapper as needed.">Slideshow classes: </label><input id="<?php echo $classGfid; ?>" class="widefat" type="text" name="<?php echo $classGfname; ?>" value="<?php echo esc_attr($class); ?>" />
      </p>
      <p>
        <label for="<?php echo $tabsclassGfid; ?>" title="Add CSS classes to the .aFTabs wrapper as needed. Note: doesn't work if 'Tabs' is 'ON' unless 'Place tabs before slideshow' is also 'YES' (checked). Works with all other options ('Labels', 'Thumbnails', etc.)">Tabs classes: </label><input id="<?php echo $tabsclassGfid; ?>" class="widefat" type="text" name="<?php echo $tabsclassGfname; ?>" value="<?php echo esc_attr($tabsclass); ?>" />
      </p>
    </fieldset>

<?php }
#   Sanitize widget form values as they are saved
  public function update($new_instance,$old_instance)
  {
    $saveThese = array();

    $saveThese['title']      =  (!empty($new_instance['title']))        ? strip_tags($new_instance['title']): '';
    $saveThese['slideset']   =  (!empty($new_instance['slideset']))     ? strip_tags($new_instance['slideset']): '';
    $saveThese['auto']       =  (!empty($new_instance['auto']))         ? strip_tags($new_instance['auto']): '';
    $saveThese['speed']      =  (!empty($new_instance['speed']))        ? strip_tags($new_instance['speed']): '';
    $saveThese['pagination'] =  (!empty($new_instance['pagination']))   ? strip_tags($new_instance['pagination']): '';
    $saveThese['tabsfirst']  =  (!empty($new_instance['tabsfirst']))    ? strip_tags($new_instance['tabsfirst']): '';
    $saveThese['prevnext']   =  (!empty($new_instance['prevnext']))     ? strip_tags($new_instance['prevnext']): '';
    $saveThese['pause']      =  (!empty($new_instance['pause']))        ? strip_tags($new_instance['pause']): '';
    $saveThese['stoppable']  =  (!empty($new_instance['stoppable']))    ? strip_tags($new_instance['stoppable']): '';
    $saveThese['pauseonhover']= (!empty($new_instance['pauseonhover'])) ? strip_tags($new_instance['pauseonhover']): '';
    $saveThese['fullscreen'] =  (!empty($new_instance['fullscreen']))   ? strip_tags($new_instance['fullscreen']): '';
    $saveThese['swipe']      =  (!empty($new_instance['swipe']))        ? strip_tags($new_instance['swipe']): '';
    $saveThese['order']      =  (!empty($new_instance['order']))        ? strip_tags($new_instance['order']): '';
    $saveThese['orderby']    =  (!empty($new_instance['orderby']))      ? strip_tags($new_instance['orderby']): '';
    $saveThese['color']      =  (!empty($new_instance['color']))        ? strip_tags($new_instance['color']): '';
    $saveThese['size']       =  (!empty($new_instance['size']))         ? strip_tags($new_instance['size']): '';
    $saveThese['height']     =  (!empty($new_instance['height']))       ? strip_tags($new_instance['height']): '';
    $saveThese['ratio']      =  (!empty($new_instance['ratio']))        ? strip_tags($new_instance['ratio']): '';
    $saveThese['class']      =  (!empty($new_instance['class']))        ? strip_tags($new_instance['class']): '';
    $saveThese['tabsclass']  =  (!empty($new_instance['tabsclass']))    ? strip_tags($new_instance['tabsclass']): '';
    return $saveThese;
  }
}// class
#   register widget
function reg_aFSWdgt(){
  register_widget('aFSWdgt');
}
add_action('widgets_init','reg_aFSWdgt');




/*
    J S   in   F O O T E R
    ======================
    Javascript Initialization
*/

function aFSInit(){
  global $aFSInit;
  if(isset($aFSInit)){
    echo "\n";
    echo "<script id=\"aFSlidesInit\" type='text/javascript'>";
    echo $aFSInit."\n";
    echo "</script>\n";
  }
}
add_action('wp_footer','aFSInit');



/*
    A D M I N   I N C L U D E S
    ===========================
*/

add_action('admin_menu','aFSAddAdminMenu');
add_action('admin_init','aFSSettingsInit');
function aFSAddAdminMenu(){
  add_submenu_page('edit.php?post_type=slides','Slides Settings','Settings','manage_options','slides','aFSOptionsPage');
}
function aFSSettingsInit(){
  register_setting('aFSOptsPg','aFSOpts');
  add_settings_section(
    'aFSOptsPgSection',
    __('','aFS'),
    'aFSSettingsSection',
    'aFSOptsPg'
  );
  add_settings_field(
    'aFSDefaultCSS',
    __('Don\'t load default stylesheet','aFS'),
    'aFSDefaultCSSOpt',
    'aFSOptsPg',
    'aFSOptsPgSection'
  );
  add_settings_field(
    'aFSJSCSSOff',
    __('Don\'t load JS/CSS on&nbsp;every&nbsp;page','aFS'),
    'aFSJSCSSOffOpt',
    'aFSOptsPg',
    'aFSOptsPgSection'
  );
  add_settings_field(
    'aFSDefaultColor',
    __('Default color of controls','aFS'),
    'aFSDefaultColorOpt',
    'aFSOptsPg',
    'aFSOptsPgSection'
  );
  add_settings_field(
    'aFSDefaultSize',
    __('Default size of controls','aFS'),
    'aFSDefaultSizeOpt',
    'aFSOptsPg',
    'aFSOptsPgSection'
  );
}
function aFSMBInc(){
  require_once(plugin_dir_path( __FILE__ ).'metaboxes.php');
}
add_action('add_meta_boxes','aFSMBInc');
function aFSAdminInc(){
  require_once(plugin_dir_path( __FILE__ ).'settings.php');
  require_once(plugin_dir_path( __FILE__ ).'edit-page.php');
  require_once(plugin_dir_path( __FILE__ ).'mce-buttons.php');
  require_once(plugin_dir_path( __FILE__ ).'help-tab.php');
}
add_action('admin_init','aFSAdminInc');

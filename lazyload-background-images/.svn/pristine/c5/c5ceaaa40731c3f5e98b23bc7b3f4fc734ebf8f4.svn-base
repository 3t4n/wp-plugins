<?php

/**
 * @since 1.0.0
 * @author Proloy Bhaduri <support@proloybhaduri.com>
 */
class PBLZBG_Image_Processor
{

  public static $pblzbg_settings;

  public function __construct()
  {

    self::$pblzbg_settings = get_option('pb_lazybg_settings');
    add_filter('pblzbg_buffer', array($this, 'process_bg'));
    add_filter('pblzbg_buffer', array( $this, 'process_inline_bg') );
    add_action( 'wp_footer', array( $this, 'add_lazybg_code') );
  }

  public static function is_lazybg()
  {
    if (is_array(self::$pblzbg_settings) && count(self::$pblzbg_settings) > 0) {
      return (self::$pblzbg_settings['is_lazybg'] && intval(self::$pblzbg_settings['is_lazybg']) === 1) ? true : false;
    }
    return false;
  }

  public static function lazybg_includes()
  {
    if (is_array(self::$pblzbg_settings) && count(self::$pblzbg_settings) > 0) {
      return (self::$pblzbg_settings['lazybg_includes'] && self::$pblzbg_settings['lazybg_includes'] !== '') ? self::$pblzbg_settings['lazybg_includes'] : '';
    }
    return '';
  }

  public static function keyword_exists_in_array($arr_match, $source)
  {
    if (is_array($arr_match)) {
      foreach ($arr_match as $e) {
        if (strpos($source, $e) !== false)
          return true;
      }
      return false;
    }
  }

  public static function process_bg($content)
  {
    if( self::is_lazybg() ){
    $content = str_get_html($content);
    $includes =  preg_split('/\r\n|\r|\n/', self::lazybg_includes() );
    foreach ($includes as $bgix => $selector) {
      foreach ($content->find($selector) as $six => $s_selector) {
        $s_selector->class .= ' lazyload-bg';
       /* if (isset($s_selector->style)) :
          $s_selector->setAttribute('data-style', $s_selector->style);
          $s_selector->style = null;
        endif;*/
      }
    }
   }
    return $content;
  }

  public static function process_inline_bg( $content ){
    $exclude_keywords = apply_filters('lazyload_inline_bg_excludes', []);
    $checktags = array( 'div', 'section' , 'li' , 'p' , 'span' , 'header' , 'footer');
    $content = str_get_html( $content );
    foreach( $checktags as $tag){
        $tag_arr = $content->find( $tag );
        foreach( $tag_arr as $tgx => $element ){
        // Skip if excluded keyword found in the element
        if (self::keyword_exists_in_array($exclude_keywords, $element->outertext())) {
          continue;
        }
           if( $element->hasAttribute( 'style') &&  strpos( $element->style , 'background-image' ) !== false  ){
               if( strpos( $element->class, 'lazyload-bg') === false ){
                 $element->class .= ' lazyload-bg';
               }
           }
        }
    }
    return $content;
  }


  public static function add_lazybg_code(){
   ?>
   <style type="text/css" >
    .lazyload-bg{background-image: none!important;}
    </style>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() { var bglazyloadImages; if ("IntersectionObserver" in window) { bglazyloadImages = document.querySelectorAll(".lazyload-bg"); var bgimageObserver = new IntersectionObserver(function(entries, observer) { entries.forEach(function(entry) { if (entry.isIntersecting) { var bgimage = entry.target; bgimage.classList.remove("lazyload-bg"); bgimageObserver.unobserve(bgimage); } }); }); bglazyloadImages.forEach(function(image) { bgimageObserver.observe(image); }); } else { var bglazyloadThrottleTimeout; bglazyloadImages = document.querySelectorAll(".lazyload-bg"); function bglazyload () { if(bglazyloadThrottleTimeout) { clearTimeout(bglazyloadThrottleTimeout); } bglazyloadThrottleTimeout = setTimeout(function() { var bgscrollTop = window.pageYOffset; bglazyloadImages.forEach(function(img) { if(img.offsetTop < (window.innerHeight + bgscrollTop)) { img.src = img.dataset.src; img.classList.remove('lazyload-bg'); } }); if(bglazyloadImages.length == 0) { document.removeEventListener("scroll", bglazyload); window.removeEventListener("resize", bglazyload); window.removeEventListener("orientationChange", bglazyload); } }, 20); } document.addEventListener("scroll", bglazyload); window.addEventListener("resize", bglazyload); window.addEventListener("orientationChange", bglazyload); } })
    </script>

   <?php
  }
}
new PBLZBG_Image_Processor();

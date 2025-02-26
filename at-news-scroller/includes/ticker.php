<?php 
if(! $at_news_scroller['opt-categories']){
  $at_category = "0";
}
else{
  $at_category = implode(',',$at_news_scroller['opt-categories'] ) ;
}
$args = array(
    'numberposts' => $at_news_scroller['opt-post-count'],
    'category' => $at_category
    );
$recent_posts = wp_get_recent_posts( $args );

?>

    <div id="at_scroll_container">
      <div class="at_scroll_title at_scroll_title_right-arrow" id="at_scroll_text">Latest News</div>
      <div class="at_scroll_div_content">
        <div class="at_scroll_area">
          <ul id="at_ticker">
          <?php 

          foreach( $recent_posts as $recent ){
            if ($recent["post_title"] == ""){
              $title_post = get_permalink($recent["ID"]);
            }
            else {
               $title_post = $recent["post_title"];
            }
    echo '<li class="at-news-ticker-li"><a href="' . get_permalink($recent["ID"]) . '">' .   $title_post.'</a> </li> ';
  }

          ?>
           <li class="at-news-ticker-li">&nbsp;</li>
            
          </ul>
        </div>
      </div>
    </div>

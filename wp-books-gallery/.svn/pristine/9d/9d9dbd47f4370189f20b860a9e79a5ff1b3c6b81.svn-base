<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( $wbg_display_total_books ) {
    $wbg_prev_posts = ($wbgPaged - 1) * $wbgBooks->query_vars['posts_per_page'];
    $wbg_from = 1 + $wbg_prev_posts;
    $wbg_to = count( $wbgBooks->posts ) + $wbg_prev_posts;
    $wbg_of = $wbgBooks->found_posts;
    ?>
      <div class="wbg-total-books-title">
        <?php 
    _e( 'Showing', WBG_TXT_DOMAIN );
    ?> <span><?php 
    printf(
        '%s-%s of %s',
        $wbg_from,
        $wbg_to,
        $wbg_of
    );
    ?></span> <?php 
    _e( 'Books', WBG_TXT_DOMAIN );
    ?>
      </div>
      <?php 
}
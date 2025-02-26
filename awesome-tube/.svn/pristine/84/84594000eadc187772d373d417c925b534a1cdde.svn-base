<?php

// Awetube Social Share function
function awetube_social_sharer() { ?>
	<div class="share-video">
		<span><?php esc_html_e('Share the Video', 'blutube'); ?></span>
		<ul>
			<li>
				<a href="https://www.instagram.com/sharer.php?u=<?php the_permalink(); ?>"  onclick="javascript:window.open(this.href,
			'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
					<i class="fab fa-instagram"></i>
				</a>
			</li>
			<li>
				<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo urlencode(get_the_title()); ?>"  onclick="javascript:window.open(this.href,
			'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
					<i class="fab fa-twitter"></i>
				</a>
			</li>
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"  onclick="javascript:window.open(this.href,
			'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
					<i class="fab fa-facebook-f"></i>
				</a>
			</li>
		</ul>
	</div>
<?php }

// Awetube shorten date publish post
function awetube_time_elapsed_string( $datetime, $full = false ) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
}

// Awetube shorten big number > 1000
function awetube_shorten_number( $value ) {
	if ( $value >= 1000000 ) {
		$value = round( $value / 1000000, 1 ) . esc_html_x( 'M', 'formatted number suffix', 'blutube' );
	} elseif ( $value >= 1000 ) {
		$value = round( $value / 1000, 1 ) . esc_html_x( 'k', 'formatted number suffix', 'blutube' );
	}

	return $value;
}

// Awetube update post view count per load
function awetube_post_view_count($postID) {
    $countKey = 'post_views_count';
	$fake_count_meta = 'awetube_fake_count';
    $count = get_post_meta($postID, $countKey, true);
	$use_fake_count = carbon_get_theme_option( 'awetube_use_fake_count' );
	if( true === $use_fake_count ) {
		$fake_count = carbon_get_theme_option( 'awetube_fake_count' );
		delete_post_meta( $postID, $fake_count_meta );
        add_post_meta( $postID, $fake_count_meta, $fake_count );
	} else {
		delete_post_meta( $postID, $fake_count_meta );
	}

    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

// Awetube - Elementor video select dropdown
function awetube_order_by() {
    $awtube_orderby = array(
    
        'none'                  => 'none',
        'ID'                    => 'ID',
        'author'                => 'Author',
        'title'                 => 'Title',
        'name'                  => 'Name',
        'type'                  => 'Type',
        'date'                  => 'Date',
        'modified'              => 'Modifiede Time',
        'parent'                => 'Parent',
        'rand'                  => 'Random',
        'comment_count' => 'Total Comment',
        'menu_order'    => 'Menu Order',
        'meta_value'    => 'Popular'
    
    );
    
    return $awtube_orderby;
}

function awetube_get_video_category() {
    $args = array(
        'taxonomy' => 'video-category',
        'hide_empty' => false,
    );
    $output_categories = array('All');
	$categories = get_terms($args);

	foreach($categories as $category) { 
		$output_categories[$category->term_id] = $category->name;
	}
	return $output_categories;
}
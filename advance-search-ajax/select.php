<?php

/**
 * select title/cats/tag/author/date for user search
 *
 * search title change
 *
 * select option
 *
 * jQuery nice Select 
 */

   echo "<script>
	jQuery(document).ready(function() {
	  jQuery('select').niceSelect();
	});
</script>";

if (get_option('title') && get_option('title') != '')
    echo '<p id="search-title">' . esc_attr(get_option("title")) . '</p>';

// select Category
if (get_option('e_cats') && get_option('e_cats') != '') {
    $categories = get_categories();
    $cat_option = '<div id="box1"><li><ul>';

    $cat_option .= '<li class="cat-label">' . __('Category', 'search_me') . '</li>';

    $cat_option .= '<li class="search-cat"><div class="select-style"><select name="cat" ><option value="">' . __('All Cats', 'search_me') . '</option>';
    foreach ($categories as $category) {
        $cat_option .= '<option value="' . esc_attr($category->cat_name) . '"';
        $cat_option .= '>' . esc_attr($category->cat_name);
        $cat_option .= '</option>';
    }
    $cat_option .= '</select></li></ul></li></div>';
}

// select tag
if (get_option('e_tag') && get_option('e_tag') != '') {
    $tags = get_categories('taxonomy=post_tag&number=10');
    $tag_option = '<div id="box2"><li><ul>';

    $tag_option .= '<li class="tag-label">' . __('Tag', 'search_me') . '</li>';

    $tag_option .= '<li class="search-tag" ><select name="tag" ><option value="">' . __('All Tags', 'search_me') . '</option>';
	
    foreach ($tags as $tag) {
        $tag_option .= '<option value="' . esc_attr($tag->slug) . '"';
        $tag_option .= '>' . esc_attr($tag->slug);
        $tag_option .= '</option>';
    }

    $tag_option .= '</select></li></ul></li></div>';

}

// select author
if (get_option('e_author') && get_option('e_author') != '') {

    $authors = get_users(array('who' => 'authors', 'fields' => array('id', 'display_name')));

    $author_option = '<div id="box3"><li><ul>';

    $author_option .= '<li class="author-label">' . __('Author ', 'search_me') . '</li>';

    $author_option .= '<li class="search-author" ><select name="author" ><option value="">' . __('All Author', 'search_me') . '</option>';

    foreach ($authors as $author) {

        $author_option .= '<option value="' . esc_attr($author->display_name) . '"';

        $author_option .= '>' . esc_attr($author->display_name);

        $author_option .= '</option>';
    }

    $author_option .= '</select></li></ul></li></div>';

}

// select date
if (get_option('e_date') && get_option('e_date') != '') {

    $archive_option = '<div id="box4"><li><ul>';

    $archive_option .= '<li class="archive-field">
			
					<input type="text" value="' . esc_attr($year_selected) . '" name="year" id="date-entry" id="year" size="3" placeholder="' . __('Year', 'search_me') . '" />
					
					<input type="text" value="' . esc_attr($month_selected) . '" name="monthnum" id="date-entry" id="monthnum" size="3" placeholder="' . __('Month', 'search_me') . '" />
					
					<input type="text" value="' . esc_attr($day_selected) . '" name="day" id="date-entry" id="day" size="1" placeholder="' . __('Day', 'search_me') . '" />
					
			</li></ul></li></div>';

}

// enter keyword
if (get_option('e_keyword') && get_option('e_keyword') != '') {

    $field_option = '<div id="box5"><li><ul>';

    $field_option .= '<li class="search-field"><input type="text" id="search-entry" value="' . esc_attr(get_search_query()) . '" name="s"  placeholder="' . __('Keyword', 'search_me') . '" /></li>
			
				</ul></li></div>';

}


/**
 * form for post entery data
 *
 * submit to ajax function
 */
 
 $url = home_url();
 
echo '<form  id="search_me" method="post" action="'.esc_url( $url ).'" >
					
					';

echo $cat_option;

echo $tag_option;

echo $author_option;

echo $archive_option;

echo $field_option;
echo  wp_nonce_field( 'action_advance_security', 'name_advance_security' );
echo ' <div id="box6"><input type="submit" id="search-submit" value="search!" /> </div>
						

					
					</form>';
		
		


			
			
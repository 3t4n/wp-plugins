<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Add series dates to taxamony columns
add_filter( 'manage_edit-sermon_series_columns', 'asp_taxonomy_columns_series_details', 1);
add_filter( 'manage_sermon_series_custom_column', 'asp_taxonomy_columns_series_details_manage', 1, 3);

function asp_taxonomy_columns_series_details( $columns ) {
    $columns['series-date'] = 'Series Dates';
    return $columns;
}

function asp_taxonomy_columns_series_details_manage( $out ,$column_name, $term_id) {
    global $wp_version, $asp_date_format;
    $asp_series_id = $term_id;

    if ( $column_name == 'series-date' ) {
        // Query for the oldest and newest sermons in this series.
        $args = array(
            'post_type' => 'sermons',
            'tax_query' => array(
                array(
                    'taxonomy' => 'sermon_series',
                    'field'    => 'term_id',
                    'terms'    => $asp_series_id,
                ),
            ),
            'posts_per_page' => 1,
            'order' => 'ASC',
            'orderby' => 'date',
        );
        $query = new WP_Query( $args );
        $oldest = $query->have_posts() ? date($asp_date_format, strtotime($query->posts[0]->post_date)) : '';

        $args['order'] = 'DESC';
        $query = new WP_Query( $args );
        $newest = $query->have_posts() ? date($asp_date_format, strtotime($query->posts[0]->post_date)) : '';

        $asp_sermon_count = $query->found_posts;
        if ($asp_sermon_count == 1) {
            $series_dates = $oldest;
        } else if (!empty($oldest) && !empty($newest)) {
            $series_dates = "$oldest - $newest";
        } else {
            $series_dates = '';
        }

        if( ( ( float )$wp_version )<3.1 )
            return $series_dates;
        else
            echo "$series_dates";
    }
}


// Make series detail columns sortable
function asp_register_series_details_column_for_issues_sortable( $columns ) {
  $columns['series-date'] = 'Date';
		return $columns;
}
add_filter('manage_edit-sermon_series_sortable_columns', 'asp_register_series_details_column_for_issues_sortable');


// Change order of series details admin column
function asp_series_admin_column_order( $defaults ) {
    $new = array();
    $tags = isset( $defaults['tags'] ) ? $defaults['tags'] : '';
    unset($defaults['tags']);
    foreach($defaults as $key=>$value) {
        if($key=='slug') {
           $new['series-date'] = $tags;
        }
        $new[$key]=$value;
    }
    return $new;
}
add_filter('manage_edit-sermon_series_columns', 'asp_series_admin_column_order');


// Remove sermon series description from admin column
add_filter('manage_edit-sermon_series_columns', 'asp_series_admin_column_remove_description');
function asp_series_admin_column_remove_description ( $columns ) {
    if( isset( $columns['description'] ) )
        unset( $columns['description'] );
    return $columns;
}

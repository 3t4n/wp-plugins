<?php
echo '<div class="awcpt-nav awcpt-head-left-nav">';

if ( ! empty( $nav_head_left_elems ) ) {
    foreach( $nav_head_left_elems as $elem ) {
        // Sanitize the element ID before using it
        $elem_id = isset($elem['id']) ? sanitize_key($elem['id']) : '';
        // Check if the sanitized element ID is valid before including files
        error_log(print_r($elem_id,true));
        switch ( $elem_id ) {
            
            case 'sortby':
                include( $this->filters_dir . '/sort.php' );
                break;
            case 'resultcount':
                include( $this->filters_dir . '/result-count.php' );
                break;
            case 'resultperpage':
                include( $this->filters_dir . '/results-per-page.php' );
                break;
            case 'catfilter':
                include( $this->filters_dir . '/category-filter.php' );
                break;
            case 'pricefilter':
                include( $this->filters_dir . '/price-filter.php' );
                break;
            case 'search':
                include( $this->filters_dir . '/search.php' );
                break;
            case 'availabilityfilter':
                include( $this->filters_dir . '/availability-filter.php' );
                break;
            case 'onSalefilter':
                include( $this->filters_dir . '/onsale-filter.php' );
                break;
            case 'ratingfilter':
                include( $this->filters_dir . '/rating-filter.php' );
                break;
            case 'clearfilters':
                include( $this->filters_dir . '/clear-filters.php' );
                break;
            case 'cHtml':
                include( $this->filters_dir . '/html-filter.php' );
                break;
            default:
                return;
        }
    }
}

echo '</div>';

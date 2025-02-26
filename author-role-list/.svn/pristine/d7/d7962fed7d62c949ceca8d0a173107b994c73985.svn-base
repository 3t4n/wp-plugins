<?php
/**
 * Pagination - Show numbered pagination for author list page.
 *
 * This template can be overridden by copying it to yourtheme/template-parts/pagination.php.
 *
 * @author 		Roopesh
 * @package 	author-list/template-parts
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<nav class="author-list-pagination">
	<?php
		global $total_pages;
		echo paginate_links( apply_filters( 'author_list_pagination_args',array( 
			'base'    		=> esc_url_raw( str_replace( '999999999', '%#%', get_pagenum_link( '999999999' ) ) ),
			'format'  		=> '?paged=%#%',
			'current' 		=> max( 1, get_query_var( 'paged' ) ),
			'total'   		=> $total_pages,
			'prev_text'		=> '&larr;',
			'next_text'		=> '&rarr;',
			'end_size'		=> 3,
			'mid_size'		=> 3,
		) ) );
	?>
</nav>

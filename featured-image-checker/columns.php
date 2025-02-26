<?php

Class FIC_Columns{

	function fic_register_custom_columns ( $column_name ) {
		
		global $post;
		
		switch ($column_name) {
	    	case 'fic_featured_image':
	        	if( has_post_thumbnail( $post->ID ) )
					echo "<span style='color:#1CAD3F'>Yes</span>";
		    	else
		        	echo "<span style='color:rgb(221,54,54);'>No</span>";
		}
	} // End register_custom_columns()

	function fic_register_custom_column_headings ( $columns ) {
		
		$columns['fic_featured_image'] = 'Featured Image';
		return $columns;
	} // End register_custom_column_headings()
}
<?php
function archive_widget_collapsed_with_css_generate_html( $posts_number, $display, $style ){

	$get_archives = wp_get_archives( 'type=monthly&echo=0' );
	$archives_array = explode( "\n", $get_archives );
	$archives_array = array_filter( $archives_array, 'strlen' );

	if( $posts_number ) {
		$get_archives_num = wp_get_archives( 'type=monthly&echo=0&show_post_count=1' );
		$archives_num_array = explode( "\n", $get_archives_num );
		$archives_num_array = array_filter( $archives_num_array, 'strlen' );
	}

	preg_match('/[0-9]/', $style, $class );
	$archive_html = '<div class="awcwc_' . $class[0] . ' awcwc_wrap">';

	$ca = __( 'Collapse all', 'archive-widget-collapsed-with-css' );
	$dcty = __( 'Don\'t collapse latest year', 'archive-widget-collapsed-with-css' );
	$dca = __( 'Don\'t collapse all', 'archive-widget-collapsed-with-css' );

	for( $i = 0; $i < count( $archives_array ); $i++ ){

		preg_match('/<li><a.*?[\'|"](.*?)[\'|"]>(.*?)<\/a>/', $archives_array[$i], $date );

		if( strstr($date[2],'年') ){
			$year = str_replace( array('年','月'), '/', $date[2] ) . '1';
			$year = str_replace( ' ', '', $year );
			$year = date( "Y", strtotime( $year ) );
			$year_title = $year . '年';
			$month = str_replace( array('年',$year,' '),'',$date[2] );
		}else{
			$year = date( "Y", strtotime( $date[2] ) );
			$year_title = $year;
			$month = str_replace( array($year,' '),'',$date[2] );
		}

		$post_num = ''; 
		if( $posts_number ) {
			preg_match('/[0-9]+/', str_replace( $date[2], '', strip_tags( $archives_num_array[$i] )), $num );
			$post_num = '<span class="awcwc_num">' . $num[0] . '</span>';
		}

		if( $i == 0 ){
			$archive_html .= '<div class="awcwc_block"><input type="checkbox"';
			if( $display != $ca ) $archive_html .= ' checked';
			$archive_html .= '><div class="awcwc_year">' . $year_title . '</div><ul>';
			$archive_html .= '<li><a href="' . $date[1] . '"><span class="awcwc_list_icon"></span>' . $month . $post_num . '</a></li>';
		}elseif( !strstr( $archives_array[$i - 1], $year ) ){
			if( $i != '0' )	$archive_html .= '</ul></div>';
			$archive_html .= '<div class="awcwc_block"><input type="checkbox"';
			if( $display == $dca ) $archive_html .= ' checked';
			$archive_html .= '><div class="awcwc_year">' . $year_title . '</div><ul>';
			$archive_html .= '<li><a href="' . $date[1] . '"><span class="awcwc_list_icon"></span>' . $month . $post_num . '</a></li>';
		}else{
			$archive_html .= '<li><a href="' . $date[1] . '"><span class="awcwc_list_icon"></span>' . $month . $post_num . '</a></li>';
		}

	}

	$allowed_html = array(
		'input' => array( 'id' => array (), 'class' => array (), 'type' => array (), 'checked' => array (), ),
		'a' => array( 'id' => array (), 'class' => array (), 'href' => array () ),
		'div' => array( 'id' => array (), 'class' => array () ),
		'span' => array( 'id' => array (), 'class' => array () ),
		'ul' => array( 'id' => array (), 'class' => array () ),
		'li' => array( 'id' => array (), 'class' => array () )
	);

	echo wp_kses( $archive_html . '</ul></div></div>', $allowed_html );

}
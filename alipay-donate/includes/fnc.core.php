<?php 

//-----------------------------------------------------------------------
// Set the post ids , sticky, hotest, comment_most, latest posts';
//-----------------------------------------------------------------------
function ws_alido_updatePostIdsCol( $options ){
	$arr_postIds = array_keys(array_flip(array_merge(
	ws_alido_updateSticky($options),
	ws_alido_updateHotest($options),
	ws_alido_updateLatest($options),
	ws_alido_updateComost($options)  )));	
	return $arr_postIds;
}

function ws_alido_updateSticky( $opts ){
	$tog_f = 'show_sticky';
	if( isset($_POST[$tog_f]) && $_POST[$tog_f] == 'close')
		return array();
	elseif( $opts->get($tog_f) == 'close' )
		return array();	
		
	return get_option('sticky_posts');
}

function ws_alido_updateHotest( $opts ){
	$tog_f = 'show_view';
	$num_f = $tog_f. '_num';
	if( isset($_POST[$tog_f]) && $_POST[$tog_f] == 'close')
		return array();
	elseif( $opts->get($tog_f) == 'close' )
		return array();	

	if( isset($_POST[$num_f]) )
		$num = intval($_POST[$num_f]);
	else{
		$num = $opts->get($num_f);
	}	
	return ws_alido_updatePostIds( $num, 'views' );
}

function ws_alido_updateLatest( $opts ){
	
	$tog_f = 'show_latest';
	$num_f = $tog_f. '_num';
	if( isset($_POST[$tog_f]) && $_POST[$tog_f] == 'close')
		return array();
	elseif( $opts->get($tog_f) == 'close' )
		return array();	

	if( isset($_POST[$num_f]) )
		$num = intval($_POST[$num_f]);
	else{
		$num = $opts->get($num_f);
	}	
	
	return ws_alido_updatePostIds( $num, 'post_date' );
}

function ws_alido_updateComost( $opts ){
	
	$tog_f = 'show_comment';
	$num_f = $tog_f. '_num';
	if( isset($_POST[$tog_f]) && $_POST[$tog_f] == 'close')
		return array();
	elseif( $opts->get($tog_f) == 'close' )
		return array();	

	if( isset($_POST[$num_f]) )
		$num = intval($_POST[$num_f]);
	else{
		$num = $opts->get($num_f);
	}	
	return ws_alido_updatePostIds( $num, 'comment_count' );
}

function ws_alido_updatePostIds( $num, $orderby, $order='DESC' ){
	if( intval($num) > 0 ){
		$num = intval($num);
		$args = array( 'numberposts' => $num, 'orderby' => $orderby,'order'=>$order);
		$posts = get_posts( $args );
		$arrTemp = array();
		foreach( $posts as $post ){
			$arrTemp[] = $post->ID;
		}
		return $arrTemp;
	}else{
		
		return array();		
	}
}
/*Part End*/

//-----------------------------------------------------------------------
// BOOLEAN: IF TO SHOW THE DONATE-BOARD IN THIS POST;
//-----------------------------------------------------------------------
function ws_alido_isPostToShow( $postId ){
	
	require_once( WS_ALIDO_INC_DIR . '/cls.option.php' );
	$options = new WS_AliDo_Option( WS_ALIDO_ID );
	$show_all = $options->get('show_all');
	if( $show_all == 'all' ){
		return true;	
	}elseif( $show_all == 'rand' ){
		return ( rand(1,100) > 50 )?true:false;
	}elseif( empty($show_all) ){
		return false;	
	}else{
		return in_array( $postId, $options->get('showPostIds'));
	}
	
	
}


?>
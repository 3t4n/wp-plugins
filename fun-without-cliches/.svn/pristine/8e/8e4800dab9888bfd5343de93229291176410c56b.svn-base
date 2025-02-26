<?php
/*
Plugin Name: Fun without Cliches
Plugin URI: http://www.wp-fun.co.uk/2008/12/06/fun-without-cliches/
Description: Marks up common cliches so you can see them in your previews
Author: Andrew Rickmann
Version: 1.0.1
Author URI: http://www.wp-fun.co.uk
Generated At: www.funwithwizards.com;
*/
class fwo_cliches
{
	/**	* Constructor - PHP5 only	*/	public function __construct(){
		add_filter('the_content',array($this,'filter_content'));
	}
	
	public function filter_content($content){
		//if not a preview do nothing to it
		if ( is_preview() ){
			//get the array
			@include(dirname(__FILE__).'/cliche_array.php');
			//make sure it included ok
			if ( is_array($cliche_array) ){
				foreach( $cliche_array as $cliche ){
					$content = str_ireplace($cliche, '<span style="background-color:#ff0080;">'.$cliche.'</span>', $content);
				}
			}
		}
		return $content;
	}

}
$fwo_cliches = new fwo_cliches();
/* Author's Tip of the Day: A man without Disco is like a plane without wings. Embrace your freedom. */
?>

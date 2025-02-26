<?php

class ContentUnlockedFitness extends WP_Widget 
{

	public function __construct() {

		$widget_ops = array( 
			'classname' => 'ContentUnlockedFitness',
			'description' => 'ContentUnlocked Fitness',
		);
		parent::__construct( 'ContentUnlockedFitnesswidget', 'ContentUnlockedFitness', $widget_ops );

	}

	public function form($instance)
	{
		extract($instance);

		$default = array( 
			'title' => __(''),
        	'code'=> __('')
			);


		$instance = wp_parse_args( (array)$instance, $default );			
		
		$myapikey = get_option( 'ContentUnlocked_FITNESS_apikey' );	        				
		$mychapter = $instance['code'];
		$mybookid = 103;
	
		echo '<p>';		        				
        $myurl = 'http://ebookcvm.cloudapp.net/ebookc5/TOCWP5-inc.asp?bookid=' . $mybookid  .'&callbackurl=dummy&formid=' .  $this->get_field_id('code') . '&formname=' . $this->get_field_name('code') . '&formselected=' . $instance['code'] . '&customerid=' . $myapikey;


global $wp_version;
$args = array(
    'timeout'     => 50,
    'redirection' => 5,
    'httpversion' => '1.0',
    'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
    'blocking'    => true,
    'headers'     => array(),
    'cookies'     => array(),
    'body'        => null,
    'compress'    => false,
    'decompress'  => true,
    'sslverify'   => true,
    'stream'      => false,
    'filename'    => null
); 

  	$myreturnarray = wp_remote_get($myurl, $args);

        //$myreturnarray = wp_remote_get($myurl);
        echo $myreturnarray['body'];                
    echo '</p>';

	}

	public function update($new_instance, $old_instance) 
	{
		$instance = $old_instance;        
		$instance['code'] = $new_instance['code'];
		return $instance;
	}

		
	public function widget($args, $instance) 
	{        
		extract($args, EXTR_SKIP);		
		extract($instance);

		echo $before_widget;

		$myapikey = get_option( 'ContentUnlocked_FITNESS_apikey' );
		$mychapter = $instance['code'];
		$mybookid = 103;
		
		echo '<div class="Contentoro_Fitness">';
		       
	        $myurl = 'http://ebookcvm.cloudapp.net/ebookc5/ChapterWP5.asp?bookid=' . $mybookid . '&chapterid=' . $mychapter . '&customerid=' . $myapikey ;                
	        $myreturnarray = wp_remote_get($myurl);
        	echo $myreturnarray['body'];
                
		echo '</div>';	

		echo $after_widget;
	}

}
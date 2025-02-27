<?php 
	
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	//Add Menu 

	function casino_review_menu() {

		

		add_submenu_page(         

			'edit.php?post_type=casino_review', 

			__( 'Document', 'casino-review' ),    

			__( 'Document', 'casino-review' ),   

			'manage_options',    

			'casino_review_document',   

			'casino_review_document'

		);

		

	}

	

	add_action('admin_menu', 'casino_review_menu');
	
?>
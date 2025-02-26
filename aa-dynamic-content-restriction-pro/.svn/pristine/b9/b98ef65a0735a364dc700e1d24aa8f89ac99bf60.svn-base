<?php
	/*
	*	Plugin Name: AA Content Res Pro
	*	Author: A.M/A.R
	*
	*
	*
	*
	*/
	
	///creating a datbase 
	//short code
	
	
		global $wpdb;

		/*
		* We'll set the default character set and collation for this table.
		* If we don't do this, some characters could end up being converted 
		* to just ?'s when saved in our table.
		*/


		 $sql = "CREATE TABLE content_res (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		email TEXT , 
		code TEXT,
		UNIQUE KEY id (id)
		);";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		
		
		
		
		
		//var_dump($_POST);
///2nd step		
	function aa_protect_content($atts, $content = null){
		
						global $wpdb ;
			if(isset($_POST['code'])){
		
					$row = $wpdb->get_row("SELECT * FROM content_res WHERE code='{$_POST['code']}'");
					
					
					
					
					if($row==null){
						return "Wrong Code";
					}else{
					
						$wpdb->get_row("UPDATE `content_res` SET `code` = '".rand(1,99999)."' WHERE code='{$_POST['code']}'");
						return $content ; 
					
					}
						
			
			
			}
			
			if(!isset($_POST['email'])){
				return '<form action="" method="post">Email<input type="text" name="email" /><br><input type="submit" /></form>
				
				';
			
			}else if(isset($_POST['email'])){
				//save to datbase with a  code
				//send an email
				
				
				$email = $_POST['email'];
				$code = rand(1000,10000);
				
				
	
				
				
				$row = $wpdb->get_row("DELETE FROM content_res WHERE email='$email'");
			
							$wpdb->insert( 
								'content_res', 
								array( 
									'email' => $email, 
									'code' => $code
								) 
							);
					
			
				$msg = "Your new passkey is ... $code ";
				wp_mail($_POST['email'], 'Your pass key',$msg);
				return 'A mail with passkey is sent on your email
				<br>Post the pass key<br><form action="" method="post">COde<input type="text" name="code" /><br><input type="submit" /></form>';
			
			}
			
	}
	add_shortcode( 'protect', 'aa_protect_content' );
	
	



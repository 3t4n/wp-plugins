<?php
add_action('init', 'w404_init');
function w404_init(){
	global $wpdb;
		
	/* create backup */
	if( isset($_GET['make_backup_nonce']) )
	if( wp_verify_nonce($_GET['make_backup_nonce'], 'make_backup') ){

			w404_make_backup();
			wp_redirect( admin_url('options-general.php?page=w404_config&action=make_backup')  );
			die();
	}
	
	/* restore backup */
	if( isset($_GET['restore_backup_nonce']) )
	if( wp_verify_nonce($_GET['restore_backup_nonce'], 'restore_backup') ){

			w404_restore_backup();
			wp_redirect( admin_url('options-general.php?page=w404_config&action=restore_backup')  );
			die();
	}
	

	/* file create */
	if( isset( $_POST['tpl_create_nonce'] ) ){
		if( wp_verify_nonce($_POST['tpl_create_nonce'], 'tpl_create_action') ){	

			$tpl_date = sanitize_text_field( $_POST['selected_template'] );

			
			if( $tpl_date !== '' ){

				global $current_user;
	
				update_option( 'wpe_last_template', $tpl_date );

				$file_cont = file_get_contents( dirname(__FILE__).'/tpl/tpl_'.$tpl_date.'.php' );

				
	
				w404_make_backup();
				$theme = get_template_directory();
				
				$uploader_404_main = wp_upload_dir();
				
				$uploader_404 = $uploader_404_main['basedir'];	
				
				$uploader_404 = $uploader_404 . '/404-page-editor';
				
				file_put_contents( "$uploader_404/404.php", stripslashes( $file_cont ) );
				
			}

			if( isset( $_POST['custom_title_tag'] ) && isset( $_POST['custom_description_tag'] ) ){

				$uploader_404_main = wp_upload_dir();	
				$uploader_404 = $uploader_404_main['basedir'];		
				$uploader_404 = $uploader_404 . '/404-page-editor';

				$file_cont = file_get_contents( "$uploader_404/404.php" );

				if( $_POST['custom_title_tag'] != '' ){
					$file_cont = str_replace('{{404-title}}', esc_html( stripslashes( $_POST['custom_title_tag'] ) ), $file_cont);
				}
				
				if( $_POST['custom_description_tag'] != '' ){
					$file_cont = str_replace('{{404-text-description}}', esc_html( stripslashes( $_POST['custom_description_tag'] ) ), $file_cont);
				}
				

				file_put_contents( "$uploader_404/404.php", stripslashes( $file_cont ) );
			}

			$data_array = [
				///////// DEFAULT TEMPLATES ///////// 
				'2016_title' => 'Nothing here',
				'2016_descr' => 'Nothing was found at this location. Maybe try a search?',

				'2017_title' => 'Nothing here',
				'2017_descr' => 'Nothing was found at this location. Maybe try a search?',
				
				'2019_title' => 'Nothing here',
				'2019_descr' => 'Nothing was found at this location. Maybe try a search?',				

				'2020_title' => 'Nothing here',
				'2020_descr' => 'Nothing was found at this location. Maybe try a search?',

				'2021_title' => 'Nothing here',
				'2021_descr' => 'It looks like nothing was found. Maybe try a search?',

				///////// CUSTOM TEMPLATES ///////// 
				'santa_title' => 'Oops, Looks like you have gone down the wrong chimney!',
				'santa_descr' => 'Let us get you back ho-ho-home.',
			];

			$uploader_404_main = wp_upload_dir();	
			$uploader_404 = $uploader_404_main['basedir'];		
			$uploader_404 = $uploader_404 . '/404-page-editor';
			$file_cont = file_get_contents( "$uploader_404/404.php" );

			$file_cont = str_replace('{{404-title}}', $data_array[$tpl_date.'_title'], $file_cont);
			$file_cont = str_replace('{{404-text-description}}', $data_array[$tpl_date.'_descr'], $file_cont);		

			file_put_contents( "$uploader_404/404.php", stripslashes( $file_cont ) );

			
			wp_redirect( admin_url('options-general.php?page=w404_config&action=generate_404')  );
			die();
	}
	}
	
}
	
?>
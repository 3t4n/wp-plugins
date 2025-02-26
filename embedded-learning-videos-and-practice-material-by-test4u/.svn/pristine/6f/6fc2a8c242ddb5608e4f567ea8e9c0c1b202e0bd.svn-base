<?php
	class T4U_CoursesActivateUninstall{
		static function Activate() {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			
			if ( class_exists('Test4uProCourses') ) {
				// Stop activation redirect and show error
				wp_die('Please deactivate and/or remove the <b>Embedded learning videos and practice material by TEST4U - Pro version</b> before activating the Free version.  <br><a href="' . esc_url( admin_url( 'plugins.php' )) . '">&laquo; Return to Plugins</a>');
			}

			global $wpdb;
			$charset_collate = $wpdb->get_charset_collate();
			$table_name = $wpdb->prefix . 't4u_courses';

			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				title VARCHAR(64) NOT NULL,
				description VARCHAR(64) NOT NULL,
				PRIMARY KEY  id (id)
			) $charset_collate;";

			dbDelta( $sql );
			
			$table_name = $wpdb->prefix . 't4u_courses_syllabus';

			$sql = $wpdb->prepare("SHOW COLUMNS FROM $table_name LIKE 'version'", []);
			$res = $wpdb->get_results($sql, ARRAY_A);
			
			if (count($res)>0){
				$sql = "DROP TABLE IF EXISTS $table_name;";
				$wpdb->query($sql);
			}

			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id_syllabus mediumint(9) NOT NULL AUTO_INCREMENT,
				title VARCHAR(64) NOT NULL,
				level int(9) NOT NULL,
				software int(9) NOT NULL,
				foreas int(9) NOT NULL,
				sorting int(9) NOT NULL,
				PRIMARY KEY  id (id_syllabus),
				UNIQUE KEY syllabus(level, software, foreas)
			) $charset_collate;";

			dbDelta( $sql );
			
			$table_name = $wpdb->prefix . 't4u_courses_software';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id_software mediumint(9) NOT NULL AUTO_INCREMENT,
				title VARCHAR(64) NOT NULL,
				PRIMARY KEY  id (id_software)
			) $charset_collate;";

			dbDelta( $sql );
			

			$table_name = $wpdb->prefix . 't4u_courses_syllabus_software';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				syllabus_id INT NOT NULL,
				software_id INT NOT NULL,
				PRIMARY KEY  id (id),
				UNIQUE KEY uni(syllabus_id,software_id)
			) $charset_collate;";

			dbDelta( $sql );

			$table_name = $wpdb->prefix . 't4u_courses_categories';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id_category mediumint(9) NOT NULL AUTO_INCREMENT,
				hash VARCHAR(45) NOT NULL,
				category_json TEXT,
				PRIMARY KEY  id (id_category),
				UNIQUE KEY hash (hash)
			) $charset_collate;";

			dbDelta( $sql );
			

			$table_name = $wpdb->prefix . 't4u_courses_categories_videos';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id_category_videos mediumint(9) NOT NULL AUTO_INCREMENT,
				hash VARCHAR(45) NOT NULL,
				videos_json TEXT,
				PRIMARY KEY  id (id_category_videos),
				UNIQUE KEY hash (hash)
			) $charset_collate;";

			dbDelta( $sql );

			
			$table_name = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				syllabus_id INT NOT NULL,
				software_id INT NOT NULL,
				prog_id INT NOT NULL,
				lang VARCHAR(5),
				PRIMARY KEY  id (id),
				UNIQUE KEY uni(syllabus_id,software_id,prog_id,lang)
			) $charset_collate;";

			dbDelta( $sql );
				
			$table_name = $wpdb->prefix . 't4u_courses_languages';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				lang VARCHAR(5),
				description VARCHAR(45),
				sorting INT NOT NULL DEFAULT 0,
				PRIMARY KEY  lang (lang),
				KEY sorting(sorting)
			) $charset_collate;";

			dbDelta( $sql );		


			$table_name = $wpdb->prefix . 'posts';
						
			$sql = $wpdb->prepare( "SELECT ID 
									FROM ".$table_name." 
									WHERE post_type=%s", array(T4U_POST_TYPE));
			$res = $wpdb->get_results($sql, ARRAY_A);
			for($i=0; $i<count($res); $i++){
				if (get_post_meta( $res[$i]['ID'], 't4u_course_language', true ) === false){
					update_post_meta( $res[$i]['ID'], 't4u_course_language', 'en');
				}
				if (get_post_meta( $res[$i]['ID'], 't4u_course_prog_version', true ) === false){
					update_post_meta( $res[$i]['ID'], 't4u_course_prog_version', 1016);
				}
			}

			$table_name = $wpdb->prefix . 't4u_courses_practice_files';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id_file mediumint(9) NOT NULL AUTO_INCREMENT,
				`qid` mediumint(9) NOT NULL,
				`path` VARCHAR(255) NOT NULL,
				PRIMARY KEY  id_file (id_file),
				UNIQUE KEY `fff` (`qid`,`path`)
			) $charset_collate;";
				
			dbDelta( $sql );	

			
			$table_name = $wpdb->prefix . 't4u_courses_user_submissions';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id_submission mediumint(9) NOT NULL AUTO_INCREMENT,
				`user_id` mediumint(9) NOT NULL,
				`category_id` mediumint(9) NOT NULL,
				`lesson_id` mediumint(9) NOT NULL,
				`uploadpath` TEXT NOT NULL,
				`uploadurl` TEXT NOT NULL,
				`upload_date` DATETIME NOT NULL,
				`status` VARCHAR(255) NOT NULL DEFAULT 0,
				`check_date` DATETIME DEFAULT NULL,
				PRIMARY KEY  id_submission (id_submission)
			) $charset_collate;";

			dbDelta( $sql );
					
			$table_name = $wpdb->prefix . 't4u_courses_user_queries';
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
				id_query mediumint(9) NOT NULL AUTO_INCREMENT,
				`user_id` mediumint(9) NOT NULL,
				`category_id` mediumint(9) NOT NULL,
				`lesson_id` mediumint(9) NOT NULL,
				`query` TEXT NOT NULL,
				`send_date` DATETIME NOT NULL,
				`parent_id` mediumint(9) NOT NULL DEFAULT 0,
				`answer` TEXT DEFAULT NULL,
				`answer_date` DATETIME DEFAULT NULL,
				`answer_user_id` mediumint(9) NOT NULL DEFAULT 0,
				PRIMARY KEY  id_submission (id_query),
				INDEX user_id(user_id)
			) $charset_collate;";

			dbDelta( $sql );
		}
		

		static function Deactivate() {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			global $wpdb;
			
			delete_option('t4u_rules_flushed');
		}

		static function Uninstall() {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			
			global $wpdb;
			$table_name = $wpdb->prefix . 't4u_courses';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);
			
			$table_name = $wpdb->prefix . 't4u_courses_syllabus';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);
			
			$table_name = $wpdb->prefix . 't4u_courses_software';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);
			
			$table_name = $wpdb->prefix . 't4u_courses_syllabus_software';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);

			$table_name = $wpdb->prefix . 't4u_courses_categories';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);
			
			$table_name = $wpdb->prefix . 't4u_courses_categories_videos';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);

			$table_name = $wpdb->prefix . 't4u_courses_practice_files';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);

			$table_name = $wpdb->prefix . 't4u_courses_user_submissions';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);

			$table_name = $wpdb->prefix . 't4u_courses_user_queries';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);

			$table_name = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);

			$table_name = $wpdb->prefix . 't4u_courses_languages';
			$sql = "DROP TABLE IF EXISTS $table_name;";
			$wpdb->query($sql);

			
			delete_option(T4U_API_KEY_SETTING);
			delete_option(T4U_API_KEY_SETTING.'_last_update');
			
		}
		
		static function AddPostTypeCaps() {
			$subscriber = get_role( 'subscriber' );
			$subscriber->add_cap( 'read_course', true);

			$administrator = get_role( 'contributor' );
			$administrator->add_cap( 'read_course', true);

			$author = get_role( 'author' );
			$author->add_cap( 't4u_view_own', true);
			
			$editor = get_role( 'editor' );
			$editor->add_cap( 't4u_view_own', true);
			$editor->add_cap( 't4u_add_edit', true);

			$administrator = get_role( 'administrator' );
			$administrator->add_cap( 'edit_course', true);
			$administrator->add_cap( 'edit_courses', true);
			$administrator->add_cap( 'create_courses', true);
			$administrator->add_cap( 'read_course', true);
			$administrator->add_cap( 'delete_course', true);
			$administrator->add_cap( 'edit_others_courses', true);
			$administrator->add_cap( 'read_private_courses', true);
			$administrator->add_cap( 'publish_courses', true);
			$administrator->add_cap( 'delete_courses', true);
			
			
		}
		
		static function CreateCustomPostType() {
			$labels = array(
				'name'                  => _x( T4U_PLUGIN_MENU_NAME, T4U_DOMAIN ),
				'singular_name'         => _x( T4U_PLUGIN_MENU_NAME, T4U_DOMAIN ),
				'menu_name'             => __( T4U_PLUGIN_MENU_NAME, T4U_DOMAIN ),
				'name_admin_bar'        => __( T4U_PLUGIN_MENU_NAME, T4U_DOMAIN ),
				'archives'              => __( 'Item Archives', T4U_DOMAIN ),
				'attributes'            => __( 'Item Attributes', T4U_DOMAIN ),
				'parent_item_colon'     => __( 'Parent Item:', T4U_DOMAIN ),
				'all_items'             => __( 'All courses', T4U_DOMAIN ),
				'add_new_item'          => __( 'Create a new course', T4U_DOMAIN ),
				'add_new'               => __( 'Add New', T4U_DOMAIN ),
				'new_item'              => __( 'New Item', T4U_DOMAIN ),
				'edit_item'             => __( 'Edit Item', T4U_DOMAIN ),
				'update_item'           => __( 'Update Item', T4U_DOMAIN ),
				'view_item'             => __( 'View Item', T4U_DOMAIN ),
				'view_items'            => __( 'View Items', T4U_DOMAIN ),
				'search_items'          => __( 'Search Item', T4U_DOMAIN ),
				'not_found'             => __( 'Not found', T4U_DOMAIN ),
				'not_found_in_trash'    => __( 'Not found in Trash', T4U_DOMAIN ),
				'featured_image'        => __( 'Featured Image', T4U_DOMAIN ),
				'set_featured_image'    => __( 'Set featured image', T4U_DOMAIN ),
				'remove_featured_image' => __( 'Remove featured image', T4U_DOMAIN ),
				'use_featured_image'    => __( 'Use as featured image', T4U_DOMAIN ),
				'insert_into_item'      => __( 'Insert into item', T4U_DOMAIN ),
				'uploaded_to_this_item' => __( 'Uploaded to this item', T4U_DOMAIN ),
				'items_list'            => __( 'Items list', T4U_DOMAIN ),
				'items_list_navigation' => __( 'Items list navigation', T4U_DOMAIN ),
				'filter_items_list'     => __( 'Filter items list', T4U_DOMAIN ),
			);

			$b = current_user_can('edit_posts');
			register_post_type( 
				T4U_POST_TYPE,
				array(
					'labels' 				=> $labels,
					'public' 				=> true,
					'has_archive' 			=> true,
					'taxonomies'			=> array( 'category', 'excerpt' ),
					'exclude_from_search'	=> false,
					'publicly_queryable'    => true,
					'show_in_nav_menus'		=> true,
					'capability_type'		=> 'post',
					'capabilities' => array(
						'edit_post'          => 'edit_course', 
						'read_post'          => 'read_course', 
						'delete_post'        => 'delete_course', 
						'delete_posts'        => 'delete_courses', 
						'edit_posts'         => 'edit_courses', 
						'edit_others_posts'  => 'edit_others_courses', 
						'publish_posts'      => 'publish_courses',       
						'read_private_posts' => 'read_private_courses', 
						'create_posts'       => 'create_courses', 
					  ),
					'supports'          	=> ['title', 'editor', 'excerpt', 'comments', 'thumbnail'],
					'menu_icon'				=> T4U_URL.'img/icon.png'
				)
			);

			add_filter( 'the_posts', array(__CLASS__, 'ShowAsNormalPosts'), 10, 2 );
			add_action( 'admin_notices', array(__CLASS__, 'ShowInfoNotice') );
			
			if ( get_option( 't4u_rules_flushed' ) === false) {
				global $wp_rewrite;
				$wp_rewrite->flush_rules();
				$wp_rewrite->init();
				update_option('t4u_rules_flushed', true);
			}
			

			if ( get_option( T4U_API_KEY_SETTING ) !== false ) {
				if ( get_option( T4U_API_KEY_SETTING.'_last_update' ) === false ) {
					t4u_DownloadT4uData();
				}
				else{
					$t = get_option( T4U_API_KEY_SETTING.'_last_update' );
					if (time()-$t > 36000)
					{
						t4u_DownloadT4uData();
					}
				}
			}
		}

		static function ShowInfoNotice() {
			$current_screen = get_current_screen();
			
			if ( get_option( T4U_API_KEY_SETTING ) === false) {
			?>
			<div class="notice notice-success is-dismissible">
				<p>
					<b>Embedded learning videos and practice material by TEST4U</b><br />
					To download the free material, please <a href='<?=esc_url( get_admin_url(null, 'edit.php?post_type='.T4U_POST_TYPE) );?>&page=activate'>activate</a> your copy.
				
				</p>
			</div>
			<?php }
			else if ($current_screen->id === T4U_POST_TYPE ){
			?>
				<div class="notice notice-success is-dismissible">
					<p>
						<b>Embedded learning videos and practice material by TEST4U</b><br />
						Use the <i>Embedded learning videos and practice material</i> box below the editor to select the material that you want to include.
						</p>
				</div>
			<?php 
			}
			else if ($current_screen->id === 'edit-'.T4U_POST_TYPE ){
				?>
					<div class="notice notice-success is-dismissible">
						<p>
							
							To create a new TEST4U course, click the <b>Add New</b> button.<br />
							A TEST4U course may contain:
							<ul style='list-style:bullet; padding-left:25px; margin-top:0px;'>
								<li>
									Syllabus/Module: The entire syllabus of a module such as <i>MOS Word Core 2016</i>
								</li>
								<li>
									Categories: A certain category (or categories) of the syllabus such as <i>Manage Tables</i>, <i>Format a Form</i>, <i>etc</i> or<br />
									<a href='<?=T4U_URL.'img/screenshot-1.png';?>' target='_blank'><img src='<?=T4U_URL.'img/screenshot-1.png';?>' style='max-height:200px;'/></a><br /> (Click on the image to display it in full size)
								</li>
								<li>
									Videos: A specific video (or videos) such as <i>Rotate the contents of the cell A1 by 45 degrees.</i><br />
									<a href='<?=T4U_URL.'img/screenshot-2.png';?>' target='_blank'><img src='<?=T4U_URL.'img/screenshot-2.png';?>' style='max-height:200px;' /></a><br /> (Click on the image to display it in full size)
								</li>
							</ul>
						
						</p>
					</div>
				<?php 
				}
		}
		
		static function AddExtraMenuOptions( ){
			if ( get_option( T4U_API_KEY_SETTING ) === false) {
				add_submenu_page('edit.php?post_type='.T4U_POST_TYPE,
					__( 'Help & Info', T4U_DOMAIN ), 
					__( '<span style="color:#00bb00;">Activate</span>', T4U_DOMAIN ), 
					'manage_options', 
					'activate', 
					array( __CLASS__, 'ShowActivate' ));
			}

			add_submenu_page('edit.php?post_type='.T4U_POST_TYPE,
				__( 'User submissions', T4U_DOMAIN ), 
				__( 'User submissions', T4U_DOMAIN ), 
				'read_course', 
				'user-submissions', 
				array( __CLASS__, 'ShowUserSubmissions' ));

			add_submenu_page('edit.php?post_type='.T4U_POST_TYPE,
				__( 'User queries', T4U_DOMAIN ), 
				__( 'User queries', T4U_DOMAIN ), 
				'read_course', 
				'user-queries', 
				array( __CLASS__, 'ShowUserQueries' ));

			add_submenu_page('edit.php?post_type='.T4U_POST_TYPE,
				__( 'Help & Info', T4U_DOMAIN ), 
				__( '<span style="color:#f18500;">Help & Info</span>', T4U_DOMAIN ), 
				'manage_options', 
				'help-and-info', 
				array( __CLASS__, 'ShowHelpAndInfo' ));
		}

		static function ShowRegister(){
			include T4U_DIR.'views/register.php';
		}

		static function ShowActivate(){
			include T4U_DIR.'views/activate.php';
		}
		static function ShowHelpAndInfo(){
			include T4U_DIR.'views/help_info.php';
		}
		static function ShowUserSubmissions(){
			include T4U_DIR.'views/user_submissions.php';
		}

		static function ShowUserQueries(){
			include T4U_DIR.'views/user_queries.php';
		}


		static function ShowAsNormalPosts( $posts, $query ){

			if (is_admin()) return $posts;
			if (is_singular(T4U_POST_TYPE)) return $posts;
			if (is_single()) return $posts;
			if ( is_main_query() ) return $posts;
			if ($query->is_main_query()){

				$args = array(
					'post_type' => T4U_POST_TYPE
				);

				$cat  = get_term_by('name', 'Auto generated posts' , 'category');
				if ($cat!==false){
					$args['cat'] = '-'.$cat->term_id;
				}
	
				$cat  = get_term_by('name', 'Auto generated video posts' , 'category');
				if ($cat!==false){
					$args['cat'] = ' -'.$cat->term_id;
				}
	
				$custom = get_posts($args);
				$posts = array_merge($posts, $custom);
			}
			//print_r($posts);die();

			return $posts;
		}


		static function HideAutoCategory( $query ) {
			if ( !is_admin()  && $query->is_main_query() ) {
				$cat  = get_term_by('name', 'Auto generated posts' , 'category');
				if ($cat!=false) $query->set( 'cat', '-'.$cat->term_id);
				
				$cat  = get_term_by('name', 'Auto generated video posts' , 'category');
				if ($cat!=false) $query->set( 'cat', '-'.$cat->term_id);
			}
		}	
		
	}
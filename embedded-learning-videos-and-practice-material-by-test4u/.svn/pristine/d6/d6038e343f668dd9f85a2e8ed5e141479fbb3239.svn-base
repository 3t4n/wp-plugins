<?php
	class T4U_CoursesMetaBoxes{
	
		static function ProcessMetaboxFields($post_id, $post) {
			if ( !isset( $_POST['t4u_course_settings_metabox'] ) || !wp_verify_nonce( $_POST['t4u_course_settings_metabox'], basename( __FILE__ ) ) ) return $post_id;

			$post_type = get_post_type_object( $post->post_type );
		
			/* Check if the current user has permission to edit the post. */
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) return $post_id;

			if( $post_type->name  !== T4U_POST_TYPE) return $post_id;
			
			
			$meta=[];
			
			$meta_key = 't4u_course_syllabus';
			$new_meta_value = ( isset( $_POST[$meta_key] ) ? sanitize_text_field( $_POST[$meta_key] ) : '' );
			$meta[$meta_key] = [
					'new_meta_value'=>$new_meta_value, 
					'meta_value'=>get_post_meta( $post_id, $meta_key, true )
			];
			
			$meta_key = 't4u_course_software';
			$new_meta_value = ( isset( $_POST[$meta_key] ) ? intval( $_POST[$meta_key] ) : '' );
			
			$meta[$meta_key] = [
					'new_meta_value'=>$new_meta_value, 
					'meta_value'=>get_post_meta( $post_id, $meta_key, true )
			];
			
			$meta_key = 't4u_course_category';
			$new_meta_value = ( isset( $_POST[$meta_key] ) ? intval( $_POST[$meta_key] ) : '' );
			$meta[$meta_key] = [
					'new_meta_value'=>$new_meta_value, 
					'meta_value'=>get_post_meta( $post_id, $meta_key, true )
			];
	
			$meta_key = 't4u_course_language';
			$new_meta_value = ( isset( $_POST[$meta_key] ) ? sanitize_text_field( $_POST[$meta_key] ) : '' );
			$meta[$meta_key] = [
					'new_meta_value'=>$new_meta_value, 
					'meta_value'=>get_post_meta( $post_id, $meta_key, true )
			];

			$meta_key = 't4u_course_prog_version';
			$new_meta_value = ( isset( $_POST[$meta_key] ) ? sanitize_text_field( $_POST[$meta_key] ) : '' );
			$meta[$meta_key] = [
					'new_meta_value'=>$new_meta_value, 
					'meta_value'=>get_post_meta( $post_id, $meta_key, true )
			];
			
			$meta_key = 't4u_course_files';
			$new_meta_value = ( isset( $_POST[$meta_key] ) ? sanitize_text_field( $_POST[$meta_key] ) : '' );
			$meta[$meta_key] = [
					'new_meta_value'=>$new_meta_value, 
					'meta_value'=>get_post_meta( $post_id, $meta_key, true )
			];

			$meta_key = 't4u_course_user_queries';
			$new_meta_value = ( isset( $_POST[$meta_key] ) ? sanitize_text_field( $_POST[$meta_key] ) : '' );
			$meta[$meta_key] = [
					'new_meta_value'=>$new_meta_value, 
					'meta_value'=>get_post_meta( $post_id, $meta_key, true )
			];
			
			//print_r($_POST);die();
			foreach($_POST as $k=>$v){
				if (substr($k, 0, 2)!='q_') continue;
				$qid = substr($k, 2);
				if (intval($qid) != $qid) continue;

				$meta_key = 't4u_course_questions';
				if (!isset($meta[$meta_key])){
					$meta[$meta_key] = [
							'new_meta_value'=>intval($qid).',', 
							'meta_value'=>get_post_meta( $post_id, $meta_key, true )
					];
				}
				else{
					$meta[$meta_key]['new_meta_value'].=intval($qid).',';
					$meta[$meta_key]['meta_value']=get_post_meta( $post_id, $meta_key, true );
				}
			}

			foreach($meta as $meta_key=>$data){
				$new_meta_value=$data['new_meta_value'];
				$meta_value=$data['meta_value'];
				
				if ( $new_meta_value && '' == $meta_value ){
					add_post_meta( $post_id, $meta_key, $new_meta_value, true );
				}
				elseif ( $new_meta_value && $new_meta_value != $meta_value ){
					update_post_meta( $post_id, $meta_key, $new_meta_value );
				}
				elseif ( '' == $new_meta_value && $meta_value ){
					delete_post_meta( $post_id, $meta_key, $meta_value );
				}
			}
			global $wpdb;
			
			$table_name = $wpdb->prefix . 'postmeta';
			$sql = $wpdb->prepare("SELECT post_id 
                                    FROM ".$table_name." 
                                    WHERE meta_key=%s AND meta_value=%d", array('t4u_course_parent_id', $post_id));
            $res = $wpdb->get_results($sql, ARRAY_A);
			
			if (count($res)>0){
				foreach($res as $r){
					update_post_meta( $r['post_id'], 't4u_course_syllabus', $meta['t4u_course_syllabus']['new_meta_value'] );
					update_post_meta( $r['post_id'], 't4u_course_software', $meta['t4u_course_software']['new_meta_value'] );
					update_post_meta( $r['post_id'], 't4u_course_category', $meta['t4u_course_category']['new_meta_value'] );
					update_post_meta( $r['post_id'], 't4u_course_language', $meta['t4u_course_language']['new_meta_value'] );
					update_post_meta( $r['post_id'], 't4u_course_prog_version', $meta['t4u_course_prog_version']['new_meta_value'] );
					
					update_post_meta( $r['post_id'], 't4u_course_user_queries', $meta['t4u_course_user_queries']['new_meta_value'] );
					update_post_meta( $r['post_id'], 't4u_course_files', $meta['t4u_course_files']['new_meta_value'] );
					//print_r($r);die();
					$comments = isset($_POST['comment_status']) ? sanitize_text_field($_POST['comment_status']) : 'open';
					
					$sql = $wpdb->prepare("UPDATE ".$wpdb->prefix ."posts SET
										comment_status=%s
									WHERE ID=%d", array($comments, $r['post_id']));
				
					$wpdb->query($sql);
							
					if (get_post_meta( $r['post_id'], 't4u_course_category') !== false && get_post_meta( $r['post_id'], 't4u_course_category') > 0){

						$table_name = $wpdb->prefix . 'postmeta';
						$sql2 = $wpdb->prepare("SELECT post_id 
												FROM ".$table_name." 
												WHERE (meta_key=%s AND meta_value=%d) ", array('t4u_course_parent_id', $r['post_id']));
					
						$res2 = $wpdb->get_results($sql2, ARRAY_A);

						if (count($res2)>0){
							foreach($res2 as $r2){
								update_post_meta( $r2['post_id'], 't4u_course_language', $meta['t4u_course_language']['new_meta_value'] );
								update_post_meta( $r2['post_id'], 't4u_course_prog_version', $meta['t4u_course_prog_version']['new_meta_value'] );
								
								update_post_meta( $r2['post_id'], 't4u_course_user_queries', $meta['t4u_course_user_queries']['new_meta_value'] );
								update_post_meta( $r2['post_id'], 't4u_course_files', $meta['t4u_course_files']['new_meta_value'] );
					
								$sql3 = $wpdb->prepare("UPDATE ".$wpdb->prefix ."posts SET
													comment_status=%s
												WHERE ID=%d", array($comments, $r2['post_id']));
							
								$wpdb->query($sql3);

							}
						}
					}
				}
			}
		}
		
				
		static function AddPostTypeMetabox() {
			global $post;

			$parent = intval(get_post_meta($post->ID, 't4u_course_parent_id', true ));

			if ($parent==0){
				add_action('add_meta_boxes', function(){
					
					add_meta_box(
						't4u_course_settings',           // Unique ID
						'Embedded learning videos and practice material',  // Box title
						array(__CLASS__, 'CreateCustomMetabox'),  // Content callback, must be of type callable
						T4U_POST_TYPE,
						'normal',
						'default'
					);
				});
				add_action( 'save_post', array(__CLASS__, 'ProcessMetaboxFields'), 10, 2 );
			}
		}
		
		
		static function CreateCustomMetabox($post) {
			global $wpdb;

			if ( get_option( T4U_API_KEY_SETTING ) === false ) {

			?>
				<div>	
					To include the free material, please <a href='<?=esc_url( get_admin_url(null, 'edit.php?post_type='.T4U_POST_TYPE) );?>&page=register'>Activate</a> your copy.
				</div>			
			<?php
			}
			else{
		?>
			<div id='t4u_courses_metabox'>
			
				<?=wp_nonce_field( basename( __FILE__ ), 't4u_course_settings_metabox' ); ?>
				<script>
					var this_post_id='<?=$post->ID;?>';
					var t4u_nonce = '<?=wp_create_nonce('t4u_course_settings_metabox_'.$post->ID);?>';
				</script>
				<table class='fixed'>
					<tr>
						<td>
							<label for='t4u_course_language'>Language</label>			
						</td>
						<td>
							<select id='t4u_course_language' name='t4u_course_language' onchange='t4u_BringSyllabus();' class='t4u-select-box' data-selected='<?=esc_attr( get_post_meta( $post->ID, 't4u_course_language', true ) );?>'>
								<option value=''></option>
								<?php 
									$table1 = $wpdb->prefix . 't4u_courses_languages t1';
									$table2 = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions t2';
									$sql = "SELECT t1.lang, t1.description
											FROM ".$table1." 
											WHERE t1.lang IN (
												SELECT lang FROM ".$table2."
											)
											ORDER BY t1.sorting";
									
									$res = $wpdb->get_results($sql, ARRAY_A);
									foreach($res as $r){
								?>
										<option value='<?=esc_attr($r['lang']);?>' <?=(esc_attr( get_post_meta( $post->ID, 't4u_course_language', true ) )==esc_attr($r['lang'])?'selected':''); ?>><?=sanitize_text_field($r['description']);?></option>
								<?php } ?>
								
								
							</select>
						</td>
						<td>
							<p class='help'>Please select the language for the course.</p>		
						</td>
					</tr>
					<tr id='tr_t4u_syllabus' style='display:none;'>
						<td>
							<label for='t4u_course_syllabus'>Syllabus</label>			
						</td>
						<td>
							<select id='t4u_course_syllabus' name='t4u_course_syllabus' onchange='t4u_BringSoftware();' class='t4u-select-box' data-selected='<?=esc_attr( get_post_meta( $post->ID, 't4u_course_syllabus', true ) );?>'>
								<option value=''></option>
							</select>
						</td>
						<td>
							<p class='help'>Please select the syllabus for your course.</p>		
						</td>
					</tr>
					<tr id='tr_t4u_software' style='display:none;'>
						<td>
							<label for='t4u_course_software'>Module</label>
						</td>
						<td>
							<select id='t4u_course_software' name='t4u_course_software' onchange='BringVersions();' class='t4u-select-box' data-selected='<?=esc_attr( get_post_meta( $post->ID, 't4u_course_software', true ) );?>'>
								<option value=''></option>
								
							</select>						
						</td>
						<td>
							<p class='help'>Please select a module.</p>		
						</td>
					</tr>

					<tr id='tr_t4u_prog_version' style='display:none;'>
						<td>
							<label for='t4u_course_prog_version'>Version</label>
						</td>
						<td>
							<select id='t4u_course_prog_version' name='t4u_course_prog_version' onchange='BringCategories();' class='t4u-select-box' data-selected='<?=esc_attr( get_post_meta( $post->ID, 't4u_course_prog_version', true ) );?>'>
								<option value=''></option>
								
							</select>						
						</td>
						<td>
							<p class='help'>Please select the software version.</p>		
						</td>
					</tr>

					<tr id='tr_t4u_category' style='display:none;'>
						<td>
							<label for='t4u_course_category'>Categories</label>
						</td>
						<td>
							<select id='t4u_course_category' name='t4u_course_category' data-selected='<?=esc_attr( get_post_meta( $post->ID, 't4u_course_category', true ) );?>' onchange='BringVideos()' class='t4u-select-box'>
								<option value='' <?=(esc_attr( get_post_meta( $post->ID, 't4u_course_category', true ) )==''?'selected':''); ?>></option>
								<option value='0' <?=(esc_attr( get_post_meta( $post->ID, 't4u_course_category', true ) )=='0'?'selected':''); ?>>All</option>
							</select>
						</td>
						<td>
							<p class='help'>Please select a category to load the training material.</p>		
						</td>
					</tr>
					<tr id='tr_t4u_practice_files' style='display:none;'>
						<td>
							<label for='t4u_course_files'>Practice Files</label>
						</td>
						<td>
							<input type='checkbox' id='t4u_course_files' name='t4u_course_files' value='1' <?=(esc_attr( get_post_meta( $post->ID, 't4u_course_files', true ) )=='1'?'checked':'');?> />
							
						</td>
						<td>
							<p class='help'>Check this option to include the practice files for each video in your course so that students can download, experiment and submit them to you.</p>		
						</td>
					</tr>
					<tr id='tr_t4u_queries' style='display:none;'>
						<td>
							<label for='t4u_course_user_queries'>Student queries</label>
						</td>
						<td>
							<input type='checkbox' id='t4u_course_user_queries' name='t4u_course_user_queries' value='1' <?=(esc_attr( get_post_meta( $post->ID, 't4u_course_user_queries', true ) )=='1'?'checked':'');?> />
							
						</td>
						<td>
							<p class='help'>Check this option to allow students to submit queries for each video to you.</p>		
						</td>
					</tr>
				</table>

				<div class='t4u-videos-box' style='display:none;'>
					<br />
					<h3>Videos</h3>
					<div style='color:gray;'>
						Please select the video / videos that you want to include in your course.<br />
						Add notes for each video by clicking the respective button. This will create a shortcode with the video ID in the editor. Change the content of the shortcode according to your needs.
						<br /> 
					</div>
					<table class='widefat' id='t4u-videos-table' >
						<tr>
							<th><input type='checkbox' id='q_check_all' /></th>
							<th>Video-solution</th>
							<th>Question text</th>
							<th>Notes</th>
							<th>ID</th>
						</tr>
					</table>	
				</div>
												 
			</div>

		<?php
			}
		}
	}
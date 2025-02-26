<?php
	class T4U_CoursesContentParser{
		//check if we want only redirect! 
		static function PrePostTypeParser($content) {
			global $post, $wpdb;
			
			if (!is_singular(T4U_POST_TYPE)) return $content;
			if (!is_single()) return $content;
		}

		static function PostTypeParser($content) {
			global $post, $wpdb;

			if (!is_singular(T4U_POST_TYPE)) return $content;
			if (!is_single()) return $content;
			
			if ($post->post_type == T4U_POST_TYPE) {
				$t4u_api_key = get_option( T4U_API_KEY_SETTING );

				$lang = get_post_meta( $post->ID, 't4u_course_language', true );
				$syllabus = get_post_meta( $post->ID, 't4u_course_syllabus', true );
				$software = get_post_meta( $post->ID, 't4u_course_software', true );
				$category = get_post_meta( $post->ID, 't4u_course_category', true );
				$version = get_post_meta( $post->ID, 't4u_course_prog_version', true );
				$show_practice_files = get_post_meta( $post->ID, 't4u_course_files', true ) == '1';
				$user_queries = get_post_meta( $post->ID, 't4u_course_user_queries', true ) == '1';
				
				if ($lang=='') $lang='en';
				if ($version =='') $version =1016;
				$syllabus_full = '';
				$lesson = isset($_GET['lesson'])? intval($_GET['lesson']) : 0;
				
				
				if (intval($syllabus) == $syllabus && intval($syllabus)>0){
					$table1 = $wpdb->prefix . 't4u_courses_syllabus';
					$sql = $wpdb->prepare("SELECT CONCAT(level, '-', software,'-',foreas) id
										FROM ".$table1." 
										WHERE id_syllabus=%d", array($syllabus));
					$res = $wpdb->get_results($sql, ARRAY_A);
					$syllabus_full=$res[0]['id'];
				}

				$hash = sha1($lang .'-'. $syllabus_full .'-'. $software);
				
				// UPLOAD FILE
				if(isset($_FILES) && is_user_logged_in() && $show_practice_files){
					$allowed_types=[];
					$allowed_types[] = 'application/x-zip-compressed';
					$allowed_types[] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
					$allowed_types[] = 'application/msword';
					$allowed_types[] = 'text/plain';
					$allowed_types[] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
					$allowed_types[] = 'application/vnd.ms-excel';
					$allowed_types[] = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';
					$allowed_types[] = 'application/msaccess';
					$allowed_types[] = 'application/pdf';

					foreach($_FILES as $f){
						if ($f['error'] == 0 && in_array($f['type'], $allowed_types)){
							$wp_uploads = wp_upload_dir();
							$uploads = '';
							
							$uploads .= '/test4u-practice-submissions/';
							if (!file_exists($wp_uploads['basedir'].$uploads)){
								mkdir($wp_uploads['basedir'].$uploads);
							}
							
							$uploads .= get_current_user_id().'/';
							if (!file_exists($wp_uploads['basedir'].$uploads)){
								mkdir($wp_uploads['basedir'].$uploads);
							}
							
							$uploads .= $post->ID.'/';
							if (!file_exists($wp_uploads['basedir'].$uploads)){
								mkdir($wp_uploads['basedir'].$uploads);
							}

							$uploads .= date('YmdHis').'/';
							if (!file_exists($wp_uploads['basedir'].$uploads)){
								mkdir($wp_uploads['basedir'].$uploads);
							}
						
							
							$fname = $uploads.sanitize_file_name($f['name']);
					
							
							if ($lesson ==0) $lesson = get_post_meta( $post->ID, 't4u_course_lesson', true );

							if (move_uploaded_file($f['tmp_name'], $wp_uploads['basedir'].$fname)){
								$table_name = $wpdb->prefix . 't4u_courses_user_submissions';
								$sql = $wpdb->prepare("INSERT INTO ".$table_name." (`user_id`, category_id, lesson_id, uploadpath, uploadurl, upload_date) VALUES (%d, %d, %d, %s, %s, NOW())", 
										array(get_current_user_id(), $category, $lesson, $wp_uploads['basedir'].$fname, $wp_uploads['baseurl'].$fname) );
					
								$wpdb->query($sql);

							}
						}
					}
				}
				if(isset($_POST['t4u_query']) && is_user_logged_in() && $user_queries){
					if ($lesson ==0) $lesson = get_post_meta( $post->ID, 't4u_course_lesson', true );
					if ($lesson ==0 && isset($_POST['t4u_lesson'])){
						$lesson = intval($_POST['t4u_lesson']);
					}

					$table_name = $wpdb->prefix . 't4u_courses_user_queries';
					$sql = $wpdb->prepare("INSERT INTO ".$table_name." (`user_id`, category_id, lesson_id, query, send_date) VALUES (%d, %d, %d, %s, NOW())", 
							array(get_current_user_id(), $category, $lesson, sanitize_textarea_field($_POST['t4u_query']) ));
		
					$wpdb->query($sql);

					//die(get_permalink());
					//wp_redirect(get_permalink(), 303);
        			//return;
				}
				
			
				
				$table_name = $wpdb->prefix . 't4u_courses_categories';
				$sql = $wpdb->prepare("SELECT category_json FROM ".$table_name." WHERE `hash`=%s", array($hash));
				$res = $wpdb->get_results($sql, ARRAY_A);

				$categories_json='';
				$categories=[];
				if (count($res)>0){
					$categories_json=$res[0]['category_json'];
						
					$data=json_decode($categories_json, true);
					$categories=$data['categories'];
				}

				
				if (count($categories)==0){
					$response = wp_remote_post( TEST4U_DATA_URL."/plugins/test4u-video-courses-pro", array(
						'method' => 'POST',
						'timeout' => 45,
						'httpversion' => '1.0',
						'blocking' => true,
						'body' => array('a'=>'categories', 'lang' => $lang, 'syllabus' => $syllabus_full, 'software' => $software, 'version' => $version, 'api_key'=>$t4u_api_key )
						)
					);
				
					$category_json=isset($response['body']) ? $response['body'] : '{"success":"false"}';
				
					$data = json_decode($category_json, true);
					
					if (isset($data['categories'])){
						$categories = $data['categories'];
			
						$table_name = $wpdb->prefix . 't4u_courses_categories';
						$sql = $wpdb->prepare("INSERT INTO ".$table_name." (`hash`, category_json) VALUES (%s, %s) ON DUPLICATE KEY UPDATE category_json=%s", array($hash,$category_json,$category_json));
			
						$wpdb->query($sql);
					}
				}
				
				if ($category == null || $category==''){
					$is_whole_category = isset($_GET['category'])?intval($_GET['category']):0;
					
					if ($is_whole_category){
					
						$post_id = self::t4u_GetCreateCategoryPost($post->ID, $categories, $is_whole_category);

						$permalink = get_permalink($post_id);
						if (strpos($permalink, '?')===false){
							$permalink.='?';
						}
						
						return  '<script>window.location.href="'.esc_url($permalink).'";</script>';
						//wp_redirect($pl);
						//header('Location: '.$pl);
						die();
					}

					if (count($categories)>0){
						$html = '';
						$html .= '<div class="t4u-vileo-category-frame">';
						$html .= '<table class="table">';
						$html .= '<tr><th>Category</th></tr>';
						
						$permalink = get_permalink();
						if (strpos($permalink, '?')===false){
							$permalink.='?';
						}

						$table_name = $wpdb->prefix . 'posts';

						for($i=0; $i<count($categories); $i++){
							$sql = $wpdb->prepare( "SELECT ID 
													FROM ".$table_name." 
													WHERE post_type=%s
														AND post_name=%s", array(T4U_POST_TYPE, 'test4u-video-category-'.$categories[$i]['id']));

							$res = $wpdb->get_results($sql, ARRAY_A);
							$link='';
					
							if (count($res)>0){
								$link= get_permalink($res[0]['ID']);
							}
							else{
								$link = $permalink.'&category='.$categories[$i]['id'];
							}
							
							$html .= '<tr>
										<td><a href="'.esc_url($link).'">'.$categories[$i]['descr'].'</a></td>

									</tr>';
								
							
						}
						$html .= '</table></div>';
						
						$content .= $html;
					}
				}
				else{
				
					$hash = sha1($lang .'-'. $syllabus_full .'-'. $software .'-'.$category);

					$table_name = $wpdb->prefix . 't4u_courses_categories_videos';
					$sql = $wpdb->prepare("SELECT videos_json FROM ".$table_name." WHERE `hash`=%s", array($hash));
					$res = $wpdb->get_results($sql, ARRAY_A);
				
					$videos_json='';
					if (count($res)>0){
						$videos_json=$res[0]['videos_json'];
					}
					$data=null;
					if ($videos_json != ''){
						$data=json_decode($videos_json, true);
					}
					$videos=[];
					$videos = T4U_Functions::GetVideosAndPracticeFiles($lang, $syllabus, $software, $category, $version, null);
					$questions = get_post_meta( $post->ID, 't4u_course_questions', true );
					$mtype = get_post_meta( $post->ID, 't4u_course_type', true );
					$lesson = isset($_GET['lesson'])? intval($_GET['lesson']) : 0;

					//custom lesson !! 
					
					if ($mtype != 'auto-all'){
						$questions = explode(',',$questions);
						$questions=array_map('trim',$questions);
						$questions=array_map('intval',$questions);

						if (count($questions)==0){
							$questions[]=$lesson;
						}
				
						if((int)get_post_meta( $post->ID, 't4u_course_lesson', true )>0){
							$lesson=(int)get_post_meta( $post->ID, 't4u_course_lesson', true );
							$questions=[];
							$questions[]=$lesson;
						};
						
						
						$lesson_data=false;
						for($i=0; $i<count($videos); $i++){
							if (in_array($videos[$i]['qid'], $questions) && ($videos[$i]['qid']==$lesson || $lesson==0)){
								$lesson_data=$videos[$i];
								$lesson=$videos[$i]['qid'];
								break;
							}
						}
						

						if(count($questions)>1){
							$prev=0;
							$next=0;
							
						
							for($i=0; $i<count($questions); $i++){
								if ($questions[$i]>0 && $lesson>0 && $questions[$i] == $lesson){
									if($i<count($questions)-1){
										$next=$questions[$i+1];
									}

									if($i>0){
										$prev=$questions[$i-1];
									}
								}
							}

							$post_id = self::t4u_GetCreateVideoPost($post->ID, $categories, $category, $lesson, $prev, $next);
						
							$show_practice_files = get_post_meta( $post->ID, 't4u_course_files', true ) == '1';
							$user_queries = get_post_meta( $post->ID, 't4u_course_user_queries', true ) == '1';
							$version = get_post_meta( $post->ID, 't4u_course_prog_version', true );
							
							add_post_meta( $post_id, 't4u_course_parent_id', $post->ID, true );
							add_post_meta( $post_id, 't4u_course_syllabus', $syllabus, true );
							add_post_meta( $post_id, 't4u_course_software', $software, true );
							add_post_meta( $post_id, 't4u_course_language', $lang, true );
							add_post_meta( $post_id, 't4u_course_prog_version', $version, true );
							add_post_meta( $post_id, 't4u_course_files', $show_practice_files?'1':'', true );
							add_post_meta( $post_id, 't4u_course_user_queries', $user_queries?'1':'', true );
							add_post_meta( $post_id, 't4u_course_category', $is_whole_category, true );
							add_post_meta( $post_id, 't4u_course_questions', 'auto-all', true );
							
							$permalink = get_permalink($post_id);
							if (strpos($permalink, '?')===false){
								$permalink.='?';
							}

							return  '<script>window.location.href="'.esc_url($permalink).'";</script>';
						
							
						}
						else{


							$html = '';
							if ($lesson_data!=false){
								$_SESSION['t4u_lesson_id']=$lesson_data['qid'];
								$thepost = get_post($post->ID);
								$content = $thepost->post_content ;
								$content = do_shortcode($content);
								$content = str_replace(']]>', ']]&gt;', $content);

								$html.= $content;
								$html.='<div class="t4u-vileo-lesson-frame" style="margin-top:20px;">';
								$html.='	<div class="t4u-video">
												<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$lesson_data['youtubeid'].'?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
											<div style="margin-top:10px;"><br/><i>'.$lesson_data['question_text'].'</i><br /><br /></div>
										';
										
								//// PRACTICE FILES /////
								if ($show_practice_files && is_user_logged_in()){
								
									$table_name = $wpdb->prefix . 't4u_courses_practice_files';
									$sql = $wpdb->prepare("SELECT `path` FROM ".$table_name." WHERE qid=%d", array($lesson_data['qid']));
									$res = $wpdb->get_results($sql, ARRAY_A);
									
									if (count($res)==0){
										$res = T4U_Functions::GetVideosAndPracticeFiles($lang, $syllabus, $software, $category, $version, $lesson_data['qid']);
										
									}
									if (count($res)>0){
										$html.='	<div class="t4u-vileo-lesson-practice-files">';
										$html.='		<h5>Practice files:</h5>';
										$html.='		<p>Click the link(s) below to download the practice file(s).</p>';
										
										$i=1;
										foreach($res as $r){
											$html.='<a href="'.esc_url(TEST4U_DATA_URL."/plugins/test4u-video-courses-pro/key/".$t4u_api_key.'/file/'.urlencode(base64_encode($r['path']))).'" target="_blank">Practice file '.($i++).'</a><br />';
										}
										
										$html.='	<br /><br />';
										$html.='	<p>Once you complete the exercise as shown in the video above, you can submit your answer to the course administrator, using the following form.</p>';
										$html.='	<form  method="post" enctype="multipart/form-data">';
										$html.='		<h5>Submit answered files:</h5>';
										$i=1;
										foreach($res as $r){
											$html.='		<input type="file" id="practice_file_'.$i.'" name=id="practice_file_'.$i.'"></input><br />';
										}
										$html .= '		<br /><input type="submit" name="submit" id="submit" class="button button-primary" value="Upload" style="margin:0" />
													</form>';
										
										$html.='	</div>';
									}
								}
								
								//// STUDENT QUERIES /////
								if ($user_queries && is_user_logged_in()){
									$html.='	<div class="t4u-vileo-lesson-queries">';
									$html.='		<h5  style="margin-bottom:0px;">Queries:</h5>';
									$html.= T4U_Functions::get_video_queries_html(get_current_user_id(), $lesson_data['qid']);
									$html.='		<br /><p>Send your queries for this lesson to the course administrator.<br />The queries and their answers are visible only to you.</p>';
									$html.='		
													<form  method="post">';
									$html.='			<p class="form-comment">
															<label for="t4u_query">Send a new query:</label> <br />
															<textarea id="t4u_query" name="t4u_query"rows="8" maxlength="65525" aria-required="true" required="required" style="width:99%;"></textarea><br /><br />
															<input type="hidden" name="t4u_lesson" id="t4u_lesson" value="'.intval($lesson_data['qid']).'" />
															<input type="submit" name="submit" id="submit" class="button button-primary" value="Send" style="margin:0" />
														</p>';
									$html.='		</form>';
									
									$html.='	</div>';
								}

								$next=0;
								$prev=0;

								$html.='	<div class="t4u-vileo-lesson-navigation" style="margin-top:20px;">';
								
								if (count($questions)==1){
									$t4u_course_questions=get_post_meta( $post->ID, 't4u_course_questions', true );
									if ($t4u_course_questions==false || $t4u_course_questions=='' || $t4u_course_questions=='auto-all'){
										$parent_pid=get_post_meta( $post->ID, 't4u_course_parent_id', true );
										$t4u_course_questions=get_post_meta( $parent_pid, 't4u_course_questions', true );
									}

									$tmp=explode(',',$t4u_course_questions);
									$qids=[];
									for($i=0;$i<count($tmp);$i++){
										if(intval(trim($tmp[$i])) > 0){
											$qids[]=intval(trim($tmp[$i]));
										}
									}

									$i=0;
									for($i=0;$i<count($qids);$i++){
										if($qids[$i] == $lesson_data['qid'] ){
											break;
										}
									}
								
									if ($i>0){
										$prev=$qids[$i-1];
									}
									if ($i<count($qids)-1){
										$next=$qids[$i+1];
									}
									//die($i.'-'.$next.'-'.$prev);

									
									//$perma_next=get_post_meta( $post->ID, 't4u_course_next_perma', true );
									//$perma_prev=get_post_meta( $post->ID, 't4u_course_prev_perma', true );
									$perma_prev = '';
									$perma_next = '';

									if ($prev>0){
										$table_name = $wpdb->prefix . 'posts';
										$sql = $wpdb->prepare("SELECT ID FROM ".$table_name." WHERE post_type='".T4U_POST_TYPE."' AND post_name='test4u-video-".$prev."'", []);
										$res = $wpdb->get_results($sql, ARRAY_A);
				
										if(count($res)>0){
											$pid=$res[0]['ID'];
											$perma_prev=get_permalink($pid);
											add_post_meta( $post_id, 't4u_course_prev_perma', $perma_prev, true );
										}
									}

									if ($next>0){
										$table_name = $wpdb->prefix . 'posts';
										$sql = $wpdb->prepare("SELECT ID FROM ".$table_name." WHERE post_type='".T4U_POST_TYPE."' AND post_name='test4u-video-".$next."'", []);
										$res = $wpdb->get_results($sql, ARRAY_A);
				
										if(count($res)>0){
											$pid=$res[0]['ID'];
											$perma_next=get_permalink($pid);
											add_post_meta( $post_id, 't4u_course_next_perma', $perma_next, true );
										}
									}

								
									if ($perma_prev!=''){
										$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($perma_prev).'">Previous video</a></span>';
									}
									else if ($prev>0){
										$permalink = get_permalink(get_post_meta( $post->ID, 't4u_course_parent_id', true ));
										if (strpos($permalink, '?')===false){
											$permalink.='?';
										}
										$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($permalink.'&lesson='.$prev).'">Previous video</a></span>';
									}

									
									if ($perma_next!=''){
										$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($perma_next).'">Next video</a></span>';
									}
									else if ($next>0){
										
										$permalink = get_permalink(get_post_meta( $post->ID, 't4u_course_parent_id', true ));
										if (strpos($permalink, '?')===false){
											$permalink.='?';
										}
										$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($permalink.'&lesson='.$next).'">Next video</a></span>';
									}
								}
								else{
									if ($lesson==0 && count($questions)>1){
										$next=$questions[1];
									}
									else{
										for($i=0; $i<count($questions); $i++){
											if ($questions[$i]>0 && $lesson>0 && $questions[$i] == $lesson){
												if($i<count($questions)-1){
													$next=$questions[$i+1];
												}

												if($i>0){
													$prev=$questions[$i-1];
												}
											}
										}
									}

									$permalink = get_permalink($post->ID);
									if (strpos($permalink, '?')===false){
										$permalink.='?';
									}

									if ($prev>0){
										$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($permalink.'&lesson='.$prev).'">Previous video</a></span>';
									}
									if ($next>0){
										$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($permalink.'&lesson='.$next).'">Next video</a></span>';
									}
								}

								$html.='	</div>';
								$html.='</div>';
							}
							$content = $html;
						}
					}
					else{
						$lesson_id = get_post_meta( $post->ID, 't4u_course_lesson', true );
						
					
						$permalink = get_permalink();
						if (strpos($permalink, '?')===false){
							$permalink.='?';
						}
						
						$html = '';
						$html.='<div class="t4u-vileo-lesson-frame" style="margin-top:20px;">';
						if (!$lesson){
							$html.='<table class="table">';
							$html.='<tr><th>ID</th><th>Question text</th></tr>';

							for($i=0; $i<count($videos); $i++){
								$html.='<tr><td>'.$videos[$i]['qid'].'</td>';
								$html.='<td><a href="'.esc_url($permalink.'&lesson='.$videos[$i]['qid']).'">'.$videos[$i]['question_text'].'</a></td></tr>';
							}

							$html.='</table>';
						}
						else{
							$next=0;
							$prev=0;

							for($i=0; $i<count($videos); $i++){
								if ($videos[$i]['qid']==$lesson){
									$html.='	<div class="t4u-video">
												<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$videos[$i]['youtubeid'].'?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
											<div style="margin-top:10px;"><br/><i>'.$videos[$i]['question_text'].'</i><br /><br /></div>
										';
								}

								if ($videos[$i]['qid']>0 && $lesson>0 && $videos[$i]['qid'] == $lesson){
									if($i<count($videos)-1){
										$next=$videos[$i+1]['qid'];
									}

									if($i>0){
										$prev=$videos[$i-1]['qid'];
									}
								}
							}

							$permalink = get_permalink($post->ID);
							if (strpos($permalink, '?')===false){
								$permalink.='?';
							}
							
							//// PRACTICE FILES /////
							if ($show_practice_files && is_user_logged_in()){
								$table_name = $wpdb->prefix . 't4u_courses_practice_files';
								$sql = $wpdb->prepare("SELECT `path` FROM ".$table_name." WHERE qid=%d", array($lesson));
								$res = $wpdb->get_results($sql, ARRAY_A);
								if (count($res)>0){
									$html.='	<div class="t4u-vileo-lesson-practice-files">';
									$html.='		<h5>Practice files:</h5>';
									$html.='		<p>Click the link(s) below to download the practice file(s).</p>';
									
									$i=1;
									foreach($res as $r){
										$html.='<a href="'.esc_url(TEST4U_DATA_URL."/plugins/test4u-video-courses-pro/key/".$t4u_api_key.'/file/'.urlencode(base64_encode($r['path']))).'" target="_blank">Practice file '.($i++).'</a><br />';
									}

									$html.='	<br /><br />';
									$html.='	<p>Once you complete the exercise as shown in the video above, you can submit your answer to the course administrator, using the following form.</p>';
									$html.='	<form  method="post" enctype="multipart/form-data">';
									$html.='		<h5>Submit answered files:</h5>';
									$i=1;
									foreach($res as $r){
										$html.='		<input type="file" id="practice_file_'.$i.'" name=id="practice_file_'.$i.'"></input><br />';
									}
									$html .= '		<input type="submit" name="submit" id="submit" class="button button-primary" value="Upload" style="margin:0" />
												</form>';
								
									$html.='	</div>';
								}
							}

							//// STUDENT QUERIES /////
							if ($user_queries && is_user_logged_in()){
								$html.='	<div class="t4u-vileo-lesson-queries">';
								$html.='		<h5>Queries:</h5>';
								$html.= T4U_Functions::get_video_queries_html(get_current_user_id(), $lesson);
								$html.='		<br /><p>Send your queries for this lesson to the course administrator.<br />The queries and their answers are visible only to you.</p>
												<form  method="post">';
								$html.='			<p class="form-comment">
														<label for="t4u_query">Send a new query:</label> <br />
														<textarea id="t4u_query" name="t4u_query"rows="8" maxlength="65525" aria-required="true" required="required" style="width:99%;"></textarea><br /><br />
														<input type="hidden" name="t4u_lesson" id="t4u_lesson" value="'.intval($lesson).'" />
														<input type="submit" name="submit" id="submit" class="button button-primary" value="Send" style="margin:0" />
													</p>';
								$html.='		</form>';
								//$html.='		<p>Write your queries for this lesson and send them to the course administrator.<br />The queries and their answers are visible only to you.</p>';
								$html.='	</div>';
							}


							$html.='	<div class="t4u-vileo-lesson-navigation" style="margin-top:20px;">';
							if ($prev>0){
								$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($permalink.'&lesson='.$prev).'">Previous video</a></span>';
							}
							if ($next>0){
								$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($permalink.'&lesson='.$next).'">Next video</a></span>';
							}
							$html.='	</div>';
							$html.='	<div class="t4u-vileo-lesson-navigation" style="margin-top:40px;">';
							$html.='		<span style="padding:10px;"><a class="button" href="'.esc_url($permalink).'">Back to questions</a></span>';
							$html.='	</div>';
							$content = '';
						}
						$html.='</div>';
						$content .= $html;
					}
				
				}
			}
			return $content;
		}
		
		//edw
		static function	PostUpdated($meta_id, $object_id, $meta_key, $_meta_value){
			if ($meta_key=='t4u_course_questions'){
				$questions = get_post_meta(  $object_id, 't4u_course_questions', true );
				
			}
			if ($meta_key=='t4u_course_user_queries'){
				$cc_args = array(
					'posts_per_page'   => -1,
					'post_type'        => T4U_POST_TYPE,
					'meta_key'         => 't4u_course_parent_id',
					'meta_value'       => $object_id
				);
				$result = new WP_Query( $cc_args );
				if ($result && count($result->posts) > 0 ){
					foreach($result->posts as $post){
						update_post_meta( $post->ID, ('t4u_course_user_queries'), $_meta_value!=0 ?'1':'', true );
						
						$cc_args = array(
							'posts_per_page'   => -1,
							'post_type'        => T4U_POST_TYPE,
							'meta_key'         => 't4u_course_parent_id',
							'meta_value'       => $post->ID
						);
						$result2 = new WP_Query( $cc_args );
						
						if ($result2 && count($result2->posts) > 0 ){
							foreach($result2->posts as $post2){
								update_post_meta( $post2->ID, ('t4u_course_user_queries'), $_meta_value!=0 ?'1':'', true );
							}
						}
					}
				}
			}
			if ($meta_key=='t4u_course_files'){
				$cc_args = array(
					'posts_per_page'   => -1,
					'post_type'        => T4U_POST_TYPE,
					'meta_key'         => 't4u_course_parent_id',
					'meta_value'       => $object_id
				);
				$result = new WP_Query( $cc_args );
				if ($result && count($result->posts) > 0 ){
					foreach($result->posts as $post){
						update_post_meta( $post->ID, ('t4u_course_files'), $_meta_value!=0 ?'1':'', true );
						
						$cc_args = array(
							'posts_per_page'   => -1,
							'post_type'        => T4U_POST_TYPE,
							'meta_key'         => 't4u_course_parent_id',
							'meta_value'       => $post->ID
						);
						$result2 = new WP_Query( $cc_args );
						
						if ($result2 && count($result2->posts) > 0 ){
							foreach($result2->posts as $post2){
								update_post_meta( $post2->ID, ('t4u_course_files'), $_meta_value!=0 ?'1':'', true );
							}
						}
					}
				}
			}
			//echo $meta_key; die();
		}

		function t4u_shortcode_course_notes($atts, $content){
		
			$lesson=isset($_GET['lesson'])?intval($_GET['lesson']) : 0;
			if ($lesson==0){
				$lesson=isset($_SESSION['t4u_lesson_id'])?intval($_SESSION['t4u_lesson_id']) : 0;
			}
			$note_cid=isset($atts['note'])?intval($atts['note']) : 0;
			
			if ($lesson==$note_cid){
				return trim($content);
			}
			
			return null;
			
		}
		
		static function	t4u_GetCreateCategoryPost($parent_id, $categories, $category_id){
			global $wpdb;
			
			$lang = get_post_meta( $parent_id, 't4u_course_language', true );
			$syllabus = get_post_meta( $parent_id, 't4u_course_syllabus', true );
			$software = get_post_meta( $parent_id, 't4u_course_software', true );
			$version = get_post_meta( $parent_id, 't4u_course_prog_version', true );
			
			$show_practice_files = get_post_meta( $parent_id, 't4u_course_files', true ) == '1';
			$user_queries = get_post_meta( $parent_id, 't4u_course_user_queries', true ) == '1';
			$lang = 'en';

			$table_name = $wpdb->prefix . 'posts';
			$sql = $wpdb->prepare("SELECT ID 
									FROM ".$table_name." 
									WHERE post_type=%s
										AND post_name=%s", array(T4U_POST_TYPE, 'test4u-video-category-'.$category_id));
			$res = $wpdb->get_results($sql, ARRAY_A);
			
			$videos=T4U_Functions::GetVideosAndPracticeFiles($lang, $syllabus, $software, $category_id, $version, null);

			$post_id=0;
			if (count($res)==0){
				$descr='';
				for($i=0; $i<count($categories); $i++){
					if ($categories[$i]['id']==$category_id){
						$descr=$categories[$i]['descr'];
						break;
					}
				}

				$cat  = get_term_by('name', 'Auto generated posts' , 'category');
				$cat_id=0;
				if($cat == false){
					$cat = wp_insert_term('Auto generated posts', 'category', [
						'description' => 'Auto generated posts',
						'slug' => 'auto-generated-posts'
					]);

					$cat_id = $cat['term_id'];
				}
				else{

					$cat_id = $cat->term_id ;
				}

				$comments = comments_open( $parent_id ) ? 'open' : 'closed';

				$options = [
					'post_type'				=> T4U_POST_TYPE,
					'post_name' 			=> 'test4u-video-category-'.$category_id,
					//'post_parent' 		=> $post->ID,
					'post_status' 			=> 'publish',
					'post_content' 			=> $descr,
					'post_title' 			=> $descr,
					'post_category'			=> $cat_id,
					'comment_status'		=> $comments
				];

				$post_id = wp_insert_post($options);

				$meta=[];

				add_post_meta( $post_id, ('t4u_course_parent_id'), $parent_id, true );
				add_post_meta( $post_id, ('t4u_course_syllabus'), $syllabus, true );
				add_post_meta( $post_id, ('t4u_course_software'), $software, true );
				add_post_meta( $post_id, ('t4u_course_category'), $category_id, true );
				add_post_meta( $post_id, ('t4u_course_files'), $show_practice_files ?'1':'', true );
				add_post_meta( $post_id, ('t4u_course_user_queries'), $user_queries ?'1':'', true );
				add_post_meta( $post_id, ('t4u_course_language'), $lang, true );
				add_post_meta( $post_id, ('t4u_course_prog_version'), $version , true );

				$qids=[];
				foreach($videos as $v){
					if (intval($v['qid'])>0){
						$qids[]=intval($v['qid']);
					}
				}
				add_post_meta( $post_id, 't4u_course_questions', implode(',',$qids), true );
				add_post_meta( $post_id, 't4u_course_type', 'auto-all', true );
				
				wp_set_post_categories($post_id, [$cat_id], true);
			}
			else{
				$post_id=$res[0]['ID'];
			}

			return $post_id;
		}

		static function	t4u_GetCreateVideoPost($parent_id, $categories, $category_id, $lesson_id, $prev, $next){
			global $wpdb;

			$post_id=0;
			
			
			$table_name = $wpdb->prefix . 'posts';
			$sql = $wpdb->prepare(" SELECT ID FROM ".$table_name."
									WHERE post_type='".T4U_POST_TYPE."' 
										AND post_name='test4u-video-".$lesson_id."'", []);
			$res = $wpdb->get_results($sql, ARRAY_A);
		
			if (count($res)==0){
				$descr='';
				for($i=0; $i<count($categories); $i++){
					if ($categories[$i]['id']==$category_id){
						$descr=$categories[$i]['descr'];
						break;
					}
				}
				
				$cat  = get_term_by('name', 'Auto generated video posts' , 'category');
				$cat_id=0;
				if($cat == false){
					$cat = wp_insert_term('Auto generated video posts', 'category', [
						'description' => 'Auto generated video posts',
						'slug' => 'auto-generated-posts'
					]);

					$cat_id = $cat['term_id'];
				}
				else{

					$cat_id = $cat->term_id ;
				}

				$comments = comments_open(  $parent_id ) ? 'open' : 'closed';

				$_SESSION['t4u_lesson_id']=$lesson_id;
				$thepost = get_post($parent_id);
				$content = $thepost->post_content;
				$content = do_shortcode($content);
				$content = str_replace(']]>', ']]&gt;', $content);

				$options = [
					'post_type'				=> sanitize_text_field(T4U_POST_TYPE),
					'post_name' 			=> sanitize_text_field('test4u-video-'.$lesson_id),
					//'post_parent' 		=> $post->ID,
					'post_status' 			=> 'publish',
					'post_content' 			=> $content,
					'post_title' 			=> sanitize_text_field(get_the_title($parent_id).' ('.$lesson_id.')'),
					'post_category'			=> $cat_id,
					'comment_status'		=> sanitize_text_field($comments)
				];
				
				$post_id = wp_insert_post($options);
				
				$meta=[];

				add_post_meta( $post_id, 't4u_course_parent_id', $parent_id, true );
				if ($category_id>0) add_post_meta( $post_id, 't4u_course_category', $category_id, true );
				add_post_meta( $post_id, 't4u_course_lesson', $lesson_id, true );
				add_post_meta( $post_id, 't4u_course_prev', $prev, true );
				add_post_meta( $post_id, 't4u_course_next', $next, true );

				wp_set_post_categories($post_id, [$cat_id], true);
			}
			else{
				$post_id=$res[0]['ID'];
			}

			return $post_id;
		}
	}
	
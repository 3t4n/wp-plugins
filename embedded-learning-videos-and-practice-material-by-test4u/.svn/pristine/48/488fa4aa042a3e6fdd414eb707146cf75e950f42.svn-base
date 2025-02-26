<?php
    class T4U_Functions{
        static function get_course_name($qid){
            global $wpdb;

            $table_name = $wpdb->prefix . 'postmeta';
            $sql = $wpdb->prepare("SELECT post_id 
                                    FROM ".$table_name." 
                                    WHERE meta_key=%s AND meta_value=%d", array('t4u_course_lesson', $qid));
            $res = $wpdb->get_results($sql, ARRAY_A);

            if (count($res)>0){
                for($i=0; $i<count($res);$i++){
                    if(get_post_status($res[$i]['post_id']) == 'publish'){
                        $post_id=$res[$i]['post_id'];
                        break;
                    }
                }

                return sanitize_text_field(get_the_title($post_id));
            }
            return '---';
        }

        static function get_course_name_as_link($qid){
            global $wpdb;

            $table_name = $wpdb->prefix . 'postmeta';
            $sql = $wpdb->prepare("SELECT post_id 
                                    FROM ".$table_name." 
                                    WHERE meta_key=%s AND meta_value=%d", array('t4u_course_lesson', $qid));
            $res = $wpdb->get_results($sql, ARRAY_A);

            if (count($res)>0){
                for($i=0; $i<count($res);$i++){
                    if(get_post_status($res[$i]['post_id']) == 'publish'){
                        $post_id=$res[$i]['post_id'];
                        break;
                    }
                }

                $link = get_permalink($post_id);
                
                return '<a href="'.esc_html($link).'" target="_blank">'.sanitize_text_field(get_the_title($post_id)).'</a>';
            }
            return '---';
        }

        static function get_video_queries_html($user_id, $lesson_id){
            global $wpdb;

            $table_name = $wpdb->prefix . 't4u_courses_user_queries';
            $sql = $wpdb->prepare("SELECT id_query, query, user_id, send_date, parent_id, answer, answer_date, answer_user_id
                                    FROM ".$table_name." 
                                    WHERE user_id=%d AND lesson_id=%d
                                    ORDER BY send_date DESC", array($user_id, $lesson_id));
            $res = $wpdb->get_results($sql, ARRAY_A);
            
            if (count($res)>0){
                $html='<div class="t4u_queries comment">';
                $i=1;
                foreach($res as $r){
                    $class=($i++%2==0)?' t4u_query_odd':'';
                    $html .= '<div class="t4u_query'.$class.'">';
                    $html .= '<span class="t4u_query_time">'.date(get_option( 'date_format' ).' '.get_option( 'time_format' ), strtotime($r['send_date'])).'</span>';
                    $html .= '<div class="t4u_query_text">'.$r['query'].'</div>';
                

                    if ($r['answer_date'] != null){
                        $user_info = get_userdata((int)$r['answer_user_id']);

                        $html .= '<div class="t4u_query_answer">';
                        $html .= '<span class="t4u_query_time">'.date(get_option( 'date_format' ).' '.get_option( 'time_format' ), strtotime($r['answer_date']));
                        $html .= ' <b>(answered by '.$user_info->user_login.')</b>';
                        $html .= '</span>';
                        $html .= '<div class="t4u_query_text">'.$r['answer'].'</div>';
                        $html.='</div>';
                    }
                    $html.='</div>';
                }

                $html.='</div>';
            }

            return $html;
        }

        static function GetVideosAndPracticeFiles($lang, $syllabus, $software, $category, $version, $lesson_id){
            global $wpdb;
                
			$t4u_api_key = get_option( T4U_API_KEY_SETTING );
            
            $syllabus_full=$syllabus;
            if (intval($syllabus) == $syllabus && intval($syllabus)>0){
                $table1 = $wpdb->prefix . 't4u_courses_syllabus';
                $sql = $wpdb->prepare("SELECT CONCAT(level, '-', software,'-',foreas) id
                                    FROM ".$table1." 
                                    WHERE id_syllabus=%d", array($syllabus));
                $res = $wpdb->get_results($sql, ARRAY_A);
                $syllabus_full=$res[0]['id'];
            }


            $a = 'videos';
            if ($lesson_id!=null && $lesson_id>0){
                $a = 'files';
              
            }
            $response = wp_remote_post( TEST4U_DATA_URL."/plugins/test4u-video-courses-pro", array(
                'method' => 'POST',
                'timeout' => 45,
                'httpversion' => '1.0',
                'blocking' => true,
                'body' => array( 'a'=>$a, 'lang' => $lang, 'syllabus' => $syllabus_full, 'software' => $software,  'category'=> $category, 'version' => $version, 'api_key'=>$t4u_api_key, 'lesson'=>$lesson_id, 'plugin_version'=>T4U_PLUGIN_VERSION )
                )
            );
            $json=isset($response['body'])?sanitize_text_field($response['body']):'{"success":"false"}';
           
            $data=json_decode($json, true);

            
            if (!$data['success']){
                wp_die($data['error']);
            }
            
            $videos=[];
            if (isset($data['videos'])){
                $videos = $data['videos'];

                $table_name = $wpdb->prefix . 't4u_courses_categories_videos';
                $sql = $wpdb->prepare("INSERT INTO ".$table_name." (`hash`, videos_json) VALUES (%s, %s) ON DUPLICATE KEY UPDATE videos_json=%s", array($hash,$json,$json));

                $wpdb->query($sql);
            }


            $files=[];
            if (isset($data['files'])){
                $files = $data['files'];
                
                $table_name = $wpdb->prefix . 't4u_courses_practice_files';
                foreach($files as $f){
                    $sql = $wpdb->prepare("INSERT INTO ".$table_name." (`qid`, path) VALUES (%s, %s) ON DUPLICATE KEY UPDATE path=%s", array($f['id'], $f['p'], $f['p']));
                    $wpdb->query($sql);
                }
                
            }
            //category videos
            if ( $lesson_id == null){
                return $videos;
            }

            //only one question.
            if ( $lesson_id > 0){
                $res = [];
                
                foreach($files as $f){
                    $res[]=['path'=>$f['p']];
                }
                return $res;
            }

           
        }
        
    }
    
<?php    

    function t4u_BringSyllabus(){
        global $wpdb;

        $lang = isset($_POST['lang']) ? trim(sanitize_text_field($_POST['lang']))  : '';
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id'])  : 0;

        
        if (!check_ajax_referer( 't4u_course_settings_metabox_'.$post_id, '_nonce' )){
            $data=['success'=>false, 'error'=>'Form validation error.'];
            wp_send_json_success($data);
            wp_die();
        }

        if ($lang==''){
            $data=['success'=>false, 'error'=>'Please select the language.'];
            wp_send_json_success($data);
            wp_die();
        }

        $table1 = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions t1';
        $table2 = $wpdb->prefix . 't4u_courses_syllabus t2';
    
        $sql = $wpdb->prepare("SELECT id_syllabus id, title
                            FROM ".$table1." LEFT JOIN ".$table2." ON t1.syllabus_id=t2.id_syllabus
                            WHERE id_syllabus IS NOT NULL 
                                    AND lang=%s
                            GROUP BY syllabus_id
                            ORDER BY sorting", array($lang));
    
        $syllabus = $wpdb->get_results($sql, ARRAY_A);
       
        $data=['success'=>true, 'data'=>$syllabus];
        wp_send_json_success($data);
        wp_die();

    } 
    add_action('wp_ajax_t4u_BringSyllabus', 't4u_BringSyllabus');
    add_action('wp_ajax_nopriv_t4u_BringSyllabus', 't4u_BringSyllabus');


    function t4u_BringSoftware(){
        global $wpdb;

        $lang = isset($_POST['lang']) ? trim(sanitize_text_field($_POST['lang']))  : '';
        $syllabus = isset($_POST['syllabus']) ? trim(sanitize_text_field($_POST['syllabus']))  : '';
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id'])  : 0;

        
        if (!check_ajax_referer( 't4u_course_settings_metabox_'.$post_id, '_nonce' )){
            $data=['success'=>false, 'error'=>'Form validation error.'];
            wp_send_json_success($data);
            wp_die();
        }

        if ($lang==''){
            $data=['success'=>false, 'error'=>'Please select the language.'];
            wp_send_json_success($data);
            wp_die();
        }

        if ($syllabus==''){
            $data=['success'=>false, 'error'=>'Please select the syllabus.'];
            wp_send_json_success($data);
            wp_die();
        }

        
        $table1 = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions t1';
        $table2 = $wpdb->prefix . 't4u_courses_software t2';
    
        $sql = $wpdb->prepare("SELECT id_software as id, title
                                FROM ".$table1." LEFT JOIN ".$table2." ON t1.software_id=t2.id_software
                            WHERE t1.syllabus_id=%d AND t1.lang=%s 
                            GROUP BY id_software", array($syllabus, $lang));
                      
        $softwares = $wpdb->get_results($sql, ARRAY_A);

        $data=['success'=>true, 'data'=>$softwares];

        wp_send_json_success($data);
        wp_die();

    } 
    add_action('wp_ajax_t4u_BringSoftware', 't4u_BringSoftware');
    add_action('wp_ajax_nopriv_t4u_BringSoftware', 't4u_BringSoftware');


    function t4u_BringVersions(){
        global $wpdb;

        $lang = isset($_POST['lang']) ? trim(sanitize_text_field($_POST['lang']))  : '';
        $syllabus = isset($_POST['syllabus']) ? trim(sanitize_text_field($_POST['syllabus'])) : '';
        $software = isset($_POST['software']) ? intval($_POST['software'])  : 0;
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id'])  : 0;
        
        
        if (!check_ajax_referer( 't4u_course_settings_metabox_'.$post_id, '_nonce' )){
            $data=['success'=>false, 'error'=>'Form validation error.'];
            wp_send_json_success($data);
            wp_die();
        }

        if ($lang==''){
            $data=['success'=>false, 'error'=>'Please select the language.'];
            wp_send_json_success($data);
            wp_die();
        }

        if ($syllabus==''){
            $data=['success'=>false, 'error'=>'Please select the syllabus.'];
            wp_send_json_success($data);
            wp_die();
        }

        if ($software==''){
            $data=['success'=>false, 'error'=>'Please select the module.'];
            wp_send_json_success($data);
            wp_die();
        }

        
        $table1 = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions t1';
        $table2 = $wpdb->prefix . 't4u_courses_software t2';
    
        $sql = $wpdb->prepare("SELECT prog_id as id
                                FROM ".$table1." LEFT JOIN ".$table2." ON t1.software_id=t2.id_software
                            WHERE t1.syllabus_id=%d AND t1.lang=%s AND t1.software_id=%d
                            GROUP BY prog_id", array($syllabus, $lang, $software));
      
        $versions = $wpdb->get_results($sql, ARRAY_A);

        for($i=0;$i<count($versions); $i++){
            switch($versions[$i]['id']){
                case 1011:
                    $versions[$i]['title'] = "Office 2003";
                    break;
                case 1012:
                    $versions[$i]['title'] = "Office 2007";
                    break;
                case 1014:
                    $versions[$i]['title'] = "Office 2010";
                    break;
                case 1015:
                    $versions[$i]['title'] = "Office 2013";
                    break;
                case 1016:
                    $versions[$i]['title'] = "Office 2016";
                    break;
                case 5:
                    $versions[$i]['title'] = "Windows XP";
                    break;
                case 6:
                    $versions[$i]['title'] = "Windows Vista";
                    break;
                case 11:
                    $versions[$i]['title'] = "Windows 7";
                    break;
                case 12:
                    $versions[$i]['title'] = "Windows 8";
                    break;
                case 13:
                    $versions[$i]['title'] = "Windows 8.1";
                    break;
                case 14:
                    $versions[$i]['title'] = "Windows 10";
                    break;
                case 6000:
                    $versions[$i]['title'] = "OpenOffice.org 3.3";
                    break;
                case 6001:
                    $versions[$i]['title'] = "OpenOffice.org 3.4";
                    break;
                case 6002:
                    $versions[$i]['title'] = "OpenOffice.org 4.1";
                    break;
                case 6010:
                    $versions[$i]['title'] = "LibreOffice 4";
                    break;
                case 6011:
                    $versions[$i]['title'] = "LibreOffice 4.3";
                    break;
                case 6012:
                    $versions[$i]['title'] = "LibreOffice 4.4";
                    break;
                case 6013:
                    $versions[$i]['title'] = "LibreOffice 5";
                    break;
                default:
                    $versions[$i]['title'] = $versions[$i]['id'];
            }
        }

        $data=['success'=>true, 'data'=>$versions, 's'=>$sql];

        wp_send_json_success($data);
        wp_die();

    } 
    add_action('wp_ajax_t4u_BringVersions', 't4u_BringVersions');
    add_action('wp_ajax_nopriv_t4u_BringVersions', 't4u_BringVersions');


    function t4u_BringSubcategories(){
        global $wpdb;


        $lang = isset($_POST['lang']) ? trim(sanitize_text_field($_POST['lang']))  : '';
        $syllabus = isset($_POST['syllabus']) ? trim(sanitize_text_field($_POST['syllabus']))  : '';
        $software = isset($_POST['software']) ? intval($_POST['software'])  : 0;
        $version = isset($_POST['version']) ? intval($_POST['version'])  : 0;
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id'])  : 0;
        
        if ($lang==''){
            $data=['success'=>false, 'error'=>'Please select the language.'];
            wp_send_json_success($data);
            wp_die();
        }
        elseif ($syllabus==''){
            $data=['success'=>false, 'error'=>'Please select the syllabus.'];
            wp_send_json_success($data);
            wp_die();
        }
        elseif ($software==0){
            $data=['success'=>false, 'error'=>'Please select the software.'];
            wp_send_json_success($data);
            wp_die();
        }
        elseif ($version==0){
            $data=['success'=>false, 'error'=>'Please select the version.'];
            wp_send_json_success($data);
            wp_die();
        }
        $categories=[];

        $table1 = $wpdb->prefix . 't4u_courses_syllabus';
          
        $sql = $wpdb->prepare("SELECT CONCAT(level, '-', software,'-',foreas) id
                               FROM ".$table1." 
                               WHERE id_syllabus=%d", array($syllabus));
        $res = $wpdb->get_results($sql, ARRAY_A);
        $syllabus=$res[0]['id'];

        $hash = sha1($lang .'-'. $syllabus .'-'. $software.'-'. $version);

        $table_name = $wpdb->prefix . 't4u_courses_categories';
		$sql = $wpdb->prepare("SELECT category_json FROM ".$table_name." WHERE `hash`=%s", array($hash));
        $res = $wpdb->get_results($sql, ARRAY_A);
       
        $category_json='';
        $cached=false;
        if (count($res)>0){
            $category_json=$res[0]['category_json'];
            $data=json_decode($category_json, true);
            if (!$data['success']){
                $videos_json='';
            }
            else{
                $cached=true;
            }
        }
        $response='';
        if ($category_json == ''){
            $t4u_api_key = get_option( T4U_API_KEY_SETTING );
            $response = wp_remote_post( TEST4U_DATA_URL."/plugins/test4u-video-courses-pro", array(
                'method' => 'POST',
                'timeout' => 45,
                'httpversion' => '1.0',
                'blocking' => true,
                'body' => array('a'=>'categories', 'lang' => $lang, 'syllabus' => $syllabus, 'plugin_version'=>T4U_PLUGIN_VERSION, 'software' => $software, 'version' => $version, 'api_key'=>$t4u_api_key  )
                )
            );
             /*
        echo '<pre>';
        print_r($response['body']);
        die();
        */
            $category_json=isset($response['body']) ? sanitize_text_field($response['body']) : '{"success":"false"}';
            $data['d']=$category_json;
        }
        
        $data=json_decode($category_json, true);
        if ($data['success'] && isset($data['categories']) && count($data['categories'])){
            $categories = $data['categories'];

            $table_name = $wpdb->prefix . 't4u_courses_categories';
            $sql = $wpdb->prepare("INSERT INTO ".$table_name." (`hash`, category_json) VALUES (%s, %s) ON DUPLICATE KEY UPDATE category_json=%s", array($hash, $category_json, $category_json));
 
            $wpdb->query($sql);
        }

        for($i=0;$i<count($categories);$i++){
            $categories[$i]['id'] = (int)$categories[$i]['id'];
            $categories[$i]['descr'] = sanitize_text_field($categories[$i]['descr']);
        }

        $data=['success'=>true, 'data'=>['categories'=>$categories], 'c'=>$cached];
        
        wp_send_json_success($data);
		wp_die();
    }
    add_action('wp_ajax_t4u_BringCategories', 't4u_BringSubcategories');
    add_action('wp_ajax_nopriv_t4u_BringCategories', 't4u_BringSubcategories');


    function t4u_BringVideos(){
        global $wpdb;

        $lang = isset($_POST['lang']) ? trim(sanitize_text_field($_POST['lang']))  : '';
        $syllabus = isset($_POST['syllabus']) ? trim(sanitize_text_field($_POST['syllabus'])) : '';
        $software = isset($_POST['software']) ? intval($_POST['software'])  : 0;
        $category = isset($_POST['category']) ? intval($_POST['category'])  : 0;
        $version = isset($_POST['version']) ? intval($_POST['version'])  : 0;
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id'])  : 0;
        
        if (!check_ajax_referer( 't4u_course_settings_metabox_'.$post_id, '_nonce' )){
            $data=['success'=>false, 'error'=>'Form validation error.'];
            wp_send_json_success($data);
            wp_die();
        }

        if ($lang==''){
            $data=['success'=>false, 'error'=>'Please select the language.'];
            wp_send_json_success($data);
            wp_die();
        }
        elseif ($syllabus==''){
            $data=['success'=>false, 'error'=>'Please select the syllabus.'];
            wp_send_json_success($data);
            wp_die();
        }
        elseif ($category==0){
            $data=['success'=>false, 'error'=>'Please select the category.'];
            wp_send_json_success($data);
            wp_die();
        }

        $table1 = $wpdb->prefix . 't4u_courses_syllabus';
          
        $sql = $wpdb->prepare("SELECT CONCAT(level, '-', software,'-',foreas) id
                               FROM ".$table1." 
                               WHERE id_syllabus=%d", array($syllabus));
        $res = $wpdb->get_results($sql, ARRAY_A);
        $syllabus=$res[0]['id'];

        $hash = sha1($lang .'-'. $syllabus .'-'. $software .'-'.$category.'-'.$version );

        $table_name = $wpdb->prefix . 't4u_courses_categories_videos';
		$sql = $wpdb->prepare("SELECT videos_json FROM ".$table_name." WHERE `hash`=%s", array($hash));
        $res = $wpdb->get_results($sql, ARRAY_A);

        $videos_json='';
        $cached=false;
        if (count($res)>0){
            $videos_json=$res[0]['videos_json'];
            $data=json_decode($videos_json, true);
            if (!$data['success'] || count($data['videos'])==0){
                $videos_json='';
            }
            else{
                $cached=true;
            }
        }
        $response='';
        if ($videos_json == ''){
            $t4u_api_key = get_option( T4U_API_KEY_SETTING );
            $response = wp_remote_post( TEST4U_DATA_URL."/plugins/test4u-video-courses-pro", array(
                'method' => 'POST',
                'timeout' => 45,
                'httpversion' => '1.0',
                'blocking' => true,
                'body' => array( 'a'=>'videos', 'lang' => $lang, 'syllabus' => $syllabus, 'software' => $software, 'plugin_version'=>T4U_PLUGIN_VERSION, 'category'=> $category, 'version' => $version, 'api_key'=>$t4u_api_key )
                )
            );
           
            $videos_json=isset($response['body']) ? sanitize_text_field($response['body']) : '{"success":"false"}';
        }

        $data=json_decode($videos_json, true);
        $videos=[];
        if ($data['success'] && isset($data['videos']) && count($data['videos'])){
            $videos = $data['videos'];

            $table_name = $wpdb->prefix . 't4u_courses_categories_videos';
            $sql = $wpdb->prepare("INSERT INTO ".$table_name." (`hash`, videos_json) VALUES (%s, %s) ON DUPLICATE KEY UPDATE videos_json=%s", array($hash,$videos_json,$videos_json));

            $wpdb->query($sql);
        }

        for($i=0;$i<count($videos);$i++){
            $videos[$i]['qid'] = (int)$videos[$i]['qid'];
            $videos[$i]['question_text'] = sanitize_text_field($videos[$i]['question_text']);
            $videos[$i]['youtubeid'] = sanitize_text_field($videos[$i]['youtubeid']);
            $videos[$i]['category'] = sanitize_text_field($category);
        }

        $questions = get_post_meta( $post_id, 't4u_course_questions', true );
        if ($questions){
            $questions = explode(',',$questions);
            array_map('trim',$questions);
            array_map('intval',$questions);

            for($i=0;$i<count($videos);$i++){
                if (in_array($videos[$i]['qid'], $questions)){
                    $videos[$i]['sel']=true;
                }
            }
        }

        $data=['success'=>true, 'data'=>['videos'=>$videos], 'c'=>$cached];
        wp_send_json_success($data);
		wp_die();
    }
    add_action('wp_ajax_t4u_BringVideos', 't4u_BringVideos');
    add_action('wp_ajax_nopriv_t4u_BringVideos', 't4u_BringVideos');

    
    function t4u_DownloadT4uData(){
        global $wpdb;
        
        if ( get_option( T4U_API_KEY_SETTING ) === false ) {
            $data=['success'=>false, 'error'=>"Please activate the plugin first."];
            wp_send_json_success($data);
            wp_die();
        }
        $t4u_api_key = get_option( T4U_API_KEY_SETTING );
        
        $response = wp_remote_post( TEST4U_DATA_URL."/plugins/test4u-video-courses-pro", array(
            'method' => 'POST',
            'timeout' => 45,
            'httpversion' => '1.0',
            'blocking' => true,
            'body' => array( 'a'=>'download_material', 'plugin_version'=>T4U_PLUGIN_VERSION, 'api_key'=>$t4u_api_key )
            )
        );
        
        $response=isset($response['body']) ? sanitize_text_field($response['body']) : '{"success":"false"}';
        $response = json_decode($response, true);
        
        $syllabus = [];
        $software =[];
        $langs =[];
        if ($response['success']){
            $syllabus = $response['syllabus'];
            $software = $response['software'];
            $langs = $response['langs'];
        }

        foreach($langs as $lang){
            $table_name = $wpdb->prefix . 't4u_courses_languages';
            $sql = "INSERT INTO $table_name (lang, description, sorting) VALUES (%s, %s, %d) ON DUPLICATE KEY UPDATE description=%s, sorting=%d";
            $sql = $wpdb->prepare($sql, array($lang['id'], $lang['title'], $lang['sorting'], $lang['title'], $lang['sorting']));

            $wpdb->query($sql);
            
        }
        
        $hashes1=[];
        $hashes2=[];
        foreach($syllabus as $s){
            $hashes1[] = esc_sql($s['level'] .'-'. $s['software'].'-'. $s['foreas']);

            if ($s['title']=='')continue;
            $table_name = $wpdb->prefix . 't4u_courses_syllabus';
            
            $sql =  $wpdb->prepare("SELECT id_syllabus, title, sorting
                    FROM $table_name 
                    WHERE `level`=%d
                        AND software=%d
                        AND foreas=%d", array($s['level'], $s['software'], $s['foreas']));

            $res = $wpdb->get_results($sql, ARRAY_A);
           
            if (count($res)==0){
                
                $sql = "INSERT INTO $table_name (title, `level`, software, foreas, sorting) VALUES (%s, %d, %d, %d, %d) ON DUPLICATE KEY UPDATE title=%s, sorting=%d";
                $sql = $wpdb->prepare($sql, array($s['title'], $s['level'], $s['software'], $s['foreas'], $s['sorting'],  $s['title'], $s['sorting']));

                $wpdb->query($sql);

                $sql =  $wpdb->prepare("SELECT id_syllabus 
                        FROM $table_name 
                        WHERE `level`=%d
                            AND software=%d
                            AND foreas=%d", array($s['level'], $s['software'], $s['foreas']));

                $res = $wpdb->get_results($sql, ARRAY_A);
                
            }
            else{
                if (($res[0]['title'] != $s['title'] || $res[0]['sorting'] != $s['sorting'])){
                    $sql = "UPDATE $table_name SET title=%s, sorting=%d WHERE id_syllabus=%d";
                    $sql = $wpdb->prepare($sql, $s['title'], $s['sorting'], $res[0]['id_syllabus'] );
    
                    $wpdb->query($sql);
                }
            }
          
            if (count($res)>0){
                $syllabus_id=(int)$res[0]['id_syllabus'];
               
                foreach($s['prog_langs'] as $lang=>$enotites){
                    foreach($enotites as $enotita=>$progs){
                        foreach($progs as $prog){
                            $hashes2[] = esc_sql($syllabus_id .'-'. $enotita.'-'. $prog.'-'.$lang);
                            $table_name = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions';
                            $sql = "INSERT INTO $table_name (syllabus_id, software_id, prog_id, lang) VALUES (%d, %d, %d, %s) ON DUPLICATE KEY UPDATE prog_id=%d";
                            
                            $sql = $wpdb->prepare($sql, array((int)$syllabus_id, (int)$enotita, (int)$prog, $lang, (int)$prog));
                            
                            $wpdb->query($sql);
                        }
                    }
                }
            }
        }
        
        if (count($hashes1)>0){
            $table_name = $wpdb->prefix . 't4u_courses_syllabus';
            $sql =  "DELETE
                    FROM $table_name 
                    WHERE CONCAT(level, '-', software,'-',foreas) NOT  IN ('".implode("','",$hashes1)."')";
    
            $wpdb->query($sql);
        }

        if (count($hashes2)>0){
            $table_name = $wpdb->prefix . 't4u_courses_syllabus_software_lang_versions';
            $sql =  "DELETE
                    FROM $table_name 
                    WHERE CONCAT(syllabus_id, '-', software_id,'-',prog_id,'-',lang) NOT  IN ('".implode("','",$hashes2)."')";
    
            $wpdb->query($sql);
        }

        $table_name = $wpdb->prefix . 't4u_courses_software';
        foreach($software as $s){
            $sql = $wpdb->prepare("INSERT INTO $table_name (id_software, title) VALUES (%d, %s) ON DUPLICATE KEY UPDATE title=%s", array($s['id'], $s['title'], $s['title']));
                    
            $wpdb->query($sql);
        }

        
        update_option( T4U_API_KEY_SETTING.'_last_update', time() );

    }


    function t4u_RegisterCopy(){
        global $wpdb;
        $data=['success'=>false];

        $api_key = isset($_POST['api_key']) ? trim(sanitize_text_field($_POST['api_key'])) : '';

        if ($api_key != ''){
            update_option( T4U_API_KEY_SETTING, $api_key);
            t4u_DownloadT4uData();
            $data['success']=true;
        }
           
        wp_send_json_success($data);
        wp_die();
    }
    add_action('wp_ajax_t4u_RegisterCopy', 't4u_RegisterCopy');
    add_action('wp_ajax_nopriv_t4u_RegisterCopy', 't4u_RegisterCopy');
    
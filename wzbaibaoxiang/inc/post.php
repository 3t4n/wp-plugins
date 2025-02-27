<?php
class websitebox_post{
    const data =[];
    function __construct() {
        add_action('wp_ajax_websitebox_get_vip', [$this,'websitebox_get_vip']);
        add_action('wp_ajax_websitebox_vip', [$this,'websitebox_vip']);
        
        add_action('wp_ajax_websitebox_changgui', [$this,'websitebox_changgui']);
        add_action('wp_ajax_websitebox_get_changgui', [$this,'websitebox_get_changgui']);
        add_action('wp_ajax_websitebox_youhua', [$this,'websitebox_youhua']);
        add_action('wp_ajax_websitebox_get_youhua', [$this,'websitebox_get_youhua']);
        add_action('wp_ajax_websitebox_kefu', [$this,'websitebox_kefu']);
        add_action('wp_ajax_websitebox_get_kefu', [$this,'websitebox_get_kefu']);
        add_action('wp_ajax_websitebox_shoujikefu', [$this,'websitebox_shoujikefu']);
        add_action('wp_ajax_websitebox_get_shoujikefu', [$this,'websitebox_get_shoujikefu']);
        add_action('wp_ajax_websitebox_liuyan', [$this,'websitebox_liuyan']);
        add_action('wp_ajax_websitebox_get_liuyan', [$this,'websitebox_get_liuyan']);
        add_action('wp_ajax_websitebox_delete_liuyan', [$this,'websitebox_delete_liuyan']);
        add_action('wp_ajax_websitebox_liuyan_list', [$this,'websitebox_liuyan_list']);
        add_action('wp_ajax_websitebox_sitebg', [$this,'websitebox_sitebg']);
        add_action('wp_ajax_websitebox_get_sitebg', [$this,'websitebox_get_sitebg']);
        add_action('wp_ajax_websitebox_alert', [$this,'websitebox_alert']);
        add_action('wp_ajax_websitebox_get_alert', [$this,'websitebox_get_alert']);
        add_action('wp_ajax_websitebox_scroll', [$this,'websitebox_scroll']);
        add_action('wp_ajax_websitebox_get_scroll', [$this,'websitebox_get_scroll']);
        add_action('wp_ajax_websitebox_shuiyin', [$this,'websitebox_shuiyin']);
        add_action('wp_ajax_websitebox_get_shuiyin', [$this,'websitebox_get_shuiyin']);
        add_action('wp_ajax_websitebox_sanheyi', [$this,'websitebox_sanheyi']);
        add_action('wp_ajax_websitebox_get_sanheyi', [$this,'websitebox_get_sanheyi']);
        add_action('wp_ajax_websitebox_guanggao', [$this,'websitebox_guanggao']);
        add_action('wp_ajax_websitebox_get_guanggao', [$this,'websitebox_get_guanggao']);
        add_action('wp_ajax_nopriv_websitebox_insert_liuyan', [$this,'websitebox_insert_liuyan']);
        add_action('wp_ajax_websitebox_insert_liuyan', [$this,'websitebox_insert_liuyan']);
        add_action('wp_ajax_websitebox_get_picload', [$this,'websitebox_get_picload']);
        add_action('wp_ajax_websitebox_picload', [$this,'websitebox_picload']);
        add_action('wp_ajax_websitebox_tables', [$this,'websitebox_tables']);
        add_action('wp_ajax_websitebox_get_gonggao', [$this,'websitebox_get_gonggao']);
        add_action('wp_ajax_websitebox_gonggao_read', [$this,'websitebox_gonggao_read']);
        add_action('wp_ajax_websitebox_tables_jiegou', [$this,'websitebox_tables_jiegou']);
        add_action('wp_ajax_websitebox_tables_back', [$this,'websitebox_tables_back']);
        add_action('wp_ajax_websitebox_tables_back_list', [$this,'websitebox_tables_back_list']);
        
        add_action('wp_ajax_websitebox_is_mianze', [$this,'websitebox_is_mianze']);
        // add_action('wp_ajax_websitebox_tables_back_huifu', [$this,'websitebox_tables_back_huifu']);
    }
    public function websitebox_is_mianze(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $websitebox_is_mianze = get_option('websitebox_is_mianze');
            if($websitebox_is_mianze===false){
                add_option('websitebox_is_mianze',1);
            }else{
                update_option('websitebox_is_mianze',1);
            }
        }
        
    }
    public function websitebox_vip(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $key = sanitize_text_field($_POST['key']);
            $data = websitebox::websitebox_url();
            $url1 = sanitize_text_field($_SERVER['SERVER_NAME']);
            $url = 'https://www.rbzzz.com/api/money/log2?url='.$data.'&url1='.$url1.'&key='.$key.'&type=8';
            $defaults = array(
                'timeout' => 120,
                'connecttimeout'=>120,
                'redirection' => 3,
                'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
                'sslverify' => FALSE,
            );
            $result = wp_remote_get($url,$defaults);
            if(!is_wp_error($result)){
                $content = wp_remote_retrieve_body($result);
                if($content){
                    $baiduseo_wzt_log = get_option('websitebox_log');
                    if($baiduseo_wzt_log!==false){
            	        update_option('websitebox_log',$key);
            	    }else{
            	        add_option('websitebox_log',$key);
            	    }
                    echo wp_json_encode(['code'=>1]);exit;
                }
        	}
        	echo wp_json_encode(['code'=>0]);exit;
        	
        
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_vip(){
        
        if(isset($_POST['nonce']) && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            global $websitebox_log;
             $defaults = array(
                'timeout' => 4000,
                'connecttimeout'=>4000,
                'redirection' => 3,
                'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
                'sslverify' => FALSE,
            );
            $wechatreplay_level = get_option('websitebox_level');
            if(!isset($wechatreplay_level[5]) || $wechatreplay_level[5]<time()-24*3600){
                $url = 'https://www.rbzzz.com/api/money/level8?url='.websitebox::websitebox_url();
                $result = wp_remote_get($url,$defaults);
                if(!is_wp_error($result)){
                    $level = wp_remote_retrieve_body($result);
                    $level = json_decode($level,true);
                    
                    $level1 = explode(',',$level['level']);
                    $level1[2] = WEBSITEBOX_VERSION;
                    $level1[3] = $level['version'];
                    $level1[4] = $websitebox_log;
                    $level2 = $level1;
                    if(isset($level1[0]) && ($level1[0]==1 || $level1[0]==2)){
                        $level2[5] = time();
                        
                        update_option('websitebox_level',$level2);
                        
                    }
                }
            }else{
                $level1 = $wechatreplay_level;
                $level1[4] = $websitebox_log;
               
            }
            $data['level'] = $level1;                                   
            
            echo wp_json_encode(['code'=>1,'data'=>$data]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    // public function websitebox_tables_back_huifu(){
    //     if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
    //         WP_Filesystem();
    //         $page = (int)$_POST['page'];
    //         global $wpdb,$wp_filesystem;
    //         $backup_file_path = sanitize_text_field($_POST['url']);
            
    //         // 检查备份文件是否存在
    //         if (!file_exists($backup_file_path)) {
    //             echo wp_json_encode(['code'=>0,'msg'=>'文件不存在！']);exit;
    //         }
        
    //         // 读取备份文件内容
    //         $backup_content = $wp_filesystem->get_contents($backup_file_path);
            
    //         // 将备份内容按分号分割成单个SQL语句
    //         $sql_statements = explode(';', $backup_content);
    //         $percent = floor($page*1000*100/count($sql_statements));
    //         $sql_statements = array_slice($sql_statements, $page*1000, 1000);
    //         $table_structure_pattern = '/^CREATE TABLE\s+`([^`]+)`/i';
    //         $data_insert_pattern = '/^INSERT INTO\s+`([^`]+)`/i';
            
    //          $existing_table_structures = [];
    //         $existing_table_data = [];
    //         $tables = $wpdb->get_results("SHOW TABLES");
    //         foreach ($tables as $table) {
    //             $table_name = current((array)$table);
    //             $create_table_result = $wpdb->get_results("SHOW CREATE TABLE `$table_name`");
    //             $existing_table_structures[$table_name] = $create_table_result[0]->{'Create Table'};
    //         }
    //         $batch_count = 0;
    //          foreach ($sql_statements as $sql) {
    //               $batch_count++;
    //               if($batch_count>20){
    //                   sleep(1);
    //                   $batch_count=0;
    //               }
    //                 $sql = trim($sql);
    //                 if (empty($sql)) {
    //                     continue;
    //                 }
            
    //                 // 处理表创建语句
    //                 if (preg_match($table_structure_pattern, $sql, $matches)) {
    //                     $backup_table_name = $matches[1];
    //                     if (isset($existing_table_structures[$backup_table_name])) {
    //                         // 表已存在，比较结构差异
    //                         $backup_table_structure = $sql;
    //                         $existing_table_structure = $existing_table_structures[$backup_table_name];
            
    //                         // 这里简单处理，实际应用中需要更复杂的结构对比逻辑
    //                         if ($backup_table_structure!== $existing_table_structure) {
    //                             // 结构不同，备份现有数据
    //                             $existing_table_data[$backup_table_name] = $wpdb->get_results("SELECT * FROM `$backup_table_name`");
    //                             // 删除现有表
    //                             $wpdb->query("DROP TABLE `$backup_table_name`");
    //                             // 创建新表
    //                             $wpdb->query($sql);
    //                             // 重新插入现有数据
    //                             if (!empty($existing_table_data[$backup_table_name])) {
    //                                 foreach ($existing_table_data[$backup_table_name] as $row) {
    //                                     $columns = array_keys((array)$row);
    //                                     $values = array_values((array)$row);
    //                                     $column_str = '`'. implode('`, `', $columns). '`';
    //                                     $value_str = '\''. implode('\', \'', array_map([$wpdb, 'esc_like'], $values)). '\'';
    //                                     $insert_sql = "INSERT INTO `$backup_table_name` ($column_str) VALUES ($value_str)";
    //                                     $wpdb->query($insert_sql);
    //                                 }
    //                             }
    //                         }
    //                     } else {
    //                         // 表不存在，直接创建
    //                         $wpdb->query($sql);
    //                     }
    //                 }elseif (preg_match($data_insert_pattern, $sql, $matches)) {
    //                     $table_name = $matches[1];
    //                     // 使用INSERT IGNORE避免主键冲突
    //                     $new_sql = preg_replace('/^INSERT INTO/i', 'INSERT IGNORE INTO', $sql);
    //                     $wpdb->query($new_sql);
    //                 }
    //             }
            
    //          echo wp_json_encode(['code'=>1,'percent'=>$percent]);exit;
    //     }
    //     echo wp_json_encode(['code'=>0,'msg'=>'恢复失败']);exit;
    // }
    public function websitebox_tables_back_list(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $wpdb;
             $res = $wpdb->get_results('select * from '.$wpdb->prefix . 'websitebox_backup order by id desc',ARRAY_A);
             echo wp_json_encode(['code'=>1,'data'=>$res]);exit;
        }
        echo wp_json_encode(['code'=>0,'msg'=>'获取失败']);exit;
    }
    public function  websitebox_tables_back(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                 set_time_limit(0);
                ini_set('memory_limit','-1');
                 WP_Filesystem();
                global $wpdb,$wp_filesystem;
                // 获取所有表的状态信息
                $table_statuses = $wpdb->get_results("SHOW TABLE STATUS");
                $backup_content = '';
                
                foreach ($table_statuses as $table_status) {
                    $table_name = $table_status->Name;
                
                    // 获取表的创建语句
                    $create_table_result = $wpdb->get_results("SHOW CREATE TABLE `$table_name`");
                    $create_table_statement = $create_table_result[0]->{'Create Table'}.";\n";
                    $backup_content.= $create_table_statement;
                
                    // 获取表中的数据
                    $data_query = "SELECT * FROM `$table_name`";
                    $table_data = $wpdb->get_results($data_query);
                    foreach ($table_data as $row) {
                        $column_names = array_keys((array)$row);
                        $column_values = array_values((array)$row);
                        $backup_content.= "INSERT INTO `$table_name` (";
                        $backup_content.= implode(', ', array_map(function ($col) { return "`$col`"; }, $column_names));
                        $backup_content.= ") VALUES ('";
                        $backup_content.= implode("', '", array_map(function ($val) use ($wpdb) { return $wpdb->esc_like($val); }, $column_values));
                        $backup_content.= "');\n";
                    }
                }
                
                // 保存备份内容到文件
                $plugin_dir = plugin_dir_path( __FILE__ );
                $plugin_url = plugin_dir_url( __FILE__ );
                $url = date('YmdHis').'backup.sql';
                $backup_file_path = $plugin_dir.$url;
                
                $wpdb->insert($wpdb->prefix."websitebox_backup",['url'=>$backup_file_path,'link'=>$plugin_url.$url]);
                $res = $wp_filesystem->put_contents($backup_file_path,$backup_content);
                if($res){
                    echo wp_json_encode(['code'=>1,'msg'=>'备份成功']);exit;
                }else{
                    echo wp_json_encode(['code'=>0,'msg'=>'没有权限']);exit;
                }
            }else{
                 echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
           
        }
        echo wp_json_encode(['code'=>0,'msg'=>'备份失败']);exit;
    }
    public function websitebox_tables_jiegou(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            global $wpdb;
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                $table = sanitize_text_field($_POST['table']);
                $tables = $wpdb->get_results( "desc {$table}", ARRAY_A );
                echo wp_json_encode(['code'=>1,'data'=>$tables]);exit;
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
        }
         echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_tables(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            global $wpdb;
            $tables = $wpdb->get_results( "SHOW TABLE STATUS", ARRAY_A );
            echo wp_json_encode(['code'=>1,'data'=>$tables]);exit;
        }
         echo wp_json_encode(['code'=>0]);exit;
    }
    
    public function websitebox_gonggao_read(){
        if(isset($_POST['nonce']) && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'baiduseo')){
            global $wpdb;
            $res = $wpdb->insert($wpdb->prefix."websitebox_gonggao",['gid'=>(int)$_POST['id']]);
        }
    }
    public function websitebox_get_gonggao(){
         if(isset($_POST['nonce']) && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'baiduseo')){
         global $wpdb;
        $defaults = array(
            'timeout' => 4000,
            'connecttimeout'=>4000,
            'redirection' => 3,
            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
            'sslverify' => FALSE,
        );
        $page = (int)$_POST['page'];
        $url = 'https://www.rbzzz.com/api/rank/gonggao?type=8&page='.$page;
        $result = wp_remote_get($url,$defaults);
        if(!is_wp_error($result)){
            $result = wp_remote_retrieve_body($result);
            $result = json_decode($result,true);
            foreach($result['data'] as $k=>$v){
                $re = $wpdb->query($wpdb->prepare('select * from '.$wpdb->prefix . 'websitebox_gonggao where gid=%d ',$v['id']),ARRAY_A);
                if($re){
                    $result['data'][$k]['is_read'] =1;
                }else{
                    $result['data'][$k]['is_read'] =0;
                }
            }
            echo wp_json_encode(['code'=>1,'data'=>$result['data'],'total'=>(int)$result['total']]);exit; 
        }else{
            echo wp_json_encode(['code'=>0]);exit;
        }
         }
    }
    public function websitebox_changgui(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['zoo'] =(int)$data['zoo']; 
            $list['grey'] =(int)$data['grey'];
            $list['copy'] =(int)$data['copy']; 
            $list['look'] =(int)$data['look']; 
            $list['barrage'] =(int)$data['barrage']; 
            $list['art_cron'] = (int)$data['art_cron'];
            $list['pre'] = (int)$data['pre'];
            $list['media'] = (int)$data['media'];
            $get = get_option('websitebox_base');
            if($get===false){
                add_option('websitebox_base',$list);
            }else{
                update_option('websitebox_base',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
         echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_changgui(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            
            $get = get_option('websitebox_base');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_youhua(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                $data = $_POST;
            $list = [];
            $list['thumb'] = (int)$data['thumb'];
            $list['head_dy'] = (int)$data['head_dy'];
            $list['xml_rpc'] = (int)$data['xml_rpc'];
            $list['feed'] = (int)$data['feed'];
            $list['post_thumb'] = (int)$data['post_thumb'];
            $list['gravatar'] = (int)$data['gravatar'];
            $list['lan'] = (int)$data['lan'];
            $list['wp_json'] = (int)$data['wp_json'];
            $get = get_option('websitebox_youhua');
            if($get===false){
                add_option('websitebox_youhua',$list);
            }else{
                update_option('websitebox_youhua',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            
        }
         echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_youhua(){
         if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
           
            $get = get_option('websitebox_youhua');
          
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
         echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_kefu(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['kefu'] = (int)$data['kefu'];
            $list['type'] = (int)$data['type'];
            $list['bg'] = sanitize_text_field($data['bg']);
            $list['icon'] = sanitize_text_field($data['icon']);
            $list['right'] = sanitize_text_field($data['right']);
            $list['bottom'] = sanitize_text_field($data['bottom']);
           
            $list['phone'] = sanitize_text_field($data['phone']);
            $list['phone_cls'] = sanitize_text_field($data['phone_cls']);
            
            $list['qq'] = sanitize_text_field($data['qq']);
            
            $list['qq_cls'] = sanitize_text_field($data['qq_cls']);
            
            $list['qrcode'] = sanitize_url($data['qrcode']);
           
            $list['qrcode_cls'] = sanitize_text_field($data['qrcode_cls']);
            $list['mail'] = sanitize_text_field($data['mail']);
            
            $list['mail_cls'] = sanitize_text_field($data['mail_cls']);
           
            $list['qqqun'] = sanitize_text_field($data['qqqun']);
            $list['qqqun_cls'] = sanitize_text_field($data['qqqun_cls']);
           
            $list['wb'] = sanitize_text_field($data['wb']);
            $list['wb_cls'] = sanitize_text_field($data['wb_cls']);
            $get = get_option('websitebox_kefu');
            if($get===false){
                add_option('websitebox_kefu',$list);
            }else{
                update_option('websitebox_kefu',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_kefu(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $get = get_option('websitebox_kefu');
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_shoujikefu(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['auto'] = (int)$data['auto'];
            $list['phone'] = sanitize_text_field($data['phone']);
            $list['kefuicon'] = sanitize_text_field($data['kefuicon']);
            $list['location'] = (int)$data['location'];
           
            $get = get_option('websitebox_shoujikefu');
            if($get===false){
                add_option('websitebox_shoujikefu',$list);
            }else{
                update_option('websitebox_shoujikefu',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
        
    }
    public function  websitebox_get_shoujikefu(){
         if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $get = get_option('websitebox_shoujikefu');
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
        
    }
    public function websitebox_liuyan(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
                        
            $list['auto'] = (int)$data['auto'];
            $list['color'] = sanitize_text_field($data['color']);
            $list['title'] = sanitize_text_field($data['title']);
             $list['mobile_auto'] = (int)$data['mobile_auto'];
            $get = get_option('websitebox_liuyan');
            if($get===false){
                add_option('websitebox_liuyan',$list);
            }else{
                update_option('websitebox_liuyan',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function  websitebox_get_liuyan(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            
            $get = get_option('websitebox_liuyan');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_delete_liuyan(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $data = $_POST;
            global $wpdb;
            $id = (int)$data['id'];
            $wpdb->query($wpdb->prepare("DELETE FROM " . $wpdb->prefix . "websitebox_liuyan where id=  %d",$id));
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_liuyan_list(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            global $wpdb;
            $count = $wpdb->query('select * from '.$wpdb->prefix . 'websitebox_liuyan',ARRAY_A);
            $totalpage = ceil($count/35);
            $page = isset($_GET['pages'])?(int)$_GET['pages']:1;
            $start = ($page-1)*35;
            
            $liuyan = $wpdb->get_results($wpdb->prepare('select * from '.$wpdb->prefix . 'websitebox_liuyan order by id desc limit %d,35',$start),ARRAY_A);
            echo wp_json_encode(['code'=>1,'data'=>$liuyan,'count'=>$count,'pagesize'=>$totalpage]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_sitebg(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $data = $_POST;
            $list = [];
            $list['auto'] = (int)$data['auto'];
            $list['mobile_auto'] = (int)$data['mobile_auto'];
            $list['type'] = (int)$data['type'];
            $list['bg'] = sanitize_text_field($data['bg']);
            $list['back'] = sanitize_url($data['back']);
            $list['texiao'] = (int)$data['texiao'];
            $get = get_option('websitebox_sitebg');
            if($get===false){
                add_option('websitebox_sitebg',$list);
            }else{
                update_option('websitebox_sitebg',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_sitebg(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
           
            $get = get_option('websitebox_sitebg');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_alert(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['auto'] = (int)$data['auto'];
            $list['type'] = (int)$data['type'];
            $list['pic'] = sanitize_url($data['pic']);
            $list['title'] = sanitize_text_field($data['title']);
             $list['mobile_auto'] = (int)$data['mobile_auto'];
            $list['bg'] = sanitize_text_field($data['bg']);
            $list['word'] = sanitize_text_field($data['word']);
            $list['content'] = sanitize_textarea_field($data['content']);
            $list['content_color'] = sanitize_text_field($data['content_color']);
            $get = get_option('websitebox_alert');
            if($get===false){
                add_option('websitebox_alert',$list);
            }else{
                update_option('websitebox_alert',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_alert(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
           
            $get = get_option('websitebox_alert');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function  websitebox_scroll(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['auto'] = (int)$data['auto'];
            $list['bg'] = sanitize_text_field($data['bg']);
            $list['word'] = sanitize_text_field($data['word']);
            $list['content'] = sanitize_textarea_field($data['content']);
            $list['mobile_auto'] = (int)$data['mobile_auto'];
            $list['top'] = (int)$data['top'];
            $list['speed'] = (int)$data['speed'];
            $get = get_option('websitebox_scroll');
            if($get===false){
                add_option('websitebox_scroll',$list);
            }else{
                update_option('websitebox_scroll',$list);
            }
          echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_scroll(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
           
            $get = get_option('websitebox_scroll');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_shuiyin(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['auto'] = (int)$data['auto'];
            $list['title'] = sanitize_text_field($data['title']);
            $list['word'] = sanitize_text_field($data['word']);
            $list['size'] = (int)$data['size'];
            $list['type'] = (int)$data['type'];
            $get = get_option('websitebox_shuiyin');
            if($get===false){
                add_option('websitebox_shuiyin',$list);
            }else{
                update_option('websitebox_shuiyin',$list);
            }
         echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_shuiyin(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $data = $_POST;
           
            $get = get_option('websitebox_shuiyin');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_sanheyi(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $data = $_POST;
            $list = [];
            $list['share'] = (int)$data['share'];
            $list['open'] = (int)$data['open'];
            $list['wx'] = sanitize_url($data['wx']);
            $list['ali'] = sanitize_url($data['ali']);
            $get = get_option('websitebox_sanheyi');
            if($get===false){
                add_option('websitebox_sanheyi',$list);
            }else{
                update_option('websitebox_sanheyi',$list);
            }
         echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_sanheyi(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
           
            $get = get_option('websitebox_sanheyi');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function  websitebox_guanggao(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['left'] = (int)$data['left'];
            $list['right'] = (int)$data['right'];
            // $list['mobile_auto'] = (int)$data['mobile_auto'];
            $list['bottom'] = (int)$data['bottom'];
            $list['mobile'] = (int)$data['mobile'];
            $list['leftad'] = [];
            foreach($data['leftad'] as $k=>$v){
                $list['leftad'][] = [
                    'pic'=>sanitize_url($v['pic']),
                    'link'=>sanitize_url($v['link']),
                ];
            }
             $list['rightad'] = [];
            foreach($data['rightad'] as $k=>$v){
                $list['rightad'][] = [
                    'pic'=>sanitize_url($v['pic']),
                    'link'=>sanitize_url($v['link']),
                ];
            }
           
            $list['bottad'] = [
                    'pic'=>sanitize_url($data['bottad']['pic']),
                    'link'=>sanitize_url($data['bottad']['link']),
                    'time'=>(int)$data['bottad']['time'],
                    ];
            
            $list['mobtad'] = [
                    'pic'=>sanitize_url($data['mobtad']['pic']),
                    'link'=>sanitize_url($data['mobtad']['link']),
                    'time'=>(int)$data['mobtad']['time'],
                    ];
            $get = get_option('websitebox_guanggao');
            if($get===false){
                add_option('websitebox_guanggao',$list);
            }else{
                update_option('websitebox_guanggao',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_get_guanggao(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $data = $_POST;
           
            $get = get_option('websitebox_guanggao');
            
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function  website_key(){
        
    }
    public function  websitebox_picload(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
             global $websitebox_log;
            if(!$websitebox_log){
               echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            if(self::pay_money()){
                
            }else{
                echo wp_json_encode(['code'=>0,'msg'=>'请先授权']);exit;
            }
            $data = $_POST;
            $list = [];
            $list['auto'] = (int)$data['auto'];
            $list['mobile_auto'] = (int)$data['mobile_auto'];
            $list['type'] = (int)$data['type'];
            $get = get_option('websitebox_picload');
            if($get===false){
                add_option('websitebox_picload',$list);
            }else{
                update_option('websitebox_picload',$list);
            }
            echo wp_json_encode(['code'=>1]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function  websitebox_get_picload(){
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            $get = get_option('websitebox_picload');
            echo wp_json_encode(['code'=>1,'data'=>$get]);exit;
        }
        echo wp_json_encode(['code'=>0]);exit;
    }
    public function websitebox_insert_liuyan(){
        
        
        if(isset($_POST['nonce'])  && wp_verify_nonce(sanitize_text_field($_POST['nonce']),'websitebox')){
            global $wpdb;
            $content = sanitize_textarea_field($_POST['content']);
            $res = $wpdb->insert($wpdb->prefix."websitebox_liuyan",['content'=>$content]);
            
            if($res){
                echo wp_json_encode(['msg'=>1]);exit;
            }else{
                echo wp_json_encode(['msg'=>0]);exit;
            }
        }
        echo wp_json_encode(['msg'=>0]);exit;
    }
    public static function pay_money(){
         global $websitebox_log;
        if(!$websitebox_log){
            return 0;
        }
        $data =  websitebox::websitebox_url(0);
        
        $url = "https://ceshig.zhengyouyoule.com/index/index/pay_money?url={$data}&type=8";
        $defaults = array(
            'timeout' => 4000,
            'connecttimeout'=>4000,
            'redirection' => 3,
            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
            'sslverify' => FALSE,
        );
        $result = wp_remote_get($url,$defaults);
        
        if(!is_wp_error($result)){
            
            $content = wp_remote_retrieve_body($result);
            
            $content = json_decode($content,true);
            
            if(isset($content['status']) && $content['status']==1){
                return 1;
            }elseif(isset($content['status']) && $content['status']==0){
                return 0;
            }else{
                $url = "http://wp.seohnzz.com/api/index/pay_money?url={$data}&type=8";
            
                $result = wp_remote_get($url,$defaults);
                
                if(!is_wp_error($result)){
                    $content = wp_remote_retrieve_body($result);
                    
                    $content = json_decode($content,true);
                    if(isset($content['status']) && $content['status']==1){
                        return 1;
                    }elseif(isset($content['status']) && $content['status']==0){
                        return 0;
                    }else{
                        $url = "https://www.rbzzz.com/api/money/pay_money?url={$data}&type=8";
                    	$defaults = array(
                            'timeout' =>4000,
                            'connecttimeout'=>4000,
                            'redirection' => 3,
                            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
                            'sslverify' => FALSE,
                        );
                    	$result = wp_remote_get($url,$defaults);
                    	if(!is_wp_error($result)){
                            $content = wp_remote_retrieve_body($result);
                        	$content = json_decode($content,true);
                        	if(isset($content['status']) && $content['status']==1){
                        	    return 1;
                        	}
                    	}else{
                    	    return 0;
                    	}
                    }
                }else{
                   $url = "https://www.rbzzz.com/api/money/pay_money?url={$data}&type=8";
                    	$defaults = array(
                            'timeout' =>4000,
                            'connecttimeout'=>4000,
                            'redirection' => 3,
                            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
                            'sslverify' => FALSE,
                        );
                    	$result = wp_remote_get($url,$defaults);
                    	if(!is_wp_error($result)){
                            $content = wp_remote_retrieve_body($result);
                        	$content = json_decode($content,true);
                        	if(isset($content['status']) && $content['status']==1){
                        	    return 1;
                        	}
                    	}else{
                    	    return 0;
                    	}
                }
            }
        }else{
            
        
            $url = "http://wp.seohnzz.com/api/index/pay_money?url={$data}&type=8";
            
                $result = wp_remote_get($url,$defaults);
                
                if(!is_wp_error($result)){
                    $content = wp_remote_retrieve_body($result);
                    
                    $content = json_decode($content,true);
                    if(isset($content['status']) && $content['status']==1){
                        return 1;
                    }elseif(isset($content['status']) && $content['status']==0){
                        return 0;
                    }else{
                        $url = "https://www.rbzzz.com/api/money/pay_money?url={$data}&type=8";
                    	$defaults = array(
                            'timeout' =>4000,
                            'connecttimeout'=>4000,
                            'redirection' => 3,
                            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
                            'sslverify' => FALSE,
                        );
                    	$result = wp_remote_get($url,$defaults);
                    	if(!is_wp_error($result)){
                            $content = wp_remote_retrieve_body($result);
                        	$content = json_decode($content,true);
                        	if(isset($content['status']) && $content['status']==1){
                        	    return 1;
                        	}
                    	}else{
                    	    return 0;
                    	}
                    }
                }else{
                   $url = "https://www.rbzzz.com/api/money/pay_money?url={$data}&type=8";
                    	$defaults = array(
                            'timeout' =>4000,
                            'connecttimeout'=>4000,
                            'redirection' => 3,
                            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
                            'sslverify' => FALSE,
                        );
                    	$result = wp_remote_get($url,$defaults);
                    	if(!is_wp_error($result)){
                            $content = wp_remote_retrieve_body($result);
                        	$content = json_decode($content,true);
                        	if(isset($content['status']) && $content['status']==1){
                        	    return 1;
                        	}
                    	}else{
                    	    return 0;
                    	}
                }
        }
            
    }
}
?>
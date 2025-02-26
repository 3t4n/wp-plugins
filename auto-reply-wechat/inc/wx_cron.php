<?php
class wechatreplay_cron{
    public function init(){
        $WechatReplay_art_tongbu = get_option('WechatReplay_art_tongbu');
        
        if(isset($WechatReplay_art_tongbu['auto']) && $WechatReplay_art_tongbu['auto']){
            
            add_action( 'wechatreplay_cronhook', [$this,'wechatreplay_cronexec'] );
            // if(isset($_GET['plan'])){
            //     $this->wechatreplay_cronexec();
            // }
             
            // if(!wp_next_scheduled( 'wechatreplay_cronhook' )){
            //     if($WechatReplay_art_tongbu['type']==1){
            //         wp_schedule_event( strtotime(current_time('Y-m-d H:i:00',1)), 'hourly', 'wechatreplay_cronhook' );
            //     }elseif($WechatReplay_art_tongbu['type']==2){
            //         wp_schedule_event( strtotime(current_time('Y-m-d H:i:00',1)), 'twicedaily', 'wechatreplay_cronhook' );
            //     }elseif($WechatReplay_art_tongbu['type']==3){
            //         wp_schedule_event( strtotime(current_time('Y-m-d H:i:00',1)), 'daily', 'wechatreplay_cronhook' );
            //     }
            // }
        }
        
        add_action( 'wechatreplay_cronhook1', [$this,'wechatreplay_cronexec1'] );
        if(!wp_next_scheduled( 'wechatreplay_cronhook1' )){
            wp_schedule_event( strtotime(current_time('Y-m-d H:i:00',1)), 'hourly', 'wechatreplay_cronhook1' );
        }
        $WechatReplay_access_token = get_option('WechatReplay_access_token');
        
        if($WechatReplay_access_token===false){
            $wechat_replay1 = get_option('wechat_replay');
            if(isset($wechat_replay1['appid']) && $wechat_replay1['appid']){
                $wechat_replay['appid'] = $wechat_replay1['appid'];
            }
            if(isset($wechat_replay1['secret']) && $wechat_replay1['secret']){
                $wechat_replay['secret'] = $wechat_replay1['secret'];
            }
            if(isset($wechat_replay['appid'])){
                $this->wechatreplay_cronexec1();
            }
        }
        
    }
    public function wechatreplay_cronexec1(){
        wechat_JSSDK::getAccessToken();
    }
    public function wechatreplay_cronexec(){
        global $wpdb;
        require_once(ABSPATH . 'wp-includes/pluggable.php');
        // echo 111;exit;
        $wechat_replay1 = get_option('wechat_replay');
        $WechatReplay_art_tongbu = get_option('WechatReplay_art_tongbu');
        $WechatReplay_tongbu_num = get_option('WechatReplay_tongbu_num');
        $WechatReplay_tongbu_num = $WechatReplay_tongbu_num?$WechatReplay_tongbu_num:0;
        if(isset($wechat_replay1['appid']) && $wechat_replay1['appid']){
            $wechat_replay['appid'] = $wechat_replay1['appid'];
        }
        if(isset($wechat_replay1['secret']) && $wechat_replay1['secret']){
            $wechat_replay['secret'] = $wechat_replay1['secret'];
        }
        if(!isset($wechat_replay['appid'])){
            return false;
        }
        $jssdk = new wechat_JSSDK($wechat_replay['appid'],$wechat_replay['secret']);
        $url = 'https://api.weixin.qq.com/cgi-bin/freepublish/batchget?access_token='.$jssdk->Wechatacc();
        $num = 0;
        for($i=1;$i<=$WechatReplay_art_tongbu['num'];$i++){
            
            $post ='{"offset": '.$WechatReplay_tongbu_num.', "count": "20"}';
            $data = wp_remote_post($url,['body'=>$post]);
            $data = wp_remote_retrieve_body($data);
            $data = json_decode($data,true);
           
            if(isset($data['item']) && !empty($data['item']) ){
               
                foreach($data['item'] as $k=>$v){
                    
                    ++$num;
                   
                    if($num<=$WechatReplay_art_tongbu['num']){
                        
                         $res = $wpdb->get_row('select * from '.$wpdb->prefix . 'postmeta where meta_value="'.$v['article_id'].'" and meta_key="wechatreplay_article"',ARRAY_A);
                        if(!$res){
                            ++$WechatReplay_tongbu_num;
                            //添加
                            $my_post = array(
                                'post_title' => $v['content']['news_item'][0]['title'],
                                'post_content' => $v['content']['news_item'][0]['content'],
                                'post_status' => 'publish',
                                'post_category' => array($WechatReplay_art_tongbu['cate']),
                                'post_author'=>$WechatReplay_art_tongbu['author']
                            );
                            
                            $id = wp_insert_post($my_post,0);
                            if($id){
                                update_post_meta($id,'wechatreplay_article',$v['article_id']);
                            }
                        }
                    }else{
                        break;
                    }
                }
            }
            if($num>$WechatReplay_art_tongbu['num']){
                break;
            }
                
            
            
        }
        update_option('WechatReplay_tongbu_num',$WechatReplay_tongbu_num);
    }
}
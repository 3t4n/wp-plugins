<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/public/api
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class BingPush
{
    public function __construct()
    {
        $https=empty($arr['https'])?'':'https://';
        $arr=get_option('apoyl-bingpush-settings');
        $this->site=$https.$arr['site'];
        $this->apiurl = 'https://ssl.bing.com/webmaster/api.svc/json/SubmitUrlbatch?apikey='.$arr['secret'];

    }

    public function push($update,$aid,$subject,$url){
        global $wpdb;

        $re=json_decode($this->httpGet($this->apiurl, $url));
        $data=array(
            'aid'=>$aid,
            'subject'=>$subject,
            'url'=>$url,
            'modtime'=>time(),
            'ispush'=>-1
        );
   
        if($update) $data['ispush']=-1+$update['ispush'];
        if(isset($re->ErrorCode)){
            $data['msgs']=$re->Message;
        }else{
            $data['ispush']=1;
            $data['msgs']='';
        }
        if($update){
            $where=array('id'=>$update['id']);
            $wpdb->update($wpdb->prefix.'apoyl_bingpush', $data, $where);
        }else{
            $wpdb->insert($wpdb->prefix.'apoyl_bingpush', $data);
        }
        return $data['ispush'];
    }
    private function httpGet($url,$pushurl)
    {
            $res = wp_remote_retrieve_body(wp_remote_post($url, array(
                'timeout' => 30,
                'headers'=>array('content-type'=>'application/json'),
                'body' =>  json_encode(array(
                    'siteUrl'=>esc_url($this->site),
                    'urlList'=>array(
                        $pushurl
                    ),
                )),
            )));
        return $res;
    }

}
<?php
/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_TENCENTCOS
 * @subpackage APOYL_TENCENTCOS/api
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require APOYL_TENCENTCOS_DIR . 'api/cos-sdk-v5-7/vendor/autoload.php';
class ApoylTencentcosCom
{

    public function __construct($cache)
    {
        $this->cache = $cache;

    }

    public function putObj($attachment)
    {
    
        try {
            $cosClient = new Qcloud\Cos\Client(array(
                'region' => $this->cache['region'],
                'credentials' => array(
                    'secretId' => $this->cache['accessid'],
                    'secretKey' => $this->cache['secretkey']
                )
            ));
            $key = $attachment;
            $srcPath = WP_CONTENT_DIR. '/'.$attachment;
            $file = fopen($srcPath, "rb");
           
                $result = $cosClient->putObject(array(
                    'Bucket' => $this->cache['bucket'],
                    'Key' => $key,
                    'Body' => $file
                ));
 
                if($this->cache['opendebug']){
                    if(!isset($result['Key'])){
                       return __('opendebug_tips','apoyl-tencentcos');
                    }
                }
                if(isset($result['Key']))
                     return true;
                return false;
    
        } catch (\Exception $e) {
      
            if($this->cache['opendebug']){
                return $e->getMessage();
            }
            return false;
        }
    }

}
?>
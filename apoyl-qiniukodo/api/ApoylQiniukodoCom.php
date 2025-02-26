<?php
/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_QINIUKODO
 * @subpackage APOYL_QINIUKODO/api
 * @author 凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require APOYL_QINIUKODO_DIR . 'api/php-sdk-7.10.1/autoload.php';

use Qiniu\Auth;
use Qiniu\Zone;
use Qiniu\Config;
use Qiniu\Storage\UploadManager;

class ApoylQiniukodoCom
{

    public function __construct($cache)
    {
        $this->cache = $cache;
    }

    public function putObj($attachment)
    {
        try {
        	$key = $attachment;
        	$srcPath = WP_CONTENT_DIR . '/' . $attachment;
        	if(!file_exists($srcPath))
        		return '';
        	
            $auth = new Auth(trim($this->cache['accessid']), trim($this->cache['secretkey']));
            $token = $auth->uploadToken($this->cache['bucket']);

            
            $z='zone'.$this->cache['region'];
            $zone = Zone::$z();
            $config = new Config($zone);
            if($this->cache['https'])
                $config->useHTTPS = true;
            
            $uploadMgr = new UploadManager($config);
            list($ret, $err) = $uploadMgr->putFile($token, $key, $srcPath);

            if ($err == null)
                return '';
            return $err;
        } catch (\Exception $e) {
            return false;
        }
    }
    

}
?>
<?php
/*
 * @link http://www.girltm.com/
 * @since 1.0.0
 * @package APOYL_ALIYUNVIDEO
 * @subpackage APOYL_ALIYUNVIDEO/api
 * @author 凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
require APOYL_ALIYUNVIDEO_DIR . 'api/vod-20170321-3.3.0/autoload.php';

use AlibabaCloud\SDK\Vod\V20170321\Vod;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Vod\V20170321\Models\CreateUploadVideoRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use AlibabaCloud\SDK\Vod\V20170321\Models\UploadMediaByURLRequest;
use AlibabaCloud\SDK\Vod\V20170321\Models\GetURLUploadInfosRequest;
use AlibabaCloud\SDK\Vod\V20170321\Models\GetPlayInfoRequest;
use AlibabaCloud\SDK\Vod\V20170321\Models\GetVideoPlayAuthRequest;

class ApoylAliyunvideoCom
{
    private $cache;
    public function __construct($cache)
    {
        $this->cache = $cache;
    }
    public  function createClient(){
        $config = new Config([
            "accessKeyId" => trim($this->cache['accessid']),
            "accessKeySecret" => trim($this->cache['secretkey'])
        ]);
        $config->endpoint = 'vod.'.$this->cache['region'].'.aliyuncs.com';
        return new Vod($config);
    }
    public function putObj($srcPath,$attachment_id)
    {
        global $wpdb;
        $file = apoyl_aliyunvideo_file('putobj');
        if ($file) {
            include $file;
        } else {
            $client = $this->createClient();
            $createUploadVideoRequest = new CreateUploadVideoRequest([
                "fileName" => $srcPath,
                "title" => basename($srcPath)
            ]);
            $runtime = new RuntimeOptions([

            ]);
            try {
                $client->createUploadVideoWithOptions($createUploadVideoRequest, $runtime);

            } catch (Exception $error) {
                if (!($error instanceof TeaError)) {
                    $error = new TeaError([], $error->getMessage(), $error->getCode(), $error);
                }

                error_log("VOD:" . Utils::assertAsString($error->message) . $error->data["Recommend"]);

            }
        }
    }
        public function getJobId($jobid){
            $client = $this->createClient();
            $getURLUploadInfosRequest = new GetURLUploadInfosRequest([
                "jobIds" => $jobid
            ]);
                $runtime = new RuntimeOptions([

                ]);

            try {
                $respurl=$client->getURLUploadInfosWithOptions($getURLUploadInfosRequest, $runtime);

            }catch (Exception $error) {
                if (!($error instanceof TeaError)) {
                    $error = new TeaError([], $error->getMessage(), $error->getCode(), $error);
                }
                error_log("VOD:" . Utils::assertAsString($error->message).$error->data["Recommend"]);

            }
            return $respurl;
    }

    public function play($mediaId)
    {
        $client = $this->createClient();
        $getPlayInfoRequest = new GetPlayInfoRequest([
            "videoId" => $mediaId
        ]);
        $runtime = new RuntimeOptions([]);
        try {
            $resp=$client->getPlayInfoWithOptions($getPlayInfoRequest, $runtime);
        }
        catch (Exception $error) {
            if (!($error instanceof TeaError)) {
                $error = new TeaError([], $error->getMessage(), $error->getCode(), $error);
            }

            return  Utils::assertAsString($error->message);
        }
        return $resp;
    }
    public function playAuth($mediaId)
    {
        $client = $this->createClient();
        $getVideoPlayAuthRequest = new GetVideoPlayAuthRequest([
            "videoId" => $mediaId
        ]);
        $runtime = new RuntimeOptions([]);
        try {
            $resp=$client->getVideoPlayAuthWithOptions($getVideoPlayAuthRequest, $runtime);
        }
        catch (Exception $error) {
            if (!($error instanceof TeaError)) {
                $error = new TeaError([], $error->getMessage(), $error->getCode(), $error);
            }

            return  Utils::assertAsString($error->message);
        }
        return $resp;

    }



}
?>
<?php
namespace WP_Arvan\OBS;
use Aws\Exception\AwsException;
$prevent_upload = false;
class RestApi{
    private $client = null;
    function __construct(){
        $this->client = \WP_Arvan\OBS\S3Singletone::get_instance()->get_s3client();
        add_action('rest_api_init',[$this,'rest_api_init']);
    }


    function rest_api_init(){
        //get bucket list of storage
        register_rest_route('ac-storage/v1', '/ListBuckets', array(
            'methods'  => 'GET',
            'callback' => [$this,'bucket_list'],
            'permission_callback' => [$this,'permission'],
        ));
        //create bucket list in storage
        register_rest_route('ac-storage/v1', '/CreateBucket', array(
            'methods'  => 'POST',
            'callback' => [$this,'bucket_create'],
            'permission_callback' => [$this,'permission'],
        ));
        //add bucket file to wordpress attachment
        register_rest_route('ac-storage/v1', '/DirectFetch', array(
            'methods'  => 'POST',
            'callback' => [$this,'direct_fetch'],
            'permission_callback' => [$this,'permission'],
        ));
        //upload file to specific bucket
        register_rest_route('ac-storage/v1', '/PutObject', array(
            'methods'  => 'POST',
            'callback' => [$this,'put_object'],
            'permission_callback' => [$this,'permission'],
        ));
        //upload file to specific bucket
        register_rest_route('ac-storage/v1', '/DeleteObject', array(
            'methods'  => 'POST',
            'callback' => [$this,'delete_object'],
            'permission_callback' => [$this,'permission'],
        ));
        //get object list from bucket
        register_rest_route('ac-storage/v1', '/ListObjects', array(
            'methods'  => 'POST',
            'callback' => [$this,'list_objects'],
            'permission_callback' => [$this,'permission'],
        ));
    }
    //basic authentication with wp user and app password
    function permission($request){
        return current_user_can( 'manage_options' );
    }

    function bucket_list($request){

        $list_response = $this->client->listBuckets();
        if(isset($list_response['Buckets']))
            return new \WP_REST_Response($list_response['Buckets'], 200);

        return new \WP_REST_Response(['message'=>false], 401);
    }


    function bucket_create($request){

        $bucket_name = $request->get_param('bucket_name');
        if (strlen($bucket_name) < 3 || empty($bucket_name))
            return new \WP_REST_Response(['message'=> __('the bucket name is not valid. It must be at least 3 characters long.','arvancloud-object-storage')],400);
        $bucket_acl = $request->get_param('bucket_acl');
        if(empty($bucket_acl) or !in_array($bucket_acl,[false,true,0,1,'false','true']))
            return new \WP_REST_Response(['message'=>__('the bucket acl is not valid. It must be boolean.','arvancloud-object-storage')],400);
        $bucket_name = strtolower(sanitize_text_field($bucket_name));
        $bucket_acl  = $bucket_acl === 'false'?false:(bool)$bucket_acl;
		$bucket_acl  = $bucket_acl ? 'public-read' : 'private';

		try {
			$result = $this->client->createBucket([
				'ACL' => $bucket_acl,
				'Bucket' => $bucket_name,
			]);
			return new \WP_REST_Response([
                'bucket_name'=> $bucket_name,
				'bucket_acl' => $bucket_acl,
				'message'    => __( 'Bucket has been successfully created.', 'arvancloud-object-storage' ),
            ], 200);

		} catch (AwsException $e) {
			$message = $e->getStatusCode() == 409 ? __('Bucket with provided information already exists.', 'arvancloud-object-storage') : __('Something wrong. Try again.', 'arvancloud-object-storage');
            return new \WP_REST_Response(['message'=>$message,'ACL' => $bucket_acl,'Bucket' => $bucket_name,], $e->getStatusCode());
		}
    }

    function direct_fetch($request){

        global $prevent_upload;
        $url = $request->get_param('file_url');
        if(empty($url) or filter_var($url, FILTER_VALIDATE_URL) === false or strpos($url, '.arvanstorage.ir') === false)
            return new \WP_REST_Response(['message'=>__('The arvan file url is not valid.','arvancloud-object-storage')],400);
        $headers = get_headers($url);
        if(stripos($headers[0],"200 OK")===false)
        return new \WP_REST_Response(['message'=>__('The arvan file not found.','arvancloud-object-storage')],404);

        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $fname  = strtok($url, '?');
        $fname  = basename($fname);
        $tmp    = \download_url($url);
        if( \is_wp_error( $tmp ) )
            return new \WP_REST_Response(['message'=>__('Problem download file','arvancloud-object-storage')],403);


        $file_array = array(
            'name' => $fname,
            'tmp_name' => $tmp);
        \add_filter('arva_prevent_upload',function($state){return false;},10,1);
        $attach_id = \media_handle_sideload( $file_array, 0 );
        \add_filter('arva_prevent_upload',function($state){return true;},10,1);
        if ( is_wp_error( $attach_id ) ) {
            @unlink( $file_array['tmp_name'] );
            return new \WP_REST_Response(['message'=>__('Problem create Attachment','arvancloud-object-storage')],402);
        }

        return new \WP_REST_Response(['id'=>$attach_id,'message'=>__('Your file has been successfully fetched.','arvancloud-object-storage')],200);
    }


    function put_object($request){
        
        $bucket = $request->get_param('bucket_name');
        $files  = $request->get_param('files');
        if(empty($bucket) or empty($files))
            return new \WP_REST_Response(['message'=>__('bucket name or files is empty.','arvancloud-object-storage')],400);
        
        $settings     = Helper::get_storage_settings();
        $endpoint_url = $settings['endpoint-url'] . "/";
        $bucket_url   = esc_url( substr_replace( $endpoint_url, $bucket . ".", 8, 0 ) );
        $opt          = get_option( 'acs_settings', true );
        $out          = [];

        foreach($files as $filename=>$content){

            $file_data = base64_decode($content);
            $tmp_name  = tempnam(sys_get_temp_dir(), 'upload_');
            file_put_contents($tmp_name, $file_data);
            $mime = wp_check_filetype($filename);
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            
            $file_array = array(
                'name' => $filename,
                'type' => $mime['type'],
                'tmp_name' => $tmp_name,
                'error' => 0,
                'size'  => strlen($file_data));

            \add_filter('arva_prevent_upload',function($state){return false;},10,1);
            $attach_id = \media_handle_sideload($file_array, 0);
            \add_filter('arva_prevent_upload',function($state){return true;},10,1);
            if (is_wp_error($attach_id)){
                $out[$filename]=['status'=>false,'message'=>$attach_id->get_error_message(),'code'=>500];
                continue;
            }

            $up_dir = \wp_upload_dir();
            $key    = ltrim($up_dir['subdir'],'/').'/';
            $file   = get_attached_file($attach_id);
            $file_size = number_format( filesize( $file ) / 1048576, 2 );
            $key       = str_replace($up_dir['basedir'], '', $file);
            $key       = substr($key,1);
            if( $file_size > 400 ) {

                    try {
                        $uploader = new MultipartUploader( $this->client, $file, [
                            'bucket' => $bucket,
                            'key'    => $key,
                            'ACL' 	 => 'public-read', // or private
                        ]);
                        $result = @$uploader->upload();
                    } catch ( MultipartUploadException $e ) {
                        $out[$filename]=['status'=>false,'message'=>$e->getMessage(),'code'=>$e->getCode()];
                        continue;
                    }catch (AwsException $e) {
                        $out[$filename]=['status'=>false,'message'=>$e->getMessage(), 'code'=>$e->getStatusCode()];
                        continue;
                    }
            }else{
                    try {
                        $result = $this->client->putObject([
                            'Bucket' 	 => $bucket,
                            'Key' 		 => $key,
                            'SourceFile' => $file,
                            'ACL' 		 => 'public-read', // or private
                        ]);
                    } catch ( MultipartUploadException $e ) {
                        $out[$filename]=['status'=>false,'message'=>$e->getMessage(), 'code'=>$e->getCode()];
                        continue;
                        //return new \WP_REST_Response(['attachment_id' => $e->getMessage()], $e->getCode());
                    }catch (AwsException $e) {
                        $out[$filename]=['status'=>false,'message'=>$e->getMessage(), 'code'=>$e->getStatusCode()];
                        continue;
                    }
            }
            
            update_post_meta( $attach_id, 'acs_storage_file_url',$bucket_url);
            update_post_meta( $attach_id, 'acs_storage_file_dir',str_replace(basename($key),'',$key) );
            if($opt['keep-local-files'])
            unlink($file);
            $out[$filename]=['status'=>true,'id'=>$attach_id,'url'=>$bucket_url.$key];
                       
        }
        return new \WP_REST_Response($out, 200);
    }


    function delete_object($request){
        $attach_id = $request->get_param('attach_id');
        if(empty($attach_id) or !is_numeric($attach_id))
            return new \WP_REST_Response(['message'=>__('Attachment_id is empty or not valid','arvancloud-object-storage')], 500);

        $args = wp_get_attachment_metadata( $attach_id );

        if(empty($args))
            return new \WP_REST_Response(['message'=>__('Attachment not found','arvancloud-object-storage')], 500);

        $bucket_url = get_post_meta( $attach_id, 'acs_storage_file_url',true);
        $credentials= Helper::get_storage_settings();
        $epoint_url = substr($credentials['endpoint-url'],8);
        $bucket     = str_replace(['https://',".$epoint_url/"],'',$bucket_url);
        try{
            $result = $this->client->deleteObject ([
                'Bucket' => $bucket, 
                'Key' 	 => $args['file']
            ]);
            wp_delete_attachment($attach_id,true);
        }catch (AwsException $e) {
            return new \WP_REST_Response(['message'=>$e->getMessage()], $e->getStatusCode());
        }catch (\Exception $e) {
            return new \WP_REST_Response(['message'=>$e->getMessage()], $e->getCode());
        }

        return new \WP_REST_Response(['message'=>__('Attachment delete success','arvancloud-object-storage')], 200);
    }


    function list_objects($request){
        $bucket = $request->get_param('bucket_name');
        if(empty($bucket))
        return new \WP_REST_Response(['message'=>__('Bucket name is empty','arvancloud-object-storage')], 500);

        $page     = ($arg = $request->get_param('page'))?$arg:0;
        $per_page = ($arg = $request->get_param('per_page'))?$arg:10000;
        $page    *= $per_page;
        $prefix   = ($arg = $request->get_param('dir'))?ltrim($arg,'/'):'';

        try {
            $result = $this->client->listObjectsV2([//listObjectsV2
                'Bucket' => $bucket,
                'Prefix' => $prefix,
            ]);
            if(empty($result['Contents']))
            return new \WP_REST_Response([], 200);

            $content = $result['Contents'];
            $count   = count($content);
            if($count>$page)
                $content = array_slice($content, $page, $per_page);
            return new \WP_REST_Response($content, 200);
        } catch (AwsException $e) {
            return new \WP_REST_Response(['message'=>$e->getMessage()], $e->getCode());
        }
    }

}
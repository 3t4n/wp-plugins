<?php

namespace WP_Arvan\OBS\Admin\Controllers;

use Aws\Exception\MultipartUploadException;
use Aws\S3\MultipartUploader;
use PHPUnit\TextUI\Help;
use WP_Arvan\OBS\Admin\Partials;
use WP_Arvan\OBS\Helper;
use WP_Arvan\OBS\Kueue\KueueCore;
use WP_Arvan\OBS\S3Singletone;
use WP_Arvan\OBS\CustomDB;
use Aws\Exception\AwsException;
class BulkUploaderController
{
    private static $instance;
    public const PAGE_LIMIT = 20;
    private static $force_stop = false;
    private $s3client;
    private $bulk_err_file;
    private $acs_settings;


    public function __construct(){

        if ( ! defined( 'WPINC' ) ) {
            die;
        }
        $this->acs_settings = get_option( 'acs_settings', true );
        $this->s3_client = (S3Singletone::get_instance())->get_s3client();
        add_action('obs_do_bulk_upload', [$this, 'do_bulk_upload']);
        $updir = wp_upload_dir();
        $this->bulk_err_file = $updir['basedir'].DIRECTORY_SEPARATOR.'bulk_upload.txt';
    }

    public static function get_instance()
    {

        if (null == self::$instance) {
            self::$instance = new BulkUploaderController();
        }
        return self::$instance;
    }

    public function render_view()
    {
        Partials::bulk_upload_modal();
        wp_die();

    }

    public function control(){

        if ('post' == strtolower($_SERVER['REQUEST_METHOD']) ) {
            Helper::check_bulk_ops_nonce();
            Helper::check_user_authorization();
            $kueue_scheduler = KueueCore::get_instance();
            if( $kueue_scheduler->has_pending_job('obs_do_bulk_upload') )
            {
                wp_send_json_error( array(
                    'success'=>'false',
                    'message'=>__('Already has pending task', 'arvancloud-object-storage')
                ),200);
                return;

            }

            $memory_db = CustomDB::get_instance();

            $memory_db->delete_operation(array(

                'status'=>'done'
            ));
            $memory_db->delete_operation(array(
                'operation'=>'UPLOADING_PROGRESS'
            ));

            $memory_db->delete_operation(array(
                'operation'=>'STOP_UPLOADING_PROCESS',

            ));


            $all_uploadable_attachments = $this->get_all_attachments_files_as_array();

            if(empty($all_uploadable_attachments)){
                wp_send_json_success( array(
                    'success'=>'false',
                    'message'=> __('No data to process' ,'arvancloud-object-storage' )
                ),200);
                wp_die();
            }
            $bucket_name = Helper::get_bucket_name();



            $total_source_files = [];

            if( isset($_POST['reschedule']) ){

                /*
                 * Load
                 */
                $total_source_files = $memory_db->get_option_by_fields(array(
                    'operation'=>'UPLOAD',
                    'status'=>'pending'
                ));



            }else{

                $memory_db->delete_operation(array(
                    'operation'=>'UPLOAD'
                ));

                foreach ($all_uploadable_attachments as $source_file) {

                    $is_already_pending = $memory_db->get_option_by_fields(array(
                        'operation'=>'UPLOAD',
                        'key'=>     $source_file['file'],
                        'status'=>'pending'
                    ));

                    if( is_array($is_already_pending) && (count($is_already_pending) >0) )
                        continue;

                    $memory_db->create_operation(array(
                        'operation'=>'UPLOAD',
                        'source'=>$bucket_name,
                        'destination'=>$source_file['is_main_attachment'],
                        'key'=>[
                            'post_id'=>$source_file['post_id'],
                            'file'=>$source_file['file']
                        ],
                        'status'=>'pending'
                    ));
                    $total_source_files[] = $source_file['file'];

                }
            }

            $files_count = count($total_source_files);
            $task_status = array(
                'operation'=>'UPLOADING_PROGRESS',
                'key'=>[
                    'files_count' => $files_count,
                    'processed_files_count' => 0,
                    'task_status' => 'processing'
                ]
            );

            $memory_db->create_operation($task_status);


            $kueue = KueueCore::get_instance();

            $time = 0;

            for ( $i =0 ;$i < $files_count; $i++) {

                if( 0 == ($i % self::PAGE_LIMIT) ) {
                    $kueue->add_job(time() + ($time * MINUTE_IN_SECONDS), 0, 'obs_do_bulk_upload', array($i));
                    $time++;
                }

            }
            
            file_put_contents($this->bulk_err_file,'');

            $kueue_scheduler->schedule_jobs();

            wp_send_json_success( array(
                'success'=>'true',
                'message'=>__('Successfully scheduled, Please wait a second', 'arvancloud-object-storage')
            ),200);
            return;

        }


    }


    /**
     * This function get all uploadable post attachment urls and return them
     * as array
     * @return array
     */



    public function do_bulk_upload(){

        $memory_db = CustomDB::get_instance();
        $bucket_name = Helper::get_bucket_name();
        $all_pending_files =  $memory_db->get_option_by_fields(array(
            'operation'=>'UPLOAD',
            'status'=>'pending'
        ));
        $up_dir = wp_upload_dir()['basedir'].DIRECTORY_SEPARATOR;
        foreach($all_pending_files as $pending_file){


            $result = $memory_db::get_single_item($memory_db->get_option_by_fields(array('operation'=>'STOP_UPLOADING_PROCESS')));
            $should_stop =  ($result['status']??'false');

            if(  'true' == $should_stop ){

                $current_status = $memory_db->get_option_by_fields(array(
                    'operation' => 'UPLOADING_PROGRESS'
                ));
                $current_status = $memory_db::get_single_item($current_status);
                $key = maybe_unserialize($current_status['key']);

                $key['task_status'] = 'stop';


                $memory_db->update_option(array(
                    'key'=>maybe_serialize($key)
                ), array(
                    'operation' => 'UPLOADING_PROGRESS'
                ));

                break;
            }

            $unserialized_key = maybe_unserialize($pending_file['key']);
            $this->real_upload_file($unserialized_key['file'], $unserialized_key['post_id']);

            if( $pending_file['destination']  == 'true' ) {
                try{
                (S3Singletone::get_instance())->get_s3client()->putObjectTagging([
                    'Bucket' => $bucket_name,
                    'Key' => str_replace($up_dir,'',$unserialized_key['file']),
                    'Tagging' => [
                        'TagSet' => [
                            [
                                'Key' => 'main_attachment',
                                'Value' => 'true',
                            ]
                        ],
                    ],
                ]);                    
                }catch (AwsException $e){
                    $memory_db->update_option(array(
                        'status' => 'failed'
                    ), array(
                        'id'=>$pending_file['id']
                    ));
                    $date = date('Y-m-d H:i:s');
                    file_put_contents($this->bulk_err_file, "[$date] [#$post_id] [".$e->getMessage()."]\n", FILE_APPEND);
                
                    continue;
                }

            }


            $id = $pending_file['id'];

            $memory_db->update_option(array(
                'status' => 'done'
            ), array(
                'id'=>$id
            ));

            //delete file if uncheck keep local file
            $keep = false;
            if(isset($_POST['keep_file']) and $_POST['keep_file'])
                unlink( $unserialized_key['file'] );
            else if( isset($this->acs_settings['keep-local-files']) && !$this->acs_settings['keep-local-files'] ) {
                unlink( $unserialized_key['file'] );
            }

            $progress_status = $memory_db::get_single_item($memory_db->get_option_by_fields(array(
                'operation'=>'UPLOADING_PROGRESS'
            )));

            $done_files = $memory_db->get_option_by_fields(array(
                'operation'=>'UPLOAD',
                'status'=>'done'
            ));

            $status = maybe_unserialize($progress_status['key']);

            $memory_db->update_option(array(

                'key'=> maybe_serialize( [
                    'files_count' => $status['files_count'],
                    'processed_files_count' => count($done_files),
                    'task_status' => 'processing'
                ])

            ), array(
                'operation'=>'UPLOADING_PROGRESS'
            ));

        }

    }


    function real_upload_file($file, $post_id){

        ini_set('max_execution_time', MINUTE_IN_SECONDS * 10);

        $bucket_name = Helper::get_bucket_name();

        $file_size 	 = number_format( filesize( $file ) / 1048576, 2 ); // File size in MB

        $client = (S3Singletone::get_instance())->get_s3client();

        //$up_dir = wp_upload_dir()['basedir'];
        //$key    = str_replace([$up_dir,basename( $file )],'',$file);
        //$key    = substr($key,1);
        $key    = Helper::get_upload_file_dir($file);

        try{
            if( $file_size > 400 ) {
                $uploader = new MultipartUploader( $client, $file, [
                    'bucket' => $bucket_name,
                    'key'    => $key.basename( $file ),
                    'ACL' 	 => 'public-read', // or private
                ]);

                try {
                    $result = $uploader->upload();
                    update_post_meta( $post_id, 'acs_storage_file_url', Helper::get_storage_url() );
                    update_post_meta( $post_id, 'acs_storage_file_dir', $key );
                    return 'uploaded';

                  } catch ( MultipartUploadException $e ) {
                      $date = date('Y-m-d H:i:s');
                      file_put_contents($this->bulk_err_file, "[$date] [#$post_id] [".$e->getMessage()."]\n", FILE_APPEND);
                      return false;
                  }
              } else {
                try {
                    @$client->putObject([
                        'Bucket' 	 => $bucket_name,
                        'Key' 		 => $key.basename( $file ),
                        'SourceFile' => $file,
                        'ACL' 		 => 'public-read', // or private
                    ]);
                    update_post_meta( $post_id, 'acs_storage_file_url', Helper::get_storage_url() );
                    update_post_meta( $post_id, 'acs_storage_file_dir', $key );

                } catch ( MultipartUploadException $e ) {
                    $date = date('Y-m-d H:i:s');
                    file_put_contents($this->bulk_err_file, "[$date] [#$post_id] [".$e->getMessage()."]\n", FILE_APPEND);
                    return false;
                }
            }
        } catch ( AwsException $e ) {
            $date = date('Y-m-d H:i:s');
            file_put_contents($this->bulk_err_file, "[$date] [#$post_id] [".$e->getMessage()."]\n", FILE_APPEND);
            return false;
        } catch (Exception $e) {
            $date = date('Y-m-d H:i:s');
            file_put_contents($this->bulk_err_file, "[$date] [#$post_id] [".$e->getMessage()."]\n", FILE_APPEND);
            return false;
        }
    }



    public function get_all_attachments_files_as_array(): array{


        $posts = $this->get_bulk_uploadable_posts();
        $upload_dir = wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR;
        $bucket_name = Helper::get_bucket_name();
        $file_list = [];

        foreach ($posts as $post) {


            if (is_array($post->attachments) && isset($post->attachments['file'])) {

                $file_name = $post->attachments['file'];

                $file_dir_name = dirname($file_name);

                if($file_dir_name == '.')
                    $sub_attachment_path = $upload_dir;
                else
                    $sub_attachment_path = $upload_dir . $file_dir_name . DIRECTORY_SEPARATOR;


                if (file_exists($upload_dir . $file_name)) {
                    $file_list[] = array( 'file'=> $upload_dir . $file_name, 'is_main_attachment' => 'true', 'post_id'=>$post->id);
                }

                if (is_array($post->attachments['sizes'])) {

                    foreach ($post->attachments['sizes'] as $key => $value) {

                        if (file_exists($sub_attachment_path . $value['file'])) {
                            $file_list[] = array( 'file'=> $sub_attachment_path . $value['file'], 'is_main_attachment' => 'false', 'post_id'=>$post->id);
                        }

                    }
                }
            }

        } // End of foreach
        return $file_list;
    }

    function get_bulk_uploadable_posts($last_uploaded_attachment_id=0)
    {
        global $wpdb;
        if( 0 == $last_uploaded_attachment_id ){
            $sql = "SELECT * FROM $wpdb->posts WHERE post_type='attachment' and ID not in(select post_id from $wpdb->postmeta where meta_key='acs_storage_file_url')order by ID DESC";
        }else {
            $sql = "SELECT * FROM $wpdb->posts WHERE post_type='attachment' AND ID >= '$last_uploaded_attachment_id' and 
            ID not in(select post_id from $wpdb->postmeta where meta_key='acs_storage_file_url') LIMIT " . self::PAGE_LIMIT;
        }

        $results = $wpdb->get_results($sql, ARRAY_A);

        $upload_dir = wp_upload_dir()['basedir'] . DIRECTORY_SEPARATOR;
        $posts      = [];
        $post_id    = 0;
        if (!empty($results)) {

            if(!empty($_POST['ext']) or $_POST['size_from']!='' or $_POST['size_to']!=''){
                $file_ext  = empty($_POST['ext'])?[]:$_POST['ext'];
                $size_from = (empty($_POST['size_from']) or !is_numeric($_POST['size_from']))?'':$_POST['size_from'];
                $size_to   = (empty($_POST['size_to']) or !is_numeric($_POST['size_to']))?'':$_POST['size_to'];
            }else{
                $file_ext  = empty($this->acs_settings['file_ext'])?[]:json_decode($this->acs_settings['file_ext'],1);
                $size_from = empty($this->acs_settings['file_f_size'])?[]:$this->acs_settings['file_f_size'];
                $size_to   = empty($this->acs_settings['file_t_size'])?[]:$this->acs_settings['file_t_size'];
            }


            foreach ($results as $result) {
                $filepath = get_attached_file($result['ID']);
                if(!file_exists($filepath))
                continue;
                $post_id = $result['ID'];

                $post = new \stdClass();
                $post->id = $post_id;
                
                $attach = wp_get_attachment_metadata($post_id);
                if(empty($attach['file'])){
                    $file   = get_post_meta($post_id,'_wp_attached_file',true);
                    $size   = empty($attach['filesize'])?filesize($upload_dir.$file):$attach['filesize'];
                    $attach = ['file'=>$file,'filesize'=>$size,'sizes'=>[]];
                }

                if(!empty($file_ext)){
                    $ext_arr = array_column($file_ext,'value');
                    $ext_arr = array_map('strtolower',$ext_arr);
                    $ext = strtolower(pathinfo($attach['file'], PATHINFO_EXTENSION));
        
                    if(!in_array($ext,$ext_arr))
                    continue;
                }
                $size = @round($attach['filesize']/1048576,2);
                if(!empty($size_from) and $size_from > $size)
                    continue;
                if(!empty($size_to) and $size_to < $size)
                    continue;

                $post->attachments = $attach;
                $posts[] = $post;
            }
            update_option('obs_bulk_upload_last_id',$post_id);
        }

        wp_reset_postdata();
        return $posts;
    }


    function get_attachments_count()
    {
        $counter = 0;
        $posts = $this->get_bulk_uploadable_posts();
        foreach ($posts as $post) {
            if (is_array($post->attachments) && isset($post->attachments['file'])) {
                $counter++;

                if (is_array($post->attachments['sizes'])) {

                    foreach ($post->attachments['sizes'] as $value) {
                        $counter++;
                    }
                }

            }

        }


        return $counter;
    }




    public function stop_current_bulk_upload_task(){


        if ('post' == strtolower($_SERVER['REQUEST_METHOD']) ) {

            $result = (new KueueCore())->stop_process('obs_do_bulk_upload');
            $memory_db = CustomDB::get_instance();
            $memory_db->create_operation(array(
                'operation'=>'STOP_UPLOADING_PROCESS',
                'status'=>'true'));

            $current_status = $memory_db->get_option_by_fields(array(
                'operation' => 'UPLOADING_PROGRESS'
            ));
            $current_status = $memory_db::get_single_item($current_status);
            $key = maybe_unserialize($current_status['key']);

            $key['task_status'] = 'stop';


            $memory_db->update_option(array(
                'key'=>maybe_serialize($key)
            ), array(
                'operation' => 'UPLOADING_PROGRESS'
            ));

            if(!$result){

                wp_send_json_success( array(
                    'success'=>'false',
                    'response'=> 'Failed'
                ),200);
            }else{

                wp_send_json_success( array(
                    'success'=>'true',
                    'response'=> __('Successfully stopped','arvancloud-object-storage')
                ),200);
            }
        }

    }



    public function get_bulk_upload_task_status(){
        $memory_db = CustomDB::get_instance();

        $result = $memory_db::get_single_item( $memory_db->get_option_by_fields(array(
            'operation'=> 'UPLOADING_PROGRESS'
        )));

        $option_values = maybe_unserialize( $result['key'] );
        $option_values['files_done'] = sprintf("%d ". __('of' ,'arvancloud-object-storage' ). " %d", $option_values['processed_files_count'], $option_values['files_count']);



        if( 'stop'  == $option_values['task_status'] ){

            wp_send_json_success( array(
                'success'=>'true',
                'response'=> $option_values,
            ),200);
            wp_die();

        }else{

            if( !(KueueCore::get_instance())->has_pending_job('obs_do_bulk_upload')){
                $option_values['task_status'] = 'done';
                if($option_values['files_count']>$option_values['processed_files_count']){
                    $updir = wp_upload_dir();
                    $option_values['message'] = sprintf("<p><bdi>%d ". __('item failed and skipped. ' ,'arvancloud-object-storage' ). ' <a href="'.$updir['baseurl'].'/bulk_upload.txt">'.__('Download Log','arvancloud-object-storage').'</a></bdi></p>', ($option_values['files_count']-$option_values['processed_files_count']));
                }
                if($option_values['files_count']>0 and $option_values['processed_files_count']>0)
                $option_values['ref_msg'] = __('The bulk upload operation has been successfully done','arvancloud-object-storage');
            }

        }

        wp_send_json_success( array(
            'success'=>'true',
            'response'=> $option_values
        ),200);
        wp_die();

    }

}
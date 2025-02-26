<?php
/**
 * Auto_Aliexpress_Base_Job Class
 *
 * @since  1.0.0
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Auto_Aliexpress_Base_Job' ) ) :

    abstract class Auto_Aliexpress_Base_Job {

        /**
         * Job ID
         *
         * @int
         */
        public $id;

        /**
         * Type
         *
         * @var string
         */
        public $type = '';

        /**
         * API data
         *
         * @var array
         */
        public $api_data = array();

        /**
         * Settings
         *
         * @var array
         */
        public $settings = array();

        /**
         * Keywords
         *
         * @var array
         */
        public $keywords = array();

        /**
         * Log Message
         *
         * @var array
         */
        public $log = array();

        /**
         * Run this job
         *
         * @return array
         */
        public function run(){

        }

        /**
         * Prepare Post Data
         * @param string $title
         * @param string $content
         * @return array
         * @since  1.0.0
         */
        public function prepare_post($title, $content, $settings = array()) {

            $post_data = array();
            $post_data['post_title']   = $title;
            $post_data['post_content'] = $content;
            $post_data['post_type']    = $settings['aliexpress_post_type'];
            $post_data['post_status']  = $settings['aliexpress_post_status'];
            $post_author = get_user_by('login',$settings['aliexpress_post_author']);
            $post_data['post_author']  = $post_author->ID;

            $post_data['post_category'] = $this->settings['aliexpress-post-category'];

            // get tags name
            $tags = array();
            $tag_ids = $this->settings['aliexpress-post-tag'];

            foreach($tag_ids as $tag_id){
                $tag = get_tag($tag_id);
                $tags[] = $tag->name;
            }

            $post_data['tags_input'] = array_values( $tags );;

            return $post_data;

        }

        /**
         * Create Post
         * @param string $title
         * @param string $content
         * @return array
         * @since  1.0.0
         */
        public function create_post($title, $content, $settings = array()){

            // check errors
            $new_post = array('id' => false, 'error' => false, 'permalink' => '');

            if($this->is_title_duplicate($title)){
                $this->log[] = array(
                    'message'  => 'Title Duplicate ' . $title,
                    'level'    => 'log'
                );
                $new_post['error'] = 'post title duplicate.';

                return;
            }

            $post_data = $this->prepare_post($title, $content, $settings);

            $new_post['id'] = wp_insert_post($post_data);

            $post_id = isset($new_post['id']) ? $new_post['id'] : null;

            if (!$post_id) {
                $new_post['error'] = 'post-fail';
            }else{
                $new_post['permalink'] = get_permalink( $post_id );
            }

            if(false === $new_post['error']){
                $this->log[] = array(
                    'message'  => 'Post New Post Success: <a href="'.$new_post['permalink'].'">'.$title.'</a>',
                    'level'    => 'log'
                );
            }else{
                $this->log[] = array(
                    'message'  => 'Generate New Post Error: '.$new_post['error'],
                    'level'    => 'log'
                );
            }


        }

        /**
         * check if post title already exists
         * @param string $title
         * @return bool
         * @since  1.0.0
         */
        public function is_title_duplicate($title){
            if( get_page_by_title( $title, 'OBJECT', 'post' )  ){
                return true;
            }else{
                return false;
            }
        }

        /**
         * Get API Data.
         *
         * @since 1.0.0
         */
        public function get_api_data($type) {
            $this->api_data = Auto_Aliexpress_Addon_Loader::get_instance()->get_addon_data($type);
        }

        /**
        * Fetch stream bt HTTP GET Method
        *
        * @param  string $url
        * @return string
        */
        public function fetch_stream( $url, $headers = array()) {
          // build http request args
          $args = array(
              'headers' => $headers,
              'timeout'     => '20'
          );

          $request = wp_remote_get( $url, $args );

          // retrieve the body from the raw response
          $json_posts = wp_remote_retrieve_body( $request );

          // log error messages
          if ( is_wp_error( $request ) ) {
              $this->log[] = array(
                'message'  => 'Fetching failed with WP_Error: '. $request->errors['http_request_failed'][0],
                'level'    => 'log'
            );
              return $request;
          }

          if ( $request['response']['code'] != 200 ) {
              $this->log[] = array(
                'message'  => 'Fetching failed with code: ' . $request['response']['code'],
                'level'    => 'log'
            );
              return false;
          }

          return $json_posts;
        }

        /**
         * Fetch stream bt HTTP POST Method
         *
         * @param  string $url
         * @return string
         */
        public function fetch_post( $url, $headers = array(), $body = array()) {
            // build http request args
            $args = array(
                'headers' => $headers,
                'body'    => $body,
                'method'  => 'POST',
                'timeout' => 45,
            );

            $request = wp_remote_post( $url, $args );

            // retrieve the body from the raw response
            $json_posts = wp_remote_retrieve_body( $request );

            // log error messages
            if ( is_wp_error( $request ) ) {
                $this->log[] = array(
                    'message'  => 'Fetching failed with WP_Error: '. $request->errors['http_request_failed'][0],
                    'level'    => 'log'
                );
                return $request;
            }

            if ( $request['response']['code'] != 200 ) {
                $this->log[] = array(
                    'message'  => 'Fetching failed with code: ' . $request['response']['code'],
                    'level'    => 'log'
                );
                return false;
            }

            return $json_posts;

        }

    }

endif;

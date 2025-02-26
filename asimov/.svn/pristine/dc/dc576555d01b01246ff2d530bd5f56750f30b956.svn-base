<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.asc27.com/
 * @since      1.1.0
 *
 * @package    Asimov
 * @subpackage Asimov/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to call the Asimov APIS.
 *
 * @since      1.1.0
 * @package    Asimov
 * @subpackage Asimov/includes
 * @author     https://www.asc27.com/
 */

class Asimov_Service {

    /**
     * The remote endpoint of asimov services.
     *
     * @since    1.1.0
     * @access   private
     * @var      string    $remote_url The remote endpoint of asimov services.
     */
    private $remote_url;

	public function __construct( $remote_url ) {

        $this->remote_url = $remote_url;

    }

    private function get_status_data( $body ) {
        $ok = false;
        $data = null;

        $response = json_decode($body);
        if( $response ) {
            $ok = $response->result === "OK";
            $data = $response->data;
        }
		$result = new stdClass();
		$result->success = $ok;
		$result->data = $data;
        return $result;
    }

    public function get_remote_url() {
        return $this->remote_url;
    }

	public function exportArticles($subscription_id, $site_url, $view_id) {
		$url = $this->remote_url . "/asimov/import_articles";

		$posts = get_posts( array( 'numberposts' => 5000 ) );
		for ($x = 0; $x < count($posts); $x++) {
			$tags = get_the_tags($posts[$x]->ID);
			$category = get_the_category($posts[$x]->ID);
			$post_full_url = get_permalink($posts[$x]->ID);
			$posts[$x]->tags = $tags;
			$posts[$x]->category = $category;
			$posts[$x]->post_full_url = $post_full_url;
		}
		$data = array(
			'subscription_id' => $subscription_id,
			'ga_view_id' => $view_id,
			'site_url' => $site_url,
			'articles' => $posts
		);
		$request = wp_remote_post($url, array(
			'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
			'body'        => json_encode($data),
			'method'      => 'POST',
			'data_format' => 'body',
			'sslverify' => false
		));
		$response = $this->get_status_data(wp_remote_retrieve_body($request));
		return $response;
    }

	public function checkAnalytics($subscription_id, $site_url, $view_id) {
		$url = $this->remote_url . "/asimov/check_ga";
		$data = array(
			'subscription_id' => $subscription_id,
			'site_url' => $site_url,
			'ga_view_id' => $view_id
		);
		$request = wp_remote_post($url, array(
			'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
			'body'        => json_encode($data),
			'method'      => 'POST',
			'data_format' => 'body',
			'sslverify' => false
		));
        $response = $this->get_status_data(wp_remote_retrieve_body($request));
		return $response;
    }

	public function getSubscriptionData($subscription_id, $site_url) {
	    $url = $this->remote_url . "/asimov/check_targets";
	    $data = array(
	    	'subscription_id' => $subscription_id,
	    	'site_url' => $site_url
	    );
	    $request = wp_remote_post($url, array(
	    	'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
	    	'body'        => json_encode($data),
	    	'method'      => 'POST',
	    	'data_format' => 'body',
	    	'sslverify' => false
	    ));
        $response = $this->get_status_data(wp_remote_retrieve_body($request));
		return $response;
	}

	public function checkImportStatus( $subscription_id, $site_url ) {
		$url = $this->remote_url . "/asimov/check_import_status";
		$data = array(
			'subscription_id' => $subscription_id,
			'site_url' => $site_url
		);
		$request = wp_remote_post($url, array(
			'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
			'body'        => json_encode($data),
			'method'      => 'POST',
			'data_format' => 'body',
			'sslverify' => false
		));
        $response = $this->get_status_data(wp_remote_retrieve_body($request));
		return $response;
    }
    
    public function checkSubscriptionStatus( $subscription_id, $site_url ) {
		$url = $this->remote_url . "/asimov/check_sub_status";
		$data = array(
			'subscription_id' => $subscription_id,
			'site_url' => $site_url
		);
		$request = wp_remote_post($url, array(
			'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
			'body'        => json_encode($data),
			'method'      => 'POST',
			'data_format' => 'body',
			'sslverify' => false
		));
        $response = $this->get_status_data(wp_remote_retrieve_body($request));
		return $response;
    }

    public function postToRecSys( $subscription_id, $user_id, $site_url, $post_id, $pivots ) {
	    $post = get_post( $post_id );
	    $posttags = get_the_tags( $post_id );
	    $postcategories = get_the_category( $post_id );
			
	    $post->post_tags = ''.implode(',', array_map(function($x){ return $x->name; }, $posttags));
        $post->post_categories = ''.implode(',', array_map(function($x){ return $x->name; }, $postcategories));

		$url = $this->remote_url . "/asimov/recsys";
		$data = array(
            'subscription_id' => $subscription_id,
            'author_id' => $user_id,
            'site_url' => $site_url,
            'article_subtitle' => "", 
            'post_name' => $post->post_name,
            'post_parent' => $post->post_parent,
            'article_guid' => $post->ID,
            'post_full_url' => $post->guid,
            'article_post_title' => $post->post_title,
            'article_post_content' => $post->post_content,
            'article_post_excerpt' => $post->post_excerpt,
            'article_post_type' => $post->post_type,
            'article_tags' => $post->post_tags,
            'article_categories' => $post->post_categories,
            'filter_by_device' => $pivots['device'],
            'filter_by_country' => $pivots['country'],
            'filter_by_userage' => $pivots['age'],
			'filter_by_usergender' => $pivots['gender'],
		);
		$request = wp_remote_post($url, array(
			'headers'     => array('Content-Type' => 'application/json; charset=utf-8'),
			'body'        => json_encode($data),
			'method'      => 'POST',
			'data_format' => 'body',
			'sslverify' => false
		));
        $response = $this->get_status_data(wp_remote_retrieve_body($request));
		return $response;
    }
}

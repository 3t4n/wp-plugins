<?php
/**
* 
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob_Car_Table
{
	public function __construct() {
		$this->load_dependencies();
	}

	private function load_dependencies(){
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'model/class-automob-entity-car.php';
	}

	private function getField($postId,$name){
		return get_post_meta($postId,"_am_".$name,true);
	}

	private function toObject($post){
			
			$car = new Automob_Car_Entity();
			$car->id = $post->ID;
			$car->permalink = get_permalink( $post->ID );
			$car->title = $post->post_title;
			$car->description = $post->post_content;
			$car->condition = $this->getField($post->ID,'condition');
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$car->main_image_full= $thumbnail_object->guid;
			$car->main_image_thumb=wp_get_attachment_image_src($thumbnail_id, 'thumbnail' )[0];
			$car->main_image_large=wp_get_attachment_image_src($thumbnail_id, array(350,220));
			$car->mileage = $this->getField($post->ID,'mileage');
			$car->retail_price = $this->getField($post->ID,'retail_price');
			$car->asking_price = $this->getField($post->ID,'asking_price');
			$car->body_style = $this->getField($post->ID,'body_style');
			$car->model_year = $this->getField($post->ID,'model_year');
			$car->make = $this->getField($post->ID,'make');
			$car->model = $this->getField($post->ID,'model');
			$car->exterior_color = $this->getField($post->ID,'exterior_color');
			$car->engine_type = $this->getField($post->ID,'engine_type');
			$car->transmission = $this->getField($post->ID,'transmission');
			$car->location = $this->getField($post->ID,'location');
			$car->status = $this->getField($post->ID,'status');
			
			if ($this->getField($post->ID,'ribbon')!= "no_ribbon") {
				$car->ribbon_url=  plugin_dir_url((dirname(__FILE__))).'theme-files/'.$this->getField($post->ID,'ribbon').".png";
			}
			
			$car->images = $this->createThumbnails($this->getField($post->ID,'images'));

			return $car;

	}


	private function createThumbnails($images){
		$image_manager = new AutomobImageManager();
		$images_collection = array();
		if (!empty($images)){
			foreach ($images as $image) {
				$images_collection[]= array('image'=>$image,'thumbnail' => $image_manager->getThumbnail($image,200,200));
			}
		}
		return $images_collection;
		// print_r();die();

	}
		
	private function patch($posts){
		$cars = array();
		foreach ($posts as $post) {
			$car = $this->toObject($post);
 			array_push($cars, $car);
		}
		return $cars;
	} 

	public function getCar($id)
	{
		return $this->toObject(get_post($id));
	}
 	public function getAll($order = 'asc')
 	{

 		$args=array(
		  'order'=>$order,
		  'post_type' => AUTOMOB_CPT_CAR,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'ignore_sticky_posts'=> 1);

		$wp_query = null;
		$wp_query = new WP_Query($args);
		$posts = $wp_query->get_posts();
		wp_reset_query();

		return $this->patch($posts); 

 	}

	private function getPaginationArgs()
	{

 		if (!isset($_GET['order_dir']))
 		{
 			$order_dir = 'asc';
 		}else{
 			$order_dir = sanitize_text_field($_GET['order_dir']);	
 		}

 
 		$meta_query=array(
			'relation' => 'AND'
 			);

		if (isset($_GET))
		{
			foreach ($_GET as $key => $value) 
			{		
				if (($key!="order_dir")&&($value!="Any"))
				{
					if (($key!="asking_price")&&($key!="mileage")&&($key!="model_year"))
					{
						$meta_query[] = array(
				            'key' => '_am_'.sanitize_text_field($key),
				            'value' => sanitize_text_field($value),
				            'compare' => '='
			        	);
					}else
					{
						if ($key!="model_year")
						{
							$meta_query[] = array(
					            'key' => '_am_'.sanitize_text_field($key),
					            'value' => (int)$value,
					            'type' => 'NUMERIC',
					            'compare' => '<='
				        	);
						}else{
							$meta_query[] = array(
					            'key' => '_am_'.sanitize_text_field($key),
					            'value' => (int)$value,
					            'type' => 'NUMERIC',
					            'compare' => '>='
				        	);	
						}
						
					}

				}
				 
			}
			
		}
   // print_r($meta_query);die();
		 // print_r($meta_query);die();
		$args=array(
		  'orderby' => 'meta_value_num',
		  'meta_query'=>$meta_query,
		  'meta_key' => '_am_asking_price',
		  'order' => $order_dir,
		  'post_type' => AUTOMOB_CPT_CAR,
		  'post_status' => 'publish',
		  'posts_per_page' => get_option('max-vehicles'),
		  'paged' => get_query_var('paged'),
		  'ignore_sticky_posts'=> 1);
		return $args;
	}

	public function getMinMaxValues($meta_key)
	{
		$args=array(
		  'orderby' => 'meta_value_num',
		  'meta_key' => $meta_key,
		  'order' => 'asc',
		  'post_type' => AUTOMOB_CPT_CAR,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'ignore_sticky_posts'=> 1);

		$wp_query = null;
		$wp_query = new WP_Query($args);
		$posts = $wp_query->get_posts();
		
		wp_reset_query();

		if (sizeof($posts)>0) 
		{
			$max = get_post_meta( $posts[sizeof($posts)-1]->ID, $meta_key, true);
			$min = get_post_meta( $posts[0]->ID, $meta_key, true);
			$result = array('max' => $max, 'min'=> $min);
		}else{
			$result = array('max' => 0, 'min'=> 0);
		}

		return $result;
	}

  	public function getPaginatedPosts()
 	{

 		
		$wp_query = null;
		$wp_query = new WP_Query($this->getPaginationArgs());
		$posts = $wp_query->get_posts();
		wp_reset_query();

		return $this->patch($posts); 

 	}

 	public function getPagination()
 	{

		$wp_query = null;
		$wp_query = new WP_Query($this->getPaginationArgs());

		$total = $wp_query->max_num_pages;
		// only bother with the rest if we have more than 1 page!
		if ( $total > 1 )  {
		     // get the current page
		     if ( !$current_page = get_query_var('paged') )
		          $current_page = 1;
		     // structure of "format" depends on whether we're using pretty permalinks

		     if( get_option('permalink_structure') ) {
			     $format = '?paged=%#%';
		     } else {
			     $format = 'page/%#%/';
		     }
		     echo paginate_links(array(
		          'base'     => get_pagenum_link(1) . '%_%',
		          'format'   => $format,
		          'current'  => $current_page,
		          'total'    => $total,
		          'mid_size' => 4,
		          'type'     => 'list'
		     ));
		} 
 	}

 	public function getTotalPages()
 	{
 		$posts_per_page=1;	
 		$total_cars = sizeof($this->getAll()) ;
 		
 		if ($total_cars>0){
			return (int)($total_cars/$posts_per_page); 
 		}else{
 			return 0; 
 		}
		

 	}

 	public function getMaxPages($posts_per_page)
 	{

 		$args=array(
		  'order'=>$order,
		  'post_type' => AUTOMOB_CPT_CAR,
		  'post_status' => 'publish',
		  'posts_per_page' => 1,
		  'paged' => 2,
		  'ignore_sticky_posts'=> 1);

		$wp_query = null;
		$wp_query = new WP_Query($args);
		$posts = $wp_query->get_posts();
		wp_reset_query();

		return $this->patch($posts); 

 	}

 	public function getFirst($id)
 	{
		return $this->toObject(get_post($id)); 

 	}

 	public function async_car_list($order = 'asc'){
		$args=array(
		  'order'=>$order,
		  'post_type' => AUTOMOB_CPT_CAR,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'ignore_sticky_posts'=> 1);

		$wp_query = null;
		$wp_query = new WP_Query($args);
		$posts = $wp_query->get_posts();
		wp_reset_query();
 		echo json_encode($this->patch($posts));
 		wp_die();
 	}

 	public function getByMeta($order = 'asc',$meta_query = array())
 	{

 		
 		//Tests -  t0d0 remove
		$meta_query = array_merge( $meta_query, array( array( 'key' => '_am_model','value' => '120y','compare' => 'LIKE') ) );
		$meta_query = array_merge( $meta_query, array( array( 'key' => '_am_make','value' => 'Datsun','compare' => 'LIKE') ) );

 		$args=array(
		  'order'=>$order,
		  'post_type' => AUTOMOB_CPT_CAR,
		  'meta_query'=>$meta_query,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'ignore_sticky_posts'=> 1);
		$wp_query = null;
		$wp_query = new WP_Query($args);
		$posts = $wp_query->get_posts();

		wp_reset_query();
		return $this->patch($posts); 

 	}
}
<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class GSAS_ADD_META_BOX {
	protected $meta_box;
	//Create meta box based on given data
	function __construct( $meta_box )  {
		if($meta_box == 'Remove_snippets') {
			$this->gsas_remove_snippets();
		
		}
		else {
			$this->_meta_box = $meta_box;
		add_action( 'add_meta_boxes', array( &$this, 'gsas_add' ) );
		add_action( 'save_post', array( &$this, 'gsas_save' ) );
		}
	}
	//Add meta box for multiple post types
	function gsas_add() {
		global $wpdb;
		$post_var=get_option('smack_gsas_post_check');

		foreach( $post_var as $page =>$value )
		{
			add_meta_box(
				$this->_meta_box['id'],
				$this->_meta_box['title'],
				array( &$this, 'gsas_show' ),
				$page,
				$this->_meta_box['context'],
				$this->_meta_box['priority']
			);
		}
		
	}
	function gsas_save($post_id){
		$people=$this->_meta_box['people_fields'];
		foreach($people as $people_field) {
			$key = $people_field['id'];
			if(!empty($_POST[$key]))
				update_post_meta($post_id, $key, sanitize_text_field($_POST[$key]));
		}
		foreach($this->_meta_box['org_fields'] as $org_field) {
			$org_key = $org_field['id'];
			if(!empty($_POST[$org_key]))
				update_post_meta($post_id, $org_key, sanitize_text_field($_POST[$org_key]));
		}
		foreach($this->_meta_box['events_fields'] as $event_field) {	
			$event_key = $event_field['id'];
			if(!empty($_POST[$event_key]))
				update_post_meta($post_id, $event_key, sanitize_text_field($_POST[$event_key]));
		}
		foreach($this->_meta_box['article_fields'] as $article_field) {
			$article_key = $article_field['id'];
			if(!empty($_POST[$article_key]))
				update_post_meta($post_id, $article_key, sanitize_text_field($_POST[$article_key]));
		}
		foreach($this->_meta_box['bread_fields'] as $bread_field) {
			$bread_key = $bread_field['id'];
			if(!empty($_POST[$bread_key]))
				update_post_meta($post_id, $bread_key, sanitize_text_field($_POST[$bread_key]));
		}
		foreach($this->_meta_box['product_fields'] as $product_field) {
			$product_key = $product_field['id'];
			if(!empty($_POST[$product_key]))
				update_post_meta($post_id, $product_key, sanitize_text_field($_POST[$product_key]));
		}
		foreach($this->_meta_box['music_fields'] as $music_field) {
			$music_key = $music_field['id'];
			if(!empty($_POST[$music_key]))
				update_post_meta($post_id, $music_key, sanitize_text_field($_POST[$music_key]));
		}
		foreach($this->_meta_box['receipes_fields'] as $receipes_field) {
			$receipes_key = $receipes_field['id'];
			if(!empty($_POST[$receipes_key]))	
				update_post_meta($post_id, $receipes_key, sanitize_text_field($_POST[$receipes_key]));
		}
		foreach($this->_meta_box['software_fields'] as $software_field) {
			$software_key = $software_field['id'];
			if(!empty($_POST[$software_key]))
				update_post_meta($post_id, $software_key, sanitize_text_field($_POST[$software_key]));
		}
		foreach($this->_meta_box['videos_fields'] as $videos_field) {
			$videos_key = $videos_field['id'];
			if(!empty($_POST[$videos_key]))
				update_post_meta($post_id, $videos_key, sanitize_text_field($_POST[$videos_key]));
		}
		$review = $this->_meta_box['review_fields'];
		foreach($review as $review_fields){
			$review_key = $review_fields['id'];
			if(!empty($_POST[$review_key]))
				update_post_meta($post_id, $review_key, sanitize_text_field($_POST[$review_key]));
		}
		$review_rating = $this->_meta_box['review_rating_fields'];
		foreach($review_rating as $review_rating_fields){
			$review_rating_key = $review_rating_fields['id'];
			if(!empty($_POST[$review_rating_key]))
				update_post_meta($post_id, $review_rating_key, sanitize_text_field($_POST[$review_rating_key]));
		}

	}

	public function gsas_remove_snippets()
	{
		$target_postId = intval($_POST['post_id']);
		global $wpdb;
		$wpdb->query($wpdb->prepare("delete from wp_postmeta where post_id = $target_postId AND meta_key LIKE 'google_snippets%'"));
	}

	function gsas_show()
	{
		global $post;
		$title = '';
		$id = '';
		global $wpdb;
		$post_values = array('post/product-title','post/product-image','product_category','product_description');
		$google = array( 'google_snippetspeople_name','google_snippetspeople_nick_name','google_snippetspeople_home_page_url','google_snippetspeople_street_address','google_snippetspeoeple_locality','google_snippetspeople_region','google_snippetspeople_postal_code','google_snippetspeople_country_name','google_snippetspeople_title','google_snippetspeople_affliation','google_snippetspeople_friend_name','google_snippetspeople_friend_url','google_snippetsorganisation_name','google_snippetsorganisation_url','google_snippetsorganisation_street_address','google_snippetsorganisation_address_locality','google_snippetsorganisation_address_region','google_snippetsorganisation_postal_code','google_snippetsorganisation_country','google_snippetsorganisation_telephone','google_snippetsorganisation_logo','google_snippetsorganisation_longitude','google_snippetsorganisation_latitude','google_snippetsevents_summary'
			,'google_snippetsevents_url','google_snippetsevents_photo','google_snippetsevents_location','google_snippetsevents_description','google_snippetsevents_startdate','google_snippetsevents_enddate','google_snippetsevents_street_address','google_snippetsevents_locality','google_snippetsevents_region','google_snippetsevents_longitude','google_snippetsevents_latitude','google_snippetsevents_eventtype','google_snippetsevents_offer_aggregate','google_snippetslow_price','google_snippetshigh_price','google_snippetsoffer_url','google_snippetsevents_ticket_price','google_snippetsevents_website','google_snippetsevents_ticket_quantity','google_snippetsevents_tickets_price_valid','google_snippetsevents_tickets_currency','google_snippetarticle_headline','google_snippetsarticle_name','google_snippetsarticle_description','google_snippetsarticle_imageurl','google_snippetsarticle_contenturl','google_snippetsarticle_logourl','google_snippetsarticle_orgname','google_snippetsarticle_datepublished','google_snippetsarticle_datemodified','google_snippetsbread_name1','google_snippetsbread_image1','google_snippetsbread_url1','google_snippetsbread_name2','google_snippetsbread_image2','google_snippetsbread_url2','google_snippetsbread_name3','google_snippetsbread_image3','google_snippetsbread_url3','google_snippetsproduct_name' ,'google_snippetssku','google_snippetsproduct_image','google_snippetsproduct_description','google_snippetsproduct_category','google_snippetsproduct_currency','google_snippetsbrand_name','google_snippetsoffer_regular_price','google_snippetsoffer_sale_price','google_snippetsoffer_available_from','google_snippetsoffer_condition','google_snippetsproduct_seller','google_snippetsoffer_valid_upto','google_snippetsoffer_stock','google_snippetsmusic_group'
			,'google_snippetstrack_name','google_snippetstrack_length','google_snippetsplay_count','google_snippetsplay_url','google_snippetsbuy_url','google_snippetsalbum_link','google_snippetsreceipes_name','google_snippetsreceipes_photo','google_snippetsreceipes_author','google_snippetsreceipes_published','google_snippetsreceipes_summary','google_snippetsreceipes_preptime','google_snippetsreceipes_cooktime','google_snippetsreceipes_totaltime','google_snippetsreceipes_yield','google_snippetsreceipes_nutrition'
			,'google_snippetsreceipes_ingredient','google_snippetsreceipes_ingredient_amount','google_snippetsreceipes_servingsize'
			,'google_snippetsreceipes_calories','google_snippetsreceipes_fat','google_snippetsreceipes_instructions'
			,'google_snippetssoftware_name','google_snippetssoftware_description','google_snippetssoftware_url','google_snippetssoftware_image'  ,'google_snippetssoftware_author','google_snippetssoftware_aggregate_rating','google_snippetssoftware_reveiws','google_snippetssoftware_content_rating','google_snippetssoftware_operationg_systems','google_snippetssoftware_category','google_snippetssoftware_version','google_snippetssofware_interaction_count','google_snippetssofware_review_count','google_snippetssofware_review_author','google_snippetssofware_review_publish_date','google_snippetssofware_review_description','google_snippetssofware_price','google_snippetsvideo_name','google_snippetsvideo_image_src','google_snippetsvideo_video_src','google_snippetsupload_date','google_snippetsexpire_date','google_snippetsembed_url','google_snippetsvideo_description','google_snippetsvideo_type','google_snippetsvideo_duration' );
		$custom_fields = array();

		$custom_fields = get_post_custom_keys($post->ID);
		if(isset($custom_fields)){

			$custom_field_keys = array_merge($custom_fields,$post_values);
		}
		$get = get_option('smack_snippet_settings');
		$check3 = get_option('gsas_checked3');
		$get_avail_types = get_option('smack_gsas_post_check');    
		$post_for = get_post_format($post->ID);
		$post_ty = get_post_type($post->ID);
		foreach($get as $key => $type) {

			if( (isset($key)) && ($key ==  get_post_type($post->ID))) {

				if($type == 'Rich snippets - Events') { $events = 'Events *';  }
				else { $events = 'Events';}
				if($type == 'Rich snippets - Article') { $article = 'Article *';  }
				else { $article = 'Article';}
				if($type == 'Rich snippets - Breadcrumbs') { $bread = 'Breadcrumbs *';  }
				else { $bread = 'Breadcrumbs';}
				if($type == 'Rich snippets - Music') { $music = 'Music *';  }
				else { $music = 'Music';}
				if($type == 'Rich snippets - Organizations') { $org = 'Organisation *';  }
				else { $org = 'Organisation';}
				if($type == 'Rich snippets - People') { $people = 'People *'; }
				else { $people = 'People';}
			if($type == 'Rich snippets - Products') { $product = 'Products *'; }
				else { $product = 'Products';}
				if($type == 'Rich snippets - Receipes') { $receipes = 'Receipes *'; }
				else { $receipes = 'Receipes';}
				if($type == 'Rich snippets - Reviews') { $review = 'Review *';  }
				else { $review = 'Review';}
				if($type == 'Rich snippets - Software applications') { $soft = 'Software *';  }
				else { $soft = 'Software';}
				if($type == 'Rich snippets - Videos: Facebook Share and RDFa') { $video = 'Videos *';  }
				else { $video = 'Videos';}
				$current_field = $type;
			}
		}
?>

		<div class = "google_seo_meta_box">

			<ul class="google_seo_metabox-tabs" id="google_seo_metabox-tabs">
			<?php if($check3 == "" || $post_ty != 'post') {  ?>
				<?php if($people == 'People *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class=" people">Rich Snippets - People:</li>
					<?php } if($article  == 'Article *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class=" article">Rich Snippets - Article:</li>
					<?php } if($bread  == 'Breadcrumbs *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class=" bread">Rich Snippets - Breadcrumbs:</li>
				<?php } if($org  == 'Organisation *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="organization">Rich Snippets - Organization:</li>
				<?php }if($events  == 'Events *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;display:block! important;' class="events">Rich Snippets - Events:</li>
				<?php } if($product  == 'Products *'){ ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="product">Rich Snippets - Product:</li>
				<?php  } if($music  == 'Music *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="music">Rich Snippets - Music:</li>
				<?php  } if($receipes  == 'Receipes *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="receipes">Rich Snippets - Receipes:</li>
				<?php  } if($soft  == 'Software *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="software">Rich Snippets - Software:</li>
				<?php  } if($video  == 'Videos *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="videos">Rich Snippets - Video:</li>
				<?php  } if($review  == 'Review *'){  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="review">Rich Snippets - Review:</li>
				<?php } ?>
				<?php } else {  ?>

			<?php if($post_for == 'audio') {  ?>
					<li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="music">Rich Snippets - Music:</li>


				<?php	} ?>
		    <?php if($post_for == 'video') {  ?>

		     <li style='color: #2a0e6b;font-size: 24px;font-style: italic;' class="videos">Rich Snippets - Video:</li>

				<?php	} ?>

				<?php } ?>
			</ul>

<?php if($check3 == "" || $post_ty != 'post') {  ?>

			<?php if($people == 'People *'){  ?>
				<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'people'); ?></h4>
<?php
		foreach($this->_meta_box['people_fields'] as $field){
			$title=$field['name'];
			$id=$field['id'];
			$value=get_post_meta($post->ID,$id,true);
?>
							<tr valign="top"> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $title );  ?></label>
								</th>
							<td><?php
			if(isset($field['type']) && ($field['type'] =='datepicker')){
				echo '<input type="date" id="'.esc_attr($field['id']).'" name="'.esc_attr($field['id']).'" value="'.esc_attr($value).'" />';
			}elseif(isset($field['type'] ) && ($field['type'] == 'textarea')){
				echo '<textarea id="'.esc_attr($field['id']).'" name="'.esc_attr($field['id']).'"   row = "10" col ="10" class = "large_text" rows="2">'.esc_html($value).' </textarea>';
				if(array_key_exists('eg',$field)){
				echo '<p style="color: grey;font-size: small;font-style: italic;">'. esc_html($field['eg']) .'</p> ';
				}
			}
			else { ?>
										<input type="text"  class="large_text" id="<?php echo esc_attr($field['id']); ?>" name="<?php echo esc_attr($field['id']); ?>" value="<?php echo esc_attr($value);?>" > 
										<?php if(array_key_exists('eg',$field)){?>
										<div><p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($field['eg']); ?></p> </div>
									<?php	}?>

										<?php }?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- People -->
			<?php } ?>
			<?php if( $org == 'Organisation *'){ ?>
				<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'organization'); ?></h4>
<?php
				foreach($this->_meta_box['org_fields'] as $org_field){
					$org_title=$org_field['name'];
					$org_id=$org_field['id'];
					$org_value=get_post_meta($post->ID,$org_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $org_title );  ?></label>
								</th>
								<td><?php
					if(isset($org_field['type']) && ($org_field['type']=='datepicker')){
						echo '<input type="date" id="'.esc_attr($org_field['id']).'" name="'.esc_attr($org_field['id']).'" value="'.esc_attr($org_value).'" />';
					}
					elseif(isset($org_field['type']) && ($org_field['type'] == 'textarea')){
						echo '<textarea id="'.esc_attr($org_field['id']).'" name="'.esc_attr($org_field['id']).'"   class = "large_text" rows="2">'.esc_html($org_value).' </textarea>';
						if(array_key_exists('eg',$org_field)){
						echo '<p style="color: grey;font-size: small;font-style: italic;">'. esc_html($org_field['eg']) .'</p> ';
						}
					}
					else{ ?>
										<input type="text" id="<?php echo esc_attr($org_id); ?>" name="<?php echo esc_attr($org_id); ?>"  class="large-text"  value="<?php echo esc_attr($org_value); ?>" />
										<?php if(array_key_exists('eg',$org_field)){ ?>
										<p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($org_field['eg']); ?></p>
										<?php } 
										 }?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- org -->
			<?php } ?>
			<?php if($events  == 'Events *'){  ?>
				<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Events'); ?></h4>

<?php 
						foreach($this->_meta_box['events_fields'] as $event_field){
							$event_title=$event_field['name'];
							$event_id=$event_field['id'];
							$event_value=get_post_meta($post->ID,$event_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $event_title );  ?></label>
								</th>
								<td><?php
							if(isset($event_field['type'] ) && ($event_field['type']=='datepicker')){
								echo '<input type="date" id="'.esc_attr($event_field['id']).'" name="'.esc_attr($event_field['id']).'" value="'.esc_attr($event_value).'" />';
								if(array_key_exists('eg',$event_field)){ 
								echo '<p style="color: grey;font-size: small;font-style: italic;">'. esc_html($event_field['eg']) .'</p>';
								}
							}
							else if(isset($event_field['type']) && ($event_field['type'] == 'textarea')){
								echo '<textarea id="'.esc_attr($event_field['id']).'" name="'.esc_attr($event_field['id']).'"   class = "large_text" rows="2">'.esc_html($event_value).' </textarea>';
								if(array_key_exists('eg',$event_field)){ 
								echo '<p style="color: grey;font-size: small;font-style: italic;">'. esc_html($event_field['eg']) .'</p>';
								}
							}

							else{ ?>
									<input type="text" id="<?php echo esc_attr($event_id); ?>" name="<?php echo esc_attr($event_id); ?>"  class="large-text"  value="<?php echo esc_attr($event_value); ?>" />  
									<?php if(array_key_exists('eg',$event_field)){ ?>
									<p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($event_field['eg']); }?></p>
									<?php } ?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Events -->
			<?php }  ?>
			<?php if($article  == 'Article *'){  ?>
				<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Article'); ?></h4>

<?php 
								foreach($this->_meta_box['article_fields'] as $article_field){
									$article_title=$article_field['name'];
									$article_id=$article_field['id'];
									$article_value=get_post_meta($post->ID,$article_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $article_title );  ?></label>
								</th>
								<td><?php
									if(isset($article_field['type'] ) && ($article_field['type']=='datepicker')){
										echo '<input type="date" id="'.esc_attr($article_field['id']).'" name="'.esc_attr($article_field['id']).'" value="'.esc_attr($article_value).'" />';
									}
									else if(isset($article_field['type']) && ($article_field['type'] == 'textarea')){
										echo '<textarea id="'.esc_attr($article_field['id']).'" name="'.esc_attr($article_field['id']).'"   class = "large_text" rows="2">'.esc_html($article_value).' </textarea>';
									}

									else{ ?>

										<input type="text" id="<?php echo esc_attr($article_id); ?>" name="<?php echo esc_attr($article_id); ?>"  class="large-text"  value="<?php echo esc_attr($article_value); ?>"  />    
										 <?php 
										 if(array_key_exists('eg',$article_field)){ 
										 echo $article_field['eg'];
										 }
										  }?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Aricle -->
		   <?php }  ?>

		   <?php if(($bread  == 'Breadcrumbs *') ){  ?>
				<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Breadcrumbs'); ?></h4>

<?php 
										foreach($this->_meta_box['bread_fields'] as $bread_field){
											$bread_title=$bread_field['name'];
											$bread_id=$bread_field['id'];
											$bread_value=get_post_meta($post->ID,$bread_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $bread_title );  ?></label>
								</th>
								<td><?php
											if(isset($bread_field['type'] ) && ($bread_field['type']=='datepicker')){
												echo '<input type="date" id="'.esc_attr($bread_field['id']).'" name="'.esc_attr($bread_field['id']).'" value="'.esc_attr($bread_value).'" />';
											}
											else if(isset($bread_field['type']) && ($bread_field['type'] == 'textarea')){
												echo '<textarea id="'.esc_attr($bread_field['id']).'" name="'.esc_attr($bread_field['id']).'"   class = "large_text" rows="2">'.esc_html($bread_value).' </textarea>';
											}

											else{ ?>

										<input type="text" id="<?php echo esc_attr($bread_id); ?>" name="<?php echo esc_attr($bread_id); ?>"  class="large-text"  value="<?php echo esc_attr($bread_value); ?>"  /><br> 
										<?php 
										if(array_key_exists('eg',$bread_field)){ 
										echo $bread_field['eg'];
										}
										 }?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Breadcrumbs -->
		   <?php }  ?>

			<?php if($product  == 'Products *'){  ?>
				<form id='Products' >
					<div>
						<table class="form-table">
							<h4 class="heading"><?php esc_html_e( 'Products'); ?></h4>

								<?php
									foreach($this->_meta_box['product_fields'] as $product_field){
										$product_title=$product_field['name'];
										$product_id=$product_field['id'];
										$product_value=get_post_meta($post->ID,$product_id,true);
								?>
									<tr> <th>
										<?php if(($product_title != 'ptype')  ) { ?>
											<label for="google_seo_meta_title"><?php  esc_html_e( $product_title );  ?></label>
										<?php } ?>
										</th>
									<td>
										<?php if($product_field['type']=='checkbox'){ ?>
											<div class="socialaccess" style="float:right;margin-top:2px;">
											<?php echo '<input type="checkbox" id="'.esc_attr($product_field['id']).'" name="'.esc_attr($product_field['id']).'" style="display:none;"/><label for="'.esc_html($product_field['id']).'" /></label>' ?>
											</div><?php } ?>
									</td>
									<td><?php
											$get_auto = get_option('smack_gsas_auto');
											if(!empty($get_auto)){
												$manual_product = '';
												foreach($get_auto as $auto_key => $auto_val) { if($auto_key == 'product') {
													$manual_product = 'on'; } else { $manual_product = 'off'; }  }}
														if(isset($manual_product) && ($manual_product != 'on')) {
															if($product_field['type']=='datepicker'){
																echo '<input type="date" id="'.esc_attr($product_field['id']).'" name="'.esc_attr($product_field['id']).'" value="'.esc_attr($product_value).'" />';
															}
															if($product_field['type'] == 'textarea'){
																echo '<textarea id="'.esc_attr($product_field['id']).'" name="'.esc_attr($product_field['id']).'"  class = "large_text" rows="2">'.esc_html($product_value).' </textarea>';
															}
															if($product_field['type'] == 'text'){ ?>
																<input type="text" id="<?php echo esc_attr($product_id); ?>" name="<?php echo esc_attr($product_id); ?>"  class="large-text"  value="<?php echo esc_attr($product_value); ?>" />
													<?php   } ?>
															<?php  if($product_field['type'] == 'checkbox' ) {
																echo '<label style = "float:left;"><input type = "hidden"  name = "'.esc_attr($product_field['id']).'" id = "'.esc_attr($product_field['id']).'"  value = "off" />  </label>'; ?>
															<?php } ?>



												 <?php  } else { ?>
															<?php if($product_field['type'] != 'checkbox' ) {
																?>
														<select class="large_text" id="<?php echo esc_attr($product_field['id']); 	?>"  name= "<?php echo esc_attr($product_field['id']) ?>" />                    <option value ="<?php  echo esc_attr($product_value);?> " > <?php echo esc_html($product_value); ?> </option>
															<?php if(isset($custom_field_keys)){
																		foreach ( $custom_field_keys as $cf_key => $cf_val ) {
																			if((!in_array($cf_val, $google ,TRUE)) && ($cf_val != '_edit_last') && ($cf_val != '_edit_lock'))  { 
																				?>
																				<?php if((isset($cf_val)) && (trim($cf_val)) ) 
																					global $wpdb;
																					if($cf_val=="post/product-title"){
																						$cf_val=$wpdb->get_results($wpdb->prepare("SELECT post_title FROM {$wpdb->prefix}posts WHERE id=%d ",$post->ID));
																						foreach($cf_val as $val){
																							$cf_val=$val->post_title;
																						}
																					}
																					elseif($cf_val=="post/product-image"){
																						$cf_val=$wpdb->get_results($wpdb->prepare("SELECT meta_value FROM {$wpdb->prefix}postmeta WHERE post_id=%d AND meta_key=%s",$post->ID,"_thumbnail_id "));
																						foreach($cf_val as $val){
																							$cf_val=$val->meta_value;
																						}
																					}
																					elseif($cf_val=="product_category"){
																						$cf_val=$wpdb->get_results("SELECT t.name FROM {$wpdb->prefix}terms as t join {$wpdb->prefix}term_relationships as tr on t.term_id = tr.term_taxonomy_id where tr.object_id=$post->ID");
																						foreach($cf_val as $val){
																							$cf_val=$val->name;
																						}
																					}
																					elseif($cf_val=="product_description"){
																						$cf_val=$wpdb->get_results($wpdb->prepare("SELECT post_excerpt FROM {$wpdb->prefix}posts WHERE id=%d ",$post->ID));
																						foreach($cf_val as $val){
																							$cf_val=$val->post_excerpt;
																						}
																					}
																					else{
																						if(isset($cf_val)){
																						$substring="_";
																						$string=substr($cf_val,0,1)	;
																						if($string==$substring){
																							if($cf_val=='_sale_price_dates_from'||$cf_val=='_sale_price_dates_to'){
																								$cf_val=$wpdb->get_results($wpdb->prepare("SELECT meta_value FROM {$wpdb->prefix}postmeta WHERE post_id=%d AND meta_key=%s",$post->ID,$cf_val));
																								foreach($cf_val as $val){
																									$cf_val=$val->meta_value;
																								}
																								$cf_val=date('Y-m-d',$cf_val);
																							}
																							else{						
																								$cf_val=$wpdb->get_results($wpdb->prepare("SELECT meta_value FROM {$wpdb->prefix}postmeta WHERE post_id=%d AND meta_key=%s",$post->ID,$cf_val));
																								foreach($cf_val as $val){
																									$cf_val=$val->meta_value;
																								}
																							}
																						}
																				}
																					}
																				//	$cf_val=$wpdb->get_results($wpdb->prepare("SELECT meta_value FROM {$wpdb->prefix}postmeta WHERE post_id=%d AND meta_key=%s",$p_id,$cf_val));
																				
																				?>
																				<option value= "<?php echo esc_attr($cf_val);?>"> <?php echo esc_html($cf_val);?>  </option>     <?php 
																			} 
																		}
																} ?>
														</select>
														<?php } else { ?>
															<div style = "float:left"> <?php
																echo '<label style = "float:left;"><input type = "hidden"  name = "'.esc_attr($product_field['id']).'" id = "'.esc_attr($product_field['id']).'"  value = "on"/> </label>'; ?>

															</div>
														<?php } }?>
													</td></tr>
											<?php }?>
										</table>
									</div> <!-- Products -->
								</form>
			<?php  } if($music  == 'Music *'){  ?>
				<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Music'); ?></h4>
<?php
foreach($this->_meta_box['music_fields'] as $music_field){
	$music_title=$music_field['name'];
	$music_id=$music_field['id'];
	$music_value=get_post_meta($post->ID,$music_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $music_title );  ?></label>
								</th>
								<td><?php
	if(isset($music_field['type']) && ($music_field['type']=='datepicker')){
		echo '<label>'.esc_html($music_field['name']).'</label><input type="date" id="'.esc_attr($music_field['id']).'" name="'.esc_attr($music_field['id']).'" value="'.esc_attr($music_value).'" />';
	}else{ ?>

										<input type="text" id="<?php echo esc_attr($music_id); ?>" name="<?php echo esc_attr($music_id); ?>"  class="large-text"  value="<?php echo esc_attr($music_value); ?>" />
										<?php if(array_key_exists('eg',$music_field)){ ?>
										 <p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($music_field['eg']); ?></p>  
										<?php }
	}
										?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Music -->
			<?php  } if($receipes  == 'Receipes *'){   ?>
				<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Receipes'); ?></h4>
<?php
		foreach($this->_meta_box['receipes_fields'] as $receipes_field){
			$receipes_title=$receipes_field['name'];
			$receipes_id=$receipes_field['id'];
			$receipes_value=get_post_meta($post->ID,$receipes_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $receipes_title );  ?></label>
								</th>
								<td><?php
			if(isset($receipes_field['type']) && ($receipes_field['type']=='datepicker')){
				echo '<input type="date" id="'.esc_attr($receipes_field['id']).'" name="'.esc_attr($receipes_field['id']).'" value="'.esc_attr($receipes_value).'" />';
			}else{ ?>

										<input type="text" id="<?php echo esc_attr($receipes_id); ?>" name="<?php echo esc_attr($receipes_id); ?>"  class="large-text"  value="<?php echo esc_attr($receipes_value); ?>" /> 
										<?php if(array_key_exists('eg',$receipes_field)){ ?>
										 <p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($receipes_field['eg']); ?></p>   
										 <?php }
										 }?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Receipes -->
			<?php  } if($soft  == 'Software *'){  ?>
				<div><!-- Software -->
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Software'); ?></h4>
<?php
				foreach($this->_meta_box['software_fields'] as $software_field){
					$software_title=$software_field['name'];
					$software_id=$software_field['id'];
					$software_value=get_post_meta($post->ID,$software_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $software_title );  ?></label>
								</th>
								<td><?php
					if(isset($software_field['type']) && ($software_field['type']=='datepicker')){
						echo '<input type="date" id="'.esc_attr($software_field['id']).'" name="'.esc_attr($software_field['id']).'" value="'.esc_attr($software_value).'" />';
					}
					else if(isset($software_field['type']) && ($software_field['type'] == 'textarea')){
						echo '<textarea id="'.esc_attr($software_field['id']).'" name="'.esc_attr($software_field['id']).'"  class = "large_text" rows="2">'.esc_html($software_value).' </textarea>';
					}

					else{ ?>

										<input type="text" id="<?php echo esc_attr($software_id); ?>" name="<?php echo esc_attr($software_id); ?>"  class="large-text"  value="<?php echo esc_attr($software_value); ?>" />
										<?php if(array_key_exists('eg',$software_field)){ ?>
										<p style="color: grey;font-size: small;font-style: italic;"> <?php echo esc_html($software_field['eg']); ?></p>   
										<?php }
										}?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Sorftware  -->
			<?php  } if($video  == 'Videos *'){  ?>
				<div><!-- Videos -->
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Videos'); ?></h4>
<?php 

						foreach($this->_meta_box['videos_fields'] as $videos_field){
							$videos_title=$videos_field['name'];
							$videos_id=$videos_field['id'];
							$videos_value=get_post_meta($post->ID,$videos_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $videos_title );  ?></label>
								</th>
								<td><?php
							if(isset($videos_field['type']) && ($videos_field['type']=='datepicker')){
								echo '<input type="date" id="'.esc_attr($videos_field['id']).'" name="'.esc_attr($videos_field['id']).'" value="'.esc_attr($videos_value).'" />';
							}else{ ?>

										<input type="text" id="<?php echo esc_attr($videos_id); ?>" name="<?php echo esc_attr($videos_id); ?>"  class="large-text"  value="<?php echo esc_attr($videos_value); ?>" /> 
										<?php if(array_key_exists('eg',$videos_field)){ ?>
										<p style="color: grey;font-size: small;font-style: italic;"> <?php echo esc_html($videos_field['eg']); ?></p>  
										<?php }
										}?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Videos  -->
			<?php  } if($review  == 'Review *'){  ?>
				<div><!-- Review -->
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Review'); ?></h4>
<?php
								foreach($this->_meta_box['review_fields'] as $review_field){
									$review_title=$review_field['name'];
									$review_id=$review_field['id'];
									$review_value=get_post_meta($post->ID,$review_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $review_title );  ?></label>
								</th>
								<td><?php
									$i = 1;
									if($i ==1) {
										if(isset($review_field['type']) && ($review_field['type']=='datepicker')){
											echo '<input type="date" id="'.$review_field['id'].'" name="'.$review_field['id'].'" value="'.$review_value.'" />';
										} else { ?>
											<input type="text" id="<?php echo esc_attr($review_id); ?>" name="<?php echo esc_attr($review_id); ?>"  class="large-text"  value="<?php echo esc_attr($review_value); ?>" /> <p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($review_field['eg']); ?></p>     <?php } } else {
											if($review_field['type'] != 'checkbox' ) { ?>
											<select class="large_text" id="<?php echo esc_attr($review_field['id']) ?>"  name= "<?php echo esc_attr($review_field['id']) ?>" />                    <option value ="<?php  echo esc_attr($review_value);?> " > <?php echo esc_html($review_value); ?> </option>
<?php foreach ( $custom_field_keys as $cf_key => $cf_val ) {
if((!in_array($cf_val, $google ,TRUE)) && ($cf_val != '_edit_last') && ($cf_val != '_edit_lock'))  { ?>
													<?php if((isset($cf_val)) && (trim($cf_val)) ) 
												?>
														<option value= "<?echo esc_attr($cf_val);?>"> <?php echo esc_html($cf_val);?>  </option>
														<?php if(array_key_exists('eg',$review_field)){ ?>
														 <p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($review_field['eg']); ?></p>  
														   <?php } 
														}
														} ?>
											</select>
										<?php } else { ?>
										<div style = "float:left"> <?php
	echo '<label style = "float:left;"><input type = "hidden"  name = "'.esc_attr($review_title).'" id = "'.esc_attr($review_id).'"/> </label>'; ?>
											</div>
<?php }
										} ?>
								</td>
							</tr>
						<?php }   ?>
					</table>
				</div> <!-- Review  -->
			<?php } ?>
<?php
											echo "<a href='javascript:void(0)' class='button button-primary button-danger' onclick='".esc_js('remove_applied_snippets('.$post->ID.')')."';>Remove Applied Snippets</a>";
										?>
		</div><!-- End Meta Box -->
<?php
		}else {

			if($post_for == 'video'){ ?>

	<div><!-- Videos -->
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Videos'); ?></h4>

<?php 

				foreach($this->_meta_box['videos_fields'] as $videos_field){
					$videos_title=$videos_field['name'];
					$videos_id=$videos_field['id'];
					$videos_value=get_post_meta($post->ID,$videos_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $videos_title );  ?></label>
								</th>
								<td><?php
					if(isset($videos_field['type']) && ($videos_field['type']=='datepicker')){
						echo '<input type="date" id="'.esc_attr($videos_field['id']).'" name="'.esc_attr($videos_field['id']).'" value="'.esc_attr($videos_value).'" />';
					}else{ ?>

										<input type="text" id="<?php echo esc_attr($videos_id); ?>" name="<?php echo esc_attr($videos_id); ?>"  class="large-text"  value="<?php echo esc_attr($videos_value); ?>" /> 
										<?php if(array_key_exists('eg',$videos_field)){ ?>
										<p style="color: grey;font-size: small;font-style: italic;"> <?php echo esc_html($videos_field['eg']); ?></p>    
										<?php }
										}?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Videos  -->

<?php }

if($post_for == 'audio'){ ?>
<div>
					<table class="form-table">
						<h4 class="heading"><?php esc_html_e( 'Music'); ?></h4>
<?php
	foreach($this->_meta_box['music_fields'] as $music_field){
		$music_title=$music_field['name'];
		$music_id=$music_field['id'];
		$music_value=get_post_meta($post->ID,$music_id,true);
?>
							<tr> <th>
									<label for="google_seo_meta_title"><?php  esc_html_e( $music_title );  ?></label>
								</th>
								<td><?php
		if(isset($music_field['type']) && ($music_field['type']=='datepicker')){
			echo '<label>'.esc_html($music_field['name']).'</label><input type="date" id="'.esc_attr($music_field['id']).'" name="'.esc_attr($music_field['id']).'" value="'.esc_attr($music_value).'" />';
		}else{ ?>

										<input type="text" id="<?php echo esc_attr($music_id); ?>" name="<?php echo esc_attr($music_id); ?>"  class="large-text"  value="<?php echo esc_attr($music_value); ?>" /> 
										<?php if(array_key_exists('eg',$music_field)){ ?>
										<p style="color: grey;font-size: small;font-style: italic;"><?php echo esc_html($music_field['eg']); ?></p>   
										<?php }
										}?>
								</td>
							</tr>
						<?php }?>
					</table>
				</div> <!-- Music -->

<?php }
		}
	} 
}
$prefix='google_snippets';
$meta_box=array();
$meta = array();
$meta_box[]=array(
	'id'=>'metagroup',
	'title'=>'<p style="font-style: italic;
color: black;
font-size: larger;
font-family: times new roman;">Google SEO Pressor Rich Snippets</p>',
	'pages'=> array('post','page','custom_type'),
	'context' => 'advanced',
	'priority' => 'high',
	'people_fields'=>array(
		array( 'id'=>$prefix.'people_name', 'name'=>'Name','type'=>'Text','eg'=>'Name of the person' ),
		array( 'id'=>$prefix.'people_nick_name','name'=>'Nick Name','type'=>'Text','eg'=>'Nick name of te person ' ),
		array( 'id'=>$prefix.'people_home_page_url', 'name'=>'Home page url','eg'=>'Url of the persons homepage'),
		array( 'id'=>$prefix.'people_street_address', 'name'=>'Street Address','type' =>'textarea','eg'=>'Address of the specified person' ),
		array( 'id'=>$prefix.'people_role', 'name'=>'Role','type'=>'Text','eg'=> 'Role of the specifed person'),
		array( 'id'=>$prefix.'peoeple_locality', 'name'=>'Locality' ),
		array( 'id'=>$prefix.'people_region', 'name'=>'Region'),
		array( 'id'=>$prefix.'people_postal_code', 'name'=>'Postal Code'),
		array( 'id'=>$prefix.'people_country_name','name'=>'Country Name','eg'=>'Country name of the specified person'),
		array( 'id'=>$prefix.'people_title', 'name'=>'Person Title'),
		array( 'id'=>$prefix.'people_affliation', 'name'=>'Affiliation' )
	),
	'events_fields' =>  array(
		array( 'id'=>$prefix.'events_summary', 'name'=>'Event Name' ,'eg'=>'Jan Lieberman Concert Series: Journey in Jazz'),
		array( 'id'=>$prefix.'events_url', 'name'=>'Events Url','eg'=>'Url of event'),
		array( 'id'=>$prefix.'events_photo','name'=>'Photo URL','eg'=>'Url of an image'),
		array( 'id'=>$prefix.'events_location','name'=>'Location','eg'=>'Santa Clara City Library, Central Park Library'),
		array( 'id'=>$prefix.'events_description','name'=>'Description','type' => 'textarea','eg'=>'Information about the event '),
		array( 'id'=>$prefix.'events_startdate', 'name'=>'Start Date','type'=>'datepicker','eg'=>'Starting date of event'),
		array( 'id'=>$prefix.'events_enddate', 'name'=>'End Date', 'type'=>'datepicker','eg'=>'Ending date of event' ),
		array( 'id'=>$prefix.'events_performer', 'name'=>'Performer', 'type'=>'text','eg'=> 'Performer of the event' ),
		array( 'id'=>$prefix.'events_street_address', 'name'=>'Street Address','eg'=>'Address of the event'),
		array( 'id'=>$prefix.'events_locality', 'name'=>'Address Locality' ),
		array( 'id'=>$prefix.'events_region', 'name'=>' Address Region' ),
		array( 'id'=>$prefix.'events_country', 'name'=>' Country' ),
		array( 'id'=>$prefix.'events_type', 'name'=>'Event type','eg'=>'Such us: Music,Sports'),
		array( 'id'=>$prefix.'events_offer_aggregate', 'name'=>'Offer aggregate' ),
		array( 'id'=>$prefix.'low_price', 'name'=>'Low Price' ),
		array( 'id'=>$prefix.'high_price', 'name'=>'High Price' ),
		array( 'id'=>$prefix.'offer_name', 'name'=>'Offer Name' ),
		array( 'id'=>$prefix.'offer_category', 'name'=>'Offer Category' ),
		array( 'id'=>$prefix.'offer_url', 'name'=>'Offer Url','eg'=>'Url for tickets book in offer'),
		array( 'id'=>$prefix.'events_ticket_price', 'name'=>'Price','eg'=>'$24.04' ),
		array( 'id'=>$prefix.'events_website', 'name'=>'Events Website',''=>'Url of the event' ),
		array( 'id'=>$prefix.'events_ticket_quantity', 'name'=>'Offer Quantity','eg'=>'No of tickets available in offer'),
		array( 'id'=>$prefix.'events_tickets_price_valid', 'name'=>'Price valid Until', 'type'=>'datepicker','eg'=>'Last date of offer valid'),
		array( 'id'=>$prefix.'events_tickets_currency', 'name'=>'Tickets currency','eg'=>'Enter the Currency Code(e.g USD, INR, AUD, EUR, GBP)' )
	),
	'article_fields' =>  array(
		array( 'id'=>$prefix.'article_headline', 'name'=>'Article Headline' ),
		array( 'id'=>$prefix.'article_name', 'name'=>'Aritcle Name'),
		array( 'id'=>$prefix.'article_description','name'=>'Description','type' => 'textarea'),
		array( 'id'=>$prefix.'article_imageurl','name'=>'Image URl'),
		array( 'id'=>$prefix.'article_contenturl','name'=>'Content URl'),
		array( 'id'=>$prefix.'article_logourl', 'name'=>'Logo URL'),
		array( 'id'=>$prefix.'article_orgname', 'name'=>'Organisation Name' ),
		array( 'id'=>$prefix.'article_datepublished', 'name'=>'Date Published','type'=>'datepicker' ),
		array( 'id'=>$prefix.'article_datemodified', 'name'=>'Date Modified', 'type'=>'datepicker'),
	),

	'bread_fields' =>  array(

		array( 'id'=>$prefix.'bread_name1', 'name'=>'Breadcrumbs Name' ),
		array( 'id'=>$prefix.'bread_image1', 'name'=>'Breadcrumbs Image'),
		array( 'id'=>$prefix.'bread_url1','name'=>'Breadcrumbs Url'),
		array( 'id'=>$prefix.'bread_name2', 'name'=>'Breadcrumbs Name' ),
		array( 'id'=>$prefix.'bread_url2','name'=>'Breadcrumbs Url'),
		array( 'id'=>$prefix.'bread_name3', 'name'=>'Breadcrumbs Name' ),
		array( 'id'=>$prefix.'bread_url3','name'=>'Breadcrumbs Url'),

	),
	'music_fields' => array(
		array( 'id'=>$prefix.'music_group', 'name'=>'Music Group','eg'=>'Name of the group'),
		array( 'id'=>$prefix.'album_name', 'name'=>'Album Name','eg'=>'Name of the album'),
		array( 'id'=>$prefix.'track_name', 'name'=>'Track Name','eg'=>'Name of the track'),
		array( 'id'=>$prefix.'track_length', 'name'=>'Album Duration Time' ),
		array( 'id'=>$prefix.'play_count', 'name'=>'No.of time plays' ),
		array( 'id'=>$prefix.'play_url', 'name'=>'Play Track','eg'=>'Track url' ),
		array( 'id'=>$prefix.'buy_url', 'name'=>'Buy Track ','eg'=>'Url for buying track' ),
		array( 'id'=>$prefix.'album_link', 'name'=>'Album Link','eg'=>'Url for about the album')
	),
	'org_fields' => array(
		array( 'id'=>$prefix.'organisation_name','name'=>'Name','eg'=>'Name of the organisation'),
		array( 'id'=>$prefix.'organisation_url', 'name'=>'Url','eg'=>'Url of the organisation'),
		array( 'id'=>$prefix.'organisation_street_address', 'name'=>'street address' ,'type' => 'textarea','eg'=>'Address of organisation'),
		array( 'id'=>$prefix.'organisation_address_locality', 'name'=>'Address Locality' ),
		array( 'id'=>$prefix.'organisation_address_region', 'name'=>'Address Region' ),
		array( 'id'=>$prefix.'organisation_postal_code', 'name'=>'Postal code' ),
		array( 'id'=>$prefix.'organisation_country', 'name'=>'Country' ),
		array( 'id'=>$prefix.'organisation_telephone', 'name'=>'Telephone','eg'=>'Contact number of organisation' ),
		array( 'id'=>$prefix.'organisation_logo', 'name'=>'Logo','eg'=>'organisation_logo' )
	),
	'product_fields' => array(
		array( 'id'=>$prefix.'product_name', 'name'=>'Product Name','type'=>'text'),
		array( 'id'=>$prefix.'sku', 'name'=>'Sku' , 'type' => 'text' ),
		array( 'id'=>$prefix.'product_image', 'name'=>'Product Image' ,'type'=> 'text'),
		array( 'id'=>$prefix.'product_price', 'name'=>'Price' ,'type'=> 'text'),
		array( 'id'=>$prefix.'product_category', 'name'=>'Product Category','type' => 'text'),
		array( 'id'=>$prefix.'product_currency', 'name'=>'Product Currency','type' => 'text'),
		array( 'id'=>$prefix.'brand_name', 'name'=>'Brand Name','type' => 'text'),
		array( 'id'=>$prefix.'offer_regular_price', 'name'=>'Offer Regular Price','type' => 'text'),
		array( 'id'=>$prefix.'offer_sale_price', 'name'=>'Offer Sale Price','type' => 'text'),
		array( 'id'=>$prefix.'offer_available_from','name'=>'Offer Available From','type' => 'datepicker'),
		array( 'id'=>$prefix.'offer_condition', 'name'=>'Offer Condition','type' => 'datepicker'),
		array( 'id'=>$prefix.'product_seller', 'name'=>'Seller', 'type' => 'text'),
		array( 'id'=>$prefix.'offer_valid_upto', 'name'=>'Offer Valid Upto' ,'type'=>'datepicker'),
		array( 'id'=>$prefix.'offer_stock', 'name'=>'Offer Stock','type' => 'text'),
	),
	'receipes_fields' => array(
		array( 'id'=>$prefix.'receipes_name', 'name'=>'Receipes Name','eg'=>'Name of the receipe'),
		array( 'id'=>$prefix.'receipes_photo', 'name'=>'Receipes Photo','eg'=>'Url of the recepies photo'),
		array( 'id'=>$prefix.'receipes_author', 'name'=>'Receipes Author','eg'=>'Author of the receipe' ),
		array( 'id'=>$prefix.'receipes_published', 'name'=>'Receipes Published','type'=> 'datepicker'),
		array( 'id'=>$prefix.'receipes_summary', 'name'=>'Receipes Summary','type' => 'textarea','eg'=> 'Summary about the receipe' ),
		array( 'id'=>$prefix.'receipes_totaltime', 'name'=>'Receipes Totaltime','eg'=>'Total time taken for cooking' ),
		array( 'id'=>$prefix.'receipes_nutrition', 'name'=>'Receipes Nutrition' ),
		array( 'id'=>$prefix.'receipes_ingredient', 'name'=>'Receipes Ingredient','eg'=>'Ingredients used in the receipe' ),
		array( 'id'=>$prefix.'receipes_ingredient_amount', 'name'=>'Ingredient Amount','eg'=>'Total amount of the ingredients' ),
		array( 'id'=>$prefix.'receipes_instructions', 'name'=>'Receipes Instructions' ,'type' => 'textarea','eg'=>'Instructions for cooking the receipe')
	),
	'review_rating_fields' => array(
		array( 'id'=>$prefix.'reviews_average', 'name'=>'Reviews Average' ),
		array( 'id'=>$prefix.'reviews_best', 'name'=>'Reviews Best' ),
		array( 'id'=>$prefix.'reviews_count', 'name'=>'Reviews Count')

	),
	'review_fields' => array(
		array( 'id'=>$prefix.'review_item_reviewed', 'name'=>'Item Reviewed','eg'=>'Name of the item reviewed' ),
		array( 'id'=>$prefix.'review_rating', 'name'=>'Rating','eg'=>'% rating out of 5'),
		array( 'id'=>$prefix.'review_reviewer', 'name'=>'Reviewer','eg'=>'Name of the reviewer ' ),
		array( 'id'=>$prefix.'review_date_reviewed', 'name'=>'Date Reviewed','type'=>'datepicker','eg'=>'Date of the reviewed' ),
		array( 'id'=>$prefix.'review_description', 'name'=>'Description','type' => 'textarea','eg'=>'Description about the reviewed item' ),
		array( 'id'=>$prefix.'review_summary', 'name'=>'Summary','eg'=>'overall summary of the item')

	),
	'software_fields' => array(
		array( 'id'=>$prefix.'software_name', 'name'=>'Name','eg'=>'Name of the software' ),
		array( 'id'=>$prefix.'software_operationg_systems', 'name'=>'Operating Systems','eg'=>'Types of os such us: LINUX,WINDOWS' ),
		array( 'id'=>$prefix.'software_category', 'name'=>'Software Application category', 'type' => 'dropdown'),
		array( 'id'=>$prefix.'software_description', 'name'=>'Description','type'=> 'textarea','eg'=>'Description about the software' ),
		array( 'id'=>$prefix.'software_url', 'name'=>'Url' ,'eg'=>'Url of the software'),
		array( 'id'=>$prefix.'software_image', 'name'=>'Image','eg'=>'Url of the software image'),
		array( 'id'=>$prefix.'software_author', 'name'=>'Author','eg'=>'Name of the software author'),
		array( 'id'=>$prefix.'software_reveiws', 'name'=>'Reviews','eg'=>'Reviews for the software'),
		array( 'id'=>$prefix.'software_price', 'name'=>'Software Price','eg'=>'Such us:$24.04' ),
		array( 'id'=>$prefix.'software_price_currency', 'name'=>'Software Price Currency','eg'=>'Currency code such us:USD,INR' )
	),
	'videos_fields' => array(
		array( 'id'=>$prefix.'video_name', 'name'=>'Video Name','eg'=>'Name of the video' ),
		array( 'id'=>$prefix.'video_image_src', 'name'=>'Thumbnail Url','eg'=>'Url of the thumbnail of video' ),
		array( 'id'=>$prefix.'video_video_src', 'name'=>'Video Url','eg'=>'Url of the video' ),
		array( 'id'=>$prefix.'upload_date', 'name'=>'Upload date' , 'type'=>'datepicker'),
		array( 'id'=>$prefix.'expire_date', 'name'=>'Expire date' , 'type'=>'datepicker'),
		array( 'id'=>$prefix.'embed_url', 'name'=>'Embed Url' ),
		array( 'id'=>$prefix.'video_description', 'name'=>'Video Description','type' => 'textarea' ,'eg'=>'Description about the video'),
		array( 'id'=>$prefix.'video_type', 'name'=>'Video Type','eg'=>'Type of the video'),
		array( 'id'=>$prefix.'video_duration', 'name'=>'Video Duration','eg'=>'Duration of the video' ),
		array( 'id' => $prefix.'interactionCount', 'name' => 'Video Interaction Count')

	)
);
foreach( $meta_box as $meta_b )
{
	new GSAS_ADD_META_BOX( $meta_b );
}

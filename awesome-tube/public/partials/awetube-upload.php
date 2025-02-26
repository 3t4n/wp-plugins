<?php

if ( isset( $_POST['ispost'] ) || isset( $_POST['submitpost'] ) ) {
	global $current_user;
	get_currentuserinfo();

	$user_login = $current_user->user_login;
	$user_email = $current_user->user_email;
	$user_firstname = $current_user->user_firstname;
	$user_lastname = $current_user->user_lastname;
	$user_id = $current_user->ID;

	$post_title   = sanitize_text_field( $_POST['title'] );

	if(!empty($_FILES['feat_thumb']['name'])) {
		$post_feat_thumb = sanitize_text_field( $_FILES['feat_thumb']['name'] );
	} elseif (!empty($_FILES['feat_thumb_mobile']['name'])) {
		$post_feat_thumb = sanitize_text_field( $_FILES['feat_thumb_mobile']['name'] );
	} else {
		$post_feat_thumb = "";
	}

	$feat_thumb   = sanitize_text_field( $post_feat_thumb );
	$video_file   = sanitize_text_field( $_FILES['awetube_video_file']['name'] );
	$post_content = sanitize_text_field( $_POST['sample_content'] );

	$post_category = sanitize_text_field( $_POST['category'] );

	$category     = $post_category;

	$post_tags = sanitize_text_field( $_POST['tags-input'] );

	$tags         = $post_tags;
	$video_url    = sanitize_text_field( $_POST['awetube_video_url'] );


	if ( ! empty($category) ) {
		$cats_tax = implode($category, ',');
	} else {
		$cats_tax = array();
	}

	if ( ! empty($tags) ) {
		$tags_taxca = implode($tags, ',');
		$tags_taxs = explode(',', $tags_taxca);
		if(!empty($tags_taxs)) {
			$tags_tax = $tags_taxs;
		}
	} else {
		$tags_tax = array();
	}

	$new_post = array(
		'post_title'   => $post_title,
		'post_content' => $post_content,
		'post_status'  => 'pending',
		'post_type'    => 'awetube-video',
		'tax_input'    => array(
			'video-category' => $cats_tax,
		),
	);

	if( ! empty($post_title) ) {
		$pid = wp_insert_post( $new_post );

		wp_set_object_terms( $pid, $tags_tax, 'video-tags' );
		add_post_meta( $pid, 'meta_key', true );
		if ( !empty( $video_url ) ) {
			update_post_meta( $pid, '_awetube_video_url', $video_url );
		}
		if ( !empty( $video_file ) ) {
			update_post_meta( $pid, '_awetube_video_file', $video_file );
		}

		if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/media.php';
		}
		if ( ! empty( $_FILES) ) {
			$attach_id = media_handle_upload( 'awetube_video_file', $pid );
			// updating
			carbon_set_post_meta( $pid, '_awetube_video_file', $attach_id );
			$attach_id2 = "";

			if(!empty($_FILES['feat_thumb']['name'])) {
				$attach_id2 = media_handle_upload( 'feat_thumb', $pid );
			}

			if ( is_numeric( $attach_id ) ) {
				update_post_meta( $pid, '_awetube_video_file', $attach_id );
			}
			if ( is_numeric( $attach_id2 ) ) {
				update_post_meta( $pid, '_thumbnail_id', $attach_id2 );
			}
		}
	}

	if ( $pid ) {
		wp_redirect( home_url( '/my-tube' ) );
		exit;
	}

}

get_header();

wp_enqueue_style( 'choosen', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/css/choosen.min.css', array(), '', 'all' );

?>
<div class="content-wrapper form-page modal">
	<div class="container-form">
		<form class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
			<div class="row clearfix">
				<div class="column column-1">
					<div class="upload-video-wrap">
						<div class="page-header-form-modal">
							<h3 class="page-title"><?php esc_html_e( 'Video Upload', 'awetube' ); ?></h3>
							<a href="<?php echo esc_url( home_url( 'my-tube' ) ); ?>" class="close-modal"><span></span></a>
						</div>
						<input type="hidden" name="ispost" value="1" />
						<input type="hidden" name="userid" value="" />

						<div class="form-group form-check clearfix">
							<div class="form-check form-check-inline column column-2">
								<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
								<label class="form-check-label" for="inlineRadio1"><?php esc_html_e( 'Video From Youtube/Vimeo', 'awetube' ); ?></label>
							</div>
							<div class="form-check form-check-inline column column-2">
								<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								<label class="form-check-label" for="inlineRadio2"><?php esc_html_e( 'Upload your own Video', 'awetube' ); ?></label>
							</div>
						</div>

						<div class="form-group show vid_url">
							<label class="control-label"><?php esc_html_e( 'Video Url', 'awetube' ); ?> <span class="mandatory">*</span></label>
							<input type="text" class="form-control" name="awetube_video_url" />
						</div>

						<div class="form-group">
							<label class="control-label"><?php esc_html_e( 'Video Title', 'awetube' ); ?> <span class="mandatory">*</span></label>
							<input type="text" id="title" class="form-control" name="title" />
						</div>

						<div class="form-group vid_file">
							<label class="control-label"><?php esc_html_e( 'Upload your own video', 'awetube' ); ?></label>
							<input type="file" name="awetube_video_file" class="form-control" id="awetube_video_file" accept="video/*"/>
							<label for="awetube_video_file" class="add-file-wrap">
								<span class="icon-add"><i class="awetube-icon-plus"></i></span>
								<div class="text-add">
									<span><?php esc_html_e( 'Add your video File', 'awetube' ); ?></span>
								</div>
							</label>
						</div>

						<div class="form-group">
							<label class="control-label"><?php esc_html_e( 'Description', 'awetube' ); ?> <span class="mandatory">*</span></label>
							<?php 
								$content = '';
								$editor_id = 'sample_content';
								$settings = array( 'media_buttons' => false, 'textarea_name' => 'sample_content', 'class' => 'video-content form-control' );
								wp_editor( $content, $editor_id, $settings );
							?>
						</div>

						<div class="feature-image form-group">
							<div class="form-group">
								<label class="control-label"><?php esc_html_e( 'Upload Featured Image', 'awetube' ); ?></label>
								<input type="file" name="feat_thumb" class="form-control" id="feat_thumb" />
								<label for="feat_thumb" class="add-file-wrap">
									<span class="icon-add"><i class="awetube-icon-plus"></i></span>
									<div class="text-add">
										<span><?php esc_html_e( 'Add your Video Thumbnail', 'awetube' ); ?></span>
									</div>
								</label>
							</div>
						</div>


						<div class="form-group">
							<?php
							$category_terms = array();
							$args = array(
								'hide_empty' => false,
							);
							$category_terms = get_terms( 'video-category', $args );

							if ( ! empty( $category_terms ) ) {
								echo '<label class="control-label">'.esc_html__("Select Category", "awetube").'<span class="mandatory">*</span></label>';
								echo '<select id="select-cats" name="category[]" class="form-control chosen-select" data-placeholder="Choose a Category..." multiple tabindex="4">';

								foreach ( $category_terms as $category ) {

									echo '<option value="' . esc_attr( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
								}

								echo '</select>';
							}
							?>
						</div>

						<div class="form-group">
							<?php
							$tags_terms = array();
							$tags_c = array();
							$args = array(
								'hide_empty' => false,
							);
							$tag_terms = get_terms( 'video-tags', $args );

							foreach($tag_terms as $tags) {
								$tags_c[] = $tags->term_id;
								$tags_s[] = $tags->slug;
							}

							$json = json_encode($tags_c);
							$jsons = json_encode($tags_s);

							//if ( ! empty( $tag_terms ) ) {
								echo '<label class="control-label">' . esc_html__( 'Select Tags', 'awetube' ) . '</label>'; ?>

								<div class="tags-input autocomplete" data-name="tags-input"></div>
								<span class="info-form"><?php esc_html_e( 'Enter a comma after each tag', 'awetube' ); ?><span class="mandatory">*</span></span>				
						</div>

						<div class="form-group text-left form-submit-btn">
							<button type="submit" class="btn btn-primary" name="submitpost"><?php esc_html_e( 'Submit for Review', 'awetube' ); ?></button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php global $wp;
$current_id = get_current_user_id();
$user_info = get_user_meta($current_id);
$first_name = $user_info["first_name"][0];
$last_name = $user_info["last_name"][0];

$user_name = $first_name .' '. $last_name;
if(empty($first_name)) {
	$user_info = get_userdata($current_id);
	$user_name = $user_info->display_name;
}
$display_name = get_userdata($current_id);
$display_name = $display_name->display_name;

$user_date_created = get_userdata($current_id);

$awetube_fake_count = '';

wp_enqueue_style( 'datatables', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/css/datatables.min.css', array(), '', 'all' ); ?>

<div class="content-wrapper profile-page dashboard-page">
	<div class="awesome-tube-container">
		<div class="profile-account clearfix">
			<div class="image-author">
			<?php 
				$user_img = wp_get_attachment_image_src( get_user_meta($current_id,'_user_img', array('150','150'), true, true ));
				if(!empty($user_img)) { ?>
					<img class="profile_img" src="<?php echo esc_url($user_img[0]); ?>" alt="<?php echo esc_attr($display_name); ?>">
				<?php }
				else {
					echo get_avatar( $current_id, 150 );
				} ?>
			</div>
			<div class="profile-author">
				<h2 class="name-user"><?php echo esc_html( $display_name ); ?></h2>
				<span><?php echo esc_html($user_date_created->user_description); ?></span>
				<div class="social-author">
					<ul>
						<li>
							<a href=""><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href=""><i class="fa fa-facebook-f"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<a href="<?php echo home_url( 'add-video' ); ?>"><i class="fa fa-video-camera"></i> <?php echo esc_html_e('Upload', 'Blutube'); ?></a>
		</div>
		<?php 
			$awetube_videos_args = array(
				'post_type'           => 'awetube-video',
				'posts_per_page'	  => -1,
				'ignore_sticky_posts' => true,
				'author'              => $current_id,
				'post_status'		  => array( 'pending', 'draft', 'future', 'publish' ),
			);
			$awetube_videos = new WP_Query( $awetube_videos_args );
			if ( $awetube_videos->have_posts() ) :
				while ( $awetube_videos->have_posts() ) :
					$awetube_videos->the_post(); 
				endwhile; wp_reset_postdata(); endif; ?>
		<div class="filter-and-count">
			<div class="filter-table">
				<?php
					$category_terms = array();
					$args = array(
						'hide_empty' => false,
					);
					$category_terms = get_terms( 'video-category', $args );

					if ( ! empty( $category_terms ) ) { ?>
						<select id="filter-table">
							<option value=""><?php esc_html_e( 'Category', 'awetube' ); ?></option>
						<?php foreach ( $category_terms as $category ) {

							echo '<option value="' . esc_attr( $category->name ) . '">' . esc_html( $category->name ) . '</option>';
						} ?>

						</select>
					<?php }
				?>
			</div>
		</div>
		<div class="tables-videos">
			<table id="tableVids" class="table table-striped table-bordered dataTable display responsive nowrap no-footer dtr-inline collapsed" style="width: 100%;">
				<thead>
					<tr>
						<th class="all"><?php esc_html_e( 'Video', 'awetube' ); ?></th>
						<th class="tablet-p tablet-l min-desktop category" style="width: 200px!important;"><?php esc_html_e( 'Categories', 'awetube' ); ?></th>
						<th class="min-desktop"><?php esc_html_e( 'Date', 'awetube' ); ?></th>
						<th class="min-desktop"><?php esc_html_e( 'Action', 'awetube' ); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
					$awetube_videos_args = array(
						'post_type'           => 'awetube-video',
						'posts_per_page'	  => -1,
						'ignore_sticky_posts' => true,
						'author'              => $current_id,
						'post_status'		  => array( 'pending', 'draft', 'future', 'publish' ),
					);
					$awetube_videos = new WP_Query( $awetube_videos_args );
					if ( $awetube_videos->have_posts() ) :
						while ( $awetube_videos->have_posts() ) :
							$awetube_videos->the_post();

							$video_url   = carbon_get_post_meta( get_the_ID(), 'awetube_video_url' );
							$video_embed = '';
							$video_file  = carbon_get_post_meta( get_the_ID(), 'awetube_video_file' );

							$video_file_url = wp_get_attachment_url( $video_file );

							$edit_link = home_url( 'edit-videos/' . $post->post_name );

							if ( !empty( $video_file_url ) ) {
								$video_attr = array(
									'src' => $video_file_url,
								);
							}

							if( has_post_thumbnail() ) {
								$video_poster = get_the_post_thumbnail_url( get_the_ID() );
							}
							elseif ( ! empty( $video_url ) ) {
								$img_vid_id = explode( '/', $video_url );
								if ( 'www.youtube.com' === $img_vid_id[2] || 'youtube.com' === $img_vid_id[2] || 'youtu.be' === $img_vid_id[2] ) {
									$video_poster = 'https://img.youtube.com/vi/' . esc_attr( $img_vid_id[3] ) . '/maxresdefault.jpg';
								}
							} elseif ( ! empty( $video_file ) ) {
								$video_poster = wp_get_attachment_url( $video_file );
							}
							else {
								$video_poster = '';
							} ?>
					<tr>
						<td>
							<div class="the-video">
								<div class="video-image">
									<img src="<?php echo esc_url($video_poster); ?>" alt="<?php echo the_title(); ?>">
								</div>
								<div class="video-meta">
									<h4 class="title">
										<?php echo the_title(); ?>
									</h4>
								</div>
							</div>
						</td>
						<td class="category"><div class="tags"><?php the_terms( $post->ID, 'video-category', '', '' ); ?></div></td>
						<td class="cat"><span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span></td>
						<td class="cat">
							<a href="<?php echo add_query_arg( array( 'post_id' => intval( $post->ID ), 'action' => 'edit' ), home_url( 'edit-video' ) ); ?>" class="btn btn-yellow"><i class="fa fa-edit"></i></a>
							<a href="<?php echo add_query_arg( array( 'post_id' => intval( $post->ID ), 'action' => 'delete' ), home_url( 'my-tube' ) ); ?>" class="btn btn-red" onclick="return confirm('<?php esc_html_e( 'Are you sure?', 'awetube' ); ?>')"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php 
wp_enqueue_script( 'bootstrap', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/bootstrap.min.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'dataTables', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/dataTables.min.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'dataTables-responsive', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/dataTables.responsive.min.js', array( 'jquery' ), '', false ); ?>

<script>
	jQuery(document).ready(function() {

		var table = jQuery('#tableVids').DataTable({
			responsive: true,
			bFilter: true, 
			bInfo: false,
			pagingType: "full_numbers",
			language: {
				'paginate': {
					'first': '‹‹',
					'last': '››',
					'previous': '‹',
					'next': '›'
				}
			}
		});

		jQuery('#filter-table').change( function() {
			var Val = jQuery(this).val();
			table.columns(1).search(Val, true, false).draw();
		} );
	} );
</script>

<?php wp_enqueue_script( 'choosen', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/choosen.min.js', array( 'jquery' ), '', false ); ?>
<?php wp_enqueue_script( 'tags', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/tags.js', array( 'jquery' ), '', false ); ?>
<?php wp_enqueue_script( 'form', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/jquery.form.js', array( 'jquery' ), '', false ); ?>

<?php 
wp_enqueue_script( 'bootstrap', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/bootstrap.min.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'dataTables', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/dataTables.min.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'dataTables-responsive', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/dataTables.responsive.min.js', array( 'jquery' ), '', false ); ?>

<script>
(function ($) {
	'use strict';
	jQuery(document).ready(function() {
		jQuery('form').on('change', '#awetube_video_file', function (event) {
			jQuery('.prog-vid').show();
			jQuery('.prog-vid .bar').width('0%');
			jQuery('.prog-vid .percent').html("0%");
			if(jQuery('#awetube_video_file').val()) {
				var fileSizeVideo = jQuery('#awetube_video_file')[0].files[0].size / 1024 / 1024;
				if(fileSizeVideo <= 500) {
					console.log(fileSizeVideo);
						event.preventDefault();
						jQuery('.prog-vid .percent').html('100%');
						jQuery('.prog-vid .bar').css({"width": "100%", "transition": "width "+fileSizeVideo*2+"s"});
					return false;
				} else {
					alert('File To Big');
				}
			}
		});

		jQuery('form').on('change', '#feat_thumb', function (event) {
			jQuery('.prog-thumb-desk').show();
			jQuery('.prog-thumb-desk .bar').width('0%');
			jQuery('.prog-thumb-desk .percent').html("0%");
			if(jQuery('#feat_thumb').val()) {
				var fileSizeVideoImg = jQuery('#feat_thumb')[0].files[0].size / 1024 / 1024;
				if(fileSizeVideoImg <= 500) {
					console.log(fileSizeVideoImg);
						event.preventDefault();
						jQuery('.prog-thumb-desk .percent').html("100%");
						jQuery('.prog-thumb-desk .bar').css({"width": "100%", "transition": "width "+fileSizeVideoImg*2+"s"});
					return false;
				} else {
					alert('File To Big');
				}
			}
		});
	});
})( jQuery );
</script>

<script>
(function ($) {
	'use strict';

	$(document).ready(function() {
		$(".chosen-select").chosen();
	});

	$(document).ready(function() {
		$(".chosen-tags").chosen();

		var data = <?php echo esc_html( $jsons ); ?>;
		$(".hide-for-mobile .main-input").autocomplete({
			source: data
		});

		$('#awetube_video_file').change(function(e) {
			var filesizeVideo = e.target.files[0].size / 1024 / 1024;
			if(filesizeVideo <= 500) {
				$('.form-group.vid_file .filename').remove();

				var filename = e.target.files[0].name;
				$('.form-group.vid_file').append("<span class='filename'><span>"+filename+'</span></span>');

				var span = $('.form-group.vid_file span.filename');

				span.on('click', function (e) {
					$('#awetube_video_file').val('');
					$('.form-group.vid_file .filename').remove();
					$('.prog-vid').hide();
					$('.prog-vid .bar').width('0%');
					$('.prog-vid .percent').html("0%");
				});
			}
		});

		$('#feat_thumb').change(function(e) {
			$('.feature-image .filename').remove();

			var filename = e.target.files[0].name;
			$('.feature-image .form-group').append("<span class='filename'><span>"+filename+'</span></span>');

			var span = $('.feature-image span.filename');

			span.on('click', function (e) {
				$('#feat_thumb').val('');
				$('.feature-image .filename').remove();
			});
		});

	});

	$('form').keydown(function (e) {
		if (e.keyCode == 13) {
			e.preventDefault();
			return false;
		}
	});

})( jQuery );
</script>

<script>
jQuery('.form-check-input').on('click', function () {
	var value = jQuery(this).val();

	if(value == 'option2') {
		jQuery('.vid_url').removeClass('show');
		jQuery('.vid_file').removeClass('show');
		jQuery('.vid_file').addClass('show');
	} else {
		jQuery('.vid_file').removeClass('show');
		jQuery('.vid_url').removeClass('show');
		jQuery('.vid_url').addClass('show');
	}

})

</script>

<?php
get_footer();

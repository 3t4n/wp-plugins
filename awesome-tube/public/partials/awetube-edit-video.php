<?php
$post_id = intval( $_GET['post_id'] );

if ( isset( $_POST['ispost'] ) || isset( $_POST['submitpost'] ) ) {
	global $current_user;
	get_currentuserinfo();

	$user_login     = $current_user->user_login;
	$user_email     = $current_user->user_email;
	$user_firstname = $current_user->user_firstname;
	$user_lastname  = $current_user->user_lastname;
	$user_id        = $current_user->ID;

	$post_title   = sanitize_text_field( $_POST['title'] );

	if(!empty($_FILES['feat_thumb']['name'])) {
		$post_feat_thumb = sanitize_text_field( $_FILES['feat_thumb']['name'] );
	}

	$feat_thumb   = $post_feat_thumb;
	$video_file   = sanitize_text_field( $_FILES['awetube_video_file']['name'] );
	$post_content = sanitize_text_field( $_POST['sample_content'] );
	//$video_file_key   = $_POST['_video_file'];

	$post_category = sanitize_text_field( $_POST['category'] );

	$category     = $post_category;
	$post_tags = sanitize_text_field( $_POST['tags-input'] );

	$tags_name = array();
	$tags_terms2 = get_the_terms( $_GET['post_id'], 'video-tags' );
	if(!empty($tags_terms2)){
		if(!is_wp_error( $tags_terms2 )){
			foreach($tags_terms2 as $term3){
				$tags_name[] = $term3->name;
			}
		}
	}

	$post_tags = sanitize_text_field( $_POST['tags-input'] );

	$tags         = $post_tags;
	$video_url    = sanitize_text_field( $_POST['awetube_video_url'] );
	//$video_url_key    = $_POST['_video_url'];

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
		'ID'            => $post_id,
		'post_title'    => $post_title,
		'post_content'  => $post_content,
		'post_type'     => 'awetube-video',
		'tax_input'    => array(
			'video-category' => $cats_tax,
			//'video-tags' => $tags_tax,
		),
	);

	wp_set_object_terms( $post_id, $tags_tax, 'video-tags' );

	$pid = wp_update_post( $new_post );
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

	if ( $pid ) {
		wp_redirect( home_url( '/my-tube' ) );
		exit;
	}

}

get_header();

wp_enqueue_style( 'choosen', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/css/choosen.min.css', array(), '', 'all' );

$edit_video_args = array(
	'p'         => $post_id, 
	'post_type' => 'awetube-video',
);
$edit_video = new WP_Query($edit_video_args);

if ( $edit_video->have_posts() ) :
	while ( $edit_video->have_posts() ) :
		$edit_video->the_post();

		$video_url = carbon_get_post_meta( get_the_ID(), 'awetube_video_url' );

		$category_id = array();
		$category_terms = get_the_terms( get_the_ID(), 'video-category' );
		if(!empty($category_terms)){
			if(!is_wp_error( $category_terms )){
				foreach($category_terms as $term){
					$category_id[] = $term->term_id;
				}
			}
		}

		$tags_id = array();
		$tags_terms = get_the_terms( get_the_ID(), 'video-tags' );
		if(!empty($tags_terms)){
			if(!is_wp_error( $tags_terms )){
				foreach($tags_terms as $term2){
					$tags_id[] = $term2->term_id;
				}
			}
		}
?>
<div class="content-wrapper form-page form-page modal">
	<div class="container-form">
		<form class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
			<div class="row clearfix">
				<div class="column column-1">
					<div class="upload-video-wrap">
						<div class="page-header-form-modal">
							<h3 class="page-title"><?php esc_html_e( 'Edit Video', 'awetube' ); ?></h3>
							<a href="<?php echo esc_url( home_url( 'my-tube' ) ); ?>" class="close-modal"><span></span></a>
						</div>
						<input type="hidden" name="ispost" value="1" />
						<input type="hidden" name="userid" value="" />

						<div class="form-group form-check">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" <?php if(!empty($video_url)) { ?>checked <?php } ?>>
								<label class="form-check-label" for="inlineRadio1"><?php esc_html_e( 'Video From Youtube/Vimeo', 'awetube' ); ?></label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" <?php if(empty($video_url)) { ?>checked <?php } ?>>
								<label class="form-check-label" for="inlineRadio2"><?php esc_html_e( 'Upload your own Video', 'awetube' ); ?></label>
							</div>
						</div>

						<div class="form-group <?php if(!empty($video_url)) { ?> show<?php } ?> vid_url">
							<label class="control-label"><?php esc_html_e( 'Video Url', 'awetube' ); ?> <span class="mandatory">*</span></label>
							<input type="text" class="form-control" name="awetube_video_url" value="<?php echo esc_html( $video_url ); ?>" />
						</div>

						<div class="form-group">
							<label class="control-label"><?php esc_html_e( 'Video Title', 'awetube' ); ?> <span class="mandatory">*</span></label>
							<input type="text" class="form-control" name="title" value="<?php the_title(); ?>" />
						</div>

						<div class="form-group <?php if(empty($video_url)) { ?> show<?php } ?> vid_file">
							<label class="control-label"><?php esc_html_e( 'Upload your own video', 'awetube' ); ?></label>
							<input type="file" name="awetube_video_file" class="form-control" id="video_file" accept="video/*"/>
							<label for="video_file" class="add-file-wrap">
								<span class="icon-add"><i class="awetube-icon-plus"></i></span>
								<div class="text-add">
									<span><?php esc_html_e( 'Add your video File', 'awetube' ); ?></span>
								</div>
							</label>
						</div>

						<div class="form-group">
							<label class="control-label"><?php esc_html_e( 'Description', 'awetube' ); ?> <span class="mandatory">*</span></label>
							<?php 
								$content = get_the_content('', false, get_the_ID());
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
									<div class="feature-gambar">
									<?php 
									if( has_post_thumbnail() ) { 
										the_post_thumbnail();
									}
									?>
									</div>
									<span class="icon-add"><i class="awetube-icon-plus"></i></span>
									<div class="text-add">
										<span><?php esc_html_e( 'Change Your Video Thumbnail', 'awetube' ); ?></span>
									</div>
								</label>
							</div>
						</div>

						<div class="form-group">
							<?php
							$tags_terms = array();
							$args = array(
								'hide_empty' => false,
							);
							$category_terms = get_terms( 'video-category', $args );

							if ( ! empty( $category_terms ) ) {
								echo '<label class="control-label">'.esc_html__("Select Category", 'awetube').' <span class="mandatory">*</span></label>';
								echo '<select name="category[]" class="form-control chosen-select" data-placeholder="Choose a Category..." multiple>';

								foreach ( $category_terms as $category ) {

									if( in_array($category->term_id, $category_id) ) {
										$class_select = 'selected';
									} else {
										$class_select = '';
									}

									echo '<option value="' . esc_attr( $category->term_id ) . '" ' . esc_attr( $class_select ) . '>' . esc_html( $category->name ) . '</option>';
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

								echo '<label class="control-label">' . esc_html__("Select Tags", 'awetube') . '</label>'; ?>

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

wp_enqueue_style( 'datatables', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/css/datatables.min.css', array(), '', 'all' ); ?>

<div class="content-wrapper profile-page dashboard-page">
	<div class="awesome-tube-container">
		<div class="profile-account clearfix">
			<div class="image-author">
			<?php 
				$user_img = wp_get_attachment_image_src( get_user_meta($current_id,'_user_img', array('150','150'), true, true ));
				if(!empty($user_img)) { ?>
					<img class="profile_img" src="<?php echo esc_url( $user_img[0] ); ?>" alt="<?php echo esc_attr( $display_name ); ?>">
				<?php }
				else {
					echo get_avatar( $current_id, 150 );
				} ?>
			</div>
			<div class="profile-author">
				<h2 class="name-user"><?php echo esc_html( $display_name ); ?></h2>
				<span><?php echo esc_html( $user_date_created->user_description ); ?></span>
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
<?php wp_enqueue_script( 'form', plugin_dir_url('README.txt') . AWETUBE_PLUGIN_NAME . '/public/js/jquery.form.js', array( 'jquery' ), '', false ); ?>
<script>
jQuery(document).ready(function() {
    jQuery('form').on('change', '#video_file', function (event) {
		jQuery('.prog-vid').show();
		jQuery('.prog-vid .bar').width('0%');
		jQuery('.prog-vid .percent').html("0%");
	  	if(jQuery('#video_file').val()) {
	  		var fileSizeVideo = jQuery('#video_file')[0].files[0].size / 1024 / 1024;
	  		if(fileSizeVideo <= 500) {
		  		//console.log(fileSizeVideo);
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
		  		//console.log(fileSizeVideoImg);
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
</script>
<script>
(function ($) {
	'use strict';

	$(document).ready(function() {
		$(".chosen-select").chosen({
			display_selected_options: true,
			include_group_label_in_selected: true,
		});

		var data = <?php echo esc_html( $jsons ); ?>;
		$(".main-input").autocomplete({
			source: data
		});
	});

	$(document).ready(function() {
		$(".chosen-tags").chosen();
	});

})( jQuery );
</script>

<script>
function returnformValidations()
{
	var title = document.getElementById("title").value;
	var content = document.getElementById("content").value;
	var category = document.getElementById("category").value;

	if(title=="")
	{
		alert("Please enter post title!");
		return false;
	}
	if(content=="")
	{
		alert("Please enter post content!");
		return false;
	}
	if(category=="")
	{
		alert("Please choose post category!");
		return false;
	}
}

		jQuery('#feat_thumb').change(function(e) {
			jQuery('.feature-image .filename').remove();
	        var filename = e.target.files[0].name;
	        jQuery('.feature-image .form-group').append("<span class='filename'><span>"+filename+'</span></span>');

	       	var span = jQuery('.feature-image span.filename');

			span.on('click', function (e) {
		        jQuery('#feat_thumb').val('');
		        jQuery('.feature-image .filename').remove();
		        jQuery(".feature-gambar").empty();
			});

			if(e.target.files[0]) {
				var reader = new FileReader();
			      reader.onload = imageIsLoaded;
			      reader.readAsDataURL(e.target.files[0]);
			}
	    });

	    function imageIsLoaded(e) {
	    	var x = 'foo';
	    	var picture = '<img src="' + e.target.result + '" style="width:100%;height:200px;object-fit:cover;" class="' + x + 'thImage">'
	    	jQuery(".feature-gambar").empty().append(picture);
	  	}


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

});
</script>

<script>
[].forEach.call(document.getElementsByClassName('tags-input'), function (el) {
    let hiddenInput = document.createElement('input'),
        mainInput = document.createElement('input'),
        tags = <?php echo esc_html( $json ); ?>;
		tagsid = <?php echo esc_html( $jsons ); ?>;
    
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', el.getAttribute('data-name')+"[]");

    mainInput.setAttribute('type', 'text');
    mainInput.classList.add('main-input');
    mainInput.addEventListener('input', function () {
        let enteredTags = mainInput.value.split(',');
        if (enteredTags.length > 1) {
            enteredTags.forEach(function (t) {
                let filteredTag = filterTag(t);
                if (filteredTag.length > 0)
                    addTag(filteredTag);
            });
            mainInput.value = '';
        }
    });

    mainInput.addEventListener('keydown', function (e) {
        let keyCode = e.which || e.keyCode;
        if (keyCode === 8 && mainInput.value.length === 0 && tags.length > 0) {
            removeTag(tags.length - 1);
        }

       if (keyCode === 13 && mainInput.value.length > 0 && tags.length > 0) {
             addTag(mainInput.value);
             mainInput.value ="";
        }

    });

    el.appendChild(mainInput);
    el.appendChild(hiddenInput);

	<?php 
	$inte = 0;
	foreach($tag_terms as $tags) {
		if( in_array($tags->term_id, $tags_id) ) {
		$inter = $inte++; ?>
        let tagr<?php echo intval( $inter ); ?> = {
            text: "<?php echo esc_html( $tags->slug ); ?>",
            element: document.createElement('span'),
        };
		let tagrid<?php echo intval( $inter ); ?> = {
            text: "<?php echo esc_html( $tags->slug ); ?>",
        };

        tagr<?php echo intval( $inter ); ?>.element.classList.add('tag');
        tagr<?php echo intval( $inter ); ?>.element.textContent = tagr<?php echo intval( $inter ); ?>.text;

        let closeBtn<?php echo intval( $inter ); ?> = document.createElement('span');
        closeBtn<?php echo intval( $inter ); ?>.classList.add('close');
        closeBtn<?php echo intval( $inter ); ?>.addEventListener('click', function () {
            removeTag(tags.indexOf(tagr<?php echo intval( $inter ); ?>));
        });
        tagr<?php echo intval( $inter ); ?>.element.appendChild(closeBtn<?php echo intval( $inter ); ?>);

        tags.push(tagr<?php echo intval( $inter ); ?>);
		tagsid.push(tagrid<?php echo intval( $inter ); ?>);

        el.insertBefore(tagr<?php echo intval( $inter ); ?>.element, mainInput);
	<?php }
	}
	
	if(!empty($tags_id)) { ?>
		let tagsList = [];

        tagsid.forEach(function (t) {
            tagsList.push(t.text);
        });
        hiddenInput.value = tagsList.join(',');
	<?php } ?>

    function addTag (text) {
        let tag = {
            text: text,
            element: document.createElement('span'),
        };

        tag.element.classList.add('tag');
        tag.element.textContent = tag.text;

        let closeBtn = document.createElement('span');
        closeBtn.classList.add('close');
        closeBtn.addEventListener('click', function () {
            removeTag(tags.indexOf(tag));
        });
        tag.element.appendChild(closeBtn);

        tags.push(tag);

        el.insertBefore(tag.element, mainInput);

        refreshTags();
    }

    function removeTag (index) {
        let tag = tags[index];
        tags.splice(index, 1);
        el.removeChild(tag.element);
        refreshTags();
    }

    function refreshTags () {
        let tagsList = [];
        tags.forEach(function (t) {
            tagsList.push(t.text);
        });
        hiddenInput.value = tagsList.join(',');
    }

    function filterTag (tag) {
        return tag.replace(/[^\w -]/g, '').trim().replace(/\W+/g, '-');
    }
});
</script>
<script>
[].forEach.call(document.getElementsByClassName('tags-input-mobile'), function (el) {
    let hiddenInput = document.createElement('input'),
        mainInput = document.createElement('input'),
        tags = <?php echo esc_html( $json ); ?>;
		tagsid = <?php echo esc_html( $jsons ); ?>;
    
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', el.getAttribute('data-name')+"[]");

    mainInput.setAttribute('type', 'text');
    mainInput.classList.add('main-input');
    mainInput.addEventListener('input', function () {
        let enteredTags = mainInput.value.split(',');
        if (enteredTags.length > 1) {
            enteredTags.forEach(function (t) {
                let filteredTag = filterTag(t);
                if (filteredTag.length > 0)
                    addTag(filteredTag);
            });
            mainInput.value = '';
        }
    });

    mainInput.addEventListener('keydown', function (e) {
        let keyCode = e.which || e.keyCode;
        if (keyCode === 8 && mainInput.value.length === 0 && tags.length > 0) {
            removeTag(tags.length - 1);
        }

       if (keyCode === 13 && mainInput.value.length > 0 && tags.length > 0) {
             addTag(mainInput.value);
             mainInput.value ="";
        }

    });

    el.appendChild(mainInput);
    el.appendChild(hiddenInput);

	<?php 
	$inte = 0;
	foreach($tag_terms as $tags) {
		if( in_array($tags->term_id, $tags_id) ) {
		$inter = $inte++; ?>
        let tagr<?php echo intval( $inter ); ?> = {
            text: "<?php echo esc_html( $tags->slug ); ?>",
            element: document.createElement('span'),
        };
		let tagrid<?php echo intval( $inter ); ?> = {
            text: "<?php echo esc_html( $tags->slug ); ?>",
        };

        tagr<?php echo intval( $inter ); ?>.element.classList.add('tag');
        tagr<?php echo intval( $inter ); ?>.element.textContent = tagr<?php echo intval( $inter ); ?>.text;

        let closeBtn<?php echo intval( $inter ); ?> = document.createElement('span');
        closeBtn<?php echo intval( $inter ); ?>.classList.add('close');
        closeBtn<?php echo intval( $inter ); ?>.addEventListener('click', function () {
            removeTag(tags.indexOf(tagr<?php echo intval( $inter ); ?>));
        });
        tagr<?php echo intval( $inter ); ?>.element.appendChild(closeBtn<?php echo intval( $inter ); ?>);

        tags.push(tagr<?php echo intval( $inter ); ?>);
		tagsid.push(tagrid<?php echo intval( $inter ); ?>);

        el.insertBefore(tagr<?php echo intval( $inter ); ?>.element, mainInput);
	<?php }
	}
	
	if(!empty($tags_id)) { ?>
		let tagsList = [];

        tagsid.forEach(function (t) {
            tagsList.push(t.text);
        });
        hiddenInput.value = tagsList.join(',');
	<?php } ?>

    function addTag (text) {
        let tag = {
            text: text,
            element: document.createElement('span'),
        };

        tag.element.classList.add('tag');
        tag.element.textContent = tag.text;

        let closeBtn = document.createElement('span');
        closeBtn.classList.add('close');
        closeBtn.addEventListener('click', function () {
            removeTag(tags.indexOf(tag));
        });
        tag.element.appendChild(closeBtn);

        tags.push(tag);

        el.insertBefore(tag.element, mainInput);

        refreshTags();
    }

    function removeTag (index) {
        let tag = tags[index];
        tags.splice(index, 1);
        el.removeChild(tag.element);
        refreshTags();
    }

    function refreshTags () {
        let tagsList = [];
        tags.forEach(function (t) {
            tagsList.push(t.text);
        });
        hiddenInput.value = tagsList.join(',');
    }

    function filterTag (tag) {
        return tag.replace(/[^\w -]/g, '').trim().replace(/\W+/g, '-');
    }
});
</script>

		<?php
	endwhile;
endif;
get_footer();

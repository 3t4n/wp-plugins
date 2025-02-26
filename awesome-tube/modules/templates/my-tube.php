<?php
/**
 * My Tube
 *
 * @package Awetube/Modules/Templates
 * @version 1.0.0
 */
defined( 'ABSPATH' ) || exit;

if(isset($_GET['action']) == 'delete') {
	$post_id = intval( $_GET['post_id'] );
	wp_delete_post($post_id);

	wp_redirect( home_url( '/myaccount' ) );
	exit;
}

get_header();

$logo_id    = get_theme_mod( 'custom_logo' );
$logo_image = wp_get_attachment_image_src( $logo_id, 'full' );

//register get link
$page = get_page_by_title('register');

global $wp;
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

$user_social1 = '';
$user_social2 = '';
$user_social3 = '';
$user_social4 = '';

$awetube_fake_count = '';

wp_enqueue_style( 'datatables', plugin_dir_url( 'README.txt' ) . AWETUBE_PLUGIN_NAME . '/public/css/datatables.min.css', array(), '', 'all' ); ?>

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
				<span><?php echo esc_html($user_date_created->user_description); ?></span>
				<div class="social-author">
					<ul>
						<?php if(!empty($user_social1)) { ?>
						<li>
							<a href="<?php echo esc_url($user_social1); ?>"><i class="awetube-icon-instagram"></i></a>
						</li>
						<?php } 
						if (!empty($user_social3)) { ?>
						<li>
							<a href="<?php echo esc_url($user_social3); ?>"><i class="awetube-icon-twitter"></i></a>
						</li>
						<?php }
						if(!empty($user_social2)) { ?>
						<li>
							<a href="<?php echo esc_url($user_social2); ?>"><i class="awetube-icon-social-facebook"></i></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="button-profile-wrap">
				<a href="<?php echo home_url( 'awetube-upload' ); ?>" class="upload-button"><i class="awetube-icon-video-camera"></i> <?php esc_html_e( 'Upload', 'awetube' ); ?></a>
				<a href="<?php echo home_url( 'awetube-profile' ); ?>" class="edit-profile"><?php esc_html_e( 'Edit Profile', 'awetube' ); ?></a>
				<a href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>" class="edit-profile logout-btn"><?php esc_html_e( 'Logout', 'awetube' ); ?></a>
			</div>
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
						<th class="tablet-l min-desktop category"><?php esc_html_e( 'Categories', 'awetube' ); ?></th>
						<th class="min-desktop"><?php esc_html_e( 'Date', 'awetube' ); ?></th>
						<th class="min-desktop"><?php esc_html_e( 'Status', 'awetube' ); ?></th>
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

							$video_url   = carbon_get_post_meta( get_the_ID(), 'video_url' );
							$video_embed = '';
							$video_file  = carbon_get_post_meta( get_the_ID(), 'video_file' );

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
							else {
								$video_poster = '';
							} ?>
					<tr>
						<td>
							<div class="the-video">
								<?php if( has_post_thumbnail() ) { ?>
								<div class="video-image">
									<img src="<?php echo esc_url($video_poster); ?>" alt="<?php echo the_title(); ?>">
								</div>
								<?php } ?>
								<div class="video-meta">
									<h4 class="title">
										<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
									</h4>
								</div>
							</div>
						</td>
						<td class="category"><div class="tags"><?php the_terms( $post->ID, 'video-category', '', '' ); ?></div></td>
						<td class="cat"><span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span></td>
						<td class="status">
							<?php if(get_post_status() == 'publish') { ?>
							<span class="status green"><?php esc_html_e('Publish'); ?></span>
							<?php } elseif (get_post_status() == 'pending') { ?>
							<span class="status"><?php esc_html_e('Under Review'); ?></span>
							<?php } ?>
						</td>
						<td class="cat">
							<a href="<?php echo add_query_arg( array( 'post_id' => intval( $post->ID ), 'action' => 'edit' ), home_url( 'awetube-edit-video' ) ); ?>" class="btn btn-yellow"><i class="awetube-icon-compose"></i></a>
							<a href="<?php echo add_query_arg( array( 'post_id' => intval( $post->ID ), 'action' => 'delete' ), home_url( 'myaccount' ) ); ?>" class="btn btn-red" onclick="return confirm('Are you sure?')"><i class="awetube-icon-trash"></i></a>
						</td>
					</tr>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php 
wp_enqueue_script( 'bootstrap', plugin_dir_url( 'README.txt' ) . AWETUBE_PLUGIN_NAME . '/public/js/bootstrap.min.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'dataTables', plugin_dir_url( 'README.txt' ) . AWETUBE_PLUGIN_NAME . '/public/js/dataTables.min.js', array( 'jquery' ), '', false );
wp_enqueue_script( 'dataTables-responsive', plugin_dir_url( 'README.txt' ) . AWETUBE_PLUGIN_NAME . '/public/js/dataTables.responsive.min.js', array( 'jquery' ), '', false ); ?>

<script>
	jQuery(document).ready(function() {

		var table = jQuery('#tableVids').DataTable({
			responsive: true,
			bFilter: true, 
			bInfo: false,
			pagingType: "full_numbers",
			columnDefs : [{"targets":2, "type":"date-eu"}],
			order: [2, 'desc'],
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

<?php

get_footer();

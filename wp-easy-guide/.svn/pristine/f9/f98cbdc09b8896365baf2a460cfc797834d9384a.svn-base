<?php
/**
 * Template part for displaying "about" page content
 *
 * @package WPEG_Admin
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<div class="wrap wpeg-page wpeg-about">
	<div class="wpeg-about-wrapper">
		<div class="wpeg-about-header">
			<div class="wpeg-about-header__title">
				<img class="wpeg-icon-logo" src="<?php echo esc_attr( WPEG_PLUGIN_URL . 'assets/img/logo-icon.png' ); ?>" alt="">
				<h3><?php echo esc_html__( 'Getting Started', 'wpeg' ); ?></h3>
			</div>
		</div>

		<div class="wpeg-about-container">
			<div class="wpeg-about-content">
				<img src="<?php echo esc_attr( WPEG_PLUGIN_URL . 'assets/img/logo-base.png' ); ?>" alt="">
			<!-- <h3><?php echo esc_html__( 'Welcome to WP EasyGuide', 'wpeg' ); ?></h3> -->
				<p>
					<?php echo esc_html__( 'We recommends you to watch this 4 minutes video of "Getting Started with WP EasyGuide". Let\'s create your first guide using WP EasyGuide.', 'wpeg' ); ?>
				</p>
			</div>
			<div class="wpeg-about-video-wrapper">
				<div data-youtube-id="oJP1lwuJrow" class="video-banner js-trigger-video-modal">
					<img src="http://i.ytimg.com/vi/oJP1lwuJrow/maxresdefault.jpg">
					<span class="btn-video">
						<svg height="50px" version="1.1" viewBox="0 0 68 48" width="100%"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#212121" fill-opacity="0.8"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
					</span>
				</div>
			</div>
			<div class="wpeg-about-buttons">
				<a class="button button-primary button-hero" onclick="void(WPEG && WPEG.viewGuide('plugin/wpeg/create-post'));return false;">Create Your First Guide</a>
				<a class="button button-secondary button-hero" id="view" href="https://www.youtube.com/channel/UCg5Qd0ao0q9XrBlTLuDtvCA" target="_blank">View More Videos</a>
			</div>
		</div>
	</div>

	<!-- Video Modal -->
	<section class="video-modal">
		<div id="video-modal-content" class="video-modal-content">
			<iframe id="youtube" width="100%" height="100%" frameborder="0" allowfullscreen src=""></iframe>
			<a href="#" class="close-video-modal">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" width="24" height="24">
					<g id="icon-x-close">
						<path fill="#ffffff" d="M30.3448276,31.4576271 C29.9059965,31.4572473 29.4852797,31.2855701 29.1751724,30.980339 L0.485517241,2.77694915 C-0.122171278,2.13584324 -0.104240278,1.13679247 0.52607603,0.517159487 C1.15639234,-0.102473494 2.17266813,-0.120100579 2.82482759,0.477288136 L31.5144828,28.680678 C31.9872448,29.1460053 32.1285698,29.8453523 31.8726333,30.4529866 C31.6166968,31.0606209 31.0138299,31.4570487 30.3448276,31.4576271 Z" id="Shape"></path>
						<path fill="#ffffff" d="M1.65517241,31.4576271 C0.986170142,31.4570487 0.383303157,31.0606209 0.127366673,30.4529866 C-0.12856981,29.8453523 0.0127551942,29.1460053 0.485517241,28.680678 L29.1751724,0.477288136 C29.8273319,-0.120100579 30.8436077,-0.102473494 31.473924,0.517159487 C32.1042403,1.13679247 32.1221713,2.13584324 31.5144828,2.77694915 L2.82482759,30.980339 C2.51472031,31.2855701 2.09400353,31.4572473 1.65517241,31.4576271 Z" id="Shape"></path>
					</g>
				</svg>
			</a>
		</div>
		<div class="overlay"></div>
	</section>

</div>

<script>
	let $j = jQuery.noConflict();

	$j(document).ready(function() {
		
		function toggle_video_modal() {
			$j('.js-trigger-video-modal').on('click', function(e) {
				e.preventDefault();

				let id = $j(this).attr('data-youtube-id');
				let autoplay = '?autoplay=1';
				let related_no = '&rel=0';
				let src = '//www.youtube.com/embed/' + id + autoplay + related_no;

				$j('#youtube').attr('src', src);

				$j("body").addClass("show-video-modal noscroll");
			});

			function close_video_modal() {
				event.preventDefault();
				$j("body").removeClass("show-video-modal noscroll");
				$j("#youtube").attr('src', '');
			}

			$j('body').on('click', '.close-video-modal, .video-modal .overlay', function(event) {
				close_video_modal();
			});
		}
		toggle_video_modal();
	});

</script>

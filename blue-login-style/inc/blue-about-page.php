<?php 
/**
 * Blue Login Themes about page
 */
 
	add_filter('get_avatar', 'blue_login_remove_photo_class');
	function blue_login_remove_photo_class($avatar) {
		return str_replace(' photo', ' gravatar', $avatar);
	}

	function blue_login_about_page()
	{
?>
	<style>
	.blue-badge{
		background: url('<?php echo plugins_url('/assets/images', dirname(__FILE__)); ?>/blue-login-theme.png') no-repeat scroll center 24px / 95px 95px #0074A2;
		color: #78C8E6;
		font-size: 14px;
		text-align: center;
		font-weight: 600;
		margin: 5px 0px 0px;
		padding-top: 120px;
		height: 40px;
		display: inline-block;
		width: 150px;
		text-rendering: optimizelegibility;
		box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.2);
	}
	<?php if(is_rtl()): ?>
	.about-wrap .blue-badge {
		position: absolute;
		top: 0px;
		left: 0px;
	}
	<?php else: ?>
	.about-wrap .blue-badge {
		position: absolute;
		top: 0px;
		right: 0px;
	}
	<?php endif; ?>
	</style>

	<div class="wrap about-wrap">

		<h1><?php echo _e('Welcome to Blue Login Themes','alimir') . ' ' . blue_login_get_version(); ?></h1>

		<div class="about-text"><?php echo _e('Thanks for choosing Blue Login Themes! This version is our leanest and most powerful version yet.', 'alimir'); ?></div>
		<div class="blue-badge"><?php echo _e('Version','alimir') . ' ' . blue_login_get_version(); ?></div>

		<h2 class="nav-tab-wrapper">
			<a class="nav-tab <?php if(!isset($_GET["credit"])) echo 'nav-tab-active'; ?>" href="admin.php?page=about-blue-login"><?php echo _e('Getting Started','alimir'); ?></a> 
			<a class="nav-tab <?php if(isset($_GET["credit"])) echo 'nav-tab-active'; ?>" href="admin.php?page=about-blue-login&amp;credit=true"><?php echo _e('Credits','alimir'); ?></a> 
			<a target="_blank" class="nav-tab" href="http://wordpress.org/support/plugin/blue-login-style"><?php echo _e('Support','alimir'); ?></a> 
			<a target="_blank" class="nav-tab" href="http://wordpress.org/support/view/plugin-reviews/blue-login-style"><?php echo _e('Reviews','alimir'); ?></a> 
			<a target="_blank" class="nav-tab" href="http://preview.alimir.ir/contact/"><?php echo _e('Contact','alimir'); ?></a> 		
		</h2>
		
		<?php if(!isset($_GET["credit"])): ?>

		<div class="changelog">
			<h2 class="about-headline-callout"><?php echo _e('Welcome to the Blue Login Themes', 'alimir'); ?></h2>
			<img class="about-overview-img" src="<?php echo plugins_url('/assets/images', dirname(__FILE__)); ?>/blue-login-banner.png" alt="WP ULike" />
			<p class="about-description"><?php _e('Blue Login Themes is a tiny WordPress plugin that allows you to customize your login page with beautiful themes. Its features: ability to add message, change the login logo, ability to set login, logout and register redirect links and many more...', 'alimir'); ?></p>
		</div>
		
		<hr />
		
		<div class="changelog">
			<h2 class="about-headline-callout"><?php echo _e('Novelty Of Blue Login Themes','alimir'); ?></h2>

			<div class="feature-section col two-col">
				<div>
					<h4><?php echo _e('New Switch Theme Panel','alimir'); ?></h4><br />
					<img style="width:90%" src="<?php echo plugins_url('/assets/images', dirname(__FILE__)); ?>/changelog/first.jpg" alt="WP ULike" />
				</div>

				<div class="last-feature">
					<h4><?php echo _e('New Setting Panel','alimir'); ?></h4><br />
					<img style="width:90%" src="<?php echo plugins_url('/assets/images', dirname(__FILE__)); ?>/changelog/second.jpg" alt="WP ULike" />
				</div>
			</div>

		</div>

		<?php else: ?>
		
		<p class="about-description"><?php echo _e('Blue Login Themes is created by many love and time. Enjoy it :)','alimir'); ?></p>	
		<h4 class="wp-people-group"><?php echo _e('Project Leaders','alimir'); ?></h4>
		<ul class="wp-people-group">
			<li class="wp-person" id="wp-person-alimirzaei">
				<a href="http://about.alimir.ir"><?php echo get_avatar( 'info@alimir.ir', 64 ); ?></a>
				<a class="web" href="https://profiles.wordpress.org/alimir/">Ali Mirzaei</a>
				<span class="title"><?php echo _e('Project Lead & Developer','alimir'); ?></span>
			</li>					
		</ul>
			
		<h4 class="wp-people-group"><?php _e('Translations','alimir'); ?></h4>
		<ul>
		<li>English</li>
		<li>Persian</li>
		</ul>

		<h4 class="wp-people-group"><?php _e('Like this plugin?','alimir'); ?></h4>
		<p><strong><?php _e('Show your support by Rating 5 Star in <a href="http://wordpress.org/plugins/blue-login-style/"> Plugin Directory reviews</a>','alimir'); ?></strong></p>
		
		<?php endif; ?>
							
	</div>
	<?php
	}
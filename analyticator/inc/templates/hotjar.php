<div id="seventhemeswrapper">
	<div class="container">
		<div class="analyticator-header row">
			<div class="col-6">
				<h1>Analyticator</h1>
			</div>
			<div class="col-6">
				<!-- <ul class="social-links">
					<li>
						<a href="https://www.youtube.com/channel/UCVFVYTQ8f3vMiVhOAIc7cFA" target="_Blank"><i class="fa fa-youtube"></i></a>
					</li>
					<li>
						<a href="http://www.facebook.com/brainythemes"><i class="fa fa-facebook" target="_Blank"></i></a>
					</li>
				</ul> -->
			</div>
		</div>
		<div class="row analyticator-body">
			<div class="col-12">
				<?php settings_errors(); ?>
				<h2>Hotjar</h2>
				<p><?php echo __( 'Don\'t you have a Hotjar account?', 'analyticator' ); ?> <a href="http://hotjar.com" target="_Blank"><?php echo __( 'Click Here', 'analyticator' ); ?></a> <?php echo __( 'for create a free one.', 'analyticator' ); ?></p>
				

			    <form method="post" action="options.php">
				    <?php
				    	settings_fields( 'analyticator-hotjar-group' );
				        do_settings_sections( 'analyticator-hotjar' );
				        submit_button();  
				    ?>          
				</form>
			</div>
		</div>
		<div class="row analyticator-footer">
			<div class="col-12">
				<p class="text-center">
					<a href="https://marcelloruoppolo.com/" class="analyticator-brand" target="_Blank">
						/marcello<span>ruoppolo</span>
					</a>
				</p>
			</div>
		</div>
	</div>
</div>
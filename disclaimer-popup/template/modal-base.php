
<?php echo get_the_content(); ?>
<p class="wpdp-footer">
	<span id="wpdp-close"><?php echo $agreeText; ?></span>
	<?php if ( $deplineText ) { ?>
		<a href="<?php echo $deplineUrl; ?>" id="wpdp-decline"><?php echo $deplineText; ?></a>
	<?php }	?>
</p>


<script>
	jQuery('#wpdp-close').click(function($) { 
		Cookies.set('wp-disclamer-popup', 'allow', { 
			expires: <?php echo $expire; ?> 
		}); 
	});
</script>
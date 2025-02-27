
	<div
		<?php echo (isset($_REQUEST['hide_footer']) ? ' style="display:none"' : ''); ?> 
		<?php if($_REQUEST['mode'] == 'waiver') { echo ' style="display:none"'; }; ?>
	>

		<div id="rezgo-seal-refid-container">
			<?php if (!REZGO_WORDPRESS) { ?>
				<?php if ( $_SERVER['SCRIPT_NAME'] == '/page_book.php' || $_SERVER['SCRIPT_NAME'] == '/page_payment.php' || $_SERVER['SCRIPT_NAME'] == '/gift_card.php' ) { ?>
					<div id="rezgo-secure-seal">
						<div id="trustwave-seal"><script type="text/javascript" referrerpolicy="origin" src="https://seal.securetrust.com/seal.js?style=invert"></script></div>
					</div>
				<?php } ?> 
			<?php } ?> 
			<?php if ($site->exists($site->refid) || isset($_COOKIE['rezgo_refid_val'])) { ?>
				<div id="rezgo-refid">
					RefID: <?php echo ($site->exists($site->refid)) ? esc_html($site->refid) : esc_html($_COOKIE['rezgo_refid_val']); ?>
				</div>
			<?php } ?>
		</div>

		<?php if (!REZGO_WORDPRESS) { ?>
			<?php if ($_SERVER['SCRIPT_NAME'] != '/modal.php' && !$_REQUEST['headless']) { ?>
				<div style="float:right;height:auto;margin:10px;display:table;">
					<div style="display:table-cell;vertical-align:bottom;">
						<div style="font-size:24px;">
							<a href="http://www.rezgo.com/features/online-booking/" title="Powering Tour and Activity Businesses Worldwide" style="color:#333;text-decoration:none;" target="_blank">
								<span style="display:inline-block;width:65px;height:65px;text-indent:-9999px;margin-left:4px;background:url(<?php echo $site->path; ?>/img/rezgo-logo.svg) no-repeat; background-size:contain;">Rezgo</span>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
		
	</div>
</body>

<script>

    <?php
    if (isset($_SESSION['debug'])) {
        echo '// output debug to console'."\n\n";
        foreach ($_SESSION['debug'] as $debug) {
			$debug = str_replace('"', "", $debug);
            echo "window.console.log('".$debug."'); \n";
        }
        unset($_SESSION['debug']);
    }
    ?>
	
</script>

</html>
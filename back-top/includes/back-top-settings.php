<?php
function show_back_top_function() {?>
	<?php if (cs_get_option('bt_enable_disable')): ?>
	  	<!-- Scroll Top Start -->
	    <div class="scroll-top">
	    	<?php if (cs_get_option('bt_text_icon')): ?>
	        <i class="<?php echo cs_get_option( 'bt_icon' );?>"></i>
	        <?php else :?>
	        <?php echo cs_get_option( 'bt_text_label' );?>	
	        <?php endif; ?>
	    </div>
	    <!-- Scroll Top End --> 
    <?php endif; ?>
<?php
}
add_action( 'wp_footer', 'show_back_top_function' );
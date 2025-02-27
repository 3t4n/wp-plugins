<?php

$support_url = rew_has_pro() ? 'https://help.codexpert.io/?utm_source=dashboard&utm_medium=settings&utm_campaign=helpbtn' : 'https://wordpress.org/support/plugin/restrict-elementor-widgets/';

$args = [
	'rew_faq'		=> __( 'FAQ', 'restrict-elementor-widgets' ),
	'rew_support'	=> __( 'Ask Support', 'restrict-elementor-widgets' ),
];
$tab_links = apply_filters( 'rew_help_tab_link', $args );

echo "<div class='rew_tab_btns'>";
echo "<ul class='rew_help_tablinks'>";

$count 	= 0;
foreach ( $tab_links as $id => $tab_link ) {
	$active = $count == 0 ? 'active' : '';
	echo "<li class='rew_help_tablink {$active}' id='{$id}'>{$tab_link}</li>";
	$count++;
}

echo "</ul>";
echo "</div>";
?>

<div id="rew_faq_content" class="rew_tabcontent active">
	 <div class='wrap'>
	 	<div id='restrict-elementor-widgets-helps'>
	    <?php

	    $helps = get_option( 'restrict-elementor-widgets-docs-json', [] );
		$utm = [ 'utm_source' => 'dashboard', 'utm_medium' => 'settings', 'utm_campaign' => 'faq' ];
	    if( is_array( $helps ) ) :
	    foreach ( $helps as $help ) {
	    	$help_link = add_query_arg( $utm, $help['link'] );
	        ?>
	        <div id='restrict-elementor-widgets-help-<?php echo $help['id']; ?>' class='restrict-elementor-widgets-help'>
	            <h2 class='restrict-elementor-widgets-help-heading' data-target='#restrict-elementor-widgets-help-text-<?php echo $help['id']; ?>'>
	                <a href='<?php echo $help_link; ?>' target='_blank'>
	                <span class='dashicons dashicons-admin-links'></span></a>
	                <span class="heading-text"><?php echo $help['title']['rendered']; ?></span>
	            </h2>
	            <div id='restrict-elementor-widgets-help-text-<?php echo $help['id']; ?>' class='restrict-elementor-widgets-help-text' style='display:none'>
	                <?php echo wpautop( wp_trim_words( $help['content']['rendered'], 55, " <a class='sc-more' href='{$help_link}' target='_blank'>[more..]</a>" ) ); ?>
	            </div>
	        </div>
	        <?php

	    }
	    else:
	        _e( 'Something is wrong! No help found!', 'restrict-elementor-widgets' );
	    endif;
	    ?>
	    </div>
	</div>
</div>

<div id="rew_support_content" class="rew_tabcontent">
	<p><?php _e( 'Having an issue or got something to say? Feel free to reach out to us! Our award winning support team is always ready to help you.', 'shop-catalog' ); ?></p>
	<div id="support_btn_div">
		<a href="<?php echo $support_url; ?>" class="button" id="support_btn" target="_blank"><?php _e( 'Submit a Ticket', 'shop-catalog' ); ?></a>
	</div>
</div>
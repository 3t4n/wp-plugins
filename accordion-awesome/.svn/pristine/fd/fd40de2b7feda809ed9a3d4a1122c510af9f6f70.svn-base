<?php

// Accordion Header

function accordion_header_name($content) { ?>
	<div class="header-name"><h1><?php echo esc_html($content); ?></h1></div>
<?php }

// Accordion Header
function accordion_header_class_name($content) { ?>
	<h3 class="header-name"><?php echo esc_html($content); ?><h3>
<?php }

// Accordion Title
function accordion_title_view($content) { ?>
	<div class="accordion-name"><h3><?php echo esc_html($content); ?></h3></div>
<?php }

function accordion_title_class_view($content) { ?>
	<h3 class="accordion-name"><?php echo esc_html($content);?></h3>
<?php }

// Accordion Image 
function accordion_avatar_class_view($content) { ?>
	<img class="accordion-avatar"><?php echo wp_get_attachment_image( $content, 'full' ); ?>
<?php }


// Accordion Avatar
function accordion_avatar_view($content) { ?>
	<div class="accordion-avatar">
		<?php echo wp_get_attachment_image( $content, 'full' ); ?>
	</div>
<?php }

// Accordion Bio
function accordion_desc_view($content) { ?>
	<div class="accordion-description">
		<p><?php echo apply_filters( 'the_content', $content ); ?></p>
	</div>
<?php }

// Accordion Bio
function accordion_desc_class_view($content) { ?>
	<p class="accordion-description"><?php echo apply_filters( 'the_content', $content ); ?></p>
<?php }

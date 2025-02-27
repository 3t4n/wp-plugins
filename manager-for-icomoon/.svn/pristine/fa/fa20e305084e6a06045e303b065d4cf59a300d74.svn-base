<?php namespace managerForIcomoon ; ?>

<h2><?= __( "What does this plugin do?", 'managerforicomoon'); ?></h2>
<?php
$link = sprintf(
    wp_kses(
        /* translators: 1: URL vers Icomoon app, 2: attribut target */
        __( 'Manager for Icomoon allows you to load a font generated using the <a href="%1$s" target="%2$s">Icomoon app</a> for use on your WordPress site.', 'managerforicomoon' ),
        array(
            'a' => array(
                'href' => array(),
                'target' => array(),
            ),
        )
    ),
    esc_url( Core::getInfo('icomoon_website') ),
    '_blank'
);
?>
<p><?= $link ; ?></p>
<p><?= __( "The integration of the icons is then done through a shortcode.", 'managerforicomoon'); ?></p>

<h2><?= __( "Getting Started", 'managerforicomoon'); ?></h2>
<ol class="managerforicomoon-start">
	<li>
		<?= __( "Create an icon font with whatever icons you want using the Icomoon app.", 'managerforicomoon'); ?> 
		<a href="<?=  Core::getInfo('icomoon_website'); ?>"  target="_blank">
			<?= __( "Click here for instructions.", 'managerforicomoon'); ?>
		</a>
	</li> 
	<li>
		<?= __( "Download the font. It will be a .zip file.", 'managerforicomoon'); ?>
	</li>
	<li>
		<?= __( "Upload the .zip file.", 'managerforicomoon'); ?>
	</li>
	<li>
		<?= __( "Insert icons via a shortcode or by using the Gutenberg editor buttons.", 'managerforicomoon'); ?>
	</li>
</ol>

<h2><?= __( "Credits", 'managerforicomoon'); ?></h2>
<p><?= __( "This plugin includes the font Icomoon Free created by Keyamoon and distributed under the license GPL / CC BY 4.0.", 'managerforicomoon'); ?></p>
<p><?= __( "The English translation has been kindly corrected by Julia C.", 'managerforicomoon'); ?></p>

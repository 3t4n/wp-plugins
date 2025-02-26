<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<?php
$plugin_url = LMT_XMAS_CALENDAR_PATH;

$allowed_html = array(
	'a'      => array(
		'href'  => array(),
		'title' => array(),
	),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
);

$options = get_option( 'lmt_xmas_calendar_settings' );
$headline = $options['lmt_xmas_calendar_text_field_6'];
$content = $options['lmt_xmas_calendar_text_field_7'];
?>
<div id="xmas_calendar_main" class="xmas_calendar_thankyou">
   
    <section id="xmas_calendar_wrapper">
        <h1>
            <img src="<?php echo esc_url($plugin_url . 'assets/img/paeckchen-success.svg');?>" alt="Thankyou Logo">
            <?php echo wp_kses($headline, $allowed_html); ?>
        </h1>
        <div class="xmas_calendar_thankyou_content">
            <?php echo wp_kses($content, $allowed_html); ?>
            <div class="xmas_calendar_share">
                <div>
                  <a href="whatsapp://send?text=<?php echo get_site_url().'/xmas-calendar' ?>" data-action="share/whatsapp/share"><img src="<?php echo esc_url($plugin_url . 'assets/img/social/whatsapp.svg');?>" alt="WhatsApp"></a>
                </div>
                <div>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_site_url().'/xmas-calendar'?>"><img src="<?php echo esc_url($plugin_url . 'assets/img/social/facebook.svg');?>" alt="facebook"></a>
                </div>
                <div>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo get_site_url().'/xmas-calendar'?>&text=<?php echo get_site_url().'/xmas-calendar' ?>"><img src="<?php echo esc_url($plugin_url . 'assets/img/social/twitter.svg');?>" alt="twitter"></a>
                </div>
                <div>
                   <a href="https://pinterest.com/pin/create/button/?url=<?php echo get_site_url().'/xmas-calendar'?>&media=&description="><img src="<?php echo esc_url($plugin_url . 'assets/img/social/pinterest.svg');?>" alt="pinterest"></a>
                </div>
                <div>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_site_url().'/xmas-calendar'?>"><img src="<?php echo esc_url($plugin_url . 'assets/img/social/link.svg');?>" alt="LinkedIn"></a>
                </div>
                <div>
                     <a href="mailto:info@example.com?&subject=&cc=&bcc=&body=<?php echo get_site_url().'/xmas-calendar'?>%0A"><img src="<?php echo esc_url($plugin_url . 'assets/img/social/mail.svg');?>" alt="E-Mail"></a>
                </div>
            </div>
            <a href="<?php echo get_site_url()?>" class="xmas_cta"><?php echo __( 'Zurück zur Startseite', 'lmt-xmas-calendar' );?></a>
        </div>
    </section>
</div>
<?php wp_footer(); ?>
</body>
</html>

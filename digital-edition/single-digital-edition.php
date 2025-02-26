<?php
if(have_posts()) : while(have_posts()) : the_post();
if(!post_password_required()){
$sponsorCount = 1;

$cp = get_post_custom();
$terms = get_the_terms(get_the_ID(), 'digital_edition_name');
	$term = array();
	foreach($terms as $ts){
		array_push($term, $ts->slug);
	}
	$args = array(
		'numberposts'			=>	-1,
		'post_type'				=>	array('post'),
		'tax_query'				=>	array(
			array(
				'taxonomy'	=>	'digital_edition_name',
				'field'		=>	'slug',
				'terms'		=>	$term
			)
		)
	);
$deCount = 0;
 ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<!--[if IE 7]>         <html class="ie ie7 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="ie ie8 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="ie ie9 lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>>         <!--<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
	<meta name="description" content="<?php echo strip_tags(get_the_excerpt()); ?>">
	<?php if($cp['digital_edition_header_color']) : ?>
	<style type="text/css">
		.header, .full-photo-overlay, .info-bubble { background:<?php echo $cp['digital_edition_header_color'][0]; ?>; }
		.full-photo-overlay { background: rgba(<?php echo TSWPDE::hex2rgb($cp['digital_edition_header_color'][0]); ?>, 0.94); }
	</style>
	<?php endif; ?>
</head>
<body <?php body_class() ?>>
<div id="help_screen"></div>
<div class="header">
	<h1 class="title"><?php the_title(); ?></h1>
	<div class="sponsors hide-for-small">
		<?php TSWPDE::display_sponsor(1); TSWPDE::display_sponsor(2); TSWPDE::display_sponsor(3); ?>
	</div>
	<div class="assist_items">
		<i class="icon-menu" id="drawerToggle"></i>
		<i class="icon-question" id="help"></i>
		<?php if(!empty($cp['digital_edition_short_summary'][0])){ ?><i class="icon-info" id="info"></i><?php } ?>
	</div>
	<?php if(!empty($cp['digital_edition_short_summary'][0])) : ?>
	<div class="info-bubble">
		<div class="info_content">
			<?php echo esc_html(stripslashes($cp['digital_edition_short_summary'][0])); ?>
		</div>
	</div>
	<?php endif; ?>
</div>
<noscript><div class="notify"><?php _e('Turn on your Javascript to see and use this digital edition', 'tswpde') ?></div></noscript>
<div class="owl-carousel">
	<?php if(!empty($cp['digital_edition_splash'][0])) { ?>
	<div class="de-page item" data-page="<?php echo $deCount; $deCount++; ?>">
		<div class="full_page_ad" style="background-image:url('<?php echo esc_html($cp['digital_edition_splash'][0]); ?>')"></div>
	</div>
	<?php } if(!empty($cp['digital_edition_intro_copy'][0])) { ?>
	<div class="de-page item" data-page="<?php echo $deCount; $deCount++; ?>">
		<div class="de-content">
			<?php echo esc_html(stripslashes($cp['digital_edition_intro_copy'][0])); ?>
		</div>
	</div>
	<?php }

	$ss = new WP_Query($args); while($ss->have_posts()) : $ss->the_post();
		$pformat = get_post_format();
		$postImages = get_posts(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'numberposts' => -1,
		'post_mime_type' => 'image',
		'orderby' => 'menu_order' ));
		if(!post_password_required()) : ?>
		<div class="de-page item" data-page="<?php echo $deCount; ?>">
			<div <?php post_class('de-content format'.$pformat); ?>>
				<?php if(get_post_format() && $pformat == 'image') :
					if(function_exists('get_the_image')){
						$gti = get_the_image(array('size' => 'full', 'format' => 'array'));
						$background_url = $gti['src'];
					} else {
						$background_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
					}
					echo '<div class="full_page_ad" style="background-image:url(\''.$background_url.'\');">
						<div class="full-photo-overlay">'.get_the_content().'</div>
					</div>';
				else : ?>
				<h1><?php if(get_post_format() && $pformat != 'standard'){ ?>
					<i class="icon-<?php echo $pformat ?>"></i>
					<?php } if($pformat == 'status') echo 'Status'; ?>
					<?php the_title(); ?></h1>
				<ul class="meta">
					<li><?php the_author_posts_link(); ?></li>
					<li><?php echo get_the_date('M j, Y'); ?></li>
					<?php if(has_category()){ ?><li><?php the_category(', '); ?></li> <?php } ?>
					<?php if(has_tag()){ ?><li><?php the_tags(); ?></li><?php } ?>
				</ul>
				<div class="article_content">
					<?php the_content(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div><?php
		if(($ss->current_post % 8) == 0) :
			if(!empty($cp['digital_edition_full_sponsor_'.$sponsorCount][0]))
				echo '<div class="de-page item"><img src="'. esc_html($cp['digital_edition_full_sponsor_'.$sponsorCount][0]) .'" class="full_page_ad" />/div>';
			$sponsorCount++;
			if($sponsorCount == 4) $sponsorCount = 1;
		endif;
		$deCount++;
	endif; endwhile; wp_reset_query();
	if(!empty($cp['digital_edition_anchor'][0]))
		echo '<div class="de-page item" data-page="'.$deCount++.'">
			<div class="full_page_ad" style="background-image:url(\''.esc_html($cp['digital_edition_anchor'][0]).'\')"></div>
		</div>';
	if(!empty($cp['digital_edition_colophon'][0]))
		echo '<div class="de-page item" data-page="'.$deCount++.'">
			<div class="de-content">'. esc_html(stripslashes($cp['digital_edition_colophon'][0])) .'</div>
		</div>';
	?>
</div>
<div class="drawer">
	<ul>
		<?php $dsCount = 0; if(!empty($cp['digital_edition_splash'][0])) { ?>
		<li title="<?php the_title(); ?>" data-target="<?php echo $dsCount; $dsCount++; ?>">
			<div class="preview_overlay clearfix">
				<img src="<?php echo esc_html($cp['digital_edition_splash'][0]); ?>" />
				<div class="preview-text">
					<?php the_title(); ?>
				</div>
			</div>
		</li>
		<?php } ?>
		<?php if(!empty($cp['digital_edition_intro_copy'][0])) { ?>
		<li title="<?php _e('Intro', 'tswpde'); ?>" data-target="<?php echo $dsCount; $dsCount++; ?>">
			<div class="preview_overlay clearfix">
				<div class="preview-text">
					<?php $copy = esc_html(stripslashes($cp['digital_edition_intro_copy'][0])); echo substr(strip_tags($copy), 0, 12).'...' ?>
				</div>
			</div>
		</li>
		<?php } ?>
		<?php $ds = new WP_Query($args); while($ds->have_posts()) : $ds->the_post(); if(!post_password_required()) : ?>
		<li title="<?php the_title(); ?>" data-target="<?php echo $dsCount ?>" >
			<div class="preview_overlay clearfix">
				<?php if(function_exists('get_the_image'))
					get_the_image(array('size' => 'thumbnail', 'image_class' => 'preview_thumb'));
				else
					the_post_thumbnail('thumbnail', array('class' => 'preview_thumb'));
				?>
				<div class="preview-text">
				<?php if(get_post_format() && get_post_format() != 'standard') :
					echo ucfirst(get_post_format()).': ';
					//if(get_post_format() == 'status')
					//	echo substr(strip_tags(get_the_content()), 0, 12).'...';
				endif;
				the_title(); ?>
				</div>
			</div>
		</li>
		<?php $dsCount++; endif; endwhile; wp_reset_query(); ?>
		<?php if(!empty($cp['digital_edition_anchor'][0])) : ?>
		<li title="<?php _e('Anchor', 'tswpde') ?>" data-target="<?php echo $dsCount++; ?>">
			<div class="preview_overlay clearfix">
				<img src="<?php echo esc_html($cp['digital_edition_anchor'][0]) ?>" />
			</div>
		</li>
		<?php endif; if(!empty($cp['digital_edition_colophon'][0])) : ?>
		<li title="'<?php _e('Colophon', 'tswpde') ?>" data-target="<?php echo $dsCount++ ?>">
			<div class="preview_overlay clearfix">
				<div class="preview-text">
					<?php $copy = esc_html(stripslashes($cp['digital_edition_colophon'][0])); echo substr(strip_tags($copy), 0, 12).'...' ?>
				</div>
			</div>
		</li>
		<?php endif; ?>
	</ul>
</div>
<?php if(!empty($cp['digital_edition_push_content'][0]) && $cp['digital_edition_push_content'][0] == 'yes') : ?>
<script type="text/javascript">
	jQuery(function($){
		$('#drawerToggle').click(function(){
			$('.owl-carousel').toggleClass('nav-push')
		});
	});
</script>
<?php endif; ?>
</body>
</html>
<?php } else { get_header(); wp_head();
	TSWPDE::post_protected(get_the_ID());
	get_footer();
} endwhile; else : ?>
<?php get_header(); ?>
<div class="row clearfix">
	<div class="large-8 large-centered columns">
		<h1><?php _e('Page Not Found', 'tswpde'); ?></h1>
		<h3><?php _e('Sorry for the inconvenience.', 'tswpde'); ?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>"><?php _e('Return home.', 'tswpde'); ?></a></h3>
	</div>
</div>
<?php get_footer(); ?>
<?php endif; wp_footer(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<? bloginfo('template_directory');?>/attachment/attach_style.css" rel="stylesheet" type="text/css" />


<title><? echo get_option('blogname'); ?> - <? the_title(); ?></title>
</head>

<body>
<?
$attachment_link = '<a href="' . get_bloginfo('url') . '">' . get_attachment_innerHTML($post->ID, true, null) . '</a>';
	
$_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially

?>
<div id="pagewidth">

<div id="header">
 <h1><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> - <? the_title(); ?></h1>
<? echo PrintCode('topcode');?>
</div><!-- end header div-->
 <div id="maincol2">
   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   		<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?></p>
   <?php endwhile; else: ?>

		<p>Sorry, no attachments matched your criteria.</p>

   <?php endif; ?>   		
 </div><!-- end maincol div-->
 <div id="footer">
<? echo PrintCode('bottomcode');?>
 </div>
<div id="footer2"><small>Powered by <a href="http://djuki.padrino.co.yu/blog/wordpress-plugins/adsense-attachment-plugin/">AdSense Attachment Plugin</a></small></div>
</body>
</html>
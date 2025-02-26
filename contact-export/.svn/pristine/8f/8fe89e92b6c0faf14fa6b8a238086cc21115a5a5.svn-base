=== Plugin Name ===
Contributors: Tamael
Donate link: there's nothing to donate
Tags: csv, export, meta-tags
Requires at least: 3.0.0
Tested up to: 3.2.1
Stable tag: trunk

Contact-Export of Metainformation via .csv files

== Description ==

This is a export plugin for the metainformation of every single post. You can select a category 
or search in the front panel and than you can download your choosen posts.

For this Plugin is Flutter or Pods(perhaps in the future ;) ) very usefull. You can build a bridge between a wordpress CRM 
and Outlook, Thunderbird or other mail clients. But word for massmails are useful too. 

I'll try a Apache Camel integration as autmatic bridge between the systems next time.

== Installation ==


1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place this code in index.php:

`<form action="<?php the_permalink(); ?>" method="post">	
	<strong><?php $alt = ""; $i = 1;?></strong>
 
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if ($alt == "") { $alt = " alt"; } else { $alt = ""; } ?>
	<tr class="contact<?php echo $alt; ?>">
	  <td><?php echo $i; ?><strong><input type="hidden" name="<?php echo $i; ?>"</strong> value="<?php echo $post->ID; ?>" /></td>
		<td class="m-name"><a href="<?php the_permalink(); ?>"><strong><?php echo get_post_meta($post->ID, "vorname", true); ?></strong> <?php echo get_post_meta($post->ID, "nachname", true); ?></a></td>
		<td class="m-email"><?php $has_email = get_post_meta($post->ID, "email", true); if ( $has_email == '' ) { echo '&nbsp;'; } else { ?><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"><?php echo get_post_meta($post->ID, "email", true); } ?></a></td>
		<td class="m-mobile"><span><?php echo get_post_meta($post->ID, "telefon", true); ?></span></td>
	</tr>
	<?php $i++; endwhile; else: ?>
<input type="submit" class="button-primary" name="export" value="exportieren">
</form>`

  Important is, that you add this code, where the post are be generated. You have to modify that code for your wordpress installation!!
  
4. Add this code at single.php:
   `<?php
    integrate_front();
    if (!isset($_POST['next']) && !isset($_POST['export'])) {
     
    (Content of single Site)
     
    }`

 
== Frequently Asked Questions ==

Please ask me. ;)


== Screenshots ==

1. at the moment are no screenshots available

== Changelog ==

= 1.5 =
* Codecleanup 
* Release



== Upgrade Notice ==

= 1.5 =
For this version, you have to modify a bit your system by yourself.  

== Arbitrary section ==



== A brief Markdown Example ==

Ordered list:



Unordered list:


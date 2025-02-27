<div id="fgoc2wc-help-options">
<h1>FG OpenCart to WooCommerce Options</h1>

<h2>Empty WordPress content</h2>
<p>Before running the import or if you want to rerun the import from scratch, you can empty the WordPress content.</p>
<p><strong>Remove only the new imported data:</strong> Only the new imported data will be removed when you click on the "Empty WordPress content" button.</p>
<p><strong>Remove all WordPress content:</strong> All the WordPress content (posts, pages, products, attachments, categories, tags, navigation menus, custom post types) will be removed when you click on the "Empty WordPress content" button.</p>
<p><strong>Automatic removal:</strong> If you check this option, all the WordPress content will be deleted when you click on the Import button.</p>


<h2>OpenCart web site parameters</h2>

<p><strong>URL:</strong> In this field, you fill in the OpenCart home page URL.</p>


<h2>OpenCart database parameters</h2>

<p>You can find the following informations in the OpenCart file <strong>config.php</strong></p>

<p><strong>Hostname:</strong> DB_HOSTNAME</p>
<p><strong>Port:</strong> DB_PORT By default, it is 3306.</p>
<p><strong>Database:</strong> DB_DATABASE</p>
<p><strong>Username:</strong> DB_USERNAME</p>
<p><strong>Password:</strong> DB_PASSWORD</p>
<p><strong>OpenCart Table Prefix:</strong> DB_PREFIX</p>


<h2>Behavior</h2>

<p><strong>Medias:</strong><br />
<ul>
<li><strong>Skip media:</strong> You can import or skip the medias (images, attached files).</li>
<li><strong>Import first image:</strong> You can import the first image contained in the article as the WordPress post featured image or just keep it in the content (as is), or to both.</li>
<li><strong>Import external media:</strong> If you want to import the medias that are not on your site, check the "External media" option. Be aware that it can reduce the speed of the import or even hang the import.</li>
<li><strong>Import media with duplicate names:</strong> If you have several images with the exact same filename in different directories, you need to check the "media with duplicate names" option. In this case, all the filenames will be named with the directory as a prefix.</li>
<li><strong>Force media import:</strong> If you already imported some images and these images are corrupted on WordPress (images with a size of 0Kb for instance), you can force the media import. It will overwrite the already imported images. In a normal use, you should keep this option unchecked.</li>
</ul>
</p>

<p><strong>Import prices:</strong> You can import the prices excluding tax or including tax. If you choose "including tax", you must define first a default tax in <a href="admin.php?page=wc-settings&tab=tax&section=standard" target="_blank">WooCommerce Tax tab</a>.</p>

<p><strong>Timeout for each media:</strong> The default timeout to copy a media is 5 seconds. You can change it if you have many errors like "Can't copy xxx. Operation timeout".</p>

<p><strong>SEO <span class="fgoc2wc_premium_feature">(Premium feature)</span>:</strong>
<ul>
	<li><strong>Import the meta data to WordPress SEO by Yoast:</strong> If you are using the WordPress SEO by Yoast plugin, this option will import the product meta data (browser title, description, keywords, robots) into the WordPress posts and products.</li>
	<li><strong>Redirect the OpenCart product URLs:</strong> With this option checked, the old OpenCart links will be automatically redirected to the new WordPress URLs. It uses "301 redirect". By this way, the SEO will be kept. The plugin must remain active to redirect the URLs.</li>
</ul></p>

<p><strong>Partial import <span class="fgoc2wc_premium_feature">(Premium feature)</span>:</strong> If you don't want to import all the OpenCart data, you can use this option. Please note that even if you don't use this option and if you rerun the import, the already imported content won't be imported twice.</p>

<?php do_action('fgoc2wc_help_options'); ?>

</div>

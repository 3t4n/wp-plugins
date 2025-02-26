<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_custom($rankology_fno_rich_snippets_data, $key_schema = 0) {

    $rankology_fno_rich_snippets_custom  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_custom']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_custom'] : ''; ?>

<div class="wrap-rich-snippets-item wrap-rich-snippets-custom">
    <div class="rankology-notice">
        <p>
            <?php $pre = '<pre>' . htmlspecialchars('<script type="application/ld+json">your custom schema</script>') . '</pre>'; ?>
            <?php /* translators: %s: <script type="application/ld+json">your custom schema</script> */ printf(__('Build your custom schema. Don\'t forget to include the script tag: %s', 'wp-rankology'), $pre); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_custom_meta">
            <?php esc_html_e('Custom schema', 'wp-rankology'); ?>
        </label>
        <textarea rows="25" id="rankology_fno_rich_snippets_custom_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_custom]"
            placeholder="<?php echo esc_html__('e.g. <script type="application/ld+json">{
				"@context": "https://schema.org/",
				"@type": "Review",
				"itemReviewed": {
				"@type": "Restaurant",
				"image": "http://www.example.com/seafood-restaurant.jpg",
				"name": "Legal Seafood",
				"servesCuisine": "Seafood",
				"telephone": "1234567",
				"address" :{
					"@type": "PostalAddress",
					"streetAddress": "123 William St",
					"addressLocality": "New York",
					"addressRegion": "NY",
					"postalCode": "10038",
					"addressCountry": "US"
				}
				},
				"reviewRating": {
				"@type": "Rating",
				"ratingValue": "4"
				},
				"name": "A good seafood place.",
				"author": {
				"@type": "Person",
				"name": "Bob Smith"
				},
				"reviewBody": "The seafood is great.",
				"publisher": {
				"@type": "Organization",
				"name": "Washington Times"
				}
			}</script>', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Custom schema', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_custom; ?></textarea>
    </p>
</div>
<?php
}

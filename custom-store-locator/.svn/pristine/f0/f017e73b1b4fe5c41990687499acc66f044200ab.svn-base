<?php 
/* Default Right Map Layout */
?>
<form class="csl-search-form" action="#" method="get">
    <label for="userAddress">
        <?php if ($csl_autocompletesearchbox === "yes") { ?>
            <input name="userAddress" id="userAddress" class="autocompleteenabled" type="text" 
                value="<?php echo isset($_GET['userAddress']) ? esc_attr(sanitize_text_field($_GET['userAddress'])) : ''; ?>" 
                placeholder="<?php esc_attr_e('Address or Zipcode', 'custom-store-locator'); ?>" />
        <?php } else { ?>
            <input name="userAddress" id="userAddress" type="text" 
                value="<?php echo isset($_GET['userAddress']) ? esc_attr(sanitize_text_field($_GET['userAddress'])) : ''; ?>" 
                placeholder="<?php esc_attr_e('Zipcode', 'custom-store-locator'); ?>" />
        <?php } ?>
    </label>
    <?php
    if ($csl_include_cat === "yes") {
        $csl_locations_categories = get_terms(array(
            'taxonomy'   => 'csl_locations_categories',
            'hide_empty' => true, 
        ));
        if (!empty($csl_locations_categories)) {
            echo '<select name="csl-locations-categories">';
            echo '<option value="">' . esc_html__('Select Category', 'custom-store-locator') . '</option>';
            foreach ($csl_locations_categories as $csl_locations_category) {
                $selectedcat = ($csllocationscategories === $csl_locations_category->name) ? 'selected="selected"' : '';
                echo '<option value="' . esc_attr($csl_locations_category->name) . '" ' . esc_attr($selectedcat) . '>' . esc_html($csl_locations_category->name) . '</option>';
            }
            echo '</select>';
        }
    }
    ?>
    <a class="currentloc" href="#1">
        <img src="<?php echo esc_url(CSL_URL . '/assets/images/current-location.png'); ?>" alt="<?php esc_attr_e('current location', 'custom-store-locator'); ?>">
    </a>
    <input name="maxRadius" id="maxRadius" type="hidden" 
        value="<?php echo esc_attr(!empty($csl_map_default_radius) ? sanitize_text_field($csl_map_default_radius) : '20'); ?>" min="1" />
    <button id="submitLocationSearch"><?php esc_html_e('Search', 'custom-store-locator'); ?></button>
    <button type="reset" name="reset" id="mapreset"><?php esc_html_e('Reset', 'custom-store-locator'); ?></button>
</form>
<h2 id="location-search-alert"><?php esc_html_e('All Locations', 'custom-store-locator'); ?></h2>
<div class="csl-wrapper" id="csl-wrapper">    
    <div class="csl-left">
        <div id="locations-near-you">
            <?php
            if ($listing_query->have_posts()) {
                $i = 0;
            ?>
                <div class="location-near-you-box">
                    <?php while ($listing_query->have_posts()) : $listing_query->the_post(); 
                        $locid = get_the_ID();
                        $websiteurl = get_post_meta($locid, 'websiteurl', true);
                        $business_phone_number = get_post_meta($locid, 'business_phone_number', true);
                        $business_fax = get_post_meta($locid, 'business_fax', true);
                        $business_contact_email = get_post_meta($locid, 'business_contact_email', true);
                        $business_address = str_replace(array('[\', \']'), '', get_post_meta($locid, 'business_address', true));
                        $business_zip_code = get_post_meta($locid, 'business_zip_code', true);
                        $business_storehours = get_post_meta($locid, 'business_storehours', true);
                        $csl_hide_phone = get_option('csl_hide_phone', '');
                        $csl_hide_email = get_option('csl_hide_email', '');
                        $csl_hide_fax = get_option('csl_hide_fax', '');
                        $csl_hide_website = get_option('csl_hide_website', '');
                        $csl_hide_hours = get_option('csl_hide_hours', '');
                    ?>
                        <div class="csl-list-item">
                            <div data-markerid="<?php echo esc_attr($i); ?>" class="marker-link">
                                <h4><?php the_title(); ?></h4>
                                <p>
                                    <?php if ($business_address) {
                                        echo '<strong>' . esc_html__('Address', 'custom-store-locator') . ': </strong>' . nl2br(esc_html($business_address));
                                    } ?>
                                    <?php if (!empty($business_zip_code)) {
                                        echo '<br><strong>' . esc_html__('Postal Code', 'custom-store-locator') . ': </strong> ' . esc_html($business_zip_code);
                                    } ?>
                                    <?php if (!empty($business_phone_number) && $csl_hide_phone !== 'yes') {
                                        echo '<br><strong>' . esc_html__('Phone', 'custom-store-locator') . ': </strong> <a href="tel:' . esc_attr(preg_replace('/[^0-9]/', '', $business_phone_number)) . '">' . esc_html($business_phone_number) . '</a>';
                                    } ?>
                                    <?php if (!empty($business_contact_email) && $csl_hide_email !== 'yes') {
                                        echo '<br><strong>' . esc_html__('Email', 'custom-store-locator') . ': </strong> <a href="mailto:' . esc_attr($business_contact_email) . '">' . esc_html($business_contact_email) . '</a>';
                                    } ?>
                                    <?php if (!empty($business_fax) && $csl_hide_fax !== 'yes') {
                                        echo '<br><strong>' . esc_html__('Fax', 'custom-store-locator') . ': </strong> <a href="fax:' . esc_attr(preg_replace('/[^0-9]/', '', $business_fax)) . '">' . esc_html($business_fax) . '</a>';
                                    } ?>
                                    <?php if (!empty($websiteurl) && $csl_hide_website !== 'yes') {
                                        echo '<br><strong>' . esc_html__('Website', 'custom-store-locator') . ': </strong> <a target="_blank" href="' . esc_url($websiteurl) . '">' . esc_html($websiteurl) . '</a>';
                                    } ?>
                                </p>
                                <?php if ($business_storehours && $csl_hide_hours !== 'yes') {
                                    echo '<p class="store-hours"><strong>' . esc_html__('Store Hours', 'custom-store-locator') . ': </strong>' . nl2br(esc_html($business_storehours)) . '</p>';
                                } ?>
                                <a href="#1" class="viewmaplink"><?php esc_html_e('View on Map', 'custom-store-locator'); ?></a>
                            </div>
                        </div>
                    <?php 
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="csl-right">
        <div id="locations-near-you-map"></div>
        <div id="floating-panel-map" style="display:none;">
            <input type="button" value="<?php esc_attr_e('Back to Map', 'custom-store-locator'); ?>" id="togglemap" />
        </div>
        <div id="pano" style="display:none;"></div>
    </div>
</div>
<?php

namespace SeoThatMatters;
use function SeoThatMatters\plugin_instance;

?>

<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-body-header">
	<h2><?php _e('Schema Markup', SEOTM_PREFIX) ?></h2>
</div>

<!-- start organization markup -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group show-hide-group flex-full-width mt-10 pb-10">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input flex-50 pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light main-toggle show-hide" data-show-hide="1" id="seotm_use_markup_organization" name="seotm_use_markup_organization" value="1" type="checkbox"
			<?php checked(plugin_field_setting( 'seotm_use_markup_organization'), 1, true) ?>/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_markup_organization"></label>
		<label class="toggle-label pl-4" for="seotm_use_markup_organization">
		<?php _e('Organization Schema', SEOTM_PREFIX) ?>
		</label>
		<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
			<?php _e('Use Organization Markup (will be added to your homepage)', SEOTM_PREFIX) ?>
		</div>
	</div>
	<div id="" class="show-hide-content padding-left-0 pb-0">
		<div class="flex gap-2 grid-col-2 pt-13 grid-row-01">
			<!-- start organization type -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Business Type: ', SEOTM_PREFIX) ?></span><?php _e('See <a href="https://schema.org/Organization" rel="noreferrer noopener" target="_blank">the list</a>', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( 'Organization' ); ?>" type="text" id="seotm_use_markup_organization_org_type" name="seotm_use_markup_organization_org_type" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_org_type')) ?>">
				</div>
			</div>
			<!-- end organization type -->
			<!-- start name -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Name: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_organization_name" name="seotm_use_markup_organization_name" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_name')) ?>">
				</div>
			</div>
			<!-- end name -->
			<!-- start alternative name -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Alternative Name: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_organization_altname" name="seotm_use_markup_organization_altname" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_altname')) ?>">
				</div>
			</div>
			<!-- end alternative name -->
			<!-- start logo -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Logo: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( 'logo url' ); ?>" type="text" id="seotm_use_markup_organization_logo" name="seotm_use_markup_organization_logo" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_logo')) ?>">
				</div>
			</div>
			<!-- end logo -->
			<!-- start image -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Image: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( 'image url' ); ?>" type="text" id="seotm_use_markup_organization_image" name="seotm_use_markup_organization_image" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_image')) ?>">
				</div>
			</div>
			<!-- end image -->
			<!-- start ophone -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Phone: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*for Organization field', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( '+62810000000' ); ?>" type="text" id="seotm_use_markup_organization_ophone" name="seotm_use_markup_organization_ophone" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_ophone')) ?>">
				</div>
			</div>
			<!-- end ophone -->
			<!-- start address -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Address: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*reguired for Address Fields', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_organization_address" name="seotm_use_markup_organization_address" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_address')) ?>">
				</div>
			</div>
			<!-- end address -->
			<!-- start locality -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Locality:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_organization_locality" name="seotm_use_markup_organization_locality" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_locality')) ?>">
				</div>
			</div>
			<!-- end locality -->
			<!-- start region -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Region:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_organization_region" name="seotm_use_markup_organization_region" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_region')) ?>">
				</div>
			</div>
			<!-- end region -->
			<!-- start aphone -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Phone: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*for Address field', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( '+62810000000' ); ?>" type="text" id="seotm_use_markup_organization_aphone" name="seotm_use_markup_organization_aphone" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_aphone')) ?>">
				</div>
			</div>
			<!-- end aphone -->    
			<!-- start postcode -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Postal Code:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_organization_postcode" name="seotm_use_markup_organization_postcode" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_postcode')) ?>">
				</div>
			</div>
			<!-- end postcode -->
			<!-- start country -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Country: ', SEOTM_PREFIX) ?></span><?php _e('See <a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes" rel="noreferrer noopener" target="_blank">the code list</a>', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( '2 letter ISO 3166-1 alpha-2 country code' ); ?>" type="text" id="seotm_use_markup_organization_country" name="seotm_use_markup_organization_country" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_organization_country')) ?>">
				</div>
			</div>
			<!-- end country -->
			<!-- start social -->
			<div class="flex-50 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Social (sameAs): ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*one per line', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-94">
					<textarea class="textarea-custom" rows="7" name="seotm_use_markup_organization_social"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_organization_social')) ?></textarea>
				</div>
			</div>
			<!-- end social -->
			<!-- start description -->
			<div class="flex-50 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Description: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-94">
					<textarea class="textarea-custom" style="white-space:normal" rows="7" name="seotm_use_markup_organization_description"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_organization_description')) ?></textarea>
				</div>
			</div>
			<!-- end description -->
			<!-- start custom field  -->
			<div class="w-100 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Extra Fields: ', SEOTM_PREFIX) ?></span>
					<span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*put your extra field for this schema here', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-97">
					<textarea class="textarea-custom" style="white-space:normal" rows="10" name="seotm_use_markup_organization_extra" placeholder="<?php echo esc_attr__( 'e.g.:&#13;&#10;"service": [&#13;&#10;&nbsp;{&#13;&#10;&nbsp;&nbsp;@type": "Service",&#13;&#10;&nbsp;&nbsp;"name": "Digital Marketing",&#13;&#10;&nbsp;&nbsp;"description": "Our digital marketing service offers a range of solutions, including SEO, SEM, Social Media, and more.",&#13;&#10;&nbsp;&nbsp;"url": "https://your-agency-website.com/services/digital-marketing"&#13;&#10;&nbsp;&nbsp;}&#13;&#10;&nbsp;]' ); ?>"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_organization_extra')) ?></textarea>
				</div>
			</div>
			<!-- end custom field  -->
		</div>
		<!-- end flex grid container -->
	</div>
	<!-- end show-hide-content -->
</div>
<!-- end organization markup -->
<!-- start Local Business markup -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group show-hide-group flex-full-width pb-10">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input flex-50 pt-8 pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light main-toggle show-hide" data-show-hide="1" id="seotm_use_markup_local_business" name="seotm_use_markup_local_business" value="1" type="checkbox"
			<?php checked(plugin_field_setting( 'seotm_use_markup_local_business'), 1, true) ?>/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_markup_local_business"></label>
		<label class="toggle-label pl-4" for="seotm_use_markup_local_business">
		<?php _e('Local Business Schema', SEOTM_PREFIX) ?>
		</label>
		<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
			<?php _e('Use Local Business Markup (will be added to your homepage)', SEOTM_PREFIX) ?>
		</div>
	</div>
	<div id="" class="show-hide-content padding-left-0 pb-0">
		<div class="flex gap-2 grid-col-2 pt-13 grid-row-01">
			<!-- start Local Business type -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Business Type: ', SEOTM_PREFIX) ?></span><?php _e('See <a href="https://schema.org/LocalBusiness" rel="noreferrer noopener" target="_blank">the list</a>', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( 'Local Business' ); ?>" type="text" id="seotm_use_markup_local_business_type" name="seotm_use_markup_local_business_type" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_type')) ?>">
				</div>
			</div>
			<!-- end Local Business type -->
			<!-- start name -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Name: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( 'leave empty to use the site name ' ); ?>" type="text" id="seotm_use_markup_local_business_name" name="seotm_use_markup_local_business_name" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_name')) ?>">
				</div>
			</div>
			<!-- end name -->
			<!-- start ophone -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Phone: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( '+62810000000' ); ?>" type="text" id="seotm_use_markup_local_business_phone" name="seotm_use_markup_local_business_phone" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_phone')) ?>">
				</div>
			</div>
			<!-- end ophone -->
			<!-- start image -->
			<div class="flex-50 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Images: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*one per line', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-94">
					<textarea class="textarea-custom" rows="7" name="seotm_use_markup_local_business_image"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_local_business_image')) ?></textarea>
				</div>
			</div>
			<!-- end image -->
			<!-- start description -->
			<div class="flex-50 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Description: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-94">
					<textarea class="textarea-custom" style="white-space:normal" rows="7" name="seotm_use_markup_local_business_description"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_local_business_description')) ?></textarea>
				</div>
			</div>
			<!-- end description -->
			<!-- start address -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Address: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*reguired for Address Fields', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_local_business_address" name="seotm_use_markup_local_business_address" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_address')) ?>">
				</div>
			</div>
			<!-- end address -->
			<!-- start locality -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Locality:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_local_business_locality" name="seotm_use_markup_local_business_locality" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_locality')) ?>">
				</div>
			</div>
			<!-- end locality -->
			<!-- start region -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Region:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_local_business_region" name="seotm_use_markup_local_business_region" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_region')) ?>">
				</div>
			</div>
			<!-- end region -->
			<!-- start postcode -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Postal Code:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_local_business_postcode" name="seotm_use_markup_local_business_postcode" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_postcode')) ?>">
				</div>
			</div>
			<!-- end postcode -->
			<!-- start country -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Country: ', SEOTM_PREFIX) ?></span><?php _e('See <a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes" rel="noreferrer noopener" target="_blank">the code list</a>', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( '2 letter ISO 3166-1 alpha-2 country code' ); ?>" type="text" id="seotm_use_markup_local_business_country" name="seotm_use_markup_local_business_country" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_country')) ?>">
				</div>
			</div>
			<!-- end country -->
			<!-- start geo_latitude -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Geo Latitude: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*reguired for Geo Fields', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_local_business_geo_latitude" name="seotm_use_markup_local_business_geo_latitude" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_geo_latitude')) ?>">
				</div>
			</div>
			<!-- end geo_latitude -->
			<!-- start geo_longitude -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Geo Longitude: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*reguired for Geo Fields', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( ' ' ); ?>" type="text" id="seotm_use_markup_local_business_geo_longitude" name="seotm_use_markup_local_business_geo_longitude" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_geo_longitude')) ?>">
				</div>
			</div>
			<!-- end geo_longitude -->
			<!-- start price range -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Price Range: ', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input">
					<input class="w-90" placeholder="<?php _e( 'eg: $$$' ); ?>" type="text" id="seotm_use_markup_local_business_price" name="seotm_use_markup_local_business_price" value="<?php echo esc_html(plugin_field_setting('seotm_use_markup_local_business_price')) ?>">
				</div>
			</div>
			<!-- end price range -->
			<!-- start opening_hours -->
			<div class="flex-50 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Opening Hours: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*one per line', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-94">
					<textarea class="textarea-custom" style="white-space:normal" rows="7" name="seotm_use_markup_local_business_opening_hours" placeholder="<?php echo esc_attr__( 'Day: HH:MM - HH:MM&#13;&#10;&#13;&#10;e.g.:&#13;&#10;Monday: 10:00 - 17:00&#13;&#10;Tuesday: 09:00 - 16:00&#13;&#10;Monday: 10:00 - 15:00&#13;&#10;and so on..' ); ?>"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_local_business_opening_hours')) ?></textarea>
				</div>
			</div>
			<!-- end opening_hours -->
			<!-- start social -->
			<div class="flex-50 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Social: ', SEOTM_PREFIX) ?></span><span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*one per line', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-94">
					<textarea class="textarea-custom" rows="7" name="seotm_use_markup_local_business_social"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_local_business_social')) ?></textarea>
				</div>
			</div>
			<!-- end social -->
			<!-- start custom field  -->
			<div class="w-100 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 pl-2">
					<span class="bold"><?php _e('Extra Fields: ', SEOTM_PREFIX) ?></span>
					<span style="font-size:90%;line-height:0;font-style:italic;color:#666"><?php _e('*put your extra field for this schema here', SEOTM_PREFIX) ?></span>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input w-97">
					<textarea class="textarea-custom" style="white-space:normal" rows="10" name="seotm_use_markup_local_business_extra" placeholder="<?php _e( ' ' ); ?>"><?php echo esc_textarea(plugin_field_setting('seotm_use_markup_local_business_extra')) ?></textarea>
				</div>
			</div>
			<!-- end custom field  -->
		</div>
		<!-- end flex grid container -->
	</div>
	<!-- end show-hide-content -->
</div>
<!-- end Local Business markup -->
<!-- start sitelinksearchbox markup -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-full-width mb-15">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pt-15 pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_markup_sitelink_search_box" value="1" name="seotm_use_markup_sitelink_search_box" <?php checked(plugin_field_setting('seotm_use_markup_sitelink_search_box'), 1, true) ?> type="checkbox"/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_markup_sitelink_search_box"></label><label class="toggle-label" for="seotm_use_markup_sitelink_search_box"><?php _e('Sitelinks Search Box Schema'); ?></label> 
	</div>
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
		<?php _e('Use Sitelinks search box Markup (will be added to your homepage)', SEOTM_PREFIX) ?>
	</div>
</div>
<!-- end sitelinksearchbox markup -->
<!-- start breadcrumbs markup -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-full-width mb-15">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pt-8 pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_markup_breadcrumbs" value="1" name="seotm_use_markup_breadcrumbs" <?php checked(plugin_field_setting('seotm_use_markup_breadcrumbs'), 1, true) ?> type="checkbox"/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_markup_breadcrumbs"></label><label class="toggle-label" for="seotm_use_markup_breadcrumbs"><?php _e('Breadcrumbs Schema'); ?></label> 
	</div>
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
		<?php _e('Use Breadcrumbs Markup (will be added to every post/page)', SEOTM_PREFIX) ?>
	</div>
</div>
<!-- end breadcrumbs markup -->
<!-- start article markup -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group show-hide-group flex-full-width pb-10">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input flex-50 pt-8 pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light main-toggle show-hide" data-show-hide="1" id="seotm_use_markup_articles" name="seotm_use_markup_articles" value="1" type="checkbox"
			<?php checked(plugin_field_setting( 'seotm_use_markup_articles'), 1, true) ?>/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_markup_articles"></label>
		<label class="toggle-label pl-4" for="seotm_use_markup_articles">
		<?php _e('Article Schema', SEOTM_PREFIX) ?>
		</label>
		<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
			<?php _e('Use Article Schema Markup for Articles ( will be added to your is_singular( \'post\' ) )', SEOTM_PREFIX) ?>
		</div>
	</div>
	<div id="" class="show-hide-content padding-left-0 pb-0 flex-50">
		<div class="flex gap-2 grid-col-2 pt-13 pb-10i">
			<!-- start schema type -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Schema Type:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pt-0 pb-0">
					<select id="seotm_use_markup_articles_type" name="seotm_use_markup_articles_type" class="<?php echo esc_attr(SEOTM_PREFIX); ?>-select w-92">
						<option value="1" <?php if (plugin_field_setting('seotm_use_markup_articles_type') == 1) echo 'selected="selected"'; ?>>Article</option>
						<option value="2" <?php if (plugin_field_setting('seotm_use_markup_articles_type') == 2 ) echo 'selected="selected"'; ?>>NewsArticle</option>
						<option value="3" <?php if (plugin_field_setting('seotm_use_markup_articles_type') == 3 ) echo 'selected="selected"'; ?>>BlogPosting</option>
					</select>
				</div>
			</div>
			<!-- end schema type -->
			<!-- start author type -->
			<div class="flex-30 <?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-center pt-4">
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help pt-0 pb-5 bold pl-2">
					<?php _e('Author Type:', SEOTM_PREFIX) ?>
				</div>
				<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pt-0 pb-0">
					<select id="seotm_use_markup_articles_author" name="seotm_use_markup_articles_author" class="<?php echo esc_attr(SEOTM_PREFIX); ?>-select w-92">
						<option value="1" <?php if (plugin_field_setting('seotm_use_markup_articles_author') == 1) echo 'selected="selected"'; ?>>Organization</option>
						<option value="2" <?php if (plugin_field_setting('seotm_use_markup_articles_author') == 2 ) echo 'selected="selected"'; ?>>Person</option>
					</select>
				</div>
			</div>
			<!-- end author type -->
		</div>
		<!-- end flex grid container -->
	</div>
	<!-- end show-hide-content -->
</div>
<!-- end article markup -->
<!-- start custom_json markup -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group flex-full-width mb-15 pb-6">
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pt-8 pb-0">
		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light" id="seotm_use_markup_custom_json" value="1" name="seotm_use_markup_custom_json" <?php checked(plugin_field_setting('seotm_use_markup_custom_json'), 1, true) ?> type="checkbox"/>
		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_markup_custom_json"></label><label class="toggle-label" for="seotm_use_markup_custom_json"><?php _e('Custom JSON Schema'); ?></label> 
	</div>
	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-help">
		<p class="mt-0 mb-5" style="font-size:inherit">
			<?php _e('Use WordPress native post meta fields to manually add custom JSON Schema  <em>*see <a href="https://wordpress.org/plugins/seo-that-matters/#faq-header" target="_blank" rel="nofollow">plugin\'s FAQ</a></em>', SEOTM_PREFIX) ?>
		</p>
		<?php _e('Usage: Simply add "jsonScript" to the name field and add the JSON schema markup to the value field', SEOTM_PREFIX) ?><br />
		<?php _e('(you can add custom JSON schema markup as many as you like)', SEOTM_PREFIX) ?>
	</div>
</div>
<!-- end custom_json markup -->

<?php if( class_exists( 'WooCommerce' ) ): ?> <!-- check if WooCommerce plugin active -->
<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input-group show-hide-group flex-full-width mb-15 pb-6 grid">
    <div class="gap-2 pt-0 grid-row-01">
    	<div class="<?php echo esc_attr(SEOTM_PREFIX); ?>-input pt-8 pb-0">
    		<input class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle <?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-light toggle show-hide" data-show-hide="1" id="seotm_use_schema_offer_shop" value="1" name="seotm_use_schema_offer_shop" <?php checked(plugin_field_setting('seotm_use_schema_offer_shop'), 1, true) ?> type="checkbox"/>
    		<label class="<?php echo esc_attr(SEOTM_PREFIX); ?>-toggle-btn" for="seotm_use_schema_offer_shop"></label><label class="toggle-label" for="seotm_use_schema_offer_shop"><?php _e('Add Product Schema to Shop & Product Category Page'); ?></label> 
    	</div>
    	<div id="" class="show-hide-content padding-left-0 pb-0 <?php echo esc_attr(SEOTM_PREFIX); ?>-help">
    		<p class="mt-0 mb-5" style="font-size:inherit">
    			<?php
                _e('This will add product schema with offer and ratings to the Shop & Product Category Page.', SEOTM_PREFIX);
                ?>
    		</p>
			<p class="mt-0" style="font-size:inherit">
    			<?php
                _e('
				<span style="
				padding: .225em 0;
				padding-left: 1.15em;
                line-height: 1.575;
				margin-top: 1.15em;
				margin-left: .325em;
				max-width: fit-content;
				font-family: monospace;
				border-left: 4px solid #3769a9;
				color: #676767;
				display: block
				">
                <u style="
                margin-bottom: 3.5px;
                display:inline-block;
                ">the values</u>:<br>
                "brand" = your blog name,<br>
                "offerCount" = the total number of existing product in the page,<br>
                "lowPrice" = the lowest product price in the page,<br>
                "highPrice" = the highest product price in the page,<br>
                "priceCurrency" = your currency symbol in woocommerce settings,<br>
                "ratingValue" = the aggregate value of all existing product ratings,<br>
                "ratingCount" = the number of existing ratings
				</span', SEOTM_PREFIX);
                ?>
    		</p>
    	</div>
    </div>
</div>
<?php endif; ?> <!-- end checking if WooCommerce plugin active -->
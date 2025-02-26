<?php use Level_Wp\Affiliate_Advantage\Plugin; ?>

<!-- Link Keywords -->
<div class="form-field form-required affiliate-advantage-form-group">
	<?php if ( Plugin::get_instance()->has_valid_licence() ) : ?>
		<label for="<?php echo esc_attr( $prefix ); ?>link_url">Autolink Keywords</label>
		<input type="text" name="<?php echo esc_attr( $prefix ); ?>link_keywords" id="<?php echo esc_attr( $prefix ); ?>link_keywords" size="40"
			   value="<?php echo esc_attr( get_post_meta( $post->ID, 'link_keywords', true ) ); ?>">


		<p class="affiliate-advantage-form-help-text">The keywords you want to auto link to replace with a link to this affiliate
			link in posts and pages. Separate
			each keyword with a comma (,) Eg. make money, fashion, email marketing</p>
	<?php endif; ?>
</div>

<!-- Link Expiration -->
<!--<div class="form-field form-required affiliate-advantage-form-group">-->
<!--	--><?php // if ( Plugin::get_instance()->has_valid_licence() ) : ?>
<!--        <label for="--><?php // echo $prefix ?><!--link_expiration_chooser">Link Expiration</label>-->
<!---->
<!--        <input type="hidden" name="--><?php // echo $prefix ?><!--link_expiration" id="--><?php // echo $prefix ?><!--link_expiration"-->
<!--               value="0">-->
<!---->
<!--        <select name="--><?php // echo $prefix ?><!--link_expiration_chooser" id="--><?php // echo $prefix ?><!--link_expiration_chooser">-->
<!--            <option value="never">Never</option>-->
<!--            <option value="date">Set Expiration Date</option>-->
<!--        </select>-->
<!---->
<!--        <div id="--><?php // echo $prefix ?><!--link_expiration_settings" style="display: none;">-->
<!--            <div style="display: flex; margin-top: 15px;">-->
<!--                <p style="margin-right: 10px; font-weight: 400; width: 12%">Set Expiration Date</p>-->
<!--                <input type="date" id="--><?php // echo $prefix ?><!--link_expiration_date" size="40" style="width: 40%">-->
<!--            </div>-->
<!---->
<!--            <div style="display: flex; margin-top: 15px;">-->
<!--                <p style="margin-right: 10px; font-weight: 400; width: 12%">Set Expiration Redirect Link</p>-->
<!--                <input type="url" id="--><?php // echo $prefix ?><!--link_expiration_link"-->
<!--                       name="--><?php // echo $prefix ?><!--link_expiration_link" style="width: 40%">-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!---->
<!--        <p class="affiliate-advantage-form-help-text">You can set your expire after a set date. You can also configure a url to-->
<!--            redirect to after expiration.</p>-->
<!--	--><?php // endif; ?>
<!---->
<!--	--><?php // if ( ! Plugin::get_instance()->has_valid_licence() ): ?>
<!--        <p><strong>Keywords auto-linking feature only available in PRO version. <a-->
<!--                        href="--><?php // echo \Level_Wp\Affiliate_Advantage\Plugin::get_instance()->upgrade_link() ?><!--">Upgrade-->
<!--                    now to access all features!</a></strong></p>-->
<!--	--><?php // endif; ?>
<!--</div>-->

<!-- Link Password -->
<div class="form-field form-required affiliate-advantage-form-group">
	<?php if ( Plugin::get_instance()->has_valid_licence() ) : ?>
		<label for="<?php echo esc_attr( $prefix ); ?>link_password_chooser">Password Protect Link</label>

		<input type="hidden" name="<?php echo esc_attr( $prefix ); ?>link_password" id="<?php echo esc_attr( $prefix ); ?>link_password"
			   value="<?php echo esc_attr( get_post_meta( $post->ID, 'password', true ) ); ?>">

		<select id="<?php echo esc_attr( $prefix ); ?>link_password_chooser">
			<option value="no">No</option>
			<option value="yes" <?php echo esc_attr( get_post_meta( $post->ID, 'password', true ) ? 'selected' : '' ); ?>>Yes</option>
		</select>

		<div id="<?php echo esc_attr( $prefix ); ?>link_password_settings" <?php echo esc_attr( ! get_post_meta( $post->ID, 'password', true ) ? 'style="display: none;"' : '' ); ?>>
			<div style="display: none; margin-top: 15px;" id="<?php echo esc_attr( $prefix ); ?>link_password_input">
				<p style="margin-right: 10px; font-weight: 400; width: 12%">Set Link Password</p>
				<input type="text" id="<?php echo esc_attr( $prefix ); ?>link_password_input" style="width: 40%" value="<?php echo esc_attr( get_post_meta( $post->ID, 'password', true ) ); ?>">
			</div>
		</div>


		<p class="affiliate-advantage-form-help-text">You can protect this link with a password which will be required before
			users can be redirected.</p>
	<?php endif; ?>

</div>

<?php if ( ! Plugin::get_instance()->has_valid_licence() ) : ?>
	<a href="<?php echo esc_attr( \Level_Wp\Affiliate_Advantage\Plugin::get_instance()->upgrade_link() ); ?>">
<!--		<img src="--><?php //echo esc_attr( Plugin::get_instance()->get_url() ); ?><!--/Assets/images/upgrade.png" alt="" width="500px" style="margin-bottom: 15px;">-->
        Purchase Premium Version for advanced link settings!
	</a>
<?php endif; ?>

<div class="form-field form-required">
    <p class="affiliate-advantage-form-help-text">You can set link options or leave the global optins defined in the settings
        page.</p>
</div>

<!-- Redirection Type -->
<div class="form-field form-required affiliate-advantage-form-group">
    <label class="affiliate-advantage-form-label info-label block">Redirection Type</label>
    <select name="<?php echo esc_attr( $prefix ) ?>redirection_type" id="" class="affiliate-advantage-form-control">
		<?php if ( ! get_post_meta( $post->ID, 'link_url', true ) ) : ?>
            <option value="<?php echo get_option( $prefix . 'redirection_type' ) ?>">
				<?php if ( get_option( $prefix . 'redirection_type' ) == '302' ): ?>
                    (Global Setting) 302 Temporary
				<?php elseif ( ( get_option( $prefix . 'redirection_type' ) == '307' ) ): ?>
                    (Global Setting) 307 Temporary
				<?php elseif ( ( get_option( $prefix . 'redirection_type' ) == '301' ) ): ?>
                    (Global Setting) 301 Permanent
				<?php endif; ?>
            </option>
		<?php endif; ?>
        <option value="302" <?php if ( get_post_meta( $post->ID, 'redirection_type', true ) == '302' ) : ?> selected <?php endif; ?>>
            302 Temporary
        </option>
        <option value="307" <?php if ( get_post_meta( $post->ID, 'redirection_type', true ) == '307' ) : ?> selected <?php endif; ?>>
            307 Temporary
        </option>
        <option value="301" <?php if ( get_post_meta( $post->ID, 'redirection_type', true ) == '301' ) : ?> selected <?php endif; ?>>
            301 Permanent
        </option>
    </select>
</div>

<!-- No Follow Link -->
<div class="form-field form-required affiliate-advantage-form-group">
    <label class="affiliate-advantage-form-label info-label block">No follow this link?</label>
    <select name="<?php echo $prefix ?>add_no_follow" id="" class="affiliate-advantage-form-control">
		<?php if ( ! get_post_meta( $post->ID, 'link_url', true ) ) : ?>
            <option value="<?php echo get_option( $prefix . 'add_no_follow' ) ?>">
				<?php if ( get_option( $prefix . 'add_no_follow' ) == '0' ): ?>
                    (Global Setting) No
				<?php else: ?>
                    (Global Setting) Yes
				<?php endif; ?>
            </option>
		<?php endif; ?>
        <option value="1" <?php if ( get_post_meta( $post->ID, 'add_no_follow', true ) == '1' ) : ?> selected <?php endif; ?>>
            Yes
        </option>
        <option value="0" <?php if ( get_post_meta( $post->ID, 'add_no_follow', true ) == '0' ) : ?> selected <?php endif; ?>>
            No
        </option>
    </select>
</div>

<!-- Open In New Tab -->
<div class="form-field form-required affiliate-advantage-form-group">
    <label class="affiliate-advantage-form-label info-label block">Open link in new
        tab?</label>
    <select name="<?php echo $prefix ?>open_in_new_tab" id="" class="affiliate-advantage-form-control">
		<?php if ( ! get_post_meta( $post->ID, 'link_url', true ) ) : ?>
            <option value="<?php echo get_option( $prefix . 'open_in_new_tab' ) ?>">
				<?php if ( get_option( $prefix . 'open_in_new_tab' ) == '0' ): ?>
                    (Global Setting) No
				<?php else: ?>
                    (Global Setting) Yes
				<?php endif; ?>
            </option>
		<?php endif; ?>
        <option value="1" <?php if ( get_post_meta( $post->ID, 'open_in_new_tab', true ) == '1' ) : ?> selected <?php endif; ?>>
            Yes
        </option>
        <option value="0" <?php if ( get_post_meta( $post->ID, 'open_in_new_tab', true ) == '0' ) : ?> selected <?php endif; ?>>
            No
        </option>
    </select>
</div>

<!-- Forward Query Parameters -->
<div class="form-field form-required affiliate-advantage-form-group">
    <label class="affiliate-advantage-form-label info-label block">Forward Query Parameters?</label>
    <select name="<?php echo $prefix ?>forward_parameters" id="" class="affiliate-advantage-form-control">
		<?php if ( ! get_post_meta( $post->ID, 'link_url', true ) ) : ?>
            <option value="<?php echo get_option( $prefix . 'forward_parameters' ) ?>">
				<?php if ( get_option( $prefix . 'forward_parameters' ) == '0' ): ?>
                    (Global Setting) No
				<?php else: ?>
                    (Global Setting) Yes
				<?php endif; ?>
            </option>
		<?php endif; ?>
        <option value="1" <?php if ( get_post_meta( $post->ID, 'forward_parameters', true ) == '1' ) : ?> selected <?php endif; ?>>
            Yes
        </option>
        <option value="0" <?php if ( get_post_meta( $post->ID, 'forward_parameters', true ) == '0' ) : ?> selected <?php endif; ?>>
            No
        </option>
    </select>
</div>

<!-- Uncloak Links -->
<div class="form-field form-required affiliate-advantage-form-group">
    <label class="affiliate-advantage-form-label info-label block">Uncloak Link?</label>
    <select name="<?php echo $prefix ?>uncloak" id="" class="affiliate-advantage-form-control">
		<?php if ( ! get_post_meta( $post->ID, 'link_url', true ) ) : ?>
            <option value="<?php echo get_option( $prefix . 'uncloak' ) ?>">
				<?php if ( get_option( $prefix . 'uncloak' ) == '0' ): ?>
                    (Global Setting) No
				<?php else: ?>
                    (Global Setting) Yes
				<?php endif; ?>
            </option>
		<?php endif; ?>
        <option value="1" <?php if ( get_post_meta( $post->ID, 'uncloak', true ) == '1' ) : ?> selected <?php endif; ?>>
            Yes
        </option>
        <option value="0" <?php if ( get_post_meta( $post->ID, 'uncloak', true ) == '0' ) : ?> selected <?php endif; ?>>
            No
        </option>
    </select>
</div>


<div class="futura_wrap">

<section><h1><?php _e( 'Design Setting Page', 'futura' ) ?></h1></section>

<section class="futura_menu">
    <?php $this->futura_admin_menu(); ?>
</section>


<section class="futura_form_section design">
<form method="POST" action="<?php print admin_url(); ?>admin.php?page=futura-design">
    <dl>
        <dt><?php _e( 'Please input Title, if you want to change from default message.', 'futura' ); ?><br>
            <?php _e( 'If empty, default text will be loaded.', 'futura' );  ?>
        </dt>
        <dd><input type="text" name="title_text" value="<?php print get_option('futura_title_text'); ?>" class="futura_input_w"></dd>
    </dl>
    <dl>
        <dt><?php _e( 'Please select background color.', 'futura' ) ?></dt>
        <dd><input type="color" name="background_color" value="<?php print get_option('futura_html_posts_wrap_bg_color'); ?>"></dd>
    </dl>
    <dl>
        <dt><?php _e( 'Please select border color.', 'futura' ) ?></dt>
        <dd><input type="color" name="border_color" value="<?php print get_option('futura_html_border_color'); ?>"></dd>
    </dl>
    <dl>
        <dt><?php _e( 'Please select title border color.', 'futura' ) ?></dt>
        <dd><input type="color" name="border_title_color" value="<?php print get_option('futura_html_border_title_color'); ?>"></dd>
    </dl>
    <dl>
        <dt><?php _e( 'Please put font size for title including font size unit.<br>The default size is 20px.', 'futura' ); ?></dt>
        <dd><input type="text" name="h3_font_size" value="<?php print get_option('futura_html_h3_font_size'); ?>"></dd>
    </dl>
    <dl>
        <dt><?php _e( 'Please put font size for post title including font size unit.<br>The default size is 15px.', 'futura' ); ?></dt>
        <dd><input type="text" name="post_title_font_size" value="<?php print get_option('futura_post_title_font_size'); ?>"></dd>
    </dl>
    <dl>
        <dt><?php _e( 'Please put font size for post summary including font size unit.<br>The default size is 14px.', 'futura' ); ?></dt>
        <dd><input type="text" name="summary_font_size" value="<?php print get_option('futura_summary_font_size'); ?>"></dd>
    </dl>
    <dl>
        <dt><?php _e( 'Please put font size for post author including font size unit.<br>The default size is 13px.', 'futura' ); ?></dt>
        <dd><input type="text" name="author_font_size" value="<?php print get_option('futura_author_font_size'); ?>"></dd>
    </dl>

    <p><strong><?php _e( 'You can change design by overwriting css.', 'futura' ) ?></strong></p>

    <dl>
        <dt><?php _e( 'If you checked, futura styles is not loaded.', 'futura' );  ?>
        </dt>
        <dd><input type="checkbox" name="deactivate_style" value="1" <?php if(get_option('futura_deactivate_style')): ?>checked="checked"<?php endif; ?>>&emsp;<?php _e( 'Deactivate', 'futura' );  ?></dd>
    </dl>

    <input type="hidden" name="futura-design_setting" value="1">    
    <input name="futura-submit" id="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />
</form>
</section>


<?php $this->admin_footer_area(); ?>


</div>

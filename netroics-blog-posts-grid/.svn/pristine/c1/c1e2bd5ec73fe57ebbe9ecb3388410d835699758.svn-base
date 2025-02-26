<?php

 /**
 * Netroics Adds a submenu page under a custom post type parent.
 */

function netroics_register_page() {
    add_submenu_page( 
        'edit.php?post_type=netroicstp',
        __( 'Settings', 'netroicst' ),
        __( 'Settings Netroics', 'netroicstp' ),
        'manage_options',
        'netroics-settings-pages',
        'netroics_page_callback'
    );
}

add_action('admin_menu', 'netroics_register_page');
 
/**
 * Display callback for the submenu page.
 */
function netroics_page_callback() { 
    ?>
    <div class="netroics__admin_wrap wrap">
        <div class="netroics_left_style">
            <h1><?php _e( 'Netroics Settings', 'netroicstp' ); ?></h1>
            <form action="options.php" method="post">
                <?php wp_nonce_field('update-options');?>
                <div class="netroicstp__dashboard_options">
                    <label name="title_color" for="title_color"><?php echo esc_attr(__('Netroics Title Color: ')); ?></label>
                    <input type="text" id="color_code" class="my-color-field" name="title_color" value="<?php echo esc_attr(get_option('title_color'));?>">
                </div>
                
                <div class="netroicstp__dashboard_options">
                    <label name="details_color" for="details_color"><?php echo esc_attr(__('Netroics Paragraph Color: ')); ?></label>
                    <input type="text" class="my-color-field" name="details_color" value="<?php echo esc_attr(get_option('details_color'));?>">
                </div>

                <div class="netroicstp__dashboard_options">
                    <label name="title_font_size" for="title_font_size"><?php echo esc_attr(__('Title Font Size: ')); ?></label>
                    <input type="text" name="title_font_size" placeholder="25px" value="<?php echo esc_attr(get_option('title_font_size'));?>">
                </div>
                
                <div class="netroicstp__dashboard_options">
                    <label name="paragraph_font_size" for="paragraph_font_size"><?php echo esc_attr(__('Paragraph Font Size: ')); ?></label>
                    <input type="text" name="paragraph_font_size" placeholder="18px" value="<?php echo esc_attr(get_option('paragraph_font_size'));?>">
                </div>

                <div class="netroicstp__dashboard_options">
                    <label name="netroics__blog_column_padding" for="netroics__blog_column_padding"><?php echo esc_attr(__('Blog Column Padding: ')); ?></label>
                    <input type="text" name="netroics__blog_column_padding" placeholder="15px"  value="<?php echo esc_attr(get_option('netroics__blog_column_padding'));?>">
                </div>

                <div class="netroicstp__dashboard_options">
                    <label name="netroics__blog_posts_number" for="netroics__blog_posts_number"><?php echo esc_attr(__('Blog Posts Show Numbers: ')); ?></label>
                    <input type="text" name="netroics__blog_posts_number" placeholder="6"  value="<?php echo esc_attr(get_option('netroics__blog_posts_number'));?>">
                </div>

                <div class="netroicstp__dashboard_options">
                    <label name="netroics__pagination_color" for="netroics__pagination_color"><?php echo esc_attr(__('Pagination Color: ')); ?></label>
                    <input type="text" class="my-color-field" name="netroics__pagination_color" value="<?php echo esc_attr(get_option('netroics__pagination_color'));?>">
                </div>

                <div class="netroicstp__dashboard_options">
                    <label name="netroics__pagination_Hovercolor" for="netroics__pagination_Hovercolor"><?php echo esc_attr(__('Pagination Hover Color: ')); ?></label>
                    <input type="text" class="my-color-field" name="netroics__pagination_Hovercolor" value="<?php echo esc_attr(get_option('netroics__pagination_Hovercolor'));?>">
                </div>

                <div class="netroicstp__dashboard_options">
                    <label name="netroics__pagination_Fontcolor" for="netroics__pagination_Fontcolor"><?php echo esc_attr(__('Pagination Text Color: ')); ?></label>
                    <input type="text" class="my-color-field" name="netroics__pagination_Fontcolor" value="<?php echo esc_attr(get_option('netroics__pagination_Fontcolor'));?>">
                </div>

                <input type="hidden" name="action" value="update"/>
                <input type="hidden" name="page_options" value="title_color, details_color,title_font_size,paragraph_font_size,netroics__blog_column_padding,netroics__blog_posts_number,netroics__pagination_color,netroics__pagination_Hovercolor,netroics__pagination_Fontcolor"/>
                <input type="submit" name="submit" value="<?php _e('Save Changes', 'netoricstp')?>">
            </form>
        </div>
        <div class="netroics__right_style">
            <h1><?php echo esc_attr('About The Author');?></h1>
            <p><?php echo esc_attr('Hello there, This is Md. Murad Hossain. I am a Web Developer, Expert On WordPress CMS. I am available for interesting freelance projects. If you ever need my help, do not hesitate to get in touch');?> <a href="https://www.upwork.com/freelancers/~01d4c394a558dba849" target="_blank"><?php echo esc_attr('me');?></a>.<br />
            <strong><?php echo esc_attr('Skype:');?></strong> <?php echo esc_attr('murad01738');?><br />
            <strong><?php echo esc_attr('Email:');?></strong> <?php echo esc_attr('hellomurad10@gmail.com');?><br />
            <strong><?php echo esc_attr('Web:');?></strong> <a href="https://netroics.com/" target="_blank"><b><mark><?php echo esc_attr('www.netroics.com');?></mark></b></a><br />
            <!-- <strong>Hire Me on:</strong> <a href="https://www.upwork.com/freelancers/~01d4c394a558dba849" target="_blank">UpWork</a> -->
            </p>
        </div>
    </div>
    <?php
}
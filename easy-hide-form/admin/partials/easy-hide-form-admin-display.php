<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link       https://bitbucket.org/allouise/easy-hide-form/
 * @since      1.0.0
 *
 * @package    Alf_Easy_Hide_Form
 * @subpackage Alf_Easy_Hide_Form/admin/partials
 */
?>

<div id="<?php echo $this->plugin_name."_wrap"; ?>" class="wrap">
    <h2 class="text-center"><img style=" height: 50px; vertical-align: middle;" src="<?php echo plugins_url( 'easy-hide-form/images/icon.png' ); ?>"/> <?php echo esc_html( get_admin_page_title() ); ?></h2>
        
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
        <?php
            settings_fields( $this->plugin_name );
            do_settings_sections( $this->plugin_name );
            submit_button();
        ?>
    </form>

    <blockquote style="text-align: center; ">
        Do you require someone to code Custom Wordpress Plugin or any Site Customizations? Lets work together! <a href="mailto:elixirlouise@gmail.com"><strong>elixirlouise@gmail.com</strong></a>. | <a href="https://paypal.me/allouise" target="_blank" style="color: #14b394;"><strong>Donate</strong></a><br/>
        <small><a href="https://bitbucket.org/allouise/easy-hide-form/" target="_blank">allysonflores.com</a></small>
    </blockquote>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#hide-comment-form').on('change', function(){
                if( jQuery(this).prop('checked') == true ){
                    jQuery('[name="aehf_posts_hidden[]"]:not(:checked)').prop('checked', true);
                }else{
                    jQuery('[name="aehf_posts_hidden[]"]:checked').prop('checked', false);
                }
            });
        });
    </script>
</div>


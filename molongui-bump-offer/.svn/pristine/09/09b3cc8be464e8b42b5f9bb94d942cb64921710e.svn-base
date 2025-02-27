<?php

?>
<div id="molongui-bump-shortcode" class="molongui-metabox">

    <div class="m-field">
        <p class="m-description">
            <?php _e( "Increase your sales by displaying this deal in key locations. As easy as adding the shortcode there where you want this sales promotion to be shown:", 'molongui-bump-offer' ); ?>
        </p>
        <code>[molongui_deal id=<?php echo $post->ID; ?>]</code>
        <?php if ( apply_filters( 'mbo/display/pro/hints', '__return_true' ) ) : ?>
            <div class="pro-note">
                <?php printf( __( "This shortcode is only available in the %sPRO version%s of the plugin.", 'molongui-bump-offer' ), '<a href="'.MOLONGUI_BUMP_OFFER_WEB.'">', '</a>' ); ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<div id="molongui-bump-no-shortcode" style="display:none;">
    <div>
        <code><?php _e( "No shortcode available since configuration set makes nothing to be displayed in your store. This might be because the selected deal type (free shipping?) does not display anything or you have checked the 'Hide Box' setting.", 'molongui-bump-offer' ); ?></code>
    </div>
</div>
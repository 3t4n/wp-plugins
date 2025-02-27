<?php

?>

<div id="molongui-bump-preview">
	<?php
        add_filter( 'bump/is_preview', '__return_true' );
        mbo_render( $bump );
        echo '<div class="molongui-preview-note">';
            echo '<span class="dashicons dashicons-info-outline"></span>';
            echo '<div>';
                _e( "How the bump is displayed in your site's frontend could differ slightly from what is shown here.", 'molongui-bump-offer' );
            echo '</div>';
        echo '</div>';
        echo '<div class="molongui-preview-note">';
            echo '<span class="dashicons dashicons-info-outline"></span>';
            echo '<div>';
                _e( "To show how image position setting works, image responsiveness is disabled on this preview. It will work in your Shop if you enable the setting.", 'molongui-bump-offer' );
            echo '</div>';
        echo '</div>';
    ?>
</div>
<div id="molongui-bump-no-preview" style="display:none;">
    <div>
        <code><?php _e( "No preview available since configuration set makes nothing to be displayed in your store. This might be the because selected deal type (free shipping?) does not display anything or you have checked the 'Hide Box' setting.", 'molongui-bump-offer' ); ?></code>
    </div>
</div>
<?php
/**
 * Templates Library
 */

?>



<div class="wpsection-library">
    <div class="wpsection-library-header">
        <button class="active btn" id="all"><?php esc_html_e( 'Show All', 'wpsection' ); ?></button>
        <button class="btn" id="theme"><?php esc_html_e( 'Theme', 'wpsection' ); ?></button>
        <button class="btn" id="template"><?php esc_html_e( 'Home Template', 'wpsection' ); ?></button>
        <button class="btn" id="shop"><?php esc_html_e( 'WooCommerce', 'wpsection' ); ?></button>
        <button class="btn" id="landing"><?php esc_html_e( 'Landing Page', 'wpsection' ); ?></button>
        <button class="btn" id="section"><?php esc_html_e( 'Sections', 'wpsection' ); ?></button>
        <button class="btn" id="block"><?php esc_html_e( 'Block', 'wpsection' ); ?></button>
        
        <div class="template-search">
            <input type="text" placeholder="<?php esc_html_e( 'Start typing...', 'wpsection' ); ?>">
        </div>
    </div>

    <div class="wpsection-templates">
		
		   <h3><?php esc_html_e( 'Templates:', 'wpsection' ); ?></h3>
		
        <?php foreach ( wpsection()->get_plugin_data( 'templates' ) as $template_id => $template_group ) : ?>
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=wpsection-library&template-group=' . $template_id ) ); ?>"
               data-filter-tags="<?php echo esc_attr( implode( '-', wpsection()->get_settings_atts( 'tags', array(), $template_group ) ) ); ?>"
               class="wpsection-template <?php echo esc_attr( implode( ' ', wpsection()->get_settings_atts( 'tags', array(), $template_group ) ) ); ?>">
               
                <img src="<?php echo esc_url( wpsection()->get_template_group_thumb( $template_group ) ); ?>"
                     alt="<?php echo esc_attr( wpsection()->get_settings_atts( 'title', '', $template_group ) ); ?>">
                <div class="template-details">
                    <h3><?php echo esc_html( wpsection()->get_settings_atts( 'title', '', $template_group ) ); ?></h3>
                    <div class="template-info">
                        <span><?php echo esc_html( sprintf( '%s Pages', count( wpsection()->get_settings_atts( 'pages', '', $template_group ) ) ) ); ?></span>
                        <div class="template-tags">
                            <?php
                            $tags = wpsection()->get_settings_atts( 'tags', array(), $template_group );
                            if ( ! empty( $tags ) ) {
                                foreach ( $tags as $tag ) {
                                    echo sprintf( '<span>%s</span>', esc_html( $tag ) );
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>



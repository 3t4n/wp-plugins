<?php
namespace AEFE\Admin\Traits;

trait Pattern_Field_Renderer {

    protected function render_pattern_field( $option_name, $type ) {
        $value = get_option( $option_name, '' );
        $examples = $this->get_pattern_examples( $type );
        ?>
        <div class="aefe-pattern-field">
            <textarea 
                class="large-text code" 
                rows="5" 
                name="<?php echo esc_attr( $option_name ); ?>" 
                placeholder="<?php echo esc_attr( implode( ', ', $examples ) ); ?>"
                aria-label="<?php echo esc_attr( $this->get_aria_label( $type ) ); ?>"
            ><?php echo esc_textarea( $value ); ?></textarea>
            
            <div class="aefe-pattern-tips">
                <p class="description">
                    <?php esc_html_e( 'Example patterns:', 'advanced-email-filter-for-elementor-forms' ); ?>
                    <?php foreach ( $examples as $example ) : ?>
                        <code><?php echo esc_html( $example ); ?></code>
                    <?php endforeach; ?>
                </p>
            </div>
        </div>
        <?php
    }

    private function get_pattern_examples( $type ) {
        return $type === 'blocklist' 
            ? ['@spam.com', '*.ru', 'fake-user@']
            : ['@yourcompany.com', 'admin@', '*.trusted.org'];
    }

    private function get_aria_label( $type ) {
        return $type === 'blocklist'
            ? __( 'Enter email patterns to block', 'advanced-email-filter-for-elementor-forms' )
            : __( 'Enter email patterns to allow', 'advanced-email-filter-for-elementor-forms' );
    }

}
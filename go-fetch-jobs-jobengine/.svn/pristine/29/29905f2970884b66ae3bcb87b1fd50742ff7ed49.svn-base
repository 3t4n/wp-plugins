<?php

/**
 * Specific admin settings for JobEngine.
 *
 * @package GoFetch/JobEngine
 */
class GoFetch_JobEngine_Specific_Settings extends GoFetch_JobEngine_Admin_Settings
{
    public function __construct()
    {
        add_filter( 'goft_je_meta_fields', array( $this, 'meta_fields' ) );
        add_filter( 'goft_je_user_roles', array( $this, 'user_roles' ) );
        add_filter( 'goft_je_geocomplete_hidden_fields', array( $this, 'geocomplete_hidden_fields' ) );
        add_filter( 'goft_je_form_extra_content', array( $this, 'other_hidden_fields' ) );
        add_filter(
            'goft_je_default_value_for_field',
            array( $this, 'default_value_for_field' ),
            10,
            2
        );
        add_filter(
            'goft_je_default_value_for_taxonomy',
            array( $this, 'default_value_for_tax' ),
            10,
            3
        );
    }
    
    /**
     * JobEngine Meta Fields.
     */
    public function meta_fields( $fields )
    {
        $fields = array(
            array(
            'title'  => __( 'Featured', 'gofetch-je' ),
            'name'   => '_blank',
            'type'   => 'custom',
            'render' => array( $this, 'output_featured_meta_field' ),
        ),
            array(
            'title'  => __( 'Expiry Date', 'gofetch-je' ),
            'name'   => '_blank',
            'type'   => 'custom',
            'tip'    => __( 'Choose the expiry date for the jobs being imported.', 'gofetch-je' ),
            'render' => array( $this, 'output_expiry_field' ),
        ),
            array(
            'title' => __( 'Location', 'gofetch-je' ),
            'name'  => 'meta[et_location]',
            'extra' => array(
            'class'          => 'geocomplete regular-text',
            'placeholder'    => __( 'e.g: Lisbon', 'gofetch-je' ),
            'data-default'   => __( 'Anywhere', 'gofetch-je' ),
            'data-core-name' => 'location',
        ),
            'tip'   => __( 'The location for the jobs being imported.', 'gofetch-je' ),
            'desc'  => '<br/><img class="goft-powered-by-google" src="' . esc_url( GoFetch_JobEngine()->plugin_url() . '/includes/admin/assets/images/powered_by_google_on_white_hdpi.png' ) . '"">',
            'value' => $this->get_default_value_for_meta( 'et_location' ),
        ),
            array(
            'title' => __( 'How To Apply', 'gofetch-je' ),
            'name'  => 'meta[et_applicant_detail]',
            'type'  => 'textarea',
            'extra' => array(
            'class'   => 'large-text',
            'rows'    => 5,
            'cols'    => 10,
            'section' => 'meta',
        ),
            'value' => $this->get_default_value_for_meta( 'et_applicant_detail' ),
            'desc'  => __( 'HTML is allowed.', 'gofetch-je' ) . ' ' . __( 'You may use the following placeholder variable within this field. It MUST have the percentage signs wrapped around it with no spaces.', 'gofetch-jobs' ) . '<br/><br/>' . sprintf( __( '%s This placeholder will be replaced by the respective external job URL.', 'gofetch-jobs' ), '<code>%external_apply_to_url%</code>' ),
        )
        );
        return $fields;
    }
    
    /**
     * JobEngine user roles.
     */
    public function user_roles( $roles )
    {
        $roles[] = 'company';
        return $roles;
    }
    
    /**
     * Geolocation meta fields.
     */
    public function geocomplete_hidden_fields( $fields )
    {
        return array(
            'et_location_lat'  => 'lat',
            'et_location_lng'  => 'lng',
            'et_full_location' => 'formatted_address',
        );
    }
    
    /**
     * Output additional form hidden fields.
     */
    public function other_hidden_fields( $content )
    {
        $fields = array();
        foreach ( $fields as $field => $atts ) {
            $content .= $this->input( $atts );
        }
        return $content;
    }
    
    /**
     * The default value to use on a given meta field.
     */
    public function default_value_for_field( $value, $field )
    {
        switch ( $field ) {
            case 'et_expired_date':
                $value = date( 'Y-m-d', strtotime( current_time( 'mysql' ) . ' +30 days' ) );
                break;
            case 'et_applicant_detail':
                $value = __( 'Apply to this job by clicking this <a href="%external_apply_to_url%">link</a>', 'gofetch-je' );
                break;
        }
        return $value;
    }
    
    /**
     * Default to use on a given taxonomy.
     */
    public function default_value_for_tax( $value, $tax, $slug = '' )
    {
        switch ( $tax ) {
            case 'job_category':
            case 'job_type':
                $args = array(
                    'number'     => 1,
                    'fields'     => 'id=>slug',
                    'hide_empty' => false,
                );
                if ( $slug ) {
                    $args['slug'] = $slug;
                }
                $terms = get_terms( $tax, $args );
                if ( !empty($terms) && !is_wp_error( $terms ) ) {
                    $value = reset( $terms );
                }
                break;
        }
        return $value;
    }
    
    /**
     * Outputs the date interval settings.
     */
    public function output_expiry_field()
    {
        $atts = array(
            'type'  => 'text',
            'name'  => 'meta[et_expired_date]',
            'extra' => array(
            'section'      => 'meta',
            'class'        => 'span_date meta-job-expires',
            'style'        => 'width: 120px;',
            'placeholder'  => __( 'click to choose...', 'gofetch-je' ),
            'readonly'     => true,
            'data-default' => $this->get_default_value_for_meta( 'et_expired_date' ),
        ),
            'desc'  => html( 'a', array(
            'class'            => 'button clear_span_dates',
            'data-goft_parent' => 'meta-job-expires',
        ), __( 'Clear', 'gofetch-je' ) ),
            'value' => $this->get_default_value_for_meta( 'et_expired_date' ),
        );
        ?>
		<script>
			jQuery(document).ready(function($) {

				// Date picker.
				$('.meta-job-expires').datepicker({
					dateFormat: 'yy-mm-dd',
					changeMonth: true,
				});

			});
		</script>
<?php 
        return $this->input( $atts );
    }
    
    /**
     * Outputs a meta field.
     */
    public function output_featured_meta_field()
    {
        return apply_filters( 'goft_je_setting_meta_featured', false );
    }
    
    /**
     * Outputs the featured meta field.
     */
    public static function _output_featured_meta_field( $output )
    {
        $atts = array(
            'type'  => 'checkbox',
            'name'  => 'meta[et_featured]',
            'tip'   => __( 'Check this option to feature all jobs being imported.', 'gofetch-je' ),
            'extra' => array(
            'section'      => 'meta',
            'data-default' => '1',
        ),
        );
        return scbForms::input( $atts );
    }

}
new GoFetch_JobEngine_Specific_Settings();
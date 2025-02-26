<?php

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

class HTSirve_Admin_Options{
    public function __construct(){
        add_action('admin_enqueue_scripts', [ $this, 'htsirve_enqueue_admin_style' ] );
        $this->htsirve_admin_settings_post();
        //Sirve Post States Init
        add_filter('display_post_states', [ $this, 'sirve_custom_post_states' ]);
        // Sirve permalink Init
        add_action( 'load-options-permalink.php', [ $this, 'sirve_permalink_init' ]);

        // Product category custom field
        add_action('sirve_category_add_form_fields', [ $this, 'taxonomy_add_new_meta_field' ], 15, 1 );
        add_action('sirve_category_edit_form_fields', [ $this, 'taxonomy_edit_meta_field' ], 15, 1 );
        add_action('edited_sirve_category', [ $this, 'save_taxonomy_custom_meta' ], 15, 1 );
        add_action('create_sirve_category', [ $this, 'save_taxonomy_custom_meta' ], 15, 1 );

        // Product Tag custom field
        add_action('sirve_tag_add_form_fields', [ $this, 'taxonomy_add_new_meta_field' ], 15, 1 );
        add_action('sirve_tag_edit_form_fields', [ $this, 'taxonomy_edit_meta_field' ], 15, 1 );
        add_action('edited_sirve_tag', [ $this, 'save_taxonomy_custom_meta' ], 15, 1 );
        add_action('create_sirve_tag', [ $this, 'save_taxonomy_custom_meta' ], 15, 1 );
    }

    public function htsirve_enqueue_admin_style($hook){
        $post_type = (isset($_GET['post_type'])) ? sanitize_text_field($_GET['post_type']) : '';
        if( 'sirve' === get_post_type() || 'sirve' === $post_type || 'options-permalink.php' === $hook){
            wp_enqueue_style( 'sirve-admin', SIRVE_PL_URL . 'admin/assets/css/admin-options-panel.css', FALSE, SIRVE_VERSION );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_script( 'sirve-color-picker', SIRVE_PL_URL . 'admin/assets/js/admin-main.js', array( 'wp-color-picker' ), SIRVE_VERSION, TRUE );
        }
    }
    //Sirve Post States 
    public function sirve_custom_post_states( $states ) {
        if ( ( '1' == get_post_meta( get_the_ID(), 'htSirveFeaturePost', true ) ) ) {
            $states[] = __('Sticky', 'sirve');
        }
        return $states;
    }

    // Sirve permalink Options
    function sirve_permalink_init(){
         //Sirve Base Slug update
        if( isset( $_POST['sirve_permalink_base'] ) ){
            update_option( 'sirve_permalink_base', sanitize_text_field( $_POST['sirve_permalink_base'] ) );
        }
        //Sirve Permalink Description
        add_settings_section( 'sirve_permalink_section', __('Sirve Permalink', 'sirve'), array($this,'ht_sirve_permalink_callback'), 'permalink');
        //Sirve Base Slug
        add_settings_field( 'sirve_permalink_base', __( 'Custom Base','sirve' ), [$this, 'sirve_permalink_callback'], 'permalink', 'sirve_permalink_section' );


        //Sirve Catagory Base Slug update
        if( isset( $_POST['sirve_category_permalink_base'] ) ){
            update_option( 'sirve_category_permalink_base', sanitize_text_field( $_POST['sirve_category_permalink_base'] ) );
        }
        //Sirve Category Slug
        add_settings_field( 'sirve_category_permalink_base', __( 'Category Base','sirve' ), [$this, 'sirve_category_permalink_callback'], 'permalink', 'sirve_permalink_section' );

        
        //Sirve Tag Base Slug update
        if( isset( $_POST['sirve_tag_permalink_base'] ) ){
            update_option( 'sirve_tag_permalink_base', sanitize_text_field( $_POST['sirve_tag_permalink_base'] ) );
        }
        //Sirve tag Slug
        add_settings_field( 'sirve_tag_permalink_base', __( 'Tag Base','sirve' ), [$this, 'sirve_tag_permalink_callback'], 'permalink', 'sirve_permalink_section' );


         //Sirve Type Base Slug update
         if( isset( $_POST['sirve_event_permalink_base'] ) ){
            update_option( 'sirve_event_permalink_base', sanitize_text_field( $_POST['sirve_event_permalink_base'] ) );
        }
        //Sirve Type Slug
        add_settings_field( 'sirve_event_permalink_base', __( 'Type Base','sirve' ), [$this, 'sirve_event_permalink_callback'], 'permalink', 'sirve_permalink_section' );
    }

    function ht_sirve_permalink_callback(){ 
        echo "<p>". esc_html__('You may input custom structures for your category and tag URLs here if you like. For instance, your category links will look like ','sirve') ."<code>". site_url('/sirve/sample-list-post/') . "</code>". esc_html__('in case you use sirve as your category base. Whatever you put in this box will be saved as custom base permalink. In case you don\'t put anything here and leave the blank, the default permalink will be used.','sirve')."</p>";
    }

    //Custom Base
    function sirve_permalink_callback(){
        $value = get_option( 'sirve_permalink_base' );
        echo '<code>' . site_url('/') . '</code>';	
        echo '<input type="text" value="' . esc_attr( $value ) . '" name="sirve_permalink_base" id="sirve_permalink_base" placeholder='. esc_html__( 'sirve', 'sirve').' class="regular-text sirve_permalink" />';
        echo '<code>'. esc_html__( '/sample-list-post/', 'sirve'). '</code>';	
    }

    //Category Base
    function sirve_category_permalink_callback(){
        $value = get_option( 'sirve_category_permalink_base' );
        echo '<code>' . site_url('/') . '</code>';	
        echo '<input type="text" value="' . esc_attr( $value ) . '" name="sirve_category_permalink_base" id="sirve_category_permalink_base" placeholder='. esc_html( 'sirve_category').' class="regular-text sirve_permalink" />';
        echo '<code>'. esc_html__( '/category-one/', 'sirve'). '</code>';	
    }

    //Tag Base
    function sirve_tag_permalink_callback(){
        $value = get_option( 'sirve_tag_permalink_base' );
        echo '<code>' . site_url('/') . '</code>';	
        echo '<input type="text" value="' . esc_attr( $value ) . '" name="sirve_tag_permalink_base" id="sirve_tag_permalink_base" placeholder='. esc_html( 'sirve_tag').' class="regular-text sirve_permalink" />';
        echo '<code>'. esc_html__( '/tag-one/', 'sirve'). '</code>';	
    }

    function sirve_event_permalink_callback(){
        $value = get_option( 'sirve_event_permalink_base' );
        echo '<code>' . site_url('/') . '</code>';	
        echo '<input type="text" value="' . esc_attr( $value ) . '" name="sirve_event_permalink_base" id="sirve_event_permalink_base" placeholder='. esc_html( 'sirve_type').' class="regular-text sirve_permalink" />';
        echo '<code>'. esc_html__( '/type-one/', 'sirve'). '</code>';	
    }


    //

    /**
     * Add field in new category add screen
     *
     * @return void
     */
    public function taxonomy_add_new_meta_field($tets){
        ?>
        
            <div class="form-field term-description-wrap">
                <label for="tag-description"><?php esc_html__( 'Footer Content', 'sirve' );?></label>
                <?php $settings = array(
                    'textarea_name' => 'footer_content',
                    'textarea_rows' => 7,
                    'editor_class'  => 'i18n-multilingual',
                );
                wp_editor( '', 'sirve-add-meta-footer-description', $settings );?>
                <p class="sirve-footer-description"><?php echo esc_html__( 'The Content to show what appears as "Footer Content”.','sirve' ); ?></p>
                
                <!-- Script -->
                <script>
                    jQuery(function () {
                        jQuery('#addtag').on('mousedown', '#submit', function () {
                            tinyMCE.triggerSave();

                            jQuery(document).bind('ajaxSuccess.vtde_add_term', function () {
                                if (tinyMCE.activeEditor) {
                                    tinyMCE.activeEditor.setContent('');
                                }
                                jQuery(document).unbind('ajaxSuccess.vtde_add_term', false);
                            });
                        });
                    });
			    </script>
            </div>
        <?php
    }

    /**
     * Add field in category edit screen
     *
     * @return void
     */
    public function taxonomy_edit_meta_field( $term ){
        //getting term ID
        $term_id = $term->term_id;
        

        // retrieve the existing value(s) for this meta field.
        $footer_content = get_term_meta( $term_id, 'footer_content', true);
        $settings = array(
			'textarea_name' => 'footer_content',
			'textarea_rows' => 7,
			'editor_class'  => 'i18n-multilingual',
		);

		?>
		<tr class="form-field term-description-wrap">
			<th scope="row">
				<label for="footer_content"><?php echo esc_html__( 'Footer Content', 'sirve' ); ?></label>
			</th>
			<td>
				<?php wp_editor(  $footer_content , 'footer_content', $settings ); ?>
				<p class="sirve-footer-description"><?php echo esc_html__( 'The Content to show what appears as "Category Footer”.','sirve' ); ?></p>
			</td>
		</tr>
        <?php
    }

    /**
     * Data extra taxonomy field data
     *
     * @return void
     */
    public function save_taxonomy_custom_meta( $term_id ) {
        $sirve_category_footer_content = filter_input( INPUT_POST, 'footer_content' );
        update_term_meta( $term_id, 'footer_content', $sirve_category_footer_content );
    }

    public function htsirve_admin_settings_post(){
        require_once( SIRVE_PL_PATH. '/admin/classes/class.custom-post-type.php');
        require_once( SIRVE_PL_PATH. '/admin/classes/class.manage.post-columns.php');
        require_once( SIRVE_PL_PATH. '/admin/classes/class.recommended_Plugins.php');
        require_once( SIRVE_PL_PATH. '/admin/classes/class.recommended_plugins_menu_call.php');
        require_once( SIRVE_PL_PATH. '/admin/classes/class.admin-settings.php');
        require_once( SIRVE_PL_PATH. '/admin/include/custom-meta-fields.php');
    }

}
new HTSirve_Admin_Options();


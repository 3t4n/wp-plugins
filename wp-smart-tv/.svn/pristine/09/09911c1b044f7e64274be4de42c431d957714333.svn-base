<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Media_Blaster
 * @subpackage Media_Blaster/includes
 * @author     Your Name <email@example.com>
 */
class Wp_Smart_Tv_content_meta {

    public function __construct() {
       $this->get_metabox();
	}
    
    private function get_metabox() {
        global $wpstv_tools;
        $tv_settings = get_option('rovidx_smart_tv_options');
        
        $prefix = 'rovidx_smarttv_';
        $menuIcon = plugins_url('assets/img/rovidx-smart-tv-for-wordpress-video-data.icon.png',__DIR__);

        $ret = $wpstv_tools->get_enabled_post_types();
        
        $args = array(
            'id'            => $prefix . 'metabox',
            'title'         => '<i class="fas fa-tv"></i> Video Data',
            'object_types'  => $ret, // Post type
            'priority'   => 'high',
            'closed'     => false, // true to keep the metabox closed by default

        );
               
        $video_meta = new_cmb2_box( $args );
       
        $video_meta->add_field( array(
            'name'       => esc_html__( 'Media URL', 'wp-smart-tv' ),
            'desc'       => esc_html__( 'URL of the video media.  Must be equal to Video Format. EX: HLS, MP4, etc.', 'wp-smart-tv' ),
            'id'         => $prefix . 'URL',
            'type'       => 'text_url',
            'attributes' => array(
                'data-validation' => 'required',
            ),
        
        ) );
        $video_meta->add_field( array(
            'name'       => esc_html__( 'Duration', 'wp-smart-tv' ),
            'desc'       => esc_html__( 'Duration in Seconds or hh:mm:ss format.  (WPSTV will convert timecode to seconds automatically.)', 'wp-smart-tv' ),
            'id'         => $prefix . 'Duration',
            'type'       => 'text',


            'before_field' => '<div id="timecodeWrap"><div id="rovidx-duration-information">00:00:00</div></div>',
            'attributes' => array(
                'data-validation' => 'required',
            ),
        ) );	
        $video_meta->add_field( array(
            'name'             => esc_html__( 'Video Format', 'wp-smart-tv' ),
            'desc'             => esc_html__( 'Please Note: The HTML5 video player included with WP-Smart TV currently only supports MP4 & HLS streams.  Roku Direct Publisher will accept all options listed.', 'wp-smart-tv' ),
            'id'               => $prefix . 'format',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => array(
                'MP4' => 'MP4',
                'MOV' => 'MOV',
                'M4V' => 'M4V',
                'HLS' => 'HLS',
                'SMOOTH'=> 'SMOOTH',
                'DASH' => 'DASH',
            ),

        ) );

        $video_meta->add_field( array(
            'name'             => esc_html__( 'Quality', 'wp-smart-tv' ),
            'desc'             => esc_html__( 'Quality of Video: SD (240p, 360p, 480p), HD (720p), FHD (1080p), UHD (4k)', 'wp-smart-tv' ),
            'id'               => $prefix . 'quality',
            'type'             => 'select',
            //'show_option_none' => true,
            'options'          => array(
                'SD' => esc_html__('SD', 'wp-smart-tv'),
                'HD' => esc_html__( 'HD', 'wp-smart-tv' ),
                'FHD' => esc_html__( 'FHD', 'wp-smart-tv' ),
                'UHD' => esc_html__( 'UHD', 'wp-smart-tv' ),
            )
        ) );



        $video_meta->add_field( array(
            'name'    => 'Genres',
            'desc'    => '',
            'id'      => $prefix . 'genres',
            'type'    => 'multicheck_inline',
            'select_all_button' => false,
            'options' => $wpstv_tools->get_genre_list(),
            'attributes' => array(
                'data-validation' => 'required',
            ),
        ) );

        $video_meta->add_field( array(
            'name'             => esc_html__( 'Parental Rating', 'wp-smart-tv' ),
            'desc'			   => __('', 'wp-smart-tv'),
            'id'               => $prefix . 'rating',
            'type'             => 'select',
            'show_option_none' => false,
            'options'          => $wpstv_tools->get_parental_ratings()
        ) );

        /********************************************************************************** CC Support **********************************************************************************/
        if (isset($tv_settings['rovidx_smart_tv_subtitle_enabled'])) {
        
            $args = array(
                'id'            => $prefix . 'cc_metabox',
                'title'         => '<i class="far fa-closed-captioning"></i> Closed Captions/Subtitles',
                'object_types'  => $ret, // Post type
                // 'show_on_cb' => 'rovidx_smart_tv_show_if_front_page', // function should return a bool value
                // 'context'    => 'normal',
                'priority'   => 'high',
                // 'show_names' => true, // Show field names on the left
                 'cmb_styles' => false, // false to disable the CMB stylesheet
                'closed'     => true, // true to keep the metabox closed by default
                'tab_group'    => 'rovidx_smart_content_meta',
                'tab_title'    => 'Closed Captions',
            );

            $cc_meta = new_cmb2_box( $args );

            // VTT Group
            $vttGroup = $cc_meta->add_field( array(
                'id'          => $prefix . 'cc',
                'type'        => 'group',
                //'description' => __( 'Add Closed Caption support', 'wp-smart-tv' ),
                'repeatable'  => true, // use false if you want non-repeatable group
                'before_row' => '<div class="aws_full_row">',
                'after_row' => '</div>',
                'options'     => array(
                    'group_title'   => __( 'Closed Caption File #{#}', 'wp-smart-tv' ), // since version 1.1.4, {#} gets replaced by row number
                    'add_button'    => __( 'Add another CC file', 'wp-smart-tv' ),
                    'remove_button' => __( '<i class="fa fa-trash-alt"></i> Remove file', 'wp-smart-tv' ),
                    'sortable'      => false, // beta
                    'closed'     => false, // true to have the groups closed by default
                ),
            ) );

            $cc_meta->add_group_field( $vttGroup, array(
                'name'    => 'Closed Caption File',
                'desc'    => 'Upload an VTT file',
                'id'      => $prefix . 'cc_uri',
                'type'    => 'file',
                'query_args' => array( 'type' => 'text/vtt'),
                'closed'     => false,
                'options' => array(
                    'url' => true, // Hide the text input for the url
                ),
                'text'    => array(
                    'add_upload_file_text' => 'Add VTT/SRT File' // Change upload button text. Default: "Add or Upload File"
                ),
            ) );	
            $cc_meta->add_group_field( $vttGroup, array(
                'name'             => esc_html__( 'Language', 'wp-smart-tv' ),

                'id'               => $prefix . 'cc_lang',
                'type'             => 'select',
                'show_option_none' => true,
                'options'          => $wpstv_tools->build_language_opt()
            ) );
            $cc_meta->add_group_field( $vttGroup, array(
                'name'             => esc_html__( 'Type', 'wp-smart-tv' ),

                'id'               => $prefix . 'cc_type',
                'type'             => 'select',
                'show_option_none' => true,
                'options'          => array(
                    'CLOSED_CAPTION' => esc_html__('Closed Caption', 'wp-smart-tv'),
                    'SUBTITLE' => esc_html__('Sub Title', 'wp-smart-tv')
                ),

            ) );
        }
        /********************************************************************************** BIF Support **********************************************************************************/
        if (isset($tv_settings['rovidx_smart_tv_trickplay_enabled'])) {
            $args = array(
                'id'            => $prefix . 'bif_metabox',
                'title'         => '<i class="fas fa-film"></i> Trickplay',
                'object_types'  => $ret, // Post type
                // 'show_on_cb' => 'rovidx_smart_tv_show_if_front_page', // function should return a bool value
                // 'context'    => 'normal',
                'priority'   => 'high',
                // 'show_names' => true, // Show field names on the left
                'cmb_styles' => false, // false to disable the CMB stylesheet
                'closed'     => true, // true to keep the metabox closed by default
                'tab_group'    => 'rovidx_smart_content_meta',
                'tab_title'    => 'Trickplay',
            );

            if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
                $args['display_cb'] = array($this,'options_display_with_tabs');
            }

            $bif_meta = new_cmb2_box( $args );
            // VTT Group
            $bifGroup = $bif_meta->add_field( array(
                'id'          => $prefix . 'bif',
                'type'        => 'group',

                'repeatable'  => true, // use false if you want non-repeatable group
                'options'     => array(
                'group_title'   => __( 'Trickplay #{#}', 'wp-smart-tv' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Add another BIF', 'wp-smart-tv' ),
                'remove_button' => __( 'Remove BIF', 'wp-smart-tv' ),
                'sortable'      => false, // beta
                'closed'     => false, // true to have the groups closed by default
                ),
            ) );

            $bif_meta->add_group_field( $bifGroup, array(
                'name'    => 'Trick Play File',
                'desc'    => 'Upload an BIF file',
                'id'      => $prefix . 'bif_uri',
                'type'    => 'file',
                'query_args' => array( 'type' => 'image/x-biff' ),
                'closed'     => false,
                'options' => array(
                    'url' => true, // Hide the text input for the url
                ),
                'text'    => array(
                    'add_upload_file_text' => 'Upload BIF File' // Change upload button text. Default: "Add or Upload File"
                ),
            ) );	

            $bif_meta->add_group_field( $bifGroup, array(
                'name'             => esc_html__( 'BIF Definition', 'wp-smart-tv' ),
                'desc'			   => __('Recommended settings: 320x180 HD 16x9', 'wp-smart-tv'),
                'id'               => $prefix . 'bif_def',
                'type'             => 'select',
                'show_option_none' => true,
                'options'          => array(
                    'HD' => esc_html__('HD (720p)', 'wp-smart-tv'),
                    'FHD' => esc_html__('Full HD (1080p)', 'wp-smart-tv')
                )
            ) );
        }
        /********************************************************************************Advanced Controls*******************************************************************/
        if (isset($tv_settings['rovidx_smart_tv_advanced_enabled'])) {
        $args = array(
            'id'            => $prefix . 'other_metabox',
            'title'         => '<i class="fas fa-cogs"></i> Advanced Controls',
            'object_types'  => ['movies', 'series','episodes', 'specials', 'videos', 'live'], // Post type
            // 'show_on_cb' => 'rovidx_smart_tv_show_if_front_page', // function should return a bool value
            // 'context'    => 'normal',
            'priority'   => 'high',
            // 'show_names' => true, // Show field names on the left
            'cmb_styles' => false, // false to disable the CMB stylesheet
            'closed'     => true, // true to keep the metabox closed by default
            'tab_group'    => 'rovidx_smart_content_meta',
            'tab_title'    => 'Other',
        );
                
        $other_meta = new_cmb2_box( $args );
                    
        $other_meta->add_field( array(
            'name' => 'Validity Period Start Date',
            'id'   => $prefix . 'start_date',
            'type' => 'text_date',
            'desc' => 'YYYY-mm-dd',
            // 'timezone_meta_key' => 'wiki_test_timezone',
            'date_format' => 'Y-m-d',
            'attributes' => array(
                'data-datepicker' => json_encode(array(
                    'yearRange' => '1900:' . ( date('Y'))
                )),
                'data-validation' => 'required',
            )
        ) );
            
        $other_meta->add_field( array(
            'name' => 'Validity Period End Date',
            'id'   => $prefix . 'end_date',
            'type' => 'text_date',
            'desc' => 'YYYY-mm-dd',
            // 'timezone_meta_key' => 'wiki_test_timezone',
            'date_format' => 'Y-m-d',
            'attributes' => array(
                'data-datepicker' => json_encode(array(
                    'yearRange' => '1900:' . ( date('Y'))
                )),
                'data-validation' => 'required',
            )
        ) );        
            
        /********************************************************************************Ad Controls*******************************************************************/
           
        if (isset($tv_settings['rovidx_smart_tv_ads_enabled'])) {
            $roku_setting = get_option('rovidx_smart_tv_ad_options');
            
            $args = array(
                'id'            => $prefix . 'ad_metabox',
                'title'         => '<i class="fas fa-tv"></i> Advertising Controls',
                'object_types'  => ['movies', 'episodes', 'specials', 'videos', 'live'], // Post type
                // 'show_on_cb' => 'rovidx_smart_tv_show_if_front_page', // function should return a bool value
                // 'context'    => 'normal',
                'priority'   => 'high',
                // 'show_names' => true, // Show field names on the left
                 'cmb_styles' => false, // false to disable the CMB stylesheet
                'closed'     => true, // true to keep the metabox closed by default
                'tab_group'    => 'rovidx_smart_content_meta',
                'tab_title'    => 'Other',
            );
        
        if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
            $args['display_cb'] = array($this,'options_display_with_tabs');
        }
        
        $ad_meta = new_cmb2_box( $args );    
        
            

           // print_r($roku_setting);
           if(isset($roku_setting['rovidx_smart_tv_ad_feed_type']) && $roku_setting['rovidx_smart_tv_ad_feed_type'] !== '1' && $roku_setting['rovidx_smart_tv_ad_feed_type'] !== '2') {
                $ad_meta->add_field( array(
                    'name'       => __( 'Ad Breaks', 'wp-smart-tv' ),
                    'desc'       => __( 'Comma seperated values of hh:mm:ss.  Ex: \'0:05:05, 00:06:10\'', 'wp-smart-tv' ),
                    'id'         => $prefix . 'ad_breaks',
                    'type'       => 'text',
                ) );
            }

            if(isset($roku_setting['rovidx_smart_tv_ad_feed_type']) && ($roku_setting['rovidx_smart_tv_ad_feed_type'] == '2' || $roku_setting['rovidx_smart_tv_ad_feed_type'] == '4')) {

                $ad_meta->add_field( array(
                    'name'       => __( 'Mid Roll Timer', 'wp-smart-tv' ),
                    'desc'       => __( 'Plays mid-roll every <em>XX</em> minutes. Only works with option 2 and 4. Overides default value from Control Panel.', 'wp-smart-tv' ),
                    'id'         => $prefix . 'custom_midroll_timer',
                    'type'       => 'text',
                    'attributes' => array(
                        'type' => 'number',
                        'pattern' => '\d*',
                    ),
                ) );
            }
            
        }
    }
}

    
    
    public function options_display_with_tabs($cmb_options) {
        $tabs = $this->options_page_tabs( $cmb_options );
        ?>
        <div class="wrap cmb2-options-page option-<?php echo $cmb_options->option_key; ?>">
            <?php if ( get_admin_page_title() ) : ?>
                <h2><?php echo wp_kses_post( get_admin_page_title() ); ?></h2>
            <?php endif; ?>
            <h2 class="nav-tab-wrapper">
                <?php foreach ( $tabs as $option_key => $tab_title ) : ?>
                    <a class="nav-tab<?php if ( isset( $_GET['page'] ) && $option_key === $_GET['page'] ) : ?> nav-tab-active<?php endif; ?>" href="<?php menu_page_url( $option_key ); ?>"><?php echo wp_kses_post( $tab_title ); ?></a>
                <?php endforeach; ?>
            </h2>
            <form class="cmb-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="<?php echo $cmb_options->cmb->cmb_id; ?>" enctype="multipart/form-data" encoding="multipart/form-data">
                <input type="hidden" name="action" value="<?php echo esc_attr( $cmb_options->option_key ); ?>">
                <?php $cmb_options->options_page_metabox(); ?>
                <?php submit_button( esc_attr( $cmb_options->cmb->prop( 'save_button' ) ), 'primary', 'submit-cmb' ); ?>
            </form>
        </div>
        <?php
    }
    
    public function options_page_tabs( $cmb_options ) {
        $tab_group = $cmb_options->cmb->prop( 'tab_group' );
        $tabs      = array();
        foreach ( CMB2_Boxes::get_all() as $cmb_id => $cmb ) {
            if ( $tab_group === $cmb->prop( 'tab_group' ) ) {
                $tabs[ $cmb->options_page_keys()[0] ] = $cmb->prop( 'tab_title' )
                    ? $cmb->prop( 'tab_title' )
                    : $cmb->prop( 'title' );
            }
        }
        return $tabs;
    }
}

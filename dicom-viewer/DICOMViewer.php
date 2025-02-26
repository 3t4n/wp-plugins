<?php
/*
    Plugin Name: DICOM Viewer
    Plugin URI: https://redthread.studio/dicom_viewer
    Description: DICOM Viewer for Wordpress: allows to upload DICOM (*.dcm) files in the media library and add them to a post. The CornerstoneJS library is used for .dcm processing (<a href="https://github.com/cornerstonejs/cornerstone">CornerstoneJS</a>).
    Version: 0.1.1
    Author: Red Thread Design
    Author URI: https://redthread.studio/
*/

if (!class_exists("DICOMViewer")) {

    // DICOMViewer class.
    class DICOMViewer {

        /**
        * Constructor.
        */
        function __construct() {
            load_plugin_textdomain('dcmobj');

            // add DICOM mime type to allowed upload
            add_filter('upload_mimes', array($this, 'upload_mimes'));

            // add 'dcms' DICOM view shortcode
            add_shortcode('dcms', array($this, 'dcms_shortcode'));
            // enqueue scripts on front end
            add_action('wp_enqueue_scripts', array($this, 'register_plugin_scripts'));
            add_action( 'wp_enqueue_scripts', array($this, 'register_plugin_styles' ));

            // use 'dcms' shortcode when adding media to blog post
            add_filter('media_send_to_editor', array($this, 'media_send_to_editor'), 10, 3);
            // modify the output of the gallery short-code
            add_filter('post_gallery', array($this, 'post_gallery'), 10, 3);

            add_action('admin_print_footer_scripts', array($this, 'admin_print_footer_scripts'));
            add_action('wp_ajax_query-attachments', array($this, 'wp_ajax_query-attachments'));
        }

        /**
        * Add DICOM (*.dcm) as a supported MIME type.
        * @see https://developer.wordpress.org/reference/hooks/upload_mimes/
        * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
        * @param mime_types List of existing MIME types.
        */
        function upload_mimes($mime_types) {
            // add dcm to the list of mime types
            $mime_types['dcm'] = 'application/dicom';
            // return list
            return $mime_types;
        }

        /**
        * Create the DCMS html.
        * @param urls The string of the urls to load.
        * @param width The width of the display.
        * @param height The height of the display.
        */
        function create_dcms_html($urls, $size = 0) {

            // html var names
            $id = uniqid();
            $containerDivId = "dcms-" . $id;
            $dataSize = '';
            if ( !empty($size) && $size != 0 ) {
                $dataSize = $size;
            }
            
            $list = explode(',', $urls);
            $URLlist = array();
        
            if (count($list) > 0) {
                for ($i = 0; $i < count($list); $i++) {
                    $element = trim($list[$i],'"');
                    $URLlist[] = '<a href="'.$element.'">'.$i.'</a>';
                }
            }
            
            // create html
            $html = '<div id="'.$containerDivId.'" class="dcms" data-size="'.$dataSize.'">'.implode($URLlist).'</div>';
            
            return $html;
        }

        /**
        * Interpret the 'dcms' shortcode to insert DICOM data in posts.
        * @see http://codex.wordpress.org/Shortcode_API
        * @param atts An associative array of attributes.
        * @param content The enclosed content.
        */
        function dcms_shortcode($atts, $content = null) {
            // check that we have a src attribute
            if ( empty($atts['src']) ) {
                return;
            }

            // size
            $size = 0;
            if ( !empty($atts['width']) ) {
                $size = $atts['width'];
            }

            // split file list: given as "file1, file2",
            //     it needs to be passed as "file1", "file2"
            $fileList = array_map('trim', explode(',', $atts['src']));
            $urls = '"' . implode('","', $fileList) . '"';
            
            // return html
            return $this->create_dcms_html($urls, $size);
        }

        /**
        * Enqueue scripts for the front end.
        * @see https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
        */
        public function register_plugin_scripts() {
            // Cornerstone
            wp_register_script( 'cornerstone', plugins_url('resources/lib/cornerstone.min.js', __FILE__ ), array('jquery'), null );
            wp_enqueue_script( 'cornerstone' );

            // Cornerstone libs
            wp_register_script( 'dicomParser', plugins_url('resources/lib/dicomParser.min.js', __FILE__ ), array('cornerstone'), null );
            wp_enqueue_script( 'dicomParser' );

            wp_register_script( 'cornerstoneWADOImageLoader', plugins_url('resources/lib/cornerstoneWADOImageLoader.min.js', __FILE__ ), array('cornerstone'), null );
            wp_enqueue_script( 'cornerstoneWADOImageLoader' );

            wp_register_script( 'hammer', plugins_url('resources/lib/hammer.js', __FILE__ ), array('cornerstone'), null );
            wp_enqueue_script( 'hammer' );

            wp_register_script( 'cornerstoneMath', plugins_url('resources/lib/cornerstoneMath.min.js', __FILE__ ), array('cornerstone'), null );
            wp_enqueue_script( 'cornerstoneMath' );

            wp_register_script( 'cornerstoneTools', plugins_url('resources/lib/cornerstoneTools.min.js', __FILE__ ), array('cornerstone'), null );
            wp_enqueue_script( 'cornerstoneTools' );

            // Dicomify
            wp_register_script( 'dicomify', plugins_url('jquery.dicomify.js', __FILE__ ), array('cornerstone'), null );
            wp_enqueue_script( 'dicomify' );

            wp_register_script( 'dicomifyInit', plugins_url('jquery.dicomify.init.js', __FILE__ ), array('dicomify'), null );
            wp_enqueue_script( 'dicomifyInit' );
            
            wp_localize_script('dicomify', 'WPdicomify', array(
                'pluginsUrl' => plugins_url('',__FILE__),
            ));
        }

        public function register_plugin_styles() {
            wp_register_style( 'dicomviewer', plugins_url( 'resources/css/style.css', __FILE__ ) );
            wp_enqueue_style( 'dicomviewer' );
        }

        /**
        * Insert shortcode when adding media to a blog post.
        * @see https://developer.wordpress.org/reference/hooks/media_send_to_editor/
        * @param html The default generated html.
        * @param id The id of the post.
        * @param attachment The post attachment.
        */
        function media_send_to_editor($html, $id, $attachment) {
            $post = get_post( $id ); // returns a WP_Post object
            // only process DICOM objects
            if ( $post->post_mime_type == 'application/dicom' ) {
                if ( !empty( $attachment['url'] )) {
                    $html = '[dcms src="'.$attachment['url'].'"] ';
                }
            }
            return $html;
        }

        /**
        * Override media manager javascript functions to
        *    allow to select DICOM files to create galleries.
        * @see http://shibashake.com/wordpress-theme/how-to-expand-the-wordpress-media-manager-interface
        */
        function admin_print_footer_scripts() { ?>
            <script type="text/javascript">
                if (wp && wp.media) {
                    // Add custom post type filters
                    l10n = wp.media.view.l10n = typeof _wpMediaViewsL10n === 'undefined' ? {} : _wpMediaViewsL10n;
                    wp.media.view.AttachmentFilters.Uploaded.prototype.createFilters = function () {
                        var type = this.model.get('type');
                        var types = wp.media.view.settings.mimeTypes;
                        var text;
                        if ( types && type ) {
                            text = types[ type ];
                        }

                        var filters = {
                            all: {
                                text: text || l10n.allMediaItems,
                                props: {
                                    uploadedTo: null,
                                    orderby: 'date',
                                    order: 'DESC'
                                },
                                priority: 20
                            },

                            uploaded: {
                                text: l10n.uploadedToThisPost,
                                props: {
                                    uploadedTo: wp.media.view.settings.post.id,
                                    orderby: 'menuOrder',
                                    order: 'ASC'
                                },
                                priority: 30
                            },

                            dicom: {
                                text: 'DICOM',
                                props: {
                                    type: 'application/dicom',
                                    uploadedTo: wp.media.view.settings.post.id,
                                    orderby: 'date',
                                    order: 'DESC'
                                },
                                priority: 10
                            }
                        };
                        // Add post types only for gallery
                        if (this.options.controller._state.indexOf('gallery') !== -1) {
                            delete(filters.all);
                            filters.image = {
                                text: 'Images',
                                props: {
                                    type: 'image',
                                    uploadedTo: null,
                                    orderby: 'date',
                                    order: 'DESC'
                                },
                                priority: 10
                            };
                            _.each( wp.media.view.settings.postTypes || {}, function ( text, key ) {
                                filters[ key ] = {
                                    text: text,
                                    props: {
                                        type: key,
                                        uploadedTo: null,
                                        orderby: 'date',
                                        order: 'DESC'
                                    }
                                };
                            });
                        }
                        this.filters = filters;
                    } // End create filters

                    // Adding our search results to the gallery
                    wp.media.view.MediaFrame.Post.prototype.mainGalleryToolbar = function ( view ) {
                        var controller = this;

                        this.selectionStatusToolbar( view );

                        view.set( 'gallery', {
                            style: 'primary',
                            text: l10n.createNewGallery,
                            priority: 60,
                            requires: { selection: true },

                            click: function () {
                                var selection = controller.state().get('selection'),
                                edit = controller.state('gallery-edit');
                                //models = selection.where({ type: 'image' });

                                // Don't filter based on type
                                edit.set( 'library', selection);
                                /*edit.set( 'library', new wp.media.model.Selection( selection, {
                                    props:        selection.props.toJSON(),
                                    multiple: true
                                }) );*/

                                this.controller.setState('gallery-edit');
                            }
                        });
                    };
                } // end if (wp)
            </script>
        <?php }

        /**
        * Modify the output of the gallery short-code for DICOM files.
        * @see https://developer.wordpress.org/reference/hooks/post_gallery/
        * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/post_gallery
        * @param output The current output.
        * @param atts The attributes from the gallery shortcode.
        * @param instance Unique numeric ID of this gallery shortcode instance.
        */
        function post_gallery($output, $atts, $instance) {
            // attributes
            $atts = shortcode_atts( array(
                'order' => 'ASC',
                'orderby' => 'menu_order ID',
                'include' => '',
                'size' => 'full'
                ), $atts, 'gallery'
            );

            // size
            $size = 0;
            if ( $atts['size'] == "thumbnail" ) {
                $size = 256;
            }
            else if ( $atts['size'] == "medium" ) {
                $size = 512;
            }
            else if ( $atts['size'] == "large" ) {
                $size = 1024;
            }

            // get attachements
            // $atts['ids'] have been copied to $atts['include'],
            // see wp_include/media.php: function gallery_shortcode
            $_attachments = get_posts( array(
                'include' => $atts['include'],
                'post_status' => 'inherit',
                'post_type' =>    'attachment',
                'post_mime_type' => 'application/dicom',
                'order' => $atts['order'],
                'orderby' => $atts['orderby'] )
            );
            // build url list as string
            $urls = '';
            foreach ( $_attachments as $att ) {
                if ( $urls != '' ) {
                    $urls .= ',';
                }
                $urls .= '"' . $att->guid . '"';
            }
            // return html
            // an empty output leads to default behaviour which will
            // be the case for non DICOM attachements
            $html = '';
            if ( $urls != '' ) {
                $html = $this->create_dcms_html($urls, $size);
            }
            return $html;
        }

    } // end DICOMViewer class

    // Instanciate to create hooks.
    $dcmSuppInstance = new DICOMViewer();

} // end if (!class_exists("DICOMViewer")) {

?>

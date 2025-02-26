<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	// custom variables
    global $itls_logo_showcase_metaboxname_fields;
    $itls_logo_showcase_metaboxname_fields = array(
        array(
            'label' => __('General', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => '',
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'general',
            'type' => 'notype',
        ),

        array(
            'label' => '<strong>' . __('Short Description', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('Enter Short Desc here ... ', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'shortDesc',
            'type' => 'textarea'
        ),
        array(
            'label' => '<strong>' . __('Link Url', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('http://www.example.com/', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'link_url',
            'type' => 'url'
        ),
        array(
            'label' => '<strong>' . __('Link Target', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('Choose Target', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'link_target',
            'type' => 'select',
            'options' => array(

                'one' => array(

                    'label' => __('_blank', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
                    'value' => '_blank'
                ),
                'two' => array(

                    'label' => __('_self', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
                    'value' => '_self'
                )
            )
        ),
        array(
            'label' => __('Quick view details <br /><span class="it-form-desc" style="margin-left:0!important">Quick view details are available on <br /><a href="http://ithemelandco.com/Plugins/itls_logo_showcase" target="_blank">Pro version</a></span>', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => '',
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'quick_view_details',
            'type' => 'notype',
        ),
        array(
            'label' => '<strong>' . __('Full Description', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'full_desc',
            'type' => 'html_editor'
        ),
        array(
            'label' => '<strong>' . __('Website', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('http://www.example.com/', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'website',
            'type' => 'url'
        ),
        array(
            'label' => '<strong>' . __('Email', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('example@domain.com', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'email',
            'type' => 'email'
        ),
        array(
            'label' => '<strong>' . __('Tell', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('+1-2112345678', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'tell',
            'type' => 'text'
        ),

        array(
            'label' => __('Gallery options <br /><span class="it-form-desc" style="margin-left:0!important">Gallery options are available on <br /><a href="http://ithemelandco.com/Plugins/itls_logo_showcase" target="_blank">Pro version</a></span>', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => '',
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'gallery_option',
            'type' => 'notype',
        ),
        array(
            'label' => '<strong>' . __('Images', ITLS_LOGO_SHOWCASE_TEXTDOMAIN) . '</strong>',
            'desc' => __('Choose you images for gallery', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'gallery_image',
            'type' => 'gallery'
        ),
        array(
            'label' => __('Social Links <br /><span class="it-form-desc" style="margin-left:0!important">Social Links are available on <br /><a href="http://ithemelandco.com/Plugins/itls_logo_showcase" target="_blank">Pro version</a></span>', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => '',
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'social_links',
            'type' => 'notype',
        ),
        array(
            'label' => __('Facebook', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => __('http://www.facebook.com/', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'facebook',
            'type' => 'url',
        ),
        array(
            'label' => __('Twitter', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => __('http://www.twitter.com/', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'twitter',
            'type' => 'url',
        ),
        array(
            'label' => __('Instagram', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => __('http://www.instagram.com/', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'instagram',
            'type' => 'url',
        ),
        array(
            'label' => __('Google+', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => __('http://www.google.com/', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'google_plus',
            'type' => 'url',
        ),
        array(
            'label' => __('Linked In', ITLS_LOGO_SHOWCASE_TEXTDOMAIN),
            'desc' => '',
            'id' => ITLS_LOGO_SHOWCASE_FIELDS_PERFIX . 'linked_in',
            'type' => 'url',
        )
    );

?>

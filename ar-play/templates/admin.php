<?php

/**
 * @package  Arplay
 */

?>

<div class="wrap">

    <h1 style="margin-bottom: 20px">AR Play Settings</h1>

    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">How To Use</a></li>
        <li><a href="#tab-3">About</a></li>
    </ul>

    <div class="tab-content">

        <div id="tab-1" class="tab-pane active">

            <form method="post" action="options.php" id="form_uuid">
	            <?php
	            settings_fields( 'arplay_plugin_settings' );
	            do_settings_sections( 'arplay_plugin' );
	            submit_button();
	            ?>
            </form>

	        <h4 id="response" class="arplay_red"></h4>

        </div>

        <div id="tab-2" class="tab-pane">

            <h3>How To Use</h3>

            <ul class="arplay-ul">

                <li>
                    <strong>Install</strong> AR Play plugin.
                </li>
                <li>
                    Get UUID from your account on <a href="<?php echo get_option('arplay_app_url') ?>" target="_blank">arplay.app</a>
                </li>
                <li>
                    Navigate to <strong><em>AR Play > Settings</em></strong> from WP Dashboard and add your <strong>UUID number</strong>.<br />
                </li>
                <li>
                    Activate/Deactivate modules <strong>AR Play Shortcode</strong> and/or <strong>AR Play for WooCommerce</strong>.<br />
                    Deactivating module <strong><em>WILL NOT DELETE</em></strong> the codes you created, they will just be temporary disabled.
                </li>
                <li>
                    To create a <strong>SHORTCODE</strong>, from WP dashboard navigate to <strong><em>AR Play > Shortcode > Generate</em></strong>.<br />
                    Put your generated shortcode in any page or post.
                </li>
                <li>
                    To add <strong>AR Play AR View</strong> option to your product, navigate to specific product page and add path to model (found at the top right part of the page).<br />
                    Navigate to <strong><em>AR Play > For WooCommerce</em></strong> to choose where to display AR Play link on your product page.
                </li>

            </ul>

        </div>

        <div id="tab-3" class="tab-pane">

            <h3>About</h3>

            <div style="max-width: 400px">

                <p>
                    AR Play WordPress plugin serves as a connection between AR Play platform and your
                    WordPress website. AR Play enables you to show any 3D Model in augmented reality
                    (AR), anywhere, anytime.
                </p>
                <p>
                    This enables product demonstration without having the physical product next to you, which
                    is an amazing feature for any e-commerce store or for in-field sales agents.
                    Users can test the app with our pre-uploaded models or add their own 3D models.
                </p>
                <p>
                    Through <a href="<?php echo get_option('arplay_app_url') ?>" target="_blank">arplay.app</a>, user can sign up and use the platform first month for free, and add
                    their 3D models. After the first month, subscription fee is $10/month for unlimited amount
                    of products.
                </p>
                <p>
                    Once user signs up, they will also get a QR code and link generated for each of their
                    products.
                </p>
                <p>
                    QR Codes and Links open specific model in AR Play app. This enables Augmented
                    Reality integration for e-commerce stores.
                </p>

            </div>

        </div>
    </div>

</div>


<script>

    jQuery(function($) {

        $(document).ready(function() {

            var uuid = $('#uuid').val();

            if (uuid == ''){

                $('#response').html('UUID not set.');

            } else {

                $.ajax({
                    url: '<?php echo get_option('arplay_api_url') ?>/validate-uuid',
                    crossDomain: true,
                    dataType: 'json',
                    type: 'post',
                    cache: false,
                    contentType: 'application/json',
                    data: JSON.stringify({uuId: uuid}),
                    processData: false,
                    success: function( data ){
                        alert( 'OK' );
                    },
                    error: function( data ){
                        if (data.status == '200'){
                            $('#response').html('UUID valid and saved.');
                        }
                        else if (data.status == '404'){
                            $('#response').html('User not found. Please check if uuid you are using is valid or go <a href="<?php echo get_option('arplay_api_url') ?>/profile/" target="_blank">sign up page</a>.');
                        }
                        else if (data.status == '402'){
                            $('#response').html('Subscription not paid, please go to your <a href="<?php echo get_option('arplay_api_url') ?>/profile/" target="_blank">profile page</a> and check.');
                        }
                        else if (data.status == '500'){
                            $('#response').html('Unknown error.');
                        }
                    }
                });
            }

        });


        $("#form_uuid").on('submit', function() {

            var uuid = $('#uuid').val();

            if (uuid  === '') {
                alert('Please provide UUID');
                return false;
            }
        });

    });

</script>

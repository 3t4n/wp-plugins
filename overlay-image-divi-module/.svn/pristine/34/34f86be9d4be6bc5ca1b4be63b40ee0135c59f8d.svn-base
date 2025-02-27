<?php

class LWP_LwpFunctions {

	public function __construct($ET_Marketplace = false) {

        add_filter( 'plugin_action_links_overlay-image-divi-module/lwp-overlay-images.php', array(&$this, 'lwp_overlay_image_add_action_links') );

        //Adding the Overlay Images menu item to the WP Dashboard
        add_action( 'admin_menu', 'LWP_LwpFunctions::lwp_overlay_options_page' );

    }

    /**
     * Used for 'plugin_action_links_' filter to add links under the name of the plugin on plugins.php
    */
    public function lwp_overlay_image_add_action_links ( $actions ) {
        $mylinks = array(
            '<a href="https://wordpress.org/support/plugin/overlay-image-divi-module/reviews/?filter=5#new-post" target="_blank">'.esc_html__( 'Rate Plugin', 'lwp-overlay-images' ).'</a>',
            '<a href="https://www.learnhowwp.com/divi-plugins/" target="_blank">'.esc_html__( 'More Divi Plugins', 'lwp-overlay-images' ).'</a>',
        );
        $actions = array_merge( $actions, $mylinks );
        return $actions;
    }

    //========================================================================//

    /**
     * The output for the main Overlay Images page in the WP Dashboard
    */
    public static function lwp_overlay_image_page_html() {
        ?>
      <style>
        .lwp-button {
            background-color: #ff8906;
            border: none;
            color: white;
            padding: 10px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        .lwp-button:hover {
            color: white;
        }
        .lwp-btn-demo{
            background-color:#34c5a8;
        }
        .lwp-heading{
            font-size:23px;
            font-weight:bold;
            margin-top:40px;
        }
        .lwp-flex-container{
            display: flex;
            flex-direction: row;
            margin-bottom: 40px;
        }
        .lwp-flex-container>div{
            padding-left:20px;
            padding-right:20px;
            margin-top:20px;
        }
        .lwp-features>div{
            width: 50%;
        }
        .lwp-flex-container>div:first-child, .lwp-flex-container>div:nth-child(4n){
            padding-left:0px;
        }
        h3.lwp-subheading {
            font-size: 1.6em;
        }
        .lwp-getting-started p{
            font-size:15px;
            margin: 0px;
            margin-top: 5px;
        }
        .lwp-main-text {
            font-size: 18px;
            margin-top:40px;
        }
        .lwp-flex-container ul{
            font-size:16px;
        }
        .lwp-more-modules{
          flex-wrap:wrap;
        }
        .lwp-more-modules>div {
            flex-basis: 30%;
        }
        .lwp-features  li {
            margin-bottom: 16px;
        }
        .lwp-no-margin{
            margin:0px;
        }
        .lwp-images img{
            max-width:100%;
            width:450px;
            box-shadow:0px 2px 18px 0px rgb(0 0 0 / 30%);
        }
        .lwp-images h4{
            font-size:17px;
        }
        .lwp-images p{
            font-size:15px;
        }
      </style>

        <div class="wrap">

        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <p class="lwp-main-text">Divi Overlay Image plugin allows you to add text as an overlay on images inside the Divi Builder. The plugin adds a new module that you can use to add images with overlay. You can find the documentation for all module settings on the <em><a href="https://www.learnhowwp.com/documentation/overlay-image-divi/" target="_blank">Documentation</a></em> page.</p>


        <div class="lwp-flex-container">
          <div class="lwp-getting-started">
            <h3 class="lwp-subheading">Get Started</h3>
            <p><strong>Step #0: </strong>Install & Activate the Overlay Image Divi Plugin.</p>
            <p><strong>Step #1: </strong>Add the Overlay Image module in Divi Builder.</p>
            <p><strong>Step #2: </strong>Add your own custom images with overlay text on top of them from within the Divi Builder.</p>
            <p><a href="https://www.learnhowwp.com/add-overlay-text-image-divi/" target="_blank">Getting Started Tutorial with Step By Step Instructions</a></p>
          </div>
        </div>

        <div class="lwp-flex-container lwp-features lwp-images">
          <div>
            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__))).'images/image-1.jpg'; ?>"/>
            <h4>Overlay Color and Effect</h4>
            <p>Customize the color and set a custom effect for the overlay in module settings.</p>
          </div>
          <div>
            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__))).'images/image-2.jpg'; ?>"/>
            <h4>Icon Styles (Pro)</h4>
            <p>Set custom styles for the icon inside the overlay using the settings in the module.</p>
          </div>
        </div>
        <div class="lwp-flex-container lwp-features lwp-images">
          <div>
            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__))).'images/image-3.jpg'; ?>"/>
            <h4>Overlay Content</h4>
            <p>Set a custom image and custom text for the overlay from within the module right inside the Visual Builder.</p>
          </div>
          <div>
            <img src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__))).'images/image-4.jpg'; ?>"/>
            <h4>Image Attributes</h4>
            <p>Set custom alt and title attribute for the image inside the module settings.</p>
          </div>
        </div>

        <div class="lwp-flex-container lwp-features">
          <div>
            <h3 class="lwp-subheading">Free Features</h3>
            <ul>
              <li>* Visual Builder Supported</li>
              <li>* Slide Effect</li>
              <li>* Zoom Effect</li>
              <li>* Fade Effect</li>
              <li><strong>* Many more options</strong></li>
            </ul>
          </div>
          <div>
            <h3 class="lwp-subheading">Pro Features</h3>
            <ul>
              <li>* Option to add a Button</li>
              <li>* Option style Button</li>
              <li>* Option to add an Icon</li>
              <li>* Option to style Icon</li>
            </ul>
            <a class="lwp-button" href="<?php echo esc_url(admin_url('admin.php?page=lwp_overlay_image-pricing')); ?>">Upgrade <strong>$5.99</strong></a>
          </div>
        </div>

        <h2 class="wrap lwp-heading">More Modules</h2>

        <div class="lwp-flex-container lwp-more-modules">
          <div>
            <h3>Divi Breadcrumbs</h3>
            <p>Easily add breadcrumbs to your website using a breadcrumbs module.</p>
            <a href="https://wordpress.org/plugins/breadcrumbs-divi-module/" class="lwp-button" target="_blank">Download</a>
            <a href="https://www.learnhowwp.com/divi-breadcrumbs-module/" class="lwp-button lwp-btn-demo" target="_blank">Demo</a>
          </div>
          <div>
            <h3>Divi Flip Cards</h3>
            <p>Easily add flip cards to your website using a flip cards module.</p>
            <a href="https://wordpress.org/plugins/flip-cards-module-divi/" class="lwp-button" target="_blank">Download</a>
            <a href="https://www.learnhowwp.com/divi-flip-cards-plugin/" class="lwp-button lwp-btn-demo" target="_blank">Demo</a>
          </div>
          <div>
            <h3>Divi Image Carousel</h3>
            <p>Easily add image carousel to your website using an image carousel module.</p>
            <a href="https://wordpress.org/plugins/image-carousel-divi/" class="lwp-button" target="_blank">Download</a>
            <a href="https://www.learnhowwp.com/divi-image-carousel-plugin/" class="lwp-button lwp-btn-demo" target="_blank">Demo</a>
          </div>
          <div>
            <h3>Divi Post Carousel</h3>
            <p>Easily add post carousel to your website using the post carousel module.</p>
            <a href="https://wordpress.org/plugins/post-carousel-divi/" class="lwp-button" target="_blank">Download</a>
            <a href="https://www.learnhowwp.com/divi-post-carousel/" class="lwp-button lwp-btn-demo" target="_blank">Demo</a>
          </div>
        </div>

        </div>

        <?php
    }

    public static function lwp_overlay_options_page() {
        add_menu_page(
            'Divi Overlay Image',
            'Overlay Image',
            'manage_options',
            'lwp_overlay_image',
            'LWP_LwpFunctions::lwp_overlay_image_page_html',
            'dashicons-format-image',
            100
        );
    }

    //========================================================================//

}

new LWP_LwpFunctions;
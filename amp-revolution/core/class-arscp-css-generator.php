<?php
if ( ! class_exists( 'ARSCP_CSS_Generator' ) ) {
	class ARSCP_CSS_Generator {

		public function __construct() {
			//add_action('amp_post_template_css', array($this,'build_css_styles'),11);
			//add_action('amp_post_template_css', array($this,'add_custom_css_amp'),12);
		}

		public function build_css_styles( $amp_template ) {
			?>
            html {
            background: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'headerBackColor', 'personalizator', '#fff' ); ?>;
            }
            .logoHeader{
            background: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'headerBackColor', 'personalizator', '#fff' ); ?>;
            }

            .amp-wp-header {
            background-color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'menuBackColor', 'personalizator', '#fff' ); ?>;
            }

            .amp-wp-header div {
            color: #fff;
            text-transform: uppercase;
            font-size: 1em;
            font-weight: 600;
            margin: 0 auto;
            max-width: calc(840px - 32px);
            padding: .875em 16px;
            position: relative;
            }

            .amp-wp-title, h2, h3, h4 {
            color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'titleColor', 'personalizator', '#000' ); ?>;
            }

            .amp-wp-meta, .amp-wp-meta a {
            color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'metaColor', 'personalizator', '#000' ); ?>;
            }

            .amp-wp-article {
            color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'textColor', 'personalizator', '#000' ); ?>;
            font-weight: 400;
            margin: 1.5em auto;
            max-width: 840px;
            overflow-wrap: break-word;
            word-wrap: break-word;
            }

            a, a:active, a:visited {
            color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'linkColor', 'personalizator', '#000' ); ?>;
            }

            .logoAmp {
            background: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'headerBackColor', 'personalizator', '#fff' ); ?>;
            margin-left: auto;
            margin-right: auto;
            padding-top: 15px;
            padding-bottom: 15px;
            width: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'logoWidth', 'personalizator', '' ); ?>px;
            }

            .amp-wp-header .nav-header {
            margin: -18px;
            float: right;
            width: auto;
            }

            .amp-wp-header .nav-header .mobile-open,
            .amp-wp-header .nav-header .mobile-close {
            display: none;
            }

            .amp-wp-header .nav-header ul {
            margin: 0;
            padding: 0;
            }

            .amp-wp-header .nav-header li {
            display: block;
            list-style-type: none;
            float: left;
            }

            .amp-wp-header .nav-header a {
            display: block;
            padding: 20px;
            font-family: sans-serif;
            }


            .amp-wp-header {
            height: auto;
            }

            .amp-wp-header .nav-header {
            float: none;
            overflow: hidden;
            width: 100%;
            }

            .amp-wp-header .nav-header ul {
            height: 0;
            }

            .amp-wp-header .nav-header:hover ul {
            height: auto;
            }


            .amp-wp-header .nav-header .mobile-open {
            top: 0;
            right: 0;
            display: block;
            color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'menuTextColor', 'personalizator', '#fff' ); ?>;
            font-size: 18px;
            padding: 20px;
            cursor: pointer;
            }

            .amp-wp-header .nav-header li {
            float: none;
            }

            .amp-wp-header a {
            color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'menuTextColor', 'personalizator', '#fff' ); ?>;
            text-decoration: none;
            }

            .amp-wp-header .nav-header a {
            padding: 10px 16px;
            border-bottom: 1px solid white;
            overflow-: break-word;
            font-size: 14px;
            text-overflow: ellipsis;
            }

            #amp-related-posts amp-img {
            margin-right:1em;
            vertical-align: middle;
            margin-right: 15px;
            float: left;
            border: 1px solid #dfdfdf;
            }

            #amp-related-posts a {
            text-decoration:none;
            }

            #amp-related-posts ul {
            list-style-type: none;
            }

            #amp-related-posts li {
            margin-bottom: 75px;
            }

            #amp-related-posts h3 {
            font-weight: 700;
            font-family: 'Merriweather', 'Times New Roman', Times, Serif;
            font-size: 20px;
            color: #464646;
            margin: 30px 0px 30px 0px;
            border-top: 1px solid #dfdfdf;
            padding-top: 25px;
            }

            .amp-wp-footer{
            background: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'footerBackColor', 'personalizator', '#fff' ); ?>;
            }

            .amp-wp-footer h2{
            color: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'footerTextColor', 'personalizator', '#fff' ); ?>;
            font-size: 14px;
            }

            .amp-wp-byline amp-img {
            border: 1px solid <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'metaColor', 'personalizator', '#000' ); ?>;
            border-radius: 50%;
            position: relative;
            margin-right: 6px;
            }

            //comments

            .comment .avatar {
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
            width: 50px;
            }

            .comment-author vcard{
            width:20%;
            }

            .comment {
            list-style: none;
            margin-left: 0;
            padding-bottom: 13px;
            border-bottom: 1px dashed #ededed;
            margin-bottom: 21px;

            }

            .post footer {
            clear: both;
            }
            .comment .fn {
            float:right;
            font-weight: 700;
            font-style: normal;
            font-size: 14px;
            line-height: 1;
            width: 82%;

            }

            .comment .comment-content {
            margin: 20px;
            margin-left: 70px;
            margin-top: -25px;
            font-size: 14px;
            }

            .comment {
            margin: 20px;
            }

            .comment-metadata{
            display:none;
            }

            .comment-meta{
            margin-left: 5px;
            }

            .says {display:none;}

            #comments .amp-wp-enforced-sizes {
            max-width: 100%;
            margin: 0 ;
            border: 1px solid rgba(128, 128, 128, 0.44);
            float:left;

            }

            .formInput {
            width:100%;
            border: 1px solid rgba(128, 128, 128, 0.65);
            }

            .submit {
            width: 100%;
            font-size: 15px;
            font-weight: bold;
            padding: 15px 0;
            text-transform: uppercase;
            background:<?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'menuBackColor', 'personalizator', '#fff' ); ?>;
            color: #fff;
            border: 0px;
            box-shadow: 1px 1px 1px #888888;
            }

            .commentForm{
            margin:15px;
            }

            #comments {

            padding-top:15px;

            }

            .comment-author {
            height:52px;
            }

            #comments h2 {
            background: <?php echo ARSCP_AMP_Revolution::get()->options->get_option_data( 'menuBackColor', 'personalizator', '#fff' ); ?>;
            margin: 20px 10px 35px 20px;
            padding: 10px;
            text-align: center;
            text-transform: uppercase;
            color: #fff;
            font-size: 18px;
            }

            .formError{
            color : red;
            }

            .formSuccess{
            color: green;
            }

            @media only screen and (min-width: 500px) {
            .comment .fn {
            float:right;
            font-weight: 700;
            font-style: normal;
            font-size: 14px;
            line-height: 1;
            width: 90%;

            }
            }

			<?php if ( ARSCP_AMP_Revolution::get()->options->get_option_data( 'disableGf', 'optimizator', 'off' ) == 'on' ) { ?>

                body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif
                }
			<?php } ?>

			<?php


		}

		public function add_custom_css_amp( $amp_template ) {
			$customCss = ARSCP_AMP_Revolution::get()->options->get_option_data( 'extracss', 'customcss', '' );
			echo "$customCss";

		}
	}
}
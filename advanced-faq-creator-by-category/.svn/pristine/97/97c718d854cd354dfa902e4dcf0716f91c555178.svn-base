<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_preview_options' ) ) {

	class AFAQCBC_q_a_faq_preview_options {

        public function __construct() {
            if ( is_admin() ) {
                $this->init_metabox();
            }
        }

        public function init_metabox() {
            add_action( 'faqs_add_form_fields',     array( $this, 'render_preview_box' ), 10, 2 );
            add_action( 'faqs_edit_form_fields',    array( $this, 'render_preview_box' ), 10, 2 );

        }


        public function render_preview_box( $post ) {
        ?>

            <div style="display:none" class="centered-element-preview"><button id="button_preview">  Preview  </button></div>
			<div class="preview-demo"><?php //echo do_shortcode('[faqs id="'.$_GET['tag_ID'].'"]'); ?></div>
			<style>
			.preview-demo {
				width: 350px;
				background-color: #fff;
				position: fixed;
				top: 50px;
				margin-top: 25px;
				box-shadow: 0 0 9px 3px black;
				border-radius: 3px;
				opacity: 0;
				transition: opacity 0s, 0.5s linear;
				z-index: 999;
			}
			.centered-element-preview {
				position: fixed;
				right: -20px;
				top: 15%;
				z-index: 999999999;
				transform: rotate(-90deg);
				padding: 3px;
				text-align: center;
			}
			.centered-element-preview button{
				background: cornflowerblue;
				border: 1px solid #666;
				border-radius: 3px;
			}
			</style>
			<script>
			jQuery("#button_preview").toggle(
			function() {
				jQuery(".preview-demo").css("opacity", "1");
				jQuery(".preview-demo").css("height", "500px");
				jQuery(".preview-demo").css("right", "20px");
			}, function() {
				jQuery(".preview-demo").css("height", "0px");
				jQuery(".preview-demo").css("right", "20px");
				jQuery(".preview-demo").css("opacity", "0");
			})
			</script>

        <?php
        }
	}
	new AFAQCBC_q_a_faq_preview_options;
 }
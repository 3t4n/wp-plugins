<?php

/*

* الكلاس الخاص بإستدعاء ملفات ال css and js

*/

if( ! class_exists( 'AFAQCBC_q_a_faq_load_assets' ) ) {

    class AFAQCBC_q_a_faq_load_assets{
        public function __construct(){

            add_action('admin_enqueue_scripts', array($this,'faq_css'));

            add_action('admin_enqueue_scripts', array($this,'faq_js') , 100);

			add_action('wp_head',array($this,'ratting_fag_css'));

        }



        public function faq_js($hook) {

            if($hook == 'toplevel_page_faqs_dashboard') {

                wp_enqueue_script('bootstrap_min', AFAQCBC_PLUGIN_URL . 'assets/js/bootstrap.min.js', array('jquery'), '4.0', true);

                wp_enqueue_script('bootstrap-checkbox', AFAQCBC_PLUGIN_URL . 'assets/js/dist/js/bootstrap-checkbox.js', array('jquery'), '4.0', false);

                wp_enqueue_script('custom-faq-js', AFAQCBC_PLUGIN_URL . 'assets/js/custom.js', array('jquery'), '4.0', true);

                wp_localize_script('custom-faq-js','faq_get_cat_ajax',array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));



                wp_enqueue_script('Chart-min', AFAQCBC_PLUGIN_URL . 'assets/js/Chart.min.js', array('jquery'), '4.0', false);

            }else if($hook == 'term.php' || $hook == 'edit-tags.php'){

                wp_enqueue_script('select2-js', AFAQCBC_PLUGIN_URL . 'assets/js/select2.min.js', array('jquery'), '4.0', false);

                wp_enqueue_script('jquery-confirm-js', AFAQCBC_PLUGIN_URL . 'assets/js/jquery-confirm.js', array('jquery'), '4.0', false);

            }else{

                return;

            }

        }

		/*

		* ملفات الستايل

		*/

        public function faq_css($hook) {

            if($hook == 'toplevel_page_faqs_dashboard' ){

                wp_enqueue_style('bootstrap4', AFAQCBC_PLUGIN_URL.'/assets/css/bootstrap.min.css');

                wp_enqueue_style('admin-faq-style', AFAQCBC_PLUGIN_URL.'/assets/css/style.css');

                wp_enqueue_style('font-awesome', AFAQCBC_PLUGIN_URL.'/assets/css/font-awesome.min.css');

                wp_enqueue_style('font-awesome-link', AFAQCBC_PLUGIN_URL.'/assets/css/all.css');

            }else if($hook == 'term.php'  || $hook == 'edit-tags.php'){

                wp_enqueue_style('bundled',  AFAQCBC_PLUGIN_URL.'/assets/css/bundled.css');

                wp_enqueue_style('jquery-confirm',  AFAQCBC_PLUGIN_URL.'/assets/css/jquery-confirm.css');

				wp_enqueue_style('admin-faq-style-1',  AFAQCBC_PLUGIN_URL.'/assets/css/style.css');

            }else{

                return;

            }

        }

		public function ratting_fag_css(){

			?>

			<style>

			i.fa.fa-thumbs-up.like {

				color: #1abc9c;

				font-size: 1.125em;

				cursor: pointer;

			}



			i.fa.fa-thumbs-down.deslike {

				color: #e74c3c;

				font-size: 1.125em;

				cursor: pointer;

				padding: 0px 10px;

			}

			.faq_like_deslike {

				margin-top: 20px;

			}



			div#befor_title_faqs ul {

				padding: 8px 15px;

				margin-bottom: 20px;

				list-style: none;

				border-radius: 4px;

				text-align: left;

			}



			div#befor_title_faqs ul li {

				display: inline-block;

			}



			div#befor_title_faqs ul>li+li:before {

				padding: 0 5px;

				color: #ccc;

				content: ">>";

			}

			</style>

			<?php

		}

		



    }

    new AFAQCBC_q_a_faq_load_assets();

}


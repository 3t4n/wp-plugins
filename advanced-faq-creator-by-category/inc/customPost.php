<?php
 if( ! class_exists( 'AFAQCBC_q_a_faq_create_post_types' ) ) {
	 /*
* كلاس انشاء منطقة خاصه (بوست تايب خاص) للتحكم في الاسئلة وإضافتها
*/
	class AFAQCBC_q_a_faq_create_post_types{
	 
		public function __construct(){

			add_action( 'init', array($this,'question'), 0 );
			add_action('admin_head', array($this,'meteorslides_admin_css'));
		}
		/*
*  إنشاء كاستم يوست تايب للسؤال
*/
		public function question() {
		 
			$labels = array(
				'name'                => esc_html__( 'Questions ', 'Questions Post', 'advanced-faq-creator-by-category' ),
				'singular_name'       => esc_html__( 'Questions', 'Questions Post ', 'advanced-faq-creator-by-category' ),
				'menu_name'           => esc_html__( 'Questions ', 'advanced-faq-creator-by-category' ),
				'parent_item_colon'   => esc_html__( 'Questions ', 'advanced-faq-creator-by-category' ),
				'all_items'           => esc_html__( 'All Questions', 'advanced-faq-creator-by-category' ),
				'view_item'           => esc_html__( 'View Question', 'advanced-faq-creator-by-category' ),
				'add_new_item'        => esc_html__( 'Add New Question', 'advanced-faq-creator-by-category' ),
				'add_new'             => esc_html__( 'Add New Question', 'advanced-faq-creator-by-category' ),
				'edit_item'           => esc_html__( 'Edit Question', 'advanced-faq-creator-by-category' ),
				'update_item'         => esc_html__( 'Update Question', 'advanced-faq-creator-by-category' ),
				'search_items'        => esc_html__( 'Search Questions', 'advanced-faq-creator-by-category' ),
				'not_found'           => esc_html__( 'Not Found', 'advanced-faq-creator-by-category' ),
				'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'advanced-faq-creator-by-category' ),
			);
			 			 
			$args = array(
				'label'               => esc_html__( 'Questions', 'advanced-faq-creator-by-category' ),
				'description'         => esc_html__( 'Questions', 'advanced-faq-creator-by-category' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor' ,'thumbnail'),
				'taxonomies'          => array( 'faqscategory' ,'faqs'),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => false,//to hide in admin menu
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => true,
                'public'                => true,
                'exclude_from_search' => false,
                'menu_position' => 5,
				'capability_type'     => 'page',
			);
			 
			register_post_type( 'question', $args );
		}
		/*
* كود الستايل الخاص بالصفحه
*/
		function meteorslides_admin_css() {

			global $post_type;

			if ((isset($_GET['post_type']) && $_GET['post_type'] == 'question') || (isset($post_type) && $post_type == 'question')) :
				?>
				<style>
				div#faqscategory-adder {
					display: none;
				}

				div#faqs-adder {
					display: none;
				}
				.btn_cope {
					margin: 0px 10px;
					border: 1px solid #ddd;
					background: #ddd;
					padding: 0px 5px 5px;
					border-radius: 4px;
					cursor: pointer;
				}
				</style>
				<script>
				function CopyToClipboard_shortcode(containerid) {
				  if (document.selection) {
					var range = document.body.createTextRange();
					range.moveToElementText(document.getElementById(containerid));
					range.select().createTextRange();
					document.execCommand("copy");
				  } else if (window.getSelection) {
					var range = document.createRange();
					range.selectNode(document.getElementById(containerid));
					window.getSelection().addRange(range);
					document.execCommand("copy");
					alert("Text has been copied, now paste in the text-area")
				  }
				}
				</script>
						<?php
				endif;
		}
	}
	new AFAQCBC_q_a_faq_create_post_types();
 }


<?php
 if( ! class_exists( 'AFAQCBC_q_a_faq_create_taxonomies' ) ) {
	class AFAQCBC_q_a_faq_create_taxonomies{
	 
		public function __construct(){
			
			add_action( 'init', array($this,'create_faqs_taxonomies'), 0 );
			add_action( 'init', array($this,'create_taxonomies'), 0 );
			add_action( 'init', array($this,'create_tags'), 0 );
            add_filter("manage_edit-faqs_columns", array($this,'table_columns'));
            add_filter("manage_edit-faqscategory_columns", array($this,'table_columns_faqscategory'));
            add_filter("manage_edit-faqscategory_columns", array($this,'table_columns_faqscategory'));
            add_action('admin_footer', array($this,'full_width_location'));
            add_action('admin_head', array($this,'full_width_location_css'));
            add_action( "manage_faqs_custom_column", array($this,'table_columns_shortcode_content'), 10, 3);
            add_filter( 'faqs_row_actions', array($this,'manage_action'), 10, 2);
            add_filter( 'faqscategory_row_actions', array($this,'manage_action'), 10, 2);
        }
		/*
* انشاء تكسونمي الفاق 
الاعدادات الخاصه بتكسونمي الفاق
*/
		public function create_faqs_taxonomies() {

			register_taxonomy('faqs', 'question', array(
				'hierarchical' => true,
				'labels' => array(
				  'name' => esc_html__( 'Main FAQs', 'advanced-faq-creator-by-category' ),
				  'singular_name' => esc_html__( 'faqs', 'advanced-faq-creator-by-category' ),
				  'search_items' =>  esc_html__( 'Search FAQs', 'advanced-faq-creator-by-category' ),
				  'all_items' => esc_html__( 'All FAQs' , 'advanced-faq-creator-by-category'),
				  'parent_item' => esc_html__( 'Parent FAQs' , 'advanced-faq-creator-by-category'),
				  'parent_item_colon' => esc_html__( 'Parent FAQs:' , 'advanced-faq-creator-by-category'),
				  'edit_item' => esc_html__( 'Edit FAQs ' , 'advanced-faq-creator-by-category'),
				  'update_item' => esc_html__( 'Update FAQs ' , 'advanced-faq-creator-by-category'),
				  'add_new_item' => esc_html__( 'Add New FAQs ' , 'advanced-faq-creator-by-category'),
				  'new_item_name' => esc_html__( 'New FAQs Title' , 'advanced-faq-creator-by-category'),
				  'menu_name' => esc_html__( 'FAQs' , 'advanced-faq-creator-by-category'),
				),
				'rewrite' => array(
				  'slug' => 'faqs', 
				  'with_front' => false, 
				  'hierarchical' => true 
				),
			 ));

		}
		public function create_taxonomies() {
		 
			register_taxonomy('faqscategory', 'question', array(
				'hierarchical' => true,
				'labels' => array(
				  'name' => esc_html__( 'Category', 'advanced-faq-creator-by-category' ),
				  'singular_name' => esc_html__( 'faqcategory', 'advanced-faq-creator-by-category' ),
				  'search_items' =>  esc_html__( 'Search FAQs Category', 'advanced-faq-creator-by-category' ),
				  'all_items' => esc_html__( 'All FAQs Category' , 'advanced-faq-creator-by-category'),
				  'parent_item' => esc_html__( 'Parent FAQs Category' , 'advanced-faq-creator-by-category'),
				  'parent_item_colon' => esc_html__( 'Parent FAQs Category:' , 'advanced-faq-creator-by-category'),
				  'edit_item' => esc_html__( 'Edit FAQs Category' , 'advanced-faq-creator-by-category'),
				  'update_item' => esc_html__( 'Update FAQs Category' , 'advanced-faq-creator-by-category'),
				  'add_new_item' => esc_html__( 'Add New FAQs Category' , 'advanced-faq-creator-by-category'),
				  'new_item_name' => esc_html__( 'New FAQs Category Name' , 'advanced-faq-creator-by-category'),
				  'menu_name' => esc_html__( 'FAQs Category' , 'advanced-faq-creator-by-category'),
				),

				'rewrite' => array(
				  'slug' => 'faqcategory', 
				  'with_front' => false,
				  'hierarchical' => true 
				),
			 ));

		}
		/*
*  انشاء التاقز
*/
		public function create_tags() {
		 
			register_taxonomy('Tags', 'question', array(
				'labels' => array(
				  'name' => esc_html__( 'Tags', 'advanced-faq-creator-by-category' ),
				  'singular_name' => esc_html__( 'Tags', 'advanced-faq-creator-by-category' ),
				  'search_items' =>  esc_html__( 'Search Tags', 'advanced-faq-creator-by-category' ),
				  'all_items' => esc_html__( 'All Question Tags', 'advanced-faq-creator-by-category' ),
				  'parent_item' => esc_html__( 'Parent Question Tags', 'advanced-faq-creator-by-category' ),
				  'parent_item_colon' => esc_html__( 'Parent Question Tags:', 'advanced-faq-creator-by-category' ),
				  'edit_item' => esc_html__( 'Edit Question Tags' , 'advanced-faq-creator-by-category'),
				  'update_item' => esc_html__( 'Update Question Tags', 'advanced-faq-creator-by-category' ),
				  'add_new_item' => esc_html__( 'Add New Question Tags', 'advanced-faq-creator-by-category' ),
				  'new_item_name' => esc_html__( 'New Question Tags Name', 'advanced-faq-creator-by-category' ),
				  'menu_name' => esc_html__( 'Question Tags' ),
				),
				'rewrite' => array(
				  'slug' => 'tagsfaq', 
				  'with_front' => true, 
				  'hierarchical' => true 
				),
			 ));

		 
		}
		
		/*
* إزالة عدد الأسئلة من الجدول الرئيسي للفاق
*/
        function table_columns_faqscategory($theme_columns) {

		    unset($theme_columns['posts']);
            return $theme_columns;

        }
		/*
* التحكم في عنصر الجدول للفاق
*/
        public function table_columns() {
            $new_columns = array(
                'cb' => '<input type="checkbox" />',
                'name' => esc_html__('title','advanced-faq-creator-by-category'),
                'shortcode' => esc_html__('Shortcode','advanced-faq-creator-by-category'),
                'phpshortcode' => esc_html__('php Shortcode','advanced-faq-creator-by-category'),
                'posts' => esc_html__('Questions','advanced-faq-creator-by-category')
            );
            return $new_columns;
        }
		/*
* إدراج اكشن جديد للفاق بإضافة سؤال جديد خاص بالفاق
*/
        public function manage_action($actions,$tag) {
            unset($actions['view']);
            unset($actions['inline hide-if-no-js']);
			$actions['add_new_question'] = '<a href="'.admin_url( 'post-new.php?post_type=question&tag_ID='.esc_attr($tag->term_id), 'https' ).'" aria-label="Edit “FAQ – Template 1”">'.esc_attr__('Add question','advanced-faq-creator-by-category').'</a>';
            return $actions;
        }
		/*
* وضع الشورت كود داخل جدول عرض الفاق
*/
        public function table_columns_shortcode_content( $value, $column_name, $term_id ){
            if ($column_name === 'shortcode') {
                $columns = '<span id="shortcode'.absint($term_id).'">[faqs id="'.absint($term_id).'"]</span><button class="btn_cope" onclick="CopyToClipboard_shortcode(\'shortcode'.absint($term_id).'\'); return false;">copy</</button>';
            }else if($column_name === 'phpshortcode'){
                $columns = '<span id="shortphp'.absint($term_id).'">&lt;?php echo do_shortcode(\'[faqs id="'.absint($term_id).'"]\'); ?&gt;</span><button class="btn_cope" onclick="CopyToClipboard_shortcode(\'shortphp'.absint($term_id).'\'); return false;">copy</button>';
            }
            return $columns;
        }
/*
* التحكم في شكل صفحة عرض الفاق وتحويلها من نمط الورد برس العادي للتاكسونمي للوضع الحالي 
*/
        public function full_width_location_css() {

            $a_get_current_requset_uri = $_SERVER["REQUEST_URI"];
            $a_get_current_requset_uri = explode("?", $a_get_current_requset_uri);
            $a_get_current_taxonomy = isset($a_get_current_requset_uri[1]) ? explode("&", $a_get_current_requset_uri[1]) : '';
            if (is_array($a_get_current_taxonomy) && count($a_get_current_taxonomy) > 0) {
                if (isset($a_get_current_taxonomy[0]) && $a_get_current_taxonomy['0'] == 'taxonomy=faqs') {
                    ?>
                    <style type="text/css">
                        #col-right {width:100%;}
                        #col-left {width: 100%;}
                        .term-description-wrap {display: none;}
                        .term-parent-wrap {display: none;}
                        div#col-left {display: none;}
                        .form-wrap label {display: inline-block !important;}
                        a#btn_Cancel {margin: -5px 0px;float: right;}
                        input#resetfaq {background-color: orange;border: none;padding: 15px 32px;text-align: center;text-decoration: none;text-shadow: unset !important;display: inline-block;font-size: 16px;height: 56px;margin-right: 33px;color: #fff;border-color: #ffa500;box-shadow: 0 1px 10px #ccc;vertical-align: top;float: right;}
                        span.wp-picker-input-wrap {
                            width: 200px;
                        }
						.form-field.term-slug-wrap {
							margin-top: 0px !important;
							border-bottom: 1px solid #ddd !important;
						}
						.wrap>#message {
							margin: 0px !important;
						}
						.form-field.form-required.term-name-wrap {
							margin: 0px !important;
						}
						.form-field {
							background-color: #fff;
							padding: 11px !important;
							border: 1px solid #ddd;
							border-bottom: unset !important;
						}
						<?php 
							global $_wp_admin_css_colors;

							$admin_color = get_user_option( 'admin_color' );
							$colors      = $_wp_admin_css_colors[$admin_color]->colors;
							
						?>
						
						tr.form-field th {
							padding-left: 15px !important;
						}

						.wrap:not(.nosubsub)>h1 {
							background-color: <?php echo $colors[0];?>;;
							margin-bottom: 0px;
							padding-left: 10px;
							padding-right: 10px;
							padding-top: 12px;
							padding-bottom: 12px;
							width: unset !important;
							color: white;
							font-size: 18px;
							font-weight: 600;
						}

						table.form-table {
							margin-top: 0px;
						}
						.puplicseteng th {
							background-color: <?php echo $colors[0];?>;
						}
						.form-wrap>h2 {
							padding-top: 12px;
							padding: 11px;
							width: unset !important;
							color: white;
							margin-bottom: 0px;
							font-size: 18px;
							background-color: <?php echo $colors[0];?>;
						}

						.form-wrap>a {
							position: absolute;
							top: -32px;
						}

                        input#border-color {
                            height: 24px !important;
                        }
                        input.button.button-small.wp-picker-clear {
                            width: unset !important;
                        }
                        input#submit {
                            background-color: #4CAF50;
                            border: none;
                            color: white;
                            padding: 15px 32px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            height: 56px;
                            margin-right: 33px;
                            float: right;
                        }
						.tablenav .view-switch, .tablenav.top .actions {
							display: block !important;
						}
						.copy_short_code{
							border-bottom: 1px solid #ddd !important;
						}
					</style>

                    <?php
                }
            }
        }
		/*
* الحركة عند الضغط على زر إضافة فاق جديده
*/
        public function full_width_location() {

            $a_get_current_requset_uri = $_SERVER["REQUEST_URI"];
            $a_get_current_requset_uri = explode("?", $a_get_current_requset_uri);
            $a_get_current_taxonomy = isset($a_get_current_requset_uri[1]) ? explode("&", $a_get_current_requset_uri[1]) : '';
            if (is_array($a_get_current_taxonomy) && count($a_get_current_taxonomy) > 0) {
                if (isset($a_get_current_taxonomy[0]) && $a_get_current_taxonomy['0'] == 'taxonomy=faqs') {

                    ?>
                    <script type="text/javascript">
					"use strict";
                        jQuery(document).ready(function ($) {
							"use strict";
                            jQuery(".top .bulkactions").prepend('<a href="javascript:void(0);" id="btn_add" class="button"><?php esc_html_e('Add FAQs', 'advanced-faq-creator-by-category') ?></a>'); // add link
                            jQuery(".submit").prepend('<input type="reset" name="resetfaq" id="resetfaq" class="button button-primary" value="<?php esc_html_e('Restore defaults', 'advanced-faq-creator-by-category') ?>">'); // add link
                            jQuery("#col-left > div > div > h2").prepend('<a href="javascript:void(0);" id="btn_Cancel" class="button"><?php esc_html_e('Cancel', 'advanced-faq-creator-by-category') ?></a>'); // add link
                            jQuery("#col-left").hide();

                            jQuery(document).on('click', '#btn_add', function () {
                                jQuery("#col-right").slideUp(function() {jQuery("#col-left").slideDown();});
                            });


                            jQuery( "input#submit" ).on('click',function() {
                                if(jQuery("#tag-name").val() != ''){
                                    jQuery("#col-left").slideUp(function() {jQuery("#col-right").slideDown();});
                                }else{
                                    jQuery("html, body").animate({ scrollTop: 0 }, "slow");
                                }
                            });
                            jQuery( "#btn_Cancel" ).on('click',function() {
                                jQuery("#col-left").slideUp(function() {jQuery("#col-right").slideDown();});
                            });

                        });
                    </script>

                    <?php
                }
            }
        }
    }
	new AFAQCBC_q_a_faq_create_taxonomies();
}






<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_dashboard_and_admin_menu' ) ) {
    class AFAQCBC_q_a_faq_dashboard_and_admin_menu
    {
        public function __construct(){
            add_action('admin_menu', array($this,'admin_menu'));
            add_action( 'admin_init', array($this,'register_faq_settings') );
            add_action('in_admin_footer',  array($this,'my_admin_add_js'), 9999999 );
        }
        public function admin_menu()
        {
            add_menu_page( esc_html__( 'FAQ Creator', 'advanced-faq-creator-by-category' ), esc_html__( 'FAQ Creator', 'advanced-faq-creator-by-category' ), 'edit_posts', 'faqs_dashboard', array($this,'faqs_dashboard'), '', 5 );
            add_submenu_page( 'faqs_dashboard', esc_html__( 'Dashboard', 'advanced-faq-creator-by-category' ) ,  esc_html__( 'Dashboard', 'advanced-faq-creator-by-category' ), 'edit_posts', 'faqs_dashboard'  );
            add_submenu_page( 'faqs_dashboard', esc_html__( 'Main FAQ\'s', 'advanced-faq-creator-by-category' ) ,  esc_html__( 'Main FAQ\'s', 'advanced-faq-creator-by-category' ), 'edit_posts', 'edit-tags.php?taxonomy=faqs&post_type=question'  );
            add_submenu_page( 'faqs_dashboard', esc_html__( 'Main Categories', 'advanced-faq-creator-by-category' ) ,  esc_html__( 'Main Categories', 'advanced-faq-creator-by-category' ), 'edit_posts', 'edit-tags.php?taxonomy=faqscategory&post_type=faqs'  );
            add_submenu_page( 'faqs_dashboard', esc_html__( 'Questions', 'advanced-faq-creator-by-category' ) ,  esc_html__( 'Questions', 'advanced-faq-creator-by-category' ), 'edit_posts', 'edit.php?post_type=question'  );
            add_submenu_page( 'faqs_dashboard', esc_html__( 'Add New Question', 'advanced-faq-creator-by-category' ) ,  esc_html__( 'Add New Question', 'advanced-faq-creator-by-category' ), 'edit_posts', 'post-new.php?post_type=question'  );
            add_submenu_page( 'faqs_dashboard', esc_html__( 'Tags', 'advanced-faq-creator-by-category' ) ,  esc_html__( 'Tags', 'advanced-faq-creator-by-category' ), 'edit_posts', 'edit-tags.php?taxonomy=Tags&post_type=question'  );
        }
/*
* الداش بورد للبلقن
*/
        public function faqs_dashboard()
        {

            ?>
            <form method="post" action="options.php">
                <h2 class=" mt-3  mr-3 ml-3"><?php echo esc_html__('FAQ Creator for wordpress', 'advanced-faq-creator-by-category');?></h2>
                <div class="bootstrap container-fluid meta-box-wrapper">
                    <!-- all faqs start -->
                    <div class="row  ">
                        <div class="col-md-12 mt-4">
                            <div class="panel panel-default" id="paginationOptionsPanel">
                                <div class="panel-heading" role="tab" id="paginationOptionsHeading">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" href="#paginationOptions" aria-expanded="true" aria-controls="paginationOptions" class="">
                                            <?php echo esc_html__('Main FAQ\'s','advanced-faq-creator-by-category');?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="paginationOptions" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="paginationOptionsHeading" aria-expanded="true" style="">
                                    <div class="panel-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="field-wrapper clearfix table-responsive" id="_wplcp_pagination_note1_wrapper">

                                                        <table class="table table-striped table-hover  dashboard_faqs_table">
                                                            <thead>
                                                            <tr>
                                                                <th width="20" scope="col" class="hide_on_mobile" > <?php echo esc_html__('#', 'advanced-faq-creator-by-category');?> </th>
                                                                <th scope="col" class="text-center"> <?php echo esc_html__('FAQ title', 'advanced-faq-creator-by-category');?> </th>
                                                                <th width="160" scope="col" class="text-center"> <?php echo esc_html__('ShortCode', 'advanced-faq-creator-by-category');?> </th>
                                                                <th width="335" scope="col" class="text-center"> <?php echo esc_html__('Function Call', 'advanced-faq-creator-by-category');?> </th>
                                                                <th width="69" scope="col" class="text-center hide_on_mobile"> <?php echo esc_html__('Template', 'advanced-faq-creator-by-category');?> </th>
                                                                <th width="89" scope="col" class="text-center"> <?php echo esc_html__('Categories', 'advanced-faq-creator-by-category');?> </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $terms = get_terms( array(
                                                                'taxonomy' => 'faqs',
                                                                'hide_empty' => false,
																'orderby' => 'ID',
																'order' => 'desc',
                                                            ) );
                                                            $i=1;
                                                            foreach($terms as $term){
                                                                ?>
                                                                <tr>
                                                                    <th class="p-1 pr-3 pl-3 hide_on_mobile" scope="row"><?php echo esc_html($i); ?></th>
                                                                    <td class="p-1 pr-3 pl-3"><?php echo esc_attr($term->name);?>
                                                                        <div class="row-actions">
																		<span class="edit">
																			<a href="<?php echo esc_url(admin_url( 'term.php?taxonomy=faqs&tag_ID='.esc_attr($term->term_id), 'https' ));?>" aria-label="Edit “New Question2”"><?php echo esc_html__('Edit','advanced-faq-creator-by-category');?></a>
																			<a href="<?php echo esc_url(admin_url( 'post-new.php?post_type=question&tag_ID='.esc_attr($term->term_id), 'https' ));?>" aria-label="Add “New Question”">| <?php echo esc_html__('Add New Question','advanced-faq-creator-by-category');?></a>
																		</span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="p-1 pr-3 pl-3">
                                                                        <div class="row">
                                                                            <input type="text" <?php if(wp_is_mobile()){?> style="position: absolute;left:-9999px;" <?php } ?> name="faq_shortcode" id="faq_shortcode<?php echo esc_attr($term->term_id);?>" value="[faqs id=&quot;<?php echo esc_attr($term->term_id);?>&quot;]" class="form-control col-8 text-no-border" readonly="readonly" aria-invalid="false">
                                                                            <button type="button" class="btn  ml-1 mr-1 btn-to-copy" onclick="copyToClipboard('faq_shortcode<?php echo esc_js($term->term_id);?>')"><?php echo esc_html__('Copy','advanced-faq-creator-by-category');?></button>
                                                                        </div>
                                                                    </td>
                                                                    <td class="p-1 pr-3 pl-3">
                                                                        <div class="row">
                                                                            <input type="text" <?php if(wp_is_mobile()){?> style="position: absolute;left:-9999px;" <?php } ?> name="faq_shortcode_html" id="faq_shortcode_html<?php echo esc_attr($term->term_id);?>" value="&lt;?php echo do_shortcode('[faqs id=&quot;<?php echo esc_attr($term->term_id);?>&quot;]'); ?&gt;" class="form-control col-10 text-no-border" readonly="readonly" aria-invalid="false">
                                                                            <button type="button" class="btn  ml-1 mr-1  btn-to-copy" onclick="copyToClipboard('faq_shortcode_html<?php echo esc_js($term->term_id);?>')"><?php echo esc_html__('Copy','advanced-faq-creator-by-category');?></button>
                                                                        </div>
                                                                    </td>
                                                                    <td class="p-1 pr-3 pl-3 hide_on_mobile">
                                                                        <?php
                                                                        $faq_template_selected = esc_attr(get_term_meta( esc_attr($term->term_id), 'faq_template', true ));
                                                                        if($faq_template_selected !=''){ ?>
                                                                            <img width="40" src="<?php echo plugin_dir_url( __FILE__ ). '../templates/'.esc_attr($faq_template_selected).'/screenshot.png' ;?>">
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td class="p-1 pr-3 pl-3">
                                                                        <a class="btn btn-show" onclick="openModal(<?php echo esc_js($term->term_id); ?>,'<?php echo esc_js($term->name);?> Category List');"><?php echo esc_html__('Show','advanced-faq-creator-by-category');?></a>
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $i++;
                                                                if($i > 5){
                                                                    break;
                                                                }
                                                            }
                                                            ?>

                                                            </tbody>
                                                        </table>
														<a href="<?php esc_attr_e(admin_url('edit-tags.php?taxonomy=faqs&post_type=question'));?>" class="btn btn-light mb-2"> <i class="fas fa-arrow-down"></i> View All</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- all faq end -->







                    <div class="row ">
                        <!-- all option start -->
                        <div class="col-md-6 mt-4">
                            <div class="panel panel-default" id="Optionsfaq">
                                <div class="panel-heading" role="tab" id="faqOptionsHeading">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" href="#faqOptions" aria-expanded="true" aria-controls="faqOptions" class="">
                                            <?php echo esc_html__('General options', 'advanced-faq-creator-by-category');?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faqOptions" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="faqOptionsHeading" aria-expanded="true" style="">
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="field-wrapper clearfix" id="_wplcp_pagination_note1_wrapper">
                                                        <?php settings_fields( 'faq-option-group' ); ?>
                                                        <?php do_settings_sections( 'faq-option-group' ); ?>
                                                        <div class="col-md-12 mt-2 mb-2">
                                                            <div class="row mt-1  p-1" >
                                                                <label class="col-9" for="allow_rating_faq">
                                                                    <h6 class="pt-2"><?php echo esc_html__('Allow rating option', 'advanced-faq-creator-by-category');?> </h6>
                                                                </label>
                                                                <input type="checkbox"  id="allow_rating_faq" value="1" <?php if(get_option('allow_rating_faq')){echo'checked';}?>  class="col-3" name="allow_rating_faq">
                                                            </div>
                                                            <div class="row mt-1 p-1">
                                                                <label class="col-9" for="rating_depends_on">
                                                                    <h6 class="pt-2"><?php echo esc_html__('Rating session depends on', 'advanced-faq-creator-by-category');?> </h6>
                                                                </label>
                                                                <select id="rating_depends_on" class="col-3" name="rating_depends_on">
                                                                    <option value="1" <?php if(get_option('rating_depends_on') == '1'){echo'selected';}?>>session</option>
                                                                    <option value="2" <?php if(get_option('rating_depends_on') == '2'){echo'selected';}?>>cookies</option>
                                                                </select>
                                                            </div>
                                                            <div class="row mt-1  p-1">
                                                                <label class="col-9" for="on_UNINSTALL_REMOVE_ALL_DATA">
                                                                    <h6 class="pt-2"><?php echo esc_attr__('On uninstall remove all Plugin data', 'advanced-faq-creator-by-category');?></h6>
                                                                </label>
                                                                <select id="on_UNINSTALL_REMOVE_ALL_DATA" class=" col-3" name="on_UNINSTALL_REMOVE_ALL_DATA">
                                                                    <option value="2" <?php if(get_option('on_UNINSTALL_REMOVE_ALL_DATA') == '2'){echo esc_attr('selected');}?>><?php echo esc_attr__('NO', 'advanced-faq-creator-by-category');?></option>
                                                                    <option value="1" <?php if(get_option('on_UNINSTALL_REMOVE_ALL_DATA') == '1'){echo esc_attr('selected');}?>><?php echo esc_attr__('YES', 'advanced-faq-creator-by-category');?></option>
                                                                </select>
                                                            </div>
                                                            <div class="row mt-1  p-1">
                                                                <label class="col-9" for="faq_cat_page">
                                                                    <h6 class="pt-2"><?php echo esc_html__('Category Page', 'advanced-faq-creator-by-category');?></h6>
                                                                </label>
                                                                <select id="faq_cat_page" class=" col-3" name="faq_cat_page">
                                                                    <option value="-1" <?php if(get_option('faq_cat_page') == -1 ){echo esc_attr('selected');}?>><?php echo esc_attr__('Null', 'advanced-faq-creator-by-category')?></option>
                                                                    <?php $args = array(
                                                                        'post_type' => 'page',
                                                                    );
                                                                    $pages = get_pages($args);
                                                                    foreach($pages as $page){?>
                                                                        <option value="<?php echo esc_attr($page->ID);?>" <?php if(get_option('faq_cat_page') == $page->ID){echo esc_attr('selected');}?>><?php echo esc_html($page->post_title);?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="row mt-1 mb-0 p-1">
                                                                <label class="col-4  col-xl-12" for="empty_faq_message">
                                                                    <h6 class="pt-2"><?php echo esc_html__('Empty faq message', 'advanced-faq-creator-by-category');?></h6>
                                                                </label>
                                                                <input type="text" id="empty_faq_message" class="col-8 col-xl-12" value="<?php echo esc_attr( get_option('empty_faq_message') ); ?>" name="empty_faq_message">

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- all option end -->


                        <!-- all count start -->
                        <div class="col-md-6 mt-4">
                            <div class="panel panel-default" id="Optionsfaq">
                                <div class="panel-heading" role="tab" id="faqSelectedHeading">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" href="#faqselected" aria-expanded="true" aria-controls="faqselected" class="">
                                            <?php echo esc_html__('Stats', 'advanced-faq-creator-by-category');?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="faqselected" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="faqSelectedHeading" aria-expanded="true" style="">
                                    <div class="panel-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="field-wrapper clearfix" id="_wplcp_pagination_note1_wrapper">
                                                        <?php settings_fields( 'faq-option-group' ); ?>
                                                        <?php do_settings_sections( 'faq-option-group' ); ?>
                                                        <div class="col-md-12 mb-1">


                                                            <div class="row" >


                                                                <div class="col-xl-6 col-lg-6 col-12  p-1">
                                                                    <div class="card bg-primary card-padding-1 m-0 mb-1 p-0">
                                                                        <div class="card-content">
                                                                            <div class="card-body card-padding-0 ">
                                                                                <div class="media d-flex">
                                                                                    <div class="align-self-center">
                                                                                        <i class="fas fa-users icon-size"></i>
                                                                                    </div>
                                                                                    <div class="media-body white text-right">
                                                                                        <?php
                                                                                        $terms = get_terms( array(
                                                                                            'taxonomy' => 'faqs',
                                                                                            'hide_empty' => false,
                                                                                        ) );
                                                                                        ?>
                                                                                        <h3><?php echo count($terms);?></h3>
                                                                                        <span><?php echo esc_html__("Main FAQ's", 'advanced-faq-creator-by-category');?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-xl-6 col-lg-6 col-12  p-1">
                                                                    <div class="card bg-danger card-padding-1 m-0 mb-1 p-0">
                                                                        <div class="card-content">
                                                                            <div class="card-body card-padding-0">
                                                                                <div class="media d-flex">
                                                                                    <div class="align-self-center">
                                                                                        <i class="fas fa-user-md icon-size"></i>
                                                                                    </div>
                                                                                    <div class="media-body white text-right">
                                                                                        <?php
                                                                                        $terms = get_terms( array(
                                                                                            'taxonomy' => 'faqscategory',
                                                                                            'hide_empty' => false,
                                                                                        ) );
                                                                                        ?>
                                                                                        <h3><?php echo count($terms);?></h3>
                                                                                        <span><?php echo esc_html('Categories');?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-xl-6 col-lg-6 col-12  p-1">
                                                                    <div class="card bg-success card-padding-1 m-0 p-0">
                                                                        <div class="card-content">
                                                                            <div class="card-body card-padding-0">
                                                                                <div class="media d-flex">
                                                                                    <div class="align-self-center">
                                                                                        <i class="far fa-file icon-size"></i>

                                                                                    </div>
                                                                                    <div class="media-body white text-right">
                                                                                        <h3><?php
                                                                                            $args = array(
                                                                                                'post_type' => 'question',
                                                                                                'post_status' => 'publish' //(Or Draft...etc)
                                                                                            );
                                                                                            $show_recipes= new WP_Query( $args );
                                                                                            print_r($show_recipes->post_count);
                                                                                            wp_reset_query();
                                                                                            ?></h3>
                                                                                        <span><?php echo esc_html__("Questions", 'advanced-faq-creator-by-category');?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-xl-6 col-lg-6 col-12 p-1">
                                                                    <div class="card bg-warning card-padding-1 m-0 p-0">
                                                                        <div class="card-content">
                                                                            <div class="card-body card-padding-0">
                                                                                <div class="media d-flex">
                                                                                    <div class="align-self-center">
                                                                                        <i class="fas fa-user icon-size"></i>
                                                                                    </div>
                                                                                    <div class="media-body white text-right">
                                                                                        <?php
                                                                                        $terms = get_terms( array(
                                                                                            'taxonomy' => 'Tags',
                                                                                            'hide_empty' => false,
                                                                                        ) );
                                                                                        ?>
                                                                                        <h3><?php echo count($terms);?></h3>
                                                                                        <span><?php echo esc_html__("Tags", 'advanced-faq-creator-by-category');?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="row mt-2" >
                                                                <div class="col-md-6 col-xs-12 col-lg-6 pt-4">
                                                                    <canvas id="chDonut1"></canvas>
                                                                </div>
                                                                <div class="col-md-6 col-xs-12 col-lg-6">
                                                                    <div class="row" >
                                                                        <h6 class="head-of-list col-md-12 col-xs-12 col-lg-12"><?php echo esc_html__("Top questions", 'advanced-faq-creator-by-category');?></h6>
                                                                        <ul class="list-of-q pl-4 col-md-12 col-xs-12 col-lg-12">
                                                                            <?php $args=array(
                                                                                'post_type'=>'question',
                                                                                'posts_per_page'=>5,
                                                                                'meta_key' => 'like',
                                                                                'orderby' => 'meta_value_num',
                                                                            );
                                                                            $num=1;
                                                                            query_posts($args);
                                                                            if (have_posts()) :
                                                                                while (have_posts()) : the_post();?>
                                                                                    <li>
                                                                                        <a href="<?php echo esc_url( get_permalink() ); ?>" target="_blank">
                                                                                            <?php echo esc_html($num).'. '; the_title()?>
                                                                                        </a>
                                                                                    </li>
                                                                                    <?php
                                                                                    $num++;
                                                                                endwhile;
                                                                            endif;
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- all count end -->
                    </div>
                </div>
                <?php submit_button(); ?>

            </form>



            <div class="modal fade " id="element_modal_dash" tabindex="-1" role="dialog" aria-labelledby="postionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="postionModalLabel">...</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body" id="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
/*
* اعدادات البلقن الموجودين في صفحة الداش بورد
*/
        function register_faq_settings(){
            register_setting( 'faq-option-group', 'allow_rating_faq' );
            register_setting( 'faq-option-group', 'rating_depends_on' );
            register_setting( 'faq-option-group', 'empty_faq_message' );
            register_setting( 'faq-option-group', 'faq_cat_page' );
            register_setting( 'faq-option-group', 'on_UNINSTALL_REMOVE_ALL_DATA' );
        }
		/*
* كواد الجافا سكربت الخاص بصفحة الداش بورد
*/
        function my_admin_add_js() {
            $like = 0;
            $dislike = 0;
            $args=array(
                'post_type'=>'question',
                'posts_per_page'=>5,
                'meta_key' => 'like',
                'orderby' => 'meta_value_num',
            );
            query_posts($args);
            if (have_posts()) :
                while (have_posts()) : the_post();
                    $like += get_post_meta(get_the_ID(),'like',true)?esc_attr(get_post_meta(get_the_ID(),'like',true)):0;
                    $dislike += get_post_meta(get_the_ID(),'deslike',true)?esc_attr(get_post_meta(get_the_ID(),'deslike',true)):0;
                endwhile;
            endif;
            wp_reset_query();
            ?>


            <script>
			"use strict";
                function openModal(faq_id,recipient ="") {
				
                    $("#modal-body").html("");
                    $.ajax({
                        url: ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
                        data: {
                            'action': 'get_short_code_cat',
                            'faq_id' : faq_id
                        },
                        success:function(data) {
                            // This outputs the result of the ajax request
                            $("#modal-body").html(data);
                            $("#postionModalLabel").text(recipient);
                            $("#element_modal_dash").addClass("show");
                            $("#element_modal_dash").modal('show');
                        },
                        error: function(errorThrown){
                            $("#modal-body").html(data);
                            $("#postionModalLabel").text(recipient);
                            $("#element_modal_dash").addClass("show");
                            $("#element_modal_dash").modal('show');
                        }
                    });

                    $("#postionModalLabel").text(recipient);
                    $("#element_modal_dash").addClass("show");
                    $("#element_modal_dash").modal('show');
                }
                var colors = ['#ffb814','#6c757d'];

                /* 3 donut charts */
                var donutOptions = {
                    cutoutPercentage: 20,
                    legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
                };

                // donut 1
                var chDonutData1 = {
                    labels: ['like', 'dislike'],
                    datasets: [
                        {
                            backgroundColor: colors.slice(0,3),
                            borderWidth: 0,
                            data: [ <?php echo esc_js($like);?>, <?php echo esc_js($dislike);?>]
                        }
                    ]
                };

                var chDonut1 = document.getElementById("chDonut1");
                if (chDonut1) {
                    new Chart(chDonut1, {
                        type: 'pie',
                        data: chDonutData1,
                        options: donutOptions
                    });
                }

            </script>
            <?php
        }
    }
    new AFAQCBC_q_a_faq_dashboard_and_admin_menu();
}
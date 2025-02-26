<?php $sirve_queried_object =  get_queried_object(); ?>
<!-- Archive Layout Start-->
<div class="sirve_tag_archive_page <?php echo esc_attr( (get_option('sirve_archive_page_style', 'style-1') == 'style-4') ? 'sirve__container--xl' : 'sirve__container');?>  sirve_options" <?php if(isset($attributes)){ echo esc_attr( "data-sirveoptions=" ). json_encode(  $attributes );}?>>
 
            <div class="sirve__row">
                <div class="sirve__col-lg-12">
                    <!-- Header Area Start -->
                    <div class="sirve__category-header">
                        <div class="sirve-category-header-title">
                            <?php
                                echo "<h1 class='sirve-category-title'>" . esc_html( get_option('sirve_fontend_tag_lable','Tags: '). " ". $sirve_queried_object->name ) . "</h1>";
                            ?>
                        </div>
                        <!-- category_description -->
                        <?php if ( tag_description() ) : ?>
                            <div class="archive-meta"><?php echo tag_description(); ?></div>
                        <?php endif; ?>
                    </div>

                    
                    <!-- Header Area Start -->
                </div>
            </div>   
        
        <div class="sirve__body">
            <div class="sirve__tab-content" id="sirveTabContent">
                    <div class="sirve__tab-pane active" id="all">
                        <div class="sirve-ajax-search sirve__row ">
                            
                            <?php 
                                
                                $sirve_par_pages;
                                if(!empty(get_option('sirve_par_pages'))){
                                    $sirve_par_pages = get_option('sirve_par_pages');
                                }else{
                                    $sirve_par_pages = 15;
                                }

                                $currentPage = ( isset($_REQUEST['page']) ) ? intval( $_REQUEST['page'] ) : 0;
                                $args = array( 
                                    'post_type'     => 'sirve', 
                                    'post_status'   => 'publish',
                                    'orderby'        => (isset($attributes['orderby']) && !($attributes['orderby'] == '')) ?  'meta_value_num ' . esc_attr( $attributes['orderby'] ) : 'meta_value_num ' . get_option( 'sirve_post_order_by', 'ID' ),
                                    'order'          => (isset($attributes['order']) && !($attributes['order'] == '')) ? esc_attr( $attributes['order'] ) : get_option( 'sirve_post_order', 'DESC' ),
                                    'meta_key'       => 'htSirveFeaturePost',
                                    'posts_per_page' => $sirve_par_pages,
                                    'offset'         => ($currentPage ) * $sirve_par_pages,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'sirve_tag',
                                            'field'    => 'slug',
                                            'terms'    => $sirve_queried_object->slug,
                                        ),
                                    ),
                                );

                                $query = new WP_Query( $args );
                                if(!($query->post_count == 0)):
                                    $sirve_tag = array($sirve_queried_object->slug);
                                    sirve_pagination($query, $currentPage,'all' ,'', $sirve_tag );
                                else:
                                    ?><p class="text-center sirve_psa_wrapper sirve_no_result"><?php echo esc_html__( 'List Not Found', 'sirve' ) ?></p><?php 
                                endif;
                                wp_reset_query();
                            ?>
                        </div>
                    </div>
            </div>
        </div>
        <div class="sirve-loader"></div>
    </div>
    <!-- Archive Layout End-->
<?php 

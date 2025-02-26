<!-- Archive Layout Start-->
<div class="sirve_event_archive_page <?php echo esc_attr( (get_option('sirve_archive_page_style', 'style-1') == 'style-4') ? 'sirve__container--xl' :  'sirve__container'); ?>" <?php if(isset($attributes)){ echo esc_attr( "data-sirveoptions=" ). json_encode(  $attributes );}?>>
    <?php $terms_sirve_category = event_and_tags_sirve_menu_filter( $event,"", $exclude_menu );?>
        <div class="sirve__row">
            <div class="sirve__col-lg-12">
                <!-- Header Area Start -->
                <div class="sirve__header">
                    <ul class="nav sirve__nav-tabs" data-tab-target="#sirveTabContent">
                        <?php
                            $manuActive = true;
                            if ( !is_wp_error( $terms_sirve_category ) ):
                                ?>
                                <li class="sirve__nav-item">
                                    <button class="sirve__nav-link scarch-item <?php if($manuActive == true){ echo esc_attr( 'active' ); $manuActive = false;}  ?>" data-category="all" data-target="#all" data-sirveevent='<?php echo esc_attr( $event )?>' type="button"> 
                                        <?php echo esc_html(( get_option('sirve_frontend_menu_text') == '') ? 'All Listing' :  get_option('sirve_frontend_menu_text', 'All Listing'), 'sirve') ?>    
                                    </button>
                                </li>

                                <?php
                                foreach ( $terms_sirve_category as $single_sirve_category ) :   ?>  
                                    <li class="sirve__nav-item">
                                        <button class="sirve__nav-link <?php if($manuActive == true){ echo esc_attr( 'active' ); $manuActive = false;} ?>" data-target="#<?php echo esc_attr( $single_sirve_category['slug'] ) ?>" data-sirveevent='<?php echo esc_attr( $event )?>' data-category="<?php echo esc_attr( $single_sirve_category['slug'] ) ?>" type="button">
                                            <?php echo esc_html( $single_sirve_category['name'] ) ?>
                                        </button>
                                    </li>
                                <?php
                                endforeach;
                            endif;
                        ?>
                    </ul>
                    <div class="sirve__search">
                        <input id="sirve__search-input-field" class="sirve__search-input" type="text" placeholder="<?php echo esc_attr__( 'Search here', 'sirve' ) ?>">
                        <button class="search_button"><img src="<?php echo esc_url( SIRVE_PL_URL .'assets/icons/search.svg') ?>" alt=""></button>
                    </div>
                </div>
                <!-- Header Area Start -->
            </div>
        </div>   
    
    <div class="sirve__body">
        <div class="sirve__tab-content" id="sirveTabContent">
            <?php
            $postActive = true;
            if ( !is_wp_error( $terms_sirve_category ) ):?>
                <div class="sirve__tab-pane <?php if($postActive == true){ echo esc_attr( 'active' ); $postActive = false;}  ?>" id="all">
                    <div class="sirve-ajax-search sirve__row ">
                        
                    <?php 
                        $sirve_par_pages;
                        if(!empty(get_option('sirve_par_pages'))){
                            $sirve_par_pages = get_option('sirve_par_pages');
                        }else{
                            $sirve_par_pages = 15;
                        }

                        $currentPage = ( isset($_REQUEST['page']) ) ? intval( $_REQUEST['page'] ) : 0;
                        $sirveCatoragorys = get_terms( 'sirve_category');
                        $sirveCatogry = array();
                        foreach($sirveCatoragorys as $catagory){
                            $sirveCatogry[] = $catagory->slug;
                        }

                        $args = array(
                            'post_type'         => 'sirve',
                            'post_status'       => 'publish',
                            'orderby'           => (isset($attributes['orderby']) && !($attributes['orderby'] == '')) ?  'meta_value_num ' . esc_attr( $attributes['orderby'] ) : 'meta_value_num ' . get_option( 'sirve_post_order_by', 'ID' ),
                            'order'             => (isset($attributes['order']) && !($attributes['order'] == '')) ? esc_attr( $attributes['order'] ) : get_option( 'sirve_post_order', 'DESC' ),
                            'meta_key'       	=> 'htSirveFeaturePost',
                            'posts_per_page'    => $sirve_par_pages,
                            'offset' => ( $currentPage ) * $sirve_par_pages,
                            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => 'sirve_category',
                                    'field'    => 'slug',
                                    'terms'    => $sirveCatogry
                                ),
                                array(
                                    'taxonomy' => 'sirve_event',
                                    'field'    => 'slug',
                                    'terms'    => esc_attr( $event ),
                                ),
                            ),
                        );

                        $query = new WP_Query( $args );
                        if(!($query->post_count == 0)):
                            sirve_pagination($query, $currentPage, 'all', $event );
                        else:
                            ?><p class="text-center sirve_psa_wrapper sirve_no_result"><?php echo esc_html__( 'List Not Found', 'sirve' ) ?></p><?php 
                        endif;
                        wp_reset_query();
                    ?>
                    </div>
                </div>

                <?php
                foreach ( $terms_sirve_category as $single_sirve_category ): ?>
                    <div class="sirve__tab-pane <?php if($postActive == true){ echo esc_attr( 'active' ); $postActive = false;}  ?>" id="<?php echo esc_attr( $single_sirve_category['slug'] ) ?>">
                        <div class="sirve__row sirve-ajax-search"></div>
                    </div>
                <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
    <div class="sirve-loader"></div>
</div>
<!-- Archive Layout End-->
<?php
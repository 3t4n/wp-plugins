<?php
function sirve_post_render( $query, $loder=true, $shortcode=false, $style='4' ){
    $sirve_queried_object =  get_queried_object();

    while($query->have_posts()): $query->the_post();
        
        if(isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_category' || isset($sirve_queried_object->taxonomy) && $sirve_queried_object->taxonomy == 'sirve_tag' ){
            sirve_post_render_category_content( $loder, $shortcode);
        }else{
            sirve_post_render_content( $loder, $shortcode, $style);
        }
        
    endwhile;
    
}

function sirve_post_render_content( $loder, $shortcode, $style){?>   
        <div class="<?php 
        
            if(!$shortcode){
                echo esc_attr((get_option('sirve_archive_page_style', 'style-1') === 'style-1' || get_option('sirve_archive_page_style') === 'style-3'  ) ? 'sirve__col-lg-4 sirve__mb-30' :  'sirve__col-lg-6 sirve__mb-30');
            }else{
                // echo esc_attr('sirve__col-lg-12');
                // if($style == '1'){}
                echo esc_attr(($style === '1' || $style === '3'  ) ? 'sirve__col-lg-12 sirve__mb-30' :  'sirve__col-lg-12 sirve__mb-30');
            }
            echo esc_attr( ($shortcode) ? ' sirve__single_list' : '' );
        ?>">
            <div class="<?php 
            if(!$shortcode){
                if(get_option('sirve_archive_page_style', 'style-1') === 'style-1'):
                    echo esc_attr( 'sirve__card' );
                elseif(get_option('sirve_archive_page_style') === 'style-2'):
                    echo esc_attr( 'sirve__card-horizontal sirve__card--horizontal' );
                elseif(get_option('sirve_archive_page_style') === 'style-3'):
                    echo esc_attr( 'sirve__card sirve__card--three' );
                elseif(get_option('sirve_archive_page_style') === 'style-4'):
                    echo esc_attr( 'sirve__card-horizontal sirve__card--four' );
                endif;
            }else{
                if($style == '1'):
                    echo esc_attr( 'sirve__card' );
                elseif($style == '2'):
                    echo esc_attr( 'sirve__card-horizontal sirve__card--horizontal' );
                elseif($style == '3'):
                    echo esc_attr( 'sirve__card sirve__card--three' );
                elseif($style == '4'):
                    echo esc_attr( 'sirve__card-horizontal sirve__card--four' );
                endif;

            }?>">

                <!-- Featured Image Controler -->
                <?php if(get_option("sirve_archive_page_image") != "yes"){
                    featured_image_controler();
                }
            
                if((get_option("sirve_archive_page_title") != "yes") || (get_option("sirve_archive_page_description") != "yes") || (get_option("sirve_archive_page_category") != "yes") || (get_option("sirve_archive_page_buttons") != "yes")):?>          
                    <div class="sirve__content">
                        <!-- Post Titel -->
                        <?php 
                            //Title Controler
                            if(get_option("sirve_archive_page_title") != "yes"){
                                title_controler();
                            }

                            //Description Controler
                            if(get_option("sirve_archive_page_description") != "yes"){
                                description_controler();
                            }
                        
                            //Category Controler
                            if(get_option("sirve_archive_page_category") != "yes"){
                                category_controler();
                            }

                            //Tags Controler
                            if(get_option("sirve_archive_page_tags") != "yes"){
                                tag_controler();
                            }
                        
                            //Button Controler
                            if(get_option("sirve_archive_page_buttons") != "yes"){
                                button_controler();
                            }
                        ?>
                    </div>
                <?php endif ?>

            </div>
        </div>
    <?php
}

// Render Category Page Content
function sirve_post_render_category_content( $loder, $shortcode){ ?>   
        <div class="<?php 
            if(!$shortcode){
                echo esc_attr((get_option('sirve_archive_page_style', 'style-1') === 'style-1' || get_option('sirve_archive_page_style') === 'style-3'  ) ? 'sirve__col-lg-4 sirve__mb-30' :  'sirve__col-lg-6 sirve__mb-30');
            }else{
                echo esc_attr('sirve__col-lg-12');
            }
        echo esc_attr( ($shortcode) ? ' sirve__single_list' : '' );
        ?>">
            <div class="<?php 
            if(!$shortcode){
                if(get_option('sirve_archive_page_style', 'style-1') === 'style-1'):
                    echo esc_attr( 'sirve__card' );
                elseif(get_option('sirve_archive_page_style') === 'style-2'):
                    echo esc_attr( 'sirve__card-horizontal sirve__card--horizontal' );
                elseif(get_option('sirve_archive_page_style') === 'style-3'):
                    echo esc_attr( 'sirve__card sirve__card--three' );
                elseif(get_option('sirve_archive_page_style') === 'style-4'):
                    echo esc_attr( 'sirve__card-horizontal sirve__card--four' );
                endif;
            }else{
                echo esc_attr( 'sirve__card-horizontal sirve__card--four' );
            }?>">

                <!-- Featured Image Controler -->
                <?php if(get_option("sirve_category_archive_page_image") != "yes"):
                    featured_image_controler();
                endif;
                
                
                if((get_option("sirve_category_archive_page_title") != "yes") || (get_option("sirve_category_archive_page_description") != "yes") || (get_option("sirve_category_archive_page_category") != "yes") || (get_option("sirve_category_archive_page_buttons") != "yes")):?>          
                    <div class="sirve__content">

                        <?php 
                            //Title Controler
                            if(get_option("sirve_archive_page_title") != "yes"){
                                title_controler();
                            }
                        
                            //Description Controler
                            if(get_option("sirve_category_archive_page_description") != "yes"){
                                description_controler();
                            }

                            //Category Controler
                            if(get_option("sirve_category_archive_page_category") != "yes"){
                                category_controler();
                            }

                            //Tags Controler
                            if(get_option("sirve_category_archive_page_tags") != "yes"){
                                tag_controler();
                            }
                
                            //Button Controler
                            if(get_option("sirve_category_archive_page_buttons") != "yes"){
                                button_controler();    
                            }
                        ?>
                    </div>
                <?php endif ?>

            </div>
        </div>
    <?php
}

//Featured Image Controler
function featured_image_controler(){
    //Permalink
    $post_permalink = get_permalink();

    //Disable Single Page:
    $sirveSinglePage = get_option( 'sirve_single_page' );
    //Sirve Feature Text
    $SirveFeaturePostEnable = get_post_meta( get_the_ID(), 'htSirveFeaturePost', true );
    $sirveFeatured = get_post_meta( get_the_ID(), 'htSirveFeatureText', true );
    
    //Featured Image
    $sirveItemImage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
    //Featured Image Alt
    $sirveItemImageAlt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); 
    ?>
    <div class="sirve__thum">
        <?php if( isset( $sirveItemImage[0]) ): ?>
            <?php if( $sirveSinglePage == 'yes'): ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr( $sirveItemImageAlt )?>">
            <?PHP else: ?>
                    <a href="<?php echo esc_attr( $post_permalink ) ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr( $sirveItemImageAlt )?>"></a>
            <?PHP endif;
            endif; ?>

        <?php if( $sirveFeatured && $SirveFeaturePostEnable == '1'): ?>
            <span class="sirve__featured"><?php echo esc_attr( $sirveFeatured ) ?></span>
        <?php endif; ?>
    </div>
<?php }

//Title Controler
function title_controler(){
    //Permalink
    $post_permalink = get_permalink();
    //Disable Single Page:
    $sirveSinglePage = get_option( 'sirve_single_page' );
    if( $sirveSinglePage == 'yes'): 
        the_title('<h3 class="sirve__title">', '</h3>');
    else: ?>
        <a href="<?php echo esc_attr( $post_permalink ) ?>"><?php the_title('<h3 class="sirve__title">', '</h3>'); ?></a>
    <?php endif;
}

//Description Controler
function description_controler(){    
    //Post Grid Word
    $show_post_word = (!empty( get_option('sirve_post_grid_word'))) ?  get_option('sirve_post_grid_word') : 40;

    if(!empty(get_the_content())):?>
        <div class="sirve__des"><?php echo wp_trim_words( get_the_excerpt(), $show_post_word) ?></div>    
    <?php endif; 
}

//Category Controler
function category_controler(){
    $terms_category =  get_the_terms( get_the_ID(), 'sirve_category' );
    if($terms_category){
        echo "<div class='sirve-post-categorys'>";
            echo esc_html( get_option('sirve_fontend_category_lable','Category: '));
            $category_count = count($terms_category);
            $single_category_count = 1;

            foreach ( $terms_category as $category ):
                $term_link = get_term_link( $category );
                $separator = ($category_count > $single_category_count) ? get_option('sirve_fontend_category_and_tag_separator',','):'';
                ?>

                <a href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $category->name.$separator )?></a>
            <?php 
                $single_category_count++;
            endforeach;
        echo "</div>";
    }
}

//Tags Controler
function tag_controler(){
    $terms_tag =  get_the_terms( get_the_ID(), 'sirve_tag' );
    if($terms_tag){
        echo "<div class='sirve-post-tags'>";
            echo esc_html( get_option('sirve_fontend_tag_lable','Tags: '));
            $tag_count = count($terms_tag);
            $single_tag_count = 1;

            foreach ( $terms_tag as $tag ):
                $term_link = get_term_link( $tag );
                $separator = ($tag_count > $single_tag_count) ? get_option('sirve_fontend_category_and_tag_separator',','):'';
                ?>

                <a href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $tag->name.$separator )?></a>
            <?php 
                $single_tag_count++;
            endforeach;
        echo "</div>";
    }
}

//Button Controler
function button_controler(){
    //Disable Single Page:
    $sirveSinglePage = get_option( 'sirve_single_page' );
    //Details Page Enable/Disable
    $sirveSinglePageButtonLink = get_option( 'sirve_single_page_button_link_enable' );
    // Button Text 1
    $sirveButtonText1 = esc_html__( 'Live Preview', 'sirve' );
    if(!empty( get_post_meta( get_the_ID(), 'htSirveButtonText', true ) )){
        $sirveButtonText1 = get_post_meta( get_the_ID(), 'htSirveButtonText', true );
    }elseif( !empty( get_option('sirve_button_one_text'))){
        $sirveButtonText1 = get_option('sirve_button_one_text');
    }

    //SEO NoIndex
    $sirveDoFollowEnableBtn1 = get_post_meta( get_the_ID(), 'htSirveDoFollowPostBtn1', true );
    $sirveDoFollowEnableBtn2 = get_post_meta( get_the_ID(), 'htSirveDoFollowPostBtn2', true );
    
    // Buttion 1 URL
    $sirveButtonUrl1 = get_post_meta( get_the_ID(), 'htSirveButtonUrl', true );
    // Buttion 1 URL Target
    $sirveButtonUrltarget = get_post_meta( get_the_ID(), 'htSirveButtonUrlTarget', true );
    // Single Page Button Text
    $sirveButtonText2 = "";
    if(!($sirveSinglePage == "yes" || $sirveSinglePageButtonLink == "yes")){
        $sirveButtonText2 = esc_html__( 'More Details', 'sirve' );
        if( !empty( get_option('sirve_single_page_button_text'))){
            $sirveButtonText2 = get_option('sirve_single_page_button_text');
        }
    }else{
        $sirveButtonText2 = esc_html__( 'More Details', 'sirve' );
        if(!empty( get_post_meta( get_the_ID(), 'htSirveButtonText2', true ) )){
            $sirveButtonText2 = get_post_meta( get_the_ID(), 'htSirveButtonText2', true );
        }elseif( !empty( get_option('sirve_single_page_button_text')) ){
            $sirveButtonText2 = get_option('sirve_single_page_button_text');
        }
    }

    // Post Permalink and Button Target
    $post_permalink = get_permalink();
   
    if( !($sirveSinglePage == 'yes' || $sirveSinglePageButtonLink == "yes")){
        $post_permalink = get_permalink();
        $sirveButtonTarget2 = '';
    }else{
        $post_permalink = get_post_meta( get_the_ID(), 'htSirveButtonUrl2', true );
        $sirveButtonTarget2 =  get_post_meta( get_the_ID(), 'htSirveButtonUrlTarget2', true );
    }

    // SEO Button Configuration
    $sirveDoFollowResult1 = '';
    $sirveDoFollowResult2 = '';
    
    // BUtton 1
    if($sirveButtonUrltarget == "_blank"){
        if($sirveDoFollowEnableBtn1 == 1){
            $sirveDoFollowResult1 = 'rel="noopener noreferrer"';
        }else{
            $sirveDoFollowResult1 = 'rel="nofollow noopener noreferrer"';
        }
    }else{
        if($sirveDoFollowEnableBtn1 == 1){
            $sirveDoFollowResult1 = '';
        }else{
            $sirveDoFollowResult1 = 'rel="nofollow"';
        }
    }

    // Button 2
    if($sirveButtonTarget2 == "_blank"){
        if($sirveDoFollowEnableBtn2 == 1){
            $sirveDoFollowResult2 = 'rel="noopener noreferrer"';
        }else{
            $sirveDoFollowResult2 = 'rel="nofollow noopener noreferrer"';
        }
    }else{
        if($sirveDoFollowEnableBtn2 == 1){
            $sirveDoFollowResult2 = '';
        }else{
            $sirveDoFollowResult2 = 'rel="nofollow"';
        }
    }

    ?>
    <div class="sirve__button_box">
        <?php if( isset($sirveButtonUrl1) && !empty($sirveButtonUrl1)): ?>
            <a class="sirve__button sirve__button-live" href="<?php echo esc_attr( $sirveButtonUrl1 ) ?>" target="<?php echo esc_attr( $sirveButtonUrltarget ) ?>" <?php echo $sirveDoFollowResult1 ?>><?php echo wp_kses_post( $sirveButtonText1 ) ?></a>
        <?php endif ?>
        
        <?php if(isset($post_permalink) && !$post_permalink == ''): ?>
            <a class="sirve__button sirve__button-visit" href="<?php echo esc_attr( $post_permalink ) ?>" target="<?php echo esc_attr( $sirveButtonTarget2 )?>" <?php echo $sirveDoFollowResult2 ?>><?php echo wp_kses_post( $sirveButtonText2 ) ?></a>
        <?php endif ?>
    </div>
<?php }
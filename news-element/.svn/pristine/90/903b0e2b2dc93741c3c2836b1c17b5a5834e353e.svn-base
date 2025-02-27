<?php
use News_Element\Khobish_Helper;

function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {

        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }

        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }

    return implode( '', $paragraphs );
}


function khb_thumb_gallery($options){

    $slider_options = [
        'items' => $options['items'],
        'itemstab' => $options['itemstab'],
        'auto' => $options['auto'],
        'speed' => $options['speed'],
    ];

    $video = get_post_meta( $options['id'], 'khbgallery', false );
    $check_empty = array_filter($video);
    if (empty($check_empty)) {
        return;
    }
    $img = implode($video);
    $img2 = explode( ',', $img );
    $out='';$outhmb='';
    foreach ($img2 as $item){

        $a = explode( '|', $item );
        $alt = get_the_title($a[0]);
        $attachment_data = wp_prepare_attachment_for_js($a[0]);
        $img = wp_get_attachment_image_src( $a[0],$options['img']);
        $imgthmb = wp_get_attachment_image_src( $a[0],$options['imgth']);

        $placeholder = NEWS_ELM_URL.'assets/lazyload.svg';
        $out.='<img class="featured-img lazyload" src= "'.$placeholder.'" width= "'.$attachment_data['width'].'" height="'.$attachment_data['height'].'" data-src="'.$img[0].'" alt="'.$alt.'"/>';
        $outhmb.='<img class="featured-img lazyload" src= "'.$placeholder.'" width= "'.$attachment_data['width'].'" height="'.$attachment_data['height'].'" data-src="'.$imgthmb[0].'" alt="'.$alt.'"/>';

    }

    $outz = '
        <div class="khbpostgallaerysync" data-xld ='.wp_json_encode($slider_options).'>
            <div class="inr">
            <div class="khbpostmain slider">
                '.$out.'
            </div>
            <div class="khbpostsync slider">
                '.$outhmb.'
            </div>

          <div class="khbpnwrap">
            <div class="khbprnx khbnxt"><i class="fa fa-chevron-left"></i></div>
            <div class="khbprnx khbprev"><i class="fa fa-chevron-right"></i></div>
          </div>
        </div>
        </div>
    ';

    return $outz;
}


function khb_related_post($options){

    $ids = get_post_meta( $options['id'], 'khbrelpost', false );

    $idstring = implode($ids);
    $id_arr = explode( ',', $idstring );

    $args = array(
       'post_type' => 'post',
       'post__in'      => $id_arr
    );

    ob_start();
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
        echo '<div class="khbinlinerelated">';
        echo '<span class="khbrelatedhead">'.$options['label'].'</span>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();?>

            <article class="post-item <?php echo Khobish_Helper::xl_post_format_icon();?>">
            <?php if ( has_post_thumbnail() && $options['relhidethumb']) : ?>
                <div class="ft-thumbwrap">
                  <a href="<?php the_permalink();?>">
                    <span class="icon"></span>
                    <?php the_post_thumbnail($options['img']);?>
                  </a>
                </div>
            <?php endif; ?>
              <div class="excerpt-wrap">
                <?php Khobish_Helper::ae_build_postmeta($options['meta'],0);?>
              </div>
            </article>

       <?php }
        echo '</div>';
    }

    wp_reset_postdata();

    $out = ob_get_clean();

    return $out;
}

function objectToArray($d) {
    if (is_object($d)) {
        $d = get_object_vars($d);
    }
    if (is_array($d)) {
        return array_map(__FUNCTION__, $d);
    }
    else {
        return $d;
    }
}

function khb_review_post($options){

    $heading = get_post_meta( $options['id'], 'khbrevtitle', true );
    $summary = get_post_meta( $options['id'], 'khbsummary', true );

    $pro = get_post_meta( $options['id'], 'khbpros', true );
    $pro_arr = explode( '|', $pro );
    $pro_out = '';
    $con_out ='';
    foreach ($pro_arr as $item){
        $pro_out.= '<li><i class="'.$options['proicon'].'"></i> '.$item.'</li>';
    }

    $con = get_post_meta( $options['id'], 'khbcons', true );
    $con_arr = explode( '|', $con );
    foreach ($con_arr as $item){
        $con_out.= '<li><i class="'.$options['conicon'].'"></i> '.$item.'</li>';
    }


    $rating = get_post_meta( $options['id'], 'khbrating', true );
    $jonarr = json_decode($rating);

    $array = objectToArray($jonarr);
    $sum = '';
    $rat_out = '';

    if (is_array($array)){

        foreach ($array as $item){
            $rat_out.= '

              <div class="khb-rating-inr">
                <div class="khb-review-wrap-title">'.$item["rlabel"].'</div>
                <div class="khb-review-percent">'.$item["rrating"].'%</div>
                <div class="khb-review-wrap-bar" style="width: '.$item["rrating"].'%;"></div>
              </div>

            ';

        }

        $sum = array_sum(array_column($array,'rrating'))/count($array);

    }
    $rev_heading = $heading ? '<h3 class="review-head">'.$heading.'</h3>' : '';

    $html = '
    <div class="khb-review-wrap">
        '.$rev_heading.'
         <div class="khb-review-head">
            <div class="review-total">
               '.ceil($sum).'
            </div>
            <div class="review-desc">
                '.$summary.'
            </div>
         </div><!--.khb-review-head -->

         <div class="khb-review-pro-cons">
            <div class="inr">
                <div class="khb-pros">
                    <ul>'.$pro_out.'</ul>
                </div>

                <div class="khb-cons">
                    <ul>'.$con_out.'</ul>
                </div>
            </div>
         </div>
         <div class="khb-rating-wrap">
            '.$rat_out.'
         </div>
    </div>

    ';

   return $html;
}

function khb_floating_social($id,$display){

    if ($display){

        if( has_post_thumbnail() ){
            $share_image = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
            $share_image= $share_image[0];
            $share_image_portrait= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
            $share_image_portrait= $share_image_portrait[0];
        }else{
            $share_image= '';
            $share_image_portrait= '';
        }
        $share_excerpt = strip_tags( get_the_excerpt(), '<b><i><strong><a>' );

        $html = '

        <div class="sidebar sidebar-top">

        <a class="khb-facebook" href="http://www.facebook.com/sharer.php?u='.rawurlencode( get_the_permalink() ).'"><i class="fa fa-facebook"></i></a>
        <a class="khb-twitter" href="http://twitter.com/intent/tweet?text='.rawurlencode( get_the_title()).'&amp;url='.rawurlencode( get_the_permalink() ).'"><i class="la la-twitter"></i></a>

        <a class="khb-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.rawurlencode( get_the_permalink()).' &amp;title='.rawurlencode(get_the_title()).'&amp;summary='.rawurlencode ( $share_excerpt ).'&amp;source='.rawurlencode( get_bloginfo('name') ).'" class="xld_btn-linkedin"><i class="fa fa-linkedin"></i></a>
        <a class="khb-pinterest" href="http://pinterest.com/pin/create/button/?url='.rawurlencode( get_the_permalink() ).'&amp;media='.rawurlencode( $share_image_portrait ).'&amp;description='.rawurlencode( get_the_title() ).'" class="xld_btn-pinterest "><i class="fa fa-pinterest-p"></i></a>

        </div>
        ';
        return $html;

    }

}
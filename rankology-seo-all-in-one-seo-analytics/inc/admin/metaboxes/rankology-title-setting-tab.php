<?php 
$data_attr = [];
$disabled = [];
$data_attr['data_tax'] = '';
$data_attr['termId'] = '';
if ('post-new.php' == $pagenow || 'post.php' == $pagenow) {
    
    $data_attr['current_id'] = get_the_id();
    $data_attr['origin'] = 'post';
    $data_attr['title'] = get_the_title($data_attr['current_id']);


    require_once dirname(__FILE__) . '/post-title-description.php';
} elseif ('term.php' == $pagenow || 'edit-tags.php' == $pagenow) {
    global $tag;
    
    $data_attr['current_id'] = $tag->term_id;
    $data_attr['termId'] = $tag->term_id;
    $data_attr['origin'] = 'term';
    $data_attr['data_tax'] = $tag->taxonomy;
    $data_attr['title'] = $tag->name;
    require_once dirname(__FILE__) . '/taxonomy-term-title-description.php';
}



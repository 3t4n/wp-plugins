<?php

$nav = array();
$t = array();
$map = array();
$target = 'fi_' . uniqid(rand(1,9999));

foreach($items as $k => $v) {
    $nav[sanitize_title($v['tag'])] = $v['tag'];
    $t['tag'] = sanitize_title($v['tag']);
    $map[] = $t;
    $t = array();
}

?>

<div uk-filter="target: #<?php echo $target; ?>" class="eso-filter">

    <ul class="uk-subnav uk-subnav-pill <?php echo esc_attr(implode(' ', $nav_class)); ?>">
        <li class="uk-active <?php echo esc_attr(implode(' ', $tag_class)); ?>" uk-filter-control>
            <a class="<?php echo esc_attr(implode(' ', $tag_class)); ?>" href="#"><?php echo esc_html($all); ?></a>
        </li>
        <?php foreach($nav as $k => $v) : ?>
            <li uk-filter-control="[data-tags*='<?php echo $k; ?>']">
                <a class="<?php echo esc_attr(implode(' ', $tag_class)); ?>" href="#"><?php echo esc_html($v); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <ul id="<?php echo $target; ?>" class="<?php echo esc_attr(implode(' ', $items_class)); ?>" uk-grid="masonry: <?php echo $masonry; ?>" <?php echo $lightbox; ?>>
        <?php foreach($items as $k => $v) : ?>
            <li data-tags="<?php echo $map[$k]['tag']; ?>">
                <?php
                $content_builder_id = substr( md5( json_encode( $v['content'] ) ), 0, 8 );
                echo siteorigin_panels_render( 'w'.$content_builder_id, true, $v['content'] );
                ?>
            </li>
        <?php endforeach; ?>
    </ul>

</div>

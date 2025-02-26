
<div id="widget_4">
<?
if(is_array($instance['category_id']))
{
    $cat = implode(',',$instance['category_id']);
}else{
    $cat = $instance['category_id'];
}
$args = array (
	'posts_per_page'=> $instance['rows'],
    'cat'=>$cat,
    'offset'=>$instance['offest'],
    'order'=>'DESC'
);
if($instance['order']=='rand')
{
    $args['orderby']=$instance['order'];
}
if($instance['order']=='post_views')
{
	$args['meta_key']= 'post_views';
	$args['orderby']='meta_value_num';
}
if($instance['order']=='comment_count')
{
	$args['meta_key']= 'comment_count';
	$args['orderby']='meta_value_num';
}
if($instance['order']=='ID')
{
	$args['orderby']='ID';
}
// The Query
$the_query = new WP_Query($args);
// The Loop
$c = 0;
while($the_query->have_posts()):
    $c++;
    $the_query->the_post();
    ?>
        <div class="article-item">
            <a href="<?php the_permalink(); ?>"title="<?=get_the_title()?>"><img class="widget_4_img" src="<?php echo devniaHelper::thumbnail(get_the_id(),'thumb-img') ?>" /></a>
            <a href="<?php the_permalink(); ?>"title="<?=get_the_title()?>" class="news-item-link"><?=get_the_title()?></a>
            <?if($instance['writer']){?>
            <br />
            <a href="<?=get_permalink()?>" title="<?the_title_attribute()?>" class="article-writer-link"><?=get_post_meta(get_the_ID(), 'writer_name', true);?></a>
            <?}?>
            <div class="clearfix"></div>
        </div>
    <?
endwhile;

wp_reset_postdata();
?>

</div>
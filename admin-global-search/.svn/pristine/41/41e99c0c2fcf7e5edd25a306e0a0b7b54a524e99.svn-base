<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
$aClassObj = new WPS_ADMIN_GLOBAL_SEARCH();
$aTypes = get_post_types(array("public" => true));
$bad_keys = array('attachment',);
$aTypes = array_diff_key($aTypes,array_flip($bad_keys));

$keyword = $aVars['keyword'];

foreach($aTypes as $aType)
{
$aQuery = new WP_Query( array('s' => $keyword, 'post_type' => $aType) );
?>
<h4><?php echo ucfirst($aType); ?> : </h4>
<?php
if ( $aQuery->have_posts() ) 
{
?>
<ul>
<?php
while ( $aQuery->have_posts() )
{
$aQuery->the_post();
?>
<li><a href="<?php echo get_edit_post_link(); ?>"><?php the_title(); ?></a></li>
<?php } ?>
</ul>
<?php } else { ?>
<p>Sorry, but no <?php echo $aType; ?> found in your search criteria.</p>
<?php } ?>		
<?php } ?>

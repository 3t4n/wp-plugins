<h4><a href="#TB_inline?height=100&width=100&inlineId=HiddenCategory" class="thickbox" ><?php _e( 'Select Category' ); ?></a></h4>


<?php

// get all post id if it is edit page
$post_cat = get_the_category( $id );
$cat_ids = array();
$cat_ids[0] = 0;
if( count($post_cat) > 0 ) foreach( $post_cat as $cat_obj ) {

    $cat_ids[] = $cat_obj->term_id;
}
?>

<!-- List the selected categories -->
<div class="tagchecklist" id="WP_cl_categories">
    
    <?php if( count( $cat_ids ) > 1 ) for( $i=1; $i <= count($cat_ids); $i++ ) { ?>

    <span><!--<a class="ntdelbutton" id="post_tag-check-num-0">X</a>--><?php echo get_cat_name($cat_ids[$i]); ?></span>

    <?php } ?>

</div>
<!-- List the selected categories end -->



<div id="HiddenCategory" style="display: none;" >
    <p>
        Please Select categories below:

        <ul id="PopupCategoryList">

        <?php
       
        $args = array(
	'type'                     => 'post',
	'child_of'                 => '',
	'parent'                   => 0,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false );

        $categories = get_categories( $args );

        foreach ($categories as $category) {

        ?>

            <li class="popular-category" id="category-1">
                <label class="selectit">
                    <input type="checkbox" <?php if( array_search( $category->term_id, $cat_ids ) > 0 ) { ?> checked="checked" <?php } ?>  id="in-category-<?php echo $category->term_id; ?>" name="post_category[]" value="<?php echo $category->term_id; ?>"> <?php echo $category->cat_name; ?>
                </label>

                <?php popup_category($category->term_id, $cat_ids ); ?>

            </li>

        <?php  } ?>

        </ul>
    <p style="text-align: center;"><input type="submit" onclick="tb_remove()" value="Save" id="SaveCategory"></p>

    </p>
</div>


<?php

function popup_category($cat_ID, $cat_ids)
{


        $args = array(
	'type'                     => 'post',
	'child_of'                 => '',
	'parent'                   => $cat_ID,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'category',
	'pad_counts'               => false );

        $categories = get_categories( $args );


        if( count($categories) < 1 )
            return false;

    ?>
<ul class="sub-category parent-cat-<?php echo $cat_ID;?>" style="margin-left: 15px; margin-top: 5px;">

    <?php



        foreach ($categories as $category) {
    ?>


            <li class="popular-category" id="category-1">
                <label class="selectit">
                    <input type="checkbox" <?php if( array_search( $category->term_id, $cat_ids ) > 0 ) { ?> checked="checked" <?php } ?>  id="in-category-<?php echo $category->term_id; ?>" name="post_category[]" value="<?php echo $category->term_id; ?>"> <?php echo $category->cat_name; ?>
                </label>

                <?php popup_category($category->term_id, $cat_ids ); ?>

            </li>


    <?php } ?>


</ul>

<?php

}

?>

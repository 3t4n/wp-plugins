<?php

if(is_single() && $percents = get_post_meta(get_the_ID(), 'futura_percentage_for_post', true)){
    $content_percentage = $this->content_percentage;
    $title_percentage =  $this->title_percentage;
    $excerpt_percentage =  $this->excerpt_percentage;
    $image_percentage =  $this->image_percentage;
    $tag_percentage =  $this->tag_percentage;
    $taxonomy_percentage =  $this->taxonomy_percentage;
    $custom_field_percentage =  $this->custom_field_percentage;
    $author_percentage = $this->author_percentage;
}else{
    $content_percentage =  get_option('futura_content_percentage');
    $title_percentage =  get_option('futura_title_percentage');
    $excerpt_percentage =  get_option('futura_excerpt_percentage');
    $image_percentage =  get_option('futura_image_percentage');
    $tag_percentage =  get_option('futura_tag_percentage');
    $taxonomy_percentage =  get_option('futura_tax_percentage');
    $custom_field_percentage =  get_option('futura_cf_percentage');
    $author_percentage =  get_option('futura_author_percentage');
}

?>


<dl>
    <dt><?php _e( 'Content', 'futura' ) ?></dt>
    <dd><input id="futura_content_percentage" type="number" name="content_percentage" value="<?php print $content_percentage; ?>"> %</dd>
</dl>
<!--
<dl>
    <dt><?php _e( 'Title', 'futura' ) ?></dt>
    <dd><input type="number" name="title_percentage" value="<?php print $title_percentage; ?>"> %</dd>
</dl>
-->
<dl>
    <dt><?php _e( 'Excerpt', 'futura' ) ?></dt>
    <dd><input type="number" name="excerpt_percentage" value="<?php print $excerpt_percentage; ?>"> %</dd>
</dl>
<dl>
    <dt><?php _e( 'Image', 'futura' ) ?></dt>
    <dd><input type="number" name="image_percentage" value="<?php print $image_percentage; ?>"> %</dd>
</dl>
<dl>
    <dt><?php _e( 'Tag', 'futura' ) ?></dt>
    <dd><input type="number" name="tag_percentage" value="<?php print $tag_percentage; ?>"> %</dd>
</dl>
<dl>
    <dt><?php _e( 'Custom Field', 'futura' ) ?></dt>
    <dd><input type="number" name="cf_percentage" value="<?php print $custom_field_percentage; ?>"> %</dd>
</dl>
<dl>
    <dt><?php _e( 'Category', 'futura' ) ?>, <?php _e( 'Taxonomy', 'futura' ) ?></dt>
    <dd><input type="number" name="tax_percentage" value="<?php print $taxonomy_percentage; ?>"> %</dd>
</dl>
<dl>
    <dt><?php _e( 'Author', 'futura' ) ?></dt>
    <dd><input type="number" name="author_percentage" value="<?php print $author_percentage; ?>"> %</dd>
</dl>
<input name="futura-submit" id="futura-submit" class="button button-primary" type="submit" value="<?php _e( 'submit', 'futura' ) ?>" />

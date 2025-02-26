<span class="<?php echo $this->pre; ?>-cb-wrapper <?php if($post->post_status != 'publish'): ?><?php echo $this->pre; ?>-draft<?php endif; ?> <?php if($post->post_type == 'post' || $post->post_type == 'product'): ?><?php echo $this->pre; ?>-feature<?php endif; ?>">
    <?php if($post->post_type == 'post'): ?>
    <input id="_featured" type="checkbox" name="_featured" <?php if($post->_featured == 'yes'): ?>checked="checked" <?php endif; ?> /><label for="_featured">Featured Post</label>
    <?php elseif($post->post_type == 'product'): ?>
    <?php
    $product_object = $post->ID ? wc_get_product($post->ID) : new WC_Product;
    ?>
    <input id="_featured" type="checkbox" name="_featured" <?php if(wc_bool_to_string($product_object->get_featured()) == 'yes'): ?>checked="checked" <?php endif; ?> /><label for="_featured">Featured Item</label>
    <?php endif; ?>
    <?php if($post->post_status != 'publish'): ?>
    <input id="asimplebackend-cb-draft" type="checkbox" name="asimplebackend-post-draft" <?php if($post->post_status == 'draft'): ?>checked="checked"<?php endif; ?> />
    <label for="asimplebackend-cb-draft">Save for Later</label>
    <?php endif; ?>
    <input id="publish" class="<?php echo $this->pre; ?>-button button button-primary button-large" type="submit" name="publish" value="Save Changes..." />
</span>
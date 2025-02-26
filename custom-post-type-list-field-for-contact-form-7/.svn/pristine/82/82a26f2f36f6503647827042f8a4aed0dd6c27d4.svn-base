<?php

if (!defined('ABSPATH')){
    exit;
}

function wpacptdcf7_add_post_control_generator_menu() {
    if (class_exists('WPCF7_TagGenerator')){
        $tag_generator = WPCF7_TagGenerator::get_instance();
        $tag_generator->add( 'posts', __( 'Posts drop-down menu', 'custom-post-type-list-field-for-contact-form-7' ),
            'wpacptdcf7_post_control_generator_menu',array('version'=>2) );
    }
}

function wpacptdcf7_post_control_generator_menu( $contact_form, $args = '' ) {
    $args = wp_parse_args( $args, array() );
    $type = 'posts';
     ?>
   <header class="description-box">
        <h3>posts  form tag generator</h3>
    </header> 
    <div class="control-box">
        <fieldset>
            <legend>
                Field type
            </legend>
            <input type="hidden" data-tag-part="basetype" value="posts" >
            <label>
            <input type="checkbox" data-tag-part="type-suffix" value="*">This is a required field.</label>
        </fieldset>
        <fieldset>
            <legend>Name</legend>
            <input type="text" data-tag-part="name" pattern="[A-Za-z][A-Za-z0-9_\-]*">
        </fieldset>
        <fieldset>
            <legend>Post Type</legend>
            <?php
            $cptlfcf7_args = array(
                            'public'   => true
                        );
            $cptlfcf7_output = 'names'; // names or objects, note names is the default
            $cptlfcf7_operator = 'and'; // 'and' or 'or'
            $cptlfcf7_post_types = get_post_types( $cptlfcf7_args, $cptlfcf7_output, $cptlfcf7_operator ); 
            foreach ( $cptlfcf7_post_types  as $cptlfcf7_post_type ) { 
                if ($cptlfcf7_post_type == 'product' && is_plugin_active( 'woocommerce/woocommerce.php' )) {
                    ?>
                        <label>
                            <input type="radio" name="post_type" data-tag-option="post_type:" value="<?php echo $cptlfcf7_post_type; ?>" data-tag-part="option" id="<?php echo $cptlfcf7_post_type.'_cptlfcf7'; ?>"  <?php if($cptlfcf7_post_type == 'post'){echo "checked";} ?>>
                            <?php echo $cptlfcf7_post_type; ?>
                        </label>
                    <?php
                }else{
                    ?>
                    <label>
                        <input type="radio" name="post_type" data-tag-option="post_type:" value="<?php echo $cptlfcf7_post_type; ?>" data-tag-part="option" id="<?php echo $cptlfcf7_post_type.'_cptlfcf7'; ?>"  <?php if($cptlfcf7_post_type == 'post'){echo "checked";} ?>>
                        <?php echo $cptlfcf7_post_type; ?>
                    </label>
                    <?php 
                }
            } 
            ?>
        </fieldset>
        <fieldset id='hide_filter_cat_box'>
                    <legend>Filter Option</legend>
                    
                    <select name="filter_post_options" id="filter_post_options">
                        <option value="">--- Select Option ---</option>
                        <option value="category">Category</option>
                        <option value="tags">Tags</option>
                    </select>
                    
                </fieldset>
                <fieldset id='hide_post_cat_box' style="display: none">
                    <legend>Category</legend>
                  
                    <?php
                        $cat_x = 1;
                        $cptlfcf7_categories = get_categories( array(
                                                'orderby' => 'name',
                                                'order'   => 'ASC'
                                            ) ); 
                        foreach ( $cptlfcf7_categories  as $cptlfcf7_category ) { ?>
                            <label>
                                <input type="radio" name="post_category"  data-tag-part="option"  data-tag-option="post_category:" value="<?php echo esc_attr($cptlfcf7_category->slug); ?>"> <?php echo esc_html($cptlfcf7_category->name); ?><br>
                            </label>
                        <?php }  ?>
                </fieldset>
                <fieldset id='hide_post_tags_box' style="display: none">
                    <legend>Tags</legend>
                   
                        <?php
                            $cptlfcf7_tags = get_tags();
                            $tags_x = 1;
                            foreach ( $cptlfcf7_tags  as $cptlfcf7_tag ) { ?>
                                <label>
                                    <input type="radio" name="post_tag" data-tag-part="option"  data-tag-option="post_tag:" value="<?php echo esc_attr($cptlfcf7_tag->slug); ?>" >
                                        <?php echo esc_html($cptlfcf7_tag->name); ?><br>
                                </label>
                        <?php } ?>
                </fieldset>
                <a href="https://www.plugin999.com/plugin/custom-post-type-list-field-for-contact-form-7/" target="_blank" class="cptlfcf7_pro_link">Go Pro</a>
                <fieldset  class="cptlfcf7pro_fetures">
                    <legend>Order by</legend>
                  
                        <label>
                            <input type="radio" name="orderby" data-tag-option="orderby:" value="date" data-tag-part="option"  checked>Date
                        </label>
                        <label>
                            <input type="radio" name="orderby" data-tag-option="orderby:"  value="id" data-tag-part="option" >Order by post ID
                        </label>
                        <label>
                            <input type="radio" name="orderby" data-tag-option="orderby:"  value="author" data-tag-part="option" >Author
                        </label>
                        <label>
                            <input type="radio" name="orderby" data-tag-option="orderby:"  value="random" data-tag-part="option" >Random order
                        </label>
                    
                </fieldset>
                <fieldset  class="cptlfcf7pro_fetures">
                    <legend>Sort order</legend>
                  
                        <label>
                            <input type="radio" name="sortorder"  data-tag-option="sortorder:"  value="DESC" data-tag-part="option"  checked>Descending
                        </label>
                        <label>
                            <input type="radio" name="sortorder" data-tag-option="sortorder:"  value="ASC" data-tag-part="option" >Ascending
                        </label>
                   
                </fieldset>
                <fieldset  class="cptlfcf7pro_fetures">
                    <legend>Options</legend>
                   
                        <label><input type="checkbox" data-tag-option="multiple:"   name="multiple" data-tag-part="option"  /> Allow multiple selections</label><br />
                        <label><input type="checkbox" data-tag-option="include_blank:" name="include_blank" data-tag-part="option"  />Insert a blank item as the first option</label>
                        <label><input type="checkbox" data-tag-option="enable_search_box:" name="enable_search_box" data-tag-part="option"  /> Enable Search box on List Dropdown.</label>
                </fieldset>
                <fieldset  class="cptlfcf7pro_fetures">
                    <legend>Metadata</legend>
                   
                   
                        <input type="text" name="meta_data" data-tag-option="meta_data:" class="meta_data" data-tag-part="option"   />
                        <br>
                        <span class="description">
                            Use pipe-separated post attributes (e.g.date|time|slug|author|category|tags|meta_key) per field.
                        </span>
                    
                  
                </fieldset>
                <fieldset  class="cptlfcf7pro_fetures">
                    <legend>Image Options</legend>
                 
                     
                        <label><input type="checkbox" name="show_image"  data-tag-option="show_image:" data-tag-part="option"  checked/> Show Or Hide Image</label><br />
                        <label><input type="number" name="image_size"  data-tag-option="image_size:"  class="image_size" id="<?php echo esc_attr( $args['content'] . '-image_size' ); ?>"  min="0" placeholder="80"/> Custom Image Size (Width)</label>
                       
                  
                </fieldset>
                <fieldset  class="cptlfcf7pro_fetures">
                    <legend>Content Options</legend>
                    
                        <label><input type="checkbox" name="show_content"  data-tag-option="show_content:"  data-tag-part="option"  checked/> Show Or Hide Content</label><br />
                        <input type="number" name="content_limit"  data-tag-option="content_limit:"  class="content_limit" id="<?php echo esc_attr( $args['content'] . '-content_limit' ); ?>"  min="0" placeholder="15"/>
                        <br>
                        <span class="description">
                         Define the number of words for the excerpt. Default "15"
                        </span>
                        
                </fieldset>
                 <fieldset >
                    <legend>Id</legend>
                    <input type="text" data-tag-part="option" data-tag-option="id:" value="">
                </fieldset>
                <fieldset>
                    <legend>Class</legend>
                    <input type="text" data-tag-part="option" data-tag-option="class:" value="" pattern="[A-Za-z0-9_\-\s]*" >
                </fieldset>
    </div>
   <div class="insert-box">
        <div class="flex-container">
            <input type="text" class="code" readonly="readonly" onfocus="this.select();" data-tag-part="tag">
            <div class="submitbox">
                <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'woocommerce-product-list-field-for-contact-form-7-pro' ) ); ?>" />
            </div>
        </div/>
        <p class="mail-tag-tip">
            <label for="<?php echo esc_attr( $args['content'] . '-mailtag' ); ?>"><?php echo sprintf( esc_html( __( "To use the value input through this field in a mail field, you need to insert the corresponding mail-tag (%s) into the field on the Mail tab.", 'woocommerce-product-list-field-for-contact-form-7-pro' ) ), '<strong><span class="mail-tag"></span></strong>' ); ?>
            </label>
        </p>
    </div>
    <?php
}

if ( is_admin() ) {
    add_action( 'admin_init', 'wpacptdcf7_add_post_control_generator_menu', 25 );
}
<?PHP
global $awt_template;

echo $awt_template->before_widget;
if(!empty($awt_template->title))
    echo $awt_template->before_title . $awt_template->title . $awt_template->after_title; ?>
<style type="text/css">
    .awt_read_more {
        float:right;
        clear:both; 
    }
    .awt_client_thumb {
        margin:5px; 
    }
</style>
<div>
    <?PHP
    foreach($awt_template->posts as $value){
        ?>
        <h2 class="entry-title"> <?PHP echo apply_filters('the_title'   ,$value->post_title); ?></h2>
        <div><?PHP echo apply_filters('the_content' ,wp_trim_words($value->post_content,get_option('awt_short_desc_length',55))); ?>
            <a class="awt_read_more" href="<?PHP echo get_permalink($value->ID); ?>"><?PHP echo get_option('awt_link_text',__('Read More','awt')); ?></a>
            <?PHP
            $img_src    = wp_get_attachment_image_src( get_post_thumbnail_id($value->ID),array(32,32));
            $client     = get_post_meta($value->ID,'awt_client_name'    ,TRUE);
            $client_url = get_post_meta($value->ID,'awt_client_siteurl' ,TRUE);
            if(is_array($img_src)){
                ?>
                <div class="awt_client_thumb">
                    <img src="<?PHP echo $img_src[0]; ?>"  /><br/>
                </div>
                <?PHP
            }
            if(!empty($client)){
                ?>
                <span class="sep"><?PHP echo __('By','awt'); ?></span>
                <?PHP
                if(!empty($client_url))
                    $client = '<a href="'. $client_url . '" target="_blank">' . $client .  '</a>';
                echo $client;
            }
            ?>
            <?PHP
                
                
          ?>
        </div>
        <?PHP
    }
    ?>
</div>    
<?PHP 
echo $awt_template->after_widget;


    
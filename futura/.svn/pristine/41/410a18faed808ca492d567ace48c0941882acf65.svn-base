<?php

function futura_post_title($id){
    $title = get_the_title($id);
    if(mb_strlen($title, 'UTF-8') > 28){
        $title = mb_substr( $title,0 ,27)."...";
    }   
    print $title; 
}

function futura_content_summary($id, $length){

    $post = get_post($id);
    $content = $post->post_content;
    $content = preg_replace('/<(.*?)>/', '', $content);
    $content = mb_substr($content, 0, $length).'...';

    print $content;

}


function futura_the_author($id){
    $post = get_post($id);
    $author_id=$post->post_author;
    ?><?php _e('posted by', 'futura'); ?> : <?php the_author_meta("display_name", $author_id);
}

function futura_front_title(){
    print futura_get_front_title("");
}

function futura_get_front_title($title){
    $title = get_option('futura_title_text');
    if(!$title){
        $title = "<span>".__('Read together', 'futura').'</span> <span>['. __('Related Posts', 'futura').']</span>';
    }
    $title = '<h3>'.$title.'</h3>';
    return $title;
}


function futura_get_front_footer(){
    $str = '<div class="futura_text_bottom_area futura_after_content">';
    $str .= '<div class="">'.__( 'Related posts using FUTURA technology.', 'futura' ).'</div>';
    $str .= '<div>Recommended by <a href="https://futura.site" target="_blank"><img src="'.plugins_url( '/assets/images/logo-rectangle-black.svg', dirname(__FILE__) ).'" alt="Futura"></a></div>';
    $str .= '</div>';
    return $str;
}


function futura_ajax_script($ajax_function, $analyze){
?>
<script >
    var admin_ajax_url  = '<?php echo admin_url('admin-ajax.php', __FILE__); ?>';
    
    jQuery(document).ready(function($){

        $('#futura-analyze-retry').on('click', function(){
            $('.futura_overlay').show();
            futura_action('retry');
        });

        $('#futura-analyze').on('click', function(){
            $('.futura_overlay').show();
            futura_action(1);
        });

        function futura_action(init){
            $.ajax({
                type: 'POST',
                url: admin_ajax_url,
                data: {
                        'action': '<?php print $ajax_function; ?>',
                        'init': init,
                        'futura-post_data': 1,
                        'secure': '<?php echo wp_create_nonce($ajax_function.'_nonce') ?>'
                },success: function(data){
                    data = JSON.parse(data)
                    if(data.error){
                        $('.futura_overlay').hide();
                        $('#result_error').show();
                        $("#result_error .notice-error p").text('<?php _e( 'An error happened.', 'futura' ); ?>' + 
                                ' (' + data.error + ') ' + 
                                '<?php _e( 'Please click Retry button again. FUTURA restart posting data half way through.', 'futura' ); ?>' +
                                '<?php _e( 'If you continue have this problem, please contact futura support.', 'futura' ); ?>'
                                );
                        $("button#futura-analyze").css('display','none')
                        $("button#futura-analyze-retry").css('display','block')
                        return 
                    }
                    if(data.error == "search init error" ){
                        $('.futura_overlay').hide();
                        $('#result_search_error').show();
                        return 
                    }
                    if(data.paged == -1){
                        $('.progress-bar').css('width', '100%');
                        $('.futura_overlay').hide();
                        //$('#result').show();
                        <?php if($analyze): ?>
                            futura_analyze();
                            $("button#futura-analyze").css('display','none');
                            $("button#futura-analyze-retry").css('display','none');
                        <?php else: ?>
                            $('#result_analyze').show();
                        <?php endif; ?>
                    }else{
                        futura_action('');
                        var progress = data.progress
                        $('.progress-bar').css('width', progress);
                    }
                }
            })
        }

        <?php if($analyze): ?>
        function futura_analyze(){
            $.ajax({
                type: 'POST',
                url: admin_ajax_url,
                data: {
                        'action': 'futura_ajax_analyze',
                        'futura-analyze': 1,
                        'secure': '<?php echo wp_create_nonce('futura_ajax_analyze_nonce') ?>'
                },success: function(data){
                    data = JSON.parse(data);
                    if(data.response == "success"){
                        $('#result_analyze').show();
                    }else{
                        $('#result_analyze_error').show();
                    }
                }
            })

        }
        <?php endif; ?>

    });
</script>
<?php
}
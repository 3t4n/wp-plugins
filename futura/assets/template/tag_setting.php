<?php
global $wpdb;
?>

<div class="futura_wrap">

<section><h1><?php _e( 'Tag Suggestions', 'futura' ) ?></h1></section>

<section class="futura_menu tag">
    <?php $this->futura_admin_menu(); ?>
</section>
<div class="futura_tag_menu">
    <?php 
    $page = filter_input(INPUT_GET, 'tag_page', FILTER_SANITIZE_STRING);
    if($page == ""):
        $sub_title = __( 'By Tag', 'futura' );
    ?>
            <div><strong><?php print $sub_title; ?></strong></div><?php
        else:
            ?><div><a href="<?php menu_page_url("futura-tag"); ?>"><?php _e( 'By Tag', 'futura' ) ?></a></div>
    <?php endif; ?>
    &emsp;|&emsp;       
    <?php if($page == "by_post"):
        $sub_title = __( 'By Post', 'futura' );
        ?>
            <div><strong><?php print $sub_title; ?></strong></div><?php
        else:
            ?><div><a href="<?php menu_page_url("futura-tag"); ?>&tag_page=by_post"><?php _e( 'By Post', 'futura' ) ?></a></div><?php
    endif;?>
    &emsp;|&emsp;       
    <?php if($page == "bulk_action"):
        $sub_title = __( 'Bulk Action', 'futura' ) ;   
    ?>
            <div><strong><?php print $sub_title; ?></strong></div><?php
        else:
            ?><div><a href="<?php menu_page_url("futura-tag"); ?>&tag_page=bulk_action"><?php _e( 'Bulk Action', 'futura' ) ?></a></div><?php
    endif;?>

</div>

<h2><?php print $sub_title; ?></h2>

<div id="result_analyze" style="display:none;margin:0 0 20px -15px;">
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Success!', 'futura' ); ?></p>
    </div>
</div>


<?php if($page == ""): ?>
    <p><?php _e( 'FUTURA recommends tags. If you want to add, please click the tag.', 'futura' ) ?></p>
    <?php $this->futura_tags_list_admin(); ?>    
    <?php $this->show_futura_tags_js(); ?>
<?php endif; ?>

<?php if($page == "by_post"): ?>
    <p><?php _e( 'FUTURA recommends tags. If you want to add, please click the tag.', 'futura' ) ?></p>
    <?php $this->futura_tags_admin(); ?>
<?php endif; ?>

<?php if($page == "bulk_action"): ?>
    <p><?php _e( 'FUTURA set all the recommended tags to your posts.', 'futura' ) ?></p>
    <button type="button" id="futura-set-tags" class="button button-primary"><?php _e( 'Set', 'futura' ) ?></button>

    <script >
        var admin_ajax_url  = '<?php echo admin_url('admin-ajax.php', __FILE__); ?>';
        
        jQuery(document).ready(function($){

            $('#futura-set-tags').on('click', function(){
                if(!confirm('<?php _e( 'Are you sure?', 'futura' ) ?>')){
                    return false;
                }else{
                    $('.futura_overlay').show();
                    futura_action_tag();
                }                
            });

            function futura_action_tag(offset){
                $.ajax({
                    type: 'POST',
                    url: admin_ajax_url,
                    data: {
                            'action': 'futura_ajax_set_tag',
                            'futura-set_tag_data': 1,
                            'offset': offset,
                            'secure': '<?php echo wp_create_nonce('futura_ajax_set_futura_tag_nonce') ?>'
                    },success: function(data){
                        data = JSON.parse(data);
                        var percent = data['percent'];
                        var offset = data['offset']; 
                            if(offset == -1){
                            $('.progress-bar').css('width', '100%');
                            $('.futura_overlay').hide();
                            $("button#futura-set-tags").css('display','none')
                            $('#result_analyze').show();
                        }else{
                            futura_action_tag(offset);
                            var progress = percent*100+'%';
                            $('.progress-bar').css('width', progress);
                        }                        
                    }
                })
            }
        });
    </script>

    <div class="futura_overlay">
        <div class="futura_overlay_inner">
            <div class="app">
                <div id="prog-bar" class="progress">
                    <div class="progress-bar">
                    </div>
                    <div style="text-align:center;">now posting</div>
                </div>    
            </div>
        </div>
    </div>    
<?php endif; ?>



</div>
<?php

require_once dirname(__FILE__).'/functions.php';

class Futura_Search{

    function __construct(){
        add_action( 'wp_footer', array($this, 'search_script'), 10, 1 );    
        add_action( 'wp_ajax_futura_ajax_get_search_result', array($this, 'futura_ajax_get_search_result'));
        add_action( 'wp_ajax_nopriv_futura_ajax_get_search_result', array($this, 'futura_ajax_get_search_result'));
        add_action( 'wp_ajax_futura_ajax_get_search_result_more', array($this, 'futura_ajax_get_search_result_more'));
        add_action( 'wp_ajax_nopriv_futura_ajax_get_search_result_more', array($this, 'futura_ajax_get_search_result_more'));
        add_shortcode('futura_search', array($this, 'futura_search_form'));
        add_shortcode('futura_search_call', array($this, 'futura_search_call_function'));
    }



    function order_by(){
        ob_start();
        ?>
        <select name="futura_order_by" class="futura_order_by">
            <option value=""><?php _e( 'matching', 'futura' ); ?></option>
            <option value="desc"><?php _e( 'newer', 'futura' ); ?></option>
            <option value="asc"><?php _e( 'older', 'futura' ); ?></option>
        </select>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        return $html;        
    }

    function date_in(){
        ob_start();
        ?>
        <select name="futura_date_in" class="futura_date_in">
            <option value=""><?php _e( 'No period specified', 'futura' ); ?></option>
            <option value="1"><?php _e( 'In One Month', 'futura' ); ?></option>
            <option value="2"><?php _e( 'In Two Month', 'futura' ); ?></option>
            <option value="3"><?php _e( 'In Three Month', 'futura' ); ?></option>
            <option value="6"><?php _e( 'In Six Month', 'futura' ); ?></option>
            <option value="12"><?php _e( 'In One Year', 'futura' ); ?></option>
        </select>
        <?php
        $html = ob_get_contents();
        ob_end_clean();
        return $html;        
    }


    function search_script(){
        if(!is_page('futura_search')){return;}
        ?>

        <script>
        jQuery(function($){

            $('[name="futura_date_in"]').change(function(){
                $("#futura_search_result").html('');
                var order_by = $('[name="futura_order_by"]').val();
                futura_search_result($(this).val(), order_by);
            });
            $('[name="futura_order_by"]').change(function(){
                $("#futura_search_result").html('');
                var date_in = $('[name="futura_date_in"]').val();
                futura_search_result(date_in, $(this).val());
            });
            function futura_search_result(date_in, order_by){
                var admin_ajax_url  = '<?php echo admin_url('admin-ajax.php', __FILE__); ?>';
                $.ajax({
                    type: 'POST',
                    url: admin_ajax_url,
                    data: {
                        <?php $this->ajax_post_data_area(0, 'futura_ajax_get_search_result', filter_input( INPUT_GET, 'keyword', FILTER_SANITIZE_STRING ), get_the_author_meta('nickname')); ?>
                    },success: function(data){
                        $("#futura_search_result").html(data);
                    },
                    // error: function () {
                    //     $("#futura_related_posts").text("error");
                    // }
                })  
            }          
        });
        </script>
        
        <?php
    }


    function futura_ajax_get_search_result(){
        if(filter_input( INPUT_POST, 'futura_ajax_get_search_result', FILTER_SANITIZE_STRING )){
            check_ajax_referer('futura_ajax_get_search_result_nonce','secure');
            $results = $this->get_result_by_ajax();
            if (array_key_exists ("maybelist", $results)){
                $results = $results->maybelist;
                ?>
                    <p style="text-align:center;margin-bottom:60px;"><?php _e( 'No article is found.', 'futura' ) ?></p>
                    <p><?php _e( 'How about these posts?', 'futura' ) ?></p>
                <?php
            }
            $this->results_loop($results, 20);
            $results = array_slice($results, 20);
            if(!empty($results)){
                $this->readmore($results, 20);
            }

        }
        die();
    }

    
    function futura_ajax_get_search_result_more(){
        check_ajax_referer('futura_ajax_get_search_result_nonce','secure');
        $offset = filter_input(INPUT_POST, 'offset', FILTER_SANITIZE_NUMBER_INT);
        $results = filter_input(INPUT_POST, 'futura_ajax_search_result', FILTER_SANITIZE_STRING);
        $results = preg_replace('/\[|\]/', '', $results);
        $results = preg_split('/,/', $results);

        $this->results_loop($results, 10);
        $results = array_slice($results, 10);
        if(!empty($results)){
            $this->readmore($results, $offset);
        }else{
            $this->maybe_show_readmore();
        }
        die();
    }


    function results_loop($results, $number){
        $i = 1;
        foreach($results as $post_id):
            if($post_id == ""){continue;}
            if($i>=($number+1)){break;}    
            $title = get_the_title($post_id);
            ?>
            <div class="futura_search_box <?php if($i>=($number-9)){print 'futura_search_loaded';} ?>">
                <div class="futura_search_thumb">
                    <a href="<?php the_permalink($post_id); ?>"><?php print get_the_post_thumbnail( $post_id, 'thumbnail' ); ?></a>
                </div>
                <div class="futura_search_text"><a href="<?php the_permalink($post_id); ?>"><strong><?php print $title; ?></strong></a>
                    <div class="futura_pc"><a href="<?php the_permalink($post_id); ?>"><?php do_action("futura_content_summary", $post_id, 100); ?></a></div>
                    <div class="futura_sp"><a href="<?php the_permalink($post_id); ?>"><?php do_action("futura_content_summary", $post_id, 50); ?></a></div>
                    <div><small><?php print _e("posted at", "futura").': '.get_the_date("Y/m/d", $post_id); ?> </small></div>
                </div>
            </div>
            <?php
            $i++;
        endforeach;
    }


    function readmore($results, $offset){
        ?>
        <div class="futura_readmore_wrap">
            <div class="futura_readmore"><?php _e( 'Read More', 'futura' ) ?></div>
        </div>
        <div class="futura_search_result_more" data-offset="<?php print $offset; ?>"></div>

        <script>
            jQuery(function($){
                $('.futura_readmore').on('click', function(){
                    $('.futura_search_box').removeClass('futura_search_loaded');
                    $(this).hide();
                    var admin_ajax_url  = '<?php echo admin_url('admin-ajax.php', __FILE__); ?>';
                    $.ajax({
                        type: 'POST',
                        url: admin_ajax_url,
                        data: {
                            'action': 'futura_ajax_get_search_result_more',
                            'offset': <?php print($offset+10); ?>,
                            'futura_ajax_search_result': '<?php print json_encode($results, JSON_NUMERIC_CHECK); ?>',
                            'secure': '<?php echo wp_create_nonce('futura_ajax_get_search_result_nonce') ?>'
                        },success: function(data){
                            $(".futura_search_result_more[data-offset='<?php print $offset; ?>']").html(data);
                        },
                        // error: function () {
                        //     $("#futura_related_posts").text("error");
                        // }
                    })            
                });
            });
        </script>

        <?php        
    }


    function maybe_show_readmore(){
        ?>
        <script>
            jQuery(function($){
                if($('.futura_search_loaded').length){
                    var futura_reamore_html = '<div class="futura_readmore_wrap"><div class="futura_readmore"><?php _e( 'Read More', 'futura' ) ?></div></div>';
                    $('#futura_search_result').append(futura_reamore_html);
                    $('.futura_readmore').on('click', function(){
                        $('.futura_search_box').removeClass('futura_search_loaded');
                        $('.futura_readmore').hide();
                    });
                }

            });

        </script>
        <?php
    }


    function ajax_post_data_area($offset, $action, $keyword, $author){
    ?>
        'action': '<?php print $action; ?>',
        'futura_ajax_get_search_result': 1,
        'futura-search_offset': <?php print $offset; ?>,
        'keyword': "<?php print $keyword; ?>",
        'author': "<?php print $author; ?>",
        'date_in': date_in,
        'order_by': order_by,
        'secure': '<?php echo wp_create_nonce('futura_ajax_get_search_result_nonce') ?>'
    <?php
    }


    function get_result_by_ajax(){
        $data = $this->make_data_to_post();
        $results = json_decode($this->get_result($data));
        return $results;
    }


    function make_data_to_post(){
        $offset = filter_input( INPUT_POST, 'futura-search_offset', FILTER_SANITIZE_NUMBER_INT );

        $post_types = $this->get_post_types();

        $license_key = get_option('futura_license');
        $user_id = get_option('futura_user_id');
        $keyword = filter_input( INPUT_POST, 'keyword', FILTER_SANITIZE_STRING );
        $date_in = filter_input( INPUT_POST, 'date_in', FILTER_SANITIZE_NUMBER_INT );
        $order_by = filter_input( INPUT_POST, 'order_by', FILTER_SANITIZE_STRING );

        $data = array(
            'user_id' => $user_id,
            'wp_post_type' => $post_types,
            'license_key' => $license_key,
            'keyword' => $keyword,
            'offset' => $offset*10,
            'date_in' => $date_in,
            'order_by' => $order_by,
        );
        return $data;
    }


    function get_result($data){
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($data);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/search/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }else{
            return $return["body"];
        }        
    }


    function get_keywords($data){
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($data);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/keywords/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }else{
            return $return["body"];
        }        
    }


    function get_result_by_context($data){
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($data);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/search/?related=1', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }else{
            return $return["body"];
        }                
    }


    function futura_search_form(){
        ob_start();

        $url = get_home_url().'/futura_search';
        $button = __( 'search', 'futura' ) ;
        $keyword = filter_input( INPUT_GET, 'keyword', FILTER_SANITIZE_STRING );

        $html = <<<EOD
<form method="GET" action="$url" id="futura_search">
    <input type="text" name="keyword" value="$keyword" required>
    <button type="submit">$button</button>
</form>
EOD;

        ob_end_clean();
        return $html;
    }

    function futura_search_call_function(){
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $keyword = filter_input( INPUT_GET, 'keyword', FILTER_SANITIZE_STRING );
        $offset = 0;
        $date_in = "";
        $order_by = "";
        $post_types = $this->get_post_types();

        $data = array(
            'user_id' => $user_id,
            'wp_post_type' => $post_types,
            'license_key' => $license_key,
            'keyword' => $keyword,
            'offset' => $offset*10,
            'date_in' => $date_in,
            'order_by' => $order_by,
        );
        $results = json_decode($this->get_result($data));

        if(empty($results)){return "";}

        ob_start();
        print '<div id="futura_search_wrap"><div>'.sprintf(__('Search Result for "%s"', 'futura'), $keyword).'</div><div class="futura_search_sort_area">'.$this->order_by().$this->date_in().'</div></div><div id="futura_search_result">';

        if (array_key_exists ("maybelist", $results)){
            $results = $results->maybelist;
            ?>
                <p style="text-align:center;margin-bottom:60px;"><?php _e( 'No article is found.', 'futura' ) ?></p>
                <p><?php _e( 'How about these posts?', 'futura' ) ?></p>
            <?php
        }

        if ( array_key_exists ("response", $results)){
            return _e( 'Error', 'futura' )."</div>";
        }

        $this->results_loop($results, 20);

        $results = array_slice($results, 10);
        if(!empty($results)){
            $results = array_slice($results, 10);
            $this->readmore($results, $offset);
        }

        if(get_option('futura_payment_status') == "trial"):
            print futura_get_front_footer();
        endif;

        print '</div>';        
        $html = ob_get_contents();
        ob_end_clean();
        return $html;       
    }


    function get_post_types(){

        $post_types = explode(",", get_option('futura_custom_post_setting'));
        $post_types[] = "post";
        return $post_types;
        
    }

}

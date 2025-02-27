<?php
use Elementor\Plugin;
use News_Element\Khobish_Helper;

add_action('wp_ajax_newselement_load_template', 'newselement_load_template');
add_action('wp_ajax_nopriv_newselement_load_template', 'newselement_load_template');

add_action('wp_ajax_ne_search_post', 'ne_search_post');
add_action('wp_ajax_nopriv_ne_search_post', 'ne_search_post');


add_action('wp_ajax_tp_process_form', 'tp_process_contact_form');
add_action('wp_ajax_nopriv_tp_process_form', 'tp_process_contact_form');

function tp_process_contact_form() 
{   
    $data_mess = [];
    $msg_error = $body_msg = '';

    if ( ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['nonce'])), 'ajax-nonce' ) ) {
        wp_die();
    } 
    
    foreach ( $_POST['data'] as $item ) {
        $required = isset($item['required']) && empty($item['value']) ? 'yes' : '';

        if (isset($item['type']) == 'email') {
            $msg_error .= filter_var($item['value'], FILTER_VALIDATE_EMAIL) ? '' : 'yes';
        //$required = 'yes';
        } else {
            $msg_error .= isset($item['required']) && empty($item['value']) ? 'yes' : '';
        }

        $placeholder = isset($item['placeholder'])&& empty($item['placeholder']) ? $item['placeholder'] : '';
        $value = isset($item['value'])&& empty($item['value']) ? $item['value'] : '';
        $data_mess[] = [

            'id' => isset($item['id'])&& empty($item['id']) ? $item['id'] : '',
            'required' => $required,
            'type' => isset($item['type'])&& empty($item['type']) ? $item['type'] : '',
            'placeholder' => $placeholder,
            'value' => $value ,

        ];

        $body_msg .= '<p><b>' . $placeholder . '</b>:' . $value . '</p>';

        $to_email = isset($item['to']) ? $item['to'] : '';
        $subject_mail = isset($item['subject']) ? $item['subject'] : '';
        $success_msg = isset($item['success_msg']) ? $item['success_msg'] : '';
        $error_msg = isset($item['error_msg']) ? $item['error_msg'] : '';
        $fail_msg = isset($item['fail_msg']) ? $item['fail_msg'] : '';
    }

    if ($msg_error) {
        $data_mess['error'] = $error_msg;
    } else {
        $toemails = Khobish_Helper::decrypt_string($to_email);
        $to = explode(',', $toemails);
        $subject = $subject_mail;
        $body = $body_msg;
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        if (wp_mail($to, $subject, $body, $headers)) {
            $data_mess['success'] = $success_msg;
        } else {
            $data_mess['fail'] = $fail_msg;
        }
    }

    //echo '<pre>' . var_export($data_mess, true) . '</pre>';
    header('Content-type: application/json');
    echo wp_json_encode($data_mess);
    exit();
}

function ne_search_post(){
	if ( ! wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) ) {
		wp_die();
	}          
	$str = esc_attr($_POST['s']);
	$tax = esc_attr($_POST['tax']);
	$stri='?s='.$str;      
	$settings = $_POST['settings'];
	$post_type = $_POST['settings']['post_type'] ? $_POST['settings']['post_type'] : 'any';
	function filter_where($where = '') {
		$str = filter_input(INPUT_POST, 's');
		$where .= " AND post_title LIKE '%$str%' ";
		return $where;
	}

	$search_args = array(
		'post_type' 			=> $post_type,
		'post_status' 			=> 'publish',
		'posts_per_page' 		=> $_POST['settings']['posts'],		
	);

	if ($tax){
		$search_args['tax_query'] = array(
			array( 
			'taxonomy' => $_POST['settings']['tax'],
			'field'    => 'slug',
			'terms' => $tax,
			)
		);
	}

	add_filter('posts_where', 'filter_where');
	$ajax_query = new WP_Query($search_args);
	remove_filter('posts_where', 'filter_where');

	echo '<div class="khobish-ajax-wrap ne-d-flex pos-abs">';
	if ( $ajax_query->have_posts() ) {
		while ($ajax_query->have_posts()) : $ajax_query->the_post();?>
			<div class="ne-df-100">
				<article class="post-item ne-d-flex ne-v-center <?php echo Khobish_Helper::xl_post_format_icon();?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="ft-thumbwrap no-overflow">
						<a href="<?php the_permalink();?>">
						<span class="icon xlsmall khbmedia"></span>
						<?php echo Khobish_Helper::madmag_lazy_img(get_the_ID(),'thumbnail');?>
						</a> 
					</div> 
				<?php endif; ?>

					<div class="excerpt-wrap">
					<?php Khobish_Helper::ae_build_postmeta($_POST['settings']['meta'],0);;?>
					</div>
				</article>
			</div>		
		
		<?php endwhile;
	} else {
		echo '<p>Sorry noting found, try different keyword</p>';
	}    
	echo '</div>';
	wp_die();
}

function newselement_load_template(){
	if ( ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['nonce'])), 'ajax-nonce' ) ) {
		wp_die();
	}		
	echo Plugin::instance()->frontend->get_builder_content_for_display(esc_attr($_POST['id']));
	wp_die();
}

function khobish_filter_tax($ajax_parameters = ''){
	
	if ( ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['nonce'])), 'ajax-nonce' ) ) {
		wp_die();
	}	
	$current_tax = '';
	$isAjaxCall = false;
	
	//var_dump(json_decode($ajax_parameters));
	// SET CURRENT PAGE
	if (empty($ajax_parameters)) {
		
		$isAjaxCall = true;
		
        $ajax_parameters = array (
            'khobish_fn_page'=> '',
			'khobish_fn_cat'=> '',
        );
	
		if (!empty($_POST['khobish_fn_page'])) {
			$ajax_parameters['khobish_fn_page'] = esc_attr($_POST['khobish_fn_page']);
		}
		if (!empty($_POST['khobish_fn_cat'])) {
            $ajax_parameters['khobish_fn_cat'] = esc_attr($_POST['khobish_fn_cat']);
			$current_tax = $ajax_parameters['khobish_fn_cat'];
        }else{
			$current_tax = '';
		}
		
		if($ajax_parameters['khobish_fn_page'] != ''){
			$paged = $ajax_parameters['khobish_fn_page'];	
		}else{
			$paged = 1;
		} 
		
	}
		
		if(is_array($_POST['xlxtra_data'])){ 
 
			$per_page = esc_attr($_POST['xlxtra_data']['per_page']);
			$template = $_POST['xlxtra_data']['template'];
			$metaf = esc_attr($_POST['xlxtra_data']['metaf']);
			$metar = esc_attr($_POST['xlxtra_data']['metar']);
			$metas = esc_attr($_POST['xlxtra_data']['metas']);
			$imgf = esc_attr($_POST['xlxtra_data']['imgf']);
			$imgr = esc_attr($_POST['xlxtra_data']['imgr']);
			$imgs = esc_attr($_POST['xlxtra_data']['imgs']);
			$excerptf = esc_attr($_POST['xlxtra_data']['excerptf']);
			$excerptr = esc_attr($_POST['xlxtra_data']['excerptr']);
			$excerpts = esc_attr($_POST['xlxtra_data']['excerpts']);
			$col_num = esc_attr($_POST['xlxtra_data']['column']);
			$post_format = esc_attr($_POST['xlxtra_data']['post_format']);
			$post_type = esc_attr($_POST['xlxtra_data']['post_type']);
			$taxonomy = esc_attr($_POST['xlxtra_data']['taxonomy']);
			$break = esc_attr($_POST['xlxtra_data']['break']);

	        $order = esc_attr($_POST['xlxtra_data']['order']);
	        $orderby = esc_attr($_POST['xlxtra_data']['orderby']);
	        $offset =  (int)( $paged - 1 ) * $per_page  + (int)$_POST['xlxtra_data']['offset'];

			//use for related posts
			$usage = isset($_POST['xlxtra_data']['usage']) ? esc_attr($_POST['xlxtra_data']['usage']) : '';
			$pid = isset($_POST['xlxtra_data']['pid']) ? esc_attr($_POST['xlxtra_data']['pid']) : '';
		}		
		
		$cat = explode(',' , $current_tax);
		
		if ($usage == 'related'){

			if ($cat[0]=='author'){

				$authorid = get_post_field( 'post_author', $pid );
				$post_type = get_post_type($pid);
				//$query_args['author'] = $authorid;
				//$query_args['post__not_in'] = $pid;

				$query_args = array(
					'post_type' 			=> $post_type,
					'post_status' 			=> 'publish',
					'author' 				=> $authorid,
					'posts_per_page' 		=> $per_page,
					'post__not_in' => array($pid),
					'paged'					=> $paged,			
				);				

			}

			if ($cat[0]=='related'){

	            $postcat = wp_get_post_categories( $pid );
	            $all_cat = implode(',' , $postcat);
	            $query_args = array(
	                'post_type' => 'post',
	                'paged' => $paged,
	                'posts_per_page' => $per_page,
	                'post__not_in' => array($pid),
	                'tax_query' => array(
	                    array(
	                        'taxonomy' => 'category',
	                        'field' => 'term_id',
	                        'terms' => $all_cat,
	                    ) , 
	                ) ,
	            );  
			}


		} else {

			$query_args = array(
				'post_type' 			=> $post_type,
				'post_status' 			=> 'publish',
				'posts_per_page' 		=> $per_page,
				'paged'					=> $paged,
	            'order' => $order,
	            'orderby'   => $orderby,	
	            'offset'=> $offset,	
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'term_id',
						'terms' => $cat,
					) , 
				) ,				        		
			); 

		}

		if ($post_format){
            $post_format = (explode(',' , $post_format));
            $fpost_format = preg_filter('/^/', 'post-format-', $post_format);

            $query_args['tax_query'] = array(
                array(
                'taxonomy' => 'post_format',
                'field'    => 'slug',
                'terms' => $fpost_format,
                //'operator' => 'NOT IN',
                //'terms' => array('post-format-quote',''),
                )
            );            			
		}

		$wp_query = new WP_Query($query_args);
		$max_page = $wp_query->max_num_pages;
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		$list = $buffy = '';
		$i = 0;
		ob_start();
		if (!preg_match("/[^[:alnum:]_\/-]/",$template)) {
			require dirname(__FILE__) .'/loops/'. $template .'.php';
		}				
		$list .= ob_get_clean();

		if ( $list != NULL ) {
				$buffy .= $list; 
		}

	
	//pagination
    $hide_prev = false;
    $hide_next = false;
    if ($ajax_parameters['khobish_fn_page'] == 1) {
        $hide_prev = true; //hide link on page 1
    }
    if ($ajax_parameters['khobish_fn_page'] >= $max_page) {
        $hide_next = true; //hide link on last page
    }

	$buffyArray = array(
        'xl_fn_data' 			=> $buffy,
		'khobish_fn_hide_prev' 		=> $hide_prev,
        'khobish_fn_hide_next' 		=> $hide_next
    );


    if ( true === $isAjaxCall ) 
	{
        die(wp_json_encode($buffyArray));
    } 
	else 
	{
        return wp_json_encode($buffyArray);
    }
	
}

function xl_vid_playlist() {
	$xlurl = addslashes($_REQUEST['xlurl']);
	echo wp_oembed_get($xlurl);    	
	exit();
}
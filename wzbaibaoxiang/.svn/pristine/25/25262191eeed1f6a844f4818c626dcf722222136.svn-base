<?php
class websitebox_media{
     function __construct()
    {
        if ( is_admin() ) {
            $websitebox_base = get_option('websitebox_base');
            if(isset($websitebox_base['media']) && $websitebox_base['media']){
                add_action('init', [$this,'websitebox_media_taxonomy']);
                add_action('save_post', [$this,'websitebox_save_media_category_meta']);
                add_action('restrict_manage_posts', [$this,'websitebox_media_filter_form']);
                add_filter('parse_query', [$this,'websitebox_media_filter_query']);
                add_action( 'print_media_templates', [ $this, 'websitebox_media_select' ]);
                add_filter( 'ajax_query_attachments_args', [$this, 'websitebox_add_fenlei'] );
                add_action( 'wp_ajax_save-attachment-compat', [$this, 'websitebox_fenlei_compat'], 0 );
                add_filter( 'attachment_fields_to_edit', array( $this, 'websitebox_attachment_fields_to_edit' ), 10, 2 );
            }
        }
    }
   public function websitebox_attachment_fields_to_edit( $form_fields, $post ) {
        // 获取当前附件已分配的分类项
        $terms = wp_get_object_terms( $post->ID, 'websitebox_media_category', array( 'fields' => 'ids' ) );
        
        // 获取所有可用的分类项
        $all_terms = get_terms( array(
            'taxonomy'   => 'websitebox_media_category',
            'hide_empty' => false,
        ) );
    
        // 创建多选框字段
        $html = '';
        foreach ( $all_terms as $term ) {
            $checked = in_array( $term->term_id, $terms ) ? 'checked="checked"' : '';
            $html .= '<label style="display: flex;align-items: center;"><input type="radio" name="attachments[' . $post->ID . '][websitebox_media_category]" value="' . esc_attr( $term->name ) . '" ' . $checked . ' style="margin: 5px 6px 0;"> <span style="cursor:pointer;">' . esc_html( $term->name ) . '</span></label><br>';
        }
    
        // 将自定义字段添加到表单中
        $form_fields['websitebox_media_category'] = array(
            'label' => '媒体分类',
            'input' => 'html',
            'html'  => $html,
        );
    
        return $form_fields;
    }
    
    public function  websitebox_fenlei_compat(){
        wp_enqueue_media();
          if ( ! isset( $_REQUEST['id'] ) ) {
            wp_send_json_error();
        }

        if ( ! $id = absint( $_REQUEST['id'] ) ) {
            wp_send_json_error();
        }

        if ( empty( $_REQUEST['attachments'] ) || empty( $_REQUEST['attachments'][ $id ] ) ) {
            wp_send_json_error();
        }
        $attachment_data = $_REQUEST['attachments'][ $id ];

        check_ajax_referer( 'update-post_' . $id, 'nonce' );

        if ( ! current_user_can( 'edit_post', $id ) ) {
            wp_send_json_error();
        }

        $post = get_post( $id, ARRAY_A );

        if ( 'attachment' != $post['post_type'] ) {
            wp_send_json_error();
        }
        $post = apply_filters( 'attachment_fields_to_save', $post, $attachment_data );

        if ( isset( $post['errors'] ) ) {
            $errors = $post['errors']; 
            unset( $post['errors'] );
        }

        wp_update_post( $post );
        
        foreach ( get_attachment_taxonomies( $post ) as $taxonomy ) {
           
            if ( isset( $attachment_data[ $taxonomy ] ) ) {
                 wp_set_object_terms( $id, '', $taxonomy, false );
                wp_set_object_terms( $id, array_map( 'trim', preg_split( '/,+/', $attachment_data[ $taxonomy ] ) ), $taxonomy, false );
            } else if ( isset($_REQUEST['tax_input']) && isset( $_REQUEST['tax_input'][ $taxonomy ] ) ) {
                wp_set_object_terms( $id, $_REQUEST['tax_input'][ $taxonomy ], $taxonomy, false );
            } else {
                 wp_set_object_terms( $id, '', $taxonomy, false );
               
            }
        }

        if ( ! $attachment = wp_prepare_attachment_for_js( $id ) ) {
            wp_send_json_error();
        }

        wp_send_json_success( $attachment );
    }
   
    public function websitebox_add_fenlei( $query ) {
        // var_dump($query);exit;
        if(isset($_POST['query']['websitebox_media_category']) && $_POST['query']['websitebox_media_category']){
            $query['tax_query'] = array(
                array(
                    'taxonomy' => 'websitebox_media_category', // 自定义分类法名称
                    'field'    => 'term_id',                   // 按 term_id 查询
                    'terms'    => (int) $_POST['query']['websitebox_media_category'],
                ),
            );
        }
        if(isset($query['websitebox_media_category'])){
        unset($query['websitebox_media_category']);
        }
        return $query;
    }
    public function websitebox_media_select(){
          global $pagenow;
        if($pagenow=='upload.php'){
            wp_enqueue_script("jquery");
            wp_enqueue_media();
                wp_enqueue_script(
                'websitebox_media.js', // 脚本句柄
                    plugin_dir_url(WEBSITEBOX_FILE) . '/inc/js/websitebox_media.js', // 替换为你的脚本路径
                    array('jquery'), // 声明依赖 jQuery
                    null,
                    true // 在页面底部加载
                );
                  $terms = get_terms(array(
                    'taxonomy' => 'websitebox_media_category',
                    'hide_empty' => false,
                ));
                $selected_term = isset($_GET['websitebox_media_category']) ? sanitize_text_field($_GET['websitebox_media_category']) : '';
        
                // 准备数据并传递到 JS
                $terms_data = array_map(function($term) use ($selected_term) {
                    return array(
                        'term_id' => $term->term_id,
                        'name' => $term->name,
                        'selected' => $selected_term == $term->term_id,
                    );
                }, $terms);
        
            wp_localize_script('websitebox_media.js', 'websiteboxTerms', $terms_data);
        }
     
    }
    public function websitebox_media_filter_query($query){
        global $pagenow;
        
        if ($pagenow == 'upload.php' && isset($_GET['websitebox_media_category'])) {
            $term_slug = sanitize_text_field($_GET['websitebox_media_category']);
            $term = get_term_by('slug', $term_slug,'websitebox_media_category');
            if ($term) {
                $query->set('tax_query', array(
                    array(
                        'taxonomy' =>'websitebox_media_category',
                        'field' =>'slug',
                        'terms' => $term_slug,
                    )
                ));
            }
        }
        return $query;
    }
    public function websitebox_media_filter_form(){
        global $pagenow, $wp_query;
        if($pagenow=='upload.php'){
             $terms = get_terms( array(
                'taxonomy' =>'websitebox_media_category',
                'hide_empty' => false,
            ) );
            $selected_term = isset($_GET['websitebox_media_category'])? sanitize_text_field($_GET['websitebox_media_category']) : '';
            echo '<form method="get" action="'. esc_url(admin_url('upload.php')). '">';
            echo '<select name="websitebox_media_category">';
            echo '<option value="">所有分类</option>';
            foreach ($terms as $term) {
                $selected = ($selected_term == $term->slug)?'selected="selected"' : '';
                echo '<option value="'. $term->slug. '" '. $selected. '>'. $term->name. '</option>';
            }
            echo '</select>';
            
            echo '</form>';
        }
    }
    public  function websitebox_save_media_category_meta( $post_id ) {
        if (! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    
        if ( isset( $_POST['websitebox_media_category'] ) ) {
            $term_ids = array_map('intval', $_POST['websitebox_media_category'] );
            wp_set_post_terms( $post_id,'websitebox_media_category', $term_ids, true );
        }
    }
    
    public function websitebox_media_taxonomy(){
       
         $labels = array(
              'name'              => _x( '媒体分类', 'taxonomy general name', 'websitebox' ),
                'singular_name'     => _x( 'websitebox_media_category', 'taxonomy singular name', 'websitebox' ),
                'search_items'      => __( '媒体分类搜索', 'websitebox' ),
                'all_items'         => __( '媒体分类', 'websitebox' ),
                'parent_item'       => __( '上级分类', 'websitebox' ),
                'parent_item_colon' => __( '上级分类:', 'websitebox' ),
                'edit_item'         => __( '编辑', 'websitebox' ),
                'update_item'       => __( '修改', 'websitebox' ),
                'add_new_item'      => __( '添加分类', 'websitebox' ),
                'new_item_name'     => __( '分类名称', 'websitebox' ),
                'menu_name'         => __( '媒体分类', 'websitebox' ),
        );
    
        $args = array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'websitebox_media_category' ),
        );
    
        register_taxonomy('websitebox_media_category', 'attachment', $args);
    }
}
?>
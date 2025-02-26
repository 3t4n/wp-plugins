<?php
// no access directly
if ( ! defined( 'ABSPATH' ) ) {
    die( '&ldquo;the door is shut it was made by those who are dead&rdquo;' );
}

if( !class_exists('GBQuickLaunchAdmin') ):
    class GBQuickLaunchAdmin{
        private $settings;
        function __construct(){
            $this->settings = $this->GetGBquickLaunchSettings();

            $this->hooks();

        }

        //PRIVATE

        /*
         * call : * in class
         * do : return array of settings
         */
        private function GetGBquickLaunchSettings(){
            return array(
                'id' => 'gb-quick-launch',
                'slug' => 'gbqllinks',
                'title' => __('Quick Launch','gb-quick-launch'),
                'singular' => __('Quick Launch Button','gb-quick-launch'),
                'admin_page' => array(
                    'page_title' => __('GB Quick Launch','gb-quick-launch'),
                    'menu_title' => __( 'GB Quick Launch', 'gbplall' ),
                    'capability' => 'manage_options',
                    'menu_slug' => 'gbql-settings.php',
                    'function' => array($this,'GBQuickLaunchSettings'),
                    'icon_url' => GBQLURL.'/images/gb_admin_menu.png'
                )
            );
        }


        /*
         * call : * in class
         * do : return array of all types of buttons and slugs
         */
        private function ButtonTypes(){
            $buttons = array(
                array(
                    'slug' => 'code',
                    'name' => 'ShortCode',
                    'active' => '1'
                ),
                array(
                    'slug' => 'innerLink',
                    'name' => 'Inner link',
                    'active' => '1'
                ),
                array(
                    'slug' => 'url',
                    'name' => 'URL',
                    'active' => '1'
                ),
                array(
                    'slug' => 'facebook',
                    'name' => 'Facebook',
                    'active' => '1'
                ),
                array(
                    'slug' => 'twitter',
                    'name' => 'Twitter',
                    'active' => '1'
                ),
                array(
                    'slug' => 'pinterest',
                    'name' => 'Pinterest',
                    'active' => '1'
                ),
                array(
                    'slug' => 'linkedin',
                    'name' => 'LinkedIn',
                    'active' => '1'
                ),
                array(
                    'slug' => 'googlegmail',
                    'name' => 'Gmail',
                    'active' => '1'
                ),
                array(
                    'slug' => 'email',
                    'name' => 'Email',
                    'active' => '1'
                ),
                array(
                    'slug' => 'wordpress',
                    'name' => 'WordPress.org',
                    'active' => '1'
                ),
                array(
                    'slug' => 'whatsapp',
                    'name' => 'WhatsApp',
                    'active' => '1'
                )
            );
            return apply_filters("gbql_buttons",$buttons);
        }

        /*
         * call : * in class
         * do : return the HTML of the inner link type
         */
        private function type_innerLink($button){
            $all_post_types = get_post_types(array('public' => true));
            $all_posts = get_posts(array(
                'posts_per_page'   => -1,
                'post_type'        => $all_post_types,
                'post_status'      => 'publish',
                'orderby'          => 'post_type'
            ));
            $gbql_posts = array();
            if($all_posts):
                foreach ($all_posts as $temp_post){
                    $gbql_posts[$temp_post->post_type][] = $temp_post;
                }
                ?>
                <select class="gbql-code-item gbql_innerLink"  name="gbql_innerLink">
                    <?php foreach ($gbql_posts as $posts_type => $gbql_posts_by_type): $post_type_object = get_post_type_object($posts_type); ?>
                        <optgroup label="<?php esc_attr_e($post_type_object->label); ?>">
                            <?php foreach ($gbql_posts_by_type as $gbql_post): ?>
                                <option <?php esc_attr_e(is_array($button) && isset($button['value']) && $button['value'] ==  $gbql_post->ID ? 'selected' : ''); ?> value="<?php esc_attr_e($gbql_post->ID); ?>"><?php esc_html_e($gbql_post->post_title); ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    <?php endforeach; ?>
                </select>
            <?php
            else:
                ?><span><?php esc_html_e("No public posts of any kind where found.") ?></span><?php
            endif;
            ?>
            <label class="gbql-type-description"><?php esc_html_e("Select the link you want to lead the user after clicking the button","gb-quick-launch"); ?></label>
            <?php
        }

        /*
         * call : * in class
         * do : return the HTML of the shortCode type
         */
        private function type_code($button){
            ?>
            <input type="text" class="gbql-code-item gbql_code" name="gbql_code" value="<?php esc_attr_e(is_array($button) && $button['type'] == 'code' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="&#91;my_shortcode_name&#93;">
            <label class="gbql-type-description"><?php esc_html_e("Enter the Shortcode you want the user to see after clicking the button","gb-quick-launch"); ?></label>
            <?php
        }

        /*
         * call : * in class
         * do : return the HTML of the url type
         */
        private function type_url($button){
            ?>
            <input type="url" class="gbql-code-item gbql_url" name="gbql_url" value="<?php echo esc_url(is_array($button) && $button['type'] == 'url' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="https:&#47;&#47;example.com&#47;">
            <label class="gbql-type-description"><?php esc_html_e("Enter the URL you want the user to follow after clicking the button","gb-quick-launch"); ?></label>
            <?php
        }

        /*
         * call : * in class
         * do : return the facebook input
         */
        private function type_facebook($button){
            ?>
            <span class="url_start">https://www.facebook.com/</span><input type="text" class="gbql-code-item gbql_facebook" name="gbql_facebook" value="<?php echo esc_attr(is_array($button) && $button['type'] == 'facebook' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php _e('My Facebook name','gb-quick-launch') ?>">
            <label class="gbql-type-description"><?php echo esc_html(sprintf( __("Enter your %s name","gb-quick-launch"),"Facebook")); ?> (<a target="_blank" href="https://www.google.com/search?q=example+of+facebook+url&oq=facebook+user+link"><?php esc_html_e("Need Help?","gb-quick-launch") ?></a>)</label>
            <?php
        }

        /*
         * call : * in class
         * do : return the twitter input
         */
        private function type_twitter($button){
            ?>
            <span class="url_start">https://twitter.com/</span><input type="text" class="gbql-code-item gbql_twitter" name="gbql_twitter" value="<?php echo esc_attr(is_array($button) && $button['type'] == 'twitter' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php _e('My Twitter name','gb-quick-launch') ?>">
            <label class="gbql-type-description"><?php echo sprintf( __("Enter your %s name","gb-quick-launch"),"Twitter"); ?> (<a target="_blank" href="https://www.google.com/search?q=example+of+twitter+url&oq=twitter+user+link"><?php esc_html_e("Need Help?","gb-quick-launch") ?></a>)</label>
            <?php
        }

        /*
         * call : * in class
         * do : return the pinterest input
         */
        private function type_pinterest($button){
            ?>
            <span class="url_start">https://www.pinterest.com/</span><input type="text" class="gbql-code-item gbql_pinterest" name="gbql_pinterest" value="<?php echo esc_attr(is_array($button) && $button['type'] == 'pinterest' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php _e('My Pinterest name','gb-quick-launch') ?>">
            <label class="gbql-type-description"><?php echo esc_html(sprintf( __("Enter your %s name","gb-quick-launch"),"Pinterest")); ?> (<a target="_blank" href="https://www.google.com/search?q=example+of+pinterest+url&oq=pinterest+user+link"><?php esc_html_e("Need Help?","gb-quick-launch") ?></a>)</label>
            <?php
        }

        /*
         * call : * in class
         * do : return the email input
         */
        private function type_email($button){
            ?>
            <span class="url_start">mailto:</span><input type="email" class="gbql-code-item gbql_email" name="gbql_email" value="<?php echo sanitize_email(is_array($button) && $button['type'] == 'email' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php esc_attr_e('My email name','gb-quick-launch'); ?>">
            <label class="gbql-type-description"><?php echo esc_html(sprintf( __("Enter your %s name","gb-quick-launch"),"email")); ?></label>
            <?php
        }

        /*
         * call : * in class
         * do : return the gmail input
         */
        private function type_googlegmail($button){
            ?>
            <span class="url_start">mailto:</span><input type="email" class="gbql-code-item gbql_googlegmail" name="gbql_googlegmail" value="<?php echo sanitize_email(is_array($button) && $button['type'] == 'googlegmail' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php _e('My Gmail','gb-quick-launch') ?>">
            <label class="gbql-type-description"><?php echo sprintf( __("Enter your %s","gb-quick-launch"),"Gmail"); ?></label>
            <?php
        }

        /*
         * call : * in class
         * do : return the whatsapp input
         */
        private function type_whatsapp($button){
            ?>
            <span class="url_start">https://wa.me/</span><input type="tel" class="gbql-code-item gbql_whatsapp" name="gbql_whatsapp" value="<?php echo esc_attr(is_array($button) && $button['type'] == 'whatsapp' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php _e('My WhatsApp number','gb-quick-launch') ?>">
            <label class="gbql-type-description"><?php echo sprintf( __("Enter your %s number","gb-quick-launch"),"WhatsApp"); ?></label>
            <?php
        }

        /*
         * call : * in class
         * do : return the LinkedIn input
         */
        private function type_linkedin($button){
            ?>
            <span class="url_start">https://www.linkedin.com/in/</span><input type="text" class="gbql-code-item gbql_linkedin" name="gbql_linkedin" value="<?php echo esc_attr(is_array($button) && $button['type'] == 'linkedin' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php _e('My LinkedIn name','gb-quick-launch') ?>">
            <label class="gbql-type-description"><?php echo sprintf( __("Enter your %s name","gb-quick-launch"),"LinkedIn"); ?> (<a target="_blank" href="https://www.google.com/search?q=example+of+LinkedIn+url&oq=LinkedIn+user+link"><?php esc_html_e("Need Help?","gb-quick-launch") ?></a>)</label>
            <?php
        }

        /*
         * call : * in class
         * do : return the wordpress input
         */
        private function type_wordpress($button){
            ?>
            <span class="url_start">https://profiles.wordpress.org/</span><input type="text" class="gbql-code-item gbql_wordpress" name="gbql_wordpress" value="<?php echo esc_attr(is_array($button) && $button['type'] == 'wordpress' && isset($button['value']) ? $button['value'] : ''); ?>" placeholder="<?php _e('My WordPress.org name','gb-quick-launch') ?>">
            <label class="gbql-type-description"><?php echo esc_html(sprintf( __("Enter your %s name","gb-quick-launch"),"WordPress.org")); ?> (https://profiles.wordpress.org/{YOUR-USER-NAME}/)</label>
            <?php
        }

        /*
         * call : * in class
         * do : return the wordpress input
         */
        private function get_area_fields($data = array()){
            wp_enqueue_media();
            wp_enqueue_style( 'wp-color-picker');
            wp_enqueue_script( 'wp-color-picker');
            ?>
            <div class="area-style">
                <label><?php echo esc_html(__("Window style:","gb-quick-launch")); ?></label>
                <div>
                    <label for="gbql-area-bg"><?php echo esc_html(__("Background color","gb-quick-launch")); ?></label>
                    <input type="text" id="gbql-area-bg" name="gbql-area-bg" class="gbql-color-picker" value="<?php isset($data['gbql-area-bg']) ? esc_attr_e($data['gbql-area-bg']) : ''; ?>">
                </div>
                <div>
                    <label for="gbql-area-borders"><?php echo esc_html(__("Borders color","gb-quick-launch")); ?></label>
                    <input type="text" id="gbql-area-borders" name="gbql-area-borders" class="gbql-color-picker" value="<?php isset($data['gbql-area-borders']) ? esc_attr_e($data['gbql-area-borders']) : ''; ?>">
                </div>
                <div>
                    <label for="gbql-area-radios"><?php echo esc_html(__("Borders radios in pixels","gb-quick-launch")); ?></label>
                    <input type="number" step="1" pattern="[0-9]" id="gbql-area-radios" name="gbql-area-radios" value="<?php isset($data['gbql-area-radios']) ? esc_attr_e($data['gbql-area-radios']) : ''; ?>">
                </div>
            </div>
            <?php
        }

        //PUBLIC

        /*
         * call : __construct
         * do : handles all the hooks & filters
         */
        public function hooks(){

            //register custom post type
            add_action( 'init', array($this,'GBCPTRegister') );

            //register meta box
            add_action( 'add_meta_boxes', array($this,'AddMetaBox') );

            //register the settings page
            add_action( 'admin_menu', array($this,'AddAdminPage') );

            //on save post call SaveMetaBox
            add_action( 'save_post', array( $this, 'SaveMetaBox') );

            //ADD A COLUMN TO POST LIST
            add_action( 'manage_'.$this->settings['id'].'_posts_custom_column' , array($this,'gbqllinks_custom_column'), 10, 2 );
            add_filter('manage_'.$this->settings['id'].'_posts_columns', array($this,'add_gbqllinks_custom_column'));

            //enqueuing both scripts and styles.
            add_action( 'admin_enqueue_scripts', array($this,'GBQuickLaunchEnqueue') );

            add_filter('sanitize_gbql_field',array($this,'SanitizeField'),10,2);
        }

        /*
         * call : hooks
         * do : Sanitize the GBQuickLaunch Field
         */
        public function add_gbqllinks_custom_column( $columns  ) {
            return array_merge( $columns,
                array(
                    'type' => __( 'Type', 'gb-quick-launch' ),
                    'icon' => __( 'Icon', 'gb-quick-launch' )
                )
            );
        }

        /*
         * call : hooks
         * do : Sanitize the GBQuickLaunch Field
         */
        public function gbqllinks_custom_column( $column, $post_id ) {

            switch ( $column ) {
                case 'type':
                    $meta = get_post_meta( $post_id, 'gbql_button', true );
                    //get all the GBQuickLaunch types
                    $types = $this->ButtonTypes();

                    if($types && $meta && is_array($meta) && isset($meta['type'])){
                        $key = gbql_search_buttons('slug',$meta['type'],false);
                        if(is_array($key) && !empty($key) && isset($key['name'])){
                            echo esc_html($key['name']);
                        }else{
                            echo esc_html(__('Content','gb-quick-launch'));
                        }
                    }else{
                        echo esc_html('No type is set yet','gb-quick-launch');
                    }
                    break;
                case 'icon':

                    $meta = get_post_meta( $post_id, 'gbql_button', true );
                    if($meta && isset($meta['type'])){
                        if($meta['type'] == 'facebook'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-facebook.png').'" title="Facebook" alt="Facebook">';
                            break;
                        }

                        if($meta['type'] == 'twitter'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-twitter.png').'" title="Twitter" alt="Twitter">';
                            break;
                        }

                        if($meta['type'] == 'pinterest'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-pinterest.png').'" title="Pinterest" alt="Pinterest">';
                            break;
                        }

                        if($meta['type'] == 'linkedin'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-linkedin.png').'" title="LinkedIn" alt="LinkedIn">';
                            break;
                        }

                        if($meta['type'] == 'email'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-email.png').'" title="Email" alt="Email">';
                            break;
                        }

                        if($meta['type'] == 'googlegmail'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-gmail.png').'" title="Gmail" alt="Gmail">';
                            break;
                        }

                        if($meta['type'] == 'wordpress'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-wordpress.png').'" title="Gmail" alt="Gmail">';
                            break;
                        }

                        if($meta['type'] == 'whatsapp'){
                            echo '<img src="'.esc_url(GBQLURL.'/images/gb-quick-launch-whatsapp.png').'" title="WhatsApp" alt="WhatsApp">';
                            break;
                        }

                        if ( has_post_thumbnail() ){
                            the_post_thumbnail(array('30','30'));
                        }else{
                            echo esc_html('No featured image is set yet','gb-quick-launch');
                        }
                    }else{
                        echo esc_html('No type is set yet','gb-quick-launch');
                    }
                    break;
            }
        }

        /*
         * call : hooks
         * do : Sanitize the GBQuickLaunch Field
         */
        public function SanitizeField($content,$type){
            $val = '';
            switch ($type){
                case 'url':
                    $val = esc_url($content);
                    break;
                case 'innerLink':
                    $val = ($content > 0 ? intval($content) : '');
                    break;
                case 'shortcode':
                    $val = esc_attr($content);
                    break;
                case 'facebook':
                    if(!empty($content)){
                        if(substr( $content, 0, strlen("https://www.facebook.com/") ) === "https://www.facebook.com/"){
                            $content = substr( strlen("https://www.facebook.com/"), $content);
                            $val = esc_attr($content);

                        }else{
                            $content = explode("/",$content) ;
                            $val = esc_attr($content[count($content) - 1]);
                        }
                    }
                    break;

                case 'twitter':
                    if(!empty($content)){
                        if(substr( $content, 0, strlen("https://twitter.com/") ) === "https://twitter.com/"){
                            $content = substr( strlen("https://twitter.com/"), $content);
                            $val = esc_attr($content);

                        }else{
                            $content = explode("/",$content) ;
                            $val = esc_attr($content[count($content) - 1]);
                        }
                    }
                    break;
                case 'pinterest':
                    if(!empty($content)){
                        if(substr( $content, 0, strlen("https://www.pinterest.com/") ) === "https://www.pinterest.com/"){
                            $content = substr( strlen("https://www.pinterest.com/"), $content);
                            $val = esc_attr($content);

                        }else{
                            $content = explode("/",$content) ;
                            $val = esc_attr($content[count($content) - 1]);
                        }
                    }
                    break;

                case 'linkedin':
                    if(!empty($content)){
                        if(substr( $content, 0, strlen("https://www.linkedin.com/in/") ) === "https://www.linkedin.com/in/"){
                            $content = substr( strlen("https://www.linkedin.com/in/"), $content);
                            $val = esc_attr($content);

                        }else{
                            $content = explode("/",$content) ;
                            $val = esc_attr($content[count($content) - 1]);
                        }
                    }
                    break;

                case 'googlegmail':
                case 'email':
                    if(!empty($content)){
                        if(substr( $content, 0, strlen("mailto:") ) === "mailto:"){
                            $content = substr( strlen("mailto:"), $content);
                            $val = sanitize_email($content);
                        }else{
                            $val = sanitize_email($content);
                        }
                    }
                    break;
                case 'whatsapp':
                    if(!empty($content)){
                        $val = sanitize_text_field($content);
                    }
                    break;
                default:
                    $val = sanitize_text_field($content);
            }
            return $val;
        }

        /*
         * call : hooks
         * do : enqueuing both scripts and styles.
         */
        public function GBQuickLaunchEnqueue(){
            wp_enqueue_style("gbql-admin-style",GBQLURL.'/core/css/gbql-admin.css','',GBQL,'all');
            wp_enqueue_script("gbql-admin-script",GBQLURL.'/core/js/gbql-admin.js',array('jquery'),GBQL,true);

        }

        /*
         * call : hooks
         * do : register the GBQuickLaunch meta box to GBQuickLaunch CPT
         */
        public function AddMetaBox(){
            add_meta_box(  esc_attr($this->settings['id']."_meta"), esc_html($this->settings['singular']), array($this,'MetaBox'), esc_attr($this->settings['id']), "side", "high",array('__back_compat_meta_box' => true) );
        }

        /*
         * call : add_meta_box
         * do : add the GBQuickLaunch meta box to gb-quick-launch CPT
         */
        public function MetaBox($post){
            //add an nonce field so we can check for it later.
            wp_nonce_field( esc_attr($this->settings['id']).'_meta_box', esc_attr($this->settings['id']).'_meta_box_nonce' );

            //load registered scripts & styles
            wp_enqueue_style("gbql-admin-style");
            wp_enqueue_script("gbql-admin-script");

            //get all the GBQuickLaunch types
            $types = $this->ButtonTypes();
            $is_button = get_post_meta($post->ID,'gbql_button',true);
            $selected_type = '';
            $view = get_post_meta($post->ID,'gbql_button_view',true);

            if($is_button && is_array($is_button)){
                if(isset($is_button['type']))
                    $selected_type = $is_button['type'];

                if(isset($is_button['view']))
                    $view = $is_button['view'];

                if(isset($is_button['area_style']))
                    $area_style = $is_button['area_style'];
            }

            //build the type select box
            ?>
            <p>
                <ol>
                    <li><?php echo sprintf(__("Make sure that you have your main icon selected in the %s settings page %s","gb-quick-launch"),'<a href="'.esc_url(get_admin_url().'admin.php?page=gbql-settings.php').'">','</a>'); ?></li>
                    <li><?php echo esc_html(__("Select the button type","gb-quick-launch")); ?></li>
                    <li><?php echo esc_html(__("Insert a URL or the desired content","gb-quick-launch")); ?></li>
                    <li><?php echo esc_html(__("Choose if your button will appear in desktop or/and mobile","gb-quick-launch")); ?></li>
                    <li><?php echo esc_html(__('Select your icon in the "Featured image" section',"gb-quick-launch")); ?></li>
                </ol>
                <hr />
                <label for="gbql-button-type"><?php esc_html_e("Type",'gb-quick-launch'); ?></label>
                <select id="gbql-button-type" name="gbql_button_type">
                    <option value="content" <?php echo esc_attr($is_button && $is_button != '' && $is_button['type'] == 'content' ? 'selected' : ''); ?>><?php esc_html_e("Content","gb-quick-launch"); ?></option>
                    <?php if(is_array($types) && !empty($types)): ?>
                        <?php foreach ($types as $id => $button):
                            $name = (is_array($button) && isset($button['name']) ? $button['name'] : '');
                            $slug = (is_array($button) && isset($button['slug']) ? $button['slug'] : '');
                            if(!empty($name) && !empty($slug) && (is_array($button) && isset($button['active']))):
                            ?>
                            <option <?php echo esc_attr(isset($button['active']) && $button['active'] == '0' ? 'disabled' : ''); ?> value="<?php esc_attr_e(isset($button['active']) && $button['active'] == '0' ? '' : $slug); ?>" <?php echo esc_attr($is_button && $is_button != '' && $is_button['type'] == $slug ? 'selected' : ''); ?>><?php esc_attr_e($name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </p>
            <?php //add all the types inputs ?>
            <label class="margin-top-30"><?php _e("Content:") ?></label>
            <section class="gbql-code" data-type="<?php echo esc_attr($selected_type); ?>">
                <fieldset class="gbql-link-fields gbql-type-content <?php echo esc_attr(($selected_type == '' || $selected_type == 'content' ? 'active' : '' )); ?>">
                    <label for="wp-content-editor-container"><?php echo esc_html(__('Enter your content to the content area.','gb-quick-launch')); ?></label>
                </fieldset>
            <?php if(is_array($types) && !empty($types)): ?>
                <?php foreach ($types as $index => $button):
                    $slug = (is_array($button) && isset($button['slug']) ? $button['slug'] : '');
                    ?>
                    <?php if(method_exists($this , "type_".$slug)): ?>
                    <fieldset id="content-<?php esc_attr_e($slug); ?>" class="gbql-link-fields gbql-type-<?php esc_attr_e($slug); ?> <?php echo ($selected_type == $slug ? 'active' : '' ); ?>">
                        <?php $this->{"type_".$slug}($is_button); ?>
                    </fieldset>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php $this->get_area_fields((isset($area_style) ? $area_style : array())); ?>

            <?php // $view = 1 = show button only on desktop. ?>
            <?php // $view = 2 = show button only on mobile. ?>
            <?php // $view = 3 = show button on desktop and mobile. ?>
                <fieldset class="gbql-show-in margin-top-30">
                    <label><?php _e('Show this button On:','gb-quick-launch'); ?></label>
                    <ul>
                        <li>
                            <button type="button" class="gbql-view gbql-desktop <?php esc_attr_e(!empty($view) && ($view == 3 || $view == 1) ? 'active' : ''); ?>"><?php _e('Desktop','gb-quick-launch'); ?></button>
                        </li>
                        <li>
                            <button type="button" class="gbql-view gbql-mobile <?php esc_attr_e(!empty($view) && ($view == 3 || $view == 2) ? 'active' : ''); ?>"><?php _e('Mobile','gb-quick-launch'); ?></button>
                        </li>
                    </ul>
                    <input type="hidden" name="gbql_view_on" value="<?php esc_attr_e($view && $view > 0 && $view < 4 ? $view : 3); ?>">
                </fieldset>
            </section>
            <?php
        }

        /*
         * call : hooks
         * do : if the post is gb-quick-launch post then save meta box data
         */
        public function SaveMetaBox($post_id){

            // Check if our nonce is set.
            if ( ! isset( $_POST[esc_attr($this->settings['id']).'_meta_box_nonce'] ) ) {
                return $post_id;
            }

            $nonce = $_POST[esc_attr($this->settings['id']).'_meta_box_nonce'];

            // Verify that the nonce is valid.
            if ( ! wp_verify_nonce( $nonce, esc_attr($this->settings['id']).'_meta_box' ) ) {
                return $post_id;
            }

            /*
             * If this is an autosave, our form has not been submitted,
             * so we don't want to do anything.
             */
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return $post_id;
            }

            // Check the user's permissions.
            if ( esc_attr($this->settings['id']) == $_POST['post_type'] ) {
                if ( ! current_user_can( 'edit_page', $post_id ) ) {
                    return $post_id;
                }
            } else {
                if ( ! current_user_can( 'edit_post', $post_id ) ) {
                    return $post_id;
                }
            }
            /* OK, it's safe for us to save the data now. */
            if(isset($_POST['gbql_button_type']) && !empty($_POST['gbql_button_type'])){
                $area_style = array();
                if(isset($_POST['gbql-area-bg'])){
                    $area_style['gbql-area-bg'] = sanitize_hex_color($_POST['gbql-area-bg']);
                }
                if(isset($_POST['gbql-area-borders'])){
                    $area_style['gbql-area-borders'] = sanitize_hex_color($_POST['gbql-area-borders']);
                }
                if(isset($_POST['gbql-area-radios'])){
                    $area_style['gbql-area-radios'] = intval($_POST['gbql-area-radios']);
                }
                //if the content was NOT selected
                if(isset($_POST['gbql_'.$_POST['gbql_button_type']])){
                    $type = sanitize_text_field($_POST['gbql_button_type']);
                    $content = "";
                    if($type != 'content'){
                        if(isset($_POST['gbql_'.$type])){
                            $content = sanitize_text_field($_POST['gbql_'.$type]);
                        }
                        $content = apply_filters("sanitize_gbql_field",$content,$type);
                    }

                    if(!empty($content)){
                        // Sanitize the user input.
                        $content = sanitize_text_field( $content );

                        // Update the meta field.
                        update_post_meta( $post_id, 'gbql_button', array('type' => esc_attr($type),'value' => $content,'area_style' => $area_style) );
                    }
                }else if($_POST['gbql_button_type'] == "content" && !empty($_POST["post_content"])){
                    //if the content WAS selected
                    $content = sanitize_post_field("content", $_POST["post_content"], $post_id);
                    // Update the meta field.
                    update_post_meta( $post_id, 'gbql_button', array('type' => 'content','value' => $content,'area_style' => $area_style) );
                }else{
                    //if the content WAS selected
                    $type = sanitize_text_field($_POST['gbql_button_type']);
                    // Update the meta field.
                    update_post_meta( $post_id, 'gbql_button', array('type' => esc_attr($type),'value' => '','area_style' => $area_style) );
                }

                if(isset($_POST["gbql_view_on"])){
                    $show = 3;
                    if($_POST["gbql_view_on"] >= 0 && $_POST["gbql_view_on"] < 4){
                        $show = intval(sanitize_text_field($_POST["gbql_view_on"]));
                    }
                    update_post_meta( $post_id, 'gbql_button_view', intval($show) );
                }
            }

            return $post_id;
        }

        /*
         * call : hooks
         * do : register custom post type
         */
        public function GBCPTRegister(){
            $labels = array(
                'name'               => __( $this->settings['title'], 'gb-quick-launch' ),
                'singular_name'      => __( $this->settings['singular'], 'gb-quick-launch' ),
                'menu_name'          => __( $this->settings['title'], 'gb-quick-launch' ),
                'name_admin_bar'     => __( $this->settings['title'], 'gb-quick-launch' ),
                'add_new'            => __( 'Add New', 'gb-quick-launch' ).' '.$this->settings['singular'],
                'add_new_item'       => __( 'Add New', 'gb-quick-launch' ).' '.$this->settings['singular'],
                'new_item'           => __( 'New ', 'gb-quick-launch' ).' '.$this->settings['singular'],
                'edit_item'          => __( 'Edit', 'gb-quick-launch' ).' '.$this->settings['singular'],
                'view_item'          => __( 'View', 'gb-quick-launch' ).' '.$this->settings['singular'],
                'all_items'          => __( 'All', 'gb-quick-launch' ).' '.$this->settings['title'],
                'search_items'       => __( 'Search', 'gb-quick-launch' ).' '.$this->settings['singular'],
                'parent_item_colon'  => __( 'Parent', 'gb-quick-launch' ).' '.$this->settings['singular'].':',
                'not_found'          => __( 'No GBQuickLaunchLink found.', 'gb-quick-launch' ),
                'not_found_in_trash' => __( 'No GBQuickLaunchLink found in Trash.', 'gb-quick-launch' )
            );

            $args = array(
                'labels'             => $labels,
                'description'        => $this->settings['title'].' '.__( 'is a Custom Post Type (CPT) for representing your GBQuickLaunchLink.', 'gb-quick-launch' ),
                'public'             => false,
                'show_in_rest'       => false, //Add to Rest
                'publicly_queryable' => true,
                'menu_icon' => 'dashicons-admin-links',
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => __($this->settings['slug'],'gb-quick-launch') ),
                'capability_type'    => 'post',
                'has_archive'        => false,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies' => array('category')
            );
            register_post_type( esc_attr($this->settings['id']), $args );
        }

        /*
         * call : hooks
         * do : register the settings page
         */
        public function AddAdminPage(){
            if(isset($this->settings['admin_page']) && is_array($this->settings['admin_page']) && !empty($this->settings['admin_page'])){
                extract($this->settings['admin_page'],EXTR_PREFIX_SAME,"wddx");
                add_menu_page($page_title,$menu_title,$capability,$menu_slug,$function,$icon_url);
            }
        }

        /*
         * activate : admin_sub_menu
         * do : echo the plugin admin setting page
         */
        public function GBQuickLaunchSettings(){
            wp_enqueue_style("gbql-admin-style");
            wp_enqueue_script("gbql-admin-script",GBQLURL.'/core/js/gbql-admin.js',array('jquery'),GBQL,true);

            if(isset($_POST['gbql_save_settings']) && isset($_POST['gbql_main_position']) && isset($_POST['gbql_main_icon'])){
                update_option('gbql_settings',array(
                    'gbql_main_position' => sanitize_text_field($_POST['gbql_main_position']),
                    'gbql_main_icon' => intval($_POST['gbql_main_icon']),
                    'custom-css-top' => (isset($_POST['custom-css-top']) && $_POST['custom-css-top'] != '' ? intval($_POST['custom-css-top']) : false),
                    'custom-css-left' => (isset($_POST['custom-css-left']) && $_POST['custom-css-left'] != '' ? intval($_POST['custom-css-left']) : false),
                ));
            }

            $gbql_settings = get_option("gbql_settings");

            //set the default position of the main icon
            if(!$gbql_settings){
                $gbql_settings = array();
                $gbql_settings['gbql_main_position'] = "BR";
            }else if(isset($gbql_settings['gbql_main_position']) && $gbql_settings['gbql_main_position'] == ""){
                $gbql_settings['gbql_main_position'] = "BR";
            }
            ?>
            <header>
                <h1><?php esc_html_e("GB Quick Launch settings page") ?></h1>
                <p><?php echo nl2br(esc_html("After choosing your main image and its position,\n navigate to your WP dashboard and find the Quick Launch CPT in order to manage the icons and their functionality","gb-quick-launch")); ?></p>
            </header>
            <section>
                <form method="post" action="" class="gbql_settings gb_style">
                    <table class="gbql-settings-table">
                        <thead>
                            <tr>
                                <th><?php _e("Description","gb-quick-launch"); ?></th>
                                <th><?php _e("Action","gb-quick-launch"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="gbql-sitting-desc">
                                    <label class="field-title" for="gbql_pl_token"><?php esc_html_e("Positioning the main icon","gb-quick-launch"); ?></label>
                                    <label class="sub-desc" for="gbql_pl_token"><?php esc_html_e("Select the main icon positioning","gb-quick-launch"); ?></label>
                                </td>
                                <td class="gbql-sitting-action">
                                    <select name="gbql_main_position">
                                        <option value="TL" <?php echo esc_attr(($gbql_settings['gbql_main_position'] == "TL" ? "selected" : "")); ?>><?php esc_html_e("Top Left Corner","gb-quick-launch") ?></option>
                                        <option value="TR" <?php echo esc_attr(($gbql_settings['gbql_main_position'] == "TR" ? "selected" : "")); ?>><?php esc_html_e("Top Right Corner","gb-quick-launch") ?></option>
                                        <option value="BL" <?php echo esc_attr(($gbql_settings['gbql_main_position'] == "BL" ? "selected" : "")); ?>><?php esc_html_e("Bottom Left Corner","gb-quick-launch") ?></option>
                                        <option value="BR" <?php echo esc_attr(($gbql_settings['gbql_main_position'] == "BR" ? "selected" : "")); ?>><?php esc_html_e("Bottom Right Corner","gb-quick-launch") ?></option>
                                        <option value="custom" <?php echo esc_attr(($gbql_settings['gbql_main_position'] == "custom" ? "selected" : "")); ?>><?php esc_html_e("Custom css top & left","gb-quick-launch") ?></option>
                                    </select>
                                    <?php if($gbql_settings['gbql_main_position'] == "custom"): ?>
                                        <div class="gbql-custom-css">
                                            <div class="custom-css-top"><span class="custom-top-wrap"><input type="number" name="custom-css-top" value="<?php echo esc_attr((isset($gbql_settings['custom-css-top']) && is_numeric($gbql_settings['custom-css-top']) ? $gbql_settings['custom-css-top'] : "")); ?>"></span></div>
                                            <div class="custom-css-left"><span class="custom-left-wrap"><input type="number" name="custom-css-left" value="<?php echo esc_attr((isset($gbql_settings['custom-css-left']) && is_numeric($gbql_settings['custom-css-left']) ? $gbql_settings['custom-css-left'] : "")); ?>"></span></div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="gbql-sitting-desc">
                                    <label class="field-title" for="gbql_pl_token"><?php esc_html_e("Main icon","gb-quick-launch"); ?></label>
                                    <label class="sub-desc" for="gbql_pl_token"><?php esc_html_e("Select the main icon","gb-quick-launch"); ?></label>
                                </td>
                                <td class="gbql-sitting-action">
                                    <?php $this->UploadImage((isset($gbql_settings['gbql_main_icon']) && $gbql_settings['gbql_main_icon'] != "" ? intval($gbql_settings['gbql_main_icon']) : ""),array('name' => 'gbql_main_icon')); ?>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" class="gb_button-green"><?php esc_html_e("Save","gb-quick-launch") ?></button>
                                    <input type="hidden" name="gbql_save_settings">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </section>
            <?php
        }

        /*
         * call : GBQuickLaunchSettings
         * do : add upload media button
         */
        public function UploadImage($gb_media_img_id = '', $attr = array()){
            wp_enqueue_media();
            if($gb_media_img_id){
                $gb_media_img = wp_get_attachment_image_src( $gb_media_img_id, 'medium' );
            }else{
                $gb_media_img_id = '';
                $gb_media_img = false;
            }
            $upload_link = get_upload_iframe_src();
            ?>
            <div class="gb-media <?php echo esc_attr((isset($attr['class']) ? esc_attr($attr['class']) : '')); ?>">
                <div class="gb-media-img-container">
                    <figure>
                        <?php if ( $gb_media_img ) : ?>
                            <img src="<?php echo esc_url($gb_media_img[0]) ?>" alt="" />
                        <?php endif; ?>
                    </figure>
                </div>
                <p class="hide-if-no-js">
                    <a class="gb-media-upload-img <?php if ( $gb_media_img  ) { echo esc_attr('hidden'); } ?>"
                       href="<?php echo esc_url($upload_link); ?>">
                        <?php _e('Set custom image','gb-quick-launch') ?>
                    </a>
                    <a class="gb-media-delete-img <?php if ( ! $gb_media_img  ) { echo esc_attr('hidden'); } ?>"
                       href="#">
                        <?php _e('Remove this image','gb-quick-launch') ?>
                    </a>
                </p>
                <!-- A hidden input to set and post the chosen image id -->
                <input class="gb-media-img-id" name="<?php echo esc_attr((isset($attr['name']) ? $attr['name'] : 'gb-media-img-id')); ?>" type="hidden" value="<?php echo esc_attr( $gb_media_img_id ); ?>" />
            </div>
            <?php
        }

        /*
         * call : *
         * do : return all the types of buttons
         */
        public function get_button_types(){
            return $this->ButtonTypes();
        }
    }
//End fo "do only if class NOT exists"
endif;

//Return the GBQuickLaunchAdmin class object
function GBQuickLaunchAdmin(){
    global $GBQuickLaunchAdmin;

    if( !isset($GBQuickLaunchAdmin) ){
        $GBQuickLaunchAdmin = new GBQuickLaunchAdmin();
    }

    return $GBQuickLaunchAdmin;
}
GBQuickLaunchAdmin();
<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_like_dislike' ) ) {
			/*
* الكلاس الي بيتحكم وبيعمل لايك وديس لايك للسؤال
*/
    class AFAQCBC_q_a_faq_like_dislike
    {
        public function __construct(){
			add_action('init', array($this,'start_session'), 1);
            add_filter('faq_after_question_content', array($this,'template'));
			add_action( 'wp_enqueue_scripts', array($this,'my_enqueue') );
			
			add_action( 'wp_ajax_faq_save_rat', array($this,'faq_save_rat') );
			add_action( 'wp_ajax_nopriv_faq_save_rat', array($this,'faq_save_rat') );
        }
				/*
* ايقونة اللايك والديس لايك الي بتنعرض تحت السؤال
*/
		public function template($arg){
		    
			if(!get_option('allow_rating_faq')){return;};
			
            ob_start();
			$question_id = absint($arg['question_id']);
			if( get_post_meta( $question_id, 'like', true )!=''){
				$like = get_post_meta( $question_id, 'like', true );
			}else{
				$like = '0';
			}
			if( get_post_meta( $question_id, 'deslike', true )!=''){
				$deslike = get_post_meta( $question_id, 'deslike', true );
			}else{
				$deslike = '0';
			}
			
			?>
			<div class="faq_like_deslike">
				<i class="<?php echo esc_attr($arg['like_icon']); ?> like question_like_icon_options_font_<?php echo esc_attr($arg['faq_id']); ?>" id="like-<?php echo absint($question_id);?>" onclick="save_faq_like_deslike(this,1,<?php echo absint($question_id);?>)"><?php echo esc_html($like);?></i>
				<i class="<?php echo esc_attr($arg['dislike_icon']); ?> deslike question_dislike_icon_options_font_<?php echo esc_attr($arg['faq_id']); ?>" id="deslike-<?php echo absint($question_id);?>" onclick="save_faq_like_deslike(this,2,<?php echo absint($question_id);?>)"><?php echo esc_html($deslike);?></i>
			</div>
			<?php

            return ob_get_clean();
		}
				/*
* حفظ لايك او ديس لايك في الكوكيس او السيشن وكمان في الداتا بيز
*/
		function faq_save_rat() {
			global $wpdb;
			$q_id = intval( $_POST['q_id'] );
			$opreter = intval( $_POST['opreter'] );//1 like , 2 deslike
			
			if(get_option('rating_depends_on')== 1){
				//session
				if(in_array($q_id, $_SESSION["faq_q"])){
					if($opreter == 1){
						echo absint(get_post_meta( $q_id,'like',true));
					}elseif($opreter == 2){
						echo absint(get_post_meta( $q_id,'deslike',true));
					}
					exit;
				}
				$faq_q_array=(array)$_SESSION["faq_q"];
				array_push($faq_q_array,$q_id);
				$_SESSION["faq_q"] = $faq_q_array;
				
			}else{
				//cookies
				$data = unserialize($_COOKIE['faq_q'], ["allowed_classes" => false]);
				if(in_array($q_id, $data)){
					if($opreter == 1){
						echo absint(get_post_meta( $q_id,'like',true));
					}elseif($opreter == 2){
						echo absint(get_post_meta( $q_id,'deslike',true));
					}
					exit;
				}
				$faq_q_array=(array)$data;
				array_push($faq_q_array,$q_id);
				setcookie('faq_q', serialize($faq_q_array), time()+(86400 * 30));
				
			}
			if($opreter == 1){
				$pre_val = absint(get_post_meta( $q_id,'like',true));
				update_post_meta( $q_id, 'like',$pre_val+1 , $pre_val );
			}elseif($opreter == 2){
				$pre_val = absint(get_post_meta( $q_id,'deslike',true));
				update_post_meta( $q_id, 'deslike',$pre_val+1 , $pre_val );
			}
			echo absint($pre_val)+1;
			exit;
		}
				/*
* بداية سيشن إذا مش مفتوحه لتخزين إذا اليوزر عمل لايك او ديس لايك لسؤال او لا 
*/
		function start_session(){
			if(!session_id()) {
				@session_start();
			}
			
		}
				/*
* كواد الاجكس الخاصه باللايك والديس لايك 
*/
		function my_enqueue() {
			wp_enqueue_script( 'like-deslike-faq', AFAQCBC_PLUGIN_URL. 'assets/js/like_deslike.js', array('jquery') );
			 wp_localize_script( 'like-deslike-faq', 'faq_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}
		
		
		
		
		
	}
	new AFAQCBC_q_a_faq_like_dislike();
}




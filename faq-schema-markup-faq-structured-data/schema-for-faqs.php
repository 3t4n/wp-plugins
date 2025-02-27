<?php
/*
Plugin Name: FAQ Schema Markup - FAQ Structured Data
Description: Super fast, light-weight plugin to add FAQ Schema structured data markup in recommended JSON-LD format automatically to WordPress sites.   
Version: 1.0
Author: Sunny Wp
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


/**
 * Register a meta box using a class.
 */
class Schema_Faqs {
 
    public function __construct() {
        if ( is_admin() ) {
            add_action( 'load-post.php',     array( $this, 'schema_faqs_init_metabox' ) );
            add_action( 'load-post-new.php', array( $this, 'schema_faqs_init_metabox' ) );
        }
		
		add_action('wp_head',array($this,'schema_faqs_head'));
 
    }
	
	public function schema_faqs_head()
	{
		$post_type=get_post_type();	
		if($post_type=="post" || $post_type=="page")
		{
			$post_id=get_the_ID();
			$ques_ans_string = get_post_meta($post_id, 'schema_faqs_ques_ans_data', true );	
			$ques_ans_string =str_replace("\'","'",$ques_ans_string);
			if(!empty($ques_ans_string))
			{
				$ques_ans_data=json_decode($ques_ans_string,true);
				$scrdata=array();	
				foreach($ques_ans_data as $sfdata)
				{
					
					$scrdata[]=array("@type"=>"Question","name"=>stripslashes($sfdata['question']),"acceptedAnswer"=>array("@type"=>"Answer","text"=>stripslashes($sfdata['answer'])));
				}
			
				$script_string=json_encode($scrdata);
		?>	
		
			<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":<?php echo $script_string;?>}</script>
		
		<?php
		
			}
		}
	}
 
    public function schema_faqs_init_metabox() {
        add_action( 'add_meta_boxes', array( $this, 'schema_faqs_add_metabox'));
        add_action( 'save_post',      array( $this, 'schema_faqs_save_metabox' ), 10, 2 );
    }
 
    public function schema_faqs_add_metabox($post_type) {
        
		$post_types = array( 'post', 'page' );
		if ( in_array( $post_type, $post_types ) ) 
		{
			add_meta_box(
				'schema_faq_meta_boxes',
				__( 'Faqs', 'schema_faqs' ),
				array( $this, 'schema_faqs_render_metabox' ),
				'post',
				'advanced',
				'default'
			);
		}
    }
 
    public function schema_faqs_render_metabox( $post ) {
        wp_nonce_field('schema_faqs_nonce_action', 'schema_faqs_nonce');
		wp_enqueue_style('schema_faqs_backend_css',plugins_url('css/backend.css',__FILE__));
		wp_enqueue_script('schema_faqs_backend_js',plugins_url('js/backend.js',__FILE__));	
		
		$ques_ans_string = get_post_meta($post->ID, 'schema_faqs_ques_ans_data', true );	
		$ques_ans_string =str_replace("\'","'",$ques_ans_string);
		
		$ques_ans_data=json_decode($ques_ans_string,true);  
		
		?>
			<table class="widefat fixed"  id="tab_logic" style="border: 0 !important;">
				<tbody>
			<?php
			
			if(count($ques_ans_data)>0)
			{
				foreach($ques_ans_data as $key=>$quesData)
				{
				?>
    				<tr>
					<td class="faq-tdwidth">
					<input type="text" name="questions[]" class="faq-question-input"  value="<?php echo stripslashes($quesData['question']);?>"/>
					<a href="javascript:void(0);" class="faq-row-remove faq-float-right" onclick="removetr(this)"><span class="dashicons dashicons-trash"></span></a>
					<textarea class="faq-answer-input"   name="answers[]"><?php echo stripslashes($quesData['answer']);?></textarea>
					</td>
					</tr>
				<?php } 
				}
				else
				{
				?>
					<tr>
					<td class="faq-tdwidth">
					<input type="text" name="questions[]" class="faq-question-input"  placeholder="Question #1"/>
					<a href="javascript:void(0);" class="faq-row-remove faq-float-right" onclick="removetr(this)"><span class="dashicons dashicons-trash"></span></a>
					<textarea class="faq-answer-input"  placeholder="Answer #1" name="answers[]"></textarea>
					</td>
					</tr>
				<?php }
				?> 	
					
				</tbody>
			</table>
	
	<div style="text-align:center">
	<a id="faq_add_row" class="faq-add-faq">+ Add anoter FAQ</a>
	</div>
	
	<?php	
	
	}
 
    public function schema_faqs_save_metabox( $post_id, $post ) {
        // Add nonce for security and authentication.
        $schema_faqs_nonce_name   = isset( $_POST['schema_faqs_nonce'] ) ? $_POST['schema_faqs_nonce'] : '';
        $schema_faqs_nonce_action = 'schema_faqs_nonce_action';
 
        // Check if nonce is valid.
        if ( ! wp_verify_nonce( $schema_faqs_nonce_name, $schema_faqs_nonce_action ) ) {
            return;
        }
 
        // Check if user has permissions to save data.
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
 
        // Check if not an autosave.
        if ( wp_is_post_autosave( $post_id ) ) {
            return;
        }
 
        // Check if not a revision.
        if ( wp_is_post_revision( $post_id ) ) {
            return;
        }
		//array of questions and answers
		$questions=$_POST['questions'];
		$answers=$_POST['answers'];
		
		$ques_ans_data=array();
		foreach($questions as $key=>$val)
		{
			// Sanitize the user inputs.

			$question = sanitize_text_field($val);
			$answer = sanitize_text_field($answers[$key]);
			
			$ques_ans_data[]=array('question'=>$question,'answer'=>$answer);
		}
		
		$ques_ans_string=json_encode($ques_ans_data);
		update_post_meta( $post_id, 'schema_faqs_ques_ans_data', $ques_ans_string );
	}
}
 
new Schema_Faqs();
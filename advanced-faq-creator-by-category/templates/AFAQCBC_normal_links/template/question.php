
<div class="col-12 question_title question_title_options_style_<?php esc_attr_e($faq_id);?>">
    <span class="mb-0">
        <a href="<?php echo esc_url($link);?>" class="question_title_fonts question_title_options_font_<?php esc_attr_e($faq_id);?> faq_q_link" data-faqid="<?php  esc_attr_e($faq_id);?>" data-faqname="<?php  esc_attr_e($term_name);?>" data-catname="<?php esc_attr_e($cat_title);?>" data-catid="<?php esc_attr_e($cat_id);?>" data-qid="q_<?php esc_attr_e($question_id);?>">
			<?php  if($Show_icon_question != 2){ ?>
                <i class=" <?php esc_attr_e($icon_font_select);?> question_icon_options_font_<?php esc_attr_e($faq_id);?> question_icon_options_style_<?php esc_attr_e($faq_id);?>" style="color:<?php esc_attr_e($q_icon_color);?>"></i>
            <?php } ?>
			<?php esc_html_e($question_title); ?>

        </a>
        <?php 
			if($like_dislike_v){
				printf(apply_filters( 'faq_after_question_content',array('question_id'=>$question_id,'thiscatid'=>$cat_id,'dislike_icon'=>$dislike_icon,'like_icon'=>$like_icon,'faq_id'=>$faq_id)));
			}
		?>
    </span>

</div>
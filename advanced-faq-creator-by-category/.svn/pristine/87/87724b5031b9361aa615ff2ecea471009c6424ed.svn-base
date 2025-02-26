
<div class="card question_title_card"> 
    <div class="card-header  question_title_options_style_<?php esc_attr_e($faq_id);?>   question_active_header_options_style_<?php esc_attr_e($faq_id);?> question_inactive_header_options_style_<?php esc_attr_e($faq_id);?> "  data-toggle="collapse" data-target="#collapseOne<?php esc_attr_e($question_id.$count.$cat_id);?>" aria-expanded="true" aria-controls="collapseOne<?php esc_attr_e($question_id);?>" id="headingOne<?php esc_attr_e($question_id.$count.$cat_id);?>">
        <span class="question_title_options_font_<?php esc_attr_e($faq_id);?>  question_active_header_options_font_<?php esc_attr_e($faq_id);?> question_inactive_header_options_font_<?php esc_attr_e($faq_id);?>">
			<?php  if($Show_icon_question != 2){ ?>
                <i class="<?php esc_attr_e($icon_font_select);?> question_icon_options_font_<?php esc_attr_e($faq_id);?> question_icon_options_style_<?php esc_attr_e($faq_id);?>" style="color:<?php esc_attr_e($q_icon_color);?>"></i>
            <?php } ?>
			<?php esc_html_e($question_title); ?>
        </span>
    </div>
    <div id="collapseOne<?php esc_attr_e($question_id.$count.$cat_id);?>" class="collapse  <?php esc_attr_e($show) ;?> question_question_options_style_<?php esc_attr_e($faq_id);?>" aria-labelledby="headingOne<?php esc_attr_e($question_id.$count.$cat_id);?>" data-parent="#faqExample<?php esc_attr_e($cat_id); if($On_Select_Question == 2){echo rand(); }?>">
        <div class="card-body question_question_options_font_<?php esc_attr_e($faq_id);?>">
			<?php
				if($data['faqs_style']['question_description_Visibility'] == 2){
                    $question_content_remove_tag = strip_tags($question_content);
                    $read_more_link = ' ... ';
                    echo $this->substrwords($question_content_remove_tag,$short_description_length,$read_more_link);
					?>
					<a href="<?php echo esc_url(get_permalink($question_id));?>" class="faq_q_link" data-faqid="<?php esc_attr_e($faq_id);?>" data-faqname="<?php esc_attr_e($term_name);?>" data-catname="<?php esc_attr_e($cat_title);?>" data-catid="<?php esc_attr_e($cat_id);?>" data-qid="q_<?php esc_attr_e($question_id);?>"><?php esc_html_e($read_more_text);?></a>
					<?php
                }else{
					echo  $question_content;
				}

				if($like_dislike_v){
					printf(apply_filters( 'faq_after_question_content',array('question_id'=>$question_id,'thiscatid'=>$cat_id,'dislike_icon'=>$dislike_icon,'like_icon'=>$like_icon,'faq_id'=>$faq_id)));
				}
			?>
		</div>
    </div>
</div>

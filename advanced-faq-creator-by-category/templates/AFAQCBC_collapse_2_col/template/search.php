<?php $style_input = $data['faqs_style']['search_input'];?>
<?php $style_label = $data['faqs_style']['search_label'];?>
<?php $style_button = $data['faqs_style']['search_button'];?>
<div class="container container-search search_box_font_<?php esc_attr_e($faq_id);?> search_box_style_<?php esc_attr_e($faq_id);?> animated <?php if(isset($search_box['animation_select']) && $search_box['animation_select'] !=''){ esc_attr_e($search_box['animation_select']);}?>">
    <form action="#" autocomplete="off" id="search_faq_form" method="post">
        <div class="form-group row container-search-form">
            <div class="col-md-3 col-xs-12 ">
                <label for="faq_search" class=" search_label_font_<?php esc_attr_e($faq_id);?> search_label_style_<?php esc_attr_e($faq_id);?>"><?php if(isset($style_label) && isset($style_label['text_options']) && $style_label['text_options'] != ''){esc_html_e($style_label['text_options']);}else{ esc_html_e('Search');} ?></label>
            </div>
            <div class="col-md-6 col-xs-12 ">
                <input type="text" autocomplete="off" class="form-control search_input_font_<?php esc_attr_e($faq_id);?> search_input_style_<?php esc_attr_e($faq_id);?>" id="faq_search" name="faq_search" placeholder="<?php if(isset($style_input['text_placeholder'])){ esc_attr_e($style_input['text_placeholder']);}?>" value="<?php if(isset($_POST['faq_search'])){echo $this->esc_attr_text_or_array_field($_POST['faq_search']);}?>">
                <ul class="list-gpfrm" id="hdTuto_search"></ul>
            </div>
            <div class="col-md-3 col-xs-12 ">
                <button type="submit" class="btn btn-default  search_button_font_<?php esc_attr_e($faq_id);?> search_button_style_<?php esc_attr_e($faq_id);?>"><?php if(isset($style_button) && isset($style_button['text_button']) && $style_button['text_button'] != ''){esc_html_e($style_button['text_button']);}else{esc_html_e('Search');} ?></button>
            </div>
            <input type="hidden" name="faq_id" id="faq_id" value="<?php esc_attr_e($faq_id);?>">
        </div>
    </form>

</div>
<script type="text/javascript">
        jQuery(document).ready(function() {
        calculateWidth();
        jQuery('#icon_show_hide,#content_limit_show_hide').on('click', function() {
            calculateWidth();
        });
        
        //General Setting
        jQuery(`
            #head_icon_font_size_number, 
            #title_icon_color,
            #icon_hover_color,
            #body_margin_bottom,
            #title_active_icon,
            #title_inactive_icon,
            #indicator_font_size_number,
            #indicator_color,
            #indicator_hover_color,
            #indicator_background_color,
            #indicator_hover_background_color,
            #indicator_border_size,
            #title_font_size_number,
            #title_line_height_number,
            #title_font_weight,
            #title_font_color,
            #title_text_hover_color,
            #title_bg_color,
            #title_bg_hover_color,
            #title_text_align,
            #title_text_transform,
            #title_font_family,
            #title_padding_left_number,
            #description_font_size_number,
            #description_line_height_number,
            #description_font_color,
            #description_text_hover_color,
            #description_font_background_color,
            #description_background_hover_color,
            #description_font_family,
            #description_font_weight,
            #description_text_transform,
            #description_text_align,
            #description_padding_left_number,
            #description_padding_right_number,
            #description_padding_top_number,
            #description_padding_bottom_number,
            #description_margin_bottom,
            #head_icon_width_number,
            #indicator_width_number,
            #title_line_height_number,
            #title_padding_top_number,
            #title_padding_right_number,
            #title_padding_bottom_number,
            #title_padding_left_number

        `).on('change', function() {
            //General
            var head_icon_font_size_number = parseInt(jQuery('#head_icon_font_size_number').val());
            var title_icon_color = jQuery('#title_icon_color').val();
            var icon_hover_color = jQuery('#icon_hover_color').val();
            var body_margin_bottom = parseInt(jQuery('#body_margin_bottom').val());
            var title_active_icon = jQuery('#title_active_icon').val();
            var title_inactive_icon = jQuery('#title_inactive_icon').val();
            var indicator_font_size_number = parseInt(jQuery('#indicator_font_size_number').val());
            var indicator_color = jQuery('#indicator_color').val();
            var indicator_hover_color = jQuery('#indicator_hover_color').val();
            var indicator_background_color = jQuery('#indicator_background_color').val();
            var indicator_hover_background_color = jQuery('#indicator_hover_background_color').val();
            var indicator_border_size = parseInt(jQuery('#indicator_border_size').val());
            //title section
            var title_font_size_number = parseInt(jQuery('#title_font_size_number').val());
            var title_line_height_number = parseInt(jQuery('#title_line_height_number').val());
            var title_font_weight = jQuery('#title_font_weight').val();
            var title_font_color = jQuery('#title_font_color').val();
            var title_text_hover_color = jQuery('#title_text_hover_color').val();
            var title_bg_color = jQuery('#title_bg_color').val();
            var title_bg_hover_color = jQuery('#title_bg_hover_color').val();
            var title_text_align = jQuery('#title_text_align').val();
            var title_text_transform = jQuery('#title_text_transform').val();
            var title_font_family = jQuery('#title_font_family').val().replace(/\+/g, ' ');
            var title_padding_left_number = parseInt(jQuery('#title_padding_left_number').val());

            //description section
            var description_font_size_number = parseInt(jQuery('#description_font_size_number').val());
            var description_line_height_number = parseInt(jQuery('#description_line_height_number').val());
            var description_font_color = jQuery('#description_font_color').val();
            var description_text_hover_color = jQuery('#description_text_hover_color').val();
            var description_font_background_color = jQuery('#description_font_background_color').val();
            var description_background_hover_color = jQuery('#description_background_hover_color').val();
            var description_font_family = jQuery('#description_font_family').val().replace(/\+/g, ' ');
            var description_font_weight = jQuery('#description_font_weight').val();
            var description_text_transform = jQuery('#description_text_transform').val();
            var description_text_align = jQuery('#description_text_align').val();
            var description_padding_left_number = parseInt(jQuery('#description_padding_left_number').val());
            var description_padding_right_number = parseInt(jQuery('#description_padding_right_number').val());
            var description_padding_top_number = parseInt(jQuery('#description_padding_top_number').val());
            var description_padding_bottom_number = parseInt(jQuery('#description_padding_bottom_number').val());
            var description_margin_bottom = parseInt(jQuery('#description_margin_bottom').val());
            //New Fields
            var head_icon_width_number = parseInt(jQuery('#head_icon_width_number').val());
            var indicator_width_number = parseInt(jQuery('#indicator_width_number').val());
            var title_line_height_number = parseInt(jQuery('#title_line_height_number').val());
            var title_padding_top_number = parseInt(jQuery('#title_padding_top_number').val());
            var title_padding_right_number = parseInt(jQuery('#title_padding_right_number').val());
            var title_padding_bottom_number = parseInt(jQuery('#title_padding_bottom_number').val());
            var title_padding_left_number = parseInt(jQuery('#title_padding_left_number').val());

            let textAlign = 'right';
            if(title_text_align == 'flex-start') {
                textAlign = 'left';
            } else if(title_text_align == 'center') {
                textAlign = 'center';
            }
   
            calculateWidth();

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {
               background-color: ${title_bg_color}; 
               margin-bottom: ${body_margin_bottom}px;
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover{
                background-color: ${title_bg_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
                margin-left: ` + Math.ceil(indicator_width_number / 2 ) + `px;
                font-size: ${title_font_size_number}px;
                font-weight:  ${title_font_weight};
                font-family: ${title_font_family}; 
                line-height: ${title_line_height_number}px; 
                color: ${title_font_color};
                justify-content: ${title_text_align}; 
                text-align: ${textAlign};
                padding: ${title_padding_top_number}px ${title_padding_right_number}px ${title_padding_bottom_number}px ${title_padding_left_number}px;
                text-transform: ${title_text_transform};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
               color: ${title_text_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

             jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-title-icon {
                width: ${head_icon_width_number}px; 
                font-size: ${head_icon_font_size_number}px;
                color: ${title_icon_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-title-icon {
               color: ${icon_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
                width:  ${indicator_width_number}px;  
                height:  ${indicator_width_number}px;
                line-height: ${indicator_width_number}px; ;
                background: ${indicator_background_color};
                color: ${indicator_color};
                border: ${indicator_border_size}px solid #fff;
                top: calc(50% - ` + Math.ceil(indicator_width_number / 2) + `px); 
                left: -` + Math.ceil(indicator_width_number / 2) + `px;
                font-size: ${indicator_font_size_number}px;
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover
            .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
               background: ${indicator_hover_background_color};
               color: ${indicator_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content {
               background: ${description_font_background_color};
               margin-bottom: ${description_margin_bottom}px;
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover{
               background: ${description_background_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
               width: calc(100% - `+ (description_padding_right_number + description_padding_left_number) +`px );
               line-height: ${description_line_height_number}px;
               text-align: ${description_text_align};
               color: ${description_font_color};
               text-transform: ${description_text_transform};
               font-family: ${description_font_family};
               font-size: ${description_font_size_number}px;
               font-weight: ${description_font_weight};   
               padding-left: ${description_padding_left_number}px;
               padding-right: ${description_padding_right_number}px;
               padding-top: ${description_padding_top_number}px; 
               padding-bottom: ${description_padding_bottom_number}px;
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
            color: ${description_text_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'> .afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title{
                color: ${title_text_hover_color} !important;  
                }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {          
            background: ${indicator_hover_background_color} !important;
            color: ${indicator_hover_color} !important;
            }</styles>`).appendTo(".afaq-6310-preview");
            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-title-icon{
            color: ${icon_hover_color}  !important; 
            }</styles>`).appendTo(".afaq-6310-preview");  
            
            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active {
            background-color:${title_bg_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

        });

     function calculateWidth() {      
            var head_icon_width_number = Number(jQuery("#head_icon_width_number").val());
            var indicator_width_number = Number(jQuery("#indicator_width_number").val());
            var double = Math.ceil(indicator_width_number / 2);

            if(jQuery('#content_limit_show_hide').prop('checked')== true){
                jQuery('.description_scroll').show(); 
            }else{
                jQuery('.description_scroll').hide();              
            }

            if (jQuery('#icon_show_hide').prop('checked') == true) {
                double += Number(jQuery('#head_icon_width_number').val());
                jQuery('.title-act-field').show();
                jQuery("<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-title-icon{ display:flex;}</style>").appendTo(".afaq-6310-preview");
            } else {
                jQuery('.title-act-field').hide();
                jQuery("<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-title-icon { display:none;}</style>").appendTo(".afaq-6310-preview");
            }
            
            jQuery(`<style type='text/css'> 
                .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-title-icon{ 
                    width: ${head_icon_width_number}px; 
                } 
                .afaq-6310-faq-template-<?php echo $ids; ?>-head-title{ 
                    width: calc(100% - ${double}px);
                } 
                .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon{ 
                    width: ${indicator_width_number}px; 
                } 
            </style>`).appendTo(".afaq-6310-preview");
        }
    });
</script>
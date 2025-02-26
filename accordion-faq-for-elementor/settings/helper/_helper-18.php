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
            #title_border_size,
            #title_border_color,
            #description_font_size_number,
            #description_line_height_number,
            #description_font_color,
            #description_text_hover_color,
            #description_font_background_color,
            #description_background_hover_color,
            #description_font_family,
            #description_font_weight,
            #description_margin_top,
            #description_margin_bottom,
            #description_text_transform,
            #description_text_align,
            #description_padding_left_number,
            #description_padding_right_number,
            #description_padding_top_number,
            #description_padding_bottom_number,
            #description_border_height,
            #description_border_color,
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
            var title_border_size = parseInt(jQuery('#title_border_size').val());
            var title_border_color = jQuery('#title_border_color').val();

            //description section
            var description_font_size_number = parseInt(jQuery('#description_font_size_number').val());
            var description_line_height_number = parseInt(jQuery('#description_line_height_number').val());
            var description_font_color = jQuery('#description_font_color').val();
            var description_text_hover_color = jQuery('#description_text_hover_color').val();
            var description_font_background_color = jQuery('#description_font_background_color').val();
            var description_background_hover_color = jQuery('#description_background_hover_color').val();
            var description_font_family = jQuery('#description_font_family').val().replace(/\+/g, ' ');
            var description_font_weight = jQuery('#description_font_weight').val();
            var description_margin_top = parseInt(jQuery('#description_margin_top').val());
            var description_margin_bottom = parseInt(jQuery('#description_margin_bottom').val());
            var description_text_transform = jQuery('#description_text_transform').val();
            var description_text_align = jQuery('#description_text_align').val();
            var description_padding_left_number = parseInt(jQuery('#description_padding_left_number').val());
            var description_padding_right_number = parseInt(jQuery('#description_padding_right_number').val());
            var description_padding_top_number = parseInt(jQuery('#description_padding_top_number').val());
            var description_padding_bottom_number = parseInt(jQuery('#description_padding_bottom_number').val());
            var description_border_height = parseInt(jQuery('#description_border_height').val());
            var description_border_color = jQuery('#description_border_color').val();

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
               border: ${title_border_size}px solid ${title_border_color};
               outline:  `+ Math.ceil(title_border_size  + 2 ) +`px solid ${title_bg_color};
               margin-bottom: ${body_margin_bottom}px;
            }</styles>`).appendTo(".afaq-6310-preview");           

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
               width: ${head_icon_width_number}px;              
               font-size: ${head_icon_font_size_number}px; 
               color: ${title_icon_color};
               background-color: ${title_bg_color};
            }</styles>`).appendTo(".afaq-6310-preview");

             jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
               color: ${icon_hover_color};
               background-color: ${title_bg_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
               line-height: ${title_line_height_number}px;
               font-family: ${title_font_family};
               text-transform: ${title_text_transform};
               font-size: ${title_font_size_number}px;
               font-weight: ${title_font_weight};
               justify-content: ${title_text_align}; 
               text-align: ${textAlign};
               color: ${title_font_color};               
               padding: ${title_padding_top_number}px ${title_padding_right_number}px ${title_padding_bottom_number}px ${title_padding_left_number}px;
               background-color: ${title_bg_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
               color: ${title_text_hover_color};
               background-color: ${title_bg_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
               width: ${indicator_width_number}px;             
               font-size: ${indicator_font_size_number}px;
               color: ${indicator_color};
               background-color: ${title_bg_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
               color: ${indicator_hover_color};
               background-color: ${title_bg_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content {
               border-top: ${description_border_height}px solid ${description_border_color};
               background: ${description_font_background_color}; 
               border-bottom: ${description_border_height}px solid ${description_border_color};
               margin-bottom: ${description_margin_bottom}px;
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover{  
              background: ${description_background_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
               color: ${description_text_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
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
            
            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-head-title{
               color: ${title_text_hover_color} !important; 
               background-color: ${title_bg_hover_color} !important; 
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
               color: ${icon_hover_color} !important; 
               background-color: ${title_bg_hover_color} !important;
            }</styles>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
               color: ${indicator_hover_color} !important; 
               background-color: ${title_bg_hover_color} !important;
            }</styles>`).appendTo(".afaq-6310-preview");

        });

        function calculateWidth() {      
            var head_icon_width_number = Number(jQuery("#head_icon_width_number").val());
            var indicator_width_number = Number(jQuery("#indicator_width_number").val());
            var double = indicator_width_number;

            if(jQuery('#content_limit_show_hide').prop('checked')== true){
                jQuery('.description_scroll').show(); 
            }else{
                jQuery('.description_scroll').hide();              
            }

            if (jQuery('#icon_show_hide').prop('checked') == true) {
                double += Number(jQuery('#head_icon_width_number').val());
                jQuery('.title-act-field').show();
                jQuery("<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{ display:flex;}</style>").appendTo(".afaq-6310-preview");
            } else {
                jQuery('.title-act-field').hide();
                jQuery("<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon { display:none;}</style>").appendTo(".afaq-6310-preview");
            }
            
            jQuery(`<style type='text/css'> 
                .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{ 
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
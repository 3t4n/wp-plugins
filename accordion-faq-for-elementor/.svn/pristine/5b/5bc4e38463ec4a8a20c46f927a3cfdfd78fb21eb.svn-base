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
            #title_active_icon,
            #title_inactive_icon,
            #indicator_font_size_number,
            #indicator_color,
            #indicator_hover_color,
            #indicator_background_color,
            #indicator_background_hover_color,
            #title_font_size_number,
            #title_font_weight,
            #title_font_color,
            #title_text_hover_color,
            #title_bg_color,
            #title_bg_hover_color,
            #top_border_height_number,
            #title_border_top_color,
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
            #head_icon_width_number,
            #indicator_width_number, 
            #title_line_height_number, 
            #title_padding_top_number,
            #title_padding_right_number,
            #title_padding_bottom_number,
            #title_padding_left_number,
            #angle_width_number,
            #angle_from_left_number
        `).on('change', function() {
            //General
            var head_icon_font_size_number = parseInt(jQuery('#head_icon_font_size_number').val());
            var title_icon_color = jQuery('#title_icon_color').val();
            var icon_hover_color = jQuery('#icon_hover_color').val();
            var title_active_icon = jQuery('#title_active_icon').val();
            var title_inactive_icon = jQuery('#title_inactive_icon').val();
            var indicator_font_size_number = parseInt(jQuery('#indicator_font_size_number').val());
            var indicator_color = jQuery('#indicator_color').val();
            var indicator_hover_color = jQuery('#indicator_hover_color').val();
            var indicator_background_color = jQuery('#indicator_background_color').val();
            var indicator_background_hover_color = jQuery('#indicator_background_hover_color').val();

            //title section
            var title_font_size_number = parseInt(jQuery('#title_font_size_number').val());
            var title_font_weight = jQuery('#title_font_weight').val();
            var title_font_color = jQuery('#title_font_color').val();
            var title_text_hover_color = jQuery('#title_text_hover_color').val();
            var title_bg_color = jQuery('#title_bg_color').val();
            var title_bg_hover_color = jQuery('#title_bg_hover_color').val();
            var top_border_height_number = parseInt(jQuery('#top_border_height_number').val());
            var title_border_top_color = jQuery('#title_border_top_color').val();
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
            
            //New Fields
            var head_icon_width_number = parseInt(jQuery('#head_icon_width_number').val());
            var indicator_width_number = parseInt(jQuery('#indicator_width_number').val());
            var title_line_height_number = parseInt(jQuery('#title_line_height_number').val());
            var title_padding_top_number = parseInt(jQuery('#title_padding_top_number').val());
            var title_padding_right_number = parseInt(jQuery('#title_padding_right_number').val());
            var title_padding_bottom_number = parseInt(jQuery('#title_padding_bottom_number').val());
            var title_padding_left_number = parseInt(jQuery('#title_padding_left_number').val());
            var angle_width_number = parseInt(jQuery('#angle_width_number').val());
            var angle_from_left_number = parseInt(jQuery('#angle_from_left_number').val());

            let textAlign = 'right';
            if(title_text_align == 'flex-start') {
                textAlign = 'left';
            } else if(title_text_align == 'center') {
                textAlign = 'center';
            }

            calculateWidth();

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-label-head {             
               border-top: ${top_border_height_number}px solid ${title_border_top_color};              
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-head-title {
               font-family: ${title_font_family};
               text-transform: ${title_text_transform};
               font-size: ${title_font_size_number}px;
               line-height: ${title_line_height_number}px;
               font-weight: ${title_font_weight};
               color: ${title_font_color};
               justify-content: ${title_text_align};   
               text-align: ${textAlign};
               background-color: ${title_bg_color}; 
               padding: ${title_padding_top_number}px ${title_padding_right_number}px ${title_padding_bottom_number}px ${title_padding_left_number}px;           
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids;?>-head-title{
               color: ${title_text_hover_color};
               background-color: ${title_bg_hover_color};
         }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-left-icon {
               width: ${indicator_width_number}px;
               padding-right: `+ (Math.ceil(indicator_width_number/7)) +`px;
               font-size: ${indicator_font_size_number}px;               
               background-color: ${indicator_background_color};
               color: ${indicator_color};            
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids;?>-left-icon {
                background-color: ${indicator_background_hover_color};
                color: ${indicator_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-right-icon {
               width: ${head_icon_width_number}px;
               padding-left: `+ (Math.ceil(head_icon_width_number/7)) +`px;
               font-size: ${head_icon_font_size_number}px;              
               color: ${title_icon_color};
               background-color: ${title_bg_color};               
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids;?>-right-icon {
               background-color: ${title_bg_hover_color};
               color: ${icon_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after {
                background-color: ${title_bg_color};
                }</style>`).appendTo(".afaq-6310-preview");


            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after {       
                width: ${angle_width_number}px;   
                left: ${angle_from_left_number}px; 
                background-color: ${title_bg_color};  
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after {
            background-color:${title_bg_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");
                
            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-content {
                background-color: ${description_font_background_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-content:hover {
                background-color: ${description_background_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-content-feature {
               font-weight: ${description_font_weight};
               font-size: ${description_font_size_number}px;
               font-family: ${description_font_family};
               color: ${description_font_color};
               line-height: ${description_line_height_number}px;
               text-transform: ${description_text_transform};
               text-align: ${description_text_align};
               padding-left: ${description_padding_left_number}px;
               padding-right:${description_padding_right_number}px;
               padding-top: ${description_padding_top_number}px; 
               padding-bottom:${description_padding_bottom_number}px;
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-content:hover .afaq-6310-faq-template-<?php echo $ids;?>-content-feature{
                  color: ${description_text_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title{
                color: ${title_text_hover_color} !important; 
                background: ${title_bg_hover_color} !important; 
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-left-icon{
             background-color:${indicator_background_hover_color} !important;
             color: ${indicator_hover_color} !important;
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .  afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after{
            background-color:${title_bg_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids;?>-right-icon {
            background-color: ${title_bg_hover_color} !important;
            color: ${icon_hover_color} !important;
         }</style>`).appendTo(".afaq-6310-preview");            

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-active .afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after, 
                .afaq-6310-faq-template-<?php echo $ids;?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after {
                background-color: ${title_bg_hover_color};
            }</styles>`).appendTo(".afaq-6310-preview");
        });

        function calculateWidth(hidden) {
            var value = Number(jQuery("#title_line_height_number").val());
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
                jQuery("<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-right-icon{ display:flex;}</style>").appendTo(".afaq-6310-preview");
            } else {
                jQuery('.title-act-field').hide();
                jQuery("<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-right-icon { display:none;}</style>").appendTo(".afaq-6310-preview");
            }

            jQuery(`<style type='text/css'> 
                .afaq-6310-faq-template-<?php echo $ids; ?>-left-icon{ 
                    width: ${indicator_width_number}px; 
                } 
                .afaq-6310-faq-template-<?php echo $ids; ?>-head-title{ 
                    width: calc(100% - ${double}px);
                } 
                .afaq-6310-faq-template-<?php echo $ids; ?>-right-icon{ 
                    width: ${head_icon_width_number}px; 
                } 
            </style>`).appendTo(".afaq-6310-preview");
        }
    });
</script>
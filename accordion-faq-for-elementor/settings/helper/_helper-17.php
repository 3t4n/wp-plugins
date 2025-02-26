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
            #indicator_font_size_number,
            #indicator_color,
            #indicator_hover_color,
            #title_active_icon,
            #title_inactive_icon,
            #indicator_background_color,
            #indicator_background_hover_color,            
            #indicator_border_radius,
            #indicator_border_color,
            #indicator_border_hover_color,
            #title_font_size_number,
            #title_line_height_number,
            #title_font_weight,
            #title_font_color,
            #title_text_hover_color,
            #title_text_align,
            #title_text_transform,
            #title_font_family,
            #title_padding_left_number,
            #title_empty_space,
            #description_font_size_number,
            #description_line_height_number,
            #description_font_color,
            #description_text_hover_color,
            #description_font_family,
            #description_font_weight,
            #description_text_transform,
            #description_text_align,
            #description_padding_left_number,
            #description_padding_right_number,
            #description_padding_top_number,
            #description_padding_bottom_number,
            #description_border_width,
            #description_border_color,
            #description_border_hover_color,
            #indicator_width_number,
            #indicator_border_size_number,
            #title_padding_top_number,
            #title_padding_right_number,
            #title_padding_bottom_number,
            #title_padding_left_number
        `).on('change', function() {
            //General
            var head_icon_font_size_number = parseInt(jQuery('#head_icon_font_size_number').val());
            var title_icon_color = jQuery('#title_icon_color').val();
            var icon_hover_color = jQuery('#icon_hover_color').val();
            var indicator_font_size_number = parseInt(jQuery('#indicator_font_size_number').val());
            var indicator_color = jQuery('#indicator_color').val();
            var indicator_hover_color = jQuery('#indicator_hover_color').val();
            var title_active_icon = jQuery('#title_active_icon').val();
            var title_inactive_icon = jQuery('#title_inactive_icon').val();
            var indicator_background_color = jQuery('#indicator_background_color').val();
            var indicator_background_hover_color = jQuery('#indicator_background_hover_color').val();           
            var indicator_border_radius = parseInt(jQuery('#indicator_border_radius').val());
            var indicator_border_color = jQuery('#indicator_border_color').val();
            var indicator_border_hover_color = jQuery('#indicator_border_hover_color').val();
            var indicator_width_number = parseInt(jQuery('#indicator_width_number').val());
            var indicator_border_size_number = parseInt(jQuery('#indicator_border_size_number').val());

            //title section
            var title_font_size_number = parseInt(jQuery('#title_font_size_number').val());
            var title_line_height_number = parseInt(jQuery('#title_line_height_number').val());
            var title_font_weight = jQuery('#title_font_weight').val();
            var title_font_color = jQuery('#title_font_color').val();
            var title_text_hover_color = jQuery('#title_text_hover_color').val();
            var title_text_align = jQuery('#title_text_align').val();
            var title_text_transform = jQuery('#title_text_transform').val();
            var title_font_family = jQuery('#title_font_family').val().replace(/\+/g, ' ');
            var title_padding_left_number = parseInt(jQuery('#title_padding_left_number').val());
            var title_empty_space = parseInt(jQuery('#title_empty_space').val());

            //description section
            var description_font_size_number = parseInt(jQuery('#description_font_size_number').val());
            var description_line_height_number = parseInt(jQuery('#description_line_height_number').val());
            var description_font_color = jQuery('#description_font_color').val();
            var description_text_hover_color = jQuery('#description_text_hover_color').val();
            var description_font_family = jQuery('#description_font_family').val().replace(/\+/g, ' ');
            var description_font_weight = jQuery('#description_font_weight').val();
            var description_text_transform = jQuery('#description_text_transform').val();
            var description_text_align = jQuery('#description_text_align').val();
            var description_padding_left_number = parseInt(jQuery('#description_padding_left_number').val());
            var description_padding_right_number = parseInt(jQuery('#description_padding_right_number').val());
            var description_padding_top_number = parseInt(jQuery('#description_padding_top_number').val());
            var description_padding_bottom_number = parseInt(jQuery('#description_padding_bottom_number').val());
            var description_border_width = parseInt(jQuery('#description_border_width').val());
            var description_border_color = jQuery('#description_border_color').val();
            var description_border_hover_color = jQuery('#description_border_hover_color').val();

             //New Fields   
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


            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover 
               .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
               color: ${indicator_hover_color};
               background-color: ${indicator_background_hover_color};
               border-color: ${indicator_border_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:after{
                width: `+ Math.ceil(indicator_border_size_number) + `px;
                background: ${description_border_color};
                left: ` + Math.ceil((indicator_width_number / 2 ) - (indicator_border_size_number / 2)) + `px;
                }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
                width: ${indicator_width_number}px;
                height: ${indicator_width_number}px;
                line-height: ${indicator_width_number}px;
                font-size: ${indicator_font_size_number}px;
                border-radius: ${indicator_border_radius}%;
                border: ${indicator_border_size_number}px solid ${indicator_border_color};
                color: ${indicator_color};
                background-color: ${indicator_background_color};  
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
              color: ${title_text_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
                font-family: ${title_font_family};
                text-transform: ${title_text_transform};
                padding: ${title_padding_top_number}px ${title_padding_right_number}px ${title_padding_bottom_number}px ${title_padding_left_number}px;
                font-size: ${title_font_size_number}px;
                color: ${title_font_color};
                font-weight: ${title_font_weight};
                line-height: ${title_line_height_number}px;
                justify-content: ${title_text_align};
                 text-align: ${textAlign};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids; ?>-head-title >i{
              color: ${icon_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-title >i{
              color: ${title_icon_color};
              font-size: ${head_icon_font_size_number}px;
            }</style>`).appendTo(".afaq-6310-preview"); 

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content::after {
                background: ${description_border_color};
                left: ` + Math.ceil((indicator_width_number / 2 ) - (indicator_border_size_number / 2)) + `px;
                 width: ${indicator_border_size_number}px;
                }</style>`).appendTo(".afaq-6310-preview"); 

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
                font-size: ${description_font_size_number}px;
                color: ${description_font_color}; 
                font-family: ${description_font_family};
                font-weight: ${description_font_weight};
                text-transform: ${description_text_transform};
                text-align: ${description_text_align};
                width: calc(100% - ` + Math.ceil(indicator_width_number * 2) +` px); 
                margin: 0 ${indicator_width_number}px 10px;
                padding-left: ${description_padding_left_number}px;
                padding-right: ${description_padding_right_number}px;
                padding-top: ${description_padding_top_number}px; 
                padding-bottom: ${description_padding_bottom_number}px;
                line-height: ${description_line_height_number}px;
                }</style>`).appendTo(".afaq-6310-preview"); 

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature  {
               color: ${description_text_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");   

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids;?>-head-title{
               color: ${title_text_hover_color} !important; 
            }</style>`).appendTo(".afaq-6310-preview");  
                                                
            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title >i {
               color: ${icon_hover_color};
            }</style>`).appendTo(".afaq-6310-preview");

            jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
               color: ${indicator_hover_color};
               background-color: ${indicator_background_hover_color};
               border-color: ${indicator_border_hover_color};
            }</style>`).appendTo(".afaq-6310-preview"); 

        });
        function calculateWidth() {    
            if(jQuery('#content_limit_show_hide').prop('checked')== true){
                jQuery('.description_scroll').show(); 
            }else{
                jQuery('.description_scroll').hide();              
            }
        }
    });
</script>
<script type="text/javascript">

     jQuery(document).ready(function() {
         jQuery(window).load(function(){
            calculateWidth();
            jQuery('#icon_show_hide,#content_limit_show_hide').on('click', function() {
                calculateWidth();
            });
            //General Setting
            jQuery(`
                #head_icon_font_size_number, 
                #title_icon_color,
                #icon_hover_color,
                #icon_background_color,
                #icon_background_hover_color,
                #head_number_size,
                #number_color,
                #number_hover_color,
                #number_background_color,
                #body_background_hover_color,
                #title_active_icon,
                #title_inactive_icon,
                #indicator_font_size_number,
                #indicator_color,
                #indicator_hover_color,
                #indicator_background_color,
                #indicator_background_hover_color,
                #title_font_size_number,
                #title_line_height_number,
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
                #title_border_size,
                #title_border_color,
                #title_border_hover_color,
                #title_empty_space,
                #description_font_size_number,
                #description_line_height_number,
                #description_font_color,
                #description_text_hover_color,
                #description_font_background_color,
                #description_background_hover_color,
                #description_font_family,
                #description_font_weight,
                #description_margin_bottom,
                #description_text_transform,
                #description_text_align,
                #description_padding_left_number,
                #description_padding_right_number,
                #description_padding_top_number,
                #description_padding_bottom_number,
                #description_border_height,
                #description_border_color,
                #description_border_hover_color,
                #head_icon_width_number,
                #indicator_width_number,
                #title_line_height_number,
                #title_padding_top_number,
                #title_padding_right_number,
                #title_padding_bottom_number,
                #title_padding_left_number,
                #angle_width_number,
                #arrow_sign_top_color

            `).on('change', function() {
                //General
                var head_icon_font_size_number = parseInt(jQuery('#head_icon_font_size_number').val());
                var title_icon_color = jQuery('#title_icon_color').val();
                var icon_hover_color = jQuery('#icon_hover_color').val();
                var head_number_size = parseInt(jQuery('#head_number_size').val());
                var number_color = jQuery('#number_color').val();
                var number_hover_color = jQuery('#number_hover_color').val();
                var number_background_color = jQuery('#number_background_color').val();
                var body_background_hover_color = jQuery('#body_background_hover_color').val();
                var title_active_icon = jQuery('#title_active_icon').val();
                var title_inactive_icon = jQuery('#title_inactive_icon').val();
                var indicator_font_size_number = parseInt(jQuery('#indicator_font_size_number').val());
                var indicator_color = jQuery('#indicator_color').val();
                var indicator_hover_color = jQuery('#indicator_hover_color').val();
                var angle_width_number = parseInt(jQuery('#angle_width_number').val());
                var arrow_sign_top_color = jQuery('#arrow_sign_top_color').val();

                //title section
                var title_font_size_number = parseInt(jQuery('#title_font_size_number').val());
                var title_line_height_number = parseInt(jQuery('#title_line_height_number').val());
                var title_font_weight = jQuery('#title_font_weight').val();
                var title_font_color = jQuery('#title_font_color').val();
                var title_text_hover_color = jQuery('#title_text_hover_color').val();
                var title_bg_color = jQuery('#title_bg_color').val();
                var title_bg_hover_color =  jQuery('#title_bg_hover_color').val();
                var description_margin_bottom = parseInt(jQuery('#description_margin_bottom').val());
                var title_text_align = jQuery('#title_text_align').val();
                var title_text_transform = jQuery('#title_text_transform').val();
                var title_font_family = jQuery('#title_font_family').val().replace(/\+/g, ' ');
                var title_padding_left_number = parseInt(jQuery('#title_padding_left_number').val());
                var title_border_size = parseInt(jQuery('#title_border_size').val());
                var title_border_color = jQuery('#title_border_color').val();
                var title_border_hover_color = jQuery('#title_border_hover_color').val();

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

                let textAlign = 'right';
                if(title_text_align == 'flex-start') {
                    textAlign = 'left';
                } else if(title_text_align == 'center') {
                    textAlign = 'center';
                }
                calculateWidth();

                jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-left-section {
                width: ${angle_width_number}px;
                }</style>`).appendTo(".afaq-6310-preview");  

                jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-right-section {
                float: left;
                width: calc(100% - ${angle_width_number}px);
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-label-head {   
                border: ${title_border_size}px solid ${title_border_color}; 
                margin-bottom: ${description_margin_bottom}px;                
                background-color: ${title_bg_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-right-section .afaq-6310-faq-template-<?php echo $ids; ?>-label-head{
                background-color: ${title_bg_hover_color};
                border: ${title_border_size}px solid ${title_border_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");
                
               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
                width: ${indicator_width_number}px;  
                font-size: ${indicator_font_size_number}px;
                color: ${indicator_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-label-head .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
                color: ${indicator_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon {
                width: ${head_icon_width_number}px; 
                font-size: ${head_icon_font_size_number}px;
                color: ${title_icon_color};
                }</style>`).appendTo(".afaq-6310-preview");
               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-label-head .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
                color: ${icon_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

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
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-label-head .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
                color: ${title_text_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");
               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow {
                height:  `+ Math.ceil(title_line_height_number + 3) + `px; 
                line-height: ` + (Math.ceil(title_line_height_number * .3 + 2) + Math.ceil(title_line_height_number + 3)) + `px;
                background: ${number_background_color};
                font-size: ${head_number_size}px;
                color: ${number_color};              
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>:hover .afaq-6310-faq-template-<?php echo $ids; ?>-left-section .afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow  {  
                color: ${number_hover_color}; 
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow-before {               
                border-top:  15px solid  ${arrow_sign_top_color};
                border-left:  ` + Math.ceil(angle_width_number / 2) + `px solid transparent;
                border-right: ` + Math.ceil(angle_width_number / 2) + `px solid transparent;               
                }</style>`).appendTo(".afaq-6310-preview");
               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-head-arrow-after {
                border-top: 15px solid ${arrow_sign_top_color};
                border-left: ` + Math.ceil(angle_width_number / 2) + `px solid transparent;
                border-right: ` + Math.ceil(angle_width_number / 2) + `px solid transparent;
                border-top-color: ${number_background_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content {
                background: ${description_font_background_color};
                margin-bottom: ${description_margin_bottom}px;
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content:hover{
                background: ${description_background_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");
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
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-content .afaq-6310-faq-template-<?php echo $ids; ?>-content-feature {
                color: ${description_font_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active{
                background-color: ${title_bg_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-label-head{ 
                border: ${title_border_size}px solid ${title_border_hover_color};  
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-title {
                color: ${title_text_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-left-icon{
                color: ${icon_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-active .afaq-6310-faq-template-<?php echo $ids; ?>-head-right-icon {
                color: ${indicator_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");

               jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids;?>-active .afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after, 
                .afaq-6310-faq-template-<?php echo $ids;?>-label-head:hover .afaq-6310-faq-template-<?php echo $ids;?>-left-icon::after {
                background-color: ${title_bg_hover_color};
                }</style>`).appendTo(".afaq-6310-preview");
               jQuery(`<style type='text/css'></style>`).appendTo(".afaq-6310-preview");
               jQuery(`<style type='text/css'></style>`).appendTo(".afaq-6310-preview");

                
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
                dynamicCSS();
            }
        });    
    });

    function dynamicCSS() {
        let borderList = jQuery('.afaq-6310-template-15');
        borderList.each(function(){
            let id = jQuery(this).attr('data-database-id');
            let headList = jQuery(this).find(`.afaq-6310-faq-template-${id}-head-right-icon`);
            headList.each(function(){
                let border = Number(jQuery('#title_border_size').val()) * 2;
                let height = Number(jQuery(this).height()) + border;
                let lineHeight = height + 15;
                jQuery(this).closest(`.afaq-6310-faq-template-${id}-right-section`).siblings(`.afaq-6310-faq-template-${id}-left-section`).find(`.afaq-6310-faq-template-${id}-head-arrow`).css({
                    'height': `${height}px`, 
                    'line-height': `${lineHeight}px`
                });
            });
        });
    }
</script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery(`
            #button_font_color,
            #button_font_hover_color,
            #button_background_color,
            #button_background_hover_color,
            #button_font_size_number,
            #button_font_weight,
            #button_width_number,
            #button_height_number,
            #button_font_family,
            #button_text_transform,
            #button_align,
            #button_border_width,
            #button_border_color,
            #button_border_hover_color,
            #button_border_radius_number,
            #button_margin_top_number,
            #button_margin_bottom_number
        `).on('change', function() {
      //Button
      var button_font_color = jQuery('#button_font_color').val();
      var button_font_hover_color = jQuery('#button_font_hover_color').val();
      var button_background_color = jQuery('#button_background_color').val();
      var button_background_hover_color = jQuery('#button_background_hover_color').val();
      var button_font_size_number = parseInt(jQuery('#button_font_size_number').val());
      var button_font_weight = jQuery('#button_font_weight').val();
      var button_width_number = parseInt(jQuery('#button_width_number').val());
      var button_height_number = parseInt(jQuery('#button_height_number').val());
      var button_font_family = jQuery('#button_font_family').val().replace(/\+/g, ' ');
      var button_text_transform = jQuery('#button_text_transform').val();
      var button_align = jQuery('#button_align').val();
      var button_border_width = jQuery('#button_border_width').val();
      var button_border_color = jQuery('#button_border_color').val();
      var button_border_hover_color = jQuery('#button_border_hover_color').val();
      var button_border_radius_number = parseInt(jQuery('#button_border_radius_number').val());
      var button_margin_top_number = parseInt(jQuery('#button_margin_top_number').val());
      var button_margin_bottom_number = parseInt(jQuery('#button_margin_bottom_number').val());

      jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-read-more-button{
          text-align:  ${button_align};
          margin-top: ${button_margin_top_number}px;
          margin-bottom: ${button_margin_bottom_number}px;
      }</style>`).appendTo(".afaq-6310-preview");
      
      jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-read-more-button>a{
          font-family: ${button_font_family};
          font-size: ${button_font_size_number}px;
          font-weight: ${button_font_weight};
          color: ${button_font_color};
          background-color: ${button_background_color};
          border-radius: ${button_border_radius_number}px; 
          text-transform: ${button_text_transform};
          height: ${button_height_number}px;
          line-height: ${button_height_number}px;
          width: ${button_width_number}px; 
          border: ${button_border_width} solid ${button_border_color};
      }</style>`).appendTo(".afaq-6310-preview");

      jQuery(`<style type='text/css'>.afaq-6310-faq-template-<?php echo $ids; ?>-read-more-button>a:hover{
          background-color: ${button_background_hover_color};
          color: ${button_font_hover_color};
          border: ${button_border_width} solid ${button_border_hover_color};
      }</style>`).appendTo(".afaq-6310-preview");   

    });
  });
</script>
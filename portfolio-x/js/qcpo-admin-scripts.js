jQuery(document).ready(function ($) {
	        
    var sbdstoredNoticeId = localStorage.getItem('qcld_portfolio_Notice_set');
    var qcld_portfolio_Notice_time_set = localStorage.getItem('qcld_portfolio_Notice_time_set');

    var notice_current_time = Math.round(new Date().getTime() / 1000);

    if ('portfolio-msg' == sbdstoredNoticeId && qcld_portfolio_Notice_time_set > notice_current_time  ) {
        $('#message-portfolio').css({'display': 'none'});
    }

    $(document).on('click', '#message-portfolio .notice-dismiss', function(e){

        var currentDom = $(this);
        var currentWrap = currentDom.closest('.notice');
        currentWrap.css({'display': 'none'});
        localStorage.setItem('qcld_portfolio_Notice_set', 'portfolio-msg');
        var ts = Math.round(new Date().getTime() / 1000);
        var tsYesterday = ts + (24 * 3600);
        localStorage.setItem('qcld_portfolio_Notice_time_set', tsYesterday);
        console.log(tsYesterday)

    });


    jQuery('.projectDate').datepicker({dateFormat: 'yy-mm-dd'});
    //Single detial page width settings
    if(jQuery('#qcpx_details_page_width').val()=='single_full'){
        jQuery("#setting_qcpx_details_page_width_val").css({'display':'none'});
    }
    jQuery('#qcpx_details_page_width').change(function() {
        if (this.value == 'single_box') {
            jQuery("#setting_qcpx_details_page_width_val").css({'display':'block'});
        }
        else{
            jQuery("#setting_qcpx_details_page_width_val").css({'display':'none'});
        }
    });
    //Filttered listing page width settings
    if(jQuery('input[type=radio][name="qcpx_plugin_options[qcld_template_links]"]:checked').val()=='off'){
        jQuery("#setting_qcpx_list_page_width").css({'display':'none'});
        jQuery("#setting_qcpx_list_page_width_val").css({'display':'none'});
    } else if(jQuery('input[type=radio][name="qcpx_plugin_options[qcld_template_links]"]:checked').val()=='on'){
        if (this.value == 'list_full') {
            jQuery("#setting_qcpx_list_page_width_val").css({'display':'none'});
        }
    }

    jQuery('input[type=radio][name="qcpx_plugin_options[qcld_template_links]"]').change(function() {
        if (this.value == 'on' ) {
            jQuery("#setting_qcpx_list_page_width").css({'display':'block'});
        }
        else if (this.value == 'off' ){
            jQuery("#setting_qcpx_list_page_width").css({'display':'none'});
            jQuery("#setting_qcpx_list_page_width_val").css({'display':'none'});
        }
    });
    jQuery('#qcpx_list_page_width').change(function() {
        if (this.value == 'list_box') {
            jQuery("#setting_qcpx_list_page_width_val").css({'display':'block'});
        }
        else{
            jQuery("#setting_qcpx_list_page_width_val").css({'display':'none'});
        }
    });

});
jQuery(document).ready(function($){
	$('#px_shortcode_generator_meta').on('click', function(e){
		 $('#px_shortcode_generator_meta').prop('disabled', true);
		$.post(
			ajaxurl,
			{
				action : 'show_qcpx_shortcode_cmn'
				
			},
			function(data){
				 $('#px_shortcode_generator_meta').prop('disabled', false);
				$('#wpwrap').append(data);
			}
		)
	})
	
	
	    var selector = '';

	$(document).on( 'click', '.px_copy_close', function(){
        $(this).parent().parent().parent().parent().parent().remove();
    })
	
    $(document).on( 'click', '.modal-content .close', function(){
        $(this).parent().parent().remove();
    }).on( 'click', '#qcpx_add_shortcode_cmn',function(){
	
      var mode = $('#qcpx_mode').val();
      var orderby = $('#qcpx_orderby').val();
      var order = $('#qcpx_order').val();
      var portfolioId = $('#qcpx_portfolio_id').val();
      var portfolioTpl = $('#qcpx_portfolio_tpl').val();
      var showcaseStyle = $('#qcpx_showcase_style').val();
	  var limit = $('#qcpx_limit').val();

	  if( mode !== '' && mode == 'portfolio' ){
	  
	  	  var shortcodedata = '[portfolio-x';
		  		  
		  if( mode !== '' ){
			  shortcodedata +=' mode="'+mode+'"';
		  }
		  
		  if( portfolioId != "" ){
			  shortcodedata +=' portfolio="'+portfolioId+'"';
		  }
		  
		  if( portfolioTpl !== '' ){
			  shortcodedata +=' theme_style="'+portfolioTpl+'"';
		  }
		  
		  if( orderby !== '' ){
			  shortcodedata +=' orderby="'+orderby+'"';
		  }
		  
		  if( order !== '' ){
			  shortcodedata +=' order="'+order+'"';
		  }
		  
		  if( limit !== '' ){
			  shortcodedata +=' limit="'+limit+'"';
		  }
		  
		  shortcodedata += ']';
		  
		  //tinyMCE.activeEditor.selection.setContent(shortcodedata);
		  
		  //$('#sm-modal').remove();
		  $('.sm_shortcode_list').hide();
			$('.px_shortcode_container').show();
			$('#px_shortcode_container').val(shortcodedata);
			$('#px_shortcode_container').select();
			document.execCommand('copy');
		
	  }
	  else if( mode !== '' && mode == 'showcase' )
	  {
		var shortcodedata = '[portfolio-x-showcase';
		  		  
		  if( mode !== '' ){
			  shortcodedata +=' mode="'+mode+'"';
		  }
		  
		  if( showcaseStyle !== '' ){
			  shortcodedata +=' template="'+showcaseStyle+'"';
		  }
		  
		  if( orderby !== '' ){
			  shortcodedata +=' orderby="'+orderby+'"';
		  }
		  
		  if( order !== '' ){
			  shortcodedata +=' order="'+order+'"';
		  }
		  
		  if( limit !== '' ){
			  shortcodedata +=' limit="'+limit+'"';
		  }
		  
		  shortcodedata += ']';
		  
		  //tinyMCE.activeEditor.selection.setContent(shortcodedata);
		  
		  //$('#sm-modal').remove();
			$('.sm_shortcode_list').hide();
			$('.px_shortcode_container').show();
			$('#px_shortcode_container').val(shortcodedata);
			$('#px_shortcode_container').select();
			document.execCommand('copy');
	  }
	  else
	  {
	  	alert("Please select a valid mode.");
	  }


    }).on( 'change', '#qcpx_mode',function(){
	
		var mode = $('#qcpx_mode').val();
		
		if( mode == 'portfolio' )
		{
			$('#field_showcase_tpls').hide();
			$('#field_portfolio').show();
			$('#field_portfolio_tpls').show();
		}
		else if( mode == 'showcase' )
		{
			$('#field_portfolio').hide();
			$('#field_portfolio_tpls').hide();
			$('#field_showcase_tpls').show();
		}
		else{
			$('#field_portfolio').hide();
			$('#field_portfolio_tpls').hide();
			$('#field_showcase_tpls').hide();
		}
		
	});
	
})
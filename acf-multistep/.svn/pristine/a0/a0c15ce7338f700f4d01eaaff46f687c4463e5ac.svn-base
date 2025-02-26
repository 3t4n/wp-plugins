(function($){

	function equalHeight() {
	    var content = $('.ps-step__content'),
	        tab = $('.ps-step__tab.active');
	    //console.log(tab.innerHeight());
	    content.css({
	       "min-height": tab.innerHeight()+ 50
	    });

	}

	function initialize_field( $el ) {
		
		//$el.doStuff();
		add_tab($el);
		
	}

	function add_group( $wrap ){
		
		// vars
		var html = '';
		
		
		// generate html
		if( $wrap.is('tbody') )
		{
			html = '<tr class="acf-tab-wrap"><td colspan="2"><ul class="hl clearfix acf-tab-group"></ul></td></tr>';
		}
		else
		{		

			html = '<div class="page-wrap"><section class="ps-section ps-section--gray">'+
	        		'<div class="">'+
	                '<div class="ps-step ps-step--style3">'+
	                  '<div class="ps-step__header">'+
	                    '<ul class="hl clearfix ps-step__process"></ul>'+
	                   '</div>'+
	                   '<div class="ps-step__content">'+
	                   '</div>'+
	                  '</div></div></div></section>';
		}

		// append html
		$wrap.children('.field_type-multi_steps:first').before( html );

		var group_id = $wrap.children('.page-wrap').closest('.postbox').attr('id');
		$wrap.children('.page-wrap').nextAll().addClass('in_step__tab form-group');

		var is_frontend = '';
		if ( typeof group_id == 'undefined' ) {
			group_id = $wrap.children('.page-wrap').closest('.acf-form').attr('id');
			is_frontend = 'yes';
		}

		var tabs_html = '',
		 	data_step = 0,
		 	num_steps = $('#'+ group_id +' .acf-step').length;
		 	//console.log(cur_step);

		$('#' + group_id + ' .in_step__tab').each( function() {
			
			if ($(this).hasClass('field')) {
				
				if ($(this).attr('data-field_type') == 'multi_steps') {

					++data_step;

					var active = '';
					if (data_step == 1) active = 'active';

					tabs_html = '<div class="ps-step__tab '+ active +'" data-step="'+data_step+'" data-mh="tab"></div>';

					$('#' + group_id + ' .ps-step__content').append(tabs_html);

					// add button to current step
					if ( num_steps > 1 ) {

						if ( data_step == 1 ) { // first step

							var html = '<div class="form-group">' +
										'<button class="ps-btn ps-step__next ps-btn--success" data-target="'+ (data_step+1) +'">Next</button>' +
										'</div>';
															                     
	                        $('#' + group_id + ' .ps-step__tab[data-step='+ data_step +']').append(html);
	                    }

	                    else if ( (1 < data_step) && (data_step < num_steps) ) { // middle step
							
							var html = '<div class="form-group">'+
										'<button class="ps-btn ps-step__prev" data-target="'+(data_step-1)+'">Prev</button>'+
										'<button class="ps-btn ps-step__next ps-btn--success" data-target="'+ (data_step+1) +'">Next</button></div>';
								                      
							$('#' + group_id + ' .ps-step__tab[data-step='+ data_step +']').append(html);		                    	
	                    }

                        else if ( data_step == num_steps ) { // last step
						
							var _html = '';
                        	if ( is_frontend == 'yes' ) {

                        		$('ul.ps-step__process').css('list-style', 'none');
								$('.acf-form-submit').css('display', 'none');
								var	_html = '<button id="fb-submit" class="ps-btn ps-btn ps-btn--warning" data-target="'+(data_step-1)+'">Submit</button>';
							}	

							var html = '<div class="form-group">' +
										'<button class="ps-btn ps-step__prev" data-target="'+(data_step-1)+'">Prev</button>' + _html +
										'</div>';
								                      
							$('#' + group_id + ' .ps-step__tab[data-step='+ data_step +']').append(html);	                    	
	                    } 						
                    }

				} else {

					var id = this.id;

					// append current field to step
					$('#' + group_id + ' .ps-step__tab[data-step='+ data_step +']').prepend($('#' + id));

				}
			}
		});
		equalHeight();
	}

	function add_tab( $tab ){
		
		// vars
		var $field	= $tab.closest('.field'),
			$wrap	= $field.parent(),
			
			key		= $field.attr('data-field_key'),
			label 	= $tab.text();
			
			//console.log($wrap);
		// create tab group if it doesnt exist
		if( ! $wrap.children('.page-wrap').exists() )
		{
			add_group( $wrap );
		}
		
		var data_target = 0;

		var cur_data_target = $wrap.children('.page-wrap').find('.ps-step__process li:last').attr('data-target');

		if ( cur_data_target > 0 ) data_target = cur_data_target;

		// add tab
		$wrap.children('.page-wrap').find('.ps-step__process').append('<li class="active" data-target="'+ ++data_target +'"><span class="ps-step__number" data-key="' + key + '"><i>0' + data_target + '</i></span><span class="ps-step__title">' + label + '</span></li>');
		
	}

	function toggle( $a ){		
		//console.log( 'toggle %o ', $a);
		// vars
		var $wrap	= $a.closest('.page-wrap').parent(),
			key		= $a.attr('data-key');
		
		
		// classes
		$a.parent('li').addClass('active').siblings('li').removeClass('active');
		
		
		// hide / show
		$('.field_type-multi_steps').each(function(){
		
			
			// vars
			var $tab = $(this);
				
			
			if( $tab.attr('data-field_key') == key  )
			{
				show_multi_steps_fields( $(this) );
			}
			else
			{
				hide_multi_steps_fields( $(this) );
			}
			
		});

		//$('.ps-step__tab').addClass('active');
		
	}
	
	function show_multi_steps_fields( $field ) {
		
		//console.log('show tab fields %o', $field);
		$field.nextUntil('.field_type-multi_steps').each(function(){
			
			$(this).removeClass('acf-multi_steps_group-hide').addClass('acf-multi_steps_group-show');
			$(document).trigger('acf/fields/tab/show', [ $(this) ]);
			
		});
	}
	
	function hide_multi_steps_fields( $field ) {
		
		$field.nextUntil('.field_type-multi_steps').each(function(){
			
			$(this).removeClass('acf-multi_steps_group-show').addClass('acf-multi_steps_group-hide');
			$(document).trigger('acf/fields/tab/hide', [ $(this) ]);
			
		});
	}
	
	function refresh( $el ){
				
		// trigger
		$el.find('.ps-step__process').each(function(){
			
			$(this).find('.ps-step__number:first').each(function(){
				
				toggle( $(this) );
				
			});
			
		});

	}
	
	
	if( typeof acf.add_action !== 'undefined' ) {
	
		/*
		*  ready append (ACF5)
		*
		*  These are 2 events which are fired during the page load
		*  ready = on page load similar to $(document).ready()
		*  append = on new DOM elements appended via repeater field
		*
		*  @type	event
		*  @date	20/07/13
		*
		*  @param	$el (jQuery selection) the jQuery element which contains the ACF fields
		*  @return	n/a
		*/
		
		acf.add_action('ready append', function( $el ){

			// search $el for fields of type 'FIELD_NAME'
			acf.get_fields({ type : 'multi_steps'}, $el).each(function(){
				
				initialize_field( $(this) );
				
			});
			
		});
		
		
	} else {
		
		
		/*
		*  acf/setup_fields (ACF4)
		*
		*  This event is triggered when ACF adds any new elements to the DOM. 
		*
		*  @type	function
		*  @since	1.0.0
		*  @date	01/01/12
		*
		*  @param	event		e: an event object. This can be ignored
		*  @param	Element		postbox: An element which contains the new HTML
		*
		*  @return	n/a
		*/
		
		$(document).on('acf/setup_fields', function(e, postbox){
			
			$(postbox).find('.acf-step').each(function(){
				
				initialize_field( $(this) );

			});

			// activate first tab
			refresh( $(postbox) );

			// detect how many step for each group
			$('.page-wrap').each(function() {

				var group_id = $(this).closest('.postbox').attr('id');

				if ( typeof group_id == 'undefined' )
					group_id = $(this).closest('.acf-form').attr('id');

				var num_steps = $('#' +group_id+' .acf-step').length;
				var width = (100 / num_steps) + '%';

				$('#'+group_id+' .ps-step__process li').css({'width':width});
			});
		
		});
	
	}

	$(document).on('click', '.ps-step__number', function( e ){
		
		e.preventDefault();
		
		toggle( $(this) );
		
		$(this).trigger('blur');
		
	});

	$(document).on('acf/conditional_logic/hide', function( e, $target, item ){
		
		// validate
		if( $target.attr('data-field_type') != 'multi_steps' )
		{
			return;
		}
		
		//console.log('conditional_logic/hide tab %o', $target);
		
		
		// vars
		var $tab = $target.siblings('.page-wrap').find('a[data-key="' + $target.attr('data-field_key') + '"]');
		
		
		// if tab is already hidden, then ignore the following functiolnality
		if( $tab.is(':hidden') )
		{
			return;
		}
		
		
		// visibility
		$tab.parent().hide();
		
		
		// if 
		if( $tab.parent().siblings(':visible').exists() )
		{
			// if the $target to be hidden is a tab button, lets toggle a sibling tab button
			$tab.parent().siblings(':visible').first().children('a').trigger('click');
		}
		else
		{
			// no onther tabs
			hide_multi_steps_fields( $target );
		}
		
	});
	
	
	$(document).on('acf/conditional_logic/show', function( e, $target, item ){
		
		// validate
		if( $target.attr('data-field_type') != 'multi_steps' )
		{
			return;
		}
		
		
		//console.log('conditional_logic/show tab %o', $target);
		
		
		// vars
		var $tab = $target.siblings('.page-wrap').find('a[data-key="' + $target.attr('data-field_key') + '"]');
		
		
		// if tab is already visible, then ignore the following functiolnality
		if( $tab.is(':visible') )
		{
			return;
		}
		
		
		// visibility
		$tab.parent().show();
		
		
		// if this is the active tab
		if( $tab.parent().hasClass('active') )
		{
			$tab.trigger('click');
			return;
		}
		
		
		// if the sibling active tab is actually hidden by conditional logic, take ownership of tabs
		if( $tab.parent().siblings('.active').is(':hidden') )
		{
			// show this tab group
			$tab.trigger('click');
			return;
		}
		

	});

    $(document).on('click', '.ps-step .ps-step__next', function (event) {

    	var step = $('.ps-step'),
        next = step.find('.ps-step__next');

        event.preventDefault();
        var target = $(this).data('target'),
            process = $(this).closest('.ps-step').find('.ps-step__process > li');
        currentTab = $(this).closest('.ps-step__tab');
        process.each(function (index) {
            if ($(this).data('target') == target) {
                $(this).addClass('active');
            }
        });
        currentTab.removeClass('active').addClass('seen').next('.ps-step__tab').addClass('active');
        equalHeight();
    });

    $(document).on('click',  '.ps-step .ps-step__prev', function (event) {

    	var step = $('.ps-step'),
        prev = step.find('.ps-step__prev');

        event.preventDefault();
        var target = $(this).data('target'),
            currentTab = $(this).closest('.ps-step__tab'),
            process = $(this).closest('.ps-step').find('.ps-step__process > li');
        process.each(function (index) {
            if ($(this).data('target') == (target + 1)) {
                $(this).removeClass('active');
            }
            else {
                //console.log(false);
            }
        });
        currentTab.removeClass('active').prev('.ps-step__tab').addClass('active').removeClass('seen');
        equalHeight();

    });
	

	$(document).ready(function () {
	    //step();
	    //equalHeight();
	});

})(jQuery);

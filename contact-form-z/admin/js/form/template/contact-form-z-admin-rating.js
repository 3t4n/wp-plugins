(function($){

  'use strict';

  $(function(){


// Change Rating Type
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_rating_type', function(){

	  createRatingPreview($(this).closest('.zcf_block'));

	});

// Change activity checked FOR Rating
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_list_rating_check', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	  zcf_attr = $(this).closest('tr').find('.zcf_list_title').attr('data-num-value');

	  if($(this).prop('checked')){
		zcf_num = true;
	  }else{
		zcf_num = false;
	  }

	  $('.zcf_container_block_' + zcf_add_block_type + '_' + zcf_rank).prop('checked', false);
	  zcf_closest_block.find('.zcf_list_rating_check').not($(this)).next().val('false');
	  $(this).next().val(zcf_num);

	  createRatingPreview(zcf_closest_block);

	});

// Change Reverse Selection
//----------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------
	$("#zcf_template").on('change', '.zcf_rating_reverse', function(){

	  zcf_closest_block = $(this).closest('.zcf_block');
	  zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	  zcf_rank = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();

	  if($(this).prop('checked')){
		zcf_num = true;
	  }else{
		zcf_num = false;
	  }

	  $(this).next().val(zcf_num);

	  createRatingPreview(zcf_closest_block);

	});


  });

// Create Rating Preview
//----------------------------------------------------------------------------------------------------------------

  createRatingPreview = function(zcf_closest_block){

	zcf_add_block_type = zcf_closest_block.find('[name="field[]"]').val();
	zcf_num = zcf_closest_block.find('.zcf_' + zcf_add_block_type + '_rank').val();
	var zcf_rating_type = zcf_closest_block.find('.zcf_rating_type').val();

	var zcf_rating_param = {
	  theme: zcf_rating_type,
	  allowEmpty: true,
	  deselectable: true,
	  reverse: (zcf_closest_block.find('.zcf_rating_reverse').prop('checked') ? true : false)
	};

	$('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).barrating('destroy').empty();

	switch(zcf_rating_type){
	  case 'stars':

		zcf_rating_param['showSelectedRating'] = false;

		break;
	  case 'vertical':
	  case 'movie':


		break;
	  case 'square':
	  case 'pill':

		zcf_rating_param['showValues'] = true;
		zcf_rating_param['showSelectedRating'] = false;

		break;
	  case 'reversed':

		zcf_rating_param['showSelectedRating'] = true;

		break;
	  case 'horizontal':

		break;
	}

	if(zcf_closest_block.find('.zcf_list_rating_check:checked').length > 0){
	  zcf_rating_param['initialRating'] = zcf_closest_block.find('.zcf_list_rating_check:checked').closest('tr').find('.zcf_list_title').attr('data-num-value');
	}

	$('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).append($('<option/>', {value: '', text: ''}));

	zcf_closest_block.find('.zcf_body_row tr').each(function(index, element){
	  $('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).append($('<option/>', {value: $(element).find('.zcf_list_title').attr('data-num-value'), text: $(element).find('.zcf_list_title').val()}));
	});

	$('.zcf_container_field_' + zcf_add_block_type + '_' + zcf_num).barrating('show', zcf_rating_param);
	
	styleColorRating(zcf_closest_block, hexToRGB(zcf_closest_block.find('.zcf_rating_color_points').val()));
  };

// Set Color Rating Param
//----------------------------------------------------------------------------------------------------------------

  setColorRatingParam = function(zcf_closest_block){

	zcf_closest_block.find('.zcf_rating_color_points').wpColorPicker({
	  defaultColor: zcf_def_color,
	  hide: true,
	  palettes: false,
	  change: function(event, ui){

		styleColorRating($(this).closest('.zcf_block'), hexToRGB(ui.color.toString()));

	  },
	  clear: function(){

		styleColorRating($(this).closest('.zcf_block'), {'r': 62, 'g': 151, 'b': 235});

	  }
	});
  };

})(jQuery);


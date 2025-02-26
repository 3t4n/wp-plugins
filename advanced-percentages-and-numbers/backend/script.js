jQuery(document).ready(function(){

	//PERCENTAGE OR NUMBER
	jQuery('.percentage-buttons #percentage-option').on('click', function(){
	jQuery('form#number').removeClass('active');
	jQuery('form#percentage').addClass('active');
	});
	
	jQuery('.percentage-buttons #number-option').on('click', function(){
	jQuery('form#percentage').removeClass('active');
	jQuery('form#number').addClass('active');
	});

	
	//COLOR PICKER
	jQuery('.percentage-color-picker').wpColorPicker();
	
	
       jQuery('body').on('click','.percentage-button', function() {
		   
		   jQuery('.percentage-background').addClass('active');
		   jQuery('body').css({'overflow': 'hidden'})
        
	   });
	
		 jQuery('body').on('click','.percentage-close-button', function() {
			jQuery('.percentage-background').removeClass('active');
			jQuery('body').css({'overflow': 'scroll'})
			 
		 });
	
	
	//FORM SUBMIT
	jQuery('.add-percentage-form#percentage').on('submit', function(e){
		e.preventDefault();
		
		var percentage = jQuery(this).find('select[name="percentage"]').val();
		var color = jQuery(this).find('input[name="color"]').val();
		var width = jQuery(this).find('select[name="width"]').val();
		var line_width = jQuery(this).find('select[name="line_width"]').val();
		var speed = jQuery(this).find('input[name="speed"]').val();
		var delay = jQuery(this).find('input[name="delay"]').val();
		
		if(jQuery(this).find('input[name="outline_path"]').attr('checked') == 'checked'){
			var outline_path = true;
		}else{
			var outline_path = false;
		}
		
		tinyMCE.activeEditor.insertContent('[toast_percentage percentage="'+percentage+'" color="'+color+'" width="'+width+'" outline_path="'+outline_path+'" line_width="'+line_width+'" speed="'+speed+'" delay="'+delay+'"]');
		
		
		
		jQuery('.percentage-background').removeClass('active');
		jQuery('body').css({'overflow': 'scroll'})
		
	})
	
	jQuery('.add-percentage-form#number').on('submit', function(e){
		e.preventDefault();
		
		var number = jQuery('input[name="number"]').val();
		var color = jQuery(this).find('input[name="color"]').val();
		var speed = jQuery(this).find('input[name="speed"]').val();
		var delay = jQuery(this).find('input[name="delay"]').val();
		
		if(jQuery(this).find('input[name="outline_path"]').attr('checked') == 'checked'){
			var outline_path = true;
		}else{
			var outline_path = false;
		}
		
		tinyMCE.activeEditor.insertContent('[toast_counter number="'+number+'" color="'+color+'" speed="'+speed+'" delay="'+delay+'"]');
		
		
		
		jQuery('.percentage-background').removeClass('active');
		jQuery('body').css({'overflow': 'scroll'})
		
	})
	
	
    });
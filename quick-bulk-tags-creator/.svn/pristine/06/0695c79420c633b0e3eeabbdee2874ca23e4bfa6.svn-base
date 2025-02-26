jQuery( document ).ready( function () {

	jQuery('#submit').click(function(e){
		
		var tagsValue = jQuery('#tags').val().trim();
		
		if (tagsValue === tagsText || tagsValue === ''){
			alert("Please insert your own tags!");
			return;
		}
		
		jQuery('#submit').text('Working...');
		jQuery('#submit').prop('disabled', true);
		
		if ( jQuery('#results-wrapper').css('display') === 'block' )
					jQuery('#results-wrapper').css('display', 'none');
		
		var data = {
			'action': 'submit_form',
			'tags': jQuery('#tags').val()
		};
		
		
		jQuery.post(ajaxurl, data, function(response) {
			var res = JSON.parse(response);
			
			console.log('reponse: ' + response);
			
			jQuery('#results').empty();
			jQuery('#tags-inserted').empty();
			jQuery('#tags-not-inserted').empty();
			
			var tagsNotAdded = res['tags_not_added'];
			var tagsAddedNum = res.tagsAddedNum;
				
				
			if (tagsAddedNum)
				jQuery('#tags-inserted').text(tagsAddedNum + ' tags were inserted');

			if (tagsNotAdded.length){
			
				var text = 'The following ';
				text += tagsNotAdded.length;
				text += ' tags were not inserted because they were already in the database - their slugs were used before';
				jQuery('#tags-not-inserted').text(text);
				
				tagsNotAdded.forEach(function(elm){
					var p = document.createElement('p');
					p.innerText = elm;
					p.style.paddingLeft = '10px';
					jQuery('#results').append(p);
				});
			}
			
			jQuery('#submit').text('Submit...');
			jQuery('#submit').prop('disabled', false);
			jQuery('#tags').val("");
			
			if ( jQuery('#results-wrapper').css('display') === 'none' )
				jQuery('#results-wrapper').css('display', 'block');
			
		});
		
	});
	
	var tagsText;
	tagsText = 'Insert on each line a tag and its slug or just a tag \n';
	tagsText += 'For example (food,food-recipes): tag name will be food, and tag slug will be food-recipes \n';
	tagsText += 'For example (food): tag name and tag slug will be both food \n';
	tagsText += 'You can mix between the two, and each tag should be written on a new line';
	
	textAreaPlaceholder('tags', tagsText);
	
	/**
	* Create a placeholder for a textarea
	*
	* @param string id textarea id
	* @param string placeholder
	* @return void
	*/
	function textAreaPlaceholder(id, placeholder){
		jQuery('#' + id).attr('value', placeholder);

		jQuery('#' + id).focus(function(){
			if(jQuery(this).val() === placeholder){
				jQuery(this).attr('value', '');
			}
		});
		jQuery('#' + id).blur(function(){
			if(jQuery(this).val() ===''){
				jQuery(this).attr('value', placeholder);
			}    
		});
	}
	
});




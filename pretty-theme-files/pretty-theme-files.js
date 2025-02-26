
jQuery(document).ready(function($) {
	
	
	//Main templates heading
  $('#templateside h4:first').text('Main templates');
	
	//List files reference
	var jList = $('#templateside ul:first');

	//Getting filenames from list
	var filenames = [];
	$('#templateside ul:first li a .nonessential').each(function(i, selected){
  
          filenames[i] = $(selected).text();
   
      });
  
  //Getting content inside of <li></li>
  var content = [];
	$('#templateside ul:first li').each(function(i, selected){
  
          content[i] = $(selected).html();
   
      });
	
	//Removes whole list
	$('#templateside ul:first').children().remove();
	

	//Wordpress main template files go first
	var files = new Array (
	'index', 
	'single',
	'page',
	'archive',
        'category',
	'search',
	'comments',
	'404',
	'header',
	'sidebar', 
	'footer',
	'link',
	'comments-popup',
	'searchform',
	'archives',
	'image',
	'audio',
	'video',
	'application',
	'attachment',
	'functions',
	'my-hacks'
	); 
	
	var i,br; //iteration vars
	
	
	for(br=0; br<files.length; br++)
	{	
		var control = 1;
		for (i=0; i<content.length; i++)
		{
				
				if(filenames[i] == '('+files[br]+'.php)')
					{
						
						//Inserting file
						jList.append(
							$( '<li>' + content[i] + '</li>' )
								);
								
						content[i] = '';
						control = 0;
					}
					
		}
		//if main file doesn't exist only insert label
		if(control)
					{
						jList.append('<li><span class="filelist"><span class="label">'+files[br]+'</span></span></li>');
					}
	}
	
	
		//Creating new list for the rest of files
		$('#templateside ul:first').after('<ul class="other"></ul>');
		$('#templateside ul:first').after('<h4>Other</h4>');
	
	//Inserting other files
	for(i=0; i<content.length; i++)
	{
		if(content[i]!='')
		{
			$('#templateside ul').eq(1).append('<li>' + content[i] + '</li>' );
		}
	}
	
	
	
	$('#templateside .other li').each(function(i, selected){
  				
  				$(this).attr('name',$(this).text());
  });
  
	
	//Assigning sublists of other files related with main files 
	for(i=0; i<files.length; i++)
	{
		var x = '#templateside li:contains("'+ files[i] +'.php")';
		//var x = "#templateside li[ textContent ^= '"+ files[i] +"']";
		var z = '.filelist:contains("'+ files[i] +'")';
		//var y = '#templateside .other li:contains("'+files[i]+'")';
		var y = '#templateside .other li[ name^="'+files[i]+'"]';
		
		
		if(jQuery(y).length)
		{
			
			if (jQuery(x).length)
			{
				
				jQuery('<ul></ul>').html($(y)).appendTo(x);
			}
			else
				{	
					
					jQuery('<ul></ul>').html($(y)).appendTo(z);
				}
			
		}
		
	} 
	
	//Clears other files list if has no files
	var other = $('#templateside .other').children();
	if(other.length == 0)
	{
		$('#templateside .other').remove();
		$('#templateside h4:eq(1)').remove();
		
	}
	
	//Styling file labels
	$('.label').each(function(i, selected){
  				var objects = $(this).children();
  				var obj_text = $(this).text();
  				obj_text = obj_text.substr(0, 1).toUpperCase() + obj_text.substr(1);
  				$(this).html('<i>'+obj_text+'</i>');
  			
          
  });
      
      
 

	$('#templateside a .nonessential').each(function(i, selected){

		var label = $(this).text();
		var n;
		var control=1;
		for(n=0; n<files.length; n++)
		{
			if(label == '('+files[n]+'.php)')
			{
				control = 0;
			}
			
		}
		if(control)
		{
			$(this).remove();
		}
		
		
	});	
  
  //Clear empty labels				
  $('li .filelist').each(function(i,selected){
  	
  	var obj = $(this).children();
  	
  	if(obj.length == 1)
  	{
  		$(this).parent().remove();
  	}
  	
  	
  	
  });
 
	

});
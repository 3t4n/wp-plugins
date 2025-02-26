
jQuery(document).ready(function($)
	{
		
		$(document).on('click', '.remove-row', function()
			{
				
				if(confirm("Please confirm!"))
					{
						$(this).parent().parent().remove();
					}
				
				
				
			
			})		
		
		$(document).on('click', '.remove-column', function()
			{
				var index = $(this).parent().index();
				var index = index+1;				
				
				if(confirm("Please confirm!"))
					{
						$("#price-table-admin tr td:nth-child("+index+")").remove();
					}
				

			
			})	
		
		
		
		
		$(document).on('click', '.table-add-column', function()
			{	
				var rowCount = $('#price-table-admin tr').length;
				var colCount = $("#price-table-admin > tbody").find("> tr:first > td").length;
				
				
				
				//alert(colCount);
				
				t = 0;
				$('#price-table-admin tr').each(function()
				{
					
					if(t==0)
						{
						$(this).append('<td><span class="column-drag-handle" title="Move this column."></span><span class="remove-column" title="Remove this column"></span></td>');			
						}
					else if(t==1)
						{
						$(this).append('<td><div class="price">Price</div><input name="price_table_data_price[col_'+colCount+']" type="text" value="" /></td>');			
						}
					else if(t==2)
						{
						$(this).append('<td><div class="header">Column Header</div><input name="price_table_data_header[col_'+colCount+']" type="text" value="" /></td>');			
						}						

					else if(t==3)
						{
						$(this).append('<td><div class="signup-url">SignUp URL</div><input placeholder="SignUp URL" title="SignUp URL, ex: http://hello.com/signup" name="price_table_data_signup_url[col_'+colCount+']" type="text" value="" /><div class="signup-text">SignUp Text</div><input placeholder="SignUp Text" title="SignUp Text, ex: SignUp" name="price_table_data_signup_text[col_'+colCount+']" type="text" value="" /></td>');	
						}

						
						
					else
						{
						$(this).append('<td><input name="price_table_data[row_'+(t-4)+'][col_'+colCount+']" type="text" value="" /></td>');			
						}

							
					
					
					t++;
				});




			})
		
		
		$(document).on('click', '.table-add-row', function()
			{	
				var rowCount = $('#price-table-admin tr').length;
				var colCount = $("#price-table-admin > tbody").find("> tr:first > td").length;
				
				if(rowCount == 1)
					{
						var rowCount = rowCount;
					}
				else
					{
						var rowCount = rowCount;
					}
					
				var html = '';
				for(i=0; i<colCount; i++)
					{
						if(i==0)
							{
							html += '<td><span class="remove-row">X</span><input name="price_table_data[row_'+(rowCount-4)+'][col_'+i+']" type="text" value="" /></td>';
							}
						else
							{
							html += '<td><input name="price_table_data[row_'+(rowCount-4)+'][col_'+i+']" type="text" value="" /></td>';
							}

						

						
						
					}
				
			
				$('#price-table-admin tr:last').after('<tr style="cursor: move;">'+html+'</tr>');


			})




		$(document).on('change', '.price_table_font_family', function()
			{
				
				var val = $(this).val();
				
				if(val == 'custom')
					{
						$('.price_table_font_family_custom').fadeIn();
					}
				else
					{
						$('.price_table_font_family_custom').fadeOut();
					}
				
				})



		$(document).on('change', '.price_table_themes_pack', function()
			{
				
				var val = $(this).val();
				var col = $(this).attr('col');	
				
				//alert(col);
							
				if(val == 'custom')
					{
						$('.price_table_themes_pack_custom'+col).fadeIn();
					}
				else
					{
						$('.price_table_themes_pack_custom').fadeOut();
					}
				
				})


		$(document).on('change', '.price_table_themes_text_pack', function()
			{
				
				var val = $(this).val();
				var col = $(this).attr('col');	
				
				//alert(col);
							
				if(val == 'custom')
					{
						$('.price_table_themes_text_pack_custom'+col).fadeIn();
					}
				else
					{
						$('.price_table_themes_text_pack_custom').fadeOut();
					}
				
				})





	});	








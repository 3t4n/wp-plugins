// Javascript

'use strict';
	
	new DataDiagrams();	

	function DataDiagrams()
	{
		this.url = 'https://data-diagrams.com/api.php';

		const cSelf =  this;	

		document.addEventListener('DOMContentLoaded', () => {
			
			try
			{																
				const button = document.querySelector('[data-diagram]');
								
				button.addEventListener('click', (e) => {
												
					addMedia('Free Diagram', '');
				
				});	
			
			}
			catch(e)
			{
				_errorHandler(e);			
			}				
		});
	

	// media library
		function addMedia(title, caption)
		{
			try
			{		
				const url = cSelf.url;
				
				getSVG(url, title, caption); 
	
			}
			catch(e)
			{
				_errorHandler(e);			
			}	
		}
	
		function getSVG(url, title, caption)
		{// get SVG from data-diagrams API
			try
			{
				fetch(url, {
					method: "GET",
					mode: 'cors',				

					credentials: 'include',
				  
				  	headers: {
    					"Content-Type": "text/xml",
  					},
  					
					})
					.then(async function(response) {
						
						//const temp = await response.text();						
						// console.log('OUT: ' + temp);
										
						return response.blob()
					})
					.then(function(blob) {

						//console.log(blob);						
						// console.log('GET');

						// upload to media library				
						const urlx = wpApiSettings.root + 'wp/v2/media'; 
	
						sendMedia(urlx, blob, title, caption);
						
						
						document.querySelector('#feedback').classList.add('show');
						
			
					})
					.catch(error => {
						console.error('Error:', error); 
						
					});
				
			}
			catch(e)
			{
				_errorHandler(e);			
			}	
		}
		
		function sendMedia(url, blob, title, caption)
		{ // upload SVG to media library
			try
			{	
				var file = new File([blob], "data-diagram.svg");
	
				const formData = new FormData();
	
				formData.append("file", file);					
					
				formData.append("title", title);
				formData.append("caption", caption);
				formData.append("alternative", "data-diagrams.com");
				formData.append("description", "http://data-diagrams.com");
			
				fetchPOST(url, formData);
		
			}
			catch(e)
			{
				_errorHandler(e);			
			}	
		}

			
		
	// shared	
		function fetchPOST(url, formData, hasReturn)
		{
			try
			{			
				const nonce = wpApiSettings.nonce;

				fetch(url, {			
					method: "POST",
					headers: {
						'X-WP-Nonce': nonce,
					},
				  body: formData
				})
				.then( (response) => {
				
					response.text();
				
				})
				.catch(error => {

					console.error('Error:', error); // check log, when error
				
				});
			
			}
			catch(e)
			{
				_errorHandler(e);			
			}		
		}
		
		function _errorHandler(e)
		{
			console.error(e);		
		}
			
	}
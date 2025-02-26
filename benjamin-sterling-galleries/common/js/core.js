(function ($) {
	$(document).ready(function(){
		var $input = $('input[name=bsg_server]');
		var $selectList = $('#selectList');
		var $imageList = $('#imageList');
	
		var $forPicasa = $('.forPicasa');
		var $forFlickr = $('.forFlickr');
		var $forBrowsable = $('.forBrowsable');
		var $flickrOptionsGroups = $('.flickrBasic, .flickrQuickAdvanced, .flickrAdvancedPhotoset, .flickrAdvancedSearch');
		
		var $bsg_flickr_get_options = $('#bsg_flickr_get_options');
		var $flickr_api_key = $('#flickr_api_key');
		var $flickr_api_key_dd = $('#flickr_api_key_dd');
		var $flickr_api_urls = $('#flickr_api_urls');
		var $flickr_photoset_id = $('#flickr_photoset_id');
		var $flickr_photoset_id_dd = $('#flickr_photoset_id_dd');
		var $flickr_user_id = $('#flickr_user_id');
		var $flickr_user_id_dd = $('#flickr_user_id_dd');
		var $flickr_group_id = $('#flickr_group_id');
		var $flickr_tags = $('#flickr_tags');
		var $flickr_tag_mode = $('#flickr_tag_mode');
		var $flickr_sort = $('#flickr_sort');
	
		var $bsg_picasa_get_options = $('#bsg_picasa_get_options');
		var $picasOptionsGroups = $('.picasaAdvanced, .picasaBasic');
		var $picasa_user_id = $('#picasa_user_id');
		var $picasa_user_id_dd = $('#picasa_user_id_dd');
		var $picasa_album_id = $('#picasa_album_id');
		var $picasa_album_id_dd = $('#picasa_album_id_dd');
		var $bsg_picasa_grab = $('#bsg_picasa_grab');
		
		var $hiddenService = $('input[name=hiddenService]');
		var $bsgNotice = $('.bsgNotice');
		var $setGallery = $('#setGallery');
		var $selectGallery = $('#selectGallery');
		var $params = $('#params tbody');
		var $ul = $('#theGallery');
		var $finGallery = $('#finGallery');
		var $startGallery = $('#startGallery');
		var $buildGallery = $('#buildGallery');
	
		var imgJSON=Array(),galParams,galParamsFin;
	
		$imageList.sortable();

		$('#bsg_add_all').click(function(){
			$selectList.children('li').trigger('dblclick');
			return false;
		});
	
		$('#bsg_remove_all').click(function(){
			$imageList.children('li').trigger('dblclick');
			return false;
		});
	
		$('input[name=service]').click(function(){
			$forPicasa.hide();
			$forFlickr.hide();
			$forBrowsable.hide();
			$flickrOptionsGroups.hide();
			$picasOptionsGroups.hide();
			var $for = $(this).attr('alt');
			$($for).show();
			$hiddenService.val($(this).val());
		});
	
	
		$imageList.children('li').dblclick(function(){
			var $this = $(this);
			if($this.parent('#selectList').size() != 0){
				$this.appendTo($imageList);
				$imageList.sortable();
			}
			else{
				$this.appendTo($selectList);
			};
		});

		/**
		 *	Here we are setting the change event to the flickr options select
		 *	menu
		 */
		$bsg_flickr_get_options.change(function(){
			var $this = $(':selected',this);
			$flickrOptionsGroups.hide();
			$('.'+$this.val()).show();
		});  //  end : $bsg_flickr_get_options.change
		
	
		/**
		 *	Here we are setting the change event to the picasa options select
		 *	menu
		 */
		$bsg_picasa_get_options.change(function(){
			var $this = $(':selected',this);
			$picasOptionsGroups.hide();
			$('.'+$this.val()).show();
		});  //  end : $bsg_picasa_get_options.change
		
	
		/**
		 *	Here we are setting the change event to the flickr stored api keys
		 *	select menu and append that value to the api key input field
		 */
		$flickr_api_key_dd.change(function(){
			var $this = $(':selected',this);
			$flickr_api_key.empty().val($this.val());
		});  //  end : $flickr_api_key_dd.change
	

		/**
		 *	Here we are setting the change event to the flickr stored photoset
		 *	select menu and append that value to the photoset input field
		 */
		$flickr_photoset_id_dd.change(function(){
			var $this = $(':selected',this);
			$flickr_photoset_id.empty().val($this.val());
		});  //  end : $flickr_photoset_id_dd.change
		
	
		/**
		 *	Here we are setting the change event to the flickr stored photoset
		 *	select menu and append that value to the photoset input field
		 */
		$flickr_user_id_dd.change(function(){
			var $this = $(':selected',this);
			$flickr_user_id.empty().val($this.val());
		});  //  end : $flickr_user_id_dd.change
		
	
		/**
		 *	Here we are setting the change event to the picasa stored user ids
		 *	select menu and append that value to the picasa userid input field
		 */
		$picasa_user_id_dd.change(function(){
			var $this = $(':selected',this);
			$picasa_user_id.empty().val($this.val());
		});  //  end : $picasa_user_id_dd.change
		
	
		/**
		 *	
		 *	
		 */
		$picasa_album_id_dd.change(function(){
			var $this = $(':selected',this);
			$picasa_album_id.empty().val($this.val());
		});  //  end : $picasa_album_id_dd.change
	
		$bsg_picasa_grab.click(function(){
			var uid = $picasa_user_id.val();
			if(uid == ''){
				alert('Need a picasa user id');
				return false;
			};
			var url  = "http://picasaweb.google.com/data/feed/api/user/"+uid+"?kind=album&alt=json";
			$('#bsg_picasa_grab_notice').text('Grabbing your album list from Picasa, please wait');
			$.getJSON('<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php';?>','to=get&url='+encodeURIComponent(url),
				function(data){
					$('#bsg_picasa_grab_notice').text('Ok, got them, now building the dropdown.');
					with(data.feed){
						$picasa_album_id_dd.empty().append('<option selected="selected">Select one</option>');
						for(var i = 0; i < entry.length; i++){
							$picasa_album_id_dd.append('<option value="'+entry[i]['gphoto$name']['$t']+'">'+entry[i]['title']['$t']+'</option>');
						};
						$picasa_album_id_dd.append('<option selected="selected">Select one</option>');
					};
					$('#bsg_picasa_grab_notice').text('Ok, Done!  Just to note, depending on the browser, the last one added may be the one that gets selected.  So be sure to select the one you want.');
				}
			);
			return false;
		});

		/**
		 *	
		 */
		$selectGallery.change(function(){
			var $this = $(':selected',this);
			var url = $this.attr('title');
			var params = $.parseJSON(decodeURIComponent($this.attr('metadata')));
			$('#selectGalleryUrl').html('View an example at <a href="'+url+'" target="_blank">'+url+'</a>');
			
			$params.empty();
			if(params === undefined) return;
			$.each(params.parameters,function(i){
				var $tr = $('<tr>');
				$td = $('<td>').appendTo($tr).text(params.parameters[i].param);
				$td = $('<td>').appendTo($tr).html('<input type="text" size="30" name="'+params.parameters[i].param+'"/>');
				$td = $('<td>').appendTo($tr).text(params.parameters[i].desc);
				$params.append($tr);
			});			
		}); // end : $selectGallery.change(function(){


		var jQbsg_structure = $('#bsg_structure option');

		/**
		 *	function 	: buildPreview
		 *	param	: data (JSON/Object)
		 *	purpuse	: builds out the selected gallery with the selected images
		 */
		buildPreview = function(data){
			$finGallery.show();
			location.hash = 'topGal';
			$.getScript('<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/galleryScripts/';?>'+data.gallery+"/"+data.gallery+'.js',function(){
	
	
				$('link[href*=benjaminSterlingGalleries]').remove();
				var c = document.createElement('link');
				c.type = 'text/css';
				c.media = 'screen';
				c.rel = 'stylesheet';
				c.href = '<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php';?>?to=css&aid='+data.id+'&<?php echo time();?>';
				$('head')[0].appendChild(c);
	
				$('a.editLinks').each(function(){
					var href = $(this).attr('href');
					$(this).attr('href', href+data.id);
				});
				var structure = jQbsg_structure.filter(':selected').val();
				var $parent = $('#parent').empty();
				//$($parent).prev().replaceWith('<div style="margin: auto; width: 650px; "><strong>Success!!</strong> A preview of your gallery is below.</div>');
				
				
				var goFunction = '';
				var goSelector = '';
					
				switch(data['gallery']){
					case 'lightBox':
					case 'thickbox':
						goSelector = '#bsg'+data.id+' a';
						break;
					default:
						goSelector = '#bsg'+data.id;
						break;
				}

				if(structure == 'li'){
					$ul = $('<ul id="bsg'+data.id+'" title="Gallery">').appendTo($parent);

					for(var i = 0; i < imgJSON.length; i++){
						var _ = $.parseJSON(decodeURIComponent(imgJSON[i]));
						$('<li><a href="'+_.url+'"><img src="'+_.tnurl+'" alt="'+_.alt+'"/></a></li>').appendTo($ul);
					};
					goFunction = '$("'+goSelector+'").'+data['gallery']+'({'+galParamsFin+'});';
				}
				else if(structure == 'table'){					$cols = 5;
					$j = 1;
					$tr = '';
					$table = $('<table id="bsg'+data.id+'" title="Gallery" border="0" cellspacing="0" cellpadding="0">').appendTo($parent);
					for(var i = 0; i < imgJSON.length; i++){
						var _ = $.parseJSON(decodeURIComponent(imgJSON[i]));
						if(($j % $cols) == 1){
							$tr = $("<tr>").appendTo($table);
						}
						$('<td><a href="'+_.url+'" class="'+data['gallery']+'"  rel="bsgGallery'+data.id+'" title="'+_.alt+'"><img src="'+_.tnurl+'" alt="'+_.alt+'"/></a></td>').appendTo($tr);
						

						if($j == imgJSON.length){
							for($k = 1; $k <= ($cols-(imgJSON.length%$cols)); $k++){
								$("<td>&nbsp;</td>").appendTo($tr);
							}		
						}
						
						$j++;
					};
					goFunction = '$("'+goSelector+'").'+data['gallery']+'({'+galParamsFin+'})';
				}
				else if(structure == 'div'){
					for(var i = 0; i < imgJSON.length; i++){
						var _ = $.parseJSON(decodeURIComponent(imgJSON[i]));
						$('<div class="bsgDivWrapper"><a href="'+_.url+'" class="'+data['gallery']+'"  rel="bsgGallery'+data.id+'" title="'+_.alt+'"><img src="'+_.tnurl+'" alt="'+_.alt+'"/></a></div>').appendTo($parent);
					};
					goFunction = '$("'+goSelector+'").'+data['gallery']+'({'+galParamsFin+'})';
				}
				else if(structure == 'empty'){
					for(var i = 0; i < imgJSON.length; i++){
						var _ = $.parseJSON(decodeURIComponent(imgJSON[i]));
						$('<a href="'+_.url+'" class="'+data['gallery']+'"  rel="bsgGallery'+data.id+'" title="'+_.alt+'"><img src="'+_.tnurl+'" alt="'+_.alt+'"/></a>').appendTo($parent);
					};
					goFunction = '$("'+goSelector+'").'+data['gallery']+'({'+galParamsFin+'})';
				}

				$.getScript('<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php';?>?to=preview&aid='+data.id);

			});
	
			if(isUpdate){
				$setGallery.attr("disabled",false);
			}
			// ok, everything is done, so let unblock the UI
			$.unblockUI();
		};

	getImagesFromDir = function(url){
		var hrefsRE = new RegExp ('href\s*=\s*"[^"]*(?:\.(?:jpe?g|gif|png)|\/)"(.*)','gi');
		var urlRE = new RegExp ('(jpe?g|gif|png)$','gi');
		var dir = url;
		$.get(dir, function(data) {
			
			var hrefs = data.match(hrefsRE);
			hrefs.shift(); // the parent directory
			for (var i = 0; i < hrefs.length; i++){
				var href=hrefs[i].toString();
				var url =dir + href.match(/"(.*)"/)[1];
				var rest =  href.match(/>(.*)<\/a>\s+(.*?)\s+(.*?)\s+(.*)$/i);
				
				if (url.match(urlRE)){
					if(/.thumbnail./.test(url)){
						var meta = "{";
						meta += '"tnurl":"'+url+'",';
						meta += '"url":"'+url.replace(/.thumbnail/,'')+'",';
						meta += '"alt":""';
						meta += "}";
						var image = $('<img src="'+url+'"/>').attr('metadata',encodeURIComponent(meta));
						var $img = $('<li>').append(image)
						.dblclick(function(){
							var $this = $(this);
							if($this.parent('#selectList').size() != 0){
								$this.appendTo($imageList);
								$imageList.sortable();
							}
							else{
								$this.appendTo($selectList);
							};
						});
						$selectList.append($img );
						
						
					}
				} else if (url.match(/\/$/i)){
					getImagesFromDir(url);
				}
			};
		});
	};
	urlFix = function(url){
		if(/picasa/.test(url)){
			//$this.attr('href', 'http://picasaweb.google.com/data/feed/base/user/'+href.split('/').pop()+'?alt=json&callback=?');
			return url.replace(/alt=rss/g,"alt=json");
		}
		else if( /flickr/.test( url ) ){
				return url +"&format=json&jsoncallback=?";
		}
	}

		buildSelectFromList = function(json){
			$bsgNotice.text('Ok, got the data, going to process it now.');
			var service = $hiddenService.val();
			if(service == 'locally'){
				$selectList.empty();
				var obj = json;
				$.each(obj, function(i){
					var str = obj[i]['guid'];
					var liof = str.lastIndexOf('.');
					var imgUrl = Array();
					imgUrl.push(str.slice(0,liof));
					imgUrl.push('.thumbnail');
					imgUrl.push(str.slice(liof));
					
					imgUrl = imgUrl.join('');
					var meta = "{";
					meta += '"tnurl":"'+imgUrl+'",';
					meta += '"url":"'+obj[i]['guid']+'",';
					meta += '"alt":"'+obj[i]['post_title']+'"';
					meta += "}";
					var image = $('<img src="'+imgUrl+'"/>').attr('metadata',encodeURIComponent(meta));
					var $img = $('<li>').append(image)
					.dblclick(function(){
						var $this = $(this);
						if($this.parent('#selectList').size() != 0){
							$this.appendTo($imageList);
							$imageList.sortable();
						}
						else{
							$this.appendTo($selectList);
						};
					});
					$selectList.append($img );
				});
			}
			else if(typeof json['feed'] != 'undefined'){ //picasa
				var tnSize = $('select[name=bsg_picasa_thumbnailSelect] option:selected').val();
				var fullSize = $('select[name=bsg_picasa_fullSizeSelect] option:selected').val();
				$selectList.empty();
				var obj = json['feed']['entry'];
				$.each(obj,function(i){
					var meta = "{";
					meta += '"tnurl":"'+obj[i]['media$group']['media$thumbnail'][tnSize]['url']+'",';
					meta += '"url":"'+obj[i]['media$group']['media$content'][0]['url']+'?imgmax='+fullSize+'",';
					meta += '"alt":"'+obj[i]['media$group']['media$description']['$t']+'"';
					meta += "}";
					var image = $('<img src="'+obj[i]['media$group']['media$thumbnail'][tnSize]['url']+'"/>').attr('metadata',encodeURIComponent(meta));
					var $img = $('<li>').append(image)
					.dblclick(function(){
						var $this = $(this);
						if($this.parent('#selectList').size() != 0){
							$this.appendTo($imageList);
							$imageList.sortable();
						}
						else{
							$this.appendTo($selectList);
						};
					});
					$selectList.append($img );
				});
			}
			else if(typeof json['items'] != 'undefined'){ //flickr
				var tnSize = $('select[name=bsg_flickr_thumbnailSelect] option:selected').val();
				$selectList.empty();
				var obj = json['items'];
				var tn = Array('_s.jpg','_t.jpg','_m.jpg')
				$.each(obj,function(i){
					var meta = "{";
					meta += '"tnurl":"'+obj[i]['media']['m'].replace(/_m.jpg/, tn[tnSize])+'",';
					meta += '"url":"'+obj[i]['media']['m'].replace(/_m/,'')+'",';
					meta += '"alt":"'+obj[i]['title']+'"';
					meta += "}";
					var image = $('<img src="'+obj[i]['media']['m'].replace(/_m.jpg/, tn[tnSize])+'"/>').attr('metadata',encodeURIComponent(meta));
					var $img = $('<li>').append(image)
					.dblclick(function(){
						var $this = $(this);
						if($this.parent('#selectList').size() != 0){
							$this.appendTo($imageList);
							$imageList.sortable();
						}
						else{
							$this.appendTo($selectList);
						};
					});
					$selectList.append($img );
				});
			}
			
			else if($hiddenService.val() == 'flickr'){
				var tnSize = $('#bsg_flickr_thumbnailSelect option:selected').val();
				var tn = Array('s','t','m')
				$selectList.empty();
				var obj;
				var _do_ = $bsg_flickr_get_options.children(':selected').val();
				if(_do_ == 'flickrAdvancedPhotoset'){
					obj = json['photoset']['photo'];
				}
				else if(_do_ == 'flickrAdvancedSearch'){
					obj = json['photos']['photo'];
				};
				
				$.each(obj,function(i){
					var meta = "{";
					meta += '"tnurl":"'+'http://farm'+obj[i]['farm'];
					meta += '.static.flickr.com/'+obj[i]['server'];
					meta += '/'+obj[i]['id']+'_'+obj[i]['secret'];
					meta += '_'+tn[tnSize]+'.jpg'+'",';

					meta += '"url":"'+'http://farm'+obj[i]['farm'];
					meta += '.static.flickr.com/'+obj[i]['server'];
					meta += '/'+obj[i]['id']+'_'+obj[i]['secret']+'.jpg'
					meta += '",';

					meta += '"alt":"'+obj[i]['title']+'"';
					meta += "}";

					var image = $('<img src="'+'http://farm'+obj[i]['farm']+'.static.flickr.com/'+obj[i]['server']+'/'+obj[i]['id']+'_'+obj[i]['secret']+'_'+tn[tnSize]+'.jpg"/>').attr('metadata',encodeURIComponent(meta));
					var $img = $('<li>').append(image)
					.dblclick(function(){
						var $this = $(this);
						if($this.parent('#selectList').size() != 0){
							$this.appendTo($imageList);
							$imageList.sortable();
						}
						else{
							$this.appendTo($selectList);
						};
					});
					$selectList.append($img );
				});
			}
			$bsgNotice.text('Alright, looks like we are done processing.');
			
			setTimeout(function(){$bsgNotice.fadeOut();}, 2000);
		};


	$('#setGallery').click(function(){
		var $img = $('img',$imageList);
		var $gallery = $selectGallery.children(':selected').val();
		var $galleryName = $('input[name=bsg_galleryName]').val();
		var sendData = "to=" + sendTo;
		var imgArray = Array();

		// start : check for make sure the important stuff is done
		if($img.size() < 2){
			alert('Really?  You want an image/photo gallery with less then two image?  How about you add one or two more?');
			return false;
		};
		if($gallery==0){
			alert('Ok, you are trying to build a gallery for your blog, so selecting a gallery from the "Select the gallery style" select menu will help you get to that point.');
			return false;
		};
		if($galleryName==''){
			alert('Naming the gallery will make things easier for you later on, so do yourself a favor and put some text in the "Name your gallery" field');
			$('input[name=bsg_galleryName]').focus();
			return false;
		};
		// end : check for make sure the important stuff is done

		// lets disable the set gallery button just to make sure it is not clicked again.
		$setGallery.attr('disabled',true);

		//  Lets run thru all the images with have and put them in an array
		$img.each(function(i){
			imgJSON[i] = $(this).attr('metadata');
			imgArray[i] = $(this).attr('metadata');
		});

		// build our sendData string for sending to the server
		sendData += '&images=['+imgArray.join(",")+']';
		sendData += '&album_title='+encodeURIComponent($galleryName);
		sendData += '&gallery_id='+$gallery;
		sendData += '&album_structure='+$('#bsg_structure option:selected').val();
		
		if($('input[name=bsg_album_uselarge]').is(':checked')){
			sendData += '&album_uselarge=1';
		}
		else{
			sendData += '&album_uselarge=0';
		}
			
		var paramArray = Array();
		var tmpArray = Array();
		$('input', $params).each(function(){
			var $this = $(this);
			var val = $this.val();
			if(val !=''){
				if(val.match(/\{(.*)\}/)){//check to see if it is an object format
					tmpArray.push(''+$this.attr('name')+''+':'+val+'');
				}
				else if(isInteger(val)){
					tmpArray.push(''+$this.attr('name')+''+':'+val+'');
				}
				else{
					tmpArray.push(''+$this.attr('name')+''+':"'+val+'"');
					val = '"'+val+'"';
				};
				paramArray.push('"'+$this.attr('name')+'"'+':'+val+'');
			};
		});

		// lets put the params into our global for previewing
		galParams = paramArray.join(",");
		galParamsFin =  tmpArray.join(",");

		// finish building out our sendData variable
		sendData += '&album_params='+encodeURIComponent('{'+galParams+'}');

		// lets block the UI for till processing is done.
		$.blockUI();

		// out ajax call to the server
		$.ajax({
			url: '<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php';?>',
			data : sendData,
			dataType : 'json',
			type : 'POST',
			//type : 'GET',
			success : function(data, textStatus){
				if(data.result == 'done'){
					if(!isUpdate){
						$("#startGallery, #buildGallery").remove();
					}
					buildPreview(data);
				}
				else if(data.result == 'error'){
					$.unblockUI();
					alert('There was an error in the processing; please try again.  If this presists, please submit a bug so we can get this fixed');
					$setGallery.attr("disabled",false);
				}
			},
			error : function(x, txt, e){
				try{
					console.log(x);
					console.log(txt);
					console.log(e);
				}catch(e){}
			}
		});
		return false;
	});

	$('#bsg_getGallery').click(function(){
		//var url = $('input[name=bsg_server]').val();
		
		var url = null, error = Array();
		
		/**
		 *  Get what service we will be providing
		 */
		var service = $hiddenService.val();
		
		/**
		 *  start error checking
		 */
		if(service == ''){
			error.push('Go ahead and help me out by checking one of those radio buttons.');
		};
		
		switch(service){
			case 'locally':
				url = 'locally';
				break;
			case 'browsable':
				url = $('#browseBasic_url').val();
				break;
			case 'flickr':
				var flickrOption = $bsg_flickr_get_options.children(':selected').val();
				switch(flickrOption){
					case 'flickrBasic':
						url = $('#bsg_flickr_basic_url').val();
						break;
					case 'flickrQuickAdvanced':
						url = $('#flickr_api_url').val();
						if(!url.match(/format=/)){
							url += '&format=json';
						};
						break;
					case 'flickrAdvancedPhotoset':
						var key = $('#flickr_api_key').val();
						var pid = $('#flickr_photoset_id').val();
						url = 'http://api.flickr.com/services/rest/';
						url +='?format=json&api_key='+key;
						url +='&method=flickr.photosets.getPhotos&photoset_id='+pid;
						url +='&jsoncallback=?';
						if(key == ''){
							error.push('An Flickr API Key is needed');
						};
						if(pid == ''){
							error.push('You do need a photoset id if you a going to pull in a Photoset');
						};
						break;
					case 'flickrAdvancedSearch':
						var key = $('#flickr_api_key').val();
						url = 'http://api.flickr.com/services/rest/';
						url +='?format=json&api_key='+key;

						var flickr_user_id = $('#flickr_user_id').val();
						var flickr_group_id = $('#flickr_group_id').val();
						var flickr_tags = $('#flickr_tags').val();
						var flickr_tag_mode = $('#flickr_tag_mode option:selected').val();
						var flickr_sort = $('#flickr_sort').val();

						if	(
								flickr_user_id == '' &&
								flickr_group_id == '' &&
								flickr_tags == ''
							){
							url += '&method=flickr.photos.getRecent';
						}
						else{
							url += '&method=flickr.photos.search';
						};

		                if (flickr_user_id !='') url += '&user_id=' + flickr_user_id;
		                if (flickr_group_id !='') url += '&group_id=' + flickr_group_id;
		                if (flickr_tags !='') url += '&tags=' + flickr_tags;
		                if (flickr_tag_mode !='') url += '&tag_mode=' + flickr_tag_mode;
		                if (flickr_sort !='') url += '&sort=' + flickr_sort;

						url +='&jsoncallback=?';
						if(key == ''){
							error.push('An Flickr API Key is needed');
						};
						break;
					default:
						error.push('You selected Flickr as your service of choice, now you need to select what option set you want');
						break;
				};
				break;
			case 'picasa':
				var picasaOption = $bsg_picasa_get_options.children(':selected').val();
				switch(picasaOption){
					case 'picasaBasic':
						url = $('input[name=bsg_server]').val();
						break;
					case 'picasaAdvanced':
						var uid = $picasa_user_id.val();
						if(uid == ''){
							error.push('Need a picasa user id');
						};
						var aid = $picasa_album_id.val();
						if(aid == ''){
							error.push('Need a picasa album id that is associated with the user id you provided');
						};
						url  = "http://picasaweb.google.com/data/feed/api/user/"+uid+"/album/"+aid+"?kind=photo&alt=json";
						break;
					default:
						error.push('You selected Picasa as your service of choice, now you need to select what option set you want');
						break;
				};
				break;
			default:
				break;
		};

		if(url == '' || url === undefined || url == null){
			error.push('Need that url.  Go ahead, add it.  I need it.');
		};
		
		if(error.length > 0){
			var errormsg = '';
			
			for(var i = 0; i < error.length; i++){
				errormsg += error[i] + '\n';
			}
			alert(errormsg);
			return false;
		};
		//return false;
		
		$bsgNotice.show().text('Loading your images, please wait...');
		if(service == 'browsable'){
			getImagesFromDir(url);
		}
		else{
			$.ajax({
				url: '<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php';?>',
				dataType : 'json',
				data : 'to=get&who='+service+'&url='+encodeURIComponent(url),
				success : function(data, textStatus){
					if(data.result == 'error'){
						$bsgNotice.text('There seemed to be an error in the execution and most likely is because your server does not support "file_get_contents," we will try an alternate method, please wait.');
						setTimeout(function(){
							$bsgNotice.fadeOut();
							$setGallery.attr("disabled",false);
						}, 3000);
						//$.ajaxSetup({cache:true});
						$.ajax({
							type:'GET',
							url:urlFix(url),
							success:buildSelectFromList,
							dataType:'jsonp',
							cache:true
						});
					}
					else if(data.stat == 'fail'){
						$bsgNotice.text('Flickr returned an error: '+ data.message);
					}
					else{
						buildSelectFromList(data);
					}
				},
				error : function(x, txt, e){
					$bsgNotice.text('There seemed to be an error in the execution of the URL provided; please select another one and try again.  If problem presists, please submit a bug.');
					setTimeout(function(){$bsgNotice.fadeOut();}, 3000);
					$setGallery.attr("disabled",false);
				}
			});
		}
		return false;
	});

	});//

function isInteger (s){
	var i;

	if (isEmpty(s))
		if (isInteger.arguments.length == 1) return 0;
	else return (isInteger.arguments[1] == true);
		for (i = 0; i < s.length; i++){
			var c = s.charAt(i);
	     	if (!isDigit(c)) return false;
		};
	return true;
};

   function isEmpty(s){
      return ((s == null) || (s.length == 0))
   };

   function isDigit (c)
   {
      return ((c >= "0") && (c <= "9"));
   };


})(jQuery);
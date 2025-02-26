/**********************************************************
 * Simple YouTube Responsive
 * TinyMCE Button, Since version 2.0.0
 *
 ***********************************************************/

function erdyt_getid(youtube) {
	// Check if input is YouTube URL
	var checkurl = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	if(!checkurl.test(youtube)){ // Jika bukan, kembalikan isinya
		return youtube;
	}else{ // Jika Iya
		var regex = new RegExp('[\\?&]v=([^&#]*)');
		var results = regex.exec(youtube);
		return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
	}
}

jQuery(function(){
	// Register TinyMCE plugin
    tinymce.PluginManager.add('eirudo_ytresponsive', function(ed, url){
		tinymce.PluginManager.add( 'eirudo_ytresponsive', function( editor, url ) {
			// Add Button to Visual Editor Toolbar
			editor.addButton('eirudo_ytresponsive', {
				title: 'Add responsive YouTube Video',
				cmd: 'eirudo_ytresponsive',
				image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABqCAMAAABpj1iyAAAAeFBMVEUAAAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/AAD/////QkL/np7/W1v/1dX/vb3/Hx//hIT/c3P/MjL/9PT/5eX/EBB+ElYfAAAAGnRSTlMAy+LXvZp8NaTxj6xySuoRCVxnUisiGodBtPI+S4AAAAMzSURBVGjezduJVtswEAXQJ1ny7nhL7GTKVhro//9hLQJHUEOhHhnP/QHewZPRjq9q6vqwT45V33ZlGY95bm1aFCdjjHKiZ8oxk6JIrc3zMY7Lru2rY7I/DHUDtmZIqi7OU2Omv6n1LiO2LNPaJTdFHnfV8fBfKYdqCnNSO1pdpkxq4/6AT7VW0beL0rLGx4ZY00ayfI8PlBltaWzwjtrQxvQeM/sdba/HXw4kQoU3agn/KyfBa4qEyBp4HYmR+lQDCXLEi5wEUXjWZCRJIq+yHIuLlERRuIhIlkFSg/c6iaVFVEgsLSIla+B5oeFokqaW10xfxp89idMB6EmcHEBM4pwAWBJHAdh8wTMXSWxbRJo1UP+klWQNp5ve3F7ROgZgR0td/fhxfaY1JKhpIRdrcv+bwqsYTX6K5Tz8ouBaJLSYi+WEL7ESFS3iYzl3gUtsREsLuVjeddASsyhpKRfLewxZYunCkdrH8m5vKBSDkZaZxwrYxQxnAuFj+WBhBiTFWPfMYoXrYgoFLTOPFbCLKRhaxMeau2N/yYgx3ZrFYnSxVWN5D/fEodeIxe9imjE5nWL9092C2l8zFr+LacaceYr1qYVdbLdOLO9xQYmtFItf+/xYjA+5VawFS5DVYvGnOvxYvM61Qd9iTKP5sVij4gZjIm9yw4+1ylRQB50G+s7OFOFEi10F6lRzEXOJsdLaR/EXZPNOxacY59Q+VvB1teEv9uedis/wt0bmRcVXsDeSfFEFZJnbbr5TBZWzNymdewqs5G/puqIKrWNvgN+dKbwKDeO4wHeqwBLW4YpfPQR24BxFnc+0jqwRe3An9JhT6KGwwCN0A6AlcSyAhMQpAdQkTiXz6s8g+KJUQcJEcEoS5gRI/CmWEHndbQ+JxRVhIm/4STGR11ArQOBX1JjI+y22kHiPX+GJtB5xACDvM7Z4oyIRYrwm5VZsjJlk+4dRPd5RW9qUSfC+Y0GbMT0+luSGNqBshU8MfWwL9U2FlqmTHdsDvmw49uX49HpZ6ywjjvkjZqVMOsate8LM0NSDe+nddu6dt02L05T2IpromWiiLow5FanNx6dH3+7Nd/2lJH8AfOrnc7irt7oAAAAASUVORK5CYII=',
			});

			// Add Command when Button Clicked
			editor.addCommand('eirudo_ytresponsive_shortcode', function() {
				var erdyt_responsive_url = window.prompt('Insert YouTube video URL or Video ID');
				if( erdyt_responsive_url ){
					erdyt_shortcode_result =  '[youtube v="'+window.erdyt_getid(erdyt_responsive_url)+'"]';
				}else{
					erdyt_shortcode_result =  '[youtube v="INSERT-VIDEO-ID-HERE"]';
				}

				tinymce.execCommand('mceInsertContent', false, erdyt_shortcode_result);
			});
		});
	});
});
jQuery(function($) {
    $(document).ready(function(){
    
    	ae_fb_window_generate();

		$('#ae-fb-video-embed-dialog').dialog({
		    title: 'AE FB VIDEO EMBED',
		    dialogClass: 'wp-dialog',
		    autoOpen: false,
		    draggable: false,
		    width: 'auto',
		    modal: true,
		    resizable: false,
		    closeOnEscape: true,
		    position: {
		      my: "center",
		      at: "center",
		      of: window
		    },
		    open: function () {
		      $('.ui-widget-overlay').bind('click', function(){
		        $('#ae-fb-video-embed-dialog').dialog('close');
		      })
		    },
		    create: function () {
		      $('.ui-dialog-titlebar-close').addClass('ui-button');
		    },
		  });

        $('#insert-ae-fb-video').click(open_ae_fb_video_embedder);

        $("#ae-fb-video-embed-btn-insert").click(insert_ae_fb_shorcode);

        $(".ae-fb-embed-params").on("change", function(){
        	build_ae_shortcode();
        }).trigger("change");
        
    });

    window.ae_fb_window_generate = function(){
    	var ae_fb_embed_window = `
    	<div id='ae-fb-video-embed-dialog' class='hidden' style='max-width:800px'>
    		<form id="ae-fb-video-embed-form">
	    	<p>
	    		<label for="ae-fb-input-url">URL</label>
	    		<input type="url" id="ae-fb-input-url" class="ae-fb-embed-params widefat" placeholder="Your facebook video url" required>
	    	</p>
	    	<p>
	    		<label for="ae-fb-input-width">Video Container Width</label>
	    		<input type="number" id="ae-fb-input-width" class="ae-fb-embed-params" value="500">
	    	</p>
	    	<p>
	    		<label>
	    			<input type="checkbox" id="ae-fb-input-showtext" class="ae-fb-embed-params"> Show Text?
	    		</label>
	    	</p>
	    	<p>
	    		<label>
	    			<input type="checkbox" id="ae-fb-input-showcaptions" class="ae-fb-embed-params"> Show Captions ?
	    		</label>
	    	</p>
	    	<p>
	    		<label>
	    			<input type="checkbox" id="ae-fb-input-allowfullscreen" class="ae-fb-embed-params"> Allow Fullscreen?
	    		</label>
	    	</p>
	    	<p>
	    		<label>
	    			<input type="checkbox" id="ae-fb-input-autoplay" class="ae-fb-embed-params"> Auto play video?
	    		</label>
	    	</p>
	    	<p>
	    		<label for="ae-fb-input-url">SHORTCODE</label>
	    		<input type="text" class="widefat" id="ae_output_shortcode" readonly>
	    	</p>
	    	<p>
	    		<a class="button button-primary button-large" href="#" id="ae-fb-video-embed-btn-insert">Insert Shortcode to Editor</a>
	    	</p>
	    	</form>
    	</div>`;

    	$("body").append(ae_fb_embed_window);
    };

    window.open_ae_fb_video_embedder = function (e) {
	    e.preventDefault();
	    $('#ae-fb-video-embed-dialog').dialog('open');
    };

    window.insert_ae_fb_shorcode = function(e){
    	e.preventDefault();
		var ae_wp_editor_active = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
		if(ae_wp_editor_active){

			if ($("#ae-fb-input-url").val()==="" || ! ae_is_validate_url($("#ae-fb-input-url").val())){
				alert("Please enter a valid facebook video url");
				return;
			}

			if ($("#ae-fb-input-width").val()==="" || $("#ae-fb-input-width").val() < 220 ){
				alert("Video container width should be at least 220px");
				return;
			}

			tinymce.activeEditor.execCommand('mceInsertContent', false, $("#ae_output_shortcode").val());
			$("#ae-fb-video-embed-form")[0].reset();
			$('#ae-fb-video-embed-dialog').dialog('close');

		}else{
			alert("OOoops! wordpress default editor not found or you are currently not using the visual editor, switch to wp visual editor and try again or copy/paste the generated shortcode instead.");
		}
    	
    };

    window.build_ae_shortcode = function(){
    	var ae_fb_embed_shortcode_begin = "[ae-fb-embed";
    	var ae_fb_embed_shortcode_end = "]";
    	var ae_fb_embed_params = $(".ae-fb-embed-params");
    	var ae_fb_embed_shortcode = "";
    	var ae_fb_out_params = "";
    	$.each(ae_fb_embed_params, function(key, value){
    		var param = value.id.replace("ae-fb-input-", "");

    		if( param === "url" && value.value != ""){
    			ae_fb_out_params += " url='" + value.value + "'";
    		}

    		if(param === "width" && value.value >= 220){
    			ae_fb_out_params += " width='" + value.value + "'";
    		}

    		if(param === "showtext" && $(this).is(":checked")){
    			ae_fb_out_params += " showtext='true'";
    		}

    		if(param === "showcaptions" && $(this).is(":checked")){
    			ae_fb_out_params += " showcaptions='true'";
    		}

    		if(param === "allowfullscreen" && $(this).is(":checked")){
    			ae_fb_out_params += " allowfullscreen='true'";
    		}

    		if(param === "autoplay" && $(this).is(":checked")){
    			ae_fb_out_params += " autoplay='true'";
    		}

    	});

    	ae_fb_embed_shortcode = ae_fb_embed_shortcode_begin + ae_fb_out_params + ae_fb_embed_shortcode_end;
    	$("#ae_output_shortcode").val(ae_fb_embed_shortcode);	
    };

	window.ae_is_validate_url = function(url) {
		if (/^https:\/\/www\.facebook\.com\/([^\/?].+\/)?video(s|\.php)[\/?].*$/gm.test(url)){
     		return true;
     	}else{
     		return false;
		}
	};
});
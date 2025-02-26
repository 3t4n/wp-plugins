(function() {
    tinymce.create('tinymce.plugins.animate_button', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
			ed.addButton('animate_button', {
				title : 'Animate Shortcode',
                cmd : 'animate_button',
                image : url + '/animate_button.png'
            });
			ed.addCommand('animate_button', function() {
				tb_show( 'Animate Content Options', '#TB_inline?height=600&inlineId=animate_content_form' );
            });
 		},
 
        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },
 
        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Animate Content Shortcode',
                author : 'Nicolas Grillet',
                authorurl : 'http://www.erreurs404.net',
                infourl : 'http://www.devictio.fr',
                version : "1.0.0"
            };
        }
    });
 
    // Register plugin
    tinymce.PluginManager.add( 'animate_button', tinymce.plugins.animate_button );
})();
// executes this when the DOM is ready
jQuery(function(){
	// creates a form to be displayed everytime the button is clicked
	// you should achieve this using AJAX instead of direct html code like this
	var form = jQuery('<div id="animate_content_form"><table id="mygallery-table" class="form-table">\
		<tr>\
			<th><label for="ac_effect">Effects</label></th>\
			<td><select name="ac_effect" id="ac_effect">\
        <optgroup label="Attention Seekers">\
          <option value="bounce">bounce</option>\
          <option value="flash">flash</option>\
          <option value="pulse">pulse</option>\
          <option value="rubberBand">rubberBand</option>\
          <option value="shake">shake</option>\
          <option value="swing">swing</option>\
          <option value="tada">tada</option>\
          <option value="wobble">wobble</option>\
        </optgroup>\
        <optgroup label="Bouncing Entrances">\
          <option value="bounceIn">bounceIn</option>\
          <option value="bounceInDown">bounceInDown</option>\
          <option value="bounceInLeft">bounceInLeft</option>\
          <option value="bounceInRight">bounceInRight</option>\
          <option value="bounceInUp">bounceInUp</option>\
        </optgroup>\
        <optgroup label="Bouncing Exits">\
          <option value="bounceOut">bounceOut</option>\
          <option value="bounceOutDown">bounceOutDown</option>\
          <option value="bounceOutLeft">bounceOutLeft</option>\
          <option value="bounceOutRight">bounceOutRight</option>\
          <option value="bounceOutUp">bounceOutUp</option>\
        </optgroup>\
        <optgroup label="Fading Entrances">\
          <option value="fadeIn">fadeIn</option>\
          <option value="fadeInDown">fadeInDown</option>\
          <option value="fadeInDownBig">fadeInDownBig</option>\
          <option value="fadeInLeft">fadeInLeft</option>\
          <option value="fadeInLeftBig">fadeInLeftBig</option>\
          <option value="fadeInRight">fadeInRight</option>\
          <option value="fadeInRightBig">fadeInRightBig</option>\
          <option value="fadeInUp">fadeInUp</option>\
          <option value="fadeInUpBig">fadeInUpBig</option>\
        </optgroup>\
        <optgroup label="Fading Exits">\
          <option value="fadeOut">fadeOut</option>\
          <option value="fadeOutDown">fadeOutDown</option>\
          <option value="fadeOutDownBig">fadeOutDownBig</option>\
          <option value="fadeOutLeft">fadeOutLeft</option>\
          <option value="fadeOutLeftBig">fadeOutLeftBig</option>\
          <option value="fadeOutRight">fadeOutRight</option>\
          <option value="fadeOutRightBig">fadeOutRightBig</option>\
          <option value="fadeOutUp">fadeOutUp</option>\
          <option value="fadeOutUpBig">fadeOutUpBig</option>\
        </optgroup>\
        <optgroup label="Flippers">\
          <option value="flip">flip</option>\
          <option value="flipInX">flipInX</option>\
          <option value="flipInY">flipInY</option>\
          <option value="flipOutX">flipOutX</option>\
          <option value="flipOutY">flipOutY</option>\
        </optgroup>\
        <optgroup label="Lightspeed">\
          <option value="lightSpeedIn">lightSpeedIn</option>\
          <option value="lightSpeedOut">lightSpeedOut</option>\
        </optgroup>\
        <optgroup label="Rotating Entrances">\
          <option value="rotateIn">rotateIn</option>\
          <option value="rotateInDownLeft">rotateInDownLeft</option>\
          <option value="rotateInDownRight">rotateInDownRight</option>\
          <option value="rotateInUpLeft">rotateInUpLeft</option>\
          <option value="rotateInUpRight">rotateInUpRight</option>\
        </optgroup>\
        <optgroup label="Rotating Exits">\
          <option value="rotateOut">rotateOut</option>\
          <option value="rotateOutDownLeft">rotateOutDownLeft</option>\
          <option value="rotateOutDownRight">rotateOutDownRight</option>\
          <option value="rotateOutUpLeft">rotateOutUpLeft</option>\
          <option value="rotateOutUpRight">rotateOutUpRight</option>\
        </optgroup>\
        <optgroup label="Sliders">\
          <option value="slideInDown">slideInDown</option>\
          <option value="slideInLeft">slideInLeft</option>\
          <option value="slideInRight">slideInRight</option>\
          <option value="slideOutLeft">slideOutLeft</option>\
          <option value="slideOutRight">slideOutRight</option>\
          <option value="slideOutUp">slideOutUp</option>\
        </optgroup>\
        <optgroup label="Specials">\
          <option value="hinge">hinge</option>\
          <option value="rollIn">rollIn</option>\
          <option value="rollOut">rollOut</option>\
        </optgroup>\
      </select><br />\
			<small>Select the effect you want for this element.</small></td>\
		</tr>\
		<tr>\
			<th><label for="ac_duration">Duration</label></th>\
			<td><input type="text" value="2s" name="ac_duration" id="ac_duration">\<br />\
			<small>Set the effect duration.</small></td>\
		</tr>\
		<tr>\
			<th><label for="ac_delay">Delay</label></th>\
			<td><input type="text" value="5s" name="ac_delay" id="ac_delay">\<br />\
			<small>Set the effect duration.</small></td>\
		</tr>\
		<tr>\
			<th><label for="ac_offset">Offset</label></th>\
			<td><input type="text" value="0" name="ac_offset" id="ac_offset">\<br />\
			<small>Set the effect offset (distance to the element when triggering the animation).</small></td>\
		</tr>\
		<tr>\
			<th><label for="ac_iteration">Iteraction</label></th>\
			<td><input type="text" value="0" name="ac_iteration" id="ac_iteration">\<br />\
			<small>Set the effect duration.</small></td>\
		</tr>\	</table>\
	<p class="submit">\
		<input type="button" id="animate_content_submit" class="button-primary" value="Insert Effect" name="submit" />\
	</p>\
	</div>');
	
	var table = form.find('table');
	form.appendTo('body').hide();
	
	// handles the click event of the submit button
	form.find('#animate_content_submit').click(function(){
		selected = tinyMCE.activeEditor.selection.getContent();
		var options = { 
			'effect'    	: 'bounce',
			'iteration'    	: '0',
			'delay'    		: '5s',
			'duration' 		: '2s',
			'offset'    	: '0'
		};
		var shortcode = '[animate_content';
		
		for( var index in options) {
			var value = table.find('#ac_' + index).val();
			
			shortcode += ' ' + index + '="' + value + '"';
		}
		
		shortcode += ']'+selected+'[/animate_content]';
		// inserts the shortcode into the active editor
		tinyMCE.activeEditor.execCommand('mceInsertContent', false, shortcode);
		
		// closes Thickbox
		tb_remove();
	});
});
// Docu : http://wiki.moxiecode.com/index.php/TinyMCE:Create_plugin/3.x#Creating_your_own_plugins

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('minecraftblock');
	tinymce.create('tinymce.plugins.minecraftblock', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');
			ed.addCommand('mceminecraftblock', function() {
				ed.windowManager.open({
					file : url + '/window.php',
					width : 360 + ed.getLang('minecraftblock.delta_width', 0),
					height : 210 + ed.getLang('minecraftblock.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});
			// Register example button
			ed.addButton('minecraftblock', {
				title : 'minecraftblock.desc',
				cmd : 'mceminecraftblock',
				image : url + '/minecraftblock.png'
			});
			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('minecraftblock', n.nodeName == 'IMG');
			});
		},
		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
					longname  : 'Minecraft Block',
					author 	  : 'Drew Gourley',
					authorurl : 'http://drewgourley.com',
					infourl   : 'http://drewgourley.com/blog/minecraft-block/',
					version   : "1.0"
			};
		}
	});
	// Register plugin
	tinymce.PluginManager.add('minecraftblock', tinymce.plugins.minecraftblock);
})();



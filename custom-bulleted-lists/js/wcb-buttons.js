(function() {
       tinymce.PluginManager.add('wc_bullet_button', function( editor, url ) {
           editor.addButton('wc_bullet_button', {
                       text: 'Custom Bullet',
                       icon: false,
                       type: 'menubutton',
                       menu: [
                       {
                        text: 'Check',
			icon: 'icon dashicons dashicons-yes',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common check-button"><li>&#0;</li></ul>');
                                  }
                        },
                       {
                        text: 'Cross',
			icon: 'icon dashicons dashicons-no',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common cross-button"><li> &#0; </li></ul>');
                                  }
                        },
                       {
                        text: 'Plus',
			icon: 'icon dashicons dashicons-plus',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common plus-button"><li> &#0; </li></ul>');
                                  }
                        },
                       {
                        text: 'Circle-Plus',
			icon: 'icon dashicons dashicons-plus-alt',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common circle-plus-button"><li>&#0;</li></ul>');
                                  }
                        },
                       {
                        text: 'Circle Cross',
			icon: 'icon dashicons dashicons-dismiss',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common circle-cross-button"><li>&#0;</li></ul>');
                                  }
                        },
                       {
                        text: 'Star',
			icon: 'icon dashicons dashicons-star-filled',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common star-button"><li>&#0;</li></ul>');
                                  }
                        },
                       {
                        text: 'Warning',
			icon: 'icon dashicons dashicons-warning',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common warning-button"><li>&#0;</li></ul>');
                                  }
                        },
                       {
                        text: 'Idea',
			icon: 'icon dashicons dashicons-lightbulb',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common idea-button"><li>&#0;</li></ul>');
                                  }
                        },
                       {
                        text: 'Right-Arrow',
			icon: 'icon dashicons dashicons-arrow-right',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common arrow-button"><li>&#0;</li></ul>');
                                  }
                        },
                       {
                        text: 'Right-Arrow-Light',
			icon: 'icon dashicons dashicons-arrow-right-alt',
                        onclick: function() {
                        editor.insertContent( '<ul class="wcb-button cb-common arrow-alt-button"><li>&#0;</li></ul>');
                                  }
                        }
                       ]
             });
       });
})();

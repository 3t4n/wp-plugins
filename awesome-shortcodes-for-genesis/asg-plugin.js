(function() {
	tinymce.PluginManager.add('asg_shortcodes', function( editor, url ) {
		editor.addButton( 'asg_shortcodes', {
                        title: 'ASG Shortcodes',
                        icon: 'icon asg-admin-icon',
                        type: 'menubutton',
                        menu: [
                        {
                            text: 'Box',
                            onclick: function() {
                                editor.windowManager.open( {
                                title: 'Insert Content Box',
                                body: [
                                    { type: 'listbox', name: 'boxcolor', label: 'Box Background Color', 
                                    'values': [
                                        {text: 'Teal', value: 'asg-content-box boxcolor="teal"'},
                                        {text: 'Blue', value: 'asg-content-box boxcolor="blue"'},
                                        {text: 'Grey', value: 'asg-content-box boxcolor="grey"'},
                                        {text: 'Green', value: 'asg-content-box boxcolor="green"'},
                                        {text: 'Purple', value: 'asg-content-box boxcolor="purple"'},
                                        {text: 'Red', value: 'asg-content-box boxcolor="red"'},
                                        {text: 'Yellow', value: 'asg-content-box boxcolor="yellow"'}
                                    ]
                                    },
                                    { type: 'textbox', name: 'boxtitle', label: 'Box Title'},
                                    { type: 'checkbox', name: 'boldtitle', label: 'Bold Title'},
                                    { type: 'textbox', name: 'boxcontent', multiline: true, minWidth: 300, minHeight: 150, label: 'Box Content', value: editor.selection.getContent()},
                                    { type: 'checkbox', name: 'boxexpand', label: 'Expandable Content'},
                                    { type: 'checkbox', name: 'showcontent', label: 'Show Content By Default'}
                                ],
                                onsubmit: function( e ) {
                                    editor.insertContent( '[' + e.data.boxcolor + ' boxtitle="' + e.data.boxtitle + '" boldtitle="' + e.data.boldtitle + '" boxexpand="' + e.data.boxexpand + '" showcontent="' + e.data.showcontent + '"]' + e.data.boxcontent + '[/asg-content-box]' );
                                }
            		});
                        }
                        },
                        {
                            text: 'Buttons',
                            onclick: function() {
                                editor.windowManager.open( {
                                title: 'Insert Buttons',
                                body: [
                                    { type: 'listbox', name: 'buttoncolor', label: 'Button Type', 
                                    'values': [
                                        {text: 'Teal', value: 'asg-button color="teal"'},
                                        {text: 'Blue', value: 'asg-button color="blue"'},
                                        {text: 'Grey', value: 'asg-button color="grey"'},
                                        {text: 'Green', value: 'asg-button color="green"'},
                                        {text: 'Purple', value: 'asg-button color="purple"'},
                                        {text: 'Red', value: 'asg-button color="red"'},
                                        {text: 'Yellow', value: 'asg-button color="yellow"'},
                                        {text: 'Amazon', value: 'asg-button color="amazon"'},
                                        {text: 'Apple', value: 'asg-button color="apple"'},
                                        {text: 'Play Store', value: 'asg-button color="play"'}
                                    ]
                                    },
                                    { type: 'textbox', name: 'buttoncontent', label: 'Button Text', value: editor.selection.getContent()},
                                    { type: 'textbox', name: 'buttonlink', label: 'Link URL', minWidth: 300},
                                    { type: 'checkbox', name: 'buttonwindow', label: 'Open In New Window'},
                                    { type: 'listbox', name: 'buttonfollow', label: 'rel Attribute', 
                                    'values': [
                                        {text: 'None', value: 'none'},
                                        {text: 'Nofollow', value: 'nofollow'},
                                        {text: 'Noreferrer', value: 'noreferrer'},
                                        {text: 'Author', value: 'author'},
                                        {text: 'Bookmark', value: 'bookmark'},
                                        {text: 'Help', value: 'help'},
                                        {text: 'License', value: 'license'},
                                        {text: 'Next', value: 'next'},
                                        {text: 'Previous', value: 'prev'},
                                        {text: 'Search', value: 'search'},
                                        {text: 'Alternate', value: 'alternate'}
                                    ]
                                    }
                                ],
                                onsubmit: function( e ) {
                                    editor.insertContent( '[' + e.data.buttoncolor + ' link="' + e.data.buttonlink +'" newwindow="' + e.data.buttonwindow + '" rel="' + e.data.buttonfollow + '"]' + e.data.buttoncontent + '[/asg-button]' );
                                }
            		});
            		}
           		},
                        {
                            text: 'Columns',
                            menu: [
                                {
                                    text: 'Two Columns',
                                    onclick: function() {
                                    editor.insertContent( '[asg-column firstcolumn="first" columnno="half"] [/asg-column][asg-column columnno="half"] [/asg-column]' );
                                }            		
                        },
                        {
                                    text: 'Three Columns',
                                    onclick: function() {
                                    editor.insertContent( '[asg-column firstcolumn="first" columnno="third"] [/asg-column][asg-column columnno="third"] [/asg-column][asg-column columnno="third"] [/asg-column]' );
                                }
                        },
                        {
                                    text: 'Four Columns',
                                    onclick: function() {
                                    editor.insertContent( '[asg-column firstcolumn="first" columnno="fourth"] [/asg-column][asg-column columnno="fourth"] [/asg-column][asg-column columnno="fourth"] [/asg-column][asg-column columnno="fourth"] [/asg-column]' );
                                }
                        },
                        {
                                    text: 'Six Columns',
                                    onclick: function() {
                                    editor.insertContent( '[asg-column firstcolumn="first" columnno="sixth"] [/asg-column][asg-column columnno="sixth"] [/asg-column][asg-column columnno="sixth"] [/asg-column][asg-column columnno="sixth"] [/asg-column][asg-column columnno="sixth"] [/asg-column][asg-column columnno="sixth"] [/asg-column]' );
                                }
                        }
                        ]
           		},
                        {
                            text: 'Video',
                            menu: [
                                {
                                    text: 'YouTube',
                                    onclick: function(){
                                        editor.windowManager.open( {
                                title: 'Insert YouTube Video',
                                body: [
                                    { type: 'textbox', name: 'videourl', label: 'Video URL'},
                                    { type: 'textbox', name: 'videotitle', label: 'Video Title'},
                                    { type: 'textbox', name: 'videohh', label: 'Video Duration: (TXXHXXMXXS)', width: '20px'},
                                    { type: 'textbox', name: 'videothumbnail', label: 'Video Thumbnail', minWidth: 300},
                                    { type: 'textbox', name: 'videodescription', label: 'Video Description', multiline: true, minWidth: 300, minHeight: 150,},
                                ],
                                onsubmit: function( e ) {
                                    editor.insertContent( '[youtube src="' + e.data.videourl + '" title="' + e.data.videotitle + '" duration="' + e.data.videohh +'" thumbnail="'+ e.data.videothumbnail + '" description="' + e.data.videodescription + '"]');
                                }
                                });
                                }
                                }
                            ]
                        },
                        {
                            text: 'Code',
                            menu: [
                                {
                                    text: 'Gist',
                                    onclick: function(){
                                        editor.windowManager.open( {
                                title: 'Insert Gist',
                                body: [
                                    { type: 'textbox', name: 'username', label: 'User Name'},
                                    { type: 'textbox', name: 'gistid', label: 'Gist ID'}
                                ],
                                onsubmit: function( e ) {
                                    editor.insertContent( '[gist file="' + e.data.gistid + '" username="' + e.data.username + '"]');
                                }
                                });
                                }
                                }
                            ]
                        },
                        {
                            text: 'Giveaway',
                            menu: [
                                {
                                    text: 'Punchtab',
                                    onclick: function(){
                                        editor.windowManager.open( {
                                title: 'Insert Punchtab Giveaway',
                                body: [
                                    { type: 'textbox', name: 'datauid', label: 'UID'}
                                ],
                                onsubmit: function( e ) {
                                    editor.insertContent( '[punchtab datauuid="' + e.data.datauid + '"]');
                                }
                                });
                                }
                                },
                                {
                                text: 'Rafflecopter',
                                onclick: function(){
                                    editor.windowManager.open( {
                                    title: 'Insert Rafflecopter Giveaway',
                                    body: [
                                        { type: 'textbox', name: 'giveawayid', label: 'Giveaway ID'},
                                        { type: 'textbox', name: 'title', label: 'Title'}
                                    ],
                                onsubmit: function( e ) {
                                    editor.insertContent( '[rafflecopter raffleid="' + e.data.giveawayid + '" title="' + e.data.title +'"]');
                                }
                                });
                                }
                                }
                            ]
                        }
                        ]
		});
	});
})();
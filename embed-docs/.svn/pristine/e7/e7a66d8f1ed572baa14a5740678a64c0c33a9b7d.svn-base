

const { MediaUpload } = wp.editor;
const { Button } = wp.components;
let rawAssetUrl = window.location.href.split("/");
var assetPath = '';
if (rawAssetUrl[2] == "localhost") {
    assetPath = rawAssetUrl[0] + "//" + rawAssetUrl[2] + "/" + rawAssetUrl[3] + "/wp-content/plugins/embed-docs/assets/";
} else {
    assetPath = rawAssetUrl[0] + "//" + rawAssetUrl[2] + "/wp-content/plugins/embed-docs/assets/";
}
wp.blocks.registerBlockType('fileuploader/eaf', {
    title: 'Embed any file',
    icon: 'media-document',
    category: 'media',
    attributes: {
        mediaUrl: { type: 'string' },
        normalUrl: { type: 'string' },
        driveUrl: { type: 'string' },
        //dropboxUrl: { type: 'string' },
        //boxUrl: { type: 'string' },
        //onedriveUrl: { type: 'string' },
        domain: { type: 'string' },
        prv_url: { type: 'string' },
        url: { type: 'string' }
    },
    edit: function (props) {

        var url = "";
        if (props.attributes.domain == 1) {
            url = "https://view.officeapps.live.com/op/view.aspx?src=" + props.attributes.prv_url;
        }
        else if (props.attributes.domain == 2) {
            url = "https://docs.google.com/viewerng/viewer?url=" + props.attributes.prv_url + "&embedded=true";
        }
        else {
            url = props.attributes.prv_url;
        }

        function fileexcelSelect(file) {
            console.log(file);
            props.setAttributes({
                mediaUrl: file.url,
                normalUrl: '',
                driveUrl: '',
                domain: 1,
                prv_url: file.url,
                url: file.url
            })
        }
        function filepdfSelect(file) {
            console.log(file);
            props.setAttributes({
                mediaUrl: file.url,
                normalUrl: '',
                driveUrl: '',
                domain: 2,
                prv_url: file.url,
                url: file.url
            })
        }

        function filepptSelect(file) {
            console.log(file);
            props.setAttributes({
                mediaUrl: file.url,
                normalUrl: '',
                driveUrl: '',
                domain: 1,
                prv_url: file.url,
                url: file.url
            })
        }

        function filedocxSelect(file) {
            console.log(file);
            props.setAttributes({
                mediaUrl: file.url,
                normalUrl: '',
                driveUrl: '',
                domain: 1,
                prv_url: file.url,
                url: file.url
            })
        }

        function updateNormalUrl(event) {
            var raw_url = event.target.value.split("/");
            props.setAttributes({
                mediaUrl: '',
                normalUrl: event.target.value,
                driveUrl: '',
                domain: 2,
                prv_url: event.target.value,
                url: event.target.value
            })
        }

        function updateDriveUrl(event) {
            var raw_url = event.target.value.split("/");
            var prev_url = raw_url[0] + "//" + raw_url[2] + "/" + raw_url[3] + "/" + raw_url[4] + "/" + raw_url[5] + "/preview";
            props.setAttributes({
                mediaUrl: '',
                normalUrl: '',
                driveUrl: event.target.value,
                domain: 4,
                prv_url: prev_url,
                url: event.target.value
            })
        }

       /* function updateDropboxUrl(event) {
            var raw_url = event.target.value.split("/");
            props.setAttributes({
                mediaUrl: '',
                normalUrl: '',
                dropboxUrl: event.target.value,
                driveUrl: '',
                boxUrl: '',
                onedriveUrl: '',
                domain: 4,
                prv_url: '',
                url: ''
            })
        }

        function updateBoxUrl(event) {
            var raw_url = event.target.value.split("/");
            props.setAttributes({
                mediaUrl: '',
                normalUrl: '',
                dropboxUrl: '',
                driveUrl: '',
                boxUrl: event.target.value,
                onedriveUrl: '',
                domain: 5,
                prv_url: '',
                url: ''
            })
        }

        function updateOnedriveUrl(event) {
            var raw_url = event.target.value.split("/");
            props.setAttributes({
                mediaUrl: '',
                normalUrl: '',
                dropboxUrl: '',
                driveUrl: '',
                boxUrl: '',
                onedriveUrl: event.target.value,
                domain: 6,
                prv_url: '',
                url: ''
            })
        }
*/

        return React.createElement("div", {
            className: "eaf_file_embed_container"
        }, React.createElement("div", {
            className: "eaf_file_embed_header"
        },
		/*#__PURE__*/
		React.createElement("h4", null, "Embed any file"),
		/*#__PURE__*/
		React.createElement("small", null, "Upload a document, pick from your media library, or add from an external URL.")),


        // upload excel file/media library
        /*#__PURE__*/React.createElement(MediaUpload, {
            onSelect: fileexcelSelect,
            value: '',
            render: ({
                open
            }) => /*#__PURE__*/React.createElement("div", {
                className: "eaf_file_embed_card",
                onClick: open,
                role: 'button'
            },
            
            /*#__PURE__React.createElement("span", {
                className: "block-editor-block-types-list__item-icon"
            }, /*#__PURE__React.createElement("span", {
                className: "block-editor-block-icon has-colors"
            }, /*#__PURE__React.createElement("span", {
                className: "dashicon dashicons dashicons-upload"
            }))), */

            React.createElement("img", {
                width: "512",
                alt: "Google Drive icon (2020)",
                src: assetPath + "xls-icon.png"
            }),
            /*#__PURE__*/React.createElement("p", null, "Upload Excel File"))
        }),

        // upload pdf file /media library
        /*#__PURE__*/React.createElement(MediaUpload, {
            onSelect: filepdfSelect,
            value: '',
            render: ({
                open
            }) => /*#__PURE__*/React.createElement("div", {
                className: "eaf_file_embed_card",
                onClick: open,
                role: 'button'
            },
            
            /*#__PURE__React.createElement("span", {
                className: "block-editor-block-types-list__item-icon"
            }, /*#__PURE__React.createElement("span", {
                className: "block-editor-block-icon has-colors"
            }, /*#__PURE__React.createElement("span", {
                className: "dashicon dashicons dashicons-upload"
            }))), */
                
            React.createElement("img", {
                width: "512",
                alt: "Google Drive icon (2020)",
                src: assetPath + "pdf-icon.png"
            }),

                /*#__PURE__*/
                React.createElement("p", null, "Upload Pdf File"))
        }),

         // upload ppt file /media library
        /*#__PURE__*/React.createElement(MediaUpload, {
            onSelect: filepptSelect,
            value: '',
            render: ({
                open
            }) => /*#__PURE__*/React.createElement("div", {
                className: "eaf_file_embed_card",
                onClick: open,
                role: 'button'
            },
            
            /*#__PURE__React.createElement("span", {
                className: "block-editor-block-types-list__item-icon"
            }, /*#__PURE__React.createElement("span", {
                className: "block-editor-block-icon has-colors"
            }, /*#__PURE__React.createElement("span", {
                className: "dashicon dashicons dashicons-upload"
            }))), */
            
            React.createElement("img", {
                width: "512",
                alt: "Google Drive icon (2020)",
                src: assetPath + "ppt-icon.png"
            }),
            /*#__PURE__*/React.createElement("p", null, "Upload PPT File"))
        }),

         // upload word file /media library
        /*#__PURE__*/React.createElement(MediaUpload, {
            onSelect: filedocxSelect,
            value: '',
            render: ({
                open
            }) => /*#__PURE__*/React.createElement("div", {
                className: "eaf_file_embed_card",
                onClick: open,
                role: 'button'
            },
            
            /*#__PURE__React.createElement("span", {
                className: "block-editor-block-types-list__item-icon"
            }, /*#__PURE__React.createElement("span", {
                className: "block-editor-block-icon has-colors"
            }, /*#__PURE__React.createElement("span", {
                className: "dashicon dashicons dashicons-upload"
            }))), */
                
            React.createElement("img", {
                width: "512",
                alt: "Google Drive icon (2020)",
                src: assetPath + "word-icon.png"
            }),
            
            /*#__PURE__*/React.createElement("p", null, "Upload Word File"))
        }),


        // add link
         /*#__PURE__*/React.createElement("div", {
            className: "eaf_file_embed_card1"
         },
             /*#__PURE__
             React.createElement("span", {
            className: "block-editor-block-types-list__item-icon"
             },
                 /*#__PURE__
                 React.createElement("span", {
            className: "block-editor-block-icon has-colors"
                 },
                 /*#__PURE__
                React.createElement("span", {
            className: "dashicon dashicons dashicons-admin-links"
                })
                 )),
                  /*#__PURE__*/
            React.createElement("img", {
            width: "512",
            alt: "Google Drive icon (2020)",
            src: assetPath + "link-icon.png"
        }),

             /*#__PURE__*/
             React.createElement("input", {
            type: 'text',
            value: props.attributes.normalUrl,
            onChange: updateNormalUrl,
            placeholder: "Embed with file URL"
        })),

         
        // add google drive url
            /*#__PURE__*/
            React.createElement("div", {
            className: "eaf_file_embed_card1"
        },
         /*#__PURE__*/
            React.createElement("img", {
            width: "512",
            alt: "Google Drive icon (2020)",
            src: assetPath + "googledrive-icon.png"
        }),
            /*#__PURE__*/
            React.createElement("input", {
            type: 'text',
            value: props.attributes.driveUrl,
            onChange: updateDriveUrl,
            placeholder: "Embed File with DriveURL"
        })),


        // add dropboxUrl
            /*#__PURE__*/
           /* React.createElement("div", {
            className: "eaf_file_embed_card"
            },
             /*#__PURE__
                React.createElement("img", {
            width: "512",
            alt: "Dropbox Icon",
            src: assetPath + "icon-dropbox.png"
                }),
                 /*#__PURE__
                React.createElement("input", {
            type: 'text',
            value: props.attributes.dropboxUrl,
            onChange: updateDropboxUrl,
            placeholder: "Please enter file URL"
        })),


        // add boxUrl
            /*#__PURE__
            React.createElement("div", {
            className: "eaf_file_embed_card"
            },
                /*#__PURE__
                React.createElement("img", {
            width: "512",
            alt: "Box, Inc. logo",
            src: assetPath + "icon-box.png"
                }),
                /*#__PURE__
                React.createElement("input", {
            type: 'text',
            value: props.attributes.boxUrl,
            onChange: updateBoxUrl,
            placeholder: "Please enter file URL"
        })),


        // add onedrive url
        /*#__PURE__
        React.createElement("div", {
        className: "eaf_file_embed_card"
            },
        /*#__PURE__
        React.createElement("img", {
            width: "512",
            alt: "Microsoft Office OneDrive (2019–present)",
            src: assetPath + "icon-onedrive.png"
                }),
        /*#__PURE__
        React.createElement("input", {
            type: 'text',
            value: props.attributes.onedriveUrl,
            onChange: updateOnedriveUrl,
            placeholder: "Please enter embed URL"
        } 
        ) 
        ), */
        React.createElement("iframe", {
            src: url,
            width: 640,
            height: 480,
            allow: "autoplay"
        }));
    },
    save: function (props) {
        var url = '';
        if (props.attributes.domain == 1) {
            url = "https://view.officeapps.live.com/op/view.aspx?src=" + props.attributes.prv_url;
        }
        
        else if (props.attributes.domain == 2) {
            url = "https://docs.google.com/viewerng/viewer?url=" + props.attributes.prv_url + "&embedded=true";
        }
        else {
            url = props.attributes.prv_url;
        }

        return React.createElement("div", null,
            /*#__PURE__*/
            React.createElement("iframe", {
            src: url,
            width: 650,
            height: 650,
            allow: "autoplay"
        }), React.createElement("a", {
            href: props.attributes.prv_url,
            download: "",
            rel: 'noopener'
        }, /*#__PURE__*/React.createElement("button", {
            type: "button",
            style: "background-color: #C1272D; padding: 10px 30px; border-radius: 6px; border: 0; color: white; font-family:lato; font-size:16px;"
        }, "Download")),
            /*#__PURE__*/ 
			 React.createElement("a", {
                style:"color:#C1272D !important; display:inline-block !important; float:right !important; font-family:lato !important; font-size:15px; font-weight:600; visibility:hidden;",
                href: "https://a1office.co",
                A1Office: "",
                rel: 'noopener'
            }, "Powered By A1office" )  );

    

        
    
    }
})
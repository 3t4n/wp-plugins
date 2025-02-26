jQuery(document).ready(function () {
    if(jQuery('#textEditor').length > 0){
        
        tinymce.init({
            selector: '#textEditor',
            license_key: 'gpl',
            height: "700px",
            menubar: false,
            forced_root_block: false,
            placeholder: "Write something ...",
            branding: false,
            plugins: jQuery('.reviewArticle').length <= 0 ? [
                "advlist", "autolink", "lists", "link", "image", "charmap", "anchor", "searchreplace", "visualblocks",
                "code", "fullscreen", "insertdatetime", "media", "table", "preview", "help", "wordcount",
            ] : [
                "advlist", "autolink", "lists", "link", "image", "charmap", "print", "anchor", "searchreplace", "visualblocks",
                "code", "fullscreen", "insertdatetime", "media", "table", "preview", "paste", "help", "wordcount", "autoresize",
            ],
            toolbar: 'viewHtmlButton | copyButton | pdfButton | wordButton | formatselect | fontselect | fontsizeselect | bold italic underline | image media link | forecolor backcolor | align | alignright | alignjustify lineheight checklist bullist numlist indent outdent | removeformat typography | help',
            fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            font_formats: "Inter=Inter,sans-serif; Arial=arial,helvetica,sans-serif; Times New Roman=times new roman,times,serif",
            content_css: [
                "http://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap",
                "http://fonts.googleapis.com/css2?family=Domine:wght@400..700&display=swap",
                "http://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&display=swap",
                "http://fonts.googleapis.com/css2?family=Crimson+Pro:ital,wght@0,200..900;1,200..900&family=Quicksand:wght@300..700&display=swap",
                "http://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Nanum+Myeongjo&family=Noto+Serif+JP&display=swap",
            ],
            image_title: true, 
            image_dimensions: true, 
            image_resize: true,
            automatic_uploads: true,
            file_picker_types: "image",
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement("input");
                input.setAttribute("type", "file");
                input.setAttribute("accept", "image/*");
                input.onchange = function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function () {
                        var id = "blobid" + (new Date()).getTime();
                        var blobCache = window.tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(",")[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            },
            content_style: 'body { padding:0px 15px 8px 15px; font-family:Inter; font-size:14px } h1 {font-size: 24pt;} h2 {font-size: 21px;} .tooltip-editor{position:relative} .tooltip-editor::after { content: attr(data-mce-href); visibility: hidden; position: absolute; left: 50%; transform: translateX(-50%); top: calc(100% + 10px); bottom: auto; background: #1c2133; color: white; font-size: 12px; font-family: Inter; font-style: normal; font-weight: 400; line-height: 120%; padding: 8px; border-radius: 8px; z-index: 1; opacity: 0; text-align: center; width: 100%; max-width: max-content; } .tooltip-editor::before { content: ""; visibility: hidden; position: absolute; top: calc(100% + -8px); left: 50%; transform: translateX(-50%) rotate(90deg); margin-left: -5px; width: 0px; height: 0px; border-style: solid; border-width: 15px 15px 15px 0; border-color: transparent #1c2133 transparent transparent; } .tooltip-editor:hover::after, .tooltip-editor:hover::before { visibility: visible; opacity: 1; img { max-width: 100% !important; height: auto !important; } .mce-content-body img { outline: 0px !important; } }',
            setup: function (editor) {
                
                editor.on('init', function () {
                    var css = '::-webkit-scrollbar { width: 0.25rem; } ::-webkit-scrollbar-track { background-color: #ebebed; border-radius: 10px;} ::-webkit-scrollbar-thumb { background-color: #0039ff; border-radius: 10px; }';
                    editor.dom.addStyle(css);
                });
                
                if(jQuery('.faqSchema').length > 0){
                    editor.on('keyup', function () {
                        handleFAQEditorChange(editor.getContent());
                    });
                }
                
                if(jQuery('.article').length > 0){
                    editor.on('keyup', function () {
                        handleArticleChange(editor.getContent());
                    });
                }
                
                editor.on('mouseover', function (e) {
                    var target = e.target;
                    if (target.nodeName === "IMG" && target.src && target.src.indexOf("ai-tool-generated-images") !== -1) {
                            var clickEvent = new MouseEvent("click", {
                            bubbles: true,
                            cancelable: true,
                            view: window
                        });
                        target.dispatchEvent(clickEvent);
                        
                        var rect = target.getBoundingClientRect();
                            var elements = document.getElementsByClassName("upload-image-tooltip");
                            for (var i = 0; i < elements.length; i++) {
                              elements[i].style.display = "block";
                              elements[i].style.width = "max-content";
                              elements[i].style.top = rect.top + (rect.height / 2) + 30 + "px";
                              elements[i].style.left = rect.left + (rect.width / 2) + "px";
                            }
                    } else {
                        var elements = document.getElementsByClassName("upload-image-tooltip");
                        for (var i = 0; i < elements.length; i++) {
                          elements[i].style = "";
                        }
                    }
                });
                
               
                if(jQuery('.reviewArticle').length <= 0){
                    editor.ui.registry.addButton('viewHtmlButton', {
                        text: "View HTML",
                        class: "MyCoolBtn",
                        tooltip: "View HTML",
                        classes: "ampforwp-copy-content-button",
                        onAction: function () {
                            var selectedText = editor.getContent({format: 'html'});
                            jQuery('.textEditerArea.html-content').css('visibility', 'visible').css('height', '900px');
                            jQuery('.custom-text-editor').css('visibility', 'hidden').addClass('d-none');
                            handleArticleEditorChange(selectedText);
                        }
                    });
                }
                
                editor.ui.registry.addIcon('my-custom-copy-icon', '<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.8323 0H5.11034C4.13392 0 3.3395 0.794414 3.3395 1.77083V1.98817H2.16829C1.19188 1.98817 0.397461 2.78258 0.397461 3.759V14.2292C0.397461 15.2057 1.19188 16.0001 2.16829 16.0001H8.89028C9.86669 16.0001 10.661 15.2057 10.661 14.2292V14.0119H11.8322C12.8087 14.0119 13.6031 13.2175 13.6031 12.2411V1.77083C13.6032 0.794414 12.8087 0 11.8323 0ZM9.51883 14.2292C9.51883 14.5758 9.23684 14.8578 8.89035 14.8578H2.16829C1.82173 14.8578 1.53974 14.5758 1.53974 14.2292V3.75892C1.53974 3.41236 1.82173 3.13037 2.16829 3.13037H8.89028C9.23684 3.13037 9.51876 3.41236 9.51876 3.75892V14.2292H9.51883ZM12.4609 12.2411C12.4609 12.5876 12.1789 12.8696 11.8323 12.8696H10.6611V3.75892C10.6611 2.78251 9.86669 1.98809 8.89035 1.98809H4.48178V1.77075C4.48178 1.42419 4.76377 1.1422 5.11034 1.1422H11.8323C12.1789 1.1422 12.4609 1.42419 12.4609 1.77075V12.2411Z" fill="#0039FF"></path></svg>');
                editor.ui.registry.addButton('copyButton', {
                    icon: "my-custom-copy-icon",
                    class: "MyCoolBtn",
                    tooltip: "Copy Content",
                    classes: "ampforwp-copy-content-button",
                    onAction: function () {
                        var selectedText = editor.getContent({format: 'html'});
                        var beautifiedContent = html_beautify(selectedText);
                        function listener(e) {
                            e.clipboardData.setData("text/html", beautifiedContent);
                            e.clipboardData.setData("text/plain", beautifiedContent);
                            e.preventDefault();
                        }
                        document.addEventListener("copy", listener);
                        document.execCommand("copy");
                        document.removeEventListener("copy", listener);
                        toastr.success('Text has been copied to clipboard.', 'Success');
                    }
                });
                
                if(jQuery('.reviewArticle').length <= 0){
                    editor.ui.registry.addIcon('my-custom-pdf-icon', '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path><path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6"></path><path d="M17 18h2"></path><path d="M20 15h-3v6"></path><path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z"></path></svg>');
                    editor.ui.registry.addButton('pdfButton', {
                        icon: "my-custom-pdf-icon",
                        class: "MyCoolBtn",
                        tooltip: "Export to PDF",
                        classes: "ampforwp-copy-content-button",
                        onAction: function () {
                            handleExportToWordOrPdfArticle(editor.getContent(), 'pdf');
                        }
                    });

                    editor.ui.registry.addIcon('my-custom-word-icon', '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path><path d="M2 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z"></path><path d="M17 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0"></path><path d="M9.5 15a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1 -3 0v-3a1.5 1.5 0 0 1 1.5 -1.5z"></path><path d="M19.5 15l3 6"></path><path d="M19.5 21l3 -6"></path></svg>');
                    editor.ui.registry.addButton('wordButton', {
                        icon: "my-custom-word-icon",
                        class: "MyCoolBtn",
                        tooltip: "Export to Docx",
                        classes: "ampforwp-copy-content-button",
                        onAction: function () {
                            handleExportToWordOrPdfArticle(editor.getContent(), 'doc');
                        }
                    });
                }
                
                if(jQuery('.reviewArticle').length > 0 ){
                    editor.on('NodeChange', function (e) {
                        var selectedText = editor.selection.getContent({format: 'text'});
                        if (selectedText.length > 0) {
                            var range = editor.selection.getRng();
                            var rect = range.getBoundingClientRect();
                            handleTextSelection( selectedText, rect.top, rect.left );
                        }else{
                            jQuery('.reviewArticle .custom-tooltip').css('display', 'none');
                            jQuery('.reviewArticle textarea[name="selectedText"]').val( '' );
                        }
                    });
                }
                
                if(jQuery('.article').length > 0 ){
                    editor.on('NodeChange', function (e) {
                        var node = e.element;
                        var checkTitleArray = ["AI Generated Image", "AI Brand Images", "Pexels Free Images", "UnSplash Free Images", "Pixabay Free Images"];
                        if (node && node.nodeName === "IMG" && !node.dataset.imageInserted && node.title && checkTitleArray.includes(node.title) ) {
                            
                            var pElm = editor.dom.create("p", null, '<strong>Source :</strong> '+ node.title);
                            pElm.setAttribute("style", "font-size: 14px; font-weight: normal; margin: 1em 0;");
                            node.dataset.imageInserted = true; node.title = "";
                            editor.dom.insertAfter(pElm, node);

                            var nextSibling = pElm.nextSibling;
                            if (nextSibling && nextSibling.nodeName === "P" && nextSibling.textContent.includes("Source : ")) {
                                nextSibling.parentNode.removeChild(nextSibling);
                            } else {
                                var parentNode = pElm.parentNode;
                                var nextSibling = parentNode.nextSibling;
                                if (nextSibling && nextSibling.nodeName === "P" && nextSibling.textContent.includes("Source : ")) {
                                    nextSibling.parentNode.removeChild(nextSibling);
                                }
                            }
                            if (node && node.nodeName === "IMG" && (node.width || node.height)) {
                                node.style.width = node.getAttribute("width")+'px';
                                node.style.height = node.getAttribute("height")+'px';
                                if (node.getAttribute("data-mce-style")) {
                                    node.style = node.getAttribute("data-mce-style");
                                }
                            }
                        }
                    });
                }
            }
        });
        
        function handleTextSelection(selectedText, topPos, leftPos) {
            
            topPos = Number(topPos) + 40;
            leftPos = Number(leftPos) + 40;
            jQuery('.reviewArticle .custom-tooltip').css('display', 'block');
            jQuery('.reviewArticle .custom-tooltip').css('top', ''+ topPos +'px');
            jQuery('.reviewArticle .custom-tooltip').css('left', ''+ leftPos +'px');
            jQuery('.reviewArticle textarea[name="selectedText"]').val( selectedText );
            
        }
        
        function handleExportToWordOrPdfArticle( content, type ){
            jQuery("#addlly_loader").show();
            
            var articleTempText = "<body>"+ content +"</body>";
    
            var parser      = new DOMParser();
            var bodyText    = parser.parseFromString(articleTempText, 'text/html').body.outerHTML;
            articleTempText = bodyText.replaceAll("\n", " ").replaceAll("\t", " ").replace(/\s+/g, ' ').trim();

            var defaultStyle = 'html{ zoom:0.75; } body { font-family: Arial, sans-serif; font-size: 12px; line-height: 1.5; box-sizing: border-box; } h1 { display: block; font-size: 2em; margin-block-start: 0.67em; margin-block-end: 0.67em; margin-inline-start: 0px; margin-inline-end: 0px; font-weight: bold; }\
            h2 { display: block; font-size: 1.5em; margin-block-start: 0.83em; margin-block-end: 0.83em; margin-inline-start: 0px; margin-inline-end: 0px; font-weight: bold; }\
            h3 { display: block; font-size: 1.17em; margin-block-start: 1em; margin-block-end: 1em; margin-inline-start: 0px; margin-inline-end: 0px; font-weight: bold; }\
            ul { display: block; list-style-type: disc; margin-block-start: 1em; margin-block-end: 1em; margin-inline-start: 0px; margin-inline-end: 0px; padding-inline-start: 40px; }\
            p { display: block; margin-block-start: 1em; margin-block-end: 1em; margin-inline-start: 0px; margin-inline-end: 0px; }\
            img { height: auto; max-width: 80%; object-fit: cover; }'.replace(/\s+/g, ' ').trim();
            if (articleTempText.indexOf("<style>") === -1) {
              articleTempText = articleTempText.replace("</head>", '<style> '+ defaultStyle +' </style> </head>');
            } else {
              articleTempText = articleTempText.replace("<style>", '<style> '+ defaultStyle +'');
            }

            var parser = new DOMParser();
            var doc = parser.parseFromString(articleTempText, 'text/html');
            
            var imgTags = doc.querySelectorAll('img');
            if( imgTags.length > 0 ){
                var n = 0;
                jQuery.each(imgTags , function(index, img) { 
                    var imageUrl = jQuery(img).attr('src');
                    if (imageUrl.startsWith("data:")) {
                        return;
                    }
                    jQuery.ajax({
                        url: addlly_vars.ajax_url,
                        type: 'GET',
                        data: { action: 'addlly_get_img_base64', url: imageUrl, nonce: addlly_vars.nonce },
                        success: function(response) {
                            if (response) {
                                img.setAttribute("src", response);
                                n = Number(n) + 1;
                                if( n == imgTags.length){
                                    jQuery("#addlly_loader").hide();
                                    var finalHtml = doc.documentElement.outerHTML;
                                    if( type == 'pdf' ){
                                        html2pdf(finalHtml, {
                                            margin: 1,
                                            filename: 'Article-PDF-'+ Date.now() +'.pdf',
                                            image: { type: 'jpeg', quality: 0.98 },
                                            html2canvas: { scale: 2 },
                                            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                                        });
                                    }else{
                                        var blob = new Blob(['\ufeff', finalHtml], { type: 'application/msword' });
                                        var url = URL.createObjectURL(blob);

                                        var a = document.createElement('a');
                                        a.href = url;
                                        a.download = 'Article-Docx-'+ Date.now() +'.doc';

                                        document.body.appendChild(a);
                                        a.click();

                                        setTimeout(function() {
                                          document.body.removeChild(a);
                                          window.URL.revokeObjectURL(url);
                                        }, 0);
                                    }
                                }
                            }
                        },
                    });
                });
            }else{
                jQuery("#addlly_loader").hide();
                var finalHtml = doc.documentElement.outerHTML;
                if( type == 'pdf' ){
                    html2pdf(finalHtml, {
                        margin: 1,
                        filename: 'Article-PDF-'+ Date.now() +'.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2 },
                        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                    });
                }else{
                    var blob = new Blob(['\ufeff', finalHtml], { type: 'application/msword' });
                    var url = URL.createObjectURL(blob);

                    var a = document.createElement('a');
                    a.href = url;
                    a.download = 'Article-Docx-'+ Date.now() +'.doc';

                    document.body.appendChild(a);
                    a.click();

                    setTimeout(function() {
                      document.body.removeChild(a);
                      window.URL.revokeObjectURL(url);
                    }, 0);
                }
            }
        }
        
        jQuery(document).on("click", ".goBackBtn .back", function () {
            jQuery('.textEditerArea.html-content').css('visibility', 'hidden').css('height', '0px');
            jQuery('.custom-text-editor').css('visibility', 'visible').removeClass('d-none');
            var editor = jQuery('#monaco-editor-container').data('editor');
            tinymce.get('textEditor').setContent(html_beautify(editor.getValue()));
            
        });
        
        
        
        function handleArticleChange( content ){
            var tempElement = jQuery('<div>').html(content);
            var h1Count = tempElement.find('h1').length;
            var h2Count = tempElement.find('h2').length;
            var h3Count = tempElement.find('h3').length;
            jQuery('.heading-counts .h1-count').text(h1Count);
            jQuery('.heading-counts .h2-count').text(h2Count);
            jQuery('.heading-counts .h3-count').text(h3Count);
            var textContent = tempElement.text();
            var wordCount = textContent.trim().split(/\s+/).length;
            jQuery('.heading-counts .word-counts').text(wordCount);
        }
        
        function handleFAQEditorChange( content ){
            var headingsAndParagraphs = getHeadingsAndParagraphs(content);
            var schema = generateSchema(headingsAndParagraphs);
            var editor = jQuery('#faqSchemaEditor').data('editor');
            editor.setValue(JSON.stringify(schema, null, 2));
        }
        
        function handleArticleEditorChange( selectedText ){
            if(jQuery('.faqSchema').length > 0){
                var editor = jQuery('#monaco-editor-container').data('editor');
                editor.setValue(html_beautify(selectedText));
            }else{
                var fullHtml = jQuery('#article_html_content').val();
                if( fullHtml && fullHtml.indexOf("<html>") !== -1 ){
                    var htmlStr = selectedText.indexOf("<body>") !== -1 ? selectedText.substring(selectedText.indexOf("<body>") + 6, selectedText.indexOf("</body>")) : selectedText;
                    var article_html  = html_beautify(fullHtml.substring(0, fullHtml.indexOf("<body>")) + '<body>' + htmlStr + '</body></html>'.replaceAll("\n", "").replaceAll("\t", ""));
                    var editor = jQuery('#monaco-editor-container').data('editor');
                    editor.setValue(article_html);
                }
            }
        }
        
    }
});


function getHeadingsAndParagraphs(html) {
    var $tempDiv = jQuery('<div>').html(html);
    var data = [];

    $tempDiv.find('h1, h2, h3, h4, h5, h6').each(function() {
        var heading = jQuery(this).text();
        var nextElement = jQuery(this).next();
        while (nextElement.length && nextElement[0].tagName !== 'P') {
            nextElement = nextElement.next();
        }
        if (nextElement.length && nextElement[0].tagName === 'P') {
            data.push({
                heading: heading,
                paragraph: nextElement.text()
            });
        }
    });

    return data;
}
      
function generateSchema(data) {
    return {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": data.map(item => ({
            "@type": "Question",
            "name": item.heading,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": item.paragraph
            }
        }))
    };
}


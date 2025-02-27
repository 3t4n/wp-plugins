var rteExtended = (editor, opts = {}) => {
    let rte = editor.RichTextEditor;
    let formatBlock = 'formatBlock';
    const customElAttr = 'data-selectme';
    const btnState = {
        ACTIVE: 1,
        INACTIVE: 0,
        DISABLED: -1,
    };
    const isValidTag = (rte, tagName = 'A') => {
        const { anchorNode, focusNode } = rte.selection();
        const parentAnchor = anchorNode?.parentNode;
        const parentFocus = focusNode?.parentNode;
        return parentAnchor?.nodeName == tagName || parentFocus?.nodeName == tagName;
    };
    

    //remove
    rte.remove('bold');
    rte.remove('italic');
    rte.remove('underline');
    rte.remove('strikethrough');
    rte.remove('link');
    //rte.remove('wrap');

    //base
    rte.add('bold', {
        name: 'bold',
        icon: '<b>B</b>',
        attributes: { title: 'Negrita' },
        result: rte => rte.exec('bold'),
    });
    rte.add('italic', {
        name: 'italic',
        icon: '<i>I</i>',
        attributes: { title: 'Itálica' },
        result: rte => rte.exec('italic'),
    });
    rte.add('underline', {
        name: 'underline',
        icon: '<u>U</u>',
        attributes: { title: 'Subrayado' },
        result: rte => rte.exec('underline'),
    });
    rte.add('wrap', {
        icon: `<svg viewBox="0 0 24 24">
                <path fill="currentColor" d="M20.71,4.63L19.37,3.29C19,2.9 18.35,2.9 17.96,3.29L9,12.25L11.75,15L20.71,6.04C21.1,5.65 21.1,5 20.71,4.63M7,14A3,3 0 0,0 4,17C4,18.31 2.84,19 2,19C2.92,20.22 4.5,21 6,21A4,4 0 0,0 10,17A3,3 0 0,0 7,14Z" />
            </svg>`,
        attributes: { title: 'Encapsular para agregar estilos' },
        state: rte => {
            return rte?.selection() && isValidTag(rte, 'SPAN') ? btnState.DISABLED : btnState.INACTIVE;
        },
        result: rte => {
            !isValidTag(rte, 'SPAN') && rte.insertHTML(`<span ${customElAttr}>${rte.selection()}</span>`, { select: true });
        },
    });
    
    //aligns
    rte.add('justifyLeft', {
        icon: '<i class="fa fa-align-left"></i>',
        attributes: {
            title: 'Alinear Izquierda'
        },
        result: rte => rte.exec('justifyLeft')
    });
    rte.add('justifyCenter', {
        icon: '<i class="fa fa-align-center"></i>',
        attributes: {
            title: 'Alinear Centrado'
        },
        result: rte => rte.exec('justifyCenter')
    });

    rte.add('justifyRight', {
        icon: '<i class="fa fa-align-right"></i>',
        attributes: {
            title: 'Alinear Derecha'
        },
        result: rte => rte.exec('justifyRight')
    });
    rte.add('justifyFull', {
        icon: '<i class="fa fa-align-justify"></i>',
        attributes: {
            title: 'Alinear Justificado'
        },
        result: rte => rte.exec('justifyFull')
    });

    //custom link
    rte.add('customLink', {
        icon: '<i class="fa fa-link" aria-hidden="true"></i>',
        attributes: {
            title: 'Enlace'
        },
        result: rte => {
            let url = prompt("Ingrese una url:");
            if(url) {
                rte.insertHTML(`<a class="link" href="${url}">${rte.selection()}</a>`);
            }
            
        }
    });

    rte.add('undo', {
        icon: '<i class="fa fa-reply"></i>',
        attributes: {
            title: 'Deshacer'
        },
        result: rte => rte.exec('undo')
    });
    rte.add('redo', {
        icon: '<i class="fa fa-share"></i>',
        attributes: {
            title: 'Rehacer'
        },
        result: rte => rte.exec('redo')
    });

    //customs fields
    rte.add('customFields', {
        icon: '<select style="width: 230px;" class="gjs-field gjs-field-select">' +
            '<option value="">Agregar campo personalizado</option>' +
                window.selectCF.map((cf) => {
                    return (cf[0])?'<option value="' + cf[1] + '">' + cf[0] + '</option>':'';
                }) +
            '</select>',
        event: 'change',
        attributes: {
            title: 'Campos personalizados'
        },
        result: (rte, action) => {
            let value = action.btn.firstChild.value;
            action.btn.firstChild.value = '';
            rte.insertHTML(value);
        }
    });

    //type field
    /*rte.add('typeField', {
        icon: '<select style="width: 230px;" class="gjs-field gjs-field-select">' +
                '<option value="">Tipo de texto</option>' +
                '<option value="<p>">Párrafo</option>' +
                '<option value="<h1>">Título</option>' +
                '<option value="<h2>">1º Subtítulo</option>' +
                '<option value="<h3>">2º Subtítulo</option>' +
            '</select>',
        event: 'change',
        attributes: {
            title: 'Tipo de texto'
        },
        result: (rte, action) => {
            let value = action.btn.firstChild.value;
            action.btn.firstChild.value = '';
            rte.exec(formatBlock, value)
        }
    });*/
};
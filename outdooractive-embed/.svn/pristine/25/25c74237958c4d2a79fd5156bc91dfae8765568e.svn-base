(function(){
    if(typeof wp === 'undefined'){
        return;
    }
    const registerBlockType = wp.blocks.registerBlockType;
    const el = wp.element.createElement
    const __ = wp.i18n.__

    function escape(attribute){
        if(typeof attribute === 'undefined'){
            return ''
        }
        return typeof attribute !== 'string' ? attribute : attribute.replace(/"/g, '')
    }
    
    const oaIcon = el('svg', 
        { 
            width: 24, 
            height: 24,
            viewBox: '40 40 196 196',
            x: '0px',
            y: '0px',
            style: {'enable-background': 'new 0 0 256 256'}
        },[
        el( 'style', null, '.st0{fill:#3F3F3F;} .st1{fill:#A6B339;}'),
        el( 'path',
            { 
                className: 'st0',
                d: "M191.5,41h-127c-11.7,0-21.2,9.5-21.2,21.2l0,0v127c0,11.7,9.5,21.2,21.2,21.2h33.3c3,0,57.4,0,60.4,0h33.3    c11.7,0,21.2-9.5,21.2-21.2v-127C212.7,50.5,203.2,41,191.5,41C191.5,41,191.5,41,191.5,41z" 
            }
        ),
        el( 'path',
            { 
                className: 'st1',
                d: "M178.8,125c0,35-11.6,55.7-50.8,55.7c-39,0-50.8-20.7-50.8-55.7c0-34.2,12.8-54.4,50.8-54.4    C166,70.6,178.8,90.9,178.8,125z M151.3,125.1c0-21.8-5.1-31.2-23.3-31.2c-18.1,0-23.3,9.4-23.3,31.2c0,21.8,4.1,32.3,23.3,32.3    C147.2,157.4,151.3,146.9,151.3,125.1z" 
            }
        )]
    );
    
    
    registerBlockType( 'outdooractive/embed', {

        title: __( 'Outdooractive Embed', 'outdooractiveEmbed'),
        description: __('Embed content from the outdooractive platform.', 'outdooractiveEmbed'),
        icon: oaIcon,
        category: 'embed',
        keywords: [
          'Outdooractive',
          'Content',
          'Embed'
        ],
        attributes: {
            url: {
                type: 'string'
            },
            maxwidth: {
                type: 'string'
            },
            pro: {
                type: 'boolean'
            },
            forcebuild: {
                type: 'boolean'
            }
        },
        
        edit: function( props ) {
            
            function onChangeURL( evt ) {
                let val = jQuery(evt.target).val()
                props.setAttributes( { url: val === undefined ? '' : val, forcebuild: true } );
            }
            
            function onChangeMaxWidth( evt ) {
                let val = jQuery(evt.target).val()
                props.setAttributes( { maxwidth: val === undefined ? '' : val } );
            }
            
            function onChangePro( evt ) {
                let val = jQuery(evt.target).prop('checked')
                props.setAttributes( { pro: val === true ? true : false, forcebuild: true } );
            }
            
            if(typeof outdooractive_embed_renderer_id !== 'number'){
                    outdooractive_embed_renderer_id = 1
                }
                const myid = outdooractive_embed_renderer_id++

            function build_preview(){   
                
                if(typeof props.attributes.url !== 'string' || props.attributes.url.match(/\/([0-9]{6,})\//) instanceof Array === false){
                    setTimeout(function(){
                        let renderer = jQuery('#outdooractive-embed-renderer-' + myid)
                        renderer.html(__('Missing configuration!', 'outdooractiveEmbed')).addClass('missing_configuration')
                    }, 1)
                    return
                }
                
                let baseurl = '/wp/v2/block-renderer/outdooractive/embed'
                let url = baseurl + '?context=edit&attributes[url]=' + props.attributes.url + '&attributes[maxwidth]=' + (props.attributes.maxwidth ? props.attributes.maxwidth : '') + '&attributes[pro]=' + (props.attributes.pro === true ? 'true' : 'false') + '&_locale=user'
                
                setTimeout(function(){
                    let renderer = jQuery('#outdooractive-embed-renderer-' + myid)
                    renderer.html('').removeClass('missing_configuration')
                }, 1)
                wp.apiFetch({path: url}).then(function(data){
                    let renderer = jQuery('#outdooractive-embed-renderer-' + myid)
                    renderer.html(data.rendered).removeClass('oa_embed_renderer_preview')
                    props.setAttributes( { forcebuild: false } );
                })          
            }
            
            if(props.isSelected !== true || props.attributes.forcebuild){
                build_preview()
            } else {
                setTimeout(function(){
                    let renderer = jQuery('#outdooractive-embed-renderer-' + myid)
                    renderer
                        .addClass('oa_embed_renderer_preview')
                        .css('max-width', props.attributes.maxwidth ? props.attributes.maxwidth + 'px' : '')
                    renderer.find(' > div').css('max-width', props.attributes.maxwidth ? props.attributes.maxwidth + 'px' : '')                 
                    renderer.find(' .oax-embed-widget').css('max-width', props.attributes.maxwidth ? props.attributes.maxwidth + 'px' : '')
                }, 500)
            }
            
            
            
            return (
                el('div', {className: props.className},[
                    el('div', {className: 'label_container', style: {display: props.isSelected ? 'flex' : 'none'}}, [
                        el('div', null, [                           
                            el('label', null, __('URL', 'outdooractiveEmbed')),
                            el('input', {
                                type: 'text',
                                className: 'url',
                                value: props.attributes.url ,
                                onChange: onChangeURL
                            })
                        ]),
                        el('div', null, [                           
                            el('label', null, __('Maximum width (px)', 'outdooractiveEmbed')),
                            el('input', {
                                type: 'number',
                                className: 'maxwidth',
                                value: props.attributes.maxwidth ,
                                onChange: onChangeMaxWidth
                            })
                        ]),
                        el('div', null, [
                            el('label', null, __('Pro+ (no outdooractive logo)', 'outdooractiveEmbed')),
                            el('input', {
                                className: 'pro',
                                type: 'checkbox',
                                checked: props.attributes.pro === true ? true : false ,
                                onChange: onChangePro
                            }),
                        ])  
                    ]),                 
                    el('div', {className: 'oa_embed_renderer oa_embed_renderer_preview', id: 'outdooractive-embed-renderer-' + myid}, ''),
                    el('p', {className: 'oa_embed', style: {display: 'none'}}, '[oaembed url="' +
                       escape(props.attributes.url) +
                       '" maxwidth="' +
                       escape(props.attributes.maxwidth) + '" ' +
                       (props.attributes.pro === true ? ' usepro=true' : '') + ']'
                      )
                ])
            )
        },
        
        save: function( props ) {
            return el('p', {className: 'oa_embed', style: {display: 'none'}}, '[oaembed url="' +
                      escape(props.attributes.url) +
                      '" maxwidth="' +
                      escape(props.attributes.maxwidth) + '" ' +
                      (props.attributes.pro === true ? ' usepro=true' : '') + ']'
                     )
        }
    });    
})()
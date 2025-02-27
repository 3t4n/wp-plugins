var blockStyle = {
    backgroundColor: 'azure',
    color: '#666',
    padding: '15px'
  }
  wp.blocks.registerBlockType('mrplan/mplan-block', {
      title: 'MisterPlan Motor de Reservas',
      icon: 'media-spreadsheet',
      category: 'layout',
      edit: editBlock,
      save: function() {
          return wp.element.createElement( 'h2', { style: blockStyle }, 'Este es el contenido que se salva!!' );
      }
    }
  )

  function editBlock(props){
    function updateheader(event) {
        props.setAttributes({
            header: event.target.value
        })
    }
    function updatecontent(event) {
        props.setAttributes({
            content: event.target.value
        })
    }
    var element = null;
    const response = fetch( `https://api.microlink.io?`, {
            cache: 'no-cache',
            headers: {
                'user-agent': 'WP Block',
                'content-type': 'application/json'
              },
            method: 'GET',
            redirect: 'follow', 
            referrer: 'no-referrer', 
        })
        .then(
            returned => {
                element = wp.element.createElement(
                    "div",
                    null,
                    wp.element.createElement(
                        "h3",
                        null,
                        "MisterPlan"
                    ),
                    wp.element.createElement(
                        "input",
                        {
                            type: "text",
                            value: props.attributes.header,
                            onChange: updateheader
                        }
                    ),
                    wp.element.createElement(
                        "p",
                        null,
                        "Seleccione el motor"
                    ),
                    wp.element.createElement(
                        "select",{
                            onChange: updatecontent
                        },
                        wp.element.createElement('option',
                        {
                            value: '1',
                            text: 'a',
                        }, 'a')
                    ),
                );
            }
        );

    return element;

    

    return "<select><option value='a'>A</option></select>";
    return wp.element.createElement('select',{ style: blockStyle }, 'Este es el contenido que se salva!!' )
  }
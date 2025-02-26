
const myaski_icon = wp.element.createElement('svg', {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, wp.element.createElement('path', {
  d: "M13 8H4v1.5h9V8zM4 4v1.5h16V4H4zm9 8H5c-.6 0-1 .4-1 1v8.3c0 .3.2.7.6.8.1.1.2.1.3.1.2 0 .5-.1.6-.3l1.8-1.8H13c.6 0 1-.4 1-1V13c0-.6-.4-1-1-1zm-.5 6.6H6.7l-1.2 1.2v-6.3h7v5.1z"
}));


wp.blocks.registerBlockType('myaskai/custom-block', {
    title: 'My AskAI',
    //icon: 'text',
    icon: myaski_icon,
    category: 'embeds',

    attributes: {
        myaskai_id: {type: 'string'}
    },

    edit: function(props){

        function updateMyAskaiId(event){
            props.setAttributes({ myaskai_id: event.target.value });
        }

        return React.createElement("div", {
            class: "myaskai_block_container"
          }, /*#__PURE__*/React.createElement("div", {
            class: "myaskai_block_title"
          }, "My AskAI"), /*#__PURE__*/React.createElement("div", {
            class: "myaskai_block_desc"
          }, "Connect your AskAI to your WordPress site"), /*#__PURE__*/React.createElement("input", {
            placeholder: "Enter your AskAI website ID",
            class: "myaskai_block_input",
            type: "text",
            value: props.attributes.myaskai_id,
            onChange: updateMyAskaiId
          }), /*#__PURE__*/React.createElement("div", {
            class: "myaskai_block_help"
          }, /*#__PURE__*/React.createElement("a", {
            target: "_blank",
            href: "https://myaskai.com/connect-askai-wordpress"
          }, "Where do I find this?")));
    },

    save: function(props){
        return React.createElement("div", null, /*#__PURE__*/React.createElement("div", {
            class: "askai-frame-embed",
            "data-id": props.attributes.myaskai_id
          }), /*#__PURE__*/React.createElement("script", {
            defer: true,
            type: "text/javascript",
            src: "https://myaskai.com/embed-js-min"
          }));
    }
}) 
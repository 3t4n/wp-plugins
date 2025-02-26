( function( blocks, element, components ) {
  var el = element.createElement;
  //TextControl コンポーネントは wp.components パッケージにあります
  var TextControl = components.TextControl;
  
  blocks.registerBlockType( 
    'ais/speech-block',
    {
      title: '読み上げブロック',
      icon: 'controls-play',
      category: 'ais',
      example: {},
      attributes: {
        exampleText: {
          type: 'string',
          default: 'テキストを読み上げます'
        }
      },
      edit: function( props ) {
        function onChangeContent( newText ) {
          props.setAttributes( { exampleText: newText } );
        }
        return el(
          'div',
          { id: "AIS_speech_box" },
          el(
            'p',
            {},
            '↓音声読み上げボタンの上部に表示されるテキストを編集できます（ただし、一つしか設置できません）↓'
          ),
          el(
            TextControl,
            {
              onChange: onChangeContent,
              value: props.attributes.exampleText
            },
          ),
          el(
            "button",
            { id: "speech-start" },
            "再生"
          ),
          el(
            'button',
            { id: "speech-cancel" },
            "停止"
          ),
          el(
            "button",
            { id: "speech-pause" },
            "一時停止"
          ),
          el(
            "button",
            { id: "speech-resume" },
            "再開"
          ),
        );
      },
      save: function( props ) {
        return el(
          'div',
          { id: "AIS_speech_box" },
          el(
            "p",
            {},
            props.attributes.exampleText,
          ),
          el(
            "button",
            { id: "speech-start" },
            "再生"
          ),
          el(
            'button',
            { id: "speech-cancel" },
            "停止"
          ),
          el(
            "button",
            { id: "speech-pause" },
            "一時停止"
          ),
          el(
            "button",
            { id: "speech-resume" },
            "再開"
          ),
        );
      },
    }
  );
}(
  window.wp.blocks,
  window.wp.element,
  window.wp.components
) );
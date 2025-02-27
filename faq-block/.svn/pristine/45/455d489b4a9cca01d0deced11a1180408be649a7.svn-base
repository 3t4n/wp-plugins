(function() {

  const { registerBlockType } = window.wp.blocks;
  const { RichText } = window.wp.blockEditor;
  const { createElement } = window.wp.element;
  const { __ } = window.wp.i18n;

  registerBlockType( 'meowapps/faq', {
    title: __( 'FAQ', 'faq-block' ),
    icon: 'welcome-learn-more',
    category: 'formatting', // (common, formatting, layout, widgets, embed)
    keywords: [ __( 'section' ), __( 'header' ) ],
    customClassName: false,
    className: false,
    attributes: {
      question: {
        source: 'children',
        selector: '.meow-faq-question',
        default: 'Question...'
      },
      answer: {
        source: 'children',
        selector: '.meow-tab-content',
        default: 'Answer...'
      },
      hash: {
        source: 'attribute',
        attribute: 'id',
        selector: 'input',
        default: ''
      }
    },

    save: function( props ) {
      const question = props.attributes.question;
      const answer = props.attributes.answer;
      const hash = props.attributes.hash;

      const container = (
        <div className='meow-faq-block'>
          <input type='checkbox' id={hash} name={hash} />
          <RichText.Content className='meow-faq-question' tagName='label' value={question} htmlFor={hash} />
          <div className='meow-tab-answer'>
            <RichText.Content className='meow-tab-content' tagName='div' value={answer} />
          </div>
          <script type="application/ld+json">{`
						{
							"@context": "https://schema.org",
							"@type": "FAQPage",
							"mainEntity": [{
								"@type": "Question",
								"name": "${question}",
								"acceptedAnswer": {
									"@type": "Answer",
									"text": "${answer}"
								}
							}]
						}`}
          </script>
        </div>
      );
      return container;
    },

    edit: function( props ) {
      const question = props.attributes.question;
      const answer = props.attributes.answer;
      const focus = props.focus;

      function onChangeQuestion( newContent ) {
        props.setAttributes( { question: newContent } );
        props.setAttributes( { hash: Math.random().toString(36).substr(2, 9) } );
      }

      function onChangeAnswer( newContent ) {
        props.setAttributes( { answer: newContent } );
      }

      const editQuestion = createElement(
        RichText,
        {
          tagName: 'h3',
          onChange: onChangeQuestion,
          value: question,
          focus: focus,
          onFocus: props.setFocus,
        }
      );
      const editAnswer = createElement(
        RichText,
        {
          tagName: 'p',
          onChange: onChangeAnswer,
          value: answer,
          focus: focus,
          onFocus: props.setFocus,
        }
      );
      return createElement(
        'div', { key: 'meow-faq-block-div', className: 'meow-faq-block' },
        //React.createElement('input', { id: 'meow-faq-block', name: 'meow-faq-block', type: 'checkbox' }),
        editQuestion,
        editAnswer
      );
    },

  });

})();

const { InspectorControls, RichText, ColorPalette } = wp.editor;
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { PanelBody, TextControl, ToggleControl } = wp.components;
const { CtaMedia, CtaLayoutSelector } = wp.ctaComponents;
import styleicons from './styleicon';

class Edit extends Component {
  constructor(props) {
    super(props);
    this.toggleTarget = this.toggleTarget.bind(this);
  }

  componentDidMount() {
    const {
      setAttributes,
      clientId,
      attributes: { uniqueId },
    } = this.props;
    const _client = clientId.substr(0, 6);
    if (!uniqueId) {
      setAttributes({ uniqueId: _client });
    } else if (uniqueId && uniqueId != _client) {
      setAttributes({ uniqueId: _client });
    }
  }

  toggleTarget() {
    const {
      setAttributes,
      attributes: { btn_target },
    } = this.props;
    setAttributes({ btn_target: !btn_target });
  }

  render() {
    const {
      attributes: {
        uniqueId,
        layout,
        isGradientBg,
        bgColor,
        bgColor2,
        bgImage,
        title,
        description,
        btn_label,
        btn_url,
        btn_target,
      },
      setAttributes,
    } = this.props;

    return (
      <Fragment>
        <InspectorControls key="inspector">
          <PanelBody title={__('Layout', 'cta-gutenberg')} initialOpen={true}>
            <CtaLayoutSelector
              value={layout}
              onChange={(val) => setAttributes({ layout: val })}
              options={[
                { value: 1, styleIcon: styleicons.cta_layout_1 },
                { value: 2, styleIcon: styleicons.cta_layout_2 },
                { value: 3, styleIcon: styleicons.cta_layout_3 },
                { value: 4, styleIcon: styleicons.cta_layout_4 },
                { value: 5, styleIcon: styleicons.cta_layout_5 },
                { value: 6, styleIcon: styleicons.cta_layout_6 },
                { value: 7, styleIcon: styleicons.cta_layout_7 },
                { value: 8, styleIcon: styleicons.cta_layout_8 },
                { value: 9, styleIcon: styleicons.cta_layout_9 },
                { value: 10, styleIcon: styleicons.cta_layout_10 },
                { value: 11, styleIcon: styleicons.cta_layout_11 },
                { value: 12, styleIcon: styleicons.cta_layout_12 },
              ]}
            />
          </PanelBody>
          <PanelBody title={__('Button', 'cta-gutenberg')} initialOpen={false}>
            <TextControl
              label={__('Link', 'cta-gutenberg')}
              value={btn_url}
              onChange={(value) => setAttributes({ btn_url: value })}
            />
            <ToggleControl
              label={__('Open in new Window', 'cta-gutenberg')}
              checked={btn_target}
              onChange={this.toggleTarget}
            />
          </PanelBody>
          <PanelBody title={__('Wrapper', 'cta-gutenberg')} initialOpen={false}>
            {(layout == 8 || layout == 9) && (
              <ToggleControl
                label={__('Enable Gradient', 'cta-gutenberg')}
                checked={isGradientBg}
                onChange={(state) => setAttributes({ isGradientBg: state })}
              />
            )}
            <span className="cta-field-label">
              {__('Background Color', 'cta-gutenberg')}
            </span>
            <ColorPalette
              label={__('Background Color', 'cta-gutenberg')}
              className="cta-field"
              value={bgColor}
              onChange={(colorValue) => setAttributes({ bgColor: colorValue })}
              allowReset
            />
            {isGradientBg == 1 && (layout == 8 || layout == 9) && (
              <Fragment>
                <span className="cta-field-label">
                  {__('Background Color 2', 'cta-gutenberg')}
                </span>
                <ColorPalette
                  label={__('Background Color 2', 'cta-gutenberg')}
                  className="cta-field"
                  value={bgColor2}
                  onChange={(colorValue) =>
                    setAttributes({ bgColor2: colorValue })
                  }
                  allowReset
                />
              </Fragment>
            )}
            <CtaMedia
              label={__('Image', 'cta-gutenberg')}
              value={bgImage}
              onChange={(val) => setAttributes({ bgImage: val })}
            />
          </PanelBody>
        </InspectorControls>
        <div
          className={`call_to_action_${layout} call_to_action_${uniqueId}`}
          style={{
            backgroundImage: `${
              bgImage.url != undefined ? `url(${bgImage.url})` : 'none'
            }`,
          }}
        >
          <div className="cta_content">
            <RichText
              tagName="h2"
              value={title}
              placeholder="Call to action title"
              onChange={(value) => setAttributes({ title: value })}
            />
            <RichText
              tagName="p"
              value={description}
              placeholder="Call to action description"
              onChange={(value) => setAttributes({ description: value })}
            />
            <RichText
              tagName="a"
              className="ctagb-btn"
              value={btn_label}
              placeholder="Button Label"
              onChange={(value) => setAttributes({ btn_label: value })}
            />
          </div>
        </div>
        <style>
          {layout == 1 || layout == 8 || layout == 9
            ? `
						.call_to_action_${uniqueId}:after{
							${
                isGradientBg == 1
                  ? `background-image: linear-gradient(to right, ${bgColor}, ${bgColor2})`
                  : `background-color: ${bgColor}`
              }
						}
						.call_to_action_${uniqueId}>.cta_content>.ctagb-btn:hover{
							${
                isGradientBg == 1
                  ? `background-image: linear-gradient(to right, ${bgColor2}, ${bgColor})`
                  : `background-color: ${bgColor}`
              }
						}
						`
            : `.call_to_action_${uniqueId}{
							${
                isGradientBg == 1
                  ? `background-image: linear-gradient(to right, ${bgColor}, ${bgColor2})`
                  : `background-color: ${bgColor}`
              }
						}
						`}
        </style>
      </Fragment>
    );
  }
}

export default Edit;

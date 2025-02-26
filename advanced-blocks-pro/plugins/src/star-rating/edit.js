import React , {useEffect} from "react"
import { __ } from '@wordpress/i18n';
import './editor.scss';
import { EMTitle, MediaParent } from '../../filters/frontend_components';
import { CustomButton, CustomButtonGroup, CustomColorPalette2, CustomRangeControl, CustomToggleControl, SelectControls } from '../../filters/component/custom_panel/panel';
import { apply_font_style, getAttributeValueDynamic } from '../../helper/globalFunctions';
const { InspectorControls } = wp.blockEditor;
const { PanelBody } = wp.components;



export default function Edit(props) {
  const { attributes, setAttributes, clientId } = props;
  const { blockId } = attributes;
  if (!blockId) {
    setAttributes({ blockId: clientId });
  } else{
    setAttributes({ blockId: clientId });
  }

  useEffect(() => {
		apply_font_style(attributes[getAttributeValueDynamic(attributes, "title", "font_family")])
	}, []);

  const stars = side =>
    [...Array(5)].map(() =>
      attributes.rating_icon === 'font_awesome' ? (
        <i
          className={`${side === 'front' ||
            attributes.icon_type === 'fill'
            ? 'fas'
            : 'far'
            } fa-star`}
          aria-hidden='true'
        />
      ) : (
        <i>
          {side === 'front' ||
            attributes.icon_type === 'fill'
            ? '★'
            : '☆'}
        </i>
      )
    )

  return <>
    <InspectorControls>
      <PanelBody title="Star Rating">
        <CustomRangeControl
          label="Rating"
          value={attributes.rating}
          onChange={(e) => {
            setAttributes({ rating: e })
          }}
        />
        <hr />
        <SelectControls
          label="Icon"
          options={[
            { value: "font_awesome", label: "Font Awesome" },
            { value: "unicode", label: "Unicode" }
          ]}
          value={attributes.rating_icon}
          onChange={(e) => {
            setAttributes({ rating_icon: e })
          }}
        />
        <CustomButtonGroup label="Unmarked Style">
          <CustomButton
            variant={attributes.icon_type === "fill"}
            onClick={() => {
              setAttributes({ icon_type: "fill" });
            }}>★</CustomButton>
          <CustomButton
            variant={attributes.icon_type === "unfill"}
            onClick={() => {
              setAttributes({ icon_type: "unfill" });
            }}>☆</CustomButton>
        </CustomButtonGroup>
        <hr />
        <CustomButtonGroup label="Unmarked Style">
          <CustomButton
            variant={attributes.alignment === "left"}
            onClick={() => {
              setAttributes({ alignment: "left" });
            }}><i className='fas fa-align-left' /></CustomButton>
          <CustomButton
            variant={attributes.alignment === "center"}
            onClick={() => {
              setAttributes({ alignment: "center" });
            }}><i className='fas fa-align-center' /></CustomButton>
          <CustomButton
            variant={attributes.alignment === "right"}
            onClick={() => {
              setAttributes({ alignment: "right" });
            }}><i className='fas fa-align-right' /></CustomButton>
          <CustomButton
            variant={attributes.alignment === "space-between"}
            onClick={() => {
              setAttributes({ alignment: "space-between" });
            }}><i className='fas fa-align-justify' /></CustomButton>
        </CustomButtonGroup>
        <CustomToggleControl
          label={attributes.title_toggle ? "Title Hide" : "Title Show"}
          checked={attributes.title_toggle}
          onChange={(e) => {
            setAttributes({ title_toggle: e })
          }}
        />
        {attributes.title_toggle &&
          <CustomRangeControl
            label="Gap"
            min={0}
            max={50}
            value={attributes.title_gap}
            onChange={(e) => {
              setAttributes({ title_gap: e })
            }}
          />}
        <hr />
        <PanelBody title="Stars" className="custom-panel">
          <CustomRangeControl
            label="Size"
            min={0}
            max={100}
            value={attributes.icon_size}
            onChange={(e) => {
              setAttributes({ icon_size: e })
            }}
          />
          <CustomRangeControl
            label="Spacing"
            min={0}
            max={50}
            value={attributes.icon_spacing}
            onChange={(e) => {
              setAttributes({ icon_spacing: e })
            }}
          />
          <CustomColorPalette2
            label={"Color"}
            value={attributes.color}
            onChange={(new_value) => {
              setAttributes({ color: new_value });
            }}
          />
          <CustomColorPalette2
            label={"Unmarked Color"}
            value={attributes.unmarked_color}
            onChange={(new_value) => {
              setAttributes({ unmarked_color: new_value });
            }}
          />
        </PanelBody>
      </PanelBody>
    </InspectorControls>
    <MediaParent attribute_name="wrapper" edit={true} {...props}>
      <div class="star-rating" style={{ justifyContent: attributes.alignment }}>
        {attributes.title_toggle &&
          <div class="rating-title" style={{ marginRight: `${attributes.title_gap}px` }}>
            <EMTitle type="rich" tagName={"p"} edit={true} attribute_name="title" {...props} />
          </div>}
        <div class="back-stars position-relative d-flex" style={{ fontSize: `${attributes.icon_size}px`, gap: `${attributes.icon_spacing}px`, color: attributes.color }}>
          {stars('back')}
          <div class="front-stars" style={{ width: `${attributes.rating}%`, fontSize: `${attributes.icon_size}px`, gap: `${attributes.icon_spacing}px`, color: attributes.unmarked_color }}>
            {stars('front')}
          </div>
        </div>
      </div>
    </MediaParent>
  </>
}

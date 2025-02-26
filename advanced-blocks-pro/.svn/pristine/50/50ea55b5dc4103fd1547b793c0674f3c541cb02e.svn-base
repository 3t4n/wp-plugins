import BlockBakeryInspectorControl from "./BlockBakeryInspectorControl";
import { CustomUnitControl } from "./component/custom_panel/panel";
const { PanelBody } = wp.components;
const { __ } = wp.i18n;
const { addFilter } = wp.hooks;
const { Fragment } = wp.element;
const { createHigherOrderComponent } = wp.compose;
const { InspectorControls } = wp.blockEditor;

const appliedBlockFilters = []
let render_panel = false;
const myBlockExisitings = (blockName) => blockName.startsWith('advanced-blocks-pro') && !appliedBlockFilters.includes(blockName);


addFilter(
  'blocks.registerBlockType',
  'advancedBlocksPro/add-extra-attributes',
  addExtraAttributes
)

let d = [];
function addExtraAttributes(settings, blockName) {

  if (myBlockExisitings(blockName)) {
    appliedBlockFilters.push(blockName);

    let { advancedBlocksPro } = settings.supports;
    d.push({
      blockName,
      advancedBlocksPro
    })
  }
  return settings;
}

addFilter(
  'editor.BlockEdit',
  'advancedBlocksPro/add-extra-inspector-controls',
  addExtraControls
)
function addExtraControls(BlockEdit) {
  const withInspectorControls = createHigherOrderComponent(BlockEdit => {

    return props => {
      let x = d.filter(e => e.blockName == props.name)

      if (myBlockExisitings(props.name)) return <BlockEdit {...props} />


      return (
        <Fragment>
          <BlockEdit {...props} />
          <InspectorControls>
            <BlockBakeryInspectorControl {...x} {...props} />
          </InspectorControls>
        </Fragment>
      )
    }
  })
  return withInspectorControls(BlockEdit)
}




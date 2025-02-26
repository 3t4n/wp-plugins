const { createElement } = wp.element;
const { PanelBody } = wp.components;
import components from "./component/components.js";
import "./component/editor.scss"
function capitalizeFirstLetter(str) {
    // converting first letter to uppercase
    const capitalized = str.charAt(0).toUpperCase() + str.slice(1);
    return capitalized;
}

const BlockBakeryInspectorControl = (props) => {
    const { attributes, setAttributes } = props
    // console.log("panelRender")
    return Object.entries(props).map(([keys, values]) => {
        if (values?.advancedBlocksPro) {
            return Object.entries(values.advancedBlocksPro).map(([key, val]) => {
                return <PanelBody title={capitalizeFirstLetter(key)} initialOpen={false} key={key}>
                    {Object.entries(val).map(([k, v]) => {
                        let panel = Object.entries(v).map(([attrs, attr_val]) => {
                            let attribute_name = key;
                            let name = capitalizeFirstLetter(k);
                            let attr = capitalizeFirstLetter(attrs);
                            if (components[name][attr]) {
                                // console.log("keys", attrs, components[name][attr]);
                                return createElement(components[name]["Main"], null, [createElement(components[name][attr], { attr_val, attr, attribute_name, attributes, setAttributes }, {})])
                            }
                        });
                        if (Object.keys(val).length === 1) {
                            return panel
                        } else {
                            return <PanelBody key={k} className="em-custom-panel" title={capitalizeFirstLetter(k)} initialOpen={false}>
                                {panel}
                            </PanelBody>
                        }


                    })}
                </PanelBody>
            })
        }
    })
}

export default BlockBakeryInspectorControl;
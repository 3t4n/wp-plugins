import React from 'react'
import { getDevice } from '../../../helper/globalFunctions';
import { CustomBoxControl} from '../custom_panel/panel';

const Main = (props) => {
    return props.children
}

const Margin = (props) => {
    const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomBoxControl
                attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={props.attr}
                label="Margin"
                units={[
                    { value: 'px', label: 'Px', default: 0 },
                    { value: '%', label: '%', default: 0 },
                    { value: 'em', label: 'EM', default: 0 },
                    { value: 'rem', label: 'REM', default: 0 }
                ]}
                inputProps={{ min: -10000, max: 10000 }}
                values={attributes[attr]}
                onChange={(new_value) => {
                    setAttributes({ [attr]: new_value });
                }}
            />
    })
}

const Padding = (props) => {
    const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
        let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
        return (attr.endsWith(device) || check) && <CustomBoxControl
                attributes={attributes}
				setAttributes={setAttributes}
				attr_val={attr_val}
				name={props.attr}
                label="Padding"
                units={[
                    { value: 'px', label: 'Px', default: 0 },
                    { value: '%', label: '%', default: 0 },
                    { value: 'em', label: 'EM', default: 0 },
                    { value: 'rem', label: 'REM', default: 0 }
                ]}
                inputProps={{ min: -10000, max: 10000 }}
                values={attributes[attr]}
                onChange={(new_value) => {
                    setAttributes({ [attr]: new_value });
                }}
            />
    })
}

const Spacing = { Main, Margin, Padding};
export default Spacing;
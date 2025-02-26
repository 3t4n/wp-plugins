import { getDevice } from "../../../helper/globalFunctions";
import { CustomToggleControl, SelectControls } from "../custom_panel/panel";

const Main = (props) => {
	return props.children
}

const Data = (props) => {
	const { attributes, setAttributes, attr_val, attribute_name } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <CustomToggleControl
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Link Toggle"
			checked={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({ [attr]: new_value });
			}}
		/>
	})
}

const Data_source = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Data Source"
			options={[
				{ value: "current-post", label: "Current Post" },
				{ value: "post-type", label: "Post Type" },
			]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Select_post_type = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Select Post Type"
			options={[
				{ value: "post", label: "Posts" },
				{ value: "page", label: "Pages" }
			]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Content_source = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Content Source"
			options={[
				{ value: "dafault", label: "Default" },
				{ value: "title", label: "Title" },
				{ value: "excerpt", label: "Excerpt" },
				{ value: "post-data", label: "Post Data" },
				{ value: "post-meta", label: "Post Meta" },
				{ value: "comments-number", label: "Comments Number" },
				{ value: "list-of-terms", label: "List Of Terms" },
				{ value: "author-meta", label: "Author Meta" },
				{ value: "email", label: "Email" },
				{ value: "name", label: "Name" },
				{ value: "nickname", label: "Nickname" },
				{ value: "first-name", label: "First Name" },
				{ value: "last-name", label: "Last Name" },
			]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Link_source = (props) => {
	const { attributes, setAttributes, attr_val } = props;
	return Object.keys(attr_val).map(attr => {
		let device = getDevice(props.attr.toLowerCase());
		let check = Object.keys(attr_val).length === 1 && attr.endsWith(props.attr.toLowerCase())
		return (attr.endsWith(device) || check) && <SelectControls
			attributes={attributes}
			setAttributes={setAttributes}
			attr_val={attr_val}
			name={props.attr}
			label="Link Source"
			options={[
				{ value: "dafault", label: "Default" },
				{ value: "single-post", label: "Single Post" },
				{ value: "comments-area", label: "Comments Area" },
				{ value: "post-meta", label: "Post Meta" },
				{ value: "author-achrives", label: "Author Achrives" },
				{ value: "author-meta", label: "Author Meta" },
				{ value: "author-email", label: "Author email" }
			]}
			value={attributes[attr]}
			onChange={(new_value) => {
				setAttributes({
					[attr]: new_value,
				});
			}}
		/>
	})
}

const Dynamic = { Main, Data, Data_source, Select_post_type, Content_source, Link_source };
export default Dynamic;
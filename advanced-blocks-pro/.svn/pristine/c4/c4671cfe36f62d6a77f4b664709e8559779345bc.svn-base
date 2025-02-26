const { PanelRow, ButtonGroup, Button } = wp.components;
const { dispatch, useSelect, select } = wp.data;
import '../filters/component/editor.scss';

export const ResponsiveButtonGroup1 = (props) => {
	let { attributes, setAttributes, attr_val, name } = props;
	let desktop = (attributes?.deviceSelection || "desktop") === 'desktop'
	let tablet = attributes?.deviceSelection === 'tablet'
	let mobile = attributes?.deviceSelection === 'mobile'
	let getHover = desktop ? "hover" : tablet ? "tablet_hover" : "mobile_hover";
	let getHoverVariant = attributes?.deviceSelection === 'hover' ? "hover" : attributes?.deviceSelection === 'tablet_hover' ? "tablet_hover" : attributes?.deviceSelection === 'mobile_hover' && "mobile_hover";
	return <div className="em-btn-group">
		<ButtonGroup>
			{Object.keys(attr_val).map((attr) => {
				return <>{attr.endsWith(name.toLowerCase()) && <Button
					className="em-res-btn"
					variant={desktop ? 'primary' : 'dark'}
					isPressed={desktop}
					isSecondary={!desktop}
					isPrimary={desktop}
					onClick={(e) => {
						responsiveChange('desktop', setAttributes);
					}}
				>
					<span class="dashicons dashicons-desktop"></span>
				</Button>}
					{attr.endsWith("tablet") && (
						<Button
							variant={tablet ? 'primary' : 'dark'}
							isPressed={tablet}
							isSecondary={!tablet}
							isPrimary={tablet}
							className="em-res-btn"
							onClick={(e) => {
								responsiveChange('tablet', setAttributes);
							}}
						>
							<span class="dashicons dashicons-tablet"></span>
						</Button>
					)}
					{attr.endsWith('mobile') && (<Button
						className="em-res-btn"
						// isDark
						variant={mobile ? 'primary' : 'dark'}
						isPressed={mobile}
						isSecondary={!mobile}
						isPrimary={mobile}
						onClick={(e) => {
							responsiveChange('mobile', setAttributes)
						}}
					>
						<span class="dashicons dashicons-smartphone"></span>
					</Button>)}

					{attr.endsWith(`${name.toLowerCase()}_hover`) && (<Button
						variant={getHoverVariant ? 'primary' : 'dark'}
						isPressed={getHoverVariant}
						isSecondary={!getHoverVariant}
						isPrimary={getHoverVariant}
						className="em-res-btn"
						onClick={(e) => {
							responsiveChange(getHover, setAttributes)
						}}
					>
						<span class="dashicons dashicons-pressthis"></span>
					</Button>)}
				</>

			})}
		</ButtonGroup>
	</div>
};

export const responsiveChange1 = (deviceSelection, setAttributes) => {
	let changeDevice = dispatch('core/edit-post')
		.__experimentalSetPreviewDeviceType

	switch (deviceSelection) {
		case 'desktop':
			changeDevice('Desktop')
			setAttributes({ deviceSelection })
			break
		case 'tablet':
			changeDevice('Tablet')
			setAttributes({ deviceSelection })
			break
		case 'mobile':
			changeDevice('Mobile')
			setAttributes({ deviceSelection })
			break
		case 'hover':
			setAttributes({ deviceSelection })
			break
		case 'tablet_hover':
			setAttributes({ deviceSelection })
			break
		case 'mobile_hover':
			setAttributes({ deviceSelection })
			break
	}
}

// 

let selection = "Desktop";
export const responsiveChange = (deviceSelection, setAttributes) => {
	let changeDevice = dispatch('core/edit-post').__experimentalSetPreviewDeviceType
	selection = (deviceSelection);
	// console.log("selection", selection)
	switch (deviceSelection) {
		case 'Desktop':
			changeDevice('Desktop')
			setAttributes({ deviceSelection })
			break
		case 'Tablet':
			changeDevice('Tablet')
			setAttributes({ deviceSelection })
			break
		case 'Mobile':
			changeDevice('Mobile')
			setAttributes({ deviceSelection })
			break
		case 'hover':
			setAttributes({ deviceSelection })
			break
		case 'tablet_hover':
			setAttributes({ deviceSelection })
			break
		case 'mobile_hover':
			setAttributes({ deviceSelection })
			break
	}
}

export const ResponsiveButtonGroup = (props) => {
	let { setAttributes, attr_val, name } = props;
	
	const currentDeviceSelected = select('core/edit-post').__experimentalGetPreviewDeviceType()

	let getHoverVariant = "hover";
	switch (selection) {
		case "Mobile":
			getHoverVariant = "mobile_hover";
			break;
		case "Tablet":
			getHoverVariant = "tablet_hover";
			break;
	}
	let getHoverVariant2 = selection.endsWith("hover") ? selection : getHoverVariant

	// console.log("selection2",  getHoverVariant , getHoverVariant2)
	const devices = [{ name: "Desktop", icon: "desktop" }, { name: "Tablet", icon: "tablet" }, { name: "Mobile", icon: "smartphone" }]
	return <div className="em-btn-group">
		<ButtonGroup>
			{ Object.keys(attr_val).length !== 1 && Object.keys(attr_val).map((attr) => {
				return <>
					{devices.map((v) => {
						let dev = v.name === "Desktop" ? name : v.name
						return attr.endsWith(dev.toLowerCase()) && <Button
							className="em-res-btn"
							title={v.name}
							variant={v.name === currentDeviceSelected ? 'primary' : 'dark'}
							isPressed={v.name === currentDeviceSelected}
							isSecondary={!v.name === currentDeviceSelected}
							isPrimary={v.name === currentDeviceSelected}
							onClick={(e) => {
								responsiveChange(v.name, setAttributes); 
							}}
						>
							<span className={`dashicons dashicons-${v.icon}`}></span>
						</Button>

					})}

					{attr.endsWith(`${name.toLowerCase()}_${getHoverVariant2}`) && (<Button
						variant={getHoverVariant2 == selection ? 'primary' : 'dark'}
						isPressed={getHoverVariant2 == selection}
						isSecondary={!getHoverVariant2 == selection}
						isPrimary={getHoverVariant2 == selection}
						className="em-res-btn"
						title={getHoverVariant2}
						onClick={(e) => {
							responsiveChange(getHoverVariant2, setAttributes)
							// console.log("hover",getHoverVariant2)
						}}
					>
						<span class="dashicons dashicons-pressthis"></span>
					</Button>)}
				</>

			})}
		</ButtonGroup>
	</div>
};


// 

export const getDevice = (field) => {
	const currentDeviceSelected = select('core/edit-post').__experimentalGetPreviewDeviceType()
	const get_hover_device = selection.endsWith("hover") ? selection : currentDeviceSelected;
	// console.log("getDevice",currentDeviceSelected , selection , get_hover_device , field)
	let device = get_hover_device.toLowerCase() === "desktop" ? field : get_hover_device.toLowerCase() === "hover" ? (`${field}_hover` || field) : (get_hover_device.toLowerCase() || field);
	return device
}

//block_bakery_heading_title_text_mobile
// globalfunction.js
export const getAttributeValueDynamic = (attributes, name, fieldName) => {
 
	const deviceType = selection.toLocaleLowerCase() === "desktop" ? fieldName : `${fieldName}_${selection.toLocaleLowerCase()}`;
	// console.log("edit" ,selection.toLocaleLowerCase() , deviceType)
	const field = Object.keys(attributes).find(e => { return e.match(name + "_" + deviceType) });

	const attr = !field ? Object.keys(attributes).find(e => { return e.match(name + "_" + fieldName) }) : field;
	// console.log("attr", field);
	return attr;
}


export const apply_font_style = (fontFamily, variant) => {
	if (
	  fontFamily &&
	  !document.head.querySelector(`#${lodash.snakeCase(fontFamily)}`)
	) {
	  let src = `https://fonts.googleapis.com/css?family=${encodeURIComponent(
		fontFamily
	  )}:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic`
	  var head = document.head
	  var link = document.createElement('link')
  
	  link.type = 'text/css'
	  link.rel = 'stylesheet'
	  link.href = src
	  link.id = lodash.snakeCase(fontFamily)
	  head.appendChild(link)
	}
  }
const
	plugin_id = 'wc_gateway_icount-wc_icount_gateway',
	{
		wc:{
			wcBlocksRegistry: {
				registerPaymentMethod
			},
			wcSettings: {
				getPaymentMethodData
			}
		},
		wp:{
			element:{
				createElement
			},
			htmlEntities:{
				decodeEntities
			}
		}
	} = self,

	{title, description, icon} = getPaymentMethodData(plugin_id),
	Content = ({text}) => decodeEntities(text);

registerPaymentMethod({
	name: plugin_id,
	content: createElement(Content, {text: description}),
	label: createElement('span',null,createElement(Content,{text: title + ' '}),icon ? [createElement('img', {src: icon})] : null),
	ariaLabel: Content({text: title}),
	edit: createElement(Content, {text: description}),
	// icons: icon ? [createElement('img', {src: icon})] : null,
	// supports: {
	// 	features: [],
	// },
	canMakePayment: () => true,
});
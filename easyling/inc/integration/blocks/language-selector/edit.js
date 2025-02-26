wp.blocks.registerBlockType(
	'easyling/language-selector',
	{
		title: 'Easyling Language Selector',
		icon: 'admin-site-alt3',
		category: 'widgets',
		// attributes: {},
		edit: function (props) {
			return React.createElement("h3", null, "🌐");
		},
		save: function (props) {
			return React.createElement("span", { class: 'el-dropdown', ...wp.blockEditor.useBlockProps.save() }, "");
		},
	}
);

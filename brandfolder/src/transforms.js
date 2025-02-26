import { createBlock } from "@wordpress/blocks";

export const transforms = {
	to: [
		{
			type: "block",
			blocks: ["core/image"],
			transform: ({ caption, url, align, id, anchor }) =>
				createBlock("core/image", {
					caption,
					url,
					align,
					id,
					anchor,
				}),
		},
	],
};

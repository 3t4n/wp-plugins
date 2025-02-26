import { EMMedia, MediaParent } from "../../filters/frontend_components";

export default function save(props) {
	return <MediaParent sliderId={6} attribute_name="wrapper" {...props}>
		<EMMedia
			type="image"
			attribute_name="image"
			{...props} />
	</MediaParent>;
}

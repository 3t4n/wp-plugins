import { EMTitle, MediaParent } from '../../filters/frontend_components';

export default function save(props) {
	const { attributes } = props;
	const stars = side =>
    [...Array(5)].map(e =>
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
	return (
		<MediaParent sliderId={9} attribute_name="wrapper" {...props}>
			<div class="star-rating" style={{ justifyContent: attributes.alignment }}>
				{attributes.title_toggle &&
					<div class="rating-title" style={{ marginRight: `${attributes.title_gap}px` }}>
						<EMTitle type="rich" tagName={"p"} attribute_name="title" {...props} />
					</div>}
				<div class="back-stars position-relative d-flex" style={{ fontSize: `${attributes.icon_size}px`, gap: `${attributes.icon_spacing}px`, color: attributes.color }}>
					{stars('back')}
					<div class="front-stars" style={{ width: `${attributes.rating}%`, fontSize: `${attributes.icon_size}px`, gap: `${attributes.icon_spacing}px`, color: attributes.unmarked_color }}>
						{stars('front')}
					</div>
				</div>
			</div>
		</MediaParent>
	);
}

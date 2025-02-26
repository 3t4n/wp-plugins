import {Spinner} from "@wordpress/components";
import {__} from "@wordpress/i18n";
import Video from "./video";

export default function ChannelVideos({key, wrapClass, attributes, loading}) {
	if (loading) {
		return (<div className={wrapClass}><Spinner/>{__('Loading channel data...')}</div>);
	}

	if (attributes.channelData.hasOwnProperty('type')) {
		if (attributes.channelData.type === 'error') {
			return (
				<div className={wrapClass}>{attributes.channelData.value}</div>
			);
		}
	}

	if (attributes.channelData.hasOwnProperty('results')) {
		return (
			<div className={wrapClass}>
				<div className="ytp-container">
					{
						attributes.channelData.results.map((video, index) =>
							<Video key={index}
								   width={attributes.width}
								   height={attributes.height}
								   video={video}
								   showTitle={attributes.showTitle}
								   showDuration={attributes.showDuration}
								   showViewCount={attributes.showViewCount}
								   thumb={attributes.thumb}
							/>
						)
					}
				</div>
				{attributes.showLoadMore && (
					<div className="ytp-container">
						<div className="ytp-load-more-btn">{__('Load more')}</div>
					</div>
				)}
			</div>
		)
	}

	return (<></>)
}

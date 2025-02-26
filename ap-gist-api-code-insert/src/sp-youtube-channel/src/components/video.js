export default function Video({video, showTitle, showDuration, showViewCount, width, height, thumb}) {
	let thumb_url = video.snippet.thumbnails.high.url;
	let duration = '';
	let views = '';

	try {
		views = video.statistics.viewCount;
	} catch (e) {
		console.log('error missing views');
	}

	try {
		duration = video.contentDetails.humanDuration;
	} catch (e) {
		console.log('error missing duration');
	}

	if (!showDuration) {
		duration = '';
	}

	if (!showViewCount) {
		views = '';
	}

	try {
		switch (thumb) {
			case 'default':
				thumb_url = video.snippet.thumbnails.default.url;
				break;
			case 'medium':
				thumb_url = video.snippet.thumbnails.medium.url;
				break;
			case 'high':
				thumb_url = video.snippet.thumbnails.high.url;
				break;
			case 'standard':
				thumb_url = video.snippet.thumbnails.standard.url;
				break;
			case 'maxres':
				thumb_url = video.snippet.thumbnails.maxres.url;
				break;
		}
	} catch (e) {
		console.log('error ' + thumb + ' thumb is missing');
	}


	return (
		<div className="ytp-flex-item" data-id={video.id.videoId} style={{"width": width + "px"}}>
			<div className="ytp-thumb" style={{"backgroundImage": "url('" + thumb_url + "')", "height": height + "px"}}>
				{duration && (<span className="ytp-video-duration">{duration}</span>)}
				{views && (<span className="ytp-views">{views}</span>)}
			</div>
			{showTitle && (
				<div className="ytp-body">
					<p>{video.snippet.title}</p>
				</div>
			)}
		</div>
	);
}

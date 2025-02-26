import ModalVideo from "modal-video/lib/core";
import axios from "axios";

document.addEventListener("DOMContentLoaded", function () {
	new ModalVideo('.ytp-open-video-modal');

	document.querySelectorAll('.ytp-load-more-btn').forEach((loadMore) => {
		loadMore.addEventListener("click", function () {
			loadMore.classList.add('ytp-loading');

			axios.post('/wp-json/social_patch/channel-load-more', {
				"attributes": loadMore.dataset.attributes,
				"info": loadMore.dataset.info
			})
				.then(function (response) {
					if (response.data.hasOwnProperty('html')) {
						document.getElementById(loadMore.dataset.result).insertAdjacentHTML(
							'beforeend',
							response.data.html
						);
					}
					if (response.data.hasOwnProperty('info')) {
						loadMore.dataset.info = JSON.stringify(response.data.info);
					}

					loadMore.classList.remove('ytp-loading');
					console.log(response.data.currentPageToken);
					new ModalVideo('.page-' + response.data.currentPageToken + ' .ytp-open-video-modal');
				})
				.catch(function (error) {
					console.log(error);
				});
		});
	});
});

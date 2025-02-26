document.addEventListener('DOMContentLoaded', () => {

	// helper set and get cookie
	const setCookie = function (cname, cvalue, exdays) {
		const d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		let expires = "expires="+ d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	};

	const getCookie = function getCookie(cname) {
		let name = cname + "=";
		let decodedCookie = decodeURIComponent(document.cookie);
		let ca = decodedCookie.split(';');
		for(let i = 0; i <ca.length; i++) {
		  let c = ca[i];
		  while (c.charAt(0) == ' ') {
			c = c.substring(1);
		  }
		  if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		  }
		}
		return "";
	};



	if (document.getElementById('markers_data')) {
		const markers = JSON.parse(
			document.getElementById('markers_data').textContent
		);

		const defultLat = markers[0].lat;
		const defultLon = markers[0].lon;
		const mymap = L.map('markers_map').setView([defultLat, defultLon], 13);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
		}).addTo(mymap);


		const truckIcon = L.divIcon({
			className: 'dashicons dashicons-location qsd-custom-icon',
			iconSize: [50, 50],
		});

		const markerClusters = L.markerClusterGroup();

		markers.forEach(function (marker) {
			const customMarker = L.marker([marker.lat, marker.lon], {
				icon: truckIcon,
			})
				.addTo(mymap)
				.bindPopup(marker.title);

			markerClusters.addLayer(customMarker);
		});

		mymap.addLayer(markerClusters);
	}

	function reviewTags(hiddenfield, checkboxes, query = '') {
		if (hiddenfield && checkboxes) {
			checkboxes.forEach((checkbox) => {
				checkbox.addEventListener('change', (e) => {
					e.preventDefault();
					if (e.target.checked) {
						if (hiddenfield.value === '') {
							hiddenfield.value += e.target.value;
						} else {
							hiddenfield.value += ',' + e.target.value;
						}
					} else {
						const valueToRemove = e.target.value;
						let values = hiddenfield.value.split(',');
						values = values.filter((val) => val !== valueToRemove);
						hiddenfield.value = values.join(',');
					}
				});
			});
		}
	}

	if (document.querySelectorAll('.tags-inner-check')) {
		const tags = document.getElementById('tags_field');
		const tagsCheckbox = document.querySelectorAll('.tags-inner-check');

		reviewTags(tags, tagsCheckbox, 'tags');
	}
	if (document.querySelectorAll('.qsd-prodcut-grid-reviews-inner')) {
		const tagsWrapper = document.querySelectorAll('.qsd-tags-wrapper');

		const tagsSeemore = document.querySelector('.seemore-tag');

		if (tagsWrapper.length < 5 && tagsSeemore) {
			tagsSeemore.style.visibility = 'hidden';
		}

		if (tagsSeemore) {
			tagsSeemore.addEventListener('click', (e) => {
				e.preventDefault();
				tagsWrapper.forEach((tag) => {
					if (tag.classList.contains('tags-hidden')) {
						tag.classList.remove('tags-hidden');
					}
				});
			});
		}
	}

	if (
		document.getElementById('adqs_advtf_btn') &&
		document.getElementById('adqs_advtFilter_more')
	) {
		const advtfBtn = document.getElementById('adqs_advtf_btn'),
		btnDataId = advtfBtn.closest('#adqs_advtf_btn').getAttribute('data-page-id');

		if(sessionStorage.getItem(`advtf_has_opened_${btnDataId}`)){
			document.getElementById('adqs_advtFilter_more').classList.remove('hidden');
		}

		advtfBtn
			.addEventListener('click', (e) => {
				e.preventDefault();

				document
					.getElementById('adqs_advtFilter_more')
					.classList.toggle('hidden');



				if(sessionStorage.getItem(`advtf_has_opened_${btnDataId}`)){
					sessionStorage.removeItem(`advtf_has_opened_${btnDataId}`);
				}else{
					sessionStorage.setItem(`advtf_has_opened_${btnDataId}`, true);
				}



			});
	}

	async function add_remove_fav($listingid) {
		const formdata = new FormData();
		formdata.append('action', 'adqs_add_rmv_fav_listing');
		formdata.append('security', window.adqsGridPage.security);
		formdata.append('postid', Number($listingid));
		const request = await fetch(window.adqsGridPage.ajaxurl, {
			method: 'POST',
			body: formdata,
		});

		const response = await request.json();

		let countBtn = document.querySelector('.adqs-favlist-widget-wrapper .abs-count');
		if(countBtn && response.data){
			let count = 0;
			if(Array.isArray(response?.data)){
				count = response?.data?.length;
			}else{
				count = Object.values(response?.data)?.length;
			}
			countBtn.innerHTML = count || 0;
		}
	}

	// Add a delegate event listener to the parent wrapper

    const htmlBody = document.body;

    htmlBody.addEventListener('click', (e) => {
		const favBtn = e.target.closest('.adqs-add-fav-btn') ?? false;
        if (!favBtn || !favBtn.classList.contains('adqs-add-fav-btn')) {
			return;
		}
            if (document.querySelectorAll(`.adqs-msg-tooltip`).length > 0) {
                document.querySelectorAll(`.adqs-msg-tooltip`).forEach((tt) => {
                    tt.remove();
                });
            }

            if (!htmlBody.classList.contains('logged-in')) {
                favBtn.innerHTML += `<span class="adqs-msg-tooltip">${adqsGridPage.login_msg}</span>`;
                return;
            }

            if (favBtn.classList.contains('adqs-active-fav')) {
                favBtn.classList.remove('adqs-active-fav');
                add_remove_fav(favBtn.dataset.favId);
            } else {
                favBtn.classList.add('adqs-active-fav');
                add_remove_fav(favBtn.dataset.favId);
            }

    });


});

import axios from 'axios';

function WPRequest() {
}

/**
 * Get data by wp hook
 * */
WPRequest.prototype.hook = async function (action = '', data = {}) {
	const _self = this;
	
	const res = await axios.post(dydo_wp_public.ajax_url, _self.setFormData({
		...data,
		action: action,
		nonce: dydo_wp_public.nonce
	}));

	return res.data;
}

/**
 * Set Form Data
 * */
WPRequest.prototype.setFormData = function (data = {}) {
	const formData = new FormData();
	const items = Object.keys(data);

	if (items.length) {
		items.forEach((item) => {
			if (data[item] instanceof Object || data[item] instanceof Array) {
				formData.append(item, JSON.stringify(data[item]));
			} else {
				formData.append(item, data[item]);
			}
		});
	}

	return formData;
}

export default WPRequest;

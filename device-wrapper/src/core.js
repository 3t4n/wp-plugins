/**
 * Core Functions
 */

/**
 * Check if elelemnt is in the viewport
 * @param {HTMLElement} el - an elelemt to check visisbility
 * @param {integer} percentVisible - percent of visibility to check
 * @return {boolean} - true if element visible in the viewport, else false
 */
 const isInViewport = function(el, percentVisible = 60) {
	let rect = el.getBoundingClientRect();
	let	windowHeight = (window.innerHeight || document.documentElement.clientHeight);
	
	return !(
		Math.floor(100 - (((rect.top >= 0 ? 0 : rect.top) / +-(rect.height / 1)) * 100)) < percentVisible ||
		Math.floor(100 - ((rect.bottom - windowHeight) / rect.height) * 100) < percentVisible
	)
};

/**
 * Update device's height if angle is more than 0
 * @param {integer} deviceAngle angle of the device
 * @param {integer} deviceWidth width of the device
 * @param {integer} deviceHeight height of the device
 * @param {HTMLElement} deviceEl device element
 */
const changeAngle = (deviceAngle, deviceWidth, deviceHeight, deviceEl) => {
	let rad = deviceAngle * Math.PI / 180;
	let	sin = Math.sin(rad);
	let	cos = Math.cos(rad);

	let newWidth  = Math.abs(deviceWidth * cos) + Math.abs(deviceHeight * sin);
	let	newHeight = Math.abs(deviceWidth * sin) + Math.abs(deviceHeight * cos);

	deviceEl.style.width = newWidth + 'px';
	deviceEl.style.height = newHeight + 'px';

	deviceEl.querySelector(".device-wrapper__device").style.width = newHeight + 'px';
	deviceEl.querySelector(".device-wrapper__device").style.height = newWidth + 'px';
}

export { isInViewport, changeAngle };

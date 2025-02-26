// let axialNestId;
// let customizerLang;
// let customizerCurrency;
// let liteModeButtonText;
// let addToCartCSSClass;
// let productionJsonLang;

window.onload = () => {
	document.getElementsByTagName('body')[0].insertAdjacentHTML("afterbegin",
		'<axial-nest id="axial-nest" interactive-camera	product="'+window.axialNestId+'" language="'+window.customizerLang+'" currency="'+window.customizerCurrency+'"></axial-nest>');

	const customizeButton = document.getElementById('axial-customize');
	customizeButton.onclick = () => document.getElementById('axial-nest').style.display = 'block';

	const cartButton = document.getElementsByClassName(window.addToCartCSSClass)[0];
	if (cartButton != null)
		cartButton.style.display = 'none';
};

document.addEventListener("axialNestLoadFinished", (e) => {
	let element = e.detail;
	if (element.isLite())
		document.getElementById('axial-customize').innerHTML = window.liteModeButtonText;

	if (document.getElementsByClassName(window.addToCartCSSClass)[0] != null)
		element.addCustomButton('Add to cart', 'green', 'white', () => {
			axialnest_woo_addToCart(element);
		});
	element.addCustomButton('Close', 'red', 'white', () => {
		document.getElementById('axial-nest').style.display = 'none';
	});
});

async function axialnest_woo_addToCart(axialElement) {
	const submitButton = document.getElementsByClassName(window.addToCartCSSClass)[0];
	if (axialElement.isLite()) {
		document.getElementById('axial-id').value = '';
	} else {
		const customization = await axialElement.getFullJSONOrder(window.productionJsonLang);
		const customizationText = await axialElement.getFullPlainTextOrder();
		document.getElementById('customization-text').value = customizationText;
		document.getElementById('customization-json').value = JSON.stringify(customization);
		const screenshots = await axialElement.getModelScreenshots();
		document.getElementById('customization-screenshots').value = JSON.stringify(screenshots);
		document.getElementById('customization-thumbnail').value = screenshots.left;
	}
	submitButton?.click();
}

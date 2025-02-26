'use strict';

(() => {

	const HASH_SESSION_STORAGE_KEY = 'adwire.hash';

	const form = document.querySelector('form.adwire-settings-form');
	if (!form) return;

	const selector = 'h2, h2 + p, h2 + p + table';
	const elements = Array.from(form.querySelectorAll(selector));
	const headings = elements.filter(({ nodeName }) => 'H2' === nodeName);
	const navigation = document.createElement('nav');
	navigation.classList.add('nav-tab-wrapper');
	form.before(navigation);
	form.classList.add('with-navigation');

	const anchors = [];

	const handleAnchorClick = ({ target: { dataset: { hash: targetHash } } }) => {
		anchors.forEach(({ classList, dataset: { hash: anchorHash } }) => classList[targetHash === anchorHash ? 'add' : 'remove']('nav-tab-active'));
		elements.forEach(({ style }) => (style.display = 'none'));
		Array.from(document.querySelectorAll(selector.replace(/(h2)/gi, `$1[data-hash="${targetHash}"]`))).forEach(({ style }) => (style.display = 'block'));
	};

	headings.forEach(heading => {
		const anchor = document.createElement('a');
		anchor.classList.add('nav-tab');
		anchor.dataset.hash = heading.dataset.hash = heading.innerText.toLowerCase().replace(/\s+/g, '-');
		anchor.href = '#' + anchor.dataset.hash;
		anchor.title = anchor.innerText = heading.innerText;
		anchor.addEventListener('click', handleAnchorClick, { passive: true });
		anchors.push(anchor);
		navigation.append(anchor);
	});

	form.addEventListener('submit', () => (sessionStorage[HASH_SESSION_STORAGE_KEY] = location.hash), { passive: true });

	const handleHashChange = () => {
		const { hash: initialHash } = location;
		const knownHash = (sessionStorage[HASH_SESSION_STORAGE_KEY] || initialHash).replace(/^#/, '');
		const anchorByHash = anchors.find(({ dataset: { hash: anchorHash } }) => knownHash === anchorHash);
		(anchorByHash || anchors[0]).click();
		if(sessionStorage[HASH_SESSION_STORAGE_KEY]) delete sessionStorage[HASH_SESSION_STORAGE_KEY];
	};

	handleHashChange();

	window.onhashchange = handleHashChange;

})();

(() => {

	const inputs = Array.from(document.querySelectorAll('input[type="color"]'));

	const handleInputChange = ({ target: { nextSibling: label, value } }) => {
		if('LABEL' !== label.nodeName) return;
		label.innerText = value;
	};

	inputs.forEach(input => {
		const { id, value } = input;
		const label = document.createElement('label');
		label.htmlFor = id;
		label.innerText = value;
		input.after(label);
		input.addEventListener('change', handleInputChange, { passive: true });
	});

})();

(() => {

	const EXAMPLE_AD_TAG_UNSKIPPABLE = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/single_ad_samples&ciu_szs=300x250&impl=s&gdfp_req=1&env=vp&output=vast&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ct%3Dlinear&correlator=';
	const EXAMPLE_AD_TAG_SKIPPABLE = EXAMPLE_AD_TAG_UNSKIPPABLE.replace('linear', 'skippablelinear');

	const inputs = Array.from(document.querySelectorAll('input[type="url"]'));

	inputs.forEach((input, index) => {
		const { nextSibling: paragraph } = input;
		if('P' !== paragraph.nodeName) return;

		const handleAnchorClick = event => {
			event.preventDefault();
			input.value = !index ? EXAMPLE_AD_TAG_SKIPPABLE : EXAMPLE_AD_TAG_UNSKIPPABLE;
		};

		const anchor = document.createElement('a');
		anchor.href = '#';
		anchor.title = anchor.innerText = 'Example AdTag';
		anchor.addEventListener('click', handleAnchorClick, { passive: false });
		paragraph.after(anchor);

	});

})();

document.addEventListener('DOMContentLoaded', function () {
	const fixedMenu = document.getElementById('wa-astrolabe-wrapper');

	/**
	 * Check at what level the body is scrolled, to add the class wa-astro-fade
	 * if we reach the end of body
	 */
	function checkBodyScroll() {
		const scrollPosition = window.scrollY;
		const windowHeight = window.innerHeight;
		const documentHeight = document.documentElement.scrollHeight;

		// Check if the user has scrolled to within 100px of the bottom
		if (scrollPosition + windowHeight >= documentHeight - 100) {
			fixedMenu.classList.add('wa-astro-fade');
		} else {
			fixedMenu.classList.remove('wa-astro-fade');
		}
	}

	checkBodyScroll();

	window.addEventListener('scroll', checkBodyScroll);
});

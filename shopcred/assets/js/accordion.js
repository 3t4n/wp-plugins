function slideUp(target, duration) {
	target.style.transitionProperty = 'height, margin, padding';
	target.style.transitionDuration = duration + 'ms';
	target.style.boxSizing = 'border-box';
	target.style.height = target.offsetHeight + 'px';
	target.offsetHeight;
	target.style.overflow = 'hidden';
	target.style.height = 0;
	target.style.paddingTop = 0;
	target.style.paddingBottom = 0;
	target.style.marginTop = 0;
	target.style.marginBottom = 0;
	window.setTimeout(function () {
		target.style.display = 'none';
		target.style.removeProperty('height');
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		target.style.removeProperty('overflow');
		target.style.removeProperty('transition-duration');
		target.style.removeProperty('transition-property');
	}, duration);
}

function slideDown(target, duration) {
	target.style.removeProperty('display');
	var display = window.getComputedStyle(target).display;

	if (display === 'none')
		display = 'block';

	target.style.display = display;
	var height = target.offsetHeight;
	target.style.overflow = 'hidden';
	target.style.height = 0;
	target.style.paddingTop = 0;
	target.style.paddingBottom = 0;
	target.style.marginTop = 0;
	target.style.marginBottom = 0;
	target.offsetHeight;
	target.style.boxSizing = 'border-box';
	target.style.transitionProperty = "height, margin, padding";
	target.style.transitionDuration = duration + 'ms';
	target.style.height = height + 'px';
	target.style.removeProperty('padding-top');
	target.style.removeProperty('padding-bottom');
	target.style.removeProperty('margin-top');
	target.style.removeProperty('margin-bottom');
	window.setTimeout(function () {
		target.style.removeProperty('height');
		target.style.removeProperty('overflow');
		target.style.removeProperty('transition-duration');
		target.style.removeProperty('transition-property');
	}, duration);
}

function slideToggle(target, duration) {
	if (window.getComputedStyle(target).display === 'none') {
		return slideDown(target, duration);
	} else {
		return slideUp(target, duration);
	}
}

function setupFAQ() {

	var pattern = new RegExp('^[\\w\\-]+$');
	var hashval = window.location.hash.substring(1);
	var expandFirstelements = document.getElementsByClassName('spc-accordion-expand-first-true');
	var inactiveOtherelements = document.getElementsByClassName('spc-accordion-inactive-other-false');

	if ((((document.getElementById(hashval) !== undefined) && (document.getElementById(hashval) !== null) && (document.getElementById(hashval) !== "")) && pattern.test(hashval))) {

		var elementToOpen = document.getElementById(hashval);
		if (elementToOpen.getElementsByClassName('spc-accordion-item')[0] !== undefined) {
			elementToOpen.getElementsByClassName('spc-accordion-item')[0].classList.add('spc-accordion-item-active');
			elementToOpen.getElementsByClassName('spc-accordion-item')[0].setAttribute('aria-expanded', true);
			slideDown(elementToOpen.getElementsByClassName('spc-accordion-content')[0], 500);
		}
	} else {

		for (var item = 0; item < expandFirstelements.length; item++) {
			if (true === expandFirstelements[item].classList.contains('spc-accordion-outer-wrapper')) {

				expandFirstelements[item].querySelectorAll('.spc-accordion-child-outer-wrapper')[0].getElementsByClassName('spc-accordion-item')[0].classList.add('spc-accordion-item-active');
				expandFirstelements[item].querySelectorAll('.spc-accordion-child-outer-wrapper')[0].getElementsByClassName('spc-accordion-item')[0].setAttribute('aria-expanded', true);
				expandFirstelements[item].querySelectorAll('.spc-accordion-child-outer-wrapper')[0].getElementsByClassName('spc-accordion-item')[0].querySelectorAll('.spc-accordion-content')[0].style.display = 'block';
			}
		}
	}
	for (var item = 0; item < inactiveOtherelements.length; item++) {
		if (true === inactiveOtherelements[item].classList.contains('spc-accordion-outer-wrapper')) {
			var otherItems = inactiveOtherelements[item].querySelectorAll('.spc-accordion-child-outer-wrapper');

			for (var childItem = 0; childItem < otherItems.length; childItem++) {
				otherItems[childItem].getElementsByClassName('spc-accordion-item')[0].classList.add('spc-accordion-item-active');
				otherItems[childItem].getElementsByClassName('spc-accordion-item')[0].setAttribute('aria-expanded', true);
				otherItems[childItem].getElementsByClassName('spc-accordion-item')[0].querySelectorAll('.spc-accordion-content')[0].style.display = 'block';
			}
		}
	}
}

window.addEventListener(
	'load', function () {

		setupFAQ();

		var accordionElements = document.getElementsByClassName('spc-accordion-outer-wrapper');
		for (var item = 0; item < accordionElements.length; item++) {
			var headingButtons = accordionElements[item].querySelectorAll('.spc-accordion-headings-button');
			var faqItems = accordionElements[item].querySelectorAll('.spc-accordion-item');

			for (var button = 0; button < headingButtons.length; button++) {
				headingButtons[button].addEventListener("click", function (e) {
					faqClick(e, this.parentElement, headingButtons);
				});
			}

			for (var button = 0; button < faqItems.length; button++) {
				faqItems[button].addEventListener("keyup", function (e) {
					faqClick(e, this, headingButtons);
				});
			}

		}
	}
);

function faqClick(e, faqItem, headingButtons) {

	if (e.keyCode === 13 || e.keyCode === 32 || e.button === 0) { // enter || spacebar || left mouse click.
		if (faqItem.classList.contains('spc-accordion-item-active')) {
			faqItem.classList.remove('spc-accordion-item-active');
			faqItem.setAttribute('aria-expanded', false);
			slideUp(faqItem.getElementsByClassName('spc-accordion-content')[0], 500);
		} else {
			var parent = e.currentTarget.closest('.wp-block-spc-accordion');
			var faqToggle = 'true';
			if (parent.classList.contains('wp-block-spc-accordion')) {
				faqToggle = parent.getAttribute('data-faqtoggle');
			}
			faqItem.classList.add('spc-accordion-item-active');
			faqItem.setAttribute('aria-expanded', true);
			slideDown(faqItem.getElementsByClassName('spc-accordion-content')[0], 500);
			if ('true' === faqToggle) {

				var headingButtons = parent.querySelectorAll('.spc-accordion-content');
				for (var buttonChild = 0; buttonChild < headingButtons.length; buttonChild++) {
					var buttonItem = headingButtons[buttonChild].parentElement
					if (buttonItem === faqItem) {
						continue;
					}
					buttonItem.classList.remove('spc-accordion-item-active');
					buttonItem.setAttribute('aria-expanded', false);
					slideUp(buttonItem.getElementsByClassName('spc-accordion-content')[0], 500);
				}
			}
		}
	}
}

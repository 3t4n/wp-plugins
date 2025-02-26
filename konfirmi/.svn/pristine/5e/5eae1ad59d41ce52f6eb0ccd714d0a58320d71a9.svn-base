class Konfirmi_ContactForm7 extends Konfirmi_Base {
	init(formSelector) {
		if(document.querySelector(formSelector)){
			this.initChange(document, formSelector + ' .wpcf7-form-control', formSelector);
			this.initSubmit(document, formSelector + ' .wpcf7-submit', formSelector);
		}
	}
}

function konfirmi_contactForm7Ready(){
	const cf7 = new Konfirmi_ContactForm7();
	cf7.init('.wpcf7-form');
}

document.addEventListener("DOMContentLoaded", konfirmi_contactForm7Ready);

if (typeof konfirmi_Config === 'undefined') konfirmi_Config = { messages: {} };

class Konfirmi_GravityForm extends Konfirmi_Base {
	init(formSelector) {
		this.initChange(document, formSelector + ' .gfield input', formSelector, konfirmi_Config.konfirmiClasses);
		this.initSubmit(document, '.gform_button', formSelector);
	}
}

function konfirmi_gravityFormReady() {
	const gf = new Konfirmi_GravityForm();
	gf.init('.gform_wrapper form');
}
document.addEventListener("DOMContentLoaded", konfirmi_gravityFormReady);
if (typeof konfirmi_Config === 'undefined') konfirmi_Config = { messages: {} };

class Konfirmi_CalderaForm extends Konfirmi_Base {
	init(formSelector) {
		const forms = document.querySelectorAll(formSelector);
        forms.forEach((el) => {
            this.initChange(el, '.form-group', formSelector, konfirmi_Config.konfirmiClasses);
            this.initSubmit(el, '.btn', formSelector);
        });
	}
}

function konfirmi_calderaReady() {
	const cf = new Konfirmi_CalderaForm();
	cf.init('.caldera_forms_form');
}

document.addEventListener("DOMContentLoaded", konfirmi_calderaReady);
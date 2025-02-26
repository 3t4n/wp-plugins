if (typeof konfirmi_Config === 'undefined') konfirmi_Config = { messages: {} };

class Konfirmi_NinjaForm extends Konfirmi_Base {

	initChange() {
		// add 'change' listeners for form inputs
		const NFforms = document.querySelectorAll('.nf-form-cont');
		const that = this;
		let isInit = false;
		const baseInitChange = super.initChange;
		NFforms.forEach(function(el,i){
			el.onmouseover = function(e){
				if(isInit && el.querySelectorAll('.ninja-forms-field').length != 0){
					this.onmouseover = null;
					return e;
				}
				isInit = true;
				baseInitChange(el, '.ninja-forms-field', '.nf-form-cont');
			};
		});
	}

	initSubmit() {
		let verifyNFStatus = false;
		const listener = _.extend({}, Backbone.Events);
		listener.listenTo(nfRadio.channel('forms'), 'before:submit', (e) => {

			//remove old notify
			this.removeAlert();
	
			// skip sumbition 
			nfRadio.channel("form-" + e.get('id')).reply("maybe:submit", function(e){
				if(!verifyNFStatus) {
					nfRadio.channel("form-" + e.get('id')).trigger('enable:submit');
					nfRadio.channel("form-" + e.get('id')).trigger('submit:response');
					return 0;
				}
				return 1;
			});
	
			if(verifyNFStatus){
				return e;
			}
			const parentForm = document.getElementById('nf-form-'+ e.get('id') +'-cont');
			const input = parentForm.querySelector('#kf-widget-response-0');
			if(!input){
				verifyNFStatus = 1;
				nfRadio.channel("form-" + e.get("id")).request("submit", e);
				return e;
			}
			const container = input.parentNode;
			if(input == null || input.value == null || input.value == ''){
				this.showNotification(container, konfirmi_Config.messages.pleaseVerify);
				return e;
			}
			verifyNFStatus = false;
			const result = this.checkToken(input.value).catch((err) => this.showNotification(container, err));
	
			if (result.data == false) {
				this.showNotification(container, konfirmi_Config.messages.pleaseVerify);
			} else {
				verifyNFStatus = 1;
				nfRadio.channel("form-" + e.get("id")).request("submit", e);
				this.showNotification(container, konfirmi_Config.messages.wasVerified);
			}
			
		});
	}

	init() {
		this.initChange();
		this.initSubmit();
	}
}

function konfirmi_ninjaFormReady (){
	const nf = new Konfirmi_NinjaForm();
	nf.init();
} 

document.addEventListener("DOMContentLoaded", konfirmi_ninjaFormReady);

window.onerror = function(msg, url, linenumber) {
	alert(msg);
	return true;
}

const openpgp = window.openpgp;

function encrypt() {
	(async () => {
		const publicKeyArmored = jQuery('#pgp_key_generator_pubkey').val();
		const { data: encrypted } = await openpgp.encrypt({
			message: openpgp.message.fromText( jQuery('#pgp_key_generator_message_encrypt').val() ),
			publicKeys: (await openpgp.key.readArmored(publicKeyArmored)).keys,
		});
		jQuery('#pgp_key_generator_message_encrypt').val(encrypted);
	})().catch(function(error) {
		alert(error);
	});
	return false;
}

function generate() {
	(async () => {
		const key = await openpgp.generateKey({
			userIds: [{ name: jQuery('#pgp_key_generator_username').val(), email: jQuery('#pgp_key_generator_mail_address').val() }],
			rsaBits: jQuery('#pgp_key_generator_key_length').val(),
			passphrase: jQuery('#pgp_key_generator_key_password').val()
		});
		jQuery('#pgp_key_generator_privgenkey').val(key.privateKeyArmored);
		jQuery('#pgp_key_generator_pubgenkey').val(key.publicKeyArmored);
	})().catch(function(error) {
		alert(error);
	});
	return false;
}

function decrypt() {
	(async () => {
		const privateKeyArmored = jQuery('#pgp_key_generator_privkey').val();
		const passphrase = jQuery('#pgp_key_generator_key_password_decrypt').val();
		const { keys: [privateKey] } = await openpgp.key.readArmored(privateKeyArmored);
		await privateKey.decrypt(passphrase);
		const { data: decrypted } = await openpgp.decrypt({
			message: await openpgp.message.readArmored(jQuery('#pgp_key_generator_message_decrypt').val()),
			privateKeys: [privateKey]
		});
		jQuery('#pgp_key_generator_message_decrypt').val(decrypted);
	})().catch(function(error) {
		alert(error);
	});
	return false;
}

jQuery(document).ready(function(){
	jQuery("#pgp_key_generator_form1_button").click(function() { jQuery("#pgp_key_generator_form1").submit(); });
	jQuery("#pgp_key_generator_form1").validate({
		rules:{
			pgp_key_generator_username:{
				required: true
			},
			pgp_key_generator_mail_address:{
				required: true,
				email: true
			}
		},
		submitHandler: function(form) {
			return generate();
		}
	});
	
	jQuery("#pgp_key_generator_form2_button").click(function() { jQuery("#pgp_key_generator_form2").submit(); });
	jQuery("#pgp_key_generator_form2").validate({
		rules:{
			pgp_key_generator_message_encrypt:{
				required: true
			},
			pgp_key_generator_pubkey:{
				required: true
			}
		},
		submitHandler: function(form) {
			return encrypt();
		}
	});
	
	jQuery("#pgp_key_generator_form3_button").click(function() { jQuery("#pgp_key_generator_form3").submit(); });
	jQuery("#pgp_key_generator_form3").validate({
		rules:{
			pgp_key_generator_message_decrypt:{
				required: true
			},
			pgp_key_generator_privkey:{
				required: true
			}
		},
		submitHandler: function(form) {
			return decrypt();
		}
	});
});
<?php




function hexasmal_generate_javascript(
	$uniqid,
	$add_styles = true,
	$code_postal_name = 'calc_shipping_postcode',
	$commune_name = 'calc_shipping_city',
	$country_name = 'calc_shipping_country'
) {

	if( defined( 'REST_REQUEST')) {
		return;
	}

	//plouf(func_get_args());

	//return;

	?>
<!-- HEXASMAL CALL ON <?php echo $uniqid; ?> -->
<script type="text/javascript">

	jQuery(document).ready(function() {
		var uniqid 				= '<?php echo $uniqid; ?>';
		var add_styles 			= <?php echo ($add_styles) ? 'true': 'false'; ?>;
		var code_postal_name 	= '<?php echo addslashes($code_postal_name); ?>';
		var commune_name 		= '<?php echo addslashes($commune_name); ?>';
		var country_name 		= '<?php echo addslashes($country_name); ?>';

		//console.log("uniqid = " + uniqid);		
		//jQuery(uniqid).css('border','red solid 1px');

		hexasmalInit(
			uniqid,
			add_styles,
			code_postal_name,
			commune_name,
			country_name
		);
		jQuery(uniqid + ' *[name="' + code_postal_name + '"]').on('keyup',function() {
			
			//console.log(" Change sur code postal " + jQuery(this).val());
			// skip country not FR
			if( country_name != 'FR' && !hexasmalCountryNeedsChecking(uniqid, country_name)) {
				/*hexasmalRemoveWarning(
					'<?php echo $uniqid; ?>',
					'<?php echo $code_postal_name; ?>',
					'<?php echo $commune_name; ?>',
				);*/
				//console.log("no check on country");
				return;
			}

			var code_postal_value = jQuery(this).val();
			// skip code_postal already done
			var precedent_code_postal = jQuery(uniqid + ' input[name="precedent_code_postal"]');
			if(precedent_code_postal.val() == code_postal_value) {
				//console.log("no check on previous = " + precedent_code_postal.val());
				jQuery('.hexasmal_choices').show();
				hexasmalRemoveWarning(
					'<?php echo $uniqid; ?>',
					'<?php echo $code_postal_name; ?>',
					'<?php echo $commune_name; ?>',
				);
				return;
			}

			// wait for valid code_postal
			var verification_code_postal = hexasmal_validerCodePostal(code_postal_value);
			if(verification_code_postal.valid) {
				//console.log("VALID");
				jQuery(uniqid + ' div.message').hide();
				hexasmalRemoveWarning(
					'<?php echo $uniqid; ?>',
					'<?php echo $code_postal_name; ?>',
					'<?php echo $commune_name; ?>',
				);

				precedent_code_postal.val(code_postal_value);

				hexasmalMagic(
					code_postal_value,
					'<?php echo $uniqid; ?>',
					'<?php echo $code_postal_name; ?>',
					'<?php echo $commune_name; ?>'
				);
			}
			else {
				//console.log("code postal non valide = " + code_postal_value + " error = " + verification_code_postal.error);

				jQuery(uniqid + ' div.message').html(verification_code_postal.error);
				jQuery(uniqid + ' div.message').show();
				hexasmalAddWarning(
					'<?php echo $uniqid; ?>',
					'<?php echo $code_postal_name; ?>'
				);
				return;

			}

		});
	});
</script>
<!-- // CALL -->
	<?php
}

// footer
function hexasmal_cp_javascript() {
	//return;
	?>

	<style type="text/css">
	ul.hexasmal_choices {
		border: #CACACA 1px solid;
    	padding: .5em;
    	list-style-type: none;
	}
	ul.hexasmal_choices li {

	}
	</style>

	<script type="text/javascript">



		function hexasmalCountryNeedsChecking(uniqid, country_name) {
			var countryElement = jQuery(uniqid + ' *[name="' + country_name + '"]');
			//console.log(" country = "  + uniqid + ' *[name="' + country_name + '"]' + " length = " + countryElement.length + " val = " + countryElement.val());
			if(!countryElement.length) {
				return false;
			}
			if(countryElement.val() != 'FR') {
				return false;
			}
			return true;

		}

		function hexasmal_validerCodePostal(code_postal) {
			var response = [];
			if (code_postal.length < 5 && code_postal.length > 0 )		  {
			  response['error'] = "Indiquez un code postal à 5 chiffres";
			  response['valid'] = false;
			}
			else if (code_postal.length > 5)		  {
			  response['error'] = "Indiquez un code postal à 5 chiffres";
			  response['valid'] = false;
			}
			else if (code_postal.length == 0)		  {
			  response['error'] = "Indiquez un code postal";
			  response['valid'] = false;
			}
			else if (isNaN(code_postal)  == true)		  {
			  response['error'] ="Un code postal ne peut pas contenir de lettres";
			  response['valid'] = false;
			}
			else {
				response['valid'] = true;
				
			}
			return response;

		}


		function alloLaPoste(code_postal) {
			//console.log("trying " + code_postal);
			var datanovaURL = '<?php echo HEXASMAL_CP_APIURL; ?>' + code_postal;
			

			jQuery.get( datanovaURL, function( response ) {
				//console.log("repsonse");
				//console.dir(response);
				var communes = [];
				jQuery(response.records).each(function() {
	  					communes.push(jQuery(this)[0].fields);

	  			});
	  			//console.log("allo");
	  			//console.dir(communes);
				return communes;
			});
		}
				



		function hexasmal_addClass(name, rules) {
		    var style = document.createElement('style');
		    style.type = 'text/css';
		    document.getElementsByTagName('head')[0].appendChild(style);
		    if(!(style.sheet||{}).insertRule)
		        (style.styleSheet || style.sheet).addRule(name, rules);
		    else
		        style.sheet.insertRule(name+"{"+rules+"}",0);
		}
					

		function hexasmalAddWarning(uniqid, code_postal_name) {

			var code_postal = jQuery(uniqid + ' input[name="' + code_postal_name + '"]');
			var code_postal_id = code_postal.attr('id');
			var code_postal_label = jQuery(uniqid + ' label[for="' + code_postal_id + '"]');
			if(code_postal_label.length) {
				code_postal_label.removeClass('text-success');
				code_postal_label.addClass('text-danger');
			}
			code_postal.removeClass('is-valid');
			code_postal.addClass('is-invalid');

		}

		function hexasmalAddCommuneWarning(uniqid, commune_name) {
			
			var commune = jQuery(uniqid + ' input[name="' + commune_name + '"]');
			var commune_id = commune.attr('id');
			var commune_label = jQuery(uniqid + ' label[for="' + commune_id + '"]');
			if(commune_label.length) {
				commune_label.removeClass('text-success');
				commune_label.addClass('text-danger');
			}
			commune.removeClass('is-valid');
			commune.addClass('is-invalid');
		}

	
		function hexasmalRemoveWarning(uniqid, code_postal_name) {
			
			var code_postal = jQuery(uniqid + ' input[name="' + code_postal_name + '"]');
			var code_postal_id = code_postal.attr('id');
			var code_postal_label = jQuery(uniqid + ' label[for="' + code_postal_id + '"]');
			if(code_postal_label.length) {
				code_postal_label.removeClass('text-danger');
				code_postal_label.addClass('text-success');
			}
			code_postal.removeClass('is-invalid');
			code_postal.addClass('is-valid');
			setTimeout(function () { 
			    code_postal.removeClass('is-valid');
			    code_postal_label.removeClass('text-success');
			}, 2000);
		}

		function hexasmalRemoveCommuneWarning(uniqid, commune_name) {
			

			var commune = jQuery(uniqid + ' input[name="' + commune_name + '"]');
			var commune_id = commune.attr('id');
			var commune_label = jQuery(uniqid + ' label[for="' + commune_id + '"]');
			if(commune_label.length) {
				commune_label.removeClass('text-danger');
				commune_label.addClass('text-success');
			}
			commune.removeClass('is-invalid');
			commune.addClass('is-valid');
			setTimeout(function () { 
			    commune.removeClass('is-valid');
			}, 2000);

		}


		function hexasmalAddStyles() {
			hexasmal_addClass('.text-success',"color: #28a745!important;");
			hexasmal_addClass('.text-danger',"color: #a94442 !important;");
			hexasmal_addClass('.is-invalid',"border: solid 1px #dc3545 !important;");
			hexasmal_addClass('.is-valid',"border: solid 1px #28a745 !important;");
		}

		function hexasmalInit(uniqid, add_styles, code_postal_name, commune_name, country_name) {
			var bootstrap_enabled = (typeof jQuery().modal == 'function');
			if(!bootstrap_enabled && add_styles) {
					hexasmalAddStyles();
				}

			// create container
			var container_html =
				'<div class="hexasmal_container">' + "\n"
				+ '<input name="precedent_code_postal" type="hidden" />' + "\n"
				+ '</div>';

			//console.log(" uniqid = " + uniqid);

			// and fill precedent input
			jQuery(uniqid).append(container_html);

			var is_admin = <?php echo (function_exists( 'is_admin') && is_admin()) ? 'true' : 'false'; ?>;
			if(!is_admin) {
				jQuery(uniqid + ' input[name="precedent_code_postal"]').val(jQuery(uniqid + ' input[name="' + code_postal_name + '"]').val());
			}

			jQuery(uniqid + ' input[name="' + code_postal_name + '"]').parent().append('<div class="message"></div>');

			
		}

		function hexasmalBuildSelect(communes, commune_name, commune_id, commune_classes) {
			var select_string = '<select name="' + commune_name +'" id="' + commune_id +'" class="' + commune_classes + '">' + "\n";
			if(communes) {
				communes.forEach(function(commune) {
					select_string += "\t" + '<option value="' 
					//+ commune.nom_de_la_commune 
					+ commune.libelle_d_acheminement 
					+ '" data-ligne_5="' + commune.ligne_5 
					+'">';
					//select_string += commune.code_postal + ' ';
					//console.dir(commune.ligne_5);
					select_string += commune.nom_de_la_commune
					
					select_string += '</option>' + "\n";

				});
			select_string += '</select>';
			return select_string;
			}
		}

		function hexasmalSelectCommune(element, uniqid, commune_name) {
			//var commune = jQuery(element).data('commune');
			var commune = jQuery(element).data('libelle_d_acheminement');
			var libelle = jQuery(element).data('ligne_5');

			//console.log(" on a  " + commune + "  et" + libelle  + " uniqid" + uniqid + " comme_name = " + commune_name );
			commune = unescape(commune);
			libelle = unescape(libelle);

			if( commune_name == 'billing_city' ) 
				libelle_name = 'billing_address_2';
			else 
				libelle_name = 'shipping_address_2'
			libelle_existing = jQuery(uniqid + ' *[name="' + libelle_name + '"]').val();
			
			if( libelle_existing.length )
				new_libelle = libelle_existing + ' ' + libelle;
			else if( libelle.length )
				new_libelle = libelle;
			else
				new_libelle = '';

			jQuery(uniqid + ' *[name="' + commune_name + '"]').val(commune);
			if( new_libelle && new_libelle.length) 
				jQuery(uniqid + ' *[name="' + libelle_name + '"]').val(new_libelle);
			jQuery(uniqid + ' *[name="' + commune_name + '"]').trigger('change');
			jQuery(element).closest('ul').hide();
			return false;
		}

		function hexasmalBuildChoices(communes, uniqid, commune_name) {

			var commune_selector = uniqid + ' *[name="' + commune_name + '"]';
			var choice_string = '<ul class="hexasmal_choices">' + "\n";

			if(communes) {
				//console.log("build choices count " + communes.length);
				communes.forEach(function(commune){
					choice_string += "\t" + '<li><a href="#" data-libelle_d_acheminement="' + escape( commune.libelle_d_acheminement ) + '" data-commune="' + escape(commune.nom_de_la_commune) + '" data-ligne_5="' + escape( commune.ligne_5 ) + '" '
					+' onclick="hexasmalSelectCommune(this, \'' + uniqid + '\',\'' + commune_name + '\'); return false;">'
					+ commune.nom_de_la_commune
					+ '</a></li>' + "\n";
				});
			}
			choice_string += "\n" + '</ul>';
			return choice_string;
		}

		function hexasmalMagic(code_postal,	uniqid, code_postal_name, commune_name)  {

			var existing_commune = jQuery(uniqid + ' *[name="' + commune_name + '"]');
			

			var datanovaURL = '<?php echo HEXASMAL_CP_APIURL; ?>' + code_postal;
			
			var communes = [];			

			// remove existing 
			if(jQuery('.hexasmal_choices').length) {
				jQuery('.hexasmal_choices').remove();
			}


			jQuery.get( datanovaURL, function( response ) {
				//console.log("repsonse");				//console.dir(response);
				//console.log("count = " + response.records.length );

				jQuery(response.records).each(function() {
					var fields =jQuery(this)[0].fields;
					if('ligne_5' in fields && fields.ligne_5 != 'undefined') {
						fields.nom_de_la_commune = fields.nom_de_la_commune + ' ( ' + fields.ligne_5 + ' )';
						
					}

					//console.log("commune = " + fields.nom_de_la_commune + " ligne 5 = " + fields.ligne_5);
					communes.push(fields);
						
					
	  			});

				//console.log("on a ");	  			console.dir(communes);	  			console.log(communes.length);


				if(communes.length == 1) {
					var commune = communes[0];
					jQuery(uniqid + ' *[name="' + commune_name + '"]').val(commune.nom_de_la_commune);

				}
				else {
		  			//console.log("communes = " + communes.length);

					var select_string = hexasmalBuildSelect(
						communes,
						commune_name,
						existing_commune.attr('id'),
						existing_commune.attr('class')
					);

					var choices_string = hexasmalBuildChoices(
						communes,
						uniqid,
						commune_name
						);

					//console.log("choices = " + (choices_string));
					jQuery(uniqid + ' *[name="' + commune_name + '"]').val('');
					//hexasmalAddWarning(false, true);
					jQuery(uniqid + ' *[name="' + commune_name + '"]').parent().append(choices_string);
					//console.log("select = " + select_string);
					//jQuery(uniqid + ' *[name="' + commune_name + '"]').parent().append(select_string);
					//console.dir(jQuery(uniqid + ' *[name="' + commune_name + '"]'));
					//jQuery(uniqid + ' *[name="' + commune_name + '"]').replaceWith(select_string);
					
				}
			});
		}
	</script>
	<?php
}
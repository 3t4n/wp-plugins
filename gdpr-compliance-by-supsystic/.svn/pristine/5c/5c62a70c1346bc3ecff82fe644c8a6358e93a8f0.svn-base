jQuery(document).ready(function(){
	
	var agreementsNavigate = {
		_$mainShell: jQuery('#gdprsupAgreementsShell')
	,	_$globalShell: jQuery('#gdprsupAgreementsGlobalShell')
	,	_$standardShell: jQuery('#gdprsupAgreementsStandardShell')
	,	_$exRow: jQuery('#gdprsupAgreementEx')
	,	_fields: {
			'enb': {}
		,	'label': {}
		,	'desc': {}
		,	'scripts_header': {}
		,	'scripts_footer': {}
		,	'is_global': {}
	}
	,	init: function() {
			gdprsupCheckDestroy(this._$exRow.find('input[type="checkbox"]'));
			this._$exRow.find(':input').attr('disabled', 'disabled');
	}
	,	add: function(data) {
			var $row = this._$exRow.clone().removeAttr('id')
			,	isGlobal = false;
			if(data) {
				for(var k in this._fields) {
					var $input = $row.find('[name*="'+ k+ '"]');
					if($input && $input.length) {
						switch($input.tagName().toLowerCase()) {
							case 'input':
								switch($input.attr('type').toLowerCase()) {
									case 'checkbox':
										data[ k ] ? $input.attr('checked', 'checked') : $input.removeAttr('checked');
										break;
									default:
										$input.val(data[ k ]);
										break;
								}
								break;
							case 'textarea':
								$input.val(data[ k ]);
								break;
						}
					}
				}
				if(parseInt(data['is_global'])) {
					isGlobal = true;
				}
			}
			if(isGlobal) {
				this._$globalShell.append($row);
			} else {
				this._$standardShell.append($row);
			}
			$row.find(':input').removeAttr('disabled');
			this._reorder();
			gdprsupInitCustomCheckRadio( $row );
			$row.find('.sup-no-init').removeClass('sup-no-init');
			gdprsupInitTooltips( $row );
			$row.find('.gdprsupRemoveAgreementBtn').click(function(){
				agreementsNavigate.remove( this );
				return false;
			});
			return $row;
			
	},	remove: function( btn ) {
			jQuery(btn).parents('.gdprsupAgreement:first').remove();
			this._reorder();
	},	_reorder: function() {
			var $rows = this._$mainShell.find('.gdprsupAgreement');
			if($rows && $rows.length > 0) {
				var i = 0;
				$rows.each(function(){
					var $inputs = jQuery(this).find(':input');
					$inputs.each(function(){
						var name = jQuery(this).attr('name');
						jQuery(this).attr('name', name.replace(/(agreements\[\]|agreements\[\d+\])/g, 'agreements['+ i+ ']'));
					});
					i++;
				});
			}
	}
		
	};
	jQuery('.gdprsupAddAgreement').click(function(){
		var $row = agreementsNavigate.add();
		jQuery('html, body').animate({
			scrollTop: $row.offset().top
		}, 700);
		return false;
	});
	agreementsNavigate.init();
	if(typeof(gdprsupAgreements) !== 'undefined') {
		for(var i = 0; i < gdprsupAgreements.length; i++) {
			agreementsNavigate.add( gdprsupAgreements[ i ] );
		}
	}
});
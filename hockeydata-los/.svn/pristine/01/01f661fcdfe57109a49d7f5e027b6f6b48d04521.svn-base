window.jQuery = window.jQuery || {};

var hdLosTranslate = function( e ) {

	if ( ! ( e in window[ 'hdLosTranslations' ] ) ) {

		console && console.log && console.log( 'Missing hockeydata LOS Translation: ' + e );

		return e;

	}

	return window[ 'hdLosTranslations' ][ e ];

};

var hdLosCheckApiKey = function () {

	var $checking = jQuery( '#hd-los-api-key-checking' ).hide(),
		$ok       = jQuery( '#hd-los-api-key-ok' ).hide(),
		$nok      = jQuery( '#hd-los-api-key-nok' ).hide(),
		$apiKey   = jQuery( '#hd_los_api_key' ),
		apiKey    = $apiKey.val();

	function err() {

		$nok.show();

	}

	if ( apiKey ) {

		$checking.show();

		setTimeout(

			function() {

				jQuery.ajax( {
					'complete': function() {

						$checking.hide();

					},
					'crossDomain': true,
					'data': {
						'apiKey':  jQuery.trim( apiKey ),
						'referer': document.domain
					},
					'dataType': 'jsonp',
					'error': err,
					'success': function( e ) {

						if ( e[ 'statusId' ] && e.data ) {

							$ok.show();

						} else {

							err();

						}
					},
					'url': 'https://api.hockeydata.net/key/get'
				} );

			}, 1000

		);

	}

};

var hdLosInitAdminSettings = function () {

	jQuery( '.hd-los-color-picker' )[ 'wpColorPicker' ]();

};

var hdLosToggleAdditionalOptions = function( e ) {

	var $link     = jQuery( e ),
		$input    = $link.siblings( 'input' ),
		$textShow = $link.find( 'span:first-child' ),
		$textHide = $link.find( 'span:last-child'  ),
		visible   = $input.val() === '1';

	$link.parent().next().fadeToggle();
	$input.val( visible ? '0' : '1' );

	if ( visible ) {

		$textShow.show();
		$textHide.hide();

	} else {

		$textShow.hide();
		$textHide.show();

	}

};

var hdLosAddDivisionConfigRow = function( division ) {

	var $row                = jQuery( '<tr/>').appendTo( jQuery( '#hd-los-divisions-table' ) ),
		$cellDivisionId     = jQuery( '<td/>').appendTo( $row ),
		$cellDivisionAlias  = jQuery( '<td/>').appendTo( $row ),
		$cellDivisionValue  = jQuery( '<td/>').appendTo( $row ),
		$cellRemove         = jQuery( '<td/>').appendTo( $row ),
		$inputdivisionId    = jQuery( '<input type="text" class="large-text division-id" readonly/>').appendTo( $cellDivisionId  ),
		$inputdivisionAlias = jQuery( '<input type="text" class="large-text division-alias"/>').appendTo( $cellDivisionAlias ).attr( 'placeholder', hdLosTranslate( 'Alias' ) ),
		$inputdivisionValue = jQuery( '<input type="text" class="large-text division-value"/>').appendTo( $cellDivisionValue ).attr( 'placeholder', hdLosTranslate( 'Division-Id, Permalink, JSON-string' ) ),
		$buttonRemove       = jQuery( '<button type="button" class="button button-small"/>').appendTo( $cellRemove ).html( "<span class='dashicons dashicons-trash'></span>" );

	$buttonRemove.click( function() { $row.remove(); } );

	if ( division ) {

		$inputdivisionId.val(    division.id );
		$inputdivisionAlias.val( division.alias );
		$inputdivisionValue.val( division.value );

	} else {

		var $divisionsId = jQuery( '#hd_los_divisions_id' ),
		    id = Number( $divisionsId.val() ) + 1;

		$divisionsId.val( id );
		$inputdivisionId.val( id );
		$inputdivisionAlias.focus();

		jQuery( '#hd-los-divisions-save-hint' ).show();

	}

};

var hdLosStringifyDivisionsConfig = function() {

	var divisions = [];

	jQuery( '#hd-los-divisions-table' ).find( 'tr' ).each( function() {

		var $row     = jQuery( this ),
			division = {};

		division.id    = $row.find( '.division-id'    ).val();
		division.alias = $row.find( '.division-alias' ).val();
		division.value = $row.find( '.division-value' ).val();

		divisions.push( division );

	} );

	jQuery( '#hd_los_divisions' ).val( JSON.stringify( divisions ) );

	return true;

};

var hdLosSelectDivision = function( e ) {

	var $select = jQuery( e ),
		$p      = $select.parent().parent().next();

	$select.val() ? $p.hide() : $p.show();

};

/*

wp.blocks.registerBlockType( 'hockeydata/los.schedule', {
    title: 'hockeydata LOS Schedule',
    icon: 'universal-access-alt',
    category: 'widgets',
    example: {},
    edit() {
        return "hockeydata LOS Schedule";
    },
    save() {
        return "hockeydata LOS Schedule";
    },
} );

*/
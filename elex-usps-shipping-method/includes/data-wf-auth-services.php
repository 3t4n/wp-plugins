<?php

/**
 * USPS Services and subservices
 */
return array(
	// Domestic
	'D_GROUND_ADVANTAGE' => array(
		// Name of the service shown to the user
		'name'  => 'USPS Ground Advantage&#8482;',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DUXP0XXXX' => 'USPS Ground Advantage Single-piece',
			'DUUP6XXXX' => 'USPS Ground Advantage  Cubic Soft Pack Tier 6',
			'DUUP2XXXX' => 'USPS Ground Advantage Cubic Soft Pack Tier 2',
			'DUUP1XXXX' => ' USPS Ground Advantage Cubic Soft Pack Tier 1',
			'DUXO0XXXX' => 'USPS Ground Advantage Oversized',

		),
	),
	'D_FIRST_CLASS_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'First Class Mail&#8482;',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DFXL0XXXX' => 'First Class Mail Letter(Stamped)',
			'DFLL0XXXX' => 'First Class Mail Letter(Metered)',
			'DFXF0XXXX' => 'First Class Mail Large Envelopes(Flats)',
			'DFXC0XXXX' => 'First Class Mail Postcards',
			'DDXF0XXNS' => 'First Class Mail EDDM',
			'DFXXSXXXU' => 'First Class Mail Semipostal Stamps',
		),
	),
	'D_EXPRESS_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'Priority Mail Express&#8482;',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DEFE0XXXX'  => 'Priority Mail Express Flat Rate Envelope',
			'DEFE2XXXX'  => 'Priority Mail Express Padded Flat Rate Envelope',
			'DEFE1XXXX' => 'Priority Mail Express Legal Flat Rate Envelope',
			'DEXX0XXXX' => 'Priority Mail Express Single-piece',
		),
	),
	'D_MEDIA_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'Media Mail',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DMXX0XXXB'  => 'Media Mail Basic',
			'DMXX0XXX5'  => 'Media Mail 5-digit',
			'DMXX0XXXU'  => 'Media Mail Large Envelopes & Parcels',
		),
	),
	// usps connect also change as parcel select
	'D_USPS_CONNECT_REGIONAL' => array(
		// Name of the service shown to the user
		'name'  => 'USPS Connect Regional',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DVXP0XOCX'  => 'Parcel Select DNDC Single-piece',
			'DVXP0XOFX'  => 'Parcel Select DSCF SCF',
			'DVXP0XOBX'  => 'Parcel Select DHUB Single-piece',
			'DVXP0XOUX'  => 'Parcel Select DDU Single-piece',
			'DVXO0XXCX' => 'Parcel Select DNDC Oversized',
			'DVXO0XXUX' => 'Parcel Select DDU Oversized',
			'DVXO0XXFX' => 'Parcel Select DSCF Oversized',
			'DVXO0XXBX' => 'Parcel Select DHUB Oversized',



		),
	),
	'D_USPS_CONNECT_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'USPS Connect Mail',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DFOFXXXUX'  => 'Connect Local Mail',
			
		),
	),
	'D_USPS_CONNECT_LOCAL' => array(
		// Name of the service shown to the user
		'name'  => 'USPS Connect Local',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DVOA0XXXX'  => 'Connect Local DDU Small Flat Rate Bag',
			'DVOA1XXXX'  => 'Connect Local DDU Large Flat Rate Bag',
			'DVOB0XXXX'  => 'Connect Local DDU Flat Rate Box',
			'DVGXXXXUX'  => 'Connect Local DDU',
			'DVGO0XXUX'  => 'Connect Local DDU Oversized',


		),
	),
	'D_BOUND_PRINTED_MATTER' => array(
		// Name of the service shown to the user
		'name'  => 'Bound Printed Matter',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DBPP0XXCX'  => 'Bound Printed Matter DNDC Presorted',
			'DBPP0XXUX'  => 'Bound Printed Matter DDU Presorted',
			'DBPP0XXNX'  => 'Bound Printed Matter Presorted',
			'DBPP0XXFX'  => 'Bound Printed Matter DSCF Presorted',



		),
	),
	'D_LIBRARY_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'Library Mail',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DLXX0XXXB'  => 'Library Mail Basic',
			'DLXX0XXX5'  => 'Library Mail 5-digit',
			'DLXX0XXXU'  => 'Library Mail Large Envelopes & Parcels',

			
		),
	),
	'D_PRIORITY_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'Priority Mail&#0174;',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'DPFE2XXXX'  => 'Priority Mail Padded Flat Rate Envelope',
			'DPFE0XXXX' => 'Priority Mail Flat Rate Envelope',
			'DPFE1XXXX' => 'Priority Mail Legal Flat Rate Envelope',
			'DPFB1XXXX' => 'Priority Mail Medium Flat Rate Box',
			'DPFB0XXXX' => 'Priority Mail Large Flat Rate Box',
			'DPXX0XXXX' => 'Priority Mail Single-piece',
			'DPFB2XXXX' => 'Priority Mail Small Flat Rate Box',
			'DPFB3XXXX' => 'Priority Mail APO/FPO/DPO Flat Rate Box',
			'DPUX1XXXX' => 'Priority Mail Cubic Soft Pack Tier 1',

			
		),
	),
	// International
	'I_EXPRESS_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'Priority Mail Express International&#8482;',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'IEXX0XXXX'  => 'Priority Mail Express International ISC Single-piece',
			'IEFE0XXXX'  => 'Priority Mail Express International ISC Flat Rate Envelope',
			'IEFE1XXXX'  => 'Priority Mail Express International ISC Legal Flat Rate Envelope',
			'IEFE2XXXX'  => 'Priority Mail Express International ISC Padded Flat Rate Envelope',



		),
	),
	'I_PRIORITY_MAIL' => array(
		// Name of the service shown to the user
		'name'  => 'Priority Mail International&#0174;',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'IPXX0XXXX'  => 'Priority Mail International ISC Single-piece',
			'IPFE0XXXX'  => 'Priority Mail International ISC Flat Rate Envelope',
			'IPFB0XXXX'  => 'Priority Mail International ISC Large Flat Rate Box',
			'IPFB1XXXX'  => 'Priority Mail International ISC Medium Flat Rate Box',
			'IPFE2XXXX'  => 'Priority Mail International ISC Padded Flat Rate Envelope',
			'IPFE1XXXX'  => 'Priority Mail International ISC Legal Flat Rate Envelope',
			'IPFB2XXXX'  => 'Priority Mail International ISC Small Flat Rate Box',
			'IPFB4XXXX'  => 'Priority Mail International ISC DVD Flat Rate Box',
			'IPFB5XXXX'  => 'Priority Mail International ISC Large Video Flat Rate Box',





		),
	),
	'I_GLOBAL_EXPRESS' => array(
		// Name of the service shown to the user
		'name'  => 'Global Express Guaranteed&#0174; (GXG)',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'IGXX0XXXX'  => 'Global Express Guaranteed ISC Single-piece',
		),
	),
	'I_FIRST_CLASS_PACKAGE' => array(
		// Name of the service shown to the user
		'name'  => 'First Class Package International&#0174;',

		// Services which costs are merged if returned (cheapest is used). This gives us the best possible rate.
		'services' => array(
			'IFXP0XXXX'  => 'First-Class Package International Service  ISC Single-piece',          

		),
	),

);

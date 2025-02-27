/**
 * -----------------------------------------------------------------------------
 * (c) 2016-2025 Pine Grove Software, LLC -- All rights reserved.
 * Contact: webmaster@AccurateCalculators.com
 * License: GPL2
 * www.AccurateCalculators.com
 * -----------------------------------------------------------------------------
 * Currencies and date formats.
 * -----------------------------------------------------------------------------
 */

/**
 * @preserve Copyright 2016-2025 Pine Grove Software, LLC
 * AccurateCalculators.com
 * License: GPL2
 * locales.gpl.js
 */


const CCY_FORMAT_KEY = 'ccy_format';
const DATE_FORMAT_KEY = 'date_format';


export class Locales {

	// initialized by call to initLocale();
	// each ...Conventions is a particular convention object for the desired locale
	static moneyConventions = null;
	// special cases, cloned from moneyConventions
	static rateConventions = null; // ccy_r = '%'
	// no currencies, but local formatting conventions, if precision = 0 then integer
	static numConventions = null;
	// conventions for date strings
	static dateConventions = null;
	// YYYY-MM-DD
	static sortConventions = null;


	/**
	 * Currency formats
	 */
	static CCY_FORMATS = {
		USD1: 0,
		USD2: 1,
		GBH: 2,
		NON: 3,
		EUR1: 4,
		EUR2: 5,
		EUR3: 6,
		EUR4: 7,
		RND: 8, // South African Rand
		NOK: 9, // Norwegian krone, kr
		NGN: 10, // Nigerian naira
		THB: 11, // Thai Baht
		DEFAULT: 12,
		AFZA: 62, //South Africa ZAR
		ENZA: 62, //South Africa ZAR
		AZAZ: 84, //Azerbaijan AZN
		ENAZ: 84, //Azerbaijan AZN
		BEBY: 54, //Belarus BYN
		ENBY: 54, //Belarus BYN
		BGBG: 27, //Bulgaria BGN
		ENBG: 27, //Bulgaria BGN
		CSCZ: 15, //Czechia CZK
		ENCZ: 15, //Czechia CZK
		DADK: 30, //Denmark DKK
		DA: 30, //Denmark DKK
		ENDK: 30, //Denmark DKK
		DEAT: 43, //Austria EUR
		ENAT: 43, //Austria EUR
		DECH: 103, //Switzerland CHF
		ENCH: 103, //Switzerland CHF
		DEDE: 34, //Germany EUR
		DE: 34, //Germany EUR
		ENDE: 34, //Germany EUR
		DELI: 103, //Liechtenstein CHF
		ENLI: 103, //Liechtenstein CHF
		DELU: 34, //Luxembourg EUR
		ENLU: 34, //Luxembourg EUR
		DVMV: 99, //Maldives MVR
		ELGR: 33, //Greece EUR
		EL: 33, //Greece EUR
		ENGR: 33, //Greece EUR
		ENAE: 87, //United Arab Emirates (the) AED
		ARAE: 87, //United Arab Emirates (the) AED
		ENAU: 49, //Australia AUD
		ENBH: 89, //Bahrain BHD
		ARBH: 89, //Bahrain BHD
		ENBZ: 53, //Belize BZD
		ENCA: 50, //Canada CAD
		ENDZ: 90, //Algeria DZD
		ARDZ: 90, //Algeria DZD
		ENEG: 70, //Egypt EGP
		AREG: 70, //Egypt EGP
		ENGB: 71, //United Kingdom of Great Britain and Northern Ireland (the) GBP
		ENIE: 80, //Ireland EUR
		ENIQ: 92, //Iraq IQD
		ARIQ: 92, //Iraq IQD
		ENJM: 57, //Jamaica JMD
		ENJO: 93, //Jordan JOD
		ARJO: 93, //Jordan JOD
		ENKW: 95, //Kuwait KWD
		ARKW: 95, //Kuwait KWD
		ENLB: 70, //Lebanon LBP
		ARLB: 70, //Lebanon LBP
		ENLY: 96, //Libya LYD
		ARLY: 96, //Libya LYD
		ENMA: 97, //Morocco MAD
		ARMA: 97, //Morocco MAD
		ENNZ: 49, //New Zealand NZD
		ENOM: 86, //Oman OMR
		AROM: 86, //Oman OMR
		ENPH: 82, //Philippines (the) PHP
		ENQA: 85, //Qatar QAR
		ARQA: 85, //Qatar QAR
		ENSA: 85, //Saudi Arabia SAR
		AR: 85, //Saudi Arabia SAR
		ARSA: 85, //Saudi Arabia SAR
		ENSY: 69, //Syrian Arab Republic (the)
		ARSY: 69, //Syrian Arab Republic (the)
		ENTN: 100, //Tunisia TND
		ARTN: 100, //Tunisia TND
		ENTT: 66, //Trinidad and Tobago TTD
		ENUS: 48, //United States of America (the) USD
		EN: 48, //United States of America (the) USD
		ENYE: 85, //Yemen YER
		ARYE: 85, //Yemen YER
		ENZW: 101, //Zimbabwe ZWL
		ESAR: 36, //Argentina ARS
		ENAR: 36, //Argentina ARS
		ESBO: 38, //Bolivia (Plurinational State of) BOB
		ENBO: 38, //Bolivia (Plurinational State of) BOB
		ESCL: 35, //Chile CLP
		ENCL: 35, //Chile CLP
		ESCO: 36, //Colombia COP
		ENCO: 36, //Colombia COP
		ESCR: 26, //Costa Rica CRC
		ENCR: 26, //Costa Rica CRC
		ESDO: 63, //Dominican Republic (the) DOP
		ENDO: 63, //Dominican Republic (the) DOP
		ESEC: 36, //Ecuador USD
		ENEC: 36, //Ecuador USD
		ESES: 33, //Spain EUR
		ES: 33, //Spain EUR
		ENES: 33, //Spain EUR
		ESGT: 61, //Guatemala GTQ
		ENGT: 61, //Guatemala GTQ
		ESHN: 58, //Honduras HNL
		ENHN: 58, //Honduras HNL
		ESMX: 49, //Mexico MXN
		ENMX: 49, //Mexico MXN
		ESNI: 55, //Nicaragua NIO
		ENNI: 55, //Nicaragua NIO
		ESPA: 52, //Panama PAB
		ENPA: 52, //Panama PAB
		ESPE: 65, //Peru PEN
		ENPE: 65, //Peru PEN
		ESPR: 48, //Puerto Rico USD
		ENPR: 48, //Puerto Rico USD
		ESPY: 39, //Paraguay PYG
		ENPY: 39, //Paraguay PYG
		ESSV: 49, //El Salvador SVC
		ENSV: 49, //El Salvador SVC
		ESUY: 37, //Uruguay UYU
		ENUY: 37, //Uruguay UYU
		ESVE: 46, //Venezuela (Bolivarian Republic of) VES
		ENVE: 46, //Venezuela (Bolivarian Republic of) VES
		ETEE: 20, //Estonia EUR
		ENEE: 20, //Estonia EUR
		FAIR: 85, //Iran (Islamic Republic of) IRR
		FA: 85, //Iran (Islamic Republic of) IRR
		ENIR: 85, //Iran (Islamic Republic of) IRR
		FIFI: 20, //Finland EUR
		FI: 20, //Finland EUR
		ENFI: 20, //Finland EUR
		FOFO: 68, //Faroe Islands (the) DKK
		FO: 68, //Faroe Islands (the) DKK
		ENFO: 68, //Faroe Islands (the) DKK
		FRBE: 18, //Belgium EUR
		ENBE: 18, //Belgium EUR
		FRCA: 13, //Canada CAD
		FRCH: 47, //Switzerland CHF
		FRFR: 18, //France EUR
		FR: 18, //France EUR
		ENFR: 18, //France EUR
		FRLU: 33, //Luxembourg EUR
		FRMC: 18, //Monaco EUR
		ENMC: 18, //Monaco EUR
		HEIL: 78, //Israel ILS
		ENIL: 78, //Israel ILS
		HIIN: 83, //India INR
		HI: 83, //India INR
		ENIN: 83, //India INR
		HRHR: 29, //Croatia HRK
		ENHR: 29, //Croatia HRK
		HUHU: 14, //Hungary HUF
		HU: 14, //Hungary HUF
		ENHU: 14, //Hungary HUF
		HYAM: 88, //Armenia AMD
		IDID: 41, //Indonesia IDR
		ENID: 41, //Indonesia IDR
		ISIS: 67, //Iceland ISK
		IS: 67, //Iceland ISK
		ENIS: 67, //Iceland ISK
		ITCH: 102, //Switzerland CHF
		ITIT: 33, //Italy EUR
		IT: 33, //Italy EUR
		ENIT: 33, //Italy EUR
		JAJP: 72, //Japan JPY
		JA: 72, //Japan JPY
		ENJP: 72, //Japan JPY
		KAGE: 91, //Georgia GEL
		ENGE: 91, //Georgia GEL
		KKKZ: 74, //Kazakhstan KZT
		ENKZ: 74, //Kazakhstan KZT
		KOKR: 77, //Korea (the Republic of) KRW
		KO: 77, //Korea (the Republic of) KRW
		ENKR: 77, //Korea (the Republic of) KRW
		KYKG: 74, //Kyrgyzstan KGS
		KY: 74, //Kyrgyzstan KGS
		ENKG: 74, //Kyrgyzstan KGS
		LTLT: 19, //Lithuania EUR
		ENLT: 19, //Lithuania EUR
		LVLV: 21, //Latvia EUR
		ENLV: 21, //Latvia EUR
		MNMN: 81, //Mongolia MNT
		ENMN: 81, //Mongolia MNT
		MSBN: 49, //Brunei Darussalam BND
		ENBN: 49, //Brunei Darussalam BND
		MSMY: 64, //Malaysia MYR
		ENMY: 64, //Malaysia MYR
		MTMT: 79, //Malta EUR
		NBNO: 25, //Norway NOK
		NB: 25, //Norway NOK
		ENNO: 25, //Norway NOK
		NLBE: 42, //Belgium EUR
		NLNL: 44, //Netherlands (the) EUR
		ENNL: 44, //Netherlands (the) EUR
		NNNO: 68, //Norway NOK
		NN: 68, //Norway NOK
		PLPL: 17, //Poland PLN
		PL: 17, //Poland PLN
		ENPL: 17, //Poland PLN
		PTBR: 40, //Brazil BRL
		ENBR: 40, //Brazil BRL
		PTPT: 18, //Portugal EUR
		PT: 18, //Portugal EUR
		ENPT: 18, //Portugal EUR
		RORO: 31, //Romania RON
		RO: 31, //Romania RON
		ENRO: 31, //Romania RON
		RURU: 23, //Russian Federation (the) RUB
		RU: 23, //Russian Federation (the) RUB
		ENRU: 23, //Russian Federation (the) RUB
		SKSK: 20, //Slovakia EUR
		ENSK: 20, //Slovakia EUR
		SLSI: 34, //Slovenia EUR
		ENSI: 34, //Slovenia EUR
		SQAL: 59, //Albania ALL
		SRBA: 28, //Bosnia and Herzegovina BAM
		SR: 28, //Bosnia and Herzegovina BAM
		ENBA: 28, //Bosnia and Herzegovina BAM
		SVSE: 16, //Sweden SEK
		SV: 16, //Sweden SEK
		ENSE: 16, //Sweden SEK
		SWKE: 94, //Kenya KES
		SW: 94, //Kenya KES
		ENKE: 94, //Kenya KES
		THTH: 75, //Thailand THB
		TH: 75, //Thailand THB
		ENTH: 75, //Thailand THB
		TRTR: 45, //Turkey TRY
		TR: 45, //Turkey TRY
		ENTR: 45, //Turkey TRY
		UKUA: 22, //Ukraine UAH
		UK: 22, //Ukraine UAH
		ENUA: 22, //Ukraine UAH
		URPK: 76, //Pakistan PKR
		UR: 76, //Pakistan PKR
		ENPK: 76, //Pakistan PKR
		UZUZ: 74, //Uzbekistan UZS
		ENUZ: 74, //Uzbekistan UZS
		VIVN: 32, //Vietnam VND
		ENVN: 32, //Vietnam VND
		ZHCN: 73, //China CNY
		ZH: 73, //China CNY
		ENCN: 73, //China CNY
		ZHHK: 56, //Hong Kong HKD
		ENHK: 56, //Hong Kong HKD
		ZHMO: 98, //Macao MOP
		ENMO: 98, //Macao MOP
		ZHSG: 51, //Singapore SGD
		ENSG: 51, //Singapore SGD
		ZHTW: 60, //Taiwan (Province of China) TWD
		ENTW: 60, //Taiwan (Province of China) TWD
		ENNG: 104 //Nigeria NGN 06/05/2020
	};


	static DEFAULT = {
		sep: ',',
		dPnt: '.',
		ccy: '$',
		ccy_r: ''
	};


	/**
	 * Currency, number and rate conventions
	 */
	static CCY_CONVENTIONS = [
		{ ccy_format: 0, sep: ',', dPnt: '.', ccy: '$', ccy_r: '', precision: 2, enum_date: 0 },
		{ ccy_format: 1, sep: '.', dPnt: ',', ccy: '$', ccy_r: '', precision: 2, enum_date: 0 },
		{ ccy_format: 2, sep: ',', dPnt: '.', ccy: '£', ccy_r: '', precision: 2, enum_date: 1 }, // CCY_FORMATS.GBH
		{ ccy_format: 3, sep: ',', dPnt: '.', ccy: '', ccy_r: '', precision: 2, enum_date: 2 }, // CCY_FORMATS.NON
		{ ccy_format: 4, sep: ',', dPnt: '.', ccy: '€', ccy_r: '', precision: 2, enum_date: 2 }, // CCY_FORMATS.EUR1
		{ ccy_format: 5, sep: '.', dPnt: ',', ccy: '€', ccy_r: '', precision: 2, enum_date: 2 }, // CCY_FORMATS.EUR2
		{ ccy_format: 6, sep: ' ', dPnt: ',', ccy: '', ccy_r: '€', precision: 2, enum_date: 2 }, // CCY_FORMATS.EUR3
		{ ccy_format: 7, sep: '.', dPnt: ',', ccy: '', ccy_r: '€', precision: 2, enum_date: 2 }, // CCY_FORMATS.EUR4
		{ ccy_format: 8, sep: ' ', dPnt: '.', ccy: 'R', ccy_r: '', precision: 2, enum_date: 2 }, // CCY_FORMATS.RND // [KT] 08/08/2017
		{ ccy_format: 9, sep: ' ', dPnt: ',', ccy: 'kr', ccy_r: '', precision: 2, enum_date: 2 }, // CCY_FORMATS.NOK // [KT] 09/24/2017
		{ ccy_format: 10, sep: ',', dPnt: '.', ccy: '₦', ccy_r: '', precision: 2, enum_date: 2 }, // CCY_FORMATS.NGN // [KT] 02/11/2018, Nigerian naira
		{ ccy_format: 11, sep: ',', dPnt: '.', ccy: '฿', ccy_r: '', precision: 2, enum_date: 2 }, // CCY_FORMATS.THB // [KT] 03/31/2018, Thai Baht
		// {ccy_format: 12, sep: DEFAULT_SEP, dPnt: DEFAULT_DPNT, ccy: DEFAULT_CCY, ccy_r: DEFAULT_CCY_R, precision: DEFAULT_PRECISION, enum_date: DEFAULT_DATE_ENUM
		// }, // CCY_FORMATS.DEFAULT 12
		// 12 was 'default' but can't comment out because it changes the array positions and possibly breaks prior users
		{ ccy_format: 12, dPnt: '.', sep: ',', ccy: '\u0024', ccy_r: '', precision: 2, enum_date: 0 }, // USD values
		{ ccy_format: 13, dPnt: ',', sep: ' ', ccy: '', ccy_r: '$', precision: 2, enum_date: 2 }, //13
		{ ccy_format: 14, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u0046\u0074', precision: 2, enum_date: 5 }, //14
		{ ccy_format: 15, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u004b\u010d', precision: 2, enum_date: 3 }, //15
		{ ccy_format: 16, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u006b\u0072', precision: 2, enum_date: 2 }, //16
		{ ccy_format: 17, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u007a\u0142', precision: 2, enum_date: 3 }, //17
		{ ccy_format: 18, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u20ac', precision: 2, enum_date: 1 }, //18
		{ ccy_format: 19, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u20ac', precision: 2, enum_date: 2 }, //19
		{ ccy_format: 20, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u20ac', precision: 2, enum_date: 3 }, //20
		{ ccy_format: 21, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u20ac', precision: 2, enum_date: 5 }, //21
		{ ccy_format: 22, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u20b4', precision: 2, enum_date: 3 }, //22
		{ ccy_format: 23, dPnt: ',', sep: ' ', ccy: '', ccy_r: '\u20bd', precision: 2, enum_date: 3 }, //23
		{ ccy_format: 24, dPnt: ',', sep: ' ', ccy: '\u0052', ccy_r: '', precision: 2, enum_date: 6 }, //24
		{ ccy_format: 25, dPnt: ',', sep: ' ', ccy: '\u006b\u0072', ccy_r: '', precision: 2, enum_date: 3 }, //25
		{ ccy_format: 26, dPnt: ',', sep: ' ', ccy: '\u20a1', ccy_r: '', precision: 2, enum_date: 1 }, //26
		{ ccy_format: 27, dPnt: ',', sep: '', ccy: '', ccy_r: '\u043b\u0432', precision: 2, enum_date: 3 }, //27
		{ ccy_format: 28, dPnt: ',', sep: '.', ccy: '', ccy_r: '\u004b\u004d', precision: 2, enum_date: 3 }, //28
		{ ccy_format: 29, dPnt: ',', sep: '.', ccy: '', ccy_r: '\u006b\u006e', precision: 2, enum_date: 3 }, //29
		{ ccy_format: 30, dPnt: ',', sep: '.', ccy: '', ccy_r: '\u006b\u0072', precision: 2, enum_date: 3 }, //30
		{ ccy_format: 31, dPnt: ',', sep: '.', ccy: '', ccy_r: '\u006c\u0065\u0069', precision: 2, enum_date: 3 }, //31
		{ ccy_format: 32, dPnt: ',', sep: '.', ccy: '', ccy_r: '\u20ab', precision: 0, enum_date: 1 }, //32
		{ ccy_format: 33, dPnt: ',', sep: '.', ccy: '', ccy_r: '\u20ac', precision: 2, enum_date: 1 }, //33
		{ ccy_format: 34, dPnt: ',', sep: '.', ccy: '', ccy_r: '\u20ac', precision: 2, enum_date: 3 }, //34
		{ ccy_format: 35, dPnt: ',', sep: '.', ccy: '\u0024', ccy_r: '', precision: 0, enum_date: 4 }, //35
		{ ccy_format: 36, dPnt: ',', sep: '.', ccy: '\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //36
		{ ccy_format: 37, dPnt: ',', sep: '.', ccy: '\u0024\u0055', ccy_r: '', precision: 2, enum_date: 1 }, //37
		{ ccy_format: 38, dPnt: ',', sep: '.', ccy: '\u0024\u0062', ccy_r: '', precision: 2, enum_date: 1 }, //38
		{ ccy_format: 39, dPnt: ',', sep: '.', ccy: '\u0047\u0073', ccy_r: '', precision: 0, enum_date: 1 }, //39
		{ ccy_format: 40, dPnt: ',', sep: '.', ccy: '\u0052\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //40
		{ ccy_format: 41, dPnt: ',', sep: '.', ccy: '\u0052\u0070', ccy_r: '', precision: 2, enum_date: 1 }, //41
		{ ccy_format: 42, dPnt: ',', sep: '.', ccy: '\u20ac', ccy_r: '', precision: 2, enum_date: 1 }, //42
		{ ccy_format: 43, dPnt: ',', sep: '.', ccy: '\u20ac', ccy_r: '', precision: 2, enum_date: 3 }, //43
		{ ccy_format: 44, dPnt: ',', sep: '.', ccy: '\u20ac', ccy_r: '', precision: 2, enum_date: 4 }, //44
		{ ccy_format: 45, dPnt: ',', sep: '.', ccy: '\u20ba', ccy_r: '', precision: 2, enum_date: 3 }, //45
		{ ccy_format: 46, dPnt: ',', sep: '.', ccy: 'VES', ccy_r: '', precision: 2, enum_date: 1 }, //46
		{ ccy_format: 47, dPnt: '.', sep: ' ', ccy: '', ccy_r: '\u0043\u0048\u0046', precision: 2, enum_date: 3 }, //47
		{ ccy_format: 48, dPnt: '.', sep: ',', ccy: '\u0024', ccy_r: '', precision: 2, enum_date: 0 }, //48
		{ ccy_format: 49, dPnt: '.', sep: ',', ccy: '\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //49
		{ ccy_format: 50, dPnt: '.', sep: ',', ccy: '\u0024', ccy_r: '', precision: 2, enum_date: 2 }, //50
		{ ccy_format: 51, dPnt: '.', sep: ',', ccy: '\u0024', ccy_r: '', precision: 2, enum_date: 6 }, //51
		{ ccy_format: 52, dPnt: '.', sep: ',', ccy: '\u0042\u002f\u002e', ccy_r: '', precision: 2, enum_date: 0 }, //52
		{ ccy_format: 53, dPnt: '.', sep: ',', ccy: '\u0042\u005a\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //53
		{ ccy_format: 54, dPnt: '.', sep: ',', ccy: '\u0042\u0072', ccy_r: '', precision: 2, enum_date: 0 }, //54
		{ ccy_format: 55, dPnt: '.', sep: ',', ccy: '\u0043\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //55
		{ ccy_format: 56, dPnt: '.', sep: ',', ccy: '\u0048\u004b\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //56
		{ ccy_format: 57, dPnt: '.', sep: ',', ccy: '\u004a\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //57
		{ ccy_format: 58, dPnt: '.', sep: ',', ccy: '\u004c', ccy_r: '', precision: 2, enum_date: 1 }, //58
		{ ccy_format: 59, dPnt: '.', sep: ',', ccy: '\u004c\u0065\u006b', ccy_r: '', precision: 2, enum_date: 0 }, //59
		{ ccy_format: 60, dPnt: '.', sep: ',', ccy: '\u004e\u0054\u0024', ccy_r: '', precision: 2, enum_date: 6 }, //60
		{ ccy_format: 61, dPnt: '.', sep: ',', ccy: '\u0051', ccy_r: '', precision: 2, enum_date: 1 }, //61
		{ ccy_format: 62, dPnt: '.', sep: ',', ccy: '\u0052', ccy_r: '', precision: 2, enum_date: 0 }, //62
		{ ccy_format: 63, dPnt: '.', sep: ',', ccy: '\u0052\u0044\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //63
		{ ccy_format: 64, dPnt: '.', sep: ',', ccy: '\u0052\u004d', ccy_r: '', precision: 2, enum_date: 1 }, //64
		{ ccy_format: 65, dPnt: '.', sep: ',', ccy: '\u0053\u002f\u002e', ccy_r: '', precision: 2, enum_date: 1 }, //65
		{ ccy_format: 66, dPnt: '.', sep: ',', ccy: '\u0054\u0054\u0024', ccy_r: '', precision: 2, enum_date: 1 }, //66
		{ ccy_format: 67, dPnt: '.', sep: ',', ccy: '\u006b\u0072', ccy_r: '', precision: 0, enum_date: 0 }, //67
		{ ccy_format: 68, dPnt: '.', sep: ',', ccy: '\u006b\u0072', ccy_r: '', precision: 2, enum_date: 0 }, //68
		{ ccy_format: 69, dPnt: '.', sep: ',', ccy: '\u00a3', ccy_r: '', precision: 0, enum_date: 0 }, //69
		{ ccy_format: 70, dPnt: '.', sep: ',', ccy: '\u00a3', ccy_r: '', precision: 2, enum_date: 0 }, //70
		{ ccy_format: 71, dPnt: '.', sep: ',', ccy: '\u00a3', ccy_r: '', precision: 2, enum_date: 1 }, //71
		{ ccy_format: 72, dPnt: '.', sep: ',', ccy: '\u00a5', ccy_r: '', precision: 0, enum_date: 6 }, //72
		{ ccy_format: 73, dPnt: '.', sep: ',', ccy: '\u00a5', ccy_r: '', precision: 2, enum_date: 6 }, //73
		{ ccy_format: 74, dPnt: '.', sep: ',', ccy: '\u043b\u0432', ccy_r: '', precision: 2, enum_date: 0 }, //74
		{ ccy_format: 75, dPnt: '.', sep: ',', ccy: '\u0e3f', ccy_r: '', precision: 2, enum_date: 1 }, //75
		{ ccy_format: 76, dPnt: '.', sep: ',', ccy: '\u20a8', ccy_r: '', precision: 2, enum_date: 0 }, //76
		{ ccy_format: 77, dPnt: '.', sep: ',', ccy: '\u20a9', ccy_r: '', precision: 0, enum_date: 5 }, //77
		{ ccy_format: 78, dPnt: '.', sep: ',', ccy: '\u20aa', ccy_r: '', precision: 2, enum_date: 3 }, //78
		{ ccy_format: 79, dPnt: '.', sep: ',', ccy: '\u20ac', ccy_r: '', precision: 2, enum_date: 0 }, //79
		{ ccy_format: 80, dPnt: '.', sep: ',', ccy: '\u20ac', ccy_r: '', precision: 2, enum_date: 1 }, //80
		{ ccy_format: 81, dPnt: '.', sep: ',', ccy: '\u20ae', ccy_r: '', precision: 2, enum_date: 0 }, //81
		{ ccy_format: 82, dPnt: '.', sep: ',', ccy: '\u20b1', ccy_r: '', precision: 2, enum_date: 1 }, //82
		{ ccy_format: 83, dPnt: '.', sep: ',', ccy: '\u20b9', ccy_r: '', precision: 2, enum_date: 1 }, //83
		{ ccy_format: 84, dPnt: '.', sep: ',', ccy: '\u20bc', ccy_r: '', precision: 2, enum_date: 0 }, //84
		{ ccy_format: 85, dPnt: '.', sep: ',', ccy: '\ufdfc', ccy_r: '', precision: 2, enum_date: 0 }, //85
		{ ccy_format: 86, dPnt: '.', sep: ',', ccy: '\ufdfc', ccy_r: '', precision: 3, enum_date: 0 }, //86
		{ ccy_format: 87, dPnt: '.', sep: ',', ccy: 'AED', ccy_r: '', precision: 2, enum_date: 0 }, //87
		{ ccy_format: 88, dPnt: '.', sep: ',', ccy: 'AMD', ccy_r: '', precision: 2, enum_date: 0 }, //88
		{ ccy_format: 89, dPnt: '.', sep: ',', ccy: 'BHD', ccy_r: '', precision: 3, enum_date: 0 }, //89
		{ ccy_format: 90, dPnt: '.', sep: ',', ccy: 'DZD', ccy_r: '', precision: 2, enum_date: 0 }, //90
		{ ccy_format: 91, dPnt: '.', sep: ',', ccy: 'GEL', ccy_r: '', precision: 2, enum_date: 0 }, //91
		{ ccy_format: 92, dPnt: '.', sep: ',', ccy: 'IQD', ccy_r: '', precision: 3, enum_date: 0 }, //92
		{ ccy_format: 93, dPnt: '.', sep: ',', ccy: 'JOD', ccy_r: '', precision: 3, enum_date: 0 }, //93
		{ ccy_format: 94, dPnt: '.', sep: ',', ccy: 'KES', ccy_r: '', precision: 2, enum_date: 1 }, //94
		{ ccy_format: 95, dPnt: '.', sep: ',', ccy: 'KWD', ccy_r: '', precision: 3, enum_date: 0 }, //95
		{ ccy_format: 96, dPnt: '.', sep: ',', ccy: 'LYD', ccy_r: '', precision: 3, enum_date: 0 }, //96
		{ ccy_format: 97, dPnt: '.', sep: ',', ccy: 'MAD', ccy_r: '', precision: 2, enum_date: 0 }, //97
		{ ccy_format: 98, dPnt: '.', sep: ',', ccy: 'MOP', ccy_r: '', precision: 2, enum_date: 6 }, //98
		{ ccy_format: 99, dPnt: '.', sep: ',', ccy: 'MVR', ccy_r: '', precision: 2, enum_date: 0 }, //99
		{ ccy_format: 100, dPnt: '.', sep: ',', ccy: 'TND', ccy_r: '', precision: 3, enum_date: 0 }, //100
		{ ccy_format: 101, dPnt: '.', sep: ',', ccy: 'ZWL', ccy_r: '', precision: 2, enum_date: 1 }, //101
		{ ccy_format: 102, dPnt: '.', sep: '’', ccy: '\u0043\u0048\u0046', ccy_r: '', precision: 2, enum_date: 1 }, //102
		{ ccy_format: 103, dPnt: '.', sep: '’', ccy: '\u0043\u0048\u0046', ccy_r: '', precision: 2, enum_date: 3 }, //103
		// [KT] 06/05/2020 -
		{ ccy_format: 104, dPnt: '.', sep: ',', ccy: '\u20a6', ccy_r: '', precision: 2, enum_date: 3 } //104
	];


	/**
	 * Enumerated ordinal values of date formats.
	 * These values can be used to select the conventions object from the DATE_CONVENTIONS array.
	 *
	 * @static
	 * @memberof Locales
	 * @property {number} MDY - (MM/DD/YYYY).
	 * @property {number} DMY - (DD/MM/YYYY).
	 * @property {number} YMD - (YYYY-MM-DD).
	 * @property {number} DMY2 - (DD.MM.YYYY).
	 * @property {number} DMY3 - (DD-MM-YYYY).
	 * @property {number} YMD2 - (YYYY.MM.DD).
	 * @property {number} YMD3 - (YYYY/MM/DD).
	 * @example
	 *   let dateConventions = DATE_CONVENTIONS[DATE_FORMATS.MDY] // returns the date convention object for the MDY format
	 *   if (dateConventions.date_format === DATE_FORMATS.MDY) { ... }
	 *   let date_mask = DATE_FORMAT_STRS[DATE_FORMATS.MDY];
	 */
	static DATE_FORMATS = {
		MDY: 0,
		DMY: 1,
		YMD: 2,
		DMY2: 3, // 31.01.2020
		DMY3: 4, // 31-01-2020
		YMD2: 5, // 2020.01.31
		YMD3: 6 // 2020/01/31
	};


	static DATE_FORMAT_STRS = ['MM/DD/YYYY', 'DD/MM/YYYY', 'YYYY-MM-DD', 'DD.MM.YYYY', 'DD-MM-YYYY', 'YYYY.MM.DD', 'YYYY/MM/DD'];


	/**
	 * Array of date convention objects.
	 * Each object defines a date format and its associated mask, separator, and separator positions.
	 *
	 * @static
	 * @memberof Locales
	 * @type {Array<{date_format: number, date_mask: string, date_sep: string, sep_pos1: number, sep_pos2: number}>}
	 * @property {number} date_format - Identifier for the date format.
	 * @property {string} date_mask - Format mask for the date.
	 * @property {string} date_sep - Separator used in the date mask.
	 * @property {number} sep_pos1 - Position of the first separator in the date mask.
	 * @property {number} sep_pos2 - Position of the second separator in the date mask.
	 */
	static DATE_CONVENTIONS = [
		{ date_format: 0, date_mask: 'MM/DD/YYYY', date_sep: '/', sep_pos1: 2, sep_pos2: 5 },
		{ date_format: 1, date_mask: 'DD/MM/YYYY', date_sep: '/', sep_pos1: 2, sep_pos2: 5 },
		{ date_format: 2, date_mask: 'YYYY-MM-DD', date_sep: '-', sep_pos1: 4, sep_pos2: 7 },
		{ date_format: 3, date_mask: 'DD.MM.YYYY', date_sep: '.', sep_pos1: 2, sep_pos2: 5 },
		{ date_format: 4, date_mask: 'DD-MM-YYYY', date_sep: '-', sep_pos1: 2, sep_pos2: 5 },
		{ date_format: 5, date_mask: 'YYYY.MM.DD', date_sep: '.', sep_pos1: 4, sep_pos2: 7 },
		{ date_format: 6, date_mask: 'YYYY/MM/DD', date_sep: '/', sep_pos1: 4, sep_pos2: 7 }
		// update MAX_DATE_ENUM = 6 if additional date conventions are added
	];


	/**
	 * [KT] 09/02/2024 - getCcyConventions replaces LocalCcyConventions (was: LocalConventions)
	 * uses browser's detected regional settings to assign currency and date conventions
	 * only called if (1) user's localStorage has not been previously set and the website has not set a default; and (2) from getDateConventions()
	 */
	static getCcyConventions () {

		// if there's not a user saved convention, then get the user's locale
		// for international users to test, see:  https://jsfiddle.net/taa1953/pb5tzg4m/2/
		let nf = new Intl.NumberFormat();
		let options = nf.resolvedOptions();
		let key; // CCY_FORMATS attribute
		let ccy_format;

		if (options.locale) {
			// ex: "locale": "en-US"s
			key = options.locale.replace('-', '');
			key = key.toUpperCase();

			// Bracket notation: something['bar']
			// get the integer value of property ex: this.CCY_FORMATS["ENUS"] = 48
			ccy_format = this.CCY_FORMATS[key];

			if (ccy_format === undefined || this.CCY_CONVENTIONS[ccy_format] === undefined) {
				ccy_format = null;
			}
		}
		return ccy_format;
	};

	/**
	 * Attempt to get conventions from user's OS.
	 * Only called if localStorage has not been set.
	 * Get the currency convention at country level
	 * Look up date convention with CCY_CONVENTIONS.enum_date
	 * @param {*} date_format
	 */
	static getDateConventions () {
		let ccy_format, date_format;

		ccy_format = this.getCcyConventions();

		// ccy_format is the index into DATE_CONVENTIONS to pull back CCY_CONVENTIONS.enum_date
		date_format = (ccy_format !== null) ? this.CCY_CONVENTIONS[ccy_format].enum_date : null;

		return date_format;
	};


	// set to rate from the selected money conventions
	static setRateConventions (ccy_format) {
		this.rateConventions = { ...this.CCY_CONVENTIONS[ccy_format] };
		this.rateConventions.ccy = '';
		this.rateConventions.ccy_r = '%';
		this.rateConventions.precision = 4;
	};


	// set same as money conventions, without currency, matches numeric editor
	static setNumConventions (ccy_format) {
		this.numConventions = { ...this.CCY_CONVENTIONS[ccy_format] };
		this.numConventions.ccy = '';
		this.numConventions.ccy_r = '';
		this.numConventions.precision = this.moneyConventions.precision;
	};


	/**
	 * resetCcyConventions() changes the environment's default conventions
	 * switchNumConventions() changes the formating of a number between two conventions
	 * When user changes conventions, attributes of money, rate and number have to be updated.
	 * Update user's localStorage.
	 * @nocollapse
	 */
	static resetCcyConventions (ccy_format) {
		if (ccy_format !== this.moneyConventions.ccy_format && this.CCY_CONVENTIONS[ccy_format] !== undefined) {
			this.moneyConventions = this.CCY_CONVENTIONS[ccy_format];
			// clones currency conventions with '%' symbol
			this.setRateConventions(ccy_format);
			// clones currency conventions without currency
			this.setNumConventions(ccy_format);
			// Convert ccy_format to an integer and store it in localStorage
			localStorage.setItem(CCY_FORMAT_KEY, parseInt(ccy_format, 10));
		}
	};


	/**
	 * When user changes conventions, attributes of money, rate and number have to be updated.
	 * Update user's localStorage.
	 * @nocollapse
	 */
	static resetDateConventions (date_format) {
		if (date_format !== this.dateConventions.date_format && this.DATE_CONVENTIONS[date_format] !== undefined) {
			this.dateConventions = this.DATE_CONVENTIONS[date_format];
			// Convert date_format to an integer and store it in localStorage
			localStorage.setItem(DATE_FORMAT_KEY, parseInt(date_format, 10));
		}
	};


	/**
	 * [KT] 07/18/2024 - stopped using cookies for storing user preferences - replaced with localStorage
	 * 1. currency and date conventions are first initialized from localStorage
	 * 2. if localStorage not set then attempt to get convention from user's OS
	 * 3. then default to U.S. conventions
	 * Initializes:
	 * moneyConventions
	 * rateConventions
	 * numConventions
	 * dateConventions
	 * sortConventions
	 * Initializes the locale settings for currency and date formats.
	 */
	static initLocale () {
		const NO_CONVENTION_SET = '999';
		let ccy_format, date_format;

		// Read from localStorage
		let storedCcyFormat = localStorage.getItem(CCY_FORMAT_KEY);

		// if user has not set a currency option, see if site has.
		if (!storedCcyFormat) {
			storedCcyFormat = document.getElementById('ac-currency').value;
		}

		if (storedCcyFormat && storedCcyFormat !== NO_CONVENTION_SET) {
			ccy_format = parseInt(storedCcyFormat, 10);
		} else {
			ccy_format = this.getCcyConventions();
		}

		// if a value was not set in localStorage, and we cannot get currency convention from OS, then set to U.S. conventions
		if (!isNaN(ccy_format) && this.CCY_CONVENTIONS[ccy_format] !== undefined) {
			this.moneyConventions = this.CCY_CONVENTIONS[ccy_format];
		} else {
			this.moneyConventions = this.CCY_CONVENTIONS[this.CCY_FORMATS.ENUA];
		}

		this.setRateConventions(this.moneyConventions.ccy_format);
		this.setNumConventions(this.moneyConventions.ccy_format);

		let storedDateFormat = localStorage.getItem(DATE_FORMAT_KEY);

		// if user has not set a date format, see if site has.
		if (!storedDateFormat) {
			storedDateFormat = document.getElementById('ac-date_mask').value;
		}

		if (storedDateFormat && storedDateFormat !== NO_CONVENTION_SET) {
			date_format = parseInt(storedDateFormat, 10);
		} else {
			date_format = this.getDateConventions();
		}

		// if a value was not set in localStorage, and we cannot get date convention from OS, then set to U.S. conventions
		if (!isNaN(date_format) && this.DATE_CONVENTIONS[date_format] !== undefined) {
			this.dateConventions = this.DATE_CONVENTIONS[date_format];
		} else {
			this.dateConventions = this.DATE_CONVENTIONS[this.DATE_FORMATS.MDY];
		}

		this.sortConventions = this.DATE_CONVENTIONS[this.DATE_FORMATS.YMD];
	}

} // Locales class


// Need explicit call to the static method to initialize locale
Locales.initLocale();

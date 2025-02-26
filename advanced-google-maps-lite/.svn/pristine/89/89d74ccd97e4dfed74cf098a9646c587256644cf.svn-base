<?php
defined('ABSPATH') or die();

/* Get Map's regions data */

class WL_AGM_LITE_Map_Regions
{
    /* Border resolution FLAGS */
    const C = 1; /* Countries */
    const P = 2; /* Provinces */
    const M = 4; /* Metros */
    const K = 8; /* Continents */
    const S = 16; /* Subcontinents */

    public static function get_tree()
    {
        $c = self::C;
        $p = self::P;
        $m = self::M;
        $k = self::K;
        $s = self::S;

        $tree = array();
        /* 1: parent   2: id   3: name   4: border resolution */

        $tree[] = array( null, "world", esc_html__("World", WL_AGM_LITE_DOMAIN), $c | $k | $s );

        /* Continents */
        $parent = "world";
        $tree[] = array( $parent, "002", esc_html__("Africa", WL_AGM_LITE_DOMAIN), $c | $k | $s );
        $tree[] = array( $parent, "019", esc_html__("Americas", WL_AGM_LITE_DOMAIN), $c | $k | $s );
        $tree[] = array( $parent, "142", esc_html__("Asia", WL_AGM_LITE_DOMAIN), $c | $k | $s );
        $tree[] = array( $parent, "150", esc_html__("Europe", WL_AGM_LITE_DOMAIN), $c | $k | $s );
        $tree[] = array( $parent, "009", esc_html__("Oceania", WL_AGM_LITE_DOMAIN), $c | $k | $s );

        /* Subcontinents */
        /*  - Africa */
        $parent = "002";
        $tree[] = array( $parent, "015", esc_html__("Northern Africa", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "011", esc_html__("Western Africa", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "017", esc_html__("Middle Africa", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "014", esc_html__("Eastern Africa", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "018", esc_html__("Southern Africa", WL_AGM_LITE_DOMAIN), $c | $s );

        /*  - Americas */
        $parent = "019";
        $tree[] = array( $parent, "021", esc_html__("Northern America", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "029", esc_html__("Caribbean", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "013", esc_html__("Central America", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "005", esc_html__("South America", WL_AGM_LITE_DOMAIN), $c | $s );

        /* - Asia */
        $parent = "142";
        $tree[] = array( $parent, "143", esc_html__("Central Asia", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "030", esc_html__("Eastern Asia", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "034", esc_html__("Southern Asia", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "035", esc_html__("South-Eastern Asia", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "145", esc_html__("Western Asia", WL_AGM_LITE_DOMAIN), $c | $s );

        /* - Europe */
        $parent = "150";
        $tree[] = array( $parent, "154", esc_html__("Northern Europe", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "155", esc_html__("Western Europe", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "151", esc_html__("Eastern Europe", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "039", esc_html__("Southern Europe", WL_AGM_LITE_DOMAIN), $c | $s );

        /* - Oceania */
        $parent = "009";
        $tree[] = array( $parent, "053", esc_html__("Australia and New Zealand", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "054", esc_html__("Melanesia", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "057", esc_html__("Micronesia", WL_AGM_LITE_DOMAIN), $c | $s );
        $tree[] = array( $parent, "061", esc_html__("Polynesia", WL_AGM_LITE_DOMAIN), $c | $s );

        /* - North Africa */
        $parent = "015";
        $tree[] = array( $parent, "DZ", esc_html__("Algeria", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "EG", esc_html__("Egypt", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "EH", esc_html__("Western Sahara", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "LY", esc_html__("Libya", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MA", esc_html__("Morocco", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SD", esc_html__("Sudan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TN", esc_html__("Tunisia", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Western Africa */
        $parent = "011";
        $tree[] = array( $parent, "BF", esc_html__("Burkina Faso", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BJ", esc_html__("Benin", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CI", esc_html__("Côte d'Ivoire", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CV", esc_html__("Cape Verde", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GH", esc_html__("Ghana", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GM", esc_html__("Gambia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GN", esc_html__("Guinea", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GW", esc_html__("Guinea-Bissau", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LR", esc_html__("Liberia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ML", esc_html__("Mali", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MR", esc_html__("Mauritania", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NE", esc_html__("Niger", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NG", esc_html__("Nigeria", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SH", esc_html__("Saint Helena, Ascension and Tristan da Cunha", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SL", esc_html__("Sierra Leone", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SN", esc_html__("Senegal", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TG", esc_html__("Togo", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Middle Africa    */
        $parent = "017";
        $tree[] = array( $parent, "AO", esc_html__("Angola", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CD", esc_html__("Congo, the Democratic Republic of the", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "ZR", esc_html__("Zaire", WL_AGM_LITE_DOMAIN), $p); */
        $tree[] = array( $parent, "CF", esc_html__("Central African Republic", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CG", esc_html__("Congo", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CM", esc_html__("Cameroon", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GA", esc_html__("Gabon", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GQ", esc_html__("Equatorial Guinea", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ST", esc_html__("Sao Tome and Principe", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TD", esc_html__("Chad", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Eastern Africa   */
        $parent = "014";
        $tree[] = array( $parent, "BI", esc_html__("Burundi", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "DJ", esc_html__("Djibouti", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ER", esc_html__("Eritrea", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ET", esc_html__("Ethiopia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KE", esc_html__("Kenya", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "KM", esc_html__("Comoros", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MG", esc_html__("Madagascar", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MU", esc_html__("Mauritius", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MW", esc_html__("Malawi", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MZ", esc_html__("Mozambique", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "RE", esc_html__("Réunion", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "RW", esc_html__("Rwanda", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SC", esc_html__("Seychelles", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SO", esc_html__("Somalia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TZ", esc_html__("Tanzania", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "UG", esc_html__("Uganda", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "YT", esc_html__("Mayotte", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "ZM", esc_html__("Zambia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ZW", esc_html__("Zimbabwe", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Southern Africa  */
        $parent = "018";
        $tree[] = array( $parent, "BW", esc_html__("Botswana", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LS", esc_html__("Lesotho", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NA", esc_html__("Namibia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SZ", esc_html__("Swaziland", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ZA", esc_html__("South Africa", WL_AGM_LITE_DOMAIN), $c | $p );


        /* - Northern America  */
        $parent = "021";
        $tree[] = array( $parent, "BM", esc_html__("Bermuda", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "CA", esc_html__("Canada", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GL", esc_html__("Greenland", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PM", esc_html__("Saint Pierre and Miquelon", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "US", esc_html__("United States", WL_AGM_LITE_DOMAIN), $c | $p | $m );

        /* - Caribbean         */
        $parent = "029";
        $tree[] = array( $parent, "AG", esc_html__("Antigua and Barbuda", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "AI", esc_html__("Anguilla", WL_AGM_LITE_DOMAIN), $c );
        /*$tree[] = array($parent, "AN", esc_html__("Netherlands Antilles", WL_AGM_LITE_DOMAIN), $p); */
        $tree[] = array( $parent, "AW", esc_html__("Aruba", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "BB", esc_html__("Barbados", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BL", esc_html__("Saint Barthélemy", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "BS", esc_html__("Bahamas", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CU", esc_html__("Cuba", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "DM", esc_html__("Dominica", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "DO", esc_html__("Dominican Republic", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GD", esc_html__("Grenada", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GP", esc_html__("Guadeloupe", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "HT", esc_html__("Haiti", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "JM", esc_html__("Jamaica", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KN", esc_html__("Saint Kitts and Nevis", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KY", esc_html__("Cayman Islands", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "LC", esc_html__("Saint Lucia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MF", esc_html__("Saint Martin (French part)", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "MQ", esc_html__("Martinique", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "MS", esc_html__("Montserrat", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "PR", esc_html__("Puerto Rico", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "TC", esc_html__("Turks and Caicos Islands", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "TT", esc_html__("Trinidad and Tobago", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "VC", esc_html__("Saint Vincent and the Grenadines", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "VG", esc_html__("Virgin Islands, British", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "VI", esc_html__("Virgin Islands, U.S.", WL_AGM_LITE_DOMAIN), $c );

        /* - Central America   */
        $parent = "013";
        $tree[] = array( $parent, "BZ", esc_html__("Belize", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CR", esc_html__("Costa Rica", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GT", esc_html__("Guatemala", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "HN", esc_html__("Honduras", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MX", esc_html__("Mexico", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NI", esc_html__("Nicaragua", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PA", esc_html__("Panama", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SV", esc_html__("El Salvador", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - South America     */
        $parent = "005";
        $tree[] = array( $parent, "AR", esc_html__("Argentina", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BO", esc_html__("Bolivia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BR", esc_html__("Brazil", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CL", esc_html__("Chile", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CO", esc_html__("Colombia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "EC", esc_html__("Ecuador", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "FK", esc_html__("Falkland Islands (Malvinas)", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "GF", esc_html__("French Guiana", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "GY", esc_html__("Guyana", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PE", esc_html__("Peru", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PY", esc_html__("Paraguay", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SR", esc_html__("Suriname", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "UY", esc_html__("Uruguay", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "VE", esc_html__("Venezuela", WL_AGM_LITE_DOMAIN), $c | $p );


        /* - Central Asia        */
        $parent = "143";
        $tree[] = array( $parent, "TM", esc_html__("Turkmenistan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TJ", esc_html__("Tajikistan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KG", esc_html__("Kyrgyzstan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KZ", esc_html__("Kazakhstan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "UZ", esc_html__("Uzbekistan", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Eastern Asia        */
        $parent = "030";
        $tree[] = array( $parent, "CN", esc_html__("China", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "HK", esc_html__("Hong Kong", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "JP", esc_html__("Japan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KP", esc_html__("North Korea", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KR", esc_html__("South Korea", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MN", esc_html__("Mongolia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MO", esc_html__("Macao", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "TW", esc_html__("Taiwan", WL_AGM_LITE_DOMAIN), $c );

        /* - Southern Asia       */
        $parent = "034";
        $tree[] = array( $parent, "AF", esc_html__("Afghanistan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BD", esc_html__("Bangladesh", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BT", esc_html__("Bhutan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "IN", esc_html__("India", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "IR", esc_html__("Iran", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LK", esc_html__("Sri Lanka", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MV", esc_html__("Maldives", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NP", esc_html__("Nepal", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PK", esc_html__("Pakistan", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - South-Eastern Asia  */
        $parent = "035";
        $tree[] = array( $parent, "BN", esc_html__("Brunei", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ID", esc_html__("Indonesia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KH", esc_html__("Cambodia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LA", esc_html__("Laos", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MM", esc_html__("Myanmar", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "BU", esc_html__("Burma", WL_AGM_LITE_DOMAIN), $c | $p); */
        $tree[] = array( $parent, "MY", esc_html__("Malaysia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PH", esc_html__("Philippines", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SG", esc_html__("Singapore", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TH", esc_html__("Thailand", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TL", esc_html__("Timor-Leste", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "TP", esc_html__("East Timor", WL_AGM_LITE_DOMAIN), $c | $p); */
        $tree[] = array( $parent, "VN", esc_html__("Vietnam", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Western Asia        */
        $parent = "145";
        $tree[] = array( $parent, "AE", esc_html__("United Arab Emirates", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "AM", esc_html__("Armenia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "AZ", esc_html__("Azerbaijan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BH", esc_html__("Bahrain", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CY", esc_html__("Cyprus", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GE", _x("Georgia", "Country", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "IL", esc_html__("Israel", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "IQ", esc_html__("Iraq", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "JO", esc_html__("Jordan", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "KW", esc_html__("Kuwait", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LB", esc_html__("Lebanon", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "OM", esc_html__("Oman", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PS", esc_html__("Palestine, State of", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "QA", esc_html__("Qatar", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SA", esc_html__("Saudi Arabia", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "NT", esc_html__("Neutral Zone", WL_AGM_LITE_DOMAIN), $p); */
        $tree[] = array( $parent, "SY", esc_html__("Syria", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TR", esc_html__("Turkey", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "YE", esc_html__("Yemen", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "YD", esc_html__("South Yemen", WL_AGM_LITE_DOMAIN), $p); */

        /* - Northern Europe  */
        $parent = "154";
        $tree[] = array( $parent, "GG", esc_html__("Guernsey", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "JE", esc_html__("Jersey", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "AX", esc_html__("Åland", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "DK", esc_html__("Denmark", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "EE", esc_html__("Estonia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "FI", esc_html__("Finland", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "FO", esc_html__("Faroe Islands", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "GB", esc_html__("United Kingdom", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "IE", esc_html__("Ireland", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "IM", esc_html__("Isle of Man", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "IS", esc_html__("Iceland", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LT", esc_html__("Lithuania", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LV", esc_html__("Latvia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NO", esc_html__("Norway", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SE", esc_html__("Sweden", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SJ", esc_html__("Svalbard and Jan Mayen", WL_AGM_LITE_DOMAIN), $c );

        /* - Western Europe   */
        $parent = "155";
        $tree[] = array( $parent, "AT", esc_html__("Austria", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BE", esc_html__("Belgium", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CH", esc_html__("Switzerland", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "DE", esc_html__("Germany", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "DD", esc_html__("German Democratic Republic", WL_AGM_LITE_DOMAIN), $p); */
        $tree[] = array( $parent, "FR", esc_html__("France", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "FX", esc_html__("France, Metropolitan", WL_AGM_LITE_DOMAIN), $p); */
        $tree[] = array( $parent, "LI", esc_html__("Liechtenstein", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "LU", esc_html__("Luxembourg", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MC", esc_html__("Monaco", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "NL", esc_html__("Netherlands", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Eastern Europe   */
        $parent = "151";
        $tree[] = array( $parent, "BG", esc_html__("Bulgaria", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BY", esc_html__("Belarus", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "CZ", esc_html__("Czech Republic", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "HU", esc_html__("Hungary", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MD", esc_html__("Moldova", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PL", esc_html__("Poland", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "RO", esc_html__("Romania", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "RU", esc_html__("Russia", WL_AGM_LITE_DOMAIN), $c | $p );
        /*$tree[] = array($parent, "SU", esc_html__("USSR", WL_AGM_LITE_DOMAIN), $p); */
        $tree[] = array( $parent, "SK", esc_html__("Slovakia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "UA", esc_html__("Ukraine", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Southern Europe  */
        $parent = "039";
        $tree[] = array( $parent, "AD", esc_html__("Andorra", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "AL", esc_html__("Albania", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "BA", esc_html__("Bosnia and Herzegovina", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ES", esc_html__("Spain", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GI", esc_html__("Gibraltar", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "GR", esc_html__("Greece", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "HR", esc_html__("Croatia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "IT", esc_html__("Italy", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "ME", esc_html__("Montenegro", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MK", esc_html__("Macedonia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MT", esc_html__("Malta", WL_AGM_LITE_DOMAIN), $c );
        /*$tree[] = array($parent, "CS", esc_html__("Serbia and Montenegro", WL_AGM_LITE_DOMAIN), $p); */
        $tree[] = array( $parent, "RS", esc_html__("Serbia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PT", esc_html__("Portugal", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SI", esc_html__("Slovenia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SM", esc_html__("San Marino", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "VA", esc_html__("Holy See (Vatican City State)", WL_AGM_LITE_DOMAIN), $c );
        /*$tree[] = array($parent, "YU", esc_html__("Yugoslavia", WL_AGM_LITE_DOMAIN), $p); */

        /* - Australia and New Zealand  */
        $parent = "053";
        $tree[] = array( $parent, "AU", esc_html__("Australia", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NF", esc_html__("Norfolk Island", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "NZ", esc_html__("New Zealand", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Melanesia                  */
        $parent = "054";
        $tree[] = array( $parent, "FJ", esc_html__("Fiji", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "NC", esc_html__("New Caledonia", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "PG", esc_html__("Papua New Guinea", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "SB", esc_html__("Solomon Islands", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "VU", esc_html__("Vanuatu", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Micronesia                 */
        $parent = "057";
        $tree[] = array( $parent, "FM", esc_html__("Micronesia, Federated States of", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "GU", esc_html__("Guam", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "KI", esc_html__("Kiribati", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MH", esc_html__("Marshall Islands", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "MP", esc_html__("Northern Mariana Islands", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "NR", esc_html__("Nauru", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "PW", esc_html__("Palau", WL_AGM_LITE_DOMAIN), $c | $p );

        /* - Polynesia                  */
        $parent = "061";
        $tree[] = array( $parent, "AS", esc_html__("American Samoa", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "CK", esc_html__("Cook Islands", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "NU", esc_html__("Niue", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "PF", esc_html__("French Polynesia", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "PN", esc_html__("Pitcairn", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "TK", esc_html__("Tokelau", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "TO", esc_html__("Tonga", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "TV", esc_html__("Tuvalu", WL_AGM_LITE_DOMAIN), $c | $p );
        $tree[] = array( $parent, "WF", esc_html__("Wallis and Futuna", WL_AGM_LITE_DOMAIN), $c );
        $tree[] = array( $parent, "WS", esc_html__("Samoa", WL_AGM_LITE_DOMAIN), $c );

        /* - US-States */
        $parent = "US";
        $tree[] = array( $parent, "US-AL", esc_html__("Alabama", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-AK", esc_html__("Alaska", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-AZ", esc_html__("Arizona", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-AR", esc_html__("Arkansas", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-CA", esc_html__("California", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-CO", esc_html__("Colorado", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-CT", esc_html__("Connecticut", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-DE", esc_html__("Delaware", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-FL", esc_html__("Florida", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-GA", _x("Georgia", "US-State", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-HI", esc_html__("Hawaii", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-ID", esc_html__("Idaho", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-IL", esc_html__("Illinois", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-IN", esc_html__("Indiana", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-IA", esc_html__("Iowa", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-KS", esc_html__("Kansas", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-KY", esc_html__("Kentucky", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-LA", esc_html__("Louisiana", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-ME", esc_html__("Maine", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-MD", esc_html__("Maryland", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-MA", esc_html__("Massachusetts", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-MI", esc_html__("Michigan", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-MN", esc_html__("Minnesota", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-MS", esc_html__("Mississippi", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-MO", esc_html__("Missouri", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-MT", esc_html__("Montana", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-NE", esc_html__("Nebraska", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-NV", esc_html__("Nevada", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-NH", esc_html__("New Hampshire", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-NJ", esc_html__("New Jersey", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-NM", esc_html__("New Mexico", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-NY", esc_html__("New York", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-NC", esc_html__("North Carolina", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-ND", esc_html__("North Dakota", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-OH", esc_html__("Ohio", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-OK", esc_html__("Oklahoma", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-OR", esc_html__("Oregon", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-PA", esc_html__("Pennsylvania", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-RI", esc_html__("Rhode Island", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-SC", esc_html__("South Carolina", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-SD", esc_html__("South Dakota", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-TN", esc_html__("Tennessee", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-TX", esc_html__("Texas", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-UT", esc_html__("Utah", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-VT", esc_html__("Vermont", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-VA", esc_html__("Virginia", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-WA", esc_html__("Washington", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-WV", esc_html__("West Virginia", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-WI", esc_html__("Wisconsin", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-WY", esc_html__("Wyoming", WL_AGM_LITE_DOMAIN), $p | $m );
        $tree[] = array( $parent, "US-DC", esc_html__("District of Columbia", WL_AGM_LITE_DOMAIN), $p | $m );
        /*$tree[] = array($parent, "US-AS", esc_html__("American Samoa", WL_AGM_LITE_DOMAIN), $p | $m); */
        /*$tree[] = array($parent, "US-GU", esc_html__("Guam", WL_AGM_LITE_DOMAIN), $p | $m); */
        /*$tree[] = array($parent, "US-MP", esc_html__("Northern Mariana Islands", WL_AGM_LITE_DOMAIN), $p | $m); */
        /*$tree[] = array($parent, "US-PR", esc_html__("Puerto Rico", WL_AGM_LITE_DOMAIN), $p | $m); */
        /*$tree[] = array($parent, "US-UM", esc_html__("United States Minor Outlying Islands", WL_AGM_LITE_DOMAIN), $p | $m); */

        /*$tree[] = array($parent, "US-VI", esc_html__("Virgin Islands, U.S.", WL_AGM_LITE_DOMAIN), $p | $m); */

        return $tree;
    }
}

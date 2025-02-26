<?php

// ***************************************************************************
// GREAT-KIWI-PASSWORDS.PHP
// (C) 2013. Peter Newman. All Rights Reserved.
// ***************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords ;

	// -----------------------------------------------------------------------

        //            1
        //   123456789012345678
	define( 'greatKiwi_adSwapper_local_v0x1x211_allowedLowerAlphaAndNumericPasswordCharacters' 	,
   	        '23479cdghkmnpvwxyz'
            ) ;

	// -----------------------------------------------------------------------

	define( 'greatKiwi_adSwapper_local_v0x1x211_allowedUpperAlphaPasswordCharacters' 		,
           	'CFGHJKLMNPRTVWXYZ'
            ) ;

	// -----------------------------------------------------------------------

	define( 'greatKiwi_adSwapper_local_v0x1x211_allowedPunctuationPasswordCharacters' 	,
           	'@#$%&*+=<>?'
            ) ;

	// -----------------------------------------------------------------------

	define( 'greatKiwi_adSwapper_local_v0x1x211_allowedPasswordCharacters' 	,
	        greatKiwi_adSwapper_local_v0x1x211_allowedLowerAlphaAndNumericPasswordCharacters .
	        greatKiwi_adSwapper_local_v0x1x211_allowedUpperAlphaPasswordCharacters .
	        greatKiwi_adSwapper_local_v0x1x211_allowedPunctuationPasswordCharacters
            ) ;

	// -----------------------------------------------------------------------
	// CRYPT_BLOWFISH - Blowfish hashing with a salt as follows:
	//
	//		"$2a$", "$2x$" or "$2y$", a two digit cost parameter, "$", and
	//		22 characters from the alphabet "./0-9A-Za-z".
	//
	// Using characters outside of this range in the salt will cause crypt()
	// to return a zero-length string.  The two digit cost parameter is the
	// base-2 logarithm of the iteration count for the underlying
	// Blowfish-based hashing algorithmeter and must be in range 04-31,
	// values outside this range will cause crypt() to fail.  Versions of
	// PHP before 5.3.7 only support "$2a$" as the salt prefix: PHP 5.3.7
	// introduced the new prefixes to fix a security weakness in the
	// Blowfish implementation.  Please refer to » this document for full
	// details of the security fix, but to summarise, developers targeting
	// only PHP 5.3.7 and later should use "$2y$" in preference to "$2a$".
	// -----------------------------------------------------------------------

	define( 'GREAT_KIWI_PASSWORD_CRYPT_BLOWFISH_SALT' 		,
           	'$2a$14$2MnXC177hV5i1a5VE7x39f'
            ) ;
			//	NOTES!
			//	------
			//	1.	You should update this whenever you install this file
			//		on a new site.
			//
			//	2.	NEVER update this - or lose it - on an existimg site !!!
			//
			//		As otherwise, you WON'T be able to check passwords that
			//		have already been stored with the previous value.
			//
			//  3.	As the cost parameter (04 to 31) increases in value,
			//		so to does the time taken to encrypt the password.
			//
			//		The "cost" chosen - 14 - takes about 1 second (which is
			//		probably a reasonable maximum - since otherwise, every
			//		login will be slowed by this amount).

	// -----------------------------------------------------------------------

//	dump_disallowed_characters() ;

	// -----------------------------------------------------------------------

/*
	for ( $i = 1 ; $i <= 10 ; $i++ ) {
        $password = generate_grouped_random_password() ;
        echo '<br />' , $password , ' --- ' , encode_password( $password ) ;

    }
*/

// ===========================================================================
// generate_grouped_random_password()
// ===========================================================================

function generate_grouped_random_password(
    $options = array()
	) {

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // generate_grouped_random_password(
    //		$options = array()
    //		)
    // - - - - - - - - - - - - - - - - -
    // Generates a `grouped` random password like:-
    //		k53t-xc92-v7k3
    //		etc
    //
    // ---
    //
    // Currently, all the ASCII alphanumeric characters are allowed, except:-
    //		0    1    5    6    8
    //		A    B    D    E    I    O    Q    S    U
    //		a    b    e    f    i    j    l    o    q    r    s    t    u
    //
    // These are omitted because they're combinations like:-
    //		0/8/B/D/Q
    //		1/I/l
    //		5/S
    //		etc
    //
    // that can easily be confused with each other.
    //
    // ---
    //
    // The only allowed punctuation characters are:-
    //     	@ # $ % & * + = < > ?
    //
    // These are all string-safe (but NOT regexp safe).
    //
    // ---
    //
    // $options is like (eg):-
    //
    //		$options = array(
    //			'number_groups'		    =>	4		,
    //			'chars_per_group'	    =>	4		,
    //			'group_separator'	    =>	'-'		,
    //			'lowercase_only'	    =>	TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //			)
    //
    // ---
    //
    // NOTE!
    // -----
    // With some combinations, it depends very much on the FONT used (as to
    // how similar two different characters look).  Thus the above rules are
    // a worst-case set.  Stuff is in there if in any common (web) font,
    // the chance of confusion exists.
    //
    // RETURNS the generated password.
    // -----------------------------------------------------------------------

/*
\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $options ) ;

    extract( $options ) ;

    if ( ! isset( $chars_per_group ) ) {
        $chars_per_group = 4 ;
    }

    if ( ! isset( $number_groups ) ) {
        $number_groups = 4 ;
    }

    if ( ! isset( $group_separator ) ) {
        $group_separator = '-' ;
    }

    if ( ! isset( $lowercase_only ) ) {
        $lowercase_only  = TRUE ;
    }

\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $number_groups ) ;

    // -----------------------------------------------------------------------

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
//  $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    $possible = greatKiwi_adSwapper_local_v0x1x211_allowedPasswordCharacters ;

    if ( $lowercase_only ) {
        $j = strlen( $possible ) ;
        $temp = '' ;
        for ( $i=0 ; $i<$j ; $i++ ) {
            if ( ! ctype_upper( $possible[$i] ) ) {
                $temp .= $possible[$i] ;
            }
        }
        $possible = $temp ;
    }

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);

	$length = $chars_per_group * $number_groups ;

    // check for length overflow and truncate if necessary
  	if ($length > $maxlength) {
      $length = $maxlength;
	}

//  $length += ( $number_groups - 1 ) * strlen( $group_separator ) ;

    // set up a counter for how many characters are in the password so far
    $i = 0;

    $chars_this_group = 0 ;

    // add random characters to $password until $length is reached
    while ($i < $length) {

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);

//echo '<br />' , $i , '   '  , $char ;

      // have we already used this character in $password?
      if (!strstr($password, $char)) {
          if ( $chars_this_group >= $chars_per_group ) {
              $password .= $group_separator ;
              $chars_this_group = 0 ;
          }
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
        $chars_this_group++ ;
      }

    }

\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $password ) ;

//echo '<br />' ;

    // done!
    return $password;
*/

    // =========================================================================
    // Set the defaults...
    //
    //		$options = array(
    //			'number_groups'		    =>	4		,
    //			'chars_per_group'	    =>	4		,
    //			'group_separator'	    =>	'-'		,
    //			'lowercase_only'	    =>	TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //			)
    //
    // =========================================================================

    if ( ! array_key_exists( 'number_groups' , $options ) ) {
        $options['number_groups'] = 4 ;
    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'chars_per_group' , $options ) ) {
        $options['chars_per_group'] = 4 ;
    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'group_separator' , $options ) ) {
        $options['group_separator'] = '-' ;
    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'lowercase_only' , $options ) ) {
        $options['lowercase_only'] = TRUE ;
    }

    // -------------------------------------------------------------------------

    if ( ! array_key_exists( 'question_punctuation' , $options ) ) {
        $options['question_punctuation'] = FALSE ;
    }

    // -------------------------------------------------------------------------

//$options['number_groups'] = 0 ;
//$options['lowercase_only'] = FALSE ;
//$options['question_punctuation'] = TRUE ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $options ) ;

    // =========================================================================
    // Get the allowed chars...
    // =========================================================================

    $allowed_chars =
        greatKiwi_adSwapper_local_v0x1x211_allowedLowerAlphaAndNumericPasswordCharacters
        ;

    // -------------------------------------------------------------------------

    if ( ! $options['lowercase_only'] ) {
        $allowed_chars .=
	        greatKiwi_adSwapper_local_v0x1x211_allowedUpperAlphaPasswordCharacters
            ;
    }

	// -------------------------------------------------------------------------

    if ( $options['question_punctuation'] ) {
        $allowed_chars .=
    	    greatKiwi_adSwapper_local_v0x1x211_allowedPunctuationPasswordCharacters
            ;
    }

	// -------------------------------------------------------------------------

    $allowed_chars = str_shuffle( $allowed_chars ) ;
        //  Introduce some extra randomness

    // =========================================================================
    // Create the password...
    // =========================================================================

    $password = '' ;

    $separator = '' ;

    $max = strlen( $allowed_chars ) - 1 ;

    for ( $i = 0 ; $i < $options['number_groups'] ; $i++ ) {

        $password .= $separator ;

        for ( $j = 0 ; $j < $options['chars_per_group'] ; $j++ ) {
            $password .= $allowed_chars[ mt_rand( 0 , $max ) ] ;
        }

        $separator = $options['group_separator'] ;

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $password ) ;

    return $password ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// ===========================================================================
// encode_password()
// ===========================================================================

function encode_password( $in ) {

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // encode_password(
    //		$password
    //		)
    // - - - - - - - -
    // Encode a password (for storage in a database, etc).
    //
    // NOTES!
    // ------
    // 1.	Instead of the traditional PHP md5() encryption, we use Blowfish
    // 		encryption - with a salt (to further increase security).
    //
    // 		See:-
    //			http://www.php.net/manual/en/faq.passwords.php#faq.passwords.fasthash
    //
    // 2.	Unfortunately, while the chosen BlowFish encryption with secure
    //		salt gives good security, it also takes roughly ONE SECOND
    //		(depending on processor speed, etc), to generate.
    //
    // RETURNS the encoded password.
    //
    // Issues an error message and exit()s on FATAL error (problems with
    // the PHP/OS hashing functions).
    // -----------------------------------------------------------------------

	$out = crypt( $in , GREAT_KIWI_PASSWORD_CRYPT_BLOWFISH_SALT ) ;
    	//	Returns the hashed string or a string that is shorter than 13
    	//	characters and is guaranteed to differ from the salt on failure.

    // -----------------------------------------------------------------------

    if ( strlen( $out ) < 13 ) {

        echo <<<EOT
Password encoding failure!
EOT;

        exit() ;

    }

    // -----------------------------------------------------------------------

    return $out ;

    // -----------------------------------------------------------------------

}

// ==========================================================================
// get_unique_grouped_random_username_or_password()
// ==========================================================================

function get_unique_grouped_random_username_or_password(
    $table_name						,
    $field_name						,
    $question_encoded				,
    $username_or_password_options	,
    $max_attempts = 8
	) {

	// ----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // get_unique_grouped_random_username_or_password(
    //		$table_name						,
    //		$field_name						,
    //		$questin_encoded				,
    //		$username_or_password_options	,
    //		$max_attempts = 8
    //		)
    // - - - - - - - - - - - - - - - - - - - - - -  -
    // Like:-
    // 		\greatKiwi_passwords\get_grouped_random_password()
    //
    // but also makes sure that no other record in the specified table has
    // the same username/password in the specified field.
    //
    // ---
    //
    // $question_encoded specifies whether or not the field value stored
    // in the database is encoded with:-
    // 		\greatKiwi_passwords\encode_password()
    //
    // Normally, this will be TRUE for passwords and FALSE for usernames.
    //
    // ---
    //
    // $username_or_password_options is the $options parameter of:-
    // 		\greatKiwi_passwords\get_grouped_random_password()
    //
    // Ie:-
    //
    //		$username_or_password_options = array(
    //			'number_groups'		    =>	4		,
    //			'chars_per_group'	    =>	4		,
    //			'group_separator'	    =>	'-'		,
    //			'lowercase_only'	    =>	TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //			)
    //
    // ---
    //
    // The $max_attempts parameter exists because each attempt to
    // determine if a given password is unique takes roughly ONE SECOND
    // of processor time.
    //
    // This is the time taken for:-
    //		\greatKiwi_passwords\encode_password()
    //
    // to work.
    //
    // That's rather a long time.  So once the number of free slots in
    // the password table becomes too small, we can be left waiting for
    // quite some time for new unique passwords to be generated.
    //
    // ---
    //
    // Assumes that:-
    //		../includes/greatkiwi-database/wordpress.php
    //
    // has already been required/included.
    //
    // ---
    //
    // RETURNS:-
    //		o	Unique username/password STRING on SUCCESS
    //		o	array( $error_message_string ) on FAILURE
    // -----------------------------------------------------------------------

    $number_attempts = 0 ;

    // -----------------------------------------------------------------------

	while ( $number_attempts < $max_attempts ) {

        // -------------------------------------------------------------------

		$out = \greatKiwi_passwords\generate_grouped_random_password(
            		$username_or_password_options
            		) ;

        // -------------------------------------------------------------------

        if ( $question_encoded ) {
        	$out = encode_password( $out ) ;
        }

        // ----------------------------------------------------------------------
    	// \greatKiwi_databaseAccess\sql_get_zero_or_more_records(
	    // 		$sql
    	//		)
	    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    	// Returns either:-
	    //		o	The 0+ records specified by the SQL string (as a PHP
    	//			numbered ARRAY, of PHP associative ARRAYs of
	    //			NAME=VALUE pairs), on SUCCESS, or;
    	//		o	An error message STRING on FAILURE
    	// ----------------------------------------------------------------------

        $sql = <<<EOT
SELECT id
FROM `{$table_name}`
WHERE `{$field_name}`='{$out}'
EOT;

        // -------------------------------------------------------------------

        $existing_records =
            \greatKiwi_databaseAccess\sql_get_zero_or_more_records( $sql )
            ;

        // -------------------------------------------------------------------

        if ( is_string( $existing_records ) ) {
            return array( $existing_records ) ;
        }

        // -------------------------------------------------------------------

        if ( count( $existing_records ) === 0 ) {
            return $out ;
        }

        // -------------------------------------------------------------------

        $number_attempts++ ;

        // -------------------------------------------------------------------

    }

	// -----------------------------------------------------------------------

    $msg = <<<EOT
PROBLEM: Couldn't find unique username/password, even after {$max_attempts} attempts.
EOT;

	return array( $msg ) ;

    // -----------------------------------------------------------------------

}

// ===========================================================================
// generatePassword()
// ===========================================================================

//  From:- http://www.laughing-buddha.net/php/lib/password

function generatePassword($length = 8) {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
//  $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
    $possible = GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS ;

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);

    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }

    // set up a counter for how many characters are in the password so far
    $i = 0;

    // add random characters to $password until $length is reached
    while ($i < $length) {

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);

      // have we already used this character in $password?
      if (!strstr($password, $char)) {
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;

}

// ===========================================================================
// dump_disallowed_characters()
// ===========================================================================

function dump_disallowed_characters() {

    // -----------------------------------------------------------------------

    echo '<p>' ;

    // -----------------------------------------------------------------------

    $gap = str_repeat( '&nbsp;' , 4 ) ;

    $comma = '' ;

    // -----------------------------------------------------------------------

    for ( $i = 33 ; $i <= 126 ; $i++ ) {

        if ( strpos( GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS , chr($i) ) === FALSE ) {
            echo $comma , chr($i) ;
            $comma = $gap ;
        }

    }

    // -----------------------------------------------------------------------

    echo '</p>' ;

    // -----------------------------------------------------------------------

}

// ===========================================================================
// question_grouped_random_password()
// ===========================================================================

function question_grouped_random_password(
    $candidate_password     ,
    $options = array()
	) {

    // -----------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_passwords\
    // question_grouped_random_password(
    //      $candidate_password     ,
    //		$options = array()
    //		)
    // - - - - - - - - - - - - - - - - -
    // Checks whether the $candidate_password is a grouped random password
    // like:-
    //		k53t-xc92-v7k3
    //		etc
    //
    // Allowed password characters are those in:-
    //		GREAT_KIWI_ALLOWED_PASSWORD_CHARACTERS
    //
    // Currently these are all the ASCII alphanumeric characters but:-
    //		0    1    5    6    8
    //		A    B    D    E    I    O    Q    S    U
    //		a    b    e    f    i    j    l    o    q    r    s    t    u
    //
    // These are omitted because they're combinations like:-
    //		0/8/B/D/Q
    //		1/I/l
    //		5/S
    //		etc
    //
    // that can easily be confused with each other.
    //
    // ---
    //
    // $options is like (eg):-
    //
    //		$options = array(
    //			'number_groups'		    =>	4		,
    //			'chars_per_group'	    =>	4		,
    //			'group_separator'	    =>	'-'		,
    //			'lowercase_only'	    =>	TRUE    ,
    //          'question_punctuation'  =>  FALSE
    //			)
    //
    // ---
    //
    // NOTE!
    // -----
    // With some combinations, it depends very much on the FONT used (as to
    // how similar two different characters look).  Thus the above rules are
    // a worst-case set.  Stuff is in there if in any common (web) font,
    // the chance of confusion exists.
    //
    // RETURNS
    //      On SUCCESS
    //          TRUE or FALSE
    //
    //      On FAILURE
    //          $error_message STRING
    // -----------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -----------------------------------------------------------------------

    if ( ! is_string( $candidate_password ) ) {

        return <<<EOT
PROBLEM:&nbsp; Bad "candidate_password" (string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

    }

    // -----------------------------------------------------------------------

    extract( $options ) ;

    if ( ! isset( $chars_per_group ) ) {
        $chars_per_group = 4 ;
    }

    if ( ! isset( $number_groups ) ) {
        $number_groups = 4 ;
    }

    if ( ! isset( $group_separator ) ) {
        $group_separator = '-' ;
    }

    if ( ! isset( $lowercase_only ) ) {
        $lowercase_only  = TRUE ;
    }

    if ( ! isset( $question_punctuation ) ) {
        $question_punctuation = FALSE ;
    }

    // -----------------------------------------------------------------------

    $groups = explode( $group_separator , $candidate_password ) ;

    // -----------------------------------------------------------------------

    if ( count( $groups ) !== $number_groups ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    $allowed_characters =
        greatKiwi_adSwapper_local_v0x1x211_allowedLowerAlphaAndNumericPasswordCharacters
        ;

    // -------------------------------------------------------------------------

    if ( ! $lowercase_only ) {

        $allowed_characters .=
            greatKiwi_adSwapper_local_v0x1x211_allowedUpperAlphaPasswordCharacters
            ;

    }

    // -------------------------------------------------------------------------

    if ( $question_punctuation ) {

        $allowed_characters .=
            greatKiwi_adSwapper_local_v0x1x211_allowedPunctuationPasswordCharacters
            ;

    }

    // -------------------------------------------------------------------------

    $regex = '/[^' . $allowed_characters . ']/' ;

    // -------------------------------------------------------------------------

    foreach ( $groups as $this_group ) {

        // ---------------------------------------------------------------------

        if ( strlen( $this_group ) !== $chars_per_group ) {
            return FALSE ;
        }

        // ---------------------------------------------------------------------

        $result = preg_match( $regex , $this_group ) ;
                        //  preg_match() returns 1 if the pattern matches given
                        //  subject, 0 if it does not, or FALSE if an error
                        //  occurred.

        // ---------------------------------------------------------------------

        if ( $result === FALSE ) {

            return <<<EOT
PROBLEM:&nbsp; "preg_match()" failure validating grouped random password
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        }

        // ---------------------------------------------------------------------

        if ( $result === 1 ) {
            return FALSE ;
        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    return TRUE ;

    // -------------------------------------------------------------------------

}

// ===========================================================================
// That's that!
// ===========================================================================


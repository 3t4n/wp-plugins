<?php

// *****************************************************************************
// INCLUDES / SEQUENTIAL-IDS-SUPPORT.PHP
// (C) 2014 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport ;

// -----------------------------------------------------------------------------
// OVERVIEW
// ========
// Assume that we want to give each of the records in a dataset a unique ID.
//
// But we don't want to use the "key" field normally associated with each
// dataset record, because this doesn't protect the IDs of deleted records
// from being re-used.
//
// To prevent the IDs of deleted record from being re-used, we must use
// sequential IDs like MySQL auto-increment IDs.  Ie:-
//      1, 2, 3...
//
// Where even if a record is deleted, it's ID is never re-used.
//
// ---
//
// We could generate these IDs by storing a "last_used_sequential_id"
// variable in the WordPress options database.  With code like this, for
// example:-
//
//          $sid = get_option( 'last_used_sid' ) ;
//          $sid = $sid + 1 ;
//          update_option( 'last_used_sid' , $sid ) ;
//
// But the problem is that if two or more WordPress page/CRON processes
// run the above at the same time, duplicate SIDs could result.  (Ie;
// assume that 1 page/process interrupts the other after retrieving the
// current last used SID, as follows:-
//
//          $sid = get_option( 'last_used_sid' ) ;
//          ...page/process 2 interrupts page/process 1 here...
//          $sid = $sid + 1 ;
//          update_option( 'last_used_record_number' , $sid ) ;
//
// Then both pages/processes will get the same SID (and 1 SID will be left
// un-used).
//
// ---
//
// To prevent this, we use MySQL "auto-increment" colums to generate the
// SIDs - on the assumption that MySQL is hard-wired to prevent duplicates.
// -----------------------------------------------------------------------------

// =============================================================================
// get_sequential_ids_table_name()
// =============================================================================

function get_sequential_ids_table_name() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // get_sequential_ids_table_name()
    // - - - - - - - - - - - - - - - - - - - - - - -
    // RETURNS the name of the MySql table used to generate the sequential
    // ids (with the WordPress table prefix prepended)...
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\prepend_wordpress_table_name_prefix()
    //      $table_name
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Prepends the WordPress table prefix to the supplied table name, and
    // returns the result.
    //
    // NOTE!
    // =====
    // From:-
    //      http://codex.wordpress.org/Creating_Tables_with_Plugins
    //
    //    "DATABASE TABLE PREFIX
    //    =====================
    //    In the wp-config.php file, a WordPress site owner can define a
    //    database table prefix. By default, the prefix is "wp_", but you'll
    //    need to check on the actual value and use it to define your database
    //    table name. This value is found in the $wpdb->prefix variable. (If
    //    you're developing for a version of WordPress older than 2.0, you'll
    //    need to use the $table_prefix global variable, which is deprecated in
    //    version 2.1)."
    //
    // -------------------------------------------------------------------------

    return  \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\prepend_wordpress_table_name_prefix(
                'great_kiwi_sequential_ids'
                ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_new_sequential_record_id()
// =============================================================================

function get_new_sequential_record_id(
    $core_plugapp_dirs
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // get_new_sequential_record_id(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // Returns a sequential ID in the range:-
    //      1 to 18,446,744,073,709,551,615 (= MySQL unsigned BIGINT max)
    //
    // RETURNS
    //      On SUCCESS
    //          $sequential_id STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    global $wpdb ;

    // =========================================================================
    // LOAD the MYSQL SUPPORT...
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/basepress-mysql.php' ) ;

    // =========================================================================
    // Configure the MYSQL ERROR HANDLING...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\set_error_handling(
    //      $level                  ,
    //      $question_die_on_error
    //      )
    // - - - - - - - - - - - - - - - - - -
    // Sets:-
    //      $GLOBALS['BASEPRESS']['MYSQL']['error_level']
    //      $GLOBALS['BASEPRESS']['MYSQL']['question_die_on_error']
    //
    // to the specified values.
    //
    // $level must be one of:-
    //
    //      'none'          //  NO error messages at all
    //
    //      'user'          //  Simple generic error messages
    //                      //  suitable for front-end where you
    //                      //  want to keep any info. that might
    //                      //  assist hackers to a minimum.
    //
    //      'developer'     //  Detailed error messages (as much
    //                      //  info. as possible.
    //
    // $question_die_on_error must be TRUE or FALSE.
    //
    // RETURNS
    //      On SUCCESS
    //      - - - - -
    //      TRUE
    //
    //      On FAILURE
    //      - - - - -
    //      $error_message STRING
    // -------------------------------------------------------------------------

//  $level = 'user' ;
//
//  $question_die_on_error = FALSE ;
//
//  // -------------------------------------------------------------------------
//
//  $result = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\set_error_handling(
//                  $level                  ,
//                  $question_die_on_error
//                  ) ;
//
//  // -------------------------------------------------------------------------
//
//  if ( $result !== TRUE ) {
//      return array( $result ) ;
//  }

    //  Assumed already done

    // =========================================================================
    // GET the SEQUENTIAL IDs TABLE NAME...
    // =========================================================================

    $sequential_ids_table_name = get_sequential_ids_table_name() ;

    // =========================================================================
    // DOES the SEQUENTIAL IDS TABLE EXIST ?
    //
    // If NOT, CREATE it...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\table_exists(
    //      $table_name
    //      )
    // - - - - - - - - - - - - - - -
    // RETURNS TRUE or FALSE, depending on whether the table exists or not.
    //
    // NOTE!
    // -----
    // $table_name is an ABSOLUTE table name - with the WordPress table
    // prefix prepended if necessary.
    //
    // Call:-
    //
    //      table_exists(
    //          prepend_wordpress_table_name_prefix( $table_name )
    //          )
    //
    // if you want to supply the table name WITHOUT the WordPress table prefix
    // (and have that prefix automatically prepended for you).
    // -------------------------------------------------------------------------

    if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\table_exists(
            $sequential_ids_table_name
            ) !== TRUE ) {

        // =====================================================================
        // CREATE "SEQUENTIAL IDS" TABLE
        // =====================================================================

        // ---------------------------------------------------------------------
        // Create the table...
        // ---------------------------------------------------------------------

        $sql = <<<EOT
CREATE TABLE `{$sequential_ids_table_name}` (
    `id`                BIGINT UNSIGNED NOT NULL AUTO_INCREMENT     ,
    `random`            TINYTEXT NOT NULL                           ,
    `datetime_created`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP         ,
    PRIMARY KEY         `id` ( `id` )                               ,
    UNIQUE KEY          `random` ( `random` (128) )
)
EOT;

        // ---------------------------------------------------------------------

        $number_records_affected = $wpdb->query( $sql ) ;
                                        //  The function returns an integer
                                        //  corresponding to the number of rows
                                        //  affected/selected.  If there is a
                                        //  MySQL error, the function will
                                        //  return FALSE.

        // ---------------------------------------------------------------------

        if ( $number_records_affected === FALSE ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Couldn't create sequential ids table (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------
        // On SUCCESS:-
        //      $wpdb->query()
        //
        // seems to return TRUE (ie; it returns the boolean value "1").
        // ---------------------------------------------------------------------

//pr( $number_records_affected ) ;
//echo "\n" , gettype( $number_records_affected ) , "\n" ;

        // ---------------------------------------------------------------------

        if (    gettype( $number_records_affected ) !== 'boolean'
                ||
                $number_records_affected != 1
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Couldn't create sequential ids table (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------
        // Set auto-increment start value...
        // ---------------------------------------------------------------------

        $sql = <<<EOT
ALTER TABLE `{$sequential_ids_table_name}` AUTO_INCREMENT=1001
EOT;

        // ---------------------------------------------------------------------

        $number_records_affected = $wpdb->query( $sql ) ;
                                        //  The function returns an integer
                                        //  corresponding to the number of rows
                                        //  affected/selected.  If there is a
                                        //  MySQL error, the function will
                                        //  return FALSE.

        // ---------------------------------------------------------------------

        if ( $number_records_affected === FALSE ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Couldn't adjust auto_increment start value (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------
        // On SUCCESS:-
        //      $wpdb->query()
        //
        // seems to return TRUE (ie; it returns the boolean value "1").
        // ---------------------------------------------------------------------

//pr( $number_records_affected ) ;
//echo "\n" , gettype( $number_records_affected ) , "\n" ;

        // ---------------------------------------------------------------------

        if (    gettype( $number_records_affected ) !== 'boolean'
                ||
                $number_records_affected != 1
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Couldn't adjust auto_increment start value (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $question_database_table_just_added = TRUE ;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

    if ( \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\table_exists( $sequential_ids_table_name ) !== TRUE ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Couldn't create sequential ids table (#3)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // =========================================================================
    // Get a long RANDOM NUMBER to use...
    //
    // Making sure that no existing record uses this random number.
    // =========================================================================

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/random.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\
    // secure_rand(
    //      $length
    //      )
    // - - - - - -
    // According to it's author, this routine generates a really strong
    // random number in PHP.
    //
    // See:-
    //      http://www.zimuel.it/strong-cryptography-in-php/
    //
    // NOTES!
    // ======
    // 1.   $length is in bytes.
    //
    // 2.   By default, this function calls PHPs:-
    //          openssl_random_pseudo_bytes()
    //      function (which is supposedly the best way to generate random
    //      numbers in PHP).
    //
    // 3.   The returned value is a STRING.
    //
    // 4.   The returned STRING is binary (NOT hex-encoded).  Thus it's just
    //      rubbish characters (when displayed).
    // -------------------------------------------------------------------------

    require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/string-utils.php' ) ;

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\
    // hex_encode( $input_string )
    // - - - - - - - - - - - - - -
    // Hex encodes a PHP string.  For example:-
    //
    //      hex_encode( 'ABC123' )
    //          ==>  "414243313233"
    //
    //      hex_encode( 'The quick brown fox...' )
    //          ==>  "54686520717569636b2062726f776e20666f782e2e2e"
    //
    // NOTES!
    // ------
    // 1.   hex_encode() will handle all character/byte values, from ASCII 0
    //      to ASCII 255.  Ie:-
    //
    //          hex_encode( chr(0) . chr(1) . chr(2) . chr(253) . chr(254) . chr(255) )
    //              ==> "000102fdfeff" (= "00 01 02 fd fe ff")
    //
    //      In other words, hex_encode() will happily encode PHP strings that
    //      contain binary data.
    //
    // 2.   The encoded string contains only the chars:-
    //      o   "0" to "9", and;
    //      o   "a" to "f"
    //
    //      Thus, it may safely be:-
    //      o   Included in a URL query string,
    //      o   Inserted into a MySQL database query, and;
    //      o   Stored directly into a MySQL database (it contains only
    //          alphanumeric characters - so there's no need for any
    //          escaping, etc).
    //
    // 3.   To decode the encoded string, use hex_decode().
    //
    // 4.   From the PHP Manual, "Strings" section...
    //
    //          "A string is series of characters.  Before PHP 6, a character
    //          is the same as a byte.  That is, there are exactly 256
    //          different characters possible.  This also implies that PHP
    //          has no native support of Unicode.  See utf8_encode() and
    //          utf8_decode() for some basic Unicode functionality.
    //
    //          Note:   It is no problem for a string to become very large.
    //                  PHP imposes no boundary on the size of a string; the
    //                  only limit is the available memory of the computer
    //                  on which PHP is running."
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\
    // get_zero_or_more_records(
    //      $sql
    //      )
    // - - - - - - - - - - - - - - - - - - - - -
    // NOTES!
    // ======
    // 1.   The INPUT $sql should NOT be escaped.
    //
    // 2.   MySQL Data Types AREN'T PRESERVED!
    //      ----------------------------------
    //      In other words, something stored in the DB as a MySQL INT, WON'T
    //      necessarily be returned as a PHP INT.  It comes back as a STRING.
    //
    //      I haven't checked FLOATs and TIMESTAMPS, etc.  But I assume that
    //      the same applies to them.
    //
    //      Why this happens I'm not sure.  But presumably, since we access
    //      the database with the WordPress Wpdb class - it's that class's
    //      fault.
    //
    // RETURNS
    //      On SUCCESS
    //      - - - - -
    //      The 0+ records specified by the SQL string (as a PHP numeric
    //      array of records).  Eg:-
    //
    //          $records = array(
    //              0   =>  array(
    //                          'field_name_1'  =>  <field_value_1>     ,
    //                          'field_name_2'  =>  <field_value_2>     ,
    //                          ...                 ...
    //                          'field_name_N'  =>  <field_value_N>
    //                          )
    //              ...
    //              )
    //
    //      On FAILURE
    //      - - - - -
    //      An error message STRING.
    // -------------------------------------------------------------------------

    while ( TRUE ) {

        // ---------------------------------------------------------------------

        $random =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_random\secure_rand(
                64
                ) ;

        // ---------------------------------------------------------------------

        $random =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\hex_encode(
                $random
                ) ;

        // ---------------------------------------------------------------------

        $sql = <<<EOT
SELECT *
FROM {$sequential_ids_table_name}
WHERE random = "{$random}"
EOT;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
            $sql
            ) ;

        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------

        if ( ! is_array( $result ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Sequential id generation failure (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( count( $result ) === 0 ) {
            break ;
        }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // ADD a NEW RECORD (to generate the new auto-increment ID)...
    // =========================================================================

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\add_record(
    //      $table_name         ,
    //      $raw_record_data
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // $raw_record_data should be like:-
    //
    //      $raw_record_data = array(
    //          'field_name_1'  =>  <field_value_1>     ,
    //          ...
    //          'field_name_N'  =>  <field_value_N>
    //          )
    //
    // In other words, $raw_record_data must be an associative ARRAY of
    //      field name  =>  field_value
    //
    // pairs.  Where:-
    //
    // 1.   At least ONE field must be specified.
    //
    // 2.   Field values can be any of the following PHP data types:-
    //          STRING
    //          INT
    //          FLOAT
    //          TRUE    (stored as 1 in the DB)
    //          FALSE   (stored as 0 in the DB)
    //          NULL    (stored as NULL in the DB)
    //
    //      PHP ARRAY and OBJECT type fields AREN'T allowed.
    //
    // 3.   You DON'T have to supply INT and FLOAT values as PHP
    //      INTs or FLOATS.  They can be supplied as PHP STRINGS
    //      (eg; from $_GET and/or $_POST).  And MySQL will
    //      automatically convert them (before storing them).
    //
    //      NOTE!
    //      -----
    //      Every value that "add_record()" supplies to MySQL will
    //      be supplied in STRING format.  So putting (eg):-
    //          $_GET['id']
    //
    //      into $raw_record_data like:-
    //          $raw_record_data['id'] = (int) $_GET['id']
    //
    //      is pointless.  Since "add_record()" will simply do:-
    //          (string) $raw_record_data['id']
    //
    //      to it before supplying it to MySQL.
    //
    // 4.   The field values MUST NOT be SQL escaped.  You MUST supply
    //      the RAW input data (even the raw $_GET and $_POST data
    //      entered by the user).  And "add_record()" will escape it
    //      for you.
    //
    // ---
    //
    // RETURNS either:-
    //      o   The new record's record ID (as PHP INT) on SUCCESS
    //      o   An error message STRING on FAILURE
    // -------------------------------------------------------------------------

    $raw_record_data =
        array(
            'random'    =>  $random
            ) ;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\add_record(
            $sequential_ids_table_name      ,
            $raw_record_data
            ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // =========================================================================
    // Get the BIGINT ID by having MySQL cast it to a string, before
    // returning it.
    //
    // This is to prevent problems with PHP not being able to handle BIGINTs
    // properly...
    // =========================================================================

    $sql = <<<EOT
SELECT CAST( CAST( `id` AS UNSIGNED ) AS CHAR( 100 ) )
FROM `{$sequential_ids_table_name}`
WHERE `random` = "{$random}"
EOT;

    // -------------------------------------------------------------------------

    $result =
        \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
        $sql
        ) ;

    // -------------------------------------------------------------------------

    if ( is_string( $result ) ) {
        return array( $result ) ;
    }

    // -------------------------------------------------------------------------

    if ( ! is_array( $result ) ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Sequential id generation failure (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

    if ( count( $result ) !== 1 ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Sequential id generation failure (#3)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------
    // Here we should have (eg):-
    //
    //      $result = Array(
    //                  [0] => Array(
    //                              [CAST( CAST( id AS UNSIGNED ) AS CHAR( 100 ) )] => 2
    //                              )
    //                  )
    //
    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $result ) ;

    $sid = array_values( $result[0] ) ;

    $sid = $sid[0] ;

    // -------------------------------------------------------------------------

    if ( ! is_string( $sid ) ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Sequential id generation failure (#4)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // =========================================================================
    // DELETE any UNWANTED RECORDS...
    // =========================================================================

    // -------------------------------------------------------------------------
    // NOTE!
    // =====
    // We do this to keep the sequential records table from hogging too much
    // space.
    //
    // To prevent too much DB activity, we wait till there are more than 100
    // records.  Then delete all but the last 10 (in one hit)...
    // -------------------------------------------------------------------------

    $sql = <<<EOT
SELECT COUNT(*)
FROM `{$sequential_ids_table_name}`
EOT;

    // -------------------------------------------------------------------------

    $count =
        $wpdb->get_var( $sql )
        ;
        //  The get_var function returns a single variable from the database.
        //  Though only one variable is returned, the entire result of the query
        //  is cached for later use. Returns NULL if no result is found.

    // -------------------------------------------------------------------------

    if ( $count === NULL ) {

        $msg = <<<EOT
PROBLEM:&nbsp; Sequential ids table clean-up failure (#1)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        return array( $msg ) ;

    }

    // -------------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $count , '$count' ) ;

    // -------------------------------------------------------------------------

    if ( $count > 100 ) {

        // ---------------------------------------------------------------------
        // Delete all but the last 10 records...
        // ---------------------------------------------------------------------

        $sql = <<<EOT
SELECT `datetime_created`
FROM `{$sequential_ids_table_name}`
ORDER BY `datetime_created` ASC
EOT;

        // ---------------------------------------------------------------------

        $result =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_basepressMysql\get_zero_or_more_records(
            $sql
            ) ;


        // ---------------------------------------------------------------------

        if ( is_string( $result ) ) {
            return array( $result ) ;
        }

        // ---------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $result = Array(
        //          [0] => Array(
        //                      [datetime_created] => 2014-12-12 15:03:38
        //                      )
        //          [1] => Array(
        //                      [datetime_created] => 2014-12-12 18:44:19
        //                      )
        //          ...
        //          [10] => Array(
        //                      [datetime_created] => 2014-12-12 19:01:46
        //                      )
        //          )
        //
        // ---------------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $result , '$result' ) ;

        // ---------------------------------------------------------------------
        // Get the index of the total - 10th record...
        // ---------------------------------------------------------------------

        $index_to_delete_to = count( $result ) - 9 ;

        // ---------------------------------------------------------------------
        // Delete this record and before...
        // ---------------------------------------------------------------------

        $sql = <<<EOT
DELETE
FROM `{$sequential_ids_table_name}`
WHERE `datetime_created` < '{$result[ $index_to_delete_to ]['datetime_created']}'
EOT;

        // ---------------------------------------------------------------------

        $number_records_affected = $wpdb->query( $sql ) ;
                                        //  The function returns an integer
                                        //  corresponding to the number of rows
                                        //  affected/selected.  If there is a
                                        //  MySQL error, the function will
                                        //  return FALSE.

        // ---------------------------------------------------------------------

        if ( $number_records_affected === FALSE ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Sequential ids table clean-up failure (#2)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $number_records_affected , '$number_records_affected' ) ;

        // ---------------------------------------------------------------------
        // On SUCCESS:-
        //      $wpdb->query()
        //
        // seems to return TRUE (ie; it returns the boolean value "1").
        // ---------------------------------------------------------------------

//pr( $number_records_affected ) ;
//echo "\n" , gettype( $number_records_affected ) , "\n" ;

            // ---------------------------------------------------------------------

//          if (    gettype( $number_records_affected ) !== 'boolean'
//                  ||
//                  $number_records_affected != $number_records_to_delete
//              ) {
//
//              $msg = <<<EOT
//  PROBLEM:&nbsp; Sequential ids table clean-up failure (#3)
//  Detected in:&nbsp; \\{$ns}\\{$fn}()
//  EOT;
//
//              return array( $msg ) ;
//
//          }

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $sid ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// get_number2key_conversion_table()
// =============================================================================

function get_number2key_conversion_table() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // get_number2key_conversion_table()
    // - - - - - - - - - - - - - - - - -
    // Returns an array like:-
    //
    //      $conversion_table = array(
    //          '0' =>  'd'
    //          '1' =>  'n'
    //          '2' =>  '2'
    //          '3' =>  '3'
    //          '4' =>  '4'
    //          '5' =>  'p'
    //          '6' =>  'x'
    //          '7' =>  '7'
    //          '8' =>  'y'
    //          '9' =>  '9'
    //          )
    //
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // WARNING!
    // ========
    // NEVER CHANGE THIS CODE (unless you know what you're doing).
    //
    // Or else you won't be able to reverse sequential keys already generated
    // back to their original numeric form (correctly).
    // -------------------------------------------------------------------------

    return array(
        '0' =>  'd'     ,
        '1' =>  'n'     ,
        '2' =>  '2'     ,
        '3' =>  '3'     ,
        '4' =>  '4'     ,
        '5' =>  'p'     ,
        '6' =>  'x'     ,
        '7' =>  '7'     ,
        '8' =>  'y'     ,
        '9' =>  '9'
        ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_number2key_pad_chars()
// =============================================================================

function get_number2key_pad_chars() {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // get_number2key_pad_chars()
    // - - - - - - - - - - - - -
    // Returns a STRING like:-
    //
    //      $pad_chars = 'cghkmvwz'
    //
    // Which string contains the "non-confusing" lower case alpha chars (as
    // described/defined in "great-kiwi-passwords.php") - less those that
    // appear as values in (the array returned by):-
    //      get_number2key_conversion_table()
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // WARNING!
    // ========
    // NEVER CHANGE THIS CODE (unless you know what you're doing).
    //
    // Or else you won't be able to reverse sequential keys already generated
    // back to their original numeric form (correctly).
    // -------------------------------------------------------------------------

    $conversion_table = get_number2key_conversion_table() ;

    // -------------------------------------------------------------------------

    $candidate_pad_chars = 'cdghkmnpvwxyz' ;
        //  The non-confusing lower case alpha chars.
        //  See "great-kiwi-passwords.php"

    // -------------------------------------------------------------------------

    $len = strlen( $candidate_pad_chars ) ;

    $pad_chars = '' ;

    for ( $i=0 ; $i<$len ; $i++ ) {
        $char = $candidate_pad_chars[$i] ;
        if ( ! in_array( $char , $conversion_table , TRUE ) ) {
            $pad_chars .= $char ;
        }
    }

    // -------------------------------------------------------------------------

    return $pad_chars ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// number2key()
// =============================================================================

function number2key( $in ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // number2key( $in )
    // - - - - - - - - - - -
    // Converts a "number" to a "key", by:-
    //
    //      1.  Replacing certain digits with lower case alpha characters, as
    //          follows:-
    //              '0' =>  'd'
    //              '1' =>  'n'
    //              '2' =>  '2'
    //              '3' =>  '3'
    //              '4' =>  '4'
    //              '5' =>  'p'
    //              '6' =>  'x'
    //              '7' =>  '7'
    //              '8' =>  'y'
    //              '9' =>  '9'
    //
    //          Where characters in the input string that aren't "0" to "9"
    //          are discarded.
    //
    //      2.  Padding the result out to:-
    //          o   Min 8 chars, and;
    //          o   An even multiple of 4 characters, then;
    //
    //      3.  Inserting "-" (dash/hyphen) characters every 4 characters.  Ie:-
    //              "12"           =>  "12"
    //              "1234"         =>  "1234"
    //              "12345"        =>  "1234-5"
    //              "1234567"      =>  "1234-567"
    //              "12345678901"  =>  "1234-5678-901"
    //              etc
    //
    // EXAMPLES:-
    //      "0"             =>  "dczv-mwhk"
    //      "10"            =>  "ndcg-wkzm"
    //      "100"           =>  "nddc-kmwh"
    //      "1000"          =>  "nddd-vkmw"
    //      "9150602"       =>  "9npd-xd2h"
    //      "566449429"     =>  "pxx4-4942-9vwm"
    //      "2143301808"    =>  "2n43-3dny-dykm"
    //      ...
    //
    // NOTES!
    // ======
    // 1.   If the input $number ISN'T a string, it's auto-converted to one.
    //
    // 2.   The input number/string can be any length.
    //
    // 3.   You can (losslessly) reverse the transformation with
    //      "key2number()".
    //
    // 4.   Because of the random padding characters used to pad the returned
    //      key out to an even multiple of 4 chars per block, converting
    //      the same number more than one can/should yield different results.
    //      Ie:-
    //          "12345"  =>  "n234-pkzm"
    //          "12345"  =>  "n234-pwgh"
    //          "12345"  =>  "n234-pwkz"
    //          "12345"  =>  "n234-pczg"
    //          "12345"  =>  "n234-pgzv"
    //          ...
    // -------------------------------------------------------------------------

    $conversion_table = get_number2key_conversion_table() ;

    // -------------------------------------------------------------------------

    $pad_chars = get_number2key_pad_chars() ;

    // -------------------------------------------------------------------------

    $pad_chars = str_shuffle( $pad_chars ) ;
        //  Add extra randomness

    // -------------------------------------------------------------------------

    $in = (string) $in ;
    $len = strlen( $in ) ;

    $out = '' ;

    // -------------------------------------------------------------------------

    for ( $i=0 ; $i<$len ; $i++ ) {
        $char = $in[$i] ;
        if ( array_key_exists( $char , $conversion_table ) ) {
            $out .= $conversion_table[ $char ] ;
        }
    }

    // -------------------------------------------------------------------------

    $pad_chars_temp = $pad_chars ;

    while ( strlen( $out ) < 8
            ||
            ( strlen( $out ) % 4 ) !== 0
        ) {
        if ( strlen( $pad_chars_temp ) <= 0 ) {
            $pad_chars_temp = $pad_chars ;
        }
        $index = mt_rand( 0 , strlen( $pad_chars_temp ) - 1 ) ;
        $char = substr(
                    $pad_chars_temp     ,
                    $index              ,
                    1
                    ) ;
        $out .= $char ;
        $pad_chars_temp = str_replace( $char , '' , $pad_chars_temp ) ;
    }

    // -------------------------------------------------------------------------

    $chunks = str_split( $out , 4 ) ;

    $out = implode( '-' , $chunks ) ;

    // -------------------------------------------------------------------------

    return $out ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// key2number()
// =============================================================================

function key2number( $in ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // key2number( $in )
    // - - - - - - - - - - -
    // Converts a "key" back to a "number", by:-
    //
    //      1.  Removing any "-" (dash/hyphen) characters.
    //
    //          Note!   All dash/hyphens are removed (whether they're every 4
    //                  characters or not.
    //
    //      2.  Replacing certain digits with lower case alpha characters, as
    //          follows:-
    //              'k' =>  '0'
    //              'n' =>  '1'
    //              '2' =>  '2'
    //              '3' =>  '3'
    //              '4' =>  '4'
    //              'x' =>  '5'
    //              'y' =>  '6'
    //              '7' =>  '7'
    //              'z' =>  '8'
    //              '9' =>  '9'
    //
    //          Where any characters in the input string that aren't one of
    //          those to be converted (back to digits), are discarded.
    //
    // NOTE!  If the input $number ISN'T a string, it's auto-converted to one.
    // -------------------------------------------------------------------------

    $in = (string) $in ;
    $len = strlen( $in ) ;
    $conversion_table = array_flip( get_number2key_conversion_table() ) ;
    $out = '' ;

    // -------------------------------------------------------------------------

    for ( $i=0 ; $i<$len ; $i++ ) {
        $char = $in[$i] ;
        if ( array_key_exists( $char , $conversion_table ) ) {
            $out .= $conversion_table[ $char ] ;
        }
    }

    // -------------------------------------------------------------------------

    return $out ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_new_sequential_id()
// =============================================================================

function get_new_sequential_id(
    $core_plugapp_dirs
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // get_new_sequential_id(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - -
    // Returns a new Ad Swapper sequential ID - in "key" format.  Eg:-
    //      "dczv-mwhk"
    //      "pxx4-4942-9vwm"
    //      ...
    //
    // RETURNS
    //      On SUCCESS
    //          $sid STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // get_new_sequential_record_id(
    //      $core_plugapp_dirs
    //      )
    // - - - - - - - - - - - - - - -
    // Returns a sequential ID in the range:-
    //      1 to 18,446,744,073,709,551,615 (= MySQL unsigned BIGINT max)
    //
    // RETURNS
    //      On SUCCESS
    //          $sequential_id STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $sid = get_new_sequential_record_id(
                $core_plugapp_dirs
                ) ;

    // -------------------------------------------------------------------------

    if ( is_array( $sid ) ) {
        return $sid ;
    }

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // number2key( $in )
    // - - - - - - - - - - -
    // Converts a "number" to a "key", by:-
    //
    //      1.  Replacing certain digits with lower case alpha characters, as
    //          follows:-
    //              '0' =>  'd'
    //              '1' =>  'n'
    //              '2' =>  '2'
    //              '3' =>  '3'
    //              '4' =>  '4'
    //              '5' =>  'p'
    //              '6' =>  'x'
    //              '7' =>  '7'
    //              '8' =>  'y'
    //              '9' =>  '9'
    //
    //          Where characters in the input string that aren't "0" to "9"
    //          are discarded.
    //
    //      2.  Padding the result out to:-
    //          o   Min 8 chars, and;
    //          o   An even multiple of 4 characters, then;
    //
    //      3.  Inserting "-" (dash/hyphen) characters every 4 characters.  Ie:-
    //              "12"           =>  "12"
    //              "1234"         =>  "1234"
    //              "12345"        =>  "1234-5"
    //              "1234567"      =>  "1234-567"
    //              "12345678901"  =>  "1234-5678-901"
    //              etc
    //
    // EXAMPLES:-
    //      "0"             =>  "dczv-mwhk"
    //      "10"            =>  "ndcg-wkzm"
    //      "100"           =>  "nddc-kmwh"
    //      "1000"          =>  "nddd-vkmw"
    //      "9150602"       =>  "9npd-xd2h"
    //      "566449429"     =>  "pxx4-4942-9vwm"
    //      "2143301808"    =>  "2n43-3dny-dykm"
    //      ...
    //
    // NOTES!
    // ======
    // 1.   If the input $number ISN'T a string, it's auto-converted to one.
    //
    // 2.   The input number/string can be any length.
    //
    // 3.   You can (losslessly) reverse the transformation with
    //      "key2number()".
    //
    // 4.   Because of the random padding characters used to pad the returned
    //      key out to an even multiple of 4 chars per block, converting
    //      the same number more than one can/should yield different results.
    //      Ie:-
    //          "12345"  =>  "n234-pkzm"
    //          "12345"  =>  "n234-pwgh"
    //          "12345"  =>  "n234-pwkz"
    //          "12345"  =>  "n234-pczg"
    //          "12345"  =>  "n234-pgzv"
    //          ...
    // -------------------------------------------------------------------------

    return number2key( $sid ) ;

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_new_sequential_id_thats_unique_in_dataset()
// =============================================================================

function get_new_sequential_id_thats_unique_in_dataset(
    $core_plugapp_dirs      ,
    $dataset_details        ,
    $max_attempts = 1
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // get_new_sequential_id_thats_unique_in_dataset(
    //      $core_plugapp_dirs      ,
    //      $dataset_details        ,
    //      $max_attempts = 1
    //      )
    // - - - - - - - - - - - - - - -
    // Returns a new Ad Swapper sequential ID - in "key" format.  Eg:-
    //      "dczv-mwhk"
    //      "pxx4-4942-9vwm"
    //      ...
    //
    // And checks that the returned SID is the only one for the given
    // dataset and field.  The routine will keep trying to find a unique
    // SID, up to the specified max number of attempts.
    //
    // $dataset_details can be either:-
    //
    //      $dataset_details = array(
    //          'dataset_title'     =>  "xxx"           ,
    //          'dataset_records'   =>  array(...)      ,
    //          'field_slug'        =>  xxx"
    //          )
    //
    //      (if the new SID must be unique in exactly one dataset)
    //
    // Or:-
    //
    //      $dataset_details = array(
    //          array(
    //              'dataset_title'     =>  "xxx"           ,
    //              'dataset_records'   =>  array(...)      ,
    //              'field_slug'        =>  xxx"
    //              )   ,
    //          ...
    //          array(
    //              'dataset_title'     =>  "xxx"           ,
    //              'dataset_records'   =>  array(...)      ,
    //              'field_slug'        =>  xxx"
    //              )
    //          )
    //
    //      (if the new SID must be unique in two or more datasets)
    //
    // RETURNS
    //      On SUCCESS
    //          $sid STRING
    //
    //      On FAILURE
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init.
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // =========================================================================
    // Convert the:-
    //
    //      $dataset_details = array(
    //          'dataset_title'     =>  "xxx"           ,
    //          'dataset_records'   =>  array(...)      ,
    //          'field_slug'        =>  xxx"
    //          )
    //
    // form to the:-
    //
    //      $dataset_details = array(
    //          array(
    //              'dataset_title'     =>  "xxx"           ,
    //              'dataset_records'   =>  array(...)      ,
    //              'field_slug'        =>  xxx"
    //              )   ,
    //          ...
    //          array(
    //              'dataset_title'     =>  "xxx"           ,
    //              'dataset_records'   =>  array(...)      ,
    //              'field_slug'        =>  xxx"
    //              )
    //          )
    //
    // form (so that from now on, we can process them both the same way).
    // =========================================================================

    if ( array_key_exists( 'dataset_title' , $dataset_details ) ) {

        $dataset_details = array(
            $dataset_details
            ) ;

    }

    // =========================================================================
    // Generate the:-
    //      'safe_dataset_title'
    //      'safe_field_slug'
    //
    // for all datasets...
    // =========================================================================

    foreach ( $dataset_details as $this_index => $this_dataset ) {

        $dataset_details[ $this_index ]['safe_dataset_title'] =
            htmlentities( $this_dataset['dataset_title'] )
            ;

        $dataset_details[ $this_index ]['safe_field_slug'] =
            htmlentities( $this_dataset['field_slug'] )
            ;

    }

    // =========================================================================
    // Search for the requested unique SID...
    // =========================================================================

    $number_attempts = 0 ;

    // -------------------------------------------------------------------------

    while ( TRUE ) {

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
        // get_new_sequential_id(
        //      $core_plugapp_dirs
        //      )
        // - - - - - - - - - - - -
        // Returns a new Ad Swapper sequential ID - in "key" format.  Eg:-
        //      "dczv-mwhk"
        //      "pxx4-4942-9vwm"
        //      ...
        //
        // RETURNS
        //      On SUCCESS
        //          $sid STRING
        //
        //      On FAILURE
        //          ARRAY( $error_message STRING )
        // -------------------------------------------------------------------------

        // =====================================================================
        // Make sure the page doesn't lock up (if we seem to be having
        // trouble generating a unique SID)...
        // =====================================================================

        if ( $number_attempts >= $max_attempts ) {

            //  TODO !!!
            //
            //  Send warning email to Ad Swapper Central admin.

            $msg = <<<EOT
PROBLEM:&nbsp; SID generation failure (can't find unique SID)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        // =====================================================================
        // Get a new SID...
        // =====================================================================

        $sid =
            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\get_new_sequential_id(
                $core_plugapp_dirs
                ) ;

        // -----------------------------------------------------------------

        if ( is_array( $sid ) ) {
            return $sid ;
        }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $sid , '$sid' ) ;

        // =====================================================================
        // Make sure that NO existing dataset record has this SID...
        //
        // NOTE!
        // =====
        // This should never happen - since the sequential ids are supposed
        // to be unique.  But just to be sure...
        // =====================================================================

        $sid_exists = FALSE ;

        // ---------------------------------------------------------------------

        foreach ( $dataset_details as $this_index => $this_dataset ) {

            // -----------------------------------------------------------------
            // Does the SID exist in this dataset ?
            // -----------------------------------------------------------------

            foreach ( $this_dataset['dataset_records'] as $this_record ) {

                // -------------------------------------------------------------

                if ( ! array_key_exists( $this_dataset['field_slug'] , $this_record ) ) {

                    $msg = <<<EOT
PROBLEM:&nbsp; SID generation failure (SID field "{$this_dataset['safe_field_slug']}" not found in dataset "{$this_dataset['safe_dataset_title']}" record)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    return array( $msg ) ;

                }

                // -------------------------------------------------------------

                if ( ! is_string( $this_record[ $this_dataset['field_slug'] ] ) ) {

                    $msg = <<<EOT
PROBLEM:&nbsp; SID generation failure (Bad SID field "{$this_dataset['safe_field_slug']}" in dataset "{$this_dataset['safe_dataset_title']}" record - string expected)
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    return array( $msg ) ;

                }

                // -------------------------------------------------------------

                if ( $this_record[ $this_dataset['field_slug'] ] === $sid ) {

                    $sid_exists = TRUE ;

                    //  TODO !!!
                    //
                    //  Send warning email to Ad Swapper Central admin.

                    break ;

                }

                // -------------------------------------------------------------

            }

            // -----------------------------------------------------------------
            // If the SID exists in this dataset, then DON'T search any more
            // datasets.  Instead, try another SID...
            // -----------------------------------------------------------------

            if ( $sid_exists ) {
                break ;
            }

            // -----------------------------------------------------------------

        }

        // ---------------------------------------------------------------------
        // If the SID DOESN'T exists (in any of the specified datasets), then
        // it's OK to use...
        // ---------------------------------------------------------------------

        if ( ! $sid_exists ) {
            break ;
        }

        // ---------------------------------------------------------------------
        // Otherwise, try another SID...
        // ---------------------------------------------------------------------

        $number_attempts++ ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return $sid ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// question_sequential_id()
// =============================================================================

function question_sequential_id(
    $candidate_sid
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_sequentialIdsSupport\
    // question_sequential_id(
    //      $candidate_sid
    //      )
    // - - - - - - - - - - - -
    // Determines whether or not $candidate_sid looks like a sequential ID
    // as generated by (eg):-
    //      get_new_sequential_id()
    //      get_new_sequential_id_thats_unique_in_dataset()
    //
    // or not.  And returns TRUE or FALSE accordingly.
    //
    // In other words, $candidate_sid must be something like (eg):-
    //      "dczv-mwhk"
    //      "9npd-xd2h"
    //      "pxx4-4942-9vwm"
    //      "2n43-3dny-dykm"
    //      etc...
    // -------------------------------------------------------------------------

    // =========================================================================
    // Must be non-empty string...
    // =========================================================================

    if (    ! is_string( $candidate_sid )
            ||
            trim( $candidate_sid ) === ''
        ) {
        return FALSE ;
    }

    // =========================================================================
    // Must be min 9 chars long.  Ie:-
    //      "1234-5678"
    // =========================================================================

    if ( strlen( $candidate_sid ) < 9 ) {
        return FALSE ;
    }

    // =========================================================================
    // Must 2 or more groups of 4 chars per group, separated by "-"...
    // =========================================================================

    $groups = explode( '-' , $candidate_sid ) ;

    // -------------------------------------------------------------------------

    if ( count( $groups ) < 2 ) {
        return FALSE ;
    }

    // -------------------------------------------------------------------------

    foreach ( $groups as $this_group ) {
        if ( strlen( $this_group ) !== 4 ) {
            return FALSE ;
        }
    }

    // =========================================================================
    // The chars that START the de-hyphenated input string must be values
    // from:-
    //      get_number2key_conversion_table()
    // =========================================================================

    $with_no_hyphens = str_replace( '-' , '' , $candidate_sid ) ;

    $len = strlen( $with_no_hyphens ) ;

    $conversion_table = get_number2key_conversion_table() ;

    $chars_left = $len ;

    // -------------------------------------------------------------------------

    for ( $i=0 ; $i<$len ; $i++ ) {

        if ( in_array( $with_no_hyphens[$i] , $conversion_table , TRUE ) ) {
            $chars_left-- ;

        } else {
            break ;

        }

    }

    // -------------------------------------------------------------------------

    if ( $chars_left === $len ) {
        return FALSE ;
            //  There must be at least ONE leading numeric digit
    }

    // -------------------------------------------------------------------------

    if ( $chars_left <= 0 ) {
        return TRUE ;
    }

    // =========================================================================
    // The remaining chars in the de-hyphenated input string must be values
    // from:-
    //      get_number2key_pad_chars()
    // =========================================================================

    $pad_chars = get_number2key_pad_chars() ;

    // -------------------------------------------------------------------------

    $pad_chars = str_split( $pad_chars ) ;

    // -------------------------------------------------------------------------

    $start_i = $len - $chars_left ;

    // -------------------------------------------------------------------------

    for ( $i=$start_i ; $i<$len ; $i++ ) {

        if ( ! in_array( $with_no_hyphens[$i] , $pad_chars , TRUE ) ) {
            return FALSE ;
        }

    }

    // =========================================================================
    // SUCCESS!
    // =========================================================================

    return TRUE ;

    // =========================================================================
    // That's that!
    // =========================================================================

}

// =============================================================================
// That's that!
// =============================================================================


<?php

// *****************************************************************************
// DATASET-MANAGER / GET-DATASET-URLS.PHP
// (C) 2014 Peter Newman. All Rights Reserved
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// get_manage_dataset_url()
// =============================================================================

function get_manage_dataset_url(
    $caller_apps_includes_dir   ,
    $question_front_end         ,
    $dataset_slug = NULL        ,
    $page_variant = NULL
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_manage_dataset_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $page_variant = NULL
    //      )
    // - - - - - - - - - - - - - - - - -
    // Returns the "manage-dataset" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If a STRING $page_variant slug is supplied, it's the CALLER's job to
    // ensure that it's defined.  In:-
    //      $selected_datasets_dmdd['dataset_records_table']['page_variants']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // DATASET_SLUG
    // =========================================================================

    if ( $dataset_slug === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['dataset_slug'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "dataset_slug"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_manage_dataset_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['dataset_slug'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_manage_dataset_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['dataset_slug'] )
                ||
                strlen( $_GET['dataset_slug'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (1 to 64 character "alphanumeric underscore dash" type string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_manage_dataset_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $dataset_slug = $_GET['dataset_slug'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // PAGE VARIANT ?
    // =========================================================================

    if (    ! is_string( $page_variant )
            ||
            trim( $page_variant ) === ''
            ||
            ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash(
                    $page_variant
                    )
        ) {
        $page_variant = '' ;
    }

    // =========================================================================
    // CREATE/RETURN the URL...
    // =========================================================================

    if ( $question_front_end ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_query_adjusted_current_page_url(
        //      $query_changes = array()        ,
        //      $question_amp = FALSE           ,
        //      $question_die_on_error = FALSE
        //      ) ;
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.
        //
        // If successful, returns the URL with the query part adjusted as
        // requested.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          -----------
        //          $query_adjusted_current_page_url STRING
        //
        //      o   On FAILURE!
        //          -----------
        //          If $question_die_on_error = TRUE
        //              Doesn't return
        //          If $question_die_on_error = FALSE
        //              array( $error_message STRING )
        // -------------------------------------------------------------------------

        $query_changes = array(
                            'action'        =>  'manage-dataset'    ,
                            'dataset_slug'  =>  $dataset_slug       ,
                            'record_key'    =>  NULL
                            ) ;

        if ( $page_variant !== '' ) {
            $query_changes['pv'] = $page_variant ;
        }

        $question_amp = FALSE ;

        $question_die_on_error = FALSE ;

        return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes              ,
                    $question_amp               ,
                    $question_die_on_error
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $application = '&application=' . $_GET['application'] ;

        } else {
            $application = '' ;

        }

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'page' , $_GET ) ) {
            $page = $_GET['page'] ;

        } else {
            $page = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_page_query_variable_value() ;

        }

        // ---------------------------------------------------------------------

        if ( $page_variant !== '' ) {
            $page_variant = '&pv=' . urlencode( $page_variant ) ;
        }

        // ---------------------------------------------------------------------

        return \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=manage-dataset{$application}&dataset_slug={$dataset_slug}{$page_variant}
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_add_record_url(
// =============================================================================

function get_add_record_url(
    $caller_apps_includes_dir   ,
    $question_front_end         ,
    $dataset_slug = NULL        ,
    $view_title = FALSE         ,
    $return_to = FALSE          ,
    $view_slug = FALSE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_add_record_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $view_title = FALSE         ,
    //      $return_to = FALSE          ,
    //      $view_slug = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the "add-record" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // DATASET_SLUG
    // =========================================================================

    if ( $dataset_slug === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['dataset_slug'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "dataset_slug"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_add_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['dataset_slug'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_add_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['dataset_slug'] )
                ||
                strlen( $_GET['dataset_slug'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (1 to 64 character "alphanumeric underscore dash" type string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_add_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $dataset_slug = $_GET['dataset_slug'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // CREATE/RETURN the URL...
    // =========================================================================

    if ( $question_front_end ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_query_adjusted_current_page_url(
        //      $query_changes = array()        ,
        //      $question_amp = FALSE           ,
        //      $question_die_on_error = FALSE
        //      ) ;
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.
        //
        // If successful, returns the URL with the query part adjusted as
        // requested.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          -----------
        //          $query_adjusted_current_page_url STRING
        //
        //      o   On FAILURE!
        //          -----------
        //          If $question_die_on_error = TRUE
        //              Doesn't return
        //          If $question_die_on_error = FALSE
        //              array( $error_message STRING )
        // -------------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $query_changes = array(
                                'action'        =>  'add-record'        ,
                                'dataset_slug'  =>  $dataset_slug       ,
                                'return_to'     =>  $return_to          ,
                                'view_slug'     =>  $view_slug
                                ) ;

            if ( is_string( $view_title ) ) {
                $query_changes['view_title'] = $view_title ;
            }

        } else {

            $query_changes = array(
                                'action'        =>  'add-record'        ,
                                'dataset_slug'  =>  $dataset_slug
                                ) ;

        }

        $question_amp = FALSE ;

        $question_die_on_error = FALSE ;

        return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes              ,
                    $question_amp               ,
                    $question_die_on_error
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $application = '&application=' . $_GET['application'] ;

        } else {
            $application = '' ;

        }

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'page' , $_GET ) ) {
            $page = $_GET['page'] ;

        } else {
            $page = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_page_query_variable_value() ;

        }

        // ---------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $url = \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=add-record{$application}&dataset_slug={$dataset_slug}&return_to={$return_to}&view_slug={$view_slug}
EOT;

            if ( is_string( $view_title ) ) {
                $url .= '&view_title=' . $view_title ;
            }

            return $url ;

        } else {

            return \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=add-record{$application}&dataset_slug={$dataset_slug}
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_edit_record_url()
// =============================================================================

function get_edit_record_url(
    $caller_apps_includes_dir   ,
    $question_front_end         ,
    $dataset_slug = NULL        ,
    $record_key = NULL          ,
    $view_title = FALSE         ,
    $return_to = FALSE          ,
    $view_slug = FALSE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_edit_record_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $record_key = NULL          ,
    //      $view_title = FALSE         ,
    //      $return_to = FALSE          ,
    //      $view_slug = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the "edit-record" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If $record_key is NULL, then we use:-
    //      $_GET['record_key']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // DATASET_SLUG
    // =========================================================================

    if ( $dataset_slug === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['dataset_slug'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "dataset_slug"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_edit_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['dataset_slug'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_edit_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['dataset_slug'] )
                ||
                strlen( $_GET['dataset_slug'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (1 to 64 character "alphanumeric underscore dash" type string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_edit_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $dataset_slug = $_GET['dataset_slug'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // RECORD_KEY
    // =========================================================================

    if ( $record_key === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['record_key'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "record_key"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_edit_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['record_key'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_edit_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! ctype_alnum( $_GET['record_key'] )
                ||
                strlen( $_GET['record_key'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key" (1 to 64 character alphanuimeric string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_edit_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $record_key = $_GET['record_key'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // CREATE/RETURN the URL...
    // =========================================================================

    if ( $question_front_end ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_query_adjusted_current_page_url(
        //      $query_changes = array()        ,
        //      $question_amp = FALSE           ,
        //      $question_die_on_error = FALSE
        //      ) ;
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.
        //
        // If successful, returns the URL with the query part adjusted as
        // requested.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          -----------
        //          $query_adjusted_current_page_url STRING
        //
        //      o   On FAILURE!
        //          -----------
        //          If $question_die_on_error = TRUE
        //              Doesn't return
        //          If $question_die_on_error = FALSE
        //              array( $error_message STRING )
        // -------------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $query_changes = array(
                                'action'        =>  'edit-record'       ,
                                'dataset_slug'  =>  $dataset_slug       ,
                                'record_key'    =>  $record_key         ,
                                'return_to'     =>  $return_to          ,
                                'view_slug'     =>  $view_slug
                                ) ;

            if ( is_string( $view_title ) ) {
                $query_changes['view_title'] = $view_title ;
            }

        } else {

            $query_changes = array(
                                'action'        =>  'edit-record'       ,
                                'dataset_slug'  =>  $dataset_slug       ,
                                'record_key'    =>  $record_key
                                ) ;

        }

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $query_changes['application'] = $_GET['application'] ;

        } else {
            $query_changes['application'] = NULL ;

        }

        // ---------------------------------------------------------------------

        $question_amp = FALSE ;

        $question_die_on_error = FALSE ;

        return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes              ,
                    $question_amp               ,
                    $question_die_on_error
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $application = '&application=' . $_GET['application'] ;

        } else {
            $application = '' ;

        }

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'page' , $_GET ) ) {
            $page = $_GET['page'] ;

        } else {
            $page = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_page_query_variable_value() ;

        }

        // ---------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $url = \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=edit-record{$application}&dataset_slug={$dataset_slug}&record_key={$record_key}&return_to={$return_to}&view_slug={$view_slug}
EOT;

            if ( is_string( $view_title ) ) {
                $url .= '&view_title=' . $view_title ;
            }

            return $url ;

        } else {

            return \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=edit-record{$application}&dataset_slug={$dataset_slug}&record_key={$record_key}
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_delete_record_url()
// =============================================================================

function get_delete_record_url(
    $caller_apps_includes_dir   ,
    $question_front_end         ,
    $dataset_slug = NULL        ,
    $record_key = NULL          ,
    $view_title = FALSE         ,
    $return_to = FALSE          ,
    $view_slug = FALSE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_delete_record_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $record_key = NULL          ,
    //      $view_title = FALSE         ,
    //      $return_to = FALSE          ,
    //      $view_slug = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the "delete-record" URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If $record_key:-
    //
    //      o   Is NULL, then we use:-
    //              $_GET['record_key']
    //
    //          (if it's valid)
    //
    //      o   Is "all", then we're deleting ALL the dataset's records.
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // DATASET_SLUG
    // =========================================================================

    if ( $dataset_slug === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['dataset_slug'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "dataset_slug"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_delete_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['dataset_slug'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_delete_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['dataset_slug'] )
                ||
                strlen( $_GET['dataset_slug'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (1 to 64 character "alphanumeric underscore dash" type string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_delete_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $dataset_slug = $_GET['dataset_slug'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // RECORD_KEY
    // =========================================================================

    if ( $record_key === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['record_key'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "record_key"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_delete_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['record_key'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_delete_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! ctype_alnum( $_GET['record_key'] )
                ||
                strlen( $_GET['record_key'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key" (1 to 64 character alphanuimeric string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_delete_record_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $record_key = $_GET['record_key'] ;

        // ---------------------------------------------------------------------

    } elseif ( $record_key === 'all' ) {

        // ---------------------------------------------------------------------

        $record_key = '*a*l*l*' ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // CREATE/RETURN the URL...
    // =========================================================================

    if ( $question_front_end ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_query_adjusted_current_page_url(
        //      $query_changes = array()        ,
        //      $question_amp = FALSE           ,
        //      $question_die_on_error = FALSE
        //      ) ;
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.
        //
        // If successful, returns the URL with the query part adjusted as
        // requested.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          -----------
        //          $query_adjusted_current_page_url STRING
        //
        //      o   On FAILURE!
        //          -----------
        //          If $question_die_on_error = TRUE
        //              Doesn't return
        //          If $question_die_on_error = FALSE
        //              array( $error_message STRING )
        // -------------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $query_changes = array(
                                'action'        =>  'delete-record'     ,
                                'dataset_slug'  =>  $dataset_slug       ,
                                'record_key'    =>  $record_key         ,
                                'return_to'     =>  $return_to          ,
                                'view_slug'     =>  $view_slug
                                ) ;

            if ( is_string( $view_title ) ) {
                $query_changes['view_title'] = $view_title ;
            }

        } else {

            $query_changes = array(
                                'action'        =>  'edit-record'       ,
                                'dataset_slug'  =>  $dataset_slug       ,
                                'record_key'    =>  $record_key
                                ) ;

        }

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $query_changes['application'] = $_GET['application'] ;

        } else {
            $query_changes['application'] = NULL ;

        }

        // ---------------------------------------------------------------------

        $question_amp = FALSE ;

        $question_die_on_error = FALSE ;

        return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes              ,
                    $question_amp               ,
                    $question_die_on_error
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $application = '&application=' . $_GET['application'] ;

        } else {
            $application = '' ;

        }

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'page' , $_GET ) ) {
            $page = $_GET['page'] ;

        } else {
            $page = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_page_query_variable_value() ;

        }

        // ---------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $url = \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=delete-record{$application}&dataset_slug={$dataset_slug}&record_key={$record_key}&return_to={$return_to}&view_slug={$view_slug}
EOT;

            if ( is_string( $view_title ) ) {
                $url .= '&view_title=' . $view_title ;
            }

            return $url ;

        } else {

            return \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=delete-record{$application}&dataset_slug={$dataset_slug}&record_key={$record_key}
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_custom_record_action_url()
// =============================================================================

function get_custom_record_action_url(
    $caller_apps_includes_dir   ,
    $question_front_end         ,
    $dataset_slug = NULL        ,
    $action_slug = NULL         ,
    $record_key = NULL          ,
    $view_title = FALSE         ,
    $return_to = FALSE          ,
    $view_slug = FALSE
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_custom_record_action_url(
    //      $caller_apps_includes_dir   ,
    //      $question_front_end         ,
    //      $dataset_slug = NULL        ,
    //      $action_slug = NULL         ,
    //      $record_key = NULL          ,
    //      $view_title = FALSE         ,
    //      $return_to = FALSE          ,
    //      $view_slug = FALSE
    //      )
    // - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // Returns the specififed CUSTOM RECORD ACTION URL.
    //
    // If $dataset_slug is NULL, then we use:-
    //      $_GET['dataset_slug']
    //
    // If $action_slug is NULL, then we use:-
    //      $_GET['action_slug']
    //
    // If $record_key is NULL, then we use:-
    //      $_GET['record_key']
    //
    // RETURNS
    //      o   On SUCCESS!
    //          - - - - - -
    //          STRING $url
    //
    //      o   On FAILURE!
    //          - - - - - -
    //          ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    // =========================================================================
    // DATASET_SLUG
    // =========================================================================

    if ( $dataset_slug === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['dataset_slug'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "dataset_slug"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['dataset_slug'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['dataset_slug'] )
                ||
                strlen( $_GET['dataset_slug'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "dataset_slug" (1 to 64 character "alphanumeric underscore dash" type string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $dataset_slug = $_GET['dataset_slug'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // ACTION_SLUG
    // =========================================================================

    if ( $action_slug === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['action_slug'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "action_slug"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    trim( $_GET['action_slug'] ) === ''
                ||
                strlen( $_GET['action_slug'] ) > 64
                ||
                ! \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['action_slug'] )
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "action_slug" (1 to 64 character "alphanumeric underscore dash" type string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $action_slug = $_GET['action_slug'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // RECORD_KEY
    // =========================================================================

    if ( $record_key === NULL ) {

        // ---------------------------------------------------------------------

        if ( ! isset( $_GET['record_key'] ) ) {

            $msg = <<<EOT
PROBLEM:&nbsp; No "record_key"
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if ( trim( $_GET['record_key'] ) === '' ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key" (blank/empty string)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        if (    ! ctype_alnum( $_GET['record_key'] )
                ||
                strlen( $_GET['record_key'] ) > 64
            ) {

            $msg = <<<EOT
PROBLEM:&nbsp; Bad "record_key" (1 to 64 character alphanuimeric string expected)
Detected in:&nbsp; \\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\\get_custom_record_action_url()
EOT;

            return array( $msg ) ;

        }

        // ---------------------------------------------------------------------

        $record_key = $_GET['record_key'] ;

        // ---------------------------------------------------------------------

    }

    // =========================================================================
    // CREATE/RETURN the URL...
    // =========================================================================

    if ( $question_front_end ) {

        // ---------------------------------------------------------------------

        require_once( $caller_apps_includes_dir . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_query_adjusted_current_page_url(
        //      $query_changes = array()        ,
        //      $question_amp = FALSE           ,
        //      $question_die_on_error = FALSE
        //      ) ;
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.
        //
        // If successful, returns the URL with the query part adjusted as
        // requested.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          -----------
        //          $query_adjusted_current_page_url STRING
        //
        //      o   On FAILURE!
        //          -----------
        //          If $question_die_on_error = TRUE
        //              Doesn't return
        //          If $question_die_on_error = FALSE
        //              array( $error_message STRING )
        // -------------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $query_changes = array(
                                'action'        =>  'custom'            ,
                                'dataset_slug'  =>  $dataset_slug       ,
                                'action_slug'   =>  $action_slug        ,
                                'record_key'    =>  $record_key         ,
                                'return_to'     =>  $return_to          ,
                                'view_slug'     =>  $view_slug
                                ) ;

            if ( is_string( $view_title ) ) {
                $query_changes['view_title'] = $view_title ;
            }

        } else {

            $query_changes = array(
                                'action'        =>  'custom'            ,
                                'dataset_slug'  =>  $dataset_slug       ,
                                'action_slug'   =>  $action_slug        ,
                                'record_key'    =>  $record_key
                                ) ;

        }

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $query_changes['application'] = $_GET['application'] ;

        } else {
            $query_changes['application'] = NULL ;

        }

        // ---------------------------------------------------------------------

        $question_amp = FALSE ;

        $question_die_on_error = FALSE ;

        return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes              ,
                    $question_amp               ,
                    $question_die_on_error
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        if (    isset( $_GET['application'] )
                &&
                trim( $_GET['application'] ) !== ''
                &&
                strlen( $_GET['application'] ) <= 64
                &&
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\ctype_alphanumeric_underscore_dash( $_GET['application'] )
            ) {
            $application = '&application=' . $_GET['application'] ;

        } else {
            $application = '' ;

        }

        // ---------------------------------------------------------------------

        if ( array_key_exists( 'page' , $_GET ) ) {
            $page = $_GET['page'] ;

        } else {
            $page = \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_page_query_variable_value() ;

        }

        // ---------------------------------------------------------------------

        if (    is_string( $return_to )
                &&
                trim( $return_to ) !== ''
                &&
                is_string( $view_slug )
                &&
                trim( $view_slug ) !== ''
            ) {

            $url = \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=custom&action_slug={$action_slug}{$application}&dataset_slug={$dataset_slug}&record_key={$record_key}&return_to={$return_to}&view_slug={$view_slug}
EOT;

            if ( is_string( $view_title ) ) {
                $url .= '&view_title=' . $view_title ;
            }

            return $url ;

        } else {

            return \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page}&action=custom&action_slug={$action_slug}{$application}&dataset_slug={$dataset_slug}&record_key={$record_key}
EOT;

        }

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}

// =============================================================================
// get_custom_page_url()
// =============================================================================

function get_custom_page_url(
    $core_plugapp_dirs          ,
    $page_slug        = NULL    ,
    $application_slug = NULL    ,
    $custom_page_slug = NULL    ,
    $question_front_end
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // get_custom_page_url(
    //      $core_plugapp_dirs          ,
    //      $page_slug        = NULL    ,
    //      $application_slug = NULL    ,
    //      $custom_page_slug = NULL    ,
    //      $question_front_end
    //      )
    // - - - - - - - - - - - - - - - - -
    // Creates and returns the URL for the specified "custom page".
    //
    // NOTE!
    // =====
    // 1.   A "custom page" is defined in the plugin/app's:-
    //          .../app-defs/<application-slug>.app/plugin.stuff/custom.pages/<custom-page-slug>.cp/
    //      directory.
    //
    // 2.   If:-
    //          $page_slug === NULL
    //      then we look for the page slug in:-
    //          $_GET['page']
    //      (and it's a FATAL error if that GET variable doesn't exist).
    //
    // 3.   If:-
    //          $application_slug === NULL
    //      then we look for the application slug in:-
    //          $_GET['application']
    //      (and it's a FATAL error if that GET variable doesn't exist).
    //
    // 4.   If:-
    //          $custom_page_slug === NULL
    //      then we look for the custom page slug in:-
    //          $_GET['custom_page']
    //      (and it's a FATAL error if that GET variable doesn't exist).
    //
    // RETURNS
    //      o   On SUCCESS
    //              $url STRING
    //
    //      o   On FAILURE
    //              ARRAY( $error_message STRING )
    // -------------------------------------------------------------------------

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if (    ! is_string( $page_slug )
            ||
            trim( $page_slug ) === ''
        ) {

        if (    array_key_exists( 'page' , $_GET )
                &&
                is_string( $_GET['page'] )
                &&
                trim( $_GET['page'] ) !== ''
            ) {

            $page_slug = $_GET['page'] ;

        } else {

            $page_slug =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_appsAPI\get_page_query_variable_value() ;

        }

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $application_slug )
            ||
            trim( $application_slug ) === ''
        ) {

        if (    ! array_key_exists( 'application' , $_GET )
                ||
                ! is_string( $_GET['application'] )
                ||
                trim( $_GET['application'] ) === ''
            ) {

            $msg = <<<EOT
PROBLEM creating custom page URL:&nbsp; No "application"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        $application_slug = $_GET['application'] ;

    }

    // -------------------------------------------------------------------------

    if (    ! is_string( $custom_page_slug )
            ||
            trim( $custom_page_slug ) === ''
        ) {

        if (    ! array_key_exists( 'custom_page' , $_GET )
                ||
                ! is_string( $_GET['custom_page'] )
                ||
                trim( $_GET['custom_page'] ) === ''
            ) {

            $msg = <<<EOT
PROBLEM creating custom page URL:&nbsp; No "custom_page"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            return array( $msg ) ;

        }

        $custom_page_slug = $_GET['custom_page'] ;

    }

    // -------------------------------------------------------------------------

    if ( $question_front_end ) {

        // ---------------------------------------------------------------------

        require_once( $core_plugapp_dirs['plugins_includes_dir'] . '/url-utils.php' ) ;

        // -------------------------------------------------------------------------
        // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\
        // get_query_adjusted_current_page_url(
        //      $query_changes = array()        ,
        //      $question_amp = FALSE           ,
        //      $question_die_on_error = FALSE
        //      ) ;
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Attempts to retrieve the current page URL from $_SERVER.
        //
        // If successful, returns the URL with the query part adjusted as
        // requested.
        //
        // RETURNS
        //      o   On SUCCESS!
        //          -----------
        //          $query_adjusted_current_page_url STRING
        //
        //      o   On FAILURE!
        //          -----------
        //          If $question_die_on_error = TRUE
        //              Doesn't return
        //          If $question_die_on_error = FALSE
        //              array( $error_message STRING )
        // -------------------------------------------------------------------------

        $query_changes = array(
                            'page'          =>  $page_slug              ,
                            'action'        =>  'custom-page'           ,
                            'application'   =>  $application_slug       ,
                            'custom_page'   =>  $custom_page_slug
                            ) ;

        $question_amp = FALSE ;

        $question_die_on_error = FALSE ;

        return \greatKiwi_byFernTec_adSwapper_local_v0x1x211_urlUtils\get_query_adjusted_current_page_url(
                    $query_changes              ,
                    $question_amp               ,
                    $question_die_on_error
                    ) ;

        // ---------------------------------------------------------------------

    } else {

        // ---------------------------------------------------------------------

        return \untrailingslashit( \admin_url() ) . <<<EOT
/admin.php?page={$page_slug}&action=custom-page&application={$application_slug}&custom_page={$custom_page_slug}
EOT;

        // ---------------------------------------------------------------------

    }

    // -------------------------------------------------------------------------

}

// =============================================================================
// That's that!
// =============================================================================


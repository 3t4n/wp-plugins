<?php
// *****************************************************************************
// VALIDATA / FIELD-DEFS-4-AD-SWAPPER-LOCAL-AD-SLOT-SUBMISSIONS.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************
$field_defs_4_ad_swapper_local_ad_slot_submissions = array (
  0 => 
  array (
    'created_server_datetime_utc' => 1442905700,
    'last_modified_server_datetime_utc' => 1442905700,
    'key' => '104f0dd4-f234-41da-bad9-fb5b4a9ccb97-1442905700-511634-4901',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'question_disabled',
    'question_required' => false,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => '1',
      ),
      1 => false,
    ),
    'sequence_number' => '010',
  ),
  1 => 
  array (
    'created_server_datetime_utc' => 1442906180,
    'last_modified_server_datetime_utc' => 1442906180,
    'key' => '24139e78-583d-4aa9-a422-372c4face060-1442906180-935815-4902',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'name',
    'question_required' => true,
    'function_name' => 'dashed_name_string__default__questionemptyok',
    'args' => 
    array (
      0 => false,
    ),
    'sequence_number' => '020',
  ),
  2 => 
  array (
    'created_server_datetime_utc' => 1442909486,
    'last_modified_server_datetime_utc' => 1442909486,
    'key' => 'ca786ca1-1e50-4143-bcd0-4be62d9a4c5e-1442909486-373877-4903',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'title',
    'question_required' => true,
    'function_name' => 'general_title_string__mixedcase_notags_minlen1_maxlen255__questionemptyok',
    'args' => 
    array (
      0 => false,
    ),
    'sequence_number' => '030',
  ),
  3 => 
  array (
    'created_server_datetime_utc' => 1442909533,
    'last_modified_server_datetime_utc' => 1442909533,
    'key' => '3ebfab1e-c7c4-42a2-ac9e-2155c0c2e9e0-1442909533-844712-4904',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'description',
    'question_required' => true,
    'function_name' => 'general_text_string__mixedcase_notags_minlen1_maxlen65535__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '040',
  ),
  4 => 
  array (
    'created_server_datetime_utc' => 1442909661,
    'last_modified_server_datetime_utc' => 1442909661,
    'key' => 'b7f03231-9015-42cb-89b1-d5523c6837f9-1442909661-192979-4905',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sequence_number',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 8,
      2 => true,
      3 => 0,
      4 => 99999999,
    ),
    'sequence_number' => '050',
  ),
  5 => 
  array (
    'created_server_datetime_utc' => 1442909797,
    'last_modified_server_datetime_utc' => 1442909797,
    'key' => '2953053b-c996-45ea-a01c-a94d57e89b01-1442909797-110476-4906',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'type',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'fixed-height-banner',
        1 => 'flexi-height-banner',
        2 => 'sidebar',
        3 => 'fixed-row-height-grid',
        4 => 'newspaper-style-grid',
      ),
      1 => false,
    ),
    'sequence_number' => '060',
  ),
  6 => 
  array (
    'created_server_datetime_utc' => 1442910767,
    'last_modified_server_datetime_utc' => 1442910767,
    'key' => 'f678a70c-e4d5-4797-b573-4e618f054bcf-1442910767-403919-4907',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_outer_width_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => false,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '100',
  ),
  7 => 
  array (
    'created_server_datetime_utc' => 1442910807,
    'last_modified_server_datetime_utc' => 1442910807,
    'key' => 'fe5ab403-4ed4-4b6d-baf3-383e935aa882-1442910807-907981-4908',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_outer_height_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => false,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '110',
  ),
  8 => 
  array (
    'created_server_datetime_utc' => 1442910863,
    'last_modified_server_datetime_utc' => 1442910863,
    'key' => '62f81938-cafe-453a-b853-9758c4769af1-1442910863-855316-4909',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_top_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => true,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '120',
  ),
  9 => 
  array (
    'created_server_datetime_utc' => 1442910976,
    'last_modified_server_datetime_utc' => 1442910976,
    'key' => '4e311ce7-4773-47d6-bdc6-662fd7b0c151-1442910976-210929-4910',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_bottom_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => true,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '130',
  ),
  10 => 
  array (
    'created_server_datetime_utc' => 1442911021,
    'last_modified_server_datetime_utc' => 1442911021,
    'key' => 'eaef1049-bd54-4e73-8077-2d021dbb4418-1442911021-399868-4911',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_left_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => true,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '140',
  ),
  11 => 
  array (
    'created_server_datetime_utc' => 1442911065,
    'last_modified_server_datetime_utc' => 1442911065,
    'key' => 'e0c0f9b6-5b21-4058-964f-ebdd5f193e0f-1442911065-336677-4912',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_right_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => true,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '150',
  ),
  12 => 
  array (
    'created_server_datetime_utc' => 1442911517,
    'last_modified_server_datetime_utc' => 1442911517,
    'key' => 'a1764813-900e-497b-9b7a-b5d52d96bd56-1442911517-511283-4913',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_colour_top',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '160',
  ),
  13 => 
  array (
    'created_server_datetime_utc' => 1442911573,
    'last_modified_server_datetime_utc' => 1442911573,
    'key' => '975d2211-4cb1-405a-a01e-3a73402e7118-1442911573-834528-4914',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_colour_bottom',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '170',
  ),
  14 => 
  array (
    'created_server_datetime_utc' => 1442911620,
    'last_modified_server_datetime_utc' => 1442911620,
    'key' => 'dd6b0a4d-1f63-4a03-a20d-ef891be5093d-1442911620-647136-4915',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_colour_left',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '180',
  ),
  15 => 
  array (
    'created_server_datetime_utc' => 1442911655,
    'last_modified_server_datetime_utc' => 1442911655,
    'key' => 'f4398f36-a187-49ac-b818-0e75fd7c2cf7-1442911655-552764-4916',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'border_colour_right',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '190',
  ),
  16 => 
  array (
    'created_server_datetime_utc' => 1442912841,
    'last_modified_server_datetime_utc' => 1442912841,
    'key' => 'e9c47e0f-12ff-4284-85e6-ff087972644a-1442912841-834124-4917',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_fit_or_shrink',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'none',
        1 => 'fit',
        2 => 'shrink',
      ),
      1 => true,
    ),
    'sequence_number' => '200',
  ),
  17 => 
  array (
    'created_server_datetime_utc' => 1442912916,
    'last_modified_server_datetime_utc' => 1442912916,
    'key' => '55bf72dc-7901-4f15-bc6b-1c277b55d408-1442912916-611791-4918',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_halign',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'left',
        1 => 'center',
        2 => 'right',
      ),
      1 => true,
    ),
    'sequence_number' => '210',
  ),
  18 => 
  array (
    'created_server_datetime_utc' => 1442912984,
    'last_modified_server_datetime_utc' => 1442912984,
    'key' => '787c3da9-9e7d-429b-bc2b-ea953632b6ff-1442912984-161402-4919',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_valign',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'top',
        1 => 'middle',
        2 => 'bottom',
      ),
      1 => true,
    ),
    'sequence_number' => '220',
  ),
  19 => 
  array (
    'created_server_datetime_utc' => 1442913053,
    'last_modified_server_datetime_utc' => 1442913053,
    'key' => '3230ebf9-ede1-4107-a3ee-9a494bef7efe-1442913053-643983-4920',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_undercolour',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '230',
  ),
  20 => 
  array (
    'created_server_datetime_utc' => 1442913400,
    'last_modified_server_datetime_utc' => 1442913400,
    'key' => '9eca6106-bc66-4fad-9752-b4d2147e3f9e-1442913400-998153-4921',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_min_ad_aspect_ratio',
    'question_required' => true,
    'function_name' => 'floating_point_string__min_max_maxlen_signchars_pointchars_questionemptyok',
    'args' => 
    array (
      0 => 0.1,
      1 => 99,
      2 => 'default',
      3 => '',
      4 => '.',
      5 => true,
    ),
    'sequence_number' => '240',
  ),
  21 => 
  array (
    'created_server_datetime_utc' => 1442913517,
    'last_modified_server_datetime_utc' => 1442913517,
    'key' => '3bcb7085-be52-4bea-8e8f-2b782b21df9f-1442913517-878370-4922',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_min_resized_ad_width_percent',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 3,
      2 => true,
      3 => 0,
      4 => 100,
    ),
    'sequence_number' => '250',
  ),
  22 => 
  array (
    'created_server_datetime_utc' => 1442913604,
    'last_modified_server_datetime_utc' => 1442913604,
    'key' => '1ac620dc-93ca-4a9e-997f-0cbf47cab981-1442913604-885793-4923',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_height_banner_extra_style',
    'question_required' => true,
    'function_name' => 'general_text_string__mixedcase_notags_minlen1_maxlen65535__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '260',
  ),
  23 => 
  array (
    'created_server_datetime_utc' => 1443235862,
    'last_modified_server_datetime_utc' => 1443235862,
    'key' => 'a9ef875a-b89f-4515-a5d8-243f13651e4a-1443235862-473336-4972',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_outer_width_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 8,
      2 => false,
      3 => 0,
      4 => 99999999,
    ),
    'sequence_number' => '300',
  ),
  24 => 
  array (
    'created_server_datetime_utc' => 1443235976,
    'last_modified_server_datetime_utc' => 1443235976,
    'key' => '99cdd221-1329-45ad-a461-f85688435dcd-1443235976-257304-4973',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_outer_max_height_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 8,
      2 => true,
      3 => 0,
      4 => 99999999,
    ),
    'sequence_number' => '310',
  ),
  25 => 
  array (
    'created_server_datetime_utc' => 1443236042,
    'last_modified_server_datetime_utc' => 1443236042,
    'key' => '5c2910a4-d0bf-40cd-bbbf-fff564ec3224-1443236042-678336-4974',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_max_ads',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => true,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '320',
  ),
  26 => 
  array (
    'created_server_datetime_utc' => 1443240211,
    'last_modified_server_datetime_utc' => 1443240211,
    'key' => 'bf09bf6d-2b47-4890-a42f-f197f9ae1425-1443240211-944097-4983',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_gap_height_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => true,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '410',
  ),
  27 => 
  array (
    'created_server_datetime_utc' => 1443240276,
    'last_modified_server_datetime_utc' => 1443240276,
    'key' => '14c34f56-d93b-4874-84eb-1855a2c9280d-1443240276-671877-4984',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_gap_colour',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '420',
  ),
  28 => 
  array (
    'created_server_datetime_utc' => 1443240452,
    'last_modified_server_datetime_utc' => 1443240452,
    'key' => 'd04e10f0-5ef5-4df4-868e-efe05cdf2948-1443240452-605733-4985',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_fit_start_height_div_width',
    'question_required' => true,
    'function_name' => 'floating_point_string__min_max_maxlen_signchars_pointchars_questionemptyok',
    'args' => 
    array (
      0 => 0,
      1 => 9999,
      2 => 'default',
      3 => '',
      4 => '.',
      5 => true,
    ),
    'sequence_number' => '430',
  ),
  29 => 
  array (
    'created_server_datetime_utc' => 1443240564,
    'last_modified_server_datetime_utc' => 1443240564,
    'key' => 'c0ff1d5e-b6d9-4e18-b7e4-8c15fe4879ea-1443240564-13445-4986',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_fit_end_discard_start_height_div_width',
    'question_required' => true,
    'function_name' => 'floating_point_string__min_max_maxlen_signchars_pointchars_questionemptyok',
    'args' => 
    array (
      0 => 0,
      1 => 9999,
      2 => 'default',
      3 => '',
      4 => '.',
      5 => true,
    ),
    'sequence_number' => '440',
  ),
  30 => 
  array (
    'created_server_datetime_utc' => 1443240659,
    'last_modified_server_datetime_utc' => 1443240659,
    'key' => 'a65d8260-4445-4446-9a30-118db8379108-1443240659-576817-4987',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'sidebar_extra_style',
    'question_required' => true,
    'function_name' => 'general_text_string__mixedcase_notags_minlen1_maxlen65535__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '450',
  ),
  31 => 
  array (
    'created_server_datetime_utc' => 1443850100,
    'last_modified_server_datetime_utc' => 1443850100,
    'key' => '21677802-a287-45ab-b2b7-294605cc28a4-1443850100-182256-5025',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_outer_width_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 4,
      2 => false,
      3 => 0,
      4 => 9999,
    ),
    'sequence_number' => '500',
  ),
  32 => 
  array (
    'created_server_datetime_utc' => 1443850216,
    'last_modified_server_datetime_utc' => 1443850216,
    'key' => 'd9a35000-c8b8-44bd-9339-94a746e1a378-1443850216-83906-5026',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_number_rows',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 2,
      2 => true,
      3 => 1,
      4 => 99,
    ),
    'sequence_number' => '510',
  ),
  33 => 
  array (
    'created_server_datetime_utc' => 1443850261,
    'last_modified_server_datetime_utc' => 1443850261,
    'key' => '1aa7e781-55ae-490a-9e27-19e08c4737dd-1443850261-667916-5027',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_number_cols',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 2,
      2 => true,
      3 => 1,
      4 => 99,
    ),
    'sequence_number' => '520',
  ),
  34 => 
  array (
    'created_server_datetime_utc' => 1443850349,
    'last_modified_server_datetime_utc' => 1443850349,
    'key' => '9e45e223-4276-4104-85d5-ab0f8a169178-1443850349-791605-5028',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_hgap_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 2,
      2 => true,
      3 => 0,
      4 => 99,
    ),
    'sequence_number' => '530',
  ),
  35 => 
  array (
    'created_server_datetime_utc' => 1443850389,
    'last_modified_server_datetime_utc' => 1443850389,
    'key' => '1cdd8421-7233-42be-b52a-93fe6e171209-1443850389-990379-5029',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_hgap_colour',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '540',
  ),
  36 => 
  array (
    'created_server_datetime_utc' => 1443850437,
    'last_modified_server_datetime_utc' => 1443850437,
    'key' => '7bcd407f-f51b-4422-b09e-bfbaec7b5d0e-1443850437-488614-5030',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_vgap_px',
    'question_required' => true,
    'function_name' => 'decimal_digits_string__minlen_maxlen_questionemptyok_min_max',
    'args' => 
    array (
      0 => 1,
      1 => 2,
      2 => true,
      3 => 0,
      4 => 99,
    ),
    'sequence_number' => '550',
  ),
  37 => 
  array (
    'created_server_datetime_utc' => 1443850553,
    'last_modified_server_datetime_utc' => 1443850553,
    'key' => '79dc922e-e4e9-4db1-8f6a-6ec1a8ee11bf-1443850553-771763-5031',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_max_row_height_div_width',
    'question_required' => true,
    'function_name' => 'floating_point_string__min_max_maxlen_signchars_pointchars_questionemptyok',
    'args' => 
    array (
      0 => 0.1,
      1 => 99,
      2 => 'default',
      3 => '',
      4 => '.',
      5 => true,
    ),
    'sequence_number' => '580',
  ),
  38 => 
  array (
    'created_server_datetime_utc' => 1443850624,
    'last_modified_server_datetime_utc' => 1443850624,
    'key' => 'b1ec3533-4443-4c09-82af-9beed244be0f-1443850624-750101-5032',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_discard_ad_image_height_div_width',
    'question_required' => true,
    'function_name' => 'floating_point_string__min_max_maxlen_signchars_pointchars_questionemptyok',
    'args' => 
    array (
      0 => 0.1,
      1 => 99,
      2 => 'default',
      3 => '',
      4 => '.',
      5 => true,
    ),
    'sequence_number' => '590',
  ),
  39 => 
  array (
    'created_server_datetime_utc' => 1443850810,
    'last_modified_server_datetime_utc' => 1443850810,
    'key' => 'fd961f0f-f4d7-4808-9816-1e47da9bec26-1443850810-39128-5033',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_valign',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'top',
        1 => 'middle',
        2 => 'bottom',
      ),
      1 => true,
    ),
    'sequence_number' => '600',
  ),
  40 => 
  array (
    'created_server_datetime_utc' => 1443850979,
    'last_modified_server_datetime_utc' => 1443850979,
    'key' => '60ca2bb7-364f-4427-b102-8a24f4fd3088-1443850979-134018-5034',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_vgap_colour',
    'question_required' => true,
    'function_name' => 'css_colour_string__typeshex6_namestransparent__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '560',
  ),
  41 => 
  array (
    'created_server_datetime_utc' => 1443851030,
    'last_modified_server_datetime_utc' => 1443851030,
    'key' => '8a6ce1cd-d7db-47c3-9417-e9a94857a6a6-1443851030-974618-5035',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_extra_style',
    'question_required' => true,
    'function_name' => 'general_text_string__mixedcase_notags_minlen1_maxlen65535__questionemptyok',
    'args' => 
    array (
      0 => true,
    ),
    'sequence_number' => '630',
  ),
  42 => 
  array (
    'created_server_datetime_utc' => 1444027095,
    'last_modified_server_datetime_utc' => 1444027095,
    'key' => '152752dc-2e7e-4c92-86a0-5b68169b5247-1444027095-464362-5038',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_row_fill_method',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'none',
        1 => 'average',
        2 => 'mid',
        3 => 'shortest',
        4 => 'tallest',
      ),
      1 => true,
    ),
    'sequence_number' => '570',
  ),
  43 => 
  array (
    'created_server_datetime_utc' => 1444027350,
    'last_modified_server_datetime_utc' => 1444027350,
    'key' => '8c9e00c1-9bbc-4ccc-91d8-a573efb7eb29-1444027350-854526-5039',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_question_sort_on_height',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'yes',
        1 => 'no',
      ),
      1 => true,
    ),
    'sequence_number' => '610',
  ),
  44 => 
  array (
    'created_server_datetime_utc' => 1444088013,
    'last_modified_server_datetime_utc' => 1444088013,
    'key' => 'd783f9dd-81b9-4a5d-af2a-52f73c058a94-1444088013-160504-5041',
    'record_structure_key' => 'abf55541-3b27-449d-8b3b-37662c33514e-1442905625-994778-4900',
    'slug' => 'fixed_row_height_grid_question_delete_duplicates',
    'question_required' => true,
    'function_name' => 'canned_strings__allowedstrings_questionemptyok',
    'args' => 
    array (
      0 => 
      array (
        0 => 'yes',
        1 => 'no',
      ),
      1 => true,
    ),
    'sequence_number' => '620',
  ),
) ;
// =============================================================================
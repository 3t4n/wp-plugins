<?php
// *****************************************************************************
// VALIDATA / FIELD-DEFS-4-AD-SWAPPER-LOCAL-INCOMING-AVAILABLE-SITES.PHP
// (C) 2015 Peter Newman. All Rights Reserved.
// *****************************************************************************
$field_defs_4_ad_swapper_local_incoming_available_sites = array (
  0 => 
  array (
    'created_server_datetime_utc' => 1434442354,
    'last_modified_server_datetime_utc' => 1434442354,
    'key' => '4beff0cb-2ce4-4e16-8b78-45fd81ae8b76-1434442354-772105-1944',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'ad_swapper_site_sid',
    'question_required' => true,
    'function_name' => 'sequential_id_string__questionemptyok',
    'args' => 
    array (
      0 => false,
    ),
    'sequence_number' => '010',
  ),
  1 => 
  array (
    'created_server_datetime_utc' => 1434442473,
    'last_modified_server_datetime_utc' => 1434442473,
    'key' => 'cf8ab3c9-62e6-4309-98bd-f58c72cff612-1434442473-208774-1945',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'site_title',
    'question_required' => true,
    'function_name' => 'general_title_string__mixedcase_notags__minlen_maxlen_questionemptyok',
    'args' => 
    array (
      0 => 1,
      1 => 256,
      2 => false,
    ),
    'sequence_number' => '020',
  ),
  2 => 
  array (
    'created_server_datetime_utc' => 1434442542,
    'last_modified_server_datetime_utc' => 1434442542,
    'key' => '019062bf-a94e-499d-894c-a1f34900baa8-1434442542-334918-1946',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'home_page_url',
    'question_required' => true,
    'function_name' => 'absolute_url_string__minlen_maxlen_questionemptyok',
    'args' => 
    array (
      0 => 'default',
      1 => 'default',
      2 => false,
    ),
    'sequence_number' => '030',
  ),
  3 => 
  array (
    'created_server_datetime_utc' => 1434442630,
    'last_modified_server_datetime_utc' => 1434442630,
    'key' => '15e7649d-ff14-4c47-9a23-ebbef19a6c12-1434442630-620577-1947',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'general_description',
    'question_required' => true,
    'function_name' => 'general_text_string__mixedcase_notags__minlen_maxlen_questionemptyok',
    'args' => 
    array (
      0 => 1,
      1 => 9999,
      2 => true,
    ),
    'sequence_number' => '040',
  ),
  4 => 
  array (
    'created_server_datetime_utc' => 1434442687,
    'last_modified_server_datetime_utc' => 1434442687,
    'key' => '32fef487-577b-409b-a271-1f6e9461c546-1434442687-988208-1948',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'ads_wanted_description',
    'question_required' => true,
    'function_name' => 'general_text_string__mixedcase_notags__minlen_maxlen_questionemptyok',
    'args' => 
    array (
      0 => 1,
      1 => 9999,
      2 => true,
    ),
    'sequence_number' => '050',
  ),
  5 => 
  array (
    'created_server_datetime_utc' => 1434442765,
    'last_modified_server_datetime_utc' => 1434442765,
    'key' => '396ced53-52cd-4aed-83a6-6d444bf9d2c8-1434442765-772595-1949',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'sites_wanted_description',
    'question_required' => true,
    'function_name' => 'general_text_string__mixedcase_notags__minlen_maxlen_questionemptyok',
    'args' => 
    array (
      0 => 1,
      1 => 9999,
      2 => true,
    ),
    'sequence_number' => '060',
  ),
  6 => 
  array (
    'created_server_datetime_utc' => 1449128948,
    'last_modified_server_datetime_utc' => 1449128948,
    'key' => 'c21978d2-cc87-44eb-b9bc-aa4cda0354a3-1449128948-495687-5290',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'question_trial_mode_site',
    'question_required' => true,
    'function_name' => 'bool',
    'args' => 
    array (
    ),
    'sequence_number' => '070',
  ),
  7 => 
  array (
    'created_server_datetime_utc' => 1449130393,
    'last_modified_server_datetime_utc' => 1449130393,
    'key' => '9874172e-61d4-4791-8df2-7caa4388d6d5-1449130393-633876-5292',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'this_site_approves_plugin_site',
    'question_required' => true,
    'function_name' => 'bool',
    'args' => 
    array (
    ),
    'sequence_number' => '090',
  ),
  8 => 
  array (
    'created_server_datetime_utc' => 1449130422,
    'last_modified_server_datetime_utc' => 1449130422,
    'key' => '9dcec6cb-f68a-45f9-913c-6781a7fb2b73-1449130422-991741-5293',
    'record_structure_key' => 'f000e9c6-678d-4037-8961-e643ca66af15-1434438898-940760-1942',
    'slug' => 'this_site_targets_plugin_site',
    'question_required' => true,
    'function_name' => 'bool',
    'args' => 
    array (
    ),
    'sequence_number' => '100',
  ),
) ;
// =============================================================================
<?php

defined('ABSPATH') or exit;
if(!interface_exists('l2h_bibtex_interface')) {
    interface l2h_bibtex_interface
    {
        public static function l2h_bibtex_parser($bibdata);
        public static function l2h_bibtex_render($bibitem);
        public static function l2h_bibtex_keychecker($bibitem);
    }
}

if(!class_exists('l2h_bibtex_Exception')) {
    class l2h_bibtex_Exception extends Exception
    {
    }
}

if(!class_exists('l2h_bibtex_class')) {
    class l2h_bibtex_class implements l2h_bibtex_interface
    {
        static function l2h_bibtex_sanitize( $bibarrs )
        {
        array_walk_recursive( $bibarrs, function( &$item, $key ){
        $item = sanitize_text_field( $item );
        } );
        return $bibarrs;
        }

            // This comes from: https://github.com/audiolabs/bibtexparser/blob/master/src/AudioLabs/BibtexParser/BibtexParser.php
        public static function l2h_bibtex_parser($biborgdata)
        {
            $bibitems = self::l2h_bibtex_parser_lines(preg_split('/\n/', $biborgdata));
                //die( var_export($bibitems));
            $bibkeys = explode('+', $bibitems['bibkeys']);
                // Check the key
            try {
                self::l2h_bibtex_keychecker($bibkeys);
            } catch(l2h_bibtex_Exception $e) {
                $bibkeysinfo = [
                  'status'  => 'fail',
                  'message' => $e->getMessage()
                ];
                return $bibkeysinfo;
            }
                // check bibtex.bib writable or not
            $file = wp_upload_dir()['basedir']. '/bibtex.bib.txt';
            if(!file_exists($file)) {
                    // Copy the bibtex.bib.txt template to uploads/
                $bibtex_org = plugin_dir_path(__FILE__) . 'inc/bibtex.bib.txt';
                copy($bibtex_org, $file);
            }
            if(!wp_is_writable($file)) {
                $bibkeysinfo = [
                  'status' => 'failtowrite',
                ];
                return $bibkeysinfo;
            }
                // Write to database: $bibitems = [ 'bibkeys'=>'bibtex keys', 1=> 'bibtex item 1', 2=>'bibtex item 2', ... ]
                // Sanities
            $bibitems = self::l2h_bibtex_sanitize( $bibitems );
            foreach($bibitems as $index => $bibitem) {
                if($index == 'bibkeys') {
                    continue;
                }
                $bibdata           = [];
                $bibdata['type']   = $bibitem['type'];
                $bibdata['bibkey'] = $bibitem['bibkey'];
                foreach($bibitem as $key => $value) {
                    switch(strtolower($key)) {
                        case 'author': 
                            $authors = '';
                            if(is_array($bibitem['author'])) {
                                foreach($bibitem['author'] as $au) {
                                    $authors == '' ? $authors = $au : $authors .= ' and ' . $au;
                                }
                            } else {
                                $authors = $bibitem['author'];
                            }
                            $bibdata['author'] = $authors;
                            break;
                        case 'title': 
                            $bibdata['title'] = $bibitem['title'];
                            break;
                        case 'series': 
                            $bibdata['series'] = $bibitem['series'];
                            break;
                        case 'edition': 
                            $bibdata['edition'] = $bibitem['edition'];
                            break;
                        case 'publisher': 
                            $bibdata['publisher'] = $bibitem['publisher'];
                            break;
                        case 'year': 
                            $bibdata['year'] = $bibitem['year'];
                            break;
                        case 'booktitle': 
                            $bibdata['booktitle'] = $bibitem['booktitle'];
                            break;
                        case 'editor': 
                            $bibdata['editor'] = $bibitem['editor'];
                            break;
                        case 'journal': 
                            $bibdata['journal'] = $bibitem['journal'];
                            break;
                        case 'fjournal': 
                            $bibdata['fjournal'] = $bibitem['fjournal'];
                            break;
                        case 'school': 
                            $bibdata['school'] = $bibitem['school'];
                            break;
                        case 'volume': 
                            $bibdata['volume'] = $bibitem['volume'];
                            break;
                        case 'number': 
                            $bibdata['number'] = $bibitem['number'];
                            break;
                        case     'pages'                                                                                               : 
                        $bibdata['pages'] = is_array($bibitem['pages']) ? $bibitem['pages']['start'] . '---' . $bibitem['pages']['end']: $bibitem['pages'];
                            break;
                        case 'issn': 
                            $bibdata['issn'] = $bibitem['issn'];
                            break;
                        case 'doi': 
                            $bibdata['doi'] = $bibitem['doi'];
                            break;
                        case 'mrnumber': 
                            $bibdata['mrnumber'] = $bibitem['mrnumber'];
                            break;
                        case 'note': 
                            $bibdata['note'] = $bibitem['note'];
                            break;
                        case 'url': 
                            $bibdata['paperurl'] = $bibitem['url'];
                            break;
                        case 'paperurl': 
                            $bibdata['paperurl'] = $bibitem['paperurl'];
                            break;
                        case 'implementationurl': 
                            $bibdata['implementationurl'] = $bibitem['implementationurl'];
                            break;
                        case 'tags': 
                            $bibdata['tags'] = $bibitem['tags'];
                            break;
                        default: 
                                // omit the other field
                    }
                }
                    // Write to database
                    //die(var_export($bibdata));
                l2h_db_class::l2h_db_update($bibdata);
            }
                // Add original bibtex data to bibtex.bib
            $timezone_format = _x('Y/m/d H:i:s', 'timezone date format', 'latex2html');
            $time            = date_i18n($timezone_format);
            $bibdata         = "% Added at $time\r\n" . $biborgdata . "\r\n";
            $file            = wp_upload_dir()['basedir'] . '/bibtex.bib.txt';

                // Initialize WordPress filesystem
            if (!function_exists('request_filesystem_credentials')) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
            }

                // Ensure the filesystem is initialized
            global $wp_filesystem;

              // Check if WP_Filesystem is initialized
            if (empty($wp_filesystem)) {
                  // Request credentials and initialize the filesystem
                $credentials = request_filesystem_credentials('', '', true, false, array());

                if (!$credentials) {
                      // Return WP_Error for failure
                    return new WP_Error('filesystem_credentials_failed', 'Filesystem credentials request failed.');
                }

                  // Initialize the filesystem with the provided credentials
                if (!WP_Filesystem($credentials)) {
                      // Return WP_Error with the error message
                    return new WP_Error('filesystem_initialization_failed', 'Filesystem initialization failed. Please check file permissions.');
                }
            }

              // Check if we successfully initialized the filesystem
            if (!is_object($wp_filesystem)) {
                  // Return WP_Error for failure
                return new WP_Error('filesystem_not_initialized', 'Filesystem object is not initialized.');
            }



                // Define the file path
            $file = wp_upload_dir()['basedir'] . '/bibtex.bib.txt';

                // Write data to the file using WP_Filesystem put_contents (for appending, we first get the contents and append manually)
            $current_contents = $wp_filesystem->get_contents($file);

                // Append new data
            $new_contents = $current_contents . $bibdata;

                // Write the updated contents back to the file
            $write = $wp_filesystem->put_contents($file, $new_contents);

            if (false === $write) {
                  // Return WP_Error instead of using error_log
                return new WP_Error('file_write_failed', 'Failed to write to the file: ' . $file);
            }
            

                // Return the added items
            $bibkeysinfo = [
                'bibkeys' => $bibitems['bibkeys'],
                'status'  => 'success'
            ];
            return $bibkeysinfo;
        }

        public static function l2h_bibtex_parser_lines($lines)
        {
            $items            = array();
            $items['bibkeys'] = '';
            $count            = 0;

            if(!$lines) {
                return;
            }

            foreach($lines as $number => $line) {
                $line = trim($line);

                    // empty line
                if(!strlen($line)) {
                    continue;
                }
                    // some funny comment string
                if(strpos(strtolower($line), '@string') !== false) {
                    continue;
                }
                    // pybiliographer comments
                if(strpos(strtolower($line), '@comment') !== false) {
                    continue;
                }
                    // normal TeX style comment
                if($line[0] == '%') {
                    continue;
                }

                    // begin with @ (since we are trimmed), for example @inproceedings{}
                if($line[0] == '@') {
                    $count  += 1;
                    $handle  = '';
                    $value   = '';
                    $data    = '';
                    preg_match_all('/@(?P<type>\w+)\s*{(?P<bibkey>\w+),/', $line, $matches);  //}
                                                                                              //$start = strpos( $line, '@' );
                                                                                              //$end = strpos( $line, '{' );
                    $items[$count]                   = array();
                    $items[$count]['type']           = strtolower($matches['type'][0]);
                    $items['bibkeys']                = $items['bibkeys'] == '' ? $matches['bibkey'][0] : $items['bibkeys'] . '+' . $matches['bibkey'][0];
                    $items[$count]['bibkey']         = $matches['bibkey'][0];
                    $items[$count]['lines']['start'] = $number + 1;
                } elseif(substr_count($line, '=') > 0) {
                    $nextline = $lines[$number + 1];
                    if (substr_count($nextline, '=') == 0) {
                            // the next line is neither a new block nor a new field: combine multiline field
                        $line = trim($line . $nextline);
                    }
                        // contains =, for example authors = {...},
                    preg_match_all('/(\w+)\s*=\s*(.*)/', $line, $matches);
                    $handle = strtolower($matches[1][0]);
                    $data   = $matches[2][0];

                    if($handle == 'pages') {
                        preg_match('/(\d+)\s*\-+\s*(\d+)/', $data, $pages);
                        if(count($pages) > 2) {
                            $value = array( 'start' => $pages[1], 'end' => $pages[2] );
                        } else {
                            $value = $data;
                        }
                    } elseif($handle == 'author') {
                        $value = explode('and', $data);
                    } else {
                        $value = $data;
                    }
                }

                if($value != '') {
                    $items[$count][$handle] = self::l2h_bibtex_item_cleanup($value);
                        //echo var_export( $value) . "<br >";
                }

                if(count($items) > 0) {
                    $items[$count]['lines']['end'] = $number + 1;
                }
            }
                //die(self::l2h_bibtex_item_print( $items ) );
                //die(var_export($items));
            return $items;
        }

        public static function l2h_bibtex_item_cleanup($value)
        {
            if (is_array($value)) {
                    // Check PHP version and adjust callable accordingly
                $callback = (version_compare(PHP_VERSION, '8.0.0', '<')) ? 'self::l2h_bibtex_item_cleanup' : [static::class, 'l2h_bibtex_item_cleanup'];
                return array_map($callback, $value);
            }
            
            $search  = array('\\\\"a', '\\\\"A', '\\\\`o', '\\\\\'o', '\\\\"o', '\\\\"O', '\\\\^o', '\\\\"u', '\\\\"U', '\\\\ss', '\\\\`e', '\\\\´e', '\\\\\'e', '\\\\url{', '{', '}', '--', '\\\\"', '\'', '`', '\textbackslash', '\\');
            $replace = array('ä',   'Ä',   'ò',   'ó',     'ö',   'Ö',   'ô',   'ü',   'Ü',   'ß',   'è',   'é',   'é',     '',      '',  '',  '&mdash;', ' ',  ' ',  ' ', '\\', '');
            
            $value = str_replace($search, $replace, $value);
            $value = rtrim($value, '}, ');
            return trim($value);
        }
        
        public static function l2h_bibtex_render($bibitem)
        {
            $bibstr = '';
            if(isset($bibitem['author'])) {
                $au_str = trim($bibitem['author']);
                $au_arr = explode('and', $au_str);
                foreach($au_arr as $index => $au) {
                    $au_family_name    = substr($au, 0, strpos($au, ','));
                    $au_given_name_arr = explode('-', substr($au, strpos($au, ',') + 1));
                    $au_str_val        = '';
                    foreach($au_given_name_arr as $val) {
                        $au_str_val .= strtoupper(substr(trim($val), 0, 1)) . '.-';
                    }
                    $au_given_name  = substr($au_str_val, 0, -1);
                    $au_arr[$index] = $au_given_name . ' ' . $au_family_name;
                }
                $au_last     = array_slice($au_arr, -1);
                $au_firsts   = join(', ', array_slice($au_arr, 0, -1));
                $au_both     = array_filter(array_merge(array( $au_firsts ), $au_last), 'strlen');
                $au_str_out  = join(' and ', $au_both);
                $bibstr     .= "<span class='bibtex_author'>" . $au_str_out . "</span>, ";
            }
            if(isset($bibitem['title']) || isset($bibitem['booktitle'])) {
                $title = isset($bibitem['title']) ? $bibitem['title'] : $bibitem['booktitle'];
                if(isset($bibitem['doi'])) {
                    $bibstr .= "<a class='bibtex_title' target='_blank' href='https://doi.org/" . $bibitem['doi'] . "'>" . $title . "</a>, ";
                } else {
                    $bibstr .= "<a class='bibtex_title' target='_blank' href='http://www.google.com/search?q=" . htmlentities($title) . "'>" . $title . "</a>, ";
                }
            }
            if(isset($bibitem['edition'])) {
                $edition  = $bibitem['edition'];
                $bibstr  .= "<span class='bibtex_edition'>" . $edition . "</span>, ";
            }
            if(isset($bibitem['series'])) {
                $series  = $bibitem['series'];
                $bibstr .= "<span class='bibtex_series'>" . $series . "</span>, ";
            }
            if(isset($bibitem['publisher'])) {
                $publisher  = $bibitem['publisher'];
                $bibstr    .= "<span class='bibtex_publisher'>" . $publisher . "</span>, ";
            }
            if(isset($bibitem['journal'])) {
                $journal  = $bibitem['journal'];
                $bibstr  .= "<span class='bibtex_journal'>" . $journal . "</span> " ;
            }
            if(isset($bibitem['volume'])) {
                $volume  = $bibitem['volume'];
                $bibstr .= isset($bibitem['publisher']) ? "<span class='bibtex_volume'>vol. " . $volume . "</span>, " : "<span class='bibtex_volume'>" . $volume . "</span>";
            }
            if(isset($bibitem['year'])) {
                $year    = $bibitem['year'];
                $bibstr .= isset($bibitem['publisher']) ? "<span class='bibtex_year'>" . $year . "</span>. " : "(<span class='bibtex_year'>" . $year . "</span>), ";
            }
            if(isset($bibitem['number'])) {
                $number  = $bibitem['number'];
                $bibstr .= "no. <span class='bibtex_number'>" . $number . "</span>, ";
            }
            if(isset($bibitem['pages'])) {
                $pages   = $bibitem['pages'];
                $bibstr .= "<span class='bibtex_page'>" . $pages . "</span>. ";
            }
            if(isset($bibitem['note']) && $bibitem['note'] != '') {
                $note    = $bibitem['note'];
                $bibstr .= "<span class='bibtex_note'>" . $note . "</span>. ";
            }
            if(isset($bibitem['mrnumber'])) {
                $mrnumber  = $bibitem['mrnumber'];
                $bibstr   .= "MR<a class='bibtex_mrnumber' target='_blank' href='http://www.ams.org/mathscinet-getitem?mr=" . $mrnumber . "'>" . $mrnumber . "</a>";
            }
            if ($bibitem !== null && isset($bibitem['bibkey'])) {
                return "<li id='" . $bibitem['bibkey'] . "'>" . $bibstr . "</li>";
            }
        }

        public static function l2h_bibtex_keychecker($keys)
        {
            global $wpdb;
            $tab_name = $wpdb->prefix . 'l2hbibtex';
            $dumpkeys = '';
            foreach($keys as $key) {
            // Define a unique cache key based on the bibkey
            $cache_key = 'bibitem_' . md5($key); // Unique key based on the bibkey

            // Attempt to retrieve the result from the cache
            $res = wp_cache_get($cache_key, 'bibtex_item');

            if (false === $res) {
                // Data is not in cache, proceed with the database query
                $query = $wpdb->prepare("SELECT * FROM {$tab_name} WHERE `bibkey` = %s LIMIT 1;", $key);
                
                // Execute the query
                $res = $wpdb->get_results($query, ARRAY_A);
                
                // Cache the result for future use (e.g., 12 hours)
                wp_cache_set($cache_key, $res, 'bibtex_item', 12 * HOUR_IN_SECONDS);
            }
            // Want to update the query immediately After modifying or deleting a bibtex item, clear the cache
            //wp_cache_delete($cache_key, 'bibtex_item');
                
            if($res != null) {
                    $dumpkeys .= $key . ', ';
                }
            }
            if($dumpkeys != '') {
                $dumpkeys = rtrim($dumpkeys, ', ');  // Remove trailing comma and space
                throw new l2h_bibtex_Exception(esc_html(rtrim($dumpkeys, ', ')));
            }
        }

        public static function l2h_bibtex_item_print($items)
        {
            // if WP_DEBUG is false or not defined, consider it production
            $is_production = !defined('WP_DEBUG') || !WP_DEBUG;
            foreach ($items as $index => $item) {
                if (is_array($item)) {
                    echo '-------' . esc_html($index) . "-------<br>";
                    foreach ($item as $key => $value) {
                        echo esc_html($key) . '-------';
                        if ($is_production) {
                            echo esc_html($value); // Output safe, sanitized data
                        } else {
                            echo '<pre>' . esc_html(print_r($value, true)) . '</pre>'; // Debug in development
                        }
                        echo "<br />";
                    }
                } else {
                    foreach ($items as $key => $value) {
                        if (is_array($value)) {
                            continue;
                        }
                        echo '-------' . esc_html($key) . '-------';
                        if ($is_production) {
                            echo esc_html($value); // Output safe, sanitized data
                        } else {
                            echo '<pre>' . esc_html(print_r($value, true)) . '</pre>'; // Debug in development
                        }
                        echo "<br />";
                    }
                }
            }
        }

    }
}

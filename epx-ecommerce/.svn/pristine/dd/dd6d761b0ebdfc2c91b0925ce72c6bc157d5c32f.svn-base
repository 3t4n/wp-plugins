<?php

abstract class EpxCon {

  const VERSION = '1.0';

}

require_once 'EPX/Processor.php';

/* 
 * check php version if below 5.2.1 then throw exception msg.
 */
if (version_compare(PHP_VERSION, '5.2.1', '<')) {
  throw new Exception('PHP version >= 5.2.1 required');
}

/* 
 * check the dependency of curl, simplexml, openssl loaded or not.
 */
function checkWooCommerceEPXDependencies(){
  $extensions = array('curl', 'openssl');
  foreach ($extensions AS $ext) {
    if (!extension_loaded($ext)) {
      throw new Exception('EPX-client-php requires the ' . $ext . ' extension.');
    }
  }
}

checkWooCommerceEPXDependencies();


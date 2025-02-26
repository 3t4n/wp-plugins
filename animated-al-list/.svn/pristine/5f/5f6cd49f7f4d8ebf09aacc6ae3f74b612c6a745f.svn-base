<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

class AnimatedAl_CacheDb extends AnimatedAl_Db{
public function __construct()
  {
  if (method_exists(get_parent_class(), '__construct'))
      parent::__construct();
  }
public function fetchDataMain($sql, $params)
  {
  global $animated_al_cache_db;
  global $animated_al_cache_sql_expiration;
  
  $fullSql = $this->wpdb->prepare($sql, $params);
    if (!($animated_al_cache_db)||(($cache = wp_cache_get( $fullSql, 'animated_al_main_front' )) === false))
      {
        $data = $this->filterMainData($this->fetchDatafullQuery($fullSql));
          wp_cache_add( $fullSql, $data, 'animated_al_main_front', $animated_al_cache_sql_expiration );
          return $data;
      }
      else
      {
        return $cache;
      }
  }
public function filterMainData($data)
  {
    return $this->prepear_front($data);
  }
public function prepear_front($data)
  {
  $main = array();

    foreach ($data as $dt)
      {
      $fl = false;

          foreach ($dt as $key=>$val)
            {
              if ($key == 'delim')$fl = true;

              if (isset($val))
              if ($fl)
                {
                  $main['items'][$dt->item_id][$key] = $val;
                }
                else
                {
                  $main['main'][$key] = $val;
                }
            }
      }
   return $main;
  }

}
?>
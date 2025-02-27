<?php
defined( 'ABSPATH' ) || exit;
global $ActiveAddons;

$config = $attributes;

$playinfo = $ActiveAddons['cloudflare']->vod->get_playinfo($attributes['vid']);

if( is_wp_error( $playinfo ) ) return;
$config['source'] = $playinfo['playUrl']??'';
if( !isset( $config['cover'] ) || !$config['cover'] ){
    $config['cover'] = $playinfo['thumbnail']??'';
}

unset( $config['oss'] );
unset( $config['libid'] );
unset( $config['vid'] );

$video = do_blocks('<!-- wp:mine-cloudvod/aliplayer '.json_encode($config).' /-->');

echo $video;
<?php
function abcfal_db_images($collID) {
    global $wpdb;

    $dbRows = $wpdb->get_results( $wpdb->prepare(
    "SELECT i.img_id, i.filename, i.alt, i.img_title, i.thumb_w, i.thumb_h
    FROM $wpdb->abcficimgs i
    WHERE i.coll_id = %d AND i.published = 1
    ORDER BY i.sort_order", $collID ), OBJECT_K );

    return $dbRows;
}

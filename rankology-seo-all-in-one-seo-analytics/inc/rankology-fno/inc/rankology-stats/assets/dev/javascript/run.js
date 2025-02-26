// Load Jquery Date Picker in Rankology Stats Admin
rkns_js.date_picker();

// Run Meta Box [Overview Or Dashboard]
if (rkns_js.global.page.file === "index.php" || rkns_js.is_active('overview_page') || rkns_js.global.page.file === "post-new.php" || (rkns_js.global.page.file === "post.php" && rkns_js.isset(rkns_js.global, 'page', 'ID'))) {
    rkns_js.run_meta_boxes();
}

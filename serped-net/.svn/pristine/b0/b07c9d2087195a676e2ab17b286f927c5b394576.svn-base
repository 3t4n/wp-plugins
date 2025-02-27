<?php
$core = $_POST['download'] . 'wp-load.php';
if (isset($_POST['download']) && is_file($core)) {
    require_once($core);
    global $wpdb;

    // Define table names with prefix
    $keyword_stats = $wpdb->prefix . "icp_keyword_stats";
    $links = $wpdb->prefix . "icp_project_links";
    $keywords = $wpdb->prefix . "icp_project_keywords";
    $projects = $wpdb->prefix . "icp_projects";
    $posts = $wpdb->prefix . "posts";

    // Prepare SQL queries
    $globalStats = $wpdb->prepare(
        "SELECT k.keyword AS keyword, COUNT(k.keyword) AS count 
        FROM {$keyword_stats} ks
        INNER JOIN {$keywords} k ON ks.keyword_id = k.id
        GROUP BY k.keyword"
    );

    $projectStats = $wpdb->prepare(
        "SELECT p.project_name AS name, COUNT(ks.id) AS count 
        FROM {$keyword_stats} ks
        INNER JOIN {$projects} p ON ks.project_id = p.id
        GROUP BY ks.project_id"
    );

    $postStats = $wpdb->prepare(
        "SELECT p.post_type AS type, p.post_title AS title, COUNT(ks.id) AS count 
        FROM {$keyword_stats} ks
        INNER JOIN {$posts} p ON ks.post_id = p.ID
        GROUP BY ks.post_id"
    );

    $keywordStatsLinks = $wpdb->prepare(
        "SELECT k.keyword AS keyword, pl.url AS url, COUNT(ks.link_id) AS count_links 
        FROM {$keyword_stats} ks
        INNER JOIN {$keywords} k ON ks.keyword_id = k.id
        INNER JOIN {$links} pl ON ks.link_id = pl.id
        GROUP BY k.keyword, ks.link_id"
    );

    $keywordStatsPosts = $wpdb->prepare(
        "SELECT k.keyword AS keyword, p.post_type AS type, p.post_title AS post_title, COUNT(p.ID) AS count_posts 
        FROM {$keyword_stats} ks
        INNER JOIN {$keywords} k ON ks.keyword_id = k.id
        INNER JOIN {$posts} p ON ks.post_id = p.ID
        GROUP BY k.keyword, ks.post_id"
    );

    $keywordStatsProject = $wpdb->prepare(
        "SELECT k.keyword AS keyword, p.project_name AS project_name, COUNT(p.id) AS count_projects 
        FROM {$keyword_stats} ks
        INNER JOIN {$keywords} k ON ks.keyword_id = k.id
        INNER JOIN {$projects} p ON ks.project_id = p.id
        GROUP BY k.keyword, ks.project_id"
    );

    // Fetch data
    $global = $wpdb->get_results($globalStats);
    $projects = $wpdb->get_results($projectStats);
    $postsStats = $wpdb->get_results($postStats);
    $keywordProjects = $wpdb->get_results($keywordStatsProject);
    $keywordLinks = $wpdb->get_results($keywordStatsLinks);
    $keywordPosts = $wpdb->get_results($keywordStatsPosts);

    //Start generating CSV file
    // output headers so that the file is downloaded rather than displayed
    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="keyword.stats.csv"');
    // do not cache the file
    header('Pragma: no-cache');
    header('Expires: 0');
    $output = fopen('php://output', 'w');

    //Generate Global Keyword Data
    fputcsv($output, array(
        'Global Keyword Count'
    ));

    fputcsv($output, array(
        'No.',
        'Keyword',
        'Keyword Count'
    ));

    if (count($global) == 0) {
        fputcsv($output, array('No data available'));
    } else {
        $i = 1;
        foreach ($global as $keyword) {
            fputcsv($output, array(
                $i . ".",
                $keyword->keyword,
                $keyword->count
            ));
            $i++;
        }
    }
    //Add empty row
    fputcsv($output, array());

    //Generate Project keyword data
    fputcsv($output, array(
        'Project Keyword Count'
    ));

    fputcsv($output, array(
        'No.',
        'Project Name',
        'Keyword Count'
    ));

    if (count($projects) == 0) {
        fputcsv($output, array('No data available'));
    } else {
        $i = 1;
        foreach ($projects as $project) {
            fputcsv($output, array(
                $i . ".",
                $project->name,
                $project->count
            ));
            $i++;
        }
    }

    //Add empty row
    fputcsv($output, array());

    //Generate Post keyword count
    fputcsv($output, array(
        'Post Keyword Count'
    ));

    fputcsv($output, array(
        'No.',
        'Post Title',
        'Post Type',
        'Keyword Count'
    ));

    if (count($postsStats) == 0) {
        fputcsv($output, array('No data available'));
    } else {
        $i = 1;
        foreach ($postsStats as $post) {
            fputcsv($output, array(
                $i . ".",
                $post->title,
                $post->type,
                $post->count
            ));
            $i++;
        }
    }

    //Add empty row
    fputcsv($output, array());
    //Generate Keyword Statistics Data
    fputcsv($output, array(
        'Keyword Statistics'
    ));

    if (
        count($postsStats) == 0 &&
        count($keywordProjects) == 0 &&
        count($keywordLinks) == 0 &&
        count($keywordPosts) == 0
    ) {

        fputcsv($output, array('No data available'));
    } else {

        //Keyword - Project
        fputcsv($output, array(
            'Keyword - Project'
        ));

        fputcsv($output, array(
            'No.',
            'Keyword',
            'Project Name',
            'Project Count'
        ));

        $i = 1;
        foreach ($keywordProjects as $kp) {
            fputcsv($output, array(
                $i . ".",
                $kp->keyword,
                $kp->project_name,
                $kp->count_projects
            ));
            $i++;
        }


        //Add empty row
        fputcsv($output, array());

        //Generate Keyword - Link
        fputcsv($output, array(
            'Keyword - Link'
        ));

        fputcsv($output, array(
            'No.',
            'Keyword',
            'Link',
            'Link Count'
        ));

        $i = 1;
        foreach ($keywordLinks as $kl) {
            fputcsv($output, array(
                $i . ".",
                $kl->keyword,
                $kl->url,
                $kl->count_links
            ));
            $i++;
        }

        //Add empty row
        fputcsv($output, array());

        //Generate Keyword - Post
        fputcsv($output, array(
            'Keyword - Post Title'
        ));

        fputcsv($output, array(
            'No.',
            'Keyword',
            'Post Title',
            'Post Type',
            'Post Count'
        ));

        $i = 1;
        foreach ($keywordPosts as $kp) {
            fputcsv($output, array(
                $i . ".",
                $kp->keyword,
                $kp->post_title,
                $kp->type,
                $kp->count_posts
            ));
            $i++;
        }
    }

    fclose($output);
}

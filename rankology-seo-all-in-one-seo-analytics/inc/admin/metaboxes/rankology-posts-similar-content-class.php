<?php
class SimilarPostsFinder
{
    private $limit;

    /**
     * Constructor to set the limit for similar posts.
     */
    public function __construct($limit = 5)
    {
        $this->limit = $limit;
    }

    /**
     * Get similar posts based on content.
     */
    public function get_similar_posts($post_id)
    {
        // Check if post ID is valid.
        if (empty($post_id)) {
            echo esc_html__('Invalid post ID.', 'wp-rankology') . '<br>';
            return [];
        }

        // Get the current post's content.
        $post = get_post($post_id);
        if (!$post) {
            echo esc_html__('Post not found for ID:', 'wp-rankology') . ' ' . esc_html($post_id) . '<br>';
            return [];
        }

        // Extract the content for searching.
        $content = $post->post_content;
        $keywords = wp_trim_words(strip_tags($content), 20, '');

        // Define the query arguments.
        $query_args = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $this->limit,
            'post__not_in'   => [$post_id],
            's'              => $keywords,
        ];

        // Execute the query.
        $query = new WP_Query($query_args);

        if (!$query->have_posts()) {
            echo esc_html__('No similar posts found.', 'wp-rankology') . '<br>';
            return [];
        }

        // Collect similar posts.
        $similar_posts = [];
        while ($query->have_posts()) {
            $query->the_post();
            $similar_posts[] = [
                'title' => get_the_title(),
                'link'  => get_permalink(),
            ];
        }

        wp_reset_postdata();

        return $similar_posts;
    }

    /**
     * Display similar posts with copy functionality.
     */
    public function display_similar_posts($post_id)
    {
        $similar_posts = $this->get_similar_posts($post_id);

        if (!empty($similar_posts)) {
            echo '<h3>' . esc_html__('Similar Posts', 'wp-rankology') . '</h3><ul>';
            foreach ($similar_posts as $post) {
                echo '<li class="rankology-similar-posts">';
                echo ' <button class="rankology-copy-button" data-title="' . esc_attr($post['title']) . '" data-link="' . esc_url($post['link']) . '">';
                echo '<span class="dashicons dashicons-admin-page"></span> ';
                echo esc_html__('Copy', 'wp-rankology');
                echo '</button>';
                echo '<a href="' . esc_url($post['link']) . '" class="rankology-copy-post-link">' . esc_html($post['title']) . '</a>';
                
                echo '</li>';
            }
            echo '</ul>';

            
            
        } else {
            echo '<p>' . esc_html__('No similar posts found.', 'wp-rankology') . '</p>';
        }
    }
}

$post_id = get_the_ID();
$similar_posts_finder = new SimilarPostsFinder(5);
$similar_posts_finder->display_similar_posts($post_id);


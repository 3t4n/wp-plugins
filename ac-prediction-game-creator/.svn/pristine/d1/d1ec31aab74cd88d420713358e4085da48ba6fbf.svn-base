<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <div class="entry">
      <header class="entry-header"><h2 class="entry-title"><?php esc_html_e('My Leagues', 'ac-prediction-game-creator'); ?></h2></header>
      <div class="entry-content">

          <?php
          $current_user = wp_get_current_user();
          $args = [
              'post_type' => 'acpgc_league',
              'posts_per_page' => -1, // Fetch all
              'meta_query' => [
                  [
                      'key' => 'league_members', // Your ACF field name
                      'value' => '"' . $current_user->ID . '"',
                      'compare' => 'LIKE'
                  ]
              ]
          ];

          $query = new WP_Query($args);

          if($query->have_posts()) :
              ?>
          <div class="l-user-league-list">
            <ul class="l-user-league-list__list">
                <?php
                // Initialize the NumberFormatter for ordinal numbers
                $formatter = new NumberFormatter(get_locale(), NumberFormatter::ORDINAL);
                while($query->have_posts()) : $query->the_post();
                    // Fetch league_members from current post
                    $league_members = get_field('league_members');

                    // Create an array to store member data
                    $member_data = [];

                    // Loop through the array to grab user meta and details
                    foreach ($league_members as $member):
                        $user_id = $member['ID'];
                        $score = get_user_meta($user_id, 'acpgc_user_score', true);

                        $member_data[] = [
                            'display_name' => $member['display_name'],
                            'score' => (int)$score,
                            'ID' => $user_id
                        ];
                    endforeach;

                    // Sort the array by 'score'
                    usort($member_data, function($a, $b) {
                        return $b['score'] - $a['score'];
                    });

                    // Find the rank of the current user
                    $user_rank = array_search($current_user->ID, array_column($member_data, 'ID')) + 1;
                    $league_size = count($member_data);
                    $user_rank_with_suffix = $formatter->format($user_rank);
                    ?>
                  <li class="l-user-league-list__item">
                    <div class="l-user-league-list__league-thumb">
                      <div class="c-league-thumb">
                    <h4 class="c-league-thumb__header"><a class="c-league-thumb__link--header" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                      <div class="c-league-thumb__meta">
                      <?php
                      /* translators: %1$d: user's rank, %2$d: total number of players */
                      printf(esc_html__('You are rank %1$d out of %2$d players', 'ac-prediction-game-creator'), esc_html($user_rank_with_suffix), esc_html($league_size));
                      ?>
                      </div>
                      </div>
                    </div>
                  </li>

                <?php endwhile; ?>
            </ul>
      </div>
          <?php
          else :
              ?>
            <p><?php esc_html_e('You are not a member of any league.', 'ac-prediction-game-creator'); ?></p>
          <?php
          endif;

          wp_reset_postdata();
          ?>
      </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>

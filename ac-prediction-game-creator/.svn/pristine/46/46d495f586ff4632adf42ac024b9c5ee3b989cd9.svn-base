<?php
/**
 * The template for displaying user leagues
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">
      <div class="entry">
      <header class="entry-header"><h2 class="entry-title"><?php the_title(); ?></h2></header>
<div class="entry-content">
        <?php

        $userId = get_current_user_id();
        if ($message = get_transient("acpgc_added_to_league_{$userId}")) {
            echo '<div class="notice">' . sprintf(wp_kses(__('You have been added to the <b>%s</b> League', 'ac-prediction-game-creator'), array('b' => array())), esc_html($message)) . '</div>';
            delete_transient("acpgc_added_to_league_{$userId}");
        }

        if ($errorMessage = get_transient("acpgc_invalid_token_{$userId}")) {
            echo '<div class="error">' . esc_html($errorMessage) . '</div>';
            delete_transient("acpgc_invalid_token_{$userId}");
        }


        // Start the Loop.
        while ( have_posts() ) :
            the_post();
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
?>

  <!-- Display the sorted array -->
  <table>
    <tr>
      <th>Rank</th>
      <th>Name</th>
      <th>Score</th>
    </tr>

      <?php foreach ($member_data as $index => $data): ?>
        <tr>
          <td><?php echo esc_html(absint($index) + 1); ?></td>
          <td><?php echo esc_html($data['display_name']); ?></td>
          <td><?php echo esc_html($data['score']); ?></td>
        </tr>
      <?php endforeach; ?>
  </table>
<?php
  endwhile; // End the loop.
        ?>

    <?php
    $current_user_id = get_current_user_id(); // Get current user ID
    $league_owner_id = get_post_meta($post->ID, 'league_owner', true); // Assume you store the owner's ID in post meta
    ?>

    <?php if ($current_user_id == $league_owner_id) : ?>

    <h4 class="c-header__heading">League Invite</h4>
    <p>Invite a new play to your league. Just add the new players email and click invite.</p>
      <form id="league_invite_form">
        <input type="email" name="invite_email" id="invite_email" placeholder="Enter Email to invite">
        <input type="submit" value="Invite">
      </form>
    <?php endif; ?>

</div>
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();

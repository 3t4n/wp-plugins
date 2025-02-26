<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div class="l-user-dashboard">
  <div class="l-user-dashboard__container">
    <div class="l-user-dashboard__user-avatar">
      <div class="c-feature-image--gravatar">
        <img class="c-feature-image__img--gravatar" src="<?php echo esc_url( get_avatar_url( $current_user->ID, ['size' => '256'] ) ); ?>" alt="User Avatar">
      </div>
    </div>
    <div class="l-user-dashboard__info">
      <header class="c-header--dash">
        <h4 class="c-header__heading" >Hi <?php echo esc_html( $current_user->first_name ); ?>,</h4>
      </header>
      <div class="l-user-dashboard__body">
        <p>We hope you are enjoying <b><i><?php echo esc_html( $site_title ); ?>.</i></b></p>

        <p>Your Current Score: <b><?php echo esc_html( $user_score ); ?></b></p>
        <p>Your Overall Ranking: <b><?php echo esc_html( absint( $rank )); ?></b></p>
      </div>
      <footer class="l-user-dashboard__footer">
        <a href="/acpgc-user-profile">Update your profile</a><br>
          <?php if ( is_user_logged_in() ) : ?>
            <a class="logout-link" href="<?php echo esc_url( wp_logout_url( home_url('/acpgc-login/') ) ); ?>">Logout</a>
          <?php endif; ?>
      </footer>
    </div>
  </div>
</div>

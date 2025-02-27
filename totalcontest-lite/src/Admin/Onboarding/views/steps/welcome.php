<script type="text/ng-template" id="welcome-component-template">
    <div class="hero">
        <h2 class="title"><?php echo esc_html( $this->getContent( 'welcome.title' ) ) ?></h2>
        <p class="lead"><?php echo esc_html( $this->getContent( 'welcome.description' ) ) ?></p>
        <img src="<?php echo esc_attr( $this->env['url'] ); ?>assets/dist/images/onboarding/hey.svg" alt="Hey!">
    </div>

    <div class="row no-gutters benefits">
		<?php foreach ( $this->getContent( 'welcome.benefits', [] ) as $benefit ): ?>
            <div class="col benefits-item">
                <span class="material-icons"><?php echo esc_html( $benefit['icon'] ) ?></span>
                <h5><?php echo esc_html( $benefit['title'] ) ?></h5>
                <p><?php echo esc_html( $benefit['description'] ) ?></p>
            </div>
		<?php endforeach; ?>
    </div>
</script>

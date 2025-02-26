
<?php      
// Exit if accessed directly 
if ( ! defined( 'ABSPATH' ) ) exit; 

?>


<?php if ('design-2' === $settings['select_design']): ?>
    <div class="flexitype_team_two-item <?php echo esc_attr($settings['team_social_visibility']); ?>">
		<div class="flexitype_team_two-item-image">
            <?php
            if ($team_image['url']) {
                if (!empty($team_image['alt'])) {
                    echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr($team_image['alt']) . '" />';
                } else {
                    echo '<img src="' . esc_url($team_image['url']) . '" alt="' . esc_attr(__('No alt text', 'flexitype-lite')) . '" />';
                }
            } ?>
		</div>
		<div class="flexitype_team_two-item-content <?php echo esc_attr($settings['team_content_visibility']); ?>">
            <div class="title">
                <h4>
                    <?php if ( ! empty( $settings['team_url']['url'] ) ) : ?>
                        <a <?php echo $this->get_render_attribute_string( 'team_url' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
                            <?php echo esc_html( $settings['title_one'] ); ?>
                        </a>
                    <?php else : ?>
                        <?php echo esc_html( $settings['title_one'] ); ?>
                    <?php endif; ?>
                </h4>
                <span><?php echo esc_html($settings['sub_title']); ?></span>
            </div>
            <?php if ('yes' === $settings['show_social'] && !empty($settings['social_media'])): ?>
			<div class="flexitype_team_two-item-content-social">
				<ul>
                <?php foreach ($settings['social_media'] as $key => $item):
                    if (!empty($item['social_link']['url'])) {
                        $this->add_link_attributes('social_link', $item['social_link']);
                    }
                    $link_key = 'link_' . $key;
                    $this->add_link_attributes($link_key, $item['social_link']);
                ?>
                    <li><a <?php $this->print_render_attribute_string($link_key); ?>>
                    <?php \Elementor\Icons_Manager::render_icon($item['social_icon'], ['aria-hidden' => 'true']); ?>
                    </a></li>
                <?php endforeach; ?>
				</ul>
			</div>
            <?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<?php
/**
 * Element Controls
 */
$choices = array();
$blocks  = get_posts(array(
  'post_type' => 'global-blocks',
  'post_status' => 'publish',
  'posts_per_page' => -1
));

if ($blocks) {
  $choices[] = array(
    'value' => '',
    'label' => __('Select a block...', 'global-blocks-cornerstone')
  );
  foreach ($blocks as $block) {
    $choices[] = array(
      'value' => $block->ID,
      'label' => $block->post_title
    );
  }
}

if (empty($blocks)) {
  $choices[] = array(
    'value' => '',
    'label' => __('No blocks available', 'global-blocks-cornerstone'),
    'disabled' => true
  );
}

return array(
  'block' => array(
    'type' => 'select',
    'ui' => array(
      'title' => __('Global Block', 'global-blocks-cornerstone'),
      'tooltip' => __('Select which global block to add.', 'global-blocks-cornerstone')
    ),
    'options' => array(
      'choices' => $choices
    )
  ),
  'common' => array( '!id', '!style', '!class' )
);
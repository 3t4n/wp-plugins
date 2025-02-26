<ul class="<?php echo $pre; ?>-feed">
    <?php if($count == 0): ?>
    <li>No Posts</li>
    <?php else: ?>
    <?php foreach($items as $item): ?>
    <li class="<?php echo $pre; ?>-feed-link-wrap">
        <a class="<?php echo $pre; ?>-feed-link" href="<?php echo esc_url($item->get_permalink()); ?>" target="_blank">
           &bull;<span class="<?php echo $pre; ?>-feed-title"><?php echo wp_strip_all_tags($item->get_description()); ?></span>
        </a>
    </li>
    <?php endforeach; endif; ?>
</ul>
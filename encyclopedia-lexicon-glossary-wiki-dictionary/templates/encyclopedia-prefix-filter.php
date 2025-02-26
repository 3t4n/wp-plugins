<?php
/*
- Use the $filter var to access all available filters
- User $wrapper_class to add additional wrapper classes
*/
?>
<div class="encyclopedia-prefix-filters <?php echo esc_attr($wrapper_class ?? '') ?>">
    <?php foreach ($filter as $level => $filter_line) : ?>
        <div class="filter-level level-<?php echo $level + 1 ?>">
            <?php foreach ($filter_line as $element) : $element->caption = HTMLEntities($element->prefix, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8') ?>
                <span class="filter <?php echo ($element->active) ? 'current-filter ' : '' ?> <?php echo ($element->disabled) ? 'disabled-filter ' : '' ?>">
                    <?php if ($element->disabled) : ?>
                        <span class="filter-link"><?php echo $element->caption ?></span>
                    <?php else : ?>
                        <a href="<?php echo $element->link ?>" class="filter-link"><?php echo $element->caption ?></a>
                    <?php endif ?>
                </span>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
</div>
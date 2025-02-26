<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2019-2023 Thomas Weidlich GNU GPL v3 */

if ($props['number']) : ?>
<div>
    <?php echo $props['number'] ?><?php echo $props['unit'] ? ' ' . $props['unit'] : '' ?><?php echo $props['text'] ? ' ' . $props['text'] : '' ?>
</div>
<?php endif ?>

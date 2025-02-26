<?php

/* Herzog Dupont for YOOtheme Pro Copyright (C) 2018-2023 Thomas Weidlich GNU GPL v3 */

if ($props['content']) : ?>
<div><?php echo $props['content'] ?></div>
<?php endif ?>
<progress value="<?php echo $props['stop'] ?>" max="<?php echo $props['max'] ?>"><?php echo $props['stop'] ?>/<?php echo $props['max'] ?></progress>

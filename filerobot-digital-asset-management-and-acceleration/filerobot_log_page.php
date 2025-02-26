<?php
$page_size = 50;
$current   = isset($_GET['lp']) ? (int) $_GET['lp'] : 1;
$offset    = $page_size * ($current-1);
global $wpdb;
$total     = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}filerobot_remote_mapping");
$logs      = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}filerobot_remote_mapping ORDER BY updated DESC, id DESC LIMIT {$page_size} OFFSET {$offset}");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="filerobot-box table-responsive">
    <h1><?php echo 'Scaleflex DAM Logs'; ?></h1>

    <table class="table" id="logs">
        <thead>
        <tr>
            <th><?php echo 'ID'; ?></th>
            <th><?php echo 'Post ID'; ?></th>
            <th><?php echo 'Remote Name'; ?></th>
            <th><?php echo 'Local Name'; ?></th>
            <th><?php echo 'UUID'; ?></th>
            <th><?php echo 'SHA1'; ?></th>
            <th><?php echo 'Container'; ?></th>
            <th><?php echo 'Status'; ?></th>
            <th><?php echo 'In Progress'; ?></th>
            <th><?php echo 'Created'; ?></th>
            <th><?php echo 'Updated'; ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($logs as $log): ?>
            <tr>
                <td><?php echo $log->id; ?></td>
                <td><?php echo $log->post_id; ?></td>
                <td><?php echo $log->remote_name; ?></td>
                <td><?php echo $log->local_name; ?></td>
                <td><?php echo $log->uuid; ?></td>
                <td><?php echo $log->sha; ?></td>
                <td><?php echo $log->container; ?></td>
                <td><?php echo $log->status; ?></td>
                <td><?php echo $log->in_progress; ?></td>
                <td><?php echo $log->created; ?></td>
                <td><?php echo $log->updated; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="tablenav bottom">
        <div class="tablenav-pages">
            <?php
            $i    = 1;
            $all  = ceil($total/$page_size);
            $prev = $current-1;
            $next = $current+1;
            ?>

            <?php if ($prev < 1): ?>
                <span class="button disabled">‹</span>
            <?php else: ?>
                <a class="button" href="<?php echo admin_url() . 'admin.php?page=scaleflex-dam&tab=logs&lp='.$prev; ?>">
                    <span>‹</span>
                </a>
            <?php endif; ?>

            <?php while ($i <= $all): ?>
                <?php if ($i === $current): ?>
                    <span class="button disabled"><?php echo $i; ?></span>
                <?php else: ?>
                    <a class="button" href="<?php echo admin_url() . 'admin.php?page=scaleflex-dam&tab=logs&lp='.$i; ?>">
                        <span><?php echo $i; ?></span>
                    </a>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endwhile; ?>

            <?php if ($next > $all): ?>
                <span class="button disabled">›</span>
            <?php else: ?>
                <a class="button" href="<?php echo admin_url() . 'admin.php?page=scaleflex-dam&tab=logs&lp='.$next; ?>">
                    <span>›</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>

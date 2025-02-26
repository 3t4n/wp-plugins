<?php include('common/header.php'); ?>
<?php foreach ($types as $type => $o) { ?>
    <div class="formRow">
        <input type="text" class="searchBox" value='Search...' onfocus="this.value='';this.focus=null" />
    </div>
    <table id="autoUrlTable_<?php echo $type;?>" class="wp-list-table widefat autoUrlTable" cellspacing="0">
        <thead>
            <tr>
                <th class="checkbox"></th>
                <th class="title">
                    <a href="<?php echo $url; ?>">Title</a> 
                    (Type: <?php echo $o->label;?>)
                </th>
                <th class="defaultUrl"><a href="<?php echo $url; ?>s=du">Default URL</a></th>
                <th class="customUrl"><a href="<?php echo $url; ?>s=cu">Custom URL</a></th>
                <th class="action">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $u) { ?>
                <?php if ($u->post_type == $type) { ?>
                    <tr>
                        <td>
                            <input type="hidden" name="p[<?php echo $u->ID; ?>]" value="0" />
                            <input type="checkbox" name="p[<?php echo $u->ID; ?>]" value="1" />
                        </td>
                        <td><b><?php echo $u->post_title; ?></b> (<?php echo $u->post_type; ?>)</td>
                        <td><a href="<?php echo get_permalink($u->ID); ?>" target="_blank"><?php echo get_permalink($u->ID); ?></a></td>
                        <td><a href="<?php echo!empty($u->link) ? site_url() . $u->link : '#'; ?>" target="_blank"><?php echo!empty($u->link) ? site_url() . $u->link : ''; ?></a></td>
                        <td class="action">
                            <a href="<?php echo $url; ?>&action=regen&id=<?php echo $u->ID; ?>">Regenerate</a>
                            <?php if (!empty($u->url_id)) { ?>
                                | <a href="<?php echo $url; ?>&action=remove&id=<?php echo $u->url_id; ?>">Delete</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>
<?php include('common/footer.php'); ?>
<?php
/*******************************************************************************
    Wordpress IDX and Contact Manager Plugin
    Copyright (C) 2010-2011 StormRETS, Inc.

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*******************************************************************************/
?>

<?php $queries = json_decode(get_user_meta($current_user->ID, 'as_saved_queries', true)); ?>
<?php $properties = json_decode(get_user_meta($current_user->ID, 'as_saved_properties', true)); ?>

<?php if (AgentStormSettingCache::get('as_loggedinwidget_desc')): ?><p><?php echo AgentStormSettingCache::get('as_loggedinwidget_desc'); ?></p><?php endif; ?>
<ul>
    <li>
        <strong>My Saved Searches</strong> [<a href="/user/clearsearch">Clear</a>]
        <ul>
            <?php if ($queries): ?>
                <?php foreach ($queries as $query_id => $query): ?>
                <li><a href="<?php echo get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_searchprefix'); ?>?<?php foreach($query as $k => $v): echo $k . '=' . $v . '&'; endforeach; ?>">Query #<?php echo $query_id+1; ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No Saved Searches to display</li>
            <?php endif; ?>
        </ul>
    </li>
    <li>
        <strong>My Saved Properties</strong> [<a href="/user/clearproperty">Clear</a>]
        <ul>
            <?php if ($properties): ?>
                <?php foreach ($properties as $p): ?>
                <li><a href="<?php echo get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_searchprefix'); ?>?as_mlsnumber=<?php echo $p->ListingId; ?>&as_searchwidget_submit=1"><?php echo $p->FullAddress; ?></a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No Saved Properties to display</li>
            <?php endif; ?>
        </ul>
    </li>
</ul>
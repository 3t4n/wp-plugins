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

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" />
    
    <?php if (AgentStormSettingCache::get('as_navigationwidget_desc')): ?>
    <p>
        <?php echo AgentStormSettingCache::get('as_navigationwidget_desc'); ?>
    </p>
    <?php endif; ?>
    
    <div class="agentstorm-navigation">
        
        <ul>
            <?php $last_state = null; ?>
            <?php foreach($cities->Cities as $city): ?>
                <?php //if ($last_state == null) { $last_state = $city->State; } ?>
                <?php if ($last_state != $city->State && $close_required): ?>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if ($last_state != $city->State): ?>
                <li>
                    <a href="<?php echo $this->getPermalink(get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_stateurlprefix'), $city); ?>">Properties For Sale in <?php echo (strlen($city->State) == 2) ? strtoupper($city->State) :  ucwords(strtolower($city->State)); ?></a>
                    <ul>
                    <?php $close_required = true; ?>
                <?php endif; ?>
                    <?php if (!empty($city->State) && !empty($city->City)): ?>
                        <li><a href="<?php echo $this->getPermalink(get_bloginfo('url', 'display') . '/' . AgentStormSettingCache::get('as_idx_cityurlprefix'), $city); ?>"><?php echo ucwords(strtolower($city->City)); ?></a></li>
                    <?php endif; ?>
                <?php $last_state = $city->State; ?>
            <?php endforeach; ?>
        </ul>
        
    </div>

</form>
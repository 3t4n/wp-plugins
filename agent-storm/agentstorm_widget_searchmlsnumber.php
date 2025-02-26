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

<form action="<?php echo bloginfo('url'); ?>/<?php echo AgentStormSettingCache::get('as_idx_searchprefix'); ?>" method="GET" />
    
    <?php if (AgentStormSettingCache::get('as_searchmlsnumberwidget_desc')): ?>
    <p>
        <?php echo AgentStormSettingCache::get('as_searchmlsnumberwidget_desc'); ?>
    </p>
    <?php endif; ?>
    
    <div class="agentstorm-search">
        
        <div class="agentstorm-formitem">
            <label>MLS Number</label><br />
            <input type="text" name="as_mlsnumber" value="<?php echo $_GET['as_mlsnumber']; ?>" />
        </div>
        
        <div class="agentstorm-search-submit">
            <button <?php if(AgentStormSettingCache::get('as_contact_loginhook', false) && AgentStormSettingCache::get('as_force_login', false)): ?>class="required_login"<?php endif; ?>><?php echo (AgentStormSettingCache::get('as_searchwidget_button')) ? AgentStormSettingCache::get('as_searchwidget_button') : 'Search'; ?></button>
        </div>
        
        <input type="hidden" name="as_searchwidget_submit" value="1" />
        
    </div>

</form>
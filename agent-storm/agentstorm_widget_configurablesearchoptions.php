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

    <label>Title</label><br />
    <input type="text" name="as_configurablesearchwidget_title" value="<?php echo AgentStormSettingCache::get('as_configurablesearchwidget_title'); ?>" class="widefat" />
    <label>Description</label><br />
    <input type="text" name="as_configurablesearchwidget_desc" value="<?php echo AgentStormSettingCache::get('as_configurablesearchwidget_desc'); ?>" class="widefat" />
    <label>Searchable Fields</label><br />
    <input type="checkbox" name="as_configurablesearchwidget_type" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_type', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Property Type'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_suburbzip" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_suburbzip', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Suburb/Zip Code'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_subdivision" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_subdivision', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Sub Division'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_price" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_price', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Price Range'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_bedrooms" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_bedrooms', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Bedrooms'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_bathrooms" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_bathrooms', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Bathrooms'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_lotsize" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_lotsize', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Lot Size'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_size" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_size', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Size'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_shortsale" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_shortsale', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Short Sales'); ?></span><br />
    <input type="checkbox" name="as_configurablesearchwidget_foreclosure" value="1" <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_foreclosure', false)): ?>checked="checked"<?php endif; ?> /> <span class="small"><?php echo _('Foreclosure'); ?></span><br />
    <input type="hidden" name="as_configurablesearchwidget_save" value="1" />
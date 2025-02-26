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

<?php if (AgentStormSettingCache::get('as_searchdetailswidget_desc')): ?>
<p>
    <?php echo AgentStormSettingCache::get('as_searchdetailswidget_desc'); ?>
</p>
<?php endif; ?>

<form action="<?php echo bloginfo('url'); ?>/<?php echo AgentStormSettingCache::get('as_idx_searchprefix'); ?>" method="GET">
    
    <input type="hidden" name="as_mlsnumber" value="<?php echo (array_key_exists("as_mlsnumber", $_GET)) ? $_GET['as_mlsnumber'] : ''; ?>" />
    <input type="hidden" name="as_city" value="<?php echo (array_key_exists("as_city", $_GET)) ? $_GET['as_city'] : ''; ?>" />
    <input type="hidden" name="as_suburbzip" value="<?php echo (array_key_exists("as_suburbzip", $_GET)) ? $_GET['as_suburbzip'] : ''; ?>" />
    <input type="hidden" name="as_subdivision" value="<?php echo (array_key_exists("as_subdivision", $_GET)) ? $_GET['as_subdivision'] : ''; ?>" />
    <input type="hidden" name="as_lotsize_min" value="<?php echo (array_key_exists("as_lotsize_min", $_GET)) ? $_GET['as_lotsize_min'] : ''; ?>" />
    <input type="hidden" name="as_lotsize_max" value="<?php echo (array_key_exists("as_lotsize_max", $_GET)) ? $_GET['as_lotsize_max'] : ''; ?>" />
    <input type="hidden" name="as_size_min" value="<?php echo (array_key_exists("as_size_min", $_GET)) ? $_GET['as_size_min'] : ''; ?>" />
    <input type="hidden" name="as_size_max" value="<?php echo (array_key_exists("as_size_max", $_GET)) ? $_GET['as_size_max'] : ''; ?>" />
    <input type="hidden" name="as_pricerange_min" value="<?php echo (array_key_exists("as_pricerange_min", $_GET)) ? $_GET['as_pricerange_min'] : ''; ?>" />
    <input type="hidden" name="as_pricerange_max" value="<?php echo (array_key_exists("as_pricerange_max", $_GET)) ? $_GET['as_pricerange_max'] : ''; ?>" />
    <input type="hidden" name="as_bedrooms" value="<?php echo (array_key_exists("as_bedrooms", $_GET)) ? $_GET['as_bedrooms'] : ''; ?>" />
    <input type="hidden" name="as_bathrooms" value="<?php echo (array_key_exists("as_bathrooms", $_GET)) ? $_GET['as_bathrooms'] : ''; ?>" />
    <input type="hidden" name="as_shortsale" value="<?php echo (array_key_exists("as_shortsale", $_GET)) ? $_GET['as_shortsale'] : ''; ?>" />
    <input type="hidden" name="as_foreclosure" value="<?php echo (array_key_exists("as_foreclosure", $_GET)) ? $_GET['as_foreclosure'] : ''; ?>" />
    
    <input type="hidden" name="offset" value="<?php (array_key_exists("offset", $_GET)) ? $_GET['offset'] : ''; ?>" />
    <input type="hidden" name="sort" value="<?php (array_key_exists("sort", $_GET)) ? $_GET['sort'] : ''; ?>" />
    <input type="hidden" name="limit" value="<?php (array_key_exists("limit", $_GET)) ? $_GET['limit'] : ''; ?>" />
    
    <div class="agentstorm-formitem">
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_res', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="RES" <?php if ($_GET['as_propertytype'] == 'RES' || @in_array('RES', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Single Family Homes<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_mfh', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="MFH" <?php if ($_GET['as_propertytype'] == 'MFH' || @in_array('MFH', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Multi Family Homes<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_mob', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="MOB" <?php if ($_GET['as_propertytype'] == 'MOB' || @in_array('MOB', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Mobile Homes<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_lnd', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="LND" <?php if ($_GET['as_propertytype'] == 'LND' || @in_array('LND', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Lots and Land<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_com', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="COM" <?php if ($_GET['as_propertytype'] == 'COM' || @in_array('COM', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Commercial<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_rnt', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="RNT" <?php if ($_GET['as_propertytype'] == 'RNT' || @in_array('RNT', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Rentals<br /><?php endif; ?>
    </div>
    
    <div class="agentstorm-search-submit">
        <button <?php if(AgentStormSettingCache::get('as_contact_loginhook', false) && AgentStormSettingCache::get('as_force_login', false)): ?>class="required_login"<?php endif; ?>>Filter</button>
    </div>
    
    <input type="hidden" name="as_searchwidget_submit" value="1" />
    
</form>
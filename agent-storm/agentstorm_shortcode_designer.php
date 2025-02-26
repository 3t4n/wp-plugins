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

<div>
    
    <div id="agentstorm-logo" style="position:relative; margin-top:2em; margin-bottom:0;"></div>
    
    <p>
        Using the fields below build your Agent Storm Shortcode for inclusion in your Posts.
    </p>
    
    <div class="agentstorm-input">
        <label><?php echo _('Template'); ?>:</label><br />
        <span class="small"><?php echo _('Select the Template to be used'); ?></span><br />
        <select id="as_template" rel="">
            <option value="small">Small</option>
            <option value="tabbed">Tabbed</option>
            <option value="advanced">Advanced</option>
            <option value="latest">Latest</option>
            <option value="search">Search</option>
        </select>
    </div>
    
    <div class="agentstorm-input">
        <label>Search Options</label><br />
        <input type="checkbox" id="as_showmap" /> <?php echo _('Show Map'); ?><br />
        <input type="checkbox" id="as_showpager" /> <?php echo _('Show Pager'); ?><br />
        <input type="checkbox" id="as_showcount" /> <?php echo _('Show Result Count'); ?>
    </div>
    
    <div class="agentstorm-input" rel="agent_id">
        <label><?php echo _('Agent Id'); ?>:</label><br />
        <span class="small"><?php echo _('Show the Properties that have the following Agent Id'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="mls_number">
        <label><?php echo _('MLS Number'); ?>:</label><br />
        <span class="small"><?php echo _('Show the property with the following MLS Number'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="city">
        <label><?php echo _('City'); ?>:</label><br />
        <span class="small"><?php echo _('Show the Properties that are in the following City'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="subdivision">
        <label><?php echo _('Sub Division'); ?>:</label><br />
        <span class="small"><?php echo _('Show the Properties that are in the following Sub Division'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="beds">
        <label><?php echo _('Bedrooms'); ?>:</label><br />
        <span class="small"><?php echo _('Show the Properties that have the following number of Bedrooms'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="baths">
        <label><?php echo _('Full Bathrooms'); ?>:</label><br />
        <span class="small"><?php echo _('Show the Properties that have the following number of Full Bathrooms'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="zip">
        <label><?php echo _('Zip Code'); ?>:</label><br />
        <span class="small"><?php echo _('Show the Properties that are in the following ZipCode'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="price">
        <label><?php echo _('Price'); ?>:</label><br />
        <span class="small"><?php echo _('Show the Properties that have the following Price'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="lotsqft">
        <label><?php echo _('Lot Square Feet'); ?>:</label><br />
        <span class="small"><?php echo _('About..'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="sqft">
        <label><?php echo _('Square Feet'); ?>:</label><br />
        <span class="small"><?php echo _('About..'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input">
        <label><?php echo _('Is Shortsale'); ?>:</label><br />
        <span class="small"><?php echo _('Show only properties that are short sales'); ?></span><br />
        <input type="checkbox" id="as_shortsale" />
    </div>
    
    <div class="agentstorm-input">
        <label><?php echo _('Bank Owned/Foreclosures'); ?>:</label><br />
        <span class="small"><?php echo _('Show only properties that are Bank Owned/Foreclosures'); ?></span><br />
        <input type="checkbox" id="as_foreclosure" />
    </div>
    
    <div class="agentstorm-input" rel="waterfrontlocation">
        <label><?php echo _('Waterfront Location'); ?>:</label><br />
        <span class="small"><?php echo _('Show only properties that have the following Waterfront Location'); ?></span><br />
        <select rel="querytype">
            <option value="eq">Equals</option>
            <option value="gt">Greater Than</option>
            <option value="lt">Less Than</option>
            <option value="bt">Between</option>
        </select>
        <input type="text" rel="value1" />
        <span rel="extra" style="display:none;">and</span>
        <input type="text" style="display:none;" rel="value2" />
    </div>
    
    <div class="agentstorm-input" rel="limit">
        <label><?php echo _('Limit'); ?>:</label><br />
        <span class="small"><?php echo _('About..'); ?></span><br />
        <input type="text" id="as_limit" value="10" />
    </div>
    
    <?php $fields = array(); ?>
    <?php foreach (AgentStormSettingCache::get('as_metadata') as $metadata): ?>
        <?php foreach ($metadata->Fields as $field): ?>
            <?php if (!in_array($field->Name, $fields)) $fields[] = $field->Name; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
    
    <div class="agentstorm-input" rel="sort">
        <label><?php echo _('Sort'); ?>:</label><br />
        <span class="small"><?php echo _('About..'); ?></span><br />
        <select>
            <?php foreach ($fields as $field): ?>
            <option value="<?php echo $field; ?>"><?php echo $field; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="agentstorm-input" rel="sort_direction">
        <label><?php echo _('Sort Direction'); ?>:</label><br />
        <span class="small"><?php echo _('About..'); ?></span><br />
        <select>
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
        </select>
    </div>
    
    <div class="agentstorm-input" style="margin-top:1em;padding-top:1em;border-top: 1px solid #DDD;">
        <input name="as_idx_permalinks_save" class="button-secondary" value="<?php echo _('Insert Generated Short Code'); ?>" type="button" />
    </div>
    
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            
            // Initialize the Inputs depending on the Query Type
            //
            jQuery('select[rel=querytype]').bind('change', function() {
                switch (jQuery(this).val()) {
                    case 'eq':
                    case 'gt':
                    case 'lt':
                        jQuery('SPAN[rel=extra]', jQuery(this).parent()).hide();
                        jQuery('INPUT[rel=value2]', jQuery(this).parent()).hide();
                        break;
                    case 'bt':
                        jQuery('SPAN[rel=extra]', jQuery(this).parent()).show();
                        jQuery('INPUT[rel=value2]', jQuery(this).parent()).show();
                        break;
                }
            });
        });
    </script>
    
    <style>
        SELECT {
            padding: 0;
        }
    </style>
    
</div>
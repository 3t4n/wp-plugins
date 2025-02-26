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
    <input type="hidden" name="offset" value="<?php echo (array_key_exists("offset", $_GET)) ? $_GET['offset'] : ''; ?>" />
    <input type="hidden" name="sort" value="<?php echo (array_key_exists("sort", $_GET)) ? $_GET['sort'] : ''; ?>" />
    <input type="hidden" name="sort_direction" value="<?php echo (array_key_exists("sort_direction", $_GET)) ? $_GET['sort_direction'] : ''; ?>" />
    <input type="hidden" name="limit" value="<?php echo (array_key_exists("limit", $_GET)) ? $_GET['limit'] : ''; ?>" />
    
    <?php if (AgentStormSettingCache::get('as_configurablesearchwidget_summary', false)): ?>
        
        <?php $shown = false; ?>
        
        <?php if (array_key_exists("as_mlsnumber", $_GET) && !empty($_GET['as_mlsnumber'])): ?>
            <div class="agentstorm-formitem">
                <strong>MLS Number:</strong><br /><?php echo $_GET['as_mlsnumber']; ?>
            </div>
            <?php $shown = true; ?>
        <?php endif; ?>
        
        <?php if (array_key_exists("as_propertytype", $_GET) && !empty($_GET['as_propertytype'])): ?>
            <div class="agentstorm-formitem">
                <strong>Property Type:</strong><br /><?php echo (is_array($_GET['as_propertytype'])) ? implode(', ', $_GET['as_propertytype']) : $_GET['as_propertytype']; ?>
            </div>
            <?php $shown = true; ?>
        <?php endif; ?>
        
        <?php if (array_key_exists("as_city", $_GET) && !empty($_GET['as_city'])): ?>
            <div class="agentstorm-formitem">
                <strong>City:</strong><br /><?php echo $_GET['as_city']; ?>
            </div>
            <?php $shown = true; ?>
        <?php endif; ?>
        
        <?php if (array_key_exists("as_suburbzip", $_GET) && !empty($_GET['as_suburbzip'])): ?>
            <div class="agentstorm-formitem">
                <strong>Suburb:</strong><br /><?php echo $_GET['as_suburbzip']; ?>
            </div>
            <?php $shown = true; ?>
        <?php endif; ?>
        
        <?php if (array_key_exists("as_subdivision", $_GET) && !empty($_GET['as_subdivision'])): ?>
            <div class="agentstorm-formitem">
                <strong>Sub Division:</strong><br /><?php echo $_GET['as_subdivision']; ?>
            </div>
            <?php $shown = true; ?>
        <?php endif; ?>
        
        <?php if (array_key_exists("as_bedrooms", $_GET) && !empty($_GET['as_bedrooms'])): ?>
            <div class="agentstorm-formitem">
                <strong>Bedrooms:</strong><br /><?php echo $_GET['as_bedrooms']; ?>
            </div>
            <?php $shown = true; ?>
        <?php endif; ?>
        
        <?php if (array_key_exists("as_bathrooms", $_GET) && !empty($_GET['as_bathrooms'])): ?>
            <div class="agentstorm-formitem">
                <strong>Bathrooms:</strong><br /><?php echo $_GET['as_bathrooms']; ?>
            </div>
            <?php $shown = true; ?>
        <?php endif; ?>
        
        <?php
            if (isset($_GET['as_pricerange_min']) && isset($_GET['as_pricerange_max']) && $_GET['as_pricerange_min'] > 0 && $_GET['as_pricerange_max'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Between:</strong><br />$".number_format($_GET['as_pricerange_min'])." and $".number_format($_GET['as_pricerange_max'])."</div>";
                $shown = true;
                
            } elseif (isset($_GET['as_pricerange_min']) && $_GET['as_pricerange_min'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Greater than:</strong><br />$".number_format($_GET['as_pricerange_min'])."</div>";
                $shown = true;
                
            } elseif (isset($_GET['as_pricerange_max']) && $_GET['as_pricerange_max'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Less than:</strong><br />$".number_format($_GET['as_pricerange_max'])."</div>";
                $shown = true;
                
            }
        ?>
    
        <?php
            if (isset($_GET['as_lotsize_min']) && isset($_GET['as_lotsize_max']) && $_GET['as_lotsize_min'] > 0 && $_GET['as_lotsize_max'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Between:</strong><br />".$_GET['as_lotsize_min']." and ".$_GET['as_lotsize_max']." square feet</div>";
                $shown = true;
                
            } elseif (isset($_GET['as_lotsize_min']) && $_GET['as_lotsize_min'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Greater than:</strong><br />".$_GET['as_lotsize_min']." square feet</div>";
                $shown = true;
                
            } elseif (isset($_GET['as_lotsize_max']) && $_GET['as_lotsize_max'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Less than:</strong><br />".$_GET['as_lotsize_max']." square feet</div>";
                $shown = true;
                
            }
        ?>
        
        <?php
            if (isset($_GET['as_size_min']) && isset($_GET['as_size_max']) && $_GET['as_size_min'] > 0 && $_GET['as_size_max'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Between:</strong><br />".$_GET['as_size_min']." and ".$_GET['as_size_max']." square feet</div>";
                $shown = true;
                
            } elseif (isset($_GET['as_size_min']) && $_GET['as_size_min'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Greater than:</strong><br />".$_GET['as_size_min']." square feet</div>";
                $shown = true;
                
            } elseif (isset($_GET['as_size_max']) && $_GET['as_size_max'] > 0) {
                echo "<div class=\"agentstorm-formitem\"><strong>Less than:</strong><br />".$_GET['as_size_max']." square feet</div>";
                $shown = true;
                
            }
        ?>
        
        <?php if (!$shown): ?>
            <div class="agentstorm-formitem">
                Showing all Properties
            </div>
        <?php endif; ?>
        
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_suburbzip', true)): ?>
    <div class="agentstorm-formitem">
        <label>Suburb or Zip Code</label><br />
        <input type="text" id="agentstorm-dd-suburbzip" name="as_suburbzip" value="<?php echo (array_key_exists("as_suburbzip", $_GET)) ? $_GET['as_suburbzip'] : ''; ?>" />
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_subdivision', true)): ?>
    <div class="agentstorm-formitem">
        <label>Sub Division</label><br />
        <input type="text" id="agentstorm-dd-subdivision" name="as_subdivision" value="<?php echo (array_key_exists("as_subdivision", $_GET)) ? $_GET['as_subdivision'] : ''; ?>" />
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_price', true)): ?>
    <div class="agentstorm-formitem" style="margin-top:2em;">
        <label><strong>Price</strong></label>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_pricerange_min">
            <option value="">No Min</option>
            <option value="10000" <?php if ($_GET['as_pricerange_min'] == 10000): ?>selected="selected"<?php endif; ?>>$10,000</option>
            <option value="20000" <?php if ($_GET['as_pricerange_min'] == 20000): ?>selected="selected"<?php endif; ?>>$20,000</option>
            <option value="30000" <?php if ($_GET['as_pricerange_min'] == 30000): ?>selected="selected"<?php endif; ?>>$30,000</option>
            <option value="40000" <?php if ($_GET['as_pricerange_min'] == 40000): ?>selected="selected"<?php endif; ?>>$40,000</option>
            <option value="50000" <?php if ($_GET['as_pricerange_min'] == 50000): ?>selected="selected"<?php endif; ?>>$50,000</option>
            <option value="60000" <?php if ($_GET['as_pricerange_min'] == 60000): ?>selected="selected"<?php endif; ?>>$60,000</option>
            <option value="70000" <?php if ($_GET['as_pricerange_min'] == 70000): ?>selected="selected"<?php endif; ?>>$70,000</option>
            <option value="80000" <?php if ($_GET['as_pricerange_min'] == 80000): ?>selected="selected"<?php endif; ?>>$80,000</option>
            <option value="90000" <?php if ($_GET['as_pricerange_min'] == 90000): ?>selected="selected"<?php endif; ?>>$90,000</option>
            <option value="100000" <?php if ($_GET['as_pricerange_min'] == 100000): ?>selected="selected"<?php endif; ?>>$100,000</option>
            <option value="125000" <?php if ($_GET['as_pricerange_min'] == 125000): ?>selected="selected"<?php endif; ?>>$125,000</option>
            <option value="150000" <?php if ($_GET['as_pricerange_min'] == 150000): ?>selected="selected"<?php endif; ?>>$150,000</option>
            <option value="175000" <?php if ($_GET['as_pricerange_min'] == 175000): ?>selected="selected"<?php endif; ?>>$175,000</option>
            <option value="200000" <?php if ($_GET['as_pricerange_min'] == 200000): ?>selected="selected"<?php endif; ?>>$200,000</option>
            <option value="225000" <?php if ($_GET['as_pricerange_min'] == 225000): ?>selected="selected"<?php endif; ?>>$225,000</option>
            <option value="250000" <?php if ($_GET['as_pricerange_min'] == 250000): ?>selected="selected"<?php endif; ?>>$250,000</option>
            <option value="275000" <?php if ($_GET['as_pricerange_min'] == 275000): ?>selected="selected"<?php endif; ?>>$275,000</option>
            <option value="300000" <?php if ($_GET['as_pricerange_min'] == 300000): ?>selected="selected"<?php endif; ?>>$300,000</option>
            <option value="350000" <?php if ($_GET['as_pricerange_min'] == 350000): ?>selected="selected"<?php endif; ?>>$350,000</option>
            <option value="400000" <?php if ($_GET['as_pricerange_min'] == 400000): ?>selected="selected"<?php endif; ?>>$400,000</option>
            <option value="450000" <?php if ($_GET['as_pricerange_min'] == 450000): ?>selected="selected"<?php endif; ?>>$450,000</option>
            <option value="500000" <?php if ($_GET['as_pricerange_min'] == 500000): ?>selected="selected"<?php endif; ?>>$500,000</option>
            <option value="550000" <?php if ($_GET['as_pricerange_min'] == 550000): ?>selected="selected"<?php endif; ?>>$550,000</option>
            <option value="600000" <?php if ($_GET['as_pricerange_min'] == 600000): ?>selected="selected"<?php endif; ?>>$600,000</option>
            <option value="650000" <?php if ($_GET['as_pricerange_min'] == 650000): ?>selected="selected"<?php endif; ?>>$650,000</option>
            <option value="700000" <?php if ($_GET['as_pricerange_min'] == 700000): ?>selected="selected"<?php endif; ?>>$700,000</option>
            <option value="750000" <?php if ($_GET['as_pricerange_min'] == 750000): ?>selected="selected"<?php endif; ?>>$750,000</option>
            <option value="800000" <?php if ($_GET['as_pricerange_min'] == 800000): ?>selected="selected"<?php endif; ?>>$800,000</option>
            <option value="850000" <?php if ($_GET['as_pricerange_min'] == 850000): ?>selected="selected"<?php endif; ?>>$850,000</option>
            <option value="900000" <?php if ($_GET['as_pricerange_min'] == 900000): ?>selected="selected"<?php endif; ?>>$900,000</option>
            <option value="950000" <?php if ($_GET['as_pricerange_min'] == 950000): ?>selected="selected"<?php endif; ?>>$950,000</option>
            <option value="1000000" <?php if ($_GET['as_pricerange_min'] == 1000000): ?>selected="selected"<?php endif; ?>>$1,000,000</option>
            <option value="2000000" <?php if ($_GET['as_pricerange_min'] == 2000000): ?>selected="selected"<?php endif; ?>>$2,000,000</option>
            <option value="3000000" <?php if ($_GET['as_pricerange_min'] == 3000000): ?>selected="selected"<?php endif; ?>>$3,000,000</option>
            <option value="4000000" <?php if ($_GET['as_pricerange_min'] == 4000000): ?>selected="selected"<?php endif; ?>>$4,000,000</option>
            <option value="5000000" <?php if ($_GET['as_pricerange_min'] == 5000000): ?>selected="selected"<?php endif; ?>>$5,000,000</option>
            <option value="6000000" <?php if ($_GET['as_pricerange_min'] == 6000000): ?>selected="selected"<?php endif; ?>>$6,000,000</option>
            <option value="7000000" <?php if ($_GET['as_pricerange_min'] == 7000000): ?>selected="selected"<?php endif; ?>>$7,000,000</option>
            <option value="8000000" <?php if ($_GET['as_pricerange_min'] == 8000000): ?>selected="selected"<?php endif; ?>>$8,000,000</option>
            <option value="9000000" <?php if ($_GET['as_pricerange_min'] == 9000000): ?>selected="selected"<?php endif; ?>>$9,000,000</option>
        </select>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_pricerange_max">
            <option value="">No Max</option>
            <option value="10000" <?php if ($_GET['as_pricerange_max'] == 10000): ?>selected="selected"<?php endif; ?>>$10,000</option>
            <option value="20000" <?php if ($_GET['as_pricerange_max'] == 20000): ?>selected="selected"<?php endif; ?>>$20,000</option>
            <option value="30000" <?php if ($_GET['as_pricerange_max'] == 30000): ?>selected="selected"<?php endif; ?>>$30,000</option>
            <option value="40000" <?php if ($_GET['as_pricerange_max'] == 40000): ?>selected="selected"<?php endif; ?>>$40,000</option>
            <option value="50000" <?php if ($_GET['as_pricerange_max'] == 50000): ?>selected="selected"<?php endif; ?>>$50,000</option>
            <option value="60000" <?php if ($_GET['as_pricerange_max'] == 60000): ?>selected="selected"<?php endif; ?>>$60,000</option>
            <option value="70000" <?php if ($_GET['as_pricerange_max'] == 70000): ?>selected="selected"<?php endif; ?>>$70,000</option>
            <option value="80000" <?php if ($_GET['as_pricerange_max'] == 80000): ?>selected="selected"<?php endif; ?>>$80,000</option>
            <option value="90000" <?php if ($_GET['as_pricerange_max'] == 90000): ?>selected="selected"<?php endif; ?>>$90,000</option>
            <option value="100000" <?php if ($_GET['as_pricerange_max'] == 100000): ?>selected="selected"<?php endif; ?>>$100,000</option>
            <option value="125000" <?php if ($_GET['as_pricerange_max'] == 125000): ?>selected="selected"<?php endif; ?>>$125,000</option>
            <option value="150000" <?php if ($_GET['as_pricerange_max'] == 150000): ?>selected="selected"<?php endif; ?>>$150,000</option>
            <option value="175000" <?php if ($_GET['as_pricerange_max'] == 175000): ?>selected="selected"<?php endif; ?>>$175,000</option>
            <option value="200000" <?php if ($_GET['as_pricerange_max'] == 200000): ?>selected="selected"<?php endif; ?>>$200,000</option>
            <option value="225000" <?php if ($_GET['as_pricerange_max'] == 225000): ?>selected="selected"<?php endif; ?>>$225,000</option>
            <option value="250000" <?php if ($_GET['as_pricerange_max'] == 250000): ?>selected="selected"<?php endif; ?>>$250,000</option>
            <option value="275000" <?php if ($_GET['as_pricerange_max'] == 275000): ?>selected="selected"<?php endif; ?>>$275,000</option>
            <option value="300000" <?php if ($_GET['as_pricerange_max'] == 300000): ?>selected="selected"<?php endif; ?>>$300,000</option>
            <option value="350000" <?php if ($_GET['as_pricerange_max'] == 350000): ?>selected="selected"<?php endif; ?>>$350,000</option>
            <option value="400000" <?php if ($_GET['as_pricerange_max'] == 400000): ?>selected="selected"<?php endif; ?>>$400,000</option>
            <option value="450000" <?php if ($_GET['as_pricerange_max'] == 450000): ?>selected="selected"<?php endif; ?>>$450,000</option>
            <option value="500000" <?php if ($_GET['as_pricerange_max'] == 500000): ?>selected="selected"<?php endif; ?>>$500,000</option>
            <option value="550000" <?php if ($_GET['as_pricerange_max'] == 550000): ?>selected="selected"<?php endif; ?>>$550,000</option>
            <option value="600000" <?php if ($_GET['as_pricerange_max'] == 600000): ?>selected="selected"<?php endif; ?>>$600,000</option>
            <option value="650000" <?php if ($_GET['as_pricerange_max'] == 650000): ?>selected="selected"<?php endif; ?>>$650,000</option>
            <option value="700000" <?php if ($_GET['as_pricerange_max'] == 700000): ?>selected="selected"<?php endif; ?>>$700,000</option>
            <option value="750000" <?php if ($_GET['as_pricerange_max'] == 750000): ?>selected="selected"<?php endif; ?>>$750,000</option>
            <option value="800000" <?php if ($_GET['as_pricerange_max'] == 800000): ?>selected="selected"<?php endif; ?>>$800,000</option>
            <option value="850000" <?php if ($_GET['as_pricerange_max'] == 850000): ?>selected="selected"<?php endif; ?>>$850,000</option>
            <option value="900000" <?php if ($_GET['as_pricerange_max'] == 900000): ?>selected="selected"<?php endif; ?>>$900,000</option>
            <option value="950000" <?php if ($_GET['as_pricerange_max'] == 950000): ?>selected="selected"<?php endif; ?>>$950,000</option>
            <option value="1000000" <?php if ($_GET['as_pricerange_max'] == 1000000): ?>selected="selected"<?php endif; ?>>$1,000,000</option>
            <option value="2000000" <?php if ($_GET['as_pricerange_max'] == 2000000): ?>selected="selected"<?php endif; ?>>$2,000,000</option>
            <option value="3000000" <?php if ($_GET['as_pricerange_max'] == 3000000): ?>selected="selected"<?php endif; ?>>$3,000,000</option>
            <option value="4000000" <?php if ($_GET['as_pricerange_max'] == 4000000): ?>selected="selected"<?php endif; ?>>$4,000,000</option>
            <option value="5000000" <?php if ($_GET['as_pricerange_max'] == 5000000): ?>selected="selected"<?php endif; ?>>$5,000,000</option>
            <option value="6000000" <?php if ($_GET['as_pricerange_max'] == 6000000): ?>selected="selected"<?php endif; ?>>$6,000,000</option>
            <option value="7000000" <?php if ($_GET['as_pricerange_max'] == 7000000): ?>selected="selected"<?php endif; ?>>$7,000,000</option>
            <option value="8000000" <?php if ($_GET['as_pricerange_max'] == 8000000): ?>selected="selected"<?php endif; ?>>$8,000,000</option>
            <option value="9000000" <?php if ($_GET['as_pricerange_max'] == 9000000): ?>selected="selected"<?php endif; ?>>$9,000,000</option>
        </select>
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_type', true)): ?>
    <div class="agentstorm-formitem" style="margin-top:1.5em;">
        <label><strong>Property Type</strong></label>
    </div>
    <div class="agentstorm-formitem">
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_res', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="RES" <?php if ($_GET['as_propertytype'] == 'RES' || @in_array('RES', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Single Family Homes<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_mfh', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="MFH" <?php if ($_GET['as_propertytype'] == 'MFH' || @in_array('MFH', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Multi Family Homes<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_mob', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="MOB" <?php if ($_GET['as_propertytype'] == 'MOB' || @in_array('MOB', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Mobile Homes<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_lnd', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="LND" <?php if ($_GET['as_propertytype'] == 'LND' || @in_array('LND', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Lots and Land<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_com', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="COM" <?php if ($_GET['as_propertytype'] == 'COM' || @in_array('COM', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Commercial<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_rnt', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="RNT" <?php if ($_GET['as_propertytype'] == 'RNT' || @in_array('RNT', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Rentals<br /><?php endif; ?>
        <?php if (AgentStormSettingCache::get('as_idx_settings_classes_con', false) == true): ?><input type="checkbox" name="as_propertytype[]" value="CON" <?php if ($_GET['as_propertytype'] == 'CON' || @in_array('CON', $_GET['as_propertytype'])): ?>checked="checked"<?php endif; ?> />Condominiums<br /><?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_bedrooms', true)): ?>
    <div class="agentstorm-formitem" style="margin-top:1.5em;">
        <label><strong>Bedrooms</strong></label>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_bedrooms">
            <option value="">ANY</option>
            <option value="1" <?php if ($_GET['as_bedrooms'] == '1'): ?>selected="selected"<?php endif; ?>>1</option>
            <option value="2" <?php if ($_GET['as_bedrooms'] == '2'): ?>selected="selected"<?php endif; ?>>2</option>
            <option value="3" <?php if ($_GET['as_bedrooms'] == '3'): ?>selected="selected"<?php endif; ?>>3</option>
            <option value="4+" <?php if ($_GET['as_bedrooms'] == '4+'): ?>selected="selected"<?php endif; ?>>4+</option>
        </select>
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_bathrooms', true)): ?>
    <div class="agentstorm-formitem" style="margin-top:1.5em;">
        <label><strong>Full Bathrooms</strong></label>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_bathrooms">
            <option value="">ANY</option>
            <option value="1" <?php if ($_GET['as_bathrooms'] == '1'): ?>selected="selected"<?php endif; ?>>1</option>
            <option value="2" <?php if ($_GET['as_bathrooms'] == '2'): ?>selected="selected"<?php endif; ?>>2</option>
            <option value="3" <?php if ($_GET['as_bathrooms'] == '3'): ?>selected="selected"<?php endif; ?>>3</option>
            <option value="4+" <?php if ($_GET['as_bathrooms'] == '4+'): ?>selected="selected"<?php endif; ?>>4+</option>
        </select>
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_size', true)): ?>
    <div class="agentstorm-formitem" style="margin-top:1.5em;">
        <label><strong>Living Area</strong></label>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_size_min">
            <option value="">No Min</option>
            <option value="500" <?php if ($_GET['as_size_min'] == 500): ?>selected="selected"<?php endif; ?>>500</option>
            <option value="1000" <?php if ($_GET['as_size_min'] == 1000): ?>selected="selected"<?php endif; ?>>1000</option>
            <option value="1500" <?php if ($_GET['as_size_min'] == 1500): ?>selected="selected"<?php endif; ?>>1500</option>
            <option value="2000" <?php if ($_GET['as_size_min'] == 2000): ?>selected="selected"<?php endif; ?>>2000</option>
            <option value="2500" <?php if ($_GET['as_size_min'] == 2500): ?>selected="selected"<?php endif; ?>>2500</option>
            <option value="3000" <?php if ($_GET['as_size_min'] == 3000): ?>selected="selected"<?php endif; ?>>3000</option>
            <option value="3500" <?php if ($_GET['as_size_min'] == 3500): ?>selected="selected"<?php endif; ?>>3500</option>
            <option value="4000" <?php if ($_GET['as_size_min'] == 4000): ?>selected="selected"<?php endif; ?>>4000</option>
            <option value="4500+" <?php if ($_GET['as_size_min'] == '4500+'): ?>selected="selected"<?php endif; ?>>4500+</option>
        </select>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_size_max">
            <option value="">No Max</option>
            <option value="500" <?php if ($_GET['as_size_max'] == 500): ?>selected="selected"<?php endif; ?>>500</option>
            <option value="1000" <?php if ($_GET['as_size_max'] == 1000): ?>selected="selected"<?php endif; ?>>1000</option>
            <option value="1500" <?php if ($_GET['as_size_max'] == 1500): ?>selected="selected"<?php endif; ?>>1500</option>
            <option value="2000" <?php if ($_GET['as_size_max'] == 2000): ?>selected="selected"<?php endif; ?>>2000</option>
            <option value="2500" <?php if ($_GET['as_size_max'] == 2500): ?>selected="selected"<?php endif; ?>>2500</option>
            <option value="3000" <?php if ($_GET['as_size_max'] == 3000): ?>selected="selected"<?php endif; ?>>3000</option>
            <option value="3500" <?php if ($_GET['as_size_max'] == 3500): ?>selected="selected"<?php endif; ?>>3500</option>
            <option value="4000" <?php if ($_GET['as_size_max'] == 4000): ?>selected="selected"<?php endif; ?>>4000</option>
            <option value="4500+" <?php if ($_GET['as_size_max'] == '4500+'): ?>selected="selected"<?php endif; ?>>4500+</option>
        </select>
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_lotsize', true)): ?>
    <div class="agentstorm-formitem" style="margin-top:1.5em;">
        <label><strong>Lot Size</strong></label>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_lotsize_min">
            <option value="">No Min</option>
            <option value="500" <?php if ($_GET['as_lotsize_min'] == 500): ?>selected="selected"<?php endif; ?>>500</option>
            <option value="1000" <?php if ($_GET['as_lotsize_min'] == 1000): ?>selected="selected"<?php endif; ?>>1000</option>
            <option value="1500" <?php if ($_GET['as_lotsize_min'] == 1500): ?>selected="selected"<?php endif; ?>>1500</option>
            <option value="2000" <?php if ($_GET['as_lotsize_min'] == 2000): ?>selected="selected"<?php endif; ?>>2000</option>
            <option value="2500" <?php if ($_GET['as_lotsize_min'] == 2500): ?>selected="selected"<?php endif; ?>>2500</option>
            <option value="3000" <?php if ($_GET['as_lotsize_min'] == 3000): ?>selected="selected"<?php endif; ?>>3000</option>
            <option value="3500" <?php if ($_GET['as_lotsize_min'] == 3500): ?>selected="selected"<?php endif; ?>>3500</option>
            <option value="4000" <?php if ($_GET['as_lotsize_min'] == 4000): ?>selected="selected"<?php endif; ?>>4000</option>
            <option value="4500+" <?php if ($_GET['as_lotsize_min'] == '4500+'): ?>selected="selected"<?php endif; ?>>4500+</option>
        </select>
    </div>
    <div class="agentstorm-formitem">
        <select name="as_lotsize_max">
            <option value="">No Max</option>
            <option value="500" <?php if ($_GET['as_lotsize_max'] == 500): ?>selected="selected"<?php endif; ?>>500</option>
            <option value="1000" <?php if ($_GET['as_lotsize_max'] == 1000): ?>selected="selected"<?php endif; ?>>1000</option>
            <option value="1500" <?php if ($_GET['as_lotsize_max'] == 1500): ?>selected="selected"<?php endif; ?>>1500</option>
            <option value="2000" <?php if ($_GET['as_lotsize_max'] == 2000): ?>selected="selected"<?php endif; ?>>2000</option>
            <option value="2500" <?php if ($_GET['as_lotsize_max'] == 2500): ?>selected="selected"<?php endif; ?>>2500</option>
            <option value="3000" <?php if ($_GET['as_lotsize_max'] == 3000): ?>selected="selected"<?php endif; ?>>3000</option>
            <option value="3500" <?php if ($_GET['as_lotsize_max'] == 3500): ?>selected="selected"<?php endif; ?>>3500</option>
            <option value="4000" <?php if ($_GET['as_lotsize_max'] == 4000): ?>selected="selected"<?php endif; ?>>4000</option>
            <option value="4500+" <?php if ($_GET['as_lotsize_max'] == '4500+'): ?>selected="selected"<?php endif; ?>>4500+</option>
        </select>
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_shortsale', true)): ?>
    <div class="agentstorm-formitem" style="overflow:hidden;">
        <label>Short Sale</label><br />
        <input type="checkbox" name="as_shortsale" value="1" <?php echo (array_key_exists("as_shortsale", $_GET)) ? 'checked="checked"' : ''; ?> />
    </div>
    <?php endif; ?>
    
    <?php if (AgentStormSettingCache::get('as_idx_settings_field_foreclosure', true)): ?>
    <div class="agentstorm-formitem">
        <label>Foreclosure</label><br />
        <input type="checkbox" name="as_foreclosure" value="1" <?php echo (array_key_exists("as_shortsale", $_GET)) ? 'checked="checked"' : ''; ?> />
    </div>
    <?php endif; ?>
    
    <div class="agentstorm-search-submit" style="margin-top:1.5em;">
        <button>Filter</button>
    </div>
    <input type="hidden" name="as_searchwidget_submit" value="1" />
    
</form>
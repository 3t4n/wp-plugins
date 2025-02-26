<?php
$ov = $_SESSION['des_countryval'];

$c = '
    <select id="country" size="1" name="country" class=mand>
     <option value="none"';if ($ov == 'ASM') $c .='selected="selected"'; $c .='>Choose Country</option>
                <option value="ALA"';if ($ov == 'ALA') $c .='selected="selected"'; $c .='>Aaland Islands</option>
                <option value="AFG"';if ($ov == 'AFG') $c .='selected="selected"'; $c .='>Afghanistan</option>
                <option value="ALB"';if ($ov == 'ALB') $c .='selected="selected"'; $c .='>Albania</option>
                <option value="DZA"';if ($ov == 'DZA') $c .='selected="selected"'; $c .='>Algeria</option>
                <option value="ASM"';if ($ov == 'ASM') $c .='selected="selected"'; $c .='>American Samoa</option>
                <option value="AND"';if ($ov == 'AND') $c .='selected="selected"'; $c .='>Andorra</option>
                <option value="AGO"';if ($ov == 'AGO') $c .='selected="selected"'; $c .='>Angola</option>
                <option value="AIA"';if ($ov == 'AIA') $c .='selected="selected"'; $c .='>Anguilla</option>
                <option value="ATA"';if ($ov == 'ATA') $c .='selected="selected"'; $c .='>Antarctica</option>
                <option value="ATG"';if ($ov == 'ATG') $c .='selected="selected"'; $c .='>Antigua and Barbuda</option>
                <option value="ARG"';if ($ov == 'ARG') $c .='selected="selected"'; $c .='>Argentina</option>
                <option value="ARM"';if ($ov == 'ARM') $c .='selected="selected"'; $c .='>Armenia</option>
                <option value="ABW"';if ($ov == 'ABW') $c .='selected="selected"'; $c .='>Aruba</option>
                <option value="AUS"';if ($ov == 'AUS') $c .='selected="selected"'; $c .='>Australia</option>
                <option value="AUT"';if ($ov == 'AUT') $c .='selected="selected"'; $c .='>Austria</option>
                <option value="AZE"';if ($ov == 'AZE') $c .='selected="selected"'; $c .='>Azerbaijan</option>
                <option value="BHS"';if ($ov == 'BHS') $c .='selected="selected"'; $c .='>Bahamas</option>
                <option value="BHR"';if ($ov == 'BHR') $c .='selected="selected"'; $c .='>Bahrain</option>
                <option value="BGD"';if ($ov == 'BGD') $c .='selected="selected"'; $c .='>Bangladesh</option>
                <option value="BRB"';if ($ov == 'BRB') $c .='selected="selected"'; $c .='>Barbados</option>
                <option value="BLR"';if ($ov == 'BLR') $c .='selected="selected"'; $c .='>Belarus</option>
                <option value="BEL"';if ($ov == 'BEL') $c .='selected="selected"'; $c .='>Belgium</option>
                <option value="BLZ"';if ($ov == 'BLZ') $c .='selected="selected"'; $c .='>Belize</option>
                <option value="BEN"';if ($ov == 'BEN') $c .='selected="selected"'; $c .='>Benin</option>
                <option value="BMU"';if ($ov == 'BMU') $c .='selected="selected"'; $c .='>Bermuda</option>
                <option value="BTN"';if ($ov == 'BTN') $c .='selected="selected"'; $c .='>Bhutan</option>
                <option value="BOL"';if ($ov == 'BOL') $c .='selected="selected"'; $c .='>Bolivia</option>
                <option value="BES"';if ($ov == 'BES') $c .='selected="selected"'; $c .='>Bonaire, Sint Eustatius and Saba</option>
                <option value="BIH"';if ($ov == 'BIH') $c .='selected="selected"'; $c .='>Bosnia and Herzegovina</option>
                <option value="BWA"';if ($ov == 'BWA') $c .='selected="selected"'; $c .='>Botswana</option>
                <option value="BVT"';if ($ov == 'BVT') $c .='selected="selected"'; $c .='>Bouvet Island</option>
                <option value="BRA"';if ($ov == 'BRA') $c .='selected="selected"'; $c .='>Brazil</option>
                <option value="IOT"';if ($ov == 'IOT') $c .='selected="selected"'; $c .='>British Indian Ocean Territory</option>
                <option value="BRN"';if ($ov == 'BRN') $c .='selected="selected"'; $c .='>Brunei Darussalam</option>
                <option value="BGR"';if ($ov == 'BGR') $c .='selected="selected"'; $c .='>Bulgaria</option>
                <option value="BFA"';if ($ov == 'BFA') $c .='selected="selected"'; $c .='>Burkina Faso</option>
                <option value="BDI"';if ($ov == 'BDI') $c .='selected="selected"'; $c .='>Burundi</option>
                <option value="KHM"';if ($ov == 'KHM') $c .='selected="selected"'; $c .='>Cambodia</option>
                <option value="CMR"';if ($ov == 'CMR') $c .='selected="selected"'; $c .='>Cameroon</option>
                <option value="CAN"';if ($ov == 'CAN') $c .='selected="selected"'; $c .='>Canada</option>
                <option value="CPV"';if ($ov == 'CPV') $c .='selected="selected"'; $c .='>Cape Verde</option>
                <option value="CYM"';if ($ov == 'CYM') $c .='selected="selected"'; $c .='>Cayman Islands</option>
                <option value="TCD"';if ($ov == 'TCD') $c .='selected="selected"'; $c .='>Chad</option>
                <option value="CHL"';if ($ov == 'CHL') $c .='selected="selected"'; $c .='>Chile</option>
                <option value="CHN"';if ($ov == 'CHN') $c .='selected="selected"'; $c .='>China</option>
                <option value="CXR"';if ($ov == 'CXR') $c .='selected="selected"'; $c .='>Christmas Island</option>
                <option value="CCK"';if ($ov == 'CCK') $c .='selected="selected"'; $c .='>Cocos (Keeling) Islands</option>
                <option value="COL"';if ($ov == 'COL') $c .='selected="selected"'; $c .='>Colombia</option>
                <option value="COM"';if ($ov == 'COM') $c .='selected="selected"'; $c .='>Comoros</option>
                <option value="COG"';if ($ov == 'COG') $c .='selected="selected"'; $c .='>Congo</option>
                <option value="COD"';if ($ov == 'COD') $c .='selected="selected"'; $c .='>Congo, the Democratic Republic of the</option>
                <option value="COK"';if ($ov == 'COK') $c .='selected="selected"'; $c .='>Cook Islands</option>
                <option value="CRI"';if ($ov == 'CRI') $c .='selected="selected"'; $c .='>Costa Rica</option>
                <option value="CIV"';if ($ov == 'CIV') $c .='selected="selected"'; $c .='>Cote D\'ivoire</option>
                <option value="HRV"';if ($ov == 'HRV') $c .='selected="selected"'; $c .='>Croatia (Hrvatska)</option>
                <option value="CUB"';if ($ov == 'CUB') $c .='selected="selected"'; $c .='>Cuba</option>
                <option value="CYP"';if ($ov == 'CYP') $c .='selected="selected"'; $c .='>Cyprus</option>
                <option value="CZE"';if ($ov == 'CZE') $c .='selected="selected"'; $c .='>Czech Republic</option>
                <option value="DNK"';if ($ov == 'DNK') $c .='selected="selected"'; $c .='>Denmark</option>
                <option value="DJI"';if ($ov == 'DJI') $c .='selected="selected"'; $c .='>Djibouti</option>
                <option value="DMA"';if ($ov == 'DMA') $c .='selected="selected"'; $c .='>Dominica</option>
                <option value="DOM"';if ($ov == 'DOM') $c .='selected="selected"'; $c .='>Dominican Republic</option>
                <option value="ECU"';if ($ov == 'ECU') $c .='selected="selected"'; $c .='>Ecuador</option>
                <option value="EGY"';if ($ov == 'EGY') $c .='selected="selected"'; $c .='>Egypt</option>
                <option value="SLV"';if ($ov == 'SLV') $c .='selected="selected"'; $c .='>El Salvador</option>
                <option value="GNQ"';if ($ov == 'GNQ') $c .='selected="selected"'; $c .='>Equatorial Guinea</option>
                <option value="ERI"';if ($ov == 'ERI') $c .='selected="selected"'; $c .='>Eritrea</option>
                <option value="EST"';if ($ov == 'EST') $c .='selected="selected"'; $c .='>Estonia</option>
                <option value="ETH"';if ($ov == 'ETH') $c .='selected="selected"'; $c .='>Ethiopia</option>
                <option value="FLK"';if ($ov == 'FLK') $c .='selected="selected"'; $c .='>Falkland Islands (Malvinas)</option>
                <option value="FRO"';if ($ov == 'FRO') $c .='selected="selected"'; $c .='>Faroe Islands</option>
                <option value="FJI"';if ($ov == 'FJI') $c .='selected="selected"'; $c .='>Fiji</option>
                <option value="FIN"';if ($ov == 'FIN') $c .='selected="selected"'; $c .='>Finland</option>
                <option value="FRA"';if ($ov == 'FRA') $c .='selected="selected"'; $c .='>France</option>
                <option value="FXX"';if ($ov == 'FXX') $c .='selected="selected"'; $c .='>France, Metropolitan</option>
                <option value="GUF"';if ($ov == 'GUF') $c .='selected="selected"'; $c .='>French Guiana</option>
                <option value="PYF"';if ($ov == 'PYF') $c .='selected="selected"'; $c .='>French Polynesia</option>
                <option value="ATF"';if ($ov == 'ATF') $c .='selected="selected"'; $c .='>French Southern Territories</option>
                <option value="GAB"';if ($ov == 'GAB') $c .='selected="selected"'; $c .='>Gabon</option>
                <option value="GMB"';if ($ov == 'GMB') $c .='selected="selected"'; $c .='>Gambia</option>
                <option value="GEO"';if ($ov == 'GEO') $c .='selected="selected"'; $c .='>Georgia</option>
                <option value="DEU"';if ($ov == 'DEU') $c .='selected="selected"'; $c .='>Germany</option>
                <option value="GHA"';if ($ov == 'GHA') $c .='selected="selected"'; $c .='>Ghana</option>
                <option value="GIB"';if ($ov == 'GIB') $c .='selected="selected"'; $c .='>Gibraltar</option>
                <option value="GRC"';if ($ov == 'GRC') $c .='selected="selected"'; $c .='>Greece</option>
                <option value="GRL"';if ($ov == 'GRL') $c .='selected="selected"'; $c .='>Greenland</option>
                <option value="GRD"';if ($ov == 'GRD') $c .='selected="selected"'; $c .='>Grenada</option>
                <option value="GLP"';if ($ov == 'GLP') $c .='selected="selected"'; $c .='>Guadeloupe</option>
                <option value="GUM"';if ($ov == 'GUM') $c .='selected="selected"'; $c .='>Guam</option>
                <option value="GTM"';if ($ov == 'GTM') $c .='selected="selected"'; $c .='>Guatemala</option>
                <option value="GGY"';if ($ov == 'GGY') $c .='selected="selected"'; $c .='>Guernsey</option>
                <option value="GIN"';if ($ov == 'GIN') $c .='selected="selected"'; $c .='>Guinea</option>
                <option value="GNB"';if ($ov == 'GNB') $c .='selected="selected"'; $c .='>Guinea-Bissau</option>
                <option value="GUY"';if ($ov == 'GUY') $c .='selected="selected"'; $c .='>Guyana</option>
                <option value="HTI"';if ($ov == 'HTI') $c .='selected="selected"'; $c .='>Haiti</option>
                <option value="HMD"';if ($ov == 'HMD') $c .='selected="selected"'; $c .='>Heard Island and Mcdonald Islands</option>
                <option value="HND"';if ($ov == 'HND') $c .='selected="selected"'; $c .='>Honduras</option>
                <option value="HKG"';if ($ov == 'HKG') $c .='selected="selected"'; $c .='>Hong Kong</option>
                <option value="HUN"';if ($ov == 'HUN') $c .='selected="selected"'; $c .='>Hungary</option>
                <option value="ISL"';if ($ov == 'ISL') $c .='selected="selected"'; $c .='>Iceland</option>
                <option value="IND"';if ($ov == 'IND') $c .='selected="selected"'; $c .='>India</option>
                <option value="IDN"';if ($ov == 'IDN') $c .='selected="selected"'; $c .='>Indonesia</option>
                <option value="IRN"';if ($ov == 'IRN') $c .='selected="selected"'; $c .='>Iran, Islamic Republic of</option>
                <option value="IRQ"';if ($ov == 'IRQ') $c .='selected="selected"'; $c .='>Iraq</option>
                <option value="IRL"';if ($ov == 'IRL') $c .='selected="selected"'; $c .='>Ireland</option>
                <option value="IMN"';if ($ov == 'IMN') $c .='selected="selected"'; $c .='>Isle of Man</option>
                <option value="ISR"';if ($ov == 'ISR') $c .='selected="selected"'; $c .='>Israel</option>
                <option value="ITA"';if ($ov == 'ITA') $c .='selected="selected"'; $c .='>Italy</option>
                <option value="JAM"';if ($ov == 'JAM') $c .='selected="selected"'; $c .='>Jamaica</option>
                <option value="JPN"';if ($ov == 'JPN') $c .='selected="selected"'; $c .='>Japan</option>
                <option value="JEY"';if ($ov == 'JEY') $c .='selected="selected"'; $c .='>Jersey</option>
                <option value="JOR"';if ($ov == 'JOR') $c .='selected="selected"'; $c .='>Jordan</option>
                <option value="KAZ"';if ($ov == 'KAZ') $c .='selected="selected"'; $c .='>Kazakhstan</option>
                <option value="KEN"';if ($ov == 'KEN') $c .='selected="selected"'; $c .='>Kenya</option>
                <option value="KIR"';if ($ov == 'KIR') $c .='selected="selected"'; $c .='>Kiribati</option>
                <option value="PRK"';if ($ov == 'PRK') $c .='selected="selected"'; $c .='>Korea, Democratic People\'s Republic of</option>
                <option value="KOR"';if ($ov == 'KOR') $c .='selected="selected"'; $c .='>Korea, Republic of</option>
                <option value="KWT"';if ($ov == 'KWT') $c .='selected="selected"'; $c .='>Kuwait</option>
                <option value="KGZ"';if ($ov == 'KGZ') $c .='selected="selected"'; $c .='>Kyrgyzstan</option>
                <option value="LAO"';if ($ov == 'LAO') $c .='selected="selected"'; $c .='>Lao People\'s Democratic Republic</option>
                <option value="LVA"';if ($ov == 'LVA') $c .='selected="selected"'; $c .='>Latvia</option>
                <option value="LBN"';if ($ov == 'LBN') $c .='selected="selected"'; $c .='>Lebanon</option>
                <option value="LSO"';if ($ov == 'LSO') $c .='selected="selected"'; $c .='>Lesotho</option>
                <option value="LBR"';if ($ov == 'LBR') $c .='selected="selected"'; $c .='>Liberia</option>
                <option value="LBY"';if ($ov == 'LBY') $c .='selected="selected"'; $c .='>Libyan Arab Jamahiriya</option>
                <option value="LIE"';if ($ov == 'LIE') $c .='selected="selected"'; $c .='>Liechtenstein</option>
                <option value="LTU"';if ($ov == 'LTU') $c .='selected="selected"'; $c .='>Lithuania</option>
                <option value="LUX"';if ($ov == 'LUX') $c .='selected="selected"'; $c .='>Luxembourg</option>
                <option value="MAC"';if ($ov == 'MAC') $c .='selected="selected"'; $c .='>Macao</option>
                <option value="MKD"';if ($ov == 'MKD') $c .='selected="selected"'; $c .='>Macedonia</option>
                <option value="MDG"';if ($ov == 'MDG') $c .='selected="selected"'; $c .='>Madagascar</option>
                <option value="MWI"';if ($ov == 'MWI') $c .='selected="selected"'; $c .='>Malawi</option>
                <option value="MYS"';if ($ov == 'MYS') $c .='selected="selected"'; $c .='>Malaysia</option>
                <option value="MDV"';if ($ov == 'MDV') $c .='selected="selected"'; $c .='>Maldives</option>
                <option value="MLI"';if ($ov == 'MLI') $c .='selected="selected"'; $c .='>Mali</option>
                <option value="MLT"';if ($ov == 'MLT') $c .='selected="selected"'; $c .='>Malta</option>
                <option value="MHL"';if ($ov == 'MHL') $c .='selected="selected"'; $c .='>Marshall Islands</option>
                <option value="MTQ"';if ($ov == 'MTQ') $c .='selected="selected"'; $c .='>Martinique</option>
                <option value="MRT"';if ($ov == 'MRT') $c .='selected="selected"'; $c .='>Mauritania</option>
                <option value="MUS"';if ($ov == 'MUS') $c .='selected="selected"'; $c .='>Mauritius</option>
                <option value="MYT"';if ($ov == 'MYT') $c .='selected="selected"'; $c .='>Mayotte</option>
                <option value="MEX"';if ($ov == 'MEX') $c .='selected="selected"'; $c .='>Mexico</option>
                <option value="FSM"';if ($ov == 'FSM') $c .='selected="selected"'; $c .='>Micronesia, Federated States of</option>
                <option value="MDA"';if ($ov == 'MDA') $c .='selected="selected"'; $c .='>Moldova, Republic of</option>
                <option value="MCO"';if ($ov == 'MCO') $c .='selected="selected"'; $c .='>Monaco</option>
                <option value="MNG"';if ($ov == 'MNG') $c .='selected="selected"'; $c .='>Mongolia</option>
                <option value="MNE"';if ($ov == 'MNE') $c .='selected="selected"'; $c .='>Montenegro</option>
                <option value="MSR"';if ($ov == 'MSR') $c .='selected="selected"'; $c .='>Montserrat</option>
                <option value="MAR"';if ($ov == 'MAR') $c .='selected="selected"'; $c .='>Morocco</option>
                <option value="MOZ"';if ($ov == 'MOZ') $c .='selected="selected"'; $c .='>Mozambique</option>
                <option value="MMR"';if ($ov == 'MMR') $c .='selected="selected"'; $c .='>Myanmar</option>
                <option value="NAM"';if ($ov == 'NAM') $c .='selected="selected"'; $c .='>Namibia</option>
                <option value="NRU"';if ($ov == 'NRU') $c .='selected="selected"'; $c .='>Nauru</option>
                <option value="NPL"';if ($ov == 'NPL') $c .='selected="selected"'; $c .='>Nepal</option>
                <option value="NLD"';if ($ov == 'NLD') $c .='selected="selected"'; $c .='>Netherlands</option>
                <option value="ANT"';if ($ov == 'ANT') $c .='selected="selected"'; $c .='>Netherlands Antilles</option>
                <option value="NCL"';if ($ov == 'NCL') $c .='selected="selected"'; $c .='>New Caledonia</option>
                <option value="NZL"';if ($ov == 'NZL') $c .='selected="selected"'; $c .='>New Zealand</option>
                <option value="NIC"';if ($ov == 'NIC') $c .='selected="selected"'; $c .='>Nicaragua</option>
                <option value="NER"';if ($ov == 'NER') $c .='selected="selected"'; $c .='>Niger</option>
                <option value="NGA"';if ($ov == 'NGA') $c .='selected="selected"'; $c .='>Nigeria</option>
                <option value="NIU"';if ($ov == 'NIU') $c .='selected="selected"'; $c .='>Niue</option>
                <option value="NFK"';if ($ov == 'NFK') $c .='selected="selected"'; $c .='>Norfolk Island</option>
                <option value="MNP"';if ($ov == 'MNP') $c .='selected="selected"'; $c .='>Northern Mariana Islands</option>
                <option value="NOR"';if ($ov == 'NOR') $c .='selected="selected"'; $c .='>Norway</option>
                <option value="OMN"';if ($ov == 'OMN') $c .='selected="selected"'; $c .='>Oman</option>
                <option value="PAK"';if ($ov == 'PAK') $c .='selected="selected"'; $c .='>Pakistan</option>
                <option value="PLW"';if ($ov == 'PLW') $c .='selected="selected"'; $c .='>Palau</option>
                <option value="PSE"';if ($ov == 'PSE') $c .='selected="selected"'; $c .='>Palestinian Territory, Occupied</option>
                <option value="PAN"';if ($ov == 'PAN') $c .='selected="selected"'; $c .='>Panama</option>
                <option value="PNG"';if ($ov == 'PNG') $c .='selected="selected"'; $c .='>Papua New Guinea</option>
                <option value="PRY"';if ($ov == 'PRY') $c .='selected="selected"'; $c .='>Paraguay</option>
                <option value="PER"';if ($ov == 'PER') $c .='selected="selected"'; $c .='>Peru</option>
                <option value="PHL"';if ($ov == 'PHL') $c .='selected="selected"'; $c .='>Philippines</option>
                <option value="PCN"';if ($ov == 'PCN') $c .='selected="selected"'; $c .='>Pitcairn</option>
                <option value="POL"';if ($ov == 'POL') $c .='selected="selected"'; $c .='>Poland</option>
                <option value="PRT"';if ($ov == 'PRT') $c .='selected="selected"'; $c .='>Portugal</option>
                <option value="PRI"';if ($ov == 'PRI') $c .='selected="selected"'; $c .='>Puerto Rico</option>
                <option value="QAT"';if ($ov == 'QAT') $c .='selected="selected"'; $c .='>Qatar</option>
                <option value="REU"';if ($ov == 'REU') $c .='selected="selected"'; $c .='>Reunion</option>
                <option value="ROU"';if ($ov == 'ROU') $c .='selected="selected"'; $c .='>Romania</option>
                <option value="RUS"';if ($ov == 'RUS') $c .='selected="selected"'; $c .='>Russian Federation</option>
                <option value="RWA"';if ($ov == 'RWA') $c .='selected="selected"'; $c .='>Rwanda</option>
                <option value="SHN"';if ($ov == 'SHN') $c .='selected="selected"'; $c .='>Saint Helena</option>
                <option value="KNA"';if ($ov == 'KNA') $c .='selected="selected"'; $c .='>Saint Kitts and Nevis</option>
                <option value="LCA"';if ($ov == 'LCA') $c .='selected="selected"'; $c .='>Saint Lucia</option>
                <option value="SPM"';if ($ov == 'SPM') $c .='selected="selected"'; $c .='>Saint Pierre and Miquelon</option>
                <option value="VCT"';if ($ov == 'VCT') $c .='selected="selected"'; $c .='>Saint Vincent and the Grenadines</option>
                <option value="WSM"';if ($ov == 'WSM') $c .='selected="selected"'; $c .='>Samoa</option>
                <option value="SMR"';if ($ov == 'SMR') $c .='selected="selected"'; $c .='>San Marino</option>
                <option value="STP"';if ($ov == 'STP') $c .='selected="selected"'; $c .='>Sao Tome and Principe</option>
                <option value="SAU"';if ($ov == 'SAU') $c .='selected="selected"'; $c .='>Saudi Arabia</option>
                <option value="SEN"';if ($ov == 'SEN') $c .='selected="selected"'; $c .='>Senegal</option>
                <option value="SRB"';if ($ov == 'SRB') $c .='selected="selected"'; $c .='>Serbia</option>
                <option value="SYC"';if ($ov == 'SYC') $c .='selected="selected"'; $c .='>Seychelles</option>
                <option value="SLE"';if ($ov == 'SLE') $c .='selected="selected"'; $c .='>Sierra Leone</option>
                <option value="SGP"';if ($ov == 'SGP') $c .='selected="selected"'; $c .='>Singapore</option>
                <option value="SVK"';if ($ov == 'SVK') $c .='selected="selected"'; $c .='>Slovakia</option>
                <option value="SVN"';if ($ov == 'SVN') $c .='selected="selected"'; $c .='>Slovenia</option>
                <option value="SLB"';if ($ov == 'SLB') $c .='selected="selected"'; $c .='>Solomon Islands</option>
                <option value="SOM"';if ($ov == 'SOM') $c .='selected="selected"'; $c .='>Somalia</option>
                <option value="ZAF"';if ($ov == 'ZAF') $c .='selected="selected"'; $c .='>South Africa</option>
                <option value="SGS"';if ($ov == 'SGS') $c .='selected="selected"'; $c .='>South Georgia and the South Sandwich Islands</option>
                <option value="ESP"';if ($ov == 'ESP') $c .='selected="selected"'; $c .='>Spain</option>
                <option value="LKA"';if ($ov == 'LKA') $c .='selected="selected"'; $c .='>Sri Lanka</option>
                <option value="SDN"';if ($ov == 'SDN') $c .='selected="selected"'; $c .='>Sudan</option>
                <option value="SUR"';if ($ov == 'SUR') $c .='selected="selected"'; $c .='>Suriname</option>
                <option value="SJM"';if ($ov == 'SJM') $c .='selected="selected"'; $c .='>Svalbard and Jan Mayen Islands</option>
                <option value="SWZ"';if ($ov == 'SWZ') $c .='selected="selected"'; $c .='>Swaziland</option>
                <option value="SWE"';if ($ov == 'SWE') $c .='selected="selected"'; $c .='>Sweden</option>
                <option value="CHE"';if ($ov == 'CHE') $c .='selected="selected"'; $c .='>Switzerland</option>
                <option value="SYR"';if ($ov == 'SYR') $c .='selected="selected"'; $c .='>Syrian Arab Republic</option>
                <option value="TWN"';if ($ov == 'TWN') $c .='selected="selected"'; $c .='>Taiwan</option>
                <option value="TJK"';if ($ov == 'TJK') $c .='selected="selected"'; $c .='>Tajikistan</option>
                <option value="TZA"';if ($ov == 'TZA') $c .='selected="selected"'; $c .='>Tanzania, United Republic of</option>
                <option value="THA"';if ($ov == 'THA') $c .='selected="selected"'; $c .='>Thailand</option>
                <option value="TLS"';if ($ov == 'TLS') $c .='selected="selected"'; $c .='>Timor-Leste</option>
                <option value="TGO"';if ($ov == 'TGO') $c .='selected="selected"'; $c .='>Togo</option>
                <option value="TKL"';if ($ov == 'TKL') $c .='selected="selected"'; $c .='>Tokelau</option>
                <option value="TON"';if ($ov == 'TON') $c .='selected="selected"'; $c .='>Tonga</option>
                <option value="TTO"';if ($ov == 'TTO') $c .='selected="selected"'; $c .='>Trinidad and Tobago</option>
                <option value="TUN"';if ($ov == 'TUN') $c .='selected="selected"'; $c .='>Tunisia</option>
                <option value="TUR"';if ($ov == 'TUR') $c .='selected="selected"'; $c .='>Turkey</option>
                <option value="TKM"';if ($ov == 'TKM') $c .='selected="selected"'; $c .='>Turkmenistan</option>
                <option value="TCA"';if ($ov == 'TCA') $c .='selected="selected"'; $c .='>Turks and Caicos Islands</option>
                <option value="TUV"';if ($ov == 'TUV') $c .='selected="selected"'; $c .='>Tuvalu</option>
                <option value="UGA"';if ($ov == 'UGA') $c .='selected="selected"'; $c .='>Uganda</option>
                <option value="UKR"';if ($ov == 'UKR') $c .='selected="selected"'; $c .='>Ukraine</option>
                <option value="ARE"';if ($ov == 'ARE') $c .='selected="selected"'; $c .='>United Arab Emirates</option>
                <option value="GBR"';if ($ov == 'GBR') $c .='selected="selected"'; $c .='>United Kingdom</option>
                <option value="USA"';if ($ov == 'USA') $c .='selected="selected"'; $c .='>United States</option>
                <option value="UMI"';if ($ov == 'UMI') $c .='selected="selected"'; $c .='>United States Minor Outlying Islands</option>
                <option value="URY"';if ($ov == 'URY') $c .='selected="selected"'; $c .='>Uruguay</option>
                <option value="UZB"';if ($ov == 'UZB') $c .='selected="selected"'; $c .='>Uzbekistan</option>
                <option value="VUT"';if ($ov == 'VUT') $c .='selected="selected"'; $c .='>Vanuatu</option>
                <option value="VAT"';if ($ov == 'VAT') $c .='selected="selected"'; $c .='>Vatican City State (Holy See)</option>
                <option value="VEN"';if ($ov == 'VEN') $c .='selected="selected"'; $c .='>Venezuela</option>
                <option value="VNM"';if ($ov == 'VNM') $c .='selected="selected"'; $c .='>Viet Nam</option>
                <option value="VGB"';if ($ov == 'VGB') $c .='selected="selected"'; $c .='>Virgin Islands, British</option>
                <option value="VIR"';if ($ov == 'VIR') $c .='selected="selected"'; $c .='>Virgin Islands, U.S.</option>
                <option value="WLF"';if ($ov == 'WLF') $c .='selected="selected"'; $c .='>Wallis and Futuna Islands</option>
                <option value="ESH"';if ($ov == 'ESH') $c .='selected="selected"'; $c .='>Western Sahara</option>
                <option value="YEM"';if ($ov == 'YEM') $c .='selected="selected"'; $c .='>Yemen</option>
                <option value="ZAR"';if ($ov == 'ZAR') $c .='selected="selected"'; $c .='>Zaire</option>
                <option value="ZMB"';if ($ov == 'ZMB') $c .='selected="selected"'; $c .='>Zambia</option>
                <option value="ZWE"';if ($ov == 'ZWE') $c .='selected="selected"'; $c .='>Zimbabwe</option>
</select>
';
?>
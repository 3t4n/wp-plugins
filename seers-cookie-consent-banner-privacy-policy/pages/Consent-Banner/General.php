<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'General.css'; ?>">
    <title>Consent Settings</title>
</head>
<body>
    
    <div class="seers-cms-consent-banner-general-container">
        <div class="seers-cms-consent-banner-upper-general-container">
            <div class="seers-cms-consent-banner-general-settings-section">
                <label class="seers-cms-consent-banner-general-regulation" for="seers-cms-consent-banner-general-regulation"><?php echo __('REGULATION', $this->textdomain); ?></label>
                <div class="seers-cms-consent-banner-general-custom-dropdown">
                    <input type="checkbox" id="dropdown-regulation-toggle">
                    <label for="dropdown-regulation-toggle" class="seers-cms-consent-banner-general-custom-select" id="selected-option"><?php echo __('Consent Type', $this->textdomain); ?></label>
                    <ul class="seers-cms-consent-banner-general-dropdown-options">
                        <li>
                            <input type="radio" id="gdpr" name="consent" value="gdpr" checked>
                            <label class="seers-cms--general-default" for="gdpr"><?php echo __('GDPR', $this->textdomain); ?><span class="seers-cms-general-tick"></span></label>
                            </li>
                        <li class="seers-paid-feature-opener" name="regulation">
                            <input type="radio" id="ccpa" name="consent" value="ccpa" class="seers-paid-feature-opener" name="regulation">
                            <label for="ccpa" class="seers-paid-feature-opener" name="regulation"><?php echo __('Global Privacy Law ', $this->textdomain); ?><span class="seers-cms-consent-banner-general-premium"><?php echo __('PREMIUM', $this->textdomain); ?></span></label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="seers-cms-consent-banner-general-settings-section">
                <label class="seers-cms-consent-banner-general-regulation" for="seers-cms-consent-banner-general-regulation"><?php echo __('LANGUAGE', $this->textdomain); ?></label>
                <div class="seers-cms-consent-banner-general-custom-dropdown">
                    <input type="checkbox" id="dropdown-language-toggle">
                    <label for="dropdown-language-toggle" class="seers-cms-consent-banner-general-custom-select" id="selected-language"><?php echo __('Choose', $this->textdomain); ?></label>
                    <ul class="seers-cms-consent-banner-general-dropdown-options">
                        <li>
                            <input type="radio" id="english" name="language" value="english" checked>
                            <label class="seers-cms--general-default" for="english"><?php echo __('English', $this->textdomain); ?><span class="seers-cms-general-tick"></span></label>
                        </li>
                        <li  class="seers-paid-feature-opener" name="regulation">
                            <input type="radio" id="add-other" name="language" value="add-other"  class="seers-paid-feature-opener" name="regulation">
                            <label for="add-other" class="seers-paid-feature-opener" name="regulation"><?php echo __('Add Other ', $this->textdomain); ?><span class="seers-cms-consent-banner-general-premium"><?php echo __('PREMIUM', $this->textdomain); ?></span></label>
                        </li>
                        <!-- <li class="seers-paid-feature-opener" name="regulation">
                            <input type="radio" id="auto-detect" name="language" value="auto-detect" class="seers-paid-feature-opener" name="regulation">
                            <label for="auto-detect" class="seers-paid-feature-opener" name="regulation">Auto Detect <span class="seers-cms-consent-banner-general-premium">PREMIUM</span></label>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="seers-cms-consent-banner-upper-general-container">
        <div class="seers-cms-general-geo-target-and-language-auto">
        <div class="seers-cms-consent-banner-general-geo-target-section">
            <label class="seers-cms-consent-banner-general-geo-target-section-heading"><?php echo __('Geo-target Location (Regional)', $this->textdomain); ?></label>
            <div class="seers-cms-consent-banner-general-radio-group">
                <label class="seers-paid-feature-opener" name="regulation">
                    <input class="seers-paid-feature-opener" name="regulation" type="radio" name="geo-target" value="worldwide"><?php echo __(' Worldwide', $this->textdomain); ?><span class="seers-cms-consent-banner-general-premium"><?php echo __('PREMIUM', $this->textdomain); ?></span>
                </label>
                <label class="seers-paid-feature-opener" name="regulation">
                    <input class="seers-paid-feature-opener" name="regulation" type="radio" name="geo-target" value="uk-eu"><?php echo __(' UK & EU Countries', $this->textdomain); ?><span class="seers-cms-consent-banner-general-premium"><?php echo __('PREMIUM', $this->textdomain); ?></span>
                </label>
                <label class="seers-paid-feature-opener" name="regulation">
                    <input class="seers-paid-feature-opener" name="regulation" type="radio" name="geo-target" value="auto"><?php echo __(' Auto Regional Detection', $this->textdomain); ?><span class="seers-cms-consent-banner-general-premium"><?php echo __('PREMIUM', $this->textdomain); ?></span>
                </label>
                <label class="seers-paid-feature-opener" name="regulation">
                    <input class="seers-paid-feature-opener" name="regulation" type="radio" name="geo-target" value="other-countries"><?php echo __(' Other Countries', $this->textdomain); ?><span class="seers-cms-consent-banner-general-premium"><?php echo __('PREMIUM', $this->textdomain); ?></span>
                </label>
            </div>
        </div>
        <div class="seers-cms-appearance-settings-setting seers-cms-general-language-auto">
                <label for="language-auto-regional-detection"><?php echo __('Language Auto Regional Detection ', $this->textdomain); ?><span class="tooltiphtml" style="font-size:20px;">
                        <span><img class="seers-cms-frameworks-info-icon" src="<?php echo plugin_dir_url(__FILE__) . '../../images/info icon.png'; ?>" alt="info-icon"></span>
                        <span class="tooltiptext">
                            <?php echo __('Turn on to automatically detect the language of banner according to region', $this->textdomain); ?> 
                        </span>
                    </span><span class="seers-cms-appearance-settings-premium"><?php echo __('PREMIUM', $this->textdomain); ?></span></label>
                <div class="seers-cms-appearance-settings-input-field ">
                <input type="checkbox" id="language-auto-regional-detection" class="seers-paid-feature-opener seers-cms-general-language-auto-toggle" name="languageautoregionaldetection">
            </div>
            </div>
            <div class="seers-cms-consent-banner-general-buttons">
            <a class="seers-cms-consent-banner-general-save-button  s-save" href="<?php echo $D_URL;  ?>" target="_blank"><?php echo __('Preview', $this->textdomain); ?></a>
            <!-- <button class="seers-cms-consent-banner-general-save-button">Save Changes</button> -->
        </div>
        </div>
        <div class="seers-cms-consent-banner-general-world-laws">
            <label class="seers-cms-consent-banner-general-geo-target-section-heading"><?php echo __('Global Privacy Laws', $this->textdomain); ?></label>
            <div class="seers-cms-consent-banner-general-radio-group">
                <div>
                <table>
                <table>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(GDPR) General Data Protection Regulation', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('European Union', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(CCPA) California Consumer Privacy Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('United States', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(CPRA) California Privacy Rights Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('United States', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(LGPD) Brazilian General Data Protection Law', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Brazil', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(PIPL) Personal Information Protection Law', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('China', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(PDPA) Personal Data Protection Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Singapore', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Privacy Act 1988', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Australia', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Data Protection Act 2018', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('United Kingdom', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(POPIA) Protection of Personal Information Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('South Africa', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(PIPEDA) Personal Information Protection and Electronic Documents Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Canada', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(EU Cookie Law) ePrivacy Directive', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('European Union', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(COPPA) Children\'s Online Privacy Protection Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('United States', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Personal Data (Privacy) Ordinance', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Hong Kong', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Data Protection Law', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('UAE', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(APPI) Act on the Protection of Personal Information', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Japan', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('New Zealand Privacy Act 2020', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('New Zealand', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(PDPA) Thailand Personal Data Protection Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Thailand', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Data Privacy Act of 2012', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Philippines', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Indian Personal Data Protection Bill (Draft)', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('India', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(PIPA) South Korean Personal Information Protection Act', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('South Korea', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law seers-cms-general-LFPDPPP" style="width: 82%;"><?php echo __('(LFPDPPP) Mexican Federal Law on the Protection of Personal Data Held by Private Parties', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Mexico', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Kenya Data Protection Act 2019', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Kenya', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(LPPD) Law on Protection of Personal Data', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Turkey', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('General Data Protection Law', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Argentina', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('(FADP) Swiss Federal Act on Data Protection', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Switzerland', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Israel Protection of Privacy Law 5741-1981', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Israel', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Colombian Data Protection Law (Law 1581 of 2012)', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Colombia', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Russian Federal Law on Personal Data', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Russia', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Data Privacy Law', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Indonesia', $this->textdomain); ?></td>
                    </tr>
                    <tr>
                        <td class="seers-cms-general-global-privacy-law" style="width: 82%;"><?php echo __('Law on Cybersecurity', $this->textdomain); ?></td>
                        <td class="seers-cms-general-global-privacy-law-country"><?php echo __('Vietnam', $this->textdomain); ?></td>
                    </tr>
                </table>


                </div>
            </div>
        </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const regulationDropdown = document.getElementById('dropdown-regulation-toggle');
            const regulationOptions = document.querySelectorAll('input[name="consent"]');

            regulationDropdown.addEventListener('change', function() {
                regulationOptions.forEach(option => {
                    if (option.checked) {
                        document.getElementById('selected-option').innerText = option.nextElementSibling.innerText;
                    }
                });
            });
            
            const languageDropdown = document.getElementById('dropdown-language-toggle');
            const languageOptions = document.querySelectorAll('input[name="language"]');

            languageDropdown.addEventListener('change', function() {
                languageOptions.forEach(option => {
                    if (option.checked) {
                        document.getElementById('selected-language').innerText = option.nextElementSibling.innerText;
                    }
                });
            });
        });
    </script>
</body>
</html>

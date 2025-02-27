<?php
$dpeBlankDisplay = $dpe_value ? '' : ' dpe-blank-active';
$gesBlankDisplay = $ges_value ? '' : ' ges-blank-active';
$dpeBlankDisplay = $notSubject ?' dpeges-not-subject-active' : '';
$gesBlankDisplay = $notSubject ?' dpeges-not-subject-active' : '';

$DpeGesInline = $display_inline ? 'energyDiagnosticContainer_inline' : 'energyDiagnosticContainer';

$dpeClass = 'newdpe ' . $dpeBlankDisplay;
$dpeContainerClass = 'diagnostic-scale number' . $lettre_dpe;
$dpeDiagramContainerClass = 'diagnostic-diagram number' . $lettre_dpe;
$gesClass = 'newges ' . $gesBlankDisplay;
$gesContainerClass = 'emission-scale  number' . $lettre_ges;
$gesDiagramContainerClass = 'emission-diagram number' . $lettre_ges;
?>

<div class="<?php echo $DpeGesInline; ?>">
    <div class="<?php echo $dpeClass; ?>">
        <span class="dpe-title"><?php _e( 'Energy performance diagnostic', 'wpdpeges' ); ?></span>
        <figure class="diagnostic diagnostic-dpe">
            <div class="diagnostic-container" aria-hidden="true">
                <div class="<?php echo $dpeContainerClass; ?>">
                    <span class="diagnostic-number-container">
                        <span class="diagnostic-number" aria-hidden="false"><?php echo $dpe_value; ?></span>
                        <abbr title="<?php _e('Primary Energy Unit', 'wpdpeges'); ?>"><?php _e( 'KWh/m².year', 'wpdpeges' ); ?></abbr>
                    </span>
                    <span class="emission-number-container">
                        <span class="emission-number" aria-hidden="false"><?php echo $ges_value; ?>*</span>
                        <abbr title="<?php _e('Quantity of greenhouse gas emissions', 'wpdpeges'); ?>"><?php _e( 'kg CO2/m².year', 'wpdpeges' ); ?></abbr>
                    </span>
                </div>
                <div class="<?php echo $dpeDiagramContainerClass; ?>">
                    <div class="diagnostic-legend-top"><span><?php _e( 'Efficient housing', 'wpdpeges' ); ?></span></div>
                    <div class="diagnostic-line line-a"><span class="diagnostic-letter letter-a">A</span></div>
                    <div class="diagnostic-line line-b"><span class="diagnostic-letter letter-b">B</span></div>
                    <div class="diagnostic-line line-c"><span class="diagnostic-letter letter-c">C</span></div>
                    <div class="diagnostic-line line-d"><span class="diagnostic-letter letter-d">D</span></div>
                    <div class="diagnostic-line line-e"><span class="diagnostic-letter letter-e">E</span></div>
                    <div class="diagnostic-line line-f"><span class="diagnostic-letter letter-f">F</span></div>
                    <div class="diagnostic-line line-g"><span class="diagnostic-letter letter-g">G</span></div>
                    <div class="diagnostic-legend-bottom"><span><?php _e( 'High energy housing', 'wpdpeges' ); ?></span></div>
                </div>
            </div>
            <div class="dpe-blank">
                <span class="dpe-blank-title"><?php _e( 'DPE blank', 'wpdpeges' ); ?></span>
                <span class="dpe-blank-legend"><?php _e( 'Non-usable consumption', 'wpdpeges' ); ?></span>
            </div>
            <div class="dpe-not-subject">
                <span class="dpe-not-subject-title"><?php _e( 'Not subject to diagnostic', 'wpdpeges' ); ?></span>
            </div>
        </figure>
    </div>

    <div class="<?php echo $gesClass; ?>">
        <span class="ges-title"><?php _e( '* Of which greenhouse gas emissions', 'wpdpeges' ); ?></span>
        <figure class="emission emission-ges">
            <div class="emission-container " aria-hidden="true">
                <div class="<?php echo $gesDiagramContainerClass; ?>">
                    <div class="emission-legend-top"><span><?php _e( 'Low GHG emissions', 'wpdpeges' ); ?></span> </div>
                    <div class="emission-line line-a"><span class="emission-letter letter-a">A</span></div>
                    <div class="emission-line line-b"><span class="emission-letter letter-b">B</span></div>
                    <div class="emission-line line-c"><span class="emission-letter letter-c">C</span></div>
                    <div class="emission-line line-d"><span class="emission-letter letter-d">D</span></div>
                    <div class="emission-line line-e"><span class="emission-letter letter-e">E</span></div>
                    <div class="emission-line line-f"><span class="emission-letter letter-f">F</span></div>
                    <div class="emission-line line-g"><span class="emission-letter letter-g">G</span></div>
                    <div class="emission-legend-bottom"><span><?php _e( 'High GHG emissions', 'wpdpeges' ); ?></span></div>
                </div>
                <div class="<?php echo $gesContainerClass; ?>">
                    <span class="emission-number-container">
                        <span class="emission-number" aria-hidden="false"><?php echo $ges_value; ?></span>
                        <abbr title="<?php _e('Quantity of greenhouse gas emissions', 'wpdpeges'); ?>"><?php _e( 'KgeqCO2 / m².year', 'wpdpeges' ); ?></abbr>
                    </span>
                </div>
                
            </div>
            <div class="ges-blank">
                <span class="ges-blank-title"><?php _e( 'GES blank', 'wpdpeges' ); ?></span>
                <span class="ges-blank-legend"><?php _e( 'Non-usable consumption', 'wpdpeges' ); ?></span>
            </div>
        </figure>
    </div>
</div>
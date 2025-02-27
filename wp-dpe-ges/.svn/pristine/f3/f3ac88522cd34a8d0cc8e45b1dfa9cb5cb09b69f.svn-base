<?php
$class = 'wpdpeges';
$classSC = '';
$classBlank = '';
if( $displayInline ) {
    if( ! $shortcode ):
        $class .= ' dpe-ges-inline';
    else:
        $classSC .= ' dpeges-inline';
    endif;
}
?>
<?php if( ! $shortcode ): ?>
<div class="<?php echo $class; ?>">
<?php endif; ?>
    <?php
    // DPE
    if ($displayDPE):
        if( $notSubject ):
            $classBlank = ' dpeges-not-subject-active';
        elseif( empty($valueDPE) ):
            $classBlank = ' dpe-blank-active';
        endif;
        $lettre_dpe = '';
        if($valueDPE == 'A'): $lettre_dpe = 'A';
        elseif($valueDPE == 'B'): $lettre_dpe = 'B';
        elseif($valueDPE == 'C'): $lettre_dpe = 'C';
        elseif($valueDPE == 'D'): $lettre_dpe = 'D';
        elseif($valueDPE == 'E'): $lettre_dpe = 'E';
        elseif($valueDPE == 'F'): $lettre_dpe = 'F';
        elseif($valueDPE == 'G'): $lettre_dpe = 'G';
        elseif($valueDPE <= 50): $lettre_dpe = 'A';
        elseif($valueDPE <= 90): $lettre_dpe = 'B';
        elseif($valueDPE <= 150): $lettre_dpe = 'C';
        elseif($valueDPE <= 230): $lettre_dpe = 'D';
        elseif($valueDPE <= 330): $lettre_dpe = 'E';
        elseif($valueDPE <= 450): $lettre_dpe = 'F';
        elseif($valueDPE > 450): $lettre_dpe = 'G';
        endif;
        ?>
        <div class="dpe<?php echo $classSC.$classBlank; ?>">
            <span class="title"><?php _e('Energy performance diagnostic', 'wpdpeges'); ?></span>
            <figure class="diagnostic diagnostic-dpe">
                <figcaption class="diagnostic-title hidden"><?php _e('Energy performance diagnostic', 'wpdpeges'); ?></figcaption>
                <div class="diagnostic-container" aria-hidden="true">
                    <div class="diagnostic-legend"><span><?php _e('Efficient housing', 'wpdpeges'); ?></span> <span><abbr title="<?php _e('Primary Energy Unit', 'wpdpeges'); ?>"><?php _e('KWhep / m².year', 'wpdpeges'); ?></abbr></span></div>
                    <div class="diagnostic-diagram">
                        <div class="diagnostic-line line-a"><span class="diagnostic-value"><?php _e('≤ 50', 'wpdpeges'); ?></span><span class="diagnostic-letter letter-a">A</span></div>
                        <div class="diagnostic-line line-b"><span class="diagnostic-value"><?php _e('51 to 90', 'wpdpeges'); ?></span><span class="diagnostic-letter letter-b">B</span></div>
                        <div class="diagnostic-line line-c"><span class="diagnostic-value"><?php _e('91 to 150', 'wpdpeges'); ?></span><span class="diagnostic-letter letter-c">C</span></div>
                        <div class="diagnostic-line line-d"><span class="diagnostic-value"><?php _e('151 to 230', 'wpdpeges'); ?></span><span class="diagnostic-letter letter-d">D</span></div>
                        <div class="diagnostic-line line-e"><span class="diagnostic-value"><?php _e('231 to 330', 'wpdpeges'); ?></span><span class="diagnostic-letter letter-e">E</span></div>
                        <div class="diagnostic-line line-f"><span class="diagnostic-value"><?php _e('331 to 450', 'wpdpeges'); ?></span><span class="diagnostic-letter letter-f">F</span></div>
                        <div class="diagnostic-line line-g"><span class="diagnostic-value"><?php _e('&gt; 450', 'wpdpeges'); ?></span><span class="diagnostic-letter letter-g">G</span></div>
                    </div>
                    <div class="diagnostic-scale">
                        <span class="diagnostic-number-container number<?php echo $lettre_dpe; ?>">
                            <span class="diagnostic-number" aria-hidden="false"><?php echo $valueDPE; ?><abbr class="hidden" title="<?php _e('Primary Energy Unit', 'wpdpeges'); ?>"><?php _e('KWhep / m².year', 'wpdpeges'); ?></abbr></span>
                        </span>
                    </div>
                    <span><?php _e('High energy housing', 'wpdpeges'); ?></span>
                </div>
                <div class="dpe-blank">
                    <span class="dpe-blank-title"><?php _e('DPE blank', 'wpdpeges'); ?></span>
                    <span class="dpe-blank-legend"><?php _e('Non-usable consumption', 'wpdpeges'); ?></span>
                </div>
                <div class="dpe-not-subject">
                    <span class="dpe-not-subject-title"><?php _e( 'Not subject to diagnostic', 'wpdpeges' ); ?></span>
                </div>
            </figure>
        </div>
    <?php endif; ?>

    <?php 
    // GES
    if ( $displayGES ):
        if( $notSubject ):
            $classBlank = ' dpeges-not-subject-active';
        elseif( empty($valueGES) ):
            $classBlank = ' ges-blank-active';
        endif;
        $lettre_ges = '';
        if ($valueGES == 'A'): $lettre_ges = 'A';
        elseif($valueGES == 'B'): $lettre_ges = 'B';
        elseif($valueGES == 'C'): $lettre_ges = 'C';
        elseif($valueGES == 'D'): $lettre_ges = 'D';
        elseif($valueGES == 'E'): $lettre_ges = 'E';
        elseif($valueGES == 'F'): $lettre_ges = 'F';
        elseif($valueGES == 'G'): $lettre_ges = 'G';
        elseif($valueGES <= 5): $lettre_ges = 'A';
        elseif($valueGES <= 10): $lettre_ges = 'B';
        elseif($valueGES <= 20): $lettre_ges = 'C';
        elseif($valueGES <= 35): $lettre_ges = 'D';
        elseif($valueGES <= 55): $lettre_ges = 'E';
        elseif($valueGES <= 80): $lettre_ges = 'F';
        elseif($valueGES > 80): $lettre_ges = 'G';
    endif;
    ?>
    <div class="ges<?php echo $classSC.$classBlank; ?>">
        <span class="title"><?php _e('Emission of greenhouse gases', 'wpdpeges'); ?></span>
        <figure class="emission emission-ges">
            <figcaption class="emission-title hidden"><?php _e('Emission of greenhouse gases', 'wpdpeges'); ?></figcaption>
            <div class="emission-container " aria-hidden="true">
                <div class="emission-legend"><span><?php _e('Low GHG emissions', 'wpdpeges'); ?></span> <span><abbr title="<?php _e('Quantity of greenhouse gas emissions', 'wpdpeges'); ?>"><?php _e('KgeqCO2 / m².year', 'wpdpeges'); ?></abbr></span></div>
                <div class="emission-diagram">
                    <div class="emission-line line-a"><span class="emission-value"><?php _e('≤ 5', 'wpdpeges'); ?></span><span class="emission-letter letter-a">A</span></div>
                    <div class="emission-line line-b"><span class="emission-value"><?php _e('6 to 10', 'wpdpeges'); ?></span><span class="emission-letter letter-b">B</span></div>
                    <div class="emission-line line-c"><span class="emission-value"><?php _e('11 to 20', 'wpdpeges'); ?></span><span class="emission-letter letter-c">C</span></div>
                    <div class="emission-line line-d"><span class="emission-value"><?php _e('21 to 35', 'wpdpeges'); ?></span><span class="emission-letter letter-d">D</span></div>
                    <div class="emission-line line-e"><span class="emission-value"><?php _e('36 to 55', 'wpdpeges'); ?></span><span class="emission-letter letter-e">E</span></div>
                    <div class="emission-line line-f"><span class="emission-value"><?php _e('56 to 80', 'wpdpeges'); ?></span><span class="emission-letter letter-f">F</span></div>
                    <div class="emission-line line-g"><span class="emission-value"><?php _e('&gt; 80', 'wpdpeges'); ?></span><span class="emission-letter letter-g">G</span></div>
                </div>
                <div class="emission-scale">
                    <span class="emission-number-container number<?php echo $lettre_ges; ?>">
                        <span class="emission-number" aria-hidden="false"><?php echo $valueGES; ?>
                            <abbr title="<?php _e('Quantity of greenhouse gas emissions', 'wpdpeges'); ?>" class="hidden"><?php _e('KgeqCO2 / m².year', 'wpdpeges'); ?></abbr>
                        </span>
                    </span>
                </div>
                <span><?php _e('High GHG emissions', 'wpdpeges'); ?></span>
            </div>
            <div class="ges-blank">
                <span class="ges-blank-title"><?php _e('GES blank', 'wpdpeges'); ?></span>
                <span class="ges-blank-legend"><?php _e('Non-usable consumption', 'wpdpeges'); ?></span>
            </div>
            <div class="ges-not-subject">
                <span class="ges-not-subject-title"><?php _e( 'Not subject to diagnostic', 'wpdpeges' ); ?></span>
            </div>
        </figure>
    </div>
    <?php endif; ?>
<?php if( ! $shortcode ): ?>
</div>
<?php endif; ?>
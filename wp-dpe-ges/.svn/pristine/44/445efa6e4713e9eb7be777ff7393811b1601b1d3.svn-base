import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element'

export default class PreviewNew extends Component {

  render() {

    if( this.props.attributes ){
        var { dpe_value, ges_value, not_subject, display_inline, display_dpe, display_ges } = this.props.attributes
    }else{
        var { dpe_value, ges_value, not_subject, display_inline, display_dpe, display_ges } = this.props
    }
    if( dpe_value !== "" && dpe_value !== undefined ){
        dpe_value = dpe_value.replace(',','.');
    }else{
        dpe_value = "";
    }
    if( ges_value !== "" && ges_value !== undefined ){
        ges_value = ges_value.replace(',','.');
    }else{
        ges_value = "";
    }
        
    const dpeBlankDisplay = dpe_value ? '' : ' dpe-blank-active';
    const gesBlankDisplay = ges_value ? '' : ' ges-blank-active';

    const dpegesNotSubject = not_subject ? ' dpeges-not-subject-active' : '';

    const Dpe = dpe_value;
    const Ges = ges_value;
    const DpeGesInline = display_inline ? 'energyDiagnosticContainer_inline' : 'energyDiagnosticContainer';
    let lettre_dpe = '';
    let lettre_ges = '';

    if( display_dpe && Dpe !== "" ) {
        if (Dpe < 70 || Dpe.toUpperCase() == 'A') { lettre_dpe = 'A';
        }else if (Dpe < 110 || Dpe.toUpperCase() == 'B'){ lettre_dpe = 'B';
        }else if (Dpe < 180 || Dpe.toUpperCase() == 'C'){ lettre_dpe = 'C';
        }else if (Dpe < 250 || Dpe.toUpperCase() == 'D'){ lettre_dpe = 'D';
        }else if (Dpe < 330 || Dpe.toUpperCase() == 'E'){ lettre_dpe = 'E';
        }else if (Dpe < 420 || Dpe.toUpperCase() == 'F'){ lettre_dpe = 'F';
        }else if (Dpe >= 420 || Dpe.toUpperCase() == 'G'){ lettre_dpe = 'G';
        };
    }
    if( display_ges && Ges !== "" ) {
        if (Ges < 6 || Ges.toUpperCase() == 'A') { lettre_ges = 'A';
        }else if(Ges < 11 || Ges.toUpperCase() == 'B'){ lettre_ges = 'B';
        }else if(Ges < 30 || Ges.toUpperCase() == 'C'){ lettre_ges = 'C';
        }else if(Ges < 50 || Ges.toUpperCase() == 'D'){ lettre_ges = 'D';
        }else if(Ges < 70 || Ges.toUpperCase() == 'E'){ lettre_ges = 'E';
        }else if(Ges < 100 || Ges.toUpperCase() == 'F'){ lettre_ges = 'F';
        }else if(Ges >= 100 || Ges.toUpperCase() == 'G'){ lettre_ges = 'G';
        };
    }
    if( lettre_ges > lettre_dpe ){
        lettre_dpe = lettre_ges;
    }
    var dpeClass = 'newdpe ' + dpeBlankDisplay + dpegesNotSubject;
    var dpeContainerClass = 'diagnostic-scale number' + lettre_dpe;
    var dpeDiagramContainerClass = 'diagnostic-diagram number' + lettre_dpe;
    var gesClass = 'newges ' + gesBlankDisplay + dpegesNotSubject;
    var gesContainerClass = 'emission-scale  number' + lettre_ges;
    var gesDiagramContainerClass = 'emission-diagram number' + lettre_ges;

    if( display_dpe ) {
        var output_dpe = (
            <div className={dpeClass}>
                <span className="dpe-title">{ __( 'Energy performance diagnostic', 'wpdpeges' ) }</span>
                <figure className="diagnostic diagnostic-dpe">
                    <div className="diagnostic-container" aria-hidden="true">
                        <div className={dpeContainerClass}>
                            <span className="diagnostic-number-container">
                                <span className="diagnostic-number" aria-hidden="false">{Dpe}</span>
                                <abbr title={ __('Primary Energy Unit', 'wpdpeges') }>{ __( 'KWh/m².year', 'wpdpeges' ) }</abbr>
                            </span>
                            <span className="emission-number-container">
                                <span className="emission-number" aria-hidden="false">{Ges}*</span>
                                <abbr title={ __('Quantity of greenhouse gas emissions', 'wpdpeges') }>{ __( 'kg CO2/m².year', 'wpdpeges' ) }</abbr>
                            </span>
                        </div>
                        <div className={dpeDiagramContainerClass}>
                            <div className="diagnostic-legend-top"><span>{ __( 'Efficient housing', 'wpdpeges' ) }</span></div>
                            <div className="diagnostic-line line-a"><span className="diagnostic-letter letter-a">A</span></div>
                            <div className="diagnostic-line line-b"><span className="diagnostic-letter letter-b">B</span></div>
                            <div className="diagnostic-line line-c"><span className="diagnostic-letter letter-c">C</span></div>
                            <div className="diagnostic-line line-d"><span className="diagnostic-letter letter-d">D</span></div>
                            <div className="diagnostic-line line-e"><span className="diagnostic-letter letter-e">E</span></div>
                            <div className="diagnostic-line line-f"><span className="diagnostic-letter letter-f">F</span></div>
                            <div className="diagnostic-line line-g"><span className="diagnostic-letter letter-g">G</span></div>
                            <div className="diagnostic-legend-bottom"><span>{ __( 'High energy housing', 'wpdpeges' ) }</span></div>
                        </div>
                    </div>
                    <div className="dpe-blank">
                        <span className="dpe-blank-title">{ __( 'DPE blank', 'wpdpeges' ) }</span>
                        <span className="dpe-blank-legend">{ __( 'Non-usable consumption', 'wpdpeges' ) }</span>
                    </div>
                    <div className="dpe-not-subject">
                        <span className="dpe-not-subject-title">{ __( 'Not subject to diagnostic', 'wpdpeges' ) }</span>
                    </div>
                </figure>
            </div>
        );
    }

    if( display_ges ) {
        var output_ges = (
            <div className={gesClass}>
                <span className="ges-title">{ __( '* Of which greenhouse gas emissions', 'wpdpeges' ) }</span>
                <figure className="emission emission-ges">
                    <div className="emission-container " aria-hidden="true">
                        <div className={gesDiagramContainerClass}>
                            <div className="emission-legend-top"><span>{ __( 'Low GHG emissions', 'wpdpeges' ) }</span> </div>
                            <div className="emission-line line-a"><span className="emission-letter letter-a">A</span></div>
                            <div className="emission-line line-b"><span className="emission-letter letter-b">B</span></div>
                            <div className="emission-line line-c"><span className="emission-letter letter-c">C</span></div>
                            <div className="emission-line line-d"><span className="emission-letter letter-d">D</span></div>
                            <div className="emission-line line-e"><span className="emission-letter letter-e">E</span></div>
                            <div className="emission-line line-f"><span className="emission-letter letter-f">F</span></div>
                            <div className="emission-line line-g"><span className="emission-letter letter-g">G</span></div>
                            <div className="emission-legend-bottom"><span>{ __( 'High GHG emissions', 'wpdpeges' ) }</span></div>
                        </div>
                        <div className={gesContainerClass}>
                            <span className="emission-number-container">
                                <span className="emission-number" aria-hidden="false">{Ges}</span>
                                <abbr title={ __('Quantity of greenhouse gas emissions', 'wpdpeges') }>{ __( 'KgeqCO2 / m².year', 'wpdpeges' ) }</abbr>
                            </span>
                        </div>
                        
                    </div>
                    <div className="ges-blank">
                        <span className="ges-blank-title">{ __( 'GES blank', 'wpdpeges' ) }</span>
                        <span className="ges-blank-legend">{ __( 'Non-usable consumption', 'wpdpeges' ) }</span>
                    </div>
                </figure>
            </div>
        );
    }
    
    if( display_dpe && display_ges ) {
        return (<div className={DpeGesInline}>{output_dpe}{output_ges}</div>);
    }else if( display_dpe ){
        return output_dpe;
    }else if( display_ges ){
        return output_ges;
    }else{
        return ;
    }
  }
}
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element'

export default class Preview extends Component {

  render() {

    if( this.props.attributes ){
        var { dpe_value, ges_value, not_subject, display_inline, display_dpe, display_ges } = this.props.attributes
    }else{
        var { dpe_value, ges_value, not_subject, display_inline, display_dpe, display_ges } = this.props
    }
    
    const dpeBlankDisplay = dpe_value ? '' : ' dpe-blank-active';
    const gesBlankDisplay = ges_value ? '' : ' ges-blank-active';
    const dpegesNotSubject = not_subject ? ' dpeges-not-subject-active' : '';
    const Dpe = dpe_value;
    const Ges = ges_value;
    const DpeGesInline = display_inline ? ' dpe-ges-inline' : '';

    if( display_dpe ) {
      let lettre_dpe;
      if (Dpe < 51 || Dpe == 'A') { lettre_dpe = 'A';
        }else if (Dpe < 91 || Dpe == 'B'){ lettre_dpe = 'B';
        }else if (Dpe < 151 || Dpe == 'C'){ lettre_dpe = 'C';
        }else if (Dpe < 231 || Dpe == 'D'){ lettre_dpe = 'D';
        }else if (Dpe < 331 || Dpe == 'E'){ lettre_dpe = 'E';
        }else if (Dpe < 451 || Dpe == 'F'){ lettre_dpe = 'F';
        }else if (Dpe >= 451 || Dpe == 'G'){ lettre_dpe = 'G';
        };
        var dpeClass = 'dpe ' + dpeBlankDisplay + dpegesNotSubject;
        var dpeContainerClass = 'diagnostic-number-container number' + lettre_dpe;

        var output_dpe = (
            <div className={dpeClass}>
                <span className="dpe-title">{ __( 'Energy performance diagnostic', 'wpdpeges' ) }</span>
                <figure className="diagnostic diagnostic-dpe">
                    <figcaption className="diagnostic-title hidden">{ __( 'Energy performance diagnostic', 'wpdpeges' ) }</figcaption>
                    <div className="diagnostic-container" aria-hidden="true">
                        <div className="diagnostic-legend"><span>{ __( 'Efficient housing', 'wpdpeges' ) }</span> <span><abbr title={ __('Primary Energy Unit', 'wpdpeges') }>{ __( 'KWhep / m².year', 'wpdpeges' ) }</abbr></span></div>
                        <div className="diagnostic-diagram">
                            <div className="diagnostic-line line-a"><span className="diagnostic-value">{ __( '≤ 50', 'wpdpeges' ) }</span><span className="diagnostic-letter letter-a">A</span></div>
                            <div className="diagnostic-line line-b"><span className="diagnostic-value">{ __( '51 to 90', 'wpdpeges' ) }</span><span className="diagnostic-letter letter-b">B</span></div>
                            <div className="diagnostic-line line-c"><span className="diagnostic-value">{ __( '91 to 150', 'wpdpeges' ) }</span><span className="diagnostic-letter letter-c">C</span></div>
                            <div className="diagnostic-line line-d"><span className="diagnostic-value">{ __( '151 to 230', 'wpdpeges' ) }</span><span className="diagnostic-letter letter-d">D</span></div>
                            <div className="diagnostic-line line-e"><span className="diagnostic-value">{ __( '231 to 330', 'wpdpeges' ) }</span><span className="diagnostic-letter letter-e">E</span></div>
                            <div className="diagnostic-line line-f"><span className="diagnostic-value">{ __( '331 to 450', 'wpdpeges' ) }</span><span className="diagnostic-letter letter-f">F</span></div>
                            <div className="diagnostic-line line-g"><span className="diagnostic-value">{ __( '> 450', 'wpdpeges' ) }</span><span className="diagnostic-letter letter-g">G</span></div>
                        </div>
                        <div className="diagnostic-scale">
                            <span className={ dpeContainerClass }>
                                <span className="diagnostic-number" aria-hidden="false">{Dpe}<abbr className="hidden" title="Primary Energy Unit">{ __( 'KWhep / m².year', 'wpdpeges' ) }</abbr></span>
                            </span>
                        </div>
                        <span>{ __( 'High energy housing', 'wpdpeges' ) }</span>
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
        let lettre_ges;
        if (Ges <= 5 || Ges == 'A') { lettre_ges = 'A';
        }else if(Ges < 11 || Ges == 'B'){ lettre_ges = 'B';
        }else if(Ges < 21 || Ges == 'C'){ lettre_ges = 'C';
        }else if(Ges < 36 || Ges == 'D'){ lettre_ges = 'D';
        }else if(Ges < 56 || Ges == 'E'){ lettre_ges = 'E';
        }else if(Ges < 81 || Ges == 'F'){ lettre_ges = 'F';
        }else if(Ges >= 81 || Ges == 'G'){ lettre_ges = 'G';
        };
        var gesClass = 'ges ' + gesBlankDisplay + dpegesNotSubject;
        var gesContainerClass = 'emission-number-container number' + lettre_ges;
        var output_ges = (
            <div className={gesClass}>
                <span className="ges-title">{ __( 'Emission of greenhouse gases', 'wpdpeges' ) }</span>
                <figure className="emission emission-ges">
                    <figcaption className="emission-title hidden">{ __( 'Emission of greenhouse gases', 'wpdpeges' ) }</figcaption>
                    <div className="emission-container " aria-hidden="true">
                        <div className="emission-legend"><span>{ __( 'Low GHG emissions', 'wpdpeges' ) }</span> <span><abbr title={ __('Quantity of greenhouse gas emissions', 'wpdpeges') }>{ __( 'KgeqCO2 / m².year', 'wpdpeges' ) }</abbr></span></div>
                        <div className="emission-diagram">
                            <div className="emission-line line-a"><span className="emission-value">{ __( '≤ 5', 'wpdpeges' ) }</span><span className="emission-letter letter-a">A</span></div>
                            <div className="emission-line line-b"><span className="emission-value">{ __( '6 to 10', 'wpdpeges' ) }</span><span className="emission-letter letter-b">B</span></div>
                            <div className="emission-line line-c"><span className="emission-value">{ __( '11 to 20', 'wpdpeges' ) }</span><span className="emission-letter letter-c">C</span></div>
                            <div className="emission-line line-d"><span className="emission-value">{ __( '21 to 35', 'wpdpeges' ) }</span><span className="emission-letter letter-d">D</span></div>
                            <div className="emission-line line-e"><span className="emission-value">{ __( '36 to 55', 'wpdpeges' ) }</span><span className="emission-letter letter-e">E</span></div>
                            <div className="emission-line line-f"><span className="emission-value">{ __( '56 to 80', 'wpdpeges' ) }</span><span className="emission-letter letter-f">F</span></div>
                            <div className="emission-line line-g"><span className="emission-value">{ __( '> 80', 'wpdpeges' ) }</span><span className="emission-letter letter-g">G</span></div>
                        </div>
                        <div className="emission-scale">
                            <span className={ gesContainerClass }>
                                <span className="emission-number" aria-hidden="false">{Ges}
                                    <abbr title={ __('Quantity of greenhouse gas emissions', 'wpdpeges') } className="hidden">{ __( 'KgeqCO2 / m².year', 'wpdpeges' ) }</abbr>
                                </span>
                            </span>
                        </div>
                        <span>{ __( 'High GHG emissions', 'wpdpeges' ) }</span>
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
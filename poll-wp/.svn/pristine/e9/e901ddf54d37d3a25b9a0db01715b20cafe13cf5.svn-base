<?php
echo "<style  id='tsp_special' type='text/css'>
    :root{ ";
foreach ( $TS_Poll_Colors_Array as $key => $value ) :
	echo sprintf(
		'
                --tsp_a_c_%s-%s : %s;',
		esc_html( $total_soft_poll ),
		esc_html( $key ),
		esc_attr( $value )
	);
		endforeach;
echo '}';
if ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standart Poll' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standard Poll' ) {
	foreach ( $TS_Poll_Colors_Array as $key => $value ) :
		echo sprintf(
			" 
            main.ts_poll_r_main_%s[data-tsp-bool='false'] > .ts_poll_answer_result[data-tsp-id='%s'] > .ts_poll_answer_result_label > .ts_poll_answer_percent_line{
                background-color: var(--tsp_a_c_%s-%s);
            }
            main.ts_poll_main_%s[data-tsp-bool='false'] > .ts_poll_answer[data-tsp-id='%s'] > .ts_poll_answer_label {
                color: var(--tsp_a_c_%s-%s);
            }
            ",
			esc_html( $total_soft_poll ),
			esc_html( $key ),
			esc_html( $total_soft_poll ),
			esc_html( $key ),
			esc_html( $total_soft_poll ),
			esc_html( $key ),
			esc_html( $total_soft_poll ),
			esc_html( $key )
		);
	endforeach;
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image Poll' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video Poll' ) {
	foreach ( $TS_Poll_Colors_Array as $key => $value ) :
		echo sprintf(
			" 
            main.ts_poll_main_%s[data-tsp-color='Background'] > .ts_poll_answer[data-tsp-id='%s'] > .ts_poll_before_div{
                background: var(--tsp_a_c_%s-%s);
            }
            main.ts_poll_main_%s[data-tsp-color='Color'] > .ts_poll_answer[data-tsp-id='%s']  .ts_poll_answer_label{
                color: var(--tsp_a_c_%s-%s);
            }
            ",
			esc_html( $total_soft_poll ),
			esc_html( $key ),
			esc_html( $total_soft_poll ),
			esc_html( $key ),
			esc_html( $total_soft_poll ),
			esc_html( $key ),
			esc_html( $total_soft_poll ),
			esc_html( $key )
		);
	endforeach;
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standart Without Button' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standard Without Button' ||
		 $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image Without Button' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video Without Button' ||
		 $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image in Question' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video in Question' ) {
	foreach ( $TS_Poll_Colors_Array as $key => $value ) :
		echo sprintf(
			' 
            main.ts_poll_main_%1$s[data-tsp-color="Background"] > .ts_poll_answer[data-tsp-id="%2$s"]{
                background-color: var(--tsp_a_c_%1$s-%2$s);
            }
            main.ts_poll_main_%1$s[data-tsp-color="Color"] > .ts_poll_answer[data-tsp-id="%2$s"] .ts_poll_answer_label{
                color: var(--tsp_a_c_%1$s-%2$s);
            }
            main.ts_poll_main_%1$s[data-tsp-voted="Background"] > .ts_poll_answer[data-tsp-id="%2$s"]  span.ts_poll_r_progress{
                background-color: var(--tsp_a_c_%1$s-%2$s);
            }
            main.ts_poll_main_%1$s[data-tsp-voted="Color"] > .ts_poll_answer[data-tsp-id="%2$s"]  label.ts_poll_r_label{
                color: var(--tsp_a_c_%1$s-%2$s);
            }
            ',
			esc_html( $total_soft_poll ),
			esc_html( $key )
		);
	endforeach;
}
echo ' </style> ';


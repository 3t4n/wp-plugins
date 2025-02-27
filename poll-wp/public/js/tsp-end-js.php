<?php
$tsp_content_js = $tsp_content_js_block = $tsp_content_js_code = '';
if ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standart Poll' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standard Poll' ) {
	if ( isset( $tspoll_question_styles->ts_poll_p_shpop ) ) {
		$tsp_effect_data_jquery = '';
		switch ( $tspoll_question_styles->ts_poll_p_sheff ) {
			case 'FTTB':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "translateY(0px)",
                  "-ms-transform": "translateY(0px)",
                  "-o-transform": "translateY(0px)",
                  "-moz-transform": "translateY(0px)",
                  "-webkit-transform": "translateY(0px)",
                  "opacity": "1"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FLTR':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "translateX(0px)",
                  "-ms-transform": "translateX(0px)",
                  "-o-transform": "translateX(0px)",
                  "-moz-transform": "translateX(0px)",
                  "-webkit-transform": "translateX(0px)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FRTL':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "translateX(0px)",
                  "-ms-transform": "translateX(0px)",
                  "-o-transform": "translateX(0px)",
                  "-moz-transform": "translateX(0px)",
                  "-webkit-transform": "translateX(0px)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FCTA':
				if ( $tspoll_question_styles->ts_poll_pos == 'left' ) {
					$tsp_effect_data_jquery = sprintf(
						'
                  $(".ts_poll_r_section_%1$s").animate({
                      "width": 100%%,
                      "left": "0%%",
                      "height": "100%%",
                      "top": "0%%",
                  }, 500);
              ',
						esc_js( $total_soft_poll )
					);
				} elseif ( $tspoll_question_styles->ts_poll_pos == 'right' ) {
					$tsp_effect_data_jquery = sprintf(
						'
                  $(".ts_poll_r_section_%1$s").animate({
                      "width": 100%%,
                      "right": "0%%",
                      "height": "100%%",
                      "top": "0%%",
                  }, 500);
              ',
						esc_js( $total_soft_poll )
					);
				} else {
					$tsp_effect_data_jquery = sprintf(
						'
                  $(".ts_poll_r_section_%1$s").animate({
                      "width": "100%%",
                      "left": "0%%",
                      "height": "100%%",
                      "top": "0%%",
                  }, 500);
              ',
						esc_js( $total_soft_poll )
					);
				}
				break;
			case 'FTL':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "rotateY(0deg)",
                  "-ms-transform": "rotateY(0deg)",
                  "-o-transform": "rotateY(0deg)",
                  "-moz-transform": "rotateY(0deg)",
                  "-webkit-transform": "rotateY(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FTR':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "rotateX(0deg)",
                  "-ms-transform": "rotateX(0deg)",
                  "-o-transform": "rotateX(0deg)",
                  "-moz-transform": "rotateX(0deg)",
                  "-webkit-transform": "rotateX(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBL':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "rotate(0deg)",
                  "-ms-transform": "rotate(0deg)",
                  "-o-transform": "rotate(0deg)",
                  "-moz-transform": "rotate(0deg)",
                  "-webkit-transform": "rotate(0deg)",
                  "z-index": "9999"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBR':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "skewX(0deg)",
                  "-ms-transform": "skewX(0deg)",
                  "-o-transform": "skewX(0deg)",
                  "-moz-transform": "skewX(0deg)",
                  "-webkit-transform": "skewX(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
			case 'FBTT':
				$tsp_effect_data_jquery = sprintf(
					'
              $(".ts_poll_r_section_%1$s").css({
                  "transform": "skewY(0deg)",
                  "-ms-transform": "skewY(0deg)",
                  "-o-transform": "skewY(0deg)",
                  "-moz-transform": "skewY(0deg)",
                  "-webkit-transform": "skewY(0deg)"
              });
          ',
					esc_js( $total_soft_poll )
				);
				break;
		}
		$tsp_content_js_code .= sprintf(
			'
        $(window).on("load",function(){
            %2$s
            setTimeout(() => {
              $(".ts_poll_header_%1$s,.ts_poll_main_%1$s,.ts_poll_footer_%1$s").css({
                "opacity": "0"
              });
            }, 500);
            $(".ts_poll_r_main_%s >  .ts_poll_answer_result > .ts_poll_answer_result_label > span.ts_poll_answer_percent_line").each(function () {
              $(this).animate({"width": $(this).attr("data-tsp-w")}, 1500);
            });
        });
      ',
			esc_attr( $total_soft_poll ),
			$tsp_effect_data_jquery
		);
	} else {
		$tsp_content_js_code .= sprintf(
			'
      $(window).on("load",function(){
          $("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").css("z-index", "9999").animate({ "opacity": "1" }, 500);
          $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").css("z-index", "9999").animate({ "opacity": "1" }, 500);
          setTimeout(() => {
            $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block span.ts_poll_r_progress").each(function () {
                $(this).animate({ "width": `${$(this).attr("data-tsp-length")}%%` }, 1500);
            });
          }, 500);
      });
      ',
			esc_js( $total_soft_poll )
		);
	}
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image Poll' || $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video Poll' ) {
	$tsp_data_effect = '';
	switch ( $tspoll_question_styles->ts_poll_p_a_veff ) {
		case '0':
			$tsp_data_effect      = sprintf( '$(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "flex");', esc_attr( $total_soft_poll ) );
			$tsp_data_back_effect = sprintf( '$(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "none");', esc_attr( $total_soft_poll ) );
			break;
		case '1':
			$tsp_data_effect      = sprintf(
				'
        $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
          "transform": "rotateY(-90deg)", "-ms-transform": "rotateY(-90deg)", "-o-transform": "rotateY(-90deg)", "-moz-transform": "rotateY(-90deg)", "-webkit-transform": "rotateY(-90deg)"
        });
        setTimeout(function() {
          $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
            "transform": "rotateY(2deg)","-ms-transform": "rotateY(2deg)","-o-transform": "rotateY(2deg)","-moz-transform": "rotateY(2deg)","-webkit-transform": "rotateY(2deg)"
          });
          $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
            "transform": "rotateY(2deg)", "-ms-transform": "rotateY(2deg)", "-o-transform": "rotateY(2deg)", "-moz-transform": "rotateY(2deg)", "-webkit-transform": "rotateY(2deg)"
          });
        }, 500);
       ',
				esc_attr( $total_soft_poll )
			);
			$tsp_data_back_effect = sprintf(
				'
        $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
          "transform": "rotateY(-90deg)","-ms-transform": "rotateY(-90deg)","-o-transform": "rotateY(-90deg)","-moz-transform": "rotateY(-90deg)","-webkit-transform": "rotateY(-90deg)"
        });
        $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
          "transform": "rotateY(-90deg)","-ms-transform": "rotateY(-90deg)","-o-transform": "rotateY(-90deg)","-moz-transform": "rotateY(-90deg)","-webkit-transform": "rotateY(-90deg)"
        });
        setTimeout(function() {
          $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
              "transform": "rotateY(2deg)","-ms-transform": "rotateY(2deg)","-o-transform": "rotateY(2deg)","-moz-transform": "rotateY(2deg)","-webkit-transform": "rotateY(2deg)"
          });
        }, 500);
       ',
				esc_attr( $total_soft_poll )
			);
			break;
		case '2':
			$tsp_data_effect      = sprintf(
				'
        $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
         "transform": "rotateX(-90deg)","-ms-transform": "rotateX(-90deg)","-o-transform": "rotateX(-90deg)","-moz-transform": "rotateX(-90deg)","-webkit-transform": "rotateX(-90deg)"
        });
        setTimeout(function() {
          $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
            "transform": "rotateX(0deg)","-ms-transform": "rotateX(0deg)","-o-transform": "rotateX(0deg)","-moz-transform": "rotateX(0deg)","-webkit-transform": "rotateX(2deg)"
          });
          $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
            "transform": "rotateX(0deg)","-ms-transform": "rotateX(0deg)","-o-transform": "rotateX(0deg)","-moz-transform": "rotateX(0deg)","-webkit-transform": "rotateX(2deg)"
          });
        }, 500);
       ',
				esc_attr( $total_soft_poll )
			);
			$tsp_data_back_effect = sprintf(
				'
        $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
          "transform": "rotateX(-90deg)","-ms-transform": "rotateX(-90deg)","-o-transform": "rotateX(-90deg)","-moz-transform": "rotateX(-90deg)","-webkit-transform": "rotateX(-90deg)"
        });
        $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css({
          "transform": "rotateX(-90deg)","-ms-transform": "rotateX(-90deg)","-o-transform": "rotateX(-90deg)","-moz-transform": "rotateX(-90deg)","-webkit-transform": "rotateX(-90deg)"
        });
        setTimeout(function() {
          $(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_before_div`).css({
            "transform": "rotateX(0deg)","-ms-transform": "rotateX(0deg)","-o-transform": "rotateX(0deg)","-moz-transform": "rotateX(0deg)","-webkit-transform": "rotateX(2deg)"
          });
        }, 500)
       ',
				esc_attr( $total_soft_poll )
			);
			break;
		default:
			$tsp_data_effect      = sprintf( '$(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "flex");', esc_attr( $total_soft_poll ) );
			$tsp_data_back_effect = sprintf( '$(`main.ts_poll_main_%1$s > .ts_poll_answer > .ts_poll_after_div`).css("display", "none");', esc_attr( $total_soft_poll ) );
			break;
	}
	$tsp_content_js_code .= sprintf(
		'
      $(window).on("load",function(){
          $(`footer.ts_poll_footer_%1$s div.ts_poll_footer_res`).css({"z-index": "9999"}).animate({"opacity": "1"}, 400);
          %2$s
      });
      ',
		esc_attr( $total_soft_poll ),
		$tsp_data_effect
	);
} elseif ( $TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standart Without Button' ||
		$TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Standard Without Button' ||
		$TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image Without Button' ||
		$TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video Without Button' ||
		$TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Image in Question' ||
		$TS_Poll_Question_Params->TS_Poll_Q_Theme == 'Video in Question' ) {
	$tsp_content_js_code .= sprintf(
		'
      $(window).on("load",function(){
          $("footer.ts_poll_footer_%1$s div.ts_poll_footer_res").css("z-index", "9999").animate({ "opacity": "1" }, 500);
          $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block").css("z-index", "9999").animate({ "opacity": "1" }, 500);
          setTimeout(() => {
            $("main.ts_poll_main_%1$s > div.ts_poll_answer  span.ts_poll_r_block span.ts_poll_r_progress").each(function () {
                $(this).animate({ "width": `${$(this).attr("data-tsp-length")}%%` }, 1500);
            });
          }, 500);
      });
      ',
		esc_js( $total_soft_poll )
	);
}
$tsp_content_js .= sprintf(
	'
  (function($) {
    "use strict";
    %s
  })(jQuery);
  ',
	$tsp_content_js_code
);
wp_add_inline_script( "ts_poll_end_js_{$total_soft_poll}", $tsp_content_js );


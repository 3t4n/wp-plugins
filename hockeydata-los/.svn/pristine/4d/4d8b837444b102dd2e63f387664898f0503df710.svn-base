<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

function hd_los_get_custom_css() {

	$css = '';

	$map = array(

		'hd_los_css_color_0' => array(
			'border-color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-data table',
				'.-hd-button',
				'.-hd-util-tabs .-hd-util-tabs-button',
				'.-hd-los-knockout-stage',
				'.-hd-los-game-slider .-hd-los-game-slider-period-bar',
				'.-hd-los-game-live-box-wrapper .-hd-los-game-live-box',
				'.-hd-los-game-live-box .-hd-los-game-play-by-play-score',
				'.-hd-los-game-scores .-hd-los-game-scores-game-time',
				'.-hd-los-game-scores .-hd-los-game-scores-score',
				'.-hd-los-game-play-by-play .-hd-los-game-play-by-play-game-time',
				'.-hd-los-game-full-report .-hd-los-game-full-report-container-data',
				'.-hd-los-game-full-report .-hd-los-game-scores-game-time',
				'.-hd-los-game-full-report .-hd-los-game-scores-score',
				'.-hd-los-game-full-report .-hd-los-game-play-by-play-game-time',
				'.-hd-los-game-full-report .-hd-los-game-play-by-play-score',
				'.-hd-los-game-full-report .-hd-los-game-full-report-field-players-data-lineups',
				'.-hd-los-game-full-report .-hd-los-game-full-report-time-on-ice-highlights-player',
				'.-hd-los-player-full-page .-hd-los-player-full-page-container-data',
				'.-hd-los-team-full-page .-hd-los-team-full-page-container-data',
				'.-hd-los-team-full-page .-hd-los-team-full-page-team-picture img',
				'.-hd-los-team-full-page .-hd-los-team-full-page-team-facts-table .-hd-util-intellitable-data .-hd-util-intellitable-data > table'
			),
			'color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-legend td',
				'.-hd-los-game-scores .-hd-los-game-scores-game-time',
				'.-hd-los-game-play-by-play .-hd-los-game-play-by-play-game-time',
				'.-hd-los-game-full-report .-hd-los-game-scores-game-time',
				'.-hd-los-game-full-report .-hd-los-game-play-by-play-game-time'
			),
			'border-bottom-color' => array(
				'.-hd-util-tabs .-hd-util-tabs-buttons',
				'.-hd-util-tabs-pane .-hd-util-tabs .-hd-util-tabs-button',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter',
				'.-hd-los-division-picker .-hd-los-division-picker-select-container'
			),
			'border-right-color' => array(
				'.-hd-util-tabs-pane .-hd-util-tabs .-hd-util-tabs-button:last-child',
				'.-hd-los-game-live-box .-hd-los-game-live-box-period-bar td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-period-bar td'
			),
			'border-top-color' => array(
				'.-hd-los-game-live-box .-hd-los-game-live-box-tabs .-hd-util-tabs-button'
			),
			'border-left-color' => array(
				'.-hd-los-game-full-report th.-hd-los-game-full-report-time-on-ice-player-jersey-nr-away',
				'.-hd-los-game-full-report td.-hd-los-game-full-report-time-on-ice-player-jersey-nr-away'
			),
			'background-color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-data th',
				'.-hd-button.-hd-button-active',
				'.-hd-util-tabs .-hd-util-tabs-button:hover',
				'.-hd-util-tabs .-hd-util-tabs-button-active',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-header',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-info',
				'.-hd-los-knockout-stage-compact .-hd-los-knockout-stage-compact-phase-header',
				'.-hd-los-game-slider .-hd-util-slider',
				'.-hd-los-game-slider .-hd-los-game-slider-period-bar td',
				'.-hd-los-game-ticker .-hd-los-game-ticker-game',
				'.-hd-los-game-live-box .-hd-los-game-live-box-game-info',
				'.-hd-los-game-live-box .-hd-los-game-live-box-period-stats',
				'.-hd-los-game-live-box .-hd-los-game-live-box-tabs .-hd-util-tabs-button:hover',
				'.-hd-los-game-live-box .-hd-los-game-live-box-tabs .-hd-util-tabs-button-active',
				'.-hd-los-game-scores .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-scores-row-period-change td',
				'.-hd-los-game-scores .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-scores-row-period-change:nth-child(odd) td',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-play-by-play-row-period-change:nth-child(even) td',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-play-by-play-row-period-change:nth-child(odd) td',
				'.-hd-los-game-info',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-info',
				'.-hd-los-game-full-report .-hd-los-game-full-report-headline',
				'.-hd-los-game-full-report .-hd-los-game-full-report-lineup-player-jersey-no',
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-info',
				'.-hd-los-player-full-page .-hd-los-player-full-page-headline',
				'.-hd-los-team-full-page .-hd-los-team-full-page-team-info',
				'.-hd-los-team-full-page .-hd-los-team-full-page-headline'
			)
		),

		'hd_los_css_color_1' => array(
			'color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-data th',
				'.-hd-button.-hd-button-active',
				'.-hd-util-tabs .-hd-util-tabs-button',
				'.-hd-util-tabs .-hd-util-tabs-button:hover',
				'.-hd-los-schedule .-hd-los-schedule-overtime',
				'.-hd-los-schedule .-hd-los-schedule-shootout',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-header',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-header',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-info',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-games.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-knockout-stage-overtime',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-games.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-knockout-stage-shootout',
				'.-hd-los-knockout-stage-compact .-hd-los-knockout-stage-compact-phase-header',
				'.-hd-los-game-slider .-hd-util-slider',
				'.-hd-los-game-ticker .-hd-los-game-ticker-game',
				'.-hd-los-game-live-box .-hd-los-game-live-box-game-info',
				'.-hd-los-game-live-box .-hd-los-game-live-box-period-stats',
				'.-hd-los-game-live-box .-hd-los-game-live-box-tabs .-hd-util-tabs-button:hover',
				'.-hd-los-game-live-box .-hd-los-game-live-box-tabs .-hd-util-tabs-content',
				'.-hd-los-game-scores .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-scores-row-period-change td',
				'.-hd-los-game-scores .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-scores-row-period-change:nth-child(odd) td',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-play-by-play-row-period-change:nth-child(even) td',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-play-by-play-row-period-change:nth-child(odd) td',
				'.-hd-los-game-info',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-info',
				'.-hd-los-game-full-report .-hd-los-game-full-report-period-bar-label',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-facts',
				'.-hd-los-game-full-report .-hd-los-game-full-report-headline',
				'.-hd-los-game-full-report .-hd-los-game-full-report-lineup-player-jersey-no',
				'.-hd-los-game-full-report .-hd-los-game-full-report-penalty-shot',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-winning-goal',
				'.-hd-los-game-full-report .-hd-los-game-full-report-empty-net',
				'.-hd-los-game-full-report .-hd-los-game-full-report-time-on-ice-highlights-player-name',
				'.-hd-los-game-full-report .-hd-los-game-full-report-time-on-ice-highlights-player-stats',
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-info',
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-jersey-no',
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-facts',
				'.-hd-los-player-full-page .-hd-los-player-full-page-headline',
				'.-hd-los-player-full-page .-hd-los-player-full-page-games-state',
				'.-hd-los-team-full-page .-hd-los-team-full-page-team-info',
				'.-hd-los-team-full-page .-hd-los-team-full-page-headline',
				'.-hd-los-team-full-page .-hd-los-team-full-page-roster-player-container',
				'.-hd-los-team-full-page .-hd-los-team-full-page-games-state'
			),
			'border-right-color' => array(
				'.-hd-los-game-full-report .-hd-los-game-full-report-lineup-player-jersey-no'
			)
		),

		'hd_los_css_color_2' => array(
			'background-color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-data th.-hd-util-intellitable-sorted',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-header',
				'.-hd-los-game-ticker .-hd-los-game-ticker-overtime',
				'.-hd-los-game-ticker .-hd-los-game-ticker-shootout',
				'.-hd-los-game-live-box .-hd-los-game-live-box-period-bar td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-period-stats > div.-hd-los-game-live-box-period-stats-header > div',
				'.-hd-los-game-info .-hd-los-game-info-game-state',
				'.-hd-los-game-info .-hd-los-game-info-game-date',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-state',
				'.-hd-los-game-full-report .-hd-los-game-full-report-period-bar td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-period-stats > div > div',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-fact-label div',
				'.-hd-los-game-full-report .-hd-los-game-full-report-headline .-hd-button.-hd-button-active',
				'.-hd-los-player-full-page .-hd-los-player-full-page-team-logo',
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-fact-label div',
				'.-hd-los-player-full-page .-hd-los-player-full-page-games-state',
				'.-hd-los-team-full-page .-hd-los-team-full-page-team-logo',
				'.-hd-los-team-full-page .-hd-los-team-full-page-games-state'
			),
			'border-bottom-color' => array(
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-info',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-info',
				'.-hd-los-game-full-report .-hd-los-game-full-report-headline',
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-info',
				'.-hd-los-player-full-page .-hd-los-player-full-page-headline',
				'.-hd-los-team-full-page .-hd-los-team-full-page-team-info',
				'.-hd-los-team-full-page .-hd-los-team-full-page-headline'
			),
			'border-color' => array(
				'.-hd-los-game-full-report .-hd-los-game-full-report-headline .-hd-button'
			),
			'color' => array(
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-jersey-no'
			)
		),

		'hd_los_css_color_3' => array(
			'background-color' => array(
				'.-hd-los-schedule .-hd-los-schedule-overtime',
				'.-hd-los-schedule .-hd-los-schedule-shootout',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-games.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-knockout-stage-overtime',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-games.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-knockout-stage-shootout',
				'.-hd-los-knockout-stage-compact .-hd-util-intellitable .-hd-util-intellitable-data th',
				'.-hd-los-game-live-box .-hd-los-game-live-box-scores.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-live-box-scores-row-period-change td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-scores.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-live-box-scores-row-period-change:nth-child(odd) td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-live-box-play-by-play-row-period-change:nth-child(even) td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-live-box-play-by-play-row-period-change:nth-child(odd) td',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(even) td',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(odd) td',
				'.-hd-los-game-full-report .-hd-util-intellitable-data th',
				'.-hd-los-game-full-report .-hd-los-game-full-report-scores-data.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-full-report-scores-row-period-change td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-scores-data.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-full-report-scores-row-period-change:nth-child(odd) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-full-report-play-by-play-row-period-change:nth-child(even) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data .-hd-los-game-full-report-play-by-play-row-period-change:nth-child(odd) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-penalty-shot',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-winning-goal',
				'.-hd-los-game-full-report .-hd-los-game-full-report-empty-net',
				'.-hd-los-player-full-page .-hd-util-intellitable-data th',
				'.-hd-los-team-full-page .-hd-util-intellitable-data th',
				'.-hd-los-team-full-page .-hd-los-team-full-page-team-facts-table .-hd-util-intellitable-data tr.-hd-los-team-full-page-team-facts-table-header-row td'
			),
			'color' => array(
				'.-hd-los-standings .-hd-los-standings-official-status-text'
			),
			'border-bottom-color' => array(
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(even) td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(odd) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(even) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(odd) td'
			),
			'border-top-color' => array(
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(even) td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(odd) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(even) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data tr.-hd-label-DRIVETOTAL:nth-child(odd) td'
			)
		),

		'hd_los_css_color_4' => array(
			'background-color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(even) td',
				'.-hd-util-intellitable .-hd-util-intellitable-legend tr:nth-child(even) td',
				'.-hd-los-knockout-stage',
				'.-hd-los-game-live-box .-hd-los-game-live-box-game-fact-value div',
				'.-hd-los-game-live-box .-hd-los-game-live-box-scores.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(odd) td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(even) td:nth-child(4)',
				'.-hd-los-game-scores .-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(odd) td',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(even) td:nth-child(4)',
				'.-hd-los-game-full-report .-hd-los-game-full-report-scores-data.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(odd) td',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(even) td:nth-child(4)'
			)
		),

		'hd_los_css_color_5' => array(
			'background-color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(odd) td',
				'.-hd-util-intellitable .-hd-util-intellitable-legend tr:nth-child(odd) td',
				'.-hd-los-game-live-box .-hd-los-game-live-box-game-fact-label div',
				'.-hd-los-game-live-box .-hd-los-game-live-box-play-by-play.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(odd) td:nth-child(4)',
				'.-hd-los-game-play-by-play .-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(odd) td:nth-child(4)',
				'.-hd-los-game-full-report .-hd-los-game-full-report-play-by-play-data.-hd-util-intellitable .-hd-util-intellitable-data tr:nth-child(odd) td:nth-child(4)',
				'.-hd-los-game-full-report .-hd-los-game-full-report-lineup-player'
			),
			'border-color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-legend table'
			),
			'border-bottom-color' => array(
				'.-hd-los-game-live-box .-hd-los-game-live-box-ticker-action-headline'
			)
		),

		'hd_los_css_color_6' => array(
			'color' => array(
				'.-hd-los',
				'.-hd-los a',
				'.-hd-los-schedule .-hd-util-intellitable .-hd-util-intellitable-data td[value="0"]',
				'.-hd-los-standings .-hd-util-intellitable .-hd-util-intellitable-data td[value="0"]',
				'.-hd-los-knockout-stage .-hd-los-knockout-stage-phase-encounter-games.-hd-util-intellitable .-hd-util-intellitable-data td[value="0"]',
				'.-hd-los-knockout-stage-compact .-hd-util-intellitable .-hd-util-intellitable-data th',
				'.-hd-los-game-full-report .-hd-util-intellitable-data th',
				'.-hd-los-player-full-page .-hd-util-intellitable-data th',
				'.-hd-los-team-full-page .-hd-util-intellitable-data th'
			)
		),

		'hd_los_css_color_7' => array(
			'background-color' => array(
				'.-hd-button',
				'.-hd-util-tabs .-hd-util-tabs-button',
				'.-hd-los-game-live-box .-hd-los-game-live-box-tabs .-hd-util-tabs-button'
			),
			'border-right-color' => array(
				'.-hd-los-game-slider .-hd-util-slider-button-prev',
				'.-hd-los-game-slider .-hd-los-game-slider-game',
				'.-hd-los-game-ticker .-hd-los-game-ticker-game'
			),
			'color' => array(
				'.-hd-los-game-slider .-hd-util-slider-button.-hd-util-slider-button-disabled span'
			)
		),

		'hd_los_css_color_8' => array(
			'background-color' => array(
				'.-hd-los-game-live-box .-hd-los-game-live-box-period-bar-fill',
				'.-hd-los-game-full-report .-hd-los-game-full-report-period-bar-fill',
				'.-hd-los-game-full-report .-hd-los-game-full-report-period-stats > div.-hd-los-game-full-report-period-stats-header > div',
				'.-hd-los-game-full-report .-hd-los-game-full-report-game-facts',
				'.-hd-los-player-full-page .-hd-los-player-full-page-player-facts'
			)
		),

		'hd_los_css_color_9' => array(
			'background-color' => array(
				'.-hd-game-document-link'
			),
			'color' => array(
				'.-hd-util-intellitable .-hd-util-intellitable-scroll-help',
				'.-hd-util-intellitable .-hd-util-intellitable-data td[value="0"]',
				'.-hd-util-intellitable .-hd-util-intellitable-data td.-hd-util-intellitable-ex-aequo',
				'.-hd-los-game-full-report .-hd-los-game-full-report-goals-player-jersey-no'
			)
		)

	);

	for ( $i = 0; $i < count( $map ); $i++ ) {

		$color_name = 'hd_los_css_color_' . $i;
		$color      = get_option( $color_name );

		if ( $color ) {

			foreach ( $map[ $color_name ] as $value => $selectors ) {

				foreach ( $selectors as $selector ) {

					$css .= ' ' . $selector . ' { ' . $value . ': ' . $color . '; }';

				}

			}

		}

	}

	return $css;

}

function hd_los_update_to_1_2_0() {

	$options = array(

		'los_api_key'             => 'hd_los_api_key',
		'los_sport'               => 'hd_los_sport',
		'los_language'            => 'hd_los_language',
		'los_page_game_report'    => 'hd_los_page_game_report',
		'los_page_player_details' => 'hd_los_page_player_details',
		'los_page_team_details'   => 'hd_los_page_team_details',
		'los_template'            => 'hd_los_template',
		'los_css_color_0'         => 'hd_los_css_color_0',
		'los_css_color_1'         => 'hd_los_css_color_1',
		'los_css_color_2'         => 'hd_los_css_color_2',
		'los_css_color_3'         => 'hd_los_css_color_3',
		'los_css_color_4'         => 'hd_los_css_color_4',
		'los_css_color_5'         => 'hd_los_css_color_5',
		'los_css_color_6'         => 'hd_los_css_color_6',
		'los_css_color_7'         => 'hd_los_css_color_7',
		'los_css_color_8'         => 'hd_los_css_color_8',
		'los_css_color_9'         => 'hd_los_css_color_9'

	);

	foreach ( $options as $old_option_name => $new_option_name ) {

		$old_option_value = get_option( $old_option_name );
		$new_option_value = get_option( $new_option_name );

		if ( $old_option_value && ! $new_option_value ) {

			update_option( $new_option_name, $old_option_value, true );

		}

	}

	update_option( 'hd_los_db_version', '1.2.0' );

}
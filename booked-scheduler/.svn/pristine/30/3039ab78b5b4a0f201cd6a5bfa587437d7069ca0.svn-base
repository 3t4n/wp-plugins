<?php
/**
 * Copyright 2024 Twinkle Toes Software, LLC
 */

defined('ABSPATH') || exit;

require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'includes/class-booked-option-keys.php';
require_once BOOKED_SCHEDULER_PLUGIN_DIR . 'vendor/autoload.php';

final class Booked_Server
{
    public function LoadSchedule(?string $scheduleId, ?array $resourceIds)
    {
//        error_log("LoadSchedule");

        return $this->LoadView($scheduleId, $resourceIds, "schedule");
    }

    public function LoadCalendar(?string $scheduleId, ?array $resourceIds, ?string $defaultCalendarView)
    {
//        error_log("LoadCalendar");

        return $this->LoadView($scheduleId, $resourceIds, "calendar", $defaultCalendarView);
    }

    public function LoadView(?string $scheduleId, ?array $resourceIds, string $requestUrl, ?string $defaultCalendarView = null)
    {
        $options = get_option('booked_options');
        if (!array_key_exists(Booked_Option_Keys::BOOKED_WP_KEY, $options)) {
            throw new Booked_Exception(esc_html('Missing Booked setting: "' . Booked_Option_Keys::BOOKED_WP_KEY . '"'));
        }
        if (!array_key_exists(Booked_Option_Keys::BOOKED_URL, $options)) {
            throw new Booked_Exception(esc_html('Missing Booked setting: "' . Booked_Option_Keys::BOOKED_URL . '"'));
        }
//        if (!array_key_exists(Booked_Option_Keys::BOOKED_ALLOW_WP_USER_AUTH, $options)) {
//            throw new Booked_Exception('Missing Booked setting: "' . Booked_Option_Keys::BOOKED_ALLOW_WP_USER_AUTH . '"');
//        }
        $baseBookedUrl = $options[Booked_Option_Keys::BOOKED_URL];

        $sid = empty($scheduleId) ? '' : $scheduleId;
        $rids = empty($resourceIds) ? '' : implode(',', $resourceIds);
        $ct = '';
        if (in_array($defaultCalendarView, ['day', 'week', 'month'])) {
            $ct = $defaultCalendarView;
        }

        try {
            $client = new GuzzleHttp\Client();
            $res = $client->request('GET', "$baseBookedUrl/integrate/wordpress/$requestUrl?sid=$sid&rids=$rids&ct=$ct", ['headers' => ['X-Booked-Wordpress-Key' => $options[Booked_Option_Keys::BOOKED_WP_KEY]]]);

            return (string)$res->getBody();

        } catch (GuzzleHttp\Exception\ClientException $ex) {
            if ($ex->getCode() === 403) {
                return 'Invalid Wordpress Key. Check your "' . Booked_Option_Keys::BOOKED_WP_KEY . '" setting to ensure it matches the WordPress key set in Booked.';
            } else {
                throw $ex;
            }
        } catch (Throwable $e) {
            throw new Booked_Exception(esc_html($e->getMessage()));
        }
    }
}
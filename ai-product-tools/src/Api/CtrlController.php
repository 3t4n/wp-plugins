<?php

namespace AIPT\Api;

use AIPT\Core\CtrlManager;
use WP_REST_Controller;
use WP_REST_Server;
use WP_REST_Request;
use WP_REST_Response;
use WP_Error;

class CtrlController extends WP_REST_Controller {
    private $ctrl_manager;
    
    public function __construct() {
        $this->namespace = 'wp/v2/aipt';
        $this->rest_base = 'ctrl';
        $this->ctrl_manager = CtrlManager::getInstance();
    }

    public function register_routes() {
        register_rest_route($this->namespace, '/' . $this->rest_base . '/verify', [
            [
                'methods' => WP_REST_Server::READABLE,
                'callback' => [$this, 'verify_license'],
                'permission_callback' => [$this, 'check_permission']
            ]
        ]);

        register_rest_route($this->namespace, '/' . $this->rest_base . '/balance', [
            [
                'methods' => WP_REST_Server::READABLE,
                'callback' => [$this, 'get_balance'],
                'permission_callback' => [$this, 'check_permission']
            ]
        ]);

        register_rest_route($this->namespace, '/' . $this->rest_base . '/deduct', [
            [
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => [$this, 'deduct_ctrl'],
                'permission_callback' => [$this, 'check_permission'],
                'args' => [
                    'amount' => [
                        'required' => true,
                        'type' => 'integer',
                        'minimum' => 1,
                        'sanitize_callback' => 'absint'
                    ]
                ]
            ]
        ]);
    }

    public function check_permission(): bool {
        return current_user_can('manage_options');
    }

    public function verify_license(WP_REST_Request $request): WP_REST_Response {
        try {
            $verification = $this->ctrl_manager->verifyCredits();
            if (is_wp_error($verification)) {
                return new WP_REST_Response($verification, 500);
            }
            return new WP_REST_Response($verification, 200);
        } catch (\Exception $e) {
            return new WP_REST_Response(
                new WP_Error('verification_failed', $e->getMessage()),
                500
            );
        }
    }

    public function get_balance(WP_REST_Request $request): WP_REST_Response {
        try {

            if (isset($_GET['refresh']) && sanitize_text_field(wp_unslash($_GET['refresh'])) === 'true') {
                $this->ctrl_manager->clearCreditsCache();
            }
            

            $verification = $this->ctrl_manager->verifyCredits();
            if (is_wp_error($verification)) {
                return new WP_REST_Response($verification, 500);
            }

            if (isset($_GET['refresh']) && sanitize_text_field(wp_unslash($_GET['refresh'])) === 'true') {
                do_action('aipt_credits_updated', $verification);
            }

            return new WP_REST_Response($verification, 200);
        } catch (\Exception $e) {
            return new WP_REST_Response(
                new WP_Error('balance_fetch_failed', $e->getMessage()),
                500
            );
        }
    }

    public function deduct_ctrl(WP_REST_Request $request): WP_REST_Response {
        try {
            $amount = $request->get_param('amount');
            

            $verification = $this->ctrl_manager->verifyCredits();
            if (is_wp_error($verification)) {
                return new WP_REST_Response($verification, 500);
            }

            if (!$verification['isUnlimited'] && $verification['remaining'] < $amount) {
                return new WP_REST_Response(
                    new WP_Error(
                        'insufficient_credits',
                        sprintf(
                            'Insufficient credits. You need %d credits but you have %d credits available.',
                            $amount,
                            $verification['remaining']
                        )
                    ),
                    402
                );
            }
            
            $success = $this->ctrl_manager->incrementCredits($amount);
            if (!$success) {
                throw new \Exception('Failed to deduct credits');
            }

            $newVerification = $this->ctrl_manager->verifyCredits();
            return new WP_REST_Response([
                'success' => true,
                'balance' => $newVerification
            ], 200);
        } catch (\Exception $e) {
            return new WP_REST_Response(
                new WP_Error('deduction_failed', $e->getMessage()),
                500
            );
        }
    }
} 
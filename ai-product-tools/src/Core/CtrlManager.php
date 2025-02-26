<?php

namespace AIPT\Core;

use WP_Error;
use Exception;

class CtrlManager {
    private static $instance = null;
    private $fsManager;
    private const OPTION_KEY = '_wc_order_stats_v4_b391dp';
    private const BACKUP_KEY = '_wc_analytics_v4_7d8e26';
    private const ENCRYPTION_KEY_PREFIX = '_wc_session_token_pt_v7';
    private const USAGE_DATE_KEY = '_wc_usage_date_pt_v7';
    private const ENCRYPTION_VERSION_KEY = '_wc_session_expires_pt_v7';
    private const ENCRYPTION_ROTATION_KEY = '_wc_session_manager_pt_v7';
    private const LOCK_PREFIX = '_wc_order_lock_pt_v7';
    private const RATE_LIMIT_PREFIX = '_wc_api_rate_pt_v7';
    private const VERIFICATION_PREFIX = '_wc_order_verify_pt_v7';
    private const ENCRYPTION_METHOD = 'aes-256-cbc';
    private const REMOTE_API_URL = 'https://aiptctrl.vercel.app/api/credits/limits';
    private const CACHE_DURATION = 300; 
    private const LOCK_TIMEOUT = 30; 
    private const KEY_ROTATION_INTERVAL = 2592000; 
    private const MAX_REQUESTS_PER_MINUTE = 60;
    private const RATE_LIMIT_DURATION = 60; 
    private const RENEWAL_KEY = '_wc_renewal_pt_v7';

    private function __construct() {
            $this->fsManager = FsManager::getInstance();
        $this->ensureOptionsExist();
    }

    private function ensureOptionsExist(): void {
        if (get_site_option(self::OPTION_KEY) === false) {
            add_site_option(self::OPTION_KEY, $this->encrypt(['used' => 0]), '', 'no');
        }
        if (get_site_option(self::BACKUP_KEY) === false) {
            add_site_option(self::BACKUP_KEY, $this->encrypt(['used' => 0]), '', 'no');
        }
        if (get_site_option(self::USAGE_DATE_KEY) === false) {
            add_site_option(self::USAGE_DATE_KEY, current_time('timestamp'), '', 'no');
        }
    }

    public static function getInstance(): self {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function acquireLock(string $operation): bool {
        $lock_key = self::LOCK_PREFIX . $operation;
        $lock = get_site_option($lock_key);
        
        if ($lock !== false && (time() - $lock) < self::LOCK_TIMEOUT) {
            return false;
        }
        
        return update_site_option($lock_key, time());
    }

    private function releaseLock(string $operation): bool {
        return delete_site_option(self::LOCK_PREFIX . $operation);
    }

    private function getEncryptionKeyWithRotation(): string {
        $current_key_version = get_option(self::ENCRYPTION_VERSION_KEY, 1);
        $last_rotation = get_option(self::ENCRYPTION_ROTATION_KEY, 0);
        $current_time = time();

        if (($current_time - $last_rotation) > self::KEY_ROTATION_INTERVAL) {
            $current_key_version++;
            update_option(self::ENCRYPTION_VERSION_KEY, $current_key_version);
            update_option(self::ENCRYPTION_ROTATION_KEY, $current_time);
        }

        $key = get_option(self::ENCRYPTION_KEY_PREFIX . $current_key_version);
        if (!$key) {

            $base_key = wp_salt('auth');
            if ($this->fsManager->is_registered()) {
                $base_key .= $this->fsManager->getSiteId() . $this->fsManager->getPluginId();
            } else {

                $base_key .= get_site_url();
            }
            

            $key = hash_hmac('sha256', $base_key, wp_salt('secure_auth'));
            update_option(self::ENCRYPTION_KEY_PREFIX . $current_key_version, $key);
        }

        return $key;
    }

    private function encrypt($data): string {
        $key = $this->getEncryptionKeyWithRotation();
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::ENCRYPTION_METHOD));
        $encrypted = openssl_encrypt(
            json_encode($data),
            self::ENCRYPTION_METHOD,
            $key,
            0,
            $iv
        );
        
        if ($encrypted === false) {
            throw new Exception('Encryption failed');
        }

        return base64_encode($iv . $encrypted);
    }

    private function decrypt($encrypted): ?array {
        try {
            $key = $this->getEncryptionKeyWithRotation();
            $data = base64_decode($encrypted);
            
            if ($data === false) {
                throw new Exception('Invalid base64 encoding');
            }

            $ivLength = openssl_cipher_iv_length(self::ENCRYPTION_METHOD);
            $iv = substr($data, 0, $ivLength);
            $encrypted = substr($data, $ivLength);
            
            $decrypted = openssl_decrypt(
                $encrypted,
                self::ENCRYPTION_METHOD,
                $key,
                0,
                $iv
            );

            if ($decrypted === false) {
                throw new Exception('Decryption failed');
            }

            $data = json_decode($decrypted, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Invalid JSON data');
            }

            return $data;
        } catch (Exception $e) {
            return null;
        }
    }

    public function getUsedCredits(): int {
        if (!$this->acquireLock('get_credits')) {
            throw new Exception('Operation in progress');
        }

        try {
            $encrypted = get_site_option(self::OPTION_KEY);
            $backup = get_site_option(self::BACKUP_KEY);
            
            

            if (!$encrypted && $backup) {
                $encrypted = $backup;
                update_site_option(self::OPTION_KEY, $backup);
            }

            if (!$encrypted) {
                return 0;
            }

            $data = $this->decrypt($encrypted);
            
            

            if (!$data && $backup) {
                $data = $this->decrypt($backup);
                if ($data) {
                    update_site_option(self::OPTION_KEY, $backup);
                }
            }

            $used = $data['used'] ?? 0;
            return $used;
        } finally {
            $this->releaseLock('get_credits');
        }
    }

    public function incrementCredits(int $amount = 1, array $response = []): bool {
        if (!$this->acquireLock('increment_credits')) {
            throw new Exception('Operation in progress');
        }

        global $wpdb;
        $wpdb->query('START TRANSACTION');

        try {

            if (!empty($response) && (
                (isset($response['results']) && empty($response['results'])) || 
                isset($response['error']) || 
                (isset($response['status']) && $response['status'] === 'failed') || 
                !isset($response['results']) 
            )) {
                error_log('AIPT Debug - incrementCredits - Skipping credit increment because: ' . 
                    (isset($response['error']) ? 'Error: ' . $response['error'] : 
                    (isset($response['status']) ? 'Status: ' . $response['status'] : 
                    (empty($response['results']) ? 'Empty results' : 'No results'))));
                $wpdb->query('COMMIT');
                return true;
            }

            $this->checkAndSetFirstUsageDate();

            $this->checkCreditRenewal();

            $used = $this->getUsedCredits();
            $newUsed = $used + $amount;

            $data = ['used' => $newUsed];
            $encrypted = $this->encrypt($data);
            

            $result = update_site_option(self::OPTION_KEY, $encrypted);
            update_site_option(self::BACKUP_KEY, $encrypted);
            
            if ($result) {
                $wpdb->query('COMMIT');
                return true;
            } else {
                $wpdb->query('ROLLBACK');
                return false;
            }
        } catch (Exception $e) {
            $wpdb->query('ROLLBACK');
            return false;
        } finally {
            $this->releaseLock('increment_credits');
        }
    }

    private function encryptRenewalData(array $data): string {
        return $this->encrypt($data);
    }

    private function decryptRenewalData(string $encrypted): ?array {
        return $this->decrypt($encrypted);
    }

    private function checkAndSetFirstUsageDate(): void {

        $usageDate = get_site_option(self::USAGE_DATE_KEY);
        if (!$usageDate) {
            $usageDate = current_time('timestamp');
            update_site_option(self::USAGE_DATE_KEY, $usageDate);
        }
        

        $renewalData = $this->getRenewalData();
        if (!isset($renewalData['first_usage_date'])) {
            $renewalData['first_usage_date'] = $usageDate;
            $renewalData['last_renewal_month'] = 0;
            $renewalData['hash'] = $this->generateRenewalHash($renewalData);
            
            $encrypted = $this->encryptRenewalData($renewalData);
            update_site_option(self::RENEWAL_KEY, $encrypted);
        }
    }

    private function getRenewalData(): array {
        $encrypted = get_site_option(self::RENEWAL_KEY);
        
        if (!$encrypted) {
            return [];
        }
        
        $data = $this->decryptRenewalData($encrypted);
        if (!$data || !$this->verifyRenewalHash($data)) {
            

            $usageDate = get_site_option(self::USAGE_DATE_KEY);
            if ($usageDate) {
                $data = [
                    'first_usage_date' => $usageDate,
                    'last_renewal_month' => 0
                ];
                $data['hash'] = $this->generateRenewalHash($data);
                
                $encrypted = $this->encryptRenewalData($data);
                update_site_option(self::RENEWAL_KEY, $encrypted);
                return $data;
            }
            
            return [];
        }
        
        return $data;
    }

    private function generateRenewalHash(array $data): string {
        $key = $this->getEncryptionKeyWithRotation();
        $values = $data['first_usage_date'] . '|' . $data['last_renewal_month'];
        return hash_hmac('sha256', $values, $key);
    }

    private function verifyRenewalHash(array $data): bool {
        if (!isset($data['hash'])) {
            return false;
        }
        
        $expectedHash = $this->generateRenewalHash($data);
        return hash_equals($data['hash'], $expectedHash);
    }

    private function checkCreditRenewal(): void {
        $renewalData = $this->getRenewalData();
        if (empty($renewalData)) {
            return;
        }
        
        $firstUsageDate = $renewalData['first_usage_date'];
        $lastRenewalMonth = $renewalData['last_renewal_month'];
        
        $currentTime = current_time('timestamp');
        $daysSinceFirstUsage = floor(($currentTime - $firstUsageDate) / DAY_IN_SECONDS);
        $monthsSinceFirstUsage = floor($daysSinceFirstUsage / 30);
        
        if ($monthsSinceFirstUsage > $lastRenewalMonth) {

            $data = ['used' => 0];
            $encrypted = $this->encrypt($data);
            update_site_option(self::OPTION_KEY, $encrypted);
            update_site_option(self::BACKUP_KEY, $encrypted);
            

            $renewalData['last_renewal_month'] = $monthsSinceFirstUsage;
            $renewalData['hash'] = $this->generateRenewalHash($renewalData);
            update_site_option(self::RENEWAL_KEY, $this->encryptRenewalData($renewalData));
            

            $newBalance = $this->verifyCredits();
            if (!is_wp_error($newBalance)) {
                do_action('aipt_credits_updated', $newBalance);
            }
        }
    }

    private function isRateLimited(): bool {
        $user_id = get_current_user_id();
        if (!$user_id) {
            return true;
        }

        $key = self::RATE_LIMIT_PREFIX . $user_id;
        $data = get_site_option($key);
        $time = time();
        
        if ($data === false) {
            update_site_option($key, ['count' => 1, 'timestamp' => $time]);
            return false;
        }

        if (($time - $data['timestamp']) > self::RATE_LIMIT_DURATION) {
            update_site_option($key, ['count' => 1, 'timestamp' => $time]);
            return false;
        }

        if ($data['count'] >= self::MAX_REQUESTS_PER_MINUTE) {
            return true;
        }

        $data['count']++;
        update_site_option($key, $data);
        return false;
    }

    public function verifyCredits() {
        if ($this->isRateLimited()) {
            return new WP_Error(
                'rate_limit_exceeded',
                'Too many requests. Please try again in a minute.',
                ['status' => 429]
            );
        }

        try {
            $plan = $this->fsManager->is_registered() ? $this->fsManager->getPlanType() : 'free';
            $used_credits = $this->getUsedCredits();

            $headers = [
                'Content-Type' => 'application/json'
            ];

            if ($this->fsManager->is_registered()) {
                $headers['X-AIPT-Site-ID'] = $this->fsManager->getSiteId();
                $headers['X-AIPT-Plugin-ID'] = $this->fsManager->getPluginId();
                $headers['X-AIPT-License-ID'] = $this->fsManager->getLicenseId();
            }

            $response = wp_remote_post(self::REMOTE_API_URL, [
                'headers' => $headers,
                'body' => json_encode([
                    'plan' => $plan,
                    'usedCredits' => $used_credits
                ]),
                'timeout' => 15
            ]);

            if (is_wp_error($response)) {
                return $response;
            }

            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);

            if (empty($data)) {
                return new WP_Error('empty_response', 'Empty response from API');
            }

            $result = [
                'used' => $used_credits,
                'remaining' => $data['remaining'],
                'limit' => $data['limit'],
                'isUnlimited' => $data['isUnlimited'],
                'costPerDescription' => $data['costPerDescription']
            ];

            return $result;

        } catch (Exception $e) {
            return new WP_Error('verify_failed', $e->getMessage());
        }
    }

    private function getCacheKey(): string {
        $base = 'aipt_credits_verification';
        if ($this->fsManager->is_registered()) {
            return $base . '_' . $this->fsManager->getSiteId() . '_' . $this->fsManager->getPlanType();
        }
        return $base . '_free';
    }

    public function hasAvailableCredits(): bool {
        $verification = $this->verifyCredits();
        if (is_wp_error($verification)) {
                return false;
            }
        return $verification['isUnlimited'] || $verification['remaining'] > 0;
    }

    public function clearCreditsCache(): void {

        $plans = ['free', 'trial', 'pro', 'business'];
        foreach ($plans as $plan) {
            $base = 'aipt_credits_verification';
            if ($this->fsManager->is_registered()) {
                $key = $base . '_' . $this->fsManager->getSiteId() . '_' . $plan;
            } else {
                $key = $base . '_free';
            }
            delete_site_transient($key);
            wp_cache_delete($key, 'aipt');
        }
        

        $old_key = self::VERIFICATION_PREFIX . ($this->fsManager->is_registered() ? $this->fsManager->getSiteId() : 'free');
        delete_site_option($old_key);
    }

    public function handlePlanChange(): void {
        if (!$this->acquireLock('plan_change')) {
            throw new Exception('Plan change operation in progress');
        }

        try {

            $usageDate = get_site_option(self::USAGE_DATE_KEY);
            

            $data = ['used' => 0];
            $encrypted = $this->encrypt($data);
            

            $result1 = update_site_option(self::OPTION_KEY, $encrypted);
            $result2 = update_site_option(self::BACKUP_KEY, $encrypted);
            
            

            if ($usageDate) {
                $renewalData = [
                    'first_usage_date' => $usageDate,
                    'last_renewal_month' => 0
                ];
                $renewalData['hash'] = $this->generateRenewalHash($renewalData);
                update_site_option(self::RENEWAL_KEY, $this->encryptRenewalData($renewalData));
            }
            

            $this->clearCreditsCache();
            

            $newBalance = $this->verifyCredits();
            
            
            if (!is_wp_error($newBalance)) {

                do_action('aipt_credits_updated', $newBalance);
                do_action('aipt_plan_changed');
            } else {
            }
        } catch (Exception $e) {
            throw $e;
        } finally {
            $this->releaseLock('plan_change');
        }
    }

    private function refreshPlan() {

        $this->handlePlanChange();
    }
} 
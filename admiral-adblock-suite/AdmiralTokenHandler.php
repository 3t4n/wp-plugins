<?php
namespace wp;

/**
 * Sets, generates, checks tokens for Protect purposes
 */
class AdmiralTokenHandler
{
    private static $verifiedEFSToken = false;

    private static function setVerifiedEFSToken($verified) {
        self::$verifiedEFSToken = $verified;
    }

    public static function getVerifiedEFSToken() {
        return self::$verifiedEFSToken;
    }

    // generate a secret key for the propertyID and the month (MMYYYY) being used
    private static function generateSecretKey($propertyID, $month) {
        return hash_hmac('sha256', $propertyID, "admiral_hash_$month", true);
    }

    private static function generateSignedToken($propertyID, $month, $userAgent, $overrideExpiryTime = null) {
        // token expires in 3 days
        $expiryTime = $overrideExpiryTime ? $overrideExpiryTime : time() + (3 * 24 * 60 * 60);
        $data = $userAgent . ':::' . $expiryTime;
        return base64_encode(hash_hmac('sha256', $data, self::generateSecretKey($propertyID, $month), true) . '|' . $expiryTime);
    }

    private static function isTokenBadOrExpired($parts) {
        if (count($parts) !== 2) {
            return true;
        }
        list($hash, $expiryTime) = $parts;
        return time() > $expiryTime;
    }

    public static function verifySignedToken($propertyID) {
        $tokens = explode(',', $_COOKIE['adm_efstok']);
        foreach ($tokens as $token) {
            $parts = explode('|', base64_decode($token));
            if (self::isTokenBadOrExpired($parts)) {
                continue;
            }
            list($hash, $expiryTime) = $parts;
            $userAgent = sanitize_text_field($_SERVER['HTTP_USER_AGENT']);
            // try this month, last month, and next month
            $dates = [
                date('mY'),
                date('mY', strtotime('-1 month')),
                date('mY', strtotime('+1 month')),
            ];
            foreach ($dates as $date) {
                $expectedToken = self::generateSignedToken($propertyID, $date, $userAgent, $expiryTime);
                if (hash_equals($token, $expectedToken)) {
                    self::setVerifiedEFSToken(true);
                    return true;
                }
            }
        }
        self::setVerifiedEFSToken(false);
        return false;
    }

    public static function getTokenForUser($propertyID) {
        $tokens = [];
        if (isset($_COOKIE['adm_efstok'])) {
            // remove any expired tokens
            $tokens = array_filter(explode(',', $_COOKIE['adm_efstok']), function($token) {
                $parts = explode('|', base64_decode($token));
                return !self::isTokenBadOrExpired($parts);
            });
        }
        $date = date('mY');
        $token = self::generateSignedToken($propertyID, $date, $_SERVER['HTTP_USER_AGENT']);
        array_push($tokens, $token);
        // only keep the last 2 tokens
        $tokens = array_slice($tokens, -2);
        $val = implode(',', $tokens);
        if (defined('ADM_TESTING')) {
            $_COOKIE['adm_efstok'] = $val;
        } else {
            setcookie('adm_efstok', $val, time() + (3 * 24 * 60 * 60), COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true);
        }
        return array('success' => true);
    }
}

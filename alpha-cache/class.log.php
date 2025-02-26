<?php

namespace alpha_cache;

use AlphaCacheClass;

class Log {
  static private bool $isStarted = false;

  static private function getLogFilename(): string {
    return dirname(__FILE__) . '/log.txt';
  }

  static function getLogUrl(): string {
    return plugin_dir_url(__FILE__) . 'log.txt';
  }

  static function getLogSize(): int {
    return filesize(self::getLogFilename());
  }

  public static function record(string $message): void {
    if (!self::$isStarted) {
      $message = date("Y-m-d H:i:s") . PHP_EOL
        . $_SERVER['REQUEST_URI'] . PHP_EOL
        . $_SERVER['HTTP_USER_AGENT'] . PHP_EOL
        . ServerVars::getClientIP() . PHP_EOL
        . $message;

      self::$isStarted = true;
    }
    @file_put_contents(self::getLogFilename(), $message . "\n", FILE_APPEND);
  }

  public static function checkForWritting(): bool {
    $fp = @fopen(self::getLogFilename(), "a+");
    if ($fp !== false) {
      fclose($fp);
    }
    return $fp !== false;
  }

  public static function truncate(): void {
    $fp = fopen(self::getLogFilename(), "w");
    fclose($fp);
  }

  public static function readLogRecs(int $maxCount = 100): array {
    $fpLog = fopen(self::getLogFilename(), "r");
    $result = [
      'count' => 0,
      'lastRecs' => [],
    ];
    while (($line = fgets($fpLog, 1024)) !== false) {
      if (preg_match('/^\d{4}-\d{2}-\d{2}\s\d{2}:\d{2}:\d{2}$/', $line)) {
        $request = fgets($fpLog, 1024);
        $agent = fgets($fpLog, 1024);
        $ip = fgets($fpLog, 1024);
        $fileName = fgets($fpLog, 1024);
        $hitOrMiss = fgets($fpLog, 1024);

        $result['count'] ++;
        $result['lastRecs'][] = new LogRecord($line, $hitOrMiss, $fileName, $request, $ip, $agent);
        if (--$maxCount < 0) {
          array_shift($result['lastRecs']);
        }
      }
    }

    fclose($fpLog);
    $result['lastRecs'] = array_reverse($result['lastRecs']);
    return $result;
  }
}


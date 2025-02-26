<?php

namespace alpha_cache;

class LogRecord {
  public string $dtm;
  public bool $isHit;
  public bool $isCached;
  public string $state;
  public string $filename;
  public string $url;
  public string $ip;
  public string $agent;

  public function __construct(
    string $dtm,
    string $state,
    string $filename,
    string $url,
    string $ip,
    string $agent
  ) {
    $dateTime = new \DateTime('@' . strtotime($dtm));
    $dateTime->setTimezone(wp_timezone());
    $this->dtm = $dateTime->format('Y-m-d H:i:s');
    $this->state = $state;
    $this->isHit = str_starts_with($state, 'HIT');
    $this->isCached = !str_starts_with($state, 'NOT CACHED');

    $this->filename = $filename;
    $this->url = $url;
    $this->ip = $ip;
    $this->agent = $agent;
  }
}

<?php

  function calconicIsValidCall() {
    if (!defined('WP_UNINSTALL_PLUGIN')) {
      die;
    }
  }

  function calconicDeleteOption() {
    delete_option('calconic_api_key');
  }

  function calconicUninstall() {
    calconicIsValidCall();
    calconicDeleteOption();
  }

  calconicUninstall();

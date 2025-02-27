<?php
/**
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0.
 */
namespace AWS\CRT\Auth;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


class SigningAlgorithm {
    const SIGv4 = 0;
    const SIGv4_ASYMMETRIC = 1;
}

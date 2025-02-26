<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define AWS regions with names
$awsRegions = [
    'us-east-1' => 'US East (N. Virginia)',
    'us-east-2' => 'US East (Ohio)',
    'us-west-1' => 'US West (N. California)',
    'us-west-2' => 'US West (Oregon)',
    'af-south-1' => 'Africa (Cape Town)',
    'ap-east-1' => 'Asia Pacific (Hong Kong)',
    'ap-south-1' => 'Asia Pacific (Mumbai)',
    'ap-northeast-1' => 'Asia Pacific (Tokyo)',
    'ap-northeast-2' => 'Asia Pacific (Seoul)',
    'ap-northeast-3' => 'Asia Pacific (Osaka)',
    'ap-southeast-1' => 'Asia Pacific (Singapore)',
    'ap-southeast-2' => 'Asia Pacific (Sydney)',
    'ca-central-1' => 'Canada (Central)',
    'eu-central-1' => 'Europe (Frankfurt)',
    'eu-west-1' => 'Europe (Ireland)',
    'eu-west-2' => 'Europe (London)',
    'eu-west-3' => 'Europe (Paris)',
    'eu-north-1' => 'Europe (Stockholm)',
    'eu-south-1' => 'Europe (Milan)',
    'me-south-1' => 'Middle East (Bahrain)',
    'sa-east-1' => 'South America (São Paulo)'
];

// Get the currently saved option for the AWS region
$selectedRegion = get_option('ai_summarizer_aws_region', '');

// Start the select dropdown
echo '<select name="ai_summarizer_aws_region" class="regular-text">';

// Generate each option for the select dropdown
foreach ($awsRegions as $regionKey => $regionName) {
    // Check if this region is the selected one
    $isSelected = selected($selectedRegion, $regionKey, false);

    // Output each option with proper escaping for attributes
    echo '<option value="' . esc_attr($regionKey) . '"' . esc_html($isSelected) . '>' . esc_html($regionName) . '</option>';
}

// Close the select dropdown
echo '</select>';

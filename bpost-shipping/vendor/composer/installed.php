<?php return array(
    'root' => array(
        'pretty_version' => '0.0.0-dev',
        'version' => '0.0.0.0-dev',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'reference' => null,
        'name' => 'antidot/woocommerce-bpost-shipping',
        'dev' => false,
    ),
    'versions' => array(
        'antidot-be/bpost-api-library' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'type' => 'library',
            'install_path' => __DIR__ . '/../antidot-be/bpost-api-library',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'reference' => 'eec236b2b2f5373e91d6ce41ea93db57430f78f2',
            'dev_requirement' => false,
        ),
        'antidot/woocommerce-bpost-shipping' => array(
            'pretty_version' => '0.0.0-dev',
            'version' => '0.0.0.0-dev',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'reference' => null,
            'dev_requirement' => false,
        ),
        'psr/log' => array(
            'pretty_version' => '1.1.4',
            'version' => '1.1.4.0',
            'type' => 'library',
            'install_path' => __DIR__ . '/../psr/log',
            'aliases' => array(),
            'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
            'dev_requirement' => false,
        ),
    ),
);

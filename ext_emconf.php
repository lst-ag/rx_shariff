<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Heise Shariff',
    'description' => 'Shariff implementation for TYPO3 CMS including the backend module, a viewhelper and a plugin.',
    'category' => 'plugin',
    'version' => '15.2.0',
    'state' => 'stable',
    'uploadfolder' => false,
    'author' => 'Markus Klein',
    'author_email' => 'support@reelworx.at',
    'author_company' => 'Reelworx GmbH',
    'constraints' => [
        'depends' => [
            'php' => '8.0.0-8.3.99',
            'typo3' => '11.5.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => []
    ],
];

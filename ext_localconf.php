<?php
defined('TYPO3_MODE') || die();

$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['shariff'] = \Reelworx\RxShariff\Shariff::class . '::processRequest';

if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['rx_shariff'])) {
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['rx_shariff'] = [
        'frontend' => \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class,
        'backend' => \TYPO3\CMS\Core\Cache\Backend\FileBackend::class,
        'options' => [
            'defaultLifetime' => 3600,
        ],
        'groups' => ['pages', 'all'],
    ];
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Reelworx.RxShariff',
    'Shariff',
    ['Shariff' => 'index'],
    []
);

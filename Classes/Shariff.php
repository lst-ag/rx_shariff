<?php
/*
 *
 * This file is part of the rx_shariff Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * Copyright (c) Reelworx GmbH
 *
 */

namespace Reelworx\RxShariff;

if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(TYPO3_branch) < \TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger('8.1')) {
    require_once __DIR__ . '/../Resources/Private/Shariff/vendor/autoload.php';
}

use Heise\Shariff\Backend;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Shariff Backend implementation
 *
 * @author Markus Klein
 */
class Shariff
{
    /**
     * Process request
     *
     * @param ServerRequestInterface $request
     * @param Response $response
     * @return null|Response
     */
    public function processRequest(ServerRequestInterface $request, Response $response)
    {
        $url = !empty($request->getQueryParams()['url'])
            ? $request->getQueryParams()['url']
            : (string)$_SERVER['HTTP_REFERER'];

        $response = $response->withHeader('Content-type', 'application/json');
        $response->getBody()->write(json_encode($this->render($url)));
        return $response;
    }

    /**
     * Retrieve the stats from the services
     *
     * @param string $url URL for which stats should be queried
     * @return array Array of results
     */
    protected function render($url)
    {
        $extensionConfiguration = [
            'services' => 'Facebook, LinkedIn, Reddit, StumbleUpon, Flattr, Pinterest, Xing, AddThis, Vk',
            'facebook_app_id' => '',
            'facebook_secret' => '',
        ];
        $userExtensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rx_shariff']);
        if (is_array($userExtensionConfiguration)) {
            $extensionConfiguration = array_replace($extensionConfiguration, $userExtensionConfiguration);
        }

        $serviceArray = GeneralUtility::trimExplode(',', $extensionConfiguration['services']);
        // filter Twitter, which has been removed
        $serviceArray = array_filter($serviceArray, function ($value) {
            return strtolower($value) !== 'twitter';
        });

        $allowedDomains = [];
        if (!isset($extensionConfiguration['allowedDomains']) || $extensionConfiguration['allowedDomains'] === 'SERVER_NAME') {
            $defaultPort = GeneralUtility::getIndpEnv('TYPO3_SSL') ? '443' : '80';
            if (strtolower($_SERVER['HTTP_HOST']) === strtolower($_SERVER['SERVER_NAME']) && $defaultPort === $_SERVER['SERVER_PORT']) {
                $allowedDomains[] = strtolower($_SERVER['SERVER_NAME']);
            }
        } else {
            $allowedDomains = GeneralUtility::trimExplode(',', $extensionConfiguration['allowedDomains'], true);
        }

        $configuration = [
            'services' => $serviceArray,
            'domains' => $allowedDomains,
            'cacheClass' => Cache::class,
            'cache' => [
                'ttl' => (int)$extensionConfiguration['ttl'],
            ],
        ];
        if ($GLOBALS['TYPO3_CONF_VARS']['HTTP']['proxy_host']) {
            $configuration['client']['proxy'] = 'tcp://' . $GLOBALS['TYPO3_CONF_VARS']['HTTP']['proxy_host'];
            if ($GLOBALS['TYPO3_CONF_VARS']['HTTP']['proxy_port']) {
               $configuration['client']['proxy'] .= ':' . $GLOBALS['TYPO3_CONF_VARS']['HTTP']['proxy_port'];
            }
        }
        $facebookKey = array_search('Facebook', $configuration['services'], true);
        if ($facebookKey !== false) {
            if (empty($extensionConfiguration['facebook_app_id']) || empty($extensionConfiguration['facebook_secret'])) {
                unset($configuration['services'][$facebookKey]);
            } else {
                $configuration['Facebook'] = [
                    'app_id' => $extensionConfiguration['facebook_app_id'],
                    'secret' => $extensionConfiguration['facebook_secret'],
                ];
            }
        }

        $shariff = new Backend($configuration);
        $shariff->setLogger(GeneralUtility::makeInstance(LogManager::class)->getLogger(__CLASS__));
        return $shariff->get($url);
    }
}

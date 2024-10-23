<?php
declare(strict_types=1);

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

namespace Reelworx\RxShariff\ViewHelper;

use Psr\Http\Message\ServerRequestInterface;
use Reelworx\RxShariff\Controller\ShariffController;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContext;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * Class ShariffViewHelper
 *
 * @author Markus Klein <markus.klein@reelworx.at>
 */
class ShariffViewHelper extends AbstractTagBasedViewHelper
{
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
        $this->registerArgument('services', 'string', 'Comma separated list of services', false, '');
        $this->registerArgument('enableBackend', 'boolean', 'Enable the Shariff Backend module and show stats', false, false);
    }

    public function render(): string
    {
        if ($this->arguments['enableBackend']) {
            $contentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
            $url = $contentObjectRenderer->typoLink_URL([
                'parameter' => 't3://page?uid=current',
                'additionalParams' => '&' . http_build_query([
                        'eID' => 'shariff'
                    ])
            ]);
            $this->tag->addAttribute('data-backend-url', $url);
        }

        $services = $this->arguments['services'];
        if (!$services) {
            $services = ShariffController::SERVICE_LIST;
        } else {
            $services = GeneralUtility::trimExplode(',', $services);
        }
        $this->tag->addAttribute(
            'data-services',
            "['" . implode("','", $services) . "']"
        );

        $sys_language_isocode = '';
        if ($this->renderingContext instanceof RenderingContext) {
            if (method_exists($this->renderingContext, 'hasAttribute') && $this->renderingContext->hasAttribute(ServerRequestInterface::class)) {
                // v13
                $request = $this->renderingContext->getAttribute(ServerRequestInterface::class);
            } else {
                $request = $this->renderingContext->getRequest();
            }
        } else {
            $request = $GLOBALS['TYPO3_REQUEST'];
        }
        if ($request instanceof ServerRequestInterface) {
            $language = $request->getAttribute('language');
            if ($language instanceof SiteLanguage) {
                if (is_string($language->getLocale())) {
                    // v11
                    $sys_language_isocode = $language->getTwoLetterIsoCode();
                } else {
                    // v12+
                    $sys_language_isocode = $language->getLocale()->getLanguageCode();
                }
            }
        }

        if (!$this->tag->hasAttribute('data-lang') && !empty($sys_language_isocode)) {
            $this->tag->addAttribute('data-lang', $sys_language_isocode);
        }

        $this->tag->addAttribute('class', 'shariff');
        $this->tag->forceClosingTag(true);
        return $this->tag->render();
    }
}

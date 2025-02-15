﻿.. include:: ../Includes.txt


Change Log
==========

Version 15.2.1
--------------

* Fixed TYPO3 v11 support (#36)


Version 15.2.0
--------------

* Added support for TYPO3 v13
* Migrated documentation rendering


Version 15.1.2
--------------

* Fix: Properly include TS in TYPO3 v12


Version 15.1.1
--------------

* Fix: Allow PHP 8.3 in ext_emconf as well


Version 15.1.0
--------------

* Allow PHP 8.3


Version 15.0.7
--------------

* Fix: Do not set language in viewhelper if no TYPO3 request object is present


Version 15.0.6
--------------

* Fix: Avoids using UriBuilder. Uses standard typolink now.


Version 15.0.5
--------------

* Added missing Services.yaml, which makes the plugin working again


Version 15.0.4
--------------

* Ship our own version of jQuery and do not rely on Core anymore


Version 15.0.3
--------------

* Correct version number in TER release


Version 15.0.2
--------------

* Restored ext_emconf.php


Version 15.0.1
--------------

* Fixed TYPO3_MODE usage


Version 15.0.0
--------------

* Dropped TYPO3 v10 support
* Added TYPO3 v12 support


Version 14.0.2
--------------

* Fixed plugin registration


Version 14.0.1
--------------

* Fixed documentation version number


Version 14.0.0
--------------

* Dropped TYPO3 v8 and v9 support
* Allowed installation in v11 (alpha-testing)
* Removed global :ts:`plugin.rx_shariff.data-backend-url`
* Introduced dedicated log file by default (infix "shariff")


Version 13.1.1
--------------

* Updated composer.json to include extension key


Version 13.1.0
--------------

* ViewHelper displays all services if none is defined via arguments


Version 13.0.4
--------------

* jQuery inclusion fixed for TYPO3 9+


Version 13.0.3
--------------

* Updated shariff-backend to version 9.0.2


Version 13.0.2
--------------

* Fixed language handling if no language is available


Version 13.0.1
--------------

* Updated shariff-backend to version 9.0.1


Version 13.0.0
--------------

* Added support for TYPO3 v10
* Added PHP 7.4 support
* Dropped support for TYPO3 v7
* Removed a lot of now unneeded code


Version 12.3.0
--------------

* Updated shariff-backend to version 8.2.2
* Added crowdin support


Version 12.2.0
--------------

* Updated shariff-backend to version 8.2.1
   - Removed LinkedIn service


Version 12.1.1
--------------

* Bugfix for simplifiedControllerActionDispatching (TYPO3 v9)


Version 12.1.0
--------------

* Updated shariff to version 3.2.1
   - Added buffer service
   - Font Awesome to version 5.8.1
   - Updated XING share URL
   - More translations
* Updated shariff-backend to version 8.1.1
   - Added buffer service


Version 12.0.0
--------------

* Updated shariff to version 3.1.1
   - Added Pocket service
   - Removed Google+ service
* Updated shariff-backend to version 8.0.0
* Dropped support for PHP 7.0
* Added PHP 7.3 support


Version 11.1.0
--------------

* Update extension for TYPO3 version 9 LTS


Version 11.0.2
--------------

* Add Guzzle library again for TYPO3 v7
* Allow selection of all services in plugin


Version 11.0.1
--------------

* Added Heise namespaces to composer.json


Version 11.0.0
--------------

* Dropped support for PHP < 7.0 and for TYPO3 v6.2
* Uses guzzle from core
* Updated shariff to version 3.0.1
   - XSS security fix
   - Uses Font Awesome 5 now
   - Bootstrap 4 compatibility
   - New option data-button-style


Version 10.3.2
--------------

* ATTENTION: This is the last release with TYPO3 6.2 support
* PHP 7.2 support
* Fixed default value for mail-url


Version 10.3.1
--------------

* Updated shariff to version 2.1.3
   - Updated translations
   - Some bugfixes
* Updated shariff-backend to version 7.1.1
   - Removed GooglePlus support
   - Updated Facebook Graph API to version 2.12


Version 10.3.0
--------------

* Updated shariff to version 2.1.2
   - Added VK service
   - Added Telegram service
   - Improved security of links with target="_blank"
   - Fixed SEO friendliness by adding rel="nofollow" to all button links
* Updated shariff-backend to version 7.1.0
   - Added support for Vk
   - Updated Facebook Graph API to version 2.11


Version 10.2.1
--------------

* Updated shariff-backend to version 7.0.1


Version 10.2.0
--------------

* Updated shariff to version 2.0.1
  This fixes IE issues
* Allow explicit definition of language via plugin or TypoScript again.
  This may cause unexpected language selection in FE when a plugin was
  created before version 7.3.0 because these plugins may still have a language set.


Version 10.1.0
--------------

* Updated shariff to version 1.26.2
  Added new static templates to include the new complete-JS of Shariff,
  which does not depend on jQuery anymore.


Version 10.0.1
--------------

* Fixed Fluid template to work in TYPO3 6.2 as well


Version 10.0.0
--------------

* BREAKING: The Facebook backend now always needs an app id and an API secret
  the former FQL mode has been removed.
* Updated shariff-backend to version 7.0.0
* Updated shariff to version 1.24.1


Version 9.0.1
-------------

* The cache for share counts now uses the correct cache backend,
  so entries are expired correctly now.
* Documentation fixes


Version 9.0.0
-------------

* BREAKING: The static templates have been renamed and need to be re-included.
  Moreover, including a static template is now mandatory.
* Feature: The plugin options can be defined via TypoScript now.
* Documentation has been updated to the new rendering style.


Version 8.0.0
-------------

* BREAKING: Officially dropped PHP 5.5 support
  (though the extension might still work on 5.5 - it's your own risk)
* Updated shariff-backend to version 6.0.0


Version 7.3.1
-------------

* Fixed composer.json information to comply with EMCONF


Version 7.3.0
-------------

* Fixed a bug which caused too many attributes on the final div tag
* CMS 8 compatibility
* The language of the share buttons is chosen according to FE language
* The extension is now translatable via `TYPO3 Translation Server <https://translation.typo3.org/projects/TYPO3.ext.rx_shariff/>`_


Version 7.2.0
-------------

* Updated shariff to version 1.24.0
* Shariff-backend errors are logged to the default TYPO3 log file (typo3temp/(var/)logs/typo3_*.log)


Version 7.1.1
-------------

* Bugfix: Shariff backend can be disabled again when using the viewhelper


Version 7.1.0
-------------

* Allow the usage of universal tag attributes on the view helper


Version 7.0.2
-------------

* Update shariff-backend to version 5.2.3


Version 7.0.1
-------------

* Fix "allowedDomains" setting not shown in EM


Version 7.0.0
-------------

* BREAKING: All URLs are now checked against the "allowedDomains" setting of the extension.
  By default this the local server name only. If your run more domains you need configure this setting accordingly.
* Update shariff-backend to version 5.1.0


Version 6.0.0
-------------

* Updated shariff-backend to version 5.0.0
* Attention: PHP support is now 5.5 - 7.0


Version 5.2.0
-------------

* Updated shariff to version 1.23.0


Version 5.1.1
-------------

* Fix URL encoding of Facebook again


Version 5.1.0
-------------

* Updated shariff to version 1.22.0
* Updated to shariff-backend version 3.0.1
* Fix URL encoding issues for some stat providers


Version 5.0.2
-------------

* Fix PHP syntax error in PHP <= 5.4


Version 5.0.1
-------------

* Fix various issues with FlexForms


Version 5.0.0
-------------

* Updated to shariff-backend version 2.0.0
* Removed Twitter support for backend due to termination of the API by Twitter.


Version 4.1.0
-------------

* Updated shariff to version 1.21.0
* PSR-7 compliant eID handling for CMS 7


Version 4.0.0
-------------

* Breaking: Stylesheets have been moved to new Public/Css directory
* Updated shariff to version 1.20.0
* Updated shariff-php to version 1.6.0


Version 3.0.0
-------------

* Breaking: Javascript is included as normal footer JS and not as footer lib
* Updated shariff to version 1.18.0


Version 2.4.0
-------------

* Updated shariff to version 1.17.1


Version 2.3.0
-------------

* Declare compatibility with CMS 7.4
* Add composer.json
* Updated shariff to version 1.16.0


Version 2.2.0
-------------

* Updated shariff to version 1.15.0


Version 2.1.0
-------------

* Regression fix: Use guzzle 5.3 (6.0 slipped in by accident)
* Updated shariff to version 1.14.0


Version 2.0.0
-------------

* Update shariff backend to version 1.5.0
* Use native TYPO3 caching framework instead of bundled one
* Add Frontend plugin with FlexForms configuration


Version 1.8.0
-------------

* Added static TypoScript templates
* New "services" attribute for the viewhelper to ease syntax


Version 1.7.0
-------------

* Update shariff JS to version 1.13.0


Version 1.6.0
-------------

* Update shariff JS to version 1.12.0


Version 1.5.1
-------------

* Removes wrong information from the documentation


Version 1.5
-----------

* Update shariff JS to version 1.11.0
* Improved documentation
* TYPO3 CMS 7.2 support


Version 1.4
-----------

* Update shariff JS to version 1.10.0


Version 1.3
-----------

* Update shariff JS to version 1.9.3


Version 1.2
-----------

* Update shariff JS to version 1.8.0


Version 1.1
-----------

* Important bugfix for viewhelper
* Update shariff JS to version 1.7.4 (fixes IE problems)


Version 1.0
-----------

Initial release

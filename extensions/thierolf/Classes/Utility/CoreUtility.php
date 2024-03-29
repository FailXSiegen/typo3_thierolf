<?php
namespace Failx\Thierolf\Utility;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */
use TYPO3\CMS\Core\Package\Exception;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Core Utility
 *
 * Utility to get core informations.
 */
class CoreUtility
{

    /**
     * Returns the flag icons path depending on the current core version
     *
     * @return string
     */
    public static function getLanguageFlagIconPath()
    {
        if (version_compare(static::getCurrentCoreVersion(), 9.0, '<')) {
            return ExtensionManagementUtility::extPath('core') . 'Resources/Public/Icons/Flags/PNG/';
        }
        return ExtensionManagementUtility::extPath('core') . 'Resources/Public/Icons/Flags/';
    }

    public static function getSitePath(): string
    {
        if (defined('PATH_site')) {
            return constant('PATH_site');
        }
        /** @see https://docs.typo3.org/m/typo3/reference-coreapi/9.5/en-us/ApiOverview/GlobalValues/Constants/Index.html#path-site */
        return Environment::getPublicPath() . '/';
    }

    /**
     * Returns the current core minor version
     *
     * @return string
     * @throws Exception
     */
    public static function getCurrentCoreVersion()
    {
        return substr(ExtensionManagementUtility::getExtensionVersion('core'), 0, 3);
    }
}

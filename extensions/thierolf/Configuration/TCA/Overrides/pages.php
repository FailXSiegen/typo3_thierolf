<?php
/***************************************************************
  *  Copyright notice
  *
  *  (c) 2019 Felix Herrmann <info@failx.de>
  *      Created on: 28.09.17 15:23
  *
  *  All rights reserved
  *
  *  This script is part of the TYPO3 project. The TYPO3 project is
  *  free software; you can redistribute it and/or modify
  *
  *  it under the terms of the GNU General Public License as published by
  *  the Free Software Foundation; either version 3 of the License, or
  *  (at your option) any later version.
  *
  *  The GNU General Public License can be found at
  *  http://www.gnu.org/copyleft/gpl.html.
  *
  *  This script is distributed in the hope that it will be useful,
  *  but WITHOUT ANY WARRANTY; without even the implied warranty of
  *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  *  GNU General Public License for more details.
  *
  *  This copyright notice MUST APPEAR in all copies of the script!
  ***************************************************************/

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(
    function ($extkey) {

        $columns = [
            'theme' => [
                'label' => 'LLL:EXT:'.$extkey.'/Resources/Private/Language/locallang_db.xlf:theme',
                'description' => 'LLL:EXT:'.$extkey.'/Resources/Private/Language/locallang_db.xlf:theme.description',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['---',''],
                        ['Theme Weiß', 'theme-white', 'EXT:'.$extkey.'/Resources/Public/Icons/theme-white.png'],
                        ['Theme Schwarz', 'theme-black', 'EXT:'.$extkey.'/Resources/Public/Icons/theme-black.png'],
                    ],
                    'fieldWizard' => [
                        'selectIcons' => [
                            'disabled' => false,
                        ],
                    ],
                ],
            ],
            'fa_icon_name' => [
                'exclude' => 0,
                'label' => 'Font Awesome Icon',
                'description' => 'Für Navigation und Sidebar, Möglichkeiten unter https://fontawesome.com/search?o=r&m=free und nur die Klasse eintragen, Beispiel: fa-solid fa-house',
                'config' => [
                    'type' => 'input',
                    'size' => 20,
                    'eval' => 'trim',
                    'max' => 256
                ]
            ],
            'custom_icon' => [
                'exclude' => 0,
                'label' => 'Individuells Icon',
                'description' => 'Für Navigation und Sidebar, priorisiert über dem Font Awesome Icon',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'image',
                    [
                        'behaviour' => [
                            'allowLanguageSynchronization' => true,
                        ],
                        // custom configuration for displaying fields in the overlay/reference table
                        // to use the newsPalette and imageoverlayPalette instead of the basicoverlayPalette
                        'overrideChildTca' => [
                            'types' => [
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_UNKNOWN => [
                                    'showitem' => '
                                        --palette--;Teaserformat;teaserPalette,
                                        --palette--;;imageoverlayPalette,
                                        --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                    'showitem' => '
                                        --palette--;Teaserformat;teaserPalette,
                                        --palette--;;imageoverlayPalette,
                                        --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                    'showitem' => '
                                        --palette--;Teaserformat;teaserPalette,
                                        --palette--;;imageoverlayPalette,
                                        --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                    'showitem' => '
                                        --palette--;Teaserformat;teaserPalette,
                                        --palette--;;audioOverlayPalette,
                                        --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                    'showitem' => '
                                        --palette--;Teaserformat;teaserPalette,
                                        --palette--;;videoOverlayPalette,
                                        --palette--;;filePalette'
                                ],
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                    'showitem' => '
                                        --palette--;Teaserformat;teaserPalette,
                                        --palette--;;imageoverlayPalette,
                                        --palette--;;filePalette'
                                ]
                            ],
                        ],
                    ],
                    $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext']
                )
            ],
        ];
        // Add TCA columns.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'pages',
            $columns
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', 'fa_icon_name,custom_icon','','after:subtitle');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'pages',
            'theme,--linebreak--',
            '',
            'after:doktype'
        );

        // get absolute path the PageTSconfig directory.
        $path = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('thierolf').'Configuration/PageTSconfig/';
        // Collect .ts files.
        $filesTS = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir($path, 'ts');
        // Collect .txt files
        $filesTXT = \TYPO3\CMS\Core\Utility\GeneralUtility::getFilesInDir($path, 'typoscript');
        // Merge collected files.
        $files = array_merge($filesTS, $filesTXT);
        foreach ($files as $fileKey => $fileValue) {
            // Register all files under PageTS
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
                'thierolf',
                'Configuration/PageTSconfig/'.$fileValue,
                $fileValue
            );
        }
    },
    'thierolf'
);

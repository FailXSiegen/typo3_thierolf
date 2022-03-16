<?php
/***************************************************************
  *  Copyright notice
  *
  *  (c) 2019 Felix Herrmann <info@failx.de>
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

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

call_user_func(
    function ($_EXTKEY) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                 'PDF Viewer',
                 'pdfviewer',
                 'content-bullets',
             ],
            'textmedia',
            'after'
        );
        $GLOBALS['TCA']['tt_content']['types']['pdfviewer'] = [
            'showitem' => '
                     --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header,
                    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;;frames,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
               ',
        ];


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                 'Teaser Menu Kacheln',
                 'teasermenu',
                 'content-menu-sitemap-pages',
             ],
            'textmedia',
            'after'
        );
      
        $GLOBALS['TCA']['tt_content']['types']['teasermenu'] = [
            'showitem' => '
                     --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;Interner Titel,
                    teaserimage;Menüpunkte mit Bildern,
                    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;;frames,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
            ',
        ];

        // Create TCA columns.
        $columns = [
            'header' => [
                'config' => [
                    'type' => 'text',
                    'cols' => 40,
                    'rows' => 3,
                ],
            ],
            'teaserimage' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.images',
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
            'tt_content',
            $columns
        );
    },
    'thierolf'
);

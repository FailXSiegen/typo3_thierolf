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
        $columns = [
            'zoom' => [
                'exclude' => 0,
                'label' => 'Zoom',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                ]
            ],
            'styleclass' => [
                'exclude' => 0,
                'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xlf:tx_wsflexslider_domain_model_image.styleclass',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        
                        [
                            'Oben Links',
                            'position-absolute m-3 top-0 start-0'
                        ],
                        [
                            'Unten Links',
                            'position-absolute m-3 bottom-0 start-0'
                        ],
                        [
                            'Oben Rechts',
                            'position-absolute m-3 top-0 end-0'
                        ],
                        [
                            'Unten Rechts',
                            'position-absolute m-3 bottom-0 end-0'
                        ],
                        [
                            'Mitte',
                            'position-absolute top-50 start-50 translate-middle'
                        ],
                        [
                            'style1',
                            'style1'
                        ],
                        [
                            'style2',
                            'style2'
                        ],
                    ],
                ],
            ],
            'fal_image' => [
                'exclude' => 0,
                'l10n_mode' => 'mergeIfNotBlank',
                'label' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xlf:tx_wsflexslider_domain_model_image.image',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'fal_image',
                    [
                        'minitems' => 0,
                        'maxitems' => 1,
                        'appearance' => [
                            'createNewRelationLinkTitle' => 'LLL:EXT:ws_flexslider/Resources/Private/Language/locallang_db.xlf:add_image',
                            'showAllLocalizationLink' => true,
                            'headerThumbnail' => [
                                'height' => '90c',
                                'width' => 90
                            ]
                        ],
                        'foreign_match_fields' => [
                            'fieldname' => 'fal_image',
                            'tablenames' => 'tx_wsflexslider_domain_model_image',
                            'table_local' => 'sys_file',
                        ],
                        'foreign_types' => [
                            '0' => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette,
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette,
                                    --palette--;;imageoverlayPalette,
                                    --palette--;;filePalette'
                            ],
                        ],
                        'overrideChildTca' => [
                            'types' => [
                                \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                    'showitem' => '
                                        --palette--;;imageoverlayPalette,
                                        --palette--;;filePalette'
                                ],
                            ],
                        ],
                    ],
                    'gif,jpg,jpeg,png,svg'
                )
    
            ]
        ];
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tx_wsflexslider_domain_model_image',
            $columns
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
            'tx_wsflexslider_domain_model_image',
            'zoom, --linebreak--',
            '',
            'after:styleclass'
        );
    },
    'thierolf'
);

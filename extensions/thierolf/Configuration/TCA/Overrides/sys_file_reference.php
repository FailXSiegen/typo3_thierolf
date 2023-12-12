<?php

if (!defined('TYPO3')) {
    die('Access denied.');
}

call_user_func(
    function ($extKey, $table) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns($table, [
            'tile_format' => [
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        ['1x1 - kleine Kachel', '1x1'],
                        ['2x1 - Breite Kachel', '2x1']
                    ],
                    'maxitems' => '1',
                ],
                'exclude' => '1',
                'label' => 'Format Teaser Block'
            ],
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
                'label' => 'Text style class',
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
            'positionclass' => [
                'exclude' => 0,
                'label' => 'Text style class',
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
        ]);
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette($table, 'teaserPalette', 'tile_format');
    },
    'thierolf',
    'sys_file_reference'
);

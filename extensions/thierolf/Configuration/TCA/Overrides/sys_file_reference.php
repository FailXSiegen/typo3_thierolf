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
        ]);
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette($table, 'teaserPalette', 'tile_format');
    },
    'thierolf',
    'sys_file_reference'
);

<?php

if (!defined('TYPO3_MODE')) {
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
                        ['2x1 - Breite Kachel', '2x1'],
                        ['1x2 - Hohe Kachel', '1x2'],
                        ['2x2 - Große Kachel', '2x2'],
                    ],
                    'maxitems' => '1',
                ],
                'exclude' => '1',
                'label' => 'Format Teaser Block'
            ],
        ]);
        $GLOBALS['TCA']['sys_file_reference']['palettes']['imageoverlayPalette']['showitem'] = '
        title,alternative,
        --linebreak--,
        tile_format,
        --linebreak--,
        description,link,
        --linebreak--,
        crop';
    },
    'thierolf',
    'sys_file_reference'
);

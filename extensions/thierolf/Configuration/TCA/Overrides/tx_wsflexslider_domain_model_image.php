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
            ]
        ];
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
            'tx_wsflexslider_domain_model_image',
            $columns
        );
    },
    'thierolf'
);

<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "bootstrap_grids"
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
	'title' => 'Grids for bootstrap',
	'description' => 'Gridelements for bootstrap v4. Column grids, tabs and accordion.',
	'category' => 'misc',
	'author' => 'Pascal Mayer',
	'author_email' => 'typo3@lascap.ch',
	'author_company' => '',
	'version' => '4.0.0',
	'state' => 'stable',
	'clearCacheOnLoad' => true,
	'constraints' => [
		'depends' => [
			'typo3' => '10.4.0-12.4.99',
			'gridelements' => '10.0.0-12.99.99',
		],
		'conflicts' => [],
        'suggests' => [],
	],
    'autoload' => [
        'psr-4' => ['Laxap\\BootstrapGrids\\' => 'Classes']
    ],
];

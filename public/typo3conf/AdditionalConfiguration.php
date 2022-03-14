<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive(
    $GLOBALS['TYPO3_CONF_VARS'],
    [
        'DB' => [
            'Connections' => [
                'Default' => [
                    'dbname' => $_ENV['TYPO3_DB_NAME'],
                    'host' => $_ENV['TYPO3_DB_HOST'],
                    'password' => $_ENV['TYPO3_DB_PASSWORD'],
                    'user' => $_ENV['TYPO3_DB_USER'],
                ],
            ],
        ],
        'EXTCONF' => [
            'lang' => [
                'availableLanguages' => [
                    'de',
                ],
            ],
        ],
        'GFX' => [
            'processor' => $_ENV['GFX'],
            'processor_colorspace' => $_ENV['GFX_COLORSPACE'],
        ],
        'MAIL' => [
            'transport' => $_ENV['MAIL_TRANSPORT'],
            'transport_sendmail_command' => $_ENV['MAIL_SENDMAIL'],
            'transport_smtp_encrypt' => $_ENV['MAIL_ENCRYPT'],
            'transport_smtp_password' => $_ENV['MAIL_PASSWORD'],
            'transport_smtp_server' => $_ENV['MAIL_SERVER'],
            'transport_smtp_username' => $_ENV['MAIL_USERNAME'],
            'defaultMailFromAddress' => $_ENV['MAIL_FROM'],
            'defaultMailFromName' => $_ENV['MAIL_FROMNAME'],
            'defaultMailReplyToAddress' => $_ENV['MAIL_REPLY'],
            'defaultMailReplyToName' => $_ENV['MAIL_REPLYNAME'],
            'templateRootPaths' => [
                250 => $_ENV['MAIL_TEMPLATES']
            ],
            'layoutRootPaths' => [
                250 => $_ENV['MAIL_LAYOUTS']
            ],
        ],
        'SYS' => [
            'sitename' => $_ENV['SITENAME'],
        ],
    ]
);

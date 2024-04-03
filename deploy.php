<?php
namespace Deployer;


require 'vendor/deployer/deployer/recipe/typo3.php';
require 'vendor/deployer/deployer/contrib/rsync.php';


host('staging')
    ->setHostname('thierolf.de')
    ->setRemoteUser('ssh-w00ae85a')
    ->set('deploy_path', '/www/htdocs/w00ae85a/dev-composer.thierolf.de');

host('live')
    ->setHostname('thierolf.de')
    ->setRemoteUser('ssh-w00ae85a')
    ->set('deploy_path', '/www/htdocs/w00ae85a/composer.thierolf.de');

// Config
set('repository', 'git@github.com:FailXSiegen/typo3_thierolf.git');
set('http_user', 'w00ae85a');
set('bin_folder', './vendor/bin/');
set('typo3_webroot', 'public');
set('keep_releases', 5);

set('bin/php', function () {
    return which('php81');
});

add('shared_files', [
    '.env',
    'public/.htpasswd'
]);

set('rsync_src', './');

/**
 * Writeable directories
 */
set('writable_dirs', [
    '{{typo3_webroot}}/fileadmin',
    '{{typo3_webroot}}/typo3temp',
    '{{typo3_webroot}}/_assets',
    '{{typo3_webroot}}/typo3conf',
    '{{typo3_webroot}}/uploads'
]);

set('shared_dirs', [
    '{{typo3_webroot}}/fileadmin',
    '{{typo3_webroot}}/typo3temp',
    '{{typo3_webroot}}/uploads'
]);

set('rsync',[
    'exclude'      => [
        'deploy.php',
        '.vscode',
        '.docker*',
        '.editorconfig',
        '.env',
        './*.sql',
        './*.json',
        '.git*',
        '.surf',
        '.deployer',
        '.database',
        'docker-compose.yml',
        'public/_assets',
        'public/fileadmin',
        'public/uploads',
        'README.md',
        'deploy_rsa',
        'deploy_rsa.enc',
        '.travis.yml'
    ],
    'exclude-file' => false,
    'include'      => [],
    'include-file' => false,
    'filter'       => [],
    'filter-file'  => false,
    'filter-perdir'=> false,
    'flags'        => 'rz', // Recursive, with compress
    'options'      => ['delete', 'times', 'perms', 'links', 'delete-excluded'],
    'timeout'      => 600,
]);

// Tasks
task('build', function () {
    runLocally('COMPOSER_MEMORY_LIMIT=-1 composer -q update');
});

task('typo3', function () {
    run('cd {{release_path}} && {{bin/php}} {{bin_folder}}typo3 install:fixfolderstructure');
    run('cd {{release_path}} && {{bin/php}} {{bin_folder}}typo3 database:updateschema *.add,*.change');
    run('cd {{release_path}} && {{bin/php}} {{bin_folder}}typo3 language:update');
    run('cd {{release_path}} && {{bin/php}} {{bin_folder}}typo3 cache:flush');
    run('cd {{release_path}} && {{bin/php}} /usr/bin/composer dump-autoload');
});

//task('yarn', function () {
//    run('cd {{yarn_path}} && yarn install --silent --non-interactive');
//})->local();

// task('opcache', function () {
//     run('cd {{release_path}} && {{bin_folder}}cachetool opcache:reset');
// });
desc('Deploy TYPO3');
task('deploy', [
    'deploy:unlock',
    'deploy:setup',
    'deploy:lock',
    'build',
    'deploy:release',
    'rsync',
    'deploy:shared',
    'typo3',
    'deploy:symlink',
    'deploy:unlock',
    'deploy:cleanup',
    'deploy:success'
]);

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

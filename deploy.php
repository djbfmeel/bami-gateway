<?php

require 'recipe/symfony3.php';

set('http_user', 'bamibot');
set('http_group', 'www-data');

// Override writable task
task('writable', function () {
    run('chmod -R 775 {{writable_dir}}');
});

// Set configurations
set('repository', 'git@github.com:djbfmeel/bami-gateway.git');
set('shared_files', []);
set('shared_dirs', []);
set('writable_dirs', []);
set('writable_use_sudo', false);

// Configure servers
server('prod', 'onefinity.io')
    ->user('bamibot')
    ->forwardAgent()
    ->env('deploy_path', '/home/bamibot/bamibot.onefinity.io');

after('deploy:update_code', 'deploy:shared');

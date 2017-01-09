<?php

require 'recipe/symfony3.php';

set('writable_chmod_mode', '0775');

task('deploy:owner', function() {
    run('chown -R bamibot:www-data /home/bamibot/bamibot.onefinity.io');
});

// Set configurations
set('repository', 'git@github.com:djbfmeel/bami-gateway.git');
set('writable_use_sudo', false);

// Configure servers
server('prod', 'onefinity.io')
    ->user('bamibot')
    ->forwardAgent()
    ->env('deploy_path', '/home/bamibot/bamibot.onefinity.io');

after('deploy:update_code', 'deploy:shared');

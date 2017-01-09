<?php

require 'recipe/symfony3.php';

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

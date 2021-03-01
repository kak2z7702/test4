#!/usr/bin/env php
<?php
echo 'Composer staring...' . PHP_EOL;

$argv = $argv ?? [];
if(isset($argv[0])){
    unset($argv[0]);
}

$exec = 'php -d memory_limit=-1 ./vendor/composer/composer/bin/composer ' . implode(' ', $argv);

echo  $exec . PHP_EOL;

exec($exec);

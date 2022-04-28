<?php

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([
        SetList::DEAD_CODE,
        LevelSetList::UP_TO_PHP_74,
        SetList::TYPE_DECLARATION,
        SetList::TYPE_DECLARATION_STRICT
    ]);

    // paths to refactor; solid alternative to CLI arguments
    $rectorConfig->paths([__DIR__ . '/app']);

    // do you need to include constants, class aliases or custom autoloader? files listed will be executed
    $rectorConfig->bootstrapFiles([
        __DIR__ . '/vendor/codeigniter4/codeigniter4/system/Test/bootstrap.php',
    ]);

    // is there a file you need to skip?
    $rectorConfig->skip([
        __DIR__ . '/app/Controllers/BaseController.php',
        __DIR__ . '/app/Config',
        __DIR__ . '/app/Views',
    ]);

    // auto import fully qualified class names
    $rectorConfig->importNames();
};

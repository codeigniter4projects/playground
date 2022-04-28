<?php

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([SetList::DEAD_CODE, SetList::PHP_73, SetList::TYPE_DECLARATION, SetList::TYPE_DECLARATION_STRICT]);
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

        // requires php 8
        RemoveUnusedPromotedPropertyRector::class,

        // request php 7.4
        ReturnTypeFromStrictTypedPropertyRector::class,
        TypedPropertyFromStrictConstructorRector::class,
        ParamTypeFromStrictTypedPropertyRector::class,
    ]);

    // auto import fully qualified class names
    $rectorConfig->importNames();
    $rectorConfig->phpVersion(PhpVersion::PHP_73);
};

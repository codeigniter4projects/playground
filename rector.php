<?php

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::DEAD_CODE);
    $containerConfigurator->import(SetList::PHP_73);
    $containerConfigurator->import(SetList::TYPE_DECLARATION);
    $containerConfigurator->import(SetList::TYPE_DECLARATION_STRICT);

    $parameters = $containerConfigurator->parameters();

    // paths to refactor; solid alternative to CLI arguments
    $parameters->set(Option::PATHS, [__DIR__ . '/app']);

    // do you need to include constants, class aliases or custom autoloader? files listed will be executed
    $parameters->set(Option::BOOTSTRAP_FILES, [
        __DIR__ . '/vendor/codeigniter4/codeigniter4/system/Test/bootstrap.php',
    ]);

    // is there a file you need to skip?
    $parameters->set(Option::SKIP, [
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
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_73);
};
